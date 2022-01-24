<!-- Menu Harga Lainnya -->
<div class="text-gray-700">
    <h5 class="font-weight-bold">Menu Harga Ruangan dan Tempat</h5>
</div>
<?php
if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
    $sql = "WHERE tb_harga.id_jurusan_pdd_jenis = 1 AND tb_harga.id_harga_jenis BETWEEN 7 AND 8";
} else {
    $sql = "WHERE tb_harga.id_jurusan_pdd_jenis != 1 AND tb_harga.id_harga_jenis BETWEEN 7 AND 8";
}
$sql_harga_lainnya = " SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
                JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                $sql ORDER BY nama_harga_jenis ASC, nama_harga ASC
                ";

$q_harga_lainnya = $conn->query($sql_harga_lainnya);
$r_harga_lainnya = $q_harga_lainnya->rowCount();

if ($r_harga_lainnya > 0) {
?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Jenis</th>
                <th scope="col">Nama Harga</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($d_harga_lainnya = $q_harga_lainnya->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $d_harga_lainnya['nama_harga_jenis']; ?></td>
                    <td><?php echo $d_harga_lainnya['nama_harga']; ?></td>
                    <td><?php echo $d_harga_lainnya['nama_harga_satuan']; ?></td>
                    <td><?php echo "Rp " . number_format($d_harga_lainnya['jumlah_harga'], 0, ",", "."); ?></td>
                    <td>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sewa_tempat_harga<?php echo $d_harga_lainnya['id_harga']; ?>" name="sewa_tempat_harga" value="<?php echo $d_harga_lainnya['id_harga']; ?>" class="custom-control-input" required>
                            <label class="custom-control-label" for="sewa_tempat_harga<?php echo $d_harga_lainnya['id_harga']; ?>">Pilih <?php echo $d_harga_lainnya['nama_harga']; ?></label>
                        </div>
                    </td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
<?php
} else {
?>
    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
        <h5 class="text-center">Data Harga Tidak Ada</h5>
    </div>
<?php
}


if (isset($_POST['pilih_harga'])) {

    $id_praktik = $_POST['id_praktik'];

    //SQL Praktikan
    $sql_praktik = "SELECT * FROM tb_praktik 
    WHERE tb_praktik.id_praktik = " . $id_praktik;

    $q_praktik = $conn->query($sql_praktik);
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

    //SQL HARGA Wajib sesauikan dengan Jurusan dan Jenis Jurusan
    $sql_harga_jurusan = " SELECT * FROM tb_harga 
    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
    WHERE tb_harga.id_jurusan_pdd_jenis = " . $d_praktik['id_jurusan_pdd_jenis'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 5
    ORDER BY nama_harga_jenis ASC, nama_harga ASC 
    ";

    $q_harga_jurusan = $conn->query($sql_harga_jurusan);
    while ($d_harga_jurusan = $q_harga_jurusan->fetch(PDO::FETCH_ASSOC)) {

        if ($d_harga_jurusan['tipe_harga'] == 'SEKALI') {
            $ferkuensi = 1;
        } elseif ($d_harga_jurusan['tipe_harga'] == 'INPUT') {
            echo "INPUT";
        } elseif ($d_harga_jurusan['tipe_harga'] == 'HARGA-') {
            $ferkuensi = tanggal_between_nonweekend($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
        } elseif ($d_harga_jurusan['tipe_harga'] == 'HARGA+') {
            $ferkuensi = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
        } elseif ($d_harga_jurusan['tipe_harga'] == 'MINGGUAN') {
            $ferkuensi = tanggal_between_week($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
        } else {
            $ferkuensi = $d_harga_jurusan['tipe_harga'];
        }
        $sql_insert_harga_jurusan = " INSERT INTO tb_harga_pilih (
            id_praktik, 
            id_harga, 
            tgl_input_harga_pilih, 
            frekuensi_harga_pilih,
            kuantitas_harga_pilih,
            jumlah_harga_pilih)
        VALUES (
            '" . $id_praktik . "', 
            '" . $d_harga_jurusan['id_harga'] . "', 
            '" . date('Y-m-d') . "', 
            '" . $ferkuensi . "', 
            '" . $d_praktik['jumlah_praktik'] . "', 
            '" . $ferkuensi * $d_praktik['jumlah_praktik'] * $d_harga_jurusan['jumlah_harga'] . "'
        )";

        // echo $sql_insert_harga_jurusan . "<br>";
        $conn->query($sql_insert_harga_jurusan);
    }

    //SQL BST Eksekusi bila jurusan selain dari kedokteran
    if ($d_praktik['id_jurusan_pdd_jenis'] != 1) {
        $sql_harga_jenjang = " SELECT * FROM tb_harga 
        JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
        JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
        WHERE tb_harga.id_jenjang_pdd = " . $d_praktik['id_jenjang_pdd'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 6
        ORDER BY nama_jenjang_pdd ASC
        ";

        $q_harga_jenjang = $conn->query($sql_harga_jenjang);

        while ($d_harga_jenjang = $q_harga_jenjang->fetch(PDO::FETCH_ASSOC)) {
            if ($d_harga_jenjang['tipe_harga'] == 'SEKALI') {
                $ferkuensi = 1;
            } elseif ($d_harga_jenjang['tipe_harga'] == 'INPUT') {
                echo "INPUT";
            } elseif ($d_harga_jenjang['tipe_harga'] == 'HARGA-') {
                $ferkuensi = tanggal_between_nonweekend($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
            } elseif ($d_harga_jenjang['tipe_harga'] == 'HARGA+') {
                $ferkuensi = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
            } elseif ($d_harga_jenjang['tipe_harga'] == 'MINGGUAN') {
                $ferkuensi = tanggal_between_week($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
            } else {
                $ferkuensi = $d_harga_jenjang['tipe_harga'];
            }

            $sql_insert_harga_jenjang = " INSERT INTO tb_harga_pilih (
                id_praktik, 
                id_harga, 
                tgl_input_harga_pilih, 
                frekuensi_harga_pilih,
                kuantitas_harga_pilih,
                jumlah_harga_pilih)
            VALUES (
                '" . $id_praktik . "', 
                '" . $d_harga_jenjang['id_harga'] . "', 
                '" . date('Y-m-d') . "', 
                '" . $ferkuensi . "', 
                '" . $d_praktik['jumlah_praktik'] . "', 
                '" . $ferkuensi * $d_praktik['jumlah_praktik'] * $d_harga_jenjang['jumlah_harga'] . "'
            )";

            // echo $sql_insert_harga_jenjang . "<br>";
            $conn->query($sql_insert_harga_jenjang);
        }
    }
    echo "<br><br>";

    //SQL Harga Ujian 
    $cek_harga_ujian = $_POST['cek_harga_ujian'];
    if ($cek_harga_ujian == 'y') {
        if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
            $sql = "AND tb_harga.id_harga_jenis = 1";
        } else {
            $sql = "AND tb_harga.id_jurusan_pdd_jenis BETWEEN 2 AND 4";
        }
        $sql_harga_ujian = " SELECT * FROM tb_harga 
            JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
            JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
            WHERE tb_harga.id_harga_jenis = 6 AND tb_harga.id_jurusan_pdd_jenis = " . $d_praktik['id_jurusan_pdd_jenis'] . "
            ORDER BY nama_harga_jenis ASC
        ";

        $q_harga_ujian = $conn->query($sql_harga_ujian);

        while ($d_harga_ujian = $q_harga_ujian->fetch(PDO::FETCH_ASSOC)) {
            if ($d_harga_ujian['tipe_harga'] == 'SEKALI') {
                $ferkuensi = 1;
            } elseif ($d_harga_ujian['tipe_harga'] == 'INPUT') {
                echo "INPUT";
            } elseif ($d_harga_ujian['tipe_harga'] == 'HARGA-') {
                $ferkuensi = tanggal_between_nonweekend($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
            } elseif ($d_harga_ujian['tipe_harga'] == 'HARGA+') {
                $ferkuensi = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
            } elseif ($d_harga_ujian['tipe_harga'] == 'MINGGUAN') {
                $ferkuensi = tanggal_between_week($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
            } else {
                $ferkuensi = $d_harga_ujian['tipe_harga'];
            }

            $sql_insert_harga_ujian = " INSERT INTO tb_harga_pilih (
                id_praktik, 
                id_harga, 
                tgl_input_harga_pilih, 
                frekuensi_harga_pilih,
                kuantitas_harga_pilih,
                jumlah_harga_pilih)
            VALUES (
                '" . $id_praktik . "', 
                '" . $d_harga_ujian['id_harga'] . "', 
                '" . date('Y-m-d') . "', 
                '" . $ferkuensi . "', 
                '" . $d_praktik['jumlah_praktik'] . "', 
                '" . $ferkuensi * $d_praktik['jumlah_praktik'] * $d_harga_ujian['jumlah_harga'] . "'
            )";

            // echo $sql_insert_harga_ujian . "<br>";
            $conn->query($sql_insert_harga_ujian);
        }
    }
    echo "<br><br>";

    //SQL Harga Lainnya
    $sewa_tempat_harga = $_POST['sewa_tempat_harga'];
    $sql_harga_lainnya = " SELECT * FROM tb_harga 
    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis
    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
    WHERE tb_harga.id_harga = $sewa_tempat_harga
    ";

    $q_harga_lainnya = $conn->query($sql_harga_lainnya);
    $d_harga_lainnya = $q_harga_lainnya->fetch(PDO::FETCH_ASSOC);

    $sql_insert_harga_lainnya = " INSERT INTO tb_harga_pilih (
            id_praktik, 
            id_harga, 
            tgl_input_harga_pilih, 
            frekuensi_harga_pilih,
            kuantitas_harga_pilih,
            jumlah_harga_pilih)
        VALUES (
            '" . $id_praktik . "', 
            '" . $d_harga_lainnya['id_harga'] . "', 
            '" . date('Y-m-d') . "', 
            '1', 
            '1', 
            '" . $d_harga_lainnya['jumlah_harga'] . "'
        )";

    // echo $sql_insert_harga_lainnya . "<br>";
    $conn->query($sql_insert_harga_lainnya);

    //SQL ubah status praktik
    $sql_ubah_status_praktik = "UPDATE tb_praktik
    SET status_cek_praktik = 'HARGA'
    WHERE id_praktik = " . $d_praktik['id_praktik'];
    $conn->query($sql_ubah_status_praktik);
    echo "
    <script type='text/javascript'>
        alert('Data Harga Sudah Disimpan');
        document.location.href = '?prk';
    </script>
    ";
}
