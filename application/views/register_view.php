<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
	<form action="<?php echo base_url(); ?>index.php/auth/register" method="post">
		<h3>Sign up</h3>
		<p>New places await, log in to view them</p>

		<label for="email">Email address</label>
		<input type="text" id="email" name="email"/>

		<label for="username">Username</label>
		<input type="text" id="username" name="username"/>

		<label for="password">Password</label>
		<input type="password" id="password" name="password"/>

		<label for="confirm_password">Confirm</label>
		<input type="password" id="confirm_password" name="confirm_password"/>

		<button>Log In</button>
	</form>
</body>
</html>
