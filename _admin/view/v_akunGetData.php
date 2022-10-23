<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

$sql = "SELECT * FROM tb_user WHERE id_user= " . $_POST['id'];
// echo "$sql <br>";

$q = $conn->query($sql);
$d = $q->fetch(PDO::FETCH_ASSOC);
$h['id_user'] = $d["id_user"];
$h['nama_user'] = $d["nama_user"];
$h['jumlah_kuota'] = $d["jumlah_kuota"];
$h['ket_kuota'] = $d["ket_kuota"];

echo json_encode($h);

// echo "<pre>";
// print_r($h);
// echo "</pre>";
