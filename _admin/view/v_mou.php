<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-11">
            <h1 class="h3 mb-2 text-gray-800">Daftar MoU</h1>
        </div>
        <div class="col-lg-1">
            <a href="?mou&i" class="btn btn-outline-success btn-sm">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
    </div>
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
            ORDER BY tb_institusi.nama_institusi ASC";

            $q_mou = $conn->query($sql_mou);
            $r_mou = $q_mou->rowCount();
            $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);

            if ($r_mou > 0) {
            ?>
                <div class='table-responsive'>
                    <table class='table table-striped table-hover' id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Institusi</th>
                                <th>Tanggal Akhir</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $q_mou_a = $conn->query($sql_mou);

                            $no = 1;

                            while ($d_mou = $q_mou_a->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d_mou['nama_institusi']; ?></td>
                                <td><?php echo tanggal($d_mou['tgl_selesai_mou']); ?></td>
                                <?php
                                $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                $date_now = strtotime(date('Y-m-d'));
                                $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                if ($date_diff <= 0) {
                                ?>
                                    <td>
                                        <button type='button' class='btn btn-success btn-sm'>Masih Berlaku</button>
                                    </td>
                                <?php
                                } elseif ($date_diff > 0) {
                                ?>
                                    <td>
                                        <button class='btn btn-danger btn-sm'>Tidak Berlaku</button>
                                    </td>
                                <?php
                                }
                                ?>
                                <td>
                                    <a title="Rincian" href='?mou&u=<?php echo $d_mou['id_mou']; ?>' class="btn btn-info btn-sm" data-toggle="modal" data-target="#m_r_m<?php echo $d_mou['id_mou']; ?>">
                                        <i class="fas fa-info-circle"></i>
                                    </a>

                                    <!-- modal rincian -->
                                    <div class="modal fade" id="m_r_m<?php echo $d_mou['id_mou']; ?>" tabindex="-1">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title h4" id="exampleModalXlLabel">DATA MOU : </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <b>Nama Instansi : </b><br>
                                                            <?php echo $d_mou['nama_institusi']; ?><br><br>
                                                            <b>No Mou RSJ : </b><br>
                                                            <?php echo $d_mou['no_rsj_mou']; ?><br><br>
                                                            <b>No Mou Institusi : </b><br>
                                                            <?php echo $d_mou['no_institusi_mou']; ?><br><br>
                                                            <b>Jurusan : </b><br>
                                                            <?php echo $d_mou['nama_jurusan_pdd']; ?><br><br>
                                                            <b>Jenjang : </b><br>
                                                            <?php echo $d_mou['nama_jenjang_pdd']; ?><br><br>
                                                            <b>Spesifikasi : </b><br>
                                                            <?php echo $d_mou['nama_spesifikasi_pdd']; ?><br><br>
                                                            <b>Akreditasi : </b><br>
                                                            <?php echo $d_mou['nama_akreditasi']; ?><br><br>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <b>Tangga Mulai MoU</b><br>
                                                            <?php echo tanggal($d_mou['tgl_mulai_mou']); ?><br><br>
                                                            <b>Tangga Selesai MoU </b><br>
                                                            <?php echo tanggal($d_mou['tgl_selesai_mou']); ?><br><br>
                                                            <b>Status MoU </b><br>
                                                            <?php
                                                            $date_end = strtotime($d_mou['tgl_selesai_mou']);
                                                            $date_now = strtotime(date('Y-m-d'));
                                                            $date_diff = ($date_now - $date_end) / 24 / 60 / 60;

                                                            if ($date_diff <= 0) {
                                                                echo "
                                                                    <button type='button' class='btn btn-success btn-sm'>
                                                                        Masih Berlaku
                                                                    </button>
                                                                ";
                                                            } elseif ($date_diff > 0) {
                                                                echo "
                                                                    <button type='button' class='btn btn-danger btn-sm'>
                                                                        Tidak Berlaku
                                                                    </button>
                                                                ";
                                                            }
                                                            ?><br><br>
                                                            <b>FILE SURAT : </b><br>
                                                            <a href="<?php echo $d_mou['surat_praktik']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                                <i class="fas fa-file-download"></i> Download
                                                            </a><br><br>
                                                            <b>DATA PRAKTIKAN :</b><br>
                                                            <a href="<?php echo $d_mou['data_praktik']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                                <i class="fas fa-file-download"></i> Download
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a title="Ubah" href='?mou&u=<?php echo $d_mou['id_mou']; ?>' class=" btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Hapus" href='?mou&d=<?php echo $d_mou['id_mou']; ?>' class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
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
                <h3> Data MoU Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->