<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyModel extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->database();
	}

	var $client_service = "frontend-client";
	var $auth_key       = "simplerestapi";

	public function get_movies($year)
	{
		return $this->db->select('title,director,genre,' . $year)->from('films')->order_by('title','director')->get()->result();
	}
}
