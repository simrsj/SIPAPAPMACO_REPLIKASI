<?php
$id_praktik = $_GET['ih'];

$sql_praktik = "SELECT * FROM tb_praktik 
    JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou
    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
    JOIN tb_jurusan_pdd_jenis ON tb_praktik.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
    WHERE tb_praktik.id_praktik = " . $id_praktik;

$q_praktik = $conn->query($sql_praktik);
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Daftar Menu Praktikan <?php echo $d_praktik['nama_jurusan_pdd']; ?></h1>
        </div>
    </div>
    <div class="card shadow mb-4 ">
        <div class="card-body">

            <form class="form-group" method="post">
                <!-- Menu Harga disesuaikan dengan jenis jurusan -->
                <div class="text-gray-700">
                    <h5 class="font-weight-bold">Menu Harga <?php echo $d_praktik['nama_jurusan_pdd']; ?></h5>
                </div>
                <?php
                $sql_harga_jurusan = " SELECT * FROM tb_harga 
                    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                    WHERE tb_harga.id_jurusan_pdd_jenis = " . $d_praktik['id_jurusan_pdd_jenis'] . " 
                    ORDER BY nama_harga_jenis ASC, nama_harga ASC
                    ";

                $q_harga_jurusan = $conn->query($sql_harga_jurusan);
                $r_harga_jurusan = $q_harga_jurusan->rowCount();

                if ($r_harga_jurusan > 0) {

                ?>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_harga_jurusan = $q_harga_jurusan->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga_jurusan['nama_harga_jenis']; ?></td>
                                    <td><?php echo $d_harga_jurusan['nama_harga']; ?></td>
                                    <td><?php echo $d_harga_jurusan['satuan_harga']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga_jurusan['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td><input class="form-control" type="text" name="<?php echo "harga_" . $d_harga_jurusan['id_harga']; ?>" value="<?php echo $d_praktik['jumlah_praktik']; ?>"></td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                        <h5 class="text-center">Data Harga Tidak Ada</h5>
                    </div>
                <?php
                }
                ?>
                <hr>

                <!-- Menu Harga disesuaikan dengan Jenjang -->
                <div class="text-gray-700">
                    <h5 class="font-weight-bold">Menu Harga <?php echo $d_praktik['nama_jurusan_pdd_jenis'] . " " . $d_praktik['nama_jenjang_pdd']; ?></h5>
                </div>
                <?php
                $sql_harga = " SELECT * FROM tb_harga 
                    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                    JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    WHERE tb_harga.id_jenjang_pdd = " . $d_praktik['id_jenjang_pdd'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 6
                    ORDER BY nama_jenjang_pdd ASC
                    ";
                $q_harga = $conn->query($sql_harga);
                $r_harga = $q_harga->rowCount();

                if ($r_harga > 0) {

                ?>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_harga = $q_harga->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga['nama_harga_jenis']; ?></td>
                                    <td><?php echo $d_harga['nama_harga']; ?></td>
                                    <td><?php echo $d_harga['satuan_harga']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td><input class="form-control" type="text" name="<?php echo "harga_" . $d_harga['id_harga']; ?>" value="<?php echo $d_praktik['jumlah_praktik']; ?>"></td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                        <h5 class="text-center">Data Harga Tidak Ada</h5>
                    </div>
                <?php
                } ?>
                <hr>

                <!-- Menu Harga Lainnya -->
                <div class="text-gray-700">
                    <h5 class="font-weight-bold">Menu Harga Lainnya</h5>
                </div>
                <?php
                $sql_harga = " SELECT * FROM tb_harga 
                    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                    WHERE tb_harga.id_jurusan_pdd_jenis = " . $d_praktik['id_jurusan_pdd_jenis'] . " 
                    ORDER BY nama_harga_jenis ASC, nama_harga ASC
                    ";

                $q_harga = $conn->query($sql_harga);
                $r_harga = $q_harga->rowCount();

                if ($r_harga > 0) {

                ?>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_harga = $q_harga->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga['nama_harga_jenis']; ?></td>
                                    <td><?php echo $d_harga['nama_harga']; ?></td>
                                    <td><?php echo $d_harga['satuan_harga']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td><input class="form-control" type="text" name="<?php echo "harga_" . $d_harga['id_harga']; ?>" value="<?php echo $d_praktik['jumlah_praktik']; ?>"></td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                        <h5 class="text-center">Data Harga Tidak Ada</h5>
                    </div>
                <?php
                } ?>
                <input type="submit" class="form-control btn btn-success btn-sm" name='pilih_harga' value="SIMPAN">
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['pilih_harga'])) {
}
?>