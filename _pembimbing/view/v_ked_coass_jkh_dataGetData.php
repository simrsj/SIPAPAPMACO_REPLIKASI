<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
// error_reporting(0);
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

try {
    $sql = "SELECT * FROM tb_logbook_ked_coass_jkh";
    $sql .= " WHERE id = " . urldecode(decryptString($_POST['id'], $customkey));
    $q = $conn->query($sql);
    $d = $q->fetch(PDO::FETCH_ASSOC);
    echo json_encode([
        'sql' => $sql,
        // 'id' => encryptString($d["id"], $customkey),
        'tgl' => $d["tgl"],
        'kegiatan' => $d["kegiatan"],
        'topik' => $d["topik"],
        'ket' => 'SUCCESS'
    ]);
} catch (Exception $ex) {
    echo json_encode([
        'sql' => $sql,
        'ket' => 'ERROR'
    ]);
}
