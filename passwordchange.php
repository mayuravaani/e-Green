	<head>
<style>
/* The message box is shown when the user clicks on the password field */
#message {
    display:none;
    color: #000;
    position: relative;
    padding: 5px;
    margin-top: 5px;
}

#message span{
    padding: 10px 35px;
    /*font-size: 18px; */
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -35px;
    content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
    color: red;
}

.invalid:before {
    position: relative;
    left: -35px;
    content: "✖";
}
.pointer {cursor: pointer;}

</style>	
		<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="mystyle.css">
</head>
<?php include("session.php"); ?>
<body background="img.png"  style="background-size:cover;background-position: center;">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#0ECD8B">
  <div class="container">
   <center> <a class="navbar-brand" href="#">E-GREEN CENTER</a></center>
  </div>
</nav>



 
<br>
        

	   <div class="container  transbox col-sm-4 bg-light" style="border:solid green">
<form   action="passwordchangeaction.php" method="post">

<div class="form-group " style="padding:5px">
<h3 class="form-signin-heading ">Change New Password...</h3>



<h5 class="form-signin-heading ">Current Password</h5>
<input type="password" class="form-control " name="password"  required/>

<h5 class="form-signin-heading ">New Password</h5>

<input type="password" class="form-control"  id="psw" name="passwordr" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required/>
<div id="message">
  <span>Password must contain the following:</span><br>
  <span id="letter" class="invalid">A <b>lowercase</b> letter</span><br>
  <span id="capital" class="invalid">A <b>capital (uppercase)</b> letter</span><br>
  <span id="number" class="invalid">A <b>number</b></span><br>
  <span id="length" class="invalid">Minimum <b>8 characters</b></span>
</div>
<h5 class="form-signin-heading ">Confirm Password</h5>

<input type="password" class="form-control" name="passwordrc" title="Please enter the same Password as above." id="confirm_password" required/>


<br>
<div class="row">
<div class="col-sm-3"></div><div class="col-sm-4">
<a href="<?php echo "$l"?>.php"><button class="btn  btn-success btn-block pointer" type="button" >Cancel</button></a></div>
<div class="col-sm-4">
<button class="btn btn-success btn-block pointer " type="submit" name="submit">Change</button></div>
</div>
</div>

</form>
</div>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

var password = document.getElementById("psw")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>













</body>






<script src="jquery-3.2.1.slim.min.js" ></script>
    <script src="popper.min.js" ></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>