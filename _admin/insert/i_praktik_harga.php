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
// echo $sql_praktik;
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
                    <h5 class="font-weight-bold">Menu Harga Wajib <?php echo $d_praktik['nama_jurusan_pdd']; ?></h5>
                </div>
                <?php
                $sql_harga_jurusan = " SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan  
                WHERE tb_harga.id_jurusan_pdd_jenis = " . $d_praktik['id_jurusan_pdd_jenis'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 5
                ORDER BY nama_harga_jenis ASC, nama_harga ASC 
                ";

                // echo $sql_harga_jurusan;
                $q_harga_jurusan = $conn->query($sql_harga_jurusan);
                $r_harga_jurusan = $q_harga_jurusan->rowCount();

                if ($r_harga_jurusan > 0) {
                ?>
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Total Harga</th>
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
                                    <td><?php echo $d_harga_jurusan['nama_harga_satuan']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga_jurusan['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td><?php echo $d_praktik['jumlah_praktik']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_praktik['jumlah_praktik'] * $d_harga_jurusan['jumlah_harga'], 0, ",", "."); ?></td>
                                    <?php
                                    $jumlah_total_harga = ($d_praktik['jumlah_praktik'] * $d_harga_jurusan['jumlah_harga']) + $jumlah_total_harga;
                                    $no++;
                                    ?>
                                </tr>
                                <?php
                            }

                            //eksekusi bila jurusan selain dari kedokteran
                            if ($d_praktik['id_jurusan_pdd_jenis'] != 1) {
                                $sql_harga_jenjang = " SELECT * FROM tb_harga 
                                    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                                    JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                                    JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
                                    WHERE tb_harga.id_jenjang_pdd = " . $d_praktik['id_jenjang_pdd'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 6
                                    ORDER BY nama_jenjang_pdd ASC
                                    ";

                                // echo "<br>" . $sql_harga_jenjang;
                                $q_harga_jenjang = $conn->query($sql_harga_jenjang);
                                $r_harga_jenjang = $q_harga_jenjang->rowCount();

                                while ($d_harga_jenjang = $q_harga_jenjang->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $d_harga_jenjang['nama_harga_jenis']; ?></td>
                                        <td><?php echo $d_harga_jenjang['nama_harga']; ?></td>
                                        <td><?php echo $d_harga_jenjang['nama_harga_satuan']; ?></td>
                                        <td><?php echo "Rp " . number_format($d_harga_jenjang['jumlah_harga'], 0, ",", "."); ?></td>
                                        <td><?php echo $d_praktik['jumlah_praktik']; ?></td>
                                        <td><?php echo "Rp " . number_format($d_praktik['jumlah_praktik'] * $d_harga_jenjang['jumlah_harga'], 0, ",", "."); ?></td>
                                    </tr>
                            <?php
                                    $jumlah_total_harga = ($d_praktik['jumlah_praktik'] * $d_harga_jenjang['jumlah_harga']) + $jumlah_total_harga;
                                    $no++;
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="6" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                                <td class="font-weight-bold"><?php echo "Rp " . number_format($jumlah_total_harga, 0, ",", "."); ?></td>
                            </tr>
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

                <!-- Menu Harga Ujian disesuaikan dengan Jenis Jurusan -->
                <div class="text-gray-700">
                    <h5 class="font-weight-bold">Menu Harga Ujian <?php echo $d_praktik['nama_jurusan_pdd_jenis']; ?></h5>
                </div>
                <?php
                if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
                    $sql = "AND tb_harga.id_harga_jenis = 1";
                } else {
                    $sql = "AND tb_harga.id_jurusan_pdd_jenis BETWEEN 2 AND 4";
                }
                $sql_harga_ujian = " SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
                WHERE tb_harga.id_harga_jenis = 6 AND tb_harga.id_jurusan_pdd_jenis = " . $d_praktik['id_jurusan_pdd_jenis'] . "
                ORDER BY nama_harga_jenis ASC
                ";

                // echo $sql_harga_ujian;
                $q_harga_ujian = $conn->query($sql_harga_ujian);
                $r_harga_ujian = $q_harga_ujian->rowCount();

                if ($r_harga_ujian > 0) {
                ?>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuantitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_harga_ujian = $q_harga_ujian->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga_ujian['nama_harga_jenis']; ?></td>
                                    <td><?php echo $d_harga_ujian['nama_harga']; ?></td>
                                    <td><?php echo $d_harga_ujian['nama_harga_satuan']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga_ujian['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td>
                                        <input class="form-control" type="text" id="<?php echo "harga_tertentu" . $d_harga_ujian['id_harga']; ?>" name="<?php echo "harga_tertentu" . $d_harga_ujian['id_harga']; ?>" value="<?php echo $d_praktik['jumlah_praktik']; ?>" onchange="hargatertentu(<?php echo $d_harga_ujian['id_harga']; ?>, 
                                        <?php echo $d_harga_ujian['id_harga']; ?>, 
                                        <?php echo $d_harga_ujian['jumlah_harga'] ?>)">
                                    </td>
                                    <td>
                                        <input class="form-control" type="hidden" name="<?php echo "jumlah_harga_tertentu" . $d_harga_ujian['id_harga']; ?>" id="<?php echo "jumlah_harga_" . $d_harga_ujian['id_harga']; ?>">
                                        <span id="<?php echo "jht_" . $d_harga_ujian['id_harga']; ?>"></span>
                                    </td>
                                </tr>
                            <?php
                                $jumlah_total_ujian = ($d_praktik['jumlah_praktik'] * $d_harga_ujian['jumlah_harga']) + $jumlah_total_ujian;
                                $no++;
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                                <td class="font-weight-bold"><?= $jumlah_total_ujian; ?><span id="totalhargatertentu"></span></td>
                            </tr>
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
                    <h5 class="font-weight-bold">Menu Harga Ruangan dan Tempat</h5>
                </div>
                <?php
                if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
                    $sql = "WHERE tb_harga.id_jurusan_pdd_jenis = 1 AND tb_harga.id_harga_jenis BETWEEN 7 AND 8";
                } else {
                    $sql = "WHERE tb_harga.id_jurusan_pdd_jenis != 1 AND tb_harga.id_harga_jenis BETWEEN 7 AND 8";
                }
                $sql_harga_lainnya = " SELECT * FROM tb_harga 
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
                JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
                JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                $sql ORDER BY nama_harga_jenis ASC, nama_harga ASC
                ";

                $q_harga_lainnya = $conn->query($sql_harga_lainnya);
                $r_harga_lainnya = $q_harga_lainnya->rowCount();

                if ($r_harga_lainnya > 0) {
                ?>
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Jenis</th>
                                <th scope="col">Nama Harga</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kuantitas</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_harga_lainnya = $q_harga_lainnya->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_harga_lainnya['nama_harga_jenis']; ?></td>
                                    <td><?php echo $d_harga_lainnya['nama_harga']; ?></td>
                                    <td><?php echo $d_harga_lainnya['nama_harga_satuan']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_harga_lainnya['jumlah_harga'], 0, ",", "."); ?></td>
                                    <td>
                                        <input class="form-control" type="text" id="<?php echo "harga_lainnya" . $d_harga_lainnya['id_harga']; ?>" name="<?php echo "harga_" . $d_harga_lainnya['id_harga']; ?>" value="<?php echo $d_praktik['jumlah_praktik']; ?>" onchange="hargalainnya(<?php echo $d_harga_lainnya['id_harga']; ?>, <?php echo $d_harga_lainnya['id_harga']; ?>, <?php echo $d_harga_lainnya['jumlah_harga'] ?>)">
                                    </td>
                                    <td>
                                        <input class="form-control" type="hidden" name="<?php echo "jumlah_harga_lainnya" . $d_harga_lainnya['id_harga']; ?>" id="<?php echo "jumlah_harga_" . $d_harga_lainnya['id_harga']; ?>">
                                        <span id="<?php echo "jhl_" . $d_harga_lainnya['id_harga']; ?>"></span>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                            <tr>
                                <td colspan="6" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                                <td class="font-weight-bold">---</td>
                            </tr>
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
                <input name="id_praktik" value="<?php echo $_GET['ih'] ?>" hidden>
                <input type="submit" class="form-control btn btn-success btn-sm" name='pilih_harga' value="SIMPAN">
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['pilih_harga'])) {

    $id_praktik = $_POST['id_praktik'];

    //SQL Praktikan
    $sql_praktik = "SELECT * FROM tb_praktik 
    JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou
    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
    JOIN tb_jurusan_pdd_jenis ON tb_praktik.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
    WHERE tb_praktik.id_praktik = " . $id_praktik;
    // echo $sql_praktik;
    $q_praktik = $conn->query($sql_praktik);
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

    //SQL HARGA sesauikan dengan Jurusan dan Jenis Jurusan
    $sql_harga_jurusan = " SELECT * FROM tb_harga 
    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
    JOIN tb_jurusan_pdd_jenis ON tb_harga.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
    JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan  
    WHERE tb_harga.id_jurusan_pdd_jenis = " . $d_praktik['id_jurusan_pdd_jenis'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 5
    ORDER BY nama_harga_jenis ASC, nama_harga ASC 
    ";

    //SQL HARGA sesuaikan dengan Jenjang
    $sql_harga_jenjang = " SELECT * FROM tb_harga 
    JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis 
    JOIN tb_jenjang_pdd ON tb_harga.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
    JOIN tb_harga_satuan ON tb_harga.id_harga_satuan = tb_harga_satuan.id_harga_satuan 
    WHERE tb_harga.id_jenjang_pdd = " . $d_praktik['id_jenjang_pdd'] . " AND tb_harga.id_harga_jenis BETWEEN 1 AND 6
    ORDER BY nama_jenjang_pdd ASC
    ";
}
?>

<script>
    function hargalainnya(id, value, hs) {
        //console.log(id);
        var harga = $('#harga_lainnya' + id).val();
        var jml = harga * hs;
        //console.log(jml);
        $('#jumlah_harga_lainnya' + id).val(jml);
        jml = numberWithCommas(jml)
        document.getElementById('jhl_' + id).innerHTML = "Rp " + jml;
    }

    function hargatertentu(id, value, hs) {
        //  console.log(id);
        var harga = $('#harga_tertentu' + id).val();
        var jml = harga * hs;
        //  console.log(jml);
        $('#jumlah_harga_tertentu' + id).val(jml);
        jml = numberWithCommas(jml);
        document.getElementById('jht_' + id).innerHTML = "Rp " + jml;
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
</script>