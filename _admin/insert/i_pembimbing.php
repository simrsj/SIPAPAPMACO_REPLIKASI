<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Pilih Pembimbing dan Tempat</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_data_praktikan = "SELECT * FROM tb_praktikan ";
            $sql_data_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
            $sql_data_praktikan .= " WHERE tb_praktik.id_praktik = " . $_GET['i'];
            $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
            // echo $sql_data_praktikan;

            $q_data_praktikan = $conn->query($sql_data_praktikan);
            $r_data_praktikan = $q_data_praktikan->rowCount();
            $j_ptkn = $r_data_praktikan;

            if ($r_data_praktikan > 0) {
                $id_jurusan_pdd = "";
                $id_profesi_pdd = "";
                $no = 0;
                while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                    $id_jurusan_pdd = $d_data_praktikan['id_jurusan_pdd'];
                    $id_profesi_pdd = $d_data_praktikan['id_profesi_pdd'];
                    $praktikan_arr[$no]['id_praktikan'] = $d_data_praktikan['id_praktikan'];
                    $praktikan_arr[$no]['id_praktik'] = $d_data_praktikan['id_praktik'];
                    $praktikan_arr[$no]['no_id_praktikan'] = $d_data_praktikan['no_id_praktikan'];
                    $praktikan_arr[$no]['nama_praktikan'] = $d_data_praktikan['nama_praktikan'];
                    $praktikan_arr[$no]['tgl_lahir_praktikan'] = $d_data_praktikan['tgl_lahir_praktikan'];
                    $praktikan_arr[$no]['telp_praktikan'] = $d_data_praktikan['telp_praktikan'];
                    $praktikan_arr[$no]['wa_praktikan'] = $d_data_praktikan['wa_praktikan'];
                    $praktikan_arr[$no]['email_praktikan'] = $d_data_praktikan['email_praktikan'];
                    $praktikan_arr[$no]['kota_kab_praktikan'] = $d_data_praktikan['kota_kab_praktikan'];
                    $no++;
                }

                echo "<pre>";
                // print_r($praktikan_arr);
                // var_dump($praktikan_arr);
                echo "</pre>";

                $j_kel = ceil($j_ptkn / 7);
                $j_tim = ceil($j_ptkn / $j_kel);
                echo "$j_ptkn, $j_kel, $j_tim";

            ?>
                <form method="POST" id="form_pembb_tempat">
                    <?php
                    $y = 0;
                    for ($x = 1; $x <= $j_kel; $x++) {
                    ?>
                        <!-- Pilih Pembimbing dan Tempat  -->
                        <div class="row">
                            <div class="col-md text-center">
                                Pembimbing : <br>
                                <?php
                                if ($id_jurusan_pdd == 1) {
                                    if ($id_profesi_pdd == 1) {
                                        $jenis_pmbb = "PPDS";
                                    } elseif ($id_profesi_pdd == 2) {
                                        $jenis_pmbb = "PSPD";
                                    }
                                } elseif ($id_jurusan_pdd == 2) {
                                    $jenis_pmbb = "CI KEP";
                                } elseif ($id_jurusan_pdd == 3) {
                                    $jenis_pmbb = "CI PSI";
                                } elseif ($id_jurusan_pdd == 4) {
                                    $jenis_pmbb = "CI IT";
                                } elseif ($id_jurusan_pdd == 5) {
                                    $jenis_pmbb = "CI FAR";
                                } elseif ($id_jurusan_pdd == 6) {
                                    $jenis_pmbb = "CI PEKSOS";
                                } elseif ($id_jurusan_pdd == 7) {
                                    $jenis_pmbb = "CI KESLING";
                                }
                                $sql_pmbb = "SELECT * FROM tb_pembimbing";
                                $sql_pmbb .= " WHERE jenis_pembimbing = '" . $jenis_pmbb . "' AND status_pembimbing = 'y'";
                                $sql_pmbb .= " ORDER BY nama_pembimbing ASC";

                                $q_pmbb = $conn->query($sql_pmbb);
                                ?>

                                <select class='form-inline js-example-placeholder-single' aria-label='Default select example' name="id_pembimbing<?php echo $x; ?>" id="id_pembimbing<?php echo $x; ?>" required>
                                    <option value="">-- Pilih --</option>
                                    <?php
                                    while ($d_pmbb = $q_pmbb->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?php echo $d_pmbb['id_pmebimbing']; ?>">
                                            <?php echo $d_pmbb['nama_pembimbing'] . " (" . $d_pmbb['kali_pembimbing'] . ")"; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div><br>
                            <div class="col-md text-center">
                                Tempat : <br>
                                <?php
                                $sql_unit = "SELECT * FROM tb_unit";
                                $sql_unit .= " ORDER BY nama_unit ASC";

                                $q_unit = $conn->query($sql_unit);
                                ?>
                                <select class='form-inline js-example-placeholder-single' aria-label='Default select example' name='id_unit<?php echo $x; ?>' id="id_unit<?php echo $x; ?>" required>
                                    <option value="">-- Pilih --</option>
                                    <?php
                                    while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?php echo $d_unit['id_unit']; ?>">
                                            <?php echo $d_unit['nama_unit']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <hr>

                        <!-- data praktikan  -->
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $z = 1;
                                    while ($j_tim >= $z) {
                                    ?>
                                        <tr>
                                            <td><?php echo $z; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['nama_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['no_id_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['telp_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['wa_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['email_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['kota_kab_praktikan']; ?></td>
                                        </tr>
                                    <?php
                                        $y++;
                                        $z++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                    <?php
                        $j_tim -= 1;
                    }
                    ?>

                    <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                        <button type="button" name="simpan_praktik" id="simpan_praktik" class="btn btn-outline-success" onclick="simpan_ked()">
                            <!-- <a class="nav-link" href="#tarif"> -->
                            <i class="fas fa-check-circle"></i>
                            Simpan Pembimbing dan Tempat Praktik
                            <i class="fas fa-check-circle"></i>
                            <!-- </a> -->
                        </button>
                    </div>
                </form>
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