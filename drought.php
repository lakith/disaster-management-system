<?php

$host = 'localhost';
$username = 'root';
$password = '';

$connection = mysqli_connect($host,$username,$password,'disaster_management');

if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

<!doctype html>


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

 <h2 class="text-center" style="margin-top: 2%;"> Drought </h2>
	<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
		
		
		
			<?php 
				

			  

					
					$sql = "SELECT heading,discription FROM disaster_info WHERE disaster_id= 1 ";

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
  		 		<a href='#'>
   		 			<img class='card-img-top' src='image/rsz_4d0a97ac100a443a9d31af9b68ef9e87_18.jpg' alt='Floods' style='height:400px'>
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

						while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
						$content = $row["discription"];
						$heading = $row["heading"];

					}
				

		   ?>

		<div class="col-md-2">
		
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