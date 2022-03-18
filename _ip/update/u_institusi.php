<?php
$sql = "SELECT * FROM tb_institusi ";
$sql .= " WHERE id_institusi = " . $_SESSION['id_institusi'];
$q = $conn->query($sql);

$d = $q->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Ubah Institusi</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg">
            <form class="form-data" enctype="multipart/form-data" method="POST" id="form_profil">
                <div class="card text-center shadow mb-4" style="max-width: 400px;">
                    <div class="card-body">
                        Institusi : <br>
                        <b> <?php echo $d['nama_institusi'] ?></b><br><br>
                        Akronim : <span class="text-danger">*</span><br>
                        <input type="text" class="form-control" name="akronim_institusi" id="akronim_institusi" maxlength="10" value="<?php echo $d['akronim_institusi'] ?>" required>
                        <span id="err_akronim" class="text-xs font-italic text-danger blink"></span>
                        <br><br>
                        Logo : <span class="text-danger">*</span>
                        <input type="file" name="logo_institusi" id="logo_institusi" accept="image/png"><br>
                        <span class="text-xs font-italic">Format File Logo harus PNG dan ukuran file dibawah 200 Kb</span><br>
                        <span id="err_logo" class="text-xs font-italic text-danger blink"></span>
                        <span id="approvedFiles" class="text-xs font-italic text-danger blink"></span>
                        <br><br>
                        Alamat : <span class="text-danger">*</span>
                        <textarea class="form-control" name="alamat_institusi" id="alamat_institusi" rows="8" required><?php echo $d['alamat_institusi'] ?></textarea>
                        <span id="err_alamat" class="text-xs font-italic text-danger blink"></span>
                        <br><br>
                        Akreditasi : <span class="text-danger">*</span>
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
                        <select class="form-control" name="akred_institusi" id="akred_institusi" required>
                            <option value="">-- Pilih --</option>
                            <option value="A" <?php echo $a; ?>>A</option>
                            <option value="B" <?php echo $b; ?>>B</option>
                            <option value="C" <?php echo $c; ?>>C</option>
                        </select>
                        <span id="err_akred" class="text-xs font-italic text-danger blink"></span>
                        <br><br>
                        Tanggal Berlaku Akreditasi : <span class="text-danger">*</span>
                        <input type="date" class="form-control" name="tglAkhirAkred_institusi" id="tglAkhirAkred_institusi" value="<?php echo $d['tglAkhirAkred_institusi'] ?>" required>
                        <span id="err_tglAkhirAkred" class="text-xs font-italic text-danger blink"></span>
                        <br><br>
                        File Akreditasi : <span class="text-danger">*</span>
                        <input type="file" name="fileAkred_institusi" id="fileAkred_institusi" accept="application/pdf" required><br>
                        <span class="text-xs font-italic">Format File Akreditasi harus pdf dan ukuran file dibawah 500 Kb</span><br>
                        <span id="err_fileAkred" class="text-xs font-italic text-danger blink"></span>
                        <br><br>
                        <span class="font-weight-bold font-italic text-xs"><span class="text-danger">*</span> : Wajib Diisi</span>
                        <hr>
                        <center>
                            <button type="button" class="btn btn-success btn-sm simpan" id="<?php echo $d['id_institusi']; ?>">
                                SIMPAN DATA
                            </button>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".simpan").click(function() {

        // var data_profil = $('#form_profil').serializeArray();
        var id = $(this).attr('id');
        var akronim = document.getElementById("akronim_institusi").value;
        var fileLogo = document.getElementById("logo_institusi").value;
        var alamat = document.getElementById("alamat_institusi").value;
        var akred = document.getElementById("akred_institusi").value;
        var tglAkhirAkred = document.getElementById("tglAkhirAkred_institusi").value;
        var fileAkred = document.getElementById("fileAkred_institusi").value;

        /* console.log(
            id + "--" +
            akronim + "--" +
            logo + "--" +
            alamat + "--" +
            akred + "--" +
            tglAkhirAkred + "--" +
            fileAkred
        ); */

        //Notif Bila tidak diisi
        if (
            akronim == "" ||
            fileLogo == "" ||
            alamat == "" ||
            akred == "" ||
            tglAkhirAkred == "" ||
            fileAkred == ""
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

            //notif akronim 
            if (akronim == "") {
                document.getElementById("err_akronim").innerHTML = "Akronim Harus Dipilih";
            } else {
                document.getElementById("err_akronim").innerHTML = "";
            }

            //notif logo 
            if (fileLogo == "") {
                document.getElementById("err_logo").innerHTML = "Logo Harus Dipilih";
            } else {
                document.getElementById("err_logo").innerHTML = "";
            }

            //notif alamat 
            if (alamat == "") {
                document.getElementById("err_alamat").innerHTML = "Alamat Harus Dipilih";
            } else {
                document.getElementById("err_alamat").innerHTML = "";
            }

            //notif akred 
            if (akred == "") {
                document.getElementById("err_akred").innerHTML = "Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_akred").innerHTML = "";
            }

            //notif Tanggal Berakhir Akreditasi
            if (tglAkhirAkred == "") {
                document.getElementById("err_tglAkhirAkred").innerHTML = "Tanggal Berakhir Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_tglAkhirAkred").innerHTML = "";
            }

            //notif File Akreditasi
            if (fileAkred == "") {
                document.getElementById("err_fileAkred").innerHTML = "File Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_fileAkred").innerHTML = "";
            }
        }

        //eksekusi bila logo terisi
        if (fileLogo != "") {

            //Cari ekstensi file surat yg diupload
            var typeLogo = document.querySelector('#logo_institusi').value;
            var getTypeLogo = typeLogo.split('.').pop();

            //cari ukuran file Logo yg diupload
            var fileLogo = document.getElementById("logo_institusi").files;
            var getSizeLogo = document.getElementById("logo_institusi").files[0].size / 1024;

            console.log("Size Logo : " + getSizeLogo);
            console.log("Type Logo : " + getTypeLogo);

            //Toast bila upload file Logo selain pdf
            if (getTypeLogo != 'png') {
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
                    title: '<div class="text-md text-center">File Logo Harus <b>.png</b></div>'
                });
                document.getElementById("err_logo_institusi").innerHTML = "File Logo Harus png";
            } //Toast bila upload file Logo diatas 200 Kb 
            else if (getSizeLogo > 256) {
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
                    title: '<div class="text-md text-center">File Logo Harus <br><b>Kurang dari 200 Kb</b></div>'
                });
                document.getElementById("err_logo_institusi").innerHTML = "File Logo Harus Kurang dari 1 Mb";
            }
        }

        //eksekusi bila file akred terisi
        if (fileAkred != "") {

            //Cari ekstensi File Akreditasi yg diupload
            var typefileAkred = document.querySelector('#fileAkred_institusi').value;
            var getTypefileAkred = typefileAkred.split('.').pop();

            //cari ukuran File Akreditasi yg diupload
            var filefileAkred = document.getElementById("fileAkred_institusi").files;
            var getSizefileAkred = document.getElementById("fileAkred_institusi").files[0].size / 1024;

            // console.log("Size Data Surat : " + getSizefileAkred);
            // console.log("Size data Surat : " + filefileAkred);

            //Toast bila upload File Akreditasi selain xlsx
            if (getTypefileAkred != 'pdf') {
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
                    title: '<div class="text-md text-center">File Akreditasi Harus <b>.pdf</b></div>'
                });
                document.getElementById("err_fileAkred_institusi").innerHTML = "File Akreditasi Harus pdf";
            } //Toast bila upload  File Akreditasi diatas 1 Mb
            else if (getSizefileAkred > 512) {
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
                    title: '<div class="text-md text-center">File File Akreditasi Harus <br><b>Kurang dari 500 Kb</b></div>'
                });
                document.getElementById("err_fileAkred_institusi").innerHTML = "File Akreditasi Harus Kurang dari 500 Kb";
            }
        }

        //simpan pengajuan profil institusi
        if (
            akronim != "" &&
            alamat != "" &&
            akred != "" &&
            tglAkhirAkred != "" &&
            fileLogo != "" &&
            getTypeLogo == 'png' &&
            getSizeLogo <= 256 &&
            fileAkred != "" &&
            getTypefileAkred == 'pdf' &&
            getSizefileAkred <= 512
        ) {
            document.getElementById("err_akronim").innerHTML = "";
            document.getElementById("err_logo").innerHTML = "";
            document.getElementById("err_alamat").innerHTML = "";
            document.getElementById("err_akred").innerHTML = "";
            document.getElementById("err_tglAkhirAkred").innerHTML = "";
            document.getElementById("err_fileAkred").innerHTML = "";

            var data_profil = $('#form_profil').serializeArray();


            data_profil.push({
                name: 'id_institusi',
                value: id
            });
            //Simpan Data Pengajuan Profil Institusi
            $.ajax({
                type: 'POST',
                url: "_ip/exc/x_u_institusi_u.php?",
                data: data_profil,
                success: function() {
                    //ambil data file yang diupload
                    var data_file = new FormData();
                    var xhttp = new XMLHttpRequest();

                    var fileLogo = document.getElementById("logo_institusi").files;
                    data_file.append("logo_institusi", fileLogo[0]);

                    var fileAkred = document.getElementById("fileAkred_institusi").files;
                    data_file.append("fileAkred_institusi", fileAkred[0]);

                    data_file.append("id", id);

                    xhttp.open("POST", "_ip/exc/x_u_institusi_uFileLogoAkred.php", true);
                    xhttp.send(data_file);

                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>DATA PENGAJUAN PROFIL</b><br>Berhasil Tersimpan',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    }).then(
                        function() {
                            document.location.href = "?ins";
                        }
                    );
                },
                error: function(response) {
                    console.log(response.responseText);
                    alert('eksekusi query gagal');
                }
            });
        }
    });
</script>