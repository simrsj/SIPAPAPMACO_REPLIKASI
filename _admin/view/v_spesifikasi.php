<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Spesifikasi</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-success btn-sm' href='#' data-toggle='modal' data-target='#spf_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah spesifikasi  -->
            <div class="modal fade" id="spf_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-body">
                                <h6>Tambah Spesifikasi :</h6>
                                <input class="form-control" name="nama_spesifikasi_pdd">
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
                $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";
                $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();
                if ($r_spesifikasi_pdd > 0) {
                ?>
                    <table class='table table-striped' id="myTable">
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Spesifikasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?></td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#spf_u_m" . $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#spf_d_m" . $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                            Hapus
                                        </a>
                                    </td>
                                    <?php $no++; ?>
                                    <!-- modal ubah spesifikasi  -->
                                    <div class="modal fade" id="<?php echo "spf_u_m" . $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <h5>Ubah Spesifikasi :</h5>
                                                        <input name="id_spesifikasi_pdd" value="<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>" hidden>
                                                        <input class="form-control" name="nama_spesifikasi_pdd" value="<?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="<?php echo "spf_d_m" . $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>Hapus Data</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><b><?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?></b></h6>
                                                        <input name="id_spesifikasi_pdd" value="<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>" hidden>
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
            <h3 class="text-center text-justify"> Data Spesifikasi Tidak Ada</h3>
        <?php
                }
        ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) {
    $conn->query("UPDATE `tb_spesifikasi_pdd` SET `nama_spesifikasi_pdd` = '" . $_POST['nama_spesifikasi_pdd'] . "' WHERE `tb_spesifikasi_pdd`.`id_spesifikasi_pdd` = " . $_POST['id_spesifikasi_pdd']);
?>
    <script>
        document.location.href = "?spf";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {
    $conn->query("INSERT INTO `tb_spesifikasi_pdd` (`nama_spesifikasi_pdd`) VALUES ('" . $_POST['nama_spesifikasi_pdd'] . "')");
?>
    <script>
        document.location.href = "?spf";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_spesifikasi_pdd` WHERE `id_spesifikasi_pdd` = " . $_POST['id_spesifikasi_pdd']);
?>
    <script>
        document.location.href = "?spf";
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

                