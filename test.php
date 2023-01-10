<?php

$id_praktik = 1;

$array[0] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Institusional Fee", "-", 1, 1, 50000, 1 * (int)1 * 50000];
$array[1] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Management Fee", "-", 1, 1, 75000, 1 * (int)1 * 75000];
$array[2]  = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Alat tulis Kantor Fee", "-", 1, 1, 5000, 1 * (int)1 * 5000];
$array[3]  = [$id_praktik, date('Y-m-d'), "BIAYA HABIS PAKAI", "(<i>Handrub</i>,tisue,sabun)", "-", 1, 1, 5000, 1 * (int)1 * 5000];
$array[4]  = [$id_praktik, date('Y-m-d'), "BIAYA OVERHEAD OPERASIONAL", "Log Book", "-", 1, 1, 20000, 1 * (int)1 * 20000];
$array[5]  = [$id_praktik, date('Y-m-d'), "PEMAIAN KEKAYAAN DAERAH", "Kelas", "-", 0, 1, 30000, 0];
$array[6]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CSS", "-", 0, 1, 37500, 0];
$array[7]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CRS", "-", 0, 1, 37500, 0];
$array[8]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CBD", "-", 0, 1, 37500, 0];
$array[9]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "Pengayaan", "-", 0, 1, 37500, 0];
$array[10]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "Bimbingan", "-", 0, 1, 37500, 0];
$array[11]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "BST", "-", 0, 1, 37500, 0];
$array[12]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Mini Cex", "-", 0, 1, 150000, 0];
$array[13]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Ujian", "-", 0, 1, 150000, 0];
$array[14]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Makan Pembimbing", "-", 0, 1, 20000, 0];
$array[15]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Standar Pasien", "-", 0, 1, 100000, 0];

// echo "<pre>";
// echo print_r($array);
// echo "</pre>";

// $d1 = "2023-01-01";
// $d2 = "2023-01-09";
// $d2 = date('Y-m-d', strtotime($d2 . "+1 days"));

// $period = new DatePeriod(
//     new DateTime($d1),
//     new DateInterval('P1D'),
//     new DateTime($d2)
// );

// echo "<pre>";
// echo print_r($period);
// echo "</pre>";

foreach ($array as $key => $value) {

    $sql_insert = "INSERT INTO tb_praktik ( ";
    $sql_insert .= " id_praktik,";
    $sql_insert .= " tgl_tambah_tarif_pilih,";
    $sql_insert .= " nama_jenis_tarif_pilih,";
    $sql_insert .= " nama_tarif_pilih,";
    $sql_insert .= " nominal_tarif_pilih,";
    $sql_insert .= " nama_satuan_tarif_pilih,";
    $sql_insert .= " frekuensi_tarif_pilih,";
    $sql_insert .= " kuantitas_tarif_pilih,";
    $sql_insert .= " jumlah_tarif_pilih,";
    $sql_insert .= " status_tarif_pilih";
    $sql_insert .= " ) VALUES (";
    $sql_insert .= " '" . $value[0] . "', ";
    $sql_insert .= " '" . $value[1]  . "', ";
    $sql_insert .= " '" . $value[2]  . "', ";
    $sql_insert .= " '" . $value[3]  . "', ";
    $sql_insert .= " '" . $value[4]  . "', ";
    $sql_insert .= " '" . $value[5]  . "', ";
    $sql_insert .= " '" . $value[6]  . "', ";
    $sql_insert .= " '" . $value[7]  . "', ";
    $sql_insert .= " '" . $value[8]  . "' ";
    $sql_insert .= " )";
    echo " $sql_insert<br>";
    // $conn->query($sql);
}
