<?php


$id = $_GET['id'];
$pesron_id = $_GET['inform'];

echo($pesron_id);

$host='localhost';

$connect=mysqli_connect($host,'root','','disaster_management');

$shortDis=htmlentities($_POST['shortdis']);


if(empty($shortDis) && empty($id))
{
	die('<h1>post cannot be added</h1>');
}

$shortDis= strip_tags($shortDis);

$shortDis = mysqli_real_escape_string($connect,$shortDis);

$sql1 = mysqli_query($connect,"UPDATE disaster_info SET conformation = 1 WHERE id ='$id'");

$sql2 = mysqli_query($connect,"UPDATE disaster_info  SET short_discription ='$shortDis' WHERE id ='$id'");

$sql3 = "SELECT Email,contact_number FROM person WHERE person_id='$pesron_id'"; 

$user_query = mysqli_query($connect, $sql3);

$numrows2 = mysqli_num_rows($user_query);
if($numrows2 < 1){
	echo "That user does not exist or is not yet activated, press back";
    exit();	
}

while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$email = $row["Email"];
	$tel_no = $row["contact_number"];
}

	
if($sql1 && $sql2)
	{
		echo("<center><h1>User added sucessfully !!</h1></center>");

 
	
$user = "94710873073";
		$password = "8524";
		$text = urlencode("Your Report is now on air");
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
		
		$msg = "Your Report is now on air";


		$msg = wordwrap($msg,150);

		
		if (mail($email,"My subject",$msg)) {
			echo 'Sent';
		} else {
			echo 'Error while sending email';
		}

		header("refresh:0.9 ; url=Home.php");
	
	}
else{
	echo "Login Failed Database Error!";
	exit();
	}


?>