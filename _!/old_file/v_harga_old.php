<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-outline-success btn-sm' href='#' data-toggle='modal' data-target='#hrg_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah Harga  -->
            <div class="modal fade" id="hrg_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <h4 style="color:black;">Tambah Harga :</h4>
                            </div>
                            <div class="modal-body">
                                Nama Harga : <span style="color:red">*</span><br>
                                <input class="form-control" name="nama_harga" required><br>
                                Satuan Harga : <span style="color:red">*</span><br>
                                <input class="form-control" name="satuan_harga" required><br>
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
                                    <select class="form-control text-center" name="id_harga_jenis" id="t_id_harga_jenis" onChange='t_s_id_harga_jenis()' required>
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
                                        <option value="0">-- Lainnya --</option>
                                        <option value="baru">-- Baru --</option>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jenis Harga Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <div id="t_i_id_harga_jenis">
                                </div><br>

                                Jurusan : <span style="color:red">*</span><br>
                                <?php
                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                                if ($r_jurusan_pdd > 0) {
                                ?>
                                    <select class="form-control text-center" name="id_jurusan_pdd" id="t_id_jurusan_pdd" onChange='t_s_id_jurusan_pdd()' required>
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
                                        <option value="0">-- Lainnya --</option>
                                        <option value="baru">-- Baru --</option>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jurusan Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <div id="t_i_id_jurusan_pdd">
                                </div><br>

                                <!-- js modal tambah pilih jenis harga dan jurusan lainnya -->
                                <script>
                                    function t_s_id_harga_jenis() {
                                        if ($('#t_id_harga_jenis').val() == 'baru') {
                                            console.log("form select t_id_harga_jenis");
                                            $('#t_i_id_harga_jenis').append("<input type='text' class='form-control' placeHolder='isikan nama jenis harga' name='nama_harga_jenis'>").focus();
                                        } else {
                                            console.log("x form select id_harga_jenis");
                                            $('#t_i_id_harga_jenis').empty();
                                        }
                                    }

                                    function t_s_id_jurusan_pdd() {
                                        if ($('#t_id_jurusan_pdd').val() == 'baru') {
                                            console.log("form select t_id_jurusan_pdd");
                                            $('#t_i_id_jurusan_pdd').append("<input type='text' class='form-control' placeHolder='isikan nama jurusan' name='nama_jurusan_pdd'>").focus();
                                        } else {
                                            console.log("x form select t_id_jurusan_pdd");
                                            $('#t_i_id_jurusan_pdd').empty();
                                        }
                                    }
                                </script>

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
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" name="tambah_harga" value="Tambah">
                                <input class="btn btn-secondary" type="button" data-dismiss="modal" value="Kembali">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">

        <?php
        if ($_GET['hrg'] == 1) {
            $active_1 = "active";
            $id_jurusan_pdd = 1;
        } elseif ($_GET['hrg'] == 2) {
            $active_2 = "active";
            $id_jurusan_pdd = 2;
        } elseif ($_GET['hrg'] == 9) {
            $active_9 = "active";
            $id_jurusan_pdd = 9;
        } else {
            $active_0 = "active";
            $id_jurusan_pdd = 0;
        }
        ?>

        <nav class="navbar navbar-expand-sm bg-light navbar-dark">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_1; ?>" href="?hrg=1">Kedokteran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_2; ?>" href="?hrg=2">Keperawatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_9; ?>" href="?hrg=9">Nakes Lainnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $active_0; ?>" href="?hrg=0">Lainnya</a>
                </li>
            </ul>
        </nav>
        <div class="card-body">
            <?php
            if ($id_jurusan_pdd == 0) {
                $sql_harga = "SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis
                WHERE tb_harga.id_jurusan_pdd = $id_jurusan_pdd ORDER BY nama_harga_jenis ASC, nama_harga ASC";
            } elseif ($id_jurusan_pdd == 1 || $id_jurusan_pdd == 2) {
                $sql_harga = "SELECT * FROM tb_harga 
                JOIN tb_jurusan_pdd ON tb_harga.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis
                WHERE tb_harga.id_jurusan_pdd = $id_jurusan_pdd ORDER BY nama_harga_jenis ASC, nama_harga ASC";
            }

            $q_harga = $conn->query($sql_harga);
            $r_harga = $q_harga->rowCount();
            if ($r_harga > 0) {
            ?>
                <div class="table-responsive">
                    <table class=' table table-hover table-striped'>
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th width="20%">Nama Jenis</th>
                                <th width="30%">Nama Harga</th>
                                <th width="12%">Satuan</th>
                                <th width="12%">Harga</th>
                                <th>Jenis</th>
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
                                                                <option value="baru">-- Baru --</option>
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
                                                                <option value="baru">-- Baru --</option>
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

                                                        <!-- js modal ubah pilih jenis harga dan jurusan lainnya -->
                                                        <script>
                                                            function u_s_id_harga_jenis<?php echo $d_harga['id_harga']; ?>() {
                                                                if ($('#u_id_harga_jenis<?php echo $d_harga['id_harga']; ?>').val() == 'baru') {
                                                                    console.log("form select ubah id_harga_jenis<?php echo $d_harga['id_harga']; ?>");
                                                                    $('#u_i_id_harga_jenis<?php echo $d_harga['id_harga']; ?>').append("<input type='text' class='form-control' placeHolder='isikan nama jenis harga' name='nama_harga_jenis'>").focus();
                                                                } else {
                                                                    console.log("x form select id_harga_jenis<?php echo $d_harga['id_harga']; ?>");
                                                                    $('#u_i_id_harga_jenis<?php echo $d_harga['id_harga']; ?>').empty();
                                                                }
                                                            }

                                                            function u_s_id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>() {
                                                                if ($('#u_id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>').val() == 'baru') {
                                                                    console.log("form select ubah id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>");
                                                                    $('#u_i_id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>').append("<input type='text' class='form-control' placeHolder='isikan nama jurusan' name='nama_jurusan_pdd'>").focus();
                                                                } else {
                                                                    console.log("x form select ubah id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>");
                                                                    $('#u_i_id_jurusan_pdd<?php echo $d_harga['id_harga']; ?>').empty();
                                                                }
                                                            }
                                                        </script>
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
                <h3 class="text-center text-justify"> Data Harga Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah_harga'])) {
    $sql_ubah = "UPDATE `tb_harga` SET 
    `nama_harga` = '" . $_POST['nama_harga'] . "',
    `satuan_harga` = '" . $_POST['satuan_harga'] . "',
    `jumlah_harga` = '" . $_POST['jumlah_harga'] . "',
    `id_harga_jenis` = '" . $_POST['id_harga_jenis'] . "',
    `id_jurusan_pdd` = '" . $_POST['id_jurusan_pdd'] . "',
    `pilih_harga` = '" . $_POST['pilih_harga'] . "'
    WHERE `tb_harga`.`id_harga` = " . $_POST['id_harga'];
    //$conn->query($sql_ubah);
    echo $sql_ubah;
    $link = "?hrg=" . $_POST['id_jurusan_pdd'];
?>
    <!-- <script>
        document.location.href = "<?php echo $link; ?>";
    </scriptz> -->
<?php
} elseif (isset($_POST['tambah_harga'])) {

    //memasukan jenis harga baru
    if ($_POST['id_harga_jenis'] == 'baru') {

        //mencari id_harga_jenis yang belum ada
        $sql_harga_jenis = "SELECT * FROM tb_harga_jenis order by id_harga_jenis ASC";
        $q_harga_jenis = $conn->query($sql_harga_jenis);
        $no = 1;
        while ($d_harga_jenis = $q_harga_jenis->fetch(PDO::FETCH_ASSOC)) {
            if ($no != $d_harga_jenis['id_harga_jenis']) {
                $id_harga_jenis = $no;
                break;
            }
            $id_harga_jenis = $d_harga_jenis['id_harga_jenis'] + 1;
            $no++;
        }

        $sql_insert_harga_jenis =  "INSERT INTO tb_harga_jenis (id_harga_jenis, nama_harga_jenis) 
        VALUES ('" . $id_harga_jenis . "','" . $_POST['nama_harga_jenis'] . "')";
        // echo $sql_insert_harga_jenis . "<br>";
        // $conn->query($sql_insert_harga_jenis);
    } else {
        $id_harga_jenis = $_POST['id_harga_jenis'];
    }

    //memasukan jurusan baru
    if ($_POST['id_jurusan_pdd'] == 'baru') {

        //mencari id_jurusan_pdd yang belum ada
        $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by id_jurusan_pdd ASC";
        $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
        $no = 1;
        while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
            if ($no != $d_jurusan_pdd['id_jurusan_pdd']) {
                $id_jurusan_pdd = $no;
                break;
            }
            $id_jurusan_pdd = $d_jurusan_pdd['id_jurusan_pdd'] + 1;
            $no++;
        }

        $sql_insert_jurusan_pdd =  "INSERT INTO tb_jurusan_pdd (id_jurusan_pdd, nama_jurusan_pdd) 
        VALUES ('" . $id_jurusan_pdd . "', '" . $_POST['nama_jurusan_pdd'] . "')";
        // echo $sql_insert_jurusan_pdd . "<br>";
        $conn->query($sql_insert_jurusan_pdd);
    } else {
        $id_jurusan_pdd = $_POST['id_jurusan_pdd'];
    }

    $sql_insert_harga =  "INSERT INTO tb_harga (
        nama_harga,
        satuan_harga,
        jumlah_harga,
        id_jurusan_pdd,
        id_harga_jenis,
        pilih_harga
        ) VALUES (
            '" . $_POST['nama_harga'] . "',
            '" . $_POST['satuan_harga'] . "',
            '" . $_POST['jumlah_harga'] . "',
            '" . $id_jurusan_pdd . "',
            '" . $id_harga_jenis . "',
            '" . $_POST['pilih_harga'] . "'
            )";

    // echo $sql_insert_harga . "<br>";
    $conn->query($sql_insert_harga);

?>
    <script>
        document.location.href = "?hrg=<?php echo $id_jurusan_pdd; ?>";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_harga` WHERE `id_harga` = " . $_POST['id_harga']);
?>
    <script>
        document.location.href = "?hrg=<?php echo $_POST['id_jurusan_pdd'] ?>";
    </script>
<?php
}
