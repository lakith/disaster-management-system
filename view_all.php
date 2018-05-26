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

	$catagory = $_GET['catagory'];

?>

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

?>


<!doctype html>


<html lang="en">
  <head>
   <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed" rel="stylesheet">
   
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
	
	#card_content
	{
		margin-top: 2%;
		margin-bottom: 2%;
	}
		
	.upnup
	{
		position:relative; 
		margin-top: -6%;
		margin-bottom: 3%;
		background-color:white;
		padding: 2%;
		width: 80%;
		margin-left:10%;
		
		
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
  	   		
   	   		<a href="blog.php" style="color:#005A01;margin-left: 8%;">
    	   Logged in as <?php echo($log_username)?>
    	   </a> 
		</div>
</nav>
 

 

 <h2 class="text-center" style="margin-top: 2%;font-family: 'Fira Sans Extra Condensed', sans-serif;"> <?php echo($catagory) ?> </h2>
	<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
		
		 <?php
			$sql = "Select * FROM disaster_info WHERE disaster_name ='$catagory'";
	 		
	 				$result = $connection->query($sql);

					$user_query = mysqli_query($connection, $sql);


					$numrows = mysqli_num_rows($user_query);
			
					if($numrows < 1){
						echo "No posts";
						exit();	
					}
			
			
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {

						echo "
			<div class='card' style='margin-bottom: 2%;'>
  		 		<a href='view_disaster.php?id=".$row["id"]."' style='text-decoration: none'>
   		 			<img src='view_image.php?id=".$row["id"]."' alt='Floods' style='height:400px;width:100%;' >
    					<div class='card-body'>
      						<div class='upnup'><h4 class='card-title text-center text-danger'>".$row['heading']."</h4></div>
      							<p class='card-text'>".$row['discription']."
      						</p>
						</div>
     				</a>
				</div>
						
						";
					}

				} else {
					echo "0 results";
				}
			
	  
	 	 ?>
			

		<div class="col-md-3" >
		
		
		</div>
	</div>
</div>




<nav class="navbar navbar-expand-md navbar-light" id="navstyle" style="background-color: #e3f2fd;">
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