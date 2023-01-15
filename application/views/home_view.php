<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travelmania | 	Home</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/home.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">

	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
</head>
<body>
<div class="container-xl">
	<div class="row">
		<div class="col-8">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col align-self-start">
							<h2>Travelmania</h2>
							<form action="<?php echo base_url(); ?>index.php/auth/logout" method="get">
								<button type="submit" class="btn btn-primary">Logout</button>
							</form>
						</div>
						<div class="col align-self-end">
							<form class="form-inline my-2 my-lg-0 float-right">
								<input class="form-control mr-sm-2 rounded-pill" type="search" name="post-search"
									   id="post-search" placeholder="Search" aria-label="Search">
								<button class="btn btn-outline-success my-2 my-sm-0 rounded-pill" type="submit">Search</button>
							</form>
						</div>
					</div>
					<br>
					<br>
					<div class="row">
						<div class="col align-self-start">
							<h2 class="text-left">Welcome <?php echo $this->session->userdata('user')['username']; ?>! 👋</h2>
							<span>Discover and Explore new places near you!</span>
						</div>
						<div class="col align-self-end">
							<button class="btn btn-lg btn-dark rounded float-right" data-toggle="modal" data-target="#exampleModal">
								Create Post
							</button>

							<div class="modal" id="exampleModal" role="dialog" aria-hidden="true" tabindex="-1">
								<div class="modal-dialog modal-dialog-centered rounded">
									<div class="modal-content bg-black text-white">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
											<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>

										<form action="<?php echo base_url(); ?>index.php/post/create" method="post" enctype="multipart/form-data">
											<div class="modal-body">
												<div class="row">
													<div class="col-6">
														<input type='file' id='post-img-upload' name="post-img-upload">
														<br>
														<br>
														<img id="post-img-placeholder" src="<?php echo base_url(); ?>assets/images/register_background.jpg" alt="Placeholder Image" class="img-fluid">
													</div>
													<div class="col-6">
														<input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
														<br>
														<textarea class="form-control" id="description" name="description" placeholder="Post Description"></textarea>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" value="upload" class="btn btn-primary">Save changes</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

					<br>
					<br>
					<div class="row">
						<div class="col align-self-start">
							<h2>Recently Added</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-4 ">
			<div class="offcanvas offcanvas-end grey-bg show position-fixed" style="overflow: scroll">
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
					<?php foreach ($posts as $post) : ?>
						<div class="card text-white bg-dark mb-3 rounded mt-3" data-id="card-<?php echo $post['postId']; ?>">
							<a href="post/<?php echo $post['postId']; ?>">
								<img src="<?php echo base_url(); ?>uploads/posts/<?php echo $post['postImageFileName']; ?>"
									 class="card-img-top" alt="post-image">
							</a>
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title"><?php echo $post['postTitle'];?></h5>
									</div>
									<div class="col">
										<i class="fa-solid fa-trash float-right p-2" data-id="<?php echo $post['postId']; ?>"></i>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script>
	var uploadInput = document.getElementById("post-img-upload");
	var previewImg = document.getElementById("post-img-placeholder");

	uploadInput.onchange = function() {
		var file = uploadInput.files[0];
		var reader = new FileReader();
		reader.onload = function() {
			previewImg.src = reader.result;
		};
		reader.readAsDataURL(file);
	};

	$(".fa-trash").click(function() {
		var id = $(this).data("id");
		$.ajax({
			url: "<?php echo base_url(); ?>index.php/Post/deletePost",
			method: "POST",
			data: {postId: $(this).attr("data-id")},
			success: function(data){
				$("[data-id='card-" + id + "']").remove();
			}
		});
	});
</script>
</body>
</html>
