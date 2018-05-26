
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
echo "I enter"; 

$currentpassword = $_POST['currentpassword'];
$newpassword = $_POST['newpassword'];
$connewpassword = $_POST['confirmpassword']; 
	
if(empty($currentpassword) || empty($newpassword) ||empty($connewpassword))
{
	die('Enter username and password');
}
if($connewpassword != $newpassword)
{
	die('Password is not matching');
}

/*echo $currentpassword;
echo $log_password;

if($log_password == $currentpassword)
{
	die('Password does not match');
}*/

$newpassword= password_hash ($newpassword , PASSWORD_DEFAULT, ['cost' => 12]);


$sql = mysqli_query($connection,"UPDATE person SET password = '$newpassword' WHERE username ='$log_username'");

$_SESSION = array();

if(isset($_COOKIE["user"]) && isset($_COOKIE["password"])) {
    setcookie("user", '', -time()+(60*60*60*2),"/");
	setcookie("password", '', -time()+(60*60*60*2),"/");
}

session_destroy();

if(isset($_SESSION['username'])){

	echo"<h1>Log Out Error!!</h1>";
} else {
	header("location:login.php");
	exit();
} 

header("refresh:0.2 ; url=login.php");
?>