<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travelmania | Register</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="overlay">
		<!-- The container element for the page -->
		<div class="container">
			<!-- A row to hold the welcome message and login form -->
			<div class="row center-content">
				<!-- The welcome message column -->
				<div class="col-6 mx-auto vertical-center">
					<div>
						<b>Travelmania</b>
						<br>
						<br>
						<h1 class="display-4">Discover dream places with many other travel maniacs!</h1>
						<br>
						<br>
						<?php if ($this->session->flashdata('registration_success')): ?>
							<div class="alert alert-success" role="alert">
								<i class="fas fa-check"></i>
								&nbsp;
								<?php echo $this->session->flashdata('registration_success'); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<!-- The login form column -->
				<div class="col-6 mx-auto d-flex justify-content-center">
					<div>
						<!-- The login form card -->
						<div class="card">
							<div class="card-header">
								<h4>Register</h4>
							</div>
							<div class="card-body">
								<!-- The register form -->
								<form action="<?php echo base_url(); ?>index.php/user/register" method="post">
									<div class="form-group">
										<label for="username">Username</label>
										<input type="text" class="form-control" id="username" name="username" required="required" placeholder="Username">
									</div>
									<div class="form-group">
										<label for="email">Email address</label>
										<input type="email" class="form-control" id="email" name="email" required="required" placeholder="Enter email">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input type="password" class="form-control" id="password" name="password" required="required" placeholder="Password">
									</div>
									<div class="form-group">
										<label for="confirm_password">Confirm Password</label>
										<input type="password" class="form-control" id="confirm_password" name="confirm_password" required="requried" placeholder="Confirm Password">
									</div>
									<button type="submit" class="btn btn-primary" id="register-btn">Get started</button>
								</form>
							</div>
						</div>
						<br>
						Already have an account? Log in <a href="<?php echo base_url(); ?>index.php/login">here</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	// Validation for Username
	$('#username').bind('input', function() {
		var username = $(this);

		// Username must be 8-20 characters and you must not start or end with _ or .
		var usernameRegex = /^[a-zA-Z0-9._-]{8,20}$/;

		if (! usernameRegex.test(username.val())) {
			this.setCustomValidity('Username must be 8-20 characters and you must not start or end with _ or . ');
		}
		else
		{
			this.setCustomValidity('');
		}
	});

	// Validation for Password
	$('#password').bind('input', function() {
		var to_confirm = $(this);
		var to_equal = $('#confirm_password');

		console.log(to_confirm.val())
		console.log(to_equal.val())

		if(to_confirm.val() === to_equal.val())
		{
			this.setCustomValidity('');
			to_equal.get(0).setCustomValidity('');
		}
		else
		{
			this.setCustomValidity('Password must be equal');
		}
	});

	// Validation for Confirm Password
	$('#confirm_password').bind('input', function() {
		var to_confirm = $(this);
		var to_equal = $('#password');

		console.log(to_confirm.val())
		console.log(to_equal.val())

		if(to_confirm.val() === to_equal.val())
		{
			this.setCustomValidity('');
			to_equal.get(0).setCustomValidity('');
		}
		else
		{
			this.setCustomValidity('Password must be equal');
		}
	});
</script>
