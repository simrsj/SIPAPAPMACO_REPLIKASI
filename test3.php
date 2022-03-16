<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "SELECT * FROM test";
$sql .= " WHERE id= " . $_POST['id'];
// echo "$sql <br>";

$q = $conn->query($sql);
$d = $q->fetch(PDO::FETCH_ASSOC);
$h['id'] = $d["id"];
$h['varchart'] = $d["varchart"];

echo json_encode($h);

// echo "<pre>";
// print_r($h);
// echo "</pre>";
