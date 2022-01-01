<?PHP

echo "About to create pdf";
include_once "koneksi.php";
include_once "tanggal.php";

$id_praktik = $_GET['id'];
echo $id_praktik . "<br>";

#data harga pilih
$sql_praktik = "SELECT * FROM tb_harga_pilih
JOIN tb_praktik ON tb_harga_pilih.id_praktik = tb_praktik.id_praktik
JOIN tb_harga ON tb_harga_pilih.id_harga = tb_harga.id_harga
JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'
ORDER BY nama_harga ASC";
$q_praktik = $conn->query($sql_praktik);

$data = array();
$no = 1;
$total_harga = 0;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data,
        array(
            $no,
            $d_praktik['nama_harga'],
            $d_praktik['nama_harga_satuan'],
            "Rp " . number_format($d_praktik['jumlah_harga'], 0, ",", "."),
            $d_praktik['frekuensi_harga_pilih'],
            $d_praktik['kuantitas_harga_pilih'],
            "Rp " . number_format($d_praktik['jumlah_harga_pilih'], 0, ",", ".")
        )
    );
    $total_harga = $total_harga + $d_praktik['jumlah_harga_pilih'];
    $no++;
}
#data mess pilih
$sql_mess = "SELECT * FROM tb_praktik 
JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik 
JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess 
WHERE tb_praktik.id_praktik = '" . $id_praktik . "'";
$q_mess = $conn->query($sql_mess);

while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data,
        array(
            $no,
            $d_mess['nama_mess'] . " (Mess)",
            "Hari/Orang",
            "Rp " . number_format(
                $d_mess['total_harga_mess_pilih'] / ($d_mess['jumlah_praktik'] * $d_mess['jumlah_hari_mess_pilih']),
                0,
                ",",
                "."
            ),
            $d_mess['jumlah_praktik'],
            $d_mess['jumlah_hari_mess_pilih'],
            "Rp " . number_format($d_mess['total_harga_mess_pilih'], 0, ",", ".")
        )
    );
    $total_harga = $total_harga + $d_mess['total_harga_mess_pilih'];
    $no++;
}


#header tabel
$header = array(
    array("label" => "No", "length" => 10, "align" => "C"),
    array("label" => "Nama Harga", "length" => 100, "align" => "C"),
    array("label" => "Satuan", "length" => 40, "align" => "C"),
    array("label" => "Harga", "length" => 40, "align" => "C"),
    array("label" => "Frek.", "length" => 15, "align" => "C"),
    array("label" => "Ktt.", "length" => 15, "align" => "C"),
    array("label" => "Total Harga", "length" => 55, "align" => "C")
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
$pdf->Line(10, 45, 210 - 10, 45); // 50mm from each edge

$pdf->Ln(8);

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

#output file PDF
ob_end_clean();
$pdf->Output();
