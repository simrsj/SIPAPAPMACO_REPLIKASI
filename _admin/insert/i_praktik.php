<?php
if (isset($_POST['simpan_praktik'])) {
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Praktikan</h1>
            </div>
        </div>
        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_praktik">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Data Praktikan -->
                    <div class="row">
                        <div class="col-lg-12">
                            <b>Data Praktikan</b>
                        </div>
                    </div>
                    <!-- Nama Institusi dan Praktikan -->
                    <div class="row">
                        <div class="col-lg-5 ">
                            Nama Institusi : <span style="color:red">*</span><br>
                            <?php
                            $sql_institusi = "SELECT * FROM tb_institusi
                            ORDER BY tb_institusi.nama_institusi ASC";

                            $q_institusi = $conn->query($sql_institusi);
                            $r_institusi = $q_institusi->rowCount();
                            if ($r_institusi > 0) {
                                $no = 1;
                            ?>
                                <select class='js-example-placeholder-single form-control' name='id_institusi' id="institusi" required>
                                    <option value="">-- <i>Pilih</i>--</option>
                                    <?php
                                    while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value='<?php echo $d_institusi['id_institusi']; ?>'>
                                            <?php echo $d_institusi['nama_institusi'];
                                            if ($d_institusi['akronim_institusi'] != '') {
                                                echo " (" . $d_institusi['akronim_institusi'] . ")";
                                            }
                                            ?>
                                        </option>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </select><br>
                                <del><i style='font-size:12px;'>Daftar Institusi yang MoU-nya masih berlaku</i></del>
                                <div class="text-danger font-italic text-xs" id="err_institusi"></div>
                            <?php
                            } else {
                            ?>
                                <b><i>Data MoU Tidak Ada</i></b>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-5">
                            <div class="font-weight-bold text-md" id="s_praktik_1">
                            </div>
                            <div id="s_praktik_2">
                                Gelombang/Kelompok : <span style="color:red">*</span><br>
                                <input type="text" class="form-control" name="nama_praktik" placeholder="Isi Gelombang/Kelompok" id="praktik" required>
                            </div>
                            <div class="text-danger font-italic text-xs" id="err_praktik"></div>

                        </div>

                        <div class="col-lg-2">
                            Jumlah Praktikan : <span style="color:red">*</span><br>
                            <input type="number" class="form-control" name="jumlah_praktik" min="1" id="jumlah" required>
                            <i style="font-size:12px;">Isian hanya berupa angka</i><br>
                            <span class="text-danger font-italic text-xs" id="err_jumlah"></span>
                        </div>
                    </div>
                    <br>

                    <!-- Jurusan, Jenjang, Spesifikasi dan Akreditasi -->
                    <div class="row">
                        <div class="col-lg-3">
                            Pilih Jurusan : <span style="color:red">*</span><br>
                            <?php
                            $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                            $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                            $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                            if ($r_jurusan_pdd > 0) {
                            ?>
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_jurusan_pdd' id="jurusan" required>
                                    <option value="">-- <i>Pilih</i>--</option>
                                    <?php
                                    while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                            <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <span class="text-danger font-italic text-xs" id="err_jurusan"></span>
                            <?php
                            } else {
                            ?>
                                <b><i>Data Jurusan Tidak Ada</i></b>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-3">
                            Pilih Jenjang : <span style="color:red">*</span><br>
                            <?php
                            $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";

                            $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                            $r_jenjang_pdd = $q_jenjang_pdd->rowCount();

                            if ($r_jenjang_pdd > 0) {
                            ?>
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_jenjang_pdd' id="jenjang" required>
                                    <option value="">-- <i>Pilih</i>--</option>
                                    <?php
                                    while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option class='text-wrap' value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                            <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <span class="text-danger font-italic text-xs" id="err_jenjang"></span>
                            <?php
                            } else {
                            ?>
                                <b><i>Data Jurusan Tidak Ada</i></b>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-3">
                            Pilih Spesifikasi : <br>
                            <?php
                            $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";

                            $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                            $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();

                            if ($r_spesifikasi_pdd > 0) {
                            ?>
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_spesifikasi_pdd' id="spesifikasi">
                                    <option value="">-- <i>Pilih</i>--</option>
                                    <?php
                                    while ($d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                            <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            <?php
                            } else {
                            ?>
                                <b><i>Data Spesifikasi Tidak Ada</i></b>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-3">
                            Akreditasi Institusi : <span style="color:red">*</span><br>
                            <?php
                            $sql_akreditasi = "SELECT * FROM tb_akreditasi";

                            $q_akreditasi = $conn->query($sql_akreditasi);
                            $r_akreditasi = $q_akreditasi->rowCount();

                            if ($r_akreditasi > 0) {
                            ?>
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_akreditasi' id="akreditasi" required>
                                    <option value="">-- <i>Pilih</i>--</option>
                                    <?php
                                    while ($d_akreditasi = $q_akreditasi->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option class='text-wrap' value='<?php echo $d_akreditasi['id_akreditasi']; ?>'>
                                            <?php echo $d_akreditasi['nama_akreditasi']; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <span class="text-danger font-italic text-xs" id="err_akreditasi"></span>
                            <?php
                            } else {
                            ?>
                                <b><i>Data Akreditasi Tidak Ada</i></b>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <br><br>
                    <!-- Tanggal Mulai, Tanggal Selesai, Unggah Surat dan Data Praktikan -->
                    <div class="row">
                        <div class="col-lg-2">
                            Tanggal Mulai : <span style="color:red">*</span><br>
                            <input type="date" class="form-control" name="tgl_mulai_praktik" id="tgl_mulai" required>
                            <span class="text-danger font-italic text-xs" id="err_tgl_mulai"></span>
                        </div>
                        <div class="col-lg-2">
                            Tanggal Akhir : <span style="color:red">*</span><br>
                            <input type="date" class="form-control" name="tgl_selesai_praktik" id="tgl_selesai" required>
                            <span class="text-danger font-italic text-xs" id="err_tgl_selesai"></span>
                        </div>
                        <div class="col-lg-4">
                            Unggah Surat : <br>
                            <input type="file" name="surat_praktik" id="file_surat" accept="application/pdf" required>
                            <br><i style='font-size:12px;'>Data unggah harus .pdf dan maksimal ukuran file 1 MB</i>
                            <br><span class="text-danger font-italic text-xs" id="err_file_surat"></span>
                        </div>
                        <div class="col-lg-4">
                            Unggah Data Praktikan :
                            <i style='font-size:12px;'><a href="./_file/format_data_praktikan.xlsx">Download Format</a></i><br>
                            <input type="file" name="data_praktik" id="file_data_praktikan" accept=".xlsx" required>
                            <br><i style='font-size:12px;'>Data unggah harus .xlsx dan maksimal ukuran file 1 MB</i>
                            <br><span class="text-danger font-italic text-xs" id="err_file_data_praktikan"></span>
                        </div>
                    </div>
                    <hr>
                    <!-- Penanggung Jawab/Pembimbing/Mentor -->
                    <div class=" row">
                        <div class="col-lg-12">
                            <b>Penanggung Jawab/Pembimbing/Mentor</b>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        $q_user = $conn->query("SELECT * FROM tb_user WHERE id_user=" . $_SESSION['id_user']);
                        $d_user = $q_user->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="col-lg-4">
                            Nama : <span style="color:red">*</span><br>
                            <input type="text" class="form-control" name="nama_pembimbing_praktik" id="nama_pembimbing" placeholder="Isi Nama Pembimbing" value="<?php echo $d_user['nama_user']; ?>" required><span class="text-danger font-italic text-xs" id="err_nama_pembimbing"></span>
                        </div>
                        <div class="col-lg-4">
                            Email :<br>
                            <input type="text" class="form-control" name="email_mentor_praktik" id="email_pembimbing" placeholder="Isi Email Pembimbing" value="<?php echo $d_user['email_user']; ?>">
                        </div>
                        <div class="col-lg-4">
                            Telpon : <span style="color:red">*</span><br>
                            <input type="number" class="form-control" name="telp_mentor_praktik" id="telp_pembimbing" placeholder="Isi Telpon Pembimbing" min="1" value="<?php echo $d_user['no_telp_user']; ?>" required>
                            <i style='font-size:12px;'>Isian hanya berupa angka</i>
                            <br><span class="text-danger font-italic text-xs" id="err_telp_pembimbing"></span>
                        </div>
                    </div>
                    <i class="font-weight-bold"><span style="color:red">*</span> : Wajib diisi</i>
                    <hr>
                    <!-- Tombol Lanjut ke Daftar Harga-->
                    <div class="text-center">
                        <button type="button" href="#harga" name="simpan_praktik" id="simpan_praktik" class="btn btn-outline-primary" onclick="data_harga()">
                            <i class="fas fa-chevron-circle-down"></i>
                            Lanjut Ke Daftar Harga
                            <i class="fas fa-chevron-circle-down"></i>
                            <input id="lanjut" value="lanjut_ked" hidden>
                        </button>
                    </div>
                </div>
            </div>

            <div data-spy="scroll" data-target="#navbar-harga" data-offset="0">
                <div id="harga">
                    <div id="data_pilih_harga">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function data_harga() {
            // alert('Selesai Seleksi Harga');
            // $(document).ready(function() {

            //Mengirimkan Token Keamanan
            $.ajaxSetup({
                headers: {
                    'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // alert('Awal Simpan Praktikan');
            // $("#simpan_praktik").click(function() {
            // alert('Proses Seleksi Inputan Praktikan');
            var data = $('#form_praktik').serialize();
            var institusi = document.getElementById("institusi").value;
            var praktik = document.getElementById("praktik").value;
            var jurusan = document.getElementById("jurusan").value;
            var jenjang = document.getElementById("jenjang").value;
            var spesifikasi = document.getElementById("spesifikasi").value;
            var akreditasi = document.getElementById("akreditasi").value;
            var jumlah = document.getElementById("jumlah").value;
            var tgl_mulai = document.getElementById("tgl_mulai").value;
            var tgl_selesai = document.getElementById("tgl_selesai").value;
            var file_surat = document.getElementById("file_surat").value;
            var file_data_praktikan = document.getElementById("file_data_praktikan").value;
            var nama_pembimbing = document.getElementById("nama_pembimbing").value;
            var email_pembimbing = document.getElementById("email_pembimbing").value;
            var telp_pembimbing = document.getElementById("telp_pembimbing").value;

            //Notif Bila tidak diisi
            var notif_tidak_diisi = "";
            if (notif_tidak_diisi == "") {
                //notif institusi 
                if (institusi == "") {
                    document.getElementById("err_institusi").innerHTML = "Institusi Harus Dipilih";
                } else {
                    document.getElementById("err_institusi").innerHTML = "";
                }

                //notif praktik 
                if (praktik == "") {
                    document.getElementById("err_praktik").innerHTML = "Nama Praktik Harus Diisi";
                } else {
                    document.getElementById("err_praktik").innerHTML = "";
                }

                //notif jurusan 
                if (jurusan == "") {
                    document.getElementById("err_jurusan").innerHTML = "Jurusan Harus Diisi";
                } else {
                    document.getElementById("err_jurusan").innerHTML = "";
                }

                //notif jenjang 
                if (jenjang == "") {
                    document.getElementById("err_jenjang").innerHTML = "Jenjang Harus Diisi";
                } else {
                    document.getElementById("err_jenjang").innerHTML = "";
                }

                //notif akreditasi 
                if (akreditasi == "") {
                    document.getElementById("err_akreditasi").innerHTML = "Akreditasi Harus Diisi";
                } else {
                    document.getElementById("err_akreditasi").innerHTML = "";
                }

                //notif jumlah 
                if (jumlah == "") {
                    document.getElementById("err_jumlah").innerHTML = "Jumlah Praktik Harus Diisi";
                } else {
                    document.getElementById("err_jumlah").innerHTML = "";
                }

                //notif tgl_mulai 
                if (tgl_mulai == "") {
                    document.getElementById("err_tgl_mulai").innerHTML = "Tanggal Mulai Praktik Harus Diisi";
                } else {
                    document.getElementById("err_tgl_mulai").innerHTML = "";
                }

                //notif tgl_selesai 
                if (tgl_selesai == "") {
                    document.getElementById("err_tgl_selesai").innerHTML = "Tanggal Selesai Praktik Harus Diisi";
                } else {
                    document.getElementById("err_tgl_selesai").innerHTML = "";
                }

                //notif file_surat
                // if (file_surat == "") {
                //     document.getElementById("err_file_surat").innerHTML = "File Surat Harus Diisi";
                // } else {
                //     document.getElementById("err_file_surat").innerHTML = "";
                // }

                //notif file_data_praktikan
                // if (file_data_praktikan == "") {
                //     document.getElementById("err_file_data_praktikan").innerHTML = "File Data Praktikan Harus Diisi";
                // } else {
                //     document.getElementById("err_file_data_praktikan").innerHTML = "";
                // }

                //notif nama_pembimbing
                if (nama_pembimbing == "") {
                    document.getElementById("err_nama_pembimbing").innerHTML = "Nama Pembimbing Harus Diisi";
                } else {
                    document.getElementById("err_nama_pembimbing").innerHTML = "";
                }

                //notif telp_pembimbing
                if (telp_pembimbing == "") {
                    document.getElementById("err_telp_pembimbing").innerHTML = "Telpon Pembimbing Harus Diisi";
                } else {
                    document.getElementById("err_telp_pembimbing").innerHTML = "";
                }
            }

            //Simpan Daftar Praktik
            if (
                institusi != "" &&
                praktik != "" &&
                jurusan != "" &&
                akreditasi != "" &&
                jumlah != "" &&
                tgl_mulai != "" &&
                tgl_selesai != "" &&
                // file_surat != "" &&
                // file_data_praktikan != "" &&
                nama_pembimbing != "" &&
                telp_pembimbing != ""
            ) {
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/i_praktik_exc.php",
                    data: data,
                    success: function() {
                        document.getElementById("form_praktik");
                        alert('Lanjutkan ke Data Harga Praktik');
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });

                if ($('#lanjut').val() == 'lanjut_ked') {
                    $('#data_pilih_harga').append(
                        "<div class='card shadow mb-4'><div class='card-body'><p>DATA HARGA KEDOKTERAN</p></div></div>"
                    ).focus();
                } else if ($('#lanjut').val() == 'lanjut_kep') {
                    $('#data_pilih_harga').append(
                        "<div class='card shadow mb-4'><div class='card-body'>DATA HARGA KEPERAWATAN</div></div>"
                    ).focus();
                } else if ($('#lanjut').val() == 'lanjut_nkn') {
                    $('#data_pilih_harga').append(
                        "<div class='card shadow mb-4'><div class='card-body'>DATA HARGA NAKES LAINNYA DAN NON-NAKES</div></div>"
                    ).focus();
                }
                $("#simpan_praktik").fadeOut('slow');

                //Ubah Tampilan Bila Disimpan
                document.getElementById("institusi").disabled = true;
                document.getElementById("praktik").disabled = true;
                document.getElementById("jurusan").disabled = true;
                document.getElementById("jenjang").disabled = true;
                document.getElementById("spesifikasi").disabled = true;
                document.getElementById("akreditasi").disabled = true;
                document.getElementById("jumlah").disabled = true;
                document.getElementById("tgl_mulai").disabled = true;
                document.getElementById("tgl_selesai").disabled = true;
                document.getElementById("file_surat").disabled = true;
                document.getElementById("file_data_praktikan").disabled = true;
                document.getElementById("nama_pembimbing").disabled = true;
                document.getElementById("email_pembimbing").disabled = true;
                document.getElementById("telp_pembimbing").disabled = true;
            }

            // });
            // });
        }
    </script>
<?php
}
?>