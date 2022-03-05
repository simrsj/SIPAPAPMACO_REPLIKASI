<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Ubah Data Praktikan</h1>
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
            $j_ptkn = $r_data_praktikan + 2;

            if ($r_data_praktikan > 0) {
                $no = 0;
                while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
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

                // echo "<pre>";
                // // print_r($praktikan_arr);
                // // var_dump($praktikan_arr);
                // echo "</pre>";

                $j_kel = ceil($j_ptkn / 7);
                $j_tim = $j_ptkn / $j_kel;
                echo "$j_ptkn, $j_kel, $j_tim";

            ?>
                <div class="table-responsive">
                    <?php
                    for ($x = 1; $x <= $j_kel; $x++) {
                    ?>
                        Pembimbing : <br>
                        Tempat : <br>
                        <hr>
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
                                $y = 1;
                                foreach ($praktikan_arr as $data_arr) {
                                ?>
                                    <tr>
                                        <td><?php echo $y; ?></td>
                                        <td><?php echo $data_arr['nama_praktikan']; ?></td>
                                        <td><?php echo $data_arr['no_id_praktikan']; ?></td>
                                        <td><?php echo $data_arr['telp_praktikan']; ?></td>
                                        <td><?php echo $data_arr['wa_praktikan']; ?></td>
                                        <td><?php echo $data_arr['email_praktikan']; ?></td>
                                        <td><?php echo $data_arr['kota_kab_praktikan']; ?></td>
                                    </tr>
                                <?php
                                    $y++;
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    }
                    ?>
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