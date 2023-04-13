<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

$exp_arr_idu = explode("*sm*", base64_decode(urldecode(hex2bin($_POST['data_alasan']))));
$idu = $exp_arr_idu[1];

//data privileges 
$sql_prvl = "SELECT * FROM tb_user_privileges WHERE id_user = " . base64_decode(urldecode($_POST['user']));
try {
    $q_prvl = $conn->query($sql_prvl);
} catch (Exception $ex) {
    echo "<script>alert('DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}
$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);

// --------------------------------------SIMPAN DATA PRAKTIK--------------------------------------------

//mencari jenis jurusan
$sql_jenis_jurusan = "SELECT * FROM tb_jurusan_pdd ";
$sql_jenis_jurusan .= "WHERE id_jurusan_pdd = " . $_POST['jurusan'];

try {
    $q_jenis_jurusan = $conn->query($sql_jenis_jurusan);
    $d_jenis_jurusan = $q_jenis_jurusan->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA JENIS JURUSAN-');";
    echo "document.location.href='?error404';</script>";
}

// variable alasan_mess
if ($_POST['pilih_mess'] == "T") $alasan_mess = $_POST['uraian_alasan'];
else $alasan_mess = NULL;

$sql_insert = "INSERT INTO tb_praktik ( ";
$sql_insert .= " id_user,";
$sql_insert .= " id_praktik, ";
$sql_insert .= " status_praktik";
$sql_insert .= " ) VALUES (";
$sql_insert .= " '" . base64_decode(urldecode($_POST['user'])) . "',";
$sql_insert .= " '" . $id_praktik . "', ";
$sql_insert .= " '" . $_POST['institusi'] . "', ";
$sql_insert .= " '" . $_POST['kelompok'] . "',";
$sql_insert .= " '" . date('Y-m-d', time()) . "', ";
$sql_insert .= " '" . $_POST['tgl_mulai_praktik'] . "', ";
$sql_insert .= " '" . $_POST['pilih_mess'] . "', ";
$sql_insert .= " '" . $alasan_mess . "', ";
$sql_insert .= " 'Y'";
$sql_insert .= " )";
// echo $sql_insert . "<br>";
$conn->query($sql_insert);

echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
