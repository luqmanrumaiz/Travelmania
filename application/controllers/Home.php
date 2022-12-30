<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->view('register_view');
	}

	public function login()
	{
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->view('login_view');
	}

	public function home()
	{
		$this->load->helper('url');
		$this->load->view('home_view');
	}
}
