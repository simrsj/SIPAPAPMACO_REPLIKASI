<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>
        </div>
        <div class="col-lg-2">
            <div class="dropdown show">

                <!-- tambah harga -->
                <a class='btn btn-outline-success btn-sm' href='#' data-toggle='modal' data-target='#hrg_i_m'>
                    <i class="fas fa-plus"></i> Tambah
                </a>

                <!-- modal tambah Harga  -->
                <div class="modal fade" id="hrg_i_m">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form method="post" action="">
                                <div class="modal-header">
                                    Tambah Harga :
                                </div>
                                <div class="modal-body">
                                    Nama Harga : <span style="color:red">*</span><br>
                                    <input class="form-control" name="nama_harga" required><br>
                                    Satuan Harga : <span style="color:red">*</span><br><?php
                                                                                        $sql_harga_satuan = "SELECT * FROM tb_harga_satuan order by nama_harga_satuan ASC";

                                                                                        $q_harga_satuan = $conn->query($sql_harga_satuan);
                                                                                        $r_harga_satuan = $q_harga_satuan->rowCount();

                                                                                        if ($r_harga_satuan > 0) {
                                                                                        ?>
                                        <select class="form-control text-center" name="id_harga_satuan" required>
                                            <option value="">-- Pilih Jenis Harga --</option>
                                            <?php
                                                                                            while ($d_harga_satuan = $q_harga_satuan->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value='<?php echo $d_harga_satuan['id_harga_satuan']; ?>'>
                                                    <?php echo $d_harga_satuan['nama_harga_satuan']; ?>
                                                </option>
                                            <?php
                                                                                            }
                                            ?>
                                        </select>
                                    <?php
                                                                                        } else {
                                    ?>
                                        <b><i>Data Jenis Harga Tidak Ada</i></b>
                                    <?php
                                                                                        }
                                    ?>
                                    <br>
                                    Jumlah Harga : <i style='font-size:12px;'>(Rp)</i><span style="color:red">*</span><br>
                                    <input class="form-control" name="jumlah_harga" type="number" min="1" required>
                                    <i style='font-size:12px;'>Isian hanya berupa angka</i><br><br>
                                    Jenis Harga : <span style="color:red">*</span><br>
                                    <?php
                                    $sql_harga_jenis = "SELECT * FROM tb_harga_jenis order by nama_harga_jenis ASC";

                                    $q_harga_jenis = $conn->query($sql_harga_jenis);
                                    $r_harga_jenis = $q_harga_jenis->rowCount();

                                    if ($r_harga_jenis > 0) {
                                    ?>
                                        <select class="form-control text-center" name="id_harga_jenis" required>
                                            <option value="">-- Pilih Jenis Harga --</option>
                                            <?php
                                            while ($d_harga_jenis = $q_harga_jenis->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value='<?php echo $d_harga_jenis['id_harga_jenis']; ?>'>
                                                    <?php echo $d_harga_jenis['nama_harga_jenis']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <b><i>Data Jenis Harga Tidak Ada</i></b>
                                    <?php
                                    }
                                    ?>
                                    <br>

                                    Jurusan : <span style="color:red">*</span><br>
                                    <?php
                                    $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                                    $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                    $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                                    if ($r_jurusan_pdd > 0) {
                                    ?>
                                        <select class="form-control text-center" name="id_jurusan_pdd" required>
                                            <option value="">-- Pilih Jurusan --</option>
                                            <?php
                                            while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                                    <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <b><i>Data Jurusan Tidak Ada</i></b>
                                    <?php
                                    }
                                    ?>
                                    <br>

                                    Jenjang : <span style="color:red">*</span><br>
                                    <?php
                                    $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";

                                    $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                                    $r_jenjang_pdd = $q_jenjang_pdd->rowCount();

                                    if ($r_jenjang_pdd > 0) {
                                    ?>
                                        <select class="form-control text-center" name="id_jenjang_pdd" required>
                                            <option value="">-- Pilih Jenjang --</option>
                                            <?php
                                            while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                                    <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <b><i>Data Jenjang Tidak Ada</i></b>
                                    <?php
                                    }
                                    ?>
                                    <br>

                                    Spesifikasi : <span style="color:red">*</span><br>
                                    <?php
                                    $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";

                                    $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                                    $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();

                                    if ($r_spesifikasi_pdd > 0) {
                                    ?>
                                        <select class="form-control text-center" name="id_spesifikasi_pdd" required>
                                            <option value="">-- Pilih spesifikasi --</option>
                                            <?php
                                            while ($d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                                    <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <b><i>Data Spesifikasi Tidak Ada</i></b>
                                    <?php
                                    }
                                    ?>
                                    <br>

                                    Tipe : <span style="color:red">*</span><br>
                                    <select class="form-control text-center" name="tipe_harga" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="SEKALI">Sekali</option>
                                        <option value="INPUT">Diinput Manual</option>
                                        <option value="HARI-">Harian Tidak Termasuk Sabtu Minggu</option>
                                        <option value="HARI+">Harian Termasuk Sabtu Minggu</option>
                                        <option value="MINGGU">Mingguan</option>
                                    </select><br>

                                    Pilihan : <span style="color:red">*</span><br>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pilih_harga" value="1" required>
                                        <label class="form-check-label">
                                            Harus
                                        </label><br>
                                        <input class="form-check-input" type="radio" name="pilih_harga" value="2">
                                        <label class="form-check-label">
                                            Pilih Salah Satu
                                        </label><br>
                                        <input class="form-check-input" type="radio" name="pilih_harga" value="3">
                                        <label class="form-check-label">
                                            Opsional
                                        </label>
                                    </div>
                                    Keterangan : <br>
                                    <textarea name="ket_harga" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-success btn-sm" name="tambah_harga" value="Tambah">
                                    <input class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal" value="Kembali">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- tambah satuan harga -->
                <a class="btn btn-outline-success btn-sm" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ruler-horizontal"></i> Satuan
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class='dropdown-item' href='#' data-toggle='modal' data-target='#ish_i_m'>
                        Tambah Satuan
                    </a>
                    <a class='dropdown-item' href='?hrg&dhs'>
                        Daftar Satuan
                    </a>
                </div>
            </div>

            <!-- modal santuan harga  -->
            <div class="modal fade" id="ish_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                Tambah Satuan Harga :
                            </div>
                            <div class="modal-body">
                                Nama Satuan Harga : <span style="color:red">*</span><br>
                                <input class="form-control" name="nama_harga_satuan" required><br>
                                Keterangan Harga : <span style="color:red">*</span><br>
                                <input class="form-control" name="ket_harga_satuan"><br>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success btn-sm" name="tambah_harga_satuan" value="Tambah">
                                <input class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal" value="Kembali">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php

                // data satuan Harga
                if (isset($_GET['dhs'])) {
                ?>
                    <table class="table table-striped" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Satuan Harga</th>
                                <th scope="col">Keterangan harga</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql_harga_satuan = "SELECT * FROM tb_harga_satuan ORDER BY nama_harga_satuan ASC";

                            $q_harga_satuan = $conn->query($sql_harga_satuan);
                            $r_harga_satuan = $q_harga_satuan->rowCount();

                            $no = 1;
                            while ($d_harga_satuan = $q_harga_satuan->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga_satuan['nama_harga_satuan']; ?></td>
                                    <td><?php echo $d_harga_satuan['ket_harga_satuan']; ?></td>
                                    <td>
                                        <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#dhs_u_m" . $d_harga_satuan['id_harga_satuan']; ?>'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#dhs_d_m" . $d_harga_satuan['id_harga_satuan']; ?>'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- modal ubah Satuan Harga  -->
                                <div class="modal fade" id="<?php echo "dhs_u_m" . $d_harga_satuan['id_harga_satuan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="" class="form-group">
                                                <div class="modal-header">
                                                    <h5>Ubah Harga :</h5>
                                                </div>
                                                <div class="modal-body">

                                                    <!-- id_harga_satuan -->
                                                    <input name="id_harga_satuan" value="<?php echo $d_harga_satuan['id_harga_satuan']; ?>" hidden>

                                                    Nama Harga Satuan : <span style="color:red">*</span><br>
                                                    <input class="form-control" name="nama_harga_satuan" value="<?php echo $d_harga_satuan['nama_harga_satuan']; ?>" required><br>

                                                    Keterangan Harga Satuan : <br>
                                                    <input class="form-control" name="ket_harga_satuan" value="<?php echo $d_harga_satuan['ket_harga_satuan']; ?>"><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <br>
                                                    <input type="submit" class="btn btn-success btn-sm" name="ubah_harga_satuan" value="Ubah">
                                                    <input type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal" value="Kembali">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal hapus satuan harga  -->
                                <div class="modal fade" id="<?php echo "dhs_d_m" . $d_harga_satuan['id_harga_satuan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="">
                                                <div class="modal-header">
                                                    <h5>Hapus Data</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <h6><b><?php echo $d_harga_satuan['nama_harga_satuan']; ?></b></h6>
                                                    <input name="id_harga_satuan" value="<?php echo $d_harga_satuan['id_harga_satuan']; ?>" hidden>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger btn-sm" name="hapus_harga_satuan">Ya</button>
                                                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Tidak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }
                //data harga
                else {
                ?>
                    <table class="table table-striped" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis</th>
                                <th scope="col">Nama Jurusan</th>
                                <th scope="col">Nama Jenjang</th>
                                <th scope="col">Nama Spesifikasi</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Satuan Harga</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql_harga = "SELECT * FROM tb_harga 
                    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                    JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_spesifikasi_pdd ON tb_harga.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan
                    ORDER BY tb_harga.id_jurusan_pdd_jenis ASC
                    ";

                            $q_harga = $conn->query($sql_harga);
                            $r_harga = $q_harga->rowCount();

                            $no = 1;
                            while ($d_harga = $q_harga->fetch(PDO::FETCH_ASSOC)) {

                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga['nama_jurusan_pdd_jenis']; ?></td>
                                    <td><?php echo $d_harga['nama_jenjang_pdd']; ?></td>
                                    <td><?php echo $d_harga['nama_spesifikasi_pdd']; ?></td>
                                    <td><?php echo $d_harga['nama_spesifikasi_pdd']; ?></td>
                                    <td><?php echo $d_harga['nama_harga']; ?></td>
                                    <td><?php echo $d_harga['nama_harga_satuan']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td>
                                        <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#hrg_u_m" . $d_harga['id_harga']; ?>'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#hrg_d_m" . $d_harga['id_harga']; ?>'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- modal ubah Harga  -->
                                <div class="modal fade" id="<?php echo "hrg_u_m" . $d_harga['id_harga']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="" class="form-group">
                                                <div class="modal-header">
                                                    <h5>Ubah Harga :</h5>
                                                </div>
                                                <div class="modal-body">

                                                    <!-- id_harga -->
                                                    <input name="id_harga" value="<?php echo $d_harga['id_harga']; ?>" hidden>

                                                    Nama Harga : <span style="color:red">*</span><br>
                                                    <input class="form-control" name="nama_harga" value="<?php echo $d_harga['nama_harga']; ?>" required><br>

                                                    Satuan Harga : <span style="color:red">*</span><br>
                                                    <?php
                                                    $sql_harga_satuan = "SELECT * FROM tb_harga_satuan ORDER BY nama_harga_satuan ASC";
                                                    $q_harga_satuan = $conn->query($sql_harga_satuan);
                                                    $r_harga_satuan = $q_harga_satuan->rowCount();
                                                    if ($r_harga_satuan > 0) {
                                                    ?>
                                                        <select class="form-control text-center" name="id_harga_satuan" required>
                                                            <option value="">-- Pilih Jenis Harga --</option>
                                                            <?php
                                                            while ($d_harga_satuan = $q_harga_satuan->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($d_harga['id_harga_satuan'] == $d_harga_satuan['id_harga_satuan']) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                            ?>
                                                                <option value='<?php echo $d_harga_satuan['id_harga_satuan']; ?>' <?php echo $selected; ?>>
                                                                    <?php echo $d_harga_satuan['nama_harga_satuan']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <b><i>Data Satuan Harga Tidak Ada</i></b>
                                                    <?php
                                                    }
                                                    ?>
                                                    <br>

                                                    Jumlah Harga : <i style='font-size:12px;'>(Rp)</i><span style="color:red">*</span><br>
                                                    <input class="form-control" name="jumlah_harga" type="number" min="1" value="<?php echo $d_harga['jumlah_harga']; ?>" required>
                                                    <i style='font-size:12px;'>Isian hanya berupa angka</i><br><br>

                                                    Frekuensi Harga : <span style="color:red">*</span><br>
                                                    <input class="form-control" name="frekuensi_harga" type="number" min="0" value="<?php echo $d_harga['frekuensi_harga']; ?>" required>
                                                    <i style='font-size:12px;'>Isikan "0" bila frekuensi tidak ditentukan</i><br><br>

                                                    Jenis Harga : <span style="color:red">*</span><br>
                                                    <?php
                                                    $sql_harga_jenis = "SELECT * FROM tb_harga_jenis order by nama_harga_jenis ASC";
                                                    $q_harga_jenis = $conn->query($sql_harga_jenis);
                                                    $r_harga_jenis = $q_harga_jenis->rowCount();
                                                    if ($r_harga_jenis > 0) {
                                                    ?>
                                                        <select class="form-control text-center" name="id_harga_jenis" required>
                                                            <option value="">-- Pilih Jenis Harga --</option>
                                                            <?php
                                                            while ($d_harga_jenis = $q_harga_jenis->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($d_harga['id_harga_jenis'] == $d_harga_jenis['id_harga_jenis']) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                            ?>
                                                                <option value='<?php echo $d_harga_jenis['id_harga_jenis']; ?>' <?php echo $selected; ?>>
                                                                    <?php echo $d_harga_jenis['nama_harga_jenis']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <b><i>Data Jenis Harga Tidak Ada</i></b>
                                                    <?php
                                                    }
                                                    ?>
                                                    <br>

                                                    Jurusan : <span style="color:red">*</span><br>
                                                    <?php
                                                    $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";
                                                    $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                                    $r_jurusan_pdd = $q_jurusan_pdd->rowCount();
                                                    if ($r_jurusan_pdd > 0) {
                                                    ?>
                                                        <select class="form-control text-center" name="id_jurusan_pdd" required>
                                                            <option value="">-- Pilih Jenis Harga --</option>
                                                            <?php
                                                            while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($d_harga['id_jurusan_pdd'] == $d_jurusan_pdd['id_jurusan_pdd']) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                            ?>
                                                                <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>' <?php echo $selected; ?>>
                                                                    <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <b><i>Data Jurusan Tidak Ada</i></b>
                                                    <?php
                                                    }
                                                    ?>
                                                    <div id="u_i_id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>">
                                                    </div><br>

                                                    Jenjang : <span style="color:red">*</span><br>
                                                    <?php
                                                    $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";
                                                    $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                                                    $r_jenjang_pdd = $q_jenjang_pdd->rowCount();
                                                    if ($r_jenjang_pdd > 0) {
                                                    ?>
                                                        <select class="form-control text-center" name="id_jenjang_pdd" required>
                                                            <option value="">-- Pilih Jenis Harga --</option>
                                                            <?php
                                                            while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($d_harga['id_jenjang_pdd'] == $d_jenjang_pdd['id_jenjang_pdd']) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                            ?>
                                                                <option value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>' <?php echo $selected; ?>>
                                                                    <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <b><i>Data jenjang Tidak Ada</i></b>
                                                    <?php
                                                    }
                                                    ?>
                                                    <br>

                                                    Spesifikasi : <span style="color:red">*</span><br>
                                                    <?php
                                                    $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";
                                                    $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                                                    $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();
                                                    if ($r_spesifikasi_pdd > 0) {
                                                    ?>
                                                        <select class="form-control text-center" name="id_spesifikasi_pdd" required>
                                                            <option value="">-- Pilih Jenis Harga --</option>
                                                            <?php
                                                            while ($d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($d_harga['id_spesifikasi_pdd'] == $d_spesifikasi_pdd['id_spesifikasi_pdd']) {
                                                                    $selected = "selected";
                                                                } else {
                                                                    $selected = "";
                                                                }
                                                            ?>
                                                                <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>' <?php echo $selected; ?>>
                                                                    <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <b><i>Data spesifikasi Tidak Ada</i></b>
                                                    <?php
                                                    }
                                                    ?>
                                                    <br>

                                                    Tipe : <span style="color:red">*</span><br>
                                                    <select class="form-control text-center" name="tipe_harga" required>
                                                        <option value="">-- Pilih --</option>
                                                        <?php
                                                        $cek1 = '';
                                                        $cek2 = '';
                                                        $cek3 = '';
                                                        $cek4 = '';
                                                        $cek5 = '';
                                                        if ($d_harga['tipe_harga'] == 'SEKALI') {
                                                            $cek1 = 'selected';
                                                        } elseif ($d_harga['tipe_harga'] == 'INPUT') {
                                                            $cek2 = 'selected';
                                                        } elseif ($d_harga['tipe_harga'] == 'HARI-') {
                                                            $cek3 = 'selected';
                                                        } elseif ($d_harga['tipe_harga'] == 'HARI+') {
                                                            $cek4 = 'selected';
                                                        } elseif ($d_harga['tipe_harga'] == 'MINGGUAN') {
                                                            $cek5 = 'selected';
                                                        }

                                                        ?>
                                                        <option value="SEKALI" <?php echo $cek1; ?>>Sekali</option>
                                                        <option value="INPUT" <?php echo $cek2; ?>>Diinput Manual</option>
                                                        <option value="HARI-" <?php echo $cek3; ?>>Harian Tidak Termasuk Sabtu Minggu</option>
                                                        <option value="HARI+" <?php echo $cek4; ?>>Harian Termasuk Sabtu Minggu</option>
                                                        <option value="MINGGUAN" <?php echo $cek5; ?>>Mingguan</option>
                                                    </select><br>

                                                    Pilihan : <span style="color:red">*</span><br>
                                                    <div class="form-check">
                                                        <?php
                                                        $pilih_harga_1 = '';
                                                        $pilih_harga_2 = '';
                                                        $pilih_harga_3 = '';
                                                        if ($d_harga['pilih_harga'] == 1) {
                                                            $pilih_harga_1 = "checked";
                                                        } elseif ($d_harga['pilih_harga'] == 2) {
                                                            $pilih_harga_2 = "checked";
                                                        } elseif ($d_harga['pilih_harga'] == 3) {
                                                            $pilih_harga_3 = "checked";
                                                        }
                                                        ?>
                                                        <input class="form-check-input" type="radio" name="pilih_harga" value="1" required <?php echo $pilih_harga_1; ?>>
                                                        <label class="form-check-label">
                                                            Harus
                                                        </label><br>
                                                        <input class="form-check-input" type="radio" name="pilih_harga" value="2" <?php echo $pilih_harga_2; ?>>
                                                        <label class="form-check-label">
                                                            Pilih Salah Satu
                                                        </label><br>
                                                        <input class="form-check-input" type="radio" name="pilih_harga" value="3" <?php echo $pilih_harga_3; ?>>
                                                        <label class="form-check-label">
                                                            Opsional
                                                        </label>
                                                    </div>

                                                    Keterangan : <br>
                                                    <textarea class="form-control" name="ket_harga"><?php echo $d_harga['ket_harga'] ?></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <input name="cari" value="cs" hidden>
                                                    <input type="submit" class="btn btn-success btn-sm" name="ubah_harga" value="Ubah">
                                                    <input type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal" value="Kembali">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- modal hapus Harga  -->
                                <div class="modal fade" id="<?php echo "hrg_d_m" . $d_harga['id_harga']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form method="post" action="">
                                                <div class="modal-header">
                                                    <h5>Hapus Data</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <h6><b><?php echo $d_harga['nama_harga']; ?></b></h6>
                                                    <input name="id_harga" value="<?php echo $d_harga['id_harga']; ?>" hidden>
                                                    <input name="cari" value="cs" hidden>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger btn-sm" name="hapus_harga">Ya</button>
                                                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Tidak</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['tambah_harga'])) {

    $sql_insert_harga =  "INSERT INTO tb_harga (
        nama_harga,
        id_harga_satuan,
        jumlah_harga,
        tipe_harga,
        id_jurusan_pdd,
        id_jenjang_pdd,
        id_spesifikasi_pdd,
        id_harga_jenis,
        ket_harga,
        pilih_harga
        ) VALUES (
            '" . $_POST['nama_harga'] . "',
            '" . $_POST['id_harga_satuan'] . "',
            '" . $_POST['jumlah_harga'] . "',
            '" . $_POST['tipe_harga'] . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $_POST['id_spesifikasi_pdd'] . "',
            '" . $_POST['id_harga_jenis'] . "',
            '" . $_POST['ket_harga'] . "',
            '" . $_POST['pilih_harga'] . "'
            )";

    // echo $sql_insert_harga . "<br>";
    $conn->query($sql_insert_harga);

?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
} elseif (isset($_POST['tambah_harga_satuan'])) {

    $sql_insert_harga =  "INSERT INTO tb_harga_satuan (
        nama_harga_satuan,
        ket_harga_satuan
        ) VALUES (
            '" . $_POST['nama_harga_satuan'] . "',
            '" . $_POST['ket_harga_satuan'] . "'
            )";

    // echo $sql_insert_harga . "<br>";
    $conn->query($sql_insert_harga);

?>
    <script>
        document.location.href = "?hrg&dhs";
    </script>
<?php
} elseif (isset($_POST['ubah_harga'])) {
    $sql_ubah = "UPDATE `tb_harga` SET 
    `nama_harga` = '" . $_POST['nama_harga'] . "',
    `id_harga_satuan` = '" . $_POST['id_harga_satuan'] . "',
    `jumlah_harga` = '" . $_POST['jumlah_harga'] . "',
    `frekuensi_harga` = '" . $_POST['frekuensi_harga'] . "',
    `tipe_harga` = '" . $_POST['tipe_harga'] . "',
    `id_harga_jenis` = '" . $_POST['id_harga_jenis'] . "',
    `id_jurusan_pdd` = '" . $_POST['id_jurusan_pdd'] . "',
    `id_jenjang_pdd` = '" . $_POST['id_jenjang_pdd'] . "',
    `id_spesifikasi_pdd` = '" . $_POST['id_spesifikasi_pdd'] . "',
    `tgl_harga` = '" . date('Y-m-d') . "',
    `ket_harga` = '" . $_POST['ket_harga'] . "',
    `pilih_harga` = '" . $_POST['pilih_harga'] . "'
    WHERE `tb_harga`.`id_harga` = " . $_POST['id_harga'];
    // echo $sql_ubah . "<br>";
    $conn->query($sql_ubah);
?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
} elseif (isset($_POST['ubah_harga_satuan'])) {
    $sql_ubah = "UPDATE `tb_harga_satuan` SET 
    `nama_harga_satuan` = '" . $_POST['nama_harga_satuan'] . "',
    `ket_harga_satuan` = '" . $_POST['ket_harga_satuan'] . "'
    WHERE `id_harga_satuan` = " . $_POST['id_harga_satuan'];

    // echo $sql_ubah;
    $conn->query($sql_ubah);
?>
    <script>
        document.location.href = "?hrg&dhs";
    </script>
<?php
} elseif (isset($_POST['hapus_harga'])) {
    $conn->query("DELETE FROM `tb_harga` WHERE `id_harga` = " . $_POST['id_harga']);

?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
} elseif (isset($_POST['hapus_harga_satuan'])) {
    $conn->query("DELETE FROM `tb_harga_satuan` WHERE `id_harga_satuan` = " . $_POST['id_harga_satuan']);

?>
    <script>
        document.location.href = "?hrg&dhs";
    </script>
<?php
}
?>