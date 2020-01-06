<?php
include("connect.php");
include_once("session.php");

$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file1 = $target_file;
$lastDot = strrpos($target_file1, ".");
$target_file = str_replace(".", "", substr($target_file, 0, $lastDot)) ; 
$target_file = str_replace("%", "", substr($target_file, 0,  strlen($target_file))) ;
$target_file = str_replace("'", "", substr($target_file, 0, strlen($target_file))) ; 
$target_file = str_replace(",", "", substr($target_file, 0, strlen($target_file))) ; 
$target_file = str_replace("#", "", substr($target_file, 0, strlen($target_file))) . substr($target_file1, $lastDot);


$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
  // echo "Sorry, file already exists.";
    $fnew=rand();
   $target_file=substr_replace($target_file ,"",strlen($imageFileType)*(-1)-1);
	$target_file=$target_file."".$fnew.".".$imageFileType;
    $uploadOk = 1;
}
// Check file size
//if ($_FILES["fileToUpload"]["size"] > 500000) {
 //   echo "Sorry, your file is too large.";
 //   $uploadOk = 0;
//}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	
$sql1="update user set profile='$target_file' where nicno='$login_session'";
				if ($conn->query($sql1) === TRUE) {
					//echo "New record created successfully";
					header('Location:'.$l.'.php'); // Redirecting To Other Page
				} 
				else {
					echo "Error: " . $sql1 . "<br>" . $conn->error;
				} 
}
?>