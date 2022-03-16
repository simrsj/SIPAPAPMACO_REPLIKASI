<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

//Mencari id_jurusan_pdd_jenis
$id_jurusan_pdd = $_GET['jur'];
$sql_jurusan_pdd_jenis = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd = " . $id_jurusan_pdd;
$q_jurusan_pdd_jenis = $conn->query($sql_jurusan_pdd_jenis);
$d_jurusan_pdd_jenis = $q_jurusan_pdd_jenis->fetch(PDO::FETCH_ASSOC);

$jenis_jurusan = $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'];
echo json_encode(["jenis_jurusan" => "$jenis_jurusan"]);
