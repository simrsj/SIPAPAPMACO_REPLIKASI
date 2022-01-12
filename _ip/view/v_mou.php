<?php
if (isset($_POST['hapus_mou'])) {
    $conn->query("DELETE FROM `tb_mou` WHERE `id_mou` = " . $_POST['id_mou']);
    echo "
    <script>
        document.location.href = '?mou';
    </script>
    ";
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <div class="h4 text-gray-800 my-auto">MoU Kerjasama</div>
            </div>
            <div class="col-lg-2 text-right my-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-warning btn-sm dropdown-toggle text-gray-800" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-handshake"></i> Pengajuan
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pb">Pengajuan Baru</a>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#pp">Pengajuan Perpanjang</a>
                    </div>

                    <!-- modal pengajuan baru-->
                    <div class="modal fade text-center" id="pb" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="post" action="" class="form-group">
                                    <div class="modal-header">
                                        <h4>Pengajuan Baru</h4>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php

                                        // cari data mou yang sudah punya
                                        $sql_mou_ada = "SELECT * FROM tb_mou 
                                        WHERE id_institusi = '" . $_SESSION['id_institusi'] . "'
                                        AND status_mou";
                                        $q_mou_ada = $conn->query($sql_mou_ada);
                                        $r_mou_ada = $q_mou_ada->rowCount();
                                        if ($r_mou_ada > 0) {
                                        ?>
                                            <fieldset class="fieldset font-weight-bold">
                                                Anda mempunyai Data MoU sebelumnya
                                            </fieldset>
                                        <?php
                                        }
                                        ?>

                                        <b>Nama Institusi : </b><br>
                                        <?php
                                        $sql_cari_institusi = "SELECT * FROM tb_institusi WHERE id_institusi = " . $_SESSION['id_institusi'];
                                        echo $sql_cari_institusi . "<br>";
                                        $q_cari_institusi = $conn->query($sql_cari_institusi);
                                        $d_cari_institusi = $q_cari_institusi->fetch(PDO::FETCH_ASSOC);

                                        echo $d_cari_institusi['nama_institusi'];

                                        ?>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="pb" class="btn btn-primary btn-sm" value="Ajukan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- modal pengajuan perpanjang-->
                    <div class="modal fade text-center  " id="pp" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form method="post" action="" class="form-group">
                                    <div class="modal-header">
                                        <h4>Pengajuan Perpanjang</h4>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <b>Nama Institusi : </b><br>
                                        <?php
                                        $sql_cari_institusi = "SELECT * FROM tb_institusi WHERE id_institusi = '" . $_SESSION['id_institusi'] . "'";
                                        $q_cari_institusi = $conn->query($sql_cari_institusi);
                                        $d_cari_institusi = $q_cari_institusi->fetch(PDO::FETCH_ASSOC);

                                        echo $d_cari_institusi['nama_institusi'];

                                        ?>
                                        <br><br>
                                        <b>Pilih No. MoU: </b><br>
                                        <?php
                                        $sql_cari_institusi = "SELECT * FROM tb_institusi 
                                        JOIN tb_mou ON tb_institusi.id_institusi = tb_mou.id_institusi 
                                        WHERE tb_institusi.id_institusi = '" . $_SESSION['id_institusi'] . "'";
                                        $q_cari_institusi = $conn->query($sql_cari_institusi);
                                        ?>
                                        <select class="js-example-placeholder-single" name="id_mou">
                                            <option value=""></option>
                                            <?php
                                            while ($d_cari_institusi = $q_cari_institusi->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $d_cari_institusi['id_mou']; ?>">
                                                    <?php
                                                    echo $d_cari_institusi['no_rsj_mou'] . "-" . $d_cari_institusi['no_institusi_mou'];
                                                    ?>
                                                </option>
                                            <?php
                                            }
                                            ?>
                                        </select><br>
                                        <span class="font-italic text-xs">Format No. MoU : No MoU RSJ_No MoU Institusi</span>
                                        <br>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="pp" class="btn btn-primary btn-sm" value="Ajukan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_mou = "SELECT * FROM tb_mou 
                    JOIN tb_institusi ON tb_mou.id_institusi = tb_institusi.id_institusi
                    JOIN tb_jurusan_pdd ON tb_mou.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_jenjang_pdd ON tb_mou.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_spesifikasi_pdd ON tb_mou.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_akreditasi ON tb_mou.id_akreditasi = tb_akreditasi.id_akreditasi
                    WHERE tb_institusi.id_institusi = " . $_SESSION['id_institusi'] . "
                    ORDER BY tb_institusi.nama_institusi ASC";

                // echo $sql_mou . "<br>";

                $q_mou = $conn->query($sql_mou);
                $r_mou = $q_mou->rowCount();
                $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);

                if ($r_mou > 0) {
                ?>
                    <div class='table-responsive'>
                        <table class='table table-striped table-hover text-md' id="myTable">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope='col'>No</th>
                                    <th>Tanggal Akhir MoU</th>
                                    <th>Berlaku /<br>Tidak Berlaku</th>
                                    <th>Nama Institusi</th>
                                    <th>Keterangan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $q_mou_a = $conn->query($sql_mou);

                                $no = 1;

                                while ($d_mou = $q_mou_a->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td class="text-center my-auto"><?php echo $no; ?></td>
                                        <td class="text-center my-auto"><?php echo tanggal_min_alt($d_mou['tgl_selesai_mou']); ?></td>
                                        <td class="text-center my-auto">
                                            <?php
                                            $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                            $date_now = strtotime(date('Y-m-d'));
                                            $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                            if ($date_diff <= 0) {
                                            ?>
                                                <span class="badge badge-success text-xs">Belaku</span>
                                            <?php
                                            } elseif ($date_diff > 0) {
                                            ?>
                                                <span class="badge badge-danger text-xs">Tidak Berlaku</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $d_mou['nama_institusi']; ?></td>
                                        <td class="text-center my-auto text-capitalize">
                                            <?php
                                            $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                            $date_now = strtotime(date('Y-m-d'));
                                            $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                            if ($d_mou['status_mou'] == 'belum pengajuan') {
                                            ?>
                                                <span class="badge badge-danger text-xs"><?php echo $d_mou['status_mou']; ?></span>
                                            <?php
                                            } elseif ($d_mou['status_mou'] == 'proses pengajuan baru') {
                                            ?>
                                                <span class="badge badge-primary text-xs"><?php echo $d_mou['status_mou']; ?></span>
                                            <?php
                                            } elseif ($d_mou['status_mou'] == 'proses pengajuan baru') {
                                            ?>
                                                <span class="badge badge-primary text-xs"><?php echo $d_mou['status_mou']; ?></span>
                                            <?php
                                            } elseif ($d_mou['status_mou'] == 'aktif') {
                                            ?>
                                                <span class="badge badge-success text-xs"><?php echo $d_mou['status_mou']; ?></span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger text-xs">"ERROR"</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center my-auto">

                                            <!-- tombol rincian -->
                                            <a title="Rincian" href='#' class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_r_m<?php echo $d_mou['id_mou']; ?>">
                                                <i class="fas fa-info-circle"></i>
                                            </a>

                                            <!-- modal rincian -->
                                            <div class="modal fade text-left" data-backdrop="static" data-keyboard="false" id="m_r_m<?php echo $d_mou['id_mou']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title h4" id="exampleModalXlLabel">DATA MOU : </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>Nama Instansi : </b><br>
                                                            <?php echo $d_mou['nama_institusi']; ?><br><br>
                                                            <b>No Mou RSJ : </b>
                                                            <?php echo $d_mou['no_rsj_mou']; ?><br><br>
                                                            <b>No Mou Institusi : </b>
                                                            <?php echo $d_mou['no_institusi_mou']; ?><br><br>
                                                            <b>Jurusan : </b>
                                                            <?php echo $d_mou['nama_jurusan_pdd']; ?><br><br>
                                                            <b>Jenjang : </b>
                                                            <?php echo $d_mou['nama_jenjang_pdd']; ?><br><br>
                                                            <b>Spesifikasi : </b>
                                                            <?php echo $d_mou['nama_spesifikasi_pdd']; ?><br><br>
                                                            <b>Akreditasi Institusi : </b>
                                                            <?php echo $d_mou['nama_akreditasi']; ?><br><br>
                                                            <b>Tangga Mulai MoU : </b>
                                                            <?php echo tanggal($d_mou['tgl_mulai_mou']); ?><br><br>
                                                            <b>Tangga Selesai MoU : </b>
                                                            <?php echo tanggal($d_mou['tgl_selesai_mou']); ?><br><br>
                                                            <b>Status MoU : </b>
                                                            <?php
                                                            $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                                            $date_now = strtotime(date('Y-m-d'));
                                                            $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                                            if ($date_diff <= 0) {
                                                            ?>
                                                                <span class="badge badge-success text-md">MASIH BERLAKU</span>
                                                            <?php
                                                            } elseif ($date_diff > 0) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">TIDAK BERLAKU</span>
                                                            <?php
                                                            }
                                                            ?><br><br>
                                                            <b>File MOU : </b>
                                                            <?php
                                                            if ($d_mou['file_mou'] == NULL) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">DATA FILE TIDAK ADA</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?php echo $d_mou['file_mou']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-file-download"></i> Download
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a title="Pengajuan" href='#' class="btn btn-warning btn-sm" data-toggle="modal" data-target="#p_r_m<?php echo $d_mou['id_mou']; ?>">
                                                <i class="fas fa-fw fa-handshake"></i>
                                            </a>

                                            <!-- modal pengajuan -->
                                            <div class="modal fade text-left" data-backdrop="static" data-keyboard="false" id="p_r_m<?php echo $d_mou['id_mou']; ?>" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title h4" id="exampleModalXlLabel">DATA MOU : </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>Nama Instansi : </b><br>
                                                            <?php echo $d_mou['nama_institusi']; ?><br><br>
                                                            <b>No Mou RSJ : </b>
                                                            <?php echo $d_mou['no_rsj_mou']; ?><br><br>
                                                            <b>No Mou Institusi : </b>
                                                            <?php echo $d_mou['no_institusi_mou']; ?><br><br>
                                                            <b>Jurusan : </b>
                                                            <?php echo $d_mou['nama_jurusan_pdd']; ?><br><br>
                                                            <b>Jenjang : </b>
                                                            <?php echo $d_mou['nama_jenjang_pdd']; ?><br><br>
                                                            <b>Spesifikasi : </b>
                                                            <?php echo $d_mou['nama_spesifikasi_pdd']; ?><br><br>
                                                            <b>Akreditasi Institusi : </b>
                                                            <?php echo $d_mou['nama_akreditasi']; ?><br><br>
                                                            <b>Tangga Mulai MoU : </b>
                                                            <?php echo tanggal($d_mou['tgl_mulai_mou']); ?><br><br>
                                                            <b>Tangga Selesai MoU : </b>
                                                            <?php echo tanggal($d_mou['tgl_selesai_mou']); ?><br><br>
                                                            <b>Status MoU : </b>
                                                            <?php
                                                            $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                                            $date_now = strtotime(date('Y-m-d'));
                                                            $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                                            if ($date_diff <= 0) {
                                                            ?>
                                                                <span class="badge badge-success text-md">MASIH BERLAKU</span>
                                                            <?php
                                                            } elseif ($date_diff > 0) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">TIDAK BERLAKU</span>
                                                            <?php
                                                            }
                                                            ?><br><br>
                                                            <b>File MOU : </b>
                                                            <?php
                                                            if ($d_mou['file_mou'] == NULL) {
                                                            ?>
                                                                <span class="badge badge-danger text-md">DATA FILE TIDAK ADA</span>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <a href="<?php echo $d_mou['file_mou']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                                    <i class="fas fa-file-download"></i> Download
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tombol ubah  -->
                                            <a title="Ubah" href='?mou&u=<?php echo $d_mou['id_mou']; ?>' class=" btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- modal ubah  -->
                                            <a title="Hapus" href='#' class="btn btn-danger btn-sm" data-toggle="modal" data-target="#m_d_m<?php echo $d_mou['id_mou']; ?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <div class="modal fade" id="m_d_m<?php echo $d_mou['id_mou']; ?>" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form method="post" action="">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title h4">HAPUS DATA MOU : </h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <b>Nama Institusi : </b><br>
                                                                <?php echo $d_mou['nama_institusi']; ?><br><br>
                                                                <b>No RSJ MoU : </b><br>
                                                                <?php echo $d_mou['no_rsj_mou']; ?><br><br>
                                                                <b>No Insitusi MoU : </b><br>
                                                                <?php echo $d_mou['no_institusi_mou']; ?><br><br>
                                                                <b>Tanggal Mulai MoU : </b><br>
                                                                <?php echo tanggal($d_mou['tgl_mulai_mou']); ?><br><br>
                                                                <b>Tanggal Selesai MoU : </b><br>
                                                                <?php echo tanggal($d_mou['tgl_selesai_mou']); ?><br><br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input name="id_mou" value="<?php echo $d_mou['id_mou']; ?>" hidden>
                                                                <input type="submit" class="btn btn-danger btn-sm" name="hapus_mou" value="Hapus">
                                                                <input type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal" value="Kembali">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
                    <h3 class="text-center"> Data MoU Anda Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>