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

	height: 37em;
	overflow: scroll;
	
} 
</style>
</head>
<body background="img.png"  style="background-size:cover;background-position: center;">
<?php
include("session.php"); ?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0ECD8B">
  <div class="container">
   <center><img style="width:40px;height:40px;" src="image/Green.png"> <a class="navbar-brand" href="#">E-GREEN CENTER</a></center>
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
</div> 

			<h5><span><?php echo $_fname; ?> <?php echo $_lname; ?> </span></h5>
			
	</center>
		</div>
    <div class="col-sm-10 transbox" style="background-color:white" >
	  <br>
		<div class="container" >
		<form action="sendmsg.php" method="post">
		<br><b>
		<div class="row"><div class="col-sm-4"></div>Type
		
		:<div class="col-sm-4"><select name="txttyp" class="form-control form-control-sm">
  <option value="ordinal">Ordinal</option>
  <option value="special">Special</option>
</select></div></div>
<br>




<div class="row"><div class="col-sm-4"></div>Place
		
		:<div class="col-sm-4">
		<input type="text" name="txtpl" class="form-control" placeholder="required" required>
		</div></div>
		<br>
		<div class="row"><div class="col-sm-4"></div>Other <br>Details
		:<div class="col-sm-4">
		<textarea name="txtdl"  class="form-control" rows="5" placeholder="optional"></textarea>
		</div></div>
		<br>
		<div class="row"><div class="col-sm-8"></div>
        <button type="submit" name="btnms" class="btn btn-danger">Send</button>
		</div>
		<br>
		<br>
		<br>
		<br>
		</form>
		<div class="row">
		{You will be asked for ordinal or special garbage disposal in 'Type'. ordinal referred to usual garbage and special referred to high amount and different materials.You should place the address of disposal in 'Place'.If required you can give more information.}
        
		</div>
		
		</b></div>
		
			
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