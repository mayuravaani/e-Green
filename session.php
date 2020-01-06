<?php
include("connect.php");
session_start();// Starting Session
$user_check=$_SESSION['login_user'];
$sql="select * from user where nicno='$user_check'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();
$login_session =$row['nicno'];
$_fname=$row['firstname']; 
$_lname=$row['lastname']; 
$_password=$row['password'];
$_picture=$row['profile'];
$_alevel=$row['usertype'];

$l="user";
if($_alevel==1){
	$l="admin";
}


function curPageName() {
  $arr=explode(".",substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1));
  return $arr[0];
}
$succ=true;
$x=curPageName();
if($x=="user"){
if($l!=curPageName()){
	$succ=false;
}

}
if($x=="admin"){
if($l!=curPageName()){
	$succ=false;
}
}


if((!isset($login_session)) || (!$succ)){
$conn->close(); // Closing Connection
header("Location:index.php"); // Redirecting To Home Page
 
}
?>
