<?php
include_once("session.php");
$u_id=$_GET["id"];
$sql2 = "select status from user where nicno=$u_id";
$result2=$conn->query($sql2);
if ($result2->num_rows==1) {
	// Initializing Session
 	$row2=$result2->fetch_assoc();
	$st=$row2["status"];
}



if($st==1){
$sql="update user set status=0 where nicno=$u_id";
		if ($conn->query($sql) === TRUE) {
		 header('Location:'.$l.'.php');
			
		 } 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
}	
}
else if($st==0){
$sql3 ="update user set status=1 where nicno=$u_id";
		if ($conn->query($sql3) === TRUE) {
			
			header('Location:'.$l.'.php');
		
		 } 
		else {
			echo "Error: " . $sql3 . "<br>" . $conn->error;
}	
}

$conn->close();

?>
