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
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="Icon/font-awesome-4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
    <title></title>
    <!-- Required meta tags -->
    
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
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
        margin-top:3%; /* Don't copy this */
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
    </style>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3E8GH4PEWqF4lvfqsUxgJOzqHZ0_83Sc&sensor=false&libraries=places"></script>
    <br>




  </head>
  <body>
  	   <div class="container" style="margin-bottom: 2%; margin-left: 7%;">
      <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div id="imaginary_container"> 
                    <div class="input-group stylish-input-group">
                        <input type="text" id="pac-input" class="form-control"  placeholder="Search"  onKeyUp="">
                        <br>
                        <span class="input-group-addon">
                            <button type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>  
                        </span>
                    </div>
                </div>
            </div>
      </div>
	  </div>
    
  
  
   <div class="container" id="map-canvas" style="height:900px;"></div>

    <script>
        function init() {
      var map = new google.maps.Map(document.getElementById("map-canvas"), {
           center: { lat: 30.2655498, lng: -97.7452663 }, 
           zoom: 12
            });

             var marker = new google.maps.Marker({ 
                 position: {
                      lat: 30.2655498, 
                      lng: -97.7452663
                       },

                        map: map, 
                        draggable: true
                         });

                     
        google.maps.event.addListener(marker,'dragend',function(event){
   
		
		var lat=100;
		var lng = 100;
			
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();
        
		
			
        console.log(lat);
        console.log(lng);
			
		
		document.getElementById('showlatlan').innerHTML = lat +lng;
		
			

        
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
   
   <p id="showlatlan"></p>

  </body>
</html>