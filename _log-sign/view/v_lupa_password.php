<?php
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
if (isset($_GET['forgot_pass'])) {
?>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-5">
                <div class="card card-md o-hidden border-0 shadow-lg my-2">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-md">
                                <div class="p-3">
                                    <div class="h6 text-gray-900 text-center">LUPA <i>PASSWORD</i></div>
                                    <form class="form-group" id="f_forgot_pass">
                                        <input class="form-control mb-2" id="email" name="email" placeholder="isikan alamat email" required>
                                        <div class="text-xs text-danger i blink mb-2" id="err_email"></div>
                                        <a class="btn btn-outline-danger col lupa_password" id="kirim"><i class="fa-solid fa-paper-plane"></i> Kirim</a>
                                    </form>
                                    <script>
                                        $(document).ready(function() {
                                            $('#err_email').empty();
                                            $("#f_forgot_pass").trigger("reset");
                                        });

                                        $(document).on('click', '.lupa_password', async function() {

                                            var email = $('#email').val();


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
                                                if (email == "") $("#err_email").html("Email Harus Diisi");
                                                else $("#err_email").html("");

                                                await Toast.fire({
                                                    icon: 'warning',
                                                    title: 'Data Ada yang Belum Terisi',
                                                });
                                            }

                                            $.ajax({
                                                type: 'POST',
                                                url: "_log-sign/exc/x_lupa_password_cekAkunEmail.php",
                                                data: {
                                                    'email': email
                                                },
                                                dataType: 'JSON',
                                                success: function(response) {
                                                    Swal.fire({
                                                        allowOutsideClick: true,
                                                        title: 'Mohon Ditunggu . . .',
                                                        html: ' <img src="./_img/d3f472b06590a25cb4372ff289d81711.gif" class="rotate mb-3" width="100" height="100" />' +
                                                            '  <p>Harap Tunggu</p>',
                                                        // add html attribute if you want or remove
                                                        allowOutsideClick: false,
                                                        showConfirmButton: false,
                                                        onBeforeOpen: () => {
                                                            Swal.showLoading()
                                                        },
                                                    });
                                                    if (response.ket == 'T') {
                                                        console.log('Email Tidak Ada');
                                                        Swal.fire({
                                                            allowOutsideClick: false,
                                                            // isDismissed: false,
                                                            icon: 'warning',
                                                            html: '<div class="b ">Email :' + email + ' <br>Tidak Ada</div><hr> ' +
                                                                'Silahkan Perikas Kembali Email Anda',
                                                            showConfirmButton: false,
                                                            timer: 10000,
                                                            timerProgressBar: true,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        });
                                                        $("#err_email").html("Email Tidak Ada");
                                                    } else if (response.ket == 'Y') {
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
                                                                dataType: 'JSON',
                                                                success: function(response) {
                                                                    data_reg.push({
                                                                        name: "idu",
                                                                        value: response.idu
                                                                    });
                                                                    $.ajax({
                                                                        type: 'POST',
                                                                        url: "_log-sign/exc/x_register_emailAct.php",
                                                                        data: data_reg,
                                                                        dataType: 'JSON',
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
                                                                                icon: 'success',
                                                                                html: '<div class="b ">Registrasi Berhasil</div><hr>' +
                                                                                    'Silahkan Lakukan Aktivasi di Email : <b>' + email + '</b>',
                                                                                showConfirmButton: false,
                                                                                timer: 10000,
                                                                                timerProgressBar: true,
                                                                                didOpen: (toast) => {
                                                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                                                }
                                                                            });
                                                                        }
                                                                    });
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
