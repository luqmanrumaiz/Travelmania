<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travelmania | 	Home</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script>
		let input = document.getElementById("customFile");
		let preview = document.querySelector(".img-preview");
		input.addEventListener("change", function () {
			let file = this.files[0];
			let reader = new FileReader();
			reader.addEventListener("load", function () {
				preview.src = reader.result;
			}, false);
			if (file) {
				reader.readAsDataURL(file);
			}
		});
	</script>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-8">
				<div class="row">
					<div class="col-12">
						<div class="row">
							<div class="col align-self-start">
								<h2 class="text-left">Welcome <?php echo $this->session->userdata('user')['username']; ?>! 👋</h2>
								<span>Discover and Explore new places near you!</span>
							</div>
							<div class="col align-self-end">
								<button class="btn btn-lg btn-dark rounded float-right" data-toggle="modal" data-target="#exampleModal">
									Create Post
								</button>

								<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog-scrollable modal-dialog-centered rounded" role="document">
										<div class="modal-content bg-black text-white">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
												<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-6">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="customFile" accept="image/*">
															<label class="custom-file-label" for="customFile">
															</label>

															<img src="<?php echo base_url(); ?>assets/images/register_background.jpg" class="img-thumbnail" alt="Placeholder image">
														</div>

													</div>
													<div class="col-6">
														<textarea class="form-control rounded-pill border border-white bg-black text-white"></textarea>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="button" class="btn btn-primary">Save changes</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<br>
						<div class="row">
							<h2>Popular Destinations</h2>
						</div>

						<br>
						<div class="row">
							<h2>Recently Added</h2>
						</div>

						<br>
						<div class="row">
							<h2>Places Near Me</h2>
						</div>
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
