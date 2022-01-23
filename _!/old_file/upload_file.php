<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>

<body>
    <h1>Belajar Upload File</h1>

    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label>File Gambar (JPEG)</label> <br>
            <input type="file" name="jpeg" accept="image/jpeg"><br>
            <label>File Dokumen (PDF)</label> <br>
            <input type="file" name="pdf" accept="application/pdf">
        </div>
        <div style="margin-top: 1rem">
            <button>Upload</button>
        </div>
    </form>
</body>

</html>

<?php
error_reporting(0);

//diusahakan file form dan uploda di pisah

//alamat File
$folderUpload = "./_file";

//Rumah Nama File
$nama_pdf = "BUJAAANG";
$_FILES['pdf']['name'] = $nama_pdf . ".pdf";
$files = $_FILES;

//Cek Variable File
echo "<pre>";
print_r($files);
echo "</pre>";

# periksa apakah folder sudah ada
if (!is_dir($folderUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($folderUpload, 0777, $rekursif = true);
}

$fileJPEG = (object) @$_FILES['jpeg'];
$filePDF = (object) @$_FILES['pdf'];

if ($fileJPEG->size > 1000 * 1000000) {
    die("File JPEG tidak boleh lebih dari 2MB");
} elseif ($fileJPEG->type !== 'image/jpeg') {
    die("File harus JPEG!");
} else {

    $uploadJPEGSukses = move_uploaded_file(
        $fileJPEG->tmp_name,
        "{$folderUpload}/{$fileJPEG->name}"
    );


    if ($uploadJPEGSukses) {
        $link = "{$folderUpload}/{$fileJPEG->name}";
        echo "Sukses Upload JPEG: <a href='{$link}'>{$fileJPEG->name}</a>";
        echo "<br>";
    }

    echo $link;
}

?>