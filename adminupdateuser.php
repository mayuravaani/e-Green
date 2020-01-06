<?php
include("connect.php");
include_once("session.php");

if(isset($_POST['updtateuser'])){ 
		$usernf=$_POST["userf"];
		$usernl=$_POST["userl"];
		$uid=$_POST["useri"];
	
		$utyp=$_POST["utype"];
		
		$pass=$_POST["upassword"];
		
		if($pass==$_password){
			$sql="update user set firstname='$usernf',lastname='$usernl' ,usertype='$utyp' where nicno='$uid'";
			if ($conn->query($sql) === TRUE) {
				header('Location:'.$l.'.php');				
				} 
				else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
		
			
		
		
		
		}
		else{
			header("Location:adminpswmsgfail1.php");
		}
	
	}
$conn->close();
?>