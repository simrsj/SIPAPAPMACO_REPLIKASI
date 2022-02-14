<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "INSERT INTO tb_tempat (
    nama_tempat, 
    kapasitas_tempat,
    id_jurusan_pdd_jenis,
    harga_tempat,
    id_harga_satuan,
    tgl_input_tempat,
    ket_tempat,
    status_tempat
    ) VALUES (
        '" . $_POST['nama'] . "', 
        '" . $_POST['kapasitas'] . "', 
        '" . $_POST['jenis_jurusan'] . "',
        '" . $_POST['harga'] . "',
        '" . $_POST['satuan'] . "',
        '" . date('Y-m-d') . "',
        '" . $_POST['keterangan'] . "',
        'y'
    )";

echo $sql . "<br>";
$conn->query($sql);
