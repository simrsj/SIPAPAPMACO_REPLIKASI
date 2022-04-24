<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_mou SET";
$sql .= " arsip_mou = 'Y'";
$sql .= " WHERE id_mou = " . $_GET['id'];

echo $sql . "<br>";
$conn->query($sql);

echo json_encode(['success' => 'Sukses']);
