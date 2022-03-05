<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

echo "<pre>";
var_dump($_POST);
echo "</pre>";
$sql = "UPDATE test SET";
$sql .= " varchart='" . $_POST['u_nama_test'] . "', ";
$sql .= " date='" . date('Y-m-d') . "'";
$sql .= " WHERE id=" . $_POST['u_id_test'];

echo "$sql <br>";
$q = $conn->query($sql);

json_encode(['success' => 'Sukses']);
