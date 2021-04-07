<?php 
require_once 'config.php';
class Admin extends Database{
	//Admin Login
	public function admin_login($username,$password){
		$sql ="SELECT username, password FROM admin WHERE username = :username AND password = :password";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['username'=> $username, 'password'=>$password]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
	//count total no of rows
	public function totalCount($tablename){
		$sql ="SELECT * FROM  $tablename";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$count = $stmt->rowCount();
		return $count;
	}
//Count total verified users
public function verified_users($status){
		$sql ="SELECT * FROM users WHERE verified = :status";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['status'=>$status]);
		$count = $stmt->rowCount();
		return $count;
	}	
	//gender percentage
	public function genderPer(){
		$sql = "SELECT gender, COUNT(*) AS number FROM users WHERE gender != '' GROUP BY gender";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}	
	//users verified/unverified 
public function verifiedPer(){
		$sql ="SELECT verified, COUNT(*) AS number FROM users GROUP BY verified";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
//count website hits
	public function site_hits(){
		$sql ="SELECT hits FROM visitors";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$count = $stmt->fetch(PDO::FETCH_ASSOC);
		return $count;
	}
	//fetch all registered users
	public function fetchAllUsers($val){
		$sql = "SELECT * FROM users WHERE deleted != $val";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	
	}
	//fetch all hostel's details
	public function fetchhostelUsers(){
		$sql ="SELECT users.gender,users.id,users.name,users.email,users.phone,users.photo,bookhostel.uid,bookhostel.emergency_no,bookhostel.guardian_address,bookhostel.state,bookhostel.pincode FROM bookhostel INNER JOIN users ON bookhostel.uid = users.id WHERE room_alloted != 3 ORDER BY bookhostel.id DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function fetchhostelUsers1(){
		$sql ="SELECT users.gender,users.id,users.name,users.email,users.phone,users.photo,bookhostel.uid,bookhostel.emergency_no,bookhostel.guardian_address,bookhostel.state,bookhostel.pincode FROM bookhostel INNER JOIN users ON bookhostel.uid = users.id WHERE room_alloted = 2 ORDER BY bookhostel.id DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	


	//fetch user's details by id
	public function fetchUserDetailsById($id){
		$sql = "SELECT * FROM users WHERE id =:id AND deleted !=0";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;


	}
	//delete a user from the data
	public function userAction($id,$val){
		$sql = "UPDATE users SET deleted = $val WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		return true;
}
//fetch all notes with user details
public function fetchAllNotes(){
		$sql ="SELECT notes.id,notes.title,notes.note,notes.created_at,notes.updated_at,users.name,users.email FROM notes INNER JOIN users ON notes.uid = users.id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	
}
//delete a note of an user by admin
public function deleteNoteOfUser($id){
	$sql=" DELETE FROM notes WHERE id = :id";
	$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		return true;
	
}
//fetch all feedback of users 
public function fetchFeedback(){
		$sql ="SELECT feedback.id,feedback.subject,feedback.feedback,feedback.created_at,feedback.uid,users.name,users.email FROM feedback INNER JOIN users ON feedback.uid = users.id WHERE replied != 1 ORDER BY feedback.id DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
}
//reply to user
public function replyFeedback($uid,$message){
		$sql ="INSERT INTO notification (uid, type, message) VALUES(:uid,'user',:message)";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['uid'=> $uid, 'message'=>$message]);
		return true;
	}
	
	//set feedback replied
public function feedbackReplied($fid){
		$sql = "UPDATE feedback SET replied = 1 WHERE id = :fid";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['fid'=>$fid]);
		return true;
}	
//fetch notification
public function fetchNotification(){
		$sql ="SELECT notification.id,notification.message,notification.created_at,users.name,users.email FROM notification INNER JOIN users ON notification.uid = users.id WHERE type= 'admin' ORDER BY notification.id DESC LIMIT 5";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
}
//Remove Notification 
public function removeNotification($id){
$sql ="DELETE FROM notification WHERE id = :id AND type ='admin'";
        $stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		return true;
}
//fetch all users from db
public function exportAllUsers(){
	$sql="SELECT * FROM users";
	 $stmt = $this->conn->prepare($sql);
		$stmt->execute();
		
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;

}

public function roompresent($room_no,$seater,$gender,$fees,$seater1){
	$sql="INSERT INTO rooms (room_no, seater, gender, fees,seater1) VALUES(:room_id,:seat,:gender,:fee,:seat1)";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['room_id'=>$room_no,'seat'=>$seater,'gender'=>$gender,'fee'=>$fees,'seat1'=>$seater1]);
	return true;

}
//to chech whether it is male or not
public function roompresent1($room_no,$statue){
	$sql = "UPDATE rooms SET room_my = :statue  WHERE room_no = :room_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id'=>$room_no,'statue'=>$statue]);
		return true;
}
//cheching room is already entered
public function room_exist($room_no){
	$sql="SELECT room_no FROM rooms WHERE room_no = :room_id";
	 $stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id'=>$room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}

//cheching room is already entered
public function room_exist1($room_no){
	$sql="SELECT * FROM rooms WHERE room_no = :room_id";
	 $stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id'=>$room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}
public function room_exist2($roomno,$hid){
	$sql="SELECT * FROM room_logs WHERE roomno = :room_id AND hid = :hoste";
	 $stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id'=>$roomno,'hoste'=>$hid]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}

public function room_exist3($room_no){
	$sql="SELECT * FROM rooms WHERE room_no = :room_id1 AND seater > 0 ";
	 $stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id1'=>$room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}
public function room_exist4($room_no){
	$sql="SELECT * FROM rooms WHERE room_no = :room_id1 AND seater > 0 AND room_my = 1 ";
	 $stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id1'=>$room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}
public function room_exist5($room_no){
	$sql="SELECT * FROM rooms WHERE room_no = :room_id1 AND seater > 0 AND room_my = 0 ";
	 $stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id1'=>$room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}

//fetch all rooms
public function fetchAllrooms($id){
	$sql ="SELECT * FROM rooms WHERE id = :id";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['id'=>$id]);
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	return $result;

}
//fetch all bookings
public function fetchAlldetails(){
	$sql ="SELECT bookhostel.id, bookhostel.seater, bookhostel.uid, users.name, users.gender FROM bookhostel  INNER JOIN users ON bookhostel.uid = users.id  WHERE room_alloted = 0 ORDER BY bookhostel.id DESC";
	$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
}
//allot room
public function replyallot($hid,$room_alloted){
	$sql = "INSERT INTO room_logs (hid,roomno) VALUES (:bid,:room_alloted)";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['bid'=>$hid,'room_alloted'=> $room_alloted]);
		return true;
}	

//insert into room alloted
public function roomji($id){
	$sql = "UPDATE bookhostel SET room_alloted = 1  WHERE id = :bid";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['bid'=>$id]);
		return true;
}

//to find the room is present or not
public function findrooms($room_no,$gender,$seater1){
	$sql = "SELECT * FROM rooms WHERE room_no = :room_alloted AND gender= :gen AND seater1 = :seat AND seater > 0";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no,'gen'=>$gender,'seat'=>$seater1]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result; 
}	
//updating status of the room
public function updateroom5($room_no,$stat){
	   $sql = "SELECT * FROM rooms WHERE room_no = :room_alloted AND seater = :stat";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no,'stat'=>$stat]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	public function updateroom51($room_no,$stat){
	   $sql = "SELECT * FROM rooms WHERE room_no = :room_id AND seater = :stat";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_id'=> $room_no,'stat'=>$stat]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

/*public function updateroom4($room_no){
	   $sql = "SELECT * FROM rooms WHERE room_no = :room_alloted AND seater = 4";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	public function updateroom3($room_no){
	   $sql = "SELECT * FROM rooms WHERE room_no = :room_alloted AND seater = 3";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
public function updateroom2($room_no){
	   $sql = "SELECT * FROM rooms WHERE room_no = :room_alloted AND seater = 2";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}public function updateroom1($room_no){
	   $sql = "SELECT * FROM rooms WHERE room_no = :room_alloted AND seater = 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}*/
    //updating seater
	public function updateji0($room_no,$statu){
	$sql = "UPDATE rooms SET seater = :statu WHERE room_no = :room_alloted";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['statu'=>$statu,'room_alloted'=> $room_no]);
		return true;
}
public function updateji1($room_no,$statu){
	$sql = "UPDATE rooms SET seater = :statu  WHERE room_no = :room_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['statu'=>$statu,'room_id'=> $room_no]);
		return true;
}
public function updateji2($room_no,$three){
	$sql = "UPDATE rooms SET seater = 2, three = :uid WHERE room_no = :room_alloted";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no,'uid'=>$three]);
		return true;
}
public function updateji3($room_no,$four){
	$sql = "UPDATE rooms SET seater = 3, four = :uid WHERE room_no = :room_alloted";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no,'uid'=>$four]);
		return true;
}
public function updateji4($room_no,$five){
	$sql = "UPDATE rooms SET seater = 4, five = :uid WHERE room_no = :room_alloted";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['room_alloted'=> $room_no,'uid'=>$five]);
		return true;
}

//fetch all the rooms
public function fetchrooms(){
	$sql = "SELECT * FROM rooms";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}

//update room of allrooms.php
public function goya($id,$fees){
	$sql = "UPDATE rooms SET fees = :fees WHERE id = :id";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['fees'=>$fees,'id'=>$id]);
		return true;
}
public function goya1($id){
	$sql ="SELECT * FROM rooms WHERE id = :id AND seater = seater1";
	$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
} 

public function goya2($id){
	$sql ="DELETE FROM rooms WHERE id = :id";
	$stmt = $this->conn->prepare($sql);
		$stmt->execute(['id'=>$id]);
		return true;

}
//update of the above one along with bookhostel
public function yoga($room_alloted,$uid){
	$sql = "UPDATE bookhostel SET room_alloted = :roomno WHERE uid = :one";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['roomno'=> $room_alloted,'one'=>$uid]);
		return true;
}
public function yoga1($room_alloted,$uid){
	$sql = "UPDATE bookhostel SET room_alloted = :roomno WHERE uid = :two";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['roomno'=> $room_alloted,'one'=>$uid]);
		return true;
}
public function yoga2($room_alloted,$uid){
	$sql = "UPDATE bookhostel SET room_alloted = :roomno WHERE uid = :three";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['roomno'=> $room_alloted,'three'=>$uid]);
		return true;
}
public function yoga3($room_no){
	$sql = "UPDATE bookhostel SET room_alloted = :roomno WHERE uid = :four";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['roomno'=> $room_alloted,'four'=>$uid]);
		return true;
}
public function yoga4($id){
	$sql = "UPDATE bookhostel SET room_alloted = 2 WHERE id = :hoste";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['hoste'=>$id]);
		return true;
}

//vacate room finding the user exist or not
public function user1($sta,$roll_no){
	$sql ="SELECT bookhostel.id FROM room_logs  INNER JOIN bookhostel ON room_logs.hid = bookhostel.id  WHERE roomno = :sta AND bookhostel.uid = :roll_no";
	$stmt = $this->conn->prepare($sql);
		$stmt->execute(['sta'=>$sta,'roll_no'=>$roll_no]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}

public function user2($roomno,$hid){
$sql ="SELECT * FROM room_logs WHERE hid = :hoste AND roomno = :room_id";
	$stmt = $this->conn->prepare($sql);
		$stmt->execute(['hoste'=>$hid,'room_id'=>$roomno]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
}
//vacating a user
public function vacater($hid){
	$sql ="DELETE FROM room_logs WHERE hid = :hoste ";
        $stmt = $this->conn->prepare($sql);
		$stmt->execute(['hoste'=>$hid]);
		return true;

}
//Add new note
public function add_new_note1($title,$note){
	$sql="INSERT INTO blog(title,note) VALUES(:title,:note)";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['title'=>$title,'note'=>$note]);
	return true;
}
//Fetch all note of an user
	public function get_blog1(){
		$sql="SELECT * FROM blog order by id desc";
		$stmt = $this->conn->prepare($sql);
	$stmt->execute();
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
//Edit note of an user
public function edit_note1($id)
{
	$sql = "SELECT * FROM blog WHERE id=:id";
		$stmt = $this->conn->prepare($sql);
	$stmt->execute(['id'=>$id]);

	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result;

}
//update note of an user
public function update_note1($id, $title, $note){
	$sql = "UPDATE blog SET title = :title, note = :note, updated_at = NOW() WHERE id=:id";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['title'=>$title, 'note'=>$note,'id'=>$id]);
	return true;
}

//delete note of an user
public function delete_note1($id){
	$sql = "DELETE  FROM blog WHERE id=:id";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['id'=>$id]);
	return true;
}


}
?>