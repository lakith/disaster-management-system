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
	
	#username,#password
	{
		width: 95%;
		margin-left: 2%;
		margin-right: 2%;

	}
	
	#btnlogin
	{
		margin-left: 375%;
		margin-top: 6%;
		width: 80%;
		
	}
	#remberme
	{
		margin-top: 10%;
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
		#changepass
		{
			display: none;
		}
		#lets_go
	{
		display: none;
	}
		#admin
		{
			display: none;
		}
		#user
		{
			display: none;
		}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
    
       
  </head>

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
  
    <body onLoad="checklog()" style="background-color:#FCFFFE;">
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
<?php
	  
	  
	 $username=$log_username;

	$sql = "SELECT * FROM person WHERE username='$username' "; 

	$user_query = mysqli_query($connection, $sql);

	$numrows = mysqli_num_rows($user_query);
	if($numrows < 1){
		echo "That user does not exist or is not yet activated, press back";
		exit();	
	}

	while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
		$firstname = $row["First_name"];
		$lastname = $row["Last_name"];
		$tel_no = $row["contact_number"];
		$email=$row["Email"];
		$address = $row["address"];
		$dob = $row["dob"];
		$uid = $row["person_id"];
		$job = $row["job_title"];
		$user = $row["username"];
	}

?>



<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-3">
		
			
		</div>
		<div class="col-md-6">
		<img src="image/timthumb.png" width="50%" height="350px" style="margin-left: 25%;margin-top: 3%;margin-bottom:3%; \">
		<ul class="list-group">
		  <li class="list-group-item active" style="margin-top: 1%;margin-bottom: 1%; padding-top: 3%;padding-bottom: 3%;font-size: 20px">Full name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span class="badge badge-default badge-pill" style="font-size:15px" ><?php echo($firstname." ".$lastname)?></span>
		  </li>
		  <li class="list-group-item"   style="margin-top: 1%;margin-bottom: 1%;padding-top: 3%;padding-bottom: 3%;font-size: 20px">contact_number &nbsp;&nbsp;
		  <span class="badge badge-default badge-pill" style="font-size:15px" ><?php echo($tel_no) ?></span>
		  </li>
		  <li class="list-group-item"  style="margin-top: 1%;margin-bottom: 1%;padding-top: 3%;padding-bottom: 3%;font-size: 20px">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span class="badge badge-default badge-pill" style="font-size:15px"><?php echo($email) ?></span>
		  </li>
		  <li class="list-group-item"  style="margin-top: 1%;margin-bottom: 1%;padding-top: 3%;padding-bottom: 3%;font-size: 20px">job_title &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span class="badge badge-default badge-pill" style="font-size:15px"><?php echo($job) ?></span>
		  </li>
		  <li class="list-group-item"  style="margin-top: 1%;margin-bottom: 1%;padding-top: 3%;padding-bottom: 3%;font-size: 20px">username &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span class="badge badge-default badge-pill" style="font-size:15px"><?php echo($user) ?></span>
		  </li>
		  <li class="list-group-item"  style="margin-top: 1%;margin-bottom: 1%;padding-top: 3%;padding-bottom: 3%;font-size: 20px">dob &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span class="badge badge-default badge-pill" style="font-size:15px"><?php echo($dob) ?></span>
		  </li>
		  <li class="list-group-item"  style="margin-top: 1%;margin-bottom: 1%;padding-top: 3%;padding-bottom: 3%;font-size: 20px">address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <span class="badge badge-default badge-pill" style="font-size:15px"><?php echo($address) ?></span>
		  </li>
		   <li class="list-group-item" style="margin-bottom: 2%;font-size: 20px">Change password<br><br>

			
			<button type="button" onClick="displaycall()" class="btn btn-info">Change Password</button><br><br>


	   		
	   			<script>
		
		var current = "<?php echo $log_password?>";
		
		
		function confirm(current2){

			if(current === current2)
			{
				document.getElementById("newnew").disabled=false;
				document.getElementById("newcon").disabled=false;

			}
		
		}
		
	</script>
	
	<script>
	
	function check()
	{
		
		var pass1 = document.getElementById("newnew").value;
		var pass2 = document.getElementById("newcon").value;
		
		//document.getElementById('display').innerHTML=pass1+" "+pass2;
		
		if(pass1 == "" && pass2 == "")
		{
			document.getElementById("btn").disabled = true;
			document.getElementById('display').innerHTML="im in2";
		}
		
		if(pass1 == pass2)
		{
			document.getElementById("btn").disabled = false;
			document.getElementById('display').innerHTML="im in3";
		}
		
		if(pass1 != pass2)
		{
			document.getElementById("btn").disabled = true;
			document.getElementById('display').innerHTML="im in3";
		}
		
	}
	
	</script>

	<script>
		function displaycall() {
    		var x = document.getElementById("changepass");
    		if (x.style.display === "none") {
        	x.style.display = "block";
    		} else {
        	x.style.display = "none";
    		}
		}
		</script>


			<div id="changepass">
				<form action="updatepass.php"  method="post">
					<label id="gfont">Current Password</label><br><input type="password" name="currentpassword" id="getcurrent" onKeyUp="confirm(document.getElementById('getcurrent').value)" required/><br><br>
					<label id="gfont">New Password</label><br><input id = "newnew" type="password" name="newpassword" disabled required/><br><br>
					<label id="gfont">Confirm New Password</label><br><input id = "newcon" type="password" name="confirmpassword" disabled onKeyUp="check()" required/><br><br>
					<button type="submit" id="btn" onClick="check()" disabled/>Change password</button>
				</form>
			</div>

				   </li>
				</ul>


				</div>
				<div class="col-md-3">

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