<?php
$id_praktik = $_GET['m'];
$q_praktik = $conn->query("SELECT * FROM tb_praktik WHERE id_praktik = $id_praktik");
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
$jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Pilih MESS</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="POST" class="form-group ">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        Pilih Mess <span style="color:red">*</span><br>
                        <select class="form-control" name="id_mess" required>
                            <option value="">-- Pilih --</option>
                            <?php
                            $q_jurusan = $conn->query("SELECT * FROM tb_mess WHERE ((kapasitas_t_mess - kapasitas_terisi_mess) >= $jumlah_praktik) ORDER BY nama_mess ASC");
                            while ($d_jurusan = $q_jurusan->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <option value="<?php echo $d_jurusan['id_mess']; ?>"><?php echo $d_jurusan['nama_mess']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-2">
                        Pilih Makan <span style="color:red">*</span><br>
                        <input type="radio" name="makan_mess" value="y" required> Tanpa Makan <br>
                        <input type="radio" name="makan_mess" value="t"> Dengan Makan (3x Sehari)
                    </div>
                    <div class="col-2 ">
                        <input class="btn btn-success" type="submit" name="SIMPAN" value="SIMPAN">
                    </div>
                </div>
                <hr>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_mess = "SELECT * FROM tb_mess WHERE status_mess = 'Aktif' ORDER BY nama_mess ASC";
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
                <h3> Data Mess Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
?>