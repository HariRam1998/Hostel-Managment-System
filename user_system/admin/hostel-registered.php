<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card my-2 border-success">
			<div class="card-header bg-success text-white">
				<h4 class="m-0">Total Hostel Registered Users</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive" id="showAllhostel">
					<p class="text-center align-self-center lead">Please Wait...</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Footer area-->
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
	$(document).ready(function(){
		//fetch All Users Ajax requet
		fetchhostelUsers();
		function fetchhostelUsers(){
			$.ajax({
				url:'assets/php/admin-action.php',
				method: 'post',
				data: {action: 'fetchhostelUsers'},
				success:function(response){
					$("#showAllhostel").html(response);
					$("table").DataTable({
						order: [0,'desc']
					});
				}
			});
		}
		//display user in details ajax requeset
		$("body").on("click",".userDetailsIcon",function(e){
			e.preventDefault();

			hostelite_id = $(this).attr('id');
			$.ajax({
				url:'assets/php/admin-action.php',
				type: 'post',
				data: {hostelite_id: hostelite_id },
				success:function(response){
					data = JSON.parse(response);
					$("#getName").text(data.name+' '+' (ID: '+data.id+')');
					$("#getEmail").text('Email : '+data.email);
					$("#getPhone").text('Phone : '+data.phone);
					$("#getGender").text('Gender : '+data.gender);
					$("#getDob").text('DOB : '+data.dob);
					$("#getCreated").text('Joined On : '+data.created_at);
					$("#getAddress").text('Address : '+data.address+' '+data.state+' '+data.pincode);

					if(data.photo != ''){
						$("#getImage").html('<img src="../assets/php/'+data.photo+'" class="img-thumbnail img-fluid align-self-center" width="280px">');
					}else{
						$("#getImage").html('<img src="../assets/img/ts-avatar.jpg" class="img-thumbnail img-fluid align-self-center" width="280px">');

					}

				}
			});
		});

		//delete a profile of an user
		$("body").on("click",".deleteUserIcon",function(e){
			e.preventDefault();

		del_id = $(this).attr('id');
		Swal.fire({
			title:'Are You Sure?',
			text:"You Won't Be Able To Revert This!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor:'#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText:'Yes,delete it!',
		}).then((result)=>{
			if(result.value){
				$.ajax({
			url:'assets/php/admin-action.php',
				method:'post',
				data: {del_id: del_id},
				success:function(response){
					Swal.fire(
					'Deleted!',
					'Note deleted successfully!',
					'success',
					)
					fetchAllUsers();
				}
			});
				}
		})
		});

		//cHECK NOTIFICATION
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
