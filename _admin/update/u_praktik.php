<?php
if (isset($_GET['ptk']) && isset($_GET['u']) && $d_prvl['u_praktik'] == "Y") {
    echo "<pre>";
    echo print_r($_SESSION);
    echo "</pre>";
    echo "<pre>";
    echo print_r($_GET);
    echo "</pre>";
    echo "<pre>";
    echo print_r($_POST);
    echo "</pre>";
    $idp = decryptString($_GET['idp'], $customkey);
    $sql_praktik = "SELECT * FROM tb_praktik ";
    $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
    $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
    $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
    $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
    $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
    $sql_praktik .= " WHERE status_praktik = 'Y' ";
    $sql_praktik .= " AND tb_praktik.id_praktik = " . $idp;
    $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
    // echo $sql_praktik;
    try {
        $q_praktik = $conn->query($sql_praktik);
        $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PRAKTIK-');";
        echo "document.location.href='?error404';</script>";
    }
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1 class="h3 mb-2 text-gray-800" id="title_praktik">Ubah Pengajuan Praktik</h1>
            </div>
        </div>
        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_praktik">
            <!-- Data Pengajuan Praktik  -->
            <div id="data_praktik_input">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <!-- Data Praktikan -->
                        <div class="row">
                            <div class="col-md-12 text-lg b text-center text-gray-100 badge bg-primary mb-3">DATA PRAKTIK</div>
                        </div>
                        <!-- Nama Institusi, Nama Kelompok, dan Jumlah Praktik -->
                        <div class="row">
                            <input name="idp" value="<?= $_GET['idp']; ?>" hidden>
                            <input name="idu" value="<?= $_GET['idu']; ?>" hidden>
                            <div class="col-md">
                                <?php if ($_SESSION['level_user'] == 2) {
                                    $sql_institusi = "SELECT * FROM tb_user";
                                    $sql_institusi .= " JOIN tb_institusi ON tb_user.id_institusi = tb_institusi.id_institusi";
                                    $sql_institusi .= " WHERE tb_institusi.id_institusi = " . $_SESSION['id_institusi'];
                                    // echo $sql_institusi;
                                    $q_institusi = $conn->query($sql_institusi);
                                    $d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC);
                                ?>
                                    Nama Institusi :
                                    <div class="b text-uppercase">
                                        <?php
                                        echo $d_institusi['nama_institusi'];
                                        if ($d_institusi['akronim_institusi'] != "") echo " (" . $d_institusi['akronim_institusi'] . ")";
                                        ?>
                                        <input name="institusi" id="institusi" value="<?= $_SESSION['id_institusi']; ?>" hidden>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    Nama Institusi : <span style="color:red">*</span><br>
                                    <?php
                                    $sql_institusi = "SELECT * FROM tb_institusi";
                                    $sql_institusi .= " ORDER BY tb_institusi.nama_institusi ASC";

                                    $q_institusi = $conn->query($sql_institusi);
                                    $r_institusi = $q_institusi->rowCount();
                                    if ($r_institusi > 0) {
                                        $no = 1;
                                    ?>
                                        <select class='select2 form-control' name='institusi' id="institusi" required>
                                            <option value="">-- <i>Pilih</i>--</option>
                                            <?php
                                            while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value='<?= $d_institusi['id_institusi']; ?>'>
                                                    <?= $d_institusi['nama_institusi'];
                                                    if ($d_institusi['akronim_institusi'] != '') {
                                                        echo " (" . $d_institusi['akronim_institusi'] . ")";
                                                    }
                                                    ?>
                                                </option>
                                            <?php
                                                $no++;
                                            }
                                            ?>
                                        </select>
                                        <script>
                                            $('#institusi').val(<?= $d_praktik['id_institusi'] ?>).trigger("change");
                                        </script>
                                        <div class="text-danger b  i text-xs blink" id="err_institusi"></div>
                                <?php
                                    }
                                } ?>
                            </div>
                            <div class="col-md">
                                Nama Gelombang/Kelompok : <span style="color:red">*</span><br>
                                <input type="text" class="form-control form-control-xs" name="kelompok" id="kelompok" value="<?= $d_praktik['nama_praktik'] ?>" placeholder="Isi Gelombang/Kelompok" required>
                                <div class="text-danger b  i text-xs blink" id="err_kelompok"></div>
                            </div>
                            <div class="col-md-2">
                                Jumlah Praktik: <span style="color:red">*</span><br>
                                <input type="number" min="1" class="form-control form-control-xs" name="jumlah" id="jumlah" value="<?= $d_praktik['jumlah_praktik'] ?>" placeholder="Isi Jumlah Praktik" required>
                                <div class="text-danger b  i text-xs blink" id="err_jumlah"></div>
                            </div>
                        </div>
                        <br>

                        <!-- Jurusan, Jenjang, profesi dan Akreditasi -->
                        <div class="row">
                            <div class="col-md-4">
                                Jurusan : <span style="color:red">*</span><br>
                                <?php
                                $sql_jurusan_pdd = "SELECT * FROM  tb_jurusan_pdd ORDER BY nama_jurusan_pdd ASC";
                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                ?>

                                <select class='select2' name='jurusan' id="jurusan" required>
                                    <option value="">-- <i>Pilih</i>--</option>
                                    <?php while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <option value='<?= $d_jurusan_pdd['id_jurusan_pdd']; ?>'><?= $d_jurusan_pdd['nama_jurusan_pdd']; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="text-danger b i text-xs blink" id="err_jurusan"></div>
                            </div>
                            <div class="col-md-4">
                                Jenjang : <span style="color:red">*</span><br>
                                <div class="loader-small" id="jenjangLoader" style="display: none;"></div>
                                <div id="jenjangData" style="display: none;"></div>
                                <span id="jenjangKet" class="b i">Pilih Jurusan Terlebih Dahulu</span>
                                <div class="text-danger b i text-xs blink" id="err_jenjang"></div>
                            </div>
                            <div class="col-md-4">
                                Profesi : <span style="color:red">*</span><br>
                                <span id="profesiData" style="display: none;">
                                    <input type="hidden" id="profesi" name="profesi" value="0">
                                </span>
                                <span id="profesiKet" class="b i">
                                    Pilih Jenjang Terlebih Dahulu
                                </span>
                                <div class="text-danger b  i text-xs blink" id="err_profesi"></div>
                            </div>
                        </div>
                        <br>

                        <!-- Tanggal Mulai, Tanggal Selesai, No Surat Institusi Surat dan Tanggal Surat Institusi -->
                        <div class="row">
                            <div class="col-md-2">
                                Tanggal Mulai Praktik : <span style="color:red">*</span><br>
                                <input type="date" class="form-control form-control-xs" name="tgl_mulai_praktik" id="tgl_mulai" value="<?= $d_praktik['tgl_mulai_praktik'] ?>" required>
                                <span class="text-danger b  i text-xs blink" id="err_tgl_mulai"></span>
                            </div>
                            <div class="col-md-2">
                                Tanggal Selesai Praktik: <span style="color:red">*</span><br>
                                <input type="date" class="form-control form-control-xs" name="tgl_selesai_praktik" id="tgl_selesai" value="<?= $d_praktik['tgl_selesai_praktik'] ?>" required>
                                <span class="text-danger b  i text-xs blink" id="err_tgl_selesai"></span>
                            </div>
                            <div class="col-md">
                                No. Surat Institusi : <span style="color:red">*</span><br>
                                <input type="text" class="form-control form-control-xs" name="no_surat" placeholder="Isi No Surat Institusi" id="no_surat" value="<?= $d_praktik['no_surat_praktik'] ?>" required>
                                <span class="text-danger b  i text-xs blink" id="err_no_surat"></span>
                            </div>
                            <div class="col-md-2">
                                Tanggal Surat Institusi : <span style="color:red">*</span><br>
                                <input type="date" class="form-control form-control-xs" name="tgl_surat" id="tgl_surat" value="<?= $d_praktik['tgl_surat_praktik'] ?>" required>
                                <span class="text-danger b  i text-xs blink" id="err_tgl_surat"></span>
                            </div>
                        </div>
                        <br>
                        <!-- File Surat Institusi, File Akreditasi Insitutsi, File Akreditasi Jurusan -->
                        <div class="row">
                            <div class="col-md">
                                File Surat Institusi :<span style="color:red">*</span><a href="<?= $d_praktik['surat_praktik'] ?>" class="text-xs i" download>File Sebelumnya</a><br>
                                <div class="custom-file">
                                    <label class="custom-file-label text-xs" for="customFile" id="labelfilesuratinstitusi">Pilih File</label>
                                    <input type="file" class="custom-file-input mb-1" id="file_surat" name="file_surat" accept="application/pdf" required>
                                    <span class='i text-xs'>Data unggah harus .pdf dan maksimal ukuran file 3 Mb</span><br>
                                    <div class="text-xs font-italic text-danger blink" id="err_file_surat"></div><br>
                                    <script>
                                        $('#file_surat').on('change', function() {
                                            var fileSuratInstitusi = $(this).val();
                                            fileSuratInstitusi = fileSuratInstitusi.replace(/^.*[\\\/]/, '');
                                            if (fileSuratInstitusi == "") fileSuratInstitusi = "Pilih File";
                                            $('#labelfilesuratinstitusi').html(fileSuratInstitusi);
                                        })
                                    </script>
                                </div>
                            </div>
                            <div class="col-md">
                                File Akreditasi Institusi :<span style="color:red">*</span><a href="<?= $d_praktik['akred_institusi_praktik'] ?>" class="text-xs i" download>File Sebelumnya</a><br>
                                <div class="custom-file">
                                    <label class="custom-file-label text-xs" for="customFile" id="labelfileakredinstitusi">Pilih File</label>
                                    <input type="file" class="custom-file-input mb-1" id="file_akred_institusi" name="file_akred_institusi" accept="application/pdf" required>
                                    <span class='i text-xs'>Data unggah harus pdf, Maksimal 3 Mb</span><br>
                                    <div class="text-xs font-italic text-danger blink" id="err_file_akred_institusi"></div><br>
                                    <script>
                                        $('#file_akred_institusi').on('change', function() {
                                            var fileNameInstitusi = $(this).val();
                                            fileNameInstitusi = fileNameInstitusi.replace(/^.*[\\\/]/, '');
                                            if (fileNameInstitusi == "") fileNameInstitusi = "Pilih File";
                                            $('#labelfileakredinstitusi').html(fileNameInstitusi);
                                        })
                                    </script>
                                </div>
                            </div>
                            <div class="col-md">
                                File Akreditasi Jurusan :<span style="color:red">*</span><a href="<?= $d_praktik['akred_jurusan_praktik'] ?>" class="text-xs i" download>File Sebelumnya</a><br>
                                <div class="custom-file">
                                    <label class="custom-file-label text-xs" for="customFile" id="labelfileakredjururusan">Pilih File</label>
                                    <input type="file" class="custom-file-input mb-1" id="file_akred_jurusan" name="file_akred_jurusan" accept="application/pdf" required>
                                    <span class='i text-xs'>Data unggah harus pdf, Maksimal 3 Mb</span><br>
                                    <div class="text-xs font-italic text-danger blink" id="err_file_akred_jurusan"></div><br>
                                    <script>
                                        $('#file_akred_jurusan').on('change', function() {
                                            var fileNameAkredJur = $(this).val();
                                            fileNameAkredJur = fileNameAkredJur.replace(/^.*[\\\/]/, '');
                                            if (fileNameAkredJur == "") fileNameAkredJur = "Pilih File";
                                            $('#labelfileakredjururusan').html(fileNameAkredJur);
                                        })
                                    </script>
                                </div>
                            </div>
                        </div>

                        <!-- Koordinator -->
                        <div class=" row">
                            <div class="col-md-12 text-lg b text-center text-gray-100 badge bg-primary">KORDINATOR</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Nama : <span style="color:red">*</span><br>
                                <input type="text" class="form-control form-control-xs" name="nama_koordinator" id="nama_koordinator" value="<?= $d_praktik['nama_koordinator_praktik'] ?>" placeholder="Isi Nama Koordinator" value="<?= $d_user['nama_user']; ?>" required>
                                <span class="text-danger b  i text-xs blink" id="err_nama_koordinator"></span>
                            </div>
                            <div class="col-md-4">
                                Email :<br>
                                <input type="text" class="form-control form-control-xs" name="email_koordinator" id="email_koordinator" value="<?= $d_praktik['email_koordinator_praktik'] ?>" placeholder="Isi Email Koordinator" value="<?= $d_user['email_user']; ?>">
                            </div>
                            <div class="col-md-4">
                                Telpon : <span style="color:red">*</span><br>
                                <input type="number" class="form-control form-control-xs" name="telp_koordinator" id="telp_koordinator" value="<?= $d_praktik['telp_koordinator_praktik'] ?>" placeholder="Isi Telpon Koordinator" min="1" value="<?= $d_user['no_telp_user']; ?>" required>
                                <i style='font-size:12px;'>Isian hanya berupa angka</i>
                                <br><span class="text-danger b  i text-xs blink" id="err_telp_koordinator"></span>
                            </div>
                        </div>

                        <!-- Pakai Mess -->
                        <div class=" row">
                            <div class="col-md-12 text-lg b text-center text-gray-100 badge bg-primary">MESS</div>
                        </div>
                        <div id="data_pilih_mess">
                            <div class="text-center mb-3">
                                Pemakaian Mess/Pemondokan : <span class="text-danger">*</span><br>
                            </div>
                            <div class="row boxed-check-group boxed-check-xs boxed-check-primary justify-content-center">
                                <label class="boxed-check">
                                    <input class="boxed-check-input" type="radio" name="pilih_mess" id="pilih_mess1" value="Y">
                                    <div class="boxed-check-label">Ya</div>
                                </label>
                                &nbsp;
                                &nbsp;
                                <label class="boxed-check">
                                    <input class="boxed-check-input" type="radio" name="pilih_mess" id="pilih_mess2" value="T">
                                    <div class="boxed-check-label">Tidak</div>
                                </label>
                            </div>
                            <div class="text-danger b i text-xs blink" id="err_pilih_mess"></div>
                            <div class=" col-6 mx-auto animated--grow-in alasan" style="display: none;">
                                <div class="text-center">
                                    Alasan<span class="text-danger">*</span><br>
                                </div>
                                <textarea id="uraian_alasan" name="uraian_alasan" class="form-control"></textarea>
                                <div class="text-danger b i text-xs blink" id="err_uraian_alasan"></div>
                                Minimal 100 Karakter, <span id="count_text" style="display: none;">Karakter yang telah diinputkan <span id="count_alasan" class="b">0</span></span>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#pilih_mess1').on('click', function() {
                                        $(".alasan").css("display", "none");
                                        $('#simpan_praktik').attr('disabled', false);
                                    });
                                    $('#pilih_mess2').on('click', function() {
                                        $(".alasan").css("display", "block");
                                        $('#simpan_praktik').attr('disabled', true);
                                    });
                                    // ketika pengguna mengetik di dalam textarea
                                    $('#uraian_alasan').on('input', function() {

                                        $("#count_text").css("display", "block");
                                        // hitung jumlah karakter yang dimasukkan
                                        var count = $(this).val().length;

                                        // tampilkan jumlah karakter di dalam span
                                        $('#count_alasan').text(count);

                                        // jika jumlah karakter kurang dari 100
                                        if (count < 100) {
                                            // nonaktifkan tombol submit
                                            $('#simpan_praktik').attr('disabled', true);
                                            $("#count_alasan").addClass("text-danger");
                                        } else {
                                            // aktifkan tombol submit
                                            $('#simpan_praktik').attr('disabled', false);
                                            $("#count_alasan").removeClass("text-danger");
                                            $("#count_alasan").addClass("text-success");
                                        }
                                    });
                                });
                            </script>
                            <hr>
                            <div class="i text-left mb-3">
                                <span class="text-danger">*</span>: Wajib Diisi/Dipilih
                            </div>
                            <hr>
                        </div>

                        <!-- Tombol Simpan Praktik-->
                        <div id="simpan_praktik_tarif" class="nav btn justify-content-center">
                            <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                                <button type="button" name="ubah_praktik" id="ubah_praktik" class="btn btn-outline-primary">
                                    <i class="fas fa-check-circle"></i>
                                    Ubah Data Praktik
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script type="text/javascript">
        $('#jurusan').on('select2:select', function() {
            console.log("pilih jurusan");
            $('#jenjangData').load('_admin/insert/i_praktikDataJenjang.php?jur=' + $("#jurusan").val());
            $('#jenjangKet').fadeOut(0);
            $('#jenjangData').fadeIn(0);
            $('#profesiData').fadeOut(0);
            $('#profesiKet').fadeIn(0);
        });

        $("#ubah_praktik").click(function() {

            Swal.fire({
                title: 'Mohon Ditunggu',
                html: '<div class="loader mb-5 mt-5 text-center"></div>',
                allowOutsideClick: false,
                showConfirmButton: false,
                backdrop: true
            });
            var data_praktik = $('#form_praktik').serializeArray();
            var id = $("#id").val();
            var user = $("#user").val();
            var institusi = $("#institusi").val();
            var kelompok = $("#kelompok").val();
            var jumlah = $("#jumlah").val();
            var jurusan = $("#jurusan").val();
            var jenjang = $("#jenjang").val();
            var profesi = $("#profesi").val();
            var tgl_mulai = $("#tgl_mulai").val();
            var tgl_selesai = $("#tgl_selesai").val();
            var no_surat = $("#no_surat").val();
            var tgl_surat = $("#tgl_surat").val();
            var file_surat = $("#file_surat").val();
            var file_akred_institusi = $("#file_akred_institusi").val();
            var file_akred_jurusan = $("#file_akred_jurusan").val();
            var nama_koordinator = $("#nama_koordinator").val();
            var email_koordinator = $("#email_koordinator").val();
            var telp_koordinator = $("#telp_koordinator").val();
            var pilih_mess = $('input[name="pilih_mess"]:checked').val();
            // console.log(pilih_mess);
            //eksekusi bila file surat terisi
            if (file_surat != "" && file_surat != undefined) {

                //Cari ekstensi file surat yg diupload
                var typeSurat = document.querySelector('#file_surat').value;
                var getTypeSurat = typeSurat.split('.').pop();

                //cari ukuran file surat yg diupload
                var fileSurat = document.getElementById("file_surat").files;
                var getSizeSurat = document.getElementById("file_surat").files[0].size / 1024;
            }

            //eksekusi bila file akreditasi institusi terisi
            if (file_akred_institusi != "" && file_akred_institusi != undefined) {

                //Cari ekstensi file surat yg diupload
                var typeAkredInstitusi = document.querySelector('#file_akred_institusi').value;
                var getTypeAkredInstitusi = typeAkredInstitusi.split('.').pop();

                //cari ukuran file surat yg diupload
                var fileAkredInstitusi = document.getElementById("file_akred_institusi").files;
                var getSizeAkredInstitusi = document.getElementById("file_akred_institusi").files[0].size / 1024;
            }

            //eksekusi bila file akreditasi institusi terisi
            if (file_akred_jurusan != "" && file_akred_jurusan != undefined) {

                //Cari ekstensi file surat yg diupload
                var typeAkredJurusan = document.querySelector('#file_akred_jurusan').value;
                var getTypeAkredJurusan = typeAkredJurusan.split('.').pop();

                //cari ukuran file surat yg diupload
                var fileAkredJurusan = document.getElementById("file_akred_jurusan").files;
                var getSizeAkredJurusan = document.getElementById("file_akred_jurusan").files[0].size / 1024;
            }

            //Notif Bila tidak diisi / tidak sesuai
            if (
                institusi == "" ||
                kelompok == "" ||
                jumlah == "" ||
                jurusan == "" ||
                jenjang == "" ||
                profesi == "" ||
                tgl_mulai == "" ||
                tgl_selesai == "" ||
                no_surat == "" ||
                tgl_surat == "" ||
                file_surat == "" ||
                file_surat == undefined ||
                file_akred_institusi == "" ||
                file_akred_institusi == undefined ||
                file_akred_jurusan == "" ||
                file_akred_jurusan == undefined ||
                nama_koordinator == "" ||
                telp_koordinator == "" ||
                pilih_mess == undefined ||
                getTypeSurat != 'pdf' ||
                getSizeSurat > 3072 ||
                getTypeAkredInstitusi != 'pdf' ||
                getSizeAkredInstitusi > 3072 ||
                getTypeAkredJurusan != 'pdf' ||
                getSizeAkredJurusan > 3072
            ) {
                //warning Toast bila ada data wajib yg berlum terisi
                Swal.fire({
                    allowOutsideClick: true,
                    showConfirmButton: false,
                    icon: 'warning',
                    title: '<center>DATA WAJIB ADA YANG BELUM TERISI</center>',
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                //notif File Surat Institusi 
                if (getTypeSurat == "") {
                    $("#err_file_surat").html("File Surat Institusi Harus pdf");
                } else if (getSizeSurat == "") {
                    $("#err_file_surat").html("File Surat Institusi Harus Kurang dari 3 Mb");
                } else {
                    $("#err_file_surat").html("");
                }

                //notif File Akreditasi Institusi 
                if (getTypeAkredInstitusi == "") {
                    $("#err_file_akred_institusi").html("File Akreditasi Institusi Harus pdf");
                } else if (getSizeAkredInstitusi == "") {
                    $("#err_file_akred_institusi").html("File Akreditasi Institusi Harus Kurang dari 3 Mb");
                } else {
                    $("#err_file_akred_institusi").html("");
                }

                //notif File Akreditasi Jurusan 
                if (getTypeAkredJurusan == "") {
                    $("#err_file_akred_jurusan").html("File Akreditasi Jurusan Harus pdf");
                } else if (getSizeAkredJurusan == "") {
                    $("#err_file_akred_jurusan").html("File Akreditasi Jurusan Harus Kurang dari 3 Mb");
                } else {
                    $("#err_file_akred_jurusan").html("");
                }

                //notif institusi 
                if (institusi == "") {
                    $("#err_institusi").html("Institusi Harus Dipilih");
                } else {
                    $("#err_institusi").html("");
                }

                //notif kelompok 
                if (kelompok == "") {
                    $("#err_kelompok").html("Nama Kelompok Harus Diisi");
                } else {
                    $("#err_kelompok").html("");
                }

                //notif jumlah 
                if (jumlah == "") {
                    $("#err_jumlah").html("Jumlah Praktik Harus Diisi");
                } else {
                    $("#err_jumlah").html("");
                }

                //notif jurusan 
                if (jurusan == "") {
                    $("#err_jurusan").html("Jurusan Harus Diisi");
                } else {
                    $("#err_jurusan").html("");
                }

                //notif jenjang 
                if (jenjang == "") {
                    $("#err_jenjang").html("Jenjang Harus Diisi");
                } else {
                    $("#err_jenjang").html("");
                }

                //notif profesi 
                if (profesi == "") {
                    $("#err_profesi").html("Profesi Harus Diisi");
                } else {
                    $("#err_profesi").html("");
                }

                //notif tgl_mulai 
                if (tgl_mulai == "") {
                    $("#err_tgl_mulai").html("Tanggal Mulai Praktik Harus Diisi");
                } else {
                    $("#err_tgl_mulai").html("");
                }

                //notif tgl_selesai 
                if (tgl_selesai == "") {
                    $("#err_tgl_selesai").html("Tanggal Selesai Praktik Harus Diisi");
                } else {
                    $("#err_tgl_selesai").html("");
                }

                //notif no_surat 
                if (no_surat == "") {
                    $("#err_no_surat").html("No. Surat Institusi Harus Diisi");
                } else {
                    $("#err_no_surat").html("");
                }

                //notif tgl_surat 
                if (tgl_surat == "") {
                    $("#err_no_surat").html("No. Surat Institusi Harus Diisi");
                } else {
                    $("#err_no_surat").html("");
                }

                // notif file_surat
                if (file_surat == "" || file_surat == undefined) {
                    $("#err_file_surat").html("File Surat Harus Unggah");
                } else {
                    $("#err_file_surat").html("");
                }

                // notif file_akred_institusi
                if (file_akred_institusi == "" || file_akred_institusi == undefined) {
                    $("#err_file_akred_institusi").html("File Akreditasi Institusi Harus Unggah");
                } else {
                    $("#err_file_akred_institusi").html("");
                }

                // notif file_akred_jurusan
                if (file_akred_jurusan == "" || file_akred_jurusan == undefined) {
                    $("#err_file_akred_jurusan").html("File Akreditasi Jurusan Harus Unggah");
                } else {
                    $("#err_file_akred_jurusan").html("");
                }

                //notif nama_koordinator
                if (nama_koordinator == "") {
                    $("#err_nama_koordinator").html("Nama Koordinator Harus Diisi");
                } else {
                    $("#err_nama_koordinator").html("");
                }

                //notif telp_koordinator
                if (telp_koordinator == "") {
                    $("#err_telp_koordinator").html("Telpon Koordinator Harus Diisi");
                } else {
                    $("#err_telp_koordinator").html("");
                }

                //notif telp_koordinator
                if (pilih_mess == undefined) {
                    $("#err_pilih_mess").html("Pemakaian Mess Harus Dipilih");
                } else {
                    $("#err_pilih_mess").html("");
                }
            }

            //notif alasan mess 
            if (pilih_mess == "T") {
                if (alasan_mess == "") $("#err_uraian_alasan").html("Alasan Tidak Memilih Mess Harus Diisi");
                else $("#err_uraian_alasan").html("");
            }

            //Alert jika Tanggal Selesai kurang dari tanggal mulai
            if (
                (tgl_selesai <= tgl_mulai) &&
                (tgl_mulai != "" && tgl_selesai != "") ||
                (tgl_mulai == "" && tgl_selesai == "")
            ) {
                Swal.fire({
                    allowOutsideClick: true,
                    showConfirmButton: false,
                    icon: 'warning',
                    title: '<center><b>Tanggal Selesai</b> Harus Lebih dari <b>Tanggal Mulai</b></center>',
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
                $("#err_tgl_selesai").html("<b>Tanggal Selesai</b> Harus Lebih dari <b>Tanggal Mulai</b>");
            }
            //bila tanggal mulai dan selesai sesuai
            else { //Cek Data Ketersediaan Jadwal Praktik
                console.log("Cek Jadwal Praktik . . .");
                $.ajax({
                    type: 'POST',
                    url: "_admin/insert/i_praktik_valTgl.php",
                    data: data_praktik,
                    dataType: 'json',
                    success: function(response) {
                        //notif jika jadwal dan/ jumlah praktik melebihi kuota
                        if (response.ket == 'T') {
                            console.log('Jadwal Praktik Tidak Bisa');
                            Swal.fire({
                                allowOutsideClick: true,
                                icon: 'error',
                                showConfirmButton: false,
                                html: '<span class"text-xs"><b>Kuota Jadwal Praktik</b> yang dipilih <b>Penuh</b>' +
                                    '<br>Silahkan Cek Kembali Informasi Jadwal Praktik<br><br>' +
                                    '<a href="?info_diklat" class="btn btn-outline-primary">Cek Informasi Jadwal Praktik</a>',
                                timer: 10000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            }).then(
                                function() {
                                    // document.location.href = "?ptk";
                                }
                            );
                        }
                        //eksekusi bila jadwal tersedia
                        else if (response.ket == 'Y') {
                            console.log('Jadwal Praktik Bisa');
                            //simpan data praktik dan data tarif
                            if (
                                institusi != "" &&
                                kelompok != "" &&
                                jumlah != "" &&
                                jurusan != "" &&
                                jenjang != "" &&
                                profesi != "" &&
                                tgl_mulai != "" &&
                                tgl_selesai != "" &&
                                no_surat != "" &&
                                tgl_surat != "" &&
                                file_surat != undefined &&
                                getTypeSurat == 'pdf' &&
                                file_akred_institusi != undefined &&
                                getTypeAkredInstitusi == 'pdf' &&
                                file_akred_jurusan != undefined &&
                                getTypeAkredJurusan == 'pdf' &&
                                file_surat != undefined &&
                                getTypeSurat == 'pdf' &&
                                getSizeSurat <= 3072 &&
                                getSizeAkredInstitusi <= 3072 &&
                                getSizeAkredJurusan <= 3072 &&
                                nama_koordinator != "" &&
                                telp_koordinator != "" &&
                                pilih_mess != undefined
                            ) {
                                //push data pilih_mess
                                data_praktik.push({
                                    name: 'pilih_mess',
                                    value: pilih_mess
                                });

                                //Simpan Data Praktik dan Tarif
                                $.ajax({
                                    type: 'POST',
                                    url: "_admin/exc/x_u_praktik_u.php?",
                                    data: data_praktik,
                                    dataType: "json",
                                    success: function(response) {
                                        if (response.ket == 'Y') {
                                            //ambil data file yang diupload
                                            var data_file = new FormData();
                                            var xhttp = new XMLHttpRequest();


                                            var fileSurat = document.getElementById("file_surat").files;
                                            data_file.append("file_surat", fileSurat[0]);

                                            var fileAkredInstitusi = document.getElementById("file_akred_institusi").files;
                                            data_file.append("file_akred_institusi", fileAkredInstitusi[0]);

                                            var fileAkredJurusan = document.getElementById("file_akred_jurusan").files;
                                            data_file.append("file_akred_jurusan", fileAkredJurusan[0]);

                                            var id = document.getElementById("id").value;
                                            data_file.append("id", id);

                                            xhttp.open("POST", "_admin/exc/x_i_praktik_sFile.php", true);
                                            xhttp.send(data_file);

                                            data_file.append("q", response.q);
                                            data_file.append("idpp", response.idpp);
                                            data_file.append("profesi", "<?= bin2hex(urlencode(base64_encode(date("Ymd") . "*sm*" . $d_praktik['id_profesi_pdd']))) ?>");

                                            xhttp.open("POST", "_admin/exc/x_u_praktik_sFile.php", true);

                                            xhttp.onload = function() {
                                                if (xhttp.response == "<?= bin2hex(urlencode(base64_encode("size"))) ?>") {
                                                    console.log("size too big");
                                                    Swal.fire({
                                                        allowOutsideClick: true,
                                                        icon: 'warning',
                                                        html: '<span class="text-danger text-lg text-center">Ukuran File Terlalu Besar</span>',
                                                        showConfirmButton: false,
                                                        backdrop: true,
                                                        timer: 5000,
                                                        timerProgressBar: true
                                                    });
                                                } else if (xhttp.response == "<?= bin2hex(urlencode(base64_encode("type"))); ?>") {
                                                    console.log("Tipe Different");
                                                    Swal.fire({
                                                        allowOutsideClick: true,
                                                        icon: 'warning',
                                                        html: '<span class="text-danger text-lg text-center">Tipe File Berbeda</span>',
                                                        showConfirmButton: false,
                                                        backdrop: true,
                                                        timer: 5000,
                                                        timerProgressBar: true
                                                    });
                                                } else {
                                                    console.log("Success");
                                                    Swal.fire({
                                                        allowOutsideClick: true,
                                                        // isDismissed: false,
                                                        icon: 'success',
                                                        html: '<a href="?ptk" class="btn btn-outline-primary">OK</a>',
                                                        title: '<span class"text-xs"><b>DATA PRAKTIK</b><br>Berhasil Tersimpan',
                                                        showConfirmButton: false,
                                                        timer: 5000,
                                                        timerProgressBar: true,
                                                        didOpen: (toast) => {
                                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                        }
                                                    }).then(
                                                        function() {
                                                            document.location.href = "?ptk";
                                                        }
                                                    );
                                                }
                                            }
                                            xhttp.send(data_file);
                                        } else {
                                            Swal.fire({
                                                allowOutsideClick: true,
                                                showConfirmButton: false,
                                                icon: 'warning',
                                                html: '<div class="text-lg">Mohon Maaf Data Praktikan <br><b>Sudah Penuh</b></div>',
                                                timer: 10000,
                                                timerProgressBar: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            });
                                        }
                                    },
                                    error: function(response) {
                                        console.log(response.responseText);
                                        alert('eksekusi query gagal');
                                    }
                                });
                            } else console.log("Data Wajib Praktik Belum Diisi dan/ tidak sesuai");
                        } else alert("ERROR CEK TANGGAL PRAKTIK");
                    }
                });
            }
        });
    </script>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
