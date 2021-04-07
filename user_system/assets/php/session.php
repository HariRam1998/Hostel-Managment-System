<?php 
session_start();
require_once 'auth.php';
$cuser=new Auth();

if(!isset($_SESSION['user'])){
	header('location:index.php');
	die;
}
$cemail=$_SESSION['user'];
 
 $data=$cuser->currentUser($cemail);
$cid=$data['id'];
$cname=$data['name'];
$cpass=$data['password'];
$cphone=$data['phone'];
$cgender=$data['gender'];
$cdob=$data['dob'];
$cphoto=$data['photo'];
$created=$data['created_at'];
$reg_on=date('d M Y',strtotime($created));
$verified=$data['verified'];

$data1=$cuser->currentUser1($cid);
$guardno = $data1['guardian_no'];
$bookid = $data1['id'];
$emerno = $data1['emergency_no'];
$course = $data1['course'];
$city = $data1['city'];
$guardname = $data1['guardian_name'];
$guardrel = $data1['guardian_relation'];
$guardadd =$data1['guardian_address'];
$state = $data1['state'];
$stay = $data1['duration'];
$pincode = $data1['pincode'];
$seater = $data1['seater'];
$food = $data1['food'];
 $data2=$cuser->currentUser2($bookid);
$room=$data2['roomno'];
$allottime = $data2['allot_time'];
$data3=$cuser->currentUser3($room);
$fees=$data3['fees'];

$cuser->currentUser4($bookid,$room,$seater,$fees,$food,$allottime,$course,$cid,$cname,$cgender,$cphone,$cemail,$emerno,$guardname,$guardrel,$guardno,$guardadd,$city,$state,$pincode,$cphoto,$stay);



$cuser->currentUser5($bookid,$room,$seater,$fees,$food,$allottime,$course,$cid,$cname,$cgender,$cphone,$emerno,$guardname,$guardrel,$guardno,$guardadd,$city,$state,$pincode,$cphoto,$stay);

$fname=strtok($cname," ");

if($verified==0){
	$verified='Not Verified!';
}else{
	$verified='Verified!';
}

?>