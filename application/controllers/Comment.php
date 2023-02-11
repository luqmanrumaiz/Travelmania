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

		if ($comment->create_comment())
		{
			$this->response([
				'status' => true,
				'message' => 'Comment created successfully'
			], RestController::HTTP_OK);
		}
		else
		{
			$this->response([
				'status' => false,
				'message' => 'Comment creation failed'
			], RestController::HTTP_BAD_REQUEST);
		}
	}

	public function comment_get($post_id)
	{
		$comment = new Comment_model();
		$comment->set_comment_id($this->get('comment_id'));

		// Getting the post id from the url
		$post_id = $this->uri->segment(3);

		if ($this->Comment_model->get_comments($post_id))
		{
			$this->response([
				'status' => true,
				'message' => 'Comment retrieved successfully',
				'comment' => json_encode($this->Comment_model->get_comments($post_id))
			], RestController::HTTP_OK);
		}
		else
		{
			$this->response([
				'status' => false,
				'message' => 'Comment retrieval failed' . $post_id
			], RestController::HTTP_BAD_REQUEST);
		}
	}
}
