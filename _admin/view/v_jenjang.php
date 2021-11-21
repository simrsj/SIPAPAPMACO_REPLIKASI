                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-8">
                            <h1 class="h3 mb-2 text-gray-800">Daftar jenjang` 1 1W21</h1>
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
                                $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";

                                $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                                $r_jenjang_pdd = $q_jenjang_pdd->rowCount();
                                $d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC);

                                if ($r_jenjang_pdd > 0) {
                                ?>
                                    <table class='table table-striped'>
                                        <thead>
                                            <tr>
                                                <th scope='col'>No</th>
                                                <th>Nama jenjang</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $q_jenjang_pdd_a = $conn->query($sql_jenjang_pdd);

                                            $no = 1;

                                            while ($d_jenjang_pdd = $q_jenjang_pdd_a->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td><?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?></td>
                                                    <td>
                                                        <a class='btn btn-secondary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#spf_u_m" . $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                                            Ubah
                                                        </a>
                                                        <a href='?spf&d&id="<?php echo $d_jenjang_pdd[' id_jenjang_pdd']; ?>' class='btn btn-danger btn-sm'>
                                                            <span class='text'>Hapus</span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                                <div class="modal fade" id="<?php echo "spf_u_m" . $d_jenjang_pdd['id_jenjang_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-footer">
                                                                <form method="post" action="?spf&u">
                                                                    <input name="id_jenjang_pdd" value="<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>" hidden>
                                                                    Nama jenjang : <br>
                                                                    <input name="nama_jenjang_pdd" value="<?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>"><br>
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
                                    <h3> Data jenjang Tidak Ada</h3>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>