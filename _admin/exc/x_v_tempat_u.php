<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
$id = $_POST['id'];

$sql = "UPDATE tb_tempat SET
    nama_tempat = '" . $_POST['nama' . $id] . "',
    kapasitas_tempat = '" . $_POST['kapasitas' . $id] . "', 
    id_jurusan_pdd_jenis = '" . $_POST['jenis_jurusan' . $id] . "',
    harga_tempat = '" . $_POST['harga' . $id] . "',
    id_harga_satuan = '" . $_POST['satuan' . $id] . "',
    tgl_input_tempat = '" . date('Y-m-d') . "',
    ket_tempat = '" . $_POST['keterangan' . $id] . "'
    WHERE id_tempat = " . $id;

echo $sql . "<br>";
$conn->query($sql);
