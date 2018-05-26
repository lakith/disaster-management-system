<html>
    <head>
    </head>
    <body>
     

    <?php  
    $connect = mysqli_connect("localhost", "root", "", "disaster_managment");  
    $query ="SELECT lat,lng FROM markers";  
    $result = mysqli_query($connect, $query); 

    
    $user_query = mysqli_query($connect, $query);

    $numrows = mysqli_num_rows($user_query);
    
        if($numrows < 1){
          echo "No posts";
          exit();	
        }
    
        $lat;
        $lan;
        $count=0;
        $count2=0;
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $lat[$count] = $row['lat'];
        $lan[$count] = $row['lng'] ;

      }

    } 

    ?>
    
    <script>
    for(i=0;i<5;i++)
    { 
        document.write("fuck");
       


    }
    </script>

    

    </body>
   </html>