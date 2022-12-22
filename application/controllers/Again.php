<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Again extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('MyModel');
	}

	function json_output($statusHeader,$response)
	{
		$ci =& get_instance();
		$ci->output->set_content_type('application/json');
		$ci->output->set_status_header($statusHeader);
		$ci->output->set_output(json_encode($response));
	}

	public function get_stuff()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			$this->json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
			$year = $this->input->post('email');
			$password = $this->input->post('password');

			$resp = $this->MyModel->get_movies($year);
			$this->json_output(200,$resp);
		}
	}


	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_get($id = 0)
	{
		if(!empty($id)){
			$data = $this->db->get_where("items", ['id' => $id])->row_array();
		}else{
			$data = $this->db->get("items")->result();
		}

		$this->response($data, REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_post()
	{
		$input = $this->input->post();
		$this->db->insert('items',$input);

		$this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
	}

	public function sign_up()
	{


		$input = $this->input->post();
		$this->db->insert('items',$input);

		$this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_put($id)
	{
		$input = $this->put();
		$this->db->update('items', $input, array('id'=>$id));

		$this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
	}

	/**
	 * Get All Data from this method.
	 *
	 * @return Response
	 */
	public function index_delete($id)
	{
		$this->db->delete('items', array('id'=>$id));

		$this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
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
