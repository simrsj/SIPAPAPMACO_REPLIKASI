<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

# ------------------------------------------------------------------------------------------------------------------------------------- CONNECTION
// $servername = "localhost";
// $database = "db_sm";
// $username = "root";
// $password = "simrs12345";

// try {
//     $conn = new PDO(
//         "mysql:host=$servername; dbname=$database",
//         $username,
//         $password
//     );
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     //echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

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

//ukuran font ditentukan jurusan
if ($d_praktik['id_jurusan_pdd'] == 1) {
    $ukuranFontIsi = "12px";
} else {
    $ukuranFontIsi = "12px";
}

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

//tembusan
if ($d_praktik['id_institusi'] == 19) {
    $tembusan = '
        Tembusan :
        <div style="text-indent: 0.3in;">1. Direktur Utama RS Immanuel</div>
        <div style="text-indent: 0.3in;">2. Bagian Keuangan RS Jiwa</div>
    ';
} else {
    $tembusan = '
    Tembusan :
    <div style="text-indent: 0.3in;">1. Bagian Keuangan RS Jiwa</div>
    ';
}

$ttdTembusan = '
<table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px; width: 100% !important">
<tr>
    <td>
    </td>
    <td style="text-align:center;">
        DIREKTUR<br>
        RS JIWA PROVINSI JAWA BARAT<br>
    </td>
</tr>
<tr>
    <td style="text-valign: text-bottom;">
    ' . $tembusan . '
    </td>
    <td style="text-align:center;">
        <img src="' . $tte_elly . '" style="width: 200px !important, heigth: 100px !important;">
    </td>
</tr>
</table>
';

//cari Jenis kegiatan 
$sql_getJenisKegiatan = "SELECT nama_jenis_tarif_pilih FROM tb_tarif_pilih ";
$sql_getJenisKegiatan .= " WHERE id_praktik = " . $id_praktik;
$sql_getJenisKegiatan .= " AND ujian_tarif_pilih IS NULL";
$sql_getJenisKegiatan .= " AND mess_tarif_pilih IS NULL";
$sql_getJenisKegiatan .= " GROUP BY nama_jenis_tarif_pilih";
$q_getJenisKegiatan = $conn->query($sql_getJenisKegiatan);

//cari Jenis kegiatan Mess
$sql_getJenisKegiatanMess = "SELECT nama_jenis_tarif_pilih FROM tb_tarif_pilih ";
$sql_getJenisKegiatanMess .= " WHERE id_praktik = " . $id_praktik;
$sql_getJenisKegiatanMess .= " AND mess_tarif_pilih IS NOT NULL";
$sql_getJenisKegiatanMess .= " GROUP BY nama_jenis_tarif_pilih";
$q_getJenisKegiatanMess = $conn->query($sql_getJenisKegiatanMess);

//Cek Data Jenis Kegiatan Ujian
$sql_getDataUjian = "SELECT nama_jenis_tarif_pilih FROM tb_tarif_pilih ";
$sql_getDataUjian .= " WHERE id_praktik = " . $id_praktik . " AND nama_jenis_tarif_pilih = 'Ujian'";
$sql_getDataUjian .= " GROUP BY nama_jenis_tarif_pilih";
$q_getDataUjian = $conn->query($sql_getDataUjian);
$r_getDataUjian = $q_getDataUjian->rowCount();

//cari Jenis kegiatan Ujian
$sql_getJenisKegiatanUjian = "SELECT nama_jenis_tarif_pilih FROM tb_tarif_pilih ";
$sql_getJenisKegiatanUjian .= " WHERE id_praktik = " . $id_praktik;
$sql_getJenisKegiatanUjian .= " AND ujian_tarif_pilih IS NOT NULL";
$sql_getJenisKegiatanUjian .= " GROUP BY nama_jenis_tarif_pilih";
$q_getJenisKegiatanUjian = $conn->query($sql_getJenisKegiatanUjian);

# ------------------------------------------------------------------------------------------------------------------------------------- LIB. 

require $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/autoload.php";
$pw = new \PhpOffice\PhpWord\PhpWord();
$section = $pw->addSection();
# ------------------------------------------------------------------------------------------------------------------------------------- HTML TARIF 
// (A) LOAD PHPWORD

// (B) ADD HTML CONTENT
$html = "<h1>HELLO WORLD!</h1>";
$html .= "<p>This is a paragraph of random text</p>";
$html .= "<table><tr><td>A table</td><td>Cell</td></tr></table>";
\PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

// (C) SAVE TO DOCX ON SERVER
// $pw->save("convert.docx", "Word2007");

// (D) OR FORCE DOWNLOAD
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment;filename=\"convert.docx\"");
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw, "Word2007");
$objWriter->save("php://output");
