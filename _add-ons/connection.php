<?php
$servername = "192.168.7.88/bleketek/";
$username = "simrs";
$password = "simrs12345";

try {
	$conn = new PDO("mysql:host=$servername;dbname=db_sm", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
