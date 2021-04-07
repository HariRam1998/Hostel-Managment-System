<?php

require_once'assets/php/header.php';
?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-10">
			<div class="card rounded-0 mt-3 border-dark">
				<div class="card-header border-dark">
					<ul class="nav nav-tabs card-header-tabs">
						<li class="nav-item">
							<a href="#profile" class="text-dark nav-link active font-weight-bold" data-toggle="tab">Profile</a>
						</li>
						<li class="nav-item">
							<a href="#editProfile" class="text-dark nav-link  font-weight-bold" data-toggle="tab">Edit-Profile</a>
						</li>
						<li class="nav-item">
							<a href="#changePass" class="text-dark nav-link  font-weight-bold" data-toggle="tab">Change Password</a>
						</li>
					</ul>
				</div>
				<div class="card-body">
				<div class="tab-content">
					<!--Profile Tab Content Start-->
					<div class="tab-pane container active" id="profile">
						<div id="verifyEmailAlert"></div>
					<div class="card-deck">
						<div class="card border-danger">
							<div class="card-header bg-danger text-light text-center lead">
								User Id:<?=$cid;?>
						</div>
						<div class="card-body">
							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#000000;"><b>Name:</b><?=$cname;?></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#000000;"><b>Email:</b><?=$cemail;?></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#000000;"><b>Gender:</b><?=$cgender;?></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#000000;"><b>DOB:</b><?=
							$cdob;?></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#000000;"><b>Phone:</b><?=$cphone;?></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#000000;"><b>Registered on:</b><?=$reg_on;?></p>

							<p class="card-text p-2 m-1 rounded-0" style="border:1px solid#000000;"><b>Email Verified:</b><?=$verified;?>

							<?php if($verified =='Not Verified!'): ?>
								<a href="#" id="verify-email" class="float-right">Verify Now</a>
							<?php endif; ?>

						</p>



						</div>
					</div>
						<div class="card border-danger align-self-center">
							<?php if(!$cphoto):?>
								<img src="assets/img/ts-avatar.jpg" class="img-thumbnail img-fluid" width="408px">
								<?php else: ?>
								 <img src="<?= 'assets/php/'.$cphoto; ?>" class="img-thumbnail img-fluid" width="408px">
								<?php endif;?>
						</div>
					</div>	
					</div>
					<!--Profile Tab Content End-->
					<!--Edit Tab Content Start-->
					<div class="tab-pane container fade" id="editProfile">
						<div class="card-deck">
						<div class="card border-danger align-self-center ">
							<?php if(!$cphoto):?>
								<img src="assets/img/ts-avatar.jpg" class="img-thumbnail img-fluid" width="408px">
								<?php else: ?>
								 <img src="<?= 'assets/php/'.$cphoto; ?>" class="img-thumbnail img-fluid" width="408px">
								<?php endif;?>
						</div>
						<div class="card border-danger">
							<form action="" method="post" class="px-3 mt-2 " enctype="multipart/form-data" id="profile-update-form">
								<input type="hidden" name="oldimage" value="<?= $cphoto; ?>">
								<div class="form-group m-0">
									<label for="profilePhoto" class="m-1">Upload Profile Image</label>
									<input type="file" name="image" id="profilePhoto">
								</div>
								<div class="form-group m-0">
									<label for="name" class="m-1">Name</label>
									<input type="text" name="name" id="name" class="form-control" value="<?=$cname;?>">
								</div>
								<div class="form-group m-0">
									<label for="gender" class="m-1">Gender</label>
									<select name="gender" id="gender" class="form-control">
										<option value="" disabled <?php if ($cgender==null) {
											echo 'selected';}  ?>>Select</option>
										<option value="Male" <?php if ($cgender=='Male') {
											echo 'selected';}  ?>>Male</option>
										<option value="Female" <?php if ($cgender=='Female') {
											echo 'selected';}  ?>>Female</option>
									</select>
								</div>
								<div class="form-group m-0">
									<label for="dob" class="m-1">Date of Birth</label>
									<input type="date" id="dob" name="dob" value="<?=$cdob;?>" class="form-control">

								</div>
								<div class="form-group m-0">
									<label for="phone" class="m-1">Phone</label>
									<input type="tel" id="phone" name="phone" value="<?=$cphone;?>" class="form-control" placeholder="Phone">

								</div>
								<div class="form-group mt-2">
									<input type="submit" name="profile_update" value="Update Profile" class="btn btn-danger btn-block" id="profileUpdateBtn">
								</div>

							</form>
						</div>

						
	</div>
					</div>
					<!--Edit Profile tab content end-->
					<!--Change password tab content start-->
					<div class="tab-pane container fade" id="changePass">
						<div id="changePassAlert"></div>
						<div class="card-deck">
								<div class="card border-danger">
									<div class="card-header bg-danger text-white text-center lead">
										Change Password
									</div>
									<form action="#" method="post" class="px-3 mt-2 "id="change-pass-form">
										<div class="form-group">
											<label for="curpass">Enter Your Current Password</label>
											<input type="password" name="curpass" placeholder="Current Password" class="form-control form-control-lg" id="curpass" required minlength="5">
										</div>
										<div class="form-group">
											<label for="newpass">Enter Your New Password</label>
											<input type="password" name="newpass" placeholder="New Password" class="form-control form-control-lg" id="newpass" required minlength="5">
										</div>
										<div class="form-group">
											<label for="cnewpass">Enter Your New Password</label>
											<input type="password" name="cnewpass" placeholder="Confirm New Password" class="form-control form-control-lg" id="cnewpass" required minlength="5">
										</div>
										<div class="form-group">
											<p id="changepassError" class="text-danger"></p>
										</div>

										<div class="form-group">
											<input type="submit" name="changepass" value="Change Password" class="btn btn-success btn-block btn-lg" id="changePassBtn">
										</div>
									</form>

								</div>
								<div class="card border-dark align-self-center">
									<img src="assets/img/login-bg.jpg" class="img-thumbnail img-fluid" width="408px">
								</div>
							</div>
					</div>
					<!--Change password tab content end-->

				</div>
		</div></div></div></div></div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			//profile update ajax request
			$("#profile-update-form").submit(function(e){
				e.preventDefault();
				$.ajax({
					url:'assets/php/process.php',
					method:'post',
					processData: false,
					contentType: false,
					cache:false,
					data:new FormData(this),
					success:function(response){
						location.reload();
					}
				});
			});
			//Change password ajax request
			$("#changePassBtn").click(function(e){
				if($("#change-pass-form")[0].checkValidity()){
					e.preventDefault();
					$("#changePassBtn").val('Please Wait...');
					if($("#newpass").val() != $("#cnewpass").val()){
						$("#changepassError").text('* Password did not matched!');
						$("#changePassBtn").val('Change Password...');
					}else{
						$.ajax({
							url:'assets/php/process.php',
							method:'post',
							data:$("#change-pass-form").serialize()+'&action=change_pass',
							success:function(response){
								$("#changePassAlert").html(response);
								$("#changePassBtn").val('Change Password');
								$("#changepassError").text('');
								$("#change-pass-form")[0].reset();
							}
						});
					}
					

			}
			});
			//Verify E-mail Ajax REquest
			$("#verify-email").click(function(e){
				e.preventDefault();
				$(this).text('Please Wait...');

				$.ajax({
					url: 'assets/php/process.php',
					method: 'post',
					data: {action:'verify_email'},
					success:function(response){
						$("#verifyEmailAlert").html(response);
						$("#verify-email").text('Verify Now');

					}
				});
			});
			//check notification
checkNotification();
function checkNotification(){
	$.ajax({
		url:'assets/php/process.php',
		method:'post',
		data: { action: 'checkNotification' },
		success:function(response){
			$("#checkNotification").html(response);
		}
	});
}

$.ajax({
	url:'assets/php/action.php',
	method:'post',
	data:{action:'checkUser'},
	success:function(response){
		if(response === 'bye'){
			window.location = 'index.php';
		}
	}
});
		});
	</script>
</body>
</html>
