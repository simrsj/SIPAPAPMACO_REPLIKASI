<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/crypt.php";

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
                            <div class="col-lg-2 my-auto text-right">

                                <!-- tombol modal ubah  -->
                                <a href="#" class="btn btn-primary btn-sm ubah_init" data-toggle="modal" data-target="#<?= md5("ubah" . $d_pertanyaan['id']) ?>">
                                    <i class="fa fa-edit"></i> Ubah
                                </a>
                                <script>
                                    $(".ubah_init").click(function() {
                                        loading_sw2();
                                        $('.err').html("");
                                        $.ajax({
                                            type: 'POST',
                                            url: "v_kuesioner_pembimbingGetData.php",
                                            data: data_t,
                                            success: function() {
                                                simpan_berhasil("");
                                                setTimeout(function() {
                                                    loading_sw2()
                                                    $('#data_pertanyaan').load('_admin/view/v_kuesioner_pembimbingData.php?idu=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $_SESSION['id_user']))) ?>');
                                                    $('#err_t_pertanyaan').empty();
                                                    Swal.close();
                                                }, 5000);
                                            },
                                            error: function() {
                                                console.log("ERROR SIMPAN KUESIONER PEMBIMBING");
                                                Swal.close();
                                            }
                                        });
                                        Swal.close();
                                    });
                                </script>
                                <!-- modal tambah  -->
                                <div class="modal text-center" id="mt" data-backdrop="static">
                                    <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header h5">
                                                Ubah Pertanyaan
                                            </div>
                                            <div class="modal-body text-md">
                                                <form class="form-data b" method="post" id="form_t">
                                                    Ubah Pertanyaan <span style="color:red">*</span><br>
                                                    <input type="text" id="t_pertanyaan" name="t_pertanyaan" class="form-control" placeholder="isikan pertanyaan" required>
                                                    <div class="text-danger b i text-xs blink err" id="err_t_pertanyaan"></div>
                                                    Keterangan<br>
                                                    <textarea id="t_ket" name="t_ket" class="form-control"> </textarea>
                                                    <div class="text-danger b i text-xs blink err" id="err_t_ket"></div>
                                                </form>
                                            </div>
                                            <div class="modal-footer text-md">
                                                <a class="btn btn-danger btn-sm tambah_tutup" data-dismiss="modal">
                                                    Kembali
                                                </a>
                                                &nbsp;
                                                <a class="btn btn-success btn-sm tambah" id="<?= encryptString($d_pertanyaan['id'], $customkey); ?>">
                                                    Simpan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


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
        Swal.close();
    });
</script>