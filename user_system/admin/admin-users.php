<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card my-2 border-success">
			<div class="card-header bg-success text-white">
				<h4 class="m-0">Total Registered Users</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive" id="showAllUsers">
					<p class="text-center align-self-center lead">Please Wait...</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--display user details-->
<div class="modal fade" id="showUserDetailsModal">
	<div class="modal-dialog modal-dialog-centered mw-100 w-50">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="getName"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="card-deck">
					<div class="card border-primary">
						<div class="card-body">
							<p id="getEmail"></p>
							<p id="getPhone"></p>
							<p id="getDob"></p>
							<p id="getGender"></p>
							<p id="getCreated"></p>
							<p id="getVerified"></p>
						</div>
					</div>
					<div class="card align-self-center" id="getImage"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
		fetchAllUsers();
		function fetchAllUsers(){
			$.ajax({
				url:'assets/php/admin-action.php',
				method: 'post',
				data: {action: 'fetchAllUsers'},
				success:function(response){
					$("#showAllUsers").html(response);
					$("table").DataTable({
						order: [0,'desc']
					});
				}
			});
		}
		//display user in details ajax requeset
		$("body").on("click",".userDetailsIcon",function(e){
			e.preventDefault();

			details_id = $(this).attr('id');
			$.ajax({
				url:'assets/php/admin-action.php',
				type: 'post',
				data: {details_id: details_id },
				success:function(response){
					data = JSON.parse(response);
					$("#getName").text(data.users.name+' '+' (ID: '+data.id+')');
					$("#getEmail").text('Email : '+data.email);
					$("#getPhone").text('Phone : '+data.phone);
					$("#getGender").text('Gender : '+data.gender);
					$("#getDob").text('DOB : '+data.dob);
					$("#getCreated").text('Joined On : '+data.created_at);
					$("#getVerified").text('Verified : '+data.verified);

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
