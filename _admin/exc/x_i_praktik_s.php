<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

//data privileges 
$sql_prvl = "SELECT * FROM tb_user_privileges WHERE id_user = " . base64_decode(urldecode($_POST['user']));
try {
    $q_prvl = $conn->query($sql_prvl);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}
$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);

if ($d_prvl['c_praktik'] == "Y") {
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

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

    $sql_insert = "INSERT INTO tb_praktik ( ";
    $sql_insert .= " id_user,";
    $sql_insert .= " id_praktik, ";
    $sql_insert .= " id_institusi, ";
    $sql_insert .= " nama_praktik,";
    $sql_insert .= " tgl_input_praktik,";
    $sql_insert .= " tgl_mulai_praktik,";
    $sql_insert .= " tgl_selesai_praktik,";
    $sql_insert .= " no_surat_praktik,";
    $sql_insert .= " jumlah_praktik,";
    $sql_insert .= " id_jurusan_pdd_jenis,";
    $sql_insert .= " id_jurusan_pdd,";
    $sql_insert .= " id_jenjang_pdd,";
    $sql_insert .= " id_profesi_pdd,";
    $sql_insert .= " nama_koordinator_praktik,";
    $sql_insert .= " email_koordinator_praktik,";
    $sql_insert .= " telp_koordinator_praktik,";
    $sql_insert .= " status_mess_praktik,";
    $sql_insert .= " status_praktik";
    $sql_insert .= " ) VALUES (";
    $sql_insert .= " '" . base64_decode(urldecode($_POST['user'])) . "',";
    $sql_insert .= " '" . base64_decode(urldecode($_POST['id'])) . "', ";
    $sql_insert .= " '" . $_POST['institusi'] . "', ";
    $sql_insert .= " '" . $_POST['kelompok'] . "',";
    $sql_insert .= " '" . date('Y-m-d') . "', ";
    $sql_insert .= " '" . $_POST['tgl_mulai_praktik'] . "', ";
    $sql_insert .= " '" . $_POST['tgl_selesai_praktik'] . "',";
    $sql_insert .= " '" . $_POST['no_surat'] . "',";
    $sql_insert .= " '" . $_POST['jumlah'] . "', ";
    $sql_insert .= " '" . $d_jenis_jurusan['id_jurusan_pdd_jenis'] . "', ";
    $sql_insert .= " '" . $_POST['jurusan'] . "',";
    $sql_insert .= " '" . $_POST['jenjang'] . "',";
    $sql_insert .= " '" . $profesi . "', ";
    $sql_insert .= " '" . $_POST['nama_koordinator'] . "', ";
    $sql_insert .= " '" . $_POST['email_koordinator'] . "',";
    $sql_insert .= " '" . $_POST['telp_koordinator'] . "', ";
    $sql_insert .= " '" . $_POST['pilih_mess'] . "', ";
    $sql_insert .= " 'Y'";
    $sql_insert .= " )";

    echo $sql_insert . "<br>";
    $conn->query($sql_insert);
    // --------------------------------------SIMPAN GENERATE TANGGAL--------------------------------------------

    $d1 = $_POST['tgl_mulai_praktik'];
    $d2 = $_POST['tgl_selesai_praktik'];
    $d2 = date('Y-m-d', strtotime($d2 . "+1 days"));

    $period = new DatePeriod(
        new DateTime($d1),
        new DateInterval('P1D'),
        new DateTime($d2)
    );

    $no = 1;
    foreach ($period as $key => $value) {
        $sql = "INSERT INTO tb_praktik_tgl ( ";
        $sql .= " id_praktik, ";
        $sql .= " praktik_tgl";
        $sql .= " ) VALUES (";
        $sql .= " '" . $_POST['id'] . "', ";
        $sql .= " '" . $value->format('Y-m-d') . "'";
        $sql .= " )";
        // echo " $sql<br>";
        $conn->query($sql);
        $no++;
    }
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
