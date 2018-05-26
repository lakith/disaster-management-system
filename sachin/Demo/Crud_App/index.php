<?php

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM users1 ORDER BY id DESC"); 
?>

<html>
<head>	

<link rel="stylesheet" type="text/css" href="mystyle.css">

	<title>Homepage</title>

</head>

<body>
	
<button class="button button1"><a href="add.html">Add New Data table</a><br/><br/></button>

<h1></h1>
 
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Title</td>
		<td>Author</td>
		<td>PublishedAt</td>
		<td>Action</td>
	</tr>
	<?php 
	

	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['Title']."</td>";
		echo "<td>".$res['Author']."</td>";
		echo "<td>".$res['PublishAt']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>|<a href=\"view.php?id=$res[id]\">Description</a></td>";		
	}
	?>
	</table>
</body>
</html>
