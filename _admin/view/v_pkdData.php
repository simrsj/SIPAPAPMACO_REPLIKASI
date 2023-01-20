<?php

include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
//data privileges 
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
if ($d_prvl['c_pkd'] == "Y") {
    $sql_pkd = "SELECT * FROM tb_pkd ";
    $sql_pkd .= " ORDER BY tgl_tambah_pkd DESC";
    // echo $sql_pkd."<br>";
    try {
        $q_pkd = $conn->query($sql_pkd);
        $r_pkd = $q_pkd->rowCount();
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PKD NARSUM-');";
        echo "document.location.href='?error404';</script>";
    }
    if ($r_pkd > 0) {
?>
        <div class="table-responsive text-md">
            <!-- <div class="h6 b text-center">
                Hilang/Munculkan Kolom Tabel:
                <div class="m-1">
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="1">Nama Institusi</a>
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="2">Nama Institusi</a>
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="3">Nama Institusi</a>
                    <a class="toggle-vis btn btn-outline-primary btn-xs" data-column="4">Nama Institusi</a>
                </div>
            </div> 
            <hr>-->
            <table class="table table-striped table-bordered m-auto display" width="100%" id="table-search-each">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No&nbsp;&nbsp;</th>
                        <th>Pemohon</th>
                        <th width="30%">Rincian</th>
                        <th>Tgl<br>Pelaksanaan</th>
                        <th>Nama<br>Koordinator</th>
                        <th>Telpon<br>Koordinator</th>
                        <th>E-Mail<br>Koordinator</th>
                        <th>Biaya/Tarif</th>
                        <th>File<br>Surat&nbsp;&nbsp;&nbsp;</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($d_pkd = $q_pkd->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr class="text-center">
                            <td class="align-middle"><?= $no; ?></td>
                            <td class="align-middle"><?= $d_pkd['nama_pemohon_pkd'] ?></td>
                            <td class="align-middle"><?= $d_pkd['rincian_pkd'] ?></td>
                            <td class="align-middle"><?= tanggal($d_pkd['tgl_pel_pkd']) ?></td>
                            <td class="align-middle"><?= $d_pkd['nama_kor_pkd'] ?></td>
                            <td class="align-middle"><?= $d_pkd['telp_kor_pkd'] ?></td>
                            <td class="align-middle"><?= $d_pkd['email_kor_pkd'] ?></td>
                            <td class="align-middle">
                                <?php
                                $sql_pkdt = "SELECT * FROM tb_pkd_tarif";
                                $sql_pkdt .= " WHERE id_pkd = " . $d_pkd['id_pkd'];
                                // echo $sql_pkdt."<br>";
                                $sql_pkdtt = "SELECT SUM(total_pkd_tarif) FROM tb_pkd_tarif WHERE id_pkd = " . $d_pkd['id_pkd'];
                                // echo $sql_pkdtt . "<br>";
                                try {
                                    $q_pkdt = $conn->query($sql_pkdt);
                                    $q_pkdtt = $conn->query($sql_pkdtt);
                                    $d_pkdtt = $q_pkdtt->fetch(PDO::FETCH_ASSOC);
                                    $r_pkdt = $q_pkdt->rowCount();
                                } catch (Exception $ex) {
                                    echo "<script>alert('$ex -DATA PKD NARSUM-');";
                                    echo "document.location.href='?error404';</script>";
                                }
                                if ($r_pkdt > 0) {
                                ?>
                                    <?= "Rp " . number_format($d_pkdtt[0], 0, '.', '.'); ?>
                                <?php
                                } else {
                                ?>
                                    <span class="badge badge-danger">Data Biaya/Tarif Tidak Ada</span>
                                <?php
                                }
                                ?>
                                <br>
                                <!-- Tombol Modal Biaya/Tarif  -->

                                <a title="Biaya/Tarif" class='btn btn-danger btn-sm ' href='?pkdt=<?= urlencode(base64_encode($d_pkd['id_pkd'])) ?>'>
                                    <i class="fa-solid fa-receipt"></i>
                                </a>
                                <a title="Rincian" class="btn btn-outline-info btn-sm" href="#" data-toggle="modal" data-target="#see_1">
                                    <i class="fa-solid fa-circle-info"></i>
                                </a>
                                <!-- Modal Biaya/Tarif  -->
                                <div class="modal fade" id="see_1">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <form id="form_t">
                                                <div class="modal-header h4">
                                                    Biaya/Tarif
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    if ($r_pkdt > 0) {
                                                    ?>
                                                        <table>
                                                            <thead>
                                                                <tr class="text-center">
                                                                    <th>No</th>
                                                                    <th>Nama Tarif</th>
                                                                    <th>Frekuensi</th>
                                                                    <th>Tarif</th>
                                                                    <th>Satuan</th>
                                                                    <th>Jumlah Tarif</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                while ($d_pkd = $q_pkd->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                                    <tr class="text-center">
                                                                        <td><?= $no; ?></td>
                                                                        <td><?= $d_pkd['nama_pkd_tarif']; ?></td>
                                                                        <td><?= $d_pkd['frekuensi_pkd_tarif']; ?></td>
                                                                        <td><?= "Rp " . number_format($d_pkd['jumlah_pkd_tarif'], 0, '.', '.'); ?></td>
                                                                        <td><?= $d_pkd['satuan_pkd_tarif']; ?></td>
                                                                        <td><?= "Rp " . number_format($d_pkd['total_pkd_tarif'], 0, '.', '.'); ?></td>
                                                                        <td><?= $no; ?></td>
                                                                    </tr>
                                                                <?php
                                                                    $no++;
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="jumbotron">
                                                            <div class="jumbotron-fluid">
                                                                <div class="text-gray-700">
                                                                    <h5 class="text-center">Data Biaya/Tarif Tidak Ada</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">
                                <a href="<?= $d_pkd['file_surat_pkd'] ?>" class="btn btn-outline-primary btn-sm" download="file_pkd">
                                    <i class="fa-solid fa-file-arrow-down"></i>
                                </a>
                            </td>
                            <td class="align-middle">
                                <div class="btn-group" role="group">
                                    <a title="Arsip" class='btn btn-primary btn-sm' href=' #'>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a title="Hapus" class='btn btn-danger btn-sm ' href='#'>
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        ?>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php
    } else {
    ?>
        <div class="jumbotron">
            <div class="jumbotron-fluid">
                <div class="text-gray-700">
                    <h5 class="text-center"> Data PKD Tidak Ada</h5>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
