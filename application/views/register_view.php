<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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
							<form action="<?php echo base_url(); ?>index.php/auth/register" method="post">
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="email">Email address</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								</div>
								<div class="form-group">
									<label for="confirm_password">Confirm Password</label>
									<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
								</div>
								<button type="submit" class="btn btn-primary">Get started</button>
							</form>
						</div>
					</div>
					<br>
					Already have an account? Log in <a href="<?php echo base_url(); ?>index.php/login">here</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
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

	$('#password').bind('input', function() {
		var to_confirm = $(this);
		var to_equal = $('#confirm_password');

		console.log(to_confirm.val())
		console.log(to_equal.val())

		if(to_confirm.val() !== to_equal.val())
			this.setCustomValidity('Password must be equal');
		else
			this.setCustomValidity('');
	});

	$('#confirm_password').bind('input', function() {
		var to_confirm = $(this);
		var to_equal = $('#password');

		console.log(to_confirm.val())
		console.log(to_equal.val())

		if(to_confirm.val() !== to_equal.val())
			this.setCustomValidity('Password must be equal');
		else
			this.setCustomValidity('');
	});
</script>
