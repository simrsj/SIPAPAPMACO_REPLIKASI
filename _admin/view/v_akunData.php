<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";

$sql_prvl = "SELECT * FROM tb_user_privileges WHERE id_user = " . $_GET['id'];
$q_prvl = $conn->query($sql_prvl);
$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);

$sql_user = "SELECT * FROM tb_user ";
$sql_user .= " ORDER BY tb_user.nama_user ASC";
// echo $sql_user;
$q_user = $conn->query($sql_user);
$r_user = $q_user->rowCount();

if ($r_user > 0) {
?>
    <div class="table-responsive">
        <table class="table table-striped text-xs" id="myTable">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Akun</th>
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
                <?php
                $no = 1;
                while ($d_user = $q_user->fetch(PDO::FETCH_ASSOC)) {

                    $sql_institusi = "SELECT * FROM tb_institusi WHERE id_institusi = " . $d_user['id_institusi'];
                    $q_institusi = $conn->query($sql_institusi);
                    $d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC);
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $d_user['nama_user']; ?></td>
                        <td>
                            <?php
                            if ($d_user['id_institusi'] == 0) {
                                echo "-";
                            } else {
                                echo $d_institusi['nama_institusi'];
                            }
                            ?>
                        </td>
                        <td><?= $d_user['email_user']; ?></td>
                        <td><?= $d_user['no_telp_user']; ?></td>
                        <td class="text-center"><?= $d_user['tgl_buat_user']; ?></td>
                        <td class="text-center">
                            <?php
                            if ($d_user['terakhir_login_user'] != "") {
                                echo $d_user['terakhir_login_user'];
                            } else {
                                echo "-";
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <?php
                            if ($d_user['level_user'] == 1) {
                            ?>
                                <span class="badge badge-primary">ADMIN</span>
                            <?php
                            } elseif ($d_user['level_user'] == 2) {
                            ?>
                                <span class="badge badge-success">INSITUSI</span>
                            <?php
                            } elseif ($d_user['level_user'] == 3) {
                            ?>
                                <span class="badge badge-warning">KEUANGAN</span>
                            <?php
                            } elseif ($d_user['level_user'] == 4) {
                            ?>
                                <span class="badge badge-secondary">PEMBIMBING</span>
                            <?php
                            } else {
                            ?>
                                <span class="text-warning">ERROR!</span>
                            <?php
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="" class="btn btn-primary btn-xs ubah_init" title="Ubah Akun">
                                <i class="fas fa-edit"></i>
                            </a>
                            <?php
                            if ($d_prvl['u_akun'] == 'Y' && $d_user['id_user'] != 1) {
                            ?>
                                <a href="?aku&ha=<?= $d_user['id_user']; ?>" class="btn btn-success btn-xs" title="Hak Akses">
                                    <i class="fas fa-list"></i>
                                </a>
                            <?php
                            }
                            if ($d_prvl['d_akun'] == 'Y' && $d_user['id_user'] != 1) {
                            ?>
                                <a class="btn btn-danger btn-xs hapus" title="Hapus Akun" id="<?= $d_user['id_user']; ?>">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            <?php
                            } ?>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
<?php
} else {
?>
    <h3 class='text-center'> Data Akun Anda Tidak Ada</h3>
<?php
}
?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(document).on('click', '.hapus', function() {
        Swal.fire({
            position: 'top',
            title: 'Hapus Data ?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Ya',
            allowOutsideClick: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_akun_d.php",
                    data: {
                        "id_user": $(this).attr('id')
                    },
                    success: function() {
                        $('#data_akun').load('_admin/view/v_akunData.php?id=' + <?= $_GET['id']; ?>);

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

                        Toast.fire({
                            icon: 'success',
                            title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Dihapus</div>'
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }
        });
    });
</script>