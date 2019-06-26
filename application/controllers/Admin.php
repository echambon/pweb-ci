<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $username;
	public $last_login;

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('logs_model');
	}

	public function index() {
		$this->load->view('admin_header');
		if(isset($_SESSION['user'])) {
			// set parameters username
			$this->username 	= $_SESSION['user'];
			$this->last_login = $_SESSION['last_login'];

			// setting session data
			$data = array('username' => $this->username, 'last_login' => $this->last_login);

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
	 	if(isset($_SESSION['user'])) {
				// Loading header & menu
				$this->load->view('admin_header');
				$this->load->view('admin_menu');

				// Loading settings view
				$this->load->view('admin_settings');

				// loading footer
				$this->load->view('admin_footer');
		} else {
			header('Location: /admin');
		}
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
		$this->logs_model->log_admin_connection($_POST['username'],$log_error);

		echo json_encode(['error' => $error, 'message' => $message]);
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
}
