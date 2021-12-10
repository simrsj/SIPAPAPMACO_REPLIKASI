<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Jurusan</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-success btn-sm' href='#' data-toggle='modal' data-target='#jrs_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah jurusan  -->
            <div class="modal fade" id="jrs_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-body">
                                <h5 class="font-weight-bold-bold">Tambah Jurusan :</h5>
                                <h6>Nama Jurusan :</h6>
                                <input class="form-control" name="nama_jurusan_pdd" required>
                                <br>
                                <h6>Jenis :</h6>
                                <select class="form-control" name="jenis_jurusan_pdd" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Kedokteran">Kedokteran</option>
                                    <option value="Keperawatan">Keperawatan</option>
                                    <option value="Nakes Lainnya">Nakes Lainnya</option>
                                    <option value="Non Nakes">Non Nakes</option>
                                </select>
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
                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";
                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();
                if ($r_jurusan_pdd > 0) {
                ?>
                    <table class='table table-striped' id="myTable">
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Jurusan</th>
                                <th>Jenis Jurusan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?></td>
                                    <td><?php echo $d_jurusan_pdd['jenis_jurusan_pdd']; ?></td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#jrs_u_m" . $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#jrs_d_m" . $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                            Hapus
                                        </a>
                                    </td>
                                    <?php $no++; ?>
                                    <!-- modal ubah jurusan  -->
                                    <div class="modal fade" id="<?php echo "jrs_u_m" . $d_jurusan_pdd['id_jurusan_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" class="form-group" action="">
                                                    <div class="modal-body">
                                                        <h5>Ubah Jurusan :</h5>
                                                        <input name="id_jurusan_pdd" value="<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>" hidden>
                                                        <h6>Nama Jurusan :</h6>
                                                        <input class="form-control" name="nama_jurusan_pdd" value="<?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>">
                                                        <br>
                                                        <h6>Jenis Jurusan :</h6>
                                                        <select class="form-control" name="jenis_jurusan_pdd">
                                                            <option value="">-- Pilih --</option>
                                                            <option value="Kedokteran">Kedokteran</option>
                                                            <option value="Keperawatan">Keperawatan</option>
                                                            <option value="Nakes Lainnya">Nakes Lainnya</option>
                                                            <option value="Non Nakes">Non Nakes</option><br>
                                                        </select>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="<?php echo "jrs_d_m" . $d_jurusan_pdd['id_jurusan_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>Hapus Data</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><b><?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?></b></h6>
                                                        <input name="id_jurusan_pdd" value="<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>" hidden>
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
            <h3 class="text-center text-justify"> Data Jurusan Tidak Ada</h3>
        <?php
                }
        ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) {
    $conn->query("UPDATE `tb_jurusan_pdd` SET 
    `nama_jurusan_pdd` = '" . $_POST['nama_jurusan_pdd'] . "',
    `jenis_jurusan_pdd` = '" . $_POST['jenis_jurusan_pdd'] . "'
    WHERE `tb_jurusan_pdd`.`id_jurusan_pdd` = " . $_POST['id_jurusan_pdd']);
?>
    <script>
        document.location.href = "?jrs";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {
    $conn->query("INSERT INTO `tb_jurusan_pdd` (`nama_jurusan_pdd`, jenis_jurusan_pdd) VALUES ('" . $_POST['nama_jurusan_pdd'] . "','" . $_POST['jenis_jurusan_pdd'] . "')");
?>
    <script>
        document.location.href = "?jrs";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_jurusan_pdd` WHERE `id_jurusan_pdd` = " . $_POST['id_jurusan_pdd']);
?>
    <script>
        document.location.href = "?jrs";
    </script>
<?php
}
?>
<script type="text/javascript"  src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
