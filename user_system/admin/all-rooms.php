<?php
require_once 'assets/php/admin-header.php';
?>
<div id="delAlert"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="card my-2 border-success">
			<div class="card-header bg-success text-white">
				<h4 class="m-0">Total Rooms</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive" id="showAllrooms">
					<p class="text-center align-self-center lead">Please Wait...</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--display user detail
<div class="modal fade" id="showroomDetailsModal">
	<div class="modal-dialog modal-dialog-centered mw-100 w-50">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="getName"></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
					<div class="card border-primary">
						<div class="card-body">
							<p id="getgender"></p>
							<p id="getseater"></p>
							<p id="getfirst"></p>
							<p id="getsecound"></p>
							<p id="getthird"></p>
							<p id="getfourth"></p>
							<p id="getfifth"></p>
							<p id="getfees"></p>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
Footer area-->

<!-- start edit new note-->
<div class="modal fade" id ="editroomModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h4 class="modal-title text-light">Edit Room</h4>
				<button type="button" class="close text-light" data-dismiss="modal">&times;</button>

			</div>
<div class="modal-body">
	<form action="#" method="post" id="room-note-form" class="px-3">
		<input type="hidden" name="id" id="id">

		<div class="form-group">
			<div class="col-sm-8">
						<label for="roomno" class="m-1"><b><i>Room No</i></b></label>
			<input type="text" name="roomno" id="roomno" class="form-control form-control-lg" placeholder="room no" readonly>
		</div></div>

		<div class="form-group">
			<div class="col-sm-8">
						<label for="gender" class="m-1"><b><i>Gender</i></b></label>
			<input type="text" name="gender" id="gender" class="form-control form-control-lg" placeholder="Gender" readonly>
		</div></div>

		<div class="form-group ">
						<div class="col-sm-8">
						<label for="seater" class="m-1"><b><i>Seater</i></b></label>
						<input type="text" name="seater" id="seater" class="form-control form-control-lg" placeholder="Seaterr" readonly>
		</div></div>



		<div class="form-group">
			<div class="col-sm-8">
						<label for="seater" class="m-1"><b><i>Fees</i></b></label>
			<input type="text" name="fees" id="fees" class="form-control form-control-lg" placeholder="Enter fees" required>
		</div></div>

		<input type="hidden" name="seater1" id="seater1">
		<div class="form-group">
			<input type="submit" name="editroom" id="editroomBtn" value="Update Room" class="btn btn-info btn-block btn-lg">
		</div>
	</form>
</div>
		</div>
	</div>
</div>
<!-- end edit new note-->

			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript">
	$(document).ready(function(){
		//fetch All Users Ajax requet
		fetchAllroms();
		function fetchAllroms(){
			$.ajax({
				url:'assets/php/admin-action.php',
				method: 'post',
				data: {action: 'fetchAllroms'},
				success:function(response){
					$("#showAllrooms").html(response);
					$("table").DataTable({
						order: [0,'desc']
					});
				}
			});
		}

		$("body").on("click",".editBtn",function(e){
			e.preventDefault();

			edit_id = $(this).attr('id');

			$.ajax({
				url: 'assets/php/admin-action.php',
				method: 'post',
				data: {edit_id: edit_id},
				success:function(response){
					data = JSON.parse(response);
					$("#id").val(data.id);
					$("#roomno").val(data.room_no);
					$("#gender").val(data.gender);
					$("#seater").val(data.seater);
					$("#fees").val(data.fees);
					$("#seater1").val(data.seater1);
				}
			});
		});

		//update the room of the room created
		$("#editroomBtn").click(function(e){
			if($("#room-note-form")[0].checkValidity()){
				e.preventDefault();

				$.ajax({

					url: 'assets/php/admin-action.php',
					method: 'post',
					data: $("#room-note-form").serialize()+"&action=update_note",
					success:function(response){
						Swal.fire({
							title: 'Room has been updated Successfully!',
							type: 'success'
						});
						$("#room-note-form")[0].reset();
						$("#editroomModal").modal('hide');
						fetchAllroms();
					}
				});
			}
		});

		//delete room of a user

		$("body").on("click",".deleteBtn",function(e){
			e.preventDefault();

		del_room = $(this).attr('id');
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
				data: {del_room: del_room},
				success:function(response){
					$("#delAlert").html(response);
					fetchAllroms();
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
