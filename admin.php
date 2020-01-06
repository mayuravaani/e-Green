	<head>
	<title>
	E_GREEN
	</title>
	<link href='image/Green.png' rel='icon' type='image/x-icon'/>
	<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="mystyle.css">

<style>
.containerpro {
    position: relative;
    
	
}

.image {
  opacity: 1;
  display: block;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%; 
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);

}

.containerpro:hover .image {
  opacity: 0.3;
}

.containerpro:hover .middle {
  opacity: 1;
}

.text {
  color: Black;

} 
.scrollbardiv{

	height: 37.5em;
	overflow: scroll;
	
} 
.scrollbardiv2{

	height: 36em;
	overflow: scroll;
	
} 
</style>
</head>
<body background="img.png"  style="background-size:cover;background-position: center;">
<?php
include("session.php"); ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0ECD8B">
  <div class="container">
   <center><img style="width:40px;height:40px;" src="image/Green.png">  <a class="navbar-brand" href="#">E-GREEN CENTER</a></center>
 <div class="col-sm-6"></div> <a href="passwordchange.php"><button type="button" class="btn btn-success">Password Change</button></a> <a href="logout.php"><button type="button" class="btn btn-success">Sign Out</button>  </a>
  </div>
</nav>
<div class="container-fluid">
	<div class="row ">
		<div class="col-sm-2 d-inline-block transbox scrollbardiv " style="color:Black;" >
			<br><center>
			
			<div class="containerpro" >
  <img src="<?php if($_picture==null){echo "profile/nopro.jpg";} else{echo $_picture;} ?>"  class="image rounded-circle d-inline-block" width="120" height="120"  ><br>
  <div class="middle">
    <div class="text pointer" style="border:solid 1px" data-toggle="modal"  title="View uploded image" data-target=".bd-image-modal-sm"><b>Change</b></div>
  </div>
</div> <?php 
$sql4="select * from service where status=0 and type='ordinal'";
$count=$conn->query($sql4);
$noO=0;
if($count->num_rows>0){
	
while($row=$count->fetch_assoc()){
	$noO=$noO+1;
}}	


$sql4="select * from service where status=0 and type='special'";
$count=$conn->query($sql4);
$noS=0;
if($count->num_rows>0){
	
while($row=$count->fetch_assoc()){
	$noS=$noS+1;
}}	?>


			<h5><span><?php echo $_fname; ?> <?php echo $_lname; ?> </span></h5>
			
			<div class="nav flex-column nav-pills btn-success" id="v-pills-tab" role="tablist" aria-orientation="vertical"><br>
      <a class="nav-link active btn-success " id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Ordinal <?php if($noO!=0){?><span class="badge badge-light"><?php echo $noO ?></span><?php ;} ?></a>
     <br> <a class="nav-link btn-success" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Special <?php if($noS!=0){?><span class="badge badge-light"><?php echo $noS ?></span><?php ;} ?></a>
     <br> <a class="nav-link btn-success" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Logs</a>
     <br> <a class="nav-link btn-success" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
   <br> </div>
	</center>
		</div>
    <div class="col-sm-10  "  >
	  <br>
		<div class="container" >
		
 
 
 <div class="row">
  
  <div class="col-12">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active scrollbardiv2  bg-light" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"> 
	 <div class="container " style="padding:70px">
	<b> <?php 
		$sql="select u.nicno,u.firstname,u.lastname,u.contactno,s.type,s.sid,s.place,s.senddate,s.detail  from service as s inner join user as u on u.nicno=s.nicnosender where s.status=0 and s.type='ordinal' order by senddate desc";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$nic=$row["nicno"];
$sid=$row["sid"];
$f=$row["firstname"];
$ln=$row["lastname"];
$typ=$row["type"];
$pl=$row["place"];
$cn=$row["contactno"];
$det=$row["detail"];
$date=$row["senddate"]; ?>
<div style="border:1px solid green;padding:50px">
 
  <div class="col-sm-2"></div>
      From:<?php echo $f." ".$ln;?><br>
	  NIC No:<?php echo $nic;?><br>
	  Send Time:<?php echo $date;?> <br>
   
	Place :<?php echo $pl; ?><br>
	Detail:<?php echo $det;?><br>
	Tp No:<?php echo $cn;?><br>
 <div class="row">  <div class="col-sm-10"></div><a href="markasread.php?id=<?php echo $sid ?>"><button type="button" class="btn btn-success" style="padding:2px">Mark as Read</button></a></div>
</div>
<br>
<?php
}}
 ?>
	  
	 </b> </div>
	  </div>
      <div class="tab-pane fade scrollbardiv2  bg-light" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
	  <div class="container" style="padding:70px">
	<b> <?php 
		$sql="select u.nicno,u.firstname,u.lastname,u.contactno,s.type,s.sid,s.place,s.senddate,s.detail  from service as s inner join user as u on u.nicno=s.nicnosender where s.status=0 and s.type='special' order by senddate desc";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
$nic=$row["nicno"];
$sid=$row["sid"];
$f=$row["firstname"];
$ln=$row["lastname"];
$typ=$row["type"];
$cn=$row["contactno"];
$pl=$row["place"];
$det=$row["detail"];
$date=$row["senddate"]; ?>
<div style="border:1px solid green;padding:50px">
 
  <div class="col-sm-2"></div>
      From:<?php echo $f." ".$ln;?><br>
	  NIC No:<?php echo $nic;?><br>
	  Send Time:<?php echo $date;?> <br>
   
	Place :<?php echo $pl; ?><br>
	Detail:<?php echo $det;?><br>
	Tp No:<?php echo $cn;?><br>
 <div class="row">  <div class="col-sm-10"></div><a href="markasread.php?id=<?php echo $sid ?>"><button type="button" class="btn btn-success" style="padding:2px">Mark as Read</button></a></div>
</div>
<br>
<?php
}}
 ?>
	  
	 </b> </div>
	  
	  
	  </div>
      <div class="tab-pane fade scrollbardiv2  bg-light" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
	  <div class="container  " style="padding:70px">
	<b> <?php 
		//$sql="select * from service";
		$sql="select u.nicno,u.firstname,u.lastname,s.type,s.sid,s.place,s.senddate,s.detail  from service as s inner join user as u   on u.nicno=s.nicnosender  order by s.senddate desc";
$result=$conn->query($sql);
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
	$sid=$row["sid"];
	$nic=$row["nicno"];


$f=$row["firstname"];
$ln=$row["lastname"];
$typ=$row["type"];
$pl=$row["place"];
$det=$row["detail"];
$date=$row["senddate"];
	$sql2="select u.firstname,u.lastname,su.nicnoreceiver,su.readdate from service_user as su inner join user as u on su.nicnoreceiver=u.nicno where sid=$sid";
	$result2=$conn->query($sql2);
	$re="...";
	$rdate="...";
	$fre="...";
	$lre="...";
if($result2->num_rows>0){
	$row=$result2->fetch_assoc();
	$re=$row["nicnoreceiver"];
	$fre=$row["firstname"];
	$lre=$row["lastname"];
	$rdate=$row["readdate"];
}
 ?>
<div style="border:1px solid green;padding:30px">
 
  <div class="col-sm-2"></div>
      From:<?php echo $f." ".$ln;?><br>
	  NIC No:<?php echo $nic;?><br>
	  Send Time:<?php echo $date;?> <br>
   
	Place :<?php echo $pl; ?><br>
	Detail:<?php echo $det;?><br>
 <div class="row">  <div class="col-sm-2"></div>Receiver: <?php echo $re;?>,<?php echo $fre." ".$lre;?> </div>
  <div class="row">  <div class="col-sm-2"></div>Received date: <?php echo $rdate;?></div>

</div>
<br>
<?php
}}
 ?>
	  
	 </b> </div>
	  </div>
      <div class="tab-pane fade scrollbardiv2  bg-light" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
	  
	  <br>
	  
	  <table class="table-sm table " style="border:solid 1px white">
<tr><th>#</th><th>User Id</th><th>Name</th><th>Role</th><th>User Type</th><th>Status</th><th>Last login</th><th>...</th><th>
						<?php
						$counta=0;
						$sql2 = "select  * from user ";
						$result2=$conn->query($sql2);
						if($result2->num_rows>0){
						while($row2=$result2->fetch_assoc()){
							$counta++;
							$uid=$row2["nicno"];
							$fname=$row2["firstname"];
							$lname=$row2["lastname"];
							//$postn=$row2["postname"];
							$ulevel=$row2["usertype"];
							//$pid=$row2["postid"];
							$stat=$row2["status"];
							$llogin=$row2["lastlogin"];
							if($ulevel==1){
								$l="Admin";
							}
							else{
								$l="Standard";}
							if($stat==0){
								$s="Active";
							}
							else{
								$s="Blocked";}
							?>
							<tr <?php if($stat==1){echo 'style="background-color:#EBE8E9;"';} ?>><td><?php echo $counta ?></td><td><?php echo $uid ?></td><td><?php echo $fname ?></td><td><?php echo $lname ?></td><td><?php echo $l ?></td><td><?php echo $s ?></td><td><small><?php echo $llogin ?></small></td><td><a href="#" data-toggle="modal" data-target=".<?php echo $uid?>" >Edit</a></td></tr>
							<div class="   modal fade <?php echo $uid?>" tabindex="-1" role="dialog" aria-labelledby="viewnotice" aria-hidden="true">
				<div class="modal-dialog modal-lg">
				<div style="color:white" class="model-title bg-success"><center><?php echo $uid;?></center></div>
				<div class="modal-content" >
				<br>
				<center><div class="col-sm-8" style="border:solid 1px">
				
				<form  style="padding:10px" action="adminupdateuser.php" method="post">

<div class="form-group ">
		<input type="text" class="form-control col-sm-5" value="<?php echo $uid; ?>"  name="useri" hidden required></div>

<div class="row">
<div class="col-sm-3">First Name:</div>
	
		<input type="text" class="form-control col-sm-5" value="<?php echo $fname; ?>"  name="userf" required></div>

	<br>
	<div class="row">
<div class="col-sm-3">Last Name:</div>
	
		<input type="text" class="form-control col-sm-5" value="<?php echo $lname; ?>"  name="userl" required></div>

	<br>

        

       

	<div class="row">
<div class="col-sm-3">User Type:</div>
<select class="form-control pointer col-sm-5"  name="utype" required>
        
        <option value="0" <?php if($ulevel==0){echo "selected";} ?>>Standard User</option>
        <option value="1" <?php if($ulevel==1){echo "selected";} ?>>Admin User</option>
        
    </select></div>
	<br>
	
<div class="row">
<div class="col-sm-5" style="color:red;"><small>You are updating an Author...
Please Type your password for varification...</small></div>
<div class="col-sm-5" >

<input type="password" id="myPsw" class="form-control" name="upassword"  required/>
</div>
</div>


<br>
<div class="row">
<div class="col-sm-7"><a href="activateblockuser.php?id=<?php echo $uid; ?>"><button  class="btn  btn-success col-sm-3 pointer" style="padding:3px" type="button" name="activate"><?php if($stat==0){echo "Block";}else{ echo "Activate";} ?></button></a>
</div>
<button  class="btn  btn-success col-sm-3 pointer" type="submit" style="padding:3px" name="updtateuser">Update</button>

</div>


<br>


</div>
<br>
</form>

				</div>
				<br>
				<br>
				</div></center>
				</div>
				
				</div>
							
							
							<?php
						}}
						?>
						</table>
	  
	  </div>
    </div>
  </div>
</div>
 
		</div>
		
			
<script>

window.onload = function () {
    

    var fileUpload = document.getElementById("fileupload");
    fileUpload.onchange = function () {
        if (typeof (FileReader) != "undefined") {
            var dvPreview = document.getElementById("dvPreview");
            dvPreview.innerHTML = "";
            var regex = /([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            for (var i = 0; i < fileUpload.files.length; i++) {
                var file = fileUpload.files[i];
                if (regex.test(file.name.toLowerCase())) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = document.createElement("IMG");
                        img.height = "298";
                        img.width = "298";
                        img.src = e.target.result;
                        dvPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                } else {
                    alert(file.name + " is not a valid image file.");
                    dvPreview.innerHTML = "";
                    return false;
                }
            }
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    }
};			
</script>
								

		</div>

	</div>

	</div>
<div class="modal fade bd-image-modal-sm" tabindex="-1" role="dialog" aria-labelledby="viewimg" aria-hidden="true">
									<div class="modal-dialog modal-sm ">
										<div class="modal-content" style="border:solid 1px">
											<center>
										 <div style="position:absolute;" id="dvPreview"></div>
	
											<img src="<?php if($_picture==null){echo "profile/nopro.jpg";} else{echo $_picture;} ?>"  width="298" height="298" class="d-inline-block"  ><br> </center>
										
										<br>
										<form action="profilechange.php" method="post" enctype="multipart/form-data">
 
<label class="custom-file" >
		<input type="file" id="fileupload" class="custom-file-input pointer" accept="image/*" name="fileToUpload" required>
					<span class="custom-file-control"></span>
								</label>
<br>
<br>
<div class="col-sm-1"></div>
										
								<button type="submit" class="btn btn-success pointer" name="submit" style="color:black"><img src="image/up.png" width="25" height="25" class="d-inline-block" style="padding-top:2px;"> Add</button>
								
					<a href="deleteprofile.php?id=<?php echo $login_session; ?>"><button type="button" class="btn btn-danger pointer" style="color:black"><img src="image/del.png" width="25" height="25" class="d-inline-block" style="padding-top:2px;"> Delete</button></a>
							<a href="<?php echo $l.".php" ?>"><button type="button" class="btn btn-light pointer" style="color:black"><img src="image/cancel.png" width="20" height="20" class="d-inline-block" style="padding-top:2px;"> cancel</button></a>

							</form>
							<br>
							</div>
									</div>
									</div>



</body>
<script src="jquery-3.2.1.slim.min.js"></script>
    <script src="popper.min.js" ></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>