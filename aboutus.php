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

     #tabel{
        font-size: 14px;
        font-family: arial;
     }
	
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
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

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2">
			
		</div>
		<div class="col-sm-8">

		<div class="col-sm-2">
			
		</div>
	</div>
</div>
  
<div class="container-fluid" id="content_change">
	<div class="row">
		<div class="col-sm-2">
			<!-- add here-->
		</div>
		<div class="col-sm-8">
		   

       <div class="card">
  <div class="card-header"><h3>Overview</h3></div>
  <div class="card-body">
    <h4>Vision</h4><br>
    <p>Towards a safer Sri Lanka</p><br><br>

    <h4>Mission</h4><br>
    <p>To facilitate harmony and the prosperity and dignity of human life through effective prevention and mitigation of natural and man-made disasters in Sri Lanka</p><br><br>

    <h4>Objectives</h4><br>
    <p>Protection of the Community from Disasters</p><br><br>


    <h4>Operative Structure</h4><br>
    <p>Following Institutions are functioning under the Ministry for the Implementation of government policies to achieve these objectives</p><br>


    <ul>
       <li>Department of Meteorology -<a href=" http://www.meteo.gov.lk/"> http://www.meteo.gov.lk</a></li>
       <li>Disaster Management Centre -<a href=" http://www.dmc.gov.lk"> http://www.dmc.gov.lk</a></li>
       <li>National Building Research Organisation -<a href=" http://www.nbro.gov.lk"> http://www.nbro.gov.lk</a></li>
       <li>National Disaster Relief Services Centre -<a href=" http://www.ndrsc.gov.lk"> http://www.ndrsc.gov.lk</a></li>
    </ul>

  </div> 
  
</div>



    </div>
		<div class="col-sm-2">
			<!-- add here-->
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