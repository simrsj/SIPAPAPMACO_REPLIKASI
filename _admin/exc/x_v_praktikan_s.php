<?php

use PhpOffice\PhpSpreadsheet\Reader\Xls\MD5;

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$sql = "INSERT INTO tb_praktikan (";
$sql .= " id_praktik,";
$sql .= " tgl_tambah_praktikan,";
$sql .= " no_id_praktikan,";
$sql .= " nama_praktikan, ";
$sql .= " tgl_lahir_praktikan, ";
$sql .= " telp_praktikan,";
$sql .= " wa_praktikan,";
$sql .= " email_praktikan,";
$sql .= " alamat_praktikan";
$sql .= " ) VALUES (";
$sql .= " '" . base64_decode(urldecode($_POST['idp'])) . "', ";
$sql .= " '" . date("Y-m-d") . "', ";
$sql .= " '" . $_POST['t_no_id'] . "', ";
$sql .= " '" . $_POST['t_nama'] . "',";
$sql .= " '" . $_POST['t_tgl'] . "', ";
$sql .= " '" . $_POST['t_telpon'] . "',";
$sql .= " '" . $_POST['t_wa'] . "',";
$sql .= " '" . $_POST['t_email'] . "',";
$sql .= " '" . $_POST['t_alamat'] . "'";
$sql .= " )";
// echo $sql . "<br>";
try {
    $conn->query($sql);
} catch (Exception $ex) {
    echo "<script>alert('$ex -SIMPAN PRAKTIKAN-');";
    echo "document.location.href='?error404';</script>";
}

echo json_encode(['success' => 'Data Berhasil Disimpan']);
