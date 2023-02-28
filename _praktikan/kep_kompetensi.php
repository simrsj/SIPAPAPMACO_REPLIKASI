<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header bg-primary  py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="text-light b ">
                Log Book Kompetensi Keperawatan
            </div>
            <div>
                <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#tambah">
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <div class="modal fade text-gray-600" id="tambah">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                Tambah Kegiatan Kompetensi
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="form" class="form-group text-center">
                                    Nama Kompetensi<span style="color:red">*</span><br>
                                    <select class="select2" name="kompetensi" id="kompetensi" style="width: 100%;" required>
                                        <option value="">-- Pilih --</option>
                                        <?php
                                        $komp = $conn->query("SELECT * FROM tb_logbook_kep_kompetensi order by nama ASC");
                                        while ($d_komp = $komp->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value="<?= $d_komp['nama']; ?> "><?= $d_komp['nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="text-xs font-italic text-danger blink b " id="err_kompetensi"></div><br>
                                    Tanggal Pelaksanaan <span style="color:red">*</span><br>
                                    <input class="form-control form-control-sm" type="date" name="tgl_pel" id="tgl_pel" required>
                                    <div class="text-xs font-italic text-danger blink b" id="err_tgl_pel"></div><br>
                                    <a href="#" class="btn btn-success btn-sm tambah col" id="<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $_SESSION['id_user']))) ?>">
                                        SIMPAN
                                    </a>

                                </form>
                                <script>
                                    $(document).on('click', '.tambah', function() {

                                        Swal.fire({
                                            title: 'Mohon Ditunggu',
                                            html: '<div class="loader mb-5 mt-5 text-center"></div>',
                                            allowOutsideClick: false,
                                            showConfirmButton: false,
                                            backdrop: true
                                        });
                                        var id = $(this).attr('id');
                                        var data_form = $("#form").serializeArray();

                                        var kompetensi = $('#kompetensi').val();
                                        var tgl_pel = $('#tgl_pel').val();

                                        //cek data from modal tambah bila tidak diiisi
                                        if (
                                            kompetensi == '' ||
                                            tgl_pel == ''
                                        ) {

                                            if (kompetensi == "") {
                                                $("#err_kompetensi").html("Kompetensi Harus Dipilih");
                                            } else {
                                                $("#err_kompetensi").html("");
                                            }

                                            if (tgl_pel == "") {
                                                $("#err_tgl_pel").html("Tanggal Pelaksanaan Harus Dipilih");
                                            } else {
                                                $("#err_tgl_pel").html("");
                                            }

                                            Swal.fire({
                                                allowOutsideClick: true,
                                                showConfirmButton: false,
                                                icon: 'warning',
                                                html: '<div class="text-lg b">DATA YANG DIISI <br>TIDAK LENGKAP</div>',
                                                timer: 3000,
                                                timerProgressBar: true,
                                                backdrop: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            });
                                        }
                                        //simpan data tambah bila sudah sesuai
                                        else {
                                            $.ajax({
                                                type: 'POST',
                                                url: "_praktikan/exc/x_kep_kompetensi_s.php",
                                                data: data_form,
                                                dataType: 'JSON',
                                                success: function(response) {
                                                    if (response.ket == "T") {
                                                        console.log("Error");
                                                        Swal.fire({
                                                            allowOutsideClick: true,
                                                            icon: 'error',
                                                            html: '<span class="text-lg b">Data Gagal Tersimpan</span>',
                                                            showConfirmButton: false,
                                                            backdrop: true,
                                                            timer: 5000,
                                                            timerProgressBar: true,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        });
                                                    } else {
                                                        console.log("Success");
                                                        Swal.fire({
                                                            allowOutsideClick: true,
                                                            icon: 'success',
                                                            html: '<span class="text-lg b">Data Berhasil Tersimpan</span>',
                                                            showConfirmButton: false,
                                                            backdrop: true,
                                                            timer: 5000,
                                                            timerProgressBar: true,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        }).then(
                                                            function() {
                                                                $('#data_kep_kompetensi')
                                                                    .load(
                                                                        "data_kep_kompetensi");
                                                                $('#err_t_foto').empty();
                                                                $("#form_t").trigger("reset");
                                                            }

                                                        );
                                                    }
                                                },
                                                error: function(response) {
                                                    console.log(response);
                                                }
                                            });
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="data_kep_kompetensi"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Swal.fire({
            //     title: 'Mohon Ditunggu',
            //     html: '<div class="loader mb-5 mt-5 text-center"></div>',
            //     allowOutsideClick: false,
            //     showConfirmButton: false,
            //     backdrop: true
            // });
            $('#data_kep_kompetensi')
                .load(
                    "_praktikan/kep_kompetensiData.php?idu=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $_SESSION['id_user']))); ?>");
        });
    </script>
</div>
<!-- /.container-fluid -->