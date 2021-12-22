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
                    <i class="fas fa-archive"></i>
                </i>Arsip
            </a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktik 
                    JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
                    WHERE tb_praktik.status_praktik = 'Y'
                    ORDER BY tb_praktik.tgl_selesai_praktik ASC";

                $q_praktik = $conn->query($sql_praktik);
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;">
                                        <br><br>
                                        <div class="col-sm-2">
                                            <b>INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <b>PERIODE PRAKTIK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>TANGGAL SELESAI : </b><br><?php echo date("d F Y", strtotime($d_praktik['tgl_selesai_praktik'])); ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b>STATUS : </b><br>
                                            <?php
                                            if ($d_praktik['status_cek_praktik'] == "DAFTAR") {
                                            ?>
                                                <span class="badge badge-danger text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "MENU") {
                                            ?>
                                                <span class="badge badge-warning text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == 3) {
                                            ?>
                                                <span class="badge badge-success text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-sm-1">

                                            <!-- tombol dropdown pilih menu harga, mess, bukti bayar -->
                                            <div class="dropdown text-gray-800">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-clipboard-list"></i>
                                                    Pilih
                                                </button>
                                                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item btn btn-outline-secondary btn-sm" href="?prk&ih=<?php echo $d_praktik['id_praktik']; ?>">Pilih Harga</a>
                                                    <a class="dropdown-item btn btn-secondary btn-sm" href="?prk&m=<?php echo $d_praktik['id_praktik']; ?>">Pilih Mess</a>
                                                    <a class="btn btn-secondary btn-sm dropdown-item " href="?prk&ibt=<?php echo $d_praktik['id_praktik']; ?>">Pembayaran</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian"><i class="fas fa-info-circle"></i>
                                            </button>
                                            <!-- tombol ubah -->
                                            <a href="?prk&u=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-primary btn-sm" title="Ubah">
                                                <svg width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg>
                                            </a>

                                            <!-- tombol arsip -->
                                            <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='#prk_dh_<?php echo $d_praktik['id_praktik']; ?>' title="Hapus">
                                                <i class="fas fa-trash"></i>
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

                                <!-- collapse data praktikan -->
                                <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: small;">
                                        <!-- data praktikan -->
                                        <div class="text-gray-700">
                                            <h4 class="font-weight-bold">DATA PRAKTIKAN</h4>
                                        </div>
                                        <hr style="color: gray;">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <b>JURUSAN : </b><br>
                                                <?php echo $d_praktik['nama_jurusan_pdd']; ?><br>
                                                <b>JENJANG : </b><br>
                                                <?php echo $d_praktik['nama_jenjang_pdd']; ?><br>
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
                                                <a href="<?php echo $d_praktik['surat_praktik']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                    <i class="fas fa-file-download"></i> Download
                                                </a><br><br>
                                                <b>DATA PRAKTIKAN :</b><br>
                                                <a href="<?php echo $d_praktik['data_praktik']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                    <i class="fas fa-file-download"></i> Download
                                                </a>
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- data menu harga yang dipilih -->
                                        <div class="text-gray-700">
                                            <h4 class="font-weight-bold">DATA MENU HARGA</h4>
                                        </div>
                                        <?php
                                        if ($d_praktik['status_cek_praktik'] == 'DAFTAR') {
                                        ?>
                                            <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                                                <h5 class="text-center">Data Menu Harga Tidak Ada</h5>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                        <?php
                                        }
                                        ?>
                                        <hr>

                                        <!-- data MESS -->
                                        <div class="text-gray-700">
                                            <h4 class="font-weight-bold">DATA MESS</h4>
                                        </div>
                                        <?php
                                        if ($d_praktik['status_cek_praktik'] == 'DAFTAR' || 'MESS') {
                                        ?>
                                            <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                                                <h5 class="text-center">Data MESS Tidak Ada</h5>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            DATA
                                        <?php
                                        }
                                        ?>
                                        <hr>

                                        <!-- data pembayaran -->
                                        <div class="text-gray-700">
                                            <h4 class="font-weight-bold">DATA PEMBAYARAN</h4>
                                        </div>
                                        <?php
                                        if ($d_praktik['status_cek_praktik'] == 'DAFTAR' || 'MESS') {
                                        ?>
                                            <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                                                <h5 class="text-center">Data Pembayaran Tidak Ada</h5>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            DATA
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php
                    }
                    ?>
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