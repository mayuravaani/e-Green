<?php
include_once("session.php");
$a_id=$_GET["id"];

$sql1="update user set profile='' where nicno='$a_id'";
				if ($conn->query($sql1) === TRUE) {
					//echo "New record created successfully";
					header( 'Location:'.$l.'.php'); // Redirecting To Other Page
				} 
				else {
					echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
$conn->close();

?>