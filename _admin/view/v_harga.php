<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-success btn-sm' href=' #' data-toggle='modal' data-target='#hrg_i_m'>
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
                                Nama Harga : <br>
                                <input class="form-control" name="nama_harga" required><br>
                                Jenis Harga : <br>
                                <select class="form-control text-center text-justify" name="jenis_harga" width="40px" required>
                                    <option value="">-- Pilih Jenis Harga --</option>
                                    <option value="wajib">Wajib</option>
                                    <option value="optional">Optional</option>
                                    <option value="dokter">Dokter</option>
                                    <option value="perawat">Perawat</option>
                                    <option value="nakes_lainnya">Nakes Lainnya</option>
                                    <option value="nonnakes_lainnya">Non Nakes Lainnya</option>
                                </select><br>
                                Jenis Harga : <i style="font-size: small;">(Rp)</i><br>
                                <input class="form-control" type="number" name="jenis_harga" required><br>
                            </div>
                            <div class="modal-footer">
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
        <nav class="navbar navbar-expand-sm bg-light navbar-dark">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Kedokteran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Keperawatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nakes Lainnya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Non Nakes Lainnya</a>
                </li>
                <li>
                    <span class="navbar-text"> Ini adalah Text </span>
                </li>
            </ul>
        </nav>
        <div class="card-body">

            <?php
            $sql_harga = "SELECT * FROM tb_harga order by nama_harga ASC";
            $q_harga = $conn->query($sql_harga);
            $r_harga = $q_harga->rowCount();
            if ($r_harga > 0) {
            ?>
                <div class="table-responsive">
                    <table class='table table-striped'>
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Harga</th>
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
                                    <td><?php echo $d_harga['nama_harga']; ?></td>
                                    <td><?php echo $d_harga['satuan_harga']; ?></td>
                                    <td><?php echo $d_harga['ket_harga']; ?></td>
                                    <td><?php echo "Rp " . $d_harga['jumlah_harga']; ?></td>
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
</div>
<?php
if (isset($_POST['ubah'])) {
    $conn->query("UPDATE `tb_harga` SET `nama_harga` = '" . $_POST['nama_harga'] . "' WHERE `tb_harga`.`id_harga` = " . $_POST['id_harga']);
?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {
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
