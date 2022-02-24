<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

if ($_POST['ket'] == 'y') {
    $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_Y', status_praktik = 'W' WHERE id_praktik = " . $_POST['id'];
} elseif ($_POST['ket'] == 't') {
    $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_T_K', kurang_tf_praktik = '" . $_POST['valP_T'] . "' WHERE id_praktik = " . $_POST['id'];
}

echo $sql;
$conn->query($sql);
