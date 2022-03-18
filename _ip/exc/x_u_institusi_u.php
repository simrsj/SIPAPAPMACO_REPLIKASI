<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

//mencari jenis jurusan
$sql = "UPDATE tb_institusi SET";
$sql .= " tempAkronim_institusi = '" . $_POST['akronim_institusi'] . "',";
$sql .= " tempAlamat_institusi = '" . $_POST['alamat_institusi'] . "',";
$sql .= " tempAkred_institusi = '" . $_POST['akred_institusi'] . "',";
$sql .= " tempTglAkhirAkred_institusi = '" . $_POST['tglAkhirAkred_institusi'] . "',";
$sql .= " tempStatus_institusi = 'pengajuan'";
$sql .= " WHERE id_institusi =" . $_POST['id_institusi'];

// echo "$sql<br>";
$conn->query($sql);
