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
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $id_praktik = base64_decode(urldecode($_POST['id']));
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
    $sql_insert .= " tgl_surat_praktik,";
    $sql_insert .= " jumlah_praktik,";
    $sql_insert .= " id_jurusan_pdd_jenis,";
    $sql_insert .= " id_jurusan_pdd,";
    $sql_insert .= " id_jenjang_pdd,";
    $sql_insert .= " id_profesi_pdd,";
    $sql_insert .= " nama_koordinator_praktik,";
    $sql_insert .= " email_koordinator_praktik,";
    $sql_insert .= " telp_koordinator_praktik,";
    $sql_insert .= " kode_bayar_praktik,";
    $sql_insert .= " status_mess_praktik,";
    $sql_insert .= " status_praktik";
    $sql_insert .= " ) VALUES (";
    $sql_insert .= " '" . base64_decode(urldecode($_POST['user'])) . "',";
    $sql_insert .= " '" . $id_praktik . "', ";
    $sql_insert .= " '" . $_POST['institusi'] . "', ";
    $sql_insert .= " '" . $_POST['kelompok'] . "',";
    $sql_insert .= " '" . date('Y-m-d') . "', ";
    $sql_insert .= " '" . $_POST['tgl_mulai_praktik'] . "', ";
    $sql_insert .= " '" . $_POST['tgl_selesai_praktik'] . "',";
    $sql_insert .= " '" . $_POST['no_surat'] . "',";
    $sql_insert .= " '" . $_POST['tgl_surat'] . "',";
    $sql_insert .= " '" . $_POST['jumlah'] . "', ";
    $sql_insert .= " '" . $d_jenis_jurusan['id_jurusan_pdd_jenis'] . "', ";
    $sql_insert .= " '" . $_POST['jurusan'] . "',";
    $sql_insert .= " '" . $_POST['jenjang'] . "',";
    $sql_insert .= " '" . $profesi . "', ";
    $sql_insert .= " '" . $_POST['nama_koordinator'] . "', ";
    $sql_insert .= " '" . $_POST['email_koordinator'] . "',";
    $sql_insert .= " '" . $_POST['telp_koordinator'] . "', ";
    $sql_insert .= " '" . date("ymdi") . "', ";
    $sql_insert .= " '" . $_POST['pilih_mess'] . "', ";
    $sql_insert .= " 'Y'";
    $sql_insert .= " )";

    // echo $sql_insert . "<br>";
    $conn->query($sql_insert);
    // --------------------------------------SIMPAN TARIF KEDOKTERAN--------------------------------------------
    if ($d_jenis_jurusan['id_jurusan_pdd_jenis'] == 1) {
        $array[0] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Institusional Fee", "-", 1, $_POST['jumlah'], 50000, 1 * (int)$_POST['jumlah'] * 50000];
        $array[1] = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Management Fee", "-", 1, $_POST['jumlah'], 75000, 1 * (int)$_POST['jumlah'] * 75000];
        $array[2]  = [$id_praktik, date('Y-m-d'), "BIAYA ADMINISTRASI", "Alat tulis Kantor Fee", "-", 1, $_POST['jumlah'], 5000, 1 * (int)$_POST['jumlah'] * 5000];
        $array[3]  = [$id_praktik, date('Y-m-d'), "BIAYA HABIS PAKAI", "(<i>Handrub</i>,tisue,sabun)", "-", 1, $_POST['jumlah'], 5000, 1 * (int)$_POST['jumlah'] * 5000];
        $array[4]  = [$id_praktik, date('Y-m-d'), "BIAYA OVERHEAD OPERASIONAL", "Log Book", "-", 1, $_POST['jumlah'], 20000, 1 * (int)$_POST['jumlah'] * 20000];
        $array[5]  = [$id_praktik, date('Y-m-d'), "PEMAIAN KEKAYAAN DAERAH", "Kelas", "-", 0, $_POST['jumlah'], 30000, 0];
        $array[6]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CSS", "-", 0, $_POST['jumlah'], 37500, 0];
        $array[7]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CRS", "-", 0, $_POST['jumlah'], 37500, 0];
        $array[8]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "CBD", "-", 0, $_POST['jumlah'], 37500, 0];
        $array[9]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "Pengayaan", "-", 0, $_POST['jumlah'], 37500, 0];
        $array[10]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "Bimbingan", "-", 0, $_POST['jumlah'], 37500, 0];
        $array[11]  = [$id_praktik, date('Y-m-d'), "BIAYA PEMBELAJARAN", "BST", "-", 0, $_POST['jumlah'], 37500, 0];
        $array[12]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Mini Cex", "-", 0, $_POST['jumlah'], 150000, 0];
        $array[13]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Ujian", "-", 0, $_POST['jumlah'], 150000, 0];
        $array[14]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Makan Pembimbing", "-", 0, $_POST['jumlah'], 20000, 0];
        $array[15]  = [$id_praktik, date('Y-m-d'), "BIAYA UJIAN", "Standar Pasien", "-", 0, $_POST['jumlah'], 100000, 0];

        foreach ($array as $key => $value) {

            $sql_insert = "INSERT INTO tb_praktik ( ";
            $sql_insert .= " id_praktik,";
            $sql_insert .= " tgl_tambah_tarif_pilih,";
            $sql_insert .= " nama_jenis_tarif_pilih,";
            $sql_insert .= " nama_tarif_pilih,";
            $sql_insert .= " nominal_tarif_pilih,";
            $sql_insert .= " nama_satuan_tarif_pilih,";
            $sql_insert .= " frekuensi_tarif_pilih,";
            $sql_insert .= " kuantitas_tarif_pilih,";
            $sql_insert .= " jumlah_tarif_pilih,";
            $sql_insert .= " status_tarif_pilih";
            $sql_insert .= " ) VALUES (";
            $sql_insert .= " '" . $value[0] . "', ";
            $sql_insert .= " '" . $value[1]  . "', ";
            $sql_insert .= " '" . $value[2]  . "', ";
            $sql_insert .= " '" . $value[3]  . "', ";
            $sql_insert .= " '" . $value[4]  . "', ";
            $sql_insert .= " '" . $value[5]  . "', ";
            $sql_insert .= " '" . $value[6]  . "', ";
            $sql_insert .= " '" . $value[7]  . "', ";
            $sql_insert .= " '" . $value[8]  . "' ";
            $sql_insert .= " )";
            // echo " $sql_insert<br>";
            $conn->query($sql);
        }
    }
    // --------------------------------------SIMPAN GENERATE TANGGAL--------------------------------------------

    $d1 = $_POST['tgl_mulai_praktik'];
    $d2 = $_POST['tgl_selesai_praktik'];
    $d2 = date('Y-m-d', strtotime($d2 . "+1 days"));

    $period = new DatePeriod(
        new DateTime($d1),
        new DateInterval('P1D'),
        new DateTime($d2)
    );

    foreach ($period as $key => $value) {
        $sql = "INSERT INTO tb_praktik_tgl ( ";
        $sql .= " id_praktik, ";
        $sql .= " praktik_tgl";
        $sql .= " ) VALUES (";
        $sql .= " '" . $_POST['id'] . "', ";
        $sql .= " '" . $value->format('Y-m-d') . "'";
        $sql .= " )";
        // echo " $sql<br>";
        // $conn->query($sql);
    }
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
