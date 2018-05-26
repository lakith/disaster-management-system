<?php

$username = $_GET['uname'];

$username = htmlentities($username);
$distitle=htmlentities($_POST['distitle']);
$Name = htmlentities($_POST['Name']); 
$Date = htmlentities($_POST['Date']);
$Location = htmlentities($_POST['Location']);
$Latitude = htmlentities($_POST['Latitude']);
$Longitude = htmlentities($_POST['Longitude']);
$Damage_ammount = htmlentities($_POST['Damage_ammount']);
$no_of_deaths = htmlentities($_POST['no_of_deaths']);
$Details = htmlentities($_POST['Details']);
$special_note = htmlentities($_POST['special_note']);
$warning_note = htmlentities($_POST['warning_note']);
$distype = htmlentities($_POST['distype']);
$discata1 = htmlentities($_POST['discata1']);
$discata2 = htmlentities($_POST['discata2']);
$injuries = htmlentities($_POST['no_of_injuries']);

if($distype == 10)
{
	$ultimatedis = $discata1;
	$uthinksmart = "Natural";
}

else if($distype == 20)
{
	$ultimatedis = $discata2;
	$uthinksmart = "Man_made";
}

else
{
	die("values does not match");
}

$check = getimagesize($_FILES["image1"]["tmp_name"]);
    
        $image = $_FILES['image1']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

  if(empty($check) && empty($check1) && empty($check2) && empty($check3))
  {
	  die('<h1>Add images</h1>');
  }
  


if(empty($username) || empty($distitle) || empty($Name) || empty($Date) || empty($Location) || empty($Latitude) || empty($Longitude) || empty($Damage_ammount) || empty($Details) || empty($special_note) || empty($warning_note) || empty($distype)|| empty($ultimatedis))
{
	die('<h1>Enter All details</h1>');
}

$host='localhost';

$connect=mysqli_connect($host,'root','','disaster_management');


$username = strip_tags($username);
$distitle=strip_tags($distitle);
$Name = strip_tags($Name); 
$Date = strip_tags($Date);
$Location = strip_tags($Location);
$Latitude = strip_tags($Latitude);
$Longitude = strip_tags($Longitude);
$Damage_ammount = strip_tags($Damage_ammount);
$no_of_deaths = strip_tags($no_of_deaths);
$Details = strip_tags($Details);
$special_note = strip_tags($special_note);
$warning_note = strip_tags($warning_note);
$distype = strip_tags($distype);
$ultimatedis = strip_tags($ultimatedis);
$injuries =  strip_tags($injuries);

$username= htmlspecialchars($username);
$distitle=htmlspecialchars($distitle);
$Name = htmlspecialchars($Name); 
$Date = htmlspecialchars($Date);
$Location = htmlspecialchars($Location);
$Latitude = htmlspecialchars($Latitude);
$Longitude = htmlspecialchars($Longitude);
$Damage_ammount = htmlspecialchars($Damage_ammount);
$no_of_deaths = htmlspecialchars($no_of_deaths);
$Details = htmlspecialchars($Details);
$special_note = htmlspecialchars($special_note);
$warning_note = htmlspecialchars($warning_note);
$distype = htmlspecialchars($distype);
$ultimatedis = htmlspecialchars($ultimatedis);
$injuries =  htmlspecialchars($injuries);

$username = stripcslashes($username);
$distitle=stripcslashes($distitle);
$Name = stripcslashes($Name); 
$Date = stripcslashes($Date);
$Location = stripcslashes($Location);
$Latitude = stripcslashes($Latitude);
$Longitude = stripcslashes($Longitude);
$Damage_ammount = stripcslashes($Damage_ammount);
$no_of_deaths = stripcslashes($no_of_deaths);
$Details = stripcslashes($Details);
$special_note = stripcslashes($special_note);
$warning_note = stripcslashes($warning_note);
$distype = stripcslashes($distype);
$ultimatedis = stripcslashes($ultimatedis);
$injuries =  stripcslashes($injuries);

$username = mysqli_real_escape_string($connect,$username);
$distitle=mysqli_real_escape_string($connect,$distitle);
$Name = mysqli_real_escape_string($connect,$Name); 
$Date = mysqli_real_escape_string($connect,$Date);
$Location = mysqli_real_escape_string($connect,$Location);
$Latitude = mysqli_real_escape_string($connect,$Latitude);
$Longitude = mysqli_real_escape_string($connect,$Longitude);
$Damage_ammount = mysqli_real_escape_string($connect,$Damage_ammount);
$no_of_deaths = mysqli_real_escape_string($connect,$no_of_deaths);
$Details = mysqli_real_escape_string($connect,$Details);
$special_note = mysqli_real_escape_string($connect,$special_note);
$warning_note = mysqli_real_escape_string($connect,$warning_note);
$distype = mysqli_real_escape_string($connect, $distype);
$ultimatedis =mysqli_real_escape_string($connect, $ultimatedis);
$injuries =  mysqli_real_escape_string($connect,$injuries);



$sql = mysqli_query($connect,"INSERT INTO disaster_info (person_informed,heading,date,place_name,lat,lng, Damage_ammount,no_of_deaths,discription,special_note,warning_note,disaster_category,disaster_id,no_of_injuries,disaster_type) VALUES('$username','$distitle','$Date','$Location','$Latitude','$Longitude','$Damage_ammount','$no_of_deaths','$Details','$special_note','$warning_note','$distype','$ultimatedis','$injuries','$uthinksmart')");



	
if($sql)
	{
		echo("<center><h1>User added sucessfully !!</h1></center>");
	}
else{
	echo "Login Failed Database Error!";
	//exit();

}


$sql3 = "Select id from disaster_info where heading ='$distitle'";

$user_query = mysqli_query($connect, $sql3);

$numrows = mysqli_num_rows($user_query);

echo("im here");

if($numrows < 1){
	echo "Someting went bad";
    //exit();	
}

while ($row = mysqli_fetch_array($user_query, MYSQLI_ASSOC)) {
	$id = $row["id"];
	echo($id);
}


?>

<?php

 $query = "INSERT INTO `disaster_image`( `id`,`image`) VALUES (`1`,`2343243243`)";
    
    $result = mysqli_query($connect,$query);
  


 
?>
