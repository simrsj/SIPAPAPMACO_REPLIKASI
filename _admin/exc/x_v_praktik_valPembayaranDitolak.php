<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_praktik SET status_cek_praktik = 'BYR_T', ket_tolakPembayaran_praktik = '" . $_POST['valPDitolak'] . "' WHERE id_praktik = " . $_POST['id'];

echo $sql;
$conn->query($sql);
