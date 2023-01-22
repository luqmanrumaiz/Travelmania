<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Comment extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Comment_model');
		$this->load->helper('url');
	}

	public function comment_post()
	{
		$comment = new Comment_model();

		$comment->set_comment_text($this->post('comment_text'));
		$comment->set_comment_upload_time($this->post('comment_upload_time'));
		$comment->set_user_id($this->post('user_id'));
		$comment->set_post_id($this->post('post_id'));
		$comment->create_comment();
	}
}
