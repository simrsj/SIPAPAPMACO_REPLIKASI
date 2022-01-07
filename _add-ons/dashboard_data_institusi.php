<?php

//////////////////// DATA MOU TOTAL ////////////////////
$sql_dmt = "SELECT * FROM tb_mou WHERE id_institusi = " . $_SESSION['id_institusi'];
// echo $sql_dmt . "<br>";
$q_dmt = $conn->query($sql_dmt);
$dashboard_dmt = $q_dmt->rowCount();

//////////////////// DATA MOU BERAKHIR ////////////////////
$sql_dmb = "SELECT * FROM tb_mou 
WHERE tgl_selesai_mou > CURDATE() AND id_institusi = " . $_SESSION['id_institusi'];
$q_dmb = $conn->query($sql_dmb);
$dashboard_dmb = $q_dmb->rowCount();

//////////////////// DATA MOU AKTIF ////////////////////
$sql_dma = "SELECT * FROM tb_mou    
WHERE tgl_selesai_mou <= CURDATE()
AND status_mou = 'aktif'
AND id_institusi = " . $_SESSION['id_institusi'];
// echo $sql_dma . "<br>";
$q_dma = $conn->query($sql_dma);
$dashboard_dma = $q_dma->rowCount();

//////////////////// DATA PRAKTIK SEMUA ////////////////////
$sql_dps = "SELECT * FROM tb_praktik WHERE id_institusi = " . $_SESSION['id_institusi'];
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
AND status_praktik='Y'
AND id_institusi = " . $_SESSION['id_institusi'];
$q_dpp = $conn->query($sql_dpp);
$dashboard_dpp = $q_dpp->rowCount();

//////////////////// DATA PRAKTIKAN AKTIF ////////////////////
$sql_dpa = "SELECT * FROM tb_praktik 
WHERE status_cek_praktik = 'AKTIF'
AND id_institusi = " . $_SESSION['id_institusi'];
$q_dpa = $conn->query($sql_dpa);
$dashboard_dpa = $q_dpa->rowCount();

//////////////////// DATA PRAKTIKAN NON-AKTIF ////////////////////
$sql_dpn = "SELECT * FROM tb_praktik
WHERE status_praktik = 'T'
AND id_institusi = " . $_SESSION['id_institusi'];
$q_dpn = $conn->query($sql_dpn);
$dashboard_dpn = $q_dpn->rowCount();
//////////////////// DATA PRAKTIKAN JUMLAH ////////////////////
$sql_dpj = "SELECT * FROM tb_praktik WHERE id_institusi = " . $_SESSION['id_institusi'];
$q_dpj = $conn->query($sql_dpj);

$dashboard_dpj = 0;
while ($d_dpj = $q_dpj->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpj = $dashboard_dpj + $d_dpj['jumlah_praktik'];
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

$dashboard_dpjp = 0;
while ($d_dpjp = $q_dpjp->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpjp = $dashboard_dpjp + $d_dpjp['jumlah_praktik'];
}
//////////////////// DATA PRAKTIKAN JUMLAH AKTIF ////////////////////
$sql_dpja = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'AKTIF' 
AND status_praktik='Y'";
$q_dpja = $conn->query($sql_dpja);

$dashboard_dpja = 0;
while ($d_dpja = $q_dpja->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpja = $dashboard_dpja + $d_dpja['jumlah_praktik'];
}
//////////////////// DATA PRAKTIKAN JUMLAH SELESAI ////////////////////
$sql_dpjs = "SELECT * FROM tb_praktik
WHERE status_cek_praktik = 'SELESAI'";
$q_dpjs = $conn->query($sql_dpjs);

$dashboard_dpjs = 0;
while ($d_dpjs = $q_dpjs->fetch(PDO::FETCH_ASSOC)) {
    $dashboard_dpjs = $dashboard_dpjs + $d_dpjs['jumlah_praktik'];
}
