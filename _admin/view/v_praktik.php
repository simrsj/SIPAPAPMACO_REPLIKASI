<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Praktikan</h1>
        </div>
        <div class="col-lg-2">
            <a href="?prk&i" class="btn btn-outline-success btn-sm">
                <i class="fas fa-plus"></i> Tambah
            </a>
            <a href="?prk&a" class="btn btn-outline-info btn-sm">
                <i>
                    <svg width="16" height="16" fill="currentColor" class="bi bi-archive" viewBox="0 0 16 16">
                        <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z">
                    </svg>
                </i>Arsip
            </a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                if ($_SESSION['level_user'] == 1) {
                    $sql_praktik = "SELECT * FROM tb_praktik 
                    JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
                    WHERE tb_praktik.status_praktik = 'Y'
                    ORDER BY tb_praktik.tgl_selesai_praktik ASC";
                } else {
                    $sql_praktik = "";
                }
                $q_praktik = $conn->query($sql_praktik);
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <div id="accordion">
                        <?php
                        while ($d_praktik = $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <div class="card">
                                <div class="card-header" id="head">
                                    <div class="row" style="font-size: small;">
                                        <div class="col-sm-3">
                                            <b>INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>PERIODE PRAKTIK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>TANGGAL SELESAI : </b><br><?php echo date("d F Y", strtotime($d_praktik['tgl_selesai_praktik'])); ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>STATUS : </b><br><?php echo date("d F Y", strtotime($d_praktik['tgl_selesai_praktik'])); ?>
                                        </div>
                                        <div class="col-sm-1">

                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>">
                                                Rincian
                                            </button>
                                        </div>
                                        <div class="col-sm-2">

                                            <!-- tombol ubah -->
                                            <a href="?prk&u=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                                Ubah
                                            </a>

                                            <!-- tombol arsip -->
                                            <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='#prk_dh_<?php echo $d_praktik['id_praktik']; ?>'>
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>

                                            <!-- modal arsip -->
                                            <div class="modal fade" id="prk_dh_<?php echo $d_praktik['id_praktik']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <h5>HAPUS DATA :</h5>
                                                            <b>Nama Institusi </b><br>
                                                            <?php echo $d_praktik['nama_institusi']; ?><br>
                                                            <b>Periode Praktik </b> : <br>
                                                            <?php echo $d_praktik['nama_praktik']; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success btn-sm" type="button" data-dismiss="modal">Batal</button>
                                                            <form method="post">
                                                                <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                <input type="submit" name="arsip_praktik" value="Hapus" class="btn btn-danger btn-sm">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: small;">
                                        <!-- data praktikan -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <b>JENJANG : </b><br>
                                                <?php echo $d_praktik['nama_jenjang_pdd']; ?><br>
                                                <b>JURUSAN : </b><br>
                                                <?php echo $d_praktik['nama_jurusan_pdd']; ?><br>
                                                <b>SPESIFIKASI : </b><br>
                                                <?php echo $d_praktik['nama_spesifikasi_pdd']; ?><br>
                                                <b>JUMLAH PRAKTIKAN : </b><br>
                                                <?php echo $d_praktik['jumlah_praktik']; ?><br>
                                            </div>
                                            <div class="col-sm-3">
                                                <b>NAMA MENTOR : </b><br>
                                                <?php echo $d_praktik['nama_mentor_praktik']; ?><br>
                                                <b>NO. HP MENTOR : </b><br>
                                                <?php echo $d_praktik['telp_mentor_praktik']; ?><br>
                                                <b>EMAIL MENTOR : </b><br>
                                                <?php echo $d_praktik['email_mentor_praktik']; ?><br>
                                            </div>
                                            <div class="col-sm-6">
                                                <b>FILE SURAT : </b><br>
                                                <a href="<?php echo $d_praktik['surat_praktik']; ?> " class="btn btn-success btn-sm">
                                                    <svg width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                    </svg> Download
                                                </a><br><br>
                                                <b>DATA PRAKTIKAN :</b><br>
                                                <a href="<?php echo $d_praktik['data_praktik']; ?> " class="btn btn-success btn-sm">
                                                    <svg width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                    </svg> Download
                                                </a>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <?php


                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                } else {
                ?>
                    <h3 class='text-center'> Data Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php
if (isset($_POST['arsip_praktik'])) {
    $conn->query("UPDATE `tb_praktik` SET status_praktik = 'T' WHERE id_praktik = " . $_POST['id_praktik']);
?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
}
?>