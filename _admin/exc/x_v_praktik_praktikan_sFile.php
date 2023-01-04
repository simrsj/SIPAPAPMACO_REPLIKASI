<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

$idpp = base64_decode(urldecode($_POST['idpp']));
$idp = base64_decode(urldecode($_POST['idp']));

$sql_praktik = "SELECT * FROM tb_praktik ";
$sql_praktik .= " WHERE id_praktik = " . $idp;
// echo $sql_praktik . "<br>";
try {
    $q_praktik = $conn->query($sql_praktik);
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRAKTIK-');";
    echo "document.location.href='?error404';</script>";
}
//alamat file
$alamat_unggah = "./../../_file/praktik";

// echo $alamat_unggah . "<br>";

//pembuatan alamat bila tidak ada
if (!is_dir($alamat_unggah)) {
    mkdir($alamat_unggah, 0777, $rekursif = true);
}

if ($d_praktik['id_profesi_pdd'] > 0) {
    if ($_FILES['t_ijazah']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['t_ijazah']['name'] = "file_ijazah_" . md5($_FILES['t_ijazah']['name'] . date('Y-m-d h:i:s')) . ".pdf";

        //unggah ijazah
        if (!is_null($_FILES['t_ijazah'])) {
            $file_ijazah = (object) @$_FILES['t_ijazah'];

            //mulai unggah file ijazah
            $unggah_file_ijazah = move_uploaded_file(
                $file_ijazah->tmp_name,
                "{$alamat_unggah}/{$file_ijazah->name}"
            );
            $alamat_unggah_file_ijazah = "./_file/praktik";
            $link_file_ijazah = "{$alamat_unggah_file_ijazah}/{$file_ijazah->name}";
        }
    }
}

if ($_FILES['t_swab']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['t_swab']['name'] = "file_swab" . md5($_FILES['t_swab']['name'] . date('Y-m-d h:i:s')) . ".pdf";

    //unggah surat dan data praktik
    if (!is_null($_FILES['t_swab'])) {
        $file_swab = (object) @$_FILES['t_swab'];

        //mulai unggah file surat praktik
        $unggah_file_swab = move_uploaded_file(
            $file_swab->tmp_name,
            "{$alamat_unggah}/{$file_swab->name}"
        );
        $alamat_unggah_file_swab = "./_file/praktik";
        $link_file_swab = "{$alamat_unggah_file_swab}/{$file_swab->name}";
    }
}
if ($d_praktik['id_profesi_pdd'] > 0) {
    if ($_FILES['u_ijazah']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['u_ijazah']['name'] = "file_ijazah_" . md5($_FILES['u_ijazah']['name'] . date('Y-m-d h:i:s')) . ".pdf";

        //unggah ijazah
        if (!is_null($_FILES['u_ijazah'])) {
            $file_ijazah = (object) @$_FILES['u_ijazah'];

            //mulai unggah file ijazah
            $unggah_file_ijazah = move_uploaded_file(
                $file_ijazah->tmp_name,
                "{$alamat_unggah}/{$file_ijazah->name}"
            );
            $alamat_unggah_file_ijazah = "./_file/praktik";
            $link_file_ijazah = "{$alamat_unggah_file_ijazah}/{$file_ijazah->name}";
        }
    }
}

if ($_FILES['u_swab']['size'] > 0) {
    //ubah Nama File PDF
    $_FILES['u_swab']['name'] = "file_swab" . md5($_FILES['u_swab']['name'] . date('Y-m-d h:i:s')) . ".pdf";

    //unggah surat dan data praktik
    if (!is_null($_FILES['u_swab'])) {
        $file_swab = (object) @$_FILES['u_swab'];

        //mulai unggah file surat praktik
        $unggah_file_swab = move_uploaded_file(
            $file_swab->tmp_name,
            "{$alamat_unggah}/{$file_swab->name}"
        );
        $alamat_unggah_file_swab = "./_file/praktik";
        $link_file_swab = "{$alamat_unggah_file_swab}/{$file_swab->name}";
    }
}
// echo $id . "_" . $link_file_surat . "  |  " . $link_file_data_praktikan;

//Cek Variable File
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

$sql_update = "UPDATE tb_praktikan SET ";
$sql_update .= " file_ijazah_praktikan = '" . $link_file_ijazah . "',";
$sql_update .= " file_swab_praktikan = '" . $link_file_swab . "'";
$sql_update .= " WHERE id_praktikan = " . $idpp;

// echo $sql_update . "<br>";
$conn->query($sql_update);

echo json_encode(['success' => 'Data Berhasil Disimpan']);
