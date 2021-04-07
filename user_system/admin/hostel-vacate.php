<?php
require_once 'assets/php/admin-header.php';
?>
<div class="row">
	<div class="col-lg-12">
		<div class="card my-2 border-danger">
			<div class="card-header bg-danger text-white">
				<h4 class="m-0">Total Hostel Vacated Users</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive" id="showAllhostel1">
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
		fetchhostelUsers1();
		function fetchhostelUsers1(){
			$.ajax({
				url:'assets/php/admin-action.php',
				method: 'post',
				data: {action: 'fetchhostelUsers1'},
				success:function(response){
					$("#showAllhostel1").html(response);
					$("table").DataTable({
						order: [0,'desc']
					});
				}
			});
		}
		

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
