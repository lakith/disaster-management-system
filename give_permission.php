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
	
	.letsstayinline
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
        <a class="nav-link" href="aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Our Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>  
    </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"> Dropdown link </a>
      <div class="dropdown-menu"> <a class="dropdown-item" href="#">Link 1</a> <a class="dropdown-item" href="#">Link 2</a> <a class="dropdown-item" href="#">Link 3</a> </div>
    </li>
    <li class="nav-item">
      <a href="addusers.php" class="nav-link"><i class="fa fa-user-circle" aria-hidden="true"></i>  Add New Users</a>
    </li>
    <li class="navbar-item">
      <a href="login.php" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i>  Login</a>
    </li>
  </ul>
  </div>  
</nav>






<div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
			
		</div>
		
		<div class="col-md-7" style="margin-left: 5%;">
		
		<?php
	

		$sql = "SELECT heading, special_note, warning_note FROM disaster_info WHERE conformation = 0";
		$result = $connection->query($sql);

		if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc()) 
			{
				echo 
					"
					
					<div class='container' style='margin-top: 3%;margin-bottom: 3%;'>
			  <div class='card' style='width:700px'>
				   <div id='carouselExampleIndicators' class='carousel slide' data-ride='carousel'>
			  <ol class='carousel-indicators'>
				<li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
				<li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
				<li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
			  </ol>
			  <div class='carousel-inner' role='listbox'>
				<div class='carousel-item active'>
				  <img class='d-block img-fluid' src='image/rsz_forest-fire_04-ps.jpg' alt='First slide'>
				</div>
				<div class='carousel-item'>
				  <img class='d-block img-fluid' src='image/rsz_4d0a97ac100a443a9d31af9b68ef9e87_18.jpg' alt='Second slide'>
				</div>
				<div class='carousel-item'>
				  <img class='d-block img-fluid' src='image/rsz_1412368123000-mesostorm-lightning.jpg' alt='Third slide'>
				</div>
			  </div>
			  <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
				<span class='carousel-control-prev-icon' aria-hidden='true'></span>
				<span class='sr-only'>Previous</span>
			  </a>
			  <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
				<span class='carousel-control-next-icon' aria-hidden='true'></span>
				<span class='sr-only'>Next</span>
			  </a>
			</div>
				<div class='card-body'>
				  <h4 class='card-title'>".$row['heading']."</h4>
				  <p class='card-text'>
				  <p>".$row['special_note']."</p>
				  <p>".$row['warning_note']."</p>
				  </p>
				  
				  <a href='#' class='btn btn-primary'>Check report</a>
				</div>
			  </div>
				   </div>
				 </div>
					
					";
			}

		} else {
			echo "0 results";
		}


		?>



	 
	<div class="col-md-4">
		
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