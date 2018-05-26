<?php

$nnumber = $_POST["phn"];
$message = $_POST["message"];



$user = "94710873073";
$password = "8524";
$text = urlencode(" Dialog Mega Wasana! The draw number(s) for your Rs.90 reload: 54, 53. Watch the draw this coming Saturday on ITN at 7.55pm.Dial #121# for info ");
$to = $nnumber;


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




?>