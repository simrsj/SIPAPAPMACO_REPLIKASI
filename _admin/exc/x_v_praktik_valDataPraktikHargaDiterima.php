<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_praktik SET status_cek_praktik = 'VPH_Y' WHERE id_praktik = " . $_GET['id'];

$conn->query($sql);
echo $sql;
echo json_encode(['success' => 'Data Harga Berhasil Disimpan']);
// echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
