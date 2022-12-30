<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<!-- The container element for the page -->
<div class="container">
	<!-- A row to hold the welcome message and login form -->
	<div class="row center-content">
		<!-- The welcome message column -->
		<div class="col-6 mx-auto">
			<b>Travelmania</b>
			<br>
			<br>
			<h1 class="display-4">Discover dream places with many other travel maniacs!</h1>
			<br>
			<br>
			<?php if ($this->session->flashdata('registration_success')): ?>

				<div class="alert alert-danger" role="alert">
					<i class="fas fa-exclamation-triangle"></i>
					<?php echo $this->session->flashdata('registration_success'); ?>
				</div>
			<?php endif; ?>
		</div>
		<!-- The login form column -->
		<div class="col-6 mx-auto d-flex justify-content-center">
			<div>
				<!-- The login form card -->
				<div class="card">
					<div class="card-header">
						<h4>Login</h4>
					</div>
					<div class="card-body">
						<!-- The login form -->
						<form action="<?php echo base_url(); ?>index.php/auth/login" method="post">
							<div class="form-group">
								<label for="email">Email address</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							</div>
							<button type="submit" class="btn btn-primary">Login</button>
						</form>
					</div>
				</div>
				<br>
				Don't have an account? <a href=<?php echo base_url(); ?>>Sign Up</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
