<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Pendaftaran</h1>
                                </div>
                                <form class="form-group text-center" method="post" id="form_reg">
                                    <label class="text-dark mb-0" for="institusi"> Pilih Institusi :</label>
                                    <select class="select2 text-center" id="institusi" name="institusi" onChange="openInstitusiLain()" style="width:100%" required>
                                        <option value="">--<i> Pilih Institusi </i>--</option>
                                        <?php
                                        $sql_ip = "SELECT * FROM tb_institusi";
                                        $sql_ip .= " ORDER BY tb_institusi.nama_institusi ASC";
                                        try {
                                            $q_ip = $conn->query($sql_ip);
                                        } catch (Exception $ex) {
                                            echo "<script>alert('$ex -DATA PRIVILEGES-');";
                                            echo "document.location.href='?error404';</script>";
                                        }
                                        $r_ip = $q_ip->rowCount();
                                        $no = 0;
                                        while ($d_ip = $q_ip->fetch(PDO::FETCH_ASSOC)) {
                                            $akronim_institusi = "";
                                            if (!empty($d_ip['akronim_institusi']))
                                                $akronim_institusi = " (" . $d_ip['akronim_institusi'] . ")";
                                        ?>
                                            <option class='text-wrap' value='<?= $d_ip['id_institusi']; ?> '>
                                                <?= $d_ip['nama_institusi'] . $akronim_institusi; ?>
                                            </option>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                        <option value='0'>-- <i>LAINNYA</i> --</option>
                                    </select>
                                    <div class="text-xs font-italic text-center">Pilih <b>-- LAINNYA --</b> bila nama institusi tidak terdaftar,<br> dan isikan nama institusi yang disediakan</div>
                                    <div class="text-xs text-danger i blink" mb-2 id="err_institusi"></div>
                                    <div id="institusi_lainnya" style="display: none;">
                                        <label class="text-dark mb-0" for="insituti_lain"> Isikan Nama Intitusi :</label>
                                        <input type='text mb-0' id='insituti_lain' name='insituti_lain' class='form-control form-control-xs' placeHolder='Isikan Nama Institusi'>
                                        <div class="text-xs text-danger i blink mb-2" id="err_institusi_lain"></div>
                                    </div>

                                    <label class="text-dark mb-0"> Nama Koordinator :</label>
                                    <input type="text" class="form-control  form-control-xs" placeholder="Nama Lengkap" id="nama" name="nama">
                                    <div class="text-xs text-danger i blink mb-2" id="err_nama"></div>

                                    <label class="text-dark mb-0"> Email Koordinator :</label>
                                    <input type="email" class="form-control form-control-xs" placeholder="Alamat Email untuk username" name="email" id="email">
                                    <div class="text-xs font-italic text-center">Alamat e-mail akan dijadikan <b>username</b></div>
                                    <div class="text-xs text-danger i blink" id="err_email"></div>

                                    <label class="text-dark mb-0"> Telpon Koordinator :</label>
                                    <input type="number" min="1" class="form-control form-control-xs" placeholder="No. Telp" name="telp" id="telp">
                                    <div class="text-xs text-danger i blink mb-2" id="err_telp"></div>

                                    <div class="text-dark text-center mb-0"> Isikan Password dan Ulangi Password :</div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="password" class="form-control form-control-xs" placeholder="Password" name="password" id="password">
                                            <div class="text-xs text-danger i blink mb-2" id="err_password"></div>
                                        </div>
                                        <div class="col-md-6"><input type="password" class="form-control form-control-xs" placeholder="Ulangi Password" name="password_ulangi" id="password_ulangi">
                                            <div class="text-xs text-danger i blink mb-2" id="err_password_ulangi"></div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- hCpatcha-->
                                    <!-- <div class="h-captcha text-center" data-sitekey="985c2b81-998a-407e-b467-d456a1a0138f"></div> -->
                                    <hr>
                                    <a class="btn btn-primary btn-user btn-block registrasi mb-2" title="Daftar">Daftar</a>
                                    <a class="btn btn-outline-danger btn-user btn-block registrasi_reset mb-2" title="Reset">Reset</a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="?lo">Klik disini, jika sudah punya akun</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function openInstitusiLain() {
        console.log('Open Institusi');
        var idins = $('#institusi').val();
        if (idins == 0 && idins != "") {
            console.log("Pilih Institusi Lainnya");
            $('#institusi_lainnya').show();
            $('#institusi_lainnya').focus();
        } else if (idins != 0) {
            // console.log("Tidak Pilih Institusi Lainnya");
            $('#institusi_lainnya').hide();
            $('#institusi_lainnya').empty();
        }
        console.log(idins);
    }

    $(document).ready(function() {
        // console.log("first");
        $('#err_institusi').empty();

        if ($('#err_institusi') == 0) $('#err_institusi_lain').empty();

        $('#err_nama').empty();
        $('#err_email').empty();
        $('#err_telp').empty();
        $('#err_password').empty();
        $('#err_password_ulangi').empty();
        $("#form_reg").trigger("reset");
        $("#institusi").val("").trigger("change");
    });

    // inisiasi klik modal registrasi  tutup
    $(".registrasi_reset").click(function() {
        console.log("registrasi_reset");
        $('#err_institusi').empty();

        if ($('#err_institusi') == 0) $('#err_institusi_lain').empty();

        $('#err_nama').empty();
        $('#err_email').empty();
        $('#err_telp').empty();
        $('#err_password').empty();
        $('#err_password_ulangi').empty();
        $("#form_reg").trigger("reset");
        $("#institusi").val("").trigger("change");
    });

    // inisiasi klik modal registrasi simpan
    $(document).on('click', '.registrasi', async function() {
        console.log("registrasi");
        var data_reg = $("#form_reg").serializeArray();

        var institusi = $('#institusi').val();
        // console.log('Institusi:' + institusi);
        if ($('#err_institusi') == 0) var institusi_lain = $('#institusi_lain').val();

        var nama = $('#nama').val();
        var email = $('#email').val();
        var telp = $('#telp').val();
        var password = $('#password').val();
        var password_ulangi = $('#password_ulangi').val();


        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        //cek data from bila tidak diiisi
        if (
            institusi == "" ||
            institusi == undefined ||
            nama == "" ||
            email == "" ||
            telp == "" ||
            password == "" ||
            password_ulangi == ""
        ) {

            if (institusi == "" || institusi == undefined) $("#err_institusi").html("Institusi Harus Dipilih");
            else $("#err_institusi").html("");

            if (nama == "") $("#err_nama").html("Nama Koordinator Harus Diisi");
            else $("#err_nama").html("");

            if (email == "") $("#err_email").html("Email Harus Diisi");
            else $("#err_email").html("");

            if (telp == "") $("#err_telp").html("Telpon Harus Diisi");
            else $("#err_telp").html("");

            if (password == "") $("#err_password").html("Password Harus Diisi");
            else $("#err_password").html("");

            if (password_ulangi == "") $("#err_password_ulangi").html("Ulangi Password Harus Diisi");
            else $("#err_password_ulangi").html("");

            await Toast.fire({
                icon: 'warning',
                title: 'Data Ada yang Belum Terisi',
            });
        }

        //cek Pasword
        if (password != password_ulangi) {
            $("#err_password").html("Password Tidak Sama");
            $("#err_password_ulangi").html("Password Tidak Sama");

            await Toast.fire({
                icon: 'error',
                title: 'Password Tidak Sama',
            });
        }

        $.ajax({
            type: 'POST',
            url: "_log-sign/exc/x_register_cekAkunEmail.php",
            data: {
                'email': email
            },
            dataType: 'JSON',
            success: function(response) {
                // console.log(response);
                if (response.ket == 'Y') {
                    console.log('Email Sudah Ada');
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'warning',
                        html: '<div class="b ">Email :' + email + ' <br>Sudah Ada</div><hr>Silahkan ' +
                            '<a href="?login" class="btn btn-outline-primary">Login</a>',
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                    $("#err_email").html("Email Sudah Ada");
                } else if (response.ket == 'T') {
                    console.log('Email Belum Ada');

                    //simpan data registrasi bila sudah sesuai
                    if (
                        institusi != "" &&
                        institusi != undefined &&
                        nama != "" &&
                        email != "" &&
                        telp != "" &&
                        password == password_ulangi
                    ) {
                        $.ajax({
                            type: 'POST',
                            url: "_log-sign/exc/x_register.php",
                            data: data_reg,
                            success: function(response) {
                                $('#err_institusi').empty();

                                if ($('#err_institusi') == 0) $('#err_institusi_lain').empty();

                                $('#err_nama').empty();
                                $('#err_email').empty();
                                $('#err_telp').empty();
                                $('#err_password').empty();
                                $('#err_password_ulangi').empty();
                                $("#form_reg").trigger("reset");
                                $("#institusi").val("").trigger("change");

                                Swal.fire({
                                    allowOutsideClick: false,
                                    // isDismissed: false,
                                    icon: 'success',
                                    // html: '<a href="?ptk" class="btn btn-outline-primary">OK</a>',
                                    html: '<div class="b ">Registrasi Berhasil</div><hr>' +
                                        'Silahkan Lakukan Aktivasi di Email : <b>' + email + '</b>',
                                    // title: '<b> </b><br><br>',
                                    showConfirmButton: false,
                                    timer: 10000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                }).then(
                                    function() {
                                        // document.location.href = "?login";
                                    }
                                );
                            },
                            error: function(response) {
                                console.log(response);
                            }
                        });
                    }

                    console.log("registrasi berhasil");
                } else {
                    console.log("ERROR");
                }
            },
            error: function(response) {
                console.log(response);
            }
        });
    });
</script>