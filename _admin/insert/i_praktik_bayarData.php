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
if ($d_prvl['c_praktik_bayar'] == 'Y') {

    //query data praktik
    $sql_praktik = "SELECT * FROM tb_praktik ";
    $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
    $sql_praktik .= " WHERE id_praktik = " . base64_decode(urldecode($_GET['idp']));
    try {
        $q_praktik = $conn->query($sql_praktik);
        $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PRAKTIK-');document.location.href='?error404';</script>";
    }

    //data tarif praktik
    $sql_praktik_tarif = "SELECT * FROM tb_bayar";
    $sql_praktik_tarif .= " WHERE id_praktik = '" . base64_decode(urldecode($_GET['idp'])) . "'";
    // echo $id_praktik . "<br>";

    try {
        $q_praktik_tarif = $conn->query($sql_praktik_tarif);
    } catch (Exception $ex) {
        echo "<script> alert('$ex -DATA BAYAR-'); ";
        echo "document.location.href='?error404'; </script>";
    }
    $r_praktik_tarif = $q_praktik_tarif->rowCount();

    if ($r_praktik_tarif > 0) {

?>
        <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Jenis</th>
                        <th>Nama Tarif</th>
                        <th>Satuan</th>
                        <th>Tarif</th>
                        <th>Frek.</th>
                        <th>Ktt.</th>
                        <th width="150px">Total Tarif</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($d_bayar = $q_bayar->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $d_bayar['kode_bayar']; ?></td>
                            <td><?= $d_bayar['atas_nama_bayar']; ?></td>
                            <td><?= $d_bayar['noRek_bayar']; ?></td>
                            <td><?= $d_bayar['melalui_bayar']; ?></td>
                            <td><?= $d_bayar['tgl_bayar']; ?></td>
                            <td><?= $d_bayar['tgl_bayar']; ?></td>
                            <td>
                                <a href="<?= $d_bayar['file_bayar']; ?>" class="btn btn-outline-success" download="bukti file pembayaran">Unduh File</a>
                            </td>
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
        <h3 class="text-center jumbotron jumbotron-fluid"> Data Bayar Tidak Ada</h3>
<?php
    }
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
