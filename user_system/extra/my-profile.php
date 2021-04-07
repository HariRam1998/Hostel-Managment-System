<?php
require_once'assets/php/session.php'
?>
<!--
<?php
if(isset($_POST["update1"]))
{
	header('Location:change-password.php');
}
	?>-->
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>My Profile</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
<?php include("includes/header.php");?>

	<div class="ts-main-content">
		<?php include("includes/sidebar.php");?>
		<div class="content-wrapper">
			<div class="container-fluid">
                <div class="row">
					<div class="col-md-12">
						<h2 class="page-title" style="margin-top:5%"><?php echo $cname;?>'s&nbsp;Profile </h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">

Creation date : &nbsp; <?php echo $created;?> 
</div>
<div class="panel-body">
	<form class="form-horizontal">
	
	<div class="form-group">
<label class="col-sm-2 control-label"> Registration No : </label>
<div class="col-sm-8 ">

<input type="text" name="regno" id="regno"  class="form-control" required="required" value="<?php echo $cid;?>" readonly >
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Name : </label>
<div class="col-sm-8">
<input type="text" name="fname" id="fname"  class="form-control" value="<?php echo $cname;?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender : </label>
<div class="col-sm-8">
<input type="text" name="gender" id="gender"  class="form-control" value="<?php echo $cgender;?>" readonly>
<!--<select name="gender" class="form-control" required="required">
<option value="<?php echo $row->gender;?>"><?php echo $row->gender;?></option>
<option value="male">Male</option>
<option value="female">Female</option>
<option value="others">Others</option>

</select>-->
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">DOB : </label>
<div class="col-sm-8">
<input type="text" name="dob" id="dob"  class="form-control" value="<?php echo $cdob;?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Contact No : </label>
<div class="col-sm-8">
<input type="text" name="contact" id="contact"  class="form-control" value="<?php echo $cphone;?>" readonly>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label">Email id: </label>
<div class="col-sm-8">
<input type="email" name="email" id="email"  class="form-control" value="<?php echo $cemail;?>" readonly>
<span id="user-availability-status" style="font-size:12px;"></span>
</div>
</div>

<!--<div class="col-sm-6 col-sm-offset-5">
<input type="submit" name="update1" Value="Update Profile" class="btn btn-primary">

</div>-->
<div class="col-sm-6 col-sm-offset-5">
<a href="edit-profile.php">Edit Profile</a>
<a href="edit-profile1.php">Edit Profile</a>
<a href="edit-profile2.php">Edit Profile</a>
</div>
</form>


</div>

					
</div>
</div>

									</div>
									</div>
								</div>
							</div>
						</div>
						</div>



	<!-- Loading Scripts -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	

</body>

</html>