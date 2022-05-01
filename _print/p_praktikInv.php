<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

# ------------------------------------------------------------------------------------------------------------------------------------- CONNECTION
$servername = "localhost";
$database = "db_sm";
$username = "root";
$password = "simrs12345";

try {
    $conn = new PDO(
        "mysql:host=$servername; dbname=$database",
        $username,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

# ------------------------------------------------------------------------------------------------------------------------------------- EXC. DATABASE & GET VARIABLE

$sql_praktik = "SELECT * FROM tb_praktik";
$sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
$sql_praktik .= " WHERE id_praktik = " . $_GET['id'];
$q_praktik = $conn->query($sql_praktik);
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

//ukuran font ditentukan jurusan
if ($d_praktik['id_jurusan_pdd'] == 1) {
    $ukuranFontIsi = "12px";
} else {
    $ukuranFontIsi = "12px";
}

//logo Gambar
$img =  $_SERVER['DOCUMENT_ROOT'] . '/SM/_img/logopemprov.png';

//logo Gambar
$tte_elly =  $_SERVER['DOCUMENT_ROOT'] . '/SM/_img/tte/elly_marliani.jpeg';

//no surat
$noSurat =  $_GET['ns'];

//kepada
$kepada =  $_GET['k'];

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
$sql_getJenisKegiatan .= " WHERE id_praktik = " . $_GET['id'];
$sql_getJenisKegiatan .= " AND ujian_tarif_pilih IS NULL";
$sql_getJenisKegiatan .= " AND mess_tarif_pilih IS NULL";
$sql_getJenisKegiatan .= " GROUP BY nama_jenis_tarif_pilih";
$q_getJenisKegiatan = $conn->query($sql_getJenisKegiatan);

//cari Jenis kegiatan Mess
$sql_getJenisKegiatanMess = "SELECT nama_jenis_tarif_pilih FROM tb_tarif_pilih ";
$sql_getJenisKegiatanMess .= " WHERE id_praktik = " . $_GET['id'];
$sql_getJenisKegiatanMess .= " AND mess_tarif_pilih IS NOT NULL";
$sql_getJenisKegiatanMess .= " GROUP BY nama_jenis_tarif_pilih";
$q_getJenisKegiatanMess = $conn->query($sql_getJenisKegiatanMess);

//Cek Data Jenis Kegiatan Ujian
$sql_getDataUjian = "SELECT nama_jenis_tarif_pilih FROM tb_tarif_pilih ";
$sql_getDataUjian .= " WHERE id_praktik = " . $_GET['id'] . " AND nama_jenis_tarif_pilih = 'Ujian'";
$sql_getDataUjian .= " GROUP BY nama_jenis_tarif_pilih";
$q_getDataUjian = $conn->query($sql_getDataUjian);
$r_getDataUjian = $q_getDataUjian->rowCount();

//cari Jenis kegiatan Ujian
$sql_getJenisKegiatanUjian = "SELECT nama_jenis_tarif_pilih FROM tb_tarif_pilih ";
$sql_getJenisKegiatanUjian .= " WHERE id_praktik = " . $_GET['id'];
$sql_getJenisKegiatanUjian .= " AND ujian_tarif_pilih IS NOT NULL";
$sql_getJenisKegiatanUjian .= " GROUP BY nama_jenis_tarif_pilih";
$q_getJenisKegiatanUjian = $conn->query($sql_getJenisKegiatanUjian);

# ------------------------------------------------------------------------------------------------------------------------------------- FUNCTION

//format tanggal Contoh : 23 Maret 2022
function tanggal($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

# ------------------------------------------------------------------------------------------------------------------------------------- LIB. DOMPDF
require_once("../vendor/dompdf/autoload.inc.php");

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
        size: 21.5cm 33cm potrait; 
        margin: 1cm 1cm 0cm 2cm ; 
        }
        @font-face {
            font-family: "source_sans_proregular";           
            src: local("Source Sans Pro"), url("fonts/sourcesans/sourcesanspro-regular-webfont.ttf") format("truetype");
            font-weight: normal;
            font-style: normal;
        }        
        body{
            font-family: "source_sans_proregular", Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;            
        }
        header {
            position: fixed;
        }
        main {
            margin-top: 3.3cm;
            margin-top: 0cm;
        }
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height : 2cm;
            vertical-align: bottom;
            font-size: ' . $ukuranFontIsi . ';
            line-height: 15px;
        }
        .s {
            padding: 3px 3px 3px 3px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        .page_break { page-break-before: always; }
    </style>

</head>
';

//tag buka body
$html .= '
<body>
'
    // . $sql_getJenisKegiatan
;

//tag kop surat
$html .= '
<!--header -->
<table width="100%" border=0 >
    <tr>
        <th class="text-center">
            <img src="' . $img . '" style="width: 100px !important, heigth:150px !important;">
        </th>
        <td style="text-align: center;">
            <span style="line-height: 20px">
                <span style="font-size: 18.667px; ">PEMERINTAH DAERAH PROVINSI JAWA BARAT</span><br>
                <span style="font-size: 21.333px;"> DINAS KESEHATAN</span><br>
                <span style="font-weight: bold; font-size: 24px;"> RUMAH SAKIT JIWA</span><br>
            </span>
            <span style="line-height: 13px">
                <span style="font-size: 12px;">
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

//Tag judul Surat
$html .= '
<main>
<table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Kab Bandung Barat, ' . tanggal(date("Y-m-d")) . '</td>
    </tr>
    <tr>
        <td width="60px"  style="vertical-align: text-top;">
            Nomor<br>
            Sifat<br>
            Lampiran<br>
            Perihal<br>
        </td>
        <td width="350px" style="vertical-align: text-top;">
            : 420/' . $noSurat . '/Diklat-RSJ/' . date("Y") . '<br>
            : Biasa<br>
            : -<br>
            : ' . $perihal . '<br>
        </td>
        <td style="vertical-align: text-top; width : 15px;">
            Yth.
        </td>
        <td style="vertical-align: text-top; width : 210px;">
        ' . $kepada . " " . ucwords(strtolower($d_praktik['nama_institusi'])) . '<br>
            di <br>
            &nbsp;&nbsp;&nbsp;Tempat
        </td>
    </tr>
</table>
';

//isi
$html .= '
<table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
    <tr>
        <td width="67px">
        </td>
        <td 
        style="text-align: justify;
        text-justify: inter-word;
        ">
            <div style="
            text-indent: 0.3in;
            ">
                Menindaklanjuti surat dari ' . ucwords(strtolower($d_praktik['nama_institusi'])) . ', Nomor: ' . $d_praktik['no_surat_praktik'] . ' pada tanggal ' . tanggal($d_praktik['tgl_input_praktik']) . ' perihal Permohonan Izin ' . $perihal . '. Pada dasarnya kami dapat menerima Permohonan Praktik Lapangan tersebut untuk <b>' . $d_praktik['jumlah_praktik'] . '</b> orang praktikan pada tanggal <b>' . tanggal($d_praktik['tgl_mulai_praktik']) . ' sampai dengan ' . tanggal($d_praktik['tgl_selesai_praktik']) . '.</b> <br>
            </div>
            <div style="
            text-indent: 0.3in;
            ">
                Sesuai Peraturan Gubernur Jawa Barat Nomor 15 Tahun 2020 tentang Tarif Layanan Unit Pelaksanaan Teknis Daerah Rumah Sakit Jiwa, maka Rincian Anggaran Biaya yang harus Saudara penuhi adalah sebagai berikut :
            </div>
        </td>
    </tr>
</table>
';

//tag buka tabel invoice
$html .= '
<table >
<tr>
<td width="67px">
</td>
<td>
<table width="100%" style="font-size: ' . $ukuranFontIsi . ';" class="s">
    <tr class="s" style="font-size: ' . $ukuranFontIsi . '; background-color: #cfcfcf;">
        <th class="s">NO</th>
        <th class="s">JENIS KEGIATAN</th>
        <th class="s">FREK </th>
        <th class="s">MHS</th>
        <th class="s">TARIF (Rp)</th>
        <th class="s">SATUAN</th>
        <th class="s">JUMLAH (Rp)</th>
    </tr>';
$no = 1;
$jt = 0;
while ($d_getJenisKegiatan = $q_getJenisKegiatan->fetch(PDO::FETCH_ASSOC)) {
    $html .= '
    <tr class="s">
        <td class="s"style="text-align: center;"><b>' . $no . '</b></td>
        <td class="s" colspan =6 style="text-transform: uppercase;"><b>' . $d_getJenisKegiatan["nama_jenis_tarif_pilih"] . '</b></td>
    </tr>
    ';

    $sql_getTarif = "SELECT * FROM tb_tarif_pilih ";
    $sql_getTarif .= " WHERE id_praktik = " . $_GET['id'];
    $sql_getTarif .= " AND nama_jenis_tarif_pilih='" . $d_getJenisKegiatan['nama_jenis_tarif_pilih'] . "'";
    $sql_getTarif .= " AND ujian_tarif_pilih IS NULL";
    $sql_getTarif .= " AND mess_tarif_pilih IS NULL";
    $q_getTarif = $conn->query($sql_getTarif);
    while ($d_getTarif = $q_getTarif->fetch(PDO::FETCH_ASSOC)) {
        $html .= '
        <tr  class="s">
            <td class="s">  </td>
            <td class="s">' . $d_getTarif["nama_tarif_pilih"] . '</td>
            <td class="s" style="text-align: center;">' . $d_getTarif["frekuensi_tarif_pilih"] . '</td>
            <td class="s" style="text-align: center;">' . $d_getTarif["kuantitas_tarif_pilih"] . '</td>
            <td class="s" style="text-align: right;">' . number_format($d_getTarif["nominal_tarif_pilih"], 0, ",", ".") . '</td>
            <td class="s">' . $d_getTarif["nama_satuan_tarif_pilih"] . '</td>
            <td class="s" style="text-align: right;">' . number_format($d_getTarif["jumlah_tarif_pilih"], 0, ",", ".") . '</td>
        </tr>
        ';
        $jt += $d_getTarif["jumlah_tarif_pilih"];
    }
    $no++;
}

//baris jumlah total tarif
$html .= '
<tr>
<td class="s" colspan=6 style="text-align: right;"> <b>JUMLAH TOTAL</b>
</td>
<td class="s" style="text-align: right;"><b>' . number_format($jt, 0, ",", ".") . '</b></td>
</tr>
';

//tag tutup tabel invoice
$html .= '
</td>
</tr>
</table>
</table>
';

//tag akhir surat
$html .= '
<table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
    <tr>
        <td width="67px">
        </td>
        <td 
        style="text-align: justify;
        text-justify: inter-word;
        ">
            <div style="
            text-indent: 0.5in;">
                Perlu kami informasikan pembayaran ditransfer pada Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD) 
                dengan Nomor: <b>BJB-0063028738002</b>. Bukti transfer dapat dikirim melaui email  <u>diklit.rsj.jabarprov@gmail.com</u> 
                dan nomor WA Bendahara Penerimaan RSJ <b>(081321412643)</b><br/>
            </div>
            <div style="
            text-indent: 0.5in;">
                Demikian agar menjadi maklum. Atas perhatian dan kerja sama Saudara kami ucapkan terima kasih.
            </div>
        </td>
    </tr>
</table>
';

//tag ttd surat dan tembusan
$html .= $ttdTembusan . '
</main>
';

# ------------------------------------------------------------------------------------------------------------------------------------- HTML TARIF MESS

$html .= '
<div class="page_break">
</div>
';

//tag kop surat
$html .= '
<!--header -->
<table width="100%" border=0 >
    <tr>
        <th class="text-center">
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

//Tag judul Surat
$html .= '
<main>
<table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Kab Bandung Barat, ' . tanggal(date("Y-m-d")) . '</td>
    </tr>
    <tr>
        <td width="60px"  style="vertical-align: text-top;">
            Nomor<br>
            Sifat<br>
            Lampiran<br>
            Perihal<br>
        </td>
        <td width="350px" style="vertical-align: text-top;">
            : 420/' . ($noSurat + 1) . '/Diklat-RSJ/' . date("Y") . '<br>
            : Biasa<br>
            : -<br>
            : ' . $perihal . '<br>
        </td>
        <td style="vertical-align: text-top; width : 15px;">
            Yth.
        </td>
        <td style="vertical-align: text-top; width : 210px;">
        ' . $kepada . " " . ucwords(strtolower($d_praktik['nama_institusi'])) . '<br>
            di <br>
            &nbsp;&nbsp;&nbsp;Tempat
        </td>
    </tr>
</table>
';

//isi
$html .= '
<table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
    <tr>
        <td width="67px">
        </td>
        <td 
        style="text-align: justify;
        text-justify: inter-word;
        ">
            <div style="
            text-indent: 0.3in;
            ">
                Menindaklanjuti surat dari ' . ucwords(strtolower($d_praktik['nama_institusi'])) . ', Nomor: ' . $d_praktik['no_surat_praktik'] . ' pada tanggal ' . tanggal($d_praktik['tgl_input_praktik']) . ' perihal Permohonan Izin ' . $perihal . '. Pada dasarnya kami dapat menerima Permohonan Praktik Lapangan tersebut untuk <b>' . $d_praktik['jumlah_praktik'] . '</b> orang praktikan pada tanggal <b>' . tanggal($d_praktik['tgl_mulai_praktik']) . ' sampai dengan ' . tanggal($d_praktik['tgl_selesai_praktik']) . '.</b> <br>
            </div>
            <div style="
            text-indent: 0.3in;
            ">
                Sesuai Peraturan Gubernur Jawa Barat Nomor 15 Tahun 2020 tentang Tarif Layanan Unit Pelaksanaan Teknis Daerah Rumah Sakit Jiwa, maka Rincian Anggaran Biaya yang harus Saudara penuhi adalah sebagai berikut :
            </div>
        </td>
    </tr>
</table>
';

//tag buka tabel invoice
$html .= '
<table width="100%">
<tr>
<td width="67px">
</td>
<td>
<table width="100%" style="font-size: ' . $ukuranFontIsi . ';" class="s">
    <tr class="s" style="font-size: ' . $ukuranFontIsi . '; background-color: #cfcfcf;">
        <th class="s">NO</th>
        <th class="s">JENIS KEGIATAN</th>
        <th class="s">FREK </th>
        <th class="s">MHS</th>
        <th class="s">TARIF (Rp)</th>
        <th class="s">SATUAN</th>
        <th class="s">JUMLAH (Rp)</th>
    </tr>';
$no = 1;
$jt = 0;
while ($d_getJenisKegiatanMess = $q_getJenisKegiatanMess->fetch(PDO::FETCH_ASSOC)) {
    $html .= '
    <tr class="s">
        <td class="s"style="text-align: center;"><b>' . $no . '</b></td>
        <td class="s" colspan =6 style="text-transform: uppercase;"><b>' . $d_getJenisKegiatanMess["nama_jenis_tarif_pilih"] . '</b></td>
    </tr>
    ';

    $sql_getTarif = "SELECT * FROM tb_tarif_pilih ";
    $sql_getTarif .= " WHERE id_praktik = " . $_GET['id'];
    $sql_getTarif .= " AND nama_jenis_tarif_pilih='" . $d_getJenisKegiatanMess['nama_jenis_tarif_pilih'] . "'";
    $sql_getTarif .= " AND mess_tarif_pilih IS NOT NULL";
    $q_getTarif = $conn->query($sql_getTarif);
    while ($d_getTarif = $q_getTarif->fetch(PDO::FETCH_ASSOC)) {
        $html .= '
        <tr  class="s">
            <td class="s">  </td>
            <td class="s">' . $d_getTarif["nama_tarif_pilih"] . '</td>
            <td class="s" style="text-align: center;">' . $d_getTarif["frekuensi_tarif_pilih"] . '</td>
            <td class="s" style="text-align: center;">' . $d_getTarif["kuantitas_tarif_pilih"] . '</td>
            <td class="s" style="text-align: right;">' . number_format($d_getTarif["nominal_tarif_pilih"], 0, ",", ".") . '</td>
            <td class="s">' . $d_getTarif["nama_satuan_tarif_pilih"] . '</td>
            <td class="s" style="text-align: right;">' . number_format($d_getTarif["jumlah_tarif_pilih"], 0, ",", ".") . '</td>
        </tr>
        ';
        $jt += $d_getTarif["jumlah_tarif_pilih"];
    }
    $no++;
}

//baris jumlah total tarif
$html .= '
<tr>
<td class="s" colspan=6 style="text-align: right;"> <b>JUMLAH TOTAL</b>
</td>
<td class="s" style="text-align: right;"><b>' . number_format($jt, 0, ",", ".") . '</b></td>
</tr>
';

//tag tutup tabel invoice
$html .= '
</td>
</tr>
</table>
</table>
';

//tag akhir surat
$html .= '
<table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
    <tr>
        <td width="67px">
        </td>
        <td 
        style="text-align: justify;
        text-justify: inter-word;
        ">
            <div style="
            text-indent: 0.5in;">
                Perlu kami informasikan pembayaran ditransfer pada Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD) 
                dengan Nomor: <b>BJB-0063028738002</b>. Bukti transfer dapat dikirim melaui email  <u>diklit.rsj.jabarprov@gmail.com</u> 
                dan nomor WA Bendahara Penerimaan RSJ <b>(081321412643)</b><br/>
            </div>
            <div style="
            text-indent: 0.5in;">
                Demikian agar menjadi maklum. Atas perhatian dan kerja sama Saudara kami ucapkan terima kasih.
            </div>
        </td>
    </tr>
</table>
';

//tag ttd surat dan tembusan
$html .= $ttdTembusan . '
</main>
';
# ------------------------------------------------------------------------------------------------------------------------------------- HTML TARIF UJIAN

if ($r_getDataUjian > 0) {

    $html .= '
    <div class="page_break">
    </div>
    ';

    //tag kop surat
    $html .= '
    <!--header -->
    <table width="100%" border=0 >
        <tr>
            <th class="text-center">
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


    //Tag judul Surat
    $html .= '
    <main>
    <table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
        <tr>
            <td colspan="2"></td>
            <td colspan="2">Kab Bandung Barat, ' . tanggal(date("Y-m-d")) . '</td>
        </tr>
        <tr>
            <td width="60px"  style="vertical-align: text-top;">
                Nomor<br>
                Sifat<br>
                Lampiran<br>
                Perihal<br>
            </td>
            <td width="350px" style="vertical-align: text-top;">
                : 420/' . ($noSurat + 2) . '/Diklat-RSJ/' . date("Y") . '<br>
                : Biasa<br>
                : -<br>
                : ' . $perihal . '<br>
            </td>
            <td style="vertical-align: text-top; width : 15px;">
                Yth.
            </td>
            <td style="vertical-align: text-top; width : 210px;">
            ' . $kepada . " " . ucwords(strtolower($d_praktik['nama_institusi'])) . '<br>
                di <br>
                &nbsp;&nbsp;&nbsp;Tempat
            </td>
        </tr>
    </table>
    ';

    //isi
    $html .= '
    <table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
        <tr>
            <td width="67px">
            </td>
            <td 
            style="text-align: justify;
            text-justify: inter-word;
            ">
                <div style="
                text-indent: 0.3in;
                ">
                    Menindaklanjuti surat dari ' . ucwords(strtolower($d_praktik['nama_institusi'])) . ', Nomor: ' . $d_praktik['no_surat_praktik'] . ' pada tanggal ' . tanggal($d_praktik['tgl_input_praktik']) . ' perihal Permohonan Izin ' . $perihal . '. Pada dasarnya kami dapat menerima Permohonan Praktik Lapangan tersebut untuk <b>' . $d_praktik['jumlah_praktik'] . '</b> orang praktikan pada tanggal <b>' . tanggal($d_praktik['tgl_mulai_praktik']) . ' sampai dengan ' . tanggal($d_praktik['tgl_selesai_praktik']) . '.</b> <br>
                </div>
                <div style="
                text-indent: 0.3in;
                ">
                    Sesuai Peraturan Gubernur Jawa Barat Nomor 15 Tahun 2020 tentang Tarif Layanan Unit Pelaksanaan Teknis Daerah Rumah Sakit Jiwa, maka Rincian Anggaran Biaya yang harus Saudara penuhi adalah sebagai berikut :
                </div>
            </td>
        </tr>
    </table>
    ';

    //tag buka tabel invoice
    $html .= '
    <table width="100%">
    <tr>
    <td width="67px">
    </td>
    <td>
    <table width="100%" style="font-size: ' . $ukuranFontIsi . ';" class="s">
        <tr class="s" style="font-size: ' . $ukuranFontIsi . '; background-color: #cfcfcf;">
            <th class="s">NO</th>
            <th class="s">JENIS KEGIATAN</th>
            <th class="s">FREK </th>
            <th class="s">MHS</th>
            <th class="s">TARIF (Rp)</th>
            <th class="s">SATUAN</th>
            <th class="s">JUMLAH (Rp)</th>
        </tr>';
    $no = 1;
    $jt = 0;
    while ($d_getJenisKegiatanUjian = $q_getJenisKegiatanUjian->fetch(PDO::FETCH_ASSOC)) {
        $html .= '
        <tr class="s">
            <td class="s"style="text-align: center;"><b>' . $no . '</b></td>
            <td class="s" colspan =6 style="text-transform: uppercase;"><b>' . $d_getJenisKegiatanUjian["nama_jenis_tarif_pilih"] . '</b></td>
        </tr>
        ';

        $sql_getTarif = "SELECT * FROM tb_tarif_pilih ";
        $sql_getTarif .= " WHERE id_praktik = " . $_GET['id'];
        $sql_getTarif .= " AND nama_jenis_tarif_pilih='" . $d_getJenisKegiatanUjian['nama_jenis_tarif_pilih'] . "'";
        $sql_getTarif .= " AND ujian_tarif_pilih IS NOT NULL";
        $q_getTarif = $conn->query($sql_getTarif);
        while ($d_getTarif = $q_getTarif->fetch(PDO::FETCH_ASSOC)) {
            $html .= '
            <tr  class="s">
                <td class="s">  </td>
                <td class="s">' . $d_getTarif["nama_tarif_pilih"] . '</td>
                <td class="s" style="text-align: center;">' . $d_getTarif["frekuensi_tarif_pilih"] . '</td>
                <td class="s" style="text-align: center;">' . $d_getTarif["kuantitas_tarif_pilih"] . '</td>
                <td class="s" style="text-align: right;">' . number_format($d_getTarif["nominal_tarif_pilih"], 0, ",", ".") . '</td>
                <td class="s">' . $d_getTarif["nama_satuan_tarif_pilih"] . '</td>
                <td class="s" style="text-align: right;">' . number_format($d_getTarif["jumlah_tarif_pilih"], 0, ",", ".") . '</td>
            </tr>
            ';
            $jt += $d_getTarif["jumlah_tarif_pilih"];
        }
        $no++;
    }

    //baris jumlah total tarif
    $html .= '
    <tr>
    <td class="s" colspan=6 style="text-align: right;"> <b>JUMLAH TOTAL</b>
    </td>
    <td class="s" style="text-align: right;"><b>' . number_format($jt, 0, ",", ".") . '</b></td>
    </tr>
    ';

    //tag tutup tabel invoice
    $html .= '
    </td>
    </tr>
    </table>
    </table>
    ';

    //tag akhir surat
    $html .= '
    <table border="0" style="font-size: ' . $ukuranFontIsi . '; line-height: 18px">
        <tr>
            <td width="67px">
            </td>
            <td 
            style="text-align: justify;
            text-justify: inter-word;
            ">
                <div style="
                text-indent: 0.5in;">
                    Perlu kami informasikan pembayaran ditransfer pada Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD) 
                    dengan Nomor: <b>BJB-0063028738002</b>. Bukti transfer dapat dikirim melaui email  <u>diklit.rsj.jabarprov@gmail.com</u> 
                    dan nomor WA Bendahara Penerimaan RSJ <b>(081321412643)</b><br/>
                </div>
                <div style="
                text-indent: 0.5in;">
                    Demikian agar menjadi maklum. Atas perhatian dan kerja sama Saudara kami ucapkan terima kasih.
                </div>
            </td>
        </tr>
    </table>
    ';

    //tag ttd surat dan tembusan
    $html .= $ttdTembusan . '
    </main>
    ';
}

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
$dompdf->stream('Invoice.pdf');
