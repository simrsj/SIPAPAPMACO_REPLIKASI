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
                                    <select class="form-control text-center" name="id_harga_jenis" id="id_harga_jenis" onChange='s_id_harga_jenis()' required>
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
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jenis Harga Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <div id="i_id_harga_jenis">
                                </div><br>
                                Jurusan : <span style="color:red">*</span><br>
                                <?php
                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                                if ($r_jurusan_pdd > 0) {
                                ?>
                                    <select class="form-control text-center" name="id_jurusan_pdd" id="id_jurusan_pdd" onChange='s_id_jurusan_pdd()' required>
                                        <option value="">-- Pilih Jenis Harga --</option>
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
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jurusan Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <div id="i_id_jurusan_pdd" style='color: honeydew;'>
                                </div><br>
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
        } elseif ($_GET['hrg'] == 0) {
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
            } else {
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
                                    <?php $no++; ?>

                                    <!-- modal ubah Harga  -->
                                    <div class="modal fade" id="<?php echo "hrg_u_m" . $d_harga['id_harga']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <h5>Ubah Harga :</h5>
                                                        <input name="id_harga" value="<?php echo $d_harga['id_harga']; ?>" hidden>
                                                        <input class="form-control" name="nama_harga" value="<?php echo $d_harga['nama_harga']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

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
    <input style="color: honeydew;">
</div>

<script>
    function s_id_jurusan_pdd() {
        if ($('#id_jurusan_pdd').val() == '0') {
            console.log("form select id_jurusan_pdd");
            $('#i_id_jurusan_pdd').append("<input type='text' class='form-control' placeHolder='isikan nama jurusan' name='nama_jurusan_pdd'>").focus();
        } else {
            console.log("x form select id_jurusan_pdd");
            $('#i_id_jurusan_pdd').empty();
        }
    }

    function s_id_harga_jenis() {
        if ($('#id_harga_jenis').val() == '0') {
            console.log("form select id_harga_jenis");
            $('#i_id_harga_jenis').append("<input type='text' class='form-control' placeHolder='isikan nama jenis harga' name='nama_harga_jenis'>").focus();
        } else {
            console.log("x form select id_harga_jenis");
            $('#i_id_harga_jenis').empty();
        }
    }
</script>
<?php
if (isset($_POST['ubah'])) {
    $conn->query("UPDATE `tb_harga` SET `nama_harga` = '" . $_POST['nama_harga'] . "' WHERE `tb_harga`.`id_harga` = " . $_POST['id_harga']);
?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
} elseif (isset($_POST['tambah_harga'])) {
    $conn->query("INSERT INTO `tb_harga` (`nama_harga`) VALUES ('" . $_POST['nama_harga'] . "')");
?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_harga` WHERE `id_harga` = " . $_POST['id_harga']);
?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
}
