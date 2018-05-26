<?php

$id = $_GET['id'];


$host='localhost';
$connect=mysqli_connect($host,'root','','disaster_management');


$sql = "DELETE FROM disaster_info WHERE id='$id'"; 

$user_query = mysqli_query($connect, $sql);

header("refresh:0.2 ; url=myposts.php");
	
?>