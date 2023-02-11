<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Post extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Post_model');
		$this->load->model('Comment_model');
		$this->load->helper('url');
	}

	function create_post()
	{
		// Uploading the post image to an upload folder in the server
		$img_name = $_FILES['post-img-upload']['name'];
		$tmp_img_name = $_FILES['post-img-upload']['tmp_name'];
		$folder = "uploads/posts/";

		move_uploaded_file($tmp_img_name, $folder.$img_name);

		$this->Post_model->set_post_title($this->post('title'));
		$this->Post_model->set_post_desc($this->post('description'));
		$this->Post_model->set_post_image_filename($img_name);
		$this->Post_model->set_post_upload_time(date('Y-m-d H:i'));
		$this->Post_model->set_user_id($this->session->userdata('user_id'));
		$this->Post_model->set_destination_id($this->post('destination'));

		$this->Post_model->create();

		redirect('/');
	}

	function like_put()
	{
		$this->Post_model->set_post_id($this->put('post_id'));
		$this->Post_model->set_user_id($this->put('user_id'));
		$this->Post_model->set_post_likes($this->put('post_likes'));
		$this->Post_model->set_like_user_ids($this->put('like_user_ids'));

		if ($this->Post_model->like_post($this->put('is_liked')))

			$this->response([
				'status' => true,
				'message' => 'Post liked successfully',
				'likes' => $this->Post_model->get_post_likes()
			], RestController::HTTP_OK);

		else

			$this->response([
				'status' => false,
				'message' => 'Post could not be liked'
			], RestController::HTTP_BAD_REQUEST);
	}

	function delete_delete()
	{
		$post_id = $this->uri->segment(3);

		if ($this->Comment_model->delete_all_comments($post_id) && $this->Post_model->delete_post($post_id))

			$this->response([
				'status' => true,
				'message' => 'Post deleted successfully'
			], RestController::HTTP_OK);

		else

			$this->response([
				'status' => false,
				'message' => 'Post could not be deleted'
			], RestController::HTTP_BAD_REQUEST);
	}
}
