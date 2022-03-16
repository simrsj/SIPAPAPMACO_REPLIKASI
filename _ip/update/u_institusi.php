<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Ubah Institusi</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <form class="form-group" enctype="multipart/form-data" method="POST">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM tb_institusi ";
                        $sql .= " WHERE id_institusi = " . $_SESSION['id_institusi'];
                        $q = $conn->query($sql);

                        $d = $q->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="row col">
                            Institusi : <br>
                            <b> <?php echo $d['nama_institusi'] ?></b>
                            <input type="hidden" name="nama_institusi" value="<?php echo $d['nama_institusi'] ?>">
                            <input type="hidden" name="id_institusi" value="<?php echo $d['id_institusi'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                Akronim : <br>
                                <input type="text" class="form-control" name="akronim_institusi" value="<?php echo $d['akronim_institusi'] ?>">
                                <br><br>
                                Logo : <br>
                                <input type="file" name="logo_institusi" id="logo_institusi" accept="image/png"><br>
                                <span class="text-xs font-italic">Format File PNG, ukuran file dibawah 500 Kb</span>
                                <br><br>
                            </div>
                            <div class="col-4">
                                Alamat : <br>
                                <textarea class="form-control" name="alamat_institusi" rows="8"><?php echo $d['alamat_institusi'] ?></textarea>
                            </div>
                            <div class="col-4">

                                Akreditasi : <span class="text-danger">*</span><br>
                                <?php
                                $a = "";
                                $b = "";
                                $c = "";
                                if ($d['akred_institusi'] == 'A') {
                                    $a = "selected";
                                } else if ($d['akred_institusi'] == 'B') {
                                    $b = "selected";
                                } else if ($d['akred_institusi'] == 'C') {
                                    $c = "selected";
                                }

                                ?>
                                <select class="form-control" name="akred_institusi" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="A" <?php echo $a; ?>>A</option>
                                    <option value="B" <?php echo $b; ?>>B</option>
                                    <option value="C" <?php echo $c; ?>>C</option>
                                </select>
                                <br>
                                Tanggal Berlaku Akreditasi : <span class="text-danger">*</span><br>
                                <input type="date" class="form-control" name="tglAkhirAkred_institusi" value="<?php echo $d['tglAkhirAkred_institusi'] ?>" required>
                                <br>
                                File Akreditasi : <span class="text-danger">*</span><br>
                                <input type="file" name="fileAkred_institusi" accept="application/pdf" required>
                            </div>
                        </div>
                        <span class="font-weight-bold font-italic"><span class=" text-danger">*</span> : Wajib Diisi</span>
                        <hr>
                        <center><button class="btn btn-success btn-sm" type="submit" name="simpan" onclick="uploadFile();">SIMPAN DATA</button></center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
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
        var makan = document.getElementById("telp_koordinator").value;

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
                    url: "_admin/exc/x_i_praktik_sPraktikTarif.php?",
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
                            var path = "?prk=ked";
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'success',
                                title: '<span class"text-xs"><b>DATA PRAKTIK</b><br>Berhasil Tersimpan',
                                showConfirmButton: false,
                                html: '<a href="' + path + '" class="btn btn-outline-primary">OK</a>',
                            });
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
                        url: "_admin/exc/x_i_praktik_sPraktikTarif.php?",
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
        }
    }
</script>