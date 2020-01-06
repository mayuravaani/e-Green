<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="db_center";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
	die("connection failed:" . $conn->connect_error);
}


?>