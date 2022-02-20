<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
if ($_POST['v'] == 'y') {
    $sql = "UPDATE tb_praktik SET status_cek_praktik = 'VPH_Y' WHERE id_praktik = " . $_GET['id'];
} elseif ($_POST['v'] == 't') {
    $sql = "UPDATE tb_praktik SET status_cek_praktik = 'VPH_T', ket_tolakPraktikHarga_praktik = '" . $_POST['valDPHDitolak'] . "' WHERE id_praktik = " . $_POST['id'];
}

echo $sql;
$conn->query($sql);
