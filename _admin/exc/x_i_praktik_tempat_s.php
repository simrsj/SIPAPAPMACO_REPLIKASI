<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

//data praktik
$sql_praktik = "SELECT * FROM tb_praktik 
JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
WHERE tb_praktik.id_praktik = " . $_POST['id'];
$q_praktik = $conn->query($sql_praktik);
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

//data tempat
$sql_tempat = "SELECT * FROM tb_tempat
WHERE tb_tempat.id_tempat = " . $_POST['tempat'];
$q_tempat = $conn->query($sql_tempat);
$d_tempat = $q_tempat->fetch(PDO::FETCH_ASSOC);

if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {

    $frek = $d_praktik['jumlah_praktik'];
    $kuan = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
    $total_tarif = $frek * $kuan * $d_tempat['tarif_tempat'];
} else {
    $frek = 1;
    $kuan = 1;
    $total_tarif = $frek * $kuan * $d_tempat['tarif_tempat'];
}
$sql_t = "INSERT INTO tb_tempat_pilih (
    id_tempat, 
    id_praktik,
    frek_tempat_pilih,
    kuan_tempat_pilih,
    total_tarif_tempat_pilih,
    tgl_input_tempat_pilih
    ) VALUES (
        '" . $_POST['tempat'] . "', 
        '" . $_POST['id'] . "', 
        '" . $frek . "', 
        '" . $kuan . "', 
        '" . $total_tarif . "', 
        '" . date('Y-m-d') . "'
    )";
$sql_u = "UPDATE tb_praktik SET
status_cek_praktik = 'TMP'
WHERE id_praktik = '" . $_POST['id'] . "'
";

// echo $sql_t . "<br>";
// echo $sql_u . "<br>";
$conn->query($sql_t);
$conn->query($sql_u);
