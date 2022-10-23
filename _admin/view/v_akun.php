<?php

if (isset($_GET['aku']) && $d_prvl['r_akun'] == 'Y') {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Data Akun</h1>
            </div>
            <?php if ($d_prvl['c_akun'] == "Y") { ?>
                <div class="col-lg-2 my-auto text-right">
                    <button class="btn btn-outline-success btn-sm tambah_init">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            <?php } ?>
        </div>

        <!-- form tambah akun  -->
        <?php if ($d_prvl['c_akun'] == "Y") { ?>
            <div class="card shadow mb-4 card-body" id="data_tambah" style="display: none;">
                <form method="post" id="form_tambah">
                    <div class="form-group row mb-4 " width="100%">
                        <?php
                        $sql_user = "SELECT * FROM tb_user";
                        $sql_user .= " ORDER BY id_user ASC";

                        $q_user = $conn->query($sql_user);
                        if ($q_user->rowCount() > 0) {
                            $no = 1;
                            while ($d_user = $q_user->fetch(PDO::FETCH_ASSOC)) {
                                if ($no != $d_user['id_user']) {
                                    break;
                                }
                                $no++;
                            }
                        }
                        $id_user = $no;
                        ?>
                        <input name="id_user" id="id_user" value="<?= $id_user; ?>" hidden>
                        <div class="col-3">
                            Nama : <span class="text-danger">*</span><br>
                            <input class="form-control" name="c_nama" id="c_nama" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_c_nama"></div>
                        </div>
                        <div class="col-3">
                            Telepon : <span class="text-danger mb-2">*</span><br>
                            <input class="form-control" type="number" min="0" pattern="[0-9]{2}[4-14]{9}" name="c_telp" id="c_telp" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_c_telp"></div>
                        </div>
                        <div class="col-3">
                            Email : <span class="text-danger">*</span><br>
                            <input class="form-control" type="email" name="c_email" id="c_email" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_c_email"></div>
                        </div>
                        <div class="col-3">
                            <fieldset class="border p-2">
                                Foto : <span class="text-danger">*</span><br>
                                <input type="file" name="c_foto" id="c_foto" accept=".png, .jpg, .jpeg">
                                <div class="font-italic text-xs">Foto harus PNG/JPG/JPEG dan ukuran kurang dari 200 Kb</div>
                            </fieldset>
                            <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_c_foto"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <i>Username</i> : <span class="text-danger">*</span><br>
                            <input class="form-control" name="c_username" id="c_username" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_c_username"></div>
                        </div>
                        <div class="col">
                            <i>Password</i> : <span class="text-danger">*</span><br>
                            <input class="form-control" type="password" name="c_password" id="c_password" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_c_password"></div>
                        </div>
                        <div class="col">
                            Ulangi <i>Password</i> : <span class="text-danger">*</span><br>
                            <input class="form-control" type="password" name="c_passwordx" id="c_passwordx" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_c_passwordx"></div>
                        </div>
                        <div class="col">
                            <i>Level Akun</i> : <span class="text-danger">*</span><br>
                            <select class="select2" name="c_level" id="c_level" required>
                                <option value=""></option>
                                <option value="1">Admin</option>
                                <option value="2">Institusi</option>
                                <option value="3">Keuangan</option>
                                <option value="4">Pembimbing</option>
                            </select>
                            <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_c_level"></div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="form-inline navbar nav-link justify-content-end">
                    <button type="button" name="tambah" class="btn btn-success mb-2 tambah">
                        Tambah
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-danger mb-2 tambah_tutup">
                        Tutup
                    </button>
                </div>
            </div>
        <?php } ?>

        <!-- form ubah akun  -->
        <?php if ($d_prvl['u_akun'] == "Y") { ?>
            <div class="card shadow mb-4 card-body" id="data_ubah" style="display: none;">
                <form method="post" id="form_ubahs">
                    <div class="form-group row mb-4 " width="100%">
                        <div class="col-3">
                            Nama : <span class="text-danger">*</span><br>
                            <input class="form-control" name="u_nama" id="u_nama" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_nama"></div>
                        </div>
                        <div class="col-3">
                            Telepon : <span class="text-danger mb-2">*</span><br>
                            <input class="form-control" type="number" min="0" name="u_telp" id="u_telp" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_telp"></div>
                        </div>
                        <div class="col-3">
                            Email : <span class="text-danger">*</span><br>
                            <input class="form-control" type="email" name="u_email" id="u_email" required>
                            <br>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_email"></div>
                        </div>
                        <div class="col-3">
                            <fieldset class="border p-2">
                                Foto :
                                <input type="file" name="u_foto" id="u_foto" accept=".png, .jpg, .jpeg">
                                <div class="font-italic text-xs">Foto harus PNG/JPG/JPEG dan ukuran kurang dari 200 Kb</div>
                            </fieldset>
                            <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_foto"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <i>Username</i> : <span class="text-danger">*</span><br>
                            <input class="form-control" name="u_username" id="u_username" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_username"></div>
                        </div>
                        <div class="col">
                            <i>Password</i> : <span class="text-danger">*</span><br>
                            <input class="form-control" type="password" name="u_password" id="u_password" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_password"></div>
                        </div>
                        <div class="col">
                            Ulangi <i>Password</i> : <span class="text-danger">*</span><br>
                            <input class="form-control" type="password" name="u_passwordx" id="u_passwordx" required>
                            <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_u_passwordx"></div>
                        </div>
                        <div class="col">
                            <i>Level Akun</i> : <span class="text-danger">*</span><br>
                            <select class="select2" name="u_level" id="u_level" required>
                                <option value=""></option>
                                <option value="1">Admin</option>
                                <option value="2">Institusi</option>
                                <option value="3">Keuangan</option>
                                <option value="4">Pembimbing</option>
                            </select>
                            <div class="text-danger font-weight-bold font-italic text-xs blink" id="err_u_level"></div>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="form-inline navbar nav-link justify-content-end">
                    <button type="button" name="tambah" class="btn btn-success mb-2 tambah">
                        Tambah
                    </button>
                    &nbsp;&nbsp;
                    <button type="button" class="btn btn-outline-danger mb-2 tambah_tutup">
                        Tutup
                    </button>
                </div>
            </div>
        <?php } ?>

        <div class="card shadow mb-4 card-body" id="data_akun"></div>
    </div>
    <script>
        $(document).ready(function() {
            $('#data_akun').load('_admin/view/v_akunData.php?id=' + <?= $_SESSION['id_user'] ?>);
        });

        <?php if ($d_prvl['c_akun'] == "Y") { ?>
            $(".tambah_init").click(function() {
                document.getElementById("err_c_nama").innerHTML = "";
                document.getElementById("err_c_telp").innerHTML = "";
                document.getElementById("err_c_email").innerHTML = "";
                document.getElementById("err_c_username").innerHTML = "";
                document.getElementById("err_c_password").innerHTML = "";
                document.getElementById("err_c_passwordx").innerHTML = "";
                document.getElementById("err_c_level").innerHTML = "";
                document.getElementById("form_tambah").reset();
                $('#c_level').val("").trigger("change");
                $("#data_tambah").fadeIn(0);
                $("#data_ubah").fadeOut(0);
            });
            $(".tambah_tutup").click(function() {
                document.getElementById("err_c_nama").innerHTML = "";
                document.getElementById("err_c_telp").innerHTML = "";
                document.getElementById("err_c_email").innerHTML = "";
                document.getElementById("err_c_username").innerHTML = "";
                document.getElementById("err_c_password").innerHTML = "";
                document.getElementById("err_c_passwordx").innerHTML = "";
                document.getElementById("err_c_level").innerHTML = "";
                document.getElementById("form_tambah").reset();
                $('#c_level').val("").trigger("change");
                $("#data_tambah").fadeOut(0);
            });
            $(document).on('click', '.tambah', function() {
                var data = $('#form_tambah').serialize();
                var nama = $("#c_nama").val();
                var telp = $("#c_telp").val();
                var email = $("#c_email").val();
                var foto = $("#c_foto").val();
                var username = $("#c_username").val();
                var password = $("#c_password").val();
                var passwordx = $("#c_passwordx").val();
                var level = $("#c_level").val();

                // console.log(foto)

                //cek data from ubah bila tidak diiisi
                if (
                    nama == "" ||
                    telp == "" ||
                    email == "" ||
                    username == "" ||
                    password == "" ||
                    passwordx == "" ||
                    password != passwordx ||
                    level == ""
                    // foto == ""
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
                    });

                    Toast.fire({
                        icon: 'warning',
                        title: '<div class="text-md text-center">Data Wajib ada yang belum diisi</div>'
                    });

                    if (nama == "") {
                        document.getElementById("err_c_nama").innerHTML = "Nama Harus Diisi";
                    } else {
                        document.getElementById("err_c_nama").innerHTML = "";
                    }

                    if (telp == "") {
                        document.getElementById("err_c_telp").innerHTML = "Telepon Harus Diisi";
                    } else {
                        document.getElementById("err_c_telp").innerHTML = "";
                    }

                    if (email == "") {
                        document.getElementById("err_c_email").innerHTML = "Email Harus Diisi";
                    } else {
                        document.getElementById("err_c_email").innerHTML = "";
                    }

                    if (username == "") {
                        document.getElementById("err_c_username").innerHTML = "Username Harus Diisi";
                    } else {
                        document.getElementById("err_c_username").innerHTML = "";
                    }

                    if (password == "") {
                        document.getElementById("err_c_password").innerHTML = "Password Harus Diisi";
                    } else {
                        document.getElementById("err_c_password").innerHTML = "";
                    }

                    if (passwordx == "") {
                        document.getElementById("err_c_passwordx").innerHTML = "Ulangi Password Harus Diisi";
                    } else {
                        document.getElementById("err_c_passwordx").innerHTML = "";
                    }

                    if (password != passwordx) {
                        document.getElementById("err_c_password").innerHTML = "Password Tidak Sama";
                        document.getElementById("err_c_passwordx").innerHTML = "Password Tidak Sama";
                    }

                    if (level == "") {
                        document.getElementById("err_c_level").innerHTML = "Level Harus Dpilih";
                    } else {
                        document.getElementById("err_c_level").innerHTML = "";
                    }

                    // if (foto == "") {
                    //     document.getElementById("err_c_foto").innerHTML = "Foto Harus Diunggah";
                    // } else {
                    //     document.getElementById("err_c_foto").innerHTML = "";
                    // }

                }

                //eksekusi bila file Foto terisi
                if (foto != "") {

                    //Cari ekstensi file Foto yg diupload
                    var typeFoto = document.querySelector('#c_foto').value;
                    var getTypeFoto = typeFoto.split('.').pop();

                    //cari ukuran file Foto yg diupload
                    var getSizeFoto = document.getElementById("c_foto").files[0].size / 1024;

                    console.log(getSizeFoto);

                    //Toast bila upload Foto selain png/jpg/jpeg
                    if (getTypeFoto != 'png' && getTypeFoto != 'jpg' && getTypeFoto != 'jpeg') {
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
                            title: '<div class="text-md text-center">Foto Harus <b>.png</b>/<b>.jpg</b>/<b>.jpeg</b></div>'
                        });
                        document.getElementById("err_c_foto").innerHTML = "Foto Harus PNG/JPG/JPEG";
                    } //Toast bila upload file Foto diatas 200 Kb 
                    else if (getSizeFoto > 256) {
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
                            title: '<div class="text-md text-center">Ukuran File Foto Harus <br><b>Kurang dari 200 Kb </b></div>'
                        });
                        document.getElementById("err_c_foto").innerHTML = "Ukuran Foto Harus Kurang dari 200 Kb ";
                    } else {

                        var data_file = new FormData();
                        var xhttp = new XMLHttpRequest();

                        var foto = document.getElementById("c_foto").files;
                        data_file.append("c_foto", foto[0]);

                        var id_user = document.getElementById("id_user").value;
                        data_file.append("id_user", id_user);

                        xhttp.open("POST", "_admin/exc/x_v_akun_sFile.php", true);
                        xhttp.send(data_file);
                    }
                }

                //eksekusi bila data wajib terisi dan sesuai
                if (
                    nama != "" &&
                    telp != "" &&
                    email != "" &&
                    username != "" &&
                    password != "" &&
                    passwordx != "" &&
                    password == passwordx &&
                    level != ""
                    // foto != "" &&
                    // (getTypeLogo == "png" || getTypeLogo == "jpg" || getTypeLogo == "jpeg") &&
                    // getSizeLogo < 256
                ) {
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_akun_s.php",
                        data: data,
                        success: function() {

                            $('#data_akun').load('_admin/view/v_akunData.php?id=' + <?= $_SESSION['id_user'] ?>);

                            Swal.fire({
                                allowOutsideClick: false,
                                icon: 'success',
                                title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Ditambah</b></div>',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            });
                            document.getElementById("err_c_nama").innerHTML = "";
                            document.getElementById("err_c_telp").innerHTML = "";
                            document.getElementById("err_c_email").innerHTML = "";
                            document.getElementById("err_c_username").innerHTML = "";
                            document.getElementById("err_c_password").innerHTML = "";
                            document.getElementById("err_c_passwordx").innerHTML = "";
                            document.getElementById("err_c_level").innerHTML = "";
                            document.getElementById("form_tambah").reset();
                            $("#c_level").val("").trigger("change");
                            $("#data_tambah").fadeOut(0);
                        },
                        error: function(response) {
                            console.log(response.responseText);
                        }
                    });
                }
            });
        <?php } ?>
    </script>
<?php
} else {
    echo "<script>alert('Maaf anda tidak punya hak akses');document.location.href='?';</script>";
}
?>