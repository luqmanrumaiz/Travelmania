<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css">

</head>
<body>
	<form>
		<h3>Sign up</h3>
		<p>New places await, log in to view them</p>

		<label for="email">Email address</label>
		<input type="text" id="email"/>

		<label for="password">Password</label>
		<input type="password" id="password"/>

		<label for="confirm_password">Confirm</label>
		<input type="password" id="confirm_password"/>

		<button>Log In</button>
	</form>
</body>
</html>
