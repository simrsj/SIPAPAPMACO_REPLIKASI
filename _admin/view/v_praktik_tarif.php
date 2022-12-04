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
                                            <?php if ($d_prvl['c_praktik_tarif'] == 'Y') { ?>
                                                <div class="col text-right">
                                                    <!-- tombol modal tambah permbimbing  -->
                                                    <a title="tambah praktikan" class="btn btn-success btn-sm " href="?ptrf=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&i">
                                                        <i class="fas fa-plus"></i> Tambah Tarif
                                                    </a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        if ($r_praktik_tarif > 0) {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="<?= md5('table' . $d_praktik['id_praktik']) ?>">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Jenis tarif</th>
                                                            <th scope="col">Nama Tarif </th>
                                                            <th scope="col">Tarif </th>
                                                            <th scope="col">Satuan </th>
                                                            <th scope="col">Frekuensi </th>
                                                            <th scope="col">Kuantitas </th>
                                                            <th scope="col">Total Tarif </th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $total_jumlah_tarif = 0;
                                                        $no = 1;
                                                        while ($d_praktik_tarif = $q_praktik_tarif->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr class="text-center align-middle my-auto">
                                                                <td class="align-middle "><?= $no; ?></td>
                                                                <td class="align-middle "><?= $d_praktik_tarif['nama_jenis_tarif_pilih']; ?></td>
                                                                <td class="align-middle "><?= $d_praktik_tarif['nama_tarif_pilih']; ?></td>
                                                                <td class="align-middle "><?= "Rp " . number_format($d_praktik_tarif['nominal_tarif_pilih'], 0, ",", "."); ?></td>
                                                                <td class="align-middle "><?= $d_praktik_tarif['nama_satuan_tarif_pilih']; ?></td>
                                                                <td class="align-middle "><?= $d_praktik_tarif['frekuensi_tarif_pilih']; ?></td>
                                                                <td class="align-middle "><?= $d_praktik_tarif['kuantitas_tarif_pilih']; ?></td>
                                                                <td class="align-middle "> <?= "Rp " . number_format($d_praktik_tarif['jumlah_tarif_pilih'], 0, ",", "."); ?></td>
                                                                <td class="align-middle ">
                                                                    <?php if ($d_praktik_tarif['status_tarif_pilih'] == 'Y') { ?>
                                                                        <span class="badge badge-success">Aktif</span>
                                                                    <?php } else if ($d_praktik_tarif['status_tarif_pilih'] == 'T') { ?>
                                                                        <span class="badge badge-danger">Tidak Aktif</span>
                                                                    <?php } else { ?>
                                                                        <span class="badge badge-danger">ERROR!!!</span>
                                                                    <?php } ?>
                                                                </td>
                                                                <td class="align-middle ">
                                                                    <?= $d_praktik_tarif['status_tarif_pilih']; ?>
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
                        <hr class="bg-gray-800">
                        <script>
                            $(document).ready(function() {
                                $("#<?= md5('table' . $d_praktik['id_praktik']) ?>").dataTable();
                            });
                        </script>
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
