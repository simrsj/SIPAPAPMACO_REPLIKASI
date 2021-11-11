                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Daftar MoU</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php
                            $sql_mou = "SELECT * FROM tb_mou order by institute_mou ASC";

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
                                        <tfoot>
                                            <tr>
                                                <th scope='col'>No</th>
                                                <th>Nama Institusi</th>
                                                <th>Tanggal Akhir</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $q_mou_a = $conn->query($sql_mou);

                                            $no = 1;

                                            while ($d_mou = $q_mou_a->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <td style='font-size:14px'><?php echo $no; ?></td>
                                                <td style='font-size:14px; width:25%'><?php echo $d_mou['institute_mou']; ?></td>
                                                <td style='font-size:14px'><?php echo $d_mou['end_date_mou']; ?></td>
                                                <?php

                                                $date_end = strtotime($d_mou['end_date_mou']);
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
                                                    <a href='?mou&i=<?php echo $d_mou['id_mou']; ?>' class='btn btn-primary btn-sm'>Ubah</a>
                                                    <a href='?mou&d=<?php echo $d_mou['id_mou']; ?>' class='btn btn-danger btn-sm'>Hapus</a>
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