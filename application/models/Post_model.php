<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
	private $postId;
	private $postTitle;
	private $postDesc;
	private $postImageFileName;
	private $postLikes;
	private $postUploadTime;
	private $isLiked;
	private $userId;
	private $destinationId;


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function setPostId($postId)
	{
		$this->postId = $postId;
	}

	public function setPostTitle($postTitle)
	{
		$this->postTitle = $postTitle;
	}

	public function setPostDesc($postDesc)
	{
		$this->postDesc = $postDesc;
	}

	public function setPostImageFileName($postImageFileName)
	{
		$this->postImageFileName = $postImageFileName;
	}

	public function setPostLikes($postLikes)
	{
		$this->postLikes = $postLikes;
	}

	public function setPostUploadTime($postUploadTime)
	{
		$this->postUploadTime = $postUploadTime;
	}

	public function setIsLiked($isLiked)
	{
		$this->isLiked = $isLiked;
	}

	public function setUserId($userId)
	{
		$this->userId = $userId;
	}

	public function setDestinationId($destinationId)
	{
		$this->destinationId = $destinationId;
	}

	public function getPostId()
	{
		return $this->postId;
	}

	public function getPostTitle()
	{
		return $this->postTitle;
	}

	public function getPostDesc()
	{
		return $this->postDesc;
	}

	public function getPostImageFileName()
	{
		return $this->postImageFileName;
	}

	public function getPostLikes()
	{
		return $this->postLikes;
	}

	public function getPostUploadTime()
	{
		return $this->postUploadTime;
	}

	public function getIsLiked()
	{
		return $this->isLiked;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getDestinationId()
	{
		return $this->destinationId;
	}

	public function create()
	{
		try
		{
			if ($this->db->insert('post', array(
				'postTitle' => $this->getPostTitle(),
				'postDesc' => $this->getPostDesc(),
				'postImageFileName' => $this->getPostImageFileName(),
				'postLikes' => $this->getPostLikes(),
				'postUploadTime' => $this->getPostUploadTime(),
				'isLiked' => $this->getIsLiked(),
				'userId' => $this->getUserId(),
				'destinationId' => $this->getDestinationId()
			)))
			{
				return True;
			}
			else
			{
				return False;
			}
		}
		catch (Exception $e)
		{
			return False;
		}
	}

	// this function gets all posts for this user id using helper not query
	public function getMyPosts()
	{
		try
		{
			$this->db->select('*');
			$this->db->from('post');
			$this->db->where('userId', $this->getUserId());
			$this->db->order_by('postUploadTime', 'DESC');
			if ($query = $this->db->get())
			{
				return $query->result();
			}
			else
			{
				return False;
			}
		}
		catch (Exception $e)
		{
			return False;
		}
	}

	public function getPosts()
	{
		$query = $this->db->get('post');

		return $query->result_array();
	}
}
