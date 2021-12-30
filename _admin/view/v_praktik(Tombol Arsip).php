<?php
if (isset($_POST['arsip_praktik']) || isset($_POST['arsip_praktik'])) {
    $conn->query("UPDATE `tb_praktik` SET status_praktik = 'T' WHERE id_praktik = " . $_POST['id_praktik']);
?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
} elseif (isset($_GET['vd'])) {
    if ($_GET['vd'] == 'y') {
        $sql_ubah_status_praktik = "UPDATE tb_praktik
            SET status_cek_praktik = 'AKTIF'
            WHERE id_praktik = " . $_GET['id'];

        // echo $sql_ubah_status_praktik . "<br>";
        $conn->query($sql_ubah_status_praktik);
    } elseif ($_GET['vd'] == 't') {
        $sql_ubah_status_praktik = "UPDATE tb_praktik
            SET status_cek_praktik = 'DITOLAK'
            WHERE id_praktik = " . $_GET['id'];


        $d_bayar = $conn->query("SELECT * FROM tb_bayar WHERE id_praktik = " . $_GET['id'])->fetch(PDO::FETCH_ASSOC);
        unlink($d_bayar['file_bayar']);
        $sql_delete_bayar = "DELETE FROM `tb_bayar` WHERE id_praktik = " . $_GET['id'];


        // echo $sql_delete_bayar . "<br>";
        // echo $sql_ubah_status_praktik . "<br>";
        $conn->query($sql_delete_bayar);
        $conn->query($sql_ubah_status_praktik);
    }
?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
    <?php
} elseif (isset($_GET['hh'])) {
    $r_mess_pilih = $conn->query("SELECT *FROM tb_mess_pilih WHERE id_praktik = " . $_GET['hh'])->rowCount();
    $r_bayar = $conn->query("SELECT *FROM tb_bayar WHERE id_praktik = " . $_GET['hh'])->rowCount();

    if ($r_bayar > 0) {
    ?>
        <script type="text/javascript">
            alert('Hapus Data Pembayaran Terlebih Dahulu');
        </script>
    <?php
    } elseif ($r_mess_pilih > 0) {
    ?>
        <script type="text/javascript">
            alert('Hapus Data Mess Terlebih Dahulu');
        </script>
    <?php

    } else {
        $sql_delete_harga = "DELETE FROM `tb_harga_pilih` WHERE `tb_harga_pilih`.`id_praktik` = " . $_GET['hh'];

        $sql_ubah_status_praktik = "UPDATE tb_praktik
        SET status_cek_praktik = 'DAFTAR'
        WHERE id_praktik = " .  $_GET['hh'];

        // echo $sql_ubah_status_praktik . "<br>";
        $conn->query($sql_delete_harga);
        $conn->query($sql_ubah_status_praktik);
    }

    ?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
    <?php
} elseif (isset($_GET['hm'])) {
    $r_bayar = $conn->query("SELECT *FROM tb_bayar WHERE id_praktik = " . $_GET['hm'])->rowCount();

    if ($r_bayar > 0) {
    ?>
        <script type="text/javascript">
            alert('Hapus Data Pembayaran Terlebih Dahulu');
        </script>
    <?php
    } else {

        $d_mess_pilih = $conn->query("SELECT * FROM tb_mess_pilih WHERE id_praktik = " . $_GET['hm'])->fetch(PDO::FETCH_ASSOC);
        $d_mess = $conn->query("SELECT * FROM tb_mess WHERE id_mess = " . $d_mess_pilih['id_mess'])->fetch(PDO::FETCH_ASSOC);
        $terisi_mess = $d_mess['kapasitas_terisi_mess'] - $d_mess_pilih['jumlah_praktik_mess_pilih'];

        $sql_ubah_terisi_mess =  "UPDATE tb_mess SET kapasitas_terisi_mess = '" . $terisi_mess  . "' WHERE id_mess = " . $d_mess_pilih['id_mess'];
        $sql_delete_mess_pilih = "DELETE FROM `tb_mess_pilih` WHERE id_praktik = " . $_GET['hm'];
        $sql_update_status_praktik = "UPDATE tb_praktik SET status_cek_praktik = 'HARGA' WHERE id_praktik = " . $_GET['hm'];
        // echo $sql_ubah_terisi_mess . "<br>";
        // echo $sql_delete_mess_pilih . "<br>";
        // echo $sql_update_status_praktik . "<br>";

        $conn->query($sql_ubah_terisi_mess);
        $conn->query($sql_delete_mess_pilih);
        $conn->query($sql_update_status_praktik);
    }

    ?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
} elseif (isset($_GET['hb'])) {
    $d_bayar = $conn->query("SELECT * FROM tb_bayar WHERE id_praktik = " . $_GET['hb'])->fetch(PDO::FETCH_ASSOC);
    unlink($d_bayar['file_bayar']);
    $sql_delete_bayar = "DELETE FROM `tb_bayar` WHERE id_praktik = " . $_GET['hb'];

    $sql_ubah_status_praktik = "UPDATE tb_praktik
        SET status_cek_praktik = 'MESS'
        WHERE id_praktik = " . $_GET['hb'];

    // echo $sql_delete_bayar . "<br>";
    // echo $sql_ubah_status_praktik . "<br>";
    $conn->query($sql_delete_bayar);
    $conn->query($sql_ubah_status_praktik);

?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
} else {
?>
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
                        $sql_praktik = "SELECT * FROM tb_praktik 
                    JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
                    WHERE tb_praktik.status_praktik = 'Y' AND id_user = " . $_SESSION['id_user'] . "
                    ORDER BY tb_praktik.tgl_selesai_praktik ASC";
                    }
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
                                                <b>PERIODE PRAKTIK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                            </div>
                                            <div class="col-sm-2">
                                                <b>TANGGAL SELESAI : </b>
                                                <br>
                                                <?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <b>STATUS : </b>
                                                <a href="#" data-toggle="modal" data-target="#info_status">
                                                    <i class="fas fa-info-circle" style="font-size: 14px;"></i>
                                                </a>

                                                <!-- modal info_status -->
                                                <div class="modal fade text-left" id="info_status">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4>INFO STATUS</h4>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span class="badge badge-warning text-md">DAFTAR</span> : Sudah Melakukan Pendaftaran, dilanjutkan Pilih Harga<br><br>
                                                                <span class="badge badge-warning text-md">HARGA</span> : Harga Sudah Dipilih, dilanjutkan Pemilihan Mess Oleh Admin<br><br>
                                                                <span class="badge badge-primary text-md">MESS</span> : Mess Sudah didaftarkan oleh Admin, dilanjutkan Melakukan Proses Pembayaran <br><br>
                                                                <span class="badge badge-warning text-md">PEMBAYARAN</span> : Proses Pembayaran Belum Terverifikasi oleh Admin <br><br>
                                                                <span class="badge badge-success text-md">AKTIF</span> : Pembayaran Sudah terverifikasi oleh Admin, Pendaftaran Selesai <br><br>
                                                                <span class="badge badge-danger text-md">DITOLAK</span> : Pembayaran ditolak oleh Admin, revisi pembayaran<br><br>
                                                                <span class="badge badge-dark text-md">SELESAI</span> : Praktikan Sudah Selesai
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <?php
                                                if ($d_praktik['status_cek_praktik'] == "DAFTAR") {
                                                ?>
                                                    <span class="badge badge-warning text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "HARGA") {
                                                ?>
                                                    <span class="badge badge-warning text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "MESS") {
                                                ?>
                                                    <span class="badge badge-primary text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "PEMBAYARAN") {
                                                ?>
                                                    <span class="badge badge-warning text-md">PEMBAYARAN</span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "AKTIF") {
                                                ?>
                                                    <span class="badge badge-success text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "DITOLAK") {
                                                ?>
                                                    <span class="badge badge-danger text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-danger text-md">ERROR</span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <b>PILIH : </b><br>
                                                <!-- tombol dropdown pilih menu harga, mess, bukti bayar -->
                                                <?php
                                                if ($d_praktik['status_cek_praktik'] == "DAFTAR") {
                                                ?>
                                                    <a class="btn btn-outline-danger btn-sm" href="?prk&ih=<?php echo $d_praktik['id_praktik']; ?>">HARGA</a>
                                                    <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "HARGA") {
                                                    if ($_SESSION['level_user'] == 1) {
                                                    ?>
                                                        <a class="btn btn-outline-danger btn-sm" href="?prk&m=<?php echo $d_praktik['id_praktik']; ?>">MESS</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <b>PROSES :</b> <br>
                                                        <span class="badge badge-primary text-md">PEMILIHAN MESS ADMIN</span>
                                                    <?php
                                                    }
                                                } elseif ($d_praktik['status_cek_praktik'] == "MESS" || $d_praktik['status_cek_praktik'] == "DITOLAK") {
                                                    ?>
                                                    <a class="btn btn-outline-danger btn-sm" href="?prk&ib=<?php echo $d_praktik['id_praktik']; ?>">PEMBAYARAN</a>
                                                    <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "PEMBAYARAN") {
                                                    if ($_SESSION['level_user'] == 1) {
                                                    ?>
                                                        <a title="Pembayaran Diterima" href="?prk&vd=y&id=<?php echo $d_praktik['id_praktik'] ?>" class="btn btn-success"><i class="fas fa-check"></i></a>
                                                        <a title="Pembayaran Ditolak" href="?prk&vd=t&id=<?php echo $d_praktik['id_praktik'] ?>" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <b>PROSES :</b> <br>
                                                        <span class="badge badge-primary text-md">VALIDASI ADMIN</span>
                                                    <?php
                                                    }
                                                } elseif ($d_praktik['status_cek_praktik'] == "AKTIF") {
                                                    ?>
                                                    <a title="Praktik Selesai ?" href="#" class="btn btn-outline-primary btn-sm font-weight-bold" data-toggle='modal' data-target='#end_<?php echo $d_praktik['id_praktik']; ?>'>SELESAIKAN <i class="fas fa-question"></i></a>

                                                    <!-- modal praktik selesai -->
                                                    <div class="modal fade text-left" id="end_<?php echo $d_praktik['id_praktik']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4>Praktikan Sudah Selesai ?</h4>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form method="post">
                                                                        <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                        <button type="submit" name="selesai_praktik" value="Hapus" class="btn btn-primary btn-sm">Selesai</button>
                                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Batal</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                            <div class="col-sm-2">
                                                <!-- tombol rincian -->
                                                <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian"><i class="fas fa-info-circle"></i>
                                                </button>
                                                <!-- tombol ubah -->
                                                <a href="?prk&u=<?php echo $d_praktik['id_praktik']; ?>" class="btn btn-primary btn-sm" title="Ubah">
                                                    <i class="fas fa-edit"></i>
                                                </a><!-- tombol arsip -->
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

                                            <!-- data menu harga wajib, ujian dan sewa tempat yang dipilih -->
                                            <div class="text-gray-700">
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <h4 class="font-weight-bold">
                                                            DATA HARGA
                                                            <?php
                                                            if ($_SESSION['level_user'] == 1) {
                                                            ?>
                                                                <a title="Ubah Pembayaran" class="btn btn-primary btn-sm" href='?prk&uh=<?php echo $d_praktik['id_praktik']; ?>'>
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" href='?prk&hh=<?php echo $d_praktik['id_praktik']; ?>'>
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div>
                                                <?php
                                                $sql_harga_pilih = "SELECT * FROM tb_harga_pilih
                                                    JOIN tb_harga ON tb_harga_pilih.id_harga = tb_harga.id_harga
                                                    JOIN tb_praktik ON tb_harga_pilih.id_praktik = tb_praktik.id_praktik
                                                    WHERE tb_harga_pilih.id_praktik = " . $d_praktik['id_praktik'] . "
                                                    ORDER BY tb_harga.id_harga_jenis , tb_harga.nama_harga ASC";


                                                $q_harga_pilih = $conn->query($sql_harga_pilih);
                                                $r_harga_pilih = $q_harga_pilih->rowCount();
                                                if ($r_harga_pilih > 0) {
                                                ?>
                                                    <table class="table table-striped" id="myTable">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <th scope="col">Tanggal Input</th>
                                                                <th scope="col">Tanggal Ubah</th>
                                                                <th scope="col">Nama Harga</th>
                                                                <th scope="col">Jumlah Harga</th>
                                                                <th scope="col">Frekuensi</th>
                                                                <th scope="col">Kuantitas</th>
                                                                <th scope="col">Total Harga</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $no = 1;
                                                            while ($d_harga_pilih = $q_harga_pilih->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $no; ?></th>
                                                                    <td><?php echo tanggal($d_harga_pilih['tgl_input_harga_pilih']); ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($d_harga_pilih['tgl_ubah_harga_pilih'] != NULL) {
                                                                            echo tanggal($d_harga_pilih['tgl_ubah_harga_pilih']);
                                                                        } else {
                                                                            echo "-";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td><?php echo $d_harga_pilih['nama_harga']; ?></td>
                                                                    <td><?php echo "Rp " . number_format($d_harga_pilih['jumlah_harga'], 0, ",", "."); ?></td>
                                                                    <td><?php echo $d_harga_pilih['frekuensi_harga_pilih']; ?></td>
                                                                    <td><?php echo $d_harga_pilih['kuantitas_harga_pilih']; ?></td>
                                                                    <td><?php echo "Rp " . number_format($d_harga_pilih['jumlah_harga_pilih'], 0, ",", "."); ?></td>
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
                                                                    <?php
                                                                    if ($_SESSION['level_user'] == 1) {
                                                                    ?>
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
                                                                    <?php
                                                                    }
                                                                    ?>
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
                                                                        <h5 class="text-gray-800 font-weight-bold"> Jumlah yang diisi :</h5>
                                                                        <?php echo $d_mess_pilih['jumlah_praktik_mess_pilih']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold"> Jumlah Hari :</h5>
                                                                        <?php echo $d_mess_pilih['jumlah_hari_mess_pilih']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold"> Dengan Makan (3X Sehari) :</h5>
                                                                        <?php echo $d_mess_pilih['makan_mess_pilih']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold"> Total Harga :</h5>
                                                                        <?php echo "Rp " . number_format($d_mess_pilih['total_harga_mess_pilih'], 0, ",", "."); ?>
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
                                                                    <?php
                                                                    if ($_SESSION['level_user'] == 1) {
                                                                    ?>
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
                                                                    <?php
                                                                    }
                                                                    ?>
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
                            <hr>
                        <?php
                        }
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
<?php
}