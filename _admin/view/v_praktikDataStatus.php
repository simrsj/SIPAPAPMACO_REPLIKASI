<!-- Data Status  -->
<div class="col-sm-2 text-center my-auto">
    <b>STATUS : </b>
    <a href="#" data-toggle="modal" data-target="#info_status" title="Keterangan Status">
        <i class="fas fa-info-circle" style="font-size: 14px;"></i>
    </a>
    <br>

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
                    MESS/PEMONDOKAN Sudah didaftarkan oleh Admin, dilanjutkan Melakukan Proses <span class="font-weight-bold text-success">UNGGAH INVOICE</span>
                    <br><br>

                    <span class="badge badge-danger text-md">PEMBAYARAN</span><br>
                    Silahkan melakukan Pembayaran dengan menekan Tombol <span class="font-weight-bold text-danger">ISI PEMBAYARAN</span>
                    <br><br>

                    <span class="badge badge-primary text-md">Val. PEMBAYARAN</span><br>
                    Melakukan Proses Validasi <span class="font-weight-bold text-primary">PEMBAYARAN</span> oleh Admin
                    <br><br>

                    <span class="badge badge-success text-md">Val. PEMBAYARAN <i class="fas fa-check-circle"></i></span><br>
                    Pembayaran <span class="font-weight-bold text-success">DITERIMA</span> oleh <b>ADMIN</b> <br><br>

                    <span class="badge badge-danger text-md">Val. PEMBAYARAN TF <i class="fas fa-times-circle"></i></span><br>
                    Pembayaran <span class="font-weight-bold text-danger">DITOLAK</span>, <br>
                    Karena Kurang Transfer Pembayaran. <br>
                    Lakukan kembali transfer sesuai dengan <b>KEKURANGAN PEMBAYARAN</b><br><br>

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
    <div>
        <?php

        //keterangan status
        if ($d_praktik['status_cek_praktik'] == "DPT") {
        ?>
            <span class="badge badge-warning text-md">
                DATA <br>PRAKTIK & TARIF
            </span>
        <?php
        } elseif ($d_praktik['status_cek_praktik'] == "DPT_KED") {
        ?>
            <span class="badge badge-warning text-md">
                DATA PRAKTIK
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
        } elseif ($d_praktik['status_cek_praktik'] == "TMP_KED") {
        ?>
            <span class="badge badge-success text-md">
                Val. PRAKTIK <i class="fas fa-check-circle"></i>
            </span>
        <?php
        } elseif ($d_praktik['status_cek_praktik'] == "MESS") {
        ?>
            <span class="badge badge-warning text-md">MESS/PEMONDOKAN</span>
        <?php
        } elseif ($d_praktik['status_cek_praktik'] == "INV") {
        ?>
            <span class="badge badge-warning text-md">MESS/PEMONDOKAN</span>
            <hr>
            <span class="badge badge-danger text-md">PEMBAYARAN</span>
        <?php
        } elseif ($d_praktik['status_cek_praktik'] == "BYR") {
        ?>
            <span class="badge badge-primary text-md">Val. PEMBAYARAN</span>
        <?php
        } elseif ($d_praktik['status_cek_praktik'] == "BYR_Y") {
        ?>
            <span class="badge badge-success text-md">Val. PEMBAYARAN <i class="fas fa-check-circle"></i></span>
            <hr>
            <b><span class="badge badge-primary font-italic text-md"> WAITING LIST</span></b><br>
        <?php
        } elseif ($d_praktik['status_cek_praktik'] == "BYR_T_K") {
        ?>
            <span class="badge badge-danger text-md">Val. PEMBAYARAN TF <i class="fas fa-times-circle"></i></span>
            <hr>
            <a class="btn btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#ket_kuranga_transfer<?php echo $d_praktik['id_praktik']; ?>" title="KETERANGAN">
                KETERANGAN
            </a>

            <!-- modal pembayaran ulang -->
            <div class="modal fade" id="ket_kuranga_transfer<?php echo $d_praktik['id_praktik']; ?>" data-backdrop="static">
                <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header h5">
                            <b>KETERANGAN KEKURANGAN TRANSFER</b>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="jumbotron">
                                <div class="jumbotron-fluid h6 text-gray-800">
                                    ANDA MEMLIKI KEKURANGAN TRANSFER SENILAI : <br>
                                    <?php
                                    $sql_bayar_ulang = "SELECT * FROM tb_bayar ";
                                    $sql_bayar_ulang .= " JOIN tb_praktik ON tb_bayar.id_praktik = tb_praktik.id_praktik";
                                    $sql_bayar_ulang .= " WHERE tb_praktik.id_praktik = " . $d_praktik['id_praktik'];

                                    $q_bayar_ulang = $conn->query($sql_bayar_ulang);

                                    $d_bayar_ulang = $q_bayar_ulang->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <span class="h5 font-weight-bold">
                                        <?php
                                        echo "Rp " . number_format($d_bayar_ulang['kurang_tf_praktik'], 0, ",", ".");
                                        ?>
                                    </span>
                                    <br><br>
                                    <span class="text-danger font-weight-bold">LAKUKAN SEGERAN PEMBAYARAN ULANG..!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</div>

<!-- Tombol Link Data Status  -->
<div class="col-sm-2 text-center my-auto">

    <!-- tombol dropdown pilih menu tarif, mess, bukti bayar -->
    <?php
    if ($d_praktik['status_cek_praktik'] == "DPT" || $d_praktik['status_cek_praktik'] == "DPT_KED") {
    ?>
        <b>VALIDASI : </b><br>
        <div class="btn-group">
            <button class="btn btn-outline-success btn-sm" onclick="valDataPraktikTarif_Y(<?php echo $d_praktik['id_praktik']; ?>)">Diterima</button>
            <button class="btn btn-outline-danger btn-sm" onclick="valDataPraktikTarif_T(<?php echo $d_praktik['id_praktik']; ?>)">Ditolak</button>
        </div>
        <?php
    } elseif ($d_praktik['status_cek_praktik'] == "VPT_Y") {
        if ($_GET['prk'] == 'nnk' || $_GET['prk'] == 'nkl') {
        ?>
            <b>PILIH : </b><br>
            <a href="?prk=<?php echo $_GET['prk']; ?>&m=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-outline-warning btn-sm font-weight-bold">MESS</a>
        <?php
        } else {
        ?>
            <b>PILIH : </b><br>
            <a href="?prk=<?php echo $_GET['prk']; ?>&t=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-outline-warning btn-sm font-weight-bold">TEMPAT</a>
        <?php
        }
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
                        <?php echo '"' . $d_praktik['ket_tolakPraktikTarif_praktik'] . '"'; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif ($d_praktik['status_cek_praktik'] == "TMP" || $d_praktik['status_cek_praktik'] == "TMP_KED") {
    ?>
        <b>PILIH : </b><br>
        <a href="?prk=<?php echo $_GET['prk']; ?>&m=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-outline-warning btn-sm font-weight-bold">MESS</a>
    <?php
    } elseif ($d_praktik['status_cek_praktik'] == "MESS") {
    ?>
        <b>PILIH : </b><br>

        <a class="btn btn-outline-success btn-sm" href="#" data-toggle="modal" data-target="#inv<?php echo $d_praktik['id_praktik']; ?>" title="Unggah Invoice">
            UNGGAH FILE INVOICE
        </a>

        <!-- modal keterangan penolakan -->
        <div class="modal fade" id="inv<?php echo $d_praktik['id_praktik']; ?>" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Unggah Invoice</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body text-lg">

                        <form enctype="multipart/form-data" class="form-group" method="post" action="">
                            <a href="./_print/p_praktikInv.php?id=<?php echo $d_praktik['id_praktik'] ?>" class="btn btn-outline-success" target="_blank" title="Cetak Invoice untuk ditandatangai (TTD Basah)">
                                <i class="fas fa-file-download"></i> Unduh Data Invoice
                            </a><br><br>


                            <h5>Unggah Invoice yg sudah ditandatangani: </h5><br>
                            <input type="file" name="file_invoice" id="file_invoice" accept="application/pdf" required>
                            <input type="hidden" name="id_praktik" id="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>">
                            <hr>
                            <nav id="navbar-tarif" class="navbar justify-content-center">
                                <button type="submit" name="simpan_invoice" class="nav-link btn btn-success btn-sm">
                                    <i class="fas fa-paper-plane"></i> Kirim Data Invoice
                                </button>
                            </nav>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } elseif ($d_praktik['status_cek_praktik'] == "INV") {
    ?>
        <b>PLIH : </b><br>
        <a class="btn btn-outline-danger btn-sm" href="?prk=<?php echo $_GET['prk'] ?>&ib=<?php echo $d_praktik['id_praktik']; ?>">ISI PEMBAYARAN</a>
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
    } elseif ($d_praktik['status_cek_praktik'] == "BYR_T_K") {
    ?>

        <b>PILIH : </b><br>

        <a class="btn btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#ketTolakPembayaran<?php echo $d_praktik['id_praktik']; ?>" title="PEMBAYARAN">
            PEMBAYARAN
        </a>

        <!-- modal pembayaran ulang -->
        <div class="modal fade" id="ketTolakPembayaran<?php echo $d_praktik['id_praktik']; ?>" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header h5">
                        <b>PEMABAYARAN ULANG</b>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="jumbotron">
                            <div class="jumbotron-fluid h6 text-gray-800 font-weight-bold">
                                JUMLAH KEKURANGAN :
                                <?php
                                $sql_bayar_ulang = "SELECT * FROM tb_bayar 
                                                                        JOIN tb_praktik ON tb_bayar.id_praktik = tb_praktik.id_praktik
                                                                        WHERE tb_praktik.id_praktik = " . $d_praktik['id_praktik'];

                                $q_bayar_ulang = $conn->query($sql_bayar_ulang);

                                $d_bayar_ulang = $q_bayar_ulang->fetch(PDO::FETCH_ASSOC);
                                echo "Rp " . number_format($d_bayar_ulang['kurang_tf_praktik'], 0, ",", ".");
                                ?>
                            </div>
                        </div>
                        <br>
                        <form enctype="multipart/form-data" class="form-group" method="post" action="">
                            <b>Kode Pembayaran : </b><span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="kode_bayar" value="<?php echo $d_bayar_ulang['kode_bayar'] ?>" required readonly><br>
                            <b>Atas Nama : </b><span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="atas_nama_bayar" required><br>
                            <b>No. Rekening/Lainnya : </b><span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="noRek_bayar" required><br>
                            <b>Pembayaran Melalui : </b><span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="melalui_bayar" required><br>
                            <b>Tanggal Transfer : </b><span style="color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_bayar" required><br>
                            <b>Unggah File : </b><span style="color:red">*</span><br>
                            <input type="file" name="file_bayar" accept="application/pdf" required><br>
                            <i style='font-size:12px;'>Data unggah harus .pdf, Maksimal 1 MB</i>
                            <input name="id_praktik" value="<?php echo $d_praktik['id_praktik']; ?>" hidden><br>
                            <hr>
                            <nav id="navbar-tarif" class="navbar justify-content-center">
                                <button type="submit" name="simpan_bayar" class="nav-link btn btn-success btn-sm">
                                    <i class="fas fa-paper-plane"></i> Kirim Data Pembayaran
                                </button>
                            </nav>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } elseif ($d_praktik['status_cek_praktik'] == "AKV") {
    ?>
        <b>PILIH :</b><br>
        <button class="btn btn-outline-secondary btn-sm" onclick="selesaiPraktik(<?php echo $d_praktik['id_praktik']; ?>)">SELESAIKAN <i class="fas fa-question-circle"></i></button>
    <?php
    } elseif ($d_praktik['status_cek_praktik'] == "SLS") {
    ?>
        <b>PILIH :</b><br>
        <button class="btn btn-outline-secondary btn-sm" onclick="arsipPraktik(<?php echo $d_praktik['id_praktik']; ?>)">ARSIPKAN <i class="fas fa-question-circle"></i></button>
    <?php
    }
    ?>
</div>