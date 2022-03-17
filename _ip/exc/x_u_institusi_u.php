<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

echo "<pre>";
print_r($_POST);
echo "</pre>";

//mencari jenis jurusan
$sql = "UPDATE tb_institusi SET";
// $sql .= " tempAkronim_institusi = '".."' tb_institusi SET";
$sql .= " UPDATE tb_institusi SET";
$sql .= " UPDATE tb_institusi SET";

echo "$sql<br>";
$conn->query($sql);
