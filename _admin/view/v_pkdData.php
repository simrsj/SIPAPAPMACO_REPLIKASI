<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
//data privileges 
$sql_prvl = "SELECT * FROM tb_user_privileges ";
$sql_prvl .= " JOIN tb_user ON tb_user_privileges.id_user = tb_user.id_user";
$sql_prvl .= " WHERE tb_user.id_user = " . base64_decode(urldecode($_GET['idu']));
try {
    $q_prvl = $conn->query($sql_prvl);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}
$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);
if ($d_prvl['c_pkd'] == "Y") {
    $sql_pkd = "SELECT * FROM tb_pkd ";
    $sql_pkd .= " ORDER BY tgl_tambah_pkd DESC";
    // echo $sql_pkd."<br>";
    try {
        $q_pkd = $conn->query($sql_pkd);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PKD NARSUM-');";
        echo "document.location.href='?error404';</script>";
    }
    $r_pkd = $q_pkd->rowCount();
    if ($r_pkd > 0) {
?>
        <div class="table-responsive text-md">
            <div class="h6 b text-center">
                Hilang/Munculkan Kolom Tabel:
                <div class="m-1">
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="1">Nama Institusi</a>
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="2">Nama Institusi</a>
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="3">Nama Institusi</a>
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="4">Nama Institusi</a>
                </div>
            </div>
            <hr>
            <table class="table table-striped table-bordered m-auto display" width="100%" id="table-search-each">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Instansi/Pengguna</th>
                        <th>Alamat</th>
                        <th>Nomor Surat</th>
                        <th>File</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($d_pkd = $q_pkd->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr class="text-center">
                            <td class="align-middle"><?= $no; ?></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
                            <td class="align-middle"></td>
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
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php
    } else {
    ?>
        <h3 class="text-center"> Data Narasumber Tidak Ada</h3>
<?php
    }
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
