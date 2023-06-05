<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
$exp_arr_idu = explode("*sm*", base64_decode(urldecode(hex2bin($_GET['idu']))));
$idu = $exp_arr_idu[1];
$sql_prvl = "SELECT * FROM tb_user_privileges WHERE id_user = " . $idu;
// echo $sql_prvl;
try {
    $q_prvl = $conn->query($sql_prvl);
    $d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo "<script>alert('-DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}

$sql_pertanyaan = "SELECT * FROM tb_kuesioner_pembimbing";
// echo $sql_kuota;
try {
    $q_pertanyaan = $conn->query($sql_pertanyaan);
    $r_pertanyaan = $q_pertanyaan->rowCount();
} catch (Exception $ex) {
    echo "<script>alert('-DATA PERTANYAAN PEMBIMBING-');";
    echo "document.location.href='?error404';</script>";
}
?>
<?php if ($r_pertanyaan > 0) { ?>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Pertanyaan</th>
                    <th scope="col">Waktu Tambah</th>
                    <th scope="col">Waktu Ubah</th>
                    <th scope="col">Keterangan </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php while ($d_pertanyaan = $q_pertanyaan->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <th scope="row"><?= $no; ?></th>
                        <td><?= $d_pertanyaan['pertanyaan']; ?></td>
                        <td><?= $d_pertanyaan['tgl_tambah']; ?></td>
                        <td><?= $d_pertanyaan['tgl_ubah']; ?></td>
                        <td class="text-center"></td>
                        <td class="text-center">
                            <a href="#" class="btn btn-primary btn-sm ubah" id="<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $d_pertanyaan['id']))); ?>">
                                <i class="fa fa-edit"></i> Ubah
                            </a>

                            <!-- tombol modal hapus pertanyaan   -->
                            <button title="Hapus Pertanyaan" class='btn btn-danger btn-sm' data-toggle="modal" data-target="#<?= md5("hapus" . $d_pertanyaan['id']) ?>">
                                <i class="fas fa-trash"></i> Hapus
                            </button>

                            <!-- modal hapus pertanyaan   -->
                            <div class="modal text-center" id="<?= md5("hapus" . $d_pertanyaan['id']) ?>" data-backdrop="static">
                                <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header h5 bg-danger text-light">
                                            Yakin Hapus Pertanyaan?
                                        </div>
                                        <div class="modal-body text-md">
                                            <div class="i b text-uppercase"><?= $d_pertanyaan['pertanyaan']; ?></div>
                                        </div>
                                        <div class="modal-footer text-md">
                                            <a class="btn btn-secondary btn-sm" data-dismiss="modal">
                                                Kembali
                                            </a>
                                            &nbsp;
                                            <a class="btn btn-success btn-sm hapus">
                                                Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } else { ?>
    <div class="jumbotron">
        <div class="jumbotron-fluid">
            <div class="text-gray-700">
                <h5 class="text-center">Data Pertanyaan Pembimbing Tidak Ada</h5>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>