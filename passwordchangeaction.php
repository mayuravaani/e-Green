<?php
include("connect.php");
include_once("session.php");

if(isset($_POST['submit'])){ 
		
		$PW=$_POST["password"];
		$PWN=$_POST["passwordr"];
		
		$sql2="select * from user where nicno='$login_session' ";
		$result=$conn->query($sql2);
		if($result->num_rows==1){
			while($row=$result->fetch_assoc()){
				$id=$row["nicno"];
				$PWD=$row["password"];
			}
		}
			
			if($PWD==$PW){
				$sql1="update user set password='$PWN' where nicno='$login_session'";
				if ($conn->query($sql1) === TRUE) {
					echo "New record created successfully";
					header('Location:adminpswmsgsuccess.php'); // Redirecting To Other Page
				} 
				else {
					echo "Error: " . $sql1 . "<br>" . $conn->error;
				}
			}
			else{
				header("Location:adminpswmsgfail.php");
			}
$conn->close();
	
}
?>