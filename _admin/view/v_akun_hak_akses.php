<?php

if (isset($_GET['aku']) && isset($_GET['ha']) && $d_prvl['r_akun'] == 'Y') {

    $sql_user = "SELECT * FROM tb_user WHERE id_user=" . $_GET['ha'];
    $q_user = $conn->query($sql_user);
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Hak Akses Akun</h1>
            </div>
        </div>
        <div class="card shadow mb-4 card-body">
            <form method="post" id="form_prvl">
                <div class="table-responsive">
                    <table class="table table-striped text-xs" id="myTable">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">Nama Hak Akses</th>
                                <th scope="col">Institusi</th>
                                <th scope="col">E-Mail</th>
                                <th scope="col">No. Telp.</th>
                                <th scope="col">Tanggal Buat</th>
                                <th scope="col">Terakhir Login</th>
                                <th scope="col">Level</th>
                                <th scope="col" width="80px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-inline navbar nav-link justify-content-end">
                    <button type="button" name="tambah" class="btn btn-success mb-2 tambah">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).on('click', '.ubah', function() {
            var data = $('#form_tambah').serialize();
            var nama = $("#c_nama").val();
            var telp = $("#c_telp").val();
            var email = $("#c_email").val();
            var foto = $("#foto").val();
            var username = $("#c_username").val();
            var password = $("#c_password").val();
            var passwordx = $("#c_passwordx").val();
            var level = $("#c_level").val();

            if (
                nama != "" &&
                telp != "" &&
                email != "" &&
                username != "" &&
                password != "" &&
                passwordx != "" &&
                password == passwordx &&
                level != ""
            ) {
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_akun_s.php",
                    data: data,
                    success: function() {

                        $('#data_akun').load('_admin/view/v_akunData.php');

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
                        document.getElementById("form_tambah").reset();
                        $("#c_level").val("").trigger("change");
                    },
                    error: function(response) {
                        console.log(response.responseText);
                    }
                });
            }
        });
    </script>
<?php
} else {
    echo "<script>alert('Maaf anda tidak punya hak akses');document.location.href='?';</script>";
}
?>