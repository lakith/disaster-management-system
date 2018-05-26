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

$name_post = $_GET['id'];

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
        height: 500px;
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

		.fixSize
		{
			margin: 0.5%;
		}
		
		#margineChnge
		{
			margin-left: 4%;
		}
		
		.lets_inline
		{
			display: inline;
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

<?php
	  

$sql = "Select * FROM disaster_info Where id='$name_post'";

$result = $connection->query($sql);

					$user_query = mysqli_query($connection, $sql);


					$numrows = mysqli_num_rows($user_query);
					if($numrows < 1){
						echo "No posts";
						exit();	
					}

						while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
						$content = $row["discription"];
						$short = $row["short_discription"];
						$heading = $row["heading"];
						$special_note = $row["special_note"];
						$warning_note = $row["warning_note"];
						$disaster_type = $row["disaster_type"];
						$dis_name = $row["disaster_name"];
						$no_of_deaths = $row["no_of_deaths"];
						$no_of_injuries = $row["no_of_injuries"];
						$person_informed = $row["person_informed"];
						$harm = $row["disaster_category"];
					}	  
	  
	  $sql = "Select * FROM markers Where id='$name_post'";

	  $result = $connection->query($sql);

					$user_query = mysqli_query($connection, $sql);


					$numrows = mysqli_num_rows($user_query);
					if($numrows < 1){
						echo "No posts";
						exit();	
					}

						while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
						$lat = $row["lat"];
						$lng = $row["lng"];
					}
	  
	  
?>




<div class="container-fluid" style="margin-top: 5%;">
	<div class="row">
		
	<div class="col-sm-1 col-md-1"></div>
	
	<div class="col-sm-10 col-md-10">
	<center><h1 style="font-family: Baskerville, Palatino Linotype, Palatino, Century Schoolbook L, Times New Roman, serif">Update Post Report</h1></center><br>
	
	
	<div class="card">
  <div class="card-block">
    <center style="margin:4%;"><h4 class="card-title"><?php echo($heading) ?></h4></center>
    <h5 class="card-subtitle mb-2 text-muted" style = "margin: 2%;margin-left: 5%;">Images</h5>
    <div id="margineChnge">
    <img src="view_image2.php?id=<?php echo($name_post) ?>&imgno=1" width="300px" height="250px" class = "fixSize">
    <img src="view_image2.php?id=<?php echo($name_post) ?>&imgno=2" width="300px" height="250px" class = "fixSize"/>
    <img src="view_image2.php?id=<?php echo($name_post) ?>&imgno=3" width="300px" height="250px" class = "fixSize">
    <img src="view_image2.php?id=<?php echo($name_post) ?>&imgno=4" width="300px" height="250px" class = "fixSize"/>
    </div>

    <h5 class="card-subtitle mb-2 text-muted" style = "margin: 2%;margin-left: 5%;">Catogory : <?php echo($disaster_type) ?> disaster</h5>
    
    <h5 class="card-subtitle mb-2 text-muted" style = "margin: 2%;margin-left: 5%;">Type :<?php echo($dis_name)?></h5>
    <form action="updatepost_user_back.php?id=<?php echo($name_post)?>" method="post">
    <div class="form-group">
    <h5 class="card-subtitle mb-2 text-muted" style = "margin: 2%;margin-left: 5%;">Report</h5>
    <div id="margineChnge">
 	<textarea style="width: 80%;height: 300px; margin-left: 4%;" name="content" required><?php echo($content)?></textarea>
		</div>
    
    </div>
    <div class="form-group">
    <h5 class="card-subtitle mb-2 text-muted"  style = "margin: 2%;margin-left: 5%;">Special Note</h5>
    <div id="margineChnge">
 	<textarea style="width: 80%;height: 300px; margin-left: 4%;" name="special_note" required><?php echo($special_note)?></textarea>
    </div>
    </div>
    <div class="form-group">
    <h5 class="card-subtitle mb-2 text-muted" style = "margin: 2%;margin-left: 5%;">Warning Note</h5>
    <div id="margineChnge">
 	<textarea style="width: 80%;height: 300px; margin-left: 4%;" name = "warning_note" required><?php echo($warning_note)?></textarea>
    </div>
    </div>
    <h5 class="card-subtitle mb-2 text-muted" style = "margin: 2%;margin-left: 5%;">Other </h5>
    <div id="margineChnge">
    <ul>
    <div class="form-group">
 	<h7 class="card-subtitle mb-2 text-muted lets_inline" style = "margin: 1%;margin-left: 3%;"> No Of deaths</h7><p class="card-text lets_inline" style = "margin: 1%;"><input type="text" name="noOfDeaths" value="<?php echo($no_of_deaths) ?>" required/></p>
    <h7 class="card-subtitle mb-2 text-muted lets_inline" style = "margin: 1%;margin-left: 3%;"> No Of Injuries</h7><p class="card-text lets_inline" style = "margin: 1%;"><input type="text" name="noOfInjuries" value="<?php echo($no_of_injuries)?>" required /></p>
    <h7 class="card-subtitle mb-2 text-muted lets_inline" style = "margin: 1%;margin-left: 2%;"> Disaster Level</h7><p class="card-text lets_inline" style = "margin: 1%;"><input type="text" value="<?php echo($harm)?>" /></p>
    </ul>
    </div>
    </div>
    <div id="map"></div>
    <script>
      function initMap() {

        var uluru = {lat: 6.9271, lng: 79.8612};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: {lat: <?php echo($lat) ?>, lng: <?php echo($lng) ?>},
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSKlcdFAle-lnwFdJk_m2s2RG2GqUX0rY&callback=initMap">
    </script>
    
    
		  <div class="form-group">
			<div style="float: right; margin: 4%;" class="form-group">
		<button type="submit"  class="btn btn-dark" name="submit">Update</button>
		</div>
		  </div>
		  
		
	</form>
   		
    

  </div>
	</div>
	
	
		
	</div>
		
	<div class="col-sm-1 col-md-1">
		
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