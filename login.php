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

session_start();

if(isset($_SESSION["userid"]) && isset($_SESSION["username"]) && isset($_SESSION["password"])) {
	header("Location: Home.php");
	
} else if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])){
	header("Location: Home.php");
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

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
    
       
  </head>
  <body>

	<nav class="navbar navbar-expand-md  navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">Suit name</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Our Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact Us</a>
      </li>  
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Dropdown link
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Link 1</a>
        <a class="dropdown-item" href="#">Link 2</a>
        <a class="dropdown-item" href="#">Link 3</a>
      </div>
    </li>  
    </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link"><i class="fa fa-user-circle" aria-hidden="true"></i>  Add New Users</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i>  Login</a>
    </li>
  </ul>
  </div>  
</nav>

<div class="container-fluid" style="margin-top: 5%;">
	<div class="row">
		
	<div class="col-sm-3"></div>
	
	<div class = "col-sm-6" style="box-shadow: 1PX 1px 1px 2px rgba(0,0,0,0.20);border:#FFF;padding:2%;">
		
	  <div class="panel panel-success">
      <div class="panel-heading"><h2 class = "text-center">Login</h2></div>
      <div class="panel-body">
      	
      	<form role="form" method="post" action="loginback.php">
      		<div class="form-group">
      		<label for="username" id="lableid">
      			Username :
      		</label>
      		<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required>
      		
      		<label for="pwd" id="lableid">
      			Password :
      		</label>
      		<input type="password" class="form-control" id="pass" placeholder="Enter password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
      		<div class="col-sm-3 col-sm-offset-9">
      		<div class="checkbox" id="remberme">
     			 <label><input type="checkbox" name="remember" > Remember me</label>
    		 </div>
      		<button type="submit" class="btn btn-success" id="btnlogin">Login</button>

      		</div>
      		</div>
			</div>
      	</form>
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