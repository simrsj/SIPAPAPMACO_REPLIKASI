<?PHP
include "./_add-ons/koneksi.php";
include "./_add-ons/tanggal.php";
$sql_praktik = "SELECT * FROM tb_praktik 
JOIN tb_institusi ON tb_institusi.id_institusi = tb_praktik.id_institusi 
ORDER BY nama_institusi ASC";
$q_praktik = $conn->query($sql_praktik);

$data = array();
$no = 1;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    array_push(
        $data,
        array(
            $no,
            $d_praktik['nama_institusi'],
            $d_praktik['nama_praktik'],
            tanggal($d_praktik['tgl_mulai_praktik']),
            tanggal($d_praktik['tgl_selesai_praktik']),
            $d_praktik['jumlah_praktik']
        )
    );
    $no++;
}

#setting judul laporan
$judul = "LAPORAN DATA PRAKTIKAN";

#header tabel
$header = array(
    array("label" => "No", "length" => 10, "align" => "C"),
    array("label" => "Nama Institusi", "length" => 100, "align" => "C"),
    array("label" => "Gelombang/Kelompok", "length" => 60, "align" => "C"),
    array("label" => "Tgl Mulai", "length" => 30, "align" => "C"),
    array("label" => "Tgl Selesai", "length" => 30, "align" => "C"),
    array("label" => "Jumlah Praktik", "length" => 30, "align" => "C")
);

#header tabel
$body = array(
    array("align" => "C"),
    array("align" => "L"),
    array("align" => "L"),
    array("align" => "C"),
    array("align" => "C"),
    array("align" => "C")
);

#sertakan library FPDF dan bentuk objek
require_once("./vendor/fpdf/fpdf.php");
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

#tampilkan judul laporan
$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 20, $judul, '0', 1, 'C');

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
$pdf->Output();
