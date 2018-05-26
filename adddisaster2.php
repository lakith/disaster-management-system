<!DOCTYPE html>
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

if($user_ok == false)
{
	header('Location:Home.php ');
}

$sql = "SELECT person_id,user_level FROM person Where username ='$log_username'";

$user_query = mysqli_query($connection, $sql);

$numrows2 = mysqli_num_rows($user_query);
if($numrows2 < 1){
	header('Location:Home.php ');
}

while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$id = $row["person_id"];
	$userlevel = $row["user_level"];
}



?>

<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
   <script src="js/bootstrap.min.js"></script>
   
  <link rel="stylesheet" type="text/css" href="sachin/Demo/picker.css"> 
  
  <script src="sachin/Demo/picker.js"></script>
  
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
  <style>
	  
	#disadd
	 {
		margin-left: 40%;
		color:#dc3545;
		margin-top: 2%;
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
		
	  
	  .style_style
	  {
		color: green;
		font-family: 'Open Sans Condensed', sans-serif;			  
	  }
	  
	  #diplaydown
	  {
		 margin-bottom: 2%; 
	  }
	
	  #letsgodown
	  {
		  margin-top: 5.5%;
	  }


    #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #imaginary_container{
        margin-top:3%;
    }
    .stylish-input-group .input-group-addon{
        background: white !important; 
    }
    .stylish-input-group .form-control{
      border-right:0; 
      box-shadow:0 0 0; 
      border-color:#ccc;
    }
    .stylish-input-group button{
        border:0;
        background:transparent;
    }
	  

	  #discatanatural,#letschange,#discatamanmade
	  {
		  display: inline;
	  }

	  .inlineclass
	  {
		  margin-left: 5%;

	  }
	  .vikarakarannaepayako
	  {
		  height: 100px;
		  width: 120px;
	  }
  </style>


</head>

<body onload="myFunction()" style="background-color:#FCFFFE;">


	<iframe width="100%;" src="navbar.php" height="61px" frameborder="0"></iframe>
  
  <div class="container">
  <h1 id="disadd" style="font-family: font-family: 'Roboto Condensed', sans-serif;"> Report a disaster </h1></div>

<div class="container-fluid">
 
  <div class="row">
    <div class="col-sm-6">
     <h2 id="diplaydown" class="style_style">Select the location</h2>
      <div id="imaginary_container"> 
        <div class="input-group stylish-input-group">
            <input type="text" id="pac-input" class="form-control"  placeholder="Search" >
            <br>
            <span class="input-group-addon">
                <button type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>  
            </span>
        </div>
    </div>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3E8GH4PEWqF4lvfqsUxgJOzqHZ0_83Sc&sensor=false&libraries=places"></script>
    <br>
    <div class="container" id="map-canvas" style="height:600px; width:670px;"></div>

    <script>
  var x;
  var y;
   
        function init() {
      var map = new google.maps.Map(document.getElementById("map-canvas"), {
           center: { lat: 6.9271, lng: 79.8612 }, 
           zoom: 12
            });

             var marker = new google.maps.Marker({ 
                 position: {
                      lat: 6.9271, 
                      lng: 79.8612
                       },

                        map: map, 
                        draggable: true
                         });

                     
        google.maps.event.addListener(marker,'dragend',function(){
   
         var lat = marker.getPosition().lat();
         var lng = marker.getPosition().lng();

           var x=lat;
          var y=lng;
       

         carName = "Volvo";
        
 
         document.getElementById("setLati").value =x;
         document.getElementById("setLong").value =y;
         
         });    

      
      
           
  

                         

                  var searchBox = new google.maps.places.SearchBox(document.getElementById('pac-input'));
                   google.maps.event.addDomListener(searchBox, 'places_changed', function() {
                        var places = searchBox.getPlaces();
                         var bounds = new google.maps.LatLngBounds();
                          var i, place;    
                          
                          for (i = 0; place = places[i]; i++) {
                              bounds.extend(place.geometry.location);
                                   marker.setPosition(place.geometry.location); 
                                   }

                                   map.fitBounds(bounds);
                                    map.setZoom(15); 
                            });
        }
        google.maps.event.addDomListener(window, 'load', init);

        
        
    </script>
      

		
		
		

     
     

      
    </div>
    <div class="col-sm-6" id="letsgodown" style="margin-top: -0.3%;">
    
		<h2 class="style_style" style="font-family: font-family: 'Roboto Condensed', sans-serif; margin-bottom: 3.5%;">Add details</h2>
     
        <form action="adddister_back.php?uname=<?php echo($id) ?>" method="post" enctype="multipart/form-data">
              
        <div class="form-group">
         
         <div>
		   <select name="distype" class="btn btn-default" style="margin-bottom: 2%;" onChange="selectdiv()" id="letschange" required>
			 <option value="10">Natural disaster</option>
			 <option value="20">Man made disaster</option>
		   </select>
         </div>
         
         <div style="display: none" id="discatanatural">
		   <select name="discata1"  class="btn btn-default" style="margin-bottom: 2%;">
			 <option value="2" onClick="disnatural" selected>Flood</option>
			 <option value="3" onClick="dismanmade">Thunderstome</option>
			 <option value="1" onClick="dismanmade">Landslide</option>
			 <option value="4" onClick="dismanmade">Tsunami</option>
			 <option value="5" onClick="dismanmade">Drought</option>
			 <option value="6" onClick="dismanmade">Wildfire</option>
		   </select>
         </div>
         
         <div style="display: none" id="discatamanmade">
		   <select name="discata2" class="btn btn-default" style="margin-bottom: 2%;">
			 <option value="7" onClick="disnatural" selected>Accident</option>
			 <option value="8" onClick="dismanmade">Electrical Breakdown and Leakages</option>
			 <option value="9" onClick="disnatural">Roadslide</option>
			 <option value="10" onClick="dismanmade">Fire</option>
			 <option value="11" onClick="disnatural">Explosion</option>
			 <option value="12" onClick="dismanmade">Dam Failure</option>
		   </select>
         </div>
         
         <script>
			 function selectdiv()
			 {
				 
				 var x = document.getElementById("letschange").value;
				 
				 if( x == 10)
				 {
				 document.getElementById('discatanatural').style.display="block";
				 document.getElementById('discatamanmade').style.display="none"; 
				 }
				 else
				 {
				 document.getElementById('discatamanmade').style.display="block";
				 document.getElementById('discatanatural').style.display="none"; 
				 }
				 
			 }
		 </script>
         
          <label for="ID">Disaster title:</label>
          <input type="text" class="form-control col-xs-2" id="heading" placeholder="Disaster title" name="distitle">
        </div>
        <div class="form-group">
          <label for="Name">Name:</label>
          <input type="text" class="form-control col-xs-2" id="name" placeholder="Enter Name" name="Name">
        </div>
        <div class="form-group">
          <label for="Date">Date:</label>
          <input type="text" class="form-control col-xs-2"  id="date" placeholder="Enter Date" name="Date">
        </div>
        <div class="form-group">
          <label for="Location">Location:</label>
          <input type="text" class="form-control col-xs-2" id="pwd" placeholder="Enter Location" name="Location">
        </div>
        
       <div class="form-group">
          <label for="Location">Latitude:</label>
          <input type="text" class="form-control col-xs-2" id="setLati" placeholder="Enter Latitude" onclick="init()" name="Latitude">
        </div>
        
        <div class="form-group">
          <label for="Location">Longitude:</label>
          <input type="text" class="form-control col-xs-2" id="setLong" placeholder="Enter Location" name="Longitude">
        </div>
        
        <div class="form-group">
          <label for="Location">Damage ammount:</label>
          <input type="text" class="form-control col-xs-2" id="Damage_ammount" placeholder="Enter Damage ammount" name="Damage_ammount">
        </div>
        
        <div class="form-group">
          <label for="Location">No of Injuries:</label>
          <input type="text" class="form-control col-xs-2" id="No_of_injuries" placeholder="Enter no of Injuries" name="no_of_injuries">
        </div>
        

        <div class="form-group">
          <label for="Location">No of Deaths:</label>
          <input type="text" class="form-control col-xs-2" id="No_of_Deaths" placeholder="Enter no of deaths" name="no_of_deaths">
        </div>
        
        <div class="form-group">
            <label for="Detailst">Details:</label>
            <textarea class="form-control" rows="2" id="Write_comment" name="Details"></textarea>
        </div>
		
        <div class="form-group">
            <label for="Detailst">Special Note:</label>
            <textarea class="form-control" rows="2" id="special_note" name="special_note"></textarea>
        </div>
         
        <div class="form-group">
            <label for="Detailst">Warning Note:</label>
            <textarea class="form-control" rows="2" id="warning_note" name="warning_note"></textarea>
        </div>
			
        	  <input type="file" name="image" onchange="readURL(this);" style="margin-bottom: 1%;"/>
			  <input type="file" name="image2" onchange="readURL2(this);" style="margin-bottom: 1%;"/>
              <input type="file" name="image3" onchange="readURL3(this);" style="margin-bottom: 1%;"/>
              <input type="file" name="image4" onchange="readURL4(this);" style="margin-bottom: 1%;"/>


        
         
                  <legend style="margin-top: 2%;margin-bottom: 1%;">View Images</legend> 
          
                      <div class="form-group col-sm-2 inlineclass" > 
                         <img src="image/1.jpg" width="120px" height="100px" style="margin-left: 5%;" id="bla1" class="vikarakarannaepayako">
                      </div>
                    
                      <div class="form-group col-sm-2 inlineclass"> 
                          <img src="image/1.jpg" width="120px" height="100px" style="margin-left: 5%;" id="bla2" class="vikarakarannaepayako">
                      </div> 
                      <div class="form-group col-sm-2 inlineclass"> 
                           <img src="image/1.jpg" width="120px" height="100px" style="margin-left: 5%;" id="bla3" class="vikarakarannaepayako">
                      </div> 
                      <div class="form-group col-sm-2 inlineclass"> 
                          <img src="image/1.jpg" width="120px" height="100px" style="margin-left: 5%;" id="bla4"  class="vikarakarannaepayako">
                      </div> 
                  </div>
                  
                
        <button type="submit" name="insert" class="btn btn-primary" style="float: right; margin-right: 3%; width: 120px;height: 40px;">Submit</button>
      </form>
      										<script type="text/javascript">
										
												function readURL(input) {
													if (input.files && input.files[0]) {
														var reader = new FileReader();

														reader.onload = function (e) {
															$('#bla1')
																.attr('src', e.target.result)
																.width(120)
																.height(100);
														};

														reader.readAsDataURL(input.files[0]);
													}
												}
												function readURL2(input) {
													if (input.files && input.files[0]) {
														var reader = new FileReader();

														reader.onload = function (e) {
															$('#bla2')
																.attr('src', e.target.result)
																.width(120)
																.height(100);
														};

														reader.readAsDataURL(input.files[0]);
													}
												}
												function readURL3(input) {
													if (input.files && input.files[0]) {
														var reader = new FileReader();

														reader.onload = function (e) {
															$('#bla3')
																.attr('src', e.target.result)
																.width(120)
																.height(100);
														};

														reader.readAsDataURL(input.files[0]);
													}
												}
										function readURL4(input) {
													if (input.files && input.files[0]) {
														var reader = new FileReader();

														reader.onload = function (e) {
															$('#bla4')
																.attr('src', e.target.result)
																.width(120)
																.height(100);
														};

														reader.readAsDataURL(input.files[0]);
													}
												}
										</script>
      
    </div>
  </div>
</div>


<p id="demo" onclick="myLatitude()"></p>
<p id="demos"></p>
  
 <script>
    function myFunction() {
              var d = new Date("July 21, 1983 01:15:00");
              d.setDate(15);
              document.getElementById("date").value = d;
         }

 </script>
  
<iframe src="footer.php" width="100%" height="45px" frameborder="0" style="margin-top: 2%;margin-bottom: -5%;"></iframe>
 
</body>
</html>
