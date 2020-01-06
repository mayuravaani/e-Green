
<head>
		<link rel="stylesheet" href="bootstrap-4.0.0/dist/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="mystyle.css">
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
    font-size: 18px; */
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
</head>

<body background="img.png"  style="background-size:cover;background-position: center;">
<br><center>
<div class="card border-success transbox col-sm-6" >
  <div class="card-header bg-transparent border-success"><b>Registration Form</b></div>
  <div class="card-body text-success">
    
    <p class="card-text  text-dark">
	<form action="register_action.php" method="post">
      
		<b><center><div class="row">
		
<div class="col-sm-4">NIC No:</div>
	<input type="text" class="form-control col-sm-5"    name="txtnc" required></div>
	<br>
	<div class="row">
<div class="col-sm-4">First Name:</div>
	<input type="text" class="form-control col-sm-5"   name="txtfn" required></div>
	<br>
	<div class="row">
<div class="col-sm-4">Last Name:</div>
	<input type="text" class="form-control col-sm-5"    name="txtln" required></div>
	<br>
	
	<div class="row">
<div class="col-sm-4">Address:</div>
	<input type="text" class="form-control col-sm-5"   name="txtad" required></div>
	<br>
	<div class="row">
<div class="col-sm-4">Contact No:</div>
	<input type="text" class="form-control col-sm-5"   name="txttp" required></div>
	<br></b><div class="row">
<div class="col-sm-4"><b>Password:</b></div>
	<input type="password" class="form-control col-sm-5"   id="psw" name="passwordr" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
	<div class="row"><div class="col-sm-3"></div><div id="message" style="text-align:left">
  <span >Password must contain the following:</span><br>
  <small><span id="letter" class="invalid">A <b>lowercase</b> letter</span><br>
  <span id="capital" class="invalid">A <b>capital (uppercase)</b> letter</span><br>
  <span id="number" class="invalid">A <b>number</b></span><br>
  <span id="length" class="invalid">Minimum <b>8 characters</b></span></small>
</div></div>
	<br><div class="row">
	
<div class="col-sm-4"><b>Confirm Password:</b></div>
	<input type="password" class="form-control col-sm-5"  name="passwordrc" title="Please enter the same Password as above." id="confirm_password" required></div>
	
	
		</center>
      </div>
	  
      <div class="modal-footer">
       <a href="index.php" ><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button></a>
        <button type="submit" name="reg" class="btn btn-danger">Register</button>
      </div></form>
	
	
	
	</p>
  </div>
</div></center>



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







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>