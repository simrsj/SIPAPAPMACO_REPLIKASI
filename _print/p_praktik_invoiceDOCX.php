<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

# ------------------------------------------------------------------------------------------------------------------------------------- INITIAL VARIABLE
$id_praktik = base64_decode(urldecode($_GET['idp']));
# ------------------------------------------------------------------------------------------------------------------------------------- EXC. DATABASE
$sql_praktik = "SELECT * FROM tb_praktik";
$sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
$sql_praktik .= " WHERE id_praktik = " . $id_praktik;
echo $sql_praktik;
try {
    $q_praktik = $conn->query($sql_praktik);
} catch (Exception $ex) {
    echo "<script> alert('$ex -DATA praktik-'); ";
    echo "document.location.href='?error404'; </script>";
}
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

# ------------------------------------------------------------------------------------------------------------------------------------- VARIABLE

$tanggal = tanggal(date('Y-m-d'));
// $nosuratrsj = $_GET['ns'];
// $kepada =  $_GET['k'];


$document = file_get_contents("p_praktik_invoiceDOCX.rtf");

$document = str_replace("replace.tanggal", $tanggal, $document);
# ------------------------------------------------------------------------------------------------------------------------------------- OUTPUT
header("Content-type: application/msword");
header("Content-disposition: inline; filename=invoice.doc");
header("Content-length: " . strlen($document));
echo $document;
