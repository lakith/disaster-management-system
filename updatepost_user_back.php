<?php


$id = $_GET['id'];



$host='localhost';

$connect=mysqli_connect($host,'root','','disaster_management');

$content = htmlentities($_POST['content']);
$special_note = htmlentities($_POST['special_note']);
$warning_note = htmlentities($_POST['warning_note']);
$no_of_deaths = htmlentities($_POST['noOfDeaths']);
$no_of_injuries = htmlentities($_POST['noOfInjuries']);


if(empty($shortDis) && empty($id))
{
	die('<h1>post cannot be added</h1>');
}



$sql2 = mysqli_query($connect,"UPDATE disaster_info  SET discription = '$content',special_note = '$special_note',warning_note = '$warning_note',no_of_deaths='$no_of_deaths',no_of_injuries = '$no_of_injuries' WHERE id ='$id'");

if($sql2)
{
	echo("<center>Post Updated Successfully</center>");
	header("refresh:0.9 ; url=Home.php");
}
header("refresh:0.9 ; url=Home.php");
?>