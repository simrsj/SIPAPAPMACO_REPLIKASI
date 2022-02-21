<?php

$path = $_GET['prk'];
$id = $_GET['ib'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Pembayaran Praktik</h1>
        </div>
    </div>
    <div class="row">
        <!-- Bukti Data Pembayaran -->
        <div class="col-lg-3">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center ">
                    <div class="h5 text-gray-800 font-weight-bold text-center">
                        Bukti Data Pembayaran
                    </div>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" class="form-group" method="post" action="">
                        <b>Atas Nama : </b><span style="color:red">*</span><br>
                        <input class="form-control" type="text" name="atas_nama_bayar" required><br>
                        <b>No. Rekening/Lainnya : </b><span style="color:red">*</span><br>
                        <input class="form-control" type="text" name="no_bayar" required><br>
                        <b>Pembayaran Melalui : </b><span style="color:red">*</span><br>
                        <input class="form-control" type="text" name="melalui_bayar" required><br>
                        <b>Unggah File : </b><span style="color:red">*</span><br>
                        <input type="file" name="file_bayar" accept="application/pdf" required><br>
                        <i style='font-size:12px;'>Data unggah harus .pdf, Maksimal 1 MB</i>
                        <input name="id_praktik" value="<?php echo $id; ?>" hidden><br>
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

        <!-- Area Chart -->
        <div class="col-lg-9">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <div class="h5 text-gray-800 font-weight-bold text-center">
                        Rincian Pembayaran (INVOICE)
                    </div>

                    <a class="btn btn-outline-success btn-sm" href="./_print/p_praktik_invoice.php?id=<?php echo $_GET['ib']; ?>" title="Invoice" target="_blank"><i class="fas fa-file-download"></i> DOWNLOAD INVOICE</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $id_praktik = $_GET['ib'];
                    // echo $id_praktik . "<br>";

                    #data tarif pilih
                    $sql_praktik = "SELECT * FROM tb_tarif_pilih
                        JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik
                        JOIN tb_tarif ON tb_tarif_pilih.id_tarif = tb_tarif.id_tarif
                        JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan
                        WHERE tb_praktik.id_praktik = '" . $id_praktik . "'
                        ORDER BY nama_tarif ASC";
                    $q_praktik = $conn->query($sql_praktik);

                    $data = array();
                    $no = 1;
                    $total_tarif = 0;
                    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                        array_push(
                            $data,
                            array(
                                $no,
                                $d_praktik['nama_tarif'],
                                $d_praktik['nama_tarif_satuan'],
                                "Rp " . number_format($d_praktik['jumlah_tarif'], 0, ",", "."),
                                $d_praktik['frekuensi_tarif_pilih'],
                                $d_praktik['kuantitas_tarif_pilih'],
                                "Rp " . number_format($d_praktik['jumlah_tarif_pilih'], 0, ",", ".")
                            )
                        );
                        $total_tarif = $total_tarif + $d_praktik['jumlah_tarif_pilih'];
                        $no++;
                    }

                    #data tempat pilih
                    $sql_tempat = "SELECT * FROM tb_praktik 
                        JOIN tb_tempat_pilih ON tb_praktik.id_praktik = tb_tempat_pilih.id_praktik 
                        JOIN tb_tempat ON tb_tempat_pilih.id_tempat = tb_tempat.id_tempat 
                        JOIN tb_tarif_satuan ON tb_tempat.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan
                        WHERE tb_praktik.id_praktik = '" . $id_praktik . "'";
                    $q_tempat = $conn->query($sql_tempat);

                    while ($d_tempat = $q_tempat->fetch(PDO::FETCH_ASSOC)) {
                        array_push(
                            $data,
                            array(
                                $no,
                                $d_tempat['nama_tempat'] . " (Tempat)",
                                $d_tempat['nama_tarif_satuan'],
                                "Rp " . number_format($d_tempat['tarif_tempat'], 0, ",", "."),
                                $d_tempat['frek_tempat_pilih'],
                                $d_tempat['kuan_tempat_pilih'],
                                "Rp " . number_format($d_tempat['total_tarif_tempat_pilih'], 0, ",", ".")
                            )
                        );
                        $total_tarif = $total_tarif + $d_tempat['total_tarif_tempat_pilih'];
                        $no++;
                    }

                    #data mess pilih
                    $sql_mess = "SELECT * FROM tb_praktik 
                        JOIN tb_mess_pilih ON tb_praktik.id_praktik = tb_mess_pilih.id_praktik 
                        JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess 
                        JOIN tb_institusi on tb_institusi.id_institusi = tb_praktik.id_institusi
                        WHERE tb_praktik.id_praktik = '" . $id_praktik . "'";
                    $q_mess = $conn->query($sql_mess);

                    while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                        if ($d_mess['makan_mess_pilih'] == 'y') {
                            $makan = "(Dengan Makan)";
                        } elseif ($d_mess['makan_mess_pilih'] == 't') {
                            $makan = "(Tanpa Makan)";
                        } else {
                            $makan = "(<i><b>ERROR</b></i>)";
                        }
                        array_push(
                            $data,
                            array(
                                $no,
                                $d_mess['nama_mess'] . " (Mess) " . $makan,
                                "Hari/Orang",
                                "Rp " . number_format(
                                    $d_mess['total_tarif_mess_pilih'] / ($d_mess['jumlah_praktik'] * $d_mess['total_hari_mess_pilih']),
                                    0,
                                    ",",
                                    "."
                                ),
                                $d_mess['jumlah_praktik'],
                                $d_mess['total_hari_mess_pilih'],
                                "Rp " . number_format($d_mess['total_tarif_mess_pilih'], 0, ",", ".")
                            )
                        );
                        $total_tarif = $total_tarif + $d_mess['total_tarif_mess_pilih'];
                        $no++;
                    }

                    ?>
                    <div class="jumbotron">
                        <div class="jumbotron-fluid">
                            <div class="h4 text-center text-decoration-underline text-gray-700">
                                <u>TOTAL PEMBAYARAN : <b><?php echo "Rp " . number_format($total_tarif, 0, ",", "."); ?> </b></u>
                            </div>
                            <br>
                            <div class="h5 text-gray-700">
                                Perlu kami informasikan pembayaran dapat ditransfer pada <br>
                                <b>Rekening Pemegang Kas RS Jiwa Provinsi Jawa Barat (BLUD)</b> dengan nomor : <b>BJB - 0063028738002</b>.
                                <br>Bukti transfer dikirim juga melalui :
                                <br> <i class="fas fa-envelope"></i> Email diklit.rsj.jabarprov@gmail.com
                                <br> <i class="fab fa-whatsapp"></i> Nomor WA Bendahara Penerimaan RSJ (081321412643)<br>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive text-sm">
                        <table class="table table-hover" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tarif</th>
                                    <th>Satuan</th>
                                    <th>Tarif</th>
                                    <th>Frek.</th>
                                    <th>Ktt.</th>
                                    <th>Total Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $data_) : ?>
                                    <tr>
                                        <td><?php echo $data_[0]; ?></td>
                                        <td><?php echo $data_[1]; ?></td>
                                        <td><?php echo $data_[2]; ?></td>
                                        <td><?php echo $data_[3]; ?></td>
                                        <td><?php echo $data_[4]; ?></td>
                                        <td><?php echo $data_[5]; ?></td>
                                        <td><?php echo $data_[6]; ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
if (isset($_POST['simpan_bayar'])) {


    $no = 1;
    $sql = "SELECT id_bayar FROM tb_bayar ORDER BY id_bayar ASC";
    $q = $conn->query($sql);
    while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
        if ($no != $d['id_bayar']) {
            $no = $d['id_bayar'] + 1;
            break;
        }
        $no++;
    }

    //alamat file surat masuk
    $alamat_unggah = "./_file/bayar";

    //ubah Nama File
    $_FILES['file_bayar']['name'] = "bayar_" . $no . "_" . $_POST['id_praktik'] . "-" . date('Y-m-d') . ".pdf";

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah surat dan data praktik
    if (!is_null($_FILES['file_bayar'])) {
        $file_bayar = (object) @$_FILES['file_bayar'];

        //mulai unggah file surat praktik
        if ($file_bayar->size > 1000 * 1000) {
            echo "
                <script>
                    alert('File Harus dibawah 1 Mb');
                </script>
                ";
            $link_file_bayar = "";
        } elseif ($file_bayar->type !== 'application/pdf') {
            echo "
                <script>
                    alert('File Surat Harus .pdf');
                </script>
            ";
            $link_file_bayar = "";
        } else {
            $unggah_file_bayar = move_uploaded_file(
                $file_bayar->tmp_name,
                "{$alamat_unggah}/{$file_bayar->name}"
            );
            $link_file_bayar = "{$alamat_unggah}/{$file_bayar->name}";
            $sql_insert_bayar = " INSERT INTO tb_bayar (
                id_bayar, 
                id_praktik,
                atas_nama_bayar, 
                no_bayar, 
                melalui_bayar,
                tgl_input_bayar, 
                file_bayar
                ) VALUE (
                    '" . $no . "',
                    '" . $_POST['id_praktik'] . "',
                    '" . $_POST['atas_nama_bayar'] . "',
                    '" . $_POST['no_bayar'] . "',        
                    '" . $_POST['melalui_bayar'] . "',   
                    '" . date('Y-m-d') . "',
                    '" . $link_file_bayar . "'
                )";
            // echo $sql_insert_bayar . "<br>";
            $conn->query($sql_insert_bayar);

            //SQL ubah status praktik
            $sql_ubah_status_praktik = "UPDATE tb_praktik
            SET status_cek_praktik = 'BYR'
            WHERE id_praktik = " . $_GET['ib'];

            // echo $sql_ubah_status_praktik . "<br>";
            $conn->query($sql_ubah_status_praktik);

?>
            <script>
                alert('Data Pembayaran Sudah Disimpan');
                document.location.href = '?prk=<?php echo $_GET['prk']; ?>';
            </script>
<?php
        }
    }
}
