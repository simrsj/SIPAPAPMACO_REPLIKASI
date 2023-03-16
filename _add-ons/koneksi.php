<?php

//----------------------------------------------------------------------------------DATABASE SM
$servername = "localhost";
// $servername = "192.168.7.89";
// $servername = "103.147.222.122";
$database = "db_sm";
$username = "root";
$password = "simrs12345";

try {
	$conn = new PDO(
		"mysql:host=$servername; 
		dbname=$database;",
		// port=3308;",
		$username,
		$password
	);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//echo "Connected successfully";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
