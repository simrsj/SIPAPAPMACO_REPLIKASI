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
    $sql_bayar = "SELECT * FROM tb_bayar";
    $sql_bayar .= " WHERE id_praktik = '" . base64_decode(urldecode($_GET['idp'])) . "'";
    // echo $id_praktik . "<br>";

    try {
        $q_bayar = $conn->query($sql_bayar);
    } catch (Exception $ex) {
        echo "<script> alert('$ex -DATA BAYAR-'); ";
        echo "document.location.href='?error404'; </script>";
    }
    $r_bayar = $q_bayar->rowCount();

    if ($r_bayar > 0) {

?>
        <div class="table-responsive">
            <div class="row col-lg h4 mb-2 text-gray-800">Data Pembayaran </div>
            <table class="table table-hover" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Atas Nama</th>
                        <th>Pembayaran Melalui</th>
                        <th>Nomor Rekening/Transfer</th>
                        <th>Tanggal Transfer</th>
                        <th>File Bukti Pembayaran</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($d_bayar = $q_bayar->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $d_bayar['atas_nama_bayar']; ?></td>
                            <td><?= $d_bayar['melalui_bayar']; ?></td>
                            <td><?= $d_bayar['noRek_bayar']; ?></td>
                            <td><?= tanggal($d_bayar['tgl_transfer_bayar']); ?></td>
                            <td> <a href="<?= $d_bayar['file_bayar']; ?>" class="btn btn-outline-success" download="bukti file pembayaran">Unduh File</a></td>
                            <td><?= $d_bayar['ket_bayar']; ?></td>
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
        <h3 class="text-center jumbotron jumbotron-fluid"> Data Pemabayaran Tidak Ada</h3>
<?php
    }
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
