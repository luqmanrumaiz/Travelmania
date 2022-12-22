<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	private $userId;
	private $username;
	private $email;
	private $password;
	private $userBio;
	private $userAvatarUrl;
	private $destinationId;


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
	}

	public function setUsername($username)
	{
		$this->username = $username;
	}

	public function setUserBio($userBio)
	{
		$this->userBio = $userBio;
	}

	public function setUserAvatarUrl($userAvatarUrl)
	{
		$this->userAvatarUrl = $userAvatarUrl;
	}

	public function setDestinationId($destinationId)
	{
		$this->destinationId = $destinationId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getUsername()
	{
		return $this->username;
	}

	public function getUserBio()
	{
		return $this->userBio;
	}

	public function getUserAvatarUrl()
	{
		return $this->userAvatarUrl;
	}

	public function getDestinationId()
	{
		return $this->destinationId;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}

	public function create($username, $email, $password)
	{
		// creating a hashed password using Bcrypt algorithm by default
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		// Generating a unique user id based on a random number and also using entropy for more randomness
		$userId = uniqid(rand(),true);
		echo($userId);
		if ($this->db->insert('user', array('userId' => $userId, 'username' => $username, 'email' => $email, 'password' => $hashed_password, 'destinationId' => 1))) {
			return True;
		} else {
			return False;
		}
	}

	public function create_($username, $email, $password, $userBio, $userAvatarUrl, $destinationId)
	{
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		if ($this->db->insert('user', array('username' => $username, 'email' => $email, 'password' => $hashed_password, 'userBio' => $userBio, 'userAvatarUrl' => $userAvatarUrl, 'destinationId' => $destinationId))) {
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
