<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql_praktik = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_POST['id'];
$q_praktik = $conn->query($sql_praktik);
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
    if ($_POST['ket'] == 'y') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_Y_KED', status_praktik = 'A' WHERE id_praktik = " . $_POST['id'];
    } elseif ($_POST['ket'] == 't') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_T_K', kurang_tf_praktik = '" . $_POST['valP_T'] . "' WHERE id_praktik = " . $_POST['id'];
    }
} else {
    if ($_POST['ket'] == 'y') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_Y', status_praktik = 'W' WHERE id_praktik = " . $_POST['id'];
    } elseif ($_POST['ket'] == 't') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_T_K', kurang_tf_praktik = '" . $_POST['valP_T'] . "' WHERE id_praktik = " . $_POST['id'];
    }
}
echo $sql;
$conn->query($sql);
