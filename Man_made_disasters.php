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

<html lang="en">
  <head>
   
   
    <title></title>
    
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
<div class="container-fluid" style="margin-top: 2%;">
	<div class="row">
		<div class="col-md-3">
			
		</div>
		<div class="col-md-6">
			<center><h3 style="font-family: Constantia, Lucida Bright, DejaVu Serif, Georgia, serif">Hazard Profile of Sri Lanka</h3> </center>
			<iframe src="downloads/graph/index2.php" width="100%" height="400px" style="margin-top: 4%;"></iframe>
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>

<div class="container-fluid" id="card_content">
	<div class="row" style="margin-bottom: 1%">	
		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/4c2a6c76840f1cbc3a3d72e74c0becfe_XL.jpg" alt="Accident" style="width:100%; height: 300px">
    				<div class="card-body" >
      					<h4 class="card-title">Accident</h4>
      						<p class="card-text" style="text-align: justify">An accident, also known as an unintentional injury, is an undesirable, incidental, and unplanned event that could have been prevented had circumstances leading up to the accident been recognized, and acted upon, prior to its occurrence. Most scientists who study unintentional injury avoid using the term "accident" and focus on factors that increase risk of severe injury and that reduce injury incidence and severity.
      					</p>
     				<a href="view_all.php?catagory=Accident" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>



		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_b39fa426df408eeafd9761493ce036c4_xl.jpg" alt="ElectricalBreakdown" style="width:100%; height: 300px">
    				<div class="card-body">
      					<h4 class="card-title" style="text-align: justify" >Electrical Breakdown & Leakages</h4>
      						<p class="card-text">Surface electrical breakdown on a semi-insulating InP substrate is investigated. The surface is bare or passivated with anodic oxide, SiO2 or Si3N4 The observed breakdown voltage is about one order of magnitude higher than that of semi-insulating GaAs. The leakage current is sensitive to passivation processes and a thin anodic oxide gives the lowest leakage.LSI/VLSI is failure of device isolation due to surface electrical breakdown.
      					</p>
     				<a href="view_all.php?catagory=Electrical Breakdown and Leakages" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>

		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_stelprd3835113.jpg" alt="Roadslide" style="width:100%; height: 300px">
    				<div class="card-body">
      					<h4 class="card-title">Roadslide</h4>
      						<p class="card-text" style="text-align: justify">A Roadslide, also known as a landslip [1]or Mudslide,[citation needed] is a form of mass wasting that includes a wide range of ground movements, such as rockfalls, deep failure of slopes, and shallow debris flows. Landslides can occur underwater, called a submarine landslide, coastal and onshore environments.  there are other contributing factors affecting the original slope stability.Typically, pre-conditional factors build up specific sub-surface conditions .
      					</p>
     				<a href="view_all.php?catagory=Roadslide" Breakdown and Leakages"" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>
	</div>
	
	<div class="row">	
		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_dohzzq0ueaapthr.jpg" alt=" Fires"style="width:100%; height: 300px">
    				<div class="card-body">
      					<h4 class="card-title">Fire</h4>
      						<p class="card-text" style="text-align: justify">Fires are the accidents which occur most frequently, whose causes are the most diverse and which require intervention methods and techniques adapted to the conditions and needs of each incident.
							Depending on the type of fire (nature of the material ablaze), meteorological conditions (wind) and the effectiveness of the intervention, material damage can be limited (a single car, building or production or storage warehouse installation), or affect wide areas.Fires can spread more or less rapidly depending on their causes, the nature of the material and goods alight.
      					</p>
     				<a href="view_all.php?catagory=Roadslide" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>

		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_r0_332_4032_2599_w1200_h678_fmax.jpg" alt="Explosion" style="width:100%; height: 300px">
    				<div class="card-body">
      					<h4 class="card-title" >Explosion</h4>
      						<p class="card-text" style="text-align: justify">An explosion is a rapid increase in volume and release of energy in an extreme manner, usually with the generation of high temperatures and the release of gases. Supersonic explosions created by high explosives are known as detonations and travel via supersonic shock waves. Subsonic explosions are created by low explosives through a slower burning process known as deflagration. When caused by a human-made device such as an exploding rocket or firework.The explosion sent pieces of metal and glass hurtling through the air.
      					</p>
     				<a href="view_all.php?catagory=Roadslide" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>
		
		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_oroville-dam-759.jpg" alt="DamFailure" style="width:100%; height: 300px">
    				<div class="card-body">
      					<h4 class="card-title">Dam Failure</h4>
      						<p class="card-text" style="text-align: justify">A dam is a barrier across flowing water that obstructs, directs or slows down the flow, often creating a reservoir, lake or impoundments. Most dams have a section called a spillway or weir over or through which water flows, either intermittently or continuously, and some have hydroelectric power generation systems installed.Dams are considered "installations containing dangerous forces" under International Humanitarian Law due to the massive impact of a possible destruction on the civilian population and the environment. Dam failures are comparatively rare
      					</p>
     				<a href="view_all.php?catagory=Roadslide" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
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