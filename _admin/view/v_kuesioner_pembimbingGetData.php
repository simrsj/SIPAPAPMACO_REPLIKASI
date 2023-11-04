<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";
error_reporting();

try {
    $sql = "SELECT * FROM tb_kuesioner_pembimbing_pertanyaan";
    $sql .= " WHERE id= " . decryptString($_POST['id'], $customkey);
    $q = $conn->query($sql);
    $d = $q->fetch(PDO::FETCH_ASSOC);

    echo json_encode([
        // 'sql' => $sql,
        'id' => encryptString($d["id"], $customkey),
        'pertanyaan' => $d["pertanyaan"],
        'keterangan' => $d["ket"],
        'ket' => 'success'
    ]);
} catch (Exception $ex) {
    echo json_encode([
        // 'sql' => $sql,
        'ket' => 'error'
    ]);
}

// echo "<pre>";
// print_r($h);
// echo "</pre>";
