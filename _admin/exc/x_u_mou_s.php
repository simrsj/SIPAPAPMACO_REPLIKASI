<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// // var_dump($_POST);
// print_r($_POST);
// echo "</pre>";

$sql_u_mou = "UPDATE tb_mou SET";
$sql_u_mou .= " tgl_ubah_mou = '" . date('Y-m-d') . "',";
$sql_u_mou .= " tgl_mulai_mou = '" . $_POST['tgl_mulai_mou'] . "',";
$sql_u_mou .= " tgl_selesai_mou = '" . $_POST['tgl_selesai_mou'] . "',";
$sql_u_mou .= " no_rsj_mou = '" . $_POST['no_rsj_mou'] . "',";
$sql_u_mou .= " no_institusi_mou = '" . $_POST['no_institusi_mou'] . "',";
$sql_u_mou .= " id_jurusan_pdd = '" . $_POST['id_jurusan_pdd'] . "',";
$sql_u_mou .= " id_profesi_pdd = '" . $_POST['id_profesi_pdd'] . "',";
$sql_u_mou .= " id_jenjang_pdd = '" . $_POST['id_jenjang_pdd'] . "'";
$sql_u_mou .= " WHERE id_mou = " . $_POST['id_mou'];

// echo "$sql_u_mou <br>";
$conn->query($sql_u_mou);

echo json_encode(['success' => 'Sukses']);
