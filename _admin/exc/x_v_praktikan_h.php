<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$sql = "UPDATE tb_praktikan SET ";
$sql .= " status_praktikan = 'T'";
$sql .= " WHERE id_praktikan=" . base64_decode(urldecode($_POST['idprkn']));

// echo "$sql<br>";
try {
    $conn->query($sql);
} catch (Exception $ex) {
    echo "<script>alert('$ex -UPDATE DATA PRAKTIKAN-');";
    echo "document.location.href='?error404';</script>";
}

echo json_encode(['success' => 'Data berhasil Dihapus']);
