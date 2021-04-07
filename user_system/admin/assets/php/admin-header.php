<?php

session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="hari ram">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<?php
	$title = basename($_SERVER['PHP_SELF'],'.php');
		$title = explode('-',$title);
		$title = ucfirst($title[1]);

	?>
	<title><?= $title; ?>| JH</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js "></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" defer></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#open-nav").click(function(){
				$(".admin-nav").toggleClass('animate');
			});

		});
	</script>	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');*{
			font-family:'Balsamiq Sans',cursive;
		}
	</style>
	<style type="text/css">
		.admin-nav{
			width: 220px;
			min-height: 100vh;
			overflow: hidden;
			background-color: #343a40;
			transition: 0.3s all ease-in-out;
		}
		.admin-link{
			background-color: #343a40;

		}
		.admin-link:hover, .nav-active{
			background-color: #212529;
		}
		.animate{
			width: 0;
			transition: 0.3s all ease-in-out;
		}
	</style>
	
</head>
<body>
	<div class="container-fluid">
		
		<div class="row">
			<div class="admin-nav p-0">
				<h4 class="text-light text-center p-2">Admin Panel</h4>
				<div class="list-group list-group-flush">

					<a href="admin-dashboard.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-dashboard.php')?"nav-active":"";?>"><i class="fas fa-chart-pie"></i>&nbsp;&nbsp;Dashboard</a>

					
					<a href="admin-notes.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-notes.php')?"nav-active":"";?>"><i class="fas fa-sticky-note"></i>&nbsp;&nbsp;Notes</a>

					<a href="admin-feedback.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-feedback.php')?"nav-active":"";?>"><i class="fas fa-comment"></i>&nbsp;&nbsp;Feedback</a>

					<a href="admin-notification.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-notification.php')?"nav-active":"";?>"><i class="fas fa-bell"></i>&nbsp;&nbsp;Notification&nbsp;<span id="checkNotification"></span></a>

					<a href="assets/php/admin-action.php?export=excel" class="list-group-item text-light admin-link"><i class="fas fa-table"></i>&nbsp;&nbsp;Export Users</a>

					<a href="admin-blog.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-blog.php')?"nav-active":"";?>"><i class="fas fa-cog"></i>&nbsp;&nbsp;Admin Blog</a>

					<ul class="list-unstyled components"><li class="active">
						<a href="#homesubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item text-light admin-link"><i class="fas fa-hotel"></i>&nbsp;&nbsp;Rooms</a>
						<ul class="collapse list-unstyled" id="homesubmenu">
							<li><a href="admin-rooms.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-rooms.php')?"nav-active":"";?>"><i class="fas fa-plus-circle"></i>&nbsp;&nbsp;Add Rooms</a></li>

					<li><a href="book-hostel.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'book-hostel.php')?"nav-active":"";?>"><i class="fab fa-optin-monster"></i>&nbsp;&nbsp;Allocate Rooms</a></li>

				<li>	<a href="all-rooms.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'all-rooms.php')?"nav-active":"";?>"><i class="fab fa-phoenix-framework"></i>&nbsp;&nbsp;All Rooms</a></li>

					<li><a href="admin-vacate.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-vacate.php')?"nav-active":"";?>"><i class="fab fa-grunt"></i>&nbsp;&nbsp;Vacate Room</a></li>

					<li><a href="change-room.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'change-room.php')?"nav-active":"";?>"><i class="fas fa-hiking"></i>&nbsp;&nbsp;Change Room</a></li></ul></li></ul>

					<ul class="list-unstyled components"><li class="active">
						<a href="#homesub" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item text-light admin-link"><i class="fas fa-id-card"></i>&nbsp;&nbsp;User Details</a>
						<ul class="collapse list-unstyled" id="homesub">

							<li><a href="admin-users.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-users.php')?"nav-active":"";?>"><i class="fas fa-user-friends"></i>&nbsp;&nbsp;Users</a></li>

							<li><a href="admin-deleteduser.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'admin-deleteduser.php')?"nav-active":"";?>"><i class="fas fa-user-slash"></i>&nbsp;&nbsp;Deleted Users</a></li>

					<li><a href="hostel-registered.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'hostel-registered.php')?"nav-active":"";?>"><i class="fab fa-the-red-yeti"></i>&nbsp;&nbsp;Bookings</a></li>

					<li><a href="hostel-vacate.php" class="list-group-item text-light admin-link <?= (basename($_SERVER['PHP_SELF']) == 'hostel-vacate.php')?"nav-active":"";?>"><i class="fab fa-grunt"></i>&nbsp;&nbsp;Vacate Students</a></li></ul></li></ul>

				</div>

			</div>
			<div class="col">
				<div class="row">
					<div class="col-lg-12 bg-secondary pt-2 justify-content-between d-flex">
						<a href="#" class="text-white" id="open-nav"><h3><i class="fas fa-bars"></i></h3></a>

						<h4 class="text-light"><?=$title;?></h4>
						<a href="assets/php/logout.php" class="text-light mt-1"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
					</div>
				</div>








			