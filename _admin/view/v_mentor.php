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
                        TAMBAH DATA MENTOR
                    </div>
                    <div class="modal-body">
                        <input name="id_mentor" value="<?php echo $d_mentor['id_mentor']; ?>" hidden>
                        NIP/NIPK : <br>
                        <input type="number" class="form-control" name="nip_nipk_mentor"><br>

                        Nama Pembimbing :<br>
                        <input class="form-control" name="nama_mentor"><br>

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
                        $sql_mentor_jenis = "SELECT * FROM tb_mentor_jenis ORDER BY nama_mentor_jenis ASC";

                        $q_mentor_jenis = $conn->query($sql_mentor_jenis);
                        $r_mentor_jenis = $q_mentor_jenis->rowCount();

                        if ($r_mentor_jenis > 0) {
                        ?>
                            <select class="form-control" name='id_mentor_jenis' required>
                                <option value="">-- Pilih --</option>
                                <?php
                                while ($d_mentor_jenis = $q_mentor_jenis->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value='<?php echo $d_mentor_jenis['id_mentor_jenis']; ?>'>
                                        <?php echo $d_mentor_jenis['nama_mentor_jenis'] ?>
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
                        $sql_mentor_jenis = "SELECT * FROM tb_jenjang_pdd ORDER BY nama_jenjang_pdd ASC";
                        // echo $sql_mentor_jenis;
                        $q_mentor_jenis = $conn->query($sql_mentor_jenis);
                        $r_mentor_jenis = $q_mentor_jenis->rowCount();

                        // echo $r_mentor_jenis;
                        if ($r_mentor_jenis > 0) {
                        ?>
                            <select class="form-control" name='id_jenjang_pdd' required>
                                <option value="">-- Pilih --</option>s
                                <?php
                                while ($d_mentor_jenis = $q_mentor_jenis->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option <?php echo $selected; ?> value='<?php echo $d_mentor_jenis['id_jenjang_pdd']; ?>'>
                                        <?php echo $d_mentor_jenis['nama_jenjang_pdd'] ?>
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
                        <button type="submit" class="btn btn-success btn-sm" name="tambah_mentor">Tambah</button>
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
                $sql_mentor = "SELECT * FROM tb_mentor 
                JOIN tb_mentor_jenis ON tb_mentor.id_mentor_jenis = tb_mentor_jenis.id_mentor_jenis 
                JOIN tb_unit ON tb_mentor.id_unit = tb_unit.id_unit 
                JOIN tb_jenjang_pdd ON tb_mentor.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                ORDER BY nama_mentor ASC";

                $q_mentor = $conn->query($sql_mentor);
                $r_mentor = $q_mentor->rowCount();
                $d_mentor = $q_mentor->fetch(PDO::FETCH_ASSOC);

                if ($r_mentor > 0) { ?>
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

                            $q_mentor_a = $conn->query($sql_mentor);
                            $no = 1;

                            while ($d_mentor = $q_mentor_a->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_mentor['nip_nipk_mentor']; ?></td>
                                    <td><?php echo $d_mentor['nama_mentor']; ?></td>
                                    <td><?php echo $d_mentor['nama_unit']; ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <?php
                                            switch ($d_mentor['status_mentor']) {
                                                case "Aktif":
                                                    $btn_status_mentor = "success";
                                                    $nama_status_mentor = "Aktif";
                                                    break;
                                                case "Tidak Aktif":
                                                    $btn_status_mentor = "danger";
                                                    $nama_status_mentor = "Non-Aktif";
                                                    break;
                                            }
                                            ?>
                                            <input name='id_mentor' value="<?php echo $d_mentor['id_mentor']; ?>" hidden>
                                            <input name='status_mentor' value='<?php echo $d_mentor['status_mentor']; ?>' hidden>
                                            <button title="<?php echo $d_mentor['status_mentor']; ?>" type="submit" name="ubah_status_mentor" class="<?php echo "btn btn-" . $btn_status_mentor . " btn-sm"; ?>">
                                                <?php echo $nama_status_mentor; ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mtr_u_m" . $d_mentor['id_mentor']; ?>'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mtr_d_m" . $d_mentor['id_mentor']; ?>'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>

                                        <!-- modah ubah -->
                                        <div class="modal fade" id="<?php echo "mtr_u_m" . $d_mentor['id_mentor']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            UBAH DATA MENTOR
                                                        </div>
                                                        <div class="modal-body">
                                                            <input name="id_mentor" value="<?php echo $d_mentor['id_mentor']; ?>" hidden>
                                                            NIP/NIPK : <br>
                                                            <input class="form-control" name="nip_nipk_mentor" value="<?php echo $d_mentor['nip_nipk_mentor']; ?>"><br>

                                                            Nama Pembimbing :<br>
                                                            <input class="form-control" name="nama_mentor" value="<?php echo $d_mentor['nama_mentor']; ?>" size="35px"><br>

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
                                                                        if (strtolower($d_unit['id_unit']) == strtolower($d_mentor['id_unit'])) {
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
                                                            $sql_mentor_jenis = "SELECT * FROM tb_mentor_jenis ORDER BY nama_mentor_jenis ASC";
                                                            // echo $sql_mentor_jenis;
                                                            $q_mentor_jenis = $conn->query($sql_mentor_jenis);
                                                            $r_mentor_jenis = $q_mentor_jenis->rowCount();

                                                            // echo $r_mentor_jenis;
                                                            if ($r_mentor_jenis > 0) {
                                                            ?>
                                                                <select class="form-control" name='id_mentor_jenis'>
                                                                    <?php
                                                                    while ($d_mentor_jenis = $q_mentor_jenis->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (strtolower($d_mentor_jenis['id_mentor_jenis']) == strtolower($d_mentor['id_mentor_jenis'])) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = "";
                                                                        }
                                                                    ?>
                                                                        <option <?php echo $selected; ?> value='<?php echo $d_mentor_jenis['id_mentor_jenis']; ?>'>
                                                                            <?php echo $d_mentor_jenis['nama_mentor_jenis'] ?>
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
                                                            $sql_mentor_jenis = "SELECT * FROM tb_jenjang_pdd ORDER BY nama_jenjang_pdd ASC";
                                                            // echo $sql_mentor_jenis;
                                                            $q_mentor_jenis = $conn->query($sql_mentor_jenis);
                                                            $r_mentor_jenis = $q_mentor_jenis->rowCount();

                                                            // echo $r_mentor_jenis;
                                                            if ($r_mentor_jenis > 0) {
                                                            ?>
                                                                <select class="form-control" name='id_jenjang_pdd'>
                                                                    <?php
                                                                    while ($d_mentor_jenis = $q_mentor_jenis->fetch(PDO::FETCH_ASSOC)) {
                                                                        if (strtolower($d_mentor_jenis['id_jenjang_pdd']) == strtolower($d_mentor['id_jenjang_pdd'])) {
                                                                            $selected = "selected";
                                                                        } else {
                                                                            $selected = "";
                                                                        }
                                                                    ?>
                                                                        <option <?php echo $selected; ?> value='<?php echo $d_mentor_jenis['id_jenjang_pdd']; ?>'>
                                                                            <?php echo $d_mentor_jenis['nama_jenjang_pdd'] ?>
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
                                                            <button type="submit" class="btn btn-success btn-sm" name="ubah_mentor">Ubah</button>
                                                            <button class="btn btn-outline-dark" type="button" data-dismiss="modal">Tidak</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal hapus Mess -->
                                        <div class="modal fade" id="<?php echo "mtr_d_m" . $d_mentor['id_mentor']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            <h5>HAPUS MENTOR ?</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Nama Mentor :
                                                            <h6><b><?php echo $d_mentor['nip_nipk_mentor	']; ?></b></h6>
                                                            NIP/NIPK :
                                                            <h6><b><?php echo $d_mentor['nama_pemilik_mess']; ?></b></h6>
                                                            <input name="id_mentor" value="<?php echo $d_mentor['id_mentor']; ?>" hidden>
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
if (isset($_POST['tambah_mentor'])) {
    $sql_tambah_mentor = "INSERT INTO tb_mentor (
        nip_nipk_mentor, 
        nama_mentor,
        id_unit, 
        jenis_mentor,
        id_jenjang_pdd, 
        status_mentor
    ) VALUES (
        '" . $_POST['nip_nipk_mentor'] . "',
        '" . $_POST['nama_mentor'] . "',
        '" . $_POST['id_unit'] . "',
        '" . $_POST['jenis_mentor'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        'Aktif'
    )";

    // echo $sql_tambah_mentor;
    $conn->query($sql_tambah_mentor);
?>
    <script>
        document.location.href = "?mtr";
    </script>
<?php
} elseif (isset($_POST['ubah_mentor'])) {
    $sql_ubah_mentor = "UPDATE `tb_mentor` SET 
    `nip_nipk_mentor` = '" . $_POST['nip_nipk_mentor'] . "', 
    `nama_mentor` = '" . $_POST['nama_mentor'] . "', 
    `id_unit` = '" . $_POST['id_unit'] . "', 
    `id_mentor_jenis` = '" . $_POST['id_mentor_jenis'] . "', 
    `id_jenjang_pdd` = '" . $_POST['id_jenjang_pdd'] . "'
    WHERE `id_mentor` = '" . $_POST['id_mentor'] . "'";
    // echo $sql_ubah_mentor;
    $conn->query($sql_ubah_mentor);
?>
    <script>
        document.location.href = "?mtr";
    </script>
<?php
} elseif (isset($_POST['ubah_status_mentor'])) {
    switch ($_POST['status_mentor']) {
        case "Aktif":
            $ubah_status_mentor = "Tidak Aktif";
            break;
        case "Tidak Aktif":
            $ubah_status_mentor = "Aktif";
            break;
    }
    $sql_status_mentor =
        "UPDATE `tb_mentor` SET `status_mentor` = '$ubah_status_mentor' WHERE `id_mentor` = '" . $_POST['id_mentor'] . "'";
    // echo $sql_status_mentor;
    $conn->query($sql_status_mentor);
?>
    <script>
        document.location.href = "?mtr";
    </script>
<?php
}
