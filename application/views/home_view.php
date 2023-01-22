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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
					<div class="row mt-4" >
						<h2>TRAVELMANIA</h2>
						<div class="col align-self-center"">
							<form class="form-inline my-2 my-lg-0 float-right">
								<input class="form-control mr-sm-2 rounded-pill" type="search" name="post-search"
									   id="post-search" placeholder="Search" aria-label="Search">
								<button class="btn btn-outline-dark my-2 my-sm-0 rounded-pill" type="submit">Search</button>
							</form>
						</div>
					</div>
					<br>
					<br>
					<div class="row">
						<div class="col align-self-start">
							<h4 class="text-left">Welcome <?php echo $this->session->userdata('username'); ?>  👋</h4>
							<span>Discover and Explore new places near you!</span>
						</div>
						<div class="col align-self-end">
							<button class="btn btn-lg btn-dark rounded float-right" data-toggle="modal" data-target="#create-post-modal">
								Create Post
							</button>

							<div class="modal" id="create-post-modal">
								<div class="modal-dialog modal-dialog-centered rounded">
									<div class="modal-content bg-black text-white">
										<div class="modal-header">
											<h5 class="modal-title">Create Post</h5>
										</div>

										<form action="<?php echo base_url(); ?>index.php/post/create" method="post" enctype="multipart/form-data">
											<div class="modal-body">
												<div class="row">
													<div class="col-6">
														<input type='file' id='post-img-upload' name="post-img-upload">
														<br>
														<br>
														<img id="post-img-placeholder" src="<?php echo base_url(); ?>assets/images/placeholder_image.jpg" alt="Placeholder Image" class="img-fluid">
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
		<div class="col-4 mt-4 mb-4">
			<div class="offcanvas offcanvas-end grey-bg show position-fixed" style="overflow: scroll;  overflow-wrap: break-word;">
				<div class="offcanvas-header">
					<div class="avatar mx-auto position-relative" style="width: 128px; height: 128px;">
						<img src="https://ui-avatars.com/api/?background=343a40&color=fff&name=<?php echo substr($this->session->userdata('username'), 0, 1) ;?>" alt="Avatar"
							 class="rounded-circle" style="width: 128px; height: 128px;">
					</div>
					<br>
					<h5 class="offcanvas-title" id="offcanvasScrollingLabel">
						<?php echo $this->session->userdata('username'); ?>
					</h5>
				</div>
				<div class="offcanvas-body">
					<p id="bio-text"><?php echo $this->session->userdata('user_bio'); ?></p>
					<button type="button" id="edit-bio" class="btn btn-primary btn-edit btn-sm" style="bottom: 0; right: 0; ">
						<i class="fas fa-edit"></i>
					</button>
					<button type="button" id="save-bio" class="btn btn-primary btn-save btn-sm">Save</button>
					<div class="sucess-bio-update"></div>
				</div>
				<br>
				<form action="<?php echo base_url(); ?>index.php/user/logout" method="get">
					<button type="submit" class="btn btn-warning">Logout</button>
				</form>
				<hr>
				<div>
					<h5>Recent Posts</h5>
					<?php foreach ($posts as $post) : ?>
						<div class="card text-white bg-dark mb-3 rounded mt-3" data-id="card-<?php echo $post['post_id']; ?>">
							<a href="post/<?php echo $post['post_id']; ?>">
								<img src="<?php echo base_url(); ?>uploads/posts/<?php echo $post['post_image_filename']; ?>"
									 class="card-img-top" alt="post-image">
							</a>
							<div class="card-body">
								<div class="row">
									<div class="col">
										<h5 class="card-title"><?php echo $post['post_title'];?></h5>
									</div>
									<div class="col">
										<i class="fa-solid fa-trash float-right p-2" data-id="<?php echo $post['post_id']; ?>"></i>
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
	/* Update placeholder image for create post modal by replacing the src attribute
	 * with the image file name from the input field
	 */
	var uploadInput = document.getElementById("post-img-upload");
	console.log(uploadInput);
	var previewImg = document.getElementById("post-img-placeholder");

	uploadInput.onchange = function() {
		var file = uploadInput.files[0];
		var reader = new FileReader();
		reader.onload = function() {
			previewImg.src = reader.result;
		};
		reader.readAsDataURL(file);
	};

	$(document).ready(function() {
		$("#edit-bio").on("click", function() {
			var bioText = $("#bio-text").text();
			$("#bio-text").html("<input type='text' id='bio-input' value='" + bioText + "'>");
		});
	});

	$("#save-bio").on("click", function() {
		var newBioText = $("#bio-input").val();
		$("#bio-text").html(newBioText);

		$.ajax({
			url: '<?php echo base_url(); ?>index.php/User/bio',
			method: 'PUT',
			contentType: 'application/json',
			data: JSON.stringify({
				user_bio: newBioText
			}),
			success: function(data) {
				if (data) {
					$(".sucess-bio-update").html("<br><div class='alert alert-success' role='alert'>Bio updated successfully!</div>");
				} else {
					$(".sucess-bio-update").html("<br><div class='alert alert-danger' role='alert'>Bio update failed!</div>");
				}
			}
		});
	});

	$(document).ready(function() {
		$(".fa-trash").on("click", function() {
			var post_id = $(this).data("id");
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/Post/delete/" + post_id,
				type: "DELETE",
				success: function(data) {
					console.log(data);
					Swal.fire('Sucessfully deleted Post !')

					$("[data-id='card-" + post_id + "']").remove();
				}
			});
		});
	});
</script>
</body>
</html>
