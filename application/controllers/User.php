<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class User extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('User_model');
		$this->load->helper('url');
	}

	public function register_post()
	{
		$username = $this->post('username');
		$email = $this->post('email');
		$password = $this->post('password');

		if (!$this->User_model->create($username, $email, $password))
		{
			return $this->response([
				'status' => false,
				'message' => 'Failed to register'
			], 400);
		}
		else
		{
			$this->session->set_flashdata('registration_success', 'Registration successful');

		}
	}

	public function login_post()
	{
		$email = $this->post('email');
		$password = $this->post('password');

		$response = $this->User_model->login($email, $password);

		if ($response['logged_in'])
		{
			$_SESSION['logged_in'] = true;
			$_SESSION['user'] = $response['user'];
			redirect('home');
		}
		else
		{
			// Login failed, display an error message
			$this->session->set_flashdata('registration_success', 'Login failed');
			redirect('login');
		}
	}

	public function bio_put()
	{
		$user_id = $this->session->userdata('user_id');
		$user_bio = $this->put('user_bio');

		$this->User_model->set_user_id($user_id);
		$this->User_model->set_user_bio($user_bio);

		if($this->User_model->update_bio())
		{
			$this->response(true, 200);
		}
		else
		{
			$this->response(false, 400);
		}
	}

	public function logout_get()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
