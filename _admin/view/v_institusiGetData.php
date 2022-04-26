<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "SELECT * FROM tb_institusi";
$sql .= " WHERE id_institusi= " . $_POST['id'];
// echo "$sql <br>";

$q = $conn->query($sql);
$d = $q->fetch(PDO::FETCH_ASSOC);
$h['u_id_institusi'] = $d["id_institusi"];
$h['u_id_tarif_jenis'] = $d["id_tarif_jenis"];
$h['u_nama_institusi'] = $d["nama_institusi"];
$h['u_kapasitas_institusi'] = $d["kapasitas_institusi"];
$h['u_id_jurusan_pdd_jenis'] = $d["id_jurusan_pdd_jenis"];
$h['u_tarif_institusi'] = $d["tarif_institusi"];
$h['u_id_tarif_satuan'] = $d["id_tarif_satuan"];
$h['u_ket_institusi'] = $d["ket_institusi"];
$h['u_status_institusi'] = $d["status_institusi"];

echo json_encode($h);

// echo "<pre>";
// print_r($h);
// echo "</pre>";
