<?php
// include('koneksi.php');
$koneksi = mysqli_connect("localhost", "root", "simrs12345", "db_sm");

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
// $dompdf->set('isRemoteEnabled', true);

$jenis_kegiatan = mysqli_query($koneksi, "select nama_jenis_tarif_pilih from tb_tarif_pilih where id_praktik = 2 GROUP BY nama_jenis_tarif_pilih ");
$html = '<center>
            <table width="100%">
            <tr>
                <th rowspan = 6><img src="' . $img . '" style="width: 100px !important, heigth:150px !important;"></th>
                <th>PEMERINTAH DAERAH PROVINSI JAWA BARAT</th>
            </tr>
            <tr>
                <th>DINAS KESEHATAN</th>
            </tr>
            <tr>
                <th>RUMAH SAKIT JIWA</th>
            </tr>
            <tr>
                <td><center>Jalan Kolonel Masturi KM. 7 – Cisarua Telepon: (022) 2700260</center></td>
            </tr>
            <tr>
                <td><center>Fax: (022) 2700304 Website: www.rsj.jabarprov.go.id email: rsj@jabarprov.go.id</center></td>
            </tr>
            <tr>
                <td><center>KABUPATEN BANDUNG BARAT – 40551</center></td>
            </tr>
            </table>
<hr>';
$html .= '<table width="100%">
        <tr >
            <th></th>
            <td align="right">Kab Bandung Barat, {tanggal}</td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td>Nomor </td>
                        <td>:</td>
                        <td>420/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/Diklat-RSJ/2022</td>
                    </tr>
                    <tr>
                        <td>Sifat</td>
                        <td>:</td>
                        <td>Biasa</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td>Praktik Keperawatan Jiwa</td>
                    </tr>
                </table>
            </td>
            <td>Kepada,<br>
            <br>Yth.	{universitas}
            <br>di 
            <br>Tempat
            </td>	
        </tr>
</table>
</center>
<p>
Menindaklanjuti surat dari {universitas}, Nomor: {tablepraktik_nomorsurat} tanggal {tanggal_surat} perihal Permohonan Izin Praktik Orientasi Klinik Program Studi Sarjana Keperawatan. Pada dasarnya kami dapat menerima Permohonan Praktik Lapangan tersebut untuk {jumlah praktikan} orang {praktikan} pada tanggal {tanggal mulai} sampai dengan {tanggal selesai}. <br>
</p>
<p>
Sesuai Peraturan Gubernur Jawa Barat Nomor 15 Tahun 2020 tentang Tarif Layanan Unit Pelaksanaan Teknis Daerah Rumah Sakit Jiwa, maka Rincian Anggaran Biaya yang harus Saudara penuhi adalah sebagai berikut :

</p>';
$html .= '<table width="100%" border=1>
        <tr>
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
                <td>" . $no . "</td>
                <td colspan = '6'>" . $rows['nama_jenis_tarif_pilih'] . "</td>
                </tr>";
    $query = mysqli_query($koneksi, "select * from tb_tarif_pilih where id_praktik = 2 and nama_jenis_tarif_pilih='" . $rows['nama_jenis_tarif_pilih'] . "'");
    while ($row = mysqli_fetch_array($query)) {
        $html .= "<tr>
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
$html .= '</table>

<p style="text-align:justify;">
Perlu kami informasikan pembayaran ditransfer pada Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD) dengan Nomor: <b>BJB-0063028738002</b>. Bukti transfer dapat dikirim melaui email  <u>diklit.rsj.jabarprov@gmail.com</u> dan nomor WA Bendahara Penerimaan RSJ <b>(081321412643)</b><br/>
Demikian agar menjadi maklum. Atas perhatian dan kerja sama Saudara kami ucapkan terima kasih.

</p>';
$html .= "<table border = 1 width='100%'>
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
            </table>";

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('F4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Invoice_Praktikan.pdf');
