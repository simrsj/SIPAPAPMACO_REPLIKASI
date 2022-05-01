<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_mess SET";
$sql .= " tgl_ubah_mess = '" . date('Y-m-d') . "',";

$sql .= " no_id_pembimbing = '" . $_POST['u_nipnipk_pembimbing'] . "',";
$sql .= " nama_pembimbing = '" . $_POST['u_nama_pembimbing'] . "', ";
$sql .= " id_pembimbing_jenis = '" . $_POST['u_jenis_pembimbing'] . "',";
$sql .= " id_jenjang_pdd = '" . $_POST['u_jenjang_pembimbing'] . "',";
$sql .= " kali_pembimbing = '" . $_POST['u_kali_pembimbing'] . "',";

$sql .= " status_pembimbing = '" . $_POST['u_status_pembimbing'] . "'";
$sql .= " status_pembimbing = '" . $_POST['u_status_pembimbing'] . "'";


$sql .= " WHERE id_mess = " . $_POST['u_id_mess'];

// echo $sql . "<br>";
$conn->query($sql);

json_encode(['success' => 'Sukses']);
