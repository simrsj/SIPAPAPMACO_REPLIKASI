<?php if (isset($_GET['ptk']) && $d_prvl['r_praktikan'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Praktikan</h1>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktik ";
                $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                // echo $sql_praktik . "<br>";
                try {
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK-');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;">
                                        <br><br>

                                        <div class="col-sm-4 text-center m-auto">
                                            <?php if ($_SESSION['level_user'] == 1) { ?>
                                                <b class="text-gray-800">INSTITUSI : </b><br><?= $d_praktik['nama_institusi']; ?><br>
                                            <?php } ?>
                                            <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?= $d_praktik['nama_praktik']; ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">TANGGAL MULAI : </b><br><?= tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                            <b class="text-gray-800">TANGGAL SELESAI : </b><br><?= tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">JURUSAN : </b><br><?= $d_praktik['nama_jurusan_pdd']; ?><br>
                                            <b class="text-gray-800">JENJANG : </b><br><?= $d_praktik['nama_jenjang_pdd']; ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                                            <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?= $d_praktik['jumlah_praktik']; ?>
                                        </div>
                                        <!-- tombol aksi/info proses  -->
                                        <div class="col-sm-2 my-auto text-right">
                                            <!-- tombol rincian -->
                                            <a class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#<?= md5($d_praktik['id_praktik']); ?>" title="Rincian">
                                                <i class="fas fa-info-circle"></i> Rincian Data
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data praktikan -->
                                <div id="<?= md5($d_praktik['id_praktik']); ?>" class="collapse" data-parent="#accordion">
                                    <div class="card-body " style="font-size: medium;">
                                        <!-- data praktikan -->
                                        <div class="text-gray-700 row mb-0">
                                            <div class="col">
                                                <h4 class="font-weight-bold">DATA PRAKTIKAN</h4><br>
                                            </div>
                                            <?php if ($d_prvl['c_praktikan'] == 'Y') { ?>
                                                <div class="col-2 text-right">

                                                    <!-- tombol modal tambah praktikan  -->
                                                    <a title="tambah praktikan" class='btn btn-success btn-sm tambah_init' href='#' data-toggle="modal" data-target="#mi<?= md5($d_praktik['id_praktik']); ?>">
                                                        <i class="fas fa-plus"></i> Tambah Data
                                                    </a>

                                                    <!-- modal tambah praktikan  -->
                                                    <div class="modal fade text-center" id="mi<?= md5($d_praktik['id_praktik']); ?>">
                                                        <div class="modal-dialog modal-dialog-scrollable  modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header h5">
                                                                    Tambah Praktikan
                                                                </div>
                                                                <div class="modal-body text-md">
                                                                    <from id="form_i<?= md5($d_praktik['id_praktik']); ?>">
                                                                        No. ID Praktikan (NIM/NPM/NIP) : <span style="color:red">*</span><br>
                                                                        <input type="text" id="no_id" name="no_id" class="form-control" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_i_no_id"></div><br>
                                                                        Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                                                        <input type="text" id="nama" name="nama" class="form-control" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_i_nama"></div><br>
                                                                        Tanggal Lahir : <span style="color:red">*</span><br>
                                                                        <input type="date" id="tgl" name="tgl" class="form-control" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_i_tgl"></div><br>
                                                                        Alamat : <span style="color:red">*</span><br>
                                                                        <textarea id="alamat" name="alamat" id="" class="form-control" rows="2"></textarea>
                                                                        <div class="text-danger b i text-xs blink" id="err_i_alamat"></div><br>
                                                                        No Telepon : <span style="color:red">*</span><br>
                                                                        <input type="number" id="telpon" name="telpon" class="form-control" min="1" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_i_telpon"></div><br>
                                                                        No WhatsApp :<br>
                                                                        <input type="number" id="wa" name="wa" class="form-control" min="1">
                                                                        <div class="text-danger b i text-xs blink" id="err_i_wa"></div><br>
                                                                        E-Mail : <br>
                                                                        <input type="email" id="email" name="email" class="form-control">
                                                                        <div class="text-danger b i text-xs blink" id="err_i_email"></div>
                                                                    </from>
                                                                </div>
                                                                <div class="modal-footer text-md">
                                                                    <a class="btn btn-danger btn-sm" data-dismiss="modal" aria-label="Close">
                                                                        Kembali
                                                                    </a>
                                                                    &nbsp;
                                                                    <a class="tambah btn btn-success btn-sm" id="<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>">
                                                                        Tambah
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!-- inisiasi tabel data praktikan -->
                                        <div id="<?= md5("data" . $d_praktik['id_praktik']); ?>"></div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#<?= md5("data" . $d_praktik['id_praktik']); ?>').load("_admin/view/v_praktikanData.php?idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>");
                                            });

                                            $(".tambah_init").click(function() {
                                                $('#err_i_no_id').empty();
                                                $('#err_i_nama').empty();
                                                $('#err_i_tgl').empty();
                                                $('#err_i_alamat').empty();
                                                $('#err_i_telpon').empty();
                                                $('#err_i_wa').empty();
                                                $('#err_i_email').empty();
                                                $('#err_t_alamat_mess').empty();
                                                $('#err_t_fasilitas_mess').empty();

                                                $("#data_tambah_mess").fadeIn(1);
                                                $("#data_ubah_mess").fadeOut(1);

                                                $('#mi<?= md5($d_praktik['id_praktik']); ?>').focus();
                                            });

                                            $(".tambah_tutup").click(function() {
                                                $("#data_tambah_mess").fadeOut(1);
                                            });

                                            $(document).on('click', '.tambah', function() {
                                                var data = $('#form_tambah_mess').serialize();

                                                var t_nama_mess = $('#t_nama_mess').val();
                                                var t_nama_pemilik_mess = $('#t_nama_pemilik_mess').val();
                                                var t_telp_pemilik_mess = $('#t_telp_pemilik_mess').val();
                                                var t_kepemilikan_mess = $('#t_kepemilikan_mess').val();
                                                var t_tarif_tanpa_makan_mess = $('#t_tarif_tanpa_makan_mess').val();
                                                var t_tarif_dengan_makan_mess = $('#t_tarif_dengan_makan_mess').val();
                                                var t_kapsitas_total_mess = $('#t_kapsitas_total_mess').val();
                                                var t_alamat_mess = $('#t_alamat_mess').val();
                                                var t_fasilitas_mess = $('#t_fasilitas_mess').val();

                                                //cek data from tambah bila tidak diiisi
                                                if (
                                                    t_nama_mess == "" ||
                                                    t_nama_pemilik_mess == "" ||
                                                    t_telp_pemilik_mess == "" ||
                                                    t_kepemilikan_mess == "" ||
                                                    t_tarif_tanpa_makan_mess == "" ||
                                                    t_tarif_dengan_makan_mess == "" ||
                                                    t_kapsitas_total_mess == "" ||
                                                    t_alamat_mess == "" ||
                                                    t_fasilitas_mess == ""
                                                ) {
                                                    if (t_nama_mess == "") {
                                                        document.getElementById("err_t_nama_mess").innerHTML = "Nama Mess Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_nama_mess").innerHTML = "";
                                                    }

                                                    if (t_nama_pemilik_mess == "") {
                                                        document.getElementById("err_t_nama_pemilik_mess").innerHTML = "Nama Pemilik Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_nama_pemilik_mess").innerHTML = "";
                                                    }

                                                    if (t_telp_pemilik_mess == "") {
                                                        document.getElementById("err_t_telp_pemilik_mess").innerHTML = "No. Telp Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_telp_pemilik_mess").innerHTML = "";
                                                    }

                                                    if (t_kepemilikan_mess == "") {
                                                        document.getElementById("err_t_kepemilikan_mess").innerHTML = "Kepemilikan Harus Dipilih";
                                                    } else {
                                                        document.getElementById("err_t_kepemilikan_mess").innerHTML = "";
                                                    }

                                                    if (t_tarif_tanpa_makan_mess == "") {
                                                        document.getElementById("err_t_tarif_tanpa_makan_mess").innerHTML = "Tarif Tanpa Makan harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_tarif_tanpa_makan_mess").innerHTML = "";
                                                    }

                                                    if (t_tarif_dengan_makan_mess == "") {
                                                        document.getElementById("err_t_tarif_dengan_makan_mess").innerHTML = "Tarif Dengan Makan Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_tarif_dengan_makan_mess").innerHTML = "";
                                                    }

                                                    if (t_kapsitas_total_mess == "") {
                                                        document.getElementById("err_t_kapsitas_total_mess").innerHTML = "Kapasitas Total Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_kapsitas_total_mess").innerHTML = "";
                                                    }

                                                    if (t_alamat_mess == "") {
                                                        document.getElementById("err_t_alamat_mess").innerHTML = "Alamat Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_alamat_mess").innerHTML = "";
                                                    }

                                                    if (t_fasilitas_mess == "") {
                                                        document.getElementById("err_t_fasilitas_mess").innerHTML = "Fasiltias Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_fasilitas_mess").innerHTML = "";
                                                    }
                                                }

                                                if (
                                                    t_nama_mess != "" &&
                                                    t_nama_pemilik_mess != "" &&
                                                    t_telp_pemilik_mess != "" &&
                                                    t_kepemilikan_mess != "" &&
                                                    t_tarif_tanpa_makan_mess != "" &&
                                                    t_tarif_dengan_makan_mess != "" &&
                                                    t_kapsitas_total_mess != "" &&
                                                    t_alamat_mess != "" &&
                                                    t_fasilitas_mess != ""
                                                ) {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "_admin/exc/x_v_mess_s.php",
                                                        data: data,
                                                        success: function() {
                                                            const SwalButton = Swal.mixin({
                                                                customClass: {
                                                                    confirmButton: 'btn btn-success',
                                                                    cancelButton: 'btn btn-danger'
                                                                },
                                                                buttonsStyling: false
                                                            })
                                                            SwalButton.fire({
                                                                allowOutsideClick: false,
                                                                // isDismissed: false,
                                                                icon: 'success',
                                                                title: '<span class"text-xs"><b>Data Mess</b><br>Berhasil Tersimpan',
                                                                showConfirmButton: true,
                                                                timer: 5000123,
                                                                timerProgressBar: true,
                                                                didOpen: (toast) => {
                                                                    toast.addEventListener('mouseenter', SwalButton.stopTimer)
                                                                    toast.addEventListener('mouseleave', SwalButton.resumeTimer)
                                                                }
                                                            }).then((result) => {
                                                                $('#data_mess').load('_admin/view/v_messData.php');
                                                                $("#data_tambah_mess").fadeOut(1);
                                                            });
                                                        },
                                                        error: function(response) {
                                                            console.log(response.responseText);
                                                        }
                                                    });
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-gray-800">
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Pendaftaran Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
