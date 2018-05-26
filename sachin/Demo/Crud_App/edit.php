<?php

include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$Title = mysqli_real_escape_string($mysqli, $_POST['Title']);
	$Author = mysqli_real_escape_string($mysqli, $_POST['Author']);
	$PublishAt = mysqli_real_escape_string($mysqli, $_POST['PublishAt']);	
	
	
	if(empty($Title) || empty($Author) || empty($PublishAt)) {	
			
		if(empty($Title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($Author)) {
			echo "<font color='red'>Author field is empty.</font><br/>";
		}
		
		if(empty($PublishAt)) {
			echo "<font color='red'>PublishAt field is empty.</font><br/>";
		}		
	} else {	
		
		$result = mysqli_query($mysqli, "UPDATE users1 SET Title='$Title',Author='$Author',PublishAt='$PublishAt' WHERE id=$id");
		
		
		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$result = mysqli_query($mysqli, "SELECT * FROM users1 WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$Title = $res['Title'];
	$Author = $res['Author'];
	$PublishAt = $res['PublishAt'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>

<body>
	
	<button class="button button1"><a href="index.php">Home</a><br/><br/></button>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="Title" value="<?php echo $Title;?>"></td>
			</tr>
			<tr> 
				<td>Author</td>
				<td><input type="text" name="Author" value="<?php echo $Author;?>"></td>
			</tr>
			<tr> 
				<td>PublishAt</td>
				<td><input type="text" name="PublishAt" value="<?php echo $PublishAt;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
