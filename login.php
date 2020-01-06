<?php
include("connect.php");
session_start(); // Starting Session
$error=""; // Variable To Store Error Message
if (isset($_POST['login'])) {
	if (empty($_POST['username']) || empty($_POST['passw'])) {
	$error = "Username or Password is invalid";
	header("Location:index.php");
	echo $error;
	}
	else
	{
	
$acttime=date("Y-m-d H:i:s");

// Define $username and $password
$username=$_POST['username'];
$password=$_POST['passw'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
// Selecting Database
// SQL query to fetch information of registerd users and finds user match.
$sql = "select u.nicno,u.password,u.status,u.usertype from user as u where u.password='$password' AND  u.nicno='$username' and u.status=0";



$result=$conn->query($sql);


		if ($result->num_rows==1) {
		$_SESSION['login_user']=$_POST['username'];
 // Initializing Session
 	while($row=$result->fetch_assoc()){
	$ID=$row["nicno"];
	//$PNAME=$row["postname"];
	$ut=$row["usertype"];
		$sql3="update user set lastlogin='$acttime' where nicno='$ID' ";
		if ($conn->query($sql3) === TRUE) {
if($ut==0){
	header("Location:user.php");
}
else{
	header("Location:admin.php");
}	
				} 
				else {
					echo "Error: " . $sql3 . "<br>" . $conn->error;
				}

	}

} 
		else {
$error = "Username or Password is invalid";
header('Location:index.php');
		}
$conn->close(); // Closing Connection
	}
}
?>