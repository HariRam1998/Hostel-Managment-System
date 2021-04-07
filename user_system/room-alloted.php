<?php

require_once'assets/php/header.php';
?>



<div class="container">
<div class="row justify-content-center">
	<div class="col-lg-12">
		<?php if($verified == 'Verified!'):?>
		<div class="card my-2 border-info">
			<div class="card-header bg-info text-white">
				<h4 class="m-0">Allotment Details</h4>
			</div>
			<div class="card-body">
						<h2 class="page-title"></h2>
								<table id="zctb" class="table table-bordered " cellspacing="0" width="100%">
									
									
									<tbody>

										<tr>
<td colspan="4"><h4>Room Realted Info</h4></td>
<td><a href="javascript:void(0);"  onClick="winds();" title="View Full Details">Print Data</a></td>
<th rowspan="2"><?php if(!$cphoto):?>
<img src="assets/img/ts-avatar.jpg" class="img-thumbnail img-fluid" width="120px">
<?php else: ?>
<img src="<?= 'assets/php/'.$cphoto; ?>" class="img-thumbnail img-fluid" width="120px">
<?php endif;?></th>
</tr>
<tr>
<td colspan="4"><b>Reg no. :</b><?=$cid; ?></td>
</tr>



<tr>
<td><b>Room no :</b></td>
<td><?=$room; ?></td>
<td><b>Seater :</b></td>
<td><?=$seater; ?></td>
<td><b>Fees :</b></td>
<td><?=$fees; ?></td>
</tr>

<tr>
<td><b>Food Status:</b></td>
<td><?=$food; ?>
</td>
<td><b>Stay From :</b></td>
<td><?=$allottime; ?></td>
<td><b>Duration:</b></td>
<td><?=$stay; ?></td>
<!--<td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>-->
</tr>


<tr>
<td colspan="6"><b>Total Fee : 
</b></td>
</tr>
<tr>
<td colspan="6"><h4>Personal Info</h4></td>
</tr>

<tr>
<td><b>Hostel Id. :</b></td>
<td><?=$bookid; ?></td>
<td><b>Full Name :</b></td>
<td><?=$cname; ?></td>
<td><b>Email :</b></td>
<td><?=$cemail; ?></td>
</tr>


<tr>
<td><b>Contact No. :</b></td>
<td><?=$cphone; ?></td>
<td><b>Gender :</b></td>
<td><?=$cgender; ?></td>
<td><b>Course :</b></td>
<td><?=$course; ?></td>
</tr>


<tr>
<td><b>Emergency Contact No. :</b></td>
<td><?=$emerno; ?></td>
<td><b>Guardian Name :</b></td>
<td><?=$guardname; ?></td>
<td><b>Guardian Relation :</b></td>
<td><?=$guardrel; ?></td>
</tr>

<tr>
<td><b>Guardian Contact No. :</b></td>
<td colspan="6"><?=$guardno; ?></td>
</tr>

<tr>
<td colspan="6"><h4>Addresses</h4></td>
</tr>
<tr>
<td><b>Correspondense Address</b></td>
<td colspan="8">
<?=$guardadd; ?><br />
<?=$state; ?><br />
<?=$pincode; ?>

</td>

</tr>

</tbody>
</table>
</div>
				<?php else: ?>
					<h1 class="text-center text-secondard mt-5">Verify Your E-mail First to Find Allotment!</h1>
				<?php endif; ?>
</div></div></div></div></div></div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js "></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
<script language="javascript" type="text/javascript">


function winds(){
	var newWindowObj = window.open("http://localhost/user_system/full-profile.php?id=<?=$cemail?>","newWindow","menubar = true,location=true,resizable=false,scrollbars=false,width=500,height=400,top=200,left=200");
}
</script>
<script type="text/javascript">
	$(document).ready(function(){
checkNotification();
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