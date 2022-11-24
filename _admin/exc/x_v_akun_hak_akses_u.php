<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$sql = "UPDATE tb_user_privileges SET";
$sql .= " c_kuota = '" . $_POST['c_kuota'] . "',";
$sql .= " r_kuota = '" . $_POST['r_kuota'] . "',";
$sql .= " u_kuota = '" . $_POST['u_kuota'] . "', ";
$sql .= " d_kuota = '" . $_POST['d_kuota'] . "', ";
$sql .= " c_akun = '" . $_POST['c_akun'] . "',";
$sql .= " r_akun = '" . $_POST['r_akun'] . "',";
$sql .= " u_akun = '" . $_POST['u_akun'] . "', ";
$sql .= " d_akun = '" . $_POST['d_akun'] . "', ";
$sql .= " c_praktik = '" . $_POST['c_praktik'] . "',";
$sql .= " r_praktik = '" . $_POST['r_praktik'] . "',";
$sql .= " u_praktik = '" . $_POST['u_praktik'] . "', ";
$sql .= " d_praktik = '" . $_POST['d_praktik'] . "', ";
$sql .= " c_praktik_mess = '" . $_POST['c_praktik_mess'] . "',";
$sql .= " r_praktik_mess = '" . $_POST['r_praktik_mess'] . "',";
$sql .= " u_praktik_mess = '" . $_POST['u_praktik_mess'] . "', ";
$sql .= " d_praktik_mess = '" . $_POST['d_praktik_mess'] . "', ";
$sql .= " c_praktik_pembimbing = '" . $_POST['c_praktik_pembimbing'] . "',";
$sql .= " r_praktik_pembimbing = '" . $_POST['r_praktik_pembimbing'] . "',";
$sql .= " u_praktik_pembimbing = '" . $_POST['u_praktik_pembimbing'] . "', ";
$sql .= " d_praktik_pembimbing = '" . $_POST['d_praktik_pembimbing'] . "'";
$sql .= " WHERE id_user = " . $_POST['id_user'];

// echo $sql . "<br>";
$conn->query($sql);
echo json_encode(['success' => 'Data Berhasil Diubah']);
