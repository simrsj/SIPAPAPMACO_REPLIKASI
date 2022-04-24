<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$id = $_POST['id_mou'];

$alamat_unggah = "./../../_file/mou-pks";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

if ($_FILES['file_mou']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['file_mou']['name'] = "mou_" . $id . "_" . date('Y-m-d') . ".pdf";

    //unggah 
    if (!is_null($_FILES['file_mou'])) {
        $file_mou = (object) @$_FILES['file_mou'];

        //mulai unggah file 
        $unggah_file_mou = move_uploaded_file(
            $file_mou->tmp_name,
            "{$alamat_unggah}/{$file_mou->name}"
        );
        $alamat_unggah_file_mou = "./_file/mou-pks";

        // link alamat file 
        $link_file_mou = "{$alamat_unggah_file_mou}/{$file_mou->name}";
    }
}

if ($_FILES['file_pks']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['file_pks']['name'] = "pks_" . $id . "_" . date('Y-m-d') . ".pdf";

    //unggah 
    if (!is_null($_FILES['file_pks'])) {
        $file_pks = (object) @$_FILES['file_pks'];

        //mulai unggah file 
        $unggah_file_pks = move_uploaded_file(
            $file_pks->tmp_name,
            "{$alamat_unggah}/{$file_pks->name}"
        );
        $alamat_unggah_file_pks = "./_file/mou-pks";

        // link alamat file 
        $link_file_pks = "{$alamat_unggah_file_pks}/{$file_pks->name}";
    }
}

//Cek Variable File
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$sql_u_mou = "UPDATE tb_mou SET ";
$sql_u_mou .= " file_mou = '" . $link_file_mou . "',";
$sql_u_mou .= " file_pks = '" . $link_file_pks . "'";
$sql_u_mou .= " WHERE id_mou = " . $id;

// $sql_u_mou_arsip = "UPDATE tb_mou_arsip SET ";
// $sql_u_mou_arsip .= " file_mou_arsip = '" . $link_file_mou . "',";
// $sql_u_mou_arsip .= " file_pks_arsip = '" . $link_file_pks . "'";
// $sql_u_mou_arsip .= " WHERE id_mou_arsip = " . $id;

// echo $sql_u_mou . "<br>";
// echo $sql_u_mou_arsip . "<br>";
$conn->query($sql_u_mou);
// $conn->query($sql_u_mou_arsip);

echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
