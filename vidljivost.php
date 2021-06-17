<?php
	$ID=$_POST['ID'];
	$value=isset($_POST['prikazi']);
	
	$dbc = mysqli_connect('localhost', 'root', '', 'pwa') 
	or die('Error connecting to MySQL server.');
	
		$query = "UPDATE vijesti 
				  SET prikazi='$value'
				  WHERE ID=".$ID;
	
	$result = mysqli_query($dbc, $query) or die('Error querying database.');
	mysqli_close($dbc);
	
	header("Location: administrator.php");
?>