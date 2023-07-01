<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
error_reporting(0);
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

//data privileges 
$exp_arr_idu = explode("*sm*", base64_decode(urldecode(hex2bin($_GET['idu']))));
$idu = $exp_arr_idu[1];
try {
    $sql_prvl = "SELECT * FROM tb_user_privileges ";
    $sql_prvl .= " JOIN tb_user ON tb_user_privileges.id_user = tb_user.id_user";
    $sql_prvl .= " WHERE tb_user.id_user = " . $idu;
    // echo $sql_prvl;
    $q_prvl = $conn->query($sql_prvl);
    $d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}
try {
    $sql = "SELECT * FROM tb_logbook_kep_kompetensi ";
    $sql .= " ORDER BY tgl_input DESC";
    $q = $conn->query($sql);
    $r = $q->rowCount();
} catch (Exception $ex) {
    echo "<script>alert('-DATA logbook kompetensi keperawatan-');";
    echo "document.location.href='?error404';</script>";
}
if ($r > 0) {
?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered m-auto display" width="100%" id="table-search-each">
            <thead class="table-dark text-center">
                <tr>
                    <th>No<br><br></th>
                    <th>Tanggal Input<br><br></th>
                    <th>Nama Kompetensi<br><br></th>
                    <th>Tanggal Pelaksanaan<br><br></th>
                    <th>Verifikasi<br>Pembimbing<br><br></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr class="text-center">
                        <td class="align-middle"><?= $no; ?></td>
                        <td class="align-middle"><?= tanggal($d['tgl_input']) ?></td>
                        <td class="align-middle"><?= $d['nama'] ?></td>
                        <td class="align-middle"><?= tanggal($d['tgl_pel']) ?></td>
                        <td class="align-middle">
                            <?php if ($d['paraf'] == 'Y') { ?>
                                <span class="badge badge-success">DISETUJUI</span>
                            <?php } elseif ($d['paraf'] == 'T') { ?>
                                <span class="badge badge-danger">DITOLAK</span>
                            <?php } else { ?>
                                <span class="badge badge-dark">BELUM DIVERIFIKASI</span>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    ?>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <script>
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/custom/cs_datatable.js";
        ?>
    </script>
<?php
} else {
?>
    <div class="jumbotron">
        <div class="jumbotron-fluid">
            <div class="text-gray-700">
                <h5 class="text-center"> Data Log Book Kompetensi Anda Tidak Ada</h5>
            </div>
        </div>
    </div>
<?php
}
