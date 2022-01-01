<?php
if (isset($_POST['tambah_mess'])) {

    $sql_mess = "SELECT * FROM tb_mess WHERE id_mess = " . $_POST['id_mess'];
    $d_mess = $conn->query($sql_mess)->fetch(PDO::FETCH_ASSOC);
    $sql_praktik = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_POST['id_praktik'];
    $d_praktik = $conn->query($sql_praktik)->fetch(PDO::FETCH_ASSOC);

    // echo $sql_mess . "<br>";
    // echo $sql_praktik . "<br>";

    $jumlah_hari_praktik = tanggal_between($d_praktik['tgl_mulai_praktik'], $d_praktik['tgl_selesai_praktik']);

    // echo $jumlah_hari_praktik . "<br>";

    if ($_POST['makan_mess_pilih'] == "Ya") {
        $total_harga_mess_pilih = $jumlah_hari_praktik * $d_mess['harga_dengan_makan_mess'] * $d_praktik['jumlah_praktik'];
    } elseif ($_POST['makan_mess_pilih'] == "Tidak") {
        $total_harga_mess_pilih = $jumlah_hari_praktik * $d_mess['harga_tanpa_makan_mess'] * $d_praktik['jumlah_praktik'];
    } else {
        $total_harga_mess_pilih = 0;
    }

    // echo $total_harga_mess_pilih . "<br>";

    $sql_insert_pilih_mess = "INSERT INTO tb_mess_pilih (
        id_praktik,
        id_mess,
        tgl_input_mess_pilih,
        makan_mess_pilih,
        jumlah_praktik_mess_pilih,
        jumlah_hari_mess_pilih,
        total_harga_mess_pilih
        ) VALUES (
            '" . $_POST['id_praktik'] . "',
            '" . $_POST['id_mess'] . "',
            '" . date('Y-m-d') . "',
            '" . $_POST['makan_mess_pilih'] . "',
            '" . $d_praktik['jumlah_praktik'] . "',
            '" . $jumlah_hari_praktik . "',
            '" . $total_harga_mess_pilih . "'
            )";



    $total_terisi_mess = $d_mess['kapasitas_terisi_mess'] + $d_praktik['jumlah_praktik'];

    $sql_update_mess = "UPDATE tb_mess SET kapasitas_terisi_mess = $total_terisi_mess WHERE id_mess = " . $_POST['id_mess'];

    //SQL ubah status praktik
    $sql_ubah_status_praktik = "UPDATE tb_praktik
    SET status_cek_praktik = 'MESS'
    WHERE id_praktik = " . $_POST['id_praktik'];

    //Eksekusi Query 
    // echo $sql_insert_pilih_mess . "<br>";
    // echo $sql_update_mess . "<br>";
    // echo $sql_ubah_status_praktik . "<br>";
    $conn->query($sql_insert_pilih_mess);
    $conn->query($sql_update_mess);
    $conn->query($sql_ubah_status_praktik);

?>
    <script>
        alert('Data Mess Sudah Disimpan');
        document.location.href = "?prk";
    </script>
<?php
} else {
    $id_praktik = $_GET['m'];
    $q_praktik = $conn->query("SELECT * FROM tb_praktik WHERE id_praktik = $id_praktik");
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    $jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center">
                    <div class="h4 text-gray-800">
                        Pilih Mess : <i style='font-size:14px;'>(Jumlah Praktik <b><?php echo $d_praktik['jumlah_praktik']; ?></b>)</i>
                    </div>
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
                            <div class="custom-control custom-radio">
                                <input type="radio" id="makan_mess_pilih1" name="makan_mess_pilih" value="Ya" class="custom-control-input" required>
                                <label class="custom-control-label" for="makan_mess_pilih1">Pakai Makan (3x Sehari)</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="makan_mess_pilih2" name="makan_mess_pilih" value="t" class="custom-control-input" required>
                                <label class="custom-control-label" for="makan_mess_pilih2">Tidak Pakai Makan</label>
                            </div>
                        </fieldset>
                        <hr>
                        <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                        <input class="btn btn-success" type="submit" name="tambah_mess" value="SIMPAN">
                    </form>
                </div>
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