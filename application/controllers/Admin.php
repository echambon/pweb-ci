<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('logs_model');
	}

	public function index() {
		$this->load->view('admin_header');
		if(isset($_SESSION['user'])) {
			// setting data
			$data = array('username' => $_SESSION['user'], 'last_login' => $_SESSION['last_login']);

			// loading views
			$this->load->view('admin_menu');
			$this->load->view('admin_index',$data);
		} else {
			$this->load->view('admin_login');
		}
		$this->load->view('admin_footer');
	}

	/**
	 * Public function
	 *
	 * Admin settings management page.
	 *
	 * @return	void
	 */
	 public function settings() {
	 		$this->session_check();

			// Loading header & menu
			$this->load->view('admin_header');
			$this->load->view('admin_menu');

			// getting admin profile data
			$profile_data = $this->admin_model->get_user_by_username($_SESSION['user']);

			// getting website settings data
			$website_settings_data = $this->admin_model->get_website_settings();
			// todo: get page title from $website_settings_data[0]->website_homepage_id

			// setting checked status
			$log_successful_connection 			= ($website_settings_data[0]->log_successful_connection_activated == 1 ? "checked" : "");
			$log_failed_attempts_activated 	= ($website_settings_data[0]->log_failed_attempts_activated == 1 ? "checked" : "");

			// setting data
			$data = array('username' 					=> $profile_data[0]->username,
										'email' 						=> $profile_data[0]->email,
										'website_title' 		=> $website_settings_data[0]->website_title,
										'website_subtitle' 	=> $website_settings_data[0]->website_subtitle,
										'website_keywords' 	=> $website_settings_data[0]->website_keywords,
										'log_success' 			=> $log_successful_connection,
										'log_failed' 				=> $log_failed_attempts_activated);

			// Loading settings view
			$this->load->view('admin_settings',$data);

			// loading footer
			$this->load->view('admin_footer');
	 }

	/**
	 * Public function
	 *
	 * Perform existence/password checks and logs the user in using POST transmitted data.
	 *
	 * @return	void
	 */
	public function login() {
		// default messages
		$error 			= 1;
		$log_error 	= ADMIN_LOGIN_ERROR_EMPTY_POST;
		$message 		= 'Empty post request';

		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			// try to get user by username
			$result = $this->admin_model->get_user_by_username($_POST['username']);
			if(empty($result)) {
				$error 			= 1;
				$log_error 	= ADMIN_LOGIN_ERROR_USERNAME_NOT_FOUND;
				$message 		= 'Username not found';
			} else {
				if(password_verify($_POST['password'],$result[0]->password)) {
					// create session
					$_SESSION['user'] = $_POST['username'];
					$last_login_sql = $this->admin_model->get_user_last_login($_POST['username']);
					$_SESSION['last_login'] = $last_login_sql[0]->last_login;

					// update last login DateTime
					$this->admin_model->set_user_last_login($_POST['username']);

					// error management
					$error 			= 0;
					$log_error 	= ADMIN_LOGIN_NO_ERROR;
					$message 		= 'Redirecting...';
				} else {
					$error 			= 1;
					$log_error 	= ADMIN_LOGIN_ERROR_INCORRECT_PASSWORD;
					$message 		= 'Incorrect password';
				}
			}
		} else {
			header('Location: /admin');
		}

		// log connection
		if($this->get_log_successful_connection_activated() && $error == NO_ERROR) {
			$this->logs_model->log_admin_connection($_POST['username'],$log_error);
		}
		if($this->get_log_failed_attempts_activated() && $error != NO_ERROR) {
			$this->logs_model->log_admin_connection($_POST['username'],$log_error);
		}

		echo json_encode(['error' => $error, 'message' => $message]);
	}

	/**
	* Public function
	*
	* Updates logs settings.
	*
	* @return	void
	*/
	public function logs_settings_update() {
		$this->session_check();

		// default values
		$error 									= ERROR_EMPTY_POST;
		$message 								= 'Empty post request';
		$log_success_activated 	= 0;
		$log_failed_activated 	= 0;

		if(!empty($_POST['log_success'])) {
			$log_success_activated = 1;
		}
		if(!empty($_POST['log_failed'])) {
			$log_failed_activated = 1;
		}

		// update logs activation values
		$this->admin_model->set_logs_activation_settings($log_success_activated,$log_failed_activated);

		// update error and message values
		$error 			= NO_ERROR;
		$message 		= 'Updated logs activation settings successfully';

		echo json_encode(['error' => $error, 'message' => $message]);
	}

	/**
	* Public function
	*
	* Updates website settings.
	*
	* @return	void
	*/
	public function website_settings_update() {
		$this->session_check();

		// default values
		$error 									= ERROR_EMPTY_POST;
		$message 								= 'Empty post request';

		// allow subtitle and keywords to be empty
		if(!empty($_POST['website_title'])) {
			$title 				= $_POST['website_title'];
			$subtitle 		= $_POST['website_subtitle'];
			$keywords 		= $_POST['website_keywords'];
			$homepage_id 	= 0; // todo

			// update general website settings
			$this->admin_model->set_website_settings($title,$subtitle,$keywords,$homepage_id);

			$error 		= NO_ERROR;
			$message 	= 'Updated website settings successfully';
		} else  {
			header('Location: /admin/settings');
		}

		echo 	json_encode(['error' => $error, 'message' => $message]);
	}

	/**
	* Public function
	*
	* Updates admin profile.
	*
	* @return	void
	*/
	public function admin_profile_update() {
		$this->session_check();

		// default values
		$error 									= ADMIN_LOGIN_ERROR_EMPTY_POST;
		$message 								= 'Empty post request';

		// allow new password and email to be empty
		if(!empty($_POST['admin_username']) && !empty($_POST['admin_current_password'])) {
			// save admin user id
			$userdata 			= $this->admin_model->get_user_by_username($_SESSION['user']);
			$user_id 				= $userdata[0]->id;
			$user_password 	= $userdata[0]->password;

			// assign variables to be updated
			$admin_username 						= $_POST['admin_username'];
			$admin_current_password 		= $_POST['admin_current_password'];
			$admin_new_password 				= $user_password;
			if(!empty($_POST['admin_new_password'])) {
				$admin_new_password 			= password_hash($_POST['admin_new_password'], PASSWORD_BCRYPT, ['cost' => 12]);
			}
			$admin_email 								= $_POST['admin_email'];

			// check password
			if(password_verify($admin_current_password, $user_password)) {
				if(strcmp($_POST['admin_new_password'], $_POST['admin_new_password_repeat']) == 0) {
					// update admin user information
					$this->admin_model->set_user_profile(	$user_id,
					 																			$admin_username,
																								$admin_new_password,
																								$admin_email);

					// update session data
					$_SESSION['user'] = $admin_username;

					$error 		= NO_ERROR;
					$message 	= 'Updated administrator profile successfully';
				} else {
					$error 		= ADMIN_LOGIN_ERROR_UNMATCHING_PASSWORD;
					$message	= 'New passwords do not match';
				}
			} else {
				$error 			= ADMIN_LOGIN_ERROR_INCORRECT_PASSWORD;
				$message 		= 'Incorrect password';
			}
		} else {
			header('Location: /admin/settings');
		}

		echo 	json_encode(['error' => $error, 'message' => $message]);
	}

	/**
	* Public function
	*
	* Logs the user out.
	*
	* @return	void
	*/
	public function logout() {
		session_destroy(); // view if CI has better option
		header('Location: /admin');
	}

	/**
	* Private function
	*
	* Checks if session is active, redirects to admin index otherwise.
	*
	* @return	void
	*/
	private function session_check() {
		if(!isset($_SESSION['user'])) {
			header('Location: /admin');
		}
	}

	/**
	* Private function
	*
	* Connection logs display page.
	*
	* @return	void
	*/
	public function logs() {
		$this->session_check();

		// todo
	}



	// Private getters
	private function get_log_successful_connection_activated() {
	 $settings = $this->admin_model->get_website_settings();
	 return $settings[0]->log_successful_connection_activated;
	}
	private function get_log_failed_attempts_activated() {
	 $settings = $this->admin_model->get_website_settings();
	 return $settings[0]->log_failed_attempts_activated;
	}
	private function get_user_id($username) {
		$profile = $this->admin_model->get_user_by_username($username);
		return $profile[0]->id;
	}
}
