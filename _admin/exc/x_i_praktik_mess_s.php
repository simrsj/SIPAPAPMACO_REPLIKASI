<?php
$sql_mess = "SELECT * FROM tb_mess WHERE id_mess = " . $_POST['id_mess'];
$d_mess = $conn->query($sql_mess)->fetch(PDO::FETCH_ASSOC);
$sql_praktik = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_POST['id_praktik'];
$d_praktik = $conn->query($sql_praktik)->fetch(PDO::FETCH_ASSOC);

// echo $sql_mess . "<br>";
// echo $sql_praktik . "<br>";

$jumlah_hari_praktik = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);

// echo $jumlah_hari_praktik . "<br>";

if ($_POST['makan_mess_pilih'] == "Ya") {
    $total_harga_mess_pilih = $jumlah_hari_praktik * $d_mess['harga_dengan_makan_mess'] * $d_praktik['jumlah_praktik'];
} elseif ($_POST['makan_mess_pilih'] == "Tidak") {
    $total_harga_mess_pilih = $jumlah_hari_praktik * $d_mess['harga_tanpa_makan_mess'] * $d_praktik['jumlah_praktik'];
} else {
    $total_harga_mess_pilih = 0;
}

// echo $total_harga_mess_pilih . "<br>";

$sql_insert_pilih_mess = "INSERT INTO tb_mess_pilih (
id_praktik,
id_mess,
tgl_input_mess_pilih,
makan_mess_pilih,
jumlah_praktik_mess_pilih,
jumlah_hari_mess_pilih,
total_harga_mess_pilih
) VALUES (
'" . $_POST['id_praktik'] . "',
'" . $_POST['id_mess'] . "',
'" . date('Y-m-d') . "',
'" . $_POST['makan_mess_pilih'] . "',
'" . $d_praktik['jumlah_praktik'] . "',
'" . $jumlah_hari_praktik . "',
'" . $total_harga_mess_pilih . "'
)";



$total_terisi_mess = $d_mess['kapasitas_terisi_mess'] + $d_praktik['jumlah_praktik'];

$sql_update_mess = "UPDATE tb_mess SET kapasitas_terisi_mess = $total_terisi_mess WHERE id_mess = " . $_POST['id_mess'];

//SQL ubah status praktik
$sql_ubah_status_praktik = "UPDATE tb_praktik
SET status_cek_praktik = 'MESS'
WHERE id_praktik = " . $_POST['id_praktik'];

//Eksekusi Query
echo $sql_insert_pilih_mess . "<br>";
echo $sql_update_mess . "<br>";
echo $sql_ubah_status_praktik . "<br>";
// $conn->query($sql_insert_pilih_mess);
// $conn->query($sql_update_mess);
// $conn->query($sql_ubah_status_praktik);
