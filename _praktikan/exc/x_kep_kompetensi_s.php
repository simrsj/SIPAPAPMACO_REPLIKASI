<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

$exp_arr_idu = explode("*sm*", base64_decode(urldecode(hex2bin($_POST['idu']))));
$idu = $exp_arr_idu[1];
$exp_arr_idprkn = explode("*sm*", base64_decode(urldecode(hex2bin($_POST['idprkn']))));
$idprkn = $exp_arr_idprkn[1];
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

try {
    $sql_insert = "INSERT INTO tb_logbook_kep_kompetensi ( ";
    $sql_insert .= " id_user, ";
    $sql_insert .= " id_praktikan, ";
    $sql_insert .= " tgl_input, ";
    $sql_insert .= " jam_input, ";
    $sql_insert .= " nama, ";
    $sql_insert .= " tgl_pel ";
    $sql_insert .= " ) VALUES (";
    $sql_insert .= " '" . $idu . "', ";
    $sql_insert .= " '" . $idprkn . "', ";
    $sql_insert .= " '" . date('Y-m-d', time()) . "', ";
    $sql_insert .= " '" . date("h:i:s") . "', ";
    $sql_insert .= " '" . $_POST['kompetensi'] . "', ";
    $sql_insert .= " '" . $_POST['tgl_pel'] . "' ";
    $sql_insert .= " )";
    // echo $sql_insert . "<br>";
    $conn->query($sql_insert);
    $dataJSON['ket'] = "Y";
} catch (PDOException $e) {
    echo "<script>alert('DATA INSERT KEP KOMPETENSI-');";
    echo "document.location.href='?error404';</script>";
    $dataJSON['ket'] = "T";
}
echo json_encode($dataJSON);
