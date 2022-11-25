<?php if ($d_prvl['r_praktikan'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Praktikan</h1>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktikan = "SELECT * FROM tb_praktik ";
                $sql_praktikan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                $sql_praktikan .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                $sql_praktikan .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                $sql_praktikan .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                $sql_praktikan .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                $sql_praktikan .= " WHERE tb_praktik.status_praktik = 'Y' ";
                $sql_praktikan .= " ORDER BY tb_praktik.id_praktik DESC";
                // echo $sql_praktikan . "<br>";
                try {
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK-');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;">
                                        <br><br>

                                        <div class="col-sm-3 text-center">
                                            <b class="text-gray-800">INSTITUSI : </b><br><?= $d_praktik['nama_institusi']; ?><br>
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
                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                                            <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?= $d_praktik['jumlah_praktik']; ?>
                                        </div>
                                        <!-- tombol aksi/info proses  -->
                                        <div class="col-sm-3 my-auto  text-center">
                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?= $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"></i> Rincian Data
                                            </button>
                                            &nbsp;
                                            <a class="btn btn-primary btn-sm collapsed" href="?praktikan&u=<?= $d_praktik['id_praktik']; ?>" title="Ubah">
                                                <i class="far fa-edit"></i> Ubah Data
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data praktikan -->
                                <div id="collapse<?= $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?= $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: medium;">
                                        <!-- data praktikan -->
                                        <div class="text-gray-700">
                                            <h4 class="font-weight-bold">DATA PRAKTIKAN</h4><br>
                                        </div>
                                        <?php
                                        $sql_data_praktikan = "SELECT * FROM tb_praktikan ";
                                        $sql_data_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
                                        $sql_data_praktikan .= " WHERE tb_praktik.id_praktik = " . $d_praktik['id_praktik'];
                                        $sql_data_praktikan .= " AND tb_praktikan.status_praktikan = 'Y'";
                                        $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
                                        // echo "$sql_data_praktikan<br>";
                                        try {
                                            $q_data_praktikan = $conn->query($sql_data_praktikan);
                                        } catch (Exception $ex) {
                                            echo "<script>alert('$ex -DATA PRAKTIK-');";
                                            echo "document.location.href='?error404';</script>";
                                        }
                                        $r_data_praktikan = $q_data_praktikan->rowCount();

                                        if ($r_data_praktikan > 0) {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama</th>
                                                            <th scope="col">NIM / NPM / NIS </th>
                                                            <th scope="col">No. HP</th>
                                                            <th scope="col">No. WA</th>
                                                            <th scope="col">EMAIL</th>
                                                            <th scope="col">ASAL KOTA / KABUPATEN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $total_jumlah_tarif = 0;
                                                        $no = 1;
                                                        while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?= $no; ?></th>
                                                                <td><?= $d_data_praktikan['nama_praktikan']; ?></td>
                                                                <td><?= $d_data_praktikan['no_id_praktikan']; ?></td>
                                                                <td><?= $d_data_praktikan['telp_praktikan']; ?></td>
                                                                <td><?= $d_data_praktikan['wa_praktikan']; ?></td>
                                                                <td><?= $d_data_praktikan['email_praktikan']; ?></td>
                                                                <td><?= $d_data_praktikan['kota_kab_praktikan']; ?></td>
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
                                                        <h5 class="text-center">Data Praktikan Tidak Ada</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-gray-800">
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Pendaftaran Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
