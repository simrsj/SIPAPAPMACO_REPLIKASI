<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Mess</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-outline-success btn-sm' href='#' data-toggle='modal' data-target='#mes_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <!-- modal tambah Mess  -->
            <div class="modal fade" id="mes_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <b>TAMBAH MESS</b>
                            </div>
                            <div class="modal-body">
                                Nama Mess : <span style="color:red">*</span><br>
                                <input type="text" class="form-control" name="nama_mess" required><br>
                                Nama Pemilik : <span style="color:red">*</span><br>
                                <input type="text" class="form-control" name="nama_pemilik_mess" required><br>
                                No Pemilik : <span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="no_pemilik_mess"><br>
                                E-Mail Pemilik : <br>
                                <input type="emial" class="form-control" name="email_pemilik_mess"><br>
                                Harga Tanpa Makan : (Rp)<span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="harga_tanpa_makan_mess" required><br>
                                Harga Dengan Makan : (Rp)<span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="harga_dengan_makan_mess" required><br>
                                Alamat Mess : <span style="color:red">*</span><br>
                                <textarea class="form-control" name="alamat_mess" required></textarea><br>
                                Keterangan Mess : <br>
                                <textarea class="form-control" name="ket_mess"></textarea>
                                <hr>
                                <b>KAPASITAS MESS</b><br>
                                <!-- Laki-Laki :
                                <input type="number" class="form-control" name="kapasitas_l_mess">
                                Perempuan :
                                <input type="number" class="form-control" name="kapasitas_p_mess"> -->
                                Kapasitas Total : <span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="kapasitas_t_mess" required>
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
            <?php
            $sql_mess = "SELECT * FROM tb_mess order by nama_mess ASC";
            $q_mess = $conn->query($sql_mess);
            $r_mess = $q_mess->rowCount();
            if ($r_mess > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead class="table-dark">
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Mess</th>
                                <th>Nama Pemilik</th>
                                <th>Kontak Pemilik</th>
                                <th>Alamat Mess</th>
                                <th>Kapasitas Total</th>
                                <th>Kapasitas Terisi</th>
                                <th>Harga Tanpa Makan</th>
                                <th>Harga Dengan Makan</th>
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
                                    <td><?php echo $d_mess['kapasitas_t_mess']; ?></td>
                                    <td><?php echo $d_mess['kapasitas_terisi_mess']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_mess['harga_tanpa_makan_mess'], 0, ",", "."); ?></td>
                                    <td><?php echo "Rp " . number_format($d_mess['harga_dengan_makan_mess'], 0, ",", "."); ?></td>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mes_u_m" . $d_mess['id_mess']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mes_d_m" . $d_mess['id_mess']; ?>'>
                                            Hapus
                                        </a>

                                        <!-- modal ubah Mess  -->
                                        <div class="modal fade" id="<?php echo "mes_u_m" . $d_mess['id_mess']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            <b>UBAH MESS</b>
                                                        </div>
                                                        <div class="modal-body">
                                                            Nama Mess : <span style="color:red">*</span><br>
                                                            <input type="text" class="form-control" name="nama_mess" value="<?php echo $d_mess['nama_mess']; ?>" required><br>
                                                            Nama Pemilik : <span style="color:red">*</span><br>
                                                            <input type="text" class="form-control" name="nama_pemilik_mess" value="<?php echo $d_mess['nama_pemilik_mess']; ?>" required><br>
                                                            No Pemilik : <span style="color:red">*</span><br>
                                                            <input type="number" class="form-control" name="no_pemilik_mess" value="<?php echo $d_mess['no_pemilik_mess']; ?>" required><br>
                                                            E-Mail Pemilik : <br>
                                                            <input type="emial" class="form-control" name="email_pemilik_mess" value="<?php echo $d_mess['email_pemilik_mess']; ?>"><br>
                                                            Harga Tanpa Makan : (Rp)<span style="color:red">*</span><br>
                                                            <input type="number" class="form-control" name="harga_tanpa_makan_mess" value="<?php echo $d_mess['harga_tanpa_makan_mess']; ?>" required><br>
                                                            Harga Dengan Makan : (Rp)<span style="color:red">*</span><br>
                                                            <input type="number" class="form-control" name="harga_dengan_makan_mess" value="<?php echo $d_mess['harga_dengan_makan_mess']; ?>" required><br>
                                                            Alamat Mess : <span style="color:red">*</span><br>
                                                            <textarea class="form-control" name="alamat_mess" required><?php echo $d_mess['alamat_mess']; ?></textarea><br>
                                                            Keterangan Mess : <br>
                                                            <textarea class="form-control" name="ket_mess"><?php echo $d_mess['ket_mess']; ?></textarea>
                                                            <hr>
                                                            <b>KAPASITAS MESS</b><br>
                                                            <!-- Laki-Laki :
                                                            <input type="number" class="form-control" name="kapasitas_l_mess" value="<?php echo $d_mess['kapasitas_l_mess']; ?>">
                                                            Perempuan :
                                                            <input type="number" class="form-control" name="kapasitas_p_mess" value="<?php echo $d_mess['kapasitas_p_mess']; ?>"> -->
                                                            Kapasitas Total : <span style="color:red">*</span><br>
                                                            <input type="number" class="form-control" name="kapasitas_t_mess" value="<?php echo $d_mess['kapasitas_t_mess']; ?>" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input name="id_mess" value="<?php echo $d_mess['id_mess']; ?>" hidden>
                                                            <button type="submit" class="btn btn-success" name="ubah">Ubah</button>
                                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Kembali</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal hapus Mess -->
                                        <div class="modal fade" id="<?php echo "mes_d_m" . $d_mess['id_mess']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            <h5>HAPUS MESS ?</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Nama Mess :
                                                            <h6><b><?php echo $d_mess['nama_mess']; ?></b></h6>
                                                            Nama Pemilik :
                                                            <h6><b><?php echo $d_mess['nama_pemilik_mess']; ?></b></h6>
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
                                    </td>
                                    <?php
                                    $no++;
                                    ?>
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
                <h3> Data Mess Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['tambah'])) {
    $sql_tambah = "INSERT INTO `tb_mess` (
        nama_mess,
        kapasitas_l_mess,  
        kapasitas_p_mess, 
        kapasitas_t_mess, 
        alamat_mess, 
        nama_pemilik_mess, 
        no_pemilik_mess, 
        email_pemilik_mess, 
        harga_tanpa_makan_mess, 
        harga_dengan_makan_mess,
        ket_mess
    ) VALUES (
        '" . $_POST['nama_mess'] . "', 
        '" . $_POST['kapasitas_l_mess'] . "', 
        '" . $_POST['kapasitas_p_mess'] . "', 
        '" . $_POST['kapasitas_t_mess'] . "', 
        '" . $_POST['alamat_mess'] . "', 
        '" . $_POST['nama_pemilik_mess'] . "', 
        '" . $_POST['no_pemilik_mess'] . "', 
        '" . $_POST['email_pemilik_mess'] . "', 
        '" . $_POST['harga_tanpa_makan_mess'] . "', 
        '" . $_POST['harga_dengan_makan_mess'] . "', 
        '" . $_POST['ket_mess'] . "'
    )";
    echo $sql_tambah;
    // $conn->query($sql_tambah);
?>
    <script>
        document.location.href = "?mes";
    </script>
<?php
} elseif (isset($_POST['ubah'])) {
    $sql_ubah = "UPDATE `tb_mess` SET 
    `nama_mess` = '" . $_POST['nama_mess'] . "', 
    `kapasitas_l_mess` = '" . $_POST['kapasitas_l_mess'] . "' ,
    `kapasitas_p_mess` = '" . $_POST['kapasitas_p_mess'] . "' ,
    `kapasitas_t_mess` = '" . $_POST['kapasitas_t_mess'] . "' ,
    `alamat_mess` = '" . $_POST['alamat_mess'] . "' ,
    `nama_pemilik_mess` = '" . $_POST['nama_pemilik_mess'] . "' ,
    `no_pemilik_mess` = '" . $_POST['no_pemilik_mess'] . "' ,
    `email_pemilik_mess` = '" . $_POST['email_pemilik_mess'] . "' ,
    `harga_tanpa_makan_mess` = '" . $_POST['harga_tanpa_makan_mess'] . "' ,
    `harga_dengan_makan_mess` = '" . $_POST['harga_dengan_makan_mess'] . "' ,
    `ket_mess` = '" . $_POST['ket_mess'] . "'
    WHERE `tb_mess`.`id_mess` = " . $_POST['id_mess'];
    echo $sql_ubah;
    $conn->query($sql_ubah);
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