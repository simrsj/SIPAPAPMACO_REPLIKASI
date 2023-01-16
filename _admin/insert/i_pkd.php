<?php
if (isset($_GET['pkd']) && isset($_GET['i']) && $d_prvl['c_pkd'] == "Y") {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h1 class="h3 mb-2 text-gray-800" id="title_praktik">Pengajuan Pemakaian Kekayaan Daerah</h1>
            </div>
        </div>
        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_pkd">
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
                            <?php
                            //Cari id_pkd terakhir

                            //Cari id Prkatikan
                            $sql_pkd_id = "SELECT MAX(id_pkd) AS ID FROM tb_pkd";
                            // echo $sql_pkd_id . "<br>";

                            try {
                                $q_pkd_id  = $conn->query($sql_pkd_id);
                                $d_pkd_id  = $q_pkd_id->fetch(PDO::FETCH_ASSOC);
                                $id_pkd = $d_pkd_id['ID'] + 1;
                            } catch (Exception $ex) {
                                echo "<script>alert('$ex -ID PKD TERAKHIR-');";
                                echo "document.location.href='?error404';</script>";
                            }
                            ?>
                            <input name="id" id="id" value="<?= urlencode(base64_encode($id_praktik)); ?>" hidden>
                            <div class="col-md">
                                Nama Pemohon : <span style="color:red">*</span><br>
                                <input id="pemohon" name="pemohon" class="form-control form-control-xs" placeholder="Isikan Pemohon dari Institusi/Perorangan" required>
                                <div class="text-danger b i text-xs blink" id="err_pemohon"></div>
                            </div>
                            <div class="col-md-2">
                                Tanggal Pelaksanaan: <span style="color:red">*</span><br>
                                <input type="date" class="form-control form-control-xs" name="tgl_pel" id="tgl_pel" required>
                                <div class="text-danger b i text-xs blink" id="err_tgl_pel"></div>
                            </div>
                            <div class="col-md">
                                File Surat :<span style="color:red">*</span><br>
                                <div class="custom-file">
                                    <label class="custom-file-label text-xs" for="customFile" id="labelfilesurat">Pilih File</label>
                                    <input type="file" class="custom-file-input mb-1" id="file_surat" name="file_surat" accept="application/pdf" required>
                                    <span class='i text-xs'>Data unggah harus .pdf dan maksimal ukuran file 1 Mb</span><br>
                                    <div class="text-xs font-italic text-danger blink" id="err_file_surat"></div><br>
                                    <script>
                                        $('#file_surat').on('change', function() {
                                            var fileSurat = $(this).val();
                                            fileSurat = fileSurat.replace(/^.*[\\\/]/, '');
                                            if (fileSurat == "") fileSurat = "Pilih File";
                                            $('#labelfilesurat').html(fileSurat);
                                        })
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- Jurusan, Jenjang, profesi dan Akreditasi -->
                        <div class="row">
                            <div class="col-md">
                                Rincian : <span style="color:red">*</span><br>
                                <textarea id="rincian" name="rincian" class="form-control form-control-xs" rows="4" placeholder="Isikan Rincian" required></textarea>
                                <div class="text-danger b i text-xs blink" id="err_rincian"></div>
                            </div>
                            <div class="col-md">
                                Biaya Rincian: <span style="color:red">*</span><br>
                                <textarea id="rincian_b" name="rincian_b" class="form-control form-control-xs" rows="4" wrap placeholder="Isikan Biaya Rincian" required></textarea>
                                <div class="text-danger b i text-xs blink" id="err_rincian_b"></div>
                            </div>
                        </div>
                        <br>
                        <!-- Koordinator -->
                        <div class=" row">
                            <div class="col-md-12 text-lg b text-center text-gray-100 badge bg-primary">KORDINATOR</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                Nama : <span style="color:red">*</span><br>
                                <input type="text" class="form-control form-control-xs" name="nama_koordinator" id="nama_koordinator" placeholder="Isi Nama Koordinator" required>
                                <span class="text-danger b  i text-xs blink" id="err_nama_koordinator"></span>
                            </div>
                            <div class="col-md-4">
                                Email :<br>
                                <input type="text" class="form-control form-control-xs" name="email_koordinator" id="email_koordinator" placeholder="Isi Email Koordinator">
                            </div>
                            <div class="col-md-4">
                                Telpon : <span style="color:red">*</span><br>
                                <input type="number" class="form-control form-control-xs" name="telp_koordinator" id="telp_koordinator" placeholder="Isi Telpon Koordinator" min="1" required>
                                <i style='font-size:12px;'>Isian hanya berupa angka</i>
                                <br><span class="text-danger b  i text-xs blink" id="err_telp_koordinator"></span>
                            </div>
                        </div>

                        <!-- Tombol Simpan Praktik-->
                        <div id="simpan_pkd" class="nav btn justify-content-center text-md">
                            <button type="button" name="simpan" id="simpan" class="btn btn-outline-success">
                                <i class="fas fa-check-circle"></i>
                                Simpan Data PKD
                                <i class="fas fa-check-circle"></i>
                            </button>
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

        $("#simpan_praktik").click(function() {

            Swal.fire({
                title: 'Mohon Ditunggu . . .',
                html: ' <img src="./_img/d3f472b06590a25cb4372ff289d81711.gif" class="rotate mb-3" width="100" height="100" />',
                allowOutsideClick: false,
                showConfirmButton: false,
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

            //Notif Bila tidak diisi
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
                pilih_mess == undefined
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

            //eksekusi bila file surat terisi
            if (file_surat != "" && file_surat != undefined) {

                //Cari ekstensi file surat yg diupload
                var typeSurat = document.querySelector('#file_surat').value;
                var getTypeSurat = typeSurat.split('.').pop();

                //cari ukuran file surat yg diupload
                var fileSurat = document.getElementById("file_surat").files;
                var getSizeSurat = document.getElementById("file_surat").files[0].size / 1024;

                // console.log("Size Surat : " + getSizeSurat);
                // console.log("Size Surat : " + fileSurat);

                //Toast bila upload file surat selain pdf
                if (getTypeSurat != 'pdf') {

                    Swal.fire({
                        allowOutsideClick: true,
                        showConfirmButton: false,
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Surat Harus <b>.pdf</b></div>',
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    $("#err_file_surat").html("File Surat Harus pdf");
                } //Toast bila upload file surat diatas 1 Mb 
                else if (getSizeSurat > 1024) {
                    Swal.fire({
                        allowOutsideClick: true,
                        showConfirmButton: false,
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Surat Harus <br><b>Kurang dari 1 Mb</b></div>',
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    $("#err_file_surat").html("File Surat Harus Kurang dari 1 Mb");
                }
            }

            //eksekusi bila file akreditasi institusi terisi
            if (file_akred_institusi != "" && file_akred_institusi != undefined) {

                //Cari ekstensi file surat yg diupload
                var typeAkredInstitusi = document.querySelector('#file_akred_institusi').value;
                var getTypeAkredInstitusi = typeAkredInstitusi.split('.').pop();

                //cari ukuran file surat yg diupload
                var fileAkredInstitusi = document.getElementById("file_akred_institusi").files;
                var getSizeAkredInstitusi = document.getElementById("file_akred_institusi").files[0].size / 1024;


                //Toast bila upload file surat selain pdf
                if (getTypeAkredInstitusi != 'pdf') {

                    Swal.fire({
                        allowOutsideClick: true,
                        showConfirmButton: false,
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Akreditasi Institusi Harus <b>.pdf</b></div>',
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    $("#err_file_akred_institusi").html("File Akreditasi Institusi Harus pdf");
                } //Toast bila upload file surat diatas 1 Mb 
                else if (getSizeAkredInstitusi > 256) {
                    Swal.fire({
                        allowOutsideClick: true,
                        showConfirmButton: false,
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Akreditasi Institusi Harus <br><b>Kurang dari 200 Kb</b></div>',
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    $("#err_file_akred_institusi").html("File Akreditasi Institusi Harus Kurang dari 200 Kb");
                }
            }

            //eksekusi bila file akreditasi institusi terisi
            if (file_akred_jurusan != "" && file_akred_jurusan != undefined) {

                //Cari ekstensi file surat yg diupload
                var typeAkredJurusan = document.querySelector('#file_akred_jurusan').value;
                var getTypeAkredJurusan = typeAkredJurusan.split('.').pop();

                //cari ukuran file surat yg diupload
                var fileAkredJurusan = document.getElementById("file_akred_jurusan").files;
                var getSizeAkredJurusan = document.getElementById("file_akred_jurusan").files[0].size / 1024;


                //Toast bila upload file surat selain pdf
                if (getTypeAkredJurusan != 'pdf') {

                    Swal.fire({
                        allowOutsideClick: true,
                        showConfirmButton: false,
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Akreditasi Jurusan Harus <b>.pdf</b></div>',
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    $("#err_file_akred_jurusan").html("File Akreditasi Jurusan Harus pdf");
                } //Toast bila upload file surat diatas 1 Mb 
                else if (getSizeAkredJurusan > 256) {
                    Swal.fire({
                        allowOutsideClick: true,
                        showConfirmButton: false,
                        icon: 'warning',
                        title: '<div class="text-md text-center">File Akreditasi Jurusan Harus <br><b>Kurang dari 200 Kb</b></div>',
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    $("#err_file_akred_jurusan").html("File Akreditasi Jurusan Harus Kurang dari 200 Kb");
                }
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
                                getSizeSurat <= 1024 &&
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
                                    url: "_admin/exc/x_i_praktik_s.php?",
                                    data: data_praktik,
                                    success: function() {
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

                                        Swal.fire({
                                            allowOutsideClick: false,
                                            // isDismissed: false,
                                            icon: 'success',
                                            html: '<a href="?ptk" class="btn btn-outline-primary">OK</a>',
                                            title: '<span class"text-xs"><b>DATA PRAKTIK</b><br>Berhasil Tersimpan',
                                            showConfirmButton: false,
                                            timer: 1115000,
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
