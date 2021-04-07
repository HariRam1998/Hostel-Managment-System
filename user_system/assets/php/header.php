<?php
require_once 'assets/php/session.php';


?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="hari ram">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<title><?=ucfirst(basename($_SERVER['PHP_SELF'],'.php'))?>| JH</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
  <link rel="stylesheet" href="\css/style.css">
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap');*{
			font-family:'Balsamiq Sans',cursive;
		}
    body
{
      height: 100vh;
        background-color: #b5b5b5;
        background-image: linear-gradient(to right, #d6d6d6 0%, #d6d6d6 0%);
 
}

	</style>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><i class="fas fa-code fa-lg"></i>&nbsp;&nbsp;JH</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "home.php")? "active":"";?>" href="home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "profile.php")? "active":"";?>"href="profile.php"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "feedback.php")? "active":"";?>"href="feedback.php"><i class="fas fa-comment-dots"></i>&nbsp;Feedback</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "notification.php")? "active":"";?> "href="notification.php"><i class="fas fa-bell"></i>&nbsp;Notification&nbsp;<span id="checkNotification"></span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "note.php")? "active":"";?> "href="note.php"><i class="far fa-sticky-note"></i>&nbsp;Note&nbsp;<span id="checkNotification"></span></a>
      </li>
     
     
      <li class="nav-item">
        <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "booking.php")? "active":"";?> "href="booking.php"><i class="far fa-building"></i>&nbsp;Book Hostel&nbsp;<span id="checkNotification"></span></a>

      </li>

      <li class="nav-item">
        <a class="nav-link <?=(basename($_SERVER['PHP_SELF']) == "room-alloted.php")? "active":"";?> "href="room-alloted.php"><i class="fas fa-info-circle"></i>&nbsp;Allotmentdetails&nbsp;<span id="checkNotification"></span></a>
      </li>
     
      <li class="nav-item dropdown">
      	<a href="#" class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
      		<i class="fas fa-user-cog"></i>&nbsp;Hi! <?=$fname;?>
      	</a>
      	<div class="dropdown-menu">
      		<!--<a href="#" class="dropdown-item"><i class="fas fa-cog"></i>&nbsp;Setting</a>-->
      		<a href="assets/php/logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
      	</div>
      </li>
       <li class="nav-item">
        <a class="navbar-brand" href="#">
              <?php if(!$cphoto):?>
								<img src="assets/img/ts-avatar.jpg" class="img-thumbnail img-fluid" width="40px">
								<?php else: ?>
								 <img src="<?= 'assets/php/'.$cphoto; ?>" class="img-thumbnail img-fluid" width="40px">
								<?php endif;?></a>
      </li>
    </ul>
  </div>
</nav>

            