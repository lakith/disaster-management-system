<?php

// php code to Insert data into mysql database from input text
if(isset($_POST['insert']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "disaster_managment";
    
    // get values form input text and number

    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Date = $_POST['Date'];
    $Location = $_POST['Location'];
    $Lon = $_POST['Longitude'];
    $Details = $_POST['Details'];
    $Lati = $_POST['Longitude_1'];
    
    // connect to mysql database using mysqli

    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // mysql query to insert data

    $query = "INSERT INTO `fuck_disaster`(`id`, `Name`, `Date`, `Location`, `Lon`, `Details`,`Lati`) VALUES ('$id','$Name','$Date','$Location','$Lon','$Details','$Lati')";
    
    $result = mysqli_query($connect,$query);
    
    // check if mysql query successful

    if($result)
    {
        echo 'Data Inserted';
    }
    
    else{
        echo 'Data Not Inserted';
    }
    
    
    mysqli_close($connect);
}

?>