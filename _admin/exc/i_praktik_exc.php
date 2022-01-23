<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

// $id_institusi = $_POST['id_institusi'];
// $nama_praktik = $_POST['nama_praktik'];

$id_institusi = stripslashes(strip_tags(htmlspecialchars($_POST['id_institusi'], ENT_QUOTES)));
$nama_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['nama_praktik'], ENT_QUOTES)));

$sql_insert = "INSERT INTO tb_praktik (id_institusi, nama_praktik) VALUES ('" . $id_institusi . "', '" . $nama_praktik . "')";
$conn->query($sql_insert);
echo $sql_insert . "<br>";
echo json_encode(['success' => 'Berhasil Disimpan']);
