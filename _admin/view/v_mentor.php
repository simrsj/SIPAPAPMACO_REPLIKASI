<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-11">
            <h1 class="h3 mb-2 text-gray-800">Daftar Pembimbing</h1>
        </div>
        <div class="col-lg-1">
            <p>
                <a href="#" data-toggle='modal' data-target="#mtr_t_m" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </p>
        </div>
    </div>

    <!-- modah tambah -->
    <div class="modal fade" id="mtr_t_m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        TAMBAH DATA PEMBIMBING
                    </div>
                    <div class="modal-body">
                        <input name="id_pembimbing" value="<?php echo $d_pembimbing['id_pembimbing']; ?>" hidden>
                        NIP/NIPK : <br>
                        <input type="number" class="form-control" name="no_id_pembimbing"><br>

                        Nama Pembimbing :<br>
                        <input class="form-control" name="nama_pembimbing"><br>

                        Unit/Ruangan :<br>
                        <?php
                        $sql_unit = "SELECT * FROM tb_unit order by nama_unit ASC";

                        $q_unit = $conn->query($sql_unit);
                        $r_unit = $q_unit->rowCount();

                        if ($r_unit > 0) {
                        ?>
                            <select class="form-control" name='id_unit' required>
                                <option value=''>-- Pilih --</option>
                                <?php
                                while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value='<?php echo $d_unit['id_unit']; ?>'>
                                        <?php echo $d_unit['nama_unit']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                        <?php
                        } else {
                        ?>
                            <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Unit Tida Ada</i>
                        <?php
                        }
                        ?>

                        Jenis Pembimbing : <br>
                        <?php
                        $sql_pembimbing_jenis = "SELECT * FROM tb_pembimbing_jenis ORDER BY nama_pembimbing_jenis ASC";

                        $q_pembimbing_jenis = $conn->query($sql_pembimbing_jenis);
                        $r_pembimbing_jenis = $q_pembimbing_jenis->rowCount();

                        if ($r_pembimbing_jenis > 0) {
                        ?>
                            <select class="form-control" name='id_pembimbing_jenis' required>
                                <option value="">-- Pilih --</option>
                                <?php
                                while ($d_pembimbing_jenis = $q_pembimbing_jenis->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value='<?php echo $d_pembimbing_jenis['id_pembimbing_jenis']; ?>'>
                                        <?php echo $d_pembimbing_jenis['nama_pembimbing_jenis'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                        <?php
                        } else {
                        ?>
                            <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>
                        <?php
                        }
                        ?>

                        Pendidikan Pembimbing : <br>
                        <?php
                        $sql_pembimbing_jenis = "SELECT * FROM tb_jenjang_pdd ORDER BY nama_jenjang_pdd ASC";
                        // echo $sql_pembimbing_jenis;
                        $q_pembimbing_jenis = $conn->query($sql_pembimbing_jenis);
                        $r_pembimbing_jenis = $q_pembimbing_jenis->rowCount();

                        // echo $r_pembimbing_jenis;
                        if ($r_pembimbing_jenis > 0) {
                        ?>
                            <select class="form-control" name='id_jenjang_pdd' required>
                                <option value="">-- Pilih --</option>s
                                <?php
                                while ($d_pembimbing_jenis = $q_pembimbing_jenis->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option <?php echo $selected; ?> value='<?php echo $d_pembimbing_jenis['id_jenjang_pdd']; ?>'>
                                        <?php echo $d_pembimbing_jenis['nama_jenjang_pdd'] ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                        <?php
                        } else {
                        ?>
                            <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" name="tambah_pembimbing">Tambah</button>
                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $sql_pembimbing = "SELECT * FROM tb_pembimbing 
                JOIN tb_pembimbing_jenis ON tb_pembimbing.id_pembimbing_jenis = tb_pembimbing_jenis.id_pembimbing_jenis 
                JOIN tb_unit ON tb_pembimbing.id_unit = tb_unit.id_unit 
                JOIN tb_jenjang_pdd ON tb_pembimbing.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                ORDER BY nama_pembimbing ASC";

                $q_pembimbing = $conn->query($sql_pembimbing);
                $r_pembimbing = $q_pembimbing->rowCount();

                if ($r_pembimbing > 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope='col'>No</th>
                                    <th>NIP/NIPK</th>
                                    <th>Nama Pembimbing</th>
                                    <th>Unit</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_pembimbing = $q_pembimbing->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d_pembimbing['no_id_pembimbing']; ?></td>
                                        <td><?php echo $d_pembimbing['nama_pembimbing']; ?></td>
                                        <td><?php echo $d_pembimbing['nama_unit']; ?></td>
                                        <td>

                                            <!-- Aktivasi status Pembimbing -->
                                            <form method="post" action="">
                                                <?php
                                                switch ($d_pembimbing['status_pembimbing']) {
                                                    case "y":
                                                        $btn_status_pembimbing = "success";
                                                        $nama_status_pembimbing = "Aktif";
                                                        break;
                                                    case "t":
                                                        $btn_status_pembimbing = "danger";
                                                        $nama_status_pembimbing = "Non-Aktif";
                                                        break;
                                                }
                                                ?>
                                                <input name='id_pembimbing' value="<?php echo $d_pembimbing['id_pembimbing']; ?>" hidden>
                                                <input name='status_pembimbing' value='<?php echo $d_pembimbing['status_pembimbing']; ?>' hidden>
                                                <button title="<?php echo $d_pembimbing['status_pembimbing']; ?>" type="submit" name="ubah_status_pembimbing" class="<?php echo "btn btn-" . $btn_status_pembimbing . " btn-sm"; ?>">
                                                    <?php echo $nama_status_pembimbing; ?>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mtr_u_m" . $d_pembimbing['id_pembimbing']; ?>'>
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mtr_d_m" . $d_pembimbing['id_pembimbing']; ?>'>
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <!-- modah ubah -->
                                            <div class="modal fade" id="<?php echo "mtr_u_m" . $d_pembimbing['id_pembimbing']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form method="post" action="">
                                                            <div class="modal-header">
                                                                UBAH DATA PEMBIMBING
                                                            </div>
                                                            <div class="modal-body">
                                                                <input name="id_pembimbing" value="<?php echo $d_pembimbing['id_pembimbing']; ?>" hidden>
                                                                NIP/NIPK : <br>
                                                                <input class="form-control" name="no_id_pembimbing" value="<?php echo $d_pembimbing['no_id_pembimbing']; ?>"><br>

                                                                Nama Pembimbing :<br>
                                                                <input class="form-control" name="nama_pembimbing" value="<?php echo $d_pembimbing['nama_pembimbing']; ?>" size="35px"><br>

                                                                Unit/Ruangan :<br>
                                                                <?php
                                                                $sql_unit = "SELECT * FROM tb_unit order by nama_unit ASC";

                                                                $q_unit = $conn->query($sql_unit);
                                                                $r_unit = $q_unit->rowCount();

                                                                if ($r_unit > 0) {
                                                                ?>
                                                                    <select class="form-control" name='id_unit'>
                                                                        <?php
                                                                        while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
                                                                            if (strtolower($d_unit['id_unit']) == strtolower($d_pembimbing['id_unit'])) {
                                                                                $selected = "selected";
                                                                            } else {
                                                                                $selected = "";
                                                                            }
                                                                        ?>
                                                                            <option <?php echo $selected; ?> value='<?php echo $d_unit['id_unit']; ?>'>
                                                                                <?php echo $d_unit['nama_unit']; ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <br>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Unit Tida Ada</i>
                                                                <?php
                                                                }
                                                                ?>

                                                                Jenis Pembimbing : <br>
                                                                <?php
                                                                $sql_pembimbing_jenis = "SELECT * FROM tb_pembimbing_jenis ORDER BY nama_pembimbing_jenis ASC";
                                                                // echo $sql_pembimbing_jenis;
                                                                $q_pembimbing_jenis = $conn->query($sql_pembimbing_jenis);
                                                                $r_pembimbing_jenis = $q_pembimbing_jenis->rowCount();

                                                                // echo $r_pembimbing_jenis;
                                                                if ($r_pembimbing_jenis > 0) {
                                                                ?>
                                                                    <select class="form-control" name='id_pembimbing_jenis'>
                                                                        <?php
                                                                        while ($d_pembimbing_jenis = $q_pembimbing_jenis->fetch(PDO::FETCH_ASSOC)) {
                                                                            if (strtolower($d_pembimbing_jenis['id_pembimbing_jenis']) == strtolower($d_pembimbing['id_pembimbing_jenis'])) {
                                                                                $selected = "selected";
                                                                            } else {
                                                                                $selected = "";
                                                                            }
                                                                        ?>
                                                                            <option <?php echo $selected; ?> value='<?php echo $d_pembimbing_jenis['id_pembimbing_jenis']; ?>'>
                                                                                <?php echo $d_pembimbing_jenis['nama_pembimbing_jenis'] ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>
                                                                <?php
                                                                }
                                                                ?>

                                                                Pendidikan Pembimbing : <br>
                                                                <?php
                                                                $sql_pembimbing_jenis = "SELECT * FROM tb_jenjang_pdd ORDER BY nama_jenjang_pdd ASC";
                                                                // echo $sql_pembimbing_jenis;
                                                                $q_pembimbing_jenis = $conn->query($sql_pembimbing_jenis);
                                                                $r_pembimbing_jenis = $q_pembimbing_jenis->rowCount();

                                                                // echo $r_pembimbing_jenis;
                                                                if ($r_pembimbing_jenis > 0) {
                                                                ?>
                                                                    <select class="form-control" name='id_jenjang_pdd'>
                                                                        <?php
                                                                        while ($d_pembimbing_jenis = $q_pembimbing_jenis->fetch(PDO::FETCH_ASSOC)) {
                                                                            if (strtolower($d_pembimbing_jenis['id_jenjang_pdd']) == strtolower($d_pembimbing['id_jenjang_pdd'])) {
                                                                                $selected = "selected";
                                                                            } else {
                                                                                $selected = "";
                                                                            }
                                                                        ?>
                                                                            <option <?php echo $selected; ?> value='<?php echo $d_pembimbing_jenis['id_jenjang_pdd']; ?>'>
                                                                                <?php echo $d_pembimbing_jenis['nama_jenjang_pdd'] ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success btn-sm" name="ubah_pembimbing">Ubah</button>
                                                                <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Tidak</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- modal hapus Mess -->
                                            <div class="modal fade" id="<?php echo "mtr_d_m" . $d_pembimbing['id_pembimbing']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form method="post" action="">
                                                            <div class="modal-header">
                                                                <h5>HAPUS PEMBIMBING ?</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                Nama Pembimbing :
                                                                <h6><b><?php echo $d_pembimbing['no_id_pembimbing']; ?></b></h6>
                                                                NIP/NIPK :
                                                                <h6><b><?php echo $d_pembimbing['nama_pembimbing']; ?></b></h6>
                                                                <input name="id_pembimbing" value="<?php echo $d_pembimbing['id_pembimbing']; ?>" hidden>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-danger" name="hapus">Ya</button>
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
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
                    <h3> Data Pembimbing Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['tambah_pembimbing'])) {
    $sql_tambah_pembimbing = "INSERT INTO tb_pembimbing (
        no_id_pembimbing, 
        nama_pembimbing,
        id_unit, 
        jenis_pembimbing,
        id_jenjang_pdd, 
        status_pembimbing
    ) VALUES (
        '" . $_POST['no_id_pembimbing'] . "',
        '" . $_POST['nama_pembimbing'] . "',
        '" . $_POST['id_unit'] . "',
        '" . $_POST['jenis_pembimbing'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        'y'
    )";

    // echo $sql_tambah_pembimbing;
    $conn->query($sql_tambah_pembimbing);
?>
    <script>
        document.location.href = "?mtr";
    </script>
<?php
} elseif (isset($_POST['ubah_pembimbing'])) {
    $sql_ubah_pembimbing = "UPDATE `tb_pembimbing` SET 
    `no_id_pembimbing` = '" . $_POST['no_id_pembimbing'] . "', 
    `nama_pembimbing` = '" . $_POST['nama_pembimbing'] . "', 
    `id_unit` = '" . $_POST['id_unit'] . "', 
    `id_pembimbing_jenis` = '" . $_POST['id_pembimbing_jenis'] . "', 
    `id_jenjang_pdd` = '" . $_POST['id_jenjang_pdd'] . "'
    WHERE `id_pembimbing` = '" . $_POST['id_pembimbing'] . "'";
    // echo $sql_ubah_pembimbing;
    $conn->query($sql_ubah_pembimbing);
?>
    <script>
        document.location.href = "?mtr";
    </script>
<?php
} elseif (isset($_POST['ubah_status_pembimbing'])) {
    switch ($_POST['status_pembimbing']) {
        case "y":
            $ubah_status_pembimbing = "t";
            break;
        case "t":
            $ubah_status_pembimbing = "y";
            break;
    }
    $sql_status_pembimbing =
        "UPDATE `tb_pembimbing` SET `status_pembimbing` = '$ubah_status_pembimbing' WHERE `id_pembimbing` = '" . $_POST['id_pembimbing'] . "'";
    // echo $sql_status_pembimbing;
    $conn->query($sql_status_pembimbing);
?>
    <script>
        document.location.href = "?mtr";
    </script>
<?php
}
