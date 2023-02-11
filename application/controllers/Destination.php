<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Destination_model');
		$this->load->helper('url');
	}

	public function all_destinations_get()
	{
		if ( $this->Destination_model->get_all_destinations() ) {
			$destinations = $this->Destination_model->get_all_destinations();
			$this->response($destinations, 200);
		} else {
			$this->response([
				'status' => FALSE,
				'message' => 'No destinations were found'
			], 404);
		}
	}
}
