<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
echo "<pre>";
print_r($_POST);
echo "</pre>";
error_reporting(0);
$idpr = decryptString($_POST['idpr'], $customkey);
//cek data from modal tambah bila tidak diiisi

try {
    $sql_update = "UPDATE tb_logbook_ked_coass_p3d SET ";
    $sql_update .= " id_praktik = '" . date('Y-m-d G:i:s') . "', ";
    $sql_update .= " tgl_ubah = '" . date('Y-m-d G:i:s') . "', ";
    $sql_update .= " tgl_ubah = '" . date('Y-m-d G:i:s') . "', ";
    $sql_update .= " bst = '" . $_POST['bst'] . "', ";
    $sql_update .= " crs = '" . $_POST['crs'] . "', ";
    $sql_update .= " css = '" . $_POST['css'] . "', ";
    $sql_update .= " minicex = '" . $_POST['minicex'] . "', ";
    $sql_update .= " rps = '" . $_POST['rps'] . "', ";
    $sql_update .= " osler = '" . $_POST['osler'] . "', ";
    $sql_update .= " dops = '" . $_POST['dops'] . "'";
    $sql_update .= " WHERE id_praktikan = '" . $idpr . "'";
    echo json_encode([
        'sql' => "'.$sql_update.'",
        'ket' => 'SUCCESS'
    ]);
    // $conn->query($sql_update);
} catch (PDOException $e) {
    echo json_encode([
        'sql' => "'.$sql_update.'",
        'ket' => 'ERROR'
    ]);
}
