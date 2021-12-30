<?php
if (isset($_POST['ubah_mess'])) {

    $d_mess_pilih = $conn->query("SELECT * FROM tb_mess_pilih WHERE id_praktik = " . $_POST['id_praktik'])->fetch(PDO::FETCH_ASSOC);


    //Pengurangan Kapasitas yg terisi
    $q_mess_kurang = $conn->query("SELECT * FROM tb_mess WHERE id_mess = " . $d_mess_pilih['id_mess']);
    $d_mess_kurang = $q_mess_kurang->fetch(PDO::FETCH_ASSOC);
    $total_terisi_mess_kurang = $d_mess_kurang['kapasitas_terisi_mess'] - $_POST['jumlah_mess_pilih'];

    $sql_update_mess_kurang = "UPDATE tb_mess SET  
    kapasitas_terisi_mess = $total_terisi_mess_kurang
    WHERE id_mess = " . $d_mess_pilih['id_mess'];

    echo $sql_update_mess_kurang . "<br>";
    $conn->query($sql_update_mess_kurang);

    //Penambahan Kapasitas yg terisi
    $q_mess_tambah = $conn->query("SELECT * FROM tb_mess WHERE id_mess = " . $_POST['id_mess']);
    $d_mess_tambah = $q_mess_tambah->fetch(PDO::FETCH_ASSOC);
    $total_terisi_mess_tambah = $d_mess_tambah['kapasitas_terisi_mess'] + $_POST['jumlah_mess_pilih'];

    $sql_update_mess_tambah = "UPDATE tb_mess SET  
    kapasitas_terisi_mess = $total_terisi_mess_tambah
    WHERE id_mess = " . $_POST['id_mess'];

    echo $sql_update_mess_tambah . "<br>";
    $conn->query($sql_update_mess_tambah);

    //Ubah data pilih mess
    $sql_ubah_pilih_mess = " UPDATE tb_mess_pilih SET
        id_mess = '" . $_POST['id_mess'] . "',
        tgl_ubah_mess_pilih = '" . date('Y-m-d') . "',
        makan_mess_pilih = '" . $_POST['makan_mess_pilih'] . "'
        WHERE id_mess_pilih = " . $d_mess_pilih['id_mess_pilih'];

    echo $sql_ubah_pilih_mess . "<br>";
    $conn->query($sql_ubah_pilih_mess);

?>
    <script>
        alert('Data Mess Sudah Diubah');
        document.location.href = "?prk";
    </script>
<?php
} else {
    $id_praktik = $_GET['um'];
    $q_praktik = $conn->query("SELECT * FROM tb_praktik WHERE id_praktik = $id_praktik");
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    $jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

    <div class="container-fluid">
        <div class="col-lg-4 card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                <div class="h3 mb-2 text-gray-800">Ubah Mess</div>
            </div>
            <div class="card-body">
                <?php $d_mess_pilih = $conn->query("SELECT * FROM tb_mess_pilih WHERE id_praktik = $id_praktik")->fetch(PDO::FETCH_ASSOC); ?>
                <form action="" method="POST" class="form-group">
                    <fieldset class="fieldset">
                        <legend class="legend-fieldset">Nama Mess <span style="color:red">*</span></legend>
                        <select class="form-control" name="id_mess" required>
                            <option value="">-- Pilih --</option>
                            <?php
                            $q_mess = $conn->query("SELECT * FROM tb_mess WHERE ((kapasitas_t_mess - kapasitas_terisi_mess) >= $jumlah_praktik) ORDER BY nama_mess ASC");
                            while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                                if ($d_mess['id_mess'] == $d_mess_pilih['id_mess']) {
                                    $selected = "selected";
                                } else {
                                    $selected = "";
                                }
                            ?>
                                <option value="<?php echo $d_mess['id_mess']; ?>" <?php echo $selected; ?>><?php echo $d_mess['nama_mess']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </fieldset>
                    <hr>
                    <fieldset class="fieldset">
                        <legend class="legend-fieldset">Makan Mess <span style="color:red">*</span></legend>
                        <?php
                        $cek1 = "";
                        $cek2 = "";
                        if ($d_mess_pilih['makan_mess_pilih'] == "Ya") {
                            $cek1 = "checked";
                        } elseif ($d_mess_pilih['makan_mess_pilih'] == "Tidak") {
                            $cek2 = "checked";
                        }
                        ?>
                        <div class="boxed-check-group boxed-check-success">
                            <div class="row">
                                <div class="col-lg-2">
                                    <label class="boxed-check">
                                        <input class="boxed-check-input" type="radio" name="makan_mess_pilih" value="Ya" <?php echo $cek1; ?> required>
                                        <div class="boxed-check-label" style="text-align:center;">
                                            Dengan Makan (3x Sehari)
                                        </div>
                                    </label>
                                </div>
                                <div class="col-lg-2">
                                    <label class="boxed-check">
                                        <input class="boxed-check-input" type="radio" name="makan_mess_pilih" value="Tidak" <?php echo $cek2; ?>>
                                        <div class="boxed-check-label" style="text-align:center;">
                                            Tanpa Makan
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <hr>
                    <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                    <input name="jumlah_mess_pilih" value="<?php echo $d_praktik['jumlah_praktik'] ?>" hidden>
                    <input class="btn btn-success" type="submit" name="ubah_mess" value="UBAH">
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