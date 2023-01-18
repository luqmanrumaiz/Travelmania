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
			// redirect to register again with an error message
			$status = 'An error occurred while registering';
		}
		else
		{
			$status = 'Registration successful!';
		}

		$this->session->set_flashdata('registration_success', $status);
		redirect('/');
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

	public function logout_get()
	{
		$this->session->sess_destroy();
		redirect('/');
	}

	public function bio_put()
	{
		$bio = $this->put('bio');
		$this->User_model->update_bio($bio);
		redirect('home');
	}
}
