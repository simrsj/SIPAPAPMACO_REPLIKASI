<?php
if (isset($_POST['arsip_praktik'])) {
    $conn->query("UPDATE `tb_praktik` SET status_praktik = 'T' WHERE id_praktik = " . $_POST['id_praktik']);
?>
    <script type="text/javascript">
        document.location.href = "?prk";
    </script>
<?php
} elseif (isset($_POST['simpan_bayar'])) {

    $no_id_bayar = 0;
    while ($d_bayar = $conn->query("SELECT id_bayar FROM tb_bayar ORDER BY id_bayar ASC")->fetch(PDO::FETCH_ASSOC)) {
        if ($no_id_bayar != $d_bayar[0]) {
            $no_id_bayar = $d_bayar[0] + 1;
            break;
        } elseif ($no_id_bayar == 0) {
            $no_id_bayar;
            break;
        }
        $no_id_bayar = $d_bayar[0] + 1;
    }

    //alamat file surat masuk
    $alamat_unggah = "./_file/bayar";

    //ubah Nama File
    $_FILES['file_bayar']['name'] = "bayar_" . $no_id_bayar . "_" . $_POST['id_praktik'] . "-" . date('Y-m-d') . ".pdf";

    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

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
        } elseif ($file_bayar->type !== 'application/pdf') {
            echo "
                <script>
                    alert('File Surat Harus .pdf');
                </script>
            ";
        } else {
            $unggah_file_bayar = move_uploaded_file(
                $file_bayar->tmp_name,
                "{$alamat_unggah}/{$file_bayar->name}"
            );
            $link_file_bayar = "{$alamat_unggah}/{$file_bayar->name}";
        }
    }
    $sql_insert_bayar = " INSERT INTO tb_bayar (
        id_bayar, 
        id_praktik,
        atas_nama_bayar, 
        no_bayar, 
        tgl_bayar, 
        file_bayar
    ) VALUE (
        '" . $no_id_bayar . "',
        '" . $_POST['id_praktik'] . "',
        '" . $_POST['atas_nama_bayar'] . "',
        '" . $_POST['no_bayar'] . "',        
        '" . $_POST['tgl_bayar'] . "',
        '" . $link_file_bayar . "'
    )";
    echo $sql_insert_bayar . "<br>";
    // $conn->query($sql_insert_bayar);


    //SQL ubah status praktik
    $sql_ubah_status_praktik = "UPDATE tb_praktik
    SET status_cek_praktik = 'AKTIF'
    WHERE id_praktik = " . $_POST['id_praktik'];

    echo $sql_ubah_status_praktik . "<br>";
    // $conn->query($sql_ubah_status_praktik);
?>
    <!-- <script type="text/javascript">
        document.location.href = "?prk";
    </script> -->
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

                                                <!-- modal bayar -->
                                                <div class="modal fade text-left" id="info_status">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4>INFO STATUS</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <span class="badge badge-danger text-md">DAFTAR</span> : Sudah Melakukan Pendaftaran, dilanjutkan Pilih Harga<br><br>
                                                                <span class="badge badge-danger text-md">HARGA</span> : Harga Sudah Dipilih, dilanjutkan Pemilihan Mess Oleh Admin<br><br>
                                                                <span class="badge badge-primary text-md">MESS</span> : Mess Sudah Terdaftar oleh Admin dan di Validasi, dilanjutkan Melakukan Proses Pembayaran <br><br>
                                                                <span class="badge badge-danger text-md">PEMBAYARAN</span> : Proses Pembayaran Belum Terverifikasi oleh Admin <br><br>
                                                                <span class="badge badge-success text-md">AKTIF</span> : Pembayaran Sudah terverifikasi oleh Admin, Pendaftaran Selesai <br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <?php
                                                if ($d_praktik['status_cek_praktik'] == "DAFTAR") {
                                                ?>
                                                    <span class="badge badge-danger text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "HARGA") {
                                                ?>
                                                    <span class="badge badge-danger text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "MESS") {
                                                ?>
                                                    <span class="badge badge-primary text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "PEMBAYARAN") {
                                                ?>
                                                    <span class="badge badge-danger text-md">PEMBAYARAN</span>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "AKTIF") {
                                                ?>
                                                    <span class="badge badge-success text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <div class="col-sm-2">

                                                <!-- tombol dropdown pilih menu harga, mess, bukti bayar -->
                                                <?php
                                                if ($d_praktik['status_cek_praktik'] == "DAFTAR") {
                                                ?>
                                                    <a class="btn btn-outline-danger btn-sm" href="?prk&ih=<?php echo $d_praktik['id_praktik']; ?>">Pilih Harga</a>
                                                    <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "HARGA") {
                                                    if ($_SESSION['level_user'] == 1) {
                                                    ?>
                                                        <a class="btn btn-outline-danger btn-sm" href="?prk&m=<?php echo $d_praktik['id_praktik']; ?>">Pilih Mess</a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="badge badge-primary text-md">VALIDASI ADMIN</span>
                                                    <?php
                                                    }
                                                } elseif ($d_praktik['status_cek_praktik'] == "MESS") {
                                                    ?>
                                                    <a class="btn btn-outline-danger btn-sm" href="#" data-toggle="modal" data-target="#bayar_<?php echo $d_praktik['id_praktik']; ?>">Pembayaran</a>

                                                    <!-- modal bayar -->
                                                    <div class="modal fade" id="bayar_<?php echo $d_praktik['id_praktik']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form enctype="multipart/form-data" class="form-group" method="post" action="">
                                                                    <div class="modal-header">
                                                                        MASUKAN DATA PEMBAYARAN
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <b>Atas Nama : </b><span style="color:red">*</span><br>
                                                                        <input class="form-control" type="text" name="atas_nama_bayar" required><br>
                                                                        <b>No. Rekening/Lainnya : </b><span style="color:red">*</span><br>
                                                                        <input class="form-control" type="text" name="no_bayar" required><br>
                                                                        <b>Pembayaran Melalui : </b><span style="color:red">*</span><br>
                                                                        <input class="form-control" type="text" name="melalui_bayar" required><br>
                                                                        <b>Tanggal Bayar : </b><span style="color:red">*</span><br>
                                                                        <input class="form-control" type="date" name="tgl_bayar" required><br>
                                                                        <b>Unggah File : </b><span style="color:red">*</span><br>
                                                                        <input type="file" name="file_bayar" accept="application/pdf" required><br>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                        <input type="submit" name="simpan_bayar" value="Kirim" class="btn btn-success btn-sm">
                                                                        <button class="btn btn-success btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "PEMBAYARAN") {
                                                ?>

                                                <?php
                                                } elseif ($d_praktik['status_cek_praktik'] == "AKTIF") {
                                                ?>
                                                    <span class="badge badge-success text-md"><?php echo $d_praktik['status_cek_praktik']; ?></span>
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

                                            <!-- data menu harga wajib, ujian dan sewa tempat yang dipilih -->
                                            <div class="text-gray-700">
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <h4 class="font-weight-bold">
                                                            DATA MENU HARGA
                                                            <?php
                                                            if ($_SESSION['level_user'] == 1) {
                                                            ?>
                                                                <a title="Ubah Harga" class="btn btn-primary btn-sm" href="?prk&uh=<?php echo $d_praktik['id_praktik'] ?>">
                                                                    <i class="fas fa-edit"></i>
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
                                                    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                                                        <h5 class="text-center">Data Menu Harga Tidak Ada</h5>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <hr>

                                            <!-- data mess yang dipilih -->
                                            <div class="text-gray-700">
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <h4 class="font-weight-bold">
                                                            DATA MESS
                                                            <?php
                                                            if ($_SESSION['level_user'] == 1) {
                                                            ?>
                                                                <a title="Ubah Harga" class="btn btn-primary btn-sm" href="?prk&me=<?php echo $d_praktik['id_praktik'] ?>">
                                                                    <i class="fas fa-edit"></i>
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

                                                $sql_mess_pilih = "SELECT * FROM tb_mess_pilih
                                                JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess
                                                WHERE tb_mess_pilih.id_praktik = " . $d_praktik['id_praktik'];

                                                $q_mess_pilih = $conn->query($sql_mess_pilih);
                                                $r_mess_pilih = $q_mess_pilih->rowCount();
                                                if ($r_mess_pilih > 0) {

                                                    $d_mess_pilih = $q_mess_pilih->fetch(PDO::FETCH_ASSOC);
                                                ?>
                                                    <h5 class="text-gray-800 font-weight-bold">Nama Mess :</h5>
                                                    <?php echo $d_mess_pilih['nama_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold"> Nama Pemilik :</h5>
                                                    <?php echo $d_mess_pilih['nama_pemilik_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold">No Pemilik :</h5>
                                                    <?php echo $d_mess_pilih['no_pemilik_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold"> Alamat Mess : </h5>
                                                    <?php echo $d_mess_pilih['alamat_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold"> Jumlah yang diisi :</h5>
                                                    <?php echo $d_mess_pilih['jumlah_mess_pilih']; ?>

                                                <?php
                                                } else {
                                                ?>
                                                    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                                                        <h5 class="text-center">Data Tidak Ada</h5>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <hr>

                                            <!-- data pembayaran -->
                                            <div class="text-gray-700">
                                                <div class="row">
                                                    <div class="col-lg-11">
                                                        <h4 class="font-weight-bold">
                                                            DATA PEMBAYARAN
                                                            <?php
                                                            if ($_SESSION['level_user'] == 1) {
                                                            ?>
                                                                <a title="Ubah Harga" class="btn btn-primary btn-sm" href='#' data-toggle='modal' data-target='#byr_u_<?php echo $d_praktik['id_praktik']; ?>'>
                                                                    <i class="fas fa-edit"></i>
                                                                </a>


                                                                <!-- ubah modal bayar -->
                                                                <div class="modal fade" id="byr_u_<?php echo $d_praktik['id_praktik']; ?>">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <form class="form-group" method="post" enctype="multipart/form-data">
                                                                                <div class="modal-header">
                                                                                    UBAH DATA PEMBAYARAN
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <?php
                                                                                    $q_bayar = $conn->query("SELECT * FROM tb_bayar WHERE id_praktik = " . $d_praktik['id_praktik']);
                                                                                    $d_bayar = $q_bayar->fetch(PDO::FETCH_ASSOC);
                                                                                    ?>
                                                                                    <b>Atas Nama : </b><br>
                                                                                    <input class="form-control" type="text" nama="nama_bayar" value="<?php echo $d_bayar['atas_nama_bayar']; ?>"><br>
                                                                                    <b>No. Rekening/Lainnya : </b><br>
                                                                                    <input class="form-control" type="number" nama="no_rek_bayar" value="<?php echo $d_bayar['atas_nama_bayar']; ?>"><br>
                                                                                    <b>Pembayaran Melalui : </b><br>
                                                                                    <input class="form-control" type="text" nama="melalui_bayar" value="<?php echo $d_bayar['atas_nama_bayar']; ?>"><br>
                                                                                    <b>Tanggal Bayar : </b><br>
                                                                                    <input class="form-control" type="text" nama="tgl_bayar" value="<?php echo $d_bayar['tgl_bayar']; ?>"><br>
                                                                                    <b>Unggah File : </b><br>
                                                                                    <i style='font-size:12px;'>File sebelumnya
                                                                                        <a href="<?php echo $d_bayar['file_bayar'] ?>">Download</a>
                                                                                    </i><br>
                                                                                    <input class="form-control" type="file" nama="file_bayar"><br>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn btn-success btn-sm" type="button" data-dismiss="modal">Batal</button>
                                                                                    <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                                    <input name="id_bayar" value="<?php echo $d_bayar['id_bayar'] ?>" hidden>
                                                                                    <input type="submit" name="ubah_bayar" value="Kirim" class="btn btn-danger btn-sm">
                                                                                </div>
                                                                            </form>
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
                                            <div>
                                                <?php

                                                $sql_mess_pilih = "SELECT * FROM tb_bayar WHERE id_praktik = " . $d_praktik['id_praktik'];

                                                $q_mess_pilih = $conn->query($sql_mess_pilih);
                                                $r_mess_pilih = $q_mess_pilih->rowCount();
                                                if ($r_mess_pilih > 0) {

                                                    $d_mess_pilih = $q_mess_pilih->fetch(PDO::FETCH_ASSOC);
                                                ?>
                                                    <h5 class="text-gray-800 font-weight-bold">Nama Mess :</h5>
                                                    <?php echo $d_mess_pilih['nama_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold"> Nama Pemilik :</h5>
                                                    <?php echo $d_mess_pilih['nama_pemilik_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold">No Pemilik :</h5>
                                                    <?php echo $d_mess_pilih['no_pemilik_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold"> Alamat Mess : </h5>
                                                    <?php echo $d_mess_pilih['alamat_mess']; ?><br><br>
                                                    <h5 class="text-gray-800 font-weight-bold"> Jumlah yang diisi :</h5>
                                                    <?php echo $d_mess_pilih['jumlah_mess_pilih']; ?>

                                                <?php
                                                } else {
                                                ?>
                                                    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                                                        <h5 class="text-center">Data Tidak Ada</h5>
                                                    </div>
                                                <?php
                                                }
                                                ?>
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
