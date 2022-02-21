<?PHP

echo "About to create pdf";
include_once "koneksi.php";
include_once "tanggal.php";

$id_praktik = $_GET['id'];
// echo $id_praktik . "<br>";

#data tarif pilih
$sql_praktik = "SELECT * FROM tb_tarif_pilih
JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik
JOIN tb_tarif ON tb_tarif_pilih.id_tarif = tb_tarif.id_tarif
JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'
ORDER BY nama_tarif ASC";
$q_praktik = $conn->query($sql_praktik);

$data = array();
$no = 1;
$total_tarif = 0;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data,
        array(
            $no,
            $d_praktik['nama_tarif'],
            $d_praktik['nama_tarif_satuan'],
            "Rp " . number_format($d_praktik['jumlah_tarif'], 0, ",", "."),
            $d_praktik['frekuensi_tarif_pilih'],
            $d_praktik['kuantitas_tarif_pilih'],
            "Rp " . number_format($d_praktik['jumlah_tarif_pilih'], 0, ",", ".")
        )
    );
    $total_tarif = $total_tarif + $d_praktik['jumlah_tarif_pilih'];
    $no++;
}

#data tempat pilih
$sql_tempat = "SELECT * FROM tb_praktik 
JOIN tb_tempat_pilih ON tb_praktik.id_praktik = tb_tempat_pilih.id_praktik 
JOIN tb_tempat ON tb_tempat_pilih.id_tempat = tb_tempat.id_tempat 
JOIN tb_tarif_satuan ON tb_tempat.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'";
$q_tempat = $conn->query($sql_tempat);

while ($d_tempat = $q_tempat->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data,
        array(
            $no,
            $d_tempat['nama_tempat'] . " (Tempat)",
            $d_tempat['nama_tarif_satuan'],
            "Rp " . number_format($d_tempat['tarif_tempat'], 0, ",", "."),
            $d_tempat['frek_tempat_pilih'],
            $d_tempat['kuan_tempat_pilih'],
            "Rp " . number_format($d_tempat['total_tarif_tempat_pilih'], 0, ",", ".")
        )
    );
    $total_tarif = $total_tarif + $d_tempat['total_tarif_tempat_pilih'];
    $no++;
}


#data mess pilih
$sql_mess = "SELECT * FROM tb_praktik 
JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik 
JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess 
JOIN tb_institusi on tb_institusi.id_institusi = tb_praktik.id_institusi
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'";
$q_mess = $conn->query($sql_mess);

while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
    if ($d_mess['makan_mess_pilih'] == 'y') {
        $makan = "(Dengan Makan)";
    } elseif ($d_mess['makan_mess_pilih'] == 't') {
        $makan = "(Tanpa Makan)";
    } else {
        $makan = "(<i><b>ERROR</b></i>)";
    }
    array_push(
        $data,
        array(
            $no,
            $d_mess['nama_mess'] . " (Mess) " . $makan,
            "Hari/Orang",
            "Rp " . number_format(
                $d_mess['total_tarif_mess_pilih'] / ($d_mess['jumlah_praktik'] * $d_mess['total_hari_mess_pilih']),
                0,
                ",",
                "."
            ),
            $d_mess['jumlah_praktik'],
            $d_mess['total_hari_mess_pilih'],
            "Rp " . number_format($d_mess['total_tarif_mess_pilih'], 0, ",", ".")
        )
    );
    $total_tarif = $total_tarif + $d_mess['total_tarif_mess_pilih'];
    $no++;
}

#data detail di atas INVOICE
$sql_mess = "SELECT * FROM tb_praktik 
JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik 
JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess 
JOIN tb_institusi on tb_institusi.id_institusi = tb_praktik.id_institusi
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'";
$con_mess = $conn->query($sql_mess);
$detail = $con_mess->fetch(PDO::FETCH_ASSOC);


#header tabel
$header = array(
    array("label" => "No", "length" => 10, "align" => "C"),
    array("label" => "Nama Tarif", "length" => 100, "align" => "C"),
    array("label" => "Satuan", "length" => 40, "align" => "C"),
    array("label" => "Tarif", "length" => 40, "align" => "C"),
    array("label" => "Frek.", "length" => 15, "align" => "C"),
    array("label" => "Ktt.", "length" => 15, "align" => "C"),
    array("label" => "Total Tarif", "length" => 55, "align" => "C")
);

#header tabel
$body = array(
    array("align" => "C"),
    array("align" => "L"),
    array("align" => "L"),
    array("align" => "C"),
    array("align" => "C"),
    array("align" => "C"),
    array("align" => "C")
);


include_once dirname(__FILE__) . "/fpdf/fpdf.php";
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

#tampilkan judul laporan
$judul = "PEMERINTAH PROVINSI JAWA BARAT";
$pdf->SetFont('Arial', 'B', '14');
$pdf->Cell(0, 5, $judul, '0', 1, 'C');
$judul = "DINAS KESEHATAN";
$pdf->SetFont('Arial', 'B', '14');
$pdf->Cell(0, 5, $judul, '0', 1, 'C');
$judul = "RUMAH SAKIT JIWA";
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 5, $judul, '0', 1, 'C');
$judul = "Jalan Kolonel Masturi KM. 7 Telepon: (022) 2700260 Faksimil: (022) 2700304";
$pdf->SetFont('Arial', '', '10');
$pdf->Cell(0, 5, $judul, '0', 1, 'C');
$judul = "Website: www.rsj.jabarprov.go.id email: rsj@jabarprov.go.id";
$pdf->SetFont('Arial', '', '10');
$pdf->Cell(0, 5, $judul, '0', 1, 'C');
$judul = "KABUPATEN BANDUNG BARAT - 40551";
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 5, $judul, '0', 1, 'C');

#logo
$pdf->Image('logo.png', 10, 6, 30);

#garis
$pdf->Line(0, 45, 300, 45); // 50mm from each edge

$pdf->Ln(8);
$judul = "INVOICE ";
$pdf->SetFont('Arial', '', '16');
$pdf->Cell(0, 5, $judul, '0', 1, 'C');
// print_r($detail);die;
$pdf->Ln(4);

$judul = "Nama Institusi : ";
$nama = $detail['nama_institusi'];
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul . ' ' . $nama, '0', 1, 'L');
$pdf->Ln(4);

$judul = "Nama Praktik : ";
$nama = $detail['nama_praktik'];
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul . ' ' . $nama, '0', 1, 'L');
$pdf->Ln(4);

$judul = "Tanggal Mulai : ";
$nama = tanggal($detail['tgl_mulai_praktik']);
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul . ' ' . $nama, '0', 1, 'L');
$pdf->Ln(4);

$judul = "Tanggal Selesai : ";
$nama = tanggal($detail['tgl_selesai_praktik']);
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul . ' ' . $nama, '0', 1, 'L');
$pdf->Ln(4);





#buat header tabel
$pdf->SetFont('Arial', 'B', '10');
$pdf->SetTextColor(255);
$pdf->SetDrawColor(0, 0, 0);
foreach ($header as $kolom) {
    $pdf->Cell(
        $kolom['length'],
        7,
        $kolom['label'],
        1,
        '0',
        $kolom['align'],
        true
    );
}
$pdf->Ln();

#tampilkan data tabelnya
$pdf->SetFillColor(220, 220, 220);
$pdf->SetTextColor(0);
$pdf->SetFont('Arial', '', '9');
$fill = false;
foreach ($data as $baris) {
    $i = 0;
    foreach ($baris as $cell) {
        $pdf->Cell(
            $header[$i]['length'],
            5,
            $cell,
            1,
            '0',
            $body[$i]['align'],
            $fill
        );
        $i++;
    }
    $fill = !$fill;
    $pdf->Ln();
}
$pdf->Ln();
$judul = "Jumlah Total : ";
$nama = $total_tarif;
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul . ' Rp ' . number_format($nama, 2, ',', '.'), '0', 1, 'R');
$pdf->Ln(4);

//  .
$judul = "Perlu kami informasikan pembayaran dapat ditransfer pada Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD) dengan nomor : ";
$pdf->SetFont('Arial', '', '12');
$pdf->write(5, $judul, '');
$judul = "BJB-0063028738002. ";
$pdf->SetFont('Arial', 'B', '12');
$pdf->write(5, $judul, '');
$judul = "Bukti transfer dapat dikirim melalui email diklit.rsj.jabarprov@gmail.com dan nomor WA Bendahara Penerimaan RSJ (081321412643)";
$pdf->SetFont('Arial', '', '12');
$pdf->write(5, $judul, '');
$pdf->Ln(8);


$judul = "DIREKTUR RS JIWA PROVINSI JAWA BARAT ";
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul, '0', 1, 'R');
$pdf->Ln(25);

$judul = "Hj. Elly Marliyani, dr., Sp.Kj, M.KM ";
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul, '0', 1, 'R');
$pdf->Ln(4);

$judul = "PEMBINA UTAMA MADYA";
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul, '0', 1, 'R');
$pdf->Ln(4);

$judul = "NIP. 196608141991022004";
$pdf->SetFont('Arial', '', '12');
$pdf->Cell(0, 0, $judul, '0', 1, 'R');
$pdf->Ln(4);
#output file PDF
ob_end_clean();
$pdf->Output();
