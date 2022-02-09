<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/csrf.php";

// --------------------------------------SIMPAN DATA PRAKTIK--------------------------------------------

$sql_insert = "INSERT INTO tb_praktik (
    id_praktik, 
    id_institusi, 
    nama_praktik,
    tgl_input_praktik,
    tgl_mulai_praktik,
    tgl_selesai_praktik,
    jumlah_praktik,
    id_jurusan_pdd,
    id_jenjang_pdd,
    id_spesifikasi_pdd,
    id_akreditasi,
    id_user,
    nama_pembimbing_praktik,
    email_pembimbing_praktik,
    telp_pembimbing_praktik,
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
        '" . $_POST['id_jurusan_pdd'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        '" . $_POST['id_spesifikasi_pdd'] . "', 
        '" . $_POST['id_akreditasi'] . "',
        '" . $_POST['user'] . "',
        '" . $_POST['nama_pembimbing_praktik'] . "', 
        '" . $_POST['email_pembimbing_praktik'] . "',
        '" . $_POST['telp_pembimbing_praktik'] . "', 
        'DPH', 
        'D'
        )";

echo $sql_insert . "<br>";
$conn->query($sql_insert);
// --------------------------------------SIMPAN DATA HARGA--------------------------------------------

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


//SQL menentukan harga berdasarkan jenis jurusan
$sql_harga_jurusan = " SELECT * FROM tb_harga 
JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan
WHERE tb_harga.id_jurusan_pdd_jenis = " . $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 5
ORDER BY nama_harga_jenis ASC, nama_harga ASC 
";

echo "<br><br>";
echo $sql_harga_jurusan;
echo "<br><br>";

$q_harga_jurusan = $conn->query($sql_harga_jurusan);
while ($d_harga_jurusan = $q_harga_jurusan->fetch(PDO::FETCH_ASSOC)) {

    if ($d_harga_jurusan['tipe_harga'] == 'SEKALI') {
        $frekuensi = 1;
    } elseif ($d_harga_jurusan['tipe_harga'] == 'INPUT') {
        echo "INPUT";
    } elseif ($d_harga_jurusan['tipe_harga'] == 'HARGA-') {
        $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
    } elseif ($d_harga_jurusan['tipe_harga'] == 'HARGA+') {
        $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
    } elseif ($d_harga_jurusan['tipe_harga'] == 'MINGGUAN') {
        $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
    } else {
        $frekuensi = $d_harga_jurusan['tipe_harga'];
    }

    //bila ada data frekuensi di attribunya (tidak NULL/ tidak kososng - terisi)
    if ($d_harga_jurusan['frekuensi_harga'] != NULL || $d_harga_jurusan['frekuensi_harga'] != 0) {
        $frekuensi = $d_harga_jurusan['frekuensi_harga'];
    }

    $sql_insert = "INSERT INTO tb_harga_pilih (
        id_praktik, 
        id_harga,
        tgl_input_harga_pilih,
        frekuensi_harga_pilih,
        kuantitas_harga_pilih,
        jumlah_harga_pilih
        ) VALUES (
            '" . $id_praktik . "', 
            '" . $d_harga_jurusan['id_harga'] . "',
            '" . date('Y-m-d') . "', 
            '" . $frekuensi . "',
            '" . $jumlah_praktik . "', 
            '" . $frekuensi * $jumlah_praktik * $d_harga_jurusan['jumlah_harga'] . "'
            )";

    echo $sql_insert;
    echo "<br>";
    $conn->query($sql_insert);
}
echo "<br>";



//SQL BST Eksekusi bila jurusan selain dari kedokteran
if ($d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] != 1) {
    $sql_harga_jenjang = " SELECT * FROM tb_harga 
        JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
        JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
        WHERE tb_harga.id_jenjang_pdd = " . $id_jenjang_pdd . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 6
        ORDER BY nama_jenjang_pdd ASC
        ";

    $q_harga_jenjang = $conn->query($sql_harga_jenjang);

    while ($d_harga_jenjang = $q_harga_jenjang->fetch(PDO::FETCH_ASSOC)) {
        if ($d_harga_jenjang['tipe_harga'] == 'SEKALI') {
            $frekuensi = 1;
        } elseif ($d_harga_jenjang['tipe_harga'] == 'INPUT') {
            echo "INPUT";
        } elseif ($d_harga_jenjang['tipe_harga'] == 'HARGA-') {
            $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_harga_jenjang['tipe_harga'] == 'HARGA+') {
            $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_harga_jenjang['tipe_harga'] == 'MINGGUAN') {
            $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
        } else {
            $frekuensi = $d_harga_jenjang['tipe_harga'];
        }

        $sql_insert_harga_jenjang = " INSERT INTO tb_harga_pilih (
                id_praktik, 
                id_harga, 
                tgl_input_harga_pilih, 
                frekuensi_harga_pilih,
                kuantitas_harga_pilih,
                jumlah_harga_pilih
            ) VALUES (
                '" . $id_praktik . "', 
                '" . $d_harga_jenjang['id_harga'] . "', 
                '" . date('Y-m-d') . "', 
                '" . $frekuensi . "', 
                '" . $jumlah_praktik . "', 
                '" . $frekuensi * $jumlah_praktik * $d_harga_jenjang['jumlah_harga'] . "'
            )";

        echo $sql_insert_harga_jenjang;
        echo "<br>";
        $conn->query($sql_insert_harga_jenjang);
    }
}
echo "<br><br>";

//SQL Harga Ujian 
$cek_pilih_ujian = $_POST['cek_pilih_ujian'];

echo $cek_pilih_ujian . "<br>";
if ($cek_pilih_ujian == 'y') {
    if ($d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] == 1) {
        $sql = "AND tb_harga.id_harga_jenis = 1";
    } else {
        $sql = "AND tb_harga.id_jurusan_pdd_jenis BETWEEN 2 AND 4";
    }
    $sql_harga_ujian = " SELECT * FROM tb_harga 
            JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
            JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
            WHERE tb_harga.id_harga_jenis = 6 AND tb_harga.id_jurusan_pdd_jenis = " . $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] . "
            ORDER BY nama_harga_jenis ASC
        ";

    $q_harga_ujian = $conn->query($sql_harga_ujian);

    while ($d_harga_ujian = $q_harga_ujian->fetch(PDO::FETCH_ASSOC)) {
        if ($d_harga_ujian['tipe_harga'] == 'SEKALI') {
            $frekuensi = 1;
        } elseif ($d_harga_ujian['tipe_harga'] == 'INPUT') {
            echo "INPUT";
        } elseif ($d_harga_ujian['tipe_harga'] == 'HARGA-') {
            $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_harga_ujian['tipe_harga'] == 'HARGA+') {
            $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
        } elseif ($d_harga_ujian['tipe_harga'] == 'MINGGUAN') {
            $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
        } else {
            $frekuensi = $d_harga_ujian['tipe_harga'];
        }

        $sql_insert_harga_ujian = " INSERT INTO tb_harga_pilih (
                id_praktik, 
                id_harga, 
                tgl_input_harga_pilih, 
                frekuensi_harga_pilih,
                kuantitas_harga_pilih,
                jumlah_harga_pilih
            ) VALUES (
                '" . $id_praktik . "', 
                '" . $d_harga_ujian['id_harga'] . "', 
                '" . date('Y-m-d') . "', 
                '" . $frekuensi . "', 
                '" . $jumlah_praktik . "', 
                '" . $frekuensi * $jumlah_praktik * $d_harga_ujian['jumlah_harga'] . "'
            )";

        echo $sql_insert_harga_ujian;
        echo "<br>";
        $conn->query($sql_insert_harga_ujian);
    }
}
echo "<br><br>";

$sql_update_status_praktik = " UPDATE tb_praktik
SET status_cek_praktik = 'DPH'
WHERE id_praktik = $id_praktik";

$conn->query($sql_update_status_praktik);
echo json_encode(['success' => 'Data Harga Berhasil Disimpan']);
// echo json_encode(['success' => 'Data Praktik Berhasil Disimpan']);
