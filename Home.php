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
   <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
   
    <title></title>
    <!-- Required meta tags -->
    
    <style type="text/css">
		
		h1,h2,h3,h4 {
        font-family: 'Roboto Condensed', sans-serif;
      }

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
	#lets_go
	{
		display: none;
		}
	
		.same_line
		{
			display: inline;
			margin-top: 0.5%;
			margin-bottom: 0.5%;
		}
		
		#admin
		{
			display: none;
		}
		#user
		{
			display: none;
		}
		.lets_add_border
		{
			border: 1px solid #DFDFDF;
			margin-bottom: 1%;
		}
		#minimize_bottom
		{
			margin-bottom: -1%;
		}
		
		.youchangefont
		{
			font-size: 20px;
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
  

    </div>

  <div class="container-fluid" style=" margin-top: 1%;" >
  	        <a class="weatherwidget-io" href="https://forecast7.com/en/6d9379d86/colombo/" data-label_1="PITIPANA" data-label_2="WEATHER" data-theme="original" >PITIPANA WEATHER</a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://weatherwidget.io/js/widget.min.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","weatherwidget-io-js");
</script>
  </div>
<div class="container-fluid">
	<div class="row">

		<div class="col-sm-3">
						
			<div class="wether_add"></div>
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="yahoo-weather-jquery-plugin.js"></script>
		<script type="text/javascript">
			const main = () => {
				$('.wether_add').yahooWeather();
			}
			$(document).ready(main);
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
			
							
		
								
				
		<div class="card" style="margin-top: 3%;">
		<div class="card-header" style="margin-bottom: 3%;">
			  <h5 class="text-center">Tips to save lifes</h5>
		  </div>
								
								
		  <div class="card-block">
			<!--<blockquote class="card-blockquote">-->
			  <p>
			  	<div class="list-group" style="margin-top: -5%;margin-bottom: -4%;">
				
				  
							<div class="post video-post medium-post lets_add_border">
									<div class="entry-header">
										<div class="entry-thumbnail embed-responsive embed-responsive-16by9">
											<iframe width="560" height="315" src="https://www.youtube.com/embed/74QiUtXcV5o" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
										</div>
									</div>
									<div class="post-content">								
										<div class="video-catagory"><center><a href="#" style="text-decoration:none;font-family: 'Roboto Condensed', sans-serif;color:#F3282B" class="youchangefont">How To Perform CPR on a Drowning Casualty</a></center></div>
										<p class="entry-title">
											
										</p>
									</div>
								</div>
								

					
				  
				
								<div class="post video-post medium-post lets_add_border">
									<div class="entry-header">
										<div class="entry-thumbnail embed-responsive embed-responsive-16by9">
											<iframe width="560" height="315" src="https://www.youtube.com/embed/tXaZs03MPPY" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
										</div>
									</div>
									<div class="post-content">								
										<div class="video-catagory"><center><a href="#" style="text-decoration:none;font-family: 'Roboto Condensed', sans-serif;;color:#F3282B" class="youchangefont">Protect Your Home from Lightning</a></center></div>
										<p class="entry-title">
											
										</p>
									</div>
								</div>
				 
				  
					
								<div class="post video-post medium-post lets_add_border" id="minimize_bottom">
									<div class="entry-header">
										<div class="entry-thumbnail embed-responsive embed-responsive-16by9">
											<iframe width="560" height="315" src="https://www.youtube.com/embed/w9fEGfmmojE" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
										</div>
									</div>
									<div class="post-content">								
										<div class="video-catagory"><center><a href="#" style="text-decoration:none;font-family: 'Roboto Condensed', sans-serif;color:#F3282B" class="youchangefont">10 ways to survive in natural disasters</a></center></div>
										<h2 class="entry-title">
											
										</h2>
									</div>
								</div>

					
				  
				</div>
			  </p>
			  
			<!--</blockquote>-->
		  </div>
		</div>				
        
        <iframe width="100%" height="500px" src="twiteer_try.html" style="margin-top: 2%; border:solid #D3D3D3 1px;"></iframe>
			
		</div>
		<div class="col-sm-6">
			

<div class="container-fluid">
	<div class="row">
		<!--<div class="col-sm-3">
		<a href="adddisaster2.php"><button class="btn btn-success" style="margin-top: 10%;">add disaster</button></a>
		
						
		<div class="container" style=""></div>
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="sachin/HTML5-Geolocation-Based-jQuery-Yahoo-Weather-Widget/yahoo-weather-jquery-plugin.js"></script>
		<script type="text/javascript">
			const main = () => {
				$('.container').yahooWeather();
			}
			$(document).ready(main);
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
		
			
		</div>-->
		<div class="col-sm-12">
   
		<iframe src="marker_Try.html" height="100%" width="100%;" style="margin-top: 2%; height: 600px;"></iframe>

		</div>
		<div class="col-sm-3">
		
			
		</div>
	</div>
</div>
   <?php 
				
				//$result = mysqli_query($connection,"select count(1) FROM disaster_info where conformation = 1");
				$id=0;
				$result = mysqli_query($connection,"select id FROM disaster_info where conformation = 1");
	
				while ($row = mysqli_fetch_assoc($result)) {
					
					$id = $row['id'];
					
				}

			  	if($id > 0)
				{
					
					$sql = "SELECT heading,short_discription FROM disaster_info WHERE id='".$id."'";

					$result = $connection->query($sql);

					$user_query = mysqli_query($connection, $sql);


					$numrows = mysqli_num_rows($user_query);
					if($numrows < 1){
						echo "No posts";
						exit();	
					}

						while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
						$content = $row["short_discription"];
						$heading = $row["heading"];

					}
				}

		   ?>

<div class="container-fluid" id="content_change">
	<div class="row">

		<div class="col-sm-12">
			<div class="thumbnail">
        <a href="view_disaster.php?id=<?php echo($id) ?>" target="_blank"  id="Latest_news2">
          <img src="view_image.php?id=<?php echo($id) ?>" alt="Flood-Colombo" style="width:100%">
          <div class="caption">
          
          
           <h3 class="text-center"> <p class="text-danger"><?php echo $heading ?></p></h3>
            <p ><?php echo $content ?></p>
          </div>
        </a>
      </div>
		</div>
		<!--<div class="col-sm-3">
			<!-- add here-->
			
			<!--<div id="jquery-script-menu">
<div class="jquery-script-center">
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>-->
		<div class="container"></div>
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script type="text/javascript" src="yahoo-weather-jquery-plugin.js"></script>
		<script type="text/javascript">
			const main = () => {
				$('.container').yahooWeather();
			}
			$(document).ready(main);
		</script><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
		</div>
		
	</div>

 
  
<div class="container-fluid" >
	<div class="row">
		
		
		<div class="col-sm-12">
		
		<div class="row">
			<div class="col-sm-6">
				<div class="thumbnail">
        			<a href="Natural_disasters.php" target="_blank" style="text-decoration: none;font-family:Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial,' sans-serif'">
         		    <img src="image/du-toitskloof-fire12-900x563.jpg" alt="Natural-Disasters" style="width:100%">
          			<div class="caption">
            			<h3 class="text-center">Natural Disasters</h2>
          			</div>
       				 </a>
     			</div>
			</div>
			<div class="col-sm-6">
				<div class="thumbnail">
        			<a href="Man_made_disasters.php" target="_blank" style="text-decoration: none;font-family:Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial,' sans-serif'">
         		    <img src="image/4c2a6c76840f1cbc3a3d72e74c0becfe_XL.jpg" alt="Nature" style="width:100%">
          			<div class="caption">
            			<h3 class="text-center">Man Made Disasters</h2>
          			</div>
       				 </a>
     			</div>
			</div>
			</div>
		</div>
		
		</div>
		<div class="col-sm-3"></div>
	</div>
	
			</div>
		<div class="col-sm-3">
		
				<div class="card"  style="margin-bottom: 3%; margin-top: 3%; padding-left: 2%;" id="user">
  <div class="card-header" style=" margin-bottom: 2%;">
   <h5 class="text-center"> User controls </h5>
  </div>
  <div class="card-block">
    <h6 class="card-title same_line">Add Report</h6>&nbsp;&nbsp;&nbsp;
    <a href="adddisaster2.php" class="btn btn-danger btn-sm same_line" >Add Report</a><br>

    <h6 class="card-title same_line">My posts</h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="myposts.php" class="btn btn-danger btn-sm same_line" style="margin-bottom: 2%;">My posts</a><br>
  </div>
</div> 
	   
	
		
	<div class="card"  style="margin-bottom: 3%; margin-top: 3%; padding-left: 2%;" id="admin">
  <div class="card-header" style=" margin-bottom: 2%;">
   <h5 class="text-center"> Admin controls </h5>
  </div>
  <div class="card-block">
    <h6 class="card-title same_line">Admin panel</h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="#" class="btn btn-danger btn-sm same_line" >Admin panel</a><br>

    <h6 class="card-title same_line">Add New Users</h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="addusers.php" class="btn btn-danger btn-sm same_line">Add Users</a><br>
        <h6 class="card-title same_line">View all users</h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="view_users.php" class="btn btn-danger btn-sm same_line">View Users</a><br>
    <h6 class="card-title same_line">View Post Request</h6>
    <a href="post_approveal.php" class="btn btn-danger btn-sm same_line" style="margin-bottom: 2%;">Post Request</a><br>
  </div>
</div> 
	   <div class="card" style="margin-top: 3%;">
		   <div class="card-header">
			  <h5 class="text-center">Latest News</h5>
		  </div>
		  <div class="card-block">
			<!--<blockquote class="card-blockquote">-->
			  <p>
			  	<div class="list-group" style="margin-top: -5%;margin-bottom: -4%;">
			  	
			  	<?php 
					
					$sql = "Select * FROM disaster_info Where conformation = 1";
		   
		   			$result = $connection->query($sql);

					$user_query = mysqli_query($connection, $sql);


					$numrows = mysqli_num_rows($user_query);
			
					if($numrows < 1){
						echo "No posts";
						exit();	
					}
			
					$count = 0;
					if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						$count++;
						if($count == 3)
						{
							break;
						}
							echo "
					<a href='#' class='list-group-item list-group-item-action flex-column align-items-start'>
					<div class='d-flex w-100 justify-content-between'>
					  <h5 class='mb-1'>".$row["heading"]."</h5>
					  <small class='text-muted'>3 days ago</small>
					</div>
					<p class='mb-1'>".$row["short_discription"]."</p>
					<small class='text-muted'>Lakith Muthugala</small>
				  </a>

							";
						}

					} else {
						echo "0 results";
					}

	
					?>

				</div>
			  </p>
			  
			<!--</blockquote>-->
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