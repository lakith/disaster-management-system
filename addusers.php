<!doctype html>

<?php

$host = 'localhost';
$username = 'root';
$password = '';

$connection = mysqli_connect($host,$username,$password,'disaster_management');

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>
<?php

$host = 'localhost';
$username = 'root';
$password = '';

$connection = mysqli_connect($host,$username,$password,'disaster_management');

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

<?php
session_start();
	
  $log_username = "";
  $log_password = "";
  $user_ok = false;
function evalLoggedUser($connect,$u,$p){
	$sql = "SELECT person_id FROM person WHERE username = '$u'";
    $query = mysqli_query($connect, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	}
}

if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['username']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['password']);
	$user_ok = evalLoggedUser($connection,$log_username,$log_password);
	
	
} else if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])){
    $_SESSION['username'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $_SESSION['password'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['password']);
	$log_username = $_SESSION['username'];
	$log_password = $_SESSION['password'];
	$user_ok = evalLoggedUser($connection,$log_username,$log_password);
	
	
}

?>

<?php

$sql2 ="Select user_level FROM person Where  username='$log_username'";

$user_query = mysqli_query($connection, $sql2);

while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {

	$userlevel = $row["user_level"];
}

if($userlevel != 1 )
{
	header('Location:Home.php');
}

?>



<html lang="en">
  <head>
   
   
    <title></title>
    <!-- Required meta tags -->
    
    <style type="text/css">

	#footer_text
	{
		margin-top: 2%;		
	}
	
	#nav_footer
	{
		border-radius: 0px;	
		margin-bottom: -2%;
	}

	#Latest_news2
	{
		text-decoration:none;
	}
		
	#content_change
	{
		margin-top: 2%;	
	}
	
	#footer_style
	{
		margin-left: 40%;
	}
		
	#map {
        height: 400px;
        width: 100%;
		margin-top: 2%;
     }
		
		#login_content
	{
		margin-top:5%;
		margin-bottom: 6%;
	}
	
	#lableid
	{
		margin-top: 2%;
		margin-bottom: 2%;
	}
	
	.style-input
	{
		width: 90%;
		margin-left: 2%;
		margin-right: 2%;

	}
	
	#btnlogin
	{
		margin-left: 70%;
		margin-top: 2%;
		width: 30%;
		
	}
	#remberme
	{
		margin-top: 2%;
	}
	
	#show_show
	{
		display: none; 
	}
		
	.valid {
    color: green;
	}

	.valid:before {
	
		left: -35px;
		content: "✔";
	}

	/* Add a red text color and an "x" when the requirements are wrong */
	.invalid {
		color: red;
	}

	.invalid:before {
		left: -35px;
		content: "✖";
	}
		
	#pass
	{
		width: 95%;
		margin-left: 2%;
	}

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
		<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
    
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    
		
       
  </head>
  
    <body onLoad="checklog()">
  <script>
function checklog(){

	var user ="<?php echo $log_username?>";
	var check1=<?php echo $user_ok?>;
	var userlevel = <?php echo $userlevel ?>
	
	if(check1 == true){
		document.getElementById('hide_hide').style.display="none";
		document.getElementById('lets_go').style.display="block";
		document.getElementById('user').style.display="block";
		/*document.getElementById("innerhtml").innerHTML='&nbsp'+"You are logged in as "+user;
		document.getElementById('addidlink').style.display="block";
		document.getElementById('addidimg').style.display="block";
		document.getElementById('addidimg').src="user/"+user+".jpg";
		document.getElementById('addidlink').href="user.php?username="+user;
		document.getElementById('hidehide').style.display="block";
		document.getElementById('inside').style.display="none";
		document.getElementById('hideid').style.display="block";
		document.getElementById("hideid").innerHTML='&nbsp'+"You are logged in as "+user;
		document.getElementById('hideform').style.display="block";*/
		}
	
	if(userlevel == 1)
	{
		document.getElementById('admin').style.display="block";
	}

    }
</script>

  
  
  


	<nav class="navbar navbar-expand-md  navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="Home.php">Disaster Manegment System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Our Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>  
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Disasters 
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="Natural_disasters.php">Natural Disasters</a>
        <a class="dropdown-item" href="Man_made_disasters.php">Man-made Disasters</a>
  
      </div>
    </li>  
    </ul>
  <ul class="navbar-nav ml-auto" id="hide_hide">
    <li class="nav-item">
      <a class="nav-link"><i class="fa fa-user-circle" aria-hidden="true"></i>  Create Account </a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>  Login</a>
    </li>
  </ul>
  </div> 

       <div id="lets_go" style="margin-top: 0%;">
  	   		
  	   		<a href="logout.php" style="color: #D90003;margin-left: -15%;">
    	   	log out
    	   </a> 
  	   		
   	   		<a href="blog.php" style="color:#005A01;margin-left: 10%;">
    	   Logged in as <?php echo($log_username)?>
    	   </a> 
		</div>
</nav>

<div class="container-fluid" style="margin-top: 5%;">
	<div class="row">
		
	<div class="col-sm-3"></div>
	
	<div class = "col-sm-6" style="box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);border:#FFF;padding:2%;">
		
	  <div class="panel panel-success">
      <div class="panel-heading"><h2 class = "text-center">Add Users</h2></div>
      <div class="panel-body">
      	
      	<form role="form" method="post" action="addusersback.php">
      		<div class="form-group">
      		
      		<label id="lableid">
      			First name :
      		</label>
      		<input type="text" class="form-control style-input" id="firstname" placeholder="Enter First name" name="firstname" pattern="[A-Za-z]{3,}" required>
      		
      		<label id="lableid">
      			Last name :
      		</label>
      		<input type="text" class="form-control style-input" id="lastname" placeholder="Enter Last name" name="lastname" pattern="[A-Za-z]{3,}" required>
      		
      		<label id="lableid">
      			Date Of birth :
      		</label>
      		<input type="date" class="form-control style-input" id="dob" placeholder="Enter date of birth" name="dob" required>
      		
      		
      		<label id="lableid">
      			Address :
      		</label>
      		<input type="text" class="form-control style-input" id="address" placeholder="Enter Address" name="address"  required>
      		
      		<label for="username" id="lableid">
      			Email :
      		</label>
      		<input type="email" class="form-control style-input" id="email" placeholder="Enter Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
      		
      		<label id="lableid">
      			Tel-No :
      		</label>
      		<input type="text" class="form-control style-input" id="tel_no" placeholder="Enter Tel-No" name="tel_no"  required>
      		
      		<label for="username" id="lableid">
      			Job-title :
      		</label>
      		<input type="text" class="form-control style-input" id="job_title" placeholder="Enter Username" name="job_title" pattern="[A-Za-z]{3,}" required>
      		
      		<label for="username" id="lableid">
      			Username :
      		</label>
      		<input type="text" class="form-control style-input" id="username" placeholder="Enter Username" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required>
      		
      	<script>

				function check()
				{

					var pass1 = document.getElementById("pass").value;
					var pass2 = document.getElementById("cpasswod").value;

					

					if(pass1 == "" && pass2 == "")
					{
						document.getElementById("btnlogin").disabled = true;
						//document.getElementById('display').innerHTML="im in2";
					}

					if(pass1 == pass2)
					{
						document.getElementById("btnlogin").disabled = false;
						//document.getElementById('display').innerHTML="im in3";
					}

				}
	
		</script>
      		
      		
      		
      		
      		
      		
      		<label for="pwd" id="lableid">
      			Password :
      		</label>
      		<input type="password" class="form-control style-input" id="pass" placeholder="Enter password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" style="width: 100%;"  required>
      		
      		
      		      <div id="show_show" style="margin-top: 2%;">
      
		   <div class="card">
			<div class="card-body">
			  <h4 class="card-title text-center text-danger">Password Must Require</h4>
			  <p class="card-text">

				<p id="lowercase_letter"  class="include">Must Include A<b> Lowercase</b> Letter</p>
				<p id="uppercase_letter" class="include">Must Include A<b> Uppercase</b> Letter</p>
				<p id="number"  class="include">Must Include A <b> Number</b></p>
				<p id="input_length"  class="include">Must Include Minimum <b> 8 characters</b></p>

			  </p>

			</div>
		  </div>
				</div>
      		
      		
      		<label for="pwd" id="lableid">
      			Confirm password :
      		</label>
      		<input type="password" class="form-control style-input" id="cpasswod" placeholder="Enter Username" name="cpasswod" onKeyUp="check()" required>
      		<div class="checkbox" id="remberme">
     			 <label><input type="checkbox" name="remember" > Remember me</label>
    		 </div>
      		<button type="submit" class="btn btn-success" id="btnlogin" disabled>Create account</button>

      		
      		</div>
			</div>
      	
      	</form>
      	
      </div>
      
      

     
     <script>
var pass = document.getElementById("pass");
var lowercase_letter = document.getElementById("lowercase_letter");
var uppercase_letter = document.getElementById("uppercase_letter");
var number = document.getElementById("number");
var length = document.getElementById("input_length");


pass.onfocus = function() {
    document.getElementById("show_show").style.display = "block";
}
pass.onblur = function() {
    document.getElementById("show_show").style.display = "none";
}


pass.onkeyup = function() {

  var lowerCaseLetters = /[a-z]/g;
  if(pass.value.match(lowerCaseLetters)) {  
    lowercase_letter.classList.remove("invalid");
    lowercase_letter.classList.add("valid");
  } else {
    lowercase_letter.classList.remove("valid");
    lowercase_letter.classList.add("invalid");
  }
  

  var upperCaseLetters = /[A-Z]/g;
  if(pass.value.match(upperCaseLetters)) {  
    uppercase_letter.classList.remove("invalid");
    uppercase_letter.classList.add("valid");
  } else {
    uppercase_letter.classList.remove("valid");
    uppercase_letter.classList.add("invalid");
  }


  var numbers = /[0-9]/g;
  if(pass.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  

  if(pass.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
      
	  </div>
    </div>


</div>
</div>
</div>
	
  
<nav class="navbar navbar-expand-md navbar-light" id="navstyle" style="background-color: #e3f2fd;margin-top: 12%;">

		
<ul class="navbar-nav" id="footer_style">
   <div class="container">
   <div class="row">
    <li class="text-center">Coppy right @ Suite name</li>
    </div>
    </div>
  </ul>
</nav>

    
    


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    
    <script src="js/bootstrap.min.js"></script>
    
    
  </body>
</html>
<?
mysqli_close($connection);
?>