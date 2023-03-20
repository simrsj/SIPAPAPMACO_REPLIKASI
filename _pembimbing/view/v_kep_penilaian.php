<?php if ($_SESSION['level_user'] == 4) { ?>
    <div class="container-fluid">
        <?php

        $exp_arr_ket = explode("*sm*", base64_decode(urldecode(hex2bin($_GET['ket']))));
        $ket = $exp_arr_ket[1];
        ?>
        <?php if ($_SESSION['ket_nilai'] == "TAMBAH") { ?>
            <div class="toast fixed-top topbar align-center mx-auto mt-5 shadow  " role="alert" aria-live="assertive" aria-atomic="true" id="toast_success">
                <div class="toast-header text-light bg-success">
                    Berhasil Ditambah
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#toast_success').toast("show");
                });
            </script>
            <?php unset($_SESSION['ket_nilai']); ?>
        <?php } else if ($ket == "UBAH") { ?>
            <!-- Create the toast message -->
            <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center fixed-top topbar  static-top shadow">

                <!-- Then put toasts within -->
                <div class="toast justify-content-center align-items-center fixed-top topbar  static-top shadow" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="10000" id="toast_primary">
                    <div class="toast-header  bg-primary text-light">
                        <strong class="mr-auto">Data Berhasil Dirubah</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="10000" id="">

                <!-- Create the toast header -->
                <div class="toast-header  bg-primary text-light">
                    <strong class="mr-auto">ERROR</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#toast_primary').toast("show");
                });
            </script>
            <?php unset($_SESSION['ket_nilai']); ?>
        <?php } ?>
        <div class="toast-container position-fixed bottom-0 right-0">

            <!-- Create the toast message -->
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="true" data-delay="10000" id="toast_success">

                <!-- Create the toast header -->
                <div class="toast-header  bg-success text-light">
                    <strong class="mr-auto">ERROR</strong>
                </div>

                <!-- Create the toast body -->
                <div class="toast-body">
                    ERRRO CUY
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Bimbingan Praktik</h1>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                try {
                    $sql_praktik = "SELECT * FROM tb_praktik ";
                    $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                    $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                    $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                    $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                    $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                    $sql_praktik .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik ";
                    $sql_praktik .= " JOIN tb_pembimbing_pilih ON tb_pembimbing_pilih.id_praktik = tb_praktikan.id_praktik ";
                    $sql_praktik .= " JOIN tb_pembimbing ON tb_pembimbing.id_pembimbing = tb_pembimbing_pilih.id_pembimbing ";
                    $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                    $sql_praktik .= " AND tb_pembimbing.id_pembimbing = " . $d_pembimbing['id_pembimbing'];
                    $sql_praktik .= " GROUP BY tb_praktikan.id_praktik";
                    $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                    // echo "$sql_praktik<br>";
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('-DATA PRAKTIK-');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;" class="justify-content-center">
                                        <br><br>
                                        <div class="col-md-4 text-center">
                                            <b class="text-gray-800">INSTITUSI : </b><br><?= $d_praktik['nama_institusi']; ?><br>
                                            <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?= $d_praktik['nama_praktik']; ?>
                                        </div>

                                        <div class="col-md-2 text-center">
                                            <b class="text-gray-800">TANGGAL MULAI : </b><br><?= tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                            <b class="text-gray-800">TANGGAL SELESAI : </b><br><?= tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <b class="text-gray-800">JURUSAN : </b><br><?= $d_praktik['nama_jurusan_pdd']; ?><br>
                                            <b class="text-gray-800">JENJANG : </b><br><?= $d_praktik['nama_jenjang_pdd']; ?>
                                        </div>
                                        <div class="col-md-2 text-center">
                                            <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                                            <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?= $d_praktik['jumlah_praktik']; ?>
                                        </div>
                                        <!-- tombol aksi/info proses  -->
                                        <div class="col-md-2 my-auto text-center">
                                            <!-- tombol rincian -->
                                            <a class="btn btn-info btn-sm collapsed m-0 " data-toggle="collapse" data-target="#rincian<?= md5($d_praktik['id_praktik']); ?>" title="Rincian">
                                                <i class="fas fa-info-circle"></i> Rincian
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data pembimbing -->
                                <div id="rincian<?= md5($d_praktik['id_praktik']); ?>" class="collapse" aria-labelledby="heading<?= md5($d_praktik['id_praktik']); ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: medium;">
                                        <!-- data praktikan -->
                                        <div class="row text-gray-700">
                                            <div class="col">
                                                <h4 class="font-weight-bold">DATA PENILAIAN</h4><br>
                                            </div>
                                            <?php
                                            try {
                                                $sql_praktik_pembimbing = "SELECT * FROM tb_praktik ";
                                                $sql_praktik_pembimbing .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik ";
                                                $sql_praktik_pembimbing .= " JOIN tb_pembimbing_pilih ON tb_pembimbing_pilih.id_praktikan = tb_praktikan.id_praktikan ";
                                                $sql_praktik_pembimbing .= " JOIN tb_pembimbing ON tb_pembimbing.id_pembimbing = tb_pembimbing_pilih.id_pembimbing ";
                                                $sql_praktik_pembimbing .= " WHERE tb_praktik.status_praktik = 'Y'";
                                                $sql_praktik_pembimbing .= " AND tb_praktik.id_praktik = " . $d_praktik['id_praktik'];
                                                $sql_praktik_pembimbing .= " GROUP BY tb_praktikan.id_praktikan";
                                                $sql_praktik_pembimbing .= " ORDER BY tb_praktikan.nama_praktikan ASC";
                                                // echo "$sql_praktik_pembimbing<br>";
                                                $q_praktik_pembimbing = $conn->query($sql_praktik_pembimbing);
                                                $r_praktik_pembimbing = $q_praktik_pembimbing->rowCount();
                                            } catch (Exception $ex) {
                                                echo "<script>alert('-DATA PRAKTIK');";
                                                echo "document.location.href='?error404';</script>";
                                            }

                                            if ($r_praktik_pembimbing > 0) {
                                            ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered" id="dataTable">
                                                        <thead class="thead-dark text-center">
                                                            <tr>
                                                                <th scope="col" class="align-middle">No<br></th>
                                                                <th scope="col" class="align-middle">Nama Praktikan</th>
                                                                <th scope="col" class="align-middle">No. Identitas</th>
                                                                <th class="align-middle">Laporan <br> Pendahuluan</th>
                                                                <th class="align-middle">Strategi Pelaksanaan Tindakan Keperawatan</th>
                                                                <th class="align-middle">Dokumentasi Asuhan Keperawatan Jiwa</th>
                                                                <th class="align-middle">Terapi Aktivitas<br>Kelompok</th>
                                                                <th class="align-middle">Sikap dan <br>Prilaku</th>
                                                                <th class="align-middle">Data Nilai</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="text-center">
                                                            <?php
                                                            $total_jumlah_tarif = 0;
                                                            $no = 1;
                                                            while ($d_praktik_pembimbing = $q_praktik_pembimbing->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <th scope="row"><?= $no; ?></th>
                                                                    <td><?= $d_praktik_pembimbing['nama_praktikan']; ?></td>
                                                                    <td><?= $d_praktik_pembimbing['no_id_praktikan']; ?></td>
                                                                    <!-- Nilai Laporan Pendahuluan  -->
                                                                    <td>
                                                                        <?php
                                                                        try {
                                                                            $sql_kep_nil_lap_pen = "SELECT * FROM tb_kep_nil_lap_pen ";
                                                                            $sql_kep_nil_lap_pen .= " WHERE id_praktikan = " . $d_praktik_pembimbing['id_praktikan'];
                                                                            // echo "$sql_praktik_pembimbing<br>";
                                                                            $q_kep_nil_lap_pen = $conn->query($sql_kep_nil_lap_pen);
                                                                            $r_kep_nil_lap_pen = $q_kep_nil_lap_pen->rowCount();
                                                                        } catch (Exception $ex) {
                                                                            echo "<script>alert('-DATA PRAKTIK');";
                                                                            echo "document.location.href='?error404';</script>";
                                                                        }
                                                                        ?>
                                                                        <?php if ($r_kep_nil_lap_pen < 1) { ?>
                                                                            <span class="badge badge-danger">Nilai Belum Ada</span><br>
                                                                            <a href="?kep_nil_lap_pen&data=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . "i"))) ?>&idp=<?= md5($d_praktik['id_praktik']); ?>&idprkn=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $d_praktik_pembimbing['id_praktikan']))) ?>" class="btn btn-outline-danger btn-sm">
                                                                                <i class="fa-regular fa-pen-to-square"></i> Isi
                                                                            </a>
                                                                        <?php } else { ?>
                                                                            <span class="badge badge-success">Nilai Sudah Ada</span><br>
                                                                            <a href="?kep_nil_lap_pen&data=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . "u"))) ?>&idp=<?= md5($d_praktik['id_praktik']); ?>&idprkn=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $d_praktik_pembimbing['id_praktikan']))) ?>" class="btn btn-outline-primary btn-sm">
                                                                                <i class="fa-regular fa-pen-to-square"></i> Ubah
                                                                            </a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <!-- Nilai Strategi Pelaksanaan Tindakan Keperawatan (SPTK)  -->
                                                                    <td></td>
                                                                    <!-- Dokumen Asuhan Keperawatan Jiwa -->
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>
                                                                        DATA NILAI
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
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
                        </div>
                        <script>
                            $(function() {
                                // check if there is a hash in the url
                                if (window.location.hash != '') {
                                    // remove any accordion panels that are showing (they have a class of 'in')
                                    $('.collapse').removeClass('in');

                                    // show the panel based on the hash now:
                                    $(window.location.hash + '.collapse').collapse('show');
                                }
                            });
                        </script>
                        <hr class="bg-gray-800">
                    <?php
                    }
                } else {
                    ?>
                    <div class="jumbotron">
                        <div class="jumbotron-fluid">
                            <h3 class='text-center'> Bimbingan Praktik Tidak Ada</h3>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
