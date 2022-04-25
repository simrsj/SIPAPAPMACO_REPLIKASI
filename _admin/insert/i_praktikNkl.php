<?php
if ($_GET['prk'] == 'nkl') {
    $jenis_jurusan = 3;
?>
    <div class="container-fluid embed-responsive">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800" id="title_praktik">Pengajuan Praktik Nakes Lainnya</h1>
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
                                <div class="text-lg font-weight-bold text-center"> DATA PRAKTIKAN</div>
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
                                    </select>
                                    <del><i style='font-size:12px;'>Daftar Institusi yang MoU-nya masih berlaku</i></del>
                                    <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_institusi"></div>
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
                                <?php
                                if ($_GET['prk'] == 'kep') {
                                ?>
                                    Jurusan : <span style="color:red">*</span><br>
                                    <b>Keperawatan</b>
                                    <input type="hidden" name='id_jurusan_pdd' id="jurusan" value="2">
                                <?php
                                } else {
                                ?>
                                    Pilih Jurusan : <span style="color:red">*</span><br>
                                    <?php

                                    $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd_jenis = $jenis_jurusan ORDER BY nama_jurusan_pdd ASC";
                                    // echo $sql_jurusan_pdd;
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
                                                    <?php
                                                    if ($d_jurusan_pdd['akronim_jurusan_pdd'] != "") {
                                                        $nama_jurusan =  $d_jurusan_pdd['nama_jurusan_pdd'] . " (" . $d_jurusan_pdd['akronim_jurusan_pdd'] . ")";
                                                    } else {
                                                        $nama_jurusan =  $d_jurusan_pdd['nama_jurusan_pdd'];
                                                    }
                                                    echo $nama_jurusan;
                                                    ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_jurusan"></div>
                                    <?php
                                    } else {
                                    ?>
                                        <b><i>Data Jurusan Tidak Ada</i></b>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-lg-4">
                                Pilih Jenjang : <span style="color:red">*</span><br>
                                <?php
                                if ($_GET['prk'] == 'kep') {
                                    $sql_jenjang_pdd = " SELECT * FROM tb_jurusan_pdd_jenjang_profesi";
                                    $sql_jenjang_pdd .= " JOIN tb_jurusan_pdd ON tb_jurusan_pdd_jenjang_profesi.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
                                    $sql_jenjang_pdd .= " JOIN tb_jenjang_pdd ON tb_jurusan_pdd_jenjang_profesi.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd";
                                    $sql_jenjang_pdd .= " WHERE tb_jurusan_pdd.id_jurusan_pdd = 2";
                                    $sql_jenjang_pdd .= " ORDER BY tb_jenjang_pdd.nama_jenjang_pdd ASC";
                                } else {
                                    $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd ";
                                    $sql_jenjang_pdd .= " WHERE id_jenjang_pdd != 0 AND id_jenjang_pdd != 11";
                                    $sql_jenjang_pdd .= " ORDER BY id_jenjang_pdd ASC";
                                }

                                // echo $sql_jenjang_pdd;

                                $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                                $r_jenjang_pdd = $q_jenjang_pdd->rowCount();

                                if ($r_jenjang_pdd > 0) {
                                ?>
                                    <select class='form-control js-example-placeholder-single' name='id_jenjang_pdd' id="jenjang" required>
                                        <option value="">-- <i>Pilih</i>--</option>
                                        <?php
                                        while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                                            if (($_GET['prk'] == 'nnk' && $d_jenjang_pdd['id_jenjang_pdd'] == 9) || $d_jenjang_pdd['id_jenjang_pdd'] < 6 || $d_jenjang_pdd['id_jenjang_pdd'] > 9) {
                                                continue;
                                            } else {
                                        ?>
                                                <option value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                                    <?php echo $d_jenjang_pdd['nama_jenjang_pdd'] ?>
                                                </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_jenjang"></div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-lg-4">
                                <?php

                                if ($_GET['prk'] == 'kep') {
                                    $sql = " WHERE tb_jurusan_pdd.id_jurusan_pdd = 2";
                                } elseif ($_GET['prk'] == 'nkl') {
                                    $sql = " WHERE tb_jurusan_pdd.id_jurusan_pdd != 1 AND  tb_jurusan_pdd.id_jurusan_pdd != 2";
                                } else {
                                    $sql = " WHERE tb_jurusan_pdd.id_jurusan_pdd = 0";
                                }

                                $sql_profesi_pdd = " SELECT * FROM tb_jurusan_pdd_jenjang_profesi";
                                $sql_profesi_pdd .= " JOIN tb_jurusan_pdd ON tb_jurusan_pdd_jenjang_profesi.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd";
                                $sql_profesi_pdd .= " JOIN tb_profesi_pdd ON tb_jurusan_pdd_jenjang_profesi.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd";
                                $sql_profesi_pdd .= $sql;
                                $sql_profesi_pdd .= " GROUP BY tb_profesi_pdd.nama_profesi_pdd";
                                $sql_profesi_pdd .= " ORDER BY tb_profesi_pdd.nama_profesi_pdd ASC";
                                // echo $sql_profesi_pdd;
                                $q_profesi_pdd = $conn->query($sql_profesi_pdd);
                                ?>
                                Pilih Profesi : <span style="color:red">*</span><br>
                                <div id="profesi">
                                    <!-- <b><i>"Pilih Jenjang"</i></b> -->
                                    <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_profesi_pdd' id="profesi">
                                        <option value="">-- <i>Pilih</i>--</option>
                                        <?php
                                        while ($d_profesi_pdd = $q_profesi_pdd->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_profesi_pdd['id_profesi_pdd']; ?>'>
                                                <?php echo $d_profesi_pdd['nama_profesi_pdd'] ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div class="text-xs font-italic">Bila tidak ada yang sesuai, pilih <b>"-- Lainnya --"</b></div>
                                </div>
                                <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_profesi"></div>
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
                                <fieldset class="border p-2">
                                    Surat : <span style="color:red">*</span><br />
                                    <input type="file" name="surat_praktik" id="file_surat" accept="application/pdf" required>
                                </fieldset>
                                <i style='font-size:12px;'>Data unggah harus .pdf dan maksimal ukuran file 1 Mb</i>
                                <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_file_surat"></div>
                            </div>
                            <div class="col-lg-3">
                                <fieldset class="border p-2">
                                    Unggah Data Praktikan : <span style="color:red">*</span>
                                    <a class='text-xs text-uppercase badge badge-danger mb-2' href='#' data-toggle='modal' data-target='#modal_data_praktikan'>
                                        Info Format File
                                    </a>
                                    <br>

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
                        <i class="font-weight-bold"><span style="color:red">*</span> : Wajib diisi</i>

                        <!-- Tombol Lanjut ke Daftar Tarif-->
                        <nav id="navbar-tarif" class="navbar justify-content-center">
                            <button type="button" id="tombol_data_praktik" class="nav-link btn btn-outline-primary" onclick="simpan_praktik()">
                                <!-- <a class="nav-link" href="#tarif"> -->
                                <i class="fas fa-chevron-circle-down"></i>
                                Lanjut Ke Daftar Tarif
                                <i class="fas fa-chevron-circle-down"></i>
                                <!-- </a> -->
                            </button>
                        </nav>

                    </div>
                </div>
            </div>
        </form>
        <input type="hidden" name="path" value="<?php echo $_GET['prk']; ?>" id="path">
        <div id="data_tarif_input"></div>
    </div>

    <!-- <pre id="whereToPrint"> ce :</pre> -->

    <script type="text/javascript">
        // function getJenjang() {
        //     console.log("getJenjang");
        //     var xmlhttp_data_jenjang = new XMLHttpRequest();
        //     xmlhttp_data_jenjang.onreadystatechange = function() {
        //         document.getElementById("dataJenjang").innerHTML = this.responseText;
        //     };
        //     xmlhttp_data_jenjang.open("GET", "_admin/insert/i_praktikDataJenjang.php?id" + document.getElementById("id"),
        //         true
        //     );
        //     xmlhttp_data_jenjang.send();
        // }
        function bukaJenjang() {
            var id_jurusan_pdd = $('#id_jurusan_pdd').val();
            console.log("jenjang");
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_i_praktik_dataJenjangProfesi.php",
                //  dataType: 'json',
                data: {
                    id_jurusan_pdd: id_jurusan_pdd
                },

                success: function(response) {
                    console.log(response);
                    console.log("beres");
                    // $('#id_kegiatan').empty();

                    // $('#id_kegiatan').append('<option value="0">- Pilih Nama Kegiatan -</option>');

                    // $.each(response.data, function(key,value){
                    //         $('#id_kegiatan').append(
                    //             $('<option></option>').val(value['id_kegiatan']).html(value['kodering_kegiatan'] +"-"+ value['nama_kegiatan'])
                    //         );
                    // });        
                },
                error: function(response) {
                    console.log(response);
                    // alert('eksekusi query gagal');
                }
            });
            // //Simpan Data Praktik dan Tarif
            // $.ajax({
            //         // type: 'POST',
            //         url: "_admin/exc/x_i_praktik_sPraktikTarif.php?",
            //         data: jurusan:id_jurusan,
            //         success: function() {
            //             //ambil data file yang diupload
            //             var data_file = new FormData();
            //             var xhttp = new XMLHttpRequest();

            //             var fileSurat = document.getElementById("file_surat").files;
            //             data_file.append("file_surat", fileSurat[0]);

            //             var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
            //             data_file.append("file_data_praktikan", fileDataPraktikan[0]);

            //             var id = document.getElementById("id").value;
            //             data_file.append("id", id);

            //             xhttp.open("POST", "_admin/exc/x_i_praktik_sFilePraktik.php", true);
            //             xhttp.send(data_file);

            //             //Cari Jenis Jurusan
            //             var jur = document.getElementById('jurusan').value;
            //             var xmlhttp_path = new XMLHttpRequest();
            //             xmlhttp_path.onload = function() {
            //                 var path = "";
            //                 var pathResponse = JSON.parse(this.responseText);
            //                 if (pathResponse.jenis_jurusan == 1) {
            //                     path = "?prk=ked";
            //                 } else if (pathResponse.jenis_jurusan == 2) {
            //                     path = "?prk=kep";
            //                 } else if (pathResponse.jenis_jurusan == 3) {
            //                     path = "?prk=nkl";
            //                 } else if (pathResponse.jenis_jurusan == 4) {
            //                     path = "?prk=nnk";
            //                 } else {
            //                     path = "?";
            //                 }
            //                 Swal.fire({
            //                     allowOutsideClick: false,
            //                     // isDismissed: false,
            //                     icon: 'success',
            //                     title: '<span class"text-xs"><b>DATA PRAKTIK</b> dan <b>TARIF</b><br>Berhasil Tersimpan',
            //                     showConfirmButton: false,
            //                     html: '<a href="' + path + '" class="btn btn-outline-primary">OK</a>',
            //                 });
            //             };
            //             xmlhttp_path.open("GET", "_admin/insert/i_praktikPath.php?jur=" + jur,
            //                 true
            //             );
            //             xmlhttp_path.send();
            //         },
            //         error: function(response) {
            //             console.log(response.responseText);
            //             alert('eksekusi query gagal');
            //         }
            //     });
        }

        function bukaProfesi() {
            var id_jurusan = $('#id_jurusan_pdd').val();
        }

        function tutupProfesiKep() {
            // console.log("tutupProfesiKep");
            var jenjang = $("#jenjang").val();
            if (jenjang == 9) {
                $("#jenjang_profesi").fadeOut(1);
                document.getElementById("NERS").innerHTML = "<b>NERS</b>";
                document.getElementById("profesi").innerHTML = "";
            } else {
                $("#jenjang_profesi").fadeIn(1);
                document.getElementById("NERS").innerHTML = "";
                document.getElementById("profesi").innerHTML = "-";
            }

        }

        function simpan_praktik() {

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

                //notif jurusan 
                if (jurusan != 2) {
                    if (jurusan == "") {
                        document.getElementById("err_jurusan").innerHTML = "Jurusan Harus Diisi";
                    } else {
                        document.getElementById("err_jurusan").innerHTML = "";
                    }
                }

                //notif jenjang 
                if (jenjang == "") {
                    document.getElementById("err_jenjang").innerHTML = "Jenjang Harus Diisi";
                } else {
                    document.getElementById("err_jenjang").innerHTML = "";
                }

                //notif profesi 
                if (profesi == "") {
                    document.getElementById("err_profesi").innerHTML = "Profesi Harus Diisi";
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
                    document.getElementById("err_no_surat").innerHTML = "No. Surat Praktik Harus Diisi";
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

                // console.log("Size Data Surat : " + getSizeDataPraktikan);
                // console.log("Size data Surat : " + fileDataPraktikan);

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
                url: "_admin/insert/i_praktik_valTgl.php?",
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

                        //Simpan Data Praktik dan munculkan Data Tarif
                        if (
                            institusi != "" &&
                            praktik != "" &&
                            jurusan != "" &&
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

                            if (jurusan != 2) {
                                document.getElementById("err_jurusan").innerHTML = "";
                            }

                            document.getElementById("err_jenjang").innerHTML = "";
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

                            //data dari form_praktik
                            var data_praktik = $('#form_praktik').serializeArray();
                            // // document.getElementById("whereToPrint").innerHTML = JSON.stringify(data_praktik, null, 4);

                            $("#data_praktik_input").fadeOut('fast');
                            $("#data_tarif_input").fadeIn('slow');

                            // Kirim Parameter ke Data Tarif untuk ditampilkan
                            var xmlhttp_data_tarif = new XMLHttpRequest();
                            xmlhttp_data_tarif.onreadystatechange = function() {
                                document.getElementById("data_tarif_input").innerHTML = this.responseText;
                            };
                            xmlhttp_data_tarif.open("GET", "_admin/insert/i_praktikDataTarif.php?id=" + id +
                                "&jur=" + jurusan +
                                "&jen=" + jenjang +
                                "&tmp=" + tgl_mulai +
                                "&tsp=" + tgl_selesai +
                                "&jum=" + jumlah,
                                true
                            );
                            xmlhttp_data_tarif.send();

                            //Toast Lanjut Ke Data Tarif
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
                                icon: 'info',
                                title: '<div class="text-md text-center">LANJUTKAN KE <b>MENU TARIF</b></div>'
                            });
                        }
                    }
                },
                error: function() {
                    console.log(response.responseText);
                    alert('eksekusi query Val.Jadwal Praktik gagal');
                }
            });
        }

        function simpan_tarif() {

            //Notif dan Toast Bila Ujian Tidak dipilih
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
            } //Notif dan Toast Bila Ujian Tidak dipilih
            else if (document.getElementById("cek_pilih_ujian1").checked == false && document.getElementById("cek_pilih_ujian2").checked == false) {
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
                document.getElementById("err_makan_mess").innerHTML = "";
                document.getElementById("err_cek_pilih_ujian").innerHTML = "Pilih Ujian <br>";
            }
            //simpan data praktik dan data tarif
            else {

                //ambil data dari tag from form_praktik
                var data_praktik = $('#form_praktik').serializeArray();

                //cek data ujian
                var cek_pilih_ujian = "";
                if (document.getElementById("cek_pilih_ujian1").checked == true) {
                    cek_pilih_ujian = document.getElementById("cek_pilih_ujian1").value;
                } else if (document.getElementById("cek_pilih_ujian2").checked == true) {
                    cek_pilih_ujian = document.getElementById("cek_pilih_ujian2").value;
                }

                //push data profesi
                var jenjang = document.getElementById("jenjang").value;
                var profesi = 0;
                console.log('jenjang' + jenjang);
                if (jenjang == 9) {
                    profesi = 5;
                } else {
                    profesi = document.getElementById("profesi").value;
                }
                console.log('profesi' + profesi);

                data_praktik.push({
                    name: 'id_profesi_pdd',
                    value: profesi
                });

                //push data ujian    
                data_praktik.push({
                    name: 'cek_pilih_ujian',
                    value: cek_pilih_ujian
                });

                //cek data materi upip
                if (document.getElementById("jurusan").value == 2) {

                    var materi_upip = "";
                    if (document.getElementById("materi_upip").checked == true) {
                        materi_upip = document.getElementById("materi_upip").value;
                    }

                    //data materi upip
                    data_praktik.push({
                        name: 'materi_upip',
                        value: materi_upip
                    });
                }

                //cek data materi napza
                if (document.getElementById("jurusan").value == 2) {
                    var materi_napza = "";
                    if (document.getElementById("materi_napza").checked == true) {
                        materi_napza = document.getElementById("materi_napza").value;
                    }

                    //data materi napza
                    data_praktik.push({
                        name: 'materi_napza',
                        value: materi_napza
                    });
                }

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
                    url: "_admin/exc/x_i_praktik_sPraktikTarif.php?",
                    data: data_praktik,
                    success: function() {
                        //simpan file upload
                        var data_file = new FormData();
                        var xhttp = new XMLHttpRequest();

                        var fileSurat = document.getElementById("file_surat").files;
                        data_file.append("file_surat", fileSurat[0]);

                        var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
                        data_file.append("file_data_praktikan", fileDataPraktikan[0]);

                        var id = document.getElementById("id").value;
                        data_file.append("id", id);

                        xhttp.open("POST", "_admin/exc/x_i_praktik_sPraktikFile.php", true);
                        xhttp.send(data_file);

                        //import file excel ke database
                        var data_file_praktikan = new FormData();
                        var xhttp_data_praktikan = new XMLHttpRequest();

                        var fileDataPraktikan = document.getElementById("file_data_praktikan").files;
                        data_file_praktikan.append("file_data_praktikan", fileDataPraktikan[0]);

                        var id = document.getElementById("id").value;
                        data_file_praktikan.append("id", id);

                        xhttp_data_praktikan.open("POST", "_admin/exc/x_i_praktik_sPraktikDataPraktikan.php?", true);
                        xhttp_data_praktikan.send(data_file_praktikan);

                        //Cari Jenis Jurusan
                        var jur = document.getElementById('jurusan').value;
                        var xmlhttp_path = new XMLHttpRequest();
                        xmlhttp_path.onload = function() {
                            var path = "";
                            var pathResponse = JSON.parse(this.responseText);
                            if (pathResponse.jenis_jurusan == 1) {
                                path = "?prk=ked";
                            } else if (pathResponse.jenis_jurusan == 2) {
                                path = "?prk=kep";
                            } else if (pathResponse.jenis_jurusan == 3) {
                                path = "?prk=nkl";
                            } else if (pathResponse.jenis_jurusan == 4) {
                                path = "?prk=nnk";
                            } else {
                                path = "?";
                            }
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'success',
                                title: '<span class"text-xs"><b>DATA PRAKTIK</b> dan <b>TARIF</b><br>Berhasil Tersimpan',
                                showConfirmButton: false,
                                html: '<a href="' + path + '" class="btn btn-outline-primary">OK</a>',
                                timer: 500000,
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
                        xmlhttp_path.open("GET", "_admin/insert/i_praktikPath.php?jur=" + jur,
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