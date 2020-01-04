<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		// getting website settings data
		$website_settings_data = $this->admin_model->get_website_settings();

		// setting data
		$settings_data = array('website_title' 		  => $website_settings_data[0]->website_title,
													 'website_subtitle' 	=> $website_settings_data[0]->website_subtitle,
													 'website_keywords' 	=> $website_settings_data[0]->website_keywords);

		// showing views
		$this->load->view('page_header',$settings_data);
		$this->load->view('page_menu');
		$this->load->view('page_main');
		$this->load->view('page_footer');
	}
}
