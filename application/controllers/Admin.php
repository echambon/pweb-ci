<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		//$this->load->helper('form');

		// Load libraries
		//$this->load->library('form_validation');
		//$this->load->library('session');

		// Load database
		//$this->load->model('login_database');
	}

	public function index() {
		$this->load->view('admin_header');
		$this->load->view('admin_login'); //todo : only if no opened session
		$this->load->view('admin_footer');
	}

	/**
	 * Index Page for this controller.
	 */
	/*public function index()
	{
		// Load session
		$this->load->session();
		$this->load->view('admin_login');
	}*/
}
