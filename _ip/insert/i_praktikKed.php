<?php
if ($_GET['prk'] == 'ked') {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800" id="title_praktik">Pengajuan Praktik Kedokteran</h1>
            </div>
        </div>
        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_praktik">
            <!-- Data Pengajuan Praktik  -->
            <div id="data_praktik_input">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <!-- Data Praktikan -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-lg font-weight-bold text-center"> DATA PRAKTIK</div>
                            </div>
                        </div>
                        <hr>
                        <!-- Nama Institusi dan Praktikan -->
                        <div class="row">
                            <?php

                            //Cari id_praktik
                            $no = 1;
                            $sql = "SELECT id_praktik FROM tb_praktik ORDER BY id_praktik ASC";
                            $q = $conn->query($sql);
                            if ($q->rowCount() > 0) {
                                while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
                                    if ($no != $d['id_praktik']) {
                                        $no = $d['id_praktik'] + 1;
                                        break;
                                    }
                                    $no++;
                                }
                            }
                            $id_praktik = $no;
                            ?>
                            <input name="id" value="<?php echo $id_praktik; ?>" id="id" hidden>
                            <input name="user" value="<?php echo $_SESSION['id_user']; ?>" id="user" hidden>

                            <div class="col-lg-5 ">
                                Nama Institusi : <span style="color:red">*</span><br>
                                <?php
                                $sql_institusi = "SELECT * FROM tb_institusi";
                                $sql_institusi .= "  WHERE id_institusi = " . $_SESSION['id_institusi'];

                                $q_institusi = $conn->query($sql_institusi);
                                $d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <div class="text-lg font-weight-bold"><?php echo $d_institusi['nama_institusi'] . " (" . $d_institusi['akronim_institusi'] . ")"; ?></div>
                                <input type="hidden" name='id_institusi' id="institusi" value="<?php echo $_SESSION['id_institusi']; ?>">
                                <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_institusi"></div>
                            </div>
                            <div class="col-lg-5">
                                Gelombang/Kelompok : <span style="color:red">*</span><br>
                                <input type="text" class="form-control" name="nama_praktik" placeholder="Isi Gelombang/Kelompok" id="praktik" required>
                                <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_praktik"></div>
                            </div>
                            <div class="col-lg-2">
                                Jumlah Praktikan : <span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="jumlah_praktik" min="1" placeholder="Isi Jumlah Praktik" id="jumlah" required>
                                <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_jumlah"></span>
                            </div>
                        </div>
                        <br>

                        <!-- Jurusan, Jenjang, profesi dan Akreditasi -->
                        <div class="row">
                            <div class="col-lg-4">
                                Jurusan : <br>
                                <b>Kedokteran</b>
                                <input type="hidden" name='id_jurusan_pdd' id="jurusan" value="1">
                            </div>
                            <div class="col-lg-4">
                                Jenjang : <br>
                                <b>Profesi</b>
                                <input type="hidden" name='id_jenjang_pdd' id="jenjang" value="10">
                            </div>
                            <div class="col-lg-4">
                                Pilih Profesi : <span style="color:red">*</span><br>
                                <?php
                                $sql_prof = "SELECT * FROM tb_jurusan_pdd_jenjang_profesi";
                                $sql_prof .= " JOIN tb_profesi_pdd ON tb_jurusan_pdd_jenjang_profesi.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd";
                                $sql_prof .= " WHERE tb_jurusan_pdd_jenjang_profesi.id_jurusan_pdd = 1";
                                $sql_prof .= " GROUP BY tb_profesi_pdd.nama_profesi_pdd";
                                $sql_prof .= " ORDER BY tb_profesi_pdd.nama_profesi_pdd ASC";

                                $q_spek = $conn->query($sql_prof);
                                $r_spek = $q_spek->rowCount();

                                if ($r_spek > 0) {
                                ?>
                                    <select class='form-control js-example-placeholder-single' aria-label='Default select example' onchange="makanMess();" name='id_profesi_pdd' id="profesi">
                                        <option value="">-- <i>Pilih</i>--</option>
                                        <?php
                                        while ($d_spek = $q_spek->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_spek['id_profesi_pdd']; ?>'>
                                                <?php echo $d_spek['nama_profesi_pdd']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_profesi"></div>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Profesi Tidak Ada</i></b>
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
                                <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_tgl_mulai"></span>
                            </div>
                            <div class="col-lg-2">
                                Tanggal Selesai : <span style="color:red">*</span><br>
                                <input type="date" class="form-control" name="tgl_selesai_praktik" id="tgl_selesai" required>
                                <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_tgl_selesai"></span>
                            </div>
                            <div class="col-lg-2">
                                No. Surat Institusi : <span style="color:red">*</span><br>
                                <input type="text" class="form-control" name="no_surat" placeholder="Isi no Surat Institusi" id="no_surat" required>
                                <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_no_surat"></span>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="border p-2 ">
                                    Unggah Surat : <span class="mb-2" style="color:red">*</span><br>
                                    <input type="file" name="surat_praktik" id="file_surat" accept="application/pdf" required>
                                </fieldset>
                                <i style='font-size:12px;'>Data unggah harus .pdf dan maksimal ukuran file 1 Mb</i>
                                <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_file_surat"></div>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="border p-2">
                                    Unggah Data Praktikan : <span style="color:red">*</span>
                                    <a class='text-xs text-uppercase badge badge-danger' href='#' data-toggle='modal' data-target='#modal_data_praktikan'>
                                        Info Format File
                                    </a>
                                    <!-- modal info dan unduh data praktikan -->
                                    <?php include "_admin/insert/i_praktik_formatDataPraktikan.php"; ?>
                                    <input type="file" name="data_praktik" id="file_data_praktikan" accept=".xlsx">
                                </fieldset>
                                <i style='font-size:12px;'>File harus sesuai format dan maksimal ukuran file 1 Mb</i>
                                <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_file_data_praktikan"></div>
                            </div>
                        </div>
                        <hr>

                        <!-- Koordinator -->
                        <div class=" row">
                            <div class="col-lg-12 text-center">
                                <b>KOORDINATOR</b>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <?php
                            $q_user = $conn->query("SELECT * FROM tb_user WHERE id_user=" . $_SESSION['id_user']);
                            $d_user = $q_user->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="col-lg-4">
                                Nama : <span style="color:red">*</span><br>
                                <input type="text" class="form-control" name="nama_koordinator_praktik" id="nama_koordinator" placeholder="Isi Nama Koordinator" value="<?php echo $d_user['nama_user']; ?>" required><span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_nama_koordinator"></span>
                            </div>
                            <div class="col-lg-4">
                                Email :<br>
                                <input type="text" class="form-control" name="email_koordinator_praktik" id="email_koordinator" placeholder="Isi Email Koordinator" value="<?php echo $d_user['email_user']; ?>">
                            </div>
                            <div class="col-lg-4">
                                Telpon : <span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="telp_koordinator_praktik" id="telp_koordinator" placeholder="Isi Telpon Koordinator" min="1" value="<?php echo $d_user['no_telp_user']; ?>" required>
                                <i style='font-size:12px;'>Isian hanya berupa angka</i>
                                <br><span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_telp_koordinator"></span>
                            </div>
                        </div>

                        <hr>
                        <div id="data_makan_mess" style="display: none;">
                            <div class="text-gray-700">
                                <div class="h5 font-weight-bold text-center mt-3 mb-3">
                                    Pemilihan Mess/Pemondokan dengan Makan <span class="text-danger">*</span><br>
                                    <span class="font-italic font-weight-bold text-xs">(Tempat Akan dipilih oleh Admin)<br>
                                        (Wajib dipilih jika <b>Profesi</b> memilih <b>PSPD/Co-Ass</b>)</span>
                                </div>
                                <div class="h5 font-weight-bold text-center mt-3 mb-3">
                                    <span class="text-danger font-weight-bold font-italic text-md blink" id="err_makan_mess"></span>
                                </div>
                            </div>
                            <div class="row boxed-check-group boxed-check-primary justify-content-center">
                                <label class="boxed-check">
                                    <input class="boxed-check-input" type="radio" name="makan_mess" id="makan_mess1" value="y">
                                    <div class="boxed-check-label">Dengan Makan (3x Sehari)</div>
                                </label>
                                &nbsp;
                                &nbsp;
                                <label class="boxed-check">
                                    <input class="boxed-check-input" type="radio" name="makan_mess" id="makan_mess2" value="t">
                                    <div class="boxed-check-label">Tanpa Makan</div>
                                </label>
                                <br><span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_makan_mess"></span>
                            </div>
                            <hr>
                        </div>
                        <i class="font-weight-bold"><span style="color:red">*</span> : Wajib diisi</i>

                        <!-- Tombol Lanjut ke Daftar Tarif-->

                        <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                            <button type="button" name="simpan_praktik" id="simpan_praktik" class="btn btn-outline-success" onclick="simpan_ked()">
                                <!-- <a class="nav-link" href="#tarif"> -->
                                <i class="fas fa-check-circle"></i>
                                Simpan Data Praktik
                                <i class="fas fa-check-circle"></i>
                                <!-- </a> -->
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <input type="hidden" name="path" value="<?php echo $_GET['prk']; ?>" id="path">
        <div id="data_tarif_input"></div>
    </div>

    <!-- <pre id="whereToPrint"> ce :</pre> -->

    <script type="text/javascript">
        function makanMess() {
            // console.log("makanMess");
            // console.log($("#profesi").val());
            var profesi = $("#profesi").val();
            if (profesi == 1) {
                $("#data_makan_mess").fadeOut('slow');
            } else {
                $("#data_makan_mess").fadeIn('slow');
            }
        }

        function simpan_ked() {

            var id = document.getElementById("id").value;
            var user = document.getElementById("user").value;
            var institusi = document.getElementById("institusi").value;
            var praktik = document.getElementById("praktik").value;
            var jurusan = document.getElementById("jurusan").value;
            var jenjang = document.getElementById("jenjang").value;
            var profesi = document.getElementById("profesi").value;
            // var akreditasi = document.getElementById("akreditasi").value;
            var jumlah = document.getElementById("jumlah").value;
            var tgl_mulai = document.getElementById("tgl_mulai").value;
            var tgl_selesai = document.getElementById("tgl_selesai").value;
            var no_surat = document.getElementById("no_surat").value;
            var file_surat = document.getElementById("file_surat").value;
            var file_data_praktikan = document.getElementById("file_data_praktikan").value;
            var nama_koordinator = document.getElementById("nama_koordinator").value;
            var email_koordinator = document.getElementById("email_koordinator").value;
            var telp_koordinator = document.getElementById("telp_koordinator").value;
            // var makan = document.getElementById("makan_mess").value;

            //Notif Bila tidak diisi
            if (
                institusi == "" ||
                praktik == "" ||
                jurusan == "" ||
                jenjang == "" ||
                profesi == "" ||
                // akreditasi == "" ||
                jumlah == "" ||
                tgl_mulai == "" ||
                tgl_selesai == "" ||
                no_surat == "" ||
                file_surat == "" ||
                // type_surat != "pdf" ||
                // size_surat > 1024 ||
                file_data_praktikan == "" ||
                // type_data_praktikan != "xlsx" ||
                // size_data_praktikan > 1024 ||
                nama_koordinator == "" ||
                telp_koordinator == ""
            ) {

                /* console.log(institusi + "--" +
                    praktik + "--" +
                    jurusan + "--" +
                    akreditasi + "--" +
                    jumlah + "--" +
                    tgl_mulai + "--" +
                    tgl_selesai + "--" +
                    file_surat + "--" +
                    // type_surat + "--" +
                    // size_surat + "--" +
                    file_data_praktikan + "--" +
                    // type_data_praktikan + "--" +
                    // size_data_praktikan + "--" +
                    nama_koordinator + "--" +
                    email_koordinator + "--" +
                    telp_koordinator
                ); */

                //warning Toast bila ada data wajib yg berlum terisi
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'warning',
                    title: '<center>DATA WAJIB ADA YANG BELUM TERISI</center>'
                });

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

                // //notif jurusan 
                // if (jurusan == "") {
                //     document.getElementById("err_jurusan").innerHTML = "Jurusan Harus Diisi";
                // } else {
                //     document.getElementById("err_jurusan").innerHTML = "";
                // }

                // //notif jenjang 
                // if (jenjang == "") {
                //     document.getElementById("err_jenjang").innerHTML = "Jenjang Harus Diisi";
                // } else {
                //     document.getElementById("err_jenjang").innerHTML = "";
                // }

                //notif profesi 
                if (profesi == "") {
                    document.getElementById("err_profesi").innerHTML = "Profesi Harus Dipilih";
                } else {
                    document.getElementById("err_profesi").innerHTML = "";
                }

                //notif akreditasi 
                // if (akreditasi == "") {
                //     document.getElementById("err_akreditasi").innerHTML = "Akreditasi Harus Diisi";
                // } else {
                //     document.getElementById("err_akreditasi").innerHTML = "";
                // }

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

                //notif no_surat 
                if (no_surat == "") {
                    document.getElementById("err_no_surat").innerHTML = "No. Surat Institusi Harus Diisi";
                } else {
                    document.getElementById("err_no_surat").innerHTML = "";
                }

                // notif file_surat
                if (file_surat == "") {
                    document.getElementById("err_file_surat").innerHTML = "File Surat Harus Diisi";
                } else {
                    document.getElementById("err_file_surat").innerHTML = "";
                }

                // notif file_data_praktikan
                if (file_data_praktikan == "") {
                    document.getElementById("err_file_data_praktikan").innerHTML = "File Data Praktikan Harus Diisi";
                } else {
                    document.getElementById("err_file_data_praktikan").innerHTML = "";
                }

                //notif nama_koordinator
                if (nama_koordinator == "") {
                    document.getElementById("err_nama_koordinator").innerHTML = "Nama Koordinator Harus Diisi";
                } else {
                    document.getElementById("err_nama_koordinator").innerHTML = "";
                }

                //notif telp_koordinator
                if (telp_koordinator == "") {
                    document.getElementById("err_telp_koordinator").innerHTML = "Telpon Koordinator Harus Diisi";
                } else {
                    document.getElementById("err_telp_koordinator").innerHTML = "";
                }
            }

            //Alert jika Tanggal Selesai kurang dari tanggal mulai
            if (tgl_selesai <= tgl_mulai && (tgl_mulai != "" && tgl_selesai != "")) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 10000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'warning',
                    title: '<center><b>Tanggal Selesai</b> Harus Lebih dari <b>Tanggal Mulai</b></center>'
                })

                document.getElementById("err_tgl_selesai").innerHTML = "<b>Tanggal Selesai</b> Harus Lebih dari <b>Tanggal Mulai</b>";
            }

            //eksekusi bila file surat terisi
            if (file_surat != "") {

                //Cari ekstensi file surat yg diupload
                var typeSurat = document.querySelector('#file_surat').value;
                var getTypeSurat = typeSurat.split('.').pop();

                //cari ukuran file surat yg diupload
                var fileSurat = document.getElementById("file_surat").files;
                var getSizeSurat = document.getElementById("file_surat").files[0].size / 1024;

                console.log("Size Surat : " + getSizeSurat);
                console.log("Size Surat : " + fileSurat);

                //Toast bila upload file surat selain pdf
                if (getTypeSurat != 'pdf') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Surat Harus <b>.pdf</b></div>'
                    });
                    document.getElementById("err_file_surat").innerHTML = "File Surat Harus pdf";
                } //Toast bila upload file surat diatas 1 Mb 
                else if (getSizeSurat > 1024) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Surat Harus <br><b>Kurang dari 1 Mb</b></div>'
                    });
                    document.getElementById("err_file_surat").innerHTML = "File Surat Harus Kurang dari 1 Mb";
                }
            }

            //eksekusi bila file data praktikan terisi
            if (file_data_praktikan != "") {

                //Cari ekstensi file data praktikan yg diupload
                var typeDataPraktikan = document.querySelector('#file_data_praktikan').value;
                var getTypeDataPraktikan = typeDataPraktikan.split('.').pop();

                //cari ukuran file data praktikan yg diupload
                var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
                var getSizeDataPraktikan = document.getElementById("file_data_praktikan").files[0].size / 1024;

                console.log("Size Data Surat : " + getSizeDataPraktikan);
                console.log("Size data Surat : " + fileDataPraktikan);

                //Toast bila upload file data praktikan selain xlsx
                if (getTypeDataPraktikan != 'xlsx') {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Data Pratik Harus <b>.xlsx</b></div>'
                    });
                    document.getElementById("err_file_data_praktikan").innerHTML = "File Surat Harus xlsx";
                } //Toast bila upload file data praktikan diatas 1 Mb
                else if (getSizeDataPraktikan > 1024) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Data Praktikan Harus <br><b>Kurang dari 1 Mb</b></div>'
                    });
                    document.getElementById("err_file_data_praktikan").innerHTML = "File Data Praktikan Harus Kurang dari 1 Mb";
                }
            }

            var data_praktik = $('#form_praktik').serializeArray();
            $.ajax({
                type: 'POST',
                url: "_ip/insert/i_praktik_valTgl.php?",
                data: data_praktik,
                dataType: 'json',
                success: function(response) {
                    // console.log("SUCCESS CEK VAL TGL");
                    if (response.ket == 'y') {
                        Swal.fire({
                            allowOutsideClick: false,
                            // isDismissed: false,
                            icon: 'error',
                            showConfirmButton: false,
                            html: '<span class"text-xs"><b>Kuota Jadwal Praktik</b> yang dipilih <b>Penuh</b><br>Silahkan Cek Kembali Informasi Jadwal Praktik<br><br>' +
                                '<a href="?info_diklat" class="btn btn-outline-primary">Informasi Jadwal Praktik</a>',
                            timer: 15000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        }).then(
                            function() {
                                // document.location.href = "?prk=ked";
                            }
                        );
                    } else {

                        //simpan data praktik dan data tarif
                        if (
                            institusi != "" &&
                            praktik != "" &&
                            jurusan != "" &&
                            profesi != "" &&
                            // akreditasi != "" &&
                            jumlah != "" &&
                            tgl_mulai != "" &&
                            tgl_selesai != "" &&
                            nama_koordinator != "" &&
                            telp_koordinator != "" &&
                            tgl_selesai > tgl_mulai &&
                            no_surat != "" &&
                            file_surat != "" &&
                            getTypeSurat == 'pdf' &&
                            getSizeSurat <= 1024 &&
                            file_data_praktikan != "" &&
                            getTypeDataPraktikan == 'xlsx' &&
                            getSizeDataPraktikan <= 1024
                        ) {
                            document.getElementById("err_institusi").innerHTML = "";
                            document.getElementById("err_praktik").innerHTML = "";
                            // document.getElementById("err_jurusan").innerHTML = "";
                            // document.getElementById("err_jenjang").innerHTML = "";
                            document.getElementById("err_profesi").innerHTML = "";
                            // document.getElementById("err_akreditasi").innerHTML = "";
                            document.getElementById("err_jumlah").innerHTML = "";
                            document.getElementById("err_tgl_mulai").innerHTML = "";
                            document.getElementById("err_tgl_selesai").innerHTML = "";
                            document.getElementById("err_no_surat").innerHTML = "";
                            document.getElementById("err_file_surat").innerHTML = "";
                            document.getElementById("err_file_data_praktikan").innerHTML = "";
                            // document.getElementById("err_akun_koordinator").innerHTML = "";
                            document.getElementById("err_nama_koordinator").innerHTML = "";
                            document.getElementById("err_telp_koordinator").innerHTML = "";

                            //eksekusi jika kedokteran PPDS
                            if (profesi == 1) {

                                var path = "";
                                var data_praktik = $('#form_praktik').serializeArray();

                                //Simpan Data Praktik dan Tarif
                                $.ajax({
                                    type: 'POST',
                                    url: "_ip/exc/x_i_praktik_sPraktikTarif.php?",
                                    data: data_praktik,
                                    success: function() {
                                        //ambil data file yang diupload
                                        var data_file = new FormData();
                                        var xhttp = new XMLHttpRequest();

                                        var fileSurat = document.getElementById("file_surat").files;
                                        data_file.append("file_surat", fileSurat[0]);

                                        var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
                                        data_file.append("file_data_praktikan", fileDataPraktikan[0]);

                                        var id = document.getElementById("id").value;
                                        data_file.append("id", id);

                                        xhttp.open("POST", "_ip/exc/x_i_praktik_sPraktikFile.php", true);
                                        xhttp.send(data_file);


                                        //import file excel ke database
                                        var data_file_praktikan = new FormData();
                                        var xhttp_data_praktikan = new XMLHttpRequest();

                                        var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
                                        data_file_praktikan.append("file_data_praktikan", fileDataPraktikan[0]);

                                        var id = document.getElementById("id").value;
                                        data_file_praktikan.append("id", id);

                                        xhttp_data_praktikan.open("POST", "_ip/exc/x_i_praktik_sPraktikDataPraktikan.php?", true);
                                        xhttp_data_praktikan.send(data_file_praktikan);

                                        //Cari Jenis Jurusan
                                        var jur = document.getElementById('jurusan').value;
                                        var xmlhttp_path = new XMLHttpRequest();
                                        xmlhttp_path.onload = function() {
                                            var path = "?prk=ked";
                                            Swal.fire({
                                                allowOutsideClick: false,
                                                // isDismissed: false,
                                                icon: 'success',
                                                title: '<span class"text-xs"><b>DATA PRAKTIK</b><br>Berhasil Tersimpan',
                                                showConfirmButton: false,
                                                html: '<a href="' + path + '" class="btn btn-outline-primary">OK</a>',
                                                timer: 5000,
                                                timerProgressBar: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            }).then(
                                                function() {
                                                    document.location.href = path;
                                                }
                                            );
                                        };
                                        xmlhttp_path.open("GET", "_ip/insert/i_praktikPath.php?jur=" + jur,
                                            true
                                        );
                                        xmlhttp_path.send();
                                    },
                                    error: function(response) {
                                        console.log(response.responseText);
                                        alert('eksekusi query gagal');
                                    }
                                });
                            } else {
                                if (document.getElementById("makan_mess1").checked == false && document.getElementById("makan_mess2").checked == false) {
                                    const Toast = Swal.mixin({
                                        toast: true,
                                        position: 'top-end',
                                        showConfirmButton: false,
                                        timer: 10000,
                                        timerProgressBar: true,
                                        didOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                        }
                                    });

                                    Toast.fire({
                                        icon: 'warning',
                                        title: '<center>Pilih <b>MAKAN MESS</b></center>'
                                    });
                                    document.getElementById("err_makan_mess").innerHTML = "Pilih Makan Mess <br>";
                                } //eksekusi simpadn data praktik dan pilih makan mess
                                else {
                                    var path = "";
                                    var data_praktik = $('#form_praktik').serializeArray();

                                    //cek data makan_mess
                                    var makan_mess = "";
                                    if (document.getElementById("makan_mess1").checked == true) {
                                        makan_mess = document.getElementById("makan_mess1").value;
                                    } else if (document.getElementById("makan_mess2").checked == true) {
                                        makan_mess = document.getElementById("makan_mess2").value;
                                    }

                                    //push data makan_mess    
                                    data_praktik.push({
                                        name: 'makan_mess',
                                        value: makan_mess
                                    });

                                    //Simpan Data Praktik dan Tarif
                                    $.ajax({
                                        type: 'POST',
                                        url: "_ip/exc/x_i_praktik_sPraktikTarif.php?",
                                        data: data_praktik,
                                        success: function() {
                                            //ambil data file yang diupload
                                            var data_file = new FormData();
                                            var xhttp = new XMLHttpRequest();

                                            var fileSurat = document.getElementById("file_surat").files;
                                            data_file.append("file_surat", fileSurat[0]);

                                            var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
                                            data_file.append("file_data_praktikan", fileDataPraktikan[0]);

                                            var id = document.getElementById("id").value;
                                            data_file.append("id", id);

                                            xhttp.open("POST", "_ip/exc/x_i_praktik_sPraktikFile.php", true);
                                            xhttp.send(data_file);

                                            //import file excel ke database
                                            var data_file_praktikan = new FormData();
                                            var xhttp_data_praktikan = new XMLHttpRequest();

                                            var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
                                            data_file_praktikan.append("file_data_praktikan", fileDataPraktikan[0]);

                                            var id = document.getElementById("id").value;
                                            data_file_praktikan.append("id", id);

                                            xhttp_data_praktikan.open("POST", "_ip/exc/x_i_praktik_sPraktikDataPraktikan.php?", true);
                                            xhttp_data_praktikan.send(data_file_praktikan);

                                            //Cari Jenis Jurusan
                                            var jur = document.getElementById('jurusan').value;
                                            var xmlhttp_path = new XMLHttpRequest();
                                            xmlhttp_path.onload = function() {
                                                var path = "?prk=ked";
                                                Swal.fire({
                                                    allowOutsideClick: false,
                                                    // isDismissed: false,
                                                    icon: 'success',
                                                    title: '<span class"text-xs"><b>DATA PRAKTIK</b><br>Berhasil Tersimpan',
                                                    showConfirmButton: false,
                                                    html: '<a href="' + path + '" class="btn btn-outline-primary">OK</a>',
                                                    timer: 5000,
                                                    timerProgressBar: true,
                                                    didOpen: (toast) => {
                                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                    }
                                                }).then(
                                                    function() {
                                                        document.location.href = path;
                                                    }
                                                );
                                            };
                                            xmlhttp_path.open("GET", "_ip/insert/i_praktikPath.php?jur=" + jur,
                                                true
                                            );
                                            xmlhttp_path.send();
                                        },
                                        error: function(response) {
                                            console.log(response.responseText);
                                            alert('eksekusi query gagal');
                                        }
                                    });
                                }

                            }
                        }
                    }
                },
                error: function() {
                    console.log(response.responseText);
                    alert('eksekusi query Val.Jadwal Praktik gagal');
                }
            });
        }
    </script>

<?php
} else {
?>
    <script type="text/javascript">
        document.location.href = "?";
    </script>
<?php
}
?>