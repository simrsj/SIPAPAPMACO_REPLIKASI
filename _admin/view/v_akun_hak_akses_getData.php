<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

$sql_user_prvl = "SELECT * FROM tb_user ";
$sql_user_prvl .= " JOIN tb_user_privileges ON tb_user.id_user = tb_user_privileges.id_user ";
$sql_user_prvl .= " WHERE tb_user.id_user=" . $_GET['ha'];
// echo $sql_user_prvl;
$q_user_prvl = $conn->query($sql_user_prvl);
$d_user_prvl = $q_user_prvl->fetch(PDO::FETCH_ASSOC);
?>
<form method="post" id="form_ubah">
    <input type="hidden" name="id_user" id="id_user" value="<?= $d_user_prvl['id_user']; ?>">
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
            <tbody class="text-center">
                <!-- Kuota  -->
                <tr>
                    <td>Kuota</td>
                    <td>
                        <?php
                        $c_kuotaY = "";
                        $c_kuotaN = "";
                        if ($d_user_prvl['c_kuota'] == 'Y') $c_kuotaY = "checked";
                        else if ($d_user_prvl['c_kuota'] == 'N')  $c_kuotaN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="c_kuota" id="c_kuotaY" value="Y" <?= $c_kuotaY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="c_kuota" id="c_kuotaT" value="N" <?= $c_kuotaN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_c_kuota"></div>
                    </td>
                    <td>
                        <?php
                        $r_kuotaY = "";
                        $r_kuotaN = "";
                        if ($d_user_prvl['r_kuota'] == 'Y') $r_kuotaY = "checked";
                        else if ($d_user_prvl['r_kuota'] == 'N')  $r_kuotaN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="r_kuota" id="r_kuotaY" value="Y" <?= $r_kuotaY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="r_kuota" id="r_kuotaT" value="N" <?= $r_kuotaN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_r_kuota"></div>
                    </td>
                    <td>
                        <?php
                        $u_kuotaY = "";
                        $u_kuotaN = "";
                        if ($d_user_prvl['u_kuota'] == 'Y') $u_kuotaY = "checked";
                        else if ($d_user_prvl['u_kuota'] == 'N')  $u_kuotaN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="u_kuota" id="u_kuotaY" value="Y" <?= $u_kuotaY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="u_kuota" id="u_kuotaT" value="N" <?= $u_kuotaN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_u_kuota"></div>
                    </td>
                    <td>
                        <?php
                        $d_kuotaY = "";
                        $d_kuotaN = "";
                        if ($d_user_prvl['d_kuota'] == 'Y') $d_kuotaY = "checked";
                        else if ($d_user_prvl['d_kuota'] == 'N')  $d_kuotaN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="d_kuota" id="d_kuotaY" value="Y" <?= $d_kuotaY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="d_kuota" id="d_kuotaT" value="N" <?= $d_kuotaN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_d_kuota"></div>
                    </td>
                </tr>
                <!-- Akun  -->
                <tr>
                    <td>Akun</td>
                    <td>
                        <?php
                        $c_akunY = "";
                        $c_akunN = "";
                        if ($d_user_prvl['c_akun'] == 'Y') $c_akunY = "checked";
                        else if ($d_user_prvl['c_akun'] == 'N')  $c_akunN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="c_akun" id="c_akunY" value="Y" <?= $c_akunY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="c_akun" id="c_akunT" value="N" <?= $c_akunN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_c_akun"></div>
                    </td>
                    <td>
                        <?php
                        $r_akunY = "";
                        $r_akunN = "";
                        if ($d_user_prvl['r_akun'] == 'Y') $r_akunY = "checked";
                        else if ($d_user_prvl['r_akun'] == 'N')  $r_akunN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="r_akun" id="r_akunY" value="Y" <?= $r_akunY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="r_akun" id="r_akunT" value="N" <?= $r_akunN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_r_akun"></div>
                    </td>
                    <td>
                        <?php
                        $u_akunY = "";
                        $u_akunN = "";
                        if ($d_user_prvl['u_akun'] == 'Y') $u_akunY = "checked";
                        else if ($d_user_prvl['u_akun'] == 'N')  $u_akunN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="u_akun" id="u_akunY" value="Y" <?= $u_akunY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="u_akun" id="u_akunT" value="N" <?= $u_akunN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_u_akun"></div>
                    </td>
                    <td>
                        <?php
                        $d_akunY = "";
                        $d_akunN = "";
                        if ($d_user_prvl['d_akun'] == 'Y') $d_akunY = "checked";
                        else if ($d_user_prvl['d_akun'] == 'N')  $d_akunN = "checked";
                        else echo "ERROR!";
                        ?>
                        <input type="radio" name="d_akun" id="d_akunY" value="Y" <?= $d_akunY; ?>>Ya&nbsp;&nbsp;
                        <input type="radio" name="d_akun" id="d_akunT" value="N" <?= $d_akunN; ?>>Tidak
                        <div class="text-center text-danger font-weight-bold font-italic text-xs blink" id="err_d_akun"></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="form-inline navbar nav-link justify-content-end">
        <button type="button" name="ubah" class="btn btn-success mb-2 ubah">
            Ubah
        </button>
    </div>
</form>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(document).on('click', '.ubah', function() {
        var data = $('#form_ubah').serialize();
        var id_user = $("#id_user").val();
        var c_kuota = $("input[name='c_kuota']:checked").val();
        var r_kuota = $("input[name='r_kuota']:checked").val();
        var u_kuota = $("input[name='u_kuota']:checked").val();
        var d_kuota = $("input[name='d_kuota']:checked").val();
        var c_akun = $("input[name='c_akun']:checked").val();
        var r_akun = $("input[name='r_akun']:checked").val();
        var u_akun = $("input[name='u_akun']:checked").val();
        var d_akun = $("input[name='d_akun']:checked").val();

        // console.log(c_kuota + r_kuota + u_kuota + d_kuota);

        if (
            id_user != "" &&
            c_kuota != "" &&
            r_kuota != "" &&
            u_kuota != "" &&
            d_kuota != "" &&
            c_akun != "" &&
            r_akun != "" &&
            u_akun != "" &&
            d_akun != ""
        ) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_v_akun_hak_akses_u.php",
                data: data,
                success: function() {
                    $('#data_ha').load('_admin/view/v_akun_hak_akses_getData.php?ha=<?= $_GET['ha']; ?>');
                    Swal.fire({
                        allowOutsideClick: false,
                        icon: 'success',
                        title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Diubah</b></div>',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }
    });
</script>