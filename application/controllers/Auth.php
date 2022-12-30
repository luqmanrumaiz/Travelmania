<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Auth_model');
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function register()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST')
		{
			$this->json_output(400,array('status' => 400,'message' => 'Bad request.'));
		}
		else
		{
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$password = $this->input->post('password');

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
	}

	public function login()
	{
		$this->load->library('session');
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST')
		{
			$this->json_output(400,array('status' => 400,'message' => 'Bad wrequest.'));
		}
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');


			$response = $this->User_model->login($email, $password);
			$this->console_log($email);

			if ($response['logged_in'])
			{
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
