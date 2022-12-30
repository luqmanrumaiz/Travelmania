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
	<?php
	// Start the session
	session_start();

//	// Check if the user is logged in
//	if (isset($_SESSION['logged_in'])) {
//		// User is logged in, display the home page
//		echo "Welcome, " . $_SESSION['user'] . "!";
//		// Display the message passed from the controller
//	} else {
//		// User is not logged in, redirect to the login page
//		redirect('login');
//	}
//	?>
</div>
</body>
</html>
