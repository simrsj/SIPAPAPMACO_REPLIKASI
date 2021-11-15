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
                                $sql_major = "SELECT * FROM tb_major order by name_major ASC";

                                $q_major = $conn->query($sql_major);
                                $r_major = $q_major->rowCount();
                                $d_major = $q_major->fetch(PDO::FETCH_ASSOC);

                                if ($r_major > 0) {
                                    echo "
                                        <table class='table table-striped'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th>Nama Spesifikasi</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    ";

                                    $q_major_a = $conn->query($sql_major);

                                    $no = 1;

                                    while ($d_major = $q_major_a->fetch(PDO::FETCH_ASSOC)) {
                                        echo "
                                            <tr>
                                                <td>$no</td>
                                                <td>" . $d_major['name_major'] . "</td>
                                            ";
                                        echo "
                                                <td>   
                                                    <a class='btn btn-secondary btn-sm' href='#' data-toggle='modal' data-target='#spf_u_m" . $d_major['id_major'] . "'>
                                                        Ubah
                                                    </a>      
                                                    <a href='?spf&d&id=" . $d_major['id_major'] . "' class='btn btn-danger btn-sm'>
                                                        <span class='text'>Hapus</span>
                                                    </a>
                                                </td>
                                            </tr>
                                        ";
                                        $no++;
                                ?>
                                        <div class="modal fade" id="<?php echo "spf_u_m" . $d_major['id_major']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-footer">
                                                        <form method="post" action="?spf&u">
                                                            <input name="id_major" value="<?php echo $d_major['id_major']; ?>" hidden>
                                                            Nama Jurusan : <br>
                                                            <input name="name_major" value="<?php echo $d_major['name_major']; ?>"><br>
                                                            <button type="submit" class="btn btn-success">SIMPAN</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }

                                    echo "
                                            </tbody>
                                        </table>
                                    ";
                                } else {
                                    echo "
                                        <h3> Data Spesifikasi Tidak Ada</h3>
                                    ";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>