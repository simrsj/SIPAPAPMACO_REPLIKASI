<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Mess</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-success btn-sm' href='#' data-toggle='modal' data-target='#mes_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah Institusi  -->
            <div class="modal fade" id="mes_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <label style="font-weight: bold; font-size:medium">TAMABAH MESS :</label>
                            </div>
                            <div class="modal-body">
                                <label> Nama Mess :</label><br>
                                <input class="form-control" name="nama_mess"><br>
                                <label> Institusi :</label><br>
                                <input class="form-control" name="nama_mess"><br>
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
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $sql_mess = "SELECT * FROM tb_mess 
                JOIN tb_mess_detail ON tb_mess_detail.id_mess = tb_mess.id_mess 
                ORDER BY nama_mess ASC";
                $q_mess = $conn->query($sql_mess);
                $r_mess = $q_mess->rowCount();
                if ($r_mess > 0) {
                ?>
                    <table class='table table-striped table-hover' id="myTable">
                        <thead>
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Mess</th>
                                <th>Pemilik Mess</th>
                                <th>Kontak</th>
                                <th>Alamat Mess</th>
                                <th>Kapasitas</th>
                                <th>Harga Tanpa Makan</th>
                                <th>Harga Dengan Makan</th>
                                <th>Jumlah Terisi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_mess['nama_mess']; ?></td>
                                    <td><?php echo $d_mess['nama_pemilik_mess']; ?></td>
                                    <td><?php echo $d_mess['no_pemilik_mess']; ?></td>
                                    <td><?php echo $d_mess['alamat_mess']; ?></td>
                                    <td><?php echo $d_mess['kapasitas_mess']; ?></td>
                                    <td><?php echo $d_mess['harga_tanpa_makan_mess']; ?></td>
                                    <td><?php echo $d_mess['harga_dengan_makan_mess']; ?></td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mes_u_m" . $d_mess['id_mess']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mes_d_m" . $d_mess['id_mess']; ?>'>
                                            Hapus
                                        </a>
                                    </td>
                                    <?php $no++; ?>
                                    <!-- modal ubah Institusi  -->
                                    <div class="modal fade" id="<?php echo "mes_u_m" . $d_mess['id_mess']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <h5>Ubah Institusi :</h5>
                                                        <input name="id_mess" value="<?php echo $d_mess['id_mess']; ?>" hidden>
                                                        <input class="form-control" name="nama_mess" value="<?php echo $d_mess['nama_mess']; ?>">
                                                        <br>
                                                        <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="<?php echo "mes_d_m" . $d_mess['id_mess']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>Hapus Data</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><b><?php echo $d_mess['nama_mess']; ?></b></h6>
                                                        <input name="id_mess" value="<?php echo $d_mess['id_mess']; ?>" hidden>
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
    $conn->query("UPDATE `tb_mess` SET `nama_mess` = '" . $_POST['nama_mess'] . "' WHERE `tb_mess`.`id_mess` = " . $_POST['id_mess']);
?>
    <script>
        document.location.href = "?mes";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {
    $conn->query("INSERT INTO `tb_mess` (`nama_mess`) VALUES ('" . $_POST['nama_mess'] . "')");
?>
    <script>
        document.location.href = "?mes";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_mess` WHERE `id_mess` = " . $_POST['id_mess']);
?>
    <script>
        document.location.href = "?mes";
    </script>
<?php
}
?>


<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="vendor/datatables/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>