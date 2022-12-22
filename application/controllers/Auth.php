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
				$this->json_output(400, array('status' => 400,'message' => 'Bad request.'));
			}
			else
			{
				$this->json_output(200, 'Successfully registered');
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
}
