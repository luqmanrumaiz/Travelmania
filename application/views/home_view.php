<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Travelmania | 	Home</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
	// Check if the user is logged in
	if (isset($_SESSION['logged_in'])) {
		// User is logged in, display the home page
		echo '
			<div class="container mt-5">
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
		
						<!-- Add your main content here -->
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel nibh bibendum est vehicula sagittis. Sed sodales lacinia velit et tristique. Maecenas pulvinar turpis leo, a ornare dolor pellentesque in. Sed quis mauris vel nisi vehicula lacinia sit amet sit amet metus. Integer eget leo venenatis massa varius blandit quis ac nisl. Fusce ut mollis sapien. Nulla facilisi. Maecenas vel tempor orci. Aenean vel congue orci.
		
						Vivamus pharetra vel nibh a blandit. Cras quis dapibus velit. Curabitur vitae fermentum lacus. Duis pellentesque tincidunt tincidunt. Ut non sapien ut quam condimentum rutrum. Vivamus luctus sodales nisi eu ultricies. Nunc quis est sed sapien viverra posuere non sed justo. Duis efficitur viverra finibus. Nulla facilisi. Quisque ut nisl nisi. Maecenas vitae arcu in libero hendrerit hendrerit. Curabitur quis semper risus.
		
						Sed ullamcorper vestibulum justo, volutpat egestas urna porta ut. Sed quis feugiat odio. Aenean viverra sed dolor sit amet consequat. Duis nec erat blandit, tincidunt metus ac, elementum felis. Mauris eleifend justo at risus hendrerit vestibulum. Curabitur fringilla pharetra placerat. Mauris iaculis non nunc sit amet congue. Etiam bibendum vestibulum rhoncus. Curabitur semper risus tortor, ac porttitor est hendrerit sit amet. Nam ac pulvinar sapien. Cras vel mauris elementum nulla porta vulputate. Curabitur at faucibus nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec sagittis, erat et tincidunt fringilla, purus nisi venenatis nisl, sed lacinia elit elit eget mauris.
		
						Nunc et semper velit. Phasellus sodales, est in convallis dictum, diam tortor egestas quam, at mattis lorem erat imperdiet libero. Maecenas posuere felis malesuada est pretium, nec accumsan nulla egestas. Aenean nulla augue, semper et nunc at, viverra aliquet risus. Phasellus tempus ipsum non ex aliquet congue. Sed non suscipit lorem. Sed at massa ut mi luctus consequat sed a justo. Aliquam erat volutpat. Ut imperdiet est libero, efficitur semper lorem malesuada quis. Vestibulum blandit quis metus pharetra ullamcorper.
		
						Mauris laoreet, est vitae convallis laoreet, purus erat vehicula nibh, quis commodo eros enim at leo. Aenean ac lacinia leo. Aliquam erat volutpat. Curabitur posuere, ligula vel laoreet ullamcorper, lectus lectus sollicitudin dui, nec porta urna sem eget odio. Donec placerat et felis sit amet accumsan. Integer ex diam, luctus a consectetur in, ullamcorper eget mi. Nulla ac accumsan sem, eget tempus ex. Sed dignissim nunc in vehicula vestibulum. In hac habitasse platea dictumst. Maecenas ut orci sit amet sapien euismod porttitor sit amet sit amet lectus. Mauris eu mi sit amet dui consequat auctor a a dui. Maecenas molestie dignissim felis lacinia volutpat.
		
						Ut ullamcorper eget tortor a pulvinar. Integer pulvinar lorem vel tellus dignissim malesuada. Sed et rutrum lacus, porttitor tristique libero. Praesent sed nulla ornare, gravida nisl imperdiet, sodales leo. Vivamus porttitor egestas vehicula. Vivamus accumsan diam at nisl maximus consectetur. Vivamus ut ex sed orci rhoncus porttitor a eu neque. Fusce ultrices malesuada eros, sed dapibus leo malesuada nec. Aliquam sollicitudin enim in felis eleifend, vitae tristique tellus imperdiet. In placerat, lorem a tristique pulvinar, massa augue ultricies est, sed commodo ipsum orci quis est. Phasellus a massa eleifend, egestas elit vel, sodales tellus. Proin ut metus pellentesque, cursus erat sed, egestas justo. Nam ex mi, sodales nec convallis quis, semper et urna. Integer nec elit consectetur, pharetra velit sed, porttitor nulla.
		
						Nunc vitae dui sit amet velit fermentum porttitor non eu sem. Nam pellentesque, dolor vel efficitur cursus, magna arcu vulputate nisl, vitae congue nunc dui quis mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec accumsan semper efficitur. Nullam non maximus lacus. Morbi sed odio vel risus egestas fermentum quis eu libero. Curabitur risus ipsum, ultricies non consequat in, semper et ligula. Donec et vulputate mauris. Mauris vulputate aliquam neque, a vulputate mi efficitur luctus. Sed sed pharetra ligula, sed varius ante. Fusce cursus accumsan urna eget bibendum. Ut leo nibh, fringilla non libero vitae, scelerisque gravida neque. Sed vitae viverra velit. Nulla vitae libero nec lorem tempor imperdiet at sed ligula. Mauris finibus mauris eu massa facilisis sodales. Fusce quis imperdiet urna, in fermentum ipsum.
		
						Fusce vestibulum porta tortor, nec finibus orci commodo nec. Morbi tempus quam nunc, vehicula molestie magna consequat ac. Vestibulum sagittis urna ex, in tincidunt nisi facilisis ac. Nunc maximus lobortis quam, quis molestie erat suscipit eu. Mauris neque velit, cursus eu molestie sit amet, pellentesque eu augue. Integer fermentum feugiat lectus, et vulputate enim bibendum rhoncus. Nunc fermentum viverra enim eget pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis quis posuere lacus, quis molestie nunc. Nulla rhoncus tellus dolor, nec tempus risus commodo eget. Mauris scelerisque, urna ac pretium varius, purus tellus mollis arcu, nec maximus diam nibh bibendum purus. Aenean in eleifend neque, eget imperdiet enim.
		
						Quisque congue varius auctor. Curabitur a accumsan enim. Nulla eu dignissim lorem. Etiam vulputate vitae lorem vel pulvinar. Sed libero quam, iaculis eget ultricies vitae, venenatis a neque. Aliquam lacinia scelerisque ex, ac volutpat magna pellentesque eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse ornare sit amet risus sit amet mattis.
		
						Ut a lobortis est. Sed sit amet cursus nisi. Vivamus facilisis mollis ligula ac pellentesque. Nullam lacinia pellentesque varius. Integer ullamcorper ac erat ac porttitor. Aenean rutrum placerat turpis, quis bibendum sapien commodo in. Maecenas eros mi, lacinia nec dolor eu, consequat facilisis dui. Proin hendrerit est sem, nec volutpat nulla sollicitudin sit amet.
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque vel nibh bibendum est vehicula sagittis. Sed sodales lacinia velit et tristique. Maecenas pulvinar turpis leo, a ornare dolor pellentesque in. Sed quis mauris vel nisi vehicula lacinia sit amet sit amet metus. Integer eget leo venenatis massa varius blandit quis ac nisl. Fusce ut mollis sapien. Nulla facilisi. Maecenas vel tempor orci. Aenean vel congue orci.
		
						Vivamus pharetra vel nibh a blandit. Cras quis dapibus velit. Curabitur vitae fermentum lacus. Duis pellentesque tincidunt tincidunt. Ut non sapien ut quam condimentum rutrum. Vivamus luctus sodales nisi eu ultricies. Nunc quis est sed sapien viverra posuere non sed justo. Duis efficitur viverra finibus. Nulla facilisi. Quisque ut nisl nisi. Maecenas vitae arcu in libero hendrerit hendrerit. Curabitur quis semper risus.
		
						Sed ullamcorper vestibulum justo, volutpat egestas urna porta ut. Sed quis feugiat odio. Aenean viverra sed dolor sit amet consequat. Duis nec erat blandit, tincidunt metus ac, elementum felis. Mauris eleifend justo at risus hendrerit vestibulum. Curabitur fringilla pharetra placerat. Mauris iaculis non nunc sit amet congue. Etiam bibendum vestibulum rhoncus. Curabitur semper risus tortor, ac porttitor est hendrerit sit amet. Nam ac pulvinar sapien. Cras vel mauris elementum nulla porta vulputate. Curabitur at faucibus nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec sagittis, erat et tincidunt fringilla, purus nisi venenatis nisl, sed lacinia elit elit eget mauris.
		
						Nunc et semper velit. Phasellus sodales, est in convallis dictum, diam tortor egestas quam, at mattis lorem erat imperdiet libero. Maecenas posuere felis malesuada est pretium, nec accumsan nulla egestas. Aenean nulla augue, semper et nunc at, viverra aliquet risus. Phasellus tempus ipsum non ex aliquet congue. Sed non suscipit lorem. Sed at massa ut mi luctus consequat sed a justo. Aliquam erat volutpat. Ut imperdiet est libero, efficitur semper lorem malesuada quis. Vestibulum blandit quis metus pharetra ullamcorper.
		
						Mauris laoreet, est vitae convallis laoreet, purus erat vehicula nibh, quis commodo eros enim at leo. Aenean ac lacinia leo. Aliquam erat volutpat. Curabitur posuere, ligula vel laoreet ullamcorper, lectus lectus sollicitudin dui, nec porta urna sem eget odio. Donec placerat et felis sit amet accumsan. Integer ex diam, luctus a consectetur in, ullamcorper eget mi. Nulla ac accumsan sem, eget tempus ex. Sed dignissim nunc in vehicula vestibulum. In hac habitasse platea dictumst. Maecenas ut orci sit amet sapien euismod porttitor sit amet sit amet lectus. Mauris eu mi sit amet dui consequat auctor a a dui. Maecenas molestie dignissim felis lacinia volutpat.
		
						Ut ullamcorper eget tortor a pulvinar. Integer pulvinar lorem vel tellus dignissim malesuada. Sed et rutrum lacus, porttitor tristique libero. Praesent sed nulla ornare, gravida nisl imperdiet, sodales leo. Vivamus porttitor egestas vehicula. Vivamus accumsan diam at nisl maximus consectetur. Vivamus ut ex sed orci rhoncus porttitor a eu neque. Fusce ultrices malesuada eros, sed dapibus leo malesuada nec. Aliquam sollicitudin enim in felis eleifend, vitae tristique tellus imperdiet. In placerat, lorem a tristique pulvinar, massa augue ultricies est, sed commodo ipsum orci quis est. Phasellus a massa eleifend, egestas elit vel, sodales tellus. Proin ut metus pellentesque, cursus erat sed, egestas justo. Nam ex mi, sodales nec convallis quis, semper et urna. Integer nec elit consectetur, pharetra velit sed, porttitor nulla.
		
						Nunc vitae dui sit amet velit fermentum porttitor non eu sem. Nam pellentesque, dolor vel efficitur cursus, magna arcu vulputate nisl, vitae congue nunc dui quis mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec accumsan semper efficitur. Nullam non maximus lacus. Morbi sed odio vel risus egestas fermentum quis eu libero. Curabitur risus ipsum, ultricies non consequat in, semper et ligula. Donec et vulputate mauris. Mauris vulputate aliquam neque, a vulputate mi efficitur luctus. Sed sed pharetra ligula, sed varius ante. Fusce cursus accumsan urna eget bibendum. Ut leo nibh, fringilla non libero vitae, scelerisque gravida neque. Sed vitae viverra velit. Nulla vitae libero nec lorem tempor imperdiet at sed ligula. Mauris finibus mauris eu massa facilisis sodales. Fusce quis imperdiet urna, in fermentum ipsum.
		
						Fusce vestibulum porta tortor, nec finibus orci commodo nec. Morbi tempus quam nunc, vehicula molestie magna consequat ac. Vestibulum sagittis urna ex, in tincidunt nisi facilisis ac. Nunc maximus lobortis quam, quis molestie erat suscipit eu. Mauris neque velit, cursus eu molestie sit amet, pellentesque eu augue. Integer fermentum feugiat lectus, et vulputate enim bibendum rhoncus. Nunc fermentum viverra enim eget pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Duis quis posuere lacus, quis molestie nunc. Nulla rhoncus tellus dolor, nec tempus risus commodo eget. Mauris scelerisque, urna ac pretium varius, purus tellus mollis arcu, nec maximus diam nibh bibendum purus. Aenean in eleifend neque, eget imperdiet enim.
		
						Quisque congue varius auctor. Curabitur a accumsan enim. Nulla eu dignissim lorem. Etiam vulputate vitae lorem vel pulvinar. Sed libero quam, iaculis eget ultricies vitae, venenatis a neque. Aliquam lacinia scelerisque ex, ac volutpat magna pellentesque eu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse ornare sit amet risus sit amet mattis.
		
						Ut a lobortis est. Sed sit amet cursus nisi. Vivamus facilisis mollis ligula ac pellentesque. Nullam lacinia pellentesque varius. Integer ullamcorper ac erat ac porttitor. Aenean rutrum placerat turpis, quis bibendum sapien commodo in. Maecenas eros mi, lacinia nec dolor eu, consequat facilisis dui. Proin hendrerit est sem, nec volutpat nulla sollicitudin sit amet.
					</div>
					<div class="col-4 bg-danger rounded h-100">
						<div class="offcanvas offcanvas-end show position-fixed" data-bs-scroll="true" data-bs-backdrop="static" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
							<div class="offcanvas-header">
								<div class="avatar mx-auto" style="width: 128px; height: 128px;">
									<img src="https://api.dicebear.com/5.x/fun-emoji/svg" alt="Avatar" class="rounded-circle">
								    <button type="button" class="btn btn-primary btn-edit position-absolute" style="bottom: 0; right: 0; padding: .25rem .5rem;font-size: .875rem;">	
								</div>
								<h5 class="offcanvas-title" id="offcanvasScrollingLabel">Offcanvas with body scrolling</h5>
							</div>
							<div class="offcanvas-body">
								<p>Try scrolling the rest of the page to see this option in action.</p>
							</div>
						</div>			
					</div>
				</div>
			</div>
		';

	} else {
		// User is not logged in, redirect to the login page
		redirect('login');
	}

function debug_to_console($data) {
	$output = $data;
	if (is_array($output))
		$output = implode(',', $output);

	echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
	?>
</body>
</html>
