<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Auth extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Auth_model');
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
		$this->console_log($email);

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

	function json_output($statusHeader,$response)
	{
		$ci =& get_instance();
		$ci->output->set_content_type('application/json');
		$ci->output->set_status_header($statusHeader);
		$ci->output->set_output(json_encode($response));
	}

	function console_log($output, $with_script_tags = true)
	{
		$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
			');';
		if ($with_script_tags) {
			$js_code = '<script>' . $js_code . '</script>';
		}
		echo $js_code;
	}
}
