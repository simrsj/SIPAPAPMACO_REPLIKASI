<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Ubah Data Praktikan</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_praktikan = "SELECT * FROM tb_praktikan ";
            $sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
            $sql_praktikan .= " WHERE tb_praktik.id_praktik = " . $_GET['u'];
            $sql_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
            // echo $sql_praktikan;

            $q_data_praktikan = $conn->query($sql_praktikan);
            $r_data_praktikan = $q_data_praktikan->rowCount();

            if ($r_data_praktikan > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM / NPM / NIS </th>
                                <th scope="col">No. HP</th>
                                <th scope="col">No. WA</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ASAL KOTA / KABUPATEN</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_jumlah_tarif = 0;
                            $no = 1;
                            while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_data_praktikan['nama_praktikan']; ?></td>
                                    <td><?php echo $d_data_praktikan['no_id_praktikan']; ?></td>
                                    <td><?php echo $d_data_praktikan['telp_praktikan']; ?></td>
                                    <td><?php echo $d_data_praktikan['wa_praktikan']; ?></td>
                                    <td><?php echo $d_data_praktikan['email_praktikan']; ?></td>
                                    <td><?php echo $d_data_praktikan['kota_kab_praktikan']; ?></td>
                                    <td>
                                        <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#ptkn_u_m" . $d_data_praktikan['id_praktikan']; ?>'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#ptkn_h_m" . $d_data_praktikan['id_praktikan']; ?>'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>


                                        <!-- modal ubah praktikan  -->
                                        <div class="modal fade" id="<?php echo "ptkn_u_m" . $d_data_praktikan['id_praktikan']; ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            HAPUS DATA PRAKTIKAN
                                                        </div>
                                                        <div class="modal-body">
                                                            <input name="id_praktikan" value="<?php echo $d_data_praktikan['id_praktikan']; ?>" hidden>
                                                            NAMA : <span class="text-danger">*</span><br>
                                                            <input class="form-control" name="nama_praktikan" value="<?php echo $d_data_praktikan['nama_praktikan']; ?>" required><br>
                                                            NIM / NPM / NIS : <span class="text-danger">*</span><br>
                                                            <input class="form-control" name="no_id_praktikan" value="<?php echo $d_data_praktikan['no_id_praktikan']; ?>" required><br>
                                                            No. HP : <span class="text-danger">*</span><br>
                                                            <input class="form-control" name="telp_praktikan" value="<?php echo $d_data_praktikan['telp_praktikan']; ?>" required><br>
                                                            No. WA : <span class="text-danger">*</span><br>
                                                            <input class="form-control" name="wa_praktikan" value="<?php echo $d_data_praktikan['wa_praktikan']; ?>" required><br>
                                                            EMAIL : <span class="text-danger">*</span><br>
                                                            <input class="form-control" name="email_praktikan" value="<?php echo $d_data_praktikan['email_praktikan']; ?>" required><br>
                                                            ASAL KOTA / KABUPATEN : <span class="text-danger">*</span><br>
                                                            <input class="form-control" name="kota_kab_praktikan" value="<?php echo $d_data_praktikan['kota_kab_praktikan']; ?>" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_praktikan" value="<?php echo $d_data_praktikan['id_praktikan']; ?>">
                                                            <button type="submit" class="btn btn-primary btn-sm" name="ubah">Ubah</button>
                                                            <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="<?php echo "ptkn_h_m" . $d_data_praktikan['id_praktikan']; ?>">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            HAPUS DATA PRAKTIKAN
                                                        </div>
                                                        <div class="modal-body">
                                                            NAMA : <?php echo $d_data_praktikan['nama_praktikan']; ?><br>
                                                            NIM / NPM / NIS : <?php echo $d_data_praktikan['no_id_praktikan']; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="id_praktikan" value="<?php echo $d_data_praktikan['id_praktikan']; ?>">
                                                            <button type="submit" class="btn btn-danger btn-sm" name="hapus">Hapus</button>
                                                            <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
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
                <div class="jumbotron">
                    <div class="jumbotron-fluid">
                        <div class="text-gray-700">
                            <h5 class="text-center">Data Praktikan Tidak Ada</h5>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) {
    $sql = "UPDATE `tb_praktikan` SET ";
    $sql .= " `nama_praktikan` = '" . $_POST['nama_praktikan'] . "', ";
    $sql .= " `no_id_praktikan` = '" . $_POST['no_id_praktikan'] . "', ";
    $sql .= " `telp_praktikan` = '" . $_POST['telp_praktikan'] . "', ";
    $sql .= " `wa_praktikan` = '" . $_POST['wa_praktikan'] . "', ";
    $sql .= " `email_praktikan` = '" . $_POST['email_praktikan'] . "', ";
    $sql .= " `kota_kab_praktikan` = '" . $_POST['kota_kab_praktikan'] . "', ";
    $sql .= " `tgl_ubah_praktikan` = '" . date('Y-m-d') . "'";
    $sql .= " WHERE id_praktikan  = " . $_POST['id_praktikan'];
    echo $sql;
    $conn->query($sql);
?>
    <script>
        document.location.href = "?praktikan&u=<?php echo $_GET['u']; ?>";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $sql = "DELETE FROM `tb_praktikan`";
    $sql .= " WHERE id_praktikan  = " . $_POST['id_praktikan'];
    echo $sql;
    $conn->query($sql);
?>
    <script>
        document.location.href = "?praktikan&u=<?php echo $_GET['u']; ?>";
    </script>
<?php
}
?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>