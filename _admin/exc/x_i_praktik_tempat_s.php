<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql_t = "INSERT INTO tb_tempat_pilih (
    id_tempat, 
    id_praktik,
    tgl_input_tempat_pilih
    ) VALUES (
        '" . $_POST['tempat'] . "', 
        '" . $_POST['id'] . "', 
        '" . date('Y-m-d') . "'
    )";
$sql_u = "UPDATE tb_praktik SET
status_cek_praktik = 'TMP'
WHERE id_praktik = '" . $_POST['id'] . "'
";
echo $sql_t . "<br>";
echo $sql_u . "<br>";
$conn->query($sql_t);
$conn->query($sql_u);
