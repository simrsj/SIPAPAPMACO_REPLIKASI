<?php
$r_harga_pilih = $conn->query("SELECT *FROM tb_harga_pilih WHERE id_praktik = 7")->rowCount();
$r_mess_pilih = $conn->query("SELECT *FROM tb_mess_pilih WHERE id_praktik = 7")->rowCount();
$r_bayar = $conn->query("SELECT *FROM tb_bayar WHERE id_praktik = 7")->rowCount();

echo $r_harga_pilih . "-" . $r_mess_pilih . "-" . $r_bayar;
