<?php
if ($d_prvl['c_praktik'] == "Y") {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800" id="title_praktik">Pengajuan Praktik</h1>
            </div>
        </div>
        <style>
            .loader {
                border: 8px solid #f3f3f3;
                border-radius: 50%;
                border-top: 8px solid #3498db;
                width: 15px;
                height: 15px;
                -webkit-animation: spin 2s linear infinite;
                /* Safari */
                animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                }

                100% {
                    -webkit-transform: rotate(360deg);
                }
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }
        </style>
        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_praktik">
            <!-- Data Pengajuan Praktik  -->
            <div id="data_praktik_input">
                <div class="card shadow mb-4">
                    <div class="card-body text-center">
                        <!-- Data Praktikan -->
                        <div class="row">
                            <div class="col-lg-12 text-lg b text-center text-gray-100 badge bg-primary mb-3">DATA PRAKTIK</div>
                        </div>
                        <!-- Nama Institusi, Nama Kelompok, dan Jumlah Praktik -->
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
                            <input name="id" id="id" value="<?= $id_praktik; ?>" hidden>
                            <input name="user" id="user" value="<?= $_SESSION['id_user']; ?>" hidden>
                            <div class="col">
                                <?php if ($d_user['level_user'] == 2) {
                                    $sql_institusi = "SELECT * FROM tb_user";
                                    $sql_institusi .= " JOIN tb_institusi ON tb_user.id_institusi = tb_institusi.id_institusi ASC";
                                    $sql_institusi .= " WHERE tb_user.id_user ASC";
                                    $q_institusi = $conn->query($sql_institusi);
                                    $d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC);
                                ?>
                                    <div class="b text-uppercase">
                                        <?php
                                        $d_institusi['nama_institusi'];
                                        if ($d_institusi['akronim_institusi'] != "") echo " (" . $d_institusi['akronim_institusi'] . ")";
                                        ?>
                                        <input name="institusi" id="institusi" value="<?= $_SESSION['id_user']; ?>" hidden>
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
                                        <!-- <del><i style='font-size:12px;'>Daftar Institusi yang MoU-nya masih berlaku</i></del> -->
                                        <div class="text-danger b  i text-xs blink" id="err_institusi"></div>
                                <?php
                                    }
                                } ?>
                            </div>
                            <div class="col">
                                Nama Gelombang/Kelompok : <span style="color:red">*</span><br>
                                <input type="text" class="form-control form-control-xs" name="kelompok" id="kelompok" placeholder="Isi Gelombang/Kelompok" required>
                                <div class="text-danger b  i text-xs blink" id="err_kelompok"></div>
                            </div>
                            <div class="col-2">
                                Jumlah Praktik: <span style="color:red">*</span><br>
                                <input type="number" min="1" class="form-control form-control-xs" name="jumlah" id="jumlah" placeholder="Isi Jumlah Praktik" required>
                                <div class="text-danger b  i text-xs blink" id="err_jumlah"></div>
                            </div>
                        </div>
                        <br>

                        <!-- Jurusan, Jenjang, profesi dan Akreditasi -->
                        <div class="row">
                            <div class="col-lg-4">
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
                            <div class="col-lg-4">
                                Jenjang : <span style="color:red">*</span><br>
                                <div class="loader-small" id="jenjangLoader" style="display: none;"></div>
                                <div id="jenjangData" style="display: none;"></div>
                                <span id="jenjangKet" class="b i">Pilih Jurusan Terlebih Dahulu</span>
                                <div class="text-danger b i text-xs blink" id="err_jenjang"></div>
                            </div>
                            <div class="col-lg-4">
                                Profesi : <span style="color:red">*</span><br>
                                <span id="profesiData" style="display: none;"></span>
                                <span id="profesiKet" class="b i">Pilih Jenjang Terlebih Dahulu</span>
                                <div class="text-danger b  i text-xs blink" id="err_profesi"></div>
                            </div>
                        </div>
                        <br>

                        <!-- Tanggal Mulai, Tanggal Selesai, Unggah Surat dan Data Praktikan -->
                        <div class="row">
                            <div class="col-lg-2">
                                Tanggal Mulai : <span style="color:red">*</span><br>
                                <input type="date" class="form-control form-control-xs" name="tgl_mulai_praktik" id="tgl_mulai" required>
                                <span class="text-danger b  i text-xs blink" id="err_tgl_mulai"></span>
                            </div>
                            <div class="col-lg-2">
                                Tanggal Selesai : <span style="color:red">*</span><br>
                                <input type="date" class="form-control form-control-xs" name="tgl_selesai_praktik" id="tgl_selesai" required>
                                <span class="text-danger b  i text-xs blink" id="err_tgl_selesai"></span>
                            </div>
                            <div class="col-lg-3">
                                No. Surat Institusi : <span style="color:red">*</span><br>
                                <input type="text" class="form-control form-control-xs" name="no_surat" placeholder="Isi no Surat Institusi" id="no_surat" required>
                                <span class="text-danger b  i text-xs blink" id="err_no_surat"></span>
                            </div>
                            <div class="col-lg-5">
                                <fieldset class="border p-2">
                                    Unggah Surat Institusi: <span style="color:red">*</span><br />
                                    <input class="form-control-file" type="file" name="surat_praktik" id="file_surat" accept="application/pdf" required>
                                </fieldset>
                                <i style='font-size:12px;'>Data unggah harus .pdf dan maksimal ukuran file 1 Mb</i>
                                <div class="text-danger b  i text-xs blink" id="err_file_surat"></div>
                            </div>
                        </div>

                        <!-- Koordinator -->
                        <div class=" row">
                            <div class="col-lg-12 text-lg b text-center text-gray-100 badge bg-primary">KORDINATOR</div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                Nama : <span style="color:red">*</span><br>
                                <input type="text" class="form-control form-control-xs" name="nama_koordinator" id="nama_koordinator" placeholder="Isi Nama Koordinator" value="<?= $d_user['nama_user']; ?>" required>
                                <span class="text-danger b  i text-xs blink" id="err_nama_koordinator"></span>
                            </div>
                            <div class="col-lg-4">
                                Email :<br>
                                <input type="text" class="form-control form-control-xs" name="email_koordinator" id="email_koordinator" placeholder="Isi Email Koordinator" value="<?= $d_user['email_user']; ?>">
                            </div>
                            <div class="col-lg-4">
                                Telpon : <span style="color:red">*</span><br>
                                <input type="number" class="form-control form-control-xs" name="telp_koordinator" id="telp_koordinator" placeholder="Isi Telpon Koordinator" min="1" value="<?= $d_user['no_telp_user']; ?>" required>
                                <i style='font-size:12px;'>Isian hanya berupa angka</i>
                                <br><span class="text-danger b  i text-xs blink" id="err_telp_koordinator"></span>
                            </div>
                        </div>

                        <!-- Mess -->
                        <div class=" row">
                            <div class="col-lg-12 text-lg b text-center text-gray-100 badge bg-primary">MESS</div>
                        </div>
                        <div id="data_makan_mess">
                            <div class="text-center mb-3">
                                Pemilihan Mess/Pemondokan dengan Makan : <span class="text-danger">*</span><br>
                            </div>
                            <div class="row boxed-check-group boxed-check-xs boxed-check-primary justify-content-center">
                                <label class="boxed-check">
                                    <input class="boxed-check-input" type="radio" name="makan_mess" id="makan_mess1" value="Y">
                                    <div class="boxed-check-label">Dengan Makan (3x Sehari)</div>
                                </label>
                                &nbsp;
                                &nbsp;
                                <label class="boxed-check">
                                    <input class="boxed-check-input" type="radio" name="makan_mess" id="makan_mess2" value="T">
                                    <div class="boxed-check-label">Tanpa Makan</div>
                                </label>
                            </div>
                            <div class="text-danger b i text-xs blink" id="err_makan_mess"></div>
                            <hr>
                        </div>

                        <!-- Tombol Simpan Praktik-->
                        <div id="simpan_praktik_tarif" class="nav btn justify-content-center">
                            <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                                <button type="button" name="simpan_praktik" id="simpan_praktik" class="btn btn-outline-success">
                                    <i class="fas fa-check-circle"></i>
                                    Simpan Data Praktik
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
            $('#jenjangData').load('_admin/insert/i_praktikDataJenjang.php?jur=' + $("#jurusan").val());
            $('#jenjangKet').fadeOut(0);
            $('#jenjangData').fadeIn(0);
            $('#profesiData').fadeOut(0);
            $('#profesiKet').fadeIn(0);
        });

        $("#simpan_praktik").click(function() {

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
            var file_surat = $("#file_surat").val();
            var nama_koordinator = $("#nama_koordinator").val();
            var email_koordinator = $("#email_koordinator").val();
            var telp_koordinator = $("#telp_koordinator").val();
            var makan_mess = $('input[name="makan_mess"]:checked').val();

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
                file_surat == "" ||
                file_surat == undefined ||
                nama_koordinator == "" ||
                telp_koordinator == "" ||
                makan_mess == undefined
            ) {
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

                // notif file_surat
                if (file_surat == "" || file_surat == undefined) {
                    $("#err_file_surat").html("File Surat Harus Unggah");
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

                //notif telp_koordinator
                if (makan_mess == undefined) {
                    $("#err_makan_mess").html("Makan Harus Dipilih");
                } else {
                    $("#err_makan_mess").html("");
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
                    $("#err_file_surat").html("File Surat Harus pdf");
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
                    $("#err_file_surat").html("File Surat Harus Kurang dari 1 Mb");
                }
            }

            //Alert jika Tanggal Selesai kurang dari tanggal mulai
            if (
                (tgl_selesai <= tgl_mulai) &&
                (tgl_mulai != "" && tgl_selesai != "") ||
                (tgl_mulai == "" && tgl_selesai == "")
            ) {
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
                $("#err_tgl_selesai").html("<b>Tanggal Selesai</b> Harus Lebih dari <b>Tanggal Mulai</b>");
            }
            //bila tanggal mulai dan selesai sesuai
            else {
                //Cek Data Ketersediaan Jadwal Praktik
                $.ajax({
                    type: 'POST',
                    url: "_admin/insert/i_praktik_valTgl.php",
                    data: data_praktik,
                    dataType: 'json',
                    success: function(response) {
                        //notif jika jadwal dan/ jumlah praktik melebihi kuota
                        if (response.ket == 'T') {
                            console.log('Praktik Tidak Bisa');
                            Swal.fire({
                                allowOutsideClick: false,
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
                                    // document.location.href = "?prk";
                                }
                            );
                        }
                        //eksekusi bila jadwal tersedia
                        else if (response.ket == 'Y') {
                            console.log('Praktik Bisa');
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
                                file_surat != undefined &&
                                getTypeSurat == 'pdf' &&
                                getSizeSurat <= 1024 &&
                                nama_koordinator != "" &&
                                telp_koordinator != "" &&
                                makan_mess != undefined
                            ) {
                                //push data makan_mess    
                                data_praktik.push({
                                    name: 'makan_mess',
                                    value: makan_mess
                                });

                                //Simpan Data Praktik dan Tarif
                                $.ajax({
                                    type: 'POST',
                                    url: "_admin/exc/x_i_praktik_sPraktik.php?",
                                    data: data_praktik,
                                    success: function() {
                                        //ambil data file yang diupload
                                        var data_file = new FormData();
                                        var xhttp = new XMLHttpRequest();

                                        var fileSurat = document.getElementById("file_surat").files;
                                        data_file.append("file_surat", fileSurat[0]);

                                        var id = document.getElementById("id").value;
                                        data_file.append("id", id);

                                        xhttp.open("POST", "_admin/exc/x_i_praktik_sPraktikFile.php", true);
                                        xhttp.send(data_file);

                                        Swal.fire({
                                            allowOutsideClick: false,
                                            // isDismissed: false,
                                            icon: 'success',
                                            title: '<span class"text-xs"><b>DATA PRAKTIK</b><br>Berhasil Tersimpan',
                                            showConfirmButton: false,
                                            timer: 115000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        }).then(
                                            function() {
                                                document.location.href = "?prk";
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
                    // ,
                    // error: function() {
                    //     // console.log(response.responseText);
                    //     alert('eksekusi query Val.Jadwal Praktik gagal');
                    // }
                });
            }
        });
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