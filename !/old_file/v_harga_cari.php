<?php
if (isset($_GET['c'])) {
    $id1 = $_GET['id_jurusan_pdd'];
    $id2 = $_GET['id_jenjang_pdd'];
    $id3 = $_GET['id_spesifikasi_pdd'];
} elseif (isset($_POST['c'])) {
    $id1 = $_POST['id_jurusan_pdd'];
    $id2 = $_POST['id_jenjang_pdd'];
    $id3 = $_POST['id_spesifikasi_pdd'];
}

?>
<div class="card-header text-center bg-gray-500 text-gray-100">
    <h4 class="m-0 font-weight-bold">Cari Harga</h4>
</div>
<div class="card-body d-flex flex-row ">
    <?php
    $sql_harga = "SELECT * FROM tb_harga 
                JOIN tb_jurusan_pdd ON tb_harga.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                JOIN tb_spesifikasi_pdd ON tb_harga.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis
                WHERE tb_harga.id_jurusan_pdd = $id1 AND tb_harga.id_jenjang_pdd = $id2 AND tb_harga.id_spesifikasi_pdd = $id3
                ORDER BY tb_harga.id_jurusan_pdd ASC
                ";
    // echo $sql_harga;
    $q_harga = $conn->query($sql_harga);
    $r_harga = $q_harga->rowCount();

    if ($r_harga > 0) {
    ?>
        <div class="table-responsive">
            <table class='table'>
                <thead class="thead-dark">
                    <tr>
                        <th scope='2%'>No</th>
                        <th width="10%">Nama Jurusan</th>
                        <th width="15%">Nama Jenjang</th>
                        <th width="20%">Nama Spesifikasi</th>
                        <th width="20%">Nama Jenis</th>
                        <th width="30%">Nama Harga</th>
                        <th width="50%">Satuan</th>
                        <th width="20%">Harga</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;

                    while ($d_harga = $q_harga->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $d_harga['nama_jurusan_pdd']; ?></td>
                            <td><?php echo $d_harga['nama_jenjang_pdd']; ?></td>
                            <td><?php echo $d_harga['nama_spesifikasi_pdd']; ?></td>
                            <td><?php echo $d_harga['nama_harga_jenis']; ?></td>
                            <td><?php echo $d_harga['nama_harga']; ?></td>
                            <td><?php echo $d_harga['satuan_harga']; ?></td>
                            <td><?php echo "Rp " . number_format($d_harga['jumlah_harga'], 0, ",", "."); ?></td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#hrg_u_m" . $d_harga['id_harga']; ?>'>
                                    Ubah
                                </a>
                                <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#hrg_d_m" . $d_harga['id_harga']; ?>'>
                                    Hapus
                                </a>
                            </td>

                            <!-- modal ubah Harga  -->
                            <div class="modal fade" id="<?php echo "hrg_u_m" . $d_harga['id_harga']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="" class="form-group">
                                            <div class="modal-body">
                                                <h5>Ubah Harga :</h5>

                                                <!-- id_harga -->
                                                <input name="id_harga" value="<?php echo $d_harga['id_harga']; ?>" hidden>

                                                Nama Harga : <span style="color:red">*</span><br>
                                                <input class="form-control" name="nama_harga" value="<?php echo $d_harga['nama_harga']; ?>" required><br>

                                                Satuan Harga : <span style="color:red">*</span><br>
                                                <input class="form-control" name="satuan_harga" value="<?php echo $d_harga['satuan_harga']; ?>" required><br>

                                                Jumlah Harga : <i style='font-size:12px;'>(Rp)</i><span style="color:red">*</span><br>
                                                <input class="form-control" name="jumlah_harga" type="number" min="1" value="<?php echo $d_harga['jumlah_harga']; ?>" required>
                                                <i style='font-size:12px;'>Isian hanya berupa angka</i><br><br>

                                                Jenis Harga : <span style="color:red">*</span><br>
                                                <?php
                                                $sql_harga_jenis = "SELECT * FROM tb_harga_jenis order by nama_harga_jenis ASC";
                                                $q_harga_jenis = $conn->query($sql_harga_jenis);
                                                $r_harga_jenis = $q_harga_jenis->rowCount();
                                                if ($r_harga_jenis > 0) {
                                                ?>
                                                    <select class="form-control text-center" name="id_harga_jenis" id="u_id_harga_jenis<?php echo $d_harga['id_harga']; ?>" onChange='u_s_id_harga_jenis<?php echo $d_harga['id_harga']; ?>()' required>
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
                                                        <option value="0">-- Lainnya --</option>
                                                    </select>
                                                <?php
                                                } else {
                                                ?>
                                                    <b><i>Data Jenis Harga Tidak Ada</i></b>
                                                <?php
                                                }
                                                ?>
                                                <div id="u_i_id_harga_jenis<?php echo $d_harga['id_harga']; ?>">
                                                </div><br>

                                                Jurusan : <span style="color:red">*</span><br>
                                                <?php
                                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";
                                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();
                                                if ($r_jurusan_pdd > 0) {
                                                ?>
                                                    <select class="form-control text-center" name="id_jurusan_pdd" id="u_id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>" onChange='u_s_id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>()' required>
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
                                                        <option value="0">-- Lainnya --</option>
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

                                                Pilihan : <span style="color:red">*</span><br>
                                                <div class="form-check">
                                                    <?php
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

                                                <br>
                                                <input type="submit" class="btn btn-success" name="ubah_harga" value="Ubah">
                                                <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Kembali">

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
                                                <input name="id_jurusan_pdd" value="<?php echo $d_harga['id_jurusan_pdd']; ?>" hidden>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" name="hapus">Ya</button>
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
        <div class="card-header align-content-center text-center bg-gray-300 text-gray-600">
            <h5 class="m-0 font-weight-bold">Data Harga Tidak Ada</h5>
        </div>
    <?php
    }
    ?>
</div>