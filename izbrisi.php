<?php
	$ID=$_POST['ID'];
	
	$dbc = mysqli_connect('localhost', 'root', '', 'pwa') 
	or die('Error connecting to MySQL server.');
	
	$query = "DELETE FROM vijesti WHERE ID=".$ID;
	$result = mysqli_query($dbc, $query) or die('Error querying database.');
	mysqli_close($dbc);
	
	header("Location: administrator.php");
	mysqli_close($con);
?>