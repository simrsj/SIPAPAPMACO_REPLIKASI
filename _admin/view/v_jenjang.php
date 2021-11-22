<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Jenjang</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-success btn-sm' href='#' data-toggle='modal' data-target='#jjg_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah jurusan  -->
            <div class="modal fade" id="jjg_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-body">
                                <h6>Tambah Jenjang :</h6>
                                <input class="form-control" name="nama_jenjang_pdd">
                                <br>
                                <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Kembali</button>
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
                $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";
                $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                $r_jenjang_pdd = $q_jenjang_pdd->rowCount();
                if ($r_jenjang_pdd > 0) {
                ?>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Jenjang</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?></td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#jjg_u_m" . $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#jjg_d_m" . $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                            Hapus
                                        </a>
                                    </td>
                                    <?php $no++; ?>
                                    <!-- modal ubah jurusan  -->
                                    <div class="modal fade" id="<?php echo "jjg_u_m" . $d_jenjang_pdd['id_jenjang_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <h5>Ubah Jenjang :</h5>
                                                        <input name="id_jenjang_pdd" value="<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>" hidden>
                                                        <input class="form-control" name="nama_jenjang_pdd" value="<?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="<?php echo "jjg_d_m" . $d_jenjang_pdd['id_jenjang_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>Hapus Data</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><b><?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?></b></h6>
                                                        <input name="id_jenjang_pdd" value="<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>" hidden>
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
            <h3 class="text-center text-justify"> Data Jenjang Tidak Ada</h3>
        <?php
                }
        ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) {
    $conn->query("UPDATE `tb_jenjang_pdd` SET `nama_jenjang_pdd` = '" . $_POST['nama_jenjang_pdd'] . "' WHERE `tb_jenjang_pdd`.`id_jenjang_pdd` = " . $_POST['id_jenjang_pdd']);
?>
    <script>
        document.location.href = "?jjg";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {
    $conn->query("INSERT INTO `tb_jenjang_pdd` (`nama_jenjang_pdd`) VALUES ('" . $_POST['nama_jenjang_pdd'] . "')");
?>
    <script>
        document.location.href = "?jjg";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_jenjang_pdd` WHERE `id_jenjang_pdd` = " . $_POST['id_jenjang_pdd']);
?>
    <script>
        document.location.href = "?jjg";
    </script>
<?php
}
