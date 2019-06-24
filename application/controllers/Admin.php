<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public $username;

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('logs_model');
	}

	public function index() {
		$this->load->view('admin_header');
		if(isset($_SESSION['user'])) {
			// set parameters username
			$this->username = $_SESSION['user'];

			// setting session data
			$data = array('username' => $this->username);

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
	 * Perform existence/password checks and logs the user in using POST transmitted data.
	 *
	 * @return	void
	 */
	public function login() {
		// default messages
		$error 		= 1;
		$message 	= 'Empty post request';

		if(!empty($_POST['username']) && !empty($_POST['password'])) {
			// try to get user by username
			$result = $this->admin_model->get_user_by_username($_POST['username']);
			if(empty($result)) {
				$error 		= 1;
				$message 	= 'Username not found';
			} else {
				if(password_verify($_POST['password'],$result[0]->password)) {
					// create session
					$_SESSION['user'] = $_POST['username'];

					// log connection
					$this->logs_model->log_admin_connection($_POST['username']);

					$error 		= 0;
					$message 	= 'Redirecting...';
				} else {
					$error 		= 1;
					$message 	= 'Incorrect password';
				}
			}
		} else {
			header('Location: /admin');
		}

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
