<?php

$files = $_FILES;

echo "<pre>";
print_r($files);
echo "</pre>";

<?php

$folderUpload = "./assets/uploads";

# periksa apakah folder sudah ada
if (!is_dir($folderUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($folderUpload, 0777, $rekursif = true);
}