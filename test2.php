<?php

//Cek Variable File
echo "<pre>";
print_r($_FILES);
echo "</pre>";

//alamat file surat masuk
$alamat_unggah = "./_file/test";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

if ($_FILES['file_1']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['file_1']['name'] = "file2_" . date('Y-m-d') . ".pdf";

    //unggah surat dan data praktik
    if (!is_null($_FILES['file_1'])) {
        $file_1 = (object) @$_FILES['file_1'];

        //mulai unggah file surat praktik
        $unggah_file_1 = move_uploaded_file(
            $file_1->tmp_name,
            "{$alamat_unggah}/{$file->name}"
        );
        $link_file_1 = "{$alamat_unggah}/{$file_1->name}";
    }
}

echo $link_file_1;
/* 
if (isset($_FILES['file']['name'])) {
    // file name
    $filename = $_FILES['file']['name'];
    // Location
    $location = './_file/test/' . $filename;
    // file extension
    $file_extension = pathinfo($location, PATHINFO_EXTENSION);
    echo $file_extension . "<br>";
    $file_extension = strtolower($file_extension);
    echo $file_extension . "<br>";
    // Valid extensions
    $valid_ext = array("pdf", "doc", "docx", "jpg", "png", "jpeg", "xlsx");
    $response = 0;
    if (in_array($file_extension, $valid_ext)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = 1;
        }
    }
}
 */