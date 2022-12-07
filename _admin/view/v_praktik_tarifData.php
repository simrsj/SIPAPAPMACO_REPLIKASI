<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
$sql_prvl = "SELECT * FROM tb_user_privileges ";
$sql_prvl .= " JOIN tb_user ON tb_user_privileges.id_user = tb_user.id_user";
$sql_prvl .= " WHERE tb_user.id_user = " . base64_decode(urldecode($_GET['idu']));
try {
    $q_prvl = $conn->query($sql_prvl);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRIVILEGES-');";
    echo "document.location.href='?error404';</script>";
}
$d_prvl = $q_prvl->fetch(PDO::FETCH_ASSOC);

$sql_praktik_tarif = "SELECT * FROM tb_tarif_pilih ";
$sql_praktik_tarif .= " JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik ";
$sql_praktik_tarif .= " WHERE tb_praktik.status_praktik = 'Y' AND tb_praktik.id_praktik = " . base64_decode(urldecode($_GET['idp']));
$sql_praktik_tarif .= " ORDER BY tb_tarif_pilih.nama_jenis_tarif_pilih ASC";
// echo "$sql_praktik_tarif<br>";
try {
    $q_praktik_tarif = $conn->query($sql_praktik_tarif);
} catch (Exception $ex) {
    echo "<script>alert('$ex -DATA PRAKTIK');";
    echo "document.location.href='?error404';</script>";
}
$r_praktik_tarif = $q_praktik_tarif->rowCount();

if ($r_praktik_tarif > 0) {
?>
    <div class="table-responsive">
        <table class="table table-striped table-bordered" id="<?= $_GET['tb'] ?>">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jenis tarif</th>
                    <th scope="col">Nama Tarif </th>
                    <th scope="col">Tarif </th>
                    <th scope="col">Satuan </th>
                    <th scope="col">Frekuensi </th>
                    <th scope="col">Kuantitas </th>
                    <th scope="col">Total Tarif </th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_jumlah_tarif = 0;
                $no = 1;
                while ($d_praktik_tarif = $q_praktik_tarif->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr class="text-center align-middle my-auto">
                        <td class="align-middle "><?= $no; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['nama_jenis_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['nama_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= "Rp " . number_format($d_praktik_tarif['nominal_tarif_pilih'], 0, ",", "."); ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['nama_satuan_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['frekuensi_tarif_pilih']; ?></td>
                        <td class="align-middle "><?= $d_praktik_tarif['kuantitas_tarif_pilih']; ?></td>
                        <td class="align-middle "> <?= "Rp " . number_format($d_praktik_tarif['jumlah_tarif_pilih'], 0, ",", "."); ?></td>
                        <td class="align-middle ">
                            <?php if ($d_praktik_tarif['status_tarif_pilih'] == 'Y') { ?>
                                <span class="badge badge-success">Aktif</span>
                            <?php } else if ($d_praktik_tarif['status_tarif_pilih'] == 'T') { ?>
                                <span class="badge badge-danger">Tidak Aktif</span>
                            <?php } else { ?>
                                <span class="badge badge-danger">ERROR!!!</span>
                            <?php } ?>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" role="group" aria-label="Basic example">
                                <div class="btn-group" role="group" role="group" aria-label="Basic example">
                                    <?php if ($d_prvl['u_praktik_tarif'] == 'T') { ?>
                                    <?php } ?>
                                    <?php if ($d_prvl['d_praktik_tarif'] == 'Y') { ?>
                                        <!-- tombol modal hapus pilih tarif  -->
                                        <a title="Hapus" class='btn btn-outline-danger' href='#' data-toggle="modal" data-target="#<?= md5('md' . $d_praktik_tarif['id_tarif_pilih']); ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>

                                        <!-- modal hapus pilih tarif  -->
                                        <div class="modal fade text-center" id="<?= md5('md' . $d_praktik_tarif['id_tarif_pilih']); ?>">
                                            <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-body h5">
                                                        <div class="row">
                                                            <div class="col-lg text-left">
                                                                Hapus Tarif Praktik ?
                                                            </div>
                                                            <div class="col-lg text-right">
                                                                <a class="btn btn-outline-secondary btn-sm" data-dismiss="modal">
                                                                    Kembali
                                                                </a>
                                                                &nbsp;
                                                                <a class="btn btn-outline-danger btn-sm <?= md5('hapus' . $d_praktik_tarif['id_tarif_pilih']); ?>" id="<?= urlencode(base64_encode($d_praktik_tarif['id_tarif_pilih'])); ?>" data-dismiss="modal">
                                                                    Hapus
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#<?= $_GET['dt'] ?>').DataTable();
                                    });

                                    <?php if ($d_prvl['d_praktik_tarif'] == 'Y') { ?>
                                        $(document).on('click', '.<?= md5('hapus' . $d_praktik_tarif['id_tarif_pilih']); ?>', function() {
                                            console.log("hapus data tarif Pilih");
                                            $.ajax({
                                                type: 'POST',
                                                url: "_admin/exc/x_v_praktik_tarif_h.php",
                                                data: {
                                                    "idptrf": $(this).attr('id')
                                                },
                                                success: function() {

                                                    $('#<?= md5('md' . $d_praktik_tarif['id_tarif_pilih']); ?>').on('hidden.bs.modal', function(e) {
                                                        $('#<?= md5("data" . $d_praktik_tarif['id_praktik']); ?>')
                                                            .load("_admin/view/v_praktik_tarifData.php?idu=<?= $_GET['idu']; ?>&idp=<?= $_GET['idp']; ?>&dt=<?= $_GET['dt'] ?>");
                                                    })
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
                                                        title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Dihapus</b></div>'
                                                    });
                                                },
                                                error: function(response) {
                                                    console.log(response);
                                                    alert('eksekusi query gagal');
                                                }
                                            });
                                        });
                                    <?php } ?>
                                </script>
                            </div>
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
    <div class="jumbotron">
        <div class="jumbotron-fluid">
            <div class="text-gray-700">
                <h5 class="text-center">Data Praktikan Tidak Ada</h5>
            </div>
        </div>
    </div>
<?php
}
?>