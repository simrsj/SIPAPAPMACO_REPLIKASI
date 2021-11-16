                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-2 text-gray-800">Daftar Praktikan</h1>
                        </div>
                        <div class="col-lg-4">
                            <p>
                                <a href="?prk&i" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </p>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                if ($_SESSION['level_user'] == 1) {
                                    $sql_praktik = "SELECT * FROM tb_praktik order by id_praktik ASC";
                                } else {
                                    $sql_praktik = "";
                                }
                                $q_praktik = $conn->query($sql_praktik);
                                $r_praktik = $q_praktik->rowCount();

                                if ($r_praktik == true) {
                                ?>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>No</th>
                                                <th>Nama Institusi</th>
                                                <th>Nama Praktikan</th>
                                                <th>Tanggal Awal</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q_praktik_a = $conn->query($sql_praktik);
                                            $no = 1;

                                            while ($d_praktik = $q_praktik_a->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $d_praktik['institusi_praktik']; ?></td>
                                                    <td><?php echo $d_praktik['nama_praktik']; ?></td>
                                                    <td><?php echo $d_praktik['tgl_mulai_praktik']; ?></td>
                                                    <td><?php echo $d_praktik['tgl_selesai_praktik']; ?></td>
                                                    <td>
                                                        <?php

                                                        if ($d_praktik['status_praktik'] == "Y") {
                                                        ?>
                                                            <button class='btn btn-success btn-sm'>Aktif</button>
                                                        <?php
                                                        } elseif ($d_praktik['status_praktik'] == "N") {
                                                        ?>
                                                            <button class='btn btn-danger btn-sm'>Tidak Aktif</button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href='#' data-toggle='modal' data-target='<?php echo "#detail" . $d_praktik['id_praktik']; ?>' class='btn btn-info btn-sm'>
                                                            Detail
                                                        </a>
                                                        <div class="modal fade" id="<?php echo "detail" . $d_praktik['id_praktik']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <?php
                                                                        $sql_praktik_1 = "SELECT * FROM tb_praktik 
                                                                        JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou 
                                                                        JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                                                                        JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                                                                        JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                                                                        JOIN tb_user ON tb_praktik.id_user = tb_user.id_user where tb_praktik.id_praktik=" . $d_praktik['tb_praktik.id_praktik'];

                                                                        $q_praktik_1 = $conn->query($sql_praktik_1);
                                                                        $d_praktik_1 = $q_praktik_1->fetch(PDO::FETCH_ASSOC);
                                                                        ?>
                                                                        <strong>Nama Institusi</strong><br>
                                                                        <p><?php echo $d_praktik_1['institusi_praktik']; ?></p>
                                                                        <strong>Nama Praktikan</strong><br>
                                                                        <p><?php echo $d_praktik_1['nama_praktik']; ?></p>
                                                                        <strong>Tanggal Paktikan</strong><br>
                                                                        <p><?php echo $d_praktik_1['tgl_mulai_praktik'] . " s/d " . $d_praktik_1['tgl_selesai_praktik']; ?></p>
                                                                        <strong>Jurusan</strong><br>
                                                                        <p><?php echo $d_praktik_1['jurusan_pdd_praktik']; ?></p>
                                                                        <strong>Spesifikasi</strong><br>
                                                                        <p><?php echo $d_praktik_1['specialist_praktik']; ?></p>
                                                                        <strong>Jenjang Pendidikan</strong><br>
                                                                        <p><?php echo $d_praktik_1['level_praktik']; ?></p>
                                                                        <strong>Akreditasi</strong><br>
                                                                        <p><?php echo $d_praktik_1['accreditation_praktik']; ?></p>
                                                                        <hr>
                                                                        <strong>Nama CP</strong><br>
                                                                        <p><?php echo $d_praktik_1['name_cp_praktik']; ?></p>
                                                                        <strong>Kontak CP</strong><br>
                                                                        <p><?php echo $d_praktik_1['telp_cp_praktik']; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <a href='?prk&u=<?php echo $d_praktik['id_praktik']; ?>' class='btn btn-primary btn-sm'>
                                                            <span class='text' title='Ubah'>Ubah</span>
                                                        </a>
                                                        <a href='#' data-toggle='modal' data-target='<?php echo "#hapus_praktik" . $d_praktik['id_praktik']; ?>' class='btn btn-danger btn-sm'>
                                                            Hapus
                                                        </a>


                                                        <div class="modal fade" id="<?php echo "hapus_praktik" . $d_praktik['id_praktik']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data ?</h5>
                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                                                        <a class="btn btn-danger" href="?lo">Ya</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                ?>
                                    <h3 class='text-center'> Data Praktikan Anda Tidak Ada</h3>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->