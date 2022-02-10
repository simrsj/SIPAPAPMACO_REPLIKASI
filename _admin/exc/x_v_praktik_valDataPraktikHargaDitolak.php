<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_praktik SET status_cek_praktik = 'VPH_T', ket_tolakPraktikHarga_praktik = '" . $_POST['ket_tolak'] . "' WHERE id_praktik = " . $_GET['id'];

$conn->query($sql);
