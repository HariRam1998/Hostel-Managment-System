<?php
require_once'assets/php/session.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="hari ram">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
	<title>hostel</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<div class="card rounded-0 mt-3 border-primary">
				<div class="card-header border-primary">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
						<a href="#profile" class="nav-link active font-weight-bold" data-togggle="tab">Profile</a></li>
						<li class="nav-item">
						<a href="#editProfile" class="nav-link active font-weight-bold" data-togggle="tab">Edit Profile</a></li>
						<li class="nav-item">
						<a href="#changepass" class="nav-link active font-weight-bold" data-togggle="tab">Change Password</a></li></ul>
			</div>
			<div class="card-body">
				<div class="tab-content">
					<div class="tab-pane container active" id="profile">
					<div class="card-deck">
						<div class="card border-primary">
							<div class="card-header bg-primary text-light text-center lead">
								User Id:<?=$cid;?>
						</div>
						<div class="card-body">
							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#0275d8;"><b>Name:<?=
							$cname;?></b></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#0275d8;"><b>Email:<?=
							$cemail;?></b></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#0275d8;"><b>Gender:<?=
							$cgender;?></b></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#0275d8;"><b>DOB:<?=
							$cdob;?></b></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#0275d8;"><b>Phone:<?=
							$cphone;?></b></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#0275d8;"><b>Registered on:<?=$reg_on;?></b></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#0275d8;"><b>Email Verified on:<?=$verified;?></b></p>



						</div>
					</div>
						<div class="card border-primary align-self-center">
							<?php if(!$cphoto):?>
								<img src="assets/img/ts-avatar.jpg" class="img-thumbnail img-fluid" width="408px">
								<?php else: ?>
								 <img src="<?= 'assets/php/'.$cphoto; ?>" class="img-thumbnail img-fluid" width="408px">
								<?php endif;?>
						</div>
					</div>	
					</div>
				</div>
			</div>

		</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js "></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
	</body>
	</html>