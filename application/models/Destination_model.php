<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Destination_model extends CI_Model
{
	private $destination_id;
	private $destination_country;
	private $destination_city;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function set_destination_id($destination_id)
	{
		$this->destination_id = $destination_id;
	}

	public function set_destination_country($destination_country)
	{
		$this->destination_country = $destination_country;
	}

	public function set_destination_city($destination_city)
	{
		$this->destination_city = $destination_city;
	}

	public function get_destination_id()
	{
		return $this->destination_id;
	}

	public function get_destination_country()
	{
		return $this->destination_country;
	}

	public function get_destination_city()
	{
		return $this->destination_city;
	}

	public function get_destination($destination_id)
	{
		$query = $this->db->get_where('destination', array('destination_id' => $destination_id));
		return $query->row();
	}

	public function get_all_destinations()
	{
		$query = $this->db->get('destination');
		return $query->result();
	}
}
