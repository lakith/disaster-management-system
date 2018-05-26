<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php



include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Title = mysqli_real_escape_string($mysqli, $_POST['Title']);
	$Author = mysqli_real_escape_string($mysqli, $_POST['Author']);
	$PublishAt = mysqli_real_escape_string($mysqli, $_POST['PublishAt']);
	$Description = mysqli_real_escape_string($mysqli, $_POST['Description']);	
	
	if(empty($Title) || empty($Author) || empty($PublishAt) || empty($Description)) {
				
		if(empty($Title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($Author)) {
			echo "<font color='red'>Author field is empty.</font><br/>";
		}
		
		if(empty($PublishAt)) {
			echo "<font color='red'>Publish field is empty.</font><br/>";
		}

		if(empty($Description)) {
			echo "<font color='red'>Publish field is empty.</font><br/>";
		}
		
		
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		
			
		
		$result = mysqli_query($mysqli, "INSERT INTO users1(Title,Author,PublishAt,Description) VALUES('$Title','$Author','$PublishAt','$Description')");
		
		
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
	