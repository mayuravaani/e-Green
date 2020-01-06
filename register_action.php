<?php
include("connect.php");
if(isset($_POST['reg'])){ 
	if (empty($_POST['txtfn']) || empty($_POST['txtln']) || empty($_POST['txtnc']) || empty($_POST['txttp']) || empty($_POST['txtad']) || empty($_POST['passwordr'])){
	header("Location:signup.php");
	}
	else{
	$NC=strtolower($_POST["txtnc"]);
	$FN=$_POST["txtfn"];
	$LN=$_POST["txtln"];
	$TP=$_POST["txttp"];
	$AD=$_POST["txtad"];
	$PW=$_POST["passwordr"];
	$sql2="select * from user where nicno='$NC'";
	$result2=$conn->query($sql2);
	if($result2->num_rows==1){
	//echo"u r alrady signed up ";
		header("Location:alreadysignedup.php");

}
else{
	$sql="INSERT INTO user(nicno,firstname,lastname,address,contactno,password)VALUES('$NC','$FN','$LN','$AD','$TP','$PW')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		header('Location:navi1.php'); // Redirecting To Other Page
	} 
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}}
		$conn->close();}}
?>
