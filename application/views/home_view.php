<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travelmania | 	Home</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-8">
				<div class="row align-items-center justify-content-center">
					<div class="col-6">
						<h1 class="text-left">Travelmania</h1>
					</div>
					<div class="col-6 text-right">
						<form action="<?php echo base_url(); ?>index.php/auth/logout">
							<button class="btn btn-secondary mx-auto">Logout</button>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<br>
						<h2 class="text-left">Welcome <?php echo $this->session->userdata('user')['username']; ?>! 👋</h2>
						<span>Discover and Explore new places near you!</span>
						<button class="btn btn-lg btn-dark rounded float-right">Create Post</button>
					</div>
				</div>
			</div>
			<div class="col-4 bg-danger rounded h-100">
				<div class="offcanvas offcanvas-end grey-bg show position-fixed" data-bs-scroll="true" data-bs-backdrop="static" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
					<div class="offcanvas-header">
						<div class="avatar mx-auto position-relative" style="width: 128px; height: 128px;">
							<img src="https://api.dicebear.com/5.x/fun-emoji/svg" alt="Avatar" class="rounded-circle">
							<button type="button" class="btn btn-primary btn-edit btn-sm position-absolute" style="bottom: 0; right: 0; ">
								<i class="fas fa-edit"></i>
							</button>
						</div>
						<br>
						<h5 class="offcanvas-title" id="offcanvasScrollingLabel">
							<?php echo $this->session->userdata('user')['username']; ?>
						</h5>
					</div>
					<div class="offcanvas-body">
						<div class="d-flex"">
							<p>Try scrolling the rest of the page to see the option in action.</p>
							<?php echo $this->session->userdata('user')['userBio']; ?>
						</div>
						<hr>
						<div>
							<h5>Recent Posts</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
