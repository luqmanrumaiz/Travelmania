<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
	private $post_id;
	private $post_title;
	private $post_desc;
	private $post_image_file_name;
	private $post_likes;
	private $post_upload_time;
	private $is_liked;
	private $user_id;
	private $destination_id;


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function set_post_id($post_id)
	{
		$this->post_id = $post_id;
	}

	public function set_post_title($post_title)
	{
		$this->post_title = $post_title;
	}

	public function set_post_desc($post_desc)
	{
		$this->post_desc = $post_desc;
	}

	public function set_post_image_file_name($post_image_file_name)
	{
		$this->post_image_file_name = $post_image_file_name;
	}

	public function set_post_likes($post_likes)
	{
		$this->post_likes = $post_likes;
	}

	public function set_post_upload_time($post_upload_time)
	{
		$this->post_upload_time = $post_upload_time;
	}

	public function set_is_liked($is_liked)
	{
		$this->is_liked = $is_liked;
	}

	public function set_user_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function set_destination_id($destination_id)
	{
		$this->destination_id = $destination_id;
	}

	public function get_post_id()
	{
		return $this->post_id;
	}

	public function get_post_title()
	{
		return $this->post_title;
	}

	public function get_post_desc()
	{
		return $this->post_desc;
	}

	public function get_post_image_file_name()
	{
		return $this->post_image_file_name;
	}

	public function get_post_likes()
	{
		return $this->post_likes;
	}

	public function get_post_upload_time()
	{
		return $this->post_upload_time;
	}

	public function get_is_liked()
	{
		return $this->is_liked;
	}

	public function get_user_id()
	{
		return $this->user_id;
	}

	public function get_destination_id()
	{
		return $this->destination_id;
	}

	public function create()
	{
		try
		{
			if ($this->db->insert('post', array(
				'postTitle' => $this->post_title,
				'postDesc' => $this->post_desc,
				'postImageFileName' => $this->post_image_file_name,
				'postLikes' => $this->post_likes,
				'postUploadTime' => $this->post_upload_time,
				'isLiked' => $this->is_liked,
				'userId' => $this->user_id

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
	public function get_my_posts()
	{
		try
		{
			$this->db->select('*');
			$this->db->from('post');
			$this->db->where('userId', $this->get_user_id());
			$this->db->order_by('postUploadTime');
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

	public function get_my_post($post_id)
	{
		try
		{
			$this->db->select('*');
			$this->db->from('post');
			$this->db->where('postId', $post_id);
			if ($query = $this->db->get())
			{
				return $query->row();
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

	public function like_post()
	{
		try
		{
			if ($this->is_liked == 0)
			{
				$this->db->set('postLikes', 'postLikes+1', FALSE);
				$this->db->set('isLiked', 1);
			}
			else
			{
				$this->db->set('postLikes', 'postLikes-1', FALSE);
				$this->db->set('isLiked', 0);
			}
			$this->db->where('postId', $this->get_post_id());
			if ($this->db->update('post'))
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

	public function delete_post()
	{
		try
		{
			$this->db->where('postId', $this->get_post_id());
			if ($this->db->delete('post'))
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
}
