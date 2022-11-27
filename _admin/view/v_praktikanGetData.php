<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "SELECT * FROM tb_praktikan";
$sql .= " WHERE id_praktikan= " . base64_decode(urldecode($_POST['idprkn']));
// echo "$sql <br>";
try {
    $q = $conn->query($sql);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRAKTIKAN-');";
    echo "document.location.href='?error404';</script>";
}
$d = $q->fetch(PDO::FETCH_ASSOC);
$h['idprkn'] = $d["id_praktikan"];
$h['u_no_id'] = $d["no_id_praktikan"];
$h['u_nama'] = $d["nama_praktikan"];
$h['u_tgl'] = $d["tgl_lahir_praktikan"];
$h['u_telp'] = $d["telp_praktikan"];
$h['u_wa'] = $d["wa_praktikan"];
$h['u_email'] = $d["email_praktikan"];
$h['u_alamat'] = $d["alamat_praktikan"];

echo json_encode($h);

// echo "<pre>";
// print_r($h);
// echo "</pre>";
