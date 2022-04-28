<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-11">
            <h1 class="h3 mb-2 text-gray-800">Daftar Pembimbing</h1>
        </div>
        <div class="col-lg-1">
            <p>
                <a href="#" data-toggle='modal' data-target="#pmbb_t_m" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </p>
        </div>
    </div>

    <!-- form tambah institusi  -->
    <div class="card shadow mb-4 card-body" id="data_tambah_pembimbing" style="display: none;">
        <form class="form-data" method="post" id="form_tambah_pembimbing">
            <?php
            $sql_id_pembimbing = "SELECT * FROM tb_pembimbing";
            $sql_id_pembimbing .= " ORDER BY id_pembimbing ASC";

            $q_id_pembimbing = $conn->query($sql_id_pembimbing);
            if ($q_id_pembimbing->rowCount() > 0) {
                $no = 1;
                while ($d_id_pembimbing = $q_id_pembimbing->fetch(PDO::FETCH_ASSOC)) {
                    if ($no != $d_id_pembimbing['id_pembimbing']) {
                        break;
                    }
                    $no++;
                }
            }
            $t_id_pembimbing = $no;
            ?>
            <!-- Nama Institusi, MoU RSJ dan Institusi -->
            <input type="hidden" name="t_id_pembimbing" id="t_id_pembimbing" value="<?php echo $t_id_pembimbing; ?>">
            <div class="row mb-4">
                <div class="col-md-6">
                    Nama Pembimbing : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" name="t_nama_pembimbing" id="t_nama_pembimbing" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_nama_pembimbing"></div>
                </div>
                <div class="col-md">
                    NIP/NIPK : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" maxlength="10" name="t_nipnipk_pembimbing" id="t_nipnipk_pembimbing" required>
                    <div class="font-italic text-xs">Maksimal 10 Karakter</div>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_nipnipk_pembimbing"></div>
                </div>
                <div class="col-md-4">
                    Jenis Pembimbing : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <select class="select2" name="t_jenis_pembimbing" id="t_jenis_pembimbing" required>
                        <option value=""></option>
                        <?php
                        $sql_jenis_pmbb = "SELECT * FROM tb_pembimbing_jenis";
                        $sql_jenis_pmbb .= " ORDER BY nama_pembimbing_jenis ASC";

                        $q_jenis_pmbb = $conn->query($sql_jenis_pmbb);
                        while ($d_jenis_pmbb = $q_jenis_pmbb->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?php echo $d_jenis_pmbb['id_pembimbing_jenis'] ?>">
                                <?php
                                echo $d_jenis_pmbb['nama_pembimbing_jenis'] . " (" . $d_jenis_pmbb['akronim_pembimbing_jenis'] . ")";
                                ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_jenis_pembimbing"></div>
                </div>
                <div class="col-md-4">
                    Jenjang Pendidikan : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <select class="select2" name="t_jenjang_pembimbing" id="t_jenjang_pembimbing" required>
                        <option value=""></option>
                        <?php
                        $sql_jenjang_pmbb = "SELECT * FROM tb_jenjang_pdd";
                        $sql_jenjang_pmbb .= " ORDER BY nama_jenjang_pdd ASC";

                        $q_jenjang_pmbb = $conn->query($sql_jenjang_pmbb);
                        while ($d_jenjang_pmbb = $q_jenjang_pmbb->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <option value="<?php echo $d_jenjang_pmbb['id_jenjang_pdd'] ?>">
                                <?php
                                echo $d_jenjang_pmbb['nama_jenjang_pdd'];
                                ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_t_jenis_pembimbing"></div>
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
    <div class="card shadow mb-4 card-body" id="data_ubah_pembimbing" style="display: none;">
        <form class="form-data" method="post" id="form_ubah_pembimbing">
            <!-- Nama Institusi, MoU RSJ dan Institusi -->
            <input type="hidden" name="u_id_pembimbing" id="u_id_pembimbing">
            <div class="row mb-4">
                <div class="col-md-5">
                    Nama Institusi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" name="u_nama_pembimbing" id="u_nama_pembimbing" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_nama_pembimbing"></div>
                </div>
                <div class="col-md-2">
                    Akronim : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input class="form-control form-control-sm" maxlength="10" name="u_akronim_pembimbing" id="u_akronim_pembimbing" required>
                    <div class="font-italic text-xs">Maksimal 10 Karakter</div>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_akronim_pembimbing"></div>
                </div>
                <div class="col-md text-center my-auto">
                    <fieldset class="border border-1 p-1 m-0">
                        <div id="logo_pembimbing"></div>
                    </fieldset>
                </div>
                <div class="col-md-3">
                    <fieldset class="border p-2">
                        Logo : <span class="text-danger">*</span>&nbsp;&nbsp;
                        <input type="file" name="u_logo_pembimbing" id="u_logo_pembimbing" accept="image/png" required>
                        <div class="font-italic text-xs">Logo harus PNG dan ukuran kurang dari 200 Kb</div>
                    </fieldset>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_logo_pembimbing"></div>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-2">
                    Akreditasi Institusi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <select class="select2" name="u_akred_pembimbing" id="u_akred_pembimbing" required>
                        <option value=""></option>
                        <option value="-- Lainnya --">-- Lainnya --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_akred_pembimbing"></div>
                </div>
                <div class="col-md-2">
                    Berlaku Akreditasi : <span class="text-danger">*</span>&nbsp;&nbsp;
                    <input type="date" class="form-control form-control-sm" name="u_tglAkhirAkred_pembimbing" id="u_tglAkhirAkred_pembimbing" required>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_tglAkhirAkred_pembimbing"></div>
                </div>
                <div class="col-md">
                    Alamat Institusi : <br>
                    <textarea class="form-control form-control-sm" name="u_alamat_pembimbing" id="u_alamat_pembimbing"></textarea>
                </div>
                <div class="col-md-3">
                    <fieldset class="border p-2">
                        File Akreditasi : <span class="text-danger">*</span>&nbsp;&nbsp;
                        <div class="font-italic text-primary text-xs">File Sebelumnya : <span id="fileAkred_pembimbing"></span>
                        </div>
                        <input type="file" name="u_fileAkred_pembimbing" id="u_fileAkred_pembimbing" accept="application/pdf" required>
                    </fieldset>
                    <div class="font-italic text-xs">File Akreditasi harus PDF dan ukuran kurang dari 1 Mb</div>
                    <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_fileAkred_pembimbing"></div>
                </div>
            </div>
            <div class="row mb-4">
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

    <div id="data_pembimbing"></div>
</div>

<script>
    $(document).ready(function() {
        $('#data_pembimbing').load("_admin/view/v_pembimbingData.php");
    });

    $(".tambah_init").click(function() {
        document.getElementById("err_t_nama_pembimbing").innerHTML = "";
        document.getElementById("err_t_akronim_pembimbing").innerHTML = "";
        document.getElementById("err_t_logo_pembimbing").innerHTML = "";
        document.getElementById("err_t_akred_pembimbing").innerHTML = "";
        document.getElementById("err_t_tglAkhirAkred_pembimbing").innerHTML = "";
        document.getElementById("err_t_fileAkred_pembimbing").innerHTML = "";
        document.getElementById("form_tambah_pembimbing").reset();
        $("#data_tambah_pembimbing").fadeIn(1);
        $("#data_ubah_pembimbing").fadeOut(1);
        $('#t_nama_pembimbing').focus();
    });

    $(".tambah_tutup").click(function() {
        document.getElementById("err_t_nama_pembimbing").innerHTML = "";
        document.getElementById("err_t_akronim_pembimbing").innerHTML = "";
        document.getElementById("err_t_logo_pembimbing").innerHTML = "";
        document.getElementById("err_t_akred_pembimbing").innerHTML = "";
        document.getElementById("err_t_tglAkhirAkred_pembimbing").innerHTML = "";
        document.getElementById("err_t_fileAkred_pembimbing").innerHTML = "";
        document.getElementById("form_tambah_pembimbing").reset();
        $("#data_tambah_pembimbing").fadeOut(1);
    });

    $(document).on('click', '.tambah', function() {
        var data = $('#form_tambah_pembimbing').serialize();

        var t_nama_pembimbing = $('#t_nama_pembimbing').val();
        var t_akronim_pembimbing = $('#t_akronim_pembimbing').val();
        var t_logo_pembimbing = $('#t_logo_pembimbing').val();
        var t_akred_pembimbing = $('#t_akred_pembimbing').val();
        var t_tglAkhirAkred_pembimbing = $('#t_tglAkhirAkred_pembimbing').val();
        var t_fileAkred_pembimbing = $('#t_fileAkred_pembimbing').val();
        // console.log("NAMA : " + t_nama_pembimbing);
        // console.log("AKRED : " + t_akred_pembimbing);
        // console.log("ALAMAT : " + $('#t_alamat_pembimbing').val());

        //cek data from tambah bila tidak diiisi
        if (
            t_nama_pembimbing == "" ||
            t_akronim_pembimbing == "" ||
            t_logo_pembimbing == "" ||
            t_akred_pembimbing == "" ||
            t_tglAkhirAkred_pembimbing == "" ||
            t_fileAkred_pembimbing == ""
        ) {
            if (t_nama_pembimbing == "") {
                document.getElementById("err_t_nama_pembimbing").innerHTML = "Nama Institusi Harus Diisi";
            } else {
                document.getElementById("err_t_nama_pembimbing").innerHTML = "";
            }

            if (t_akronim_pembimbing == "") {
                document.getElementById("err_t_akronim_pembimbing").innerHTML = "Akronim Harus Diisi";
            } else {
                document.getElementById("err_t_akronim_pembimbing").innerHTML = "";
            }

            if (t_logo_pembimbing == "") {
                document.getElementById("err_t_logo_pembimbing").innerHTML = "Logo Harus Diunggah";
            } else {
                document.getElementById("err_t_logo_pembimbing").innerHTML = "";
            }

            if (t_akred_pembimbing == "") {
                document.getElementById("err_t_akred_pembimbing").innerHTML = "Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_t_akred_pembimbing").innerHTML = "";
            }

            if (t_tglAkhirAkred_pembimbing == "") {
                document.getElementById("err_t_tglAkhirAkred_pembimbing").innerHTML = "Tanggal Berlaku Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_t_tglAkhirAkred_pembimbing").innerHTML = "";
            }

            if (t_fileAkred_pembimbing == "") {
                document.getElementById("err_t_fileAkred_pembimbing").innerHTML = "File Akreditasi Harus Dipilih";
            } else {
                document.getElementById("err_t_fileAkred_pembimbing").innerHTML = "";
            }

        }

        //eksekusi bila file MoU terisi
        if (t_logo_pembimbing != "") {

            //Cari ekstensi file MoU yg diupload
            var typeLogo = document.querySelector('#t_logo_pembimbing').value;
            var getTypeLogo = typeLogo.split('.').pop();

            //cari ukuran file MoU yg diupload
            var getSizeLogo = document.getElementById("t_logo_pembimbing").files[0].size / 1024;

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
                document.getElementById("err_t_logo_pembimbing").innerHTML = "Logo Harus PNG";
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
                document.getElementById("err_t_logo_pembimbing").innerHTML = "Ukuran Logo Harus Kurang dari 200 Kb ";
            }
        }

        //eksekusi bila file MoU terisi
        if (t_fileAkred_pembimbing != "") {

            //Cari ekstensi file MoU yg diupload
            var typeAkred = document.querySelector('#t_fileAkred_pembimbing').value;
            var getTypeAkred = typeAkred.split('.').pop();

            //cari ukuran file MoU yg diupload
            var getSizeAkred = document.getElementById("t_fileAkred_pembimbing").files[0].size / 1024;

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
                document.getElementById("err_t_fileAkred_pembimbing").innerHTML = "File Akrediatasi Harus pdf";
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
                document.getElementById("err_t_fileAkred_pembimbing").innerHTML = "Ukuran File Akreditasi Harus Kurang dari 1 Mb";
            }
        }

        if (
            t_nama_pembimbing != "" &&
            t_akronim_pembimbing != "" &&
            t_logo_pembimbing != "" &&
            getTypeLogo == "png" &&
            getSizeLogo < 256 &&
            t_akred_pembimbing != "" &&
            t_tglAkhirAkred_pembimbing != "" &&
            t_fileAkred_pembimbing != "" &&
            getTypeAkred == "pdf" &&
            getSizeAkred < 1024
        ) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_v_pembimbing_s.php",
                data: data,
                success: function() {
                    //ambil data file yang diupload
                    var data_file = new FormData();
                    var xhttp = new XMLHttpRequest();

                    var logo = document.getElementById("t_logo_pembimbing").files;
                    data_file.append("t_logo_pembimbing", logo[0]);

                    var fileAkred = document.getElementById("t_fileAkred_pembimbing").files;
                    data_file.append("t_fileAkred_pembimbing", fileAkred[0]);

                    var id_pembimbing = document.getElementById("id_pembimbing").value;
                    data_file.append("id_pembimbing", id_pembimbing);

                    xhttp.open("POST", "_admin/exc/x_v_pembimbing_sFile.php", true);
                    xhttp.send(data_file);
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>Data Institusi</b><br>Berhasil Tersimpan',
                        showConfirmButton: false,
                        timer: 5123123000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });;

                    $('#data_pembimbing').load('_admin/view/v_pembimbingData.php');

                    document.getElementById("err_t_nama_pembimbing").innerHTML = "";
                    document.getElementById("err_t_akronim_pembimbing").innerHTML = "";
                    document.getElementById("err_t_logo_pembimbing").innerHTML = "";
                    document.getElementById("err_t_akred_pembimbing").innerHTML = "";
                    document.getElementById("err_t_tglAkhirAkred_pembimbing").innerHTML = "";
                    document.getElementById("err_t_fileAkred_pembimbing").innerHTML = "";
                    document.getElementById("form_tambah_pembimbing").reset();
                    $("#data_tambah_pembimbing").fadeOut(1);
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }
    });
</script>