<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

echo "<pre>";
var_dump($_POST);
echo "</pre>";

$sql = "DELETE FROM test";
$sql .= " WHERE id=" . $_POST['id'];

echo "$sql<br>";
$conn->query($sql);

echo json_encode(['success' => 'Sukses']);
