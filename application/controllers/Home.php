<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');

		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
		{
			redirect('home');
		}
		else
		{
			$this->load->view('register_view');
		}
	}

	public function login()
	{
		$this->load->helper('url');

		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
		{
			redirect('home');
		}
		else
		{
			$this->load->view('login_view');
		}
	}

	public function home()
	{
		$this->load->helper('url');

		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
		{
			$this->load->view('home_view');
		}
		else
		{
			redirect('login');
		}
	}
}
