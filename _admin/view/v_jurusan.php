                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-2 text-gray-800">Daftar Jurusan</h1>
                        </div>
                        <div class="col-lg-4">
                            <p>
                                <a href="?jrs&i" class="btn btn-success">
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
                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();
                                $d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC);

                                if ($r_jurusan_pdd > 0) {
                                ?>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>No</th>
                                                <th>Nama Spesifikasi</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q_jurusan_pdd_a = $conn->query($sql_jurusan_pdd);

                                            $no = 1;

                                            while ($d_jurusan_pdd = $q_jurusan_pdd_a->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?></td>
                                                    <td>
                                                        <a class='btn btn-secondary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#spf_u_m" . $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                                            Ubah
                                                        </a>
                                                        <a href='?spf&d&id="<?php echo $d_jurusan_pdd[' id_jurusan_pdd']; ?>' class='btn btn-danger btn-sm'>
                                                            <span class='text'>Hapus</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                                <div class="modal fade" id="<?php echo "spf_u_m" . $d_jurusan_pdd['id_jurusan_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-footer">
                                                                <form method="post" action="?spf&u">
                                                                    <input name="id_jurusan_pdd" value="<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>" hidden>
                                                                    Nama Jurusan : <br>
                                                                    <input name="nama_jurusan_pdd" value="<?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>"><br>
                                                                    <button type="submit" class="btn btn-success">SIMPAN</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                <?php
                                } else {
                                ?>
                                    <h3> Data Spesifikasi Tidak Ada</h3>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>