<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/autoload.php";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

# ------------------------------------------------------------------------------------------------------------------------------------- VARIABLE
$id_praktik = base64_decode(urldecode($_GET['idp']));

//logo Gambar
$img =  $_SERVER['DOCUMENT_ROOT'] . '/SM/_img/logopemprov.png';

//logo Gambar
$tte_elly =  $_SERVER['DOCUMENT_ROOT'] . '/SM/_img/tte/elly_marliani.jpeg';

//no surat
$noSurat =   (int)$_GET['ns'];

//kepada
$kepada =  $_GET['k'];

# ------------------------------------------------------------------------------------------------------------------------------------- EXC. DATABASE
$sql_praktik = "SELECT * FROM tb_praktik";
$sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
$sql_praktik .= " WHERE id_praktik = " . $id_praktik;
// echo $sql_praktik;
try {
    $q_praktik = $conn->query($sql_praktik);
} catch (Exception $ex) {
    echo "<script> alert('$ex -DATA praktik-'); ";
    echo "document.location.href='?error404'; </script>";
}
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

//perihal
if ($d_praktik['id_jurusan_pdd'] == 1) {
    $perihal = "Praktik Kedokteran Jiwa";
} elseif ($d_praktik['id_jurusan_pdd'] == 2) {
    $perihal = "Praktik Keperawatan Jiwa";
} elseif ($d_praktik['id_jurusan_pdd'] == 3) {
    if ($d_praktik['id_profesi_pdd'] != 0) {
        $perihal = "Praktik Program Studi Profesi Psikologi (PSPP)";
    } else {
        $perihal = "Praktik Psikologi";
    }
} elseif ($d_praktik['id_jurusan_pdd'] == 4) {
    $perihal = "Praktik Informasi Teknologi";
} elseif ($d_praktik['id_jurusan_pdd'] == 5) {
    if ($d_praktik['id_profesi_pdd'] != 0) {
        $perihal = "Praktik Kerja Profesi Apoteker (PKPA)";
    } else {
        $perihal = "Praktik Farmasi";
    }
} elseif ($d_praktik['id_jurusan_pdd'] == 6) {
    $perihal = "Pekerja Sosial";
} elseif ($d_praktik['id_jurusan_pdd'] == 7) {
    $perihal = "Kesehatan Lingkungan";
} elseif ($d_praktik['id_jurusan_pdd'] == 8) {
    $perihal = "Rekam Medis";
}

$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('p_praktik_invoiceDOCX(PHPWord).docx');

$templateProcessor->setValues([
    'tanggal' => tanggal(date('Y m d')),
    'ip' => $d_praktik['nama_institusi'],
    'kepada' => $kepada,
    'no_surat' => $noSurat,
    'no_surat_ip' => $d_praktik['no_surat_praktik'],
]);

header("Content-Disposition: attachment; filename=Invoice.docx");

$templateProcessor->saveAs('php://output');
