<?php
require_once 'assets/php/admin-header.php';
?>
<div class="container">
<div class="row">
	<div class="col-lg-8">
		<div class="card my-2 border-primary ">
			<div class="card-header bg-primary text-white ">
				<h4 class="m-0">Add Rooms</h4>
			</div>
			<div class="card-body">
				
					<!--room form start-->

				<div class="card rounded-right p-4" style="flex-grow:1.4;">
				<form action="#" method="post" class="px-3" id="room-form">
					<div id="roomAlert"></div>

					<div class="form-group">
						<div class="col-sm-8">
						<label for="room_id" class="m-1"><b><i>Room no</i></b></label>
						<input type="text" name="room_no" id="room_no" class="form-control rounded-1" placeholder="Room No" required>
					</div> </div>


					<div class="form-group"><div class="col-sm-8">
<label for="gender" class="m-1"><b><i>Room For:</i></b></label>
<select name="gender" id="gender" class="form-control">
<option value="">Select your choice</option>
<option value="male">Male</option>
<option value="female">Female</option>
</select>
</div>
</div>
					
					<div class="form-group ">
						<div class="col-sm-8">
						<label for="seater" class="m-1"><b><i>Seater</i></b></label>
						<select name="seater" id="seater" class="form-control">
						<option value="">Select your choice</option>
						<option value="1">1 person</option>
						<option value="2">2 person</option>
						<option value="3">3 person</option>
						<option value="4">4 person</option>
						<option value="5">5 person</option>
 						</select>

					</div></div>

					<div class="form-group ">
						<div class="col-sm-8">
						<label for="fees" class="m-1"><b><i>Fees</i></b></label>
						<input type="text" name="fees" id="fees" class="form-control rounded-1" placeholder="Fees" required>
					</div></div>


					
					
				<div class="form-group">
					<div class="col-sm-8">
					<input type="submit" value="Add Room" id="room-btn" class="btn btn-primary btn-lg btn-block myBtn">
				</div></div>
				</form>

</div>
		<!--room form end-->
				
			</div>
		</div>
	</div>
</div></div>
<!--Footer area-->
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	
	<script type="text/javascript">

	$(document).ready(function(){
	//Register Ajax Request
	$("#room-btn").click(function(e){
		if($("#room-form")[0].checkValidity()){
			e.preventDefault();
			$("#room-btn").val('Please Wait...');
			$.ajax({
				url: 'assets/php/admin-action.php',
				method: 'post',
				data: $("#room-form").serialize()+'&action=room',
				success:function(response){
					$("#room-btn").val('Add Room');
					
						$("#roomAlert").html(response);
						setTimeout(function(){
									location.reload();
								},5000);
					}
			});
		}
});
	checkNotification();

function checkNotification(){
	$.ajax({
		url:'assets/php/admin-action.php',
		method:'post',
		data: {action: 'checkNotification'},
		success:function(response){
			$("#checkNotification").html(response);
		}
	});
}

});
</script>
</body>
</html>