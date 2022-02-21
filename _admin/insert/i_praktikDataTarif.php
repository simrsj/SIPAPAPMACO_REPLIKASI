<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

//Mencari id_jurusan_pdd_jenis
$id_jurusan_pdd = $_GET['jur'];
$sql_jurusan_pdd_jenis = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd = " . $id_jurusan_pdd;
$q_jurusan_pdd_jenis = $conn->query($sql_jurusan_pdd_jenis);
$d_jurusan_pdd_jenis = $q_jurusan_pdd_jenis->fetch(PDO::FETCH_ASSOC);

//Mencari id_jenjang_pdd
$id_jenjang_pdd = $_GET['jen'];
$sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd WHERE id_jenjang_pdd = " . $id_jenjang_pdd;
$q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
$d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC);

$tgl_mulai_praktik = $_GET['tmp'];
$tgl_selesai_praktik = $_GET['tsp'];
$jumlah_praktik = $_GET['jum'];
?>

<form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_tarif">
    <!-- Data Tarif Praktik  -->
    <div class='card shadow mb-4' id="tarif_praktik">
        <div class='card-body'>
            <div class="text-lg font-weight-bold text-center">DATA TARIF</div>
            <input type="hidden" name="path" id="path" value="<?php echo $_GET['i']; ?>">
            <!-- Menu Tarif wajib disesuaikan dengan jenis jurusan -->
            <div class="text-gray-700">
                <div class="h5 font-weight-bold text-center mt-2">Menu Tarif Wajib <?php echo $d_jurusan_pdd_jenis['nama_jurusan_pdd']; ?></div>
            </div>
            <hr>
            <?php
            $sql_tarif_jurusan = " SELECT * FROM tb_tarif 
                JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis 
                JOIN tb_jurusan_pdd_jenis ON tb_tarif.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan  
                WHERE tb_tarif.id_jurusan_pdd_jenis = " . $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] . " AND tb_tarif.id_tarif_jenis BETWEEN 1 AND 5
                ORDER BY nama_tarif_jenis ASC, nama_tarif ASC 
                ";

            // echo $sql_tarif_jurusan . "<br>";
            $q_tarif_jurusan = $conn->query($sql_tarif_jurusan);
            $r_tarif_jurusan = $q_tarif_jurusan->rowCount();

            if ($r_tarif_jurusan > 0) {
            ?>
                <table class="table table-hover text-md">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jenis</th>
                            <th scope="col">Nama Tarif</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tarif</th>
                            <th scope="col">Frekuensi</th>
                            <th scope="col">Kuantitas<span class="text-danger">*</span></th>
                            <th scope="col">Total Tarif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $jumlah_total_tarif = 0;
                        $no = 1;
                        while ($d_tarif_jurusan = $q_tarif_jurusan->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $d_tarif_jurusan['nama_tarif_jenis']; ?></td>
                                <td><?php echo $d_tarif_jurusan['nama_tarif']; ?></td>
                                <td><?php echo $d_tarif_jurusan['nama_tarif_satuan']; ?></td>
                                <td><?php echo "Rp " . number_format($d_tarif_jurusan['jumlah_tarif'], 0, ",", "."); ?></td>
                                <td>
                                    <?php

                                    if ($d_tarif_jurusan['tipe_tarif'] == 'SEKALI') {
                                        $frekuensi = 1;
                                    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'INPUT') {
                                    ?>
                                        <input class="form-control" name="<?php echo $d_tarif_jurusan['id_tarif'] ?>">
                                    <?php
                                    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'TARIF-') {
                                        $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
                                    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'TARIF+') {
                                        $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
                                    } elseif ($d_tarif_jurusan['tipe_tarif'] == 'MINGGUAN') {
                                        $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
                                    } else {
                                        $frekuensi = $d_tarif_jurusan['tipe_tarif'];
                                    }
                                    if ($d_tarif_jurusan['frekuensi_tarif'] != NULL || $d_tarif_jurusan['frekuensi_tarif'] != 0) {
                                        $frekuensi = $d_tarif_jurusan['frekuensi_tarif'];
                                    }
                                    echo $frekuensi;
                                    ?>
                                </td>
                                <td><?php echo $jumlah_praktik; ?></td>
                                <td>
                                    <?php echo "Rp " . number_format($frekuensi * $jumlah_praktik * $d_tarif_jurusan['jumlah_tarif'], 0, ",", "."); ?>
                                </td>
                                <?php
                                $jumlah_total_tarif = ($frekuensi * $jumlah_praktik * $d_tarif_jurusan['jumlah_tarif']) + $jumlah_total_tarif;
                                $no++;
                                ?>
                            </tr>
                            <?php
                        }

                        //eksekusi bila jurusan selain dari kedokteran
                        if ($d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] != 1) {
                            $sql_tarif_jenjang = " SELECT * FROM tb_tarif 
                                    JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis 
                                    JOIN tb_jenjang_pdd ON tb_tarif.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                                    JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan 
                                    WHERE tb_tarif.id_jenjang_pdd = " . $id_jenjang_pdd . " AND tb_tarif.id_tarif_jenis BETWEEN 1 AND 6
                                    ORDER BY nama_jenjang_pdd ASC
                                    ";

                            // echo $sql_tarif_jenjang . "<br>";    
                            $q_tarif_jenjang = $conn->query($sql_tarif_jenjang);
                            $r_tarif_jenjang = $q_tarif_jenjang->rowCount();

                            while ($d_tarif_jenjang = $q_tarif_jenjang->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_tarif_jenjang['nama_tarif_jenis']; ?></td>
                                    <td><?php echo $d_tarif_jenjang['nama_tarif']; ?></td>
                                    <td><?php echo $d_tarif_jenjang['nama_tarif_satuan']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_tarif_jenjang['jumlah_tarif'], 0, ",", "."); ?></td>
                                    <td>
                                        <?php

                                        if ($d_tarif_jenjang['tipe_tarif'] == 'SEKALI') {
                                            $frekuensi = 1;
                                        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'INPUT') {
                                        ?>
                                            <input class="form-control" name="<?php echo $d_tarif_jenjang['id_tarif'] ?>">
                                        <?php
                                        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'TARIF-') {
                                            $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
                                        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'TARIF+') {
                                            $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
                                        } elseif ($d_tarif_jenjang['tipe_tarif'] == 'MINGGUAN') {
                                            $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
                                        } else {
                                            $frekuensi = $d_tarif_jenjang['tipe_tarif'];
                                        }
                                        echo $frekuensi;
                                        ?>
                                    </td>
                                    <td><?php echo $jumlah_praktik; ?></td>
                                    <td><?php echo "Rp " . number_format($frekuensi * $jumlah_praktik * $d_tarif_jenjang['jumlah_tarif'], 0, ",", "."); ?></td>
                                </tr>
                        <?php
                                $jumlah_total_tarif = ($frekuensi * $jumlah_praktik * $d_tarif_jenjang['jumlah_tarif']) + $jumlah_total_tarif;
                                $no++;
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="7" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                            <td class="font-weight-bold"><?php echo "Rp " . number_format($jumlah_total_tarif, 0, ",", "."); ?></td>
                        </tr>
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                    <h5 class="text-center">Data Tarif Tidak Ada</h5>
                </div>
            <?php
            }
            ?>
            <hr>

            <!-- Menu Tarif Ujian disesuaikan dengan Jenis Jurusan -->
            <div class="text-gray-700">
                <div class="h5 font-weight-bold text-center mt-3 mb-3">Menu Tarif Ujian <?php echo $d_jurusan_pdd_jenis['nama_jurusan_pdd']; ?></div>
            </div>
            <div class="row boxed-check-group boxed-check-primary justify-content-center">
                <label class="boxed-check">
                    <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian1" value="y">
                    <div class="boxed-check-label">Ya</div>
                </label>
                &nbsp;
                &nbsp;
                <label class="boxed-check">
                    <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian2" value="t">
                    <div class="boxed-check-label">Tidak</div>
                </label>
            </div>
            <div class="justify-content-center text-center">
                <span class="text-danger font-weight-bold font-italic text-md" id="err_cek_pilih_ujian"></span>
                <br>
            </div>

            <?php
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

            // echo $sql_tarif_ujian;
            $q_tarif_ujian = $conn->query($sql_tarif_ujian);
            $r_tarif_ujian = $q_tarif_ujian->rowCount();

            if ($r_tarif_ujian > 0) {
            ?>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tre>
                            <th scope="col">No</th>
                            <th scope="col">Nama Jenis</th>
                            <th scope="col">Nama Tarif</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Tarif</th>
                            <th scope="col">Frekuensi</th>
                            <th scope="col">Kuantitas<span class="text-danger">*</span></th>
                            <th scope="col">Total Tarif</th>
                        </tre>
                    </thead>
                    <tbody>
                        <?php
                        $jumlah_total_ujian = 0;
                        $no = 1;
                        while ($d_tarif_ujian = $q_tarif_ujian->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td><?php echo $d_tarif_ujian['nama_tarif_jenis']; ?></td>
                                <td><?php echo $d_tarif_ujian['nama_tarif']; ?></td>
                                <td><?php echo $d_tarif_ujian['nama_tarif_satuan']; ?></td>
                                <td> <?php echo "Rp " . number_format($d_tarif_ujian['jumlah_tarif'], 0, ",", "."); ?></td>
                                <td>
                                    <?php

                                    if ($d_tarif_ujian['tipe_tarif'] == 'SEKALI') {
                                        $frekuensi = 1;
                                    } elseif ($d_tarif_ujian['tipe_tarif'] == 'INPUT') {
                                    ?>
                                        <input class="form-control" name="<?php echo $d_praktik['id_praktik'] . "-" . $d_tarif_ujian['id_tarif'] ?>">
                                    <?php
                                    } elseif ($d_tarif_ujian['tipe_tarif'] == 'TARIF-') {
                                        $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
                                    } elseif ($d_tarif_ujian['tipe_tarif'] == 'TARIF+') {
                                        $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
                                    } elseif ($d_tarif_ujian['tipe_tarif'] == 'MINGGUAN') {
                                        $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
                                    } else {
                                        $frekuensi = $d_tarif_ujian['tipe_tarif'];
                                    }
                                    echo $frekuensi;
                                    ?>
                                </td>
                                <td><?php echo $jumlah_praktik; ?></td>
                                <td><?php echo "Rp " . number_format($frekuensi * $jumlah_praktik * $d_tarif_ujian['jumlah_tarif'], 0, ",", "."); ?></td>
                            </tr>
                        <?php
                            $jumlah_total_ujian = ($frekuensi * $jumlah_praktik * $d_tarif_ujian['jumlah_tarif']) + $jumlah_total_ujian;
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
                    <h5 class="text-center">Data Tarif Tidak Ada</h5>
                </div>
            <?php
            }
            ?>

            <span class="text-md font-italic font-weight-bold"><span class="text-danger">*</span>Kuantitas = Jumlah Praktikan</span>
            <hr>
            <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                <button type="button" name="simpan_praktik" id="simpan_praktik" class="btn btn-outline-success" onclick="simpan_tarif()">
                    <!-- <a class="nav-link" href="#tarif"> -->
                    <i class="fas fa-check-circle"></i>
                    Simpan Data Praktik dan Data Tarif
                    <i class="fas fa-check-circle"></i>
                    <!-- </a> -->
                </button>
            </div>
        </div>
    </div>
</form>