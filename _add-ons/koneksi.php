<?php
$servername = "localhost";
$database = "db_sm";
$username = "root";
// $password = "";
$password = "simrs12345";

try {
	$conn = new PDO(
		"mysql:host=$servername; dbname=$database",
		$username,
		$password
	);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//echo "Connected successfully";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
