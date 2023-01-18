<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travelmania | 	Home</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/post.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/ab1cd643ab.js" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.6.3.min.js"</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">

</head>
<body>
	<div class="container-xl p-5">
		<div class="row">
			<div class="col align-self-start">
				<a href="javascript:history.back()" class="no-color-change">< Back</a>
			</div>
			<div class="col align-self-end">
				<h2 class="float-right">TRAVELMANIA</h2>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<h2 class="text-left">Viewing Post</h2>
				<span>Pakistan, Islamabad</span>
			</div>
		</div>

		<br>
		<div class="row">
			<div class="card bg-light">
				<div class="row no-gutters">
					<div class="col-6">
						<div class="card-body">
							<div class="col">
								<div class="row"  style="display: flex; align-items: center; height: 100%;">
									<img src="https://api.dicebear.com/5.x/fun-emoji/svg" alt="Avatar" class="rounded-circle mr-4" style="width: 32px; height: 32px;">
									<h5 class="card-title"><?php echo $post['postTitle']; ?></h5>
								</div>
								<br>
								<p class="card-text"><?php echo $post['postDesc']; ?></p>
							</div>

						</div>
					</div>
					<div class="col-6">
						<img src="<?php echo base_url(); ?>uploads/posts/<?php echo $post['postImageFileName']; ?>" class="card-img" alt="post-image">
					</div>
				</div>

				<div class="card-footer d-flex justify-content-between align-items-center">
					<div class="left">
						<?php echo $post['postUploadTime']; ?>
					</div>
					<div class="middle">
						<i class="fa-regular fa-comment">
							<span class="badge badge-dark">0</span>
						</i>
						</i>
					</div>
					<div class="right">
						<i class="<?php
						if($post['isLiked'] == 0)
							echo "fa-regular";
						else
							echo "fa-solid"?>
							fa-heart">
							<span class="badge badge-dark"><?php echo $post['postLikes']; ?></span>
						</i>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<h2 class="text-left">Comments</h2>
				<br>
				<div class="input-group mb-3">
					<textarea class="form-control" id="Comment" name="Comment" placeholder="Comment..."></textarea>
					<button class="btn btn-lg btn-dark rounded">Comment</button>
				</div>
				<br>
				<?php foreach ($comments as $comment) : ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<script>
		$('.fa-regular').click(function() {
			$(this).toggleClass('fa-solid');
		});

		//$('.fa-regular').click(function() {
		//	$.ajax({
		//		url: '<?php //echo base_url(); ?>//index.php/Post/likePost',
		//		method: 'POST',
		//		contentType: 'application/json',
		//		data: {
		//			JSON.stringify({
		//				postId: <?php //echo $post['postId']; ?>//,
		//				isLiked: true
		//			})
		//		},
		//		success: function(data) {
		//			if (data === 'success')
		//			{
		//				$(this).toggleClass('fa-solid');
		//			}
		//		}
		//	});
		//});
		//

		$('.fa-solid').click(function() {
			$(this).toggleClass('fa-regular fa-heart');
		});

	</script>
</body>
</html>
