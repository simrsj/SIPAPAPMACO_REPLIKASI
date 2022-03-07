<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

echo "<pre>";
var_dump($_POST);
echo "</pre>";
$sql = "INSERT INTO tb_praktikan ";
$sql .= " (id_praktik)) ";
$sql .= " no_id_praktikan='" . $_POST['no_id_praktikan'] . "', ";
$sql .= " telp_praktikan='" . $_POST['telp_praktikan'] . "', ";
$sql .= " wa_praktikan='" . $_POST['wa_praktikan'] . "', ";
$sql .= " email_praktikan='" . $_POST['email_praktikan'] . "', ";
$sql .= " kota_kab_praktikan='" . $_POST['kota_kab_praktikan'] . "', ";
$sql .= " tgl_ubah_praktikan='" . date('Y-m-d') . "'";
$sql .= " WHERE id_praktikan=" . $_POST['id_praktikan'];

echo "$sql <br>";
$q = $conn->query($sql);

$sql_update_pmbb = "UPDATE tb_pembimbing SET";
$sql_update_pmbb .= " kali_pembimbing='" . $_POST['nama_praktikan'] . "' ";
$sql_update_pmbb .= " WHERE id_pembimbing=" . $_POST['id_pembimbing'];
json_encode(['success' => 'Sukses']);
