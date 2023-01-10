<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
	}

	public function users_get()
	{
			// Set the response and exit
			$this->response( [
				'status' => true,
				'message' => 'No users were found'
			], 200 );


	}
}
