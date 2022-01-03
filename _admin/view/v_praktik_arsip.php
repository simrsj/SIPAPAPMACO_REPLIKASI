<?php
if (isset($_POST['restore_praktik'])) {
    $conn->query("UPDATE tb_praktik SET status_praktik = 'Y' WHERE id_praktik = " . $_POST['id_praktik']);
?>
    <script type="text/javascript">
        document.location.href = "?prk&a";
    </script>
<?php
} elseif (isset($_POST['hapus_praktik'])) {
    $conn->query("DELETE FROM tb_praktik WHERE id_praktik = " . $_POST['id_praktik']);
?>
    <script type="text/javascript">
        document.location.href = "?prk&a";
    </script>
<?php
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Arsip Praktikan</h1>
            </div>
            <div class="col-lg-2">
                <a href="?prk" class="btn btn-outline-dark btn-sm">
                    <i class="fas fa-arrow-circle-left"></i> Kembali
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    $sql_praktik = "SELECT * FROM tb_praktik 
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
                    WHERE tb_praktik.status_praktik = 'T'
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
                                                            <div class="modal-body text-center">
                                                                <span class="badge badge-warning text-md">DAFTAR</span> <br>
                                                                Sudah Melakukan Pendaftaran, dilanjutkan Pilih Harga<br><br>
                                                                <span class="badge badge-warning text-md">HARGA</span><br>
                                                                Harga Sudah Dipilih, dilanjutkan Validasi Data Pendaftaran dan Harga serta Pemilihan Mess Oleh Admin<br><br>
                                                                <span class="badge badge-primary text-md">MESS</span><br>
                                                                Mess Sudah didaftarkan oleh Admin dan Sudah Memvalidasi Data Daftar dan Harga, dilanjutkan Melakukan Proses Pembayaran.
                                                                <?php
                                                                if ($d_praktik['status_cek_praktik'] == 'MESS') {
                                                                ?>
                                                                    <a href="./_print/p_praktik_invoice.php?id=<?php $d_praktik['id_praktik']; ?>" target="_blank" class="text-primary text-uppercase font-weight-bold">
                                                                        <b>CEK INVOICE</b>
                                                                    </a>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="text-primary font-weight-bold">CEK INVOICE</div>
                                                                <?php
                                                                }
                                                                ?>
                                                                <br>
                                                                <span class="badge badge-warning text-md">PEMBAYARAN</span><br>
                                                                Proses Pembayaran Belum Terverifikasi oleh Admin <br><br>
                                                                <span class="badge badge-danger text-md">DITOLAK</span><br>
                                                                Pembayaran ditolak oleh Admin, <div class="text-danger font-weight-bold">CEK KETERANGAN</div><br>
                                                                <span class="badge badge-success text-md">AKTIF</span><br>
                                                                Pembayaran Sudah terverifikasi oleh Admin, Pendaftaran Selesai <br><br>
                                                                <span class="badge badge-dark text-md">SELESAI</span><br> Praktikan Sudah Selesai<br><br>
                                                                <span class="badge badge-danger text-md">ERROR</span><br> Terjadi kesalahan sistem, <br><a href="?lapor" class="text-danger text-uppercase font-weight-bold">Laporkan !</a>
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
                                                    <a href="#" class="badge badge-danger text-md" data-toggle="modal" data-target="#ket_tolak_status<?php echo $d_praktik['id_praktik']; ?>">
                                                        KET. <?php echo $d_praktik['status_cek_praktik']; ?>
                                                    </a>

                                                    <!-- Modal Pembayaran Diterima-->
                                                    <div class="modal fade text-left" id="ket_tolak_status<?php echo $d_praktik['id_praktik']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content text-lg text-center">
                                                                <div class="modal-header">
                                                                    <h4>Keterangan Penolakan</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php echo $d_praktik['ket_tolak_praktik']; ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "SELESAI") {
                                                ?>
                                                    <span class="badge badge-secondary text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-danger text-md">ERROR</span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-sm-2">
                                                <!-- tombol rincian -->
                                                <a class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                                    <i class="fas fa-info-circle"></i>
                                                    Rincian
                                                </a>
                                            </div>
                                            <div class="col-sm-2">

                                                <!-- tombol restore  -->
                                                <a class="btn btn-info btn-sm collapsed" data-toggle="modal" data-target="#res_<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                                    <i class="fas fa-trash-restore"></i>
                                                </a>

                                                <!-- modal restore -->
                                                <div class="modal fade" id="res_<?php echo $d_praktik['id_praktik']; ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h5>RESTORE DATA ? :</h5>
                                                                <b>Nama Institusi </b><br>
                                                                <?php echo $d_praktik['nama_institusi']; ?><br>
                                                                <b>Periode Praktik </b> : <br>
                                                                <?php echo $d_praktik['nama_praktik']; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post">
                                                                    <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                    <input type="submit" name="restore_praktik" value="Restore" class="btn btn-info btn-sm">
                                                                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Batal</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- tombol hapus permanen -->
                                                <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='#prk_dh_<?php echo $d_praktik['id_praktik']; ?>' title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                                <!-- modal hapus permanen -->
                                                <div class="modal fade" id="prk_dh_<?php echo $d_praktik['id_praktik']; ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <h5>HAPUS DATA SECARA PERMANEN ? :</h5>
                                                                <b>Nama Institusi </b><br>
                                                                <?php echo $d_praktik['nama_institusi']; ?><br>
                                                                <b>Periode Praktik </b> : <br>
                                                                <?php echo $d_praktik['nama_praktik']; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post">
                                                                    <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                    <input type="submit" name="hapus_praktik" value="Hapus" class="btn btn-danger btn-sm">
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

                                            <!-- data menu harga wajib, ujian dan sewa tempat yang dipilih -->
                                            <div class="text-gray-700">
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <h4 class="font-weight-bold">
                                                            DATA HARGA
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
?>