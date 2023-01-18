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
		$this->Post_model->set_post_likes(0);
		$this->Post_model->set_post_upload_time(date('Y-m-d H:i'));
		$this->Post_model->set_is_liked(false);
		$this->Post_model->set_user_id($this->session->userdata('user')['user_id']);
		$this->Post_model->set_destination_id($this->session->userdata('user')['destination_id']);

		$this->Post_model->create();

		redirect('/');
	}

	function like_post()
	{
		$this->Post_model->set_post_id($this->post('post_id'));
		$this->Post_model->set_user_id($this->post('user_id'));

		$this->Post_model->like();
	}

	function delete_delete()
	{
		$this->Post_model->set_post_id($this->delete('post_id'));
		$this->Post_model->set_user_id($this->session->userdata('user')['user_id']);

		$this->Post_model->delete();
	}
}
