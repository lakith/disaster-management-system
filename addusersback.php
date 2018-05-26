<?php

$username=htmlentities($_POST['username']);
$password = htmlentities($_POST['password']); 
$firstname = htmlentities($_POST['firstname']);
$lastname = htmlentities($_POST['lastname']);
$dob = htmlentities($_POST['dob']);
$address = htmlentities($_POST['address']);
$email = htmlentities($_POST['email']);
$tel_no = htmlentities($_POST['tel_no']);
$job_title = htmlentities($_POST['job_title']);


if(empty($username) || empty($password)|| empty($firstname)|| empty($lastname)|| empty($dob)|| empty($address)|| empty($email)|| empty($tel_no)|| empty($job_title))
{
	die('<h1>Enter All details</h1>');
}

$host='localhost';

$connect=mysqli_connect($host,'root','','disaster_management');

$username= strip_tags($username);
$password =  strip_tags($password); 
$firstname =  strip_tags($firstname);
$lastname =  strip_tags($lastname);
$dob =  strip_tags($dob);
$address =  strip_tags($address);
$email = strip_tags($email);
$tel_no =  strip_tags($tel_no);
$job_title =  strip_tags($job_title);

$username= htmlspecialchars($username);
$password =  htmlspecialchars($password); 
$firstname =  htmlspecialchars($firstname);
$lastname =  htmlspecialchars($lastname);
$dob =  htmlspecialchars($dob);
$address =  htmlspecialchars($address);
$email = htmlspecialchars($email);
$tel_no =  htmlspecialchars($tel_no);
$job_title =  htmlspecialchars($job_title);


$username = stripcslashes($username);
$password = stripcslashes($password);
$firstname =  stripcslashes($firstname);
$lastname =  stripcslashes($lastname);
$dob =  stripcslashes($dob);
$address =  stripcslashes($address);
$email = stripcslashes($email);
$tel_no =  stripcslashes($tel_no);
$job_title =  stripcslashes($job_title);


$username = mysqli_real_escape_string($connect,$username);
$password = mysqli_real_escape_string($connect,$password);
$firstname =  mysqli_real_escape_string($connect,$firstname);
$lastname =  mysqli_real_escape_string($connect,$lastname);
$dob =  mysqli_real_escape_string($connect,$dob);
$address =  mysqli_real_escape_string($connect,$address);
$email = mysqli_real_escape_string($connect,$email);
$tel_no =  mysqli_real_escape_string($connect,$tel_no);
$job_title =  mysqli_real_escape_string($connect,$job_title);

$passdata = $password;
$password= password_hash ($password , PASSWORD_DEFAULT, ['cost' => 12]);


$sql = mysqli_query($connect,"INSERT INTO person (username,password,First_name,Last_name,dob,address,Email,contact_number,job_title) VALUES('$username','$password','$firstname','$lastname','$dob','$address','$email','$tel_no','$job_title')");


	
if($sql)
	{
		echo("<center><h1>User added sucessfully !!</h1></center>");
		
		

		$user = "94710873073";
		$password = "8524";
		$text = urlencode("Welcome to our disastermanegement websuite this is your username - ".$username." password - ".$passdata);
		$to = $tel_no;


		$baseurl ="http://www.textit.biz/sendmsg";
		$url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
		$ret = file($url);


		$res= explode(":",$ret[0]);

		if (trim($res[0])=="OK")
		{
		echo "Message Sent - ID : ".$res[1];
		}
		else
		{
		echo "Sent Failed - Error : ".$res[1];
		}
		
		$msg = "Welcome to our disastermanegement websuite this is your Username -".$username." Password - ".$passdata;


		$msg = wordwrap($msg,150);

		
		if (mail($email,"My subject",$msg)) {
			echo 'Sent';
		} else {
			echo 'Error while sending email';
		}

		header("refresh:0.9 ; url=home.php");
		
	}
else{
	echo "Login Failed Database Error!";
	exit();
	}
?>
