<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

//Mencari id_jurusan_pdd_jenis
$id_jurusan_pdd = $_GET['jur'];
$sql_jurusan_pdd_jenis = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd = " . $id_jurusan_pdd;
$q_jurusan_pdd_jenis = $conn->query($sql_jurusan_pdd_jenis);
$d_jurusan_pdd_jenis = $q_jurusan_pdd_jenis->fetch(PDO::FETCH_ASSOC);

//Mencari id_jenjang_pdd
$id_jenjang_pdd = $_GET['jen'];
$sql_jurusan_pdd_jenis = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd = " . $id_jurusan_pdd;
$q_jurusan_pdd_jenis = $conn->query($sql_jurusan_pdd_jenis);
$d_jurusan_pdd_jenis = $q_jurusan_pdd_jenis->fetch(PDO::FETCH_ASSOC);

$tgl_mulai_praktik = $_GET['tmp'];
$tgl_selesai_praktik = $_GET['tsp'];
$jumlah_praktik = $_GET['jum'];

?>

<!-- Menu Harga wajib disesuaikan dengan jenis jurusan -->
<div class="text-gray-700">
    <h5 class="font-weight-bold">Menu Harga Wajib <?php echo $d_jurusan_pdd_jenis['nama_jurusan_pdd']; ?></h5>
</div>
<?php
$sql_harga_jurusan = " SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan  
                WHERE tb_harga.id_jurusan_pdd_jenis = " . $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 5
                ORDER BY nama_harga_jenis ASC, nama_harga ASC 
                ";

// echo $sql_harga_jurusan . "<br>";
$q_harga_jurusan = $conn->query($sql_harga_jurusan);
$r_harga_jurusan = $q_harga_jurusan->rowCount();

if ($r_harga_jurusan > 0) {
?>
    <table class="table table-hover text-md">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Jenis</th>
                <th scope="col">Nama Harga</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Frekuensi</th>
                <th scope="col">Kuantitas</th>
                <th scope="col">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $jumlah_total_harga = 0;
            $no = 1;
            while ($d_harga_jurusan = $q_harga_jurusan->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $d_harga_jurusan['nama_harga_jenis']; ?></td>
                    <td><?php echo $d_harga_jurusan['nama_harga']; ?></td>
                    <td><?php echo $d_harga_jurusan['nama_harga_satuan']; ?></td>
                    <td><?php echo "Rp " . number_format($d_harga_jurusan['jumlah_harga'], 0, ",", "."); ?></td>
                    <td>
                        <?php

                        if ($d_harga_jurusan['tipe_harga'] == 'SEKALI') {
                            $ferkuensi = 1;
                        } elseif ($d_harga_jurusan['tipe_harga'] == 'INPUT') {
                        ?>
                            <input class="form-control" name="<?php echo $d_harga_jurusan['id_harga'] ?>">
                        <?php
                        } elseif ($d_harga_jurusan['tipe_harga'] == 'HARGA-') {
                            $ferkuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
                        } elseif ($d_harga_jurusan['tipe_harga'] == 'HARGA+') {
                            $ferkuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
                        } elseif ($d_harga_jurusan['tipe_harga'] == 'MINGGUAN') {
                            $ferkuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
                        } else {
                            $ferkuensi = $d_harga_jurusan['tipe_harga'];
                        }
                        echo $ferkuensi;
                        ?>
                    </td>
                    <td><?php echo $jumlah_praktik; ?></td>
                    <td>
                        <?php echo "Rp " . number_format($ferkuensi * $jumlah_praktik * $d_harga_jurusan['jumlah_harga'], 0, ",", "."); ?>
                    </td>
                    <?php
                    $jumlah_total_harga = ($ferkuensi * $jumlah_praktik * $d_harga_jurusan['jumlah_harga']) + $jumlah_total_harga;
                    $no++;
                    ?>
                </tr>
                <?php
            }

            //eksekusi bila jurusan selain dari kedokteran
            if ($d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] != 1) {
                $sql_harga_jenjang = " SELECT * FROM tb_harga 
                                    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                                    JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                                    JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
                                    WHERE tb_harga.id_jenjang_pdd = " . $id_jenjang_pdd . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 6
                                    ORDER BY nama_jenjang_pdd ASC
                                    ";

                // echo "<br>" . $sql_harga_jenjang;
                $q_harga_jenjang = $conn->query($sql_harga_jenjang);
                $r_harga_jenjang = $q_harga_jenjang->rowCount();

                while ($d_harga_jenjang = $q_harga_jenjang->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $d_harga_jenjang['nama_harga_jenis']; ?></td>
                        <td><?php echo $d_harga_jenjang['nama_harga']; ?></td>
                        <td><?php echo $d_harga_jenjang['nama_harga_satuan']; ?></td>
                        <td><?php echo "Rp " . number_format($d_harga_jenjang['jumlah_harga'], 0, ",", "."); ?></td>
                        <td>
                            <?php

                            if ($d_harga_jenjang['tipe_harga'] == 'SEKALI') {
                                $ferkuensi = 1;
                            } elseif ($d_harga_jenjang['tipe_harga'] == 'INPUT') {
                            ?>
                                <input class="form-control" name="<?php echo $d_harga_jenjang['id_harga'] ?>">
                            <?php
                            } elseif ($d_harga_jenjang['tipe_harga'] == 'HARGA-') {
                                $ferkuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
                            } elseif ($d_harga_jenjang['tipe_harga'] == 'HARGA+') {
                                $ferkuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
                            } elseif ($d_harga_jenjang['tipe_harga'] == 'MINGGUAN') {
                                $ferkuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
                            } else {
                                $ferkuensi = $d_harga_jenjang['tipe_harga'];
                            }
                            echo $ferkuensi;
                            ?>
                        </td>
                        <td><?php echo $jumlah_praktik; ?></td>
                        <td><?php echo "Rp " . number_format($ferkuensi * $jumlah_praktik * $d_harga_jenjang['jumlah_harga'], 0, ",", "."); ?></td>
                    </tr>
            <?php
                    $jumlah_total_harga = ($ferkuensi * $jumlah_praktik * $d_harga_jenjang['jumlah_harga']) + $jumlah_total_harga;
                    $no++;
                }
            }
            ?>
            <tr>
                <td colspan="7" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                <td class="font-weight-bold"><?php echo "Rp " . number_format($jumlah_total_harga, 0, ",", "."); ?></td>
            </tr>
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
?>

<!-- Menu Harga Ujian disesuaikan dengan Jenis Jurusan -->
<div class="text-gray-700">
    <h5 class="font-weight-bold">Menu Harga Ujian <?php echo $d_praktik['nama_jurusan_pdd_jenis']; ?></h5>
</div>
<br>
<div class="custom-control custom-radio">
    <input type="radio" id="cek_harga_ujian1" name="cek_harga_ujian" value="y" class="custom-control-input" required>
    <label class="custom-control-label" for="cek_harga_ujian1">Pakai Ujian</label>
</div>
<div class="custom-control custom-radio">
    <input type="radio" id="cek_harga_ujian2" name="cek_harga_ujian" value="t" class="custom-control-input" required>
    <label class="custom-control-label" for="cek_harga_ujian2">Tidak Pakai Ujian</label>
</div>
<br>

<?php
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

// echo $sql_harga_ujian;
$q_harga_ujian = $conn->query($sql_harga_ujian);
$r_harga_ujian = $q_harga_ujian->rowCount();

if ($r_harga_ujian > 0) {
?>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tre>
                <th scope="col">No</th>
                <th scope="col">Nama Jenis</th>
                <th scope="col">Nama Harga</th>
                <th scope="col">Satuan</th>
                <th scope="col">Harga</th>
                <th scope="col">Frekuensi</th>
                <th scope="col">Kuantitas</th>
                <th scope="col">Total Harga</th>
            </tre>
        </thead>
        <tbody>
            <?php
            $jumlah_total_ujian = 0;
            $no = 1;
            while ($d_harga_ujian = $q_harga_ujian->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $d_harga_ujian['nama_harga_jenis']; ?></td>
                    <td><?php echo $d_harga_ujian['nama_harga']; ?></td>
                    <td><?php echo $d_harga_ujian['nama_harga_satuan']; ?></td>
                    <td> <?php echo "Rp " . number_format($d_harga_ujian['jumlah_harga'], 0, ",", "."); ?></td>
                    <td>
                        <?php

                        if ($d_harga_ujian['tipe_harga'] == 'SEKALI') {
                            $ferkuensi = 1;
                        } elseif ($d_harga_ujian['tipe_harga'] == 'INPUT') {
                        ?>
                            <input class="form-control" name="<?php echo $d_praktik['id_praktik'] . "-" . $d_harga_ujian['id_harga'] ?>">
                        <?php
                        } elseif ($d_harga_ujian['tipe_harga'] == 'HARGA-') {
                            $ferkuensi = tanggal_between_nonweekend($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
                        } elseif ($d_harga_ujian['tipe_harga'] == 'HARGA+') {
                            $ferkuensi = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
                        } elseif ($d_harga_ujian['tipe_harga'] == 'MINGGUAN') {
                            $ferkuensi = tanggal_between_week($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);
                        } else {
                            $ferkuensi = $d_harga_ujian['tipe_harga'];
                        }
                        echo $ferkuensi;
                        ?>
                    </td>
                    <td><?php echo $d_praktik['jumlah_praktik']; ?></td>
                    <td><?php echo "Rp " . number_format($ferkuensi * $d_praktik['jumlah_praktik'] * $d_harga_ujian['jumlah_harga'], 0, ",", "."); ?></td>
                </tr>
            <?php
                $jumlah_total_ujian = ($ferkuensi * $d_praktik['jumlah_praktik'] * $d_harga_ujian['jumlah_harga']) + $jumlah_total_ujian;
                $no++;
            }
            ?>
            <tr>
                <td colspan="7" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                <td class="font-weight-bold"><?php echo "Rp " . number_format($jumlah_total_ujian, 0, ",", "."); ?></td>
            </tr>
        </tbody>
    </table>
<?php
} else {
?>
    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
        <h5 class="text-center">Data Harga Tidak Ada</h5>
    </div>
<?php
} ?>