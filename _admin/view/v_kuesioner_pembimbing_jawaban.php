<?php

if (isset($_GET['kuesioner_pembimbing']) && isset($_GET['jawaban']) && $d_prvl['level_user'] == 1) {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Data Jawaban Pertanyaan "<b><?= decryptString($_GET['pertanyaan'], $customkey) ?></b>"</h1>
            </div>
            <div class="col-lg-2 my-auto text-right">

                <!-- tombol modal tambah jawaban  -->
                <a title="tambah jawaban" class='btn btn-success btn-sm tambah_init' href='#' data-toggle="modal" data-target="#mi<?= md5($d_praktik['id_praktik']); ?>">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>

                <!-- modal tambah jawaban  -->

                <div class="modal" id="modal_tambah">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary text-light">
                                Presentasi Ilmiah
                                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                    X
                                </button>
                            </div>
                            <div class="modal-body text-left">
                                <form id="form_t" method="post">
                                    <label for="jawaban">Jawaban <span class="text-danger">*</span></label>
                                    <input id="jawaban" name="jawaban" class="form-control">
                                    <div class="text-danger b i text-xs blink" id="err_jawaban"></div><br>
                                    <label for="nilai">Jawaban <span class="text-danger">*</span></label>
                                    <input type="number" id="nilai" name="nilai" class="form-control">
                                    <div class="text-danger b i text-xs blink" id="err_nilai"></div><br>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn btn-success btn-sm tambah"><i class="fa fa-save"></i> Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal text-center" id="mi" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable  modal-md">
                        <div class="modal-content">
                            <div class="modal-header h5">
                                Tambah Jawaban
                            </div>
                            <div class="modal-body text-md">
                                <form class="form-data b" method="post" id="form_t">
                                </form>
                            </div>
                            <div class="modal-footer text-md">
                                <a class="btn btn-danger btn-sm tambah_tutup<?= md5($d_praktik['id_praktik']); ?>" data-dismiss="modal">
                                    Kembali
                                </a>
                                &nbsp;
                                <a class="btn btn-success btn-sm tambah<?= md5($d_praktik['id_praktik']); ?>" id="<?= bin2hex(urlencode(base64_encode($d_praktik['id_praktik'] . "*sm*" . date('Y-m-d H:i:s', time())))); ?>">
                                    Simpan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="data_jawaban"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#data_jawaban')
                .load(
                    "_admin/view/v_kuesioner_pembimbing_jawabanData.php?id=<?= $_GET['jawaban'] ?>");
            $('#loader').remove();
        });
        $(".tambah_init").click(function() {
            $(".err").html("");
            $("#form_t").trigger("reset");
        });
        $(document).on('click', '.tambah', function() {
            loading_sw2();
            var data_form = $('#form_t').serializeArray();
            data_form.push({
                name: "idpr",
                value: "<?= $_GET['data'] ?>"
            });
            var tgl = $("#tgl").val();
            var semester = $("#semester").val();
            var jenis = $("#jenis").val();
            var judul = $("#judul").val();
            var bim1 = $("#bim1").val();
            var bim2 = $("#bim2").val();
            var bim3 = $("#bim3").val();
            var present = $("#present").val();
            var pembimbing = $("#pembimbing").val();
            if (
                semester == "" ||
                tgl == "" ||
                jenis == "" ||
                judul == "" ||
                bim1 == "" ||
                bim2 == "" ||
                bim3 == "" ||
                present == "" ||
                pembimbing == ""
            ) {
                custom_alert(true, 'warning', '<center>DATA WAJIB ADA YANG BELUM TERISI/TIDAK SESUAI</center>', 10000);
                (tgl == "") ? $("#err_tgl").html("Harus Dipilih"): $("#err_tgl").html("");
                (semester == "" || semester < 0) ? $("#err_semester").html("Isian harus lebih sama dengan 0 (Nol)"): $("#err_semester").html("");
                (jenis == "") ? $("#err_jenis").html("Harus Diisi"): $("#err_jenis").html("");
                (judul == "") ? $("#err_judul").html("Harus Diisi"): $("#err_judul").html("");
                (bim1 == "") ? $("#err_bim1").html("Harus Dipilih"): $("#err_bim1").html("");
                (bim2 == "") ? $("#err_bim2").html("Harus Dipilih"): $("#err_bim2").html("");
                (bim3 == "") ? $("#err_bim3").html("Harus Dipilih"): $("#err_bim3").html("");
                (present == "") ? $("#err_present").html("Harus Dipilih"): $("#err_present").html("");
                (pembimbing == "") ? $("#err_pembimbing").html("Harus Diisi"): $("#err_pembimbing").html("");
            } else {
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_ked_residen_pi_input_t.php",
                    data: data_form,
                    dataType: "JSON",
                    success: function(response) {
                        if (response.ket == "SUCCESS") {
                            $('#modal_tambah').modal('hide')
                            custom_alert(true, 'success', '<center>DATA BERHASIL DISIMPAN</center>', 10000);
                            $('#data_pi')
                                .load(
                                    "_admin/view/v_ked_residen_pi_data.php?idpr=<?= $_GET['data'] ?>");
                        } else custom_alert(true, 'error', '<center>DATA GAGAL DISIMPAN <br>' + response.ket + '</center>', 10000);
                    },
                    error: function(response) {
                        custom_alert(true, 'error', '<center>DATA ERROR <br>' + response.ket + '</center>', 10000);
                    }
                });
            }
        });
    </script>
<?php
} else {
    echo "<script>alert('Maaf anda tidak punya hak akses');document.location.href='?error401';</script>";
}
?>