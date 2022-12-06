<?php if (isset($_GET['ptrf']) && $d_prvl['r_praktik_tarif'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Tarif Praktik</h1>
            </div>
            <!-- <div class="col-lg-2 text-right">
            <a href="?dpk&a" class="btn btn-outline-info btn-sm">
                <i>
                    <i class="fas fa-archive"></i>
                </i>Arsip
            </a>
        </div> -->
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktik ";
                $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                $sql_praktik .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik ";
                $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                $sql_praktik .= " GROUP BY tb_praktikan.id_praktik ";
                $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                // echo "$sql_praktik<br>";
                try {
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {

                        $sql_praktik_tarif = "SELECT * FROM tb_tarif_pilih ";
                        $sql_praktik_tarif .= " JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik ";
                        $sql_praktik_tarif .= " WHERE tb_praktik.status_praktik = 'Y' AND tb_praktik.id_praktik = " . $d_praktik['id_praktik'];
                        $sql_praktik_tarif .= " ORDER BY tb_tarif_pilih.nama_tarif_pilih ASC";
                        // echo "$sql_praktik_tarif<br>";
                        try {
                            $q_praktik_tarif = $conn->query($sql_praktik_tarif);
                        } catch (Exception $ex) {
                            echo "<script>alert('$ex -DATA PRAKTIK');";
                            echo "document.location.href='?error404';</script>";
                        }
                        $r_praktik_tarif = $q_praktik_tarif->rowCount();
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;" class="justify-content-center">
                                        <br><br>
                                        <div class="col-sm-4 text-center">
                                            <?php if ($_SESSION['level_user'] == 1) { ?>
                                                <b class="text-gray-800">INSTITUSI : </b><br><?= $d_praktik['nama_institusi']; ?><br>
                                            <?php } ?>
                                            <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?= $d_praktik['nama_praktik']; ?>
                                        </div>

                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">TANGGAL MULAI : </b><br><?= tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                            <b class="text-gray-800">TANGGAL SELESAI : </b><br><?= tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">JURUSAN : </b><br><?= $d_praktik['nama_jurusan_pdd']; ?><br>
                                            <b class="text-gray-800">JENJANG : </b><br><?= $d_praktik['nama_jenjang_pdd']; ?>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                                            <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?= $d_praktik['jumlah_praktik']; ?>
                                        </div>
                                        <!-- tombol aksi/info proses  -->
                                        <div class="col-sm-1 my-auto text-right">
                                            <!-- tombol rincian -->
                                            <a class="btn btn-info btn-sm collapsed m-0 " data-toggle="collapse" data-target="#collapse<?= $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"></i> Rincian
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data pembimbing -->
                                <div id="collapse<?= $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?= $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: medium;">
                                        <!-- data praktikan -->
                                        <div class="row text-gray-700">
                                            <div class="col">
                                                <h4 class="font-weight-bold">Data Tarif</h4><br>
                                            </div>
                                            <?php if ($d_prvl['c_praktikan'] == 'Y') { ?>
                                                <div class="col-2 text-right">
                                                    <!-- tombol modal tambah praktikan  -->
                                                    <a title="tambah praktikan" class='btn btn-success btn-sm tambah_init<?= md5($d_praktik['id_praktik']); ?>' href='#' data-toggle="modal" data-target="#mi<?= md5($d_praktik['id_praktik']); ?>">
                                                        <i class="fas fa-plus"></i> Tambah Data
                                                    </a>

                                                    <!-- modal tambah praktikan  -->
                                                    <div class="modal fade text-center" id="mi<?= md5($d_praktik['id_praktik']); ?>" data-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header h5">
                                                                    Tambah Praktikan
                                                                </div>
                                                                <div class="modal-body text-md">
                                                                    <form class="form-data b" method="post" id="form_t<?= md5($d_praktik['id_praktik']); ?>">
                                                                        Jenis Tarif : <span style="color:red">*</span><br>
                                                                        <select class="select2" id="t_jenis_tarif">
                                                                            <?php
                                                                            $sql_jenis_tarif = "SELECT * FROM tb_tarif_jenis";
                                                                            $sql_jenis_tarif .= " ORDER BY nama_jenis_tarif ASC";
                                                                            try {
                                                                                $q_jenis_tarif = $conn->query($sql_jenis_tarif);
                                                                            } catch (Exception $ex) {
                                                                                echo "<script>alert('$ex -DATA JENIS TARIF');";
                                                                                echo "document.location.href='?error404';</script>";
                                                                            }
                                                                            while ($d_jenis_tarif = $q_jenis_tarif->fetch(PDO::FETCH_ASSOC)) {
                                                                            ?>
                                                                                <option value="<?= $d_jenis_tarif['id_tarif_jenis'] ?>">
                                                                                    <?= $d_jenis_tarif['nama_tarif_jenis'] ?>
                                                                                </option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_jenis_tarif"></div><br>
                                                                        Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                                                        <input type="text" id="t_nama<?= md5($d_praktik['id_praktik']); ?>" name="t_nama" class="form-control" placeholder="Inputkan Nama Siswa/Mahasiswa" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_nama"></div><br>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer text-md">
                                                                    <a class="btn btn-danger btn-sm tambah_tutup<?= md5($d_praktik['id_praktik']); ?>" data-dismiss="modal">
                                                                        Kembali
                                                                    </a>
                                                                    &nbsp;
                                                                    <a class="tambah btn btn-success btn-sm tambah<?= md5($d_praktik['id_praktik']); ?>" id="<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>">
                                                                        Simpan
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        if ($r_praktik_tarif > 0) {
                                        ?>
                                            <!-- inisiasi tabel data praktikan -->
                                            <div id="<?= md5("data" . $d_praktik['id_praktik']); ?>"></div>
                                            <script>
                                                $('#<?= md5("data" . $d_praktik['id_praktik']); ?>')
                                                    .load(
                                                        "_admin/view/v_praktik_tarifData.php?idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>&idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&tb=<?= md5($d_praktik['id_praktik']); ?>");
                                            </script>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="jumbotron">
                                                <div class="jumbotron-fluid">
                                                    <div class="text-gray-700">
                                                        <h5 class="text-center">Data Pembimbing dan Ruangan Tidak Ada</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-gray-800">
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Tarif Tidak Ada</h3>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
