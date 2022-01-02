<?php
//////////////////// DATA PRAKTIK SEMUA ////////////////////
$sql_dps = "SELECT * FROM tb_praktik";
$q_dps = $conn->query($sql_dps);
$data_dps = $r_dps = $q_dps->rowCount();

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
$data_dpp = $r_dpp = $q_dpp->rowCount();

//////////////////// DATA PRAKTIKAN AKTIF ////////////////////
$sql_dpa = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'AKTIF'";
$q_dpa = $conn->query($sql_dpa);
$data_dpa = $r_dpa = $q_dpa->rowCount();

//////////////////// DATA PRAKTIKAN NON-AKTIF ////////////////////
$sql_dpn = "SELECT * FROM tb_praktik
WHERE status_praktik = 'T'";
$q_dpn = $conn->query($sql_dpn);
$data_dpn = $r_dpn = $q_dpn->rowCount();

//////////////////// DATA PRAKTIKAN JUMLAH ////////////////////
$sql_dpj = "SELECT * FROM tb_praktik";
$q_dpj = $conn->query($sql_dpj);

$jumlah_praktik_total = 0;
while ($d_dpj = $q_dpj->fetch(PDO::FETCH_ASSOC)) {
    $jumlah_praktik_total = $jumlah_praktik_total + $d_dpj['jumlah_praktik'];
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
    $jumlah_praktik_proses = $jumlah_praktik_proses + $d_dpjp['jumlah_praktik'];
}
//////////////////// DATA PRAKTIKAN JUMLAH AKTIF ////////////////////
$sql_dpja = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'AKTIF' 
AND status_praktik='Y'";
$q_dpja = $conn->query($sql_dpja);

$jumlah_praktik_aktif = 0;
while ($d_dpja = $q_dpja->fetch(PDO::FETCH_ASSOC)) {
    $jumlah_praktik_aktif = $jumlah_praktik_aktif + $d_dpja['jumlah_praktik'];
}
//////////////////// DATA PRAKTIKAN JUMLAH SELESAI ////////////////////
$sql_dpjs = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'SELESAI'";
$q_dpjs = $conn->query($sql_dpjs);

$jumlah_praktik_selesai = 0;
while ($d_dpjs = $q_dpjs->fetch(PDO::FETCH_ASSOC)) {
    $jumlah_praktik_selesai = $jumlah_praktik_selesai + $d_dpjs['jumlah_praktik'];
}
//////////////////// PENDAPATAN SEMUA ////////////////////

$total_harga = 0;
$total_harga_pilih = 0;
$total_mess = 0;
#data harga pilih
$sql_praktik = "SELECT * FROM tb_harga_pilih
            JOIN tb_praktik ON tb_harga_pilih.id_praktik = tb_praktik.id_praktik
            WHERE status_cek_praktik = ('AKTIF'||'SELESAI')";
$q_praktik = $conn->query($sql_praktik);

$total_harga = 0;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    $total_harga = $total_harga + $d_praktik['jumlah_harga_pilih'];
    $total_harga_pilih = $total_harga_pilih + $d_praktik['jumlah_harga_pilih'];
}

#data mess pilih
$sql_mess = "SELECT * FROM tb_mess_pilih
            JOIN tb_praktik ON tb_mess_pilih.id_praktik = tb_praktik.id_praktik
            WHERE status_cek_praktik = ('AKTIF'||'SELESAI')";
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
            WHERE status_cek_praktik = ('AKTIF'||'SELESAI')";
$q_praktik = $conn->query($sql_praktik);

$total_harga = 0;
while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
    $total_harga = $total_harga + $d_praktik['jumlah_harga_pilih'];
    $total_harga_pilih = $total_harga_pilih + $d_praktik['jumlah_harga_pilih'];
}

#data mess pilih
$sql_mess = "SELECT * FROM tb_mess_pilih
            JOIN tb_praktik ON tb_mess_pilih.id_praktik = tb_praktik.id_praktik
            WHERE status_cek_praktik = ('AKTIF'||'SELESAI')";
$q_mess = $conn->query($sql_mess);

while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
    $total_harga = $total_harga + $d_mess['total_harga_mess_pilih'];
    $total_mess = $total_mess + $d_mess['total_harga_mess_pilih'];
}
