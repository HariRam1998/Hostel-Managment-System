<?php

require_once'assets/php/header.php';
?>
<div class="container">
<div class="row justify-content-center">
	<div class="col-lg-12">
		<?php if($verified == 'Verified!'):?>
		<div class="card my-2 border-primary">
			<div class="card-header bg-primary text-white">
				<h4 class="m-0">Book Hostel</h4>
			</div>
			<div class="card-body">
				
					<!--room form start-->


				<div class="card rounded-right p-4" style="flex-grow:1.4;">
				<form action="#" method="post" class="px-3" id="book-form">
					<div id="bookAlert"></div>
					<h5><b>Personal Info</b></h5>
					

					<div class="form-group">
						<div class="col-sm-8">
						<label for="reg" class="m-0"><b><i>Registration no</i></b></label>
						<input type="text" name="reg" id="reg" class="form-control rounded-1" value="<?=$cid;?>" readonly>
					</div> </div>
					
					<div class="form-group ">
						<div class="col-sm-8">
						<label for="name" class="m-0"><b><i>Name</i></b></label>
						<input type="text" name="name" id="name" class="form-control rounded-1" value="<?=$cname;?>" readonly>
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="dob" class="m-0"><b><i>DOB</i></b></label>
						<input type="text" name="dob" id="dob" class="form-control rounded-1" value="<?=$cdob;?>" readonly>
					</div></div>


					<div class="form-group ">
						<div class="col-sm-8">
						<label for="gender" class="m-0"><b><i>Gender</i></b></label>
						<input type="text" name="gender" id="gender" class="form-control rounded-1" value="<?=$cgender;?>" readonly>
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="phone" class="m-0"><b><i>Phone No</i></b></label>
						<input type="text" name="phone" id="phone" class="form-control rounded-1" value="<?=$cphone;?>" readonly>
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="email" class="m-0"><b><i>Email</i></b></label>
						<input type="text" name="email" id="email" class="form-control rounded-1" value="<?=$cemail;?>" readonly>
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="course" class="m-0"><b><i>Course</i></b></label>
						<input type="text" name="course" id="course" class="form-control rounded-1" placeholder="Course">
					</div></div>


					<div class="form-group ">
						<div class="col-sm-8">
						<label for="eno" class="m-0"><b><i>Emergency no</i></b></label>
						<input type="text" name="eno" id="eno" class="form-control rounded-1" placeholder="Emergency No">
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="gname" class="m-0"><b><i>Guardian Name</i></b></label>
						<input type="text" name="gname" id="gname" class="form-control rounded-1" placeholder="Guardian name">
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="grel" class="m-0"><b><i>Guardian Relation</i></b></label>
						<input type="text" name="grel" id="grel" class="form-control rounded-1" placeholder="Guardian relation">
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="gno" class="m-0"><b><i>Guardian number</i></b></label>
						<input type="text" name="gno" id="gno" class="form-control rounded-1" placeholder="Guardian number">
					</div></div>

					<h5><b>Correspondence Address</b></h5>
						

						<div class="form-group ">
							<div class="col-sm-8">
						<label for="address" class="control-label m-0"><b><i>Address</i></b></label>
						<textarea  rows="5" name="address"  id="address" class="form-control" required="required"></textarea>
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="City" class="control-label m-0"><b><i>City</i></b></label>
						<input type="text" name="city" id="city" class="form-control rounded-1" placeholder="City">
					</div></div>



					<div class="form-group ">
						<div class="col-sm-8">
						<label for="state" class="control-label m-0"><b><i>State</i></b></label>
						<input type="text" name="state" id="state" class="form-control rounded-1" placeholder="State">
					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="pincode" class="control-label m-0"><b><i>Pincode</i></b></label>
						<input type="text" name="pincode" id="pincode" class="form-control rounded-1" placeholder="pincode">
					</div></div>

					<h5><b>Hostel Requirements</b></h5>

					<div class="form-group"><div class="col-sm-8">
<label class="control-label"><b><i>Type of room</i></b></label>
<select name="type" id="type" class="form-control">
<option value="">Select your choice</option>
<option value="1">1 person</option>
<option value="2">2 person</option>
<option value="3">3 person</option>
<option value="4">4 person</option>
<option value="5">5 person</option>
</select>
</div>
</div>

<div class="form-group">
	<div class="col-sm-8">
<label class="control-label"><b><i>Type of food</i></b></label>
<select name="typefood" id="typefood" class="form-control">
<option value="">Select your choice</option>
<option value="Veg">Veg</option>
<option value="Non-Veg">Non-Veg</option>
</select>
</div>
</div>

<div class="form-group">
	<div class="col-sm-8">
<label class="control-label"><b><i>Duration of Stay</i></b></label>
<select name="typestay" id="typestay" class="form-control">
<option value="">Select your choice</option>
<option value="3">3</option>
<option value="6">6</option>
<option value="12">12</option>
</select>
</div>
</div>
 

					
					
				<div class="form-group">
					<div class="col-sm-8">
					<input type="submit" value="Submit" id="book-btn" class="btn btn-primary btn-lg btn-block myBtn">
				</div></div>
				</form>

</div>

		<!--room form end-->
						<?php else: ?>
					<h1 class="text-center text-secondard mt-5">Verify Your E-mail First to Book Hostel!</h1>
				<?php endif; ?>
				
			</div>
		</div>
	</div>
</div></div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
checkNotification();
//book hostel method
$("#book-btn").click(function(e){
if($("#book-form")[0].checkValidity()){
	e.preventDefault();
	$("#room-btn").val('Please Wait...');

	$.ajax({
		url :'assets/php/process.php',
		method: 'post',
		data: $("#book-form").serialize()+'&action=book',
		success:function(response){
			$("#room-btn").val('Submit');
			$("#bookAlert").html(response);

		}

	});
}
});

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
//checking user is logged in or not
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