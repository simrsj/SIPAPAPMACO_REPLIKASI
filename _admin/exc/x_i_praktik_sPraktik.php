<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

echo "<pre>";
print_r($_POST);
echo "</pre>";

// --------------------------------------SIMPAN DATA PRAKTIK--------------------------------------------

//mencari jenis jurusan
$sql_jenis_jurusan = "SELECT * FROM tb_jurusan_pdd 
WHERE id_jurusan_pdd = " . $_POST['id_jurusan_pdd'];

$q_jenis_jurusan = $conn->query($sql_jenis_jurusan);
$d_jenis_jurusan = $q_jenis_jurusan->fetch(PDO::FETCH_ASSOC);

$sql_insert = "INSERT INTO tb_praktik (
    id_user,
    id_praktik, 
    id_institusi, 
    nama_praktik,
    tgl_input_praktik,
    tgl_mulai_praktik,
    tgl_selesai_praktik,
    no_surat_praktik,
    jumlah_praktik,
    id_jurusan_pdd_jenis,
    id_jurusan_pdd,
    id_jenjang_pdd,
    id_profesi_pdd,
    nama_koordinator_praktik,
    email_koordinator_praktik,
    telp_koordinator_praktik,
    status_cek_praktik, 
    status_praktik
    ) VALUES (
        '" . $_POST['user'] . "',
        '" . $_POST['id'] . "', 
        '" . $_POST['institusi'] . "', 
        '" . $_POST['nama_praktik'] . "',
        '" . date('Y-m-d') . "', 
        '" . $_POST['tgl_mulai_praktik'] . "', 
        '" . $_POST['tgl_selesai_praktik'] . "',
        '" . $_POST['no_surat'] . "',
        '" . $_POST['jumlah_praktik'] . "', 
        '" . $d_jenis_jurusan['id_jurusan_pdd_jenis'] . "', 
        '" . $_POST['jurusan'] . "',
        '" . $_POST['jenjang'] . "',
        '" . $_POST['profesi'] . "', 
        '" . $_POST['nama_koordinator_praktik'] . "', 
        '" . $_POST['email_koordinator_praktik'] . "',
        '" . $_POST['telp_koordinator_praktik'] . "', 
        '" . $status_cek_praktik . "', 
        'Y'
        )";

// echo $sql_insert . "<br>";
$conn->query($sql_insert);
// --------------------------------------SIMPAN GENERATE TANGGAL--------------------------------------------

$d1 = $_POST['tgl_mulai_praktik'];
$d2 = $_POST['tgl_selesai_praktik'];
$d2 = date('Y-m-d', strtotime($d2 . "+1 days"));

$period = new DatePeriod(
    new DateTime($d1),
    new DateInterval('P1D'),
    new DateTime($d2)
);

$no = 1;
foreach ($period as $key => $value) {
    $sql = "INSERT INTO tb_praktik_tgl (
        id_praktik, 
        praktik_tgl
    ) VALUES (
        '" . $_POST['id'] . "', 
        '" . $value->format('Y-m-d') . "'
    )";
    // echo " $sql<br>";
    $conn->query($sql);
    $no++;
}
