<?php
  require_once 'admin-db.php';
  
  $admin = new Admin();
session_start();

  //handle admin login ajax request
  if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
  	$username = $admin->test_input($_POST['username']);
  	$password = $admin->test_input($_POST['password']);

  	$hpassword=sha1($password);
  	$loggedInAdmin = $admin->admin_login($username,$hpassword);

  	if($loggedInAdmin != null){
  		echo $admin->showMessage('success','Wait for 5 secounds');
  		$_SESSION['username'] = $username;
  	}else{
  		echo $admin->showMessage('danger','Username or Password is Incorrect!');
  	}
  }

//Handle Fetch All Users Ajax Request
  if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers'){
  	$output ='';
  	$data =$admin->fetchAllUsers(0);
  	$path = '../assets/php/';

  	if($data){
  		$output .= '<table class="table table-striped table-bordered text-center">
  		<thead>
  		<tr>
  		<th>#</th>
  		<th>Image</th>
  		<th>Name</th>
  		<th>E-Mail</th>
  		<th>Phone</th>
  		<th>Gender</th>
  		<th>Verified</th>
  		<th>Action</th>
  		</tr>
  		</thead>
  		<tbody>';
  		foreach ($data as $row) {
  			if($row['photo'] != ''){
  				$uphoto = $path.$row['photo'];
  			}else{
  				$uphoto = '../assets/img/ts-avatar.jpg';
  			}
  			$output .= '<tr>
  		<td>'.$row['id'].'</td>
  		<td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
  		<td>'.$row['name'].'</td>
  		<td>'.$row['email'].'</td>
  		<td>'.$row['phone'].'</td>
  		<td>'.$row['gender'].'</td>
  		<td>'.$row['verified'].'</td>
  		<td>
  		<a href="#" id="'.$row['id'].'" title="View Details" class="text-primary userDetailsIcon" data-toggle="modal" data-target="#showUserDetailsModal" ><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;
  		<a href="#" id="'.$row['id'].'" title="Delete User" class="text-danger deleteUserIcon"><i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;

  		</td>
  		</tr>';
  		}
  		$output .='</tbody>
  		</table>';
  		echo $output;

  		
  	}
  	else{
  		echo '<h3 class="text-center text-secondary">:( No any user registered yet!</h3>';
  	}
  }
  //handle display user in Details Ajax Request
  if(isset($_POST['details_id'])){
  	$id = $_POST['details_id'];

  	$data = $admin->fetchUserDetailsById($id);
  	echo json_encode($data);
  }
  //handle delete an user ajax request
if(isset($_POST['del_id'])){
	$id = $_POST['del_id'];
	$admin->userAction($id,0);

  }
  //handle details of an user in hostelregister.php
  if(isset($_POST['action']) && $_POST['action'] == 'fetchhostelUsers'){
    $output ='';
    $data =$admin->fetchhostelUsers();
    $path = '../assets/php/';

    if($data){
      $output .= '<table class="table table-striped table-bordered text-center table-sm" width="100%">
      <thead>
      <tr>
      <th><h6><small><b>#</b></small></h6></th>
      <th>Image</th>
      <th><h6><small><b>Name</b></small></h6></th>
      <th><h6><small><b>Gender</b></small></h6></th>
      <th><h6><small><b>Email</b></small></h6></th>
      <th><h6><small><b>Phone</b></small></h6></th>
      <th><h6><small><b>Alternate number</b></small></h6></th>
      <th><h6><small><b>Address</b></small></h6></th>
      <th><h6><small><b>State</b></small></h6></th>
      <th><h6><small><b>Pincode</b></small></h6></th>
      </tr>
      </thead>
      <tbody>';
      foreach ($data as $row) {
        if($row['photo'] != ''){
          $uphoto = $path.$row['photo'];
        }else{
          $uphoto = '../assets/img/ts-avatar.jpg';
        }
        $output .= '<tr>
      <td><h6><small><b>'.$row['id'].'</b></small></h6></td>
      <td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
      <td><h6><small><b>'.$row['name'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['gender'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['email'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['phone'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['emergency_no'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['guardian_address'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['state'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['pincode'].'</b></small></h6></td>
      
      </tr>';
      }
      $output .='</tbody>
      </table>';
      echo $output;

      
    }
    else{
      echo '<h3 class="text-center text-secondary">:( No any user registered yet!</h3>';
    }
  }
  
  
//handle details of an vacate users in hostelvacate.php
  if(isset($_POST['action']) && $_POST['action'] == 'fetchhostelUsers1'){
    $output ='';
    $data =$admin->fetchhostelUsers1();
    $path = '../assets/php/';

    if($data){
      $output .= '<table class="table table-striped table-bordered text-center table-sm" width="100%">
      <thead>
      <tr>
      <th><h6><small><b>#</b></small></h6></th>
      <th>Image</th>
      <th><h6><small><b>Name</b></small></h6></th>
      <th><h6><small><b>Gender</b></small></h6></th>
      <th><h6><small><b>Email</b></small></h6></th>
      <th><h6><small><b>Phone</b></small></h6></th>
      <th><h6><small><b>Alternate number</b></small></h6></th>
      <th><h6><small><b>Address</b></small></h6></th>
      <th><h6><small><b>State</b></small></h6></th>
      <th><h6><small><b>Pincode</b></small></h6></th>
      </tr>
      </thead>
      <tbody>';
      foreach ($data as $row) {
        if($row['photo'] != ''){
          $uphoto = $path.$row['photo'];
        }else{
          $uphoto = '../assets/img/ts-avatar.jpg';
        }
        $output .= '<tr>
      <td><h6><small><b>'.$row['id'].'</b></small></h6></td>
      <td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
      <td><h6><small><b>'.$row['name'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['gender'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['email'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['phone'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['emergency_no'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['guardian_address'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['state'].'</b></small></h6></td>
      <td><h6><small><b>'.$row['pincode'].'</b></small></h6></td>
      
      </tr>';
      }
      $output .='</tbody>
      </table>';
      echo $output;

      
    }
    else{
      echo '<h3 class="text-center text-secondary">:( No any students Vacated  yet!</h3>';
    }
  }

  //handle fetch all deleted users ajax request
   if(isset($_POST['action']) && $_POST['action'] == 'fetchAllDeletedUsers'){
  	$output ='';
  	$data =$admin->fetchAllUsers(1);
  	$path = '../assets/php/';

  	if($data){
  		$output .= '<table class="table table-striped table-bordered text-center">
  		<thead>
  		<tr>
  		<th>#</th>
  		<th>Image</th>
  		<th>Name</th>
  		<th>E-Mail</th>
  		<th>Phone</th>
  		<th>Gender</th>
  		<th>Verified</th>
  		<th>Action</th>
  		</tr>
  		</thead>
  		<tbody>';
  		foreach ($data as $row) {
  			if($row['photo'] != ''){
  				$uphoto = $path.$row['photo'];
  			}else{
  				$uphoto = '../assets/img/ts-avatar.jpg';
  			}
  			$output .= '<tr>
  		<td>'.$row['id'].'</td>
  		<td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
  		<td>'.$row['name'].'</td>
  		<td>'.$row['email'].'</td>
  		<td>'.$row['phone'].'</td>
  		<td>'.$row['gender'].'</td>
  		<td>'.$row['verified'].'</td>
  		<td>
  		<a href="#" id="'.$row['id'].'" title="Restore User" class="text-white restoreUserIcon badge badge-dark p-2">Restore</a>

  		</td>
  		</tr>';
  		}
  		$output .='</tbody>
  		</table>';
  		echo $output;

  		
  	}
  	else{
  		echo '<h3 class="text-center text-secondary">:( No any user deleted yet!</h3>';
  	}
  }
//handle restore deleted user ajax request
  if(isset($_POST['res_id'])){
	$id = $_POST['res_id'];
	$admin->userAction($id,1);

  }
//handle fetch all notes ajax request
  if(isset($_POST['action']) && $_POST['action'] == 'fetchAllNotes'){
  	$output ='';
  	$note =$admin->fetchAllNotes();

  	if($note){
  		$output .= '<table class="table table-striped table-bordered text-center">
  		<thead>
  		<tr>
  		<th>#</th>
  		<th>User Name</th>
  		<th>User E-Mail</th>
  		<th>Note Title</th>
  		<th>Note</th>
  		<th>Written On</th>
  		<th>Updated On</th>
  		<th>Action</th>
  		</tr>
  		</thead>
  		<tbody>';
  		foreach ($note as $row) {
  			$output .= '<tr>
  		<td>'.$row['id'].'</td>
  	  	<td>'.$row['name'].'</td>
  		<td>'.$row['email'].'</td>
  		<td>'.$row['title'].'</td>
  		<td>'.$row['note'].'</td>
  		<td>'.$row['created_at'].'</td>
  		<td>'.$row['updated_at'].'</td>
  		<td>
  		<a href="#" id="'.$row['id'].'" title="Delete Note" class="text-danger deleteNoteIcon"><i class="fas fa-trash-alt fa-lg"></i>Delete</a>

  		</td>
  		</tr>';
  		}
  		$output .='</tbody>
  		</table>';
  		echo $output;

  		
  	}
  	else{
  		echo '<h3 class="text-center text-secondary">:( No Any Note Written yet!</h3>';
  	}
  }
  //Handle Delete Note of an user
  if(isset($_POST['note_id'])){
	$id = $_POST['note_id'];
	$admin->deleteNoteOfUser($id);

  }
  //HANDLE FETCH ALL FEEDBACK OF THE USERS
  if(isset($_POST['action']) && $_POST['action'] == 'fetchAllFeedback'){
  	$output ='';
  	$feedback =$admin->fetchFeedback();

  	if($feedback){
  		$output .= '<table class="table table-striped table-bordered text-center">
  		<thead>
  		<tr>
  		<th>FID</th>
  		<th>UID</th>
  		<th>User Name</th>
  		<th>User E-Mail</th>
  		<th>Subject</th>
  		<th>Feedback</th>
  		<th>Sent On</th>
  		<th>Action</th>
  		</tr>
  		</thead>
  		<tbody>';
  		foreach ($feedback as $row) {
  			$output .= '<tr>
  		<td>'.$row['id'].'</td>
  		<td>'.$row['uid'].'</td>
  	  	<td>'.$row['name'].'</td>
  		<td>'.$row['email'].'</td>
  		<td>'.$row['subject'].'</td>
  		<td>'.$row['feedback'].'</td>
  		<td>'.$row['created_at'].'</td>
  		<td>
  		<a href="#" fid="'.$row['id'].'" id="'.$row['uid'].'" title="Reply" class="text-primary replyFeedbackIcon" data-toggle="modal" data-target="#showReplyModal"><i class="fas fa-reply fa-lg"></i>Reply</a>

  		</td>
  		</tr>';
  		}
  		$output .='</tbody>
  		</table>';
  		echo $output;

  		
  	}
  	else{
  		echo '<h3 class="text-center text-secondary">:( No Any Note Feedback Written yet!</h3>';
  	}
  }
  //handle reply feeedback to the user
  if(isset($_POST['message'])){
  	$uid = $_POST['uid'];
  	$message =$admin->test_input($_POST['message']);
  	$fid=$_POST['fid'];

  	$admin->replyFeedback($uid,$message);
  	$admin->feedbackReplied($fid);
  }
  //handle fetch notification ajax request
  if(isset($_POST['action']) && $_POST['action'] == 'fetchNotification'){
	$notification = $admin->fetchNotification();
	$output = '';

	if($notification){
		foreach ($notification as $row) {
			$output .='<div class="alert alert-dark" role="alert">
				<button type="button" id="'.$row['id'].'" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="alert-heading">New Notification</h4>
				<p class="mb-0 lead">'.$row['message'].' by '.$row['name'].'</p>
				<hr class="my-2">
				<p class="mb-0 float-left"><b>User E-Mail :</b>'.$row['email'].'</p>
				<p class="mb-0 float-right">'.$row['created_at'].'</p>
				<div class="clearfix"></div>
			</div>';
		}
		echo $output;
	}else
	{
		echo '<h3 class="text-center text-secondary mt-5">No any new Notification</h3>';
	}
}
//handle Check notificatiom
if(isset($_POST['action']) && $_POST['action'] == 'checkNotification'){
	if($admin->fetchNotification()){
	echo '<i class="fas fa-circle text-danger fa-sm"></i>';
	}else{
		echo '';
	}
}
//handle remove notification
if(isset($_POST['notification_id'])){
	$id = $_POST['notification_id'];
	$admin->removeNotification($id);
}
//handle expo all users in excel
if (isset($_GET['export']) && $_GET['export'] == 'excel'){
	header("Content-Type: application/xls");
	header("Content-Disposition: attachment; filename=users.xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	$data = $admin->exportAllUsers();
	echo '<table border="1" align=center>';
	echo  '<tr>
	<th>#</th>
	<th>Name</th>
	<th>E-Mail</th>
	<th>Phone</th>
	<th>Gender</th>
	<th>DOB</th>
	<th>Joined On</th>
	<th>Verified</th>
	<th>Deleted</th>

		</tr>';
		foreach ($data as $row) {
			echo '<tr>
			<td>'.$row['id'].'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['email'].'</td>
			<td>'.$row['phone'].'</td>
			<td>'.$row['gender'].'</td>
			<td>'.$row['dob'].'</td>
			<td>'.$row['created_at'].'</td>
			<td>'.$row['verified'].'</td>
			<td>'.$row['deleted'].'</td>

			</tr>';
		}
		echo '</table>';
}
//Handle room Register Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'room'){
 $room_id = $admin->test_input($_POST['room_no']);
 $gender = $admin->test_input($_POST['gender']);
 $seat = $admin->test_input($_POST['seater']);
 $fee = $admin->test_input($_POST['fees']);
 $seat1 = $admin->test_input($_POST['seater']);

 if($admin->room_exist($room_id)){
  echo $admin->showMessage('warning','This room is already present');
 }
 else
 {
if($gender === 'male'){

  if($admin->roompresent($room_id,$seat,$gender,$fee,$seat1)){
    $admin->roompresent1($room_id,1);
    echo $admin->showMessage('success','Room Added Successfully');
  }else{
    echo $admin->showMessage('danger','Something went wrong');
  }
}
  else{

    if($admin->roompresent($room_id,$seat,$gender,$fee,$seat1)){
      $admin->roompresent1($room_id,0);
    echo $admin->showMessage('success','Room Added Successfully');
  }else{
    echo $admin->showMessage('danger','Something went wrong');
  }
  }


}
  
 }

//Handle  vacate room Register Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'vacate'){
$roll_no = $admin->test_input($_POST['roll_no']);
$hoste =$admin->test_input($_POST['hostel_no']);
$room_id = $admin->test_input($_POST['room_no']);
$room_alloted = $admin->test_input($_POST['room_no']);

 

 if($admin->room_exist($room_id)){

  if($admin->user2($room_id,$hoste)){

   if($admin->vacater($hoste)){

    if($admin->updateroom5($room_alloted,4))
{
$admin->yoga4($hoste);
         $admin->updateji0($room_alloted,5);
         echo $admin->showMessage('success','Room has been Vacated');

      }elseif($admin->updateroom5($room_alloted,3)){
$admin->yoga4($hoste);
         $admin->updateji0($room_alloted,4);
         echo $admin->showMessage('success','Room has been Vacated');

      }elseif($admin->updateroom5($room_alloted,2)){
$admin->yoga4($hoste);
         $admin->updateji0($room_alloted,3);
         echo $admin->showMessage('success','Room has been Vacated');

      }elseif($admin->updateroom5($room_alloted,1)){
$admin->yoga4($hoste);
         $admin->updateji0($room_alloted,2);
         echo $admin->showMessage('success','Room has been Vacated');

      }elseif($admin->updateroom5($room_alloted,0)){
$admin->yoga4($hoste);
         $admin->updateji0($room_alloted,1);
         echo $admin->showMessage('success','Room has been Vacated');
       }
else{

      }
}

  }else{

    echo $admin->showMessage('warning',' Check the data properly! ');
  }

 }else{
    echo $admin->showMessage('warning','No Such Type Of Room! ');
  }
 }

 //Handle  change room Register Ajax Request
if(isset($_POST['action']) && $_POST['action'] == 'change'){
$roll_no = $admin->test_input($_POST['roll_no']);
$hoste =$admin->test_input($_POST['hostel_no']);
$bid =$admin->test_input($_POST['hostel_no']);
$room_id = $admin->test_input($_POST['room_no']);
$room_id1 = $admin->test_input($_POST['room_no1']);
$room_alloted = $admin->test_input($_POST['room_no1']);
$gender = $admin->test_input($_POST['gender']);
$seater = $admin->test_input($_POST['seater']);

$jap = $admin->room_exist1($room_id);

if($admin->room_exist($room_id)){

  if($admin->room_exist2($room_id,$hoste)){

if($admin->room_exist3($room_id1)){

  if($jap['gender'] === 'male'){

    if($admin->room_exist4($room_id1)){

      if($admin->vacater($hoste)){

if($admin->updateroom5($room_alloted,5)){

        $admin->replyallot($bid,$room_alloted);
        $admin->updateji0($room_alloted,4);
        echo $admin->showMessage('success','Room has been Alloted');
        if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }elseif($admin->updateroom5($room_alloted,4)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,3);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }elseif($admin->updateroom5($room_alloted,3)){
         $admin->replyallot($uid,$room_alloted);
         $admin->updateji0($room_alloted,2);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }elseif($admin->updateroom5($room_alloted,2)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,1);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }elseif($admin->updateroom5($room_alloted,1)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,0);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }else{

      }

    }


    }else{

      echo $admin->showMessage('warning','Please Choose Another room !');
    }


  }else{

    if($admin->room_exist5($room_id1)){

      if($admin->vacater($hoste)){

if($admin->updateroom5($room_alloted,5)){

        $admin->replyallot($bid,$room_alloted);
        $admin->updateji0($room_alloted,4);
        echo $admin->showMessage('success','Room has been Alloted');
        if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }elseif($admin->updateroom5($room_alloted,4)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,3);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }
      elseif($admin->updateroom5($room_alloted,3)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,2);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }elseif($admin->updateroom5($room_alloted,2)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,1);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }elseif($admin->updateroom5($room_alloted,1)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,0);
         echo $admin->showMessage('success','Room has been Alloted');
         if($admin->updateroom51($room_id,4))
{
         $admin->updateji1($room_id,5);

      }elseif($admin->updateroom51($room_id,3)){

         $admin->updateji1($room_id1,4);

      }elseif($admin->updateroom51($room_id,2)){

         $admin->updateji1($room_id,3);

      }elseif($admin->updateroom51($room_id1,1)){

         $admin->updateji1($room_id,2);
        

      }elseif($admin->updateroom51($room_id,0)){

         $admin->updateji1($room_id,1);

       }
else{

      }

      }else{

      }

    }


    }else{

      echo $admin->showMessage('warning','Please Choose Another bitch !');
    }


  }



}else{

  echo $admin->showMessage('warning','No Such room is Available !');
}

  }else{
    echo $admin->showMessage('warning','No Such Type Of User Available in That Room!');
  }


}else{
  echo $admin->showMessage('warning','No Such Type Of Room available!');
}







/*if($jap['gender'] === 'male'){

   

}
else{


}

  if($admin->room_exist($room_id)){

  if(){


  }else{
    echo $admin->showMessage('warning','No such type of new room available!');
  }
}else{
  echo $admin->showMessage('warning','No such type of  current room available!');
}*/

 

 
 }

//handle fetch all users for booking
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllBookings'){
    $output ='';
    $booking =$admin->fetchAlldetails();

    if($booking){
      $output .= '<table class="table table-striped table-bordered text-center">
      <thead>
      <tr>
      <th>BID</th>
      <th>UID</th>
      <th>User Name</th>
      <th>User Gender</th>
      <th>Seater</th>
      <th>Action</th>
      </tr>
      </thead>
      <tbody>';
      foreach ($booking as $row) {
        $output .= '<tr>
      <td>'.$row['id'].'</td>
      <td>'.$row['uid'].'</td>
        <td>'.$row['name'].'</td>
      <td>'.$row['gender'].'</td>
      <td>'.$row['seater'].'</td>
      <td>
      <a href="#" bid="'.$row['id'].'" id="'.$row['uid'].'" gen="'.$row['gender'].'" seat="'.$row['seater'].'" title="Allot" class="text-primary replyAllotIcon" data-toggle="modal" data-target="#showAllotModal"><i class="fas fa-reply fa-lg"></i>Allot</a>

      </td>
      </tr>';
      }
      $output .='</tbody>
      </table>';
      echo $output;

      
    }
    else{
      echo '<h3 class="text-center text-secondary">:( No Users to Allot room</h3>';
    }
  }
//submit the room no for allocation
  if(isset($_POST['mess'])){
    $uid =$_POST['uid'];
    $room_alloted = $admin->test_input($_POST['mess']);
    $bid = $_POST['bid'];
    $gen =$_POST['gen'];
    $seat =$_POST['seat'];


    if($admin->findrooms($room_alloted,$gen,$seat)){

      if($admin->updateroom5($room_alloted,5)){

        $admin->replyallot($bid,$room_alloted);
        $admin->updateji0($room_alloted,4);
        $admin->roomji($bid);
        echo $admin->showMessage('success','Room has been Alloted');

      }elseif($admin->updateroom5($room_alloted,4)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,3);
         $admin->roomji($bid);
         echo $admin->showMessage('success','Room has been Alloted');

      }elseif($admin->updateroom5($room_alloted,3)){
         $admin->replyallot($uid,$room_alloted);
         $admin->updateji0($room_alloted,2);
         $admin->roomji($bid);
         echo $admin->showMessage('success','Room has been Alloted');

      }elseif($admin->updateroom5($room_alloted,2)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,1);
         $admin->roomji($bid);
         echo $admin->showMessage('success','Room has been Alloted');

      }elseif($admin->updateroom5($room_alloted,1)){
         $admin->replyallot($bid,$room_alloted);
         $admin->updateji0($room_alloted,0);
         $admin->roomji($bid);
         echo $admin->showMessage('success','Room has been Alloted');

      }else{

      }
    }else{
      echo $admin->showMessage('warning','there is no type of room available');
    }
  }




  //Handle Fetch All Users Ajax Request
  if(isset($_POST['action']) && $_POST['action'] == 'fetchAllroms'){
    $output ='';
    $data =$admin->fetchrooms();

    if($data){
      $output .= '<table class="table table-striped table-bordered text-center">
      <thead>
      <tr>
      <th>Room NO</th>
      <th>Gender</th>
      <th>Seater Left</th>
      <th>Total Seater</th>
      <th>Fees</th>
      <th>Action</th>
      </tr>
      </thead>
      <tbody>';
      foreach ($data as $row) {

        $output .= '<tr>
      <td>'.$row['room_no'].'</td>
      <td>'.$row['gender'].'</td>
      <td>'.$row['seater'].'</td>
      <td>'.$row['seater1'].'</td>
      <td>'.$row['fees'].'</td>
                  <td>

              <a href="#" id="'.$row['id'].'" title="Edit Room" class="text-primary editBtn"><i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editroomModal"></i></a>&nbsp;

              <a href="#" id="'.$row['id'].'" title="Delete Room" class="text-danger deleteBtn"><i class="fas fa-trash fa-lg"></i></a>
            </td>

    
      </tr>';
      }
      $output .='</tbody>
      </table>';
      echo $output;

      
    }
    else{
      echo '<h3 class="text-center text-secondary">:( No any room has been added yet!</h3>';
    }
  }

  //handle details of all-rooms.php displays all the rooms
  if(isset($_POST['edit_id'])){
    $id = $_POST['edit_id'];

    $row =$admin->fetchAllrooms($id);
    echo json_encode($row);
  }

  //handle delete of a room
   if(isset($_POST['del_room'])){
    $id = $_POST['del_room'];

    if($admin->goya1($id)){

      $admin->goya2($id);
      echo $admin->showMessage('success','Room is deleted');

    }else{
      echo $admin->showMessage('warning','room cannot be deleted as it is having some students');
    }

    
}
//handle update room of ajax request
  if(isset($_POST['action']) && $_POST['action'] == 'update_note'){
  $id = $admin->test_input($_POST['id']);
  print_r($id);
  $roomno = $admin->test_input($_POST['roomno']);
  $gender = $admin->test_input($_POST['gender']);
  $seater = $admin->test_input($_POST['seater']);
  $fees = $admin->test_input($_POST['fees']);
  $seater1 = $admin->test_input($_POST['seater']);

  $admin->goya($id,$fees);

  }
//handle add new ajax request
  if(isset($_POST['action']) && $_POST['action']=='add_blog'){
$title=$admin->test_input($_POST['title']);
$note=$admin->test_input($_POST['note']);

$admin->add_new_note1($title,$note);

}
//handle display all notes of an user
if(isset($_POST['action']) && $_POST['action'] =='display_notes1'){
  $output='';

  $notes=$admin->get_blog1();
  if($notes){
  $output .='<table class="table table-striped text-center">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Note</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>';
        foreach($notes as $row){
          $output .='<tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['title'].'</td>
            <td>'.substr($row['note'],0,75).' ...</td>
            <td>
              <a href="#" id="'.$row['id'].'" title="View Details" class="text-success infoBtn"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;

              <a href="#" id="'.$row['id'].'" title="Edit Note" class="text-primary editBtn"><i class="fas fa-edit fa-lg" data-toggle="modal" data-target="#editNoteModal"></i></a>&nbsp;

              <a href="#" id="'.$row['id'].'" title="Delete Note" class="text-danger deleteBtn"><i class="fas fa-trash fa-lg"></i></a>
            </td>

          </tr>';
        }
        $output .='</tbody></table>';
        echo $output;

}else
{
  echo '<h3 class="text-center text-secondary">:(You have not written any blog-info yet ! Write your first note now!</h3>';
}
}
//handle edit note of an user ajax request
if(isset($_POST['edit_id1'])){

  $id = $_POST['edit_id1'];

  $row = $admin->edit_note1($id);
  echo json_encode($row);
}
//handle update note of an user ajax request
if(isset($_POST['action']) && $_POST['action'] == 'update_note1'){
//  print_r($_POST);
$id = $admin->test_input($_POST['id']);
  $title = $admin->test_input($_POST['title']);
  $note = $admin->test_input($_POST['note']);
  
  $admin->update_note1($id,$title,$note);
}
//HANDLE deleete a note of an user ajax request
if(isset($_POST['del_id1'])){
$id = $_POST['del_id1'];
$admin->delete_note1($id);
}
//HANDLE displau a note of an user ajax request
if(isset($_POST['info_id1'])){
$id = $_POST['info_id1'];
$row = $admin->edit_note1($id);
echo json_encode($row);
}

?>


      