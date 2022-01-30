<?php

//Cek Variable File
echo "<pre>";
print_r($_FILES);
echo "</pre>";

if ($_FILES['file']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['file']['name'] = date('Y-m-d') . ".pdf";

    //alamat file surat masuk
    $alamat_unggah = "./_file/test";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah surat dan data praktik
    if (!is_null($_FILES['file'])) {
        $file = (object) @$_FILES['file'];

        //mulai unggah file surat praktik
        if ($file->size > 1000 * 10000) {
            $error_size = 'File Surat Harus dibawah 10 Mb';
        } elseif ($file->type !== 'application/pdf') {
            $error_type = 'File Surat Harus .pdf';
        } else {
            $unggah_file = move_uploaded_file(
                $file->tmp_name,
                "{$alamat_unggah}/{$file->name}"
            );
            $link_file = "{$alamat_unggah}/{$file->name}";
        }
        exit;
    }
}
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