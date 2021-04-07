<?php

require_once 'assets/php/auth.php';

$user =new Auth();
$msg='';
if(isset($_GET['email']) && isset($_GET['token'])){
	$email=$user->test_input($_GET['email']);
		$token=$user->test_input($_GET['token']);

		$auth_user = $user->reset_pass_auth($email,$token);

		if($auth_user != null){
		if(isset($_POST['submit'])){
		$newpass=$_POST['pass'];
		$cnewpass=$_POST['cpass'];

		$hnewpass=password_hash($newpass,PASSWORD_DEFAULT);

		if($newpass == $cnewpass){
		$user->update_new_pass($hnewpass,$email);
		$msg='Password Changed Sucessfully!<br><a href="index.php">Login Here!</a>';

	}else{

	$msg='Password did not matched!';	

	}
	}
	}else{
	header('location:index.php');
	exit();
}

}else{
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
	<title>Reset Password</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="container">
		<!--loin start-->
		<div class="row justify-content-center wrapper" >
			<div class="col-lg-10 my-auto">
				<div class="card-group myShadow">

					<div class="card justify-content-center rounded-left myColor p-4">
	<h1 class="text-center font-weight-bold text-light">Reset Your Password Here!</h1></div>
	
				<div class="card rounded-right p-4" style="flex-grow:2">
				<h1 class="text-center font-weight-bold text-primary ">Enter the New Password!</h1>
				<hr class="my-3">
				<form action="#" method="post" class="px-3">
				<div class="text-center lead mb-2"><?= $msg; ?></div>
					
										<div class="input-group input-group-lg form-group">
						<div class="input-group-prepend">
							<span class="input-group-text rounded-0">
								<i class="fas fa-key fa-lg"></i>
							</span>
						</div>
						<input type="password" name="pass" class="form-control rounded-1" placeholder="New Password" required minlength="5">
					</div>

					<div class="input-group input-group-lg form-group">
						<div class="input-group-prepend">
							<span class="input-group-text rounded-0">
								<i class="fas fa-key fa-lg"></i>
							</span>
						</div>
						<input type="password" name="cpass" class="form-control rounded-1" placeholder="Confirm New Password" required minlength="5">
					</div>
					
				<div class="form-group">
					<input type="submit" value="Reset Password" name="submit" class="btn btn-primary btn-lg btn-block myBtn">
				</div>
				</form>

</div>
</div>
			</div>
		</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
</body>
</html>
