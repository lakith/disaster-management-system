<?php
session_start();

$_SESSION = array();

if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])) {
    setcookie("user", '', -time()+(60*60*60*2),"/");
	setcookie("password", '', -time()+(60*60*60*2),"/");
}

session_destroy();

if(isset($_SESSION['username'])){

	echo"<h1>Log Out Error!!</h1>";
} else {
	header("location:home.php");
	exit();
} 
?>