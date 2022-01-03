<?php


$sql_u_praktik = "UPDATE `tb_praktik` SET status_cek_praktik = 'SELESAI' WHERE id_praktik = '" . 3 . "'";
$sql_s_praktik = "SELECT * FROM tb_praktik
    JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik
    JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess
    WHERE tb_praktik.id_praktik = '" . 3 . "'";

$q = $conn->query($sql_s_praktik);
$d = $q->fetch(PDO::FETCH_ASSOC);
echo $d['kapasitas_terisi_mess'] . "-" . $d['jumlah_praktik'];
$selisih = $d['kapasitas_terisi_mess'] - $d['jumlah_praktik'];
$sql_u_mess = "UPDATE `tb_mess` SET kapasitas_terisi_mess = '" . $selisih . "' WHERE id_praktik = '" . 3 . "'";
echo $sql_u_praktik . "<br>";
echo $sql_u_mess . "<br>";
