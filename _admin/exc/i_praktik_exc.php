<?php
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

// $id_institusi = $_POST['id_institusi'];
// $nama_praktik = $_POST['nama_praktik'];

$id_institusi = stripslashes(strip_tags(htmlspecialchars($_POST['id_institusi'], ENT_QUOTES)));
$nama_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['nama_praktik'], ENT_QUOTES)));
$jumlah_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['jumlah_praktik'], ENT_QUOTES)));
$id_jurusan_pdd = stripslashes(strip_tags(htmlspecialchars($_POST['id_jurusan_pdd'], ENT_QUOTES)));
$id_jenjang_pdd = stripslashes(strip_tags(htmlspecialchars($_POST['id_jenjang_pdd'], ENT_QUOTES)));
$id_spesifikasi_pdd = stripslashes(strip_tags(htmlspecialchars($_POST['id_spesifikasi_pdd'], ENT_QUOTES)));
$id_akreditasi = stripslashes(strip_tags(htmlspecialchars($_POST['id_akreditasi'], ENT_QUOTES)));
$tgl_mulai_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['tgl_mulai_praktik'], ENT_QUOTES)));
$tgl_selesai_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['tgl_selesai_praktik'], ENT_QUOTES)));
$surat_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['surat_praktik'], ENT_QUOTES)));
$data_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['data_praktik'], ENT_QUOTES)));
$nama_pembimbing_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['nama_pembimbing_praktik'], ENT_QUOTES)));
$email_mentor_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['email_mentor_praktik'], ENT_QUOTES)));
$telp_mentor_praktik = stripslashes(strip_tags(htmlspecialchars($_POST['telp_mentor_praktik'], ENT_QUOTES)));

$sql_insert = "INSERT INTO tb_praktik (
    id_institusi, 
    nama_praktik,
    jumlah_praktik,
    id_jurusan_pdd,
    id_jenjang_pdd,
    id_spesifikasi_pdd,
    id_akreditasi,
    tgl_mulai_praktik,
    tgl_selesai_praktik,
    surat_praktik,
    data_praktik,
    nama_pembimbing_praktik,
    email_mentor_praktik,
    telp_mentor_praktik,
    status_praktik
    ) VALUES (
        '" . $id_institusi . "', 
        '" . $nama_praktik . "',
        '" . $jumlah_praktik . "', 
        '" . $id_jenjang_pdd . "',
        '" . $id_spesifikasi_pdd . "', 
        '" . $id_akreditasi . "',
        '" . $tgl_mulai_praktik . "', 
        '" . $tgl_selesai_praktik . "',
        '" . $surat_praktik . "', 
        '" . $data_praktik . "',
        '" . $nama_pembimbing_praktik . "', 
        '" . $email_mentor_praktik . "',
        '" . $telp_mentor_praktik . "', 
        'Y'
        )";
// $conn->query($sql_insert);
echo $sql_insert . "<br>";
echo json_encode(['success' => 'Berhasil Disimpan']);
