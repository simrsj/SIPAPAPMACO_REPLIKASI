<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "UPDATE tb_praktik SET status_cek_praktik = 'SLS' WHERE id_praktik = " . $_GET['id'];

$conn->query($sql);
