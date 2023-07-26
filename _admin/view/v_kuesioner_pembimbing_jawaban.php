<?php

if (isset($_GET['kuesioner_pembimbing']) && $d_prvl['level_user'] == 1) {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Data Kuesioner Pembimbing</h1>
            </div>
            <div class="col-lg-2 my-auto text-right">

                <!-- tombol modal tambah praktikan  -->
                <a title="tambah praktikan" class='btn btn-success btn-sm tambah_init<?= md5($d_praktik['id_praktik']); ?>' href='#' data-toggle="modal" data-target="#mi<?= md5($d_praktik['id_praktik']); ?>">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>

                <!-- modal tambah praktikan  -->
                <div class="modal text-center" id="mi<?= md5($d_praktik['id_praktik']); ?>" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable  modal-md">
                        <div class="modal-content">
                            <div class="modal-header h5">
                                Tambah Pertanyaan
                            </div>
                            <div class="modal-body text-md">
                                <form class="form-data b" method="post" id="form_t">
                                    No. ID Praktikan (NIM/NPM/NIP) : <span style="color:red">*</span><br>
                                    <input type="text" id="t_no_id<?= md5($d_praktik['id_praktik']); ?>" name="t_no_id" class="form-control" placeholder="Isikan No ID" required>
                                    <div class="text-danger b i text-xs blink" id="err_t_no_id<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                    Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                    <input type="text" id="t_nama<?= md5($d_praktik['id_praktik']); ?>" name="t_nama" class="form-control" placeholder="Inputkan Nama Siswa/Mahasiswa" required>
                                    <div class="text-danger b i text-xs blink" id="err_t_nama<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                    Tanggal Lahir : <span style="color:red">*</span><br>
                                    <input type="date" id="t_tgl<?= md5($d_praktik['id_praktik']); ?>" name="t_tgl" class="form-control" required>
                                    <div class="text-danger b i text-xs blink" id="err_t_tgl<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                    Alamat : <span style="color:red">*</span><br>
                                    <textarea id="t_alamat<?= md5($d_praktik['id_praktik']); ?>" name="t_alamat" class="form-control" rows="2" placeholder="Inputkan Alamat"></textarea>
                                    <div class="text-danger b i text-xs blink" id="err_t_alamat<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                    No Telepon : <span style="color:red">*</span><br>
                                    <input type="number" id="t_telpon<?= md5($d_praktik['id_praktik']); ?>" name="t_telpon" class="form-control" min="1" placeholder="Inputkan No Telpon" required>
                                    <div class="text-danger b i text-xs blink" id="err_t_telpon<?= md5($d_praktik['id_praktik']); ?>"></div><br>
                                    No WhatsApp :<br>
                                    <input type="number" id="t_wa<?= md5($d_praktik['id_praktik']); ?>" name="t_wa" class="form-control" min="1" placeholder="Inputkan WhatsApp">
                                    <br>
                                    <br>
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

        <!-- form tambah kuota  -->
        <?php if ($d_prvl['c_kuota'] == "Y") { ?>
            <div class="card shadow mb-4 card-body" id="data_tambah_kuota" style="display: none;">
                <form class="form-inline" method="post" id="form_tambah_kuota">
                    <div class="form-group mx-sm-3 mb-2">
                        Nama Kuota : <span class="text-danger">*</span>&nbsp;&nbsp;
                        <input class="form-control" name="t_nama_kuota" id="t_nama_kuota" required>
                        <br>
                        <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_t_nama"></div>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        Jumlah Kuota : <span class="text-danger mb-2">*</span>&nbsp;&nbsp;
                        <input class="form-control" type="number" min="0" name="t_jumlah_kuota" id="t_jumlah_kuota" required>
                        <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_t_jumlah"></div>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        Keterangan : &nbsp;&nbsp;
                        <textarea class="form-control" name="t_ket_kuota" id="t_ket_kuota"></textarea>
                    </div>
                </form>
                <hr>
                <div class="form-inline navbar  nav-link justify-content-end">
                    <button type="button" name="tambah" class="btn btn-success mb-2 tambah">
                        Tambah
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-danger mb-2 tambah_tutup">
                        Tutup
                    </button>
                </div>
            </div>
        <?php } ?>

        <!-- form ubah kuota  -->
        <div class="card shadow mb-4 card-body" id="data_ubah_kuota" style="display: none;">
            <form class="form-inline" method="post" id="form_ubah_kuota">
                <input type="hidden" name="u_id_kuota" id="u_id_kuota">
                <div class="form-group mx-sm-3 mb-2">
                    Nama Kuota : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control" name="u_nama_kuota" id="u_nama_kuota" required>
                    <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_nama"></span>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    Jumlah Kuota : <span class="text-danger mb-2">*</span>&nbsp;&nbsp;
                    <input class="form-control" type="number" min="0" name="u_jumlah_kuota" id="u_jumlah_kuota" required>
                    <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_jumlah"></span>
                </div>
                <div class="form-group mx-sm-3 mb-2">
                    Keterangan : &nbsp;&nbsp;
                    <textarea class="form-control" name="u_ket_kuota" id="u_ket_kuota"></textarea>
                    <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_ket"></span>
                </div>
            </form>
            <hr>
            <div class="form-inline navbar  nav-link justify-content-end">
                <button type="button" name="ubah" class="btn btn-primary mb-2 ubah">
                    Ubah
                </button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-outline-danger mb-2 ubah_tutup">
                    Tutup
                </button>
            </div>
            </form>
        </div>

        <div class="card shadow mb-4 card-body" id="data_kuota"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#data_kuota').load('_admin/view/v_kuotaData.php?idu=<?= urlencode(base64_encode($_SESSION['id_user'])) ?>');
        });

        <?php if ($d_prvl['c_kuota'] == "Y") { ?>
            $(".tambah_init").click(function() {
                document.getElementById("err_t_nama").innerHTML = "";
                document.getElementById("err_t_jumlah").innerHTML = "";
                document.getElementById("form_tambah_kuota").reset();
                $("#data_tambah_kuota").fadeIn('slow');
                $("#data_ubah_kuota").fadeOut('fast');
            });

            $(".tambah_tutup").click(function() {
                document.getElementById("err_t_nama").innerHTML = "";
                document.getElementById("err_t_jumlah").innerHTML = "";
                document.getElementById("form_tambah_kuota").reset();
                $("#data_tambah_kuota").fadeOut('slow');
            });
            $(document).on('click', '.tambah', function() {
                var data = $('#form_tambah_kuota').serialize();
                var nama_kuota = document.getElementById("t_nama_kuota").value;
                var jumlah_kuota = document.getElementById("t_jumlah_kuota").value;
                var ket_kuota = document.getElementById("t_ket_kuota").value;

                //cek data from ubah bila tidak diiisi
                if (
                    nama_kuota == "" ||
                    jumlah_kuota == ""
                ) {
                    if (nama_kuota == "") {
                        document.getElementById("err_t_nama").innerHTML = "Nama Harus Diisi";
                    } else {
                        document.getElementById("err_t_nama").innerHTML = "";
                    }

                    if (jumlah_kuota == "") {
                        document.getElementById("err_t_jumlah").innerHTML = "Jumlah Kuota Harus Diisi";
                    } else {
                        document.getElementById("err_t_jumlah").innerHTML = "";
                    }

                } else {
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_kuota_s.php",
                        data: data,
                        success: function() {

                            $('#data_kuota').load('_admin/view/v_kuotaData.php?idu=<?= urlencode(base64_encode($_SESSION['id_user'])) ?>');

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
                            document.getElementById("err_t_nama").innerHTML = "";
                            document.getElementById("err_t_jumlah").innerHTML = "";
                            document.getElementById("form_tambah_kuota").reset();
                        },
                        error: function(response) {
                            console.log(response.responseText);
                        }
                    });
                }
            });
        <?php } ?>
    </script>
<?php
} else {
    echo "<script>alert('Maaf anda tidak punya hak akses');document.location.href='?error401';</script>";
}
?>