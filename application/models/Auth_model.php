<?php


class Auth_model extends CI_Model
{
	private $email;
	private $password;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function signup($email, $password)
	{
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		if ($this->db->insert('user', array('username' => $email, 'password' => $hashed_password))) {
			return True;
		} else {
			return False;
		}
	}

	function authenticate($email, $password)
	{
		$res = $this->db->get_where('user', array('email' => $email));
		if ($res->num_rows() != 1) {
			return false;
		} else {
			$row = $res->row();
			if (password_verify($password, $row->password)) {
				return true;
			} else {
				return false;
			}
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
