<?php
if (isset($_POST['tambah_mess'])) {
    $sql_insert = "INSERT INTO tb_mess_pilih (
        id_praktik,
        id_mess,
        makan_mess_pilih,
        jumlah_mess_pilih
        ) VALUES (
            '" . $_POST['id_praktik'] . "',
            '" . $_POST['id_mess'] . "',
            '" . $_POST['makan_mess_pilih'] . "',
            '" . $_POST['jumlah_mess_pilih'] . "'
            )";


    echo $sql_insert . "<br>";
    // $conn->query($sql_tambah);

?>
    <script>
        // alert('Data Mess Sudah Disimpan');
        // document.location.href = "?prk";
    </script>
<?php
} else {
    $id_praktik = $_GET['m'];
    $q_praktik = $conn->query("SELECT * FROM tb_praktik WHERE id_praktik = $id_praktik");
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    $jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

    <div class="container-fluid">
        <div class="col-lg-4 card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <div class="h3 mb-2 text-gray-800">Pilih Mess</div>
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-group">
                    <fieldset class="fieldset">
                        <legend class="legend-fieldset">Nama Mess <span style="color:red">*</span></legend>
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
                    </fieldset>
                    <hr>
                    <fieldset class="fieldset">
                        <legend class="legend-fieldset">Makan Mess <span style="color:red">*</span></legend>
                        <input type="radio" name="makan_mess_pilih" value="Y" required> Tanpa Makan <br>
                        <input type="radio" name="makan_mess_pilih" value="T"> Dengan Makan (3x Sehari)
                    </fieldset>
                    <hr>
                    <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                    <input name="jumlah_mess_pilih" value="<?php echo $d_praktik['jumlah_praktik'] ?>" hidden>
                    <input class="btn btn-success" type="submit" name="tambah_mess" value="SIMPAN">
                </form>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <div class="h3 mb-2 text-gray-800">Data Mess</div>
            </div>
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
}
?>