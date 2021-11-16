                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-2 text-gray-800">Daftar MoU</h1>
                        </div>
                        <div class="col-lg-4">
                            <p>
                                <a href="?mou&i" class="btn btn-success">
                                    <i class="fas fa-plus"></i> Tambah
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php
                            $sql_mou = "SELECT * FROM tb_mou 
                            JOIN tb_institusi ON tb_mou.id_institusi = tb_institusi.id_institusi
                            ORDER BY tb_institusi.nama_institusi ASC";

                            $q_mou = $conn->query($sql_mou);
                            $r_mou = $q_mou->rowCount();
                            $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);


                            if ($r_mou > 0) {
                            ?>
                                <div class='table-responsive'>
                                    <table class='table table-striped table-hover' id='dataTable' width='100%' cellspacing='0'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>No</th>
                                                <th>Nama Institusi</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q_mou_a = $conn->query($sql_mou);

                                            $no = 1;

                                            while ($d_mou = $q_mou_a->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <td style='font-size:14px'><?php echo $no; ?></td>
                                                <td style='font-size:14px; width:25%'><?php echo $d_mou['nama_institusi']; ?></td>
                                                <td style='font-size:14px'><?php echo $d_mou['tgl_selesai_mou']; ?></td>
                                                <?php

                                                $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                                $date_now = strtotime(date('Y-m-d'));
                                                $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                                if ($date_diff <= 0) {
                                                ?>
                                                    <td>
                                                        <button type='button' class='btn btn-success btn-sm'>Masih Berlaku</button>
                                                    </td>
                                                <?php
                                                } elseif ($date_diff > 0) {
                                                ?>
                                                    <td>
                                                        <button class='btn btn-danger btn-sm'>Tidak Berlaku</button>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                                <td>
                                                    <a href='?mou&u=<?php echo $d_mou['id_mou']; ?>' class="btn btn-primary btn-sm">
                                                        <span class="text">Ubah</span>
                                                    </a>
                                                    <a href='?mou&d=<?php echo $d_mou['id_mou']; ?>' class="btn btn-danger btn-sm">
                                                        <span class="text">Hapus</span>
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
                <!-- /.container-fluid -->