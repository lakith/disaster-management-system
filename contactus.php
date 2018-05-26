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
  <div class="card-header"> <h3> Contact Details </h3> </div>
  <div class="card-body">
     <h5> General office</h5><br>
     <p> 332/A Thilakawila, Bandaragama</p><br>
     <p> Tel : 034 2252011</p><br>
     <p> Fax : 034 2252011</p><br><br>


     <h5>National Council for Disaster Management</h5><br>
     <p> Vidya Mawatha, Colombo 07</p><br>
     <p> Tel : +94-112-665185</p><br>
     <p> Fax : +94-112-665098</p><br><br><br>

<h4>Contact Details of the Ministry</h4>
<table class="table table-bordered"  id="tabel">
    <thead>
      <tr>
        <th>Name</th>
        <th>Designation</th>
        <th>Telephone</th>
        <th>Fax</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Hon. Anura Priyadarshana Yapa</td>
        <td>Minister</td>
        <td>+94-112-665404,   +94-112-665298</td>
        <td>+94-112-665280</td>
        <td> apyapa@yahoo.com</td>
      </tr>
      <tr>
        <td>Hon Dunesh Gankanda</td>
        <td>Deputy Minister</td>
        <td>+94-112-665605</td>
        <td>+94-112-665027</td>
        <td> dunesh@gmail.com</td>
      </tr>
      <tr>
        <td>Mr. M. Kingsly Fernando</td>
        <td>Secretary</td>
        <td>+94-112-665389</td>
        <td>+94-112-665098</td>
        <td> secretarymdm2015@gmail.com</td>
      </tr>
       <tr>
        <td>Mr. S Amalanadan</td>
        <td>Addl. Secretary </td>
        <td>+94-112-665994</td>
        <td>+94-112-665994</td>
        <td>samal25spm@yahoo.com</td>
      </tr>
       <tr>
        <td>Mr. H U R Fonseka</td>
        <td>Chief Accountant </td>
        <td>+94-112-665079</td>
        <td>+94-112-665090 </td>
        <td> upulrfonseka@yahoo.com</td>
      </tr>
      <tr>
        <td>Mrs. Sepali Rupasinghe</td>
        <td>Director - Planning </td>
        <td>+94-112-665171</td>
        <td>+94-112-665171 </td>
        <td>  sepalirupasinghe@yahoo.com</td>
      </tr>
      <tr>
        <td>Mrs. R A H Rasikani</td>
        <td>Assistant Director(Management) </td>
        <td>+94-112-665531</td>
        <td>+94-112-665170  </td>
        <td> rhasanthi@yahoo.com</td>
      </tr>
    </tbody>
  </table>




  </div> 
  
</div


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