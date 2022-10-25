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
$sql .= " d_akun = '" . $_POST['d_akun'] . "'";
$sql .= " WHERE id_user = " . $_POST['id_user'];

echo $sql . "<br>";
$conn->query($sql);
echo json_encode(['success' => 'Data Berhasil Diubah']);
