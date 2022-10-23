<?php

if (isset($_GET['kta']) && $d_prvl['r_akun'] == 'Y') {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-11">
                <h1 class="h3 mb-2 text-gray-800">Daftar Akun</h1>
            </div>
            <div class="col-lg-1">

                <!-- tambah harga -->
                <a class='btn btn-outline-success btn-sm ' href='#' data-toggle='modal' data-target='#aku_i_m'>
                    <i class="fas fa-plus"></i> Tambah
                </a>

                <!-- modal tambah Harga  -->
                <div class="modal fade" id="aku_i_m" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-group" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">TAMBAH AKUN</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <b>Username : </b><br>
                                    <input class="form-control" type="text" name="username_user" required><br>
                                    <div class="row">
                                        <div class="col">
                                            <b>Password : </b><br>
                                            <input class="form-control" type="password" name="password_user" required><br>
                                        </div>
                                        <div class="col-auto">
                                            <b>Ulangi Password : </b><br>
                                            <input class="form-control" type="password" name="ulangi_password_user" required><br>
                                        </div>
                                    </div>

                                    <b>Nama Akun : </b><br>
                                    <input class="form-control" type="text" name="nama_user" required><br>

                                    <?php
                                    $sql_institusi = "SELECT * FROM tb_institusi ORDER BY nama_institusi ASC";
                                    $q_institusi = $conn->query($sql_institusi);
                                    ?>

                                    <b>Institusi : </b><br>
                                    <i style="font-size:12px;">Pilih "-- ADMIN --", bila memilih level user ADMIN</i>
                                    <select class='select2' name='id_institusi' style="width: 100%;" required>
                                        <option value="">-- pilih --</option>
                                        <option value="0">-- ADMIN --</option>
                                        <?php
                                        while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_institusi['id_institusi']; ?>'>
                                                <?php echo $d_institusi['nama_institusi']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <br>

                                    <b>No. Telp. : </b><br>
                                    <input class="form-control" type="number" name="no_telp_user"><br>

                                    <b>E-Mail : </b><br>
                                    <input class="form-control" type="email" name="email_user"><br>
                                    <b>Level : </b><br>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="level1" name="level_user" value="1" class="custom-control-input" onChange='Bukains()' required>
                                        <label class="custom-control-label" for="level1">ADMIN</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="level2" name="level_user" value="2" class="custom-control-input" required>
                                        <label class="custom-control-label" for="level2">INSITUSI</label>
                                    </div><br>
                                </div>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal" value="Kembali">
                                    <input type="submit" class="btn btn-primary btn-sm" name="tambah_user" value="Tambah">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_user = "SELECT * FROM tb_user
                ORDER BY tb_user.nama_user";

                $q_user = $conn->query($sql_user);
                $r_user = $q_user->rowCount();

                if ($r_user > 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Akun</th>
                                    <th scope="col">Institusi</th>
                                    <th scope="col">No. Telp.</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Tanggal Daftar</th>
                                    <th scope="col">Terakhir Login</th>
                                    <th scope="col">Level</th>
                                    <th scope="col" width="80px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_user = $q_user->fetch(PDO::FETCH_ASSOC)) {
                                    $sql_institusi = "SELECT * FROM tb_institusi WHERE id_institusi = '" . $d_user['id_institusi'] . "'";

                                    $q_institusi = $conn->query($sql_institusi);
                                    $d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC);
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d_user['nama_user']; ?></td>
                                        <td>
                                            <?php
                                            if ($d_user['id_institusi'] == 0) {
                                                echo "-";
                                            } else {
                                                echo $d_institusi['nama_institusi'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $d_user['no_telp_user']; ?></td>
                                        <td><?php echo $d_user['email_user']; ?></td>
                                        <td><?php echo tanggal_minimal($d_user['tgl_buat_user']); ?></td>
                                        <td><?php echo tanggal_minimal($d_user['terakhir_login_user']); ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ($d_user['level_user'] == 1) {
                                            ?>
                                                <span class="badge badge-primary text-md">ADMIN</span>
                                            <?php
                                            } elseif ($d_user['level_user'] == 2) {
                                            ?>
                                                <span class="badge badge-success text-md">INSITUSI</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-primary btn-sm" title="Ubah Akun" data-toggle="modal" data-target="#ubah_<?php echo $d_user['id_user']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" title="Hapus Akun">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <!-- modal ubah akun -->
                                            <div class="modal fade text-left" id="ubah_<?php echo $d_user['id_user']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <form class="form-group" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Akun</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                $sql_akun = "SELECT * FROM tb_user WHERE id_user = '" . $d_user['id_user'] . "'";
                                                                $q_akun = $conn->query($sql_akun);

                                                                $d_akun = $q_akun->fetch(PDO::FETCH_ASSOC);
                                                                ?>
                                                                <b>Username : </b><br>
                                                                <input class="form-control" type="text" name="username_user" value="<?php echo $d_akun['username_user']; ?>" required><br>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <b>Password : </b><br>
                                                                        <input class="form-control" type="password" name="password_user" required=""><br>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <b>Ulangi Password : </b><br>
                                                                        <input class="form-control" type="password" name="ulangi_password_user" required=""><br>
                                                                    </div>
                                                                </div>
                                                                <b>Nama Akun : </b><br>
                                                                <input class="form-control" type="text" name="nama_user" value="<?php echo $d_akun['nama_user']; ?>" required><br>
                                                                <?php
                                                                $sql_institusi = "SELECT * FROM tb_institusi ORDER BY nama_institusi ASC";

                                                                $q_institusi = $conn->query($sql_institusi);

                                                                if ($d_akun['level_user'] != 1) {
                                                                ?>
                                                                    <b>Institusi : </b><br>
                                                                    <select class='select2' name='id_institusi' style="width: 100%;" required>
                                                                        <option value="">-- Pilih --</option>
                                                                        <?php
                                                                        while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                                                                            if ($d_akun['id_institusi'] == $d_institusi['id_institusi']) {
                                                                        ?>
                                                                                <option value='<?php echo $d_institusi['id_institusi']; ?>' selected>
                                                                                    <?php
                                                                                    echo $d_institusi['nama_institusi'];
                                                                                    if (!is_null($d_institusi['akronim_institusi'])) {
                                                                                        echo "(" . $d_institusi['akronim_institusi'] . ")";
                                                                                    }
                                                                                    ?>
                                                                                </option>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <option value='<?php echo $d_institusi['id_institusi']; ?>'>
                                                                                    <?php
                                                                                    echo $d_institusi['nama_institusi'];
                                                                                    if ($d_institusi['akronim_institusi'] != null) {
                                                                                        echo " (" . $d_institusi['akronim_institusi'] . ")";
                                                                                    }
                                                                                    ?>
                                                                                </option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <br><br>
                                                                <?php
                                                                }
                                                                ?>
                                                                <b>No. Telp. : </b><br>
                                                                <input class="form-control" type="number" name="no_telp_user" value="<?php echo $d_akun['no_telp_user']; ?>"><br>
                                                                <b>E-Mail : </b><br>
                                                                <input class="form-control" type="email" name="email_user" value="<?php echo $d_akun['email_user']; ?>"><br>
                                                                <b>Level : </b><br>
                                                                <?php
                                                                $level1 = '';
                                                                $level2 = '';
                                                                if ($d_akun['level_user'] == 1) {
                                                                    $level1 = 'checked';
                                                                } elseif ($d_akun['level_user'] == 2) {
                                                                    $level2 = 'checked';
                                                                }
                                                                ?>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="1<?php echo $d_akun['id_user']; ?>" name="level_user" value="1" class="custom-control-input" required <?php echo $level1; ?>>
                                                                    <label class="custom-control-label" for="1<?php echo $d_akun['id_user']; ?>">ADMIN</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="2<?php echo $d_akun['id_user']; ?>" name="level_user" value="2" class="custom-control-input" required <?php echo $level2; ?>>
                                                                    <label class="custom-control-label" for="2<?php echo $d_akun['id_user']; ?>">INSITUSI</label>
                                                                </div><br>
                                                                <b>Status : </b><br>
                                                                <?php
                                                                $status1 = '';
                                                                $status2 = '';
                                                                if ($d_akun['status_user'] == 'Y') {
                                                                    $status1 = 'checked';
                                                                } elseif ($d_akun['status_user'] == 'T') {
                                                                    $status2 = 'checked';
                                                                }
                                                                ?>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="1<?php echo $d_akun['id_user']; ?>" name="status_user" value="Y" class="custom-control-input" required <?php echo $status1; ?>>
                                                                    <label class="custom-control-label" for="1<?php echo $d_akun['id_user']; ?>">Aktif</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="2<?php echo $d_akun['id_user']; ?>" name="status_user" value="T" class="custom-control-input" required <?php echo $status2; ?>>
                                                                    <label class="custom-control-label" for="2<?php echo $d_akun['id_user']; ?>">Non-Aktif</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input name="id_user" value="<?php echo $d_akun['id_user']; ?>" hidden>
                                                                <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" class="btn btn-primary btn-sm" name="ubah_user">Ubah</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
                    <h3 class='text-center'> Data Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>