<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
$sql_prvl = "SELECT * FROM tb_user_privileges";
$sql_prvl .= " WHERE id_user = " . base64_decode(urldecode($_GET['id']));
try {
    $d_prvl = $conn->query($sql_prvl)->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo "<script>alert('Unauthorized');";
    echo "document.location.href='?error404';</script>";
}

if ($d_prvl['u_praktik_mess'] == 'Y') {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    //cari data mess
    $sql_mess = "SELECT * FROM tb_mess";
    $sql_mess .= " JOIN tb_tarif_satuan ON tb_mess.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan ";
    $sql_mess .= " JOIN tb_tarif_jenis ON tb_mess.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis ";
    $sql_mess .= " WHERE id_mess = " . $_POST['id_mess'];
    try {
        $d_mess = $conn->query($sql_mess)->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('Maaf Data Tidak Ada -DATA MESS-');";
        echo "document.location.href='?error404';</script>";
    }

    //cari data praktik
    $sql_praktik = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_POST['id'];
    try {
        $d_praktik = $conn->query($sql_praktik)->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('Maaf Data Tidak Ada -DATA PRAKTIK-');";
        echo "document.location.href='?error404';</script>";
    }
    $jumlah_hari_praktik = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
    $total_tarif_mess_pilih = $jumlah_hari_praktik * $d_mess['tarif_tanpa_makan_mess'];
    // echo $jumlah_hari_praktik . "<br>";

    //tambah ke tb_tarif_pilih
    $sql_ubah_tarif_mess = "UPDATE tb_tarif_pilih SET";
    $sql_ubah_tarif_mess .= " tgl_ubah_tarif_pilih = " . date('Y-m-d');
    $sql_ubah_tarif_mess .= " nama_tarif_pilih = ";
    $sql_ubah_tarif_mess .= " nominal_tarif_pilih,";
    $sql_ubah_tarif_mess .= " frekuensi_tarif_pilih,";
    $sql_ubah_tarif_mess .= " kuantitas_tarif_pilih,";
    $sql_ubah_tarif_mess .= " jumlah_tarif_pilih = '" . $total_tarif_mess_pilih . "'";
    $sql_ubah_tarif_mess .= " WHERE id_tarif_pilih = " . $_POST['idtp'];

    //tambah ke tb_mess_pilih
    $sql_ubah_pilih_mess = "UPDATE tb_tarif_pilih SET";
    $sql_ubah_pilih_mess .= "id_praktik, ";
    $sql_ubah_pilih_mess .= "id_mess,";
    $sql_ubah_pilih_mess .= "tgl_input_mess_pilih,";
    $sql_ubah_pilih_mess .= "jumlah_hari_mess_pilih,";
    $sql_ubah_pilih_mess .= "total_tarif_mess_pilih";
    $sql_ubah_pilih_mess .= " WHERE id_tarif_pilih = " . $_POST['idtp'];

    //Eksekusi Query
    echo $sql_ubah_pilih_mess . "<br>";
    echo $sql_insert_pilih_mess . "<br>";
    // $conn->query($sql_ubah_pilih_mess);
    // $conn->query($sql_ubah_pilih_mess);

    try {
        $conn->query($sql_insert_tarif_mess);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA TARIF PILIH-');";
        echo "document.location.href='?error404';</script>";
    }
    try {
        $conn->query($sql_insert_pilih_mess);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA TARIF PILIH-');";
        echo "document.location.href='?error404';</script>";
    }
} else {
    echo "<script>alert('Unauthorized');document.location.href='?error401';</script>";
}
