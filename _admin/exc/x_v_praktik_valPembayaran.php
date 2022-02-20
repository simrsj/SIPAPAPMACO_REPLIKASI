<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

if ($_GET['ket'] == 'y') {
    $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_Y', status_praktik = 'W' WHERE id_praktik = " . $_GET['id'];
} elseif ($_GET['ket'] == 't') {
    $sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_T', ket_tolakPembayaran_praktik = '" . $_POST['valPDitolak'] . "' WHERE id_praktik = " . $_POST['id'];
}

echo $sql;
$conn->query($sql);
