<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

$id = $_POST['id'];
// $id = $_GET['id'];

//alamat file surat masuk
$alamat_unggah = "./_file/praktik";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

//upload file surat
if ($_FILES['file_surat']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['file_surat']['name'] = "surat_" . $id . "_" . date('Y-m-d') . ".pdf";

    //unggah surat dan data praktik
    if (!is_null($_FILES['file_surat'])) {
        $file_surat = (object) @$_FILES['file_surat'];

        //mulai unggah file surat praktik
        $unggah_file = move_uploaded_file(
            $file_surat->tmp_name,
            "{$alamat_unggah}/{$file_surat->name}"
        );
        $link_file_surat = "{$alamat_unggah}/{$file_surat->name}";
    }
} else {
    $link_file_surat = NULL;
}


//upload file data praktik
if ($_FILES['file_data_praktikan']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['file_data_praktikan']['name'] = "data_praktikan_" . $id . "_" . date('Y-m-d') . ".xlsx";

    //unggah surat dan data praktik
    if (!is_null($_FILES['file_data_praktikan'])) {
        $file_data_praktikan = (object) @$_FILES['file_data_praktikan'];

        //mulai unggah file surat praktik
        $unggah_file = move_uploaded_file(
            $file_data_praktikan->tmp_name,
            "{$alamat_unggah}/{$file_data_praktikan->name}"
        );
        $link_file_data_praktikan = "{$alamat_unggah}/{$file_data_praktikan->name}";
    }
} else {
    $link_file_data_praktikan = NULL;
}

//Cek Variable File
echo "<pre>";
print_r($_FILES);
echo "</pre>";

echo $file_surat->size . "_" . $file_surat->type . "_" . $link_file_surat . "<br>";
echo $file_data_praktikan->size . "_" . $file_data_praktikan->type . "_" . $link_file_data_praktikan . "<br>";

$sql_update = "UPDATE tb_praktik SET 
    surat_praktik = '$link_file_surat',
    data_praktik = '$link_file_data_praktikan'
    WHERE id_praktik = $id
    ";

echo $sql_update . "<br>";
// $conn->query($sql_insert);
echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
