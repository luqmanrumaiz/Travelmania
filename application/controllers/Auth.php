<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('register_view');
	}
    public function __construct()
    {
        parent::__construct();
		# $this->load->model('users');
    }

	public function users_get()
	{
		// Users from a data store e.g. database
		$users = [
			['id' => 0, 'name' => 'John', 'email' => 'john@example.com'],
			['id' => 1, 'name' => 'Jim', 'email' => 'jim@example.com'],
		];

		$id = $this->get( 'id' );

		if ( $id === null )
		{
			// Check if the users data store contains users
			if ( $users )
			{
				// Set the response and exit
				$this->response( $users, 200 );
			}
			else
			{
				// Set the response and exit
				$this->response( [
					'status' => false,
					'message' => 'No users were found'
				], 404 );
			}
		}
		else
		{
			if ( array_key_exists( $id, $users ) )
			{
				$this->response( $users[$id], 200 );
			}
			else
			{
				$this->response( [
					'status' => false,
					'message' => 'No such user found'
				], 404 );
			}
		}
	}

    public function register()
    {
        $this->load->view('register');
    }

    public function confirmregister()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if (!$this->users->create($username,$password)) {
            // redirect to register again with an error message
        }
        else {
            $this->load->view('confirmregister');
        }
    }

    public function login()
    {
        if (isset($this->session->login_error) && $this->session->login_error == True) {
            // $this->session->login_error = False;
            $this->session->unset_userdata('login_error');
            $this->load->view('login',
                              array('login_error_msg' => "Username/password incorrect.  Please re-try"));
        }
        else {
            $this->load->view('login');
        }
    }

    public function authenticate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->users->authenticate($username,$password)) {
            $this->session->is_logged_in = true;
            $this->session->username = $username;
            redirect('/home/');
        }
        else {
            $this->session->login_error = True;
            redirect('/auth/login');
        }
    }

    public function logout()
    {
        $this->session->is_logged_in = False;
        redirect('/home/');
    }


}
