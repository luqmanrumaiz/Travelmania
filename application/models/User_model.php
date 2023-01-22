<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	private $user_id;
	private $username;
	private $email;
	private $password;
	private $user_bio;
	private $destination_id;


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function set_user_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function set_username($username)
	{
		$this->username = $username;
	}

	public function set_email($email)
	{
		$this->email = $email;
	}

	public function set_password($password)
	{
		$this->password = $password;
	}

	public function set_user_bio($user_bio)
	{
		$this->user_bio = $user_bio;
	}

	public function set_destination_id($destination_id)
	{
		$this->destination_id = $destination_id;
	}

	public function get_user_id()
	{
		return $this->user_id;
	}

	public function get_username()
	{
		return $this->username;
	}

	public function get_email()
	{
		return $this->email;
	}

	public function get_password()
	{
		return $this->password;
	}

	public function get_user_bio()
	{
		return $this->user_bio;
	}

	public function get_destination_id()
	{
		return $this->destination_id;
	}

	public function create($username, $email, $password)
	{
		// creating a hashed password using Bcrypt algorithm by default
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		// Generating a unique user id based on a random number and also using entropy for more randomness
		$user_id = uniqid(uniqid(rand(), true));

		try
		{
			if ($this->db->insert('user', array('user_id' => $user_id, 'username' => $username, 'email' => $email,
				'password' => $hashed_password, 'user_bio' => 'This is your bio, edit it with the buttons below',
				'destination_id' => 1)))
			{
				return $user_id;
			}
			else
			{
				return false;
			}
		}
		catch (Exception $e)
		{
			if ($e->getCode() == 1062)
			{
				echo 'Username or email already exists';
				return False;
			}
		}
	}

	function login($email, $password)
	{
		$res = $this->db->get_where('user', array('email' => $email));
		if ($res->num_rows() < 0)
		{
			return array('logged_in' => false);
		}
		else
		{
			$row = $res->row();

			if (password_verify($password, $row->password))
			{
				$this->session->set_userdata('user_id', $row->user_id);
				$this->session->set_userdata('username', $row->username);
				$this->session->set_userdata('email', $row->email);
				$this->session->set_userdata('user_bio', $row->user_bio);
				$this->session->set_userdata('destination_id', $row->destination_id);

				return array('logged_in' => true);
			}
			else
			{
				return array('logged_in' => false);
			}
		}
	}

	function get_user($user_id)
	{
		$res = $this->db->get_where('user', array('user_id' => $user_id));
		if ($res->num_rows() < 0)
		{
			return array('user_found' => false);
		}
		else
		{
			$row = $res->row();

			$this->set_user_id($row->user_id);
			$this->set_username($row->username);
			$this->set_email($row->email);
			$this->set_user_bio($row->user_bio);

			return array('user_id' => $this->get_user_id(),
				'username' => $this->get_username(), 'email' => $this->get_email(),
				'user_bio' => $this->get_user_bio(), 'destination_id' => $this->get_destination_id());
		}
	}

	function update_bio()
	{
		$this->db->where('user_id', $this->session->userdata('user_id'));
		if ($this->db->update('user', array('user_bio' => $this->get_user_bio())))
		{
			$this->session->set_userdata('user_bio', $this->get_user_bio());
			return true;
		}
		else
		{
			return false;
		}
	}

	function is_logged_in()
	{
		if (isset($this->session->is_logged_in) && $this->session->is_logged_in == True) {
			return True;
		} else {
			return False;
		}
	}
}
