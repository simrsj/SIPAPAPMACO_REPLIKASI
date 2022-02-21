<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

// --------------------------------------SIMPAN DATA PRAKTIK--------------------------------------------

//mencari jenis jurusan
$sql_jenis_jurusan = "SELECT * FROM tb_jurusan_pdd 
WHERE id_jurusan_pdd = " . $_POST['id_jurusan_pdd'];

$q_jenis_jurusan = $conn->query($sql_jenis_jurusan);
$d_jenis_jurusan = $q_jenis_jurusan->fetch(PDO::FETCH_ASSOC);

$sql_insert = "INSERT INTO tb_praktik (
    id_praktik, 
    id_institusi, 
    nama_praktik,
    tgl_input_praktik,
    tgl_mulai_praktik,
    tgl_selesai_praktik,
    jumlah_praktik,
    id_jurusan_pdd_jenis,
    id_jurusan_pdd,
    id_jenjang_pdd,
    id_spesifikasi_pdd,
    id_akreditasi,
    id_user,
    nama_koordinator_praktik,
    email_koordinator_praktik,
    telp_koordinator_praktik,
    status_cek_praktik, 
    status_praktik
    ) VALUES (
        '" . $_POST['id'] . "', 
        '" . $_POST['id_institusi'] . "', 
        '" . $_POST['nama_praktik'] . "',
        '" . date('Y-m-d') . "', 
        '" . $_POST['tgl_mulai_praktik'] . "', 
        '" . $_POST['tgl_selesai_praktik'] . "',
        '" . $_POST['jumlah_praktik'] . "', 
        '" . $d_jenis_jurusan['id_jurusan_pdd_jenis'] . "', 
        '" . $_POST['id_jurusan_pdd'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        '" . $_POST['id_spesifikasi_pdd'] . "', 
        '" . $_POST['id_akreditasi'] . "',
        '" . $_POST['user'] . "',
        '" . $_POST['nama_koordinator_praktik'] . "', 
        '" . $_POST['email_koordinator_praktik'] . "',
        '" . $_POST['telp_koordinator_praktik'] . "', 
        'DPT', 
        'D'
        )";

echo $sql_insert . "<br>";
$conn->query($sql_insert);
// --------------------------------------SIMPAN DATA TARIF--------------------------------------------

$id_praktik = $_POST['id'];

//Mencari id_jurusan_pdd_jenis
$id_jurusan_pdd = $_POST['id_jurusan_pdd'];
$sql_jurusan_pdd_jenis = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd = " . $id_jurusan_pdd;
$q_jurusan_pdd_jenis = $conn->query($sql_jurusan_pdd_jenis);
$d_jurusan_pdd_jenis = $q_jurusan_pdd_jenis->fetch(PDO::FETCH_ASSOC);

//Mencari id_jenjang_pdd
$id_jenjang_pdd = $_POST['id_jenjang_pdd'];
$sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd WHERE id_jenjang_pdd = " . $id_jenjang_pdd;
$q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
$d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC);

$tgl_mulai_praktik = $_POST['tgl_mulai_praktik'];
$tgl_selesai_praktik = $_POST['tgl_selesai_praktik'];
$jumlah_praktik = $_POST['jumlah_praktik'];


//SQL menentukan tarif berdasarkan jenis jurusan
$sql_tarif_jurusan = " SELECT * FROM tb_tarif 
JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis 
JOIN tb_jurusan_pdd_jenis ON tb_tarif.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan
WHERE tb_tarif.id_jurusan_pdd_jenis = " . $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] . " AND tb_tarif.id_tarif_jenis BETWEEN 1 AND 5
ORDER BY nama_tarif_jenis ASC, nama_tarif ASC 
";

echo "<br><br>";
echo $sql_tarif_jurusan;
echo "<br><br>";

$q_tarif_jurusan = $conn->query($sql_tarif_jurusan);
while ($d_tarif_jurusan = $q_tarif_jurusan->fetch(PDO::FETCH_ASSOC)) {

    if ($d_tarif_jurusan['tipe_tarif'] == 'SEKALI') {
        $frekuensi = 1;
    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'INPUT') {
        echo "INPUT";
    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'TARIF-') {
        $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'TARIF+') {
        $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'MINGGUAN') {
        $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
    } else {
        $frekuensi = $d_tarif_jurusan['tipe_tarif'];
    }

    //bila ada data frekuensi di attribunya (tidak NULL/ tidak kososng - terisi)
    // if ($d_tarif_jurusan['frekuensi_tarif'] != NULL || $d_tarif_jurusan['frekuensi_tarif'] != 0) {
    //     $frekuensi = $d_tarif_jurusan['frekuensi_tarif'];
    // }

    $sql_insert = "INSERT INTO tb_tarif_pilih (
        id_praktik, 
        id_tarif,
        tgl_input_tarif_pilih,
        frekuensi_tarif_pilih,
        kuantitas_tarif_pilih,
        jumlah_tarif_pilih
        ) VALUES (
            '" . $id_praktik . "', 
            '" . $d_tarif_jurusan['id_tarif'] . "',
            '" . date('Y-m-d') . "', 
            '" . $frekuensi . "',
            '" . $jumlah_praktik . "', 
            '" . $frekuensi * $jumlah_praktik * $d_tarif_jurusan['jumlah_tarif'] . "'
            )";

    echo $sql_insert;
    echo "<br>";
    $conn->query($sql_insert);
}
echo "<br>";



//SQL BST Eksekusi bila jurusan selain dari kedokteran
if ($d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] != 1) {
    $sql_tarif_jenjang = " SELECT * FROM tb_tarif 
        JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis 
        JOIN tb_jenjang_pdd ON tb_tarif.id_jenjang_pdd = tb_jenjang_pdd.    id_jenjang_pdd
        WHERE tb_tarif.id_jenjang_pdd = " . $id_jenjang_pdd . " AND tb_tarif.id_tarif_jenis BETWEEN 1 AND 6
        ORDER BY nama_jenjang_pdd ASC
        ";

    $q_tarif_jenjang = $conn->query($sql_tarif_jenjang);

    while ($d_tarif_jenjang = $q_tarif_jenjang->fetch(PDO::FETCH_ASSOC)) {
        if ($d_tarif_jenjang['tipe_tarif'] == 'SEKALI') {
            $frekuensi = 1;
        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'INPUT') {
            echo "INPUT";
        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'TARIF-') {
            $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'TARIF+') {
            $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'MINGGUAN') {
            $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
        } else {
            $frekuensi = $d_tarif_jenjang['tipe_tarif'];
        }

        $sql_insert_tarif_jenjang = " INSERT INTO tb_tarif_pilih (
                id_praktik, 
                id_tarif, 
                tgl_input_tarif_pilih, 
                frekuensi_tarif_pilih,
                kuantitas_tarif_pilih,
                jumlah_tarif_pilih
            ) VALUES (
                '" . $id_praktik . "', 
                '" . $d_tarif_jenjang['id_tarif'] . "', 
                '" . date('Y-m-d') . "', 
                '" . $frekuensi . "', 
                '" . $jumlah_praktik . "', 
                '" . $frekuensi * $jumlah_praktik * $d_tarif_jenjang['jumlah_tarif'] . "'
            )";

        echo $sql_insert_tarif_jenjang;
        echo "<br>";
        $conn->query($sql_insert_tarif_jenjang);
    }
}
echo "<br><br>";

//SQL Tarif Ujian 
$cek_pilih_ujian = $_POST['cek_pilih_ujian'];

echo $cek_pilih_ujian . "<br>";
if ($cek_pilih_ujian == 'y') {
    if ($d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] == 1) {
        $sql = "AND tb_tarif.id_tarif_jenis = 1";
    } else {
        $sql = "AND tb_tarif.id_jurusan_pdd_jenis BETWEEN 2 AND 4";
    }
    $sql_tarif_ujian = " SELECT * FROM tb_tarif 
            JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis 
            JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan 
            WHERE tb_tarif.id_tarif_jenis = 6 AND tb_tarif.id_jurusan_pdd_jenis = " . $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] . "
            ORDER BY nama_tarif_jenis ASC
        ";

    $q_tarif_ujian = $conn->query($sql_tarif_ujian);

    while ($d_tarif_ujian = $q_tarif_ujian->fetch(PDO::FETCH_ASSOC)) {
        if ($d_tarif_ujian['tipe_tarif'] == 'SEKALI') {
            $frekuensi = 1;
        } elseif ($d_tarif_ujian['tipe_tarif'] == 'INPUT') {
            echo "INPUT";
        } elseif ($d_tarif_ujian['tipe_tarif'] == 'TARIF-') {
            $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_tarif_ujian['tipe_tarif'] == 'TARIF+') {
            $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_tarif_ujian['tipe_tarif'] == 'MINGGUAN') {
            $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
        } else {
            $frekuensi = $d_tarif_ujian['tipe_tarif'];
        }

        $sql_insert_tarif_ujian = " INSERT INTO tb_tarif_pilih (
                id_praktik, 
                id_tarif, 
                tgl_input_tarif_pilih, 
                frekuensi_tarif_pilih,
                kuantitas_tarif_pilih,
                jumlah_tarif_pilih
            ) VALUES (
                '" . $id_praktik . "', 
                '" . $d_tarif_ujian['id_tarif'] . "', 
                '" . date('Y-m-d') . "', 
                '" . $frekuensi . "', 
                '" . $jumlah_praktik . "', 
                '" . $frekuensi * $jumlah_praktik * $d_tarif_ujian['jumlah_tarif'] . "'
            )";

        echo $sql_insert_tarif_ujian;
        echo "<br>";
        $conn->query($sql_insert_tarif_ujian);
    }
}
echo "<br><br>";

$sql_update_status_praktik = " UPDATE tb_praktik
SET status_cek_praktik = 'DPT'
WHERE id_praktik = $id_praktik";

$conn->query($sql_update_status_praktik);
echo json_encode(['success' => 'Data Tarif Berhasil Disimpan']);
// echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
