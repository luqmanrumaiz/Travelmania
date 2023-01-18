<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Post_model');
		$this->load->model('Comment_model');
		$this->load->model('Destination_model');
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
			$this->Post_model->set_user_id($this->session->userdata('user')['user_id']);
			$posts = $this->Post_model->get_my_posts();

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

	public function post()
	{
		$this->load->helper('url');


			$post = $this->Post_model->get_my_post($this->uri->segment(2));
			$data['post'] = json_decode(json_encode($post), true);

			if ($this->Comment_model->get_comments_by_post_id($this->uri->segment(2)))
			{
				$comments = $this->Comment_model->get_comments_by_post_id($this->uri->segment(2));
				$data['comments'] = json_decode(json_encode($comments), true);
			}
			else
			{
				$data['comments'] = array();
			}

			$data['destination'] = json_decode(json_encode($this->Destination_model->get_destination(2)), true);

			$this->load->view('post_view', $data);
	}
}
