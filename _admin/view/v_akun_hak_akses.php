<?php

if (isset($_GET['aku']) && isset($_GET['ha']) && $d_prvl['u_akun'] == 'Y') {
    $sql_user_prvl = "SELECT * FROM tb_user ";
    $sql_user_prvl .= " JOIN tb_user_privileges ON tb_user.id_user = tb_user_privileges.id_user ";
    $sql_user_prvl .= " WHERE id_user=" . $_GET['ha'];
    echo $sql_user_prvl;
    $q_user_prvl = $conn->query($sql_user_prvl);
    $d_user_prvl = $q_user_prvl->fetch(PDO::FETCH_ASSOC)
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
                    <table class="table table-striped" id="myTable">
                        <thead class="thead-dark">
                            <tr class="text-center">
                                <th scope="col">Nama Hak Akses</th>
                                <th scope="col">Create/Tambah</th>
                                <th scope="col">Read/Melihat/Melihat</th>
                                <th scope="col">Update/Mengubah</th>
                                <th scope="col">Delete/Menghapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>Kuota</td>
                                <td>
                                    <label class="boxed-check">
                                        <input class="boxed-check-input" type="radio" name="c_kuota" id="c_kuotaY" value="Y">
                                        <div class="boxed-check-label">Ya</div>
                                    </label>
                                    &nbsp;
                                    &nbsp;
                                    <label class="boxed-check">
                                        <input class="boxed-check-input " type="radio" name="c_kuota" id="c_kuotaT" value="N">
                                        <div class="boxed-check-label">Tidak</div>
                                    </label>
                                    <div class="text-center text-danger font-weight-bold font-italic text-md blink" id="err_cek_pilih_ujian"></div>
                                </td>
                                <td>
                                    <div class="row boxed-check-group boxed-check-primary justify-content-center mb-0">
                                        <label class="boxed-check">
                                            <input class="boxed-check-input " type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian1" value="Y" onclick="cekPilihUjianY()">
                                            <div class="boxed-check-label">Ya</div>
                                        </label>
                                        &nbsp;
                                        &nbsp;
                                        <label class="boxed-check">
                                            <input class="boxed-check-input " type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian2" value="N" onclick="cekPilihUjianT()">
                                            <div class="boxed-check-label">Tidak</div>
                                        </label>
                                    </div>
                                    <div class="text-center text-danger font-weight-bold font-italic text-md blink" id="err_cek_pilih_ujian"></div>
                                </td>
                                <td>
                                    <div class="row boxed-check-group boxed-check-primary justify-content-center mb-0">
                                        <label class="boxed-check">
                                            <input class="boxed-check-input " type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian1" value="Y" onclick="cekPilihUjianY()">
                                            <div class="boxed-check-label">Ya</div>
                                        </label>
                                        &nbsp;
                                        &nbsp;
                                        <label class="boxed-check">
                                            <input class="boxed-check-input " type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian2" value="N" onclick="cekPilihUjianT()">
                                            <div class="boxed-check-label">Tidak</div>
                                        </label>
                                    </div>
                                    <div class="text-center text-danger font-weight-bold font-italic text-md blink" id="err_cek_pilih_ujian"></div>
                                </td>
                                <td>
                                    <div class="row boxed-check-group boxed-check-primary justify-content-center mb-0">
                                        <label class="boxed-check">
                                            <input class="boxed-check-input " type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian1" value="Y" onclick="cekPilihUjianY()">
                                            <div class="boxed-check-label">Ya</div>
                                        </label>
                                        &nbsp;
                                        &nbsp;
                                        <label class="boxed-check">
                                            <input class="boxed-check-input " type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian2" value="N" onclick="cekPilihUjianT()">
                                            <div class="boxed-check-label">Tidak</div>
                                        </label>
                                    </div>
                                    <div class="text-center text-danger font-weight-bold font-italic text-md blink" id="err_cek_pilih_ujian"></div>
                                </td>
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