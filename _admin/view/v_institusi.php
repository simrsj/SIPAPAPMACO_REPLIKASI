<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Institusi</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-success btn-sm' href='#' data-toggle='modal' data-target='#akr_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah Institusi  -->
            <div class="modal fade" id="akr_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-body">
                                <h6>Tambah Institusi :</h6>
                                <input class="form-control" name="nama_institusi">
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
                $sql_institusi = "SELECT * FROM tb_institusi order by nama_institusi ASC";
                $q_institusi = $conn->query($sql_institusi);
                $r_institusi = $q_institusi->rowCount();
                if ($r_institusi > 0) {
                ?>
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Institusi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_institusi['nama_institusi']; ?></td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_u_m" . $d_institusi['id_institusi']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_d_m" . $d_institusi['id_institusi']; ?>'>
                                            Hapus
                                        </a>
                                    </td>
                                    <?php $no++; ?>
                                    <!-- modal ubah Institusi  -->
                                    <div class="modal fade" id="<?php echo "akr_u_m" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <h5>Ubah Institusi :</h5>
                                                        <input name="id_institusi" value="<?php echo $d_institusi['id_institusi']; ?>" hidden>
                                                        <input class="form-control" name="nama_institusi" value="<?php echo $d_institusi['nama_institusi']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="<?php echo "akr_d_m" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>Hapus Data</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><b><?php echo $d_institusi['nama_institusi']; ?></b></h6>
                                                        <input name="id_institusi" value="<?php echo $d_institusi['id_institusi']; ?>" hidden>
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
            <h3 class="text-center text-justify"> Data Institusi Tidak Ada</h3>
        <?php
                }
        ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) {
    $conn->query("UPDATE `tb_institusi` SET `nama_institusi` = '" . $_POST['nama_institusi'] . "' WHERE `tb_institusi`.`id_institusi` = " . $_POST['id_institusi']);
?>
    <script>
        document.location.href = "?akr";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {
    $conn->query("INSERT INTO `tb_institusi` (`nama_institusi`) VALUES ('" . $_POST['nama_institusi'] . "')");
?>
    <script>
        document.location.href = "?akr";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_institusi` WHERE `id_institusi` = " . $_POST['id_institusi']);
?>
    <script>
        document.location.href = "?akr";
    </script>
<?php
}
