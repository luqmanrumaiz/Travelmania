<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Post_model');
		$this->load->helper('url');
	}

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
			$this->Post_model->setUserId($this->session->userdata('user')['userId']);
			$posts = $this->Post_model->getMyPosts();

			if(empty($posts))
			{
				$posts = array();
				$data['posts'] = $posts;

				$this->load->view('home_view', $data);
			}
			else
			{
				$data['posts'] = json_decode(json_encode($posts), true);
				$this->load->view('home_view', $data);
			}
		}
		else
		{
			redirect('login');
		}
	}
}
