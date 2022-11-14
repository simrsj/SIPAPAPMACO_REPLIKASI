<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

$id = $_POST['id'];

//alamat file surat masuk
$alamat_unggah = "./../../_file/praktik";

// echo $alamat_unggah . "<br>";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

if ($_FILES['file_surat']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['file_surat']['name'] = md5($_FILES['file_surat']['name']) . ".pdf";

    //unggah surat dan data praktik
    if (!is_null($_FILES['file_surat'])) {
        $file_surat = (object) @$_FILES['file_surat'];

        //mulai unggah file surat praktik
        $unggah_file_surat = move_uploaded_file(
            $file_surat->tmp_name,
            "{$alamat_unggah}/{$file_surat->name}"
        );
        $alamat_unggah_file_surat = "./_file/praktik";
        $link_file_surat = "{$alamat_unggah_file_surat}/{$file_surat->name}";
    }
}

// echo $id . "_" . $link_file_surat . "  |  " . $link_file_data_praktikan;

//Cek Variable File
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$sql_update = "UPDATE tb_praktik SET 
    surat_praktik = '" . $link_file_surat . "'
    WHERE id_praktik = $id
    ";

// echo $sql_update . "<br>";
$conn->query($sql_update);

// echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
