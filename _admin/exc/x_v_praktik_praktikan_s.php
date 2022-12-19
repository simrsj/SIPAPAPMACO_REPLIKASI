<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$id_praktik = base64_decode(urldecode($_POST['idp']));
$sql_praktik = "SELECT * FROM tb_praktik";
$sql_praktik .= " WHERE tb_praktik.id_praktik = " . $id_praktik;
echo $sql_praktik . "<br>";
try {
    $q_praktik = $conn->query($sql_praktik);
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    $r_praktik = $q_praktik->rowCount();
} catch (Exception $ex) {
    echo "<script>alert('$ex -SIMPAN PRAKTIKAN-');";
    echo "document.location.href='?error404';</script>";
}
$sql_praktikan = "SELECT * FROM tb_praktikan";
$sql_praktikan .= " WHERE tb_praktikan.id_praktik = " . $id_praktik;
echo $sql_praktikan . "<br>";
try {
    $d_praktikan = $conn->query($sql_praktikan);
    $d_praktikan = $d_praktikan->fetch(PDO::FETCH_ASSOC);
    $r_praktikan = $d_praktikan->rowCount();
} catch (Exception $ex) {
    echo "<script>alert('$ex -SIMPAN PRAKTIKAN-');";
    echo "document.location.href='?error404';</script>";
}
echo $r_praktik . "asd" . $d_praktik['jumlah_praktik'];
if ($r_praktikan < $d_praktik['jumlah_praktik']) {

    $sql = "INSERT INTO tb_praktikan (";
    $sql .= " id_praktik,";
    $sql .= " tgl_tambah_praktikan,";
    $sql .= " no_id_praktikan,";
    $sql .= " nama_praktikan, ";
    $sql .= " tgl_lahir_praktikan, ";
    $sql .= " telp_praktikan,";
    $sql .= " wa_praktikan,";
    $sql .= " email_praktikan,";
    $sql .= " alamat_praktikan";
    $sql .= " ) VALUES (";
    $sql .= " '" . $id_praktik . "', ";
    $sql .= " '" . date("Y-m-d") . "', ";
    $sql .= " '" . $_POST['t_no_id'] . "', ";
    $sql .= " '" . $_POST['t_nama'] . "',";
    $sql .= " '" . $_POST['t_tgl'] . "', ";
    $sql .= " '" . $_POST['t_telpon'] . "',";
    $sql .= " '" . $_POST['t_wa'] . "',";
    $sql .= " '" . $_POST['t_email'] . "',";
    $sql .= " '" . $_POST['t_alamat'] . "'";
    $sql .= " )";
    // echo $sql . "<br>";
    try {
        // $conn->query($sql);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -SIMPAN PRAKTIKAN-');";
        echo "document.location.href='?error404';</script>";
    }
    echo json_encode(['ket' => 'Y']);
} else {
    echo json_encode(['ket' => 'T']);
}
