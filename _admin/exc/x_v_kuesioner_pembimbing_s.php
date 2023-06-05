<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$sql = "INSERT INTO tb_kuesioner_pembimbing (";
$sql .= " id_user,";
$sql .= " username_user,";
$sql .= " password_user, ";
$sql .= " nama_user, ";
$sql .= " email_user,";
$sql .= " no_telp_user,";
$sql .= " level_user,";
$sql .= " tgl_buat_user";
$sql .= " ) VALUES (";
$sql .= " '" . $_POST['id_user'] . "', ";
$sql .= " '" . $_POST['c_username'] . "', ";
$sql .= " '" . MD5($_POST['c_password']) . "',";
$sql .= " '" . $_POST['c_nama'] . "', ";
$sql .= " '" . $_POST['c_email'] . "',";
$sql .= " '" . $_POST['c_telp'] . "',";
$sql .= " '" . $_POST['c_level'] . "',";
$sql .= " '" . date("Y-m-d G:i:s") . "'";
$sql .= ")";


try {
    $conn->query($sql);
    // echo $sql . "<br>";
    echo json_encode(['success' => 'Data Berhasil Disimpan']);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}

$sql_privileges = "INSERT INTO tb_user_privileges (";
$sql_privileges .= " id_user";
$sql_privileges .= " ) VALUES (";
$sql_privileges .= " '" . $_POST['id_user'] . "' ";
$sql_privileges .= ")";
