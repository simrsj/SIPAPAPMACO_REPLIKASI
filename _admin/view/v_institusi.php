<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 my-auto">
            <h1 class="h3 mb-2 text-gray-800">Daftar Institusi</h1>
        </div>
        <div class="col-lg-2 text-right my-auto">
            <button class='btn btn-outline-success btn-sm tambah_init'>
                <i class="fas fa-plus"></i> Tambah
            </button>
            <a class='btn btn-outline-primary btn-sm' href='?ins&val'>
                Validasi
            </a>
        </div>
    </div>

    <!-- form tambah institusi  -->
    <div class="card shadow mb-4 card-body" id="data_tambah_institusi" style="display: none;">
        <form class="form-data" method="post" id="form_tambah_institusi">
            <?php
            $sql_id_institusi = "SELECT * FROM tb_institusi";
            $sql_id_institusi .= " ORDER BY id_institusi ASC";

            $q_id_institusi = $conn->query($sql_id_institusi);
            if ($q_id_institusi->rowCount() > 0) {

                $no = 1;
                while ($d_id_institusi = $q_id_institusi->fetch(PDO::FETCH_ASSOC)) {
                    if ($no != $d_id_institusi['id_institusi']) {
                        $no = $d_id_institusi['id_institusi'] + 1;
                        break;
                    }
                    $no++;
                }
            }
            $id_institusi = $no;
            ?>
            <!-- Nama Institusi, MoU RSJ dan Institusi -->
            <input type="hidden" name="id_institusi" id="id_institusi" value="<?php echo $id_institusi; ?>">
            <div class="row mb-4">
                <div class="col-md ">
                    Nama Institusi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control" name="t_nama_institusi" id="t_nama_institusi" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_nama_institusi"></div>
                </div>
                <div class="col-md">
                    Akronim : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control" name="t_akronim_institusi" id="t_akronim_institusi" required>
                    <div class="font-italic text-xs">Maksimal 10 Karakter</div>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_akronim_institusi"></div>
                </div>
                <div class="col-md">
                    <fieldset class="border p-2">
                        Logo : <span class="text-danger">*</span>&nbsp;&nbsp;
                        <input type="file" name="t_logo_institusi" id="t_logo_institusi" accept="image/png" required>
                        <div class="font-italic text-xs">Logo harus PNG dan ukuran kurang dari 200 Kb</div>
                    </fieldset>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_logo_institusi"></div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md ">
                    Akreditasi Institusi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <select class="form-control" name="t_akred_institusi" id="t_akred_institusi" width="100%" required>
                        <option value=""></option>
                        <option value="-- Lainnya --">-- Lainnya --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_akred_institusi"></div>
                </div>
                <div class="col-md">
                    Tanggal Berlaku Akreditasi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input type="date" class="form-control" name="t_tglAkhirAkred_institusi" id="t_tglAkhirAkred_institusi" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_tglAkhirAkred_institusi"></div>
                </div>
                <div class="col-md">
                    <fieldset class="border p-2">
                        File Akreditasi : <span class="text-danger">*</span>&nbsp;&nbsp;
                        <input type="file" name="t_fileAkred_institusi" id="t_fileAkred_institusi" required>
                    </fieldset>
                    <div class="font-italic text-xs">File Akreditasi harus PDF dan ukuran kurang dari 1 Mb</div>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_fileAkred_institusi"></div>
                </div>
            </div>
            <div class="row mb-4">

                <div class="col-md">
                    Alamat Institusi : <br>
                    <textarea class="form-control" name="t_alamat_institusi" id="t_alamat_institusi"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-inline navbar nav-link justify-content-end">
                <button type="button" name="tambah" class="btn btn-success btn-sm tambah">
                    Tambah
                </button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-outline-danger btn-sm tambah_tutup">
                    Tutup
                </button>
            </div>
        </form>
    </div>

    <!-- form ubah institusi  -->
    <div class="card shadow mb-4 card-body" id="data_ubah_institusi" style="display: none;">
        <form class="form-data" method="post" id="form_ubah_institusi">
            <!-- Nama Institusi, MoU RSJ dan Institusi -->
            <input type="hidden" name="id_institusi" id="id_institusi">
            <div class="row mb-4">
                <div class="col-md ">
                    Nama Institusi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control" name="u_nama_institusi" id="u_nama_institusi" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_nama_institusi"></div>
                </div>
                <div class="col-md">
                    Akronim : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control" name="u_akronim_institusi" id="u_akronim_institusi" required>
                    <div class="font-italic text-xs">Maksimal 10 Karakter</div>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_akronim_institusi"></div>
                </div>
                <div class="col-md">
                    <fieldset class="border p-2">
                        Logo : <span class="text-danger">*</span>&nbsp;&nbsp;
                        <input type="file" name="u_logo_institusi" id="u_logo_institusi" accept="image/png" required>
                        <div class="font-italic text-xs">Logo harus PNG dan ukuran kurang dari 200 Kb</div>
                    </fieldset>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_logo_institusi"></div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md ">
                    Akreditasi Institusi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <select class="form-control" name="u_akred_institusi" id="u_akred_institusi" width="100%" required>
                        <option value=""></option>
                        <option value="-- Lainnya --">-- Lainnya --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_akred_institusi"></div>
                </div>
                <div class="col-md">
                    Tanggal Berlaku Akreditasi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input type="date" class="form-control" name="u_tglAkhirAkred_institusi" id="u_tglAkhirAkred_institusi" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_tglAkhirAkred_institusi"></div>
                </div>
                <div class="col-md">
                    <fieldset class="border p-2">
                        File Akreditasi : <span class="text-danger">*</span>&nbsp;&nbsp;
                        <input type="file" name="u_fileAkred_institusi" id="u_fileAkred_institusi" required>
                    </fieldset>
                    <div class="font-italic text-xs">File Akreditasi harus PDF dan ukuran kurang dari 1 Mb</div>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_fileAkred_institusi"></div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md">
                    Alamat Institusi : <br>
                    <textarea class="form-control" name="u_alamat_institusi" id="u_alamat_institusi"></textarea>
                </div>
            </div>
            <hr>
            <div class="form-inline navbar nav-link justify-content-end">
                <button type="button" name="ubah" class="btn btn-primary btn-sm ubah">
                    Ubah
                </button>
                &nbsp;&nbsp;
                <button type="button" class="btn btn-outline-danger btn-sm ubah_tutup">
                    Tutup
                </button>
            </div>
        </form>
    </div>

    <div id="data_institusi"></div>
</div>


<script>
    $(document).ready(function() {
        $('#data_institusi').load("_admin/view/v_institusiData.php");
    });

    $(".tambah_init").click(function() {
        document.getElementById("err_t_nama_institusi").innerHTML = "";
        document.getElementById("err_t_akronim_institusi").innerHTML = "";
        document.getElementById("err_t_logo_institusi").innerHTML = "";
        document.getElementById("err_t_akred_institusi").innerHTML = "";
        document.getElementById("err_t_tglAkhirAkred_institusi").innerHTML = "";
        document.getElementById("err_t_fileAkred_institusi").innerHTML = "";
        document.getElementById("form_tambah_institusi").reset();
        $("#data_tambah_institusi").fadeIn(1);
        $("#data_ubah_institusi").fadeOut(1);
        $('#t_nama_institusi').focus();
    });

    $(".tambah_tutup").click(function() {
        document.getElementById("err_t_nama_institusi").innerHTML = "";
        document.getElementById("err_t_akronim_institusi").innerHTML = "";
        document.getElementById("err_t_logo_institusi").innerHTML = "";
        document.getElementById("err_t_akred_institusi").innerHTML = "";
        document.getElementById("err_t_tglAkhirAkred_institusi").innerHTML = "";
        document.getElementById("err_t_fileAkred_institusi").innerHTML = "";
        document.getElementById("form_tambah_institusi").reset();
        $("#data_tambah_institusi").fadeOut(1);
    });

    $(document).on('click', '.tambah', function() {
        var data = $('#form_tambah_institusi').serialize();

        var t_nama_institusi = $('#t_nama_institusi').val();
        var t_akronim_institusi = $('#t_akronim_institusi').val();
        var t_logo_institusi = $('#t_logo_institusi').val();
        var t_akred_institusi = $('#t_akred_institusi').val();
        var t_tglAkhirAkred_institusi = $('#t_tglAkhirAkred_institusi').val();
        var t_fileAkred_institusi = $('#t_fileAkred_institusi').val();

        //cek data from tambah bila tidak diiisi
        if (
            t_nama_institusi == "" ||
            t_akronim_institusi == "" ||
            t_logo_institusi == "" ||
            t_akred_institusi == "" ||
            t_tglAkhirAkred_institusi == "" ||
            t_fileAkred_institusi == ""
        ) {
            if (t_nama_institusi == "") {
                document.getElementById("err_t_nama_institusi").innerHTML = "Nama Institusi Harus Diisi";
            } else {
                document.getElementById("err_t_nama_institusi").innerHTML = "";
            }

            if (t_akronim_institusi == "") {
                document.getElementById("err_t_akronim_institusi").innerHTML = "Akronim Harus Diisi";
            } else {
                document.getElementById("err_t_akronim_institusi").innerHTML = "";
            }

            if (t_logo_institusi == "") {
                document.getElementById("err_t_logo_institusi").innerHTML = "Logo Harus Diunggah";
            } else {
                document.getElementById("err_t_logo_institusi").innerHTML = "";
            }

            if (t_akred_institusi == "") {
                document.getElementById("err_t_akred_institusi").innerHTML = "Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_t_akred_institusi").innerHTML = "";
            }

            if (t_tglAkhirAkred_institusi == "") {
                document.getElementById("err_t_tglAkhirAkred_institusi").innerHTML = "Tanggal Berlaku Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_t_tglAkhirAkred_institusi").innerHTML = "";
            }

            if (t_fileAkred_institusi == "") {
                document.getElementById("err_t_fileAkred_institusi").innerHTML = "File Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_t_fileAkred_institusi").innerHTML = "";
            }

        }

        //eksekusi bila file MoU terisi
        if (t_logo_institusi != "") {

            //Cari ekstensi file MoU yg diupload
            var typeLogo = document.querySelector('#t_logo_institusi').value;
            var getTypeLogo = typeLogo.split('.').pop();

            //cari ukuran file MoU yg diupload
            var getSizeLogo = document.getElementById("t_logo_institusi").files[0].size / 1024;

            console.log("Ukuran Logo : " + getSizeLogo);
            //Toast bila upload Logo selain pdf
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
                    title: '<div class="text-md text-center">Logo Harus <b>.png</b></div>'
                });
                document.getElementById("err_file_mou").innerHTML = "Logo Harus png";
            } //Toast bila upload file MoU diatas 200 Kb 
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
                    title: '<div class="text-md text-center">Ukuran File MoU Harus <br><b>Kurang dari 200 Kb </b></div>'
                });
                document.getElementById("err_file_mou").innerHTML = "Ukuran Logo Harus Kurang dari 200 Kb ";
            }
        }

        //eksekusi bila file MoU terisi
        if (t_fileAkred_institusi != "") {

            //Cari ekstensi file MoU yg diupload
            var typeAkred = document.querySelector('#t_fileAkred_institusi').value;
            var getTypeAkred = typeAkred.split('.').pop();

            //cari ukuran file MoU yg diupload
            var getSizeAkred = document.getElementById("t_fileAkred_institusi").files[0].size / 1024;

            //Toast bila upload file MoU selain pdf
            if (getTypeAkred != 'pdf') {
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
                    title: '<div class="text-md text-center">File Akrediatasi Harus <b>.pdf</b></div>'
                });
                document.getElementById("err_file_mou").innerHTML = "File Akrediatasi Harus pdf";
            } //Toast bila upload file MoU diatas 1 Mb 
            else if (getSizeAkred > 1024) {
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
                    title: '<div class="text-md text-center">Ukuran File Akreditasi Harus <br><b>Kurang dari 1 Mb</b></div>'
                });
                document.getElementById("err_file_mou").innerHTML = "Ukuran File Akreditasi Harus Kurang dari 1 Mb";
            }
        }

        if (
            t_nama_institusi != "" &&
            t_akronim_institusi != "" &&
            t_logo_institusi != "" &&
            getTypeLogo == "png" &&
            getSizeLogo < 256 &&
            t_akred_institusi != "" &&
            t_tglAkhirAkred_institusi != "" &&
            t_fileAkred_institusi != "" &&
            getTypeAkred == "pdf" &&
            getSizeAkred < 1024
        ) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_v_institusi_s.php",
                data: data,
                success: function() {
                    //ambil data file yang diupload
                    var data_file = new FormData();
                    var xhttp = new XMLHttpRequest();

                    var logo = document.getElementById("t_logo_institusi").files;
                    data_file.append("t_logo_institusi", logo[0]);

                    var fileAkred = document.getElementById("t_fileAkred_institusi").files;
                    data_file.append("t_fileAkred_institusi", fileAkred[0]);

                    var id_institusi = document.getElementById("id_institusi").value;
                    data_file.append("id_institusi", id_institusi);

                    xhttp.open("POST", "_admin/exc/x_v_institusi_sFile.php", true);
                    xhttp.send(data_file);
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>Data Institusi</b><br>Berhasil Tersimpan',
                        showConfirmButton: false,
                        timer: 523123000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });;

                    // const Toast = Swal.mixin({
                    //     toast: true,
                    //     position: 'top-end',
                    //     showConfirmButton: false,
                    //     timer: 5000,
                    //     timerProgressBar: true,
                    //     didOpen: (toast) => {
                    //         toast.addEventListener('mouseenter', Swal.stopTimer)
                    //         toast.addEventListener('mouseleave', Swal.resumeTimer)
                    //     }
                    // });

                    // Toast.fire({
                    //     icon: 'success',
                    //     title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Ditambah</b></div>'
                    // });

                    $('#data_institusi').load('_admin/view/v_institusiData.php');

                    document.getElementById("err_t_nama_institusi").innerHTML = "";
                    document.getElementById("err_t_akronim_institusi").innerHTML = "";
                    document.getElementById("err_t_logo_institusi").innerHTML = "";
                    document.getElementById("err_t_akred_institusi").innerHTML = "";
                    document.getElementById("err_t_tglAkhirAkred_institusi").innerHTML = "";
                    document.getElementById("err_t_fileAkred_institusi").innerHTML = "";
                    document.getElementById("form_tambah_institusi").reset();
                    $("#data_tambah_institusi").fadeOut(1);
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }
    });
</script>