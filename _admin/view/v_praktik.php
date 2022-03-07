<?php
if (isset($_POST['arsip_praktik'])) {
    $conn->query("UPDATE `tb_praktik` SET status_praktik = 'A' WHERE id_praktik = " . $_POST['id_praktik']);
    echo "
        <script type='text/javascript'>
            document.location.href = '?prk';
        </script>
    ";
} elseif (isset($_POST['simpan_bayar'])) {

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
    $_FILES['file_bayar']['name'] = "bayar_" . $no . "_" .  $_POST['id_praktik'] . "_" . date('Y-m-d') . ".pdf";

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
                kode_bayar,
                atas_nama_bayar, 
                noRek_bayar, 
                melalui_bayar,
                tgl_bayar, 
                tgl_input_bayar, 
                file_bayar
                ) VALUE (
                    '" . $no . "',
                    '" . $_POST['id_praktik'] . "',
                    '" . $_POST['kode_bayar'] . "',
                    '" . $_POST['atas_nama_bayar'] . "',
                    '" . $_POST['noRek_bayar'] . "',        
                    '" . $_POST['melalui_bayar'] . "',           
                    '" . $_POST['tgl_bayar'] . "',   
                    '" . date('Y-m-d') . "',
                    '" . $link_file_bayar . "'
                )";
            // echo $sql_insert_bayar . "<br>";
            $conn->query($sql_insert_bayar);

            //SQL ubah status praktik
            $sql_ubah_status_praktik = "UPDATE tb_praktik
            SET status_cek_praktik = 'BYR'
            WHERE id_praktik = " . $_POST['id_praktik'];

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
                <h1 class="h3 mb-2 text-gray-800">Daftar Praktik <?php echo $judul; ?></h1>
            </div>
            <div class="col-lg-2 text-right">

                <?php
                ?>
                <a href="?prk=<?php echo $tambah; ?>&i" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <!-- <a href="?prk&a" class="btn btn-outline-info btn-sm">
                    <i>
                        <i class="fas fa-archive"></i>
                    </i>Arsip
                </a> -->
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
                $sql_praktik = "SELECT * FROM tb_praktik ";
                $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                $sql_praktik .= " JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi  ";
                $sql_praktik .= " WHERE (tb_praktik.status_praktik = 'D' OR tb_praktik.status_praktik = 'W' OR tb_praktik.status_praktik = 'Y' OR tb_praktik.status_praktik = 'S') ";
                $sql_praktik .= " $jenis_jurusan ";
                $sql_praktik .= " ORDER BY tb_praktik.tgl_selesai_praktik ASC";

                // echo $sql_praktik;

                $q_praktik = $conn->query($sql_praktik);
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                    while ($d_praktik = $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;">
                                        <br><br>

                                        <div class="col-sm-2 my-auto text-center">
                                            <b class="text-gray-800">INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?>
                                        </div>

                                        <div class="col-sm-2  my-auto text-center">
                                            <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>

                                        <div class="col-sm-2  text-center">
                                            <b class="text-gray-800">TANGGAL MULAI : </b><br><?php echo tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                            <b class="text-gray-800">TANGGAL SELESAI : </b><br><?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>
                                        <?php
                                        if ($_GET['prk'] == "ked") {
                                            include "_admin/view/v_praktikDataStatusKed.php";
                                        } else {
                                            include "_admin/view/v_praktikDataStatus.php";
                                        }
                                        ?>
                                        <!-- tombol aksi/info proses  -->
                                        <div class="col-sm-2 my-auto text-center">
                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"></i> Rincian
                                            </button>
                                            <!-- tombol ubah -->
                                            <?php
                                            if (($d_praktik['status_cek_praktik'] == "AKV") || ($d_praktik['status_cek_praktik'] == "SLS")) {
                                                $link_ubah = "href='#' data-toggle='modal' data-target='#prk_u_" . $d_praktik['id_praktik'] . "'";
                                            } else {
                                                $link_ubah = "href='?prk&u=" . $d_praktik['id_praktik'] . "'";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data praktikan -->
                                <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: medium;">
                                        <!-- data praktikan -->
                                        <div class="text-gray-700">
                                            <h4 class="font-weight-bold">DATA PRAKTIK</h4>
                                        </div>
                                        <div class="jumbotron">
                                            <div class="jumbotron-fluid">
                                                <div class="row">
                                                    <!-- Data Praktik  -->
                                                    <div class="col-sm-4">
                                                        <h5 class="text-gray-800 font-weight-bold">JURUSAN : </h5>
                                                        <?php echo $d_praktik['nama_jurusan_pdd']; ?><br><br>
                                                        <h5 class="text-gray-800 font-weight-bold">JENJANG : </h5>
                                                        <?php echo $d_praktik['nama_jenjang_pdd']; ?><br><br>
                                                        <h5 class="text-gray-800 font-weight-bold">PROFESI : </h5>
                                                        <?php echo $d_praktik['nama_profesi_pdd']; ?><br><br>
                                                        <h5 class="text-gray-800 font-weight-bold">JUMLAH PRAKTIKAN : </h5>
                                                        <?php echo $d_praktik['jumlah_praktik']; ?><br><br>
                                                    </div>

                                                    <!-- Data Koordinator  -->
                                                    <div class="col-sm-4">
                                                        <h5 class="text-gray-800 font-weight-bold">NAMA KOORDINATOR : </h5>
                                                        <?php echo $d_praktik['nama_koordinator_praktik']; ?><br><br>
                                                        <h5 class="text-gray-800 font-weight-bold">NO. HP KOORDINATOR : </h5>
                                                        <?php echo $d_praktik['telp_koordinator_praktik']; ?><br><br>
                                                        <h5 class="text-gray-800 font-weight-bold">EMAIL KOORDINATOR : </h5>
                                                        <?php echo $d_praktik['email_koordinator_praktik']; ?><br><br>
                                                    </div>

                                                    <!-- Data File -->
                                                    <div class="col-sm-4">
                                                        <h5 class="text-gray-800 font-weight-bold">FILE SURAT : </h5>
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
                                                        <h5 class="text-gray-800 font-weight-bold">DATA PRAKTIKAN :</h5>
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
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- Data Mess  -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- data mess yang dipilih -->
                                                <div class="text-gray-700">
                                                    <div class="row">
                                                        <div class="col-lg-11">
                                                            <h4 class="font-weight-bold">
                                                                DATA MESS
                                                                <!-- <a title="Ubah Mess" class="btn btn-primary btn-sm" href='?prk&um=<?php echo $d_praktik['id_praktik']; ?>'>
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a title="Hapus Mess" class="btn btn-danger btn-sm" href='#' data-toggle="modal" data-target="#m_h_m<?php echo $d_praktik['id_praktik']; ?>">
                                                                    <i class=" fas fa-trash-alt"></i>
                                                                </a> -->

                                                                <!-- modal hapus bayar -->
                                                                <!-- <div class="modal fade text-left" id="m_h_m<?php echo $d_praktik['id_praktik']; ?>">
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
                                                                </div> -->
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
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
                                                        <div class="jumbotron">
                                                            <div class="jumbotron-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <h5 class="text-gray-800 font-weight-bold">Nama Mess :</h5>
                                                                        <?php echo $d_mess_pilih['nama_mess']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold"> Nama Pemilik :</h5>
                                                                        <?php echo $d_mess_pilih['nama_pemilik_mess']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold">No Pemilik :</h5>
                                                                        <?php echo $d_mess_pilih['no_pemilik_mess']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold"> Alamat Mess : </h5>
                                                                        <?php echo $d_mess_pilih['alamat_mess']; ?><br><br>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <h5 class="text-gray-800 font-weight-bold"> Jumlah Hari :</h5>
                                                                        <?php echo $d_mess_pilih['jumlah_hari_mess_pilih']; ?><br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold">
                                                                            Dengan Makan (3X Sehari) :
                                                                        </h5>
                                                                        <?php
                                                                        if ($d_mess_pilih['makan_mess_pilih'] == 'y') {
                                                                            $makan = 'YA';
                                                                        } else {
                                                                            $makan = 'TIDAK';
                                                                        }
                                                                        echo $makan;
                                                                        ?>
                                                                        <br><br>
                                                                        <h5 class="text-gray-800 font-weight-bold"> Total Tarif Mess:</h5>
                                                                        <?php
                                                                        echo "Rp " . number_format($d_mess_pilih['total_tarif_mess_pilih'], 0, ",", ".");
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="jumbotron">
                                                            <div class="jumbotron-fluid">
                                                                <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                                    <h5 class="text-center">Data Mess Tidak Ada</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <!-- data menu tarif wajib, ujian dan sewa tempat yang dipilih -->
                                        <div class="text-gray-700">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h4 class="font-weight-bold">
                                                        DATA TARIF
                                                        <!-- <a title="Ubah Pembayaran" class="btn btn-primary btn-sm" href='?prk&uh=<?php echo $d_praktik['id_praktik']; ?>'>
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" data-toggle='modal' data-target='#h_h_m<?php echo $d_praktik['id_praktik']; ?>'>
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a> -->

                                                        <!-- modal hapus tarif -->
                                                        <!-- <div class="modal fade text-left" id="h_h_m<?php echo $d_praktik['id_praktik']; ?>">
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
                                                        </div> -->

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <?php

                                            $sql_tarif_pilih = "SELECT * FROM tb_tarif_pilih";
                                            $sql_tarif_pilih .= " JOIN tb_praktik ON tb_tarif_pilih.id_praktik = tb_praktik.id_praktik";
                                            $sql_tarif_pilih .= " WHERE tb_tarif_pilih.id_praktik = " . $d_praktik['id_praktik'];
                                            $sql_tarif_pilih .= " ORDER BY tb_tarif_pilih.nama_jenis_tarif_pilih ASC";

                                            // echo $sql_tarif_pilih;

                                            $q_tarif_pilih = $conn->query($sql_tarif_pilih);
                                            $r_tarif_pilih = $q_tarif_pilih->rowCount();
                                            if ($r_tarif_pilih > 0) {
                                            ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped" id="myTable">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <th scope="col">Nama Jenis</th>
                                                                <th scope="col">Nama </th>
                                                                <th scope="col" width="80px">Tarif</th>
                                                                <th scope="col" width="25px">Satuan</th>
                                                                <th scope="col" width="25px">Frekuensi</th>
                                                                <th scope="col">Kuantitas</th>
                                                                <th scope="col" width="125px">Total Tarif</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $total_jumlah_tarif = 0;
                                                            $no = 1;
                                                            while ($d_tarif_pilih = $q_tarif_pilih->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $no; ?></th>
                                                                    <td><?php echo $d_tarif_pilih['nama_jenis_tarif_pilih']; ?></td>
                                                                    <td><?php echo $d_tarif_pilih['nama_tarif_pilih']; ?></td>
                                                                    <td><?php echo "Rp " . number_format($d_tarif_pilih['nominal_tarif_pilih'], 0, ",", "."); ?></td>
                                                                    <td><?php echo $d_tarif_pilih['nama_satuan_tarif_pilih']; ?></td>
                                                                    <td><?php echo $d_tarif_pilih['frekuensi_tarif_pilih']; ?></td>
                                                                    <td><?php echo $d_tarif_pilih['kuantitas_tarif_pilih']; ?></td>
                                                                    <td><?php echo "Rp " . number_format($d_tarif_pilih['jumlah_tarif_pilih'], 0, ",", "."); ?></td>
                                                                </tr>
                                                            <?php
                                                                $total_jumlah_tarif += $d_tarif_pilih['jumlah_tarif_pilih'];
                                                                $no++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <br>
                                                    <center>
                                                        <div class="text-lg badge badge-primary">
                                                            JUMLAH TOTAL : <?php echo "Rp " . number_format($total_jumlah_tarif, 0, ",", "."); ?>
                                                        </div>
                                                    </center>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="jumbotron">
                                                    <div class="jumbotron-fluid">
                                                        <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                            <h5 class="text-center">Data Tarif Tidak Ada</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <hr>

                                        <!-- Data Pembayaran -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- data pembayaran -->
                                                <div class="text-gray-700">
                                                    <div class="row">
                                                        <div class="col-lg-11">
                                                            <h4 class="font-weight-bold">
                                                                DATA PEMBAYARAN
                                                                <!-- <a title="Ubah Pembayaran" class="btn btn-primary btn-sm" href='?prk&ub=<?php echo $d_praktik['id_praktik']; ?>'>
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <a title="Hapus Pembayaran" class="btn btn-danger btn-sm" href='#' data-toggle="modal" data-target="#b_h_m<?php echo $d_praktik['id_praktik']; ?>">
                                                                    <i class=" fas fa-trash-alt"></i>
                                                                </a> -->

                                                                <!-- modal hapus bayar -->
                                                                <!-- <div class="modal fade text-left" id="b_h_m<?php echo $d_praktik['id_praktik']; ?>">
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
                                                                </div> -->

                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <?php

                                                    $sql_bayar = "SELECT * FROM tb_bayar WHERE id_praktik = " . $d_praktik['id_praktik'];
                                                    // echo $sql_bayar;
                                                    $q_bayar = $conn->query($sql_bayar);
                                                    $r_bayar = $q_bayar->rowCount();
                                                    if ($r_bayar > 0) {
                                                    ?>
                                                        <table class="table table-striped" id="myTable_2">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th scope="col">No</th>
                                                                    <th scope="col">Atas Nama Pembayaran</th>
                                                                    <th scope="col">No Rekening/Lainnya</th>
                                                                    <th scope="col">Pembayaran Melalui</th>
                                                                    <th scope="col">Tanggal Transfer</th>
                                                                    <th scope="col">File Pembayaran</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $no = 1;
                                                                while ($d_bayar = $q_bayar->fetch(PDO::FETCH_ASSOC)) {
                                                                ?>
                                                                    <tr>
                                                                        <th scope="row"><?php echo $no; ?></th>
                                                                        <td><?php echo $d_bayar['atas_nama_bayar']; ?></td>
                                                                        <td><?php echo $d_bayar['noRek_bayar']; ?></td>
                                                                        <td><?php echo $d_bayar['melalui_bayar']; ?></td>
                                                                        <td><?php echo tanggal($d_bayar['tgl_bayar']); ?></td>
                                                                        <td>
                                                                            <a href="<?php echo $d_bayar['file_bayar']; ?>" class="btn btn-success btn-sm" target="_blank">
                                                                                <i class="fas fa-file-download"></i> Download
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                    $kode_bayar = $d_bayar['kode_bayar'];
                                                                    $no++;
                                                                }
                                                                ?>

                                                            </tbody>
                                                        </table>
                                                        <center>
                                                            <div class="text-lg badge badge-danger">
                                                                KODE BAYAR : <?php echo $kode_bayar; ?>
                                                            </div>
                                                        </center>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="jumbotron">
                                                            <div class="jumbotron-fluid">
                                                                <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                                    <h5 class="text-center">Data Pembayaran Tidak Ada</h5>
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
                    <h3 class='text-center'> Data Pengajuan Praktikan Anda Tidak Ada</h3>
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
                html: "<span class='text-danger text-uppercase font-weight-bold'>Penolakan</span> Data Pembayaran Kurang Transfer" +
                    '<input id="valP_T" class="swal2-input" type="number" min="10000" placeHolder="Isi Kekurangan Transfer">',
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
