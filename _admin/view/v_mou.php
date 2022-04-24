    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1 class="h4 text-gray-800">MoU Kerjasama</h1>
            </div>
            <div class="col-md-2 text-right my-auto">
                <a href="?mou&i" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div><br>


        <!-- Data Jumlah MoU -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-5 col-md-6 mb-4">
                <div class="card  shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center text-center">
                            <div class="col">
                                Berlaku (Aktif) : <br>
                                <span class="badge badge-success text-lg"><?php echo $dashboard_dma; ?></span>
                            </div>
                            <div class="col">
                                Tidak Berlaku (Non-Aktif) : <br>
                                <span class="badge badge-danger text-lg"><?php echo $dashboard_dmb; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-7 col-md-6 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center text-center">
                            <div class="col">
                                Belum Perpanjang : <br>
                                <span class="badge badge-danger text-lg"><?php echo $dashboard_dmbp; ?></span>
                            </div>
                            <div class="col">
                                Pengajuan Baru : <br>
                                <span class="badge badge-primary text-lg"><?php echo $dashboard_dmpb; ?></span>
                            </div>
                            <div class="col">
                                Pengajuan Perpanjang : <br>
                                <span class="badge badge-primary text-lg"><?php echo $dashboard_dmpl; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Tabel MoU -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_mou = "SELECT * FROM tb_mou ";
                $sql_mou .= " JOIN tb_institusi ON tb_mou.id_institusi = tb_institusi.id_institusi";
                $sql_mou .= " JOIN tb_jurusan_pdd ON tb_mou.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
                $sql_mou .= " JOIN tb_jenjang_pdd ON tb_mou.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd";
                $sql_mou .= " JOIN tb_profesi_pdd ON tb_mou.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd";
                // $sql_mou .= " JOIN tb_akreditasi ON tb_mou.id_akreditasi = tb_akreditasi.id_akreditasi";
                $sql_mou .= "  ORDER BY tb_institusi.nama_institusi ASC";

                // echo "$sql_mou<br>";

                $q_mou = $conn->query($sql_mou);
                $r_mou = $q_mou->rowCount();
                $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);

                if ($r_mou > 0) {
                ?>
                    <div class='table-responsive'>
                        <table class='table table-striped table-hover text-md' id="myTable">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope='col'>No</th>
                                    <th width="150px">Tanggal Akhir MoU <br> (Status)</th>
                                    <th>Nama Institusi</th>
                                    <th>No <br> Mou Institusi</th>
                                    <th>No <br>Mou RSJ</th>
                                    <th width="150px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q_mou_a = $conn->query($sql_mou);

                                $no = 1;
                                while ($d_mou = $q_mou_a->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td class="text-center my-auto"><?php echo $no; ?></td>
                                        <td class="text-center text-capitalize my-auto">
                                            <?php

                                            if ($d_mou['tgl_selesai_mou'] == NULL) {
                                            ?>
                                                <span class="badge badge-primary text-xs">
                                                    <?php echo $d_mou['ket_mou']; ?>
                                                </span>
                                                <form method="POST">
                                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                        <button type="button" class="btn btn-outline-dark">Validasi : </button>
                                                        <button type="submit" class="btn btn-outline-success" name="terima_pengajuan_mou">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                        <button type="submit" class="btn btn-outline-danger" name="tolak_pengajuan_mou">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                                <?php
                                            } else {
                                                echo tanggal_min_alt($d_mou['tgl_selesai_mou']) . "<br>";

                                                $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                                $date_now = strtotime(date('Y-m-d'));
                                                $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                                if ($date_diff <= 0) {
                                                ?> <span class="badge badge-success text-xs">
                                                        <?php echo tanggal_sisa($d_mou['tgl_selesai_mou'], date('Y-m-d')); ?>
                                                    </span>
                                                <?php
                                                } elseif ($date_diff > 0) {
                                                ?>
                                                    <span class="badge badge-danger text-xs">Tidak Berlaku</span>
                                                <?php
                                                }
                                                echo "<br>";

                                                if ($date_diff > 0 && $d_mou['ket_mou'] == NULL) {
                                                ?>
                                                    <span class="badge badge-danger text-xs">Belum Pengajuan</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-danger text-xs"></span>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo $d_mou['nama_institusi'];
                                            if ($d_mou['akronim_institusi'] != NULL) {
                                                echo " (" . $d_mou['akronim_institusi'] . ")";
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $d_mou['no_institusi_mou']; ?></td>
                                        <td><?php echo $d_mou['no_rsj_mou']; ?></td>
                                        <td class="text-center my-auto">

                                            <!-- tombol rincian -->
                                            <a title="Rincian" href='#' class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_r_m<?php echo $d_mou['id_mou']; ?>">
                                                <i class="fas fa-info-circle"></i>
                                            </a>

                                            <!-- modal rincian -->
                                            <div class="modal fade text-left" data-backdrop="static" data-keyboard="false" id="m_r_m<?php echo $d_mou['id_mou']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title h5" id="exampleModalXlLabel">DATA MOU : </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <b>Nama Instansi : </b><br>
                                                            <?php echo $d_mou['nama_institusi']; ?><br><br>
                                                            <b>No Mou RSJ : </b>
                                                            <?php echo $d_mou['no_rsj_mou']; ?><br><br>
                                                            <b>No Mou Institusi : </b>
                                                            <?php echo $d_mou['no_institusi_mou']; ?><br><br>
                                                            <b>Jurusan : </b>
                                                            <?php echo $d_mou['nama_jurusan_pdd']; ?><br><br>
                                                            <b>Jenjang : </b>
                                                            <?php echo $d_mou['nama_jenjang_pdd']; ?><br><br>
                                                            <b>Profesi : </b>
                                                            <?php echo $d_mou['nama_profesi_pdd']; ?><br><br>
                                                            <!-- <b>Akreditasi Institusi : </b>
                                                            <?php echo $d_mou['nama_akreditasi']; ?><br><br> -->
                                                            <b>Tangga Mulai MoU : </b>
                                                            <?php
                                                            if ($d_mou['tgl_mulai_mou'] == NULL) {
                                                                echo "-";
                                                            } else {
                                                                echo tanggal($d_mou['tgl_mulai_mou']);
                                                            }
                                                            ?>
                                                            <br><br>
                                                            <b>Tangga Selesai MoU : </b>
                                                            <?php
                                                            if ($d_mou['tgl_selesai_mou'] == NULL) {
                                                                echo "-";
                                                            } else {
                                                                echo tanggal($d_mou['tgl_selesai_mou']);
                                                            }
                                                            ?><br><br>
                                                            <b>Status MoU : </b>
                                                            <?php
                                                            $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                                            $date_now = strtotime(date('Y-m-d'));
                                                            $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                                            if ($date_diff <= 0) {
                                                            ?>
                                                                <span class="badge badge-success text-md">MASIH BERLAKU</span>
                                                            <?php
                                                            } elseif ($date_diff > 0) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">TIDAK BERLAKU</span>
                                                            <?php
                                                            }
                                                            ?><br><br>
                                                            <!-- <b>Surat Pengajuan Baru : </b>
                                                            <?php
                                                            if ($d_mou['file_surat_pb_mou'] == NULL) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">DATA FILE TIDAK ADA</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?php echo $d_mou['file_surat_pb_mou']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-file-download"></i> Download
                                                                </a>
                                                            <?php
                                                            }
                                                            ?><br><br> -->
                                                            <!-- 
                                                            <b>Surat Pengajuan Perpanjang : </b>
                                                            <?php
                                                            if ($d_mou['file_surat_pp_mou'] == NULL) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">DATA FILE TIDAK ADA</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?php echo $d_mou['file_surat_pp_mou']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-file-download"></i> Download
                                                                </a>
                                                            <?php
                                                            }
                                                            ?><br><br> -->
                                                            <b>File MOU : </b>
                                                            <?php
                                                            if ($d_mou['file_mou'] == NULL) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">DATA FILE TIDAK ADA</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?php echo $d_mou['file_mou']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-file-download"></i> Download
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- tombol ubah  -->
                                            <a title="Ubah" href='?mou&u=<?php echo $d_mou['id_mou']; ?>' class=" btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
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
                    <h3> Data MoU Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>