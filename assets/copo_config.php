<?php

	date_default_timezone_set("Asia/Calcutta");

    $servername = "localhost";
	$username = "root";
	$password = "";
	$database = "copo";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $database);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>
