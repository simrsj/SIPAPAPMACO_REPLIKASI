<?php
error_reporting(0);
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

echo "<pre>";
print_r($_POST);
echo "</pre>";

// $exp_arr_idu = explode("*sm*", base64_decode(urldecode(hex2bin($_POST['idu']))));
// $idu = $exp_arr_idu[1];
// $exp_arr_idp = explode("*sm*", base64_decode(urldecode(hex2bin($_POST['idp']))));
// $idu = $exp_arr_idu[1];
$idu = decryptString($_POST['idu'], $customkey);
$idp = decryptString($_POST['idp'], $customkey);
//data privileges 
$sql_prvl = "SELECT * FROM tb_user_privileges WHERE id_user = " . decryptString($_POST['user'], $customkey);
try {
    $q_prvl = $conn->query($sql_prvl);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}
$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);

if ($d_prvl['c_praktik'] == "Y") {
    //bila profesi tidak dipilih
    if ($_POST['profesi'] != "") $profesi = $_POST['profesi'];
    else $profesi = "";

    // --------------------------------------SIMPAN DATA PRAKTIK--------------------------------------------

    //mencari jenis jurusan
    $sql_jenis_jurusan = "SELECT * FROM tb_jurusan_pdd ";
    $sql_jenis_jurusan .= "WHERE id_jurusan_pdd = " . $_POST['jurusan'];

    try {
        $q_jenis_jurusan = $conn->query($sql_jenis_jurusan);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA JENIS JURUSAN-');";
        echo "document.location.href='?error404';</script>";
    }
    $d_jenis_jurusan = $q_jenis_jurusan->fetch(PDO::FETCH_ASSOC);

    $sql = "UPDATE tb_praktik SET  ";
    $sql .= " id_user= '" . $idu . "'";
    $sql .= " id_praktik= '" . $idp . "'";
    $sql .= " id_institusi = '" . $_POST['institusi'] . "',";
    $sql .= " tgl_ubah_praktik = '" . date('Y-m-d', time()) . "',";
    $sql .= " tgl_mulai_praktik = '" . $_POST['tgl_mulai_praktik'] . "',";
    $sql .= " tgl_selesai_praktik = '" . $_POST['tgl_selesai_praktik'] . "',";
    $sql .= " no_surat_praktik = '" . $_POST['no_surat'] . "',";
    $sql .= " tgl_surat_praktik = '" . $_POST['tgl_surat'] . "',";
    $sql .= " jumlah_praktik = '" . $_POST['jumlah'] . "',";
    $sql .= " id_jurusan_pdd_jenis = '" . $d_jenis_jurusan['id_jenis_jurusan'] . "',";
    $sql .= " id_jurusan_pdd = '" . $_POST['jurusan'] . "',";
    $sql .= " id_jenjang_pdd = '" . $_POST['jenjang'] . "',";
    $sql .= " id_profesi_pdd = '" . $profesi . "',";
    $sql .= " nama_koordinator_praktik = '" . $_POST['nama_koordinator'] . "',";
    $sql .= " email_koordinator_praktik = '" . $_POST['email_koordinator'] . "',";
    $sql .= " telp_koordinator_praktik = '" . $_POST['kelompok'] . "',";
    $sql .= " kode_bayar_praktik = '" . $_POST['telp_koordinator'] . "',";
    $sql .= " status_mess_praktik = '" . $_POST['pilih_mess'] . "'";
    $sql .= " WHERE id_praktik=" . $idp;
    // echo $sql . "<br>";

    $dataJSON['sql'] = $sql;
    // $dataJSON['idp'] = urlencode(base64_encode($id_pkd));
    // $dataJSON['q'] = urlencode(base64_encode($sql));
    $dataJSON['idp'] = encryptString($id_pkd, $customkey);
    $dataJSON['q'] = encryptString($sql, $customkey);
    echo json_encode($dataJSON);
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
