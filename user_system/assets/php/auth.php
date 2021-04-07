<?php  
require_once 'config.php';
class Auth extends Database{
	//Register New User
	public function register($id,$name,$email,$phone,$password){
		$sql="INSERT INTO users(id,name,email,phone,password) VALUES(:id,:name,:email,:phone,:pass)";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['id'=>$id,'name'=>$name,'email'=>$email,'phone'=>$phone,'pass'=>$password]);
	return true;

	}
	//check if user already registered
	public function user_exist($email){
		$sql="SELECT email FROM users WHERE email=:email";
		$stmt=$this->conn->prepare($sql);
		$stmt->execute(['email'=>$email]);
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	//login exisisting user
	public function login($email){
		$sql="SELECT email, password FROM users WHERE email=:email  AND deleted!=0";
		$stmt=$this->conn->prepare($sql);
		$stmt->execute(['email'=>$email]);
		$row=$stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
}
//current user in session
public function currentUser($email)
{
	$sql="SELECT * FROM users WHERE email=:email AND deleted !=0";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['email'=>$email]);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	return $row;
}
public function currentUser1($uid){

	$sql="SELECT * FROM bookhostel WHERE  uid = :cid AND room_alloted != 2";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['cid'=>$uid]);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	return $row;

}
public function currentUser2($hid){

	$sql="SELECT * FROM room_logs WHERE  hid = :bookid ";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['bookid'=>$hid]);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	return $row;

}
public function currentUser4($id,$roomno,$seater,$feespm,$foodstatus,$stayfrom,$course,$regno,$firstName,$gender,$contactno,$emailid,$egycontactno,$guardianName,$guardianRelation,$guardianContactno,$corresAddress,$corresCity,$corresState,$corresPincode,$photo,$duration){

$sql="INSERT INTO registration(id,roomno,seater,feespm,foodstatus,stayfrom,course,regno,firstName,gender,contactno,emailid,egycontactno,guardianName,guardianRelation,guardianContactno,corresAddress,corresCity,corresState,corresPincode,photo,duration) VALUES (:bookid,:room,:seater,:fees,:food,:allottime,:course,:cid,:cname,:cgender,:cphone,:cemail,:emerno,:guardname,:guardrel,:guardno,:guardadd,:city,:state,:pincode,:cphoto, :stay)";
$stmt = $this->conn->prepare($sql);
	$stmt->execute(['bookid'=>$id,'room'=>$roomno,'seater'=>$seater,'fees'=>$feespm,'food'=>$foodstatus,'allottime'=>$stayfrom,'course'=>$course,'cid'=>$regno,'cname'=>$firstName,'cgender'=>$gender,'cphone'=>$contactno,'cemail'=>$emailid,'emerno'=>$egycontactno,'guardname'=>$guardianName,'guardrel'=>$guardianRelation,'guardno'=>$guardianContactno,'guardadd'=>$corresAddress,'city'=>$corresCity,'state'=>$corresState,'pincode'=>$corresPincode,'cphoto'=>$photo,'stay'=>$duration]);
	return true;
}

public function currentUser5($bookid,$room,$seater,$fees,$food,$allottime,$course,$cid,$cname,$cgender,$cphone,$emerno,$guardname,$guardrel,$guardno,$guardadd,$city,$state,$pincode,$cphoto,$stay)
{
	$sql="UPDATE registration SET roomno = :room ,seater = :seater,feespm = :fees,foodstatus = :food,stayfrom = :allottime,course = :course,regno = :cid,firstName = :cname,gender = :cgender,contactno = :cphone,egycontactno = :emerno,guardianName = :guardname,guardianRelation =:guardrel,guardianContactno = :guardno ,corresAddress = :guardadd,corresCity = :city,corresState = :state,corresPincode = :pincode,photo = :cphoto,duration = :stay WHERE id = :bookid ";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['bookid'=>$bookid,'room'=>$room,'seater'=>$seater,'fees'=>$fees,'food'=>$food,'allottime'=>$allottime,'course'=>$course,'cid'=>$cid,'cname'=>$cname,'cgender'=>$cgender,'cphone'=>$cphone,'emerno'=>$emerno,'guardname'=>$guardname,'guardrel'=>$guardrel,'guardno'=>$guardno,'guardadd'=>$guardadd,'city'=>$city,'state'=>$state,'pincode'=>$pincode,'cphoto'=>$cphoto,'stay'=>$stay]);

	return true;
}


public function currentUser3($room_no){

	$sql="SELECT * FROM rooms WHERE  room_no = :room ";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['room'=>$room_no]);
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	return $row;

}
//Forgot Password
public function forgot_password($token,$email)
{
	$sql="UPDATE users SET token=:token, token_expire = DATE_ADD(NOW(),INTERVAL 10 MINUTE) WHERE email= :email";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['token'=>$token,'email'=>$email]);
	
	return true;
}

//Reset Password User Auth
public function reset_pass_auth($email,$token)
{
	$sql="SELECT id FROM USERS WHERE email=:email AND token=:token AND token!='' AND token_expire>NOW() AND deleted !=0";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['email'=>$email,'token'=>$token]);

	$row=$stmt->fetch(PDO::FETCH_ASSOC);
		return $row;

}
//update new password
public function update_new_pass($pass,$email){

	$sql="UPDATE users SET token='', password=:pass WHERE email= :email AND deleted != 0";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['pass'=>$pass, 'email'=>$email]);
	
	return true;
}
//Add new note
public function add_new_note($uid,$title,$note){
	$sql="INSERT INTO notes(uid,title,note) VALUES(:uid,:title,:note)";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['uid'=>$uid,'title'=>$title,'note'=>$note]);
	return true;
}
//Fetch all note of an user
	public function get_notes($uid){
		$sql="SELECT * FROM notes WHERE uid=:uid order by id desc";
		$stmt = $this->conn->prepare($sql);
	$stmt->execute(['uid'=>$uid]);
	$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
//Edit note of an user
public function edit_note($id)
{
	$sql = "SELECT * FROM notes WHERE id=:id";
		$stmt = $this->conn->prepare($sql);
	$stmt->execute(['id'=>$id]);

	$result = $stmt->fetch(PDO::FETCH_ASSOC);

	return $result;

}
//update note of an user
public function update_note($id, $title, $note){
	$sql = "UPDATE notes SET title = :title, note = :note, updated_at = NOW() WHERE id=:id";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['title'=>$title, 'note'=>$note,'id'=>$id]);
	return true;
}

//delete note of an user
public function delete_note($id){
	$sql = "DELETE  FROM notes WHERE id=:id";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['id'=>$id]);
	return true;
}

//Update profile of an user
public function update_profile($name,$gender,$dob,$phone,$photo,$id){
	$sql="UPDATE users SET name=:name,gender=:gender, dob=:dob, phone=:phone,photo=:photo WHERE id=:id AND deleted != 0";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['name'=>$name, 'gender'=>$gender,'dob'=>$dob,'phone'=>$phone,'photo'=>$photo,'id'=>$id]);
	return true;
}
//change password of an user
public function change_password($pass,$id){
	$sql ="UPDATE users SET password=:pass WHERE id =:id AND deleted != 0";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['pass'=>$pass,'id'=>$id]);
	return true;
}
//Verify email of an user
public function verify_email($email){
	$sql ="UPDATE users SET verified = 1 WHERE email =:email AND deleted != 0";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['email'=>$email]);
	return true;
}
//send feedback to admin
public function send_feedback($sub,$feed,$uid){
	$sql ="INSERT INTO feedback (uid,subject,feedback) VALUES (:uid,:sub,:feed)";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['uid'=>$uid,'sub'=>$sub,'feed'=>$feed]);
	return true;
}
//Insert Notification
public function notification($uid,$type,$message){
	$sql ="INSERT INTO notification (uid,type,message) VALUES (:uid,:type,:message)";
	$stmt=$this->conn->prepare($sql);
	$stmt->execute(['uid'=>$uid,'type'=>$type,'message'=>$message]);
	return true;
}
//fetch notification 
public function fetchNotification($uid){
	$sql = "SELECT * FROM notification WHERE uid = :uid AND type = 'user'";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['uid'=>$uid]);

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

}
//fetch blog notification
public function fetchNotification1(){
	$sql = "SELECT * FROM blog ORDER BY id desc limit 6";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute();

	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

}

//remove notification from the database
public function removeNotification($id){
	$sql = "DELETE FROM notification WHERE id = :id AND type='user'";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['id'=>$id]);
	return true;
}

//hostel register 
public function inserthostel($uid, $emergency_no, $guardian_name, $guardian_relation, $guardian_no, $guardian_address, $state, $pincode, $seater, $food,$course,$city,$duration){
	$sql = "INSERT INTO bookhostel (uid, emergency_no, guardian_name, guardian_relation, guardian_no, guardian_address, state, pincode, seater, food, course,city,duration) VALUES (:uid, :emergency_no, :guardian_name, :guardian_relation, :guardian_no, :guardian_address, :state, :pincode, :seater, :food, :course, :city, :stay)";
	$stmt = $this->conn->prepare($sql);
	$stmt->execute(['uid'=>$uid , 'emergency_no'=>$emergency_no, 'guardian_name'=>$guardian_name,'guardian_relation'=>$guardian_relation, 'guardian_no'=>$guardian_no, 'guardian_address'=>$guardian_address, 'state'=>$state, 'pincode'=>$pincode, 'seater'=>$seater, 'food'=>$food, 'course'=>$course,'city'=>$city,'stay'=>$duration]);
	return true;
}
//hostel registration exisst or not
public function bookexist($uid){
	$sql="SELECT uid FROM bookhostel WHERE uid=:uid";
		$stmt=$this->conn->prepare($sql);
		$stmt->execute(['uid'=>$uid]);
		$result=$stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	

}
}
?>