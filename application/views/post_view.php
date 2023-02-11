<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travelmania | Post</title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/post.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/ab1cd643ab.js" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.6/underscore-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.4.1/backbone-min.js" integrity="sha512-TztyCWDNoN0YKl30gDCMKsiWs35juID+W7ZM2uvPeLLmiNvZg789SglgB/QeUbewqIF2Z4mVq3PyIEa+YXXADQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
				<span><?php echo $destination['destination_country'] . ', '. $destination['destination_city'] . ' - ' .
					 $post['post_title']; ; ?></span>
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
									<img src="https://ui-avatars.com/api/?size=32&rounded=true&background=343a40&color=fff
									&name=<?php echo substr($post['user']['username'], 0, 1) ;?>" alt="Avatar"
									class="mr-4"/>
									<h5 class="card-title mt-2"><?php echo $post['user']['username']; ?></h5>
								</div>
								<br>
								<p class="card-text"><?php echo $post['post_desc']; ?></p>
							</div>

						</div>
					</div>
					<div class="col-6">
						<img src="<?php echo base_url(); ?>uploads/posts/<?php echo $post['post_image_filename']; ?>" class="card-img" alt="post-image">
					</div>
				</div>

				<div class="card-footer d-flex justify-content-between align-items-center">
					<div class="left">
						<?php echo $post['post_upload_time']; ?>
					</div>
					<div class="middle">
						<i class="fa-regular fa-comment">
							<span class="badge badge-dark"> <?php echo count($comments); ?> </span>
						</i>
						</i>
					</div>
					<div class="right">
						<i class="<?php
						// Check if the user has liked the post
						if (! in_array($this->session->userdata('user_id'), json_decode($post['like_user_ids'])))
							echo "fa-regular";
						else
							echo "fa-solid"?>
							fa-heart">
							<span class="badge badge-dark"><?php echo $post['post_likes']; ?></span>
						</i>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col">
				<h2 class="text-left">Comments</h2>
				<div class="comments-container">
					<% _.each(comments, function(comment) { %>
					<div class="comment">
						<p class="comment-id"><%= comment.get("comment_id") %></p>
						<p class="comment-text"><%= comment.get("comment_text") %></p>
					</div>
					<% }); %>
				</div>

				<hr>
				<br>
				<div class="input-group mb-3">
					<textarea class="form-control" id="Comment" name="Comment" placeholder="Comment..."></textarea>
					<button class="btn btn-lg btn-dark rounded comment-btn">Comment</button>
				</div>
				<br>
				<?php foreach ($comments as $comment) : ?>
				<div class="comments-list">
					<div class="card bg-light">
						<div class="card-body">
							<div class="row"  style="display: flex; align-items: center; height: 100%;">
								<img src="https://ui-avatars.com/api/?size=32&rounded=true&background=343a40&color=fff
									&name=<?php echo substr($comment['user']['username'], 0, 1) ;?>" alt="Avatar"
									 class="mr-2 ml-2"/>
								<h5 class="card-title text-center mt-2"><?php echo $comment['user']['username']; ?></h5>
								<span class="badge badge-dark ml-2 float-right"><?php echo $comment['comment_upload_time']; ?></span>
							</div>
							<br>
							<p class="card-text"><?php echo $comment['comment_text']; ?></p>
						</div>
					</div>
					<br>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<script>

		$.ajax({
			url: '<?php echo base_url(); ?>index.php/Comment/comment/' + 11,
			type: 'GET',
			dataType: 'json',
			success: function(response) {
				console.log(response.comment);
			}
		});

		var Comment = Backbone.Model.extend({
			defaults: {
				comment_id: 0,
				comment_text: '',
				comment_upload_time: '',
				user_id: 0,
				post_id: 0,
			}
		});

		var postId = <?php echo $post['post_id']; ?>;

		var Comments = Backbone.Collection.extend({
			model: Comment,
			url: '<?php echo base_url(); ?>index.php/Comment/comment/' + 11,
			parse: function(response) {
				return response.comment;
			}
		})

		var CommentsView = Backbone.View.extend({
			template: _.template('<% _.each(comments, function(comment) { %>' +
				'<p class="card-text"><%= comment.get("comment_id") %> - <%= comment.get("comment_text") %></p>' +
				'<% }); %>'),
			initialize: function() {
				this.listenTo(this.collection, 'reset', this.render);
			},
			render: function() {
				this.$el.html(this.template({comments: this.collection.models}));
			}
		});

		var comments = new Comments();
		// Fetch the comments from the server
		comments.fetch();

		var commentsView = new CommentsView({
			el: '.comments-container',
			collection: comments
		});

		console.log(comments)

		commentsView.render();

		$('.fa-regular.fa-heart').click(function() {
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Post/like',
				method: 'PUT',
				contentType: 'application/json',
				data: JSON.stringify({
					post_id: <?php echo $post['post_id']; ?>,
					user_id: <?php echo $this->session->userdata('user_id'); ?>,
					like_user_ids: <?php echo $post['like_user_ids']; ?>,
					post_likes: <?php echo $post['post_likes']; ?>,
					is_liked: false
				}),
				success: function(data) {
					$('.fa-heart').toggleClass('fa-solid');
					$('.fa-solid.fa-heart').children('span').text(data.likes);
					console.log(data)
				}
			});
		});

		$('.fa-solid.fa-heart').click(function() {
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Post/like',
				method: 'PUT',
				contentType: 'application/json',
				data: JSON.stringify({
					post_id: <?php echo $post['post_id']; ?>,
					user_id: <?php echo $this->session->userdata('user_id'); ?>,
					like_user_ids: <?php echo $post['like_user_ids']; ?>,
					post_likes: <?php echo $post['post_likes']; ?>,
					is_liked: true
				}),
				success: function(data) {
					$('.fa-regular.fa-heart').toggleClass('fa-regular');
					$('.fa-regular.fa-heart').children('span').text(data.likes);
					console.log(data);
				}
			});
		});

		// ajax call to comment
		$('.comment-btn').click(function() {
			$.ajax({
				url: '<?php echo base_url(); ?>index.php/Comment/comment',
				method: 'POST',
				contentType: 'application/json',
				data: JSON.stringify({
					post_id: <?php echo $post['post_id']; ?>,
					user_id: <?php echo $this->session->userdata('user_id'); ?>,
					comment_text: $('#Comment').val(),
					comment_upload_time: '<?php echo date('Y-m-d H:i:s'); ?>'
				}),
				success: function(data) {
					if (data.status)

						window.location.reload();

					else

						alert('Error');
				}
			});
		});
	</script>
</body>
</html>
