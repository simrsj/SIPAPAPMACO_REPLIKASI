<?php

//////////////////// DATA MOU TOTAL ////////////////////
$sql_dmt = "SELECT * FROM tb_mou ";
$q_dmt = $conn->query($sql_dmt);
$dashboard_dmt = $q_dmt->rowCount();

//////////////////// DATA MOU BERAKHIR ////////////////////
$sql_dmb = "SELECT * FROM tb_mou 
WHERE tgl_selesai_mou > CURDATE()";
$q_dmb = $conn->query($sql_dmb);
$dashboard_dmb = $q_dmb->rowCount();

//////////////////// DATA MOU AKTIF ////////////////////
$sql_dma = "SELECT * FROM tb_mou 
WHERE tgl_selesai_mou <= CURDATE()";
$q_dma = $conn->query($sql_dma);
$dashboard_dma = $q_dma->rowCount();

//////////////////// DATA MOU BELUM PENGAJUAN ////////////////////
$sql_dmbp = "SELECT * FROM tb_mou 
WHERE status_mou = 'belum pengajuan'";
$q_dmbp = $conn->query($sql_dmbp);
$dashboard_dmbp = $q_dmbp->rowCount();

//////////////////// DATA MOU PENGAJUAN BARU ////////////////////
$sql_dmpb = "SELECT * FROM tb_mou 
WHERE status_mou = 'proses pengajuan baru'";
$q_dmpb = $conn->query($sql_dmpb);
$dashboard_dmpb = $q_dmpb->rowCount();

//////////////////// DATA MOU PENGAJUAN LAMA ////////////////////
$sql_dmpl = "SELECT * FROM tb_mou 
WHERE status_mou = 'proses pengajuan perpanjang'";
$q_dmpl = $conn->query($sql_dmpl);
$dashboard_dmpl = $q_dmpl->rowCount();

//////////////////// DATA PRAKTIK SEMUA ////////////////////
$sql_dps = "SELECT * FROM tb_praktik";
$q_dps = $conn->query($sql_dps);
$dashboard_dps = $q_dps->rowCount();

//////////////////// DATA PRAKTIKAN PROSES ////////////////////
$sql_dpp = "SELECT * FROM tb_praktik
WHERE 
(
status_cek_praktik = 'DAFTAR' 
OR status_cek_praktik = 'HARGA'
OR status_cek_praktik = 'MESS'
OR status_cek_praktik = 'PEMBAYARAN'
OR status_cek_praktik = 'DITOLAK'
)
AND status_praktik='Y'";
$q_dpp = $conn->query($sql_dpp);
$dashboard_dpp = $q_dpp->rowCount();

//////////////////// DATA PRAKTIKAN AKTIF ////////////////////
$sql_dpa = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'AKTIF'";
$q_dpa = $conn->query($sql_dpa);
$dashboard_dpa = $q_dpa->rowCount();

//////////////////// DATA PRAKTIKAN NON-AKTIF ////////////////////
$sql_dpn = "SELECT * FROM tb_praktik
WHERE status_praktik = 'T'";
$q_dpn = $conn->query($sql_dpn);
$dashboard_dpn = $q_dpn->rowCount();

//////////////////// DATA PRAKTIKAN JUMLAH ////////////////////
$sql_dpj = "SELECT * FROM tb_praktik";
$q_dpj = $conn->query($sql_dpj);

$jumlah_praktik_total = 0;
while ($d_dpj = $q_dpj->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpj = $jumlah_praktik_total + $d_dpj['jumlah_praktik'];
}

//////////////////// DATA PRAKTIKAN JUMLAH PROSES ////////////////////
$sql_dpjp = "SELECT * FROM tb_praktik
WHERE 
(
status_cek_praktik = 'DAFTAR' 
OR status_cek_praktik = 'HARGA'
OR status_cek_praktik = 'MESS'
OR status_cek_praktik = 'PEMBAYARAN'
OR status_cek_praktik = 'DITOLAK'
)
AND status_praktik='Y'";
$q_dpjp = $conn->query($sql_dpjp);

$jumlah_praktik_proses = 0;
while ($d_dpjp = $q_dpjp->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpjp = $jumlah_praktik_proses + $d_dpjp['jumlah_praktik'];
}

//////////////////// DATA PRAKTIKAN JUMLAH AKTIF ////////////////////
$sql_dpja = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'AKTIF' 
AND status_praktik='Y'";
$q_dpja = $conn->query($sql_dpja);

$jumlah_praktik_aktif = 0;
while ($d_dpja = $q_dpja->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpja = $jumlah_praktik_aktif + $d_dpja['jumlah_praktik'];
}

//////////////////// DATA PRAKTIKAN JUMLAH SELESAI ////////////////////
$sql_dpjs = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'SELESAI'";
$q_dpjs = $conn->query($sql_dpjs);

$jumlah_praktik_selesai = 0;
while ($d_dpjs = $q_dpjs->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpjs = $jumlah_praktik_selesai + $d_dpjs['jumlah_praktik'];
}

//////////////////// PENDAPATAN SEMUA ////////////////////

$total_harga = 0;
$total_harga_pilih = 0;
$total_mess = 0;
#data harga pilih
$sql_praktik = "SELECT * FROM tb_harga_pilih
            JOIN tb_praktik ON tb_harga_pilih.id_praktik = tb_praktik.id_praktik
            WHERE status_cek_praktik = ('AKTIF' OR 'SELESAI')";
$q_praktik = $conn->query($sql_praktik);

$total_harga = 0;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    $total_harga = $total_harga + $d_praktik['jumlah_harga_pilih'];
    $total_harga_pilih = $total_harga_pilih + $d_praktik['jumlah_harga_pilih'];
}

#data mess pilih
$sql_mess = "SELECT * FROM tb_mess_pilih
            JOIN tb_praktik ON tb_mess_pilih.id_praktik = tb_praktik.id_praktik
            WHERE status_cek_praktik = ('AKTIF' OR 'SELESAI')";
$q_mess = $conn->query($sql_mess);

while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
    $total_harga = $total_harga + $d_mess['total_harga_mess_pilih'];
    $total_mess = $total_mess + $d_mess['total_harga_mess_pilih'];
}

//////////////////// PENDAPATAN BULANAN ////////////////////
$total_harga = 0;
$total_harga_pilih = 0;
$total_mess = 0;
#data harga pilih
$sql_praktik = "SELECT * FROM tb_harga_pilih
            JOIN tb_praktik ON tb_harga_pilih.id_praktik = tb_praktik.id_praktik
            WHERE status_cek_praktik = ('AKTIF' OR 'SELESAI')";
$q_praktik = $conn->query($sql_praktik);

$total_harga = 0;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    $total_harga = $total_harga + $d_praktik['jumlah_harga_pilih'];
    $total_harga_pilih = $total_harga_pilih + $d_praktik['jumlah_harga_pilih'];
}

#data mess pilih
$sql_mess = "SELECT * FROM tb_mess_pilih
            JOIN tb_praktik ON tb_mess_pilih.id_praktik = tb_praktik.id_praktik
            WHERE status_cek_praktik = ('AKTIF' OR 'SELESAI')";
$q_mess = $conn->query($sql_mess);

while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
    $total_harga = $total_harga + $d_mess['total_harga_mess_pilih'];
    $total_mess = $total_mess + $d_mess['total_harga_mess_pilih'];
}