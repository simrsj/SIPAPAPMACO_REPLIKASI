<?php
if (isset($_GET['pbyr']) && isset($_GET['i'])) {

    //query data praktik
    $sql_praktik = "SELECT * FROM tb_praktik ";
    $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
    $sql_praktik .= " WHERE id_praktik = " . base64_decode(urldecode($_GET['pbyr']));
    try {
        $q_praktik = $conn->query($sql_praktik);
        $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PRAKTIK-');document.location.href='?error404';</script>";
    }

    //data tarif praktik
    $sql_praktik_tarif = "SELECT * FROM tb_bayar";
    $sql_praktik_tarif .= " WHERE id_praktik = '" . base64_decode(urldecode($_GET['pbyr'])) . "'";
    // echo $id_praktik . "<br>";

    try {
        $q_praktik_tarif = $conn->query($sql_praktik_tarif);
    } catch (Exception $ex) {
        echo "<script> alert('$ex -DATA BAYAR-'); ";
        echo "document.location.href='?error404'; </script>";
    }
    $r_praktik_tarif = $q_praktik_tarif->rowCount();
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Pembayaran Praktik</h1>
            </div>
        </div>
        <div class="row">
            <?php
            // echo $sql_praktik;
            ?>
            <!-- Data Rincian Pembayaran Chart -->
            <div class="col-md-12">

                <div class="card shadow mb-4 mt-3">
                    <div class="card-body">
                        <div class="row text-center h6 text-gray-900 ">
                            <div class="col-md">
                                Nama Kelompok : <br>
                                <b><?= $d_praktik['nama_praktik']; ?></b>
                                <hr>
                                Jumlah Praktik : <br>
                                <b><?= $d_praktik['jumlah_praktik']; ?></b>
                            </div>
                            <div class="col-md">
                                Tanggal Mulai : <br>
                                <b><?= tanggal($d_praktik['tgl_mulai_praktik']); ?></b>
                                <hr>
                                Tanggal Selesai : <br>
                                <b><?= tanggal($d_praktik['tgl_selesai_praktik']); ?></b>
                            </div>
                            <div class="col-md-1  my-auto">
                                <a class="btn btn-outline-success btn-sm" href="<?= $d_praktik['fileInv_praktik']; ?>" title="Invoice" target="_blank">
                                    <i class="fas fa-file-download"></i> <br>UNDUH <br>INVOICE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <!-- Card Body -->
                    <div class="card-body">
                        <?php
                        $sql_jumlahTotal = "SELECT SUM(jumlah_tarif_pilih) AS jumlahTotal FROM tb_tarif_pilih";
                        try {
                            $q_jumlahTotal = $conn->query($sql_jumlahTotal);
                            $d_jumlahTotal = $q_jumlahTotal->fetch(PDO::FETCH_ASSOC);
                        } catch (Exception $ex) {
                            echo "<script>alert('$ex -DATA PRAKTIK-');document.location.href='?error404';</script>";
                        }
                        ?>
                        <div class="jumbotron">
                            <div class="jumbotron-fluid">
                                <div class="h4 text-center text-decoration-underline text-gray-700">
                                    JUMLAH TOTAL PEMBAYARAN : <span class="b u"><?= "Rp " . number_format($d_jumlahTotal['jumlahTotal'], 0, ",", "."); ?> </span><br>
                                    KODE PEMBAYARAN : <span class="b u text-danger"><?= $d_praktik['kode_bayar_praktik']  ?> </span><br>

                                </div>
                                <br>
                                <div class="h5 text-gray-700">
                                    <?php

                                    $sql_praktik1 = "SELECT * FROM tb_praktik
                                    WHERE id_praktik = " . $id_praktik;

                                    $q_praktik1 = $conn->query($sql_praktik1);
                                    $d_praktik1 = $q_praktik1->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                    <center>
                                        <div class="text-danger font-weight-bold">
                                            Kode Pembayaran : <?= "B" . $d_praktik1['id_praktik'] . date_format(date_create($d_praktik1['tgl_input_praktik']), "ymd"); ?>
                                        </div>
                                        <br>
                                        Perlu kami informasikan pembayaran dapat ditransfer pada <br>
                                        <b>Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD)</b> dengan nomor : <br> <b>BJB - 0063028738002</b>.
                                    </center>
                                    <br>Bukti transfer dikirim juga melalui :
                                    <br> <i class="fas fa-envelope"></i> Email diklit.rsj.jabarprov@gmail.com
                                    <br> <i class="fab fa-whatsapp"></i> Nomor WA Bendahara Penerimaan RSJ (081321412643)<br>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jenis</th>
                                        <th>Nama Tarif</th>
                                        <th>Satuan</th>
                                        <th>Tarif</th>
                                        <th>Frek.</th>
                                        <th>Ktt.</th>
                                        <th width="150px">Total Tarif</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $data_) : ?>
                                        <tr>
                                            <td><?= $data_[0]; ?></td>
                                            <td><?= $data_[1]; ?></td>
                                            <td><?= $data_[2]; ?></td>
                                            <td><?= $data_[3]; ?></td>
                                            <td><?= $data_[4]; ?></td>
                                            <td><?= $data_[5]; ?></td>
                                            <td><?= $data_[6]; ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- tombol Bukti Data Pembayaran -->
                    <nav id="navbar-tarif" class="navbar justify-content-center">
                        <a class='nav-link btn btn-outline-success' href='#' data-toggle='modal' data-target='#pilih_bayar'>
                            <i class="fas fa-paper-plane"></i> Input Data Pembayaran
                        </a>
                    </nav>

                    <!-- modal Bukti Data Pembayaran -->
                    <div class="modal fade text-left " id="pilih_bayar" data-backdrop="static">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_sbayar">
                                    <div class="modal-header">
                                        <b>BUKTI DATA PEMABAYARAN</b>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" class="form-group" method="post" action="">
                                            <b>Kode Pembayaran : </b><span style="color:red">*</span><br>
                                            <input class="form-control" type="text" name="kode_bayar" value="<?= "B" . $d_praktik1['id_praktik'] . date_format(date_create($d_praktik1['tgl_input_praktik']), "ymd"); ?>" required readonly><br>
                                            <b>Atas Nama : </b><span style="color:red">*</span><br>
                                            <input class="form-control" type="text" name="atas_nama_bayar" required><br>
                                            <b>No. Rekening/Lainnya : </b><span style="color:red">*</span><br>
                                            <input class="form-control" type="text" name="noRek_bayar" required><br>
                                            <b>Pembayaran Melalui : </b><span style="color:red">*</span><br>
                                            <input class="form-control" type="text" name="melalui_bayar" required><br>
                                            <b>Tanggal Transfer : </b><span style="color:red">*</span><br>
                                            <input class="form-control" type="date" name="tgl_bayar" required><br>
                                            <b>Unggah File : </b><span style="color:red">*</span><br>
                                            <input type="file" name="file_bayar" accept="application/pdf, image/jpg, image/png, image/jpeg" required><br>
                                            <i style='font-size:12px;'>Data unggah harus pdf/jpg/png/jpeg, Maksimal 1 MB</i>
                                            <input name="id_praktik" value="<?= $id; ?>" hidden><br>
                                            <hr>
                                            <nav id="navbar-tarif" class="navbar justify-content-center">
                                                <button type="submit" name="simpan_bayar" class="nav-link btn btn-success btn-sm">
                                                    <i class="fas fa-paper-plane"></i> Kirim Data Pembayaran
                                                </button>
                                            </nav>
                                        </form>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
