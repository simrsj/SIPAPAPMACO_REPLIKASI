<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$id = $_POST['id'];

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";


//alamat file logo_institusi masuk
$alamat_unggah = "./../../_img/logo_institusi/temp";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

if ($_FILES['logo_institusi']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['logo_institusi']['name'] = $id . ".png";

    //unggah surat dan data praktik
    if (!is_null($_FILES['logo_institusi'])) {
        $logo_institusi = (object) @$_FILES['logo_institusi'];

        //mulai unggah file surat praktik
        $unggah_logo = move_uploaded_file(
            $logo_institusi->tmp_name,
            "{$alamat_unggah}/{$logo_institusi->name}"
        );
        $alamat_unggah_logo = "./_img/logo_institusi/temp";
        $link_logo = "{$alamat_unggah_logo}/{$logo_institusi->name}";
    }
}


//alamat file Akred 
$alamat_unggah = "./../../_file/akred";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

if ($_FILES['fileAkred_institusi']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['fileAkred_institusi']['name'] = "akred_" . md5($_FILES['t_file']['name'] . date('Y-m-d h:i:s')) . ".pdf";

    //unggah surat dan data praktik
    if (!is_null($_FILES['fileAkred_institusi'])) {
        $fileAkred_institusi = (object) @$_FILES['fileAkred_institusi'];

        //mulai unggah file surat praktik
        $unggah_fileAkred = move_uploaded_file(
            $fileAkred_institusi->tmp_name,
            "{$alamat_unggah}/{$fileAkred_institusi->name}"
        );
        $alamat_unggah_fileAkred = "./_file/akred";
        $link_fileAkred = "{$alamat_unggah_fileAkred}/{$fileAkred_institusi->name}";
    }
}

// echo $id . "_" . $link_logo . "  |  " . $link_fileAkred;

//Cek Variable File
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$sql_update = "UPDATE tb_institusi SET ";
$sql_update .= " tempLogo_institusi = '" . $link_logo . "',";
$sql_update .= " tempFileAkred_institusi = '" . $link_fileAkred . "'";
$sql_update .= " WHERE id_institusi = $id";

// echo $sql_update . "<br>";
$conn->query($sql_update);

echo json_encode(['success' => 'Data logo_institusi dan File Akred Berhasil Disimpan']);
