<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Penilaian Praktikan</h1>
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
            // $sql_praktik .= " JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi  ";
            $sql_praktik .= " WHERE (tb_praktik.status_praktik = 'Y' OR tb_praktik.status_praktik = 'S' ) ";
            $sql_praktik .= " AND tb_institusi.id_institusi = " . $_SESSION['id_institusi'];
            $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";

            // echo $sql_praktik;

            $q_praktik = $conn->query($sql_praktik);
            $r_praktik = $q_praktik->rowCount();

            if ($r_praktik > 0) {
            ?>
                <?php
                while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {

                    $sql_data_praktikan = "SELECT * FROM tb_pembimbing_pilih ";
                    $sql_data_praktikan .= " JOIN tb_pembimbing ON tb_pembimbing_pilih.id_pembimbing = tb_pembimbing.id_pembimbing ";
                    $sql_data_praktikan .= " JOIN tb_praktikan ON tb_pembimbing_pilih.id_praktikan = tb_praktikan.id_praktikan ";
                    $sql_data_praktikan .= " JOIN tb_unit ON tb_pembimbing_pilih.id_unit = tb_unit.id_unit ";
                    $sql_data_praktikan .= " JOIN tb_praktik ON tb_pembimbing_pilih.id_praktik = tb_praktik.id_praktik ";
                    $sql_data_praktikan .= " WHERE (tb_praktik.status_praktik = 'Y' OR tb_praktik.status_praktik = 'S' ) AND tb_praktik.id_praktik = " . $d_praktik['id_praktik'];
                    $sql_data_praktikan .= " GROUP BY tb_pembimbing.nama_pembimbing";
                    $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";

                    $q_data_praktikan = $conn->query($sql_data_praktikan);
                    $q1_data_praktikan = $conn->query($sql_data_praktikan);
                    $r_data_praktikan = $q_data_praktikan->rowCount();
                    $d1_data_praktikan = $q1_data_praktikan->fetch(PDO::FETCH_ASSOC);
                ?>
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header align-items-center bg-gray-200">
                                <div class="row" style="font-size: small;" class="justify-content-center">
                                    <br><br>
                                    <div class="col-sm-3 text-center">
                                        <b class="text-gray-800">INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?><br>
                                        <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                    </div>

                                    <div class="col-sm-2 text-center">
                                        <b class="text-gray-800">TANGGAL MULAI : </b><br><?php echo tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                        <b class="text-gray-800">TANGGAL SELESAI : </b><br><?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <b class="text-gray-800">JURUSAN : </b><br><?php echo $d_praktik['nama_jurusan_pdd']; ?><br>
                                        <b class="text-gray-800">JENJANG : </b><br><?php echo $d_praktik['nama_jenjang_pdd']; ?>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <b class="text-gray-800">PROFESI : </b><br><?php echo $d_praktik['nama_profesi_pdd']; ?><br>
                                        <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?php echo $d_praktik['jumlah_praktik']; ?>
                                    </div>
                                    <!-- tombol aksi/info proses  -->
                                    <div class="col-sm-3 my-auto text-center">
                                        <!-- tombol rincian -->
                                        <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                            <i class="fas fa-info-circle"></i> Rincian Data
                                        </button>
                                        <?php
                                        //cek data nilai keperawatan
                                        $sql_getNilKep = " SELECT * FROM tb_nilai_kep ";
                                        $sql_getNilKep .= " WHERE id_praktik = " . $d_praktik['id_praktik'];
                                        $q_getNilKpep = $conn->query($sql_getNilKep);
                                        $r_getNilKpep = $q_getNilKpep->rowCount();
                                        if ($r_getNilKpep > 0) {
                                        ?>
                                            <hr>
                                            <a class="btn btn-success btn-sm" title="Unduh Nilai " target="_blank" href="./_print/p_praktikNilaiKep.php?ip=<?php echo $d_praktik['id_praktik'] ?>">
                                                <i class="fas fa-file-download"></i> Unduh Nilai
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <!-- collapse data praktikan -->
                            <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                <div class="card-body " style="font-size: medium;">
                                    <!-- data praktikan -->
                                    <div class="text-gray-700">
                                        <h4 class="font-weight-bold">DATA NILAI</h4><br>
                                    </div>
                                    <?php
                                    if ($r_data_praktikan > 0) {
                                    ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="myTable">
                                                <thead class="thead-dark text-center">
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Pembimbing </th>
                                                        <th scope="col">NIP / NIPK</th>
                                                        <th scope="col">Nama Ruangan</th>
                                                        <th scope="col">Data Nilai</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <div id="accordion_nilai">
                                                        <?php
                                                        $no = 1;
                                                        while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $no; ?></th>
                                                                <td><?php echo $d_data_praktikan['nama_pembimbing']; ?></td>
                                                                <td><?php echo $d_data_praktikan['no_id_pembimbing']; ?></td>
                                                                <td><?php echo $d_data_praktikan['nama_unit']; ?></td>

                                                                <!-- Data Nilai  -->
                                                                <td class="text-center">
                                                                    <?php

                                                                    //Nilai Keperawatan
                                                                    if ($d_data_praktikan['id_jurusan_pdd'] == 2) {
                                                                    ?>
                                                                        <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#nilai<?php echo $no; ?>" title="Rincian">
                                                                            <i class="fas fa-info-circle"></i> Rincian Nilai
                                                                        </button>
                                                                        <?php
                                                                    }
                                                                    // Nilai Selain Keperawatan 
                                                                    else {
                                                                        $sql_data_nilai_u = "SELECT * FROM tb_nilai_upload ";
                                                                        $sql_data_nilai_u .= " WHERE id_praktik = " . $d_data_praktikan['id_praktik'] . " AND id_pembimbing = " . $d_data_praktikan['id_pembimbing'];
                                                                        // echo "$sql_data_nilai<br>";

                                                                        $q_data_nilai_u = $conn->query($sql_data_nilai_u);
                                                                        $r_data_nilai_u = $q_data_nilai_u->rowCount();
                                                                        $d_data_nilai_u = $q_data_nilai_u->fetch(PDO::FETCH_ASSOC);
                                                                        if ($r_data_nilai_u > 0) {
                                                                        ?>
                                                                            <a href="<?php echo $d_data_nilai_u['file_nilai_upload']; ?>" target="_blank" class="btn btn-outline-success btn-sm">
                                                                                <i class="fas fa-file-download"></i> Unduh Nilai
                                                                            </a>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <span class="badge badge-danger"> Data Nilai Belum Diupload </span>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            if ($d_praktik['id_jurusan_pdd'] == 2) {
                                                            ?>
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <div id="nilai<?php echo $no; ?>" class="collapse text-center" aria-labelledby="nilai<?php echo $no; ?>" data-parent="#accordion_nilai">
                                                                            <div class="card-body " style="font-size: medium;">

                                                                                <?php
                                                                                $sql_nilai = "SELECT * FROM tb_nilai_kep ";
                                                                                $sql_nilai .= " JOIN tb_praktikan ON tb_nilai_kep.id_praktikan = tb_praktikan.id_praktikan";
                                                                                $sql_nilai .= " JOIN tb_pembimbing ON tb_nilai_kep.id_pembimbing = tb_pembimbing.id_pembimbing";
                                                                                $sql_nilai .= " JOIN tb_unit ON tb_nilai_kep.id_unit = tb_unit.id_unit";
                                                                                $sql_nilai .= " WHERE tb_nilai_kep.id_praktik = " . $d_data_praktikan['id_praktik'] . " AND tb_nilai_kep.id_pembimbing = " . $d_data_praktikan['id_pembimbing'];
                                                                                $sql_nilai .= " ORDER BY tb_praktikan.nama_praktikan ASC";

                                                                                // echo $sql_data_praktikan;

                                                                                $q_nilai = $conn->query($sql_nilai);
                                                                                $r_nilai = $q_nilai->rowCount();
                                                                                if ($r_nilai > 0) {
                                                                                ?>
                                                                                    <span class="table-responsive">
                                                                                        <table class="table table-striped">
                                                                                            <thead class="thead-dark">
                                                                                                <tr class="text-center">
                                                                                                    <th scope="col">No</th>
                                                                                                    <th scope="col">Nama</th>
                                                                                                    <th scope="col">NIM / NPM / NIS</th>
                                                                                                    <th scope="col">LP</th>
                                                                                                    <th scope="col">Pre-Post</th>
                                                                                                    <th scope="col">SPTK</th>
                                                                                                    <th scope="col">PENKES</th>
                                                                                                    <th scope="col">DOKEP</th>
                                                                                                    <th scope="col">KOMTER</th>
                                                                                                    <th scope="col">TAK</th>
                                                                                                    <th scope="col">KASUS</th>
                                                                                                    <th scope="col">UJIAN</th>
                                                                                                    <th scope="col">SIKAP</th>
                                                                                                    <th scope="col">KETERANGAN</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                $no1 = 1;
                                                                                                while ($d_nilai = $q_nilai->fetch(PDO::FETCH_ASSOC)) {
                                                                                                ?>
                                                                                                    <tr>
                                                                                                        <td><?php echo $no1; ?></td>
                                                                                                        <td><?php echo $d_nilai['nama_praktikan']; ?></td>
                                                                                                        <td class="text-center"><?php echo $d_nilai['no_id_praktikan']; ?></td>
                                                                                                        <td><?php echo $d_nilai['lp'] ?></td>
                                                                                                        <td><?php echo $d_nilai['prepost'] ?></td>
                                                                                                        <td><?php echo $d_nilai['sptk'] ?></td>
                                                                                                        <td><?php echo $d_nilai['penkes'] ?></td>
                                                                                                        <td><?php echo $d_nilai['dokep'] ?></td>
                                                                                                        <td><?php echo $d_nilai['komter'] ?></td>
                                                                                                        <td><?php echo $d_nilai['tak'] ?></td>
                                                                                                        <td><?php echo $d_nilai['kasus'] ?></td>
                                                                                                        <td><?php echo $d_nilai['ujian'] ?></td>
                                                                                                        <td><?php echo $d_nilai['sikap'] ?></td>
                                                                                                        <td><?php echo $d_nilai['ket_nilai'] ?></td>
                                                                                                    </tr>
                                                                                                <?php
                                                                                                    $no1++;
                                                                                                }
                                                                                                ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </span>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <div class="jumbotron">
                                                                                        <div class="jumbotron-fluid">
                                                                                            <div class="text-gray-700">
                                                                                                <h5 class="text-center">Data Nilai Tidak Ada</h5>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        <?php
                                                            $no++;
                                                        }
                                                        ?>
                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="jumbotron">
                                            <div class="jumbotron-fluid">
                                                <div class="text-gray-700">
                                                    <h5 class="text-center">Data Nilai Tidak Ada</h5>
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
                <h3 class='text-center'> Data Pendaftaran Praktikan Anda Tidak Ada</h3>
            <?php
            }
            ?>

        </div>
    </div>
</div>