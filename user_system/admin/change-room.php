<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
	<div class="col-lg-8">
		<div class="card my-2 border-info ">
			<div class="card-header bg-info text-white ">
				<h4 class="m-0">Change Rooms</h4>
			</div>
			<div class="card-body">
				
					<!--room form start-->

				<div class="card rounded-right p-4" style="flex-grow:1.4;">
				<form action="#" method="post" class="px-3" id="room-form">
					<div id="changeAlert"></div>

					<div class="form-group">
						<div class="col-sm-8">
						<label for="roll_no" class="m-1"><b><i> Enter Your Roll No</i></b></label>
						<input type="text" name="roll_no" id="roll_no" class="form-control rounded-1" placeholder="Roll No" required>
					</div> </div>

					<div class="form-group">
						<div class="col-sm-8">
						<label for="hostel_no" class="m-1"><b><i> Enter Your Hostel Id:</i></b></label>
						<input type="text" name="hostel_no" id="hostel_no" class="form-control rounded-1" placeholder="Hostel Id" required>
					</div> </div>



					<div class="form-group">
						<div class="col-sm-8">
						<label for="room_id" class="m-1"><b><i> Enter Your Current Room No</i></b></label>
						<input type="text" name="room_no" id="room_no" class="form-control rounded-1" placeholder="Room No" required>
					</div> </div>

					<div class="form-group">
						<div class="col-sm-8">
						<label for="room_id" class="m-1"><b><i> Enter Your New Room No</i></b></label>
						<input type="text" name="room_no1" id="room_no1" class="form-control rounded-1" placeholder="Room No" required>
					</div> </div>


					
				<div class="form-group">
					<div class="col-sm-8">
					<input type="submit" value="Change Room" id="room-btn" class="btn btn-info btn-lg btn-block myBtn">
				</div></div>
				</form>

</div>
		<!--room form end-->
				
			</div>
		</div>
	</div>
</div>
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
				data: $("#room-form").serialize()+'&action=change',
				success:function(response){
					$("#room-btn").val('Add Room');
					
						$("#changeAlert").html(response);
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