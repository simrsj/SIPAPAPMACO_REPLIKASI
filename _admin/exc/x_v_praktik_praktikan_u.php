<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$sql = "UPDATE tb_praktikan SET";
$sql .= " no_id_praktikan = '" . $_POST['u_no_id'] . "',";
$sql .= " nama_praktikan = '" . $_POST['u_nama'] . "',";
$sql .= " tgl_lahir_praktikan = '" . $_POST['u_tgl'] . "', ";
$sql .= " telp_praktikan = '" . $_POST['u_telp'] . "',";
$sql .= " wa_praktikan = '" . $_POST['u_wa'] . "',";
$sql .= " email_praktikan = '" . $_POST['u_email'] . "',";
$sql .= " alamat_praktikan = '" . $_POST['u_alamat'] . "'";
$sql .= " WHERE id_praktikan = " . base64_decode(urldecode($_POST['idprkn']));

// echo $sql . "<br>";
try {
    $conn->query($sql);
} catch (Exception $ex) {
    echo "<script>alert('$ex -UPDATE DATA PRAKTIKAN-');";
    echo "document.location.href='?error404';</script>";
}

echo json_encode(['success' => 'Data berhasil Diubah']);
