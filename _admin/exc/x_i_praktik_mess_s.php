<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

echo "<pre>";
print_r($_POST);
echo "</pre>";

//cari data mess
$sql_mess = "SELECT * FROM tb_mess";
$sql_mess .= " JOIN tb_tarif_satuan ON tb_mess.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan ";
$sql_mess .= " JOIN tb_tarif_jenis ON tb_mess.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis ";
$sql_mess .= " WHERE id_mess = " . $_POST['id_mess'];
$d_mess = $conn->query($sql_mess)->fetch(PDO::FETCH_ASSOC);

//cari data praktik
$sql_praktik = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_POST['id'];
$d_praktik = $conn->query($sql_praktik)->fetch(PDO::FETCH_ASSOC);

// echo $sql_mess . "<br>";
// echo $sql_praktik . "<br>";

$jumlah_hari_praktik = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);

// echo $jumlah_hari_praktik . "<br>";

if ($_POST['makan_mess_pilih'] == "y") {
    $total_tarif_mess_pilih = $jumlah_hari_praktik * $d_mess['tarif_dengan_makan_mess'] * $d_praktik['jumlah_praktik'];
    $ket_makan = "Dengan Makan 3x Sehari";
    $tarif_mess = $d_mess['tarif_dengan_makan_mess'];
} elseif ($_POST['makan_mess_pilih'] == "t") {
    $total_tarif_mess_pilih = $jumlah_hari_praktik * $d_mess['tarif_tanpa_makan_mess'] * $d_praktik['jumlah_praktik'];
    $ket_makan = "Tanpa Makan";
    $tarif_mess = $d_mess['tarif_tanpa_makan_mess'];
} else {
    $total_tarif_mess_pilih = 0;
}

// echo $total_tarif_mess_pilih . "<br>";

//tambah ke tb_tarif_pilih
$sql_insert_tarif_mess = "INSERT INTO tb_tarif_pilih (
    id_praktik, 
    tgl_input_tarif_pilih,
    nama_jenis_tarif_pilih,
    nama_tarif_pilih,
    nominal_tarif_pilih,
    nama_satuan_tarif_pilih,
    frekuensi_tarif_pilih,
    kuantitas_tarif_pilih,
    jumlah_tarif_pilih
) VALUES (
        '" . $_POST['id'] . "', 
            '" . date('Y-m-d') . "',
            '" . $d_mess['nama_tarif_jenis'] . "', 
            '" . $d_mess['nama_mess'] . " ($ket_makan)', 
            '" . $tarif_mess . "',  
            '" . $d_mess['nama_tarif_satuan'] . "',
        '" . $jumlah_hari_praktik . "', 
        '" . $d_praktik['jumlah_praktik'] . "', 
        '" . $total_tarif_mess_pilih . "'
)";

//tambah ke tb_mess_pilih
$sql_insert_pilih_mess = "INSERT INTO tb_mess_pilih (
    id_praktik, 
    id_mess,
    tgl_input_mess_pilih,
    makan_mess_pilih,
    jumlah_hari_mess_pilih,
    total_tarif_mess_pilih
) VALUES (
        '" . $_POST['id'] . "', 
        '" . $_POST['id_mess'] . "', 
        '" . date('Y-m-d') . "', 
        '" . $_POST['makan_mess_pilih'] . "',
        '" . $jumlah_hari_praktik . "',
        '" . $total_tarif_mess_pilih . "'
)";

//SQL ubah status praktik
$sql_ubah_status_praktik = "UPDATE tb_praktik
SET status_cek_praktik = 'MESS'
WHERE id_praktik = " . $_POST['id'];

//Eksekusi Query
// echo $sql_insert_tarif_mess . "<br>";
// echo $sql_insert_pilih_mess . "<br>";
// echo $sql_ubah_status_praktik . "<br>";
$conn->query($sql_insert_tarif_mess);
$conn->query($sql_insert_pilih_mess);
$conn->query($sql_ubah_status_praktik);
