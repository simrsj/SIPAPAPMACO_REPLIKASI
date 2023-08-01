<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";
error_reporting(0);
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/autoload.php";

$id_praktikan = decryptString($_GET['data'], $customkey);
try {
    $sql = "SELECT * FROM tb_praktik";
    $sql .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik";
    $sql .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd";
    $sql .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
    $sql .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd";
    $sql .= " WHERE tb_praktikan.id_praktikan = " . $id_praktikan;
    // echo $sql;
    $q = $conn->query($sql);
    $d = $q->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo $e->getMessage();
}
try {
    $sql_institusi = "SELECT * FROM tb_institusi";
    $sql_institusi .= " WHERE id_institusi = " . $d['id_institusi'];
    // echo $sql_institusi;
    $q_institusi = $conn->query($sql_institusi);
    $d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo $e->getMessage();
}

$ukuranFontIsi = "16px";
$img =  $_SERVER['DOCUMENT_ROOT'] . '/SM/_img/logopemprov.png';
$cover =  $_SERVER['DOCUMENT_ROOT'] . '/SM/_img/logo_logbook_ked_coass.png';
$css =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/custom/cssCustom.css';

require_once($_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
// $options->set('defaultFont', 'Courier');
$dompdf = new Dompdf($options);

# ------------------------------------------------------------------------------------------------------------------------------------- HTML TARIF

//tag awal html
$html = '
<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <style>
    @page { 
        size: 14.85cm 21cm potrait; 
        margin: 1cm 1cm 0cm 2cm ; 
        }        
        body{
            // font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;  
            font-family: "Times New Roman", Times, serif;          
        }
        header {
            position: fixed;
        }
        main {
            margin-top: 3.3cm;
            margin-top: 0cm;
        }
        .fs-18 {font-size: 25px;}
        .fs-12 {font-size: 14px;}
        .f-arial {font-family: Arial, sans-serif;}
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height : 0.5cm;
            vertical-align: bottom;
            font-size: ' . $ukuranFontIsi . ';
            line-height: 10px;
        }
        .s {
            padding: 3px 3px 3px 3px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        .cK {
            background-color: #8db4e2;
        }
        .page_break { page-break-before: always; }
        .b{ font-weight: bolder; }
        .i{ font-style: italic; }
        .u{ text-decoration: underline; }
        .t-center { text-align: center;}
        .t-right { text-align: right;}
        .t-justify {text-align: justify;}
        .border-1 {
            border: 1px solid;
            position: sticky;
            border-radius: 5px;
            border-spacing: 0cap;
            border-width:1px !important;
        }
    </style>

</head>
';

//tag buka body
$html .= '
<body>
';

//cover
$html .=
    // $sql . '<br>' . $sql_institusi .
    '
<center class="b fs-18 f-arial">
BUKU LOG PENDIDIKAN KLINIK<br>
ILMU KEDOKTERAN JIWA<br>
RS JIWA PROVINSI JAWA BARAT<br>
<br><br>
<img src="' . $cover . '" style="width: 85% !important, heigth:90% !important;">
<br><br><br>
RUMAH SAKIT JIWA<br>
PROVINSI JAWA BARAT</center>
';

//hal baru
$html .= '
<div class="page_break"></div>
';

//biodata
$html .= '
<center class="">
<b>BIODATA MAHASISWA</b><br><br>
<img src="' . $d['foto_praktikan'] . '" style="width: 120px !important, heigth:180px !important;" alt="Foto Tidak Ada"><br><br><br>
<table width="100%" border=1 >
<tr>
    <td>
        NAMA
    </td>
    <td>
        : ' . $d['nama_praktikan'] . '
    </td><br><br>
</tr>
<tr>
    <td>
        NPM
    </td>
    <td>
        : ' . $d['no_id_praktikan'] . '
    </td><br><br>
</tr>
<tr>
    <td>
        TANGGAL LAHIR
    </td>
    <td>
        : ' . tanggal($d['tgl_lahir_praktikan']) . '
    </td><br><br>
</tr>
<tr>
    <td>
        KELOMPOK
    </td>
    <td>
        : ' . $d['nama_praktik'] . '
    </td><br><br>
</tr>
<tr>
    <td>
        PERIODE
    </td>
    <td>
        : ' . tanggal($d['tgl_mulai_praktik']) . ' - ' . tanggal($d['tgl_selesai_praktik']) . '
    </td><br><br>
</tr>
<tr>
    <td>
        ALAMAT
    </td>
    <td>
        : ' . $d['alamat_praktikan'] . '
    </td><br><br>
</tr>
<tr>
    <td>
        NOMOR HP
    </td>
    <td>
        : ' . $d['telp_praktikan'] . ' - WA(' . $d['telp_praktikan'] . ')
    </td><br><br>
</tr>
<tr>
    <td>
    </td>
    <td class="t-right">
    Cisarua, ' . tanggal(date('Y-m-d')) . '
    </td><br><br>
</tr>
<tr class="t-center">
    <td>
      Mahasiswa<br><br><br><br><br><br><br>
    </td>
    <td>
        Ketua Tim Koordinator Pendidikan<br>
        Rumah Sakit Jiwa <br>
        Provinsi Jawa Barat<br><br><br><br><br>
    </td>
</tr>
<tr class="t-center">
    <td>
      (' . $d['nama_praktikan'] . ')
    </td>
    <td>
        (Lina Budiyanti, dr., Sp.KJ.)
    </td>
</tr>
</table>
</center>
';

//hal baru
$html .= '
<div class="page_break"></div>
';

//TUJUAN BEMBELAJARAN
$html .= '
<center class="">
<b>TUJUAN PEMBELAJARAN</b><br><br>
</center>
<div class="t-justify">
Setelah menjalani stase Ilmu Kedokteran Jiwa di Rumah Sakit Jiwa  Provinsi Jawa Barat, mahasiswa tahap profesi diharapkan akan mampu :
<ol>
  <li>Membentuk rapport yang baik dalam hubungan dokter-pasien</li>
  <li>Melakukan investigasi (observasi serta anamnesis) psikiatrik</li>
  <li>Melakukan pemeriksaan status mental sesuai pedoman yang ditetapkan</li>
  <li>Menegakkan Diagnosis Multiaksial, dan/Diagnosis Kerja dan Diagnosis Banding (DK/DD)</li>
  <li>Memperkirakan prognosis</li>
  <li>Memelih serta mengusulkan pemeriksaan tambahan /penunjang yang dibutuhkan</li>
  <li>Merencanakan Penatalaksanaan yang benar dan rasional</li>
  <li>Membantu secara ilmiah serta selalu tanggap terhadap apa yang terjadi/ mungkin terjadi pada pasien yang dikelola</li>
  <li>Melaksanakan pelayanan kesehatan jiwa rawat jalan/rawat inap/intensif/IGD</li>
  <li>Melaksanakan penyuluhan kesehatan jiwa masyarakat</li>
  <li>Melakukan pengelolaan awal dan rujukan pada kasus-kasus gangguan jiwa</li>
  <li>Bersikap professional dalam melakukan pelayanan medis yang dilandasi oleh <i>Good Medical Practitice</i></li>
</ol>
</div>
';

//hal baru
$html .= '
<div class="page_break"></div>
';

//MATERI PEMBELAJARAN SESUAI TINGKAT KOMPETENSI SKDI
$html .= '
<center class="">
<b>MATERI PEMBELAJARAN SESUAI TINGKAT KOMPETENSI SKDI</b><br>
<div class="fs-12"> Daftar Penyakit sesuai Standar Kompetensi Dokter Indonesia Tahun 2019.</div>
<table width="100%" class="border-1">
    <tr>
        <td style="witdh: 20px;">
            1. 
        </td>
        <td>
        Membentuk rapport yang baik dalam hubungan dokter-pasien
        </td>
    </tr>
    <tr>
        <td>
            2. 
        </td>
        <td>
        Melakukan investigasi (observasi serta anamnesis) psikiatrik
        </td>
    </tr>
    <tr>
        <td>
            3. 
        </td>
        <td>
        Melakukan pemeriksaan status mental sesuai pedoman yang ditetapkan
        </td>
    </tr>
    <tr>
        <td>
            4. 
        </td>
        <td>
        Menegakkan Diagnosis Multiaksial, dan/Diagnosis Kerja dan Diagnosis Banding (DK/DD)
        </td>
    </tr>
    <tr>
        <td>
            5. 
        </td>
        <td>
        Memperkirakan prognosis
        </td>
    </tr>
    <tr>
        <td>
            6.
        </td>
        <td>
        Memelih serta mengusulkan pemeriksaan tambahan /penunjang yang dibutuhkan
        </td>
    </tr>
    <tr>
        <td>
            7.
        </td>
        <td>
        Merencanakan Penatalaksanaan yang benar dan rasional 
        </td>
    </tr>
    <tr>
        <td>
            8.
        </td>
        <td>
        Membantu secara ilmiah serta selalu tanggap terhadap apa yang terjadi/ mungkin terjadi pada pasien yang dikelola
        </td>
    </tr>
    <tr>
        <td>
            9.
        </td>
        <td>
        Melaksanakan pelayanan kesehatan jiwa rawat jalan/rawat inap/intensif/IGD
        </td>
    </tr>
    <tr>
        <td>
            10.
        </td>
        <td>
        Melaksanakan penyuluhan kesehatan jiwa masyarakat
        </td>
    </tr>
    <tr>
        <td>
            11.
        </td>
        <td>
        Melakukan pengelolaan awal dan rujukan pada kasus-kasus gangguan jiwa
        </td>
    </tr>
    <tr>
        <td>
            12.
        </td>
        <td>
        Bersikap professional dalam melakukan pelayanan medis yang dilandasi oleh <u>Good Medical Practitice</u>
        </td>
    </tr>
</table>
</center>
';

//hal baru
$html .= '
<div class="page_break"></div>
';

//tag kop surat
$html .= '
<!--header -->
<table width="100%" border=0 >
    <tr>
        <th class="t-center">
            <img src="' . $img . '" style="width: 100px !important, heigth:150px !important;">
        </th>
        <td style="text-align: center;">
            <span style="line-height: 20px">
                <span style="font-size: 18.667px; ">PEMERINTAH DAERAH PROVINSI JAWA BARAT</span><br>
                <span style="font-size: 21.333px;"> DINAS KESEHATAN</span><br>
                <span style="font-weight: bold; font-size: 24px;"> RUMAH SAKIT JIWA</span><br>
            </span>
            <span style="line-height: 13px">
                <span style="font-size: 13.333px;">
                Jalan Kolonel Masturi KM. 7 – Cisarua Telepon: (022) 2700260<br>
                Fax: (022) 2700304 Website: www.rsj.jabarprov.go.id email: rsj@jabarprov.go.id<br>
                KABUPATEN BANDUNG BARAT – 40551
                </span>
            </span>
        </td>
    </tr>
</table>
<hr>
<!--/header-->
';

//judul Surat
$html .= '
<main>
<br>
<center style="font-size: 21.3333px; line-height: 18px"><b>DATA AKUN PRAKTIKAN SIPAPAP MACO</b></td></center>
<br>
';

//Footer
$html .= "
<footer>
<center>Dicetak Pada Jam : <b>" . date("G:i:s") . "</b>, Tanggal : <b>" . tanggal(date("Y-m-d")) . "</b></center>
</footer>
";
//tag tutup body
$html .= "</body>";

//tag tutup html
$html .= "</html>";

$dompdf->loadHtml($html);

// Setting ukuran dan orientasi kertas
// $customPaper = array(0, 0, 812.5984252, 1247.2440945);
// $dompdf->setPaper($customPaper, 'potrait');

// Rendering dari HTML Ke PDF
$dompdf->render();

// Melakukan output file Pdf
$dompdf->stream('logbook_ked_coass_' . $d['tgl_mulai_praktik'] . '_' . $d['tgl_selesai_praktik'] . '_' . $d_institusi['nama_institusi'] . '_' . $d['nama_praktikan'] . '.pdf');
// $dompdf->stream('logbook_ked_coass_.pdf');
