<?php
if ($_GET['i'] == 'ked' || $_GET['i'] == 'kep' || $_GET['i'] == 'nkn') {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Praktikan</h1>
            </div>
        </div>
        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_praktik">
            <!-- Data Pendaftaran Praktik  -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <!-- Data Praktikan -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-lg font-weight-bold text-center"> DATA PRAKTIKAN</div>
                        </div>
                    </div>
                    <hr>
                    <div id="data_praktik_input">
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
                            <input name="user" value="<?php echo $_SESSION['id_user']; ?>" id="id" hidden>
                            <div class="col-lg-5 ">
                                Nama Institusi : <span style="color:red" id="input_institusi_">*</span><br>
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
                                    <div class="text-danger font-weight-bold  font-italic text-xs" id="err_institusi"></div>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data MoU Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-lg-5">
                                Gelombang/Kelompok : <span style="color:red">*</span><br>
                                <input type="text" class="form-control" name="nama_praktik" placeholder="Isi Gelombang/Kelompok" id="praktik" required>
                                <div class="text-danger font-weight-bold  font-italic text-xs" id="err_praktik"></div>
                            </div>
                            <div class="col-lg-2">
                                Jumlah Praktikan : <span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="jumlah_praktik" min="1" id="jumlah" required>
                                <span class="text-danger font-weight-bold  font-italic text-xs" id="err_jumlah"></span>
                            </div>
                        </div>
                        <br>

                        <!-- Jurusan, Jenjang, Spesifikasi dan Akreditasi -->
                        <div class="row">
                            <div class="col-lg-3">
                                Pilih Jurusan : <span style="color:red">*</span><br>
                                <?php
                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd != 0 ORDER BY nama_jurusan_pdd ASC";

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
                                    <span class="text-danger font-weight-bold  font-italic text-xs" id="err_jurusan"></span>
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
                                $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd 
                                WHERE (id_jenjang_pdd != 0 && id_jenjang_pdd != 11)
                                ORDER BY id_jenjang_pdd ASC";

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
                                    <span class="text-danger font-weight-bold  font-italic text-xs" id="err_jenjang"></span>
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
                                    </select><br>
                                    <span class="text-xs font-italic">Bila tidak ada yang sesuai, pilih <b>"-- Lainnya --"</b></span>
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
                                    <span class="text-danger font-weight-bold  font-italic text-xs" id="err_akreditasi"></span>
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
                                <span class="text-danger font-weight-bold  font-italic text-xs" id="err_tgl_mulai"></span>
                            </div>
                            <div class="col-lg-2">
                                Tanggal Selesai : <span style="color:red">*</span><br>
                                <input type="date" class="form-control" name="tgl_selesai_praktik" id="tgl_selesai" required>
                                <span class="text-danger font-weight-bold  font-italic text-xs" id="err_tgl_selesai"></span>
                            </div>
                            <div class="col-lg-4">
                                Unggah Surat : <span style="color:red">*</span><br>
                                <input type="file" name="surat_praktik" id="file_surat" accept="application/pdf" required>
                                <br><i style='font-size:12px;'>Data unggah harus .pdf dan maksimal ukuran file 1 Mb</i>
                                <br><span class="text-danger font-weight-bold  font-italic text-xs" id="err_file_surat"></span>
                            </div>
                            <div class="col-lg-4">
                                Unggah Data Praktikan : <span style="color:red">*</span>
                                <i style='font-size:12px;'><a href="./_file/format_data_praktikan.xlsx">Download Format</a></i><br>
                                <input type="file" name="data_praktik" id="file_data_praktikan" accept=".xlsx">
                                <br><i style='font-size:12px;'>Data unggah harus .xlsx dan maksimal ukuran file 1 Mb</i>
                                <br><span class="text-danger font-weight-bold  font-italic text-xs" id="err_file_data_praktikan"></span>
                            </div>
                        </div>
                        <hr>

                        <!-- Penanggung Jawab/Pembimbing/Mentor -->
                        <div class=" row">
                            <div class="col-lg-12 text-center">
                                <b>Penanggung Jawab/Pembimbing/Mentor</b>
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
                                <input type="text" class="form-control" name="nama_pembimbing_praktik" id="nama_pembimbing" placeholder="Isi Nama Pembimbing" value="<?php echo $d_user['nama_user']; ?>" required><span class="text-danger font-weight-bold  font-italic text-xs" id="err_nama_pembimbing"></span>
                            </div>
                            <div class="col-lg-4">
                                Email :<br>
                                <input type="text" class="form-control" name="email_pembimbing_praktik" id="email_pembimbing" placeholder="Isi Email Pembimbing" value="<?php echo $d_user['email_user']; ?>">
                            </div>
                            <div class="col-lg-4">
                                Telpon : <span style="color:red">*</span><br>
                                <input type="number" class="form-control" name="telp_pembimbing_praktik" id="telp_pembimbing" placeholder="Isi Telpon Pembimbing" min="1" value="<?php echo $d_user['no_telp_user']; ?>" required>
                                <i style='font-size:12px;'>Isian hanya berupa angka</i>
                                <br><span class="text-danger font-weight-bold  font-italic text-xs" id="err_telp_pembimbing"></span>
                            </div>
                        </div>
                        <i class="font-weight-bold"><span style="color:red">*</span> : Wajib diisi</i>

                        <!-- Tombol Lanjut ke Daftar Harga-->
                        <nav id="navbar-harga" class="navbar justify-content-center">
                            <button type="button" id="tombol_data_praktik" class="nav-link btn btn-outline-primary" onclick="simpan_praktik()">
                                <!-- <a class="nav-link" href="#harga"> -->
                                <i class="fas fa-chevron-circle-down"></i>
                                Lanjut Ke Daftar Harga
                                <i class="fas fa-chevron-circle-down"></i>
                                <!-- </a> -->
                            </button>
                        </nav>
                    </div>
                    <div id="data_praktik_simpan"></div>
                </div>
            </div>
        </form>

        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_harga">
            <!-- Data Harga Praktik  -->
            <div class='card shadow mb-4' id="harga_praktik">
                <div class='card-body'>
                    <div class="text-lg font-weight-bold text-center">DATA HARGA</div>
                    <div id="harga">
                        <div id="data_pilih_harga">
                            <div class="jumbotron" id="harga_praktik_nondata">
                                <div class="jumbotron-fluid text-center">
                                    DATA PRAKTIK BELUM DIPILIH
                                </div>
                            </div>
                            <div id="harga_praktik_data"></div>
                            <span class="text-md font-italic font-weight-bold"><span class="text-danger">*</span>Kuantitas = Jumlah Praktikan</span>
                            <hr>
                            <div id="simpan_praktik_harga" class="nav btn justify-content-center text-md" style="display: none;">
                                <button type="button" name="simpan_praktik" id="simpan_praktik" class="btn btn-outline-success" onclick="simpan_harga()">
                                    <!-- <a class="nav-link" href="#harga"> -->
                                    <i class="fas fa-check-circle"></i>
                                    Simpan Data Praktik dan Data Harga
                                    <i class="fas fa-check-circle"></i>
                                    <!-- </a> -->
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- <pre id="whereToPrint"> ce :</pre> -->

    <script type="text/javascript">
        function simpan_praktik() {

            var id = document.getElementById("id").value;
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

            // //Cari ekstensi file data praktikan yg diupload
            // var file_data_praktikan = document.querySelector('#file_data_praktikan').value;
            // var type_data_praktikan = file_data_praktikan.split('.').pop();

            // //cari ukuran file data praktikan yg diupload
            // files = document.getElementById("file_data_praktikan").files;
            // var size_data_praktikan = document.getElementById("file_data_praktikan").files[1].size / 1024;


            //Notif Bila tidak diisi
            var notif_tidak_diisi = "";
            if (
                institusi == "" ||
                praktik == "" ||
                jurusan == "" ||
                akreditasi == "" ||
                jumlah == "" ||
                tgl_mulai == "" ||
                tgl_selesai == "" ||
                file_surat == "" ||
                // type_surat != "pdf" ||
                // size_surat > 1024 ||
                file_data_praktikan == "" ||
                // type_data_praktikan != "xlsx" ||
                // size_data_praktikan > 1024 ||
                nama_pembimbing == "" ||
                telp_pembimbing == ""
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
                    nama_pembimbing + "--" +
                    email_pembimbing + "--" +
                    telp_pembimbing
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

            // var files1;


            //eksekusi bila file surat terisi
            if (file_surat != "") {
                //Cari ekstensi file surat yg diupload
                var typeSurat = document.querySelector('#file_surat').value;
                var getTypeSurat = typeSurat.split('.').pop();

                //cari ukuran file surat yg diupload
                var files = document.getElementById("file_surat").files;
                var getSizeSurat = document.getElementById("file_surat").files[0].size / 1024;

                // console.log("Size Surat : " + getSizeSurat);

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
                var files = document.getElementById("file_data_praktikan").files;
                var getSizeDataPraktikan = document.getElementById("file_data_praktikan").files[0].size / 1024;

                // console.log("Size Data Surat : " + getSizeDataPraktikan);

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


            //Simpan Data Praktik dan munculkan Data Harga
            if (
                institusi != "" &&
                praktik != "" &&
                jurusan != "" &&
                akreditasi != "" &&
                jumlah != "" &&
                tgl_mulai != "" &&
                tgl_selesai != "" &&
                file_surat != "" &&
                getTypeSurat == 'pdf' &&
                getSizeSurat <= 1024 &&
                file_data_praktikan != "" &&
                getTypeDataPraktikan == 'xlsx' &&
                getSizeDataPraktikan <= 1024 &&
                nama_pembimbing != "" &&
                telp_pembimbing != "" &&
                tgl_selesai > tgl_mulai
            ) {
                //data dari form_praktik
                var data_praktik = $('#form_praktik').serializeArray();
                // document.getElementById("whereToPrint").innerHTML = JSON.stringify(data_praktik, null, 4);

                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_data_praktik.php",
                    data: {
                        data_praktik
                    },
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function() {
                        document.getElementById("form_praktik");
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
                            icon: 'success',
                            title: '<div class="text-md text-center"><b>DATA PRAKTIK TERSIMPAN</b><br>LANJUTKAN KE <b>DATA HARGA</b></div>'
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });

                console.log("asdasd");

                //ambil data file yang diupload
                var dataFileSurat = new FormData();
                dataFileSurat.append("file_surat", files[0]);
                dataFileSurat.append("id", id);

                var xhttpDataFileSurat = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttpDataFileSurat.open("POST", "_admin/exc/x_i_dataFileSurat.php?id=" + id, true);

                // Send request with data
                xhttpDataFileSurat.send(dataFileSurat);

                var dataFileDataPraktikan = new FormData();
                dataFileDataPraktikan.append("file_data_praktikan", files[0]);
                dataFileDataPraktikan.append("id", id);

                var xhttpDataFileDataPraktikan = new XMLHttpRequest();

                // Set POST method and ajax file path
                xhttpDataFileDataPraktikan.open("POST", "_admin/exc/x_i_dataFileDataPraktikan.php?id=" + id, true);

                // Send request with data
                xhttpDataFileDataPraktikan.send(dataFileDataPraktikan);

                // $("#tombol_data_praktik").fadeOut('fast');
                $("#harga_praktik_nondata").fadeOut('fast');
                $("#harga_praktik_data").fadeIn('slow');
                $("#simpan_praktik_harga").fadeIn('slow');

                //Menghilangkan Inputan Form Data Praktik
                $("#data_praktik_input").fadeOut('fast');

                //Memunculkan Data Praktik yang Disimpan
                $("#data_praktik_simpan").fadeIn('fast');

                // Kirim Parameter ke Data Praktik untuk ditampilkan kembali
                var xmlhttp_data_praktik = new XMLHttpRequest();
                xmlhttp_data_praktik.onreadystatechange = function() {
                    document.getElementById("data_praktik_simpan").innerHTML = this.responseText;
                };
                xmlhttp_data_praktik.open("GET", "_admin/insert/data_praktik.php?id=" + id, true);
                xmlhttp_data_praktik.send();

                // Kirim Parameter ke Data Harga untuk ditampilkan
                var xmlhttp_data_harga = new XMLHttpRequest();
                xmlhttp_data_harga.onreadystatechange = function() {
                    document.getElementById("harga_praktik_data").innerHTML = this.responseText;
                };
                xmlhttp_data_harga.open("GET", "_admin/insert/data_harga.php?jur=" + jurusan +
                    "&jen=" + jenjang +
                    "&tmp=" + tgl_mulai +
                    "&tsp=" + tgl_selesai +
                    "&jum=" + jumlah,
                    true
                );
                xmlhttp_data_harga.send();
            }
        }

        function simpan_harga() {

            //Notif dan Toast Bila Ujian Tidak dipilih
            if (document.getElementById("cek_pilih_ujian1").checked == false && document.getElementById("cek_pilih_ujian2").checked == false) {
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
                    title: '<center>Pilih Ujian <b>Ya</b> atau <b>Tidak</b></center>'
                });
                document.getElementById("err_cek_pilih_ujian").innerHTML = "Pilih Ujian <br>";
            }
            //simpan data praktik dan data harga
            else {
                document.getElementById("err_cek_pilih_ujian").innerHTML = "";
                var cek_pilih_ujian = "";
                if (document.getElementById("cek_pilih_ujian1").checked == true) {
                    cek_pilih_ujian = document.getElementById("cek_pilih_ujian1").value;
                } else if (document.getElementById("cek_pilih_ujian2").checked == true) {
                    cek_pilih_ujian = document.getElementById("cek_pilih_ujian2").value;
                }
                var data_praktik = $('#form_praktik').serializeArray();
                data_praktik.push({
                    name: 'cek_pilih_ujian',
                    value: cek_pilih_ujian
                });
                // alert(cek_ujian + 'asdasd');
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_data_harga.php?",
                    data: data_praktik,
                    success: function() {
                        document.getElementById("form_praktik");
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
                            icon: 'success',
                            title: '<div class="text-md text-center">DATA BERHASIL TERSIMPAN</div>'
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }
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