<?php

$id = $_GET['id'];


$host='localhost';
$connect=mysqli_connect($host,'root','','disaster_management');



$sql = "DELETE FROM person WHERE person_id='$id'"; 

$user_query = mysqli_query($connect, $sql);

header("refresh:0.2 ; url=view_users.php");
	
?>