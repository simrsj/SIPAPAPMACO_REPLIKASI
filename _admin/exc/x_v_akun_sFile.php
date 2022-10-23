<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$id = $_POST['id_user'];


//Cek Variable File
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$alamat_unggah_foto = "./../../_img/akun";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah_foto)) {
    mkdir($alamat_unggah_foto, 0777, $rekursif = true);
}
if ($_FILES['c_foto']['size'] > 0) {
    $extensi_file = pathinfo($_FILES['c_foto']['name'], PATHINFO_EXTENSION);
    //ubah Nama foto
    $_FILES['c_foto']['name'] = $id . "." . $extensi_file;

    //unggah 
    if (!is_null($_FILES['c_foto'])) {
        $foto = (object) @$_FILES['c_foto'];

        //mulai unggah file 
        $unggah_foto = move_uploaded_file(
            $foto->tmp_name,
            "{$alamat_unggah_foto}/{$foto->name}"
        );
        $alamat_unggah_foto = "./_img/akun";

        // link alamat file 
        $link_foto = "{$alamat_unggah_foto}/{$foto->name}";
    }
}

//Cek Variable File
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$sql_u_user = "UPDATE tb_user SET ";
$sql_u_user .= " foto_user = '" . $link_foto . "'";
$sql_u_user .= " WHERE id_user = " . $id;

// echo $sql_u_user . "<br>";
$conn->query($sql_u_user);
echo json_encode(['success' => 'Data Institusi Berhasil Disimpan']);
