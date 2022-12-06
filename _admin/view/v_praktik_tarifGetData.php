<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql = "SELECT * FROM tb_tarif_pilih";
$sql .= " WHERE id_tarif_pilih= " . base64_decode(urldecode($_POST['idprkn']));
// echo "$sql <br>";
try {
    $q = $conn->query($sql);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA TARIF PILIH-');";
    echo "document.location.href='?error404';</script>";
}
$d = $q->fetch(PDO::FETCH_ASSOC);
$h['id_tarif_pilih'] = $d["id_tarif_pilih"];
$h['u_nama_jenis_tarif'] = $d["nama_jenis_tarif_pilih"];
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
