<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Comment_model extends CI_Model
{
	private $comment_id;
	private $comment_text;
	private $comment_upload_time;
	private $user_id;
	private $post_id;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function set_comment_id($comment_id)
	{
		$this->comment_id = $comment_id;
	}

	public function set_comment_text($comment_text)
	{
		$this->comment_text = $comment_text;
	}

	public function set_comment_upload_time($comment_upload_time)
	{
		$this->comment_upload_time = $comment_upload_time;
	}

	public function set_user_id($user_id)
	{
		$this->user_id = $user_id;
	}

	public function set_post_id($post_id)
	{
		$this->post_id = $post_id;
	}

	public function get_comment_id()
	{
		return $this->comment_id;
	}

	public function get_comment_text()
	{
		return $this->comment_text;
	}

	public function get_comment_upload_time()
	{
		return $this->comment_upload_time;
	}

	public function get_user_id()
	{
		return $this->user_id;
	}

	public function get_post_id()
	{
		return $this->post_id;
	}

	public function create_comment()
	{
		try
		{
			if ($this->db->insert('comment', array(
				'comment_text' => $this->comment_text,
				'comment_upload_time' => $this->comment_upload_time,
				'user_id' => $this->user_id,
				'post_id' => $this->post_id
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

	public function get_comments($post_id){
		try
		{
			$this->db->select('comment_id, comment_text, comment_upload_time, user_id, post_id');
			$this->db->from('comment');
			$this->db->where('post_id', $post_id);
			$query = $this->db->get();

			return $query->result();
		}
		catch (Exception $e)
		{
			return False;
		}
	}

	public function delete_all_comments($post_id)
	{
		try
		{
			$this->db->where('post_id', $post_id);
			$this->db->delete('comment');

			return True;
		}
		catch (Exception $e)
		{
			return False;
		}
	}
}
