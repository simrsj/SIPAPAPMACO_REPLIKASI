<?php

$id_ins = $_SESSION['id_institusi'];

//////////////////// DATA INSTITUSi ////////////////////
$sql_ins = " SELECT * FROM tb_institusi ";
$sql_ins .= " WHERE id_institusi = " . $id_ins;
$q_ins = $conn->query($sql_ins);

$d_ins = $q_ins->fetch(PDO::FETCH_ASSOC);
$dAr_ins['nama_institusi'] = $d_ins['nama_institusi'];
$dAr_ins['akronim_institusi'] = $d_ins['akronim_institusi'];
$dAr_ins['logo_institusi'] = $d_ins['logo_institusi'];
$dAr_ins['alamat_institusi'] = $d_ins['alamat_institusi'];
$dAr_ins['akred_institusi'] = $d_ins['akred_institusi'];
$dAr_ins['tglAkhirAkred_institusi'] = $d_ins['tglAkhirAkred_institusi'];
$dAr_ins['fileAkred_institusi'] = $d_ins['fileAkred_institusi'];
$dAr_ins['ket_institusi'] = $d_ins['ket_institusi'];

//////////////////// DATA INSTITUSi ////////////////////