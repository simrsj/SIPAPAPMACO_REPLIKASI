<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_institusi SET";
$sql .= " tgl_input_institusi = '" . date('Y-m-d') . "',";
$sql .= " nama_institusi = '" . $_POST['u_nama_institusi'] . "',";
$sql .= " akronim_institusi = '" . $_POST['u_akronim_institusi'] . "', ";
$sql .= " alamat_institusi = '" . $_POST['u_alamat_institusi'] . "',";
$sql .= " akred_institusi = '" . $_POST['u_akred_institusi'] . "',";
$sql .= " tglAkhirAkred_institusi = '" . $_POST['u_tglAkhirAkred_institusi'] . "'";
$sql .= " WHERE id_institusi = " . $_POST['u_id_institusi'];

echo $sql . "<br>";
// $conn->query($sql);
echo json_encode(['success' => 'Data Institusi Berhasil Disimpan']);
