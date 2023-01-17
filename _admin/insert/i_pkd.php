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
                            <div class="col-md">
                                Rincian : <span style="color:red">*</span><br>
                                <textarea id="rincian" name="rincian" class="form-control form-control-xs" rows="4" placeholder="Isikan Rincian" required></textarea>
                                <div class="text-danger b i text-xs blink" id="err_rincian"></div>
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
        $("#simpan").click(function() {

            Swal.fire({
                title: 'Mohon Ditunggu . . .',
                html: ' <img src="./_img/d3f472b06590a25cb4372ff289d81711.gif" class="rotate mb-3" width="100" height="100" />',
                allowOutsideClick: false,
                showConfirmButton: false,
            });
            var data_pkd = $('#form_pkd').serializeArray();
            var pemohon = $("#pemohon").val();
            var rincian = $("#rincian").val();
            var tgl_pel = $("#tgl_pel").val();
            var file_surat = $("#file_surat").val();
            var nama_koordinator = $("#nama_koordinator").val();
            var telp_koordinator = $("#telp_koordinator").val();

            //Notif Bila tidak diisi
            if (
                pemohon == "" ||
                rincian == "" ||
                tgl_pel == "" ||
                file_surat == "" ||
                file_surat == undefined ||
                nama_koordinator == "" ||
                telp_koordinator == ""
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

                //notif pemohon 
                if (pemohon == "") {
                    $("#err_pemohon").html("Pemohon Harus Diisi");
                } else {
                    $("#err_pemohon").html("");
                }

                //notif rincian 
                if (rincian == "") {
                    $("#err_rincian").html("Rincian Harus Diisi");
                } else {
                    $("#err_rincian").html("");
                }

                //notif tgl_pel 
                if (tgl_pel == "") {
                    $("#err_tgl_pel").html("Tanggal Pelaksanaan Harus Dipilih");
                } else {
                    $("#err_tgl_pel").html("");
                }

                //notif file_surat 
                if (file_surat == "" || file_surat == undefined) {
                    $("#err_file_surat").html("File Surat Harus Dipilih");
                } else {
                    $("#err_file_surat").html("");
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
        });
    </script>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
