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
	
	.remunder:hover
	{
		text-decoration: none;
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
			<iframe src="downloads/graph/index.php" width="100%" height="400px" style="margin-top: 4%;"></iframe>
			
		</div>
		<div class="col-md-3">
			
		</div>
	</div>
</div>

<div class="container-fluid" id="card_content">
	<div class="row" style="margin-bottom: 1%">	
		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_4d0a97ac100a443a9d31af9b68ef9e87_18.jpg" alt="Floods" style="width:100%">
    				<div class="card-body">
      					<h4 class="card-title">Flood</h4>
      						<p class="card-text">Floods are more of common occurrence in Sri Lanka than the other natural disasters. There are 103 river basins of which about 10 rivers are considered as major. Among these major rivers Kelani, Gin, Kalu, Nilwala and Mahaweli are vulnerable to floods. The increase in population and subsequent need for land have forced more and more people to live and work in these vulnerable areas, thereby intensifying the risk to life and property in the event of major floods. Heavy rainfall and runoff the large volume of water from the catchment areas of rivers, deforestation, improper land use and the absence of scientific soil conservation practices could be identified as the major factors for floods in Sri Lanka.
      					</p>
     				<a href="view_all.php?catagory=Flood" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>



		<div class="col-sm-4">
			<div class="card">
  		 		
   		 		<img class="card-img-top" src="image/rsz_1412368123000-mesostorm-lightning.jpg" alt="Thunderstome" style="width:100%">
    				<div class="card-body">
      					<h4 class="card-title">Thunderstome</h4>
      						<p class="card-text">All thunderstorms are dangerous. Every thunderstorm produces lightning. While lightning fatalities have decreased over the past 30 years, lightning continues to be one of the top three storm-related killers in the Sri lanka. On average in the Sri lanka., lightning kills 51 people and injures hundreds more. Although most lightning victims survive, people struck by lightning often report a variety of long-term, debilitating symptoms.
							Other associated dangers of thunderstorms include tornadoes, strong winds, hail and flash flooding. Flash flooding is responsible for more fatalities – more than 140 annually – than any other thunderstorm-associated hazard.
      					</p>
      					<a href="view_all.php?catagory=Thunderstome" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>

		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_b0dfd28656cb4d9b9da3372de4991ce3_18.jpg" alt="Thunderstome" style="width:100%">
    				<div class="card-body">
      					<h4 class="card-title">Landslide</h4>
      						<p class="card-text">Excessive rainfall, typical landform and geology, deforestation and unplanned land use practices combine to create landslide hazard especially during the last two decades in the mountain slopes of the Central and South Western regions of the Island. Landslides like any other natural disaster are a concern to us as they threaten the life and property of the people in the hill slopes.The districts of Badulla, Nuwara Eliya, Ratnapura, , Kandy and Matale are most prone to landslides. The highest risk is in the Kegalle District followed by Ratnapura and Nuwara Eliya Districts. Even within these Districts, there is spatial variability at Divisional Secretariat level.
      					</p>
     				<a href="view_all.php?catagory=Land Slide" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>
	</div>
	
	<div class="row">	
		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_t3.jpg" alt="Floods" style="width:100%">
    				<div class="card-body">
      					<h4 class="card-title">Tsunami</h4>
      						<p class="card-text">While Sri Lanka is far away from the plate boundaries, yet it is close enough to the highly active seismic zone near Sumatra and other regions to its South-East that earthquakes generated in this region may lead to a Tsunami Hazard in Sri Lanka. Tsunamis are rarer in the Indian Ocean as the seismic activity is much less than in the Pacific. Tsunami's are extremely infrequent - the last major volcanic explosion in the Indonesian island of Krakatau led to a Tsunami in Sri Lanka in August of 1883. The wave heights that resulted however were much smaller than the 2004 Tsunami. While earthquakes could not be predicted in advance, once the earthquake is detected it is possible to about an hour’s notice of a potential Tsunami for every 500 km distance from the epicenter. Such a system of warnings is in place across the Pacific Ocean.Tsunamis are likely to have a more modest impact on the coastal zone from Killinochchi to Puttalam.
      					</p>
     				<a href="view_all.php?catagory=Tsunami" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
 			 </div>
		</div>

		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_1396817315332.jpg" alt="Floods" style="width:100%">
    				<div class="card-body">
      					<h4 class="card-title">Drought</h4>
      						<p class="card-text">Drought is the most significant hazard in Sri Lanka in terms of people affected and relief provided. Drought occurs in the south-eastern, north central and north-western areas of Sri Lanka due to low rainfall during monsoons. In some areas, consecutive years of drought had lasting impact on livelihood options .The prevalence of drought maybe surprising given that Sri Lanka receives on average 1,800 mm of rainfall annually. However, it is distributed unevenly. A large part of the island is drought-prone from February to April and on to September if the subsidiary rainy season from May to June is dry.There is a stronger tendency to drought in the South-Eastern district of Hambantota and the North-Western region of the Mannar and Puttalam. The drought tendency is markedly less in the South-West corner of Sri Lanka where there is heavy rainfall. Main causes of drought are low rainfall, deforestation, improper land use and unplanned cultivation.
      					</p>
      					<a href="view_all.php?catagory=Drought" class="btn btn-primary" style="float: right;">View All</a>
    			</div>
    			
 			 </div>
		</div>
		
		<div class="col-sm-4">
			<div class="card">
   		 		<img class="card-img-top" src="image/rsz_forest-fire_04-ps.jpg" alt="Floods" style="width:100%">
    				<div class="card-body">
      					<h4 class="card-title">Wildfire</h4>
      						<p class="card-text">Wildfires can occur anywhere and can destroy homes, businesses, infrastructure, natural resources, and agriculture. For more information, download the How to Prepare for a Wildfire guide, which provides the basics of wildfires, explains how to protect yourself and your property, and details the steps to take now so that you can act quickly when you, your home, or your business is in danger.Wildfires can occur anywhere in the country. They can start in remote wilderness areas, in national parks, or even in your back yard. Wildfires can occur at any time throughout the year, but the potential is always higher during periods with little or no rainfall, which make brush, grass, and trees dry and burn more easily. High winds can also contribute to spreading the fire. Wildfires can start from natural causes, such as lightning, but most are caused by humans, either accidentally—from cigarettes, campfires, or outdoor burning—or intentionally.
      					</p>
     				<a href="view_all.php?catagory=Wildfire" class="btn btn-primary" style="float: right;">View All</a>
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