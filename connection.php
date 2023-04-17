<?php
    $servername = "lochnagar.abertay.ac.uk";
	$dbusername = "sql2002985";
	$dbpassword = "KpRGXUTFUbMU";
	$dbname = "sql2002985";

	// Create Connection
	$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
	// Check Connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>