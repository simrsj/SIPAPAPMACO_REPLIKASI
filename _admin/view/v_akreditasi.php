<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Akreditasi</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-outline-success btn-sm href=' #' data-toggle='modal' data-target='#akr_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah Akreditasi  -->
            <div class="modal fade" id="akr_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-body">
                                <h6>Tambah Akreditasi :</h6>
                                <input class="form-control" name="nama_akreditasi">
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
            <?php
            $sql_akreditasi = "SELECT * FROM tb_akreditasi order by nama_akreditasi ASC";
            $q_akreditasi = $conn->query($sql_akreditasi);
            $r_akreditasi = $q_akreditasi->rowCount();
            if ($r_akreditasi > 0) {
            ?>
                <div class="table-responsive">
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Akreditasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_akreditasi = $q_akreditasi->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_akreditasi['nama_akreditasi']; ?></td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_u_m" . $d_akreditasi['id_akreditasi']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_d_m" . $d_akreditasi['id_akreditasi']; ?>'>
                                            Hapus
                                        </a>
                                    </td>
                                    <?php $no++; ?>
                                    <!-- modal ubah Akreditasi  -->
                                    <div class="modal fade" id="<?php echo "akr_u_m" . $d_akreditasi['id_akreditasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <h5>Ubah Akreditasi :</h5>
                                                        <input name="id_akreditasi" value="<?php echo $d_akreditasi['id_akreditasi']; ?>" hidden>
                                                        <input class="form-control" name="nama_akreditasi" value="<?php echo $d_akreditasi['nama_akreditasi']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="<?php echo "akr_d_m" . $d_akreditasi['id_akreditasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>Hapus Data</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><b><?php echo $d_akreditasi['nama_akreditasi']; ?></b></h6>
                                                        <input name="id_akreditasi" value="<?php echo $d_akreditasi['id_akreditasi']; ?>" hidden>
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
                <h3> Data Akreditasi Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) {
    $conn->query("UPDATE `tb_akreditasi` SET `nama_akreditasi` = '" . $_POST['nama_akreditasi'] . "' WHERE `tb_akreditasi`.`id_akreditasi` = " . $_POST['id_akreditasi']);
?>
    <script>
        document.location.href = "?akr";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {
    $conn->query("INSERT INTO `tb_akreditasi` (`nama_akreditasi`) VALUES ('" . $_POST['nama_akreditasi'] . "')");
?>
    <script>
        document.location.href = "?akr";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_akreditasi` WHERE `id_akreditasi` = " . $_POST['id_akreditasi']);
?>
    <script>
        document.location.href = "?akr";
    </script>
<?php
}