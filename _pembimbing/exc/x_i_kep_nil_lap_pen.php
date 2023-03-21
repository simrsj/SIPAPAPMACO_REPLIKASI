<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$exp_arr_idprkn = explode("*sm*", base64_decode(urldecode(hex2bin($_POST['idprkn']))));
$idprkn = $exp_arr_idprkn[1];

try {
    $sql_insert = "INSERT INTO tb_kep_nil_lap_pen ( ";
    $sql_insert .= " tgl_input, ";
    $sql_insert .= " id_praktikan, ";
    $sql_insert .= " A1, ";
    $sql_insert .= " A2, ";
    $sql_insert .= " A3, ";
    $sql_insert .= " A4, ";
    $sql_insert .= " B1, ";
    $sql_insert .= " B2, ";
    $sql_insert .= " B3, ";
    $sql_insert .= " B4, ";
    $sql_insert .= " B5, ";
    $sql_insert .= " B6, ";
    $sql_insert .= " C1, ";
    $sql_insert .= " C2, ";
    $sql_insert .= " C3 ";
    $sql_insert .= " ) VALUES (";
    $sql_insert .= " '" . date('Y-m-d') . "', ";
    $sql_insert .= " '" . $idprkn . "', ";
    $sql_insert .= " '" . $_POST['A1'] . "', ";
    $sql_insert .= " '" . $_POST['A2'] . "', ";
    $sql_insert .= " '" . $_POST['A3'] . "', ";
    $sql_insert .= " '" . $_POST['A4'] . "', ";
    $sql_insert .= " '" . $_POST['B1'] . "', ";
    $sql_insert .= " '" . $_POST['B2'] . "', ";
    $sql_insert .= " '" . $_POST['B3'] . "', ";
    $sql_insert .= " '" . $_POST['B4'] . "', ";
    $sql_insert .= " '" . $_POST['B5'] . "', ";
    $sql_insert .= " '" . $_POST['B6'] . "', ";
    $sql_insert .= " '" . $_POST['C1'] . "', ";
    $sql_insert .= " '" . $_POST['C2'] . "', ";
    $sql_insert .= " '" . $_POST['C3'] . "' ";
    $sql_insert .= " )";
    // echo $sql_insert . "<br>";
    $conn->query($sql_insert);
    echo "<script>document.location.href='?kep_penilaian#rincian" . $_POST['idp'] . "';</script>";
    $_SESSION['ket_nilai'] = "TAMBAH";
    // $dataJSON['ket'] = "Y";
} catch (PDOException $e) {
    echo "<script>alert('DATA INSERT KEP KOMPETENSI-');";
    echo "document.location.href='?error404';</script>";
    // $dataJSON['ket'] = "T";
}
// echo json_encode($dataJSON);
