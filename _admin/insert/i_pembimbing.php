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
                    $praktikan_arr[$no][0] = $d_data_praktikan['id_praktikan'];
                    $praktikan_arr[$no][1] = $d_data_praktikan['id_praktik'];
                    $praktikan_arr[$no][2] = $d_data_praktikan['no_id_praktikan'];
                    $praktikan_arr[$no][3] = $d_data_praktikan['nama_praktikan'];
                    $praktikan_arr[$no][4] = $d_data_praktikan['tgl_lahir_praktikan'];
                    $praktikan_arr[$no][5] = $d_data_praktikan['telp_praktikan'];
                    $praktikan_arr[$no][6] = $d_data_praktikan['wa_praktikan'];
                    $praktikan_arr[$no][7] = $d_data_praktikan['email_praktikan'];
                    $praktikan_arr[$no][8] = $d_data_praktikan['kota_kab_praktikan'];
                    $no++;
                }

                // echo "<pre>";
                // print_r($praktikan_arr);
                // echo "</pre>";

                $j_kel = ceil($j_ptkn / 7);
                $j_tim = $j_ptkn / $j_kel;
                echo "$j_ptkn, $j_kel, $j_tim";
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