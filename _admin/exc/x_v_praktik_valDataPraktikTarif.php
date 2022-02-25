<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// cari jenis jurusan 
$sql = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_POST['id'];
$q = $conn->query($sql);
$d = $q->fetch(PDO::FETCH_ASSOC);
if ($d['id_jurusan_pdd_jenis'] == 1) {
    if ($_POST['ket'] == 'y') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'TMP_KED' WHERE id_praktik = " . $_POST['id'];
    } elseif ($_POST['ket'] == 't') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'VPT_T', ket_tolakPraktikTarif_praktik = '" . $_POST['valDPT_T'] . "' WHERE id_praktik = " . $_POST['id'];
    }
} else {
    if ($_POST['ket'] == 'y') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'VPT_Y' WHERE id_praktik = " . $_POST['id'];
    } elseif ($_POST['ket'] == 't') {
        $sql = "UPDATE tb_praktik SET status_cek_praktik = 'VPT_T', ket_tolakPraktikTarif_praktik = '" . $_POST['valDPT_T'] . "' WHERE id_praktik = " . $_POST['id'];
    }
}

echo $sql;
$conn->query($sql);
