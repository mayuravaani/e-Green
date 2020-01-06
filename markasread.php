<?php
include_once("session.php");
$s_id=$_GET["id"];
$acttime=date("Y-m-d H:i:s");


$sql3="update service set status=1 where sid='$s_id' ";
		if ($conn->query($sql3) === TRUE) {
echo "success";
	$sql="INSERT INTO service_user(sid,nicnoreceiver,readdate)VALUES($s_id,'$login_session','$acttime')";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
			header('Location:'.$l.'.php'); // Redirecting To Other Page
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
				} 
				else {
					echo "Error: " . $sql3 . "<br>" . $conn->error;
				}


?>