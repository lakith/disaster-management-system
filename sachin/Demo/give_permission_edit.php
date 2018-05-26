<!DOCTYPE html>
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

  
  <style>
	  
	#disadd
	 {
		margin-left: 40%;
		color: red;
		margin-top: 2%;
		font-family: Lucida Grande, Lucida Sans Unicode, Lucida Sans, DejaVu Sans, Verdana," sans-serif";
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
		
	  
	  #enterdetails
	  {
		  margin-left: 48%;
		  color: green;
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
	  
  </style>


</head>

<body onload="myFunction()">


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
  
  <div class="container">
  <h1 id="disadd"> Report a disaster </h1></div>
  <h2 id="enterdetails">Add details</h2>

<div class="container-fluid">
 
  <div class="row">
    <div class="col-sm-6">
     <h2 id="diplaydown">Select the location</h2>
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
    <div class="col-sm-6" id="letsgodown">
    
		
     
      <form action="sachin/Demo/Save_Disaster.php?uname=lakithmuthugala" method="post" enctype="multipart/form-data">
              
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

         
                  <legend>Add Images</legend> 
                  <div class="row">
                      <div class="form-group col-sm-2"> 
                          <div class="img-picker" name="image1"></div>
                      </div> 
                      <div class="form-group col-sm-2"> 
                          <div class="img-picker" name="image2"></div>
                      </div> 
                      <div class="form-group col-sm-2"> 
                          <div class="img-picker" name="image3"></div>
                      </div> 
                      <div class="form-group col-sm-2"> 
                          <div class="img-picker" name="image4"></div>
                      </div> 
                      <div class="form-group col-sm-2"> 
                          <div class="img-picker" name="image5"></div>
                      </div> 
                  </div>
               
        <button type="submit" name="insert" class="btn btn-default">Submit</button>
      </form>
      
      
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
  
<nav class="navbar navbar-expand-md navbar-light" id="navstyle" style="background-color: #e3f2fd;">
<ul class="navbar-nav" id="footer_style">
   <div class="container">
   <div class="row">
    <li class="text-center">Coppy right @ Suite name</li>
    </div>
    </div>
  </ul>
</nav>
 
</body>
</html>
