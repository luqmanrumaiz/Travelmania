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

		Configuration::instance([
			'cloud' => [
				'cloud_name' => 'dbgyl99ls',
				'api_key' => '831136837899821',
				'api_secret' => 'nnd-r3ixRaVYtpW4qXcva2JYamI'],
			'url' => [
				'secure' => true]]);
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

		redirect('/');
	}
//
//	function create_post()
//	{
//
//		$postTitle = $this->post('postTitle');
//		$postDesc = $this->post('postDesc');
//		$postLikes = $this->post('postLikes');
//		$postUploadTime = $this->post('postUploadTime');
//		$isLiked = $this->post('isLiked');
//		$userId = $this->post('userId');
//		$destinationId = $this->post('destinationId');
//		$postImage = $this->post('postImage');
//
//		$uploadResult = \Cloudinary\Uploader::upload($postImage, array("folder" => "posts"));
//		$postImage = $uploadResult['secure_url'];
//
//		$this->Post_model->setPostTitle($postTitle);
//		$this->Post_model->setPostDesc($postDesc);
//		$this->Post_model->setPostLikes($postLikes);
//		$this->Post_model->setPostUploadTime($postUploadTime);
//		$this->Post_model->setIsLiked($isLiked);
//		$this->Post_model->setUserId($userId);
//		$this->Post_model->setDestinationId($destinationId);
//		$this->Post_model->setPostImage($postImage);
//
//		$result = $this->Post_model->createPost();
//
//		if ($result) {
//			$this->response([
//				'status' => true,
//				'message' => 'Post created successfully'
//			], RestController::HTTP_OK);
//		} else {
//			$this->response([
//				'status' => false,
//				'message' => 'Post creation failed'
//			], RestController::HTTP_BAD_REQUEST);
//		}
//	}
}
