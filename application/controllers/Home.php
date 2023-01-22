<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('User_model');
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
			// Get all posts based on the user's id
			$posts = $this->Post_model->get_my_posts($this->session->userdata('user_id'));

			if(empty($posts))
			{
				$posts = array();
				$data['posts'] = $posts;
			}
			else
			{
				$data['posts'] = json_decode(json_encode($posts), true);
			}

			$this->load->view('home_view', $data);
		}
		else
		{
			redirect('login');
		}
	}

	public function post()
	{
		$this->load->helper('url');

		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
		{
			// Getting the post id from the url
			$post_id = $this->uri->segment(2);

			// Getting the post data from the database
			$post = $this->Post_model->get_my_post($post_id);

			if (empty($post))
			{
				$post = array();
				$data['post'] = $post;
			}
			else
			{
				$data['post'] = json_decode(json_encode($post), true);
			}

			// Getting the comments data from the database
			$comments = $this->Comment_model->get_comments($post_id);

			if (empty($comments))
			{
				$comments = array();
				$data['comments'] = $comments;
			}
			else
			{
				foreach ($comments as $comment)
				{
					$comment->user = $this->User_model->get_user($comment->user_id);
				}
				$data['comments'] = json_decode(json_encode($comments), true);
			}

			$data['destination'] = json_decode(json_encode($this->Destination_model->get_destination($data['post']['destination_id'])), true);

			$this->load->view('post_view', $data);
		}
	}
}
