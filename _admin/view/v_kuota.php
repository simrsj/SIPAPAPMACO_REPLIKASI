<?php

if (isset($_GET['kta'])) {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Data Kuota</h1>
            </div>
            <div class="col-lg-2 my-auto text-right">
                <button class="btn btn-outline-success btn-sm tambah_init">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <div class="card shadow mb-4 card-body" id="data_tambah_kuota" style="display: none;">
            <form class="form-inline" method="post" id="form_tambah_kuota">
                <div class="form-group mx-sm-3 mb-2">
                    Nama Kuota : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control" name="t_nama_kuota" id="t_nama_kuota" required>
                    <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_nama"></span>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    Jumlah Kuota : <span class="text-danger mb-2">*</span>&nbsp;&nbsp;
                    <input class="form-control" name="t_jumlah_kuota" id="t_jumlah_kuota" required>
                    <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_jumlah"></span>
                </div>
                <button type="button" name="tambah" class="btn btn-success mb-2 tambah">
                    Tambah
                </button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-outline-danger mb-2 tambah_tutup">
                    Tutup
                </button>
            </form>
        </div>
        <div class="card shadow mb-4 card-body" id="data_ubah_kuota" style="display: none;">
            <form class="form-inline" method="post" id="form_ubah_kuota">
                <div class="form-group mx-sm-3 mb-2">
                    Nama Kuota : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-inline" name="nama_kuota" id="nama_kuota" required>
                    <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_nama"></span>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    Jumlah Kuota : <span class="text-danger mb-2">*</span>&nbsp;&nbsp;
                    <input class="form-inline" name="jumlah_kuota" id="jumlah_kuota" required>
                    <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_jumlah"></span>
                </div>
                <button type="button" name="tambah" class="btn btn-primary mb-2 ubah">
                    Ubah
                </button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-outline-danger mb-2 ubah_tutup">
                    Tutup
                </button>
            </form>
        </div>

        <div class="card shadow mb-4 card-body" id="data_kuota"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#data_kuota').load('_admin/view/v_kuotaData.php?');
        });

        $(".tambah_init").click(function() {
            document.getElementById("err_nama").innerHTML = "";
            document.getElementById("err_jumlah").innerHTML = "";
            document.getElementById("form_tambah_kuota").reset();
            $("#data_tambah_kuota").fadeIn('slow');
            $("#data_ubah_kuota").fadeOut('fast');
        });

        $(".tambah_tutup").click(function() {
            document.getElementById("err_nama").innerHTML = "";
            document.getElementById("err_jumlah").innerHTML = "";
            document.getElementById("form_tambah_kuota").reset();
            $("#data_tambah_kuota").fadeOut('slow');
        });

        $(document).on('click', '.tambah', function() {
            var data = $('#form_tambah_kuota').serialize();
            var nama_kuota = document.getElementById("t_nama_kuota").value;
            var jumlah_kuota = document.getElementById("t_jumlah_kuota").value;

            //cek data from ubah bila tidak diiisi
            if (
                nama_kuota == "" ||
                jumlah_kuota == ""
            ) {
                if (nama_kuota == "") {
                    document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
                } else {
                    document.getElementById("err_nama").innerHTML = "";
                }

                if (no_id_kuota == "") {
                    document.getElementById("err_jumlah").innerHTML = "Jumlah Kuota Harus Diisi";
                } else {
                    document.getElementById("err_jumlah").innerHTML = "";
                }

            } else {
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_kuota_s.php",
                    data: data,
                    success: function() {

                        document.getElementById("form_tambah_kuota").reset();
                        $('#data_kuota').load('_admin/view/v_kuotaData.php?');

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        Toast.fire({
                            icon: 'success',
                            title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Ditambah</b></div>'
                        });
                        document.getElementById("err_nama").innerHTML = "";
                        document.getElementById("err_jumlah").innerHTML = "";
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });
            }
        });
    </script>
<?php
} else {
    include "_error/index.php";
}
?>