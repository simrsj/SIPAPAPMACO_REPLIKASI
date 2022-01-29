<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

$sql_insert = "INSERT INTO tb_praktik (
    id_praktik, 
    id_institusi, 
    nama_praktik,
    jumlah_praktik,
    id_jurusan_pdd,
    id_jenjang_pdd,
    id_spesifikasi_pdd,
    id_akreditasi,
    tgl_mulai_praktik,
    tgl_selesai_praktik,
    id_user,
    nama_pembimbing_praktik,
    email_mentor_praktik,
    telp_mentor_praktik,
    status_cek_praktik, 
    status_praktik
    ) VALUES (
        '" . $_POST['id_praktik'] . "', 
        '" . $_POST['id_institusi'] . "', 
        '" . $_POST['nama_praktik'] . "',
        '" . $_POST['jumlah_praktik'] . "', 
        '" . $_POST['id_jenjang_pdd'] . "',
        '" . $_POST['id_spesifikasi_pdd'] . "', 
        '" . $_POST['id_akreditasi'] . "',
        '" . $_POST['tgl_mulai_praktik'] . "', 
        '" . $_POST['tgl_selesai_praktik'] . "',
        '" . $_SESSION['id_user'] . "', 
        '" . $_POST['nama_pembimbing_praktik'] . "', 
        '" . $_POST['email_mentor_praktik'] . "',
        '" . $_POST['telp_mentor_praktik'] . "', 
        'DATA PRAKTIK', 
        'Y'
        )";
$conn->query($sql_insert);
// echo $sql_insert . "<br>";
echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
