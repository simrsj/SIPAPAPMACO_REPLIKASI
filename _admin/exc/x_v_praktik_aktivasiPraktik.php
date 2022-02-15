<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_praktik SET status_cek_praktik = 'AKV', status_praktik = 'y' WHERE id_praktik = " . $_GET['id'];

$conn->query($sql);
