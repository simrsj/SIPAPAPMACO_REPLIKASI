<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

echo "<pre>";
var_dump($_POST);
echo "</pre>";

$sql = "INSERT INTO test";
$sql .= " (varchart, date)";
$sql .= " VALUES";
$sql .= " ('" . $_POST['t_nama_test'] . "', '" . date('Y-m-d') . "')";

echo "$sql <br>";
$q = $conn->query($sql);

json_encode(['success' => 'Sukses']);
