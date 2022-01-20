<?php
// include '_add-ons/koneksi.php';
// include '_add-ons/csrf.php';

$id_institusi = $_POST['id_institusi'];
$nama_praktik = $_POST['nama_praktik'];

$sql_insert = "INSERT INTO tb_praktik (id_institusi, nama_praktik) VALUES ('" . $id_institusi . "', '" . $nama_praktik . "')";
// $conn->query($sql_insert);
echo $sql_insert;
echo json_encode(['success' => 'Sukses']);
