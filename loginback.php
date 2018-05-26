<?php

$username=htmlentities($_POST['username']);
$password = htmlentities($_POST['password']); 
if(empty($username) || empty($password))
{
	die('Enter username and password');
}

$host='localhost';

$connect=mysqli_connect($host,'root','','disaster_management');

$username= strip_tags($username);
$password =  strip_tags($password); 

$username= htmlspecialchars($username);
$password =  htmlspecialchars($password); 

$username = stripcslashes($username);
$password = stripcslashes($password);

$username = mysqli_real_escape_string($connect,$username);
$password = mysqli_real_escape_string($connect,$password);



$sql = mysqli_query($connect,"SELECT * FROM person WHERE username='$username'");

	
if($sql){
	$row=mysqli_fetch_array($sql);
	
	$result = password_verify ($password ,$row['password']);
	
		if($row['username']==$username && $result){
			echo "<center><h2><a href='#'>Login Success!!<a></h2></center>";
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $row['password'];
			setcookie("user",$username,time()+(60*60*60*2),"/");
			setcookie("password",$password,time()+(60*60*60*2),"/");
			header("refresh:0.2 ; url=home.php");
			}
		else{
			echo "<center><h2>Login Failed!!</h2></center>";
			header("refresh:0.2 ; url=login.php");	
			} 
	}
else{
	echo "Login Failed Database Error!";
	exit();
	}
?>
