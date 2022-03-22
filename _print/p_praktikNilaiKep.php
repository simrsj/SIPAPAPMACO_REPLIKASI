<?php
// include('koneksi.php');
$koneksi = mysqli_connect("localhost", "root", "simrs12345", "db_sm");

$servername = "localhost";
$database = "db_sm";
$username = "root";
// $password = "";
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

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

require_once("../vendor/dompdf/autoload.inc.php");
// def("DOMPDF_ENABLE_REMOTE", false);
use Dompdf\Dompdf;
use Dompdf\Options;
// def("DOMPDF_ENABLE_REMOTE", false);
// instantiate and use the dompdf class
// $dompdf = new Dompdf();
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
// $dompdf = new Dompdf();
// $dompdf = $dompdf->set_option('isRemoteEnabled', TRUE);

$img =  $_SERVER['DOCUMENT_ROOT'] . '/SM/_img/logopemprov.png';

$css_sbAdmin2 =  $_SERVER['DOCUMENT_ROOT'] . '/SM/css/sb-admin-2.min.css';
$css_dataTables =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/datatables/dataTables.bootstrap4.min.css';
$css_custom =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/!custom/cssCustom.css';

$js_bootstrap =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/bootstrap/js/bootstrap.bundle.min.js';
$js_jquery =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/jquery-easing/jquery.easing.min.js';
$js_sbAdmin2 =  $_SERVER['DOCUMENT_ROOT'] . '/SM/js/sb-admin-2.min.js';
$js_dataTables =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/datatables/jquery.dataTables.min.js';
$js_dataTables_bs =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/datatables/dataTables.bootstrap4.min.js';
$js_custom =  $_SERVER['DOCUMENT_ROOT'] . '/SM/vendor/!custom/jsCustom.js';

$sql_praktik = "SELECT * FROM tb_praktik";
$sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
$sql_praktik .= " WHERE id_praktik = 2";
$q_praktik = $conn->query($sql_praktik);
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

// $dompdf->set('isRemoteEnabled', true);
$jenis_kegiatan = mysqli_query($koneksi, "select nama_jenis_tarif_pilih from tb_tarif_pilih where id_praktik = 2 GROUP BY nama_jenis_tarif_pilih ");


//tag awal html
$html = '
<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    ';

$html .= '    
<style>
  @page { 
    size: 21.5cm 33cm potrait; 
    margin: 0.5cm 1cm 0.5cm 2cm ; 
    }
</style>
';


$html .= '
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="' . $css_sbAdmin2 . '" rel="stylesheet">
    <link href="' . $css_dataTables . '" rel="stylesheet">
    <link href="' . $css_custom . '" rel="stylesheet">

    <script rel="javascript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
';

$html .= '
</head>
';

//tag buka body
$html .= '
<body>
';

//tag kop surat
$html .= '
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
            <span style="line-height: 15px">
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
';

//Tag judul Surat
$html .= '
<table border="0" style="font-size: 14.667px; line-height: 20px">
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
            : 420/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Diklat-RSJ/2022<br>
            : Biasa<br>
            : -<br>
            : Praktik <span style="color: red">{Keperawatan Jiwa}</span><br>
        </td>
        <td style="vertical-align: text-top;">
            Yth.
        </td>
        <td style="vertical-align: text-top;">
        <span style="color: red">{Dekan Fakultas Ilmu Keperawatan Universitas Adhirajarasa Reswara Sanjaya} </span><br>
            di <br>
            &nbsp;&nbsp;&nbsp;Tempat
        </td>
    </tr>
</table>
';

$html .= '
<table border="0" style="font-size: 14.667px; line-height: 20px">
    <tr>
        <td width="67px">
        </td>
        <td 
        style="text-align: justify;
        text-justify: inter-word;
        ">
            Menindaklanjuti surat dari ' . ucwords(strtolower($d_praktik['nama_institusi'])) . ', Nomor: ' . $d_praktik['no_surat_praktik'] . ' pada tanggal ' . tanggal($d_praktik['tgl_input_praktik']) . '
            perihal Permohonan <span style="color: red">Izin Praktik Orientasi Klinik Program Studi Sarjana Keperawatan</span>.
            Pada dasarnya kami dapat menerima Permohonan Praktik Lapangan tersebut
            untuk <b>' . $d_praktik['jumlah_praktik'] . '</b> orang <span style="color: red">praktikan </span> pada tanggal <b>' . tanggal($d_praktik['tgl_mulai_praktik']) . ' sampai dengan ' . tanggal($d_praktik['tgl_selesai_praktik']) . '.</b> <br>
            Sesuai Peraturan Gubernur Jawa Barat Nomor 15 Tahun 2020 tentang Tarif Layanan Unit Pelaksanaan Teknis Daerah Rumah Sakit Jiwa,
            maka Rincian Anggaran Biaya yang harus Saudara penuhi adalah sebagai berikut :
        </td>
    </tr>
</table>
';

//tag buka tabel invoice
$html .= '
<table width="100%" border=1 style="font-size: 14.667px;">
        <tr>
            <td width="67px">
            </td>
            <th max-width="5%">No</th>
            <th>Jenis Kegiatan</th>
            <th>Frek </th>
            <th>MHS</th>
            <th>TARIF</th>
            <th>Satuan</th>
            <th>Jumlah (Rp)</th>
        </tr>';
$no = 1;

while ($rows = mysqli_fetch_array($jenis_kegiatan)) {
    $html .= "<tr>
                <td width='67px'>
                </td>
                <td>" . $no . "</td>
                <td colspan = '6'>" . $rows['nama_jenis_tarif_pilih'] . "</td>
                </tr>";
    $query = mysqli_query($koneksi, "select * from tb_tarif_pilih where id_praktik = 2 and nama_jenis_tarif_pilih='" . $rows['nama_jenis_tarif_pilih'] . "'");
    while ($row = mysqli_fetch_array($query)) {
        $html .= "<tr>
                        <td width='67px'>
                        </td>
                        <td>  </td>
                        <td>" . $row['nama_tarif_pilih'] . "</td>
                        <td>" . $row['frekuensi_tarif_pilih'] . "</td>
                        <td>" . $row['kuantitas_tarif_pilih'] . "</td>
                        <td>" . $row['nominal_tarif_pilih'] . "</td>
                        <td>" . $row['nama_satuan_tarif_pilih'] . "</td>
                        <td>" . $row['jumlah_tarif_pilih'] . "</td>
                    </tr>";
    }
    $no++;
}

//tag tutup tabel invoice
$html .= '
</table>
';


//tag akhir surat
$html .= '
<table border="0" style="font-size: 14.667px; line-height: 20px">
    <tr>
        <td width="67px">
        </td>
        <td 
        style="text-align: justify;
        text-justify: inter-word;
        ">
            Perlu kami informasikan pembayaran ditransfer pada Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD) 
            dengan Nomor: <b>BJB-0063028738002</b>. Bukti transfer dapat dikirim melaui email  <u>diklit.rsj.jabarprov@gmail.com</u> 
            dan nomor WA Bendahara Penerimaan RSJ <b>(081321412643)</b><br/>
            Demikian agar menjadi maklum. Atas perhatian dan kerja sama Saudara kami ucapkan terima kasih.

            </td>
            </tr>
        </table>
';

//tag ttd surat
$html .= '
<table border = 0 width="100%" style="font-size: 14.667px;">
            <tr>
                <td></td>
                <td>DIREKTUR</td>
            </tr>
            <tr>
                <td></td>
                <td>RS JIWA PROVINSI JAWA BARAT</td>
            </tr>
            <tr>
                <td></td>
                <td><br/><br/><br/></td>
            </tr>
            <tr>
                <td></td>
                <td>ELLY MARLIYANI, dr., Sp.KJ., M.K.M.</td>
            </tr>
            <tr>
                <td></td>
                <td>Pembina Utama Madya</td>
            </tr>
            <tr>
                <td>tembusan</td>
                <td>NIP. 196608141991022004</td>
            </tr>
</table>
';

//javascript
$html .= '
<!-- JS -->
<script src="' . $js_bootstrap . '"></script>
<script src="' . $js_jquery . '"></script>
<script src="' . $js_sbAdmin2 . '"></script>
<script src="' . $js_dataTables . '"></script>
<script src="' . $js_dataTables_bs . '"></script>
<script src="' . $js_custom . '"></script>
';

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
$dompdf->stream('Data Nilai.pdf');
