<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

$alamat_unggah = "./_file/test";

if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

if ($_FILES['file']['size'] > 0) {

    if (!is_null($_FILES['file'])) {
        $file = (object) @$_FILES['file'];

        $unggah_file = move_uploaded_file(
            $file->tmp_name,
            "{$alamat_unggah}/{$file->name}"
        );

        $link_file = "{$alamat_unggah}/{$file->name}";
    }
}

if ($_FILES['file_1']['size'] > 0) {

    if (!is_null($_FILES['file_1'])) {
        $file_1 = (object) @$_FILES['file_1'];

        $unggah_file_1 = move_uploaded_file(
            $file_1->tmp_name,
            "{$alamat_unggah}/{$file_1->name}"
        );
        $link_file_1 = "{$alamat_unggah}/{$file_1->name}";
    }
}

echo $link_file . "  --  " . $link_file_1;
