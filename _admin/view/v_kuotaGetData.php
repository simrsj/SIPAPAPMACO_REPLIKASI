<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "SELECT * FROM tb_kuota";
$sql .= " WHERE id_kuota= " . $_POST['id'];
// echo "$sql <br>";

$q = $conn->query($sql);
$d = $q->fetch(PDO::FETCH_ASSOC);
$h['id_kuota'] = $d["id_kuota"];
$h['nama_kuota'] = $d["nama_kuota"];
$h['no_id_kuota'] = $d["no_id_kuota"];
$h['telp_kuota'] = $d["id_kuota"];
$h['wa_kuota'] = $d["wa_kuota"];
$h['email_kuota'] = $d["email_kuota"];
$h['kota_kab_kuota'] = $d["kota_kab_kuota"];

echo json_encode($h);

// echo "<pre>";
// print_r($h);
// echo "</pre>";
