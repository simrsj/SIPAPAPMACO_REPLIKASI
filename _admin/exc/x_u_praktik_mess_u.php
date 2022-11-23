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

if ($d_prvl['c_praktik_mess'] == 'Y') {
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
    echo $jumlah_hari_praktik . "<br>";

    //tambah ke tb_tarif_pilih
    $sql_ubah_tarif_mess = "UPDATE tb_tarif_pilih SET";
    $sql_ubah_tarif_mess .= " tgl_ubah_tarif_pilih = " . date('Y-m-d');
    $sql_ubah_tarif_mess .= " 
    id_praktik, 
    tgl_input_tarif_pilih,
    nama_jenis_tarif_pilih,
    nama_tarif_pilih,
    nominal_tarif_pilih,
    nama_satuan_tarif_pilih,
    frekuensi_tarif_pilih,
    kuantitas_tarif_pilih,
    jumlah_tarif_pilih,
    mess_tarif_pilih
    ) VALUES (
            '" . $_POST['id'] . "', 
                '" . date('Y-m-d') . "',
                '" . $d_mess['nama_tarif_jenis'] . "', 
                '" . $d_mess['nama_mess'] . "', 
                '" . $d_mess['tarif_tanpa_makan_mess'] . "',  
                '" . $d_mess['nama_tarif_satuan'] . "',
            '" . $jumlah_hari_praktik . "', 
            '" . $d_praktik['jumlah_praktik'] . "', 
            '" . $total_tarif_mess_pilih . "', 
            'Y'
    );";
    $sql_ubah_tarif_mess .= " WHERE id_tarif_pilih = " . $_POST['idtp'];

    //tambah ke tb_mess_pilih
    $sql_insert_pilih_mess = "INSERT INTO tb_mess_pilih (
    id_praktik, 
    id_mess,
    tgl_input_mess_pilih,
    jumlah_hari_mess_pilih,
    total_tarif_mess_pilih
) VALUES (
        '" . $_POST['id'] . "', 
        '" . $_POST['id_mess'] . "', 
        '" . date('Y-m-d') . "', 
        '" . $jumlah_hari_praktik . "',
        '" . $total_tarif_mess_pilih . "'
)";

    //SQL ubah status praktik
    $sql_ubah_status_praktik = "UPDATE tb_praktik";
    $sql_ubah_status_praktik .= " SET status_mess_praktik = 'Y'";
    $sql_ubah_status_praktik .= " WHERE id_praktik = " . $_POST['id'];

    //Eksekusi Query
    echo $sql_insert_tarif_mess . "<br>";
    echo $sql_insert_pilih_mess . "<br>";
    echo $sql_ubah_status_praktik . "<br>";
    // $conn->query($sql_insert_tarif_mess);
    // $conn->query($sql_insert_pilih_mess);
    // $conn->query($sql_ubah_status_praktik);
} else {
    echo "<script>alert('Unauthorized');document.location.href='?error401';</script>";
}
