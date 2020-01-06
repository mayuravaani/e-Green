<?php
include("connect.php");
include_once("session.php");


if(isset($_POST['btnms'])){ 
	if(empty($_POST['txttyp']) || empty($_POST['txtpl'])){
		header("Location:navi.php");
	}
	else{
		$ty=$_POST["txttyp"];
		$pl=$_POST["txtpl"];
		$dl=$_POST["txtdl"];
		$date=date("Y-m-d H:i:s ");
		$sql="INSERT INTO service(nicnosender,type,place,detail,senddate)VALUES('$login_session','$ty','$pl','$dl','$date')";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			header('Location:accept.php'); // Redirecting To Other Page
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
$conn->close();}}
?>
