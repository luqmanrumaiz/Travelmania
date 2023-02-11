<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {
	private $post_id;
	private $post_title;
	private $post_desc;
	private $post_image_filename;
	private $post_likes;
	private $like_user_ids;
	private $post_upload_time;
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

	public function set_post_image_filename($post_image_filename)
	{
		$this->post_image_filename = $post_image_filename;
	}

	public function set_post_likes($post_likes)
	{
		$this->post_likes = $post_likes;
	}

	public function set_like_user_ids($like_user_ids)
	{
		$this->like_user_ids = $like_user_ids;
	}

	public function set_post_upload_time($post_upload_time)
	{
		$this->post_upload_time = $post_upload_time;
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

	public function get_post_image_filename()
	{
		return $this->post_image_filename;
	}

	public function get_post_likes()
	{
		return $this->post_likes;
	}

	public function get_like_user_ids()
	{
		return $this->like_user_ids;
	}

	public function get_post_upload_time()
	{
		return $this->post_upload_time;
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
				'post_title' => $this->get_post_title(),
				'post_desc' => $this->get_post_desc(),
				'post_image_filename' => $this->get_post_image_filename(),
				'post_likes' => 0,
				'like_user_ids' => json_encode([]),
				'post_upload_time' => $this->get_post_upload_time(),
				'user_id' => $this->get_user_id(),
				'destination_id' => $this->get_destination_id()
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

	public function get_all_posts()
	{
		try
		{
			$this->db->select('*');
			$this->db->from('post');
			$this->db->order_by('post_upload_time');
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

	public function get_popular_posts()
	{
		try
		{
			$this->db->select('*');
			$this->db->from('post');
			$this->db->order_by('post_likes', 'DESC');

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

	public function get_my_posts($user_id)
	{
		try
		{
			$this->db->select('*');
			$this->db->from('post');
			$this->db->where('user_id', $user_id);
			$this->db->order_by('post_upload_time');
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
			$this->db->where('post_id', $post_id);
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

	public function like_post($is_liked)
	{
		try
		{
			if (! $is_liked)
			{
				$this->db->set('post_likes', 'post_likes+1', FALSE);
				// add user_id to like_user_ids
				$like_user_ids = $this->get_like_user_ids();
				array_push($like_user_ids, $this->user_id);

				$this->db->set('like_user_ids', json_encode($like_user_ids));
			}
			else
			{
				$this->db->set('post_likes', 'post_likes-1', FALSE);
				// remove user_id from like_user_ids
				$like_user_ids = $this->get_like_user_ids();
				$like_user_ids = array_diff($like_user_ids, array($this->user_id));

				$this->db->set('like_user_ids', json_encode($like_user_ids));
			}
			$this->db->where('post_id', $this->get_post_id());
			if ($this->db->update('post'))
			{
				if (! $is_liked)
				{
					$this->set_post_likes($this->get_post_likes() + 1);
					$like_user_ids = $this->get_like_user_ids();
					$this->set_like_user_ids(array_push($like_user_ids, $this->user_id));
				}
				else
				{
					$this->set_post_likes($this->get_post_likes() - 1);
				}

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

	public function delete_post($post_id)
	{
		try
		{
			$this->db->where('post_id', $post_id);
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
