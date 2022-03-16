<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$sql = "DELETE FROM tb_praktikan";
$sql .= " WHERE id_praktikan=" . $_POST['id_praktikan'];

echo "$sql<br>";
$conn->query($sql);

echo json_encode(['success' => 'Sukses']);
