<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Cloudinary\Configuration\Configuration;

class Comment extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Comment_model');
		$this->load->helper('url');
	}

	public function create_comment_post()
	{
		$comment = new Comment_model();
		$comment->setCommentText($this->post('commentText'));
		$comment->setUserId($this->post('userId'));
		$comment->setPostId($this->post('postId'));
		$comment->setCommentUploadtime($this->post('commentUploadTime'));
		$comment->createComment();

		$this->response($comment, RestController::HTTP_CREATED);
	}
}
