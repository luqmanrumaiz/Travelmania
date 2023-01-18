<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="overlay">
		<div class="container">
			<div class="row center-content">
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
				<div class="col-6 mx-auto d-flex justify-content-center">
					<div>
						<div class="card">
							<div class="card-header">
								<h4>Login</h4>
							</div>
							<div class="card-body">
								<form action="<?php echo base_url(); ?>index.php/user/login" method="post">
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
	</div>
</body>
</html>
