<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card my-2 border-warning">
			<div class="card-header bg-warning text-white">
				<h4 class="m-0">Allocate Room to users</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive" id="showAllBookings">
					<p class="text-center align-self-center lead">Please Wait...</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Reply feedback modal-->
<div class="modal fade" id="showAllotModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Allot Room</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form method="post" action="#" class="px-3" id="allot-form">
					<div id="rAlert"></div>
					
					<div class="form-group ">
						<div class="col-sm-8">
						<label for="room" class="col-sm-2 control-label m-0"><b><i>Room</i></b></label>
						<input type="text" name="mess" id="mess" class="form-control rounded-1" placeholder="Room">
					</div></div>

					

						<div class="form-group">
						<input type="submit" name="submit" value="Submit" class="btn btn-primary btn-block" id="RoomReplyBtn">
					</div>
				</form>
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
			//fetch All hostel unalloted Users Ajax requet
		fetchAllBookings();
		function fetchAllBookings(){
			$.ajax({
				url:'assets/php/admin-action.php',
				method: 'post',
				data: {action: 'fetchAllBookings'},
				success:function(response){
					$("#showAllBookings").html(response);
					$("table").DataTable({
						order: [0,'desc']
					});
				}
			});
		}

		//get the current Selected Uid and booking id
		var uid;
		var bid;
		$("body").on("click",".replyAllotIcon",function(e){
			uid = $(this).attr('id');
			bid = $(this).attr('bid');
			gen = $(this).attr('gen');
			seat = $(this).attr('seat');

		});
		//allocate room for students
		$("#RoomReplyBtn").click(function(e){
			if($("#allot-form")[0].checkValidity()){
				let mess = $("#mess").val();
				e.preventDefault();
				$("#RoomReplyBtn").val('Please Wait...');

				$.ajax({
					url: 'assets/php/admin-action.php',
					method: 'post',
					data: {uid: uid, mess: mess, bid: bid, gen: gen,seat: seat},
					success:function(response){
						$("#RoomReplyBtn").val('Submit');
						$("#rAlert").html(response);
						$("#allot-form")[0].reset();
						fetchAllBookings();
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
