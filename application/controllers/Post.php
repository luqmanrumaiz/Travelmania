<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
use Cloudinary\Configuration\Configuration;

class Post extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Post_model');
		$this->load->helper('url');
	}

	function create_post()
	{
		// Uploading the post image to an upload folder in the server
		$img_name = $_FILES['post-img-upload']['name'];
		$tmp_img_name = $_FILES['post-img-upload']['tmp_name'];
		$folder = "uploads/posts/";

		move_uploaded_file($tmp_img_name, $folder.$img_name);

		$this->Post_model->setPostTitle($this->post('title'));
		$this->Post_model->setPostDesc($this->post('description'));
		$this->Post_model->setPostImageFileName($img_name);
		$this->Post_model->setPostLikes(0);
		$this->Post_model->setPostUploadTime(date("Y-m-d H:i"));
		$this->Post_model->setIsLiked(false);
		$this->Post_model->setUserId($this->session->userdata('user')['userId']);
		$this->Post_model->setDestinationId(1);

		$this->Post_model->create();
//		'message' => 'Post creation failed'

		redirect('/');
	}

	function like_post()
	{
		$this->Post_model->setPostId($this->post('postId'));
		$this->Post_model->setIsLiked($this->post('isLiked'));
		$this->Post_model->setUserId($this->session->userdata('user')['userId']);

		$this->Post_model->likePost();
	}

	function delete_delete()
	{
		$this->Post_model->setPostId($this->post('postId'));
		$this->Post_model->setUserId($this->session->userdata('user')['userId']);

		$this->Post_model->deletePost();
	}

	function getMyPosts()
	{


//		if ($posts)
//		{
//			$this->response([
//				'status' => true,
//				'data' => $posts
//			], RestController::HTTP_OK);
//		}
//		else
//		{
//			$this->response([
//				'status' => false,
//			], RestController::HTTP_NOT_FOUND);
//		}
	}
}
