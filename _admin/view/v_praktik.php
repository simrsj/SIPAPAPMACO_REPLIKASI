<?php
if (isset($_POST['arsip_praktik'])) {
    $conn->query("UPDATE `tb_praktik` SET status_praktik = 'T' WHERE id_praktik = " . $_POST['id_praktik']);
    echo "
        <script type='text/javascript'>
            document.location.href = '?prk';
        </script>
    ";
} else {

    if ($_GET['prk'] == 'ked') {
        $tambah = "ked";
        $judul = "Kedokteran";
    } elseif ($_GET['prk'] == 'kep') {
        $tambah = "kep";
        $judul = "Keperawatan";
    } elseif ($_GET['prk'] == 'nkl') {
        $tambah = "nkl";
        $judul = "Nakes Lainnya";
    } elseif ($_GET['prk'] == 'nnk') {
        $tambah = "nnk";
        $judul = "Non-Nakes";
    } else {
        $tambah = "";
        $judul = "";
    }
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Pendaftaran Praktik <?php echo $judul; ?></h1>
            </div>
            <div class="col-lg-2 text-right">

                <?php
                ?>
                <a href="?prk=<?php echo $tambah; ?>&i" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <a href="?prk&a" class="btn btn-outline-info btn-sm">
                    <i>
                        <i class="fas fa-archive"></i>
                    </i>Arsip
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                if ($_GET['prk'] == 'ked') {
                    $jenis_jurusan = " AND tb_jurusan_pdd.id_jurusan_pdd_jenis = 1 ";
                } elseif ($_GET['prk'] == 'kep') {
                    $jenis_jurusan = " AND tb_jurusan_pdd.id_jurusan_pdd_jenis = 2 ";
                } elseif ($_GET['prk'] == 'nkl') {
                    $jenis_jurusan = " AND tb_jurusan_pdd.id_jurusan_pdd_jenis = 3 ";
                } elseif ($_GET['prk'] == 'nnk') {
                    $jenis_jurusan = " AND tb_jurusan_pdd.id_jurusan_pdd_jenis = 4 ";
                } else {
                    $jenis_jurusan = " AND tb_jurusan_pdd.id_jurusan_pdd_jenis = 0 ";
                }
                $sql_praktik = "SELECT * FROM tb_praktik 
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis
                    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
                    WHERE (
                        tb_praktik.status_praktik = 'D' 
                        OR tb_praktik.status_praktik = 'W'
                        OR tb_praktik.status_praktik = 'Y'
                    )
                    $jenis_jurusan
                    ORDER BY tb_praktik.tgl_selesai_praktik ASC";

                // echo $sql_praktik;

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

                                        <div class="col-sm-2">
                                            <b>GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>

                                        <div class="col-sm-2">
                                            <b>TANGGAL MULAI : </b><br><?php echo tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                            <b>TANGGAL SELESAI : </b><br><?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>

                                        <!-- Data Status  -->
                                        <div class="col-sm-2 text-center my-auto">
                                            <b>STATUS : </b>
                                            <a href="#" data-toggle="modal" data-target="#info_status" title="Keterangan Status">
                                                <i class="fas fa-info-circle" style="font-size: 14px;"></i>
                                            </a>
                                            <br>
                                            <?php
                                            if ($_GET['prk'] == 'ked') {
                                            ?>
                                                <!-- modal info_status -->
                                                <div class="modal fade" id="info_status" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-lable modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4>INFO STATUS</h4>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span class="badge badge-warning text-md">DATA PRAKTIK & TARIF</span><br />
                                                                Pendaftaran dan Tarif Sudah Dipilih, dilanjutkan
                                                                <span class="font-weight-bold text-primary">Validasi Data Pendaftaran dan Tarif </span>oleh ADMIN<br /><br />

                                                                <span class="badge badge-success text-md">Val. PRAKTIK & TARIF <i class="fas fa-check-circle"></i></span><br>
                                                                Validasi Data Praktikan dan Tarif <span class="font-weight-bold text-success">DITERIMA</span>, Dilanjutkan proses pemilihan <b class="text-warning">TEMPAT</b> oleh ADMIN<br><br>

                                                                <span class="badge badge-danger text-md">Val. PRAKTIK & TARIF <i class="fas fa-times-circle"></i></span><br>
                                                                Validasi Data Praktikan dan Tarif <span class="font-weight-bold text-danger">DITOLAK</span>, <span class="font-weight-bold text-danger">CEK KETERANGAN</span><br><br>

                                                                <span class="badge badge-warning text-md">TEMPAT</span><br>
                                                                Tempat Sudah Dipilih, dilanjutkan Pilih <span class="font-weight-bold text-warning">MESS/PEMONDOKAN</span> oleh Admin<br><br>

                                                                <span class="badge badge-warning text-md">MESS/PEMONDOKAN</span><br>
                                                                MESS/PEMONDOKAN Sudah didaftarkan oleh Admin<br><br>

                                                                <span class="badge badge-primary text-md font-italic">WAITING LIST</span><br>
                                                                Proses Pendaftaran Selesai dan dalam proses <span class="text-primary font-italic font-weight-bold">WAITING LIST</span><br>
                                                                akan di <span class="text-success font-weight-bold">AKTIF</span>-kan oleh <b>ADMIN</b> sesuai dengan tanggal mulai praktiknya<br><br>

                                                                <span class="badge badge-success text-md">AKTIF</span><br>
                                                                Parktikan sedang <span class="text-success font-weight-bold">AKTIF</span>, dan bisa melakukan <span class="text-success font-weight-bold">Pembayaran</span><br><br>

                                                                <span class="badge badge-success text-md">PEMB. DITERIMA <i class="fas fa-check-circle"></i></span><br>
                                                                Proses Pembayaran <span class="font-weight-bold text-success">DITERIMA</span> oleh <b>ADMIN</b> <br><br>

                                                                <span class="badge badge-danger text-md">PEMB. DITOLAK <i class="fas fa-times-circle"></i></span><br>
                                                                Proses Pembayaran <span class="font-weight-bold text-danger">DITOLAK</span>, <span class="font-weight-bold text-danger">CEK KETERANGAN</span><br><br>

                                                                <span class="badge badge-dark text-md">SELESAI</span><br>
                                                                Praktikan Sudah <span class="text-dark font-weight-bold">SELESAI</span><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <!-- modal info_status -->
                                                <div class="modal fade" id="info_status" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4>INFO STATUS</h4>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span class="badge badge-warning text-md">DATA PRAKTIK & TARIF</span><br />
                                                                Pendaftaran dan Tarif Sudah Dipilih, dilanjutkan
                                                                <span class="font-weight-bold text-primary">Validasi Data Pendaftaran dan Tarif </span>oleh ADMIN<br /><br />

                                                                <span class="badge badge-success text-md">Val. PRAKTIK & TARIF <i class="fas fa-check-circle"></i></span><br>
                                                                Validasi Data Praktikan dan Tarif <span class="font-weight-bold text-success">DITERIMA</span>, Dilanjutkan proses pemilihan <b class="text-warning">TEMPAT</b> oleh ADMIN<br><br>

                                                                <span class="badge badge-danger text-md">Val. PRAKTIK & TARIF <i class="fas fa-times-circle"></i></span><br>
                                                                Validasi Data Praktikan dan Tarif <span class="font-weight-bold text-danger">DITOLAK</span>, <span class="font-weight-bold text-danger">CEK KETERANGAN</span><br><br>

                                                                <span class="badge badge-warning text-md">TEMPAT</span><br>
                                                                Tempat Sudah Dipilih, dilanjutkan Pilih <span class="font-weight-bold text-warning">MESS/PEMONDOKAN</span> oleh <b>ADMIN</b><br><br>

                                                                <span class="badge badge-warning text-md">MESS/PEMONDOKAN</span><br>
                                                                MESS/PEMONDOKAN Sudah didaftarkan oleh Admin, dilanjutkan Melakukan Proses <span class="font-weight-bold text-primary">PEMBAYARAN</span>
                                                                <br><br>

                                                                <span class="badge badge-primary text-md">PEMBAYARAN</span><br>
                                                                Melakukan Proses Validasi <span class="font-weight-bold text-primary">PEMBAYARAN</span>
                                                                <br><br>

                                                                <span class="badge badge-success text-md">PEMB. DITERIMA <i class="fas fa-check-circle"></i></span><br>
                                                                Pembayaran <span class="font-weight-bold text-success">DITERIMA</span> oleh <b>ADMIN</b> <br><br>

                                                                <span class="badge badge-danger text-md">PEMB. DITOLAK <i class="fas fa-times-circle"></i></span><br>
                                                                Pembayaran <span class="font-weight-bold text-danger">DITOLAK</span>, <span class="font-weight-bold text-danger">CEK KETERANGAN</span><br><br>

                                                                <span class="badge badge-primary text-md font-italic">WAITING LIST</span><br>
                                                                Proses Pendaftaran Selesai dan dalam proses <span class="text-primary font-italic font-weight-bold">WAITING LIST</span><br>
                                                                akan di <span class="text-success font-weight-bold">AKTIF</span>-kan oleh <b>ADMIN</b> sesuai dengan tanggal mulai praktiknya<br><br>

                                                                <span class="badge badge-success text-md">AKTIF</span><br>
                                                                Parktikan sedang <span class="text-success font-weight-bold">AKTIF</span><br><br>

                                                                <span class="badge badge-dark text-md">SELESAI</span><br>
                                                                Praktikan Sudah <span class="text-dark font-weight-bold">SELESAI</span><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <<<<<<< HEAD=======>>>>>>> ce8a43725fa9efed97c97f484186708913719f18
                                                <?php
                                            }
                                            if ($d_praktik['status_cek_praktik'] == "DPT") {
                                                ?>
                                                    <span class="badge badge-warning text-md">
                                                        DATA <br>PRAKTIK & TARIF
                                                    </span>
                                                <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "VPT_Y") {
                                                ?>
                                                    <span class="badge badge-success text-md">
                                                        Val. PRAKTIK & TARIF <i class="fas fa-check-circle"></i>
                                                    </span>
                                                <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "VPT_T") {
                                                ?>
                                                    <span class="badge badge-danger text-md">
                                                        Val. PRAKTIK & TARIF <i class="fas fa-times-circle"></i>
                                                    </span>
                                                <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "TMP") {
                                                ?>
                                                    <span class="badge badge-warning text-md"> TEMPAT </span>
                                                <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "MESS") {
                                                ?>
                                                    <span class="badge badge-warning text-md">MESS/PEMONDOKAN</span>
                                                    <?php
                                                    if ($_GET['prk'] == 'ked') {
                                                    ?>
                                                        <hr>
                                                        <b><span class="badge badge-primary font-italic text-md"> WAITING LIST</span></b><br>
                                                    <?php
                                                    }
                                                } elseif ($d_praktik['status_cek_praktik'] == "BYR") {
                                                    ?>
                                                    <span class="badge badge-primary text-md">Val. PEMBAYARAN</span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "BYR_Y") {
                                                ?>
                                                    <span class="badge badge-success text-md">Val. PEMBAYARAN <i class="fas fa-check-circle"></i></span>
                                                    <?php
                                                    if ($_GET['prk'] != 'ked') {
                                                    ?>
                                                        <hr>
                                                        <b><span class="badge badge-primary font-italic text-md"> WAITING LIST</span></b><br>
                                                    <?php
                                                    }
                                                } elseif ($d_praktik['status_cek_praktik'] == "BYR_T") {
                                                    ?>
                                                    <span class="badge badge-danger text-md">Val. PEMBAYARAN <i class="fas fa-times-circle"></i></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "AKV") {
                                                ?>
                                                    <span class="badge badge-success text-md">AKTIF</span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "SLS") {
                                                ?>
                                                    <span class="badge badge-secondary text-md">SELESAI</span>
                                                <?php
                                                }
                                                ?>
                                        </div>

                                        <!-- Tombol Link Data Status  -->
                                        <div class="col-sm-2 text-center my-auto">

                                            <!-- tombol dropdown pilih menu tarif, mess, bukti bayar -->
                                            <?php
                                            if ($d_praktik['status_cek_praktik'] == "DPT") {
                                            ?>
                                                <b>VALIDASI : </b><br>
                                                <div class="btn-group">
                                                    <button class="btn btn-outline-success btn-sm" onclick="valDataPraktikTarif_Y(<?php echo $d_praktik['id_praktik']; ?>)">Diterima</button>
                                                    <button class="btn btn-outline-danger btn-sm" onclick="valDataPraktikTarif_T(<?php echo $d_praktik['id_praktik']; ?>)">Ditolak</button>
                                                </div>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "VPT_Y") {
                                            ?>
                                                <b>PILIH : </b><br>
                                                <a href="?prk=<?php echo $_GET['prk']; ?>&t=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-outline-warning btn-sm font-weight-bold">TEMPAT</a>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "VPT_T") {
                                            ?>
                                                <b>CEK KETERANGAN : </b><br>

                                                <a class="btn btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#ketTolakPraktikHarga<?php echo $d_praktik['id_praktik']; ?>" title="Keterangan Status">
                                                    KETERANGAN
                                                </a>

                                                <!-- modal keterangan penolakan -->
                                                <div class="modal fade" id="ketTolakPraktikHarga<?php echo $d_praktik['id_praktik']; ?>" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4>Keterangan</h4>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-lg">
                                                                <?php echo '"' . $d_praktik['ket_tolakPraktikHarga_praktik'] . '"'; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "TMP") {
                                            ?>
                                                <b>PILIH : </b><br>
                                                <a href="?prk=<?php echo $_GET['prk']; ?>&m=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-outline-warning btn-sm font-weight-bold">MESS</a>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "MESS") {
                                            ?>
                                                <b>PLIH : </b><br>
                                                <a class="btn btn-outline-danger btn-sm" href="?prk=<?php echo $_GET['prk'] ?>&ib=<?php echo $d_praktik['id_praktik']; ?>">PEMBAYARAN</a>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "BYR") {
                                            ?>
                                                <b>VALIDASI : </b><br>
                                                <div class="btn-group">
                                                    <button class="btn btn-outline-success btn-sm" onclick="valPembayaran_Y(<?php echo $d_praktik['id_praktik']; ?>)">Diterima</button>
                                                    <button class="btn btn-outline-danger btn-sm" onclick="valPembayaran_T(<?php echo $d_praktik['id_praktik']; ?>)">Ditolak</button>
                                                </div>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "BYR_Y") {
                                            ?>
                                                <button class="btn btn-outline-success btn-sm" onclick="aktivasiPraktik(<?php echo $d_praktik['id_praktik']; ?>)">AKTIFKAN <i class="fas fa-question-circle"></i></button>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "BYR_T") {
                                            ?>

                                                <b>CEK KETERANGAN : </b><br>

                                                <a class="btn btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#ketTolakPembayaran<?php echo $d_praktik['id_praktik']; ?>" title="Keterangan Status">
                                                    KETERANGAN
                                                </a>

                                                <!-- modal keterangan penolakan -->
                                                <div class="modal fade" id="ketTolakPembayaran<?php echo $d_praktik['id_praktik']; ?>" data-backdrop="static">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4>Keterangan</h4>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-lg">
                                                                <?php echo '"' . $d_praktik['ket_tolakPembayaran_praktik'] . '"'; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "AKV") {
                                            ?>
                                                <b>PILIH : </b><br>
                                                <button class="btn btn-outline-secondary btn-sm" onclick="selesaiPraktik(<?php echo $d_praktik['id_praktik']; ?>)">SELESAIKAN <i class="fas fa-question-circle"></i></button>
                                            <?php
                                            } elseif ($d_praktik['status_cek_praktik'] == "SLS") {
                                            ?>
                                                <span class="badge badge-secondary text-md"> PRAKTIKAN SUDAH SELESAI</span>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                        <div class="col-sm-2 my-auto text-center">
                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian"><i class="fas fa-info-circle"></i>
                                            </button>
                                            <!-- tombol ubah -->
                                            <?php
                                            if (($d_praktik['status_cek_praktik'] == "AKTIF") || ($d_praktik['status_cek_praktik'] == "SELESAI")) {
                                                $link_ubah = "href='#' data-toggle='modal' data-target='#prk_u_" . $d_praktik['id_praktik'] . "'";
                                            } else {
                                                $link_ubah = "href='?prk&u=" . $d_praktik['id_praktik'] . "'";
                                            }
                                            ?>
                                            <a <?php echo $link_ubah; ?> class="btn btn-primary btn-sm" title="Ubah">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <!-- modal ubah -->
                                            <div class="modal fade" id="prk_u_<?php echo $d_praktik['id_praktik']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content text-center text-lg font-weight-bold">
                                                        <div class="modal-body">
                                                            DATA TIDAK BISA DIRUBAH<br>
                                                            <?php
                                                            if ($d_praktik['status_cek_praktik'] == 'AKTIF') {
                                                            ?>
                                                                <span class="badge badge-success">PRAKTIKAN AKTIF</span>
                                                            <?php
                                                            } elseif ($d_praktik['status_cek_praktik'] == 'SELESAI') {
                                                            ?>
                                                                <span class="badge badge-dark">PRAKTIKAN SELESAI</span>
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- tombol arsip -->
                                            <a class='btn btn-outline-info btn-sm' href='#' data-toggle='modal' data-target='#prk_dh_<?php echo $d_praktik['id_praktik']; ?>' title="arsip">
                                                <i class="fas fa-archive"></i>
                                            </a>

                                            <!-- modal arsip -->
                                            <div class="modal fade" id="prk_dh_<?php echo $d_praktik['id_praktik']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5>ARSIP KAN DATA :</h5>
                                                        </div>
                                                        <div class="modal-body text-left text-md">
                                                            <b>Nama Institusi </b><br>
                                                            <?php echo $d_praktik['nama_institusi']; ?><br>
                                                            <b>Periode Praktik </b> : <br>
                                                            <?php echo $d_praktik['nama_praktik']; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post">
                                                                <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                <input type="submit" name="arsip_praktik" value="Arsipkan" class="btn btn-info btn-sm">
                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Batal</button>
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

                                            <!-- Data Praktik  -->
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

                                            <!-- Data Pembimbing  -->
                                            <div class="col-sm-3">
                                                <b>NAMA PEMBIMBING : </b><br>
                                                <?php echo $d_praktik['nama_pembimbing_praktik']; ?><br>
                                                <b>NO. HP PEMBIMBING : </b><br>
                                                <?php echo $d_praktik['telp_pembimbing_praktik']; ?><br>
                                                <b>EMAIL PEMBIMBING : </b><br>
                                                <?php echo $d_praktik['email_pembimbing_praktik']; ?><br>
                                            </div>

                                            <!-- Data File -->
                                            <div class="col-sm-6">
                                                <b>FILE SURAT : </b><br>
                                                <?php
                                                if ($d_praktik['surat_praktik'] == '') {
                                                ?>
                                                    <span class="badge badge-danger text-md">DATA BELUM DI UPLOAD</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo $d_praktik['surat_praktik']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                        <i class="fas fa-file-download"></i> Download
                                                    </a>
                                                <?php
                                                }
                                                ?><br><br>
                                                <b>DATA PRAKTIKAN :</b><br>
                                                <?php
                                                if ($d_praktik['data_praktik'] == '') {
                                                ?>
                                                    <span class="badge badge-danger text-md">DATA BELUM DI UPLOAD</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo $d_praktik['data_praktik']; ?> " target="_blank" class="btn btn-success btn-sm">
                                                        <i class="fas fa-file-download"></i> Download
                                                    </a>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- data menu tarif wajib, ujian dan sewa tempat yang dipilih -->
                                        <div class="text-gray-700">
                                            <div class="row">
                                                <div class="col-lg-11">
                                                    <h4 class="font-weight-bold">
                                                        DATA TARIF
                                                        <a title="Ubah Pembayaran" class="btn btn-primary btn-sm" href='?prk&uh=<?php echo $d_praktik['id_praktik']; ?>'>
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" data-toggle='modal' data-target='#h_h_m<?php echo $d_praktik['id_praktik']; ?>'>
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                        <!-- modal hapus tarif -->
                                                        <div class="modal fade text-left" id="h_h_m<?php echo $d_praktik['id_praktik']; ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4>HAPUS DATA TARIF ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a title="Hapus Tarif" class="btn btn-danger btn-sm" href='?prk&hh=<?php echo $d_praktik['id_praktik']; ?>'> HAPUS </a>
                                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <?php
                                            $sql_tarif_pilih = "SELECT * FROM tb_tarif_pilih
                                                    JOIN tb_tarif ON tb_tarif_pilih.id_tarif = tb_tarif.id_tarif
                                                    JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik
                                                    WHERE tb_tarif_pilih.id_praktik = " . $d_praktik['id_praktik'] . "
                                                    ORDER BY tb_tarif.id_tarif_jenis , tb_tarif.nama_tarif ASC";


                                            $q_tarif_pilih = $conn->query($sql_tarif_pilih);
                                            $r_tarif_pilih = $q_tarif_pilih->rowCount();
                                            if ($r_tarif_pilih > 0) {
                                            ?>
                                                <table class="table table-striped" id="myTable">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Tanggal Input</th>
                                                            <th scope="col">Tanggal Ubah</th>
                                                            <th scope="col">Nama Tarif</th>
                                                            <th scope="col">Jumlah Tarif</th>
                                                            <th scope="col">Frekuensi</th>
                                                            <th scope="col">Kuantitas</th>
                                                            <th scope="col">Total Tarif</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php

                                                        $no = 1;
                                                        while ($d_tarif_pilih = $q_tarif_pilih->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $no; ?></th>
                                                                <td><?php echo tanggal($d_tarif_pilih['tgl_input_tarif_pilih']); ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($d_tarif_pilih['tgl_ubah_tarif_pilih'] != NULL) {
                                                                        echo tanggal($d_tarif_pilih['tgl_ubah_tarif_pilih']);
                                                                    } else {
                                                                        echo "-";
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td><?php echo $d_tarif_pilih['nama_tarif']; ?></td>
                                                                <td><?php echo "Rp " . number_format($d_tarif_pilih['jumlah_tarif'], 0, ",", "."); ?></td>
                                                                <td><?php echo $d_tarif_pilih['frekuensi_tarif_pilih']; ?></td>
                                                                <td><?php echo $d_tarif_pilih['kuantitas_tarif_pilih']; ?></td>
                                                                <td><?php echo "Rp " . number_format($d_tarif_pilih['jumlah_tarif_pilih'], 0, ",", "."); ?></td>
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
                                                        <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                            <h5 class="text-center">Data Tidak Ada</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <!-- data mess yang dipilih -->
                                                <div class="text-gray-700">
                                                    <div class="row">
                                                        <div class="col-lg-11">
                                                            <h4 class="font-weight-bold">
                                                                DATA MESS
                                                                <a title="Ubah Mess" class="btn btn-primary btn-sm" href='?prk&um=<?php echo $d_praktik['id_praktik']; ?>'>
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a title="Hapus Mess" class="btn btn-danger btn-sm" href='#' data-toggle="modal" data-target="#m_h_m<?php echo $d_praktik['id_praktik']; ?>">
                                                                    <i class=" fas fa-trash-alt"></i>
                                                                </a>

                                                                <!-- modal hapus bayar -->
                                                                <div class="modal fade text-left" id="m_h_m<?php echo $d_praktik['id_praktik']; ?>">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4>HAPUS DATA MESS ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" href='?prk&hm=<?php echo $d_praktik['id_praktik']; ?>'> HAPUS </a>
                                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div style="font-size: medium;">
                                                    <?php

                                                    $sql_mess_pilih = "SELECT * FROM tb_mess_pilih
                                                        JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess
                                                        WHERE tb_mess_pilih.id_praktik = " . $d_praktik['id_praktik'];

                                                    $q_mess_pilih = $conn->query($sql_mess_pilih);
                                                    $r_mess_pilih = $q_mess_pilih->rowCount();
                                                    if ($r_mess_pilih > 0) {

                                                        $d_mess_pilih = $q_mess_pilih->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                        <div class="jumbotron jumbotron-fluid">
                                                            <div class="container">
                                                                <fieldset class="fieldset">
                                                                    <h5 class="text-gray-800 font-weight-bold">Nama Mess :</h5>
                                                                    <?php echo $d_mess_pilih['nama_mess']; ?><br><br>
                                                                    <h5 class="text-gray-800 font-weight-bold"> Nama Pemilik :</h5>
                                                                    <?php echo $d_mess_pilih['nama_pemilik_mess']; ?><br><br>
                                                                    <h5 class="text-gray-800 font-weight-bold">No Pemilik :</h5>
                                                                    <?php echo $d_mess_pilih['no_pemilik_mess']; ?><br><br>
                                                                    <h5 class="text-gray-800 font-weight-bold"> Alamat Mess : </h5>
                                                                    <?php echo $d_mess_pilih['alamat_mess']; ?><br><br>
                                                                    <!-- <h5 class="text-gray-800 font-weight-bold"> Jumlah yang diisi :</h5>
                                                                        <?php echo $d_mess_pilih['jumlah_praktik_mess_pilih']; ?><br><br> -->
                                                                    <h5 class="text-gray-800 font-weight-bold"> Jumlah Hari :</h5>
                                                                    <!-- <?php echo $d_mess_pilih['total_hari_mess_pilih']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold"> Dengan Makan (3X Sehari) :</h5> -->
                                                                    <?php
                                                                    if ($d_mess_pilih['makan_mess_pilih'] == 'y') {
                                                                        $makan = 'YA';
                                                                    } else {
                                                                        $makan = 'TIDAK';
                                                                    }
                                                                    echo $makan; ?>
                                                                    <!-- <h5 class="text-gray-800 font-weight-bold"> Total Tarif :</h5>
                                                                        <?php echo "Rp " . number_format($d_mess_pilih['total_tarif_mess_pilih'], 0, ",", "."); ?> -->
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="jumbotron">
                                                            <div class="jumbotron-fluid">
                                                                <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                                    <h5 class="text-center">Data Tidak Ada</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <!-- data pembayaran -->
                                                <div class="text-gray-700">
                                                    <div class="row">
                                                        <div class="col-lg-11">
                                                            <h4 class="font-weight-bold">
                                                                DATA PEMBAYARAN
                                                                <a title="Ubah Pembayaran" class="btn btn-primary btn-sm" href='?prk&ub=<?php echo $d_praktik['id_praktik']; ?>'>
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" href='#' data-toggle="modal" data-target="#b_h_m<?php echo $d_praktik['id_praktik']; ?>">
                                                                    <i class=" fas fa-trash-alt"></i>
                                                                </a>

                                                                <!-- modal hapus bayar -->
                                                                <div class="modal fade text-left" id="b_h_m<?php echo $d_praktik['id_praktik']; ?>">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4>HAPUS PEMBAYARAN ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" href='?prk&hb=<?php echo $d_praktik['id_praktik']; ?>'> HAPUS
                                                                                </a>
                                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div style="font-size: medium;">
                                                    <?php

                                                    $sql_bayar = "SELECT * FROM tb_bayar WHERE id_praktik = " . $d_praktik['id_praktik'];
                                                    // echo $sql_bayar;
                                                    $q_bayar = $conn->query($sql_bayar);
                                                    $r_bayar = $q_bayar->rowCount();
                                                    if ($r_bayar > 0) {
                                                        $d_bayar = $q_bayar->fetch(PDO::FETCH_ASSOC);
                                                    ?>
                                                        <div class="jumbotron jumbotron-fluid">
                                                            <div class="container">
                                                                <fieldset class="fieldset">
                                                                    <h5 class="text-gray-800 font-weight-bold">Atas Nama Bayar:</h5>
                                                                    <?php echo $d_bayar['atas_nama_bayar']; ?><br><br>
                                                                    <h5 class="text-gray-800 font-weight-bold"> No Rekening/Lainnya :</h5>
                                                                    <?php echo $d_bayar['no_bayar']; ?><br><br>
                                                                    <h5 class="text-gray-800 font-weight-bold">Pembayaran Melalui :</h5>
                                                                    <?php echo $d_bayar['melalui_bayar']; ?><br><br>
                                                                    <h5 class="text-gray-800 font-weight-bold"> Tanggal Pembayaran : </h5>
                                                                    <?php echo tanggal($d_bayar['tgl_input_bayar']); ?><br><br>
                                                                    <h5 class="text-gray-800 font-weight-bold">
                                                                        File Pembayaran :
                                                                        <a title='Download File Pembayaran' href='<?php echo $d_bayar['file_bayar']; ?>' target="_blank" class="btn btn-success btn-sm">
                                                                            <i class="fas fa-file-download"></i> Download
                                                                        </a>
                                                                    </h5>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="jumbotron">
                                                            <div class="jumbotron-fluid">
                                                                <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                                    <h5 class="text-center">Data Tidak Ada</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-gray-800">
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Pendaftaran Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>

            </div>
        </div>
    </div>

    <script>
        function valDataPraktikTarif_Y(id) {
            console.log("valDataPraktikTarif_Y");
            Swal.fire({
                position: 'top',
                title: 'Yakin ?',
                html: "<span class='text-success text-uppercase font-weight-bold'>Penerimaan</span> Data Praktikan dan Data Tarif",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Ya',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_praktik_valDataPraktikTarif.php?",
                        data: {
                            'id': id,
                            'ket': 'y'
                        },
                        success: function() {
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'success',
                                title: '<div class="text-md text-center">DATA PRAKTIKAN DAN TARIF <br> <b>DITERIMA</b></div>',
                                showConfirmButton: false,
                                html: '<a href="<?php echo "?prk=" . $_GET['prk']; ?>" class="btn btn-primary">OK</a>',
                            });
                        },
                        error: function(response) {
                            console.log(response.responseText);
                            alert('eksekusi query gagal');
                        }
                    });
                }
            })
        }

        function valDataPraktikTarif_T(id) {
            console.log("valDataPraktikTarif_T");
            Swal.fire({
                position: 'top',
                title: 'Yakin ?',
                html: "<span class='text-danger text-uppercase font-weight-bold'>Penolakan</span> Data Praktikan dan Data Tarif" +
                    '<input id="valDPT_T" class="swal2-input" placeHolder="Isi Ket. Penolakan ">',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var valDPT_T = document.getElementById('valDPT_T').value;
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_praktik_valDataPraktikTarif.php",
                        data: {
                            'id': id,
                            'ket': 't',
                            'valDPT_T': valDPT_T
                        },
                        success: function() {
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'error',
                                title: '<div class="text-md text-center">DATA PRAKTIKAN DAN TARIF <br> <b>DITOLAK</b></div>',
                                showConfirmButton: false,
                                html: '<a href="<?php echo "?prk=" . $_GET['prk']; ?>" class="btn btn-primary">OK</a>',
                            });
                        },
                        error: function(response) {
                            console.log(response.responseText);
                            alert('eksekusi query gagal');
                        }
                    });

                }
            });
        }

        function valPembayaran_Y(id) {
            console.log("valPembayaran_Y");
            Swal.fire({
                position: 'top',
                title: 'Yakin ?',
                html: "<span class='text-success text-uppercase font-weight-bold'>Penerimaan</span> Data Pembayaran",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Ya',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_praktik_valPembayaran.php?",
                        data: {
                            "id": id,
                            "ket": "y"
                        },
                        success: function() {
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'success',
                                title: '<div class="text-md text-center">DATA PRAKTIKAN DAN TARIF <br> <b>DITERIMA</b></div>',
                                showConfirmButton: false,
                                html: '<a href="<?php echo "?prk=" . $_GET['prk']; ?>" class="btn btn-primary">OK</a>',
                            });
                        },
                        error: function(response) {
                            console.log(response.responseText);
                            alert('eksekusi query gagal');
                        }
                    });
                }
            })
        }

        function valPembayaran_T(id) {
            console.log("valPembayaran_T");
            Swal.fire({
                position: 'top',
                title: 'Yakin ?',
                html: "<span class='text-danger text-uppercase font-weight-bold'>Penolakan</span> Data Praktikan dan Data Tarif" +
                    '<input id="valP_T" class="swal2-input" placeHolder="Isi Ket. Penolakan ">',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Ya',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    var valP_T = document.getElementById('valP_T').value;
                    $.ajax({
                        type: 'POST',
                        url: "_admin/exc/x_v_praktik_valPembayaran.php",
                        data: {
                            'id': id,
                            'ket': 't',
                            'valP_T': valP_T
                        },
                        success: function() {
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'error',
                                title: '<div class="text-md text-center">DATA PRAKTIKAN DAN TARIF <br> <b>DITOLAK</b></div>',
                                showConfirmButton: false,
                                html: '<a href="<?php echo "?prk=" . $_GET['prk']; ?>" class="btn btn-primary">OK</a>',
                            });
                        },
                        error: function(response) {
                            console.log(response.responseText);
                            alert('eksekusi query gagal');
                        }
                    });

                }
            });
        }

        function aktivasiPraktik(id) {
            console.log("aktivasiPraktik");
            Swal.fire({
                position: 'top',
                title: 'Yakin ?',
                html: "<span class='text-success text-uppercase font-weight-bold'>Aktivasi</span> Praktik",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Ya',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: "_admin/exc/x_v_praktik_aktivasiPraktik.php?id=" + id,
                        success: function() {
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'success',
                                title: '<div class="text-md text-center">PRAKTIK SUDAH AKTIF</div>',
                                showConfirmButton: false,
                                html: '<a href="<?php echo "?prk=" . $_GET['prk']; ?>" class="btn btn-primary">OK</a>',
                            });
                        },
                        error: function(response) {
                            console.log(response.responseText);
                            alert('eksekusi query gagal');
                        }
                    });
                }
            })
        }

        function selesaiPraktik(id) {
            console.log("selesaiPraktik");
            Swal.fire({
                position: 'top',
                title: 'Yakin ?',
                html: "<span class='text-secondary text-uppercase font-weight-bold'>SELESAIKAN</span> Praktik",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#1cc88a',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Kembali',
                confirmButtonText: 'Ya',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: "_admin/exc/x_v_praktik_selesaiPraktik.php?id=" + id,
                        success: function() {
                            Swal.fire({
                                allowOutsideClick: false,
                                // isDismissed: false,
                                icon: 'success',
                                title: '<div class="text-md text-center">PRAKTIK SUDAH SELESAI</div>',
                                showConfirmButton: false,
                                html: '<a href="<?php echo "?prk=" . $_GET['prk']; ?>" class="btn btn-primary">OK</a>',
                            });
                        },
                        error: function(response) {
                            console.log(response.responseText);
                            alert('eksekusi query gagal');
                        }
                    });
                }
            })
        }
    </script>
<?php
}
