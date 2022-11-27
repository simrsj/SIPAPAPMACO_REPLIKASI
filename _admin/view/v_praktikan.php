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
                                                    <a title="tambah praktikan" class='btn btn-success btn-sm tambah_init<?= md5($d_praktik['id_praktik']); ?>' href='#' data-toggle="modal" data-target="#mi<?= md5($d_praktik['id_praktik']); ?>">
                                                        <i class="fas fa-plus"></i> Tambah Data
                                                    </a>

                                                    <!-- modal tambah praktikan  -->
                                                    <div class="modal fade text-center" id="mi<?= md5($d_praktik['id_praktik']); ?>" data-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header h5">
                                                                    Tambah Praktikan
                                                                </div>
                                                                <div class="modal-body text-md">
                                                                    <form class="form-data b" method="post" id="form_t<?= md5($d_praktik['id_praktik']); ?>">
                                                                        No. ID Praktikan (NIM/NPM/NIP) : <span style="color:red">*</span><br>
                                                                        <input type="text" id="t_no_id" name="t_no_id" class="form-control" placeholder="Isikan No ID" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_no_id"></div><br>
                                                                        Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                                                        <input type="text" id="t_nama" name="t_nama" class="form-control" placeholder="Inputkan Nama Siswa/Mahasiswa" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_nama"></div><br>
                                                                        Tanggal Lahir : <span style="color:red">*</span><br>
                                                                        <input type="date" id="t_tgl" name="t_tgl" class="form-control" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_tgl"></div><br>
                                                                        Alamat : <span style="color:red">*</span><br>
                                                                        <textarea id="t_alamat" name="t_alamat" class="form-control" rows="2" placeholder="Inputkan Alamat"></textarea>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_alamat"></div><br>
                                                                        No Telepon : <span style="color:red">*</span><br>
                                                                        <input type="number" id="t_telpon" name="t_telpon" class="form-control" min="1" placeholder="Inputkan No Telpon" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_telpon"></div><br>
                                                                        No WhatsApp :<br>
                                                                        <input type="number" id="t_wa" name="t_wa" class="form-control" min="1" placeholder="Inputkan WhatsApp">
                                                                        <div class="text-danger b i text-xs blink" id="err_t_wa"></div><br>
                                                                        E-Mail : <br>
                                                                        <input type="email" id="t_email" name="t_email" class="form-control" placeholder="Inputkan E-Mail">
                                                                        <div class="text-danger b i text-xs blink" id="err_t_email"></div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer text-md">
                                                                    <a class="btn btn-danger btn-sm tambah_tutup<?= md5($d_praktik['id_praktik']); ?>" data-dismiss="modal">
                                                                        Kembali
                                                                    </a>
                                                                    &nbsp;
                                                                    <a class="tambah btn btn-success btn-sm tambah<?= md5($d_praktik['id_praktik']); ?>" id="<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>">
                                                                        Simpan
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
                                                $('#<?= md5("data" . $d_praktik['id_praktik']); ?>').load("_admin/view/v_praktikanData.php?idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>&idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>");
                                            });

                                            // inisiasi klik modal tambah
                                            $(".tambah_init<?= md5($d_praktik['id_praktik']); ?>").click(function() {
                                                // console.log("tambah_init<?= md5($d_praktik['id_praktik']); ?>");
                                                $('#err_t_no_id').empty();
                                                $('#err_t_nama').empty();
                                                $('#err_t_tgl').empty();
                                                $('#err_t_alamat').empty();
                                                $('#err_t_telpon').empty();
                                            });

                                            // inisiasi klik modal tambah  tutup
                                            $(".tambah_tutup<?= md5($d_praktik['id_praktik']); ?>").click(function() {
                                                // console.log("tambah_tutup<?= md5($d_praktik['id_praktik']); ?>");
                                                $("#form_t<?= md5($d_praktik['id_praktik']); ?>").trigger("reset");
                                            });

                                            // inisiasi klik modal tambah simpan
                                            $(document).on('click', '.tambah<?= md5($d_praktik['id_praktik']); ?>', function() {
                                                // console.log("tambah<?= md5($d_praktik['id_praktik']); ?>");
                                                var data_t = $("#form_t<?= md5($d_praktik['id_praktik']); ?>").serializeArray();
                                                data_t.push({
                                                    name: "idp",
                                                    value: $(this).attr('id')
                                                });

                                                var t_no_id = $('#t_no_id').val();
                                                var t_nama = $('#t_nama').val();
                                                var t_tgl = $('#t_tgl').val();
                                                var t_alamat = $('#t_alamat').val();
                                                var t_telpon = $('#t_telpon').val();

                                                //cek data from modal tambah bila tidak diiisi
                                                if (
                                                    t_no_id == "" ||
                                                    t_nama == "" ||
                                                    t_tgl == "" ||
                                                    t_alamat == "" ||
                                                    t_telpon == ""
                                                ) {
                                                    if (t_no_id == "") {
                                                        document.getElementById("err_t_no_id").innerHTML = "No ID Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_no_id").innerHTML = "";
                                                    }

                                                    if (t_nama == "") {
                                                        document.getElementById("err_t_nama").innerHTML = "Nama Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_nama").innerHTML = "";
                                                    }

                                                    if (t_tgl == "") {
                                                        document.getElementById("err_t_tgl").innerHTML = "Tanggal Lahir Harus Dipilih";
                                                    } else {
                                                        document.getElementById("err_t_tgl").innerHTML = "";
                                                    }

                                                    if (t_alamat == "") {
                                                        document.getElementById("err_t_alamat").innerHTML = "Alamat Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_alamat").innerHTML = "";
                                                    }

                                                    if (t_telpon == "") {
                                                        document.getElementById("err_t_telpon").innerHTML = "Telpon Harus Diisi";
                                                    } else {
                                                        document.getElementById("err_t_telpon").innerHTML = "";
                                                    }
                                                }

                                                //simpan data tambah bila sudah sesuai
                                                if (
                                                    t_no_id != "" &&
                                                    t_nama != "" &&
                                                    t_tgl != "" &&
                                                    t_alamat != "" &&
                                                    t_telpon != ""
                                                ) {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "_admin/exc/x_v_praktikan_s.php",
                                                        data: data_t,
                                                        success: function() {
                                                            $('#<?= md5("data" . $d_praktik['id_praktik']); ?>').load("_admin/view/v_praktikanData.php?idp=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>");

                                                            $('#err_t_no_id').empty();
                                                            $('#err_t_nama').empty();
                                                            $('#err_t_tgl').empty();
                                                            $('#err_t_alamat').empty();
                                                            $('#err_t_telpon').empty();
                                                            $('#err_t_wa').empty();
                                                            $('#err_t_email').empty();
                                                            $("#form_t<?= md5($d_praktik['id_praktik']); ?>").trigger("reset");
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
                                                                title: '<span class"text-centere"><b>Data Praktikan</b><br>Berhasil Tersimpan',
                                                            }).then(
                                                                function() {}
                                                            );
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
