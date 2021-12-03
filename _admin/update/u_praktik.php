<?php
$id_praktik = $_GET['u'];

$sql_praktik_join = "SELECT * FROM tb_praktik 
    JOIN tb_mou ON tb_praktik.id_mou = tb_mou.id_mou
    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
    WHERE tb_praktik.id_praktik = $id_praktik
    ORDER BY tb_praktik.tgl_selesai_praktik ASC";

$q_praktik_join = $conn->query($sql_praktik_join);
$d_praktik_join = $q_praktik_join->fetch(PDO::FETCH_ASSOC);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Ubah Data Praktikan</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" class="form-group" method="post" enctype="multipart/form-data">
                <!-- Data Praktikan -->
                <div class="row">
                    <div class="col-lg-12">
                        <b>Data Praktikan</b>
                    </div>
                </div>
                <!-- Mou dan Nama Praktikan -->
                <div class="row">
                    <div class="col-lg-6">
                        Institusi : <span style="color:red">*</span><br>
                        <?php
                        $sql_mou = "SELECT * FROM tb_mou 
                                JOIN tb_institusi ON tb_mou.id_institusi = tb_institusi.id_institusi  
                                WHERE tb_mou.tgl_selesai_mou >= CURDATE() ORDER BY tb_institusi.nama_institusi ASC";

                        $q_mou = $conn->query($sql_mou);
                        $r_mou = $q_mou->rowCount();
                        if ($r_mou > 0) {
                        ?>
                            <select class='form-control' aria-label='Default select example' name='id_mou' required>
                                <option value="">-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_mou = $q_mou->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_praktik_join['id_mou'] == $d_mou['id_mou']) {
                                ?>
                                        <option value='<?php echo $d_mou['id_mou']; ?>' selected>
                                            <?php echo $d_mou['nama_institusi']; ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value='<?php echo $d_mou['id_mou']; ?>'>
                                            <?php echo $d_mou['nama_institusi']; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <i style='font-size:12px;'>Daftar Institusi yang MoU-nya masih berlaku</i>
                        <?php
                        } else {
                        ?>
                            <b><i>Data MoU Tidak Ada</i></b>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        Periode Praktik : <span style="color:red">*</span><br>
                        <input type="text" class="form-control" name="nama_praktik" placeholder="Isi Periode Praktik" value="<?php echo $d_praktik_join['nama_praktik']; ?>" required>
                    </div>
                </div>
                <br>
                <!-- Jurusan, Jenjang, Spesifikasi dan Akreditasi -->
                <div class="row">
                    <div class="col-lg-3">
                        Pilih Jurusan : <span style="color:red">*</span><br>
                        <?php
                        $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                        $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                        $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                        if ($r_jurusan_pdd > 0) {
                        ?>
                            <select class='form-control' aria-label='Default select example' name='id_jurusan_pdd' required>
                                <option value="">-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_praktik_join['id_jurusan_pdd'] == $d_jurusan_pdd['id_jurusan_pdd']) {
                                ?>
                                        <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>' selected>
                                            <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                            <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        ?>
                            <b><i>Data Jurusan Tidak Ada</i></b>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-3">
                        Pilih Jenjang : <span style="color:red">*</span><br>
                        <?php
                        $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";

                        $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                        $r_jenjang_pdd = $q_jenjang_pdd->rowCount();

                        if ($r_jenjang_pdd > 0) {
                        ?>
                            <select class='form-control' aria-label='Default select example' name='id_jenjang_pdd' required>
                                <option value="">-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_praktik_join['id_jenjang_pdd'] == $d_jenjang_pdd['id_jenjang_pdd']) {
                                ?>
                                        <option class='text-wrap' value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>' selected>
                                            <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option class='text-wrap' value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                            <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        ?>
                            <b><i>Data Jurusan Tidak Ada</i></b>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-3">
                        Pilih Spesifikasi : <span style="color:red">*</span><br>
                        <?php
                        $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";

                        $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                        $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();

                        if ($r_spesifikasi_pdd > 0) {
                        ?>
                            <select class='form-control' aria-label='Default select example' name='id_spesifikasi_pdd' required>
                                <option value="">-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_praktik_join['id_spesifikasi_pdd'] == $d_spesifikasi_pdd['id_spesifikasi_pdd']) {
                                ?>
                                        <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>' selected>
                                            <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                            <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        ?>
                            <b><i>Data Spesifikasi Tidak Ada</i></b>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-3">
                        Akreditasi : <span style="color:red">*</span><br>
                        <?php
                        $sql_akreditasi = "SELECT * FROM tb_akreditasi";

                        $q_akreditasi = $conn->query($sql_akreditasi);
                        $r_akreditasi = $q_akreditasi->rowCount();

                        if ($r_akreditasi > 0) {
                        ?>
                            <select class='form-control' aria-label='Default select example' name='id_akreditasi' required>
                                <option value="">-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_akreditasi = $q_akreditasi->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_praktik_join['id_akreditasi'] == $d_akreditasi['id_akreditasi']) {
                                ?>
                                        <option class='text-wrap' value='<?php echo $d_akreditasi['id_akreditasi']; ?>' selected>
                                            <?php echo $d_akreditasi['nama_akreditasi']; ?>
                                        </option>
                                    <?php
                                    } else {
                                    ?>
                                        <option class='text-wrap' value='<?php echo $d_akreditasi['id_akreditasi']; ?>'>
                                            <?php echo $d_akreditasi['nama_akreditasi']; ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        ?>
                            <b><i>Data Akreditasi Tidak Ada</i></b>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <br>
                <!-- Jumlah Praktikan, Tanggal Mulai, Tanggal Selesai, dan Unggah Surat -->
                <div class="row">
                    <div class="col-lg-3">
                        Jumlah Praktikan : <span style="color:red">*</span><br>
                        <input type="number" class="form-control" name="jumlah_praktik" min="1" value="<?php echo $d_praktik_join['jumlah_praktik'] ?>" required>
                    </div>
                    <div class="col-lg-3">
                        Tanggal Mulai : <span style="color:red">*</span><br>
                        <input type="date" class="form-control" name="tgl_mulai_praktik" value="<?php echo $d_praktik_join['tgl_mulai_praktik'] ?>" required>
                    </div>
                    <div class="col-lg-3">
                        Tanggal Akhir : <span style="color:red">*</span><br>
                        <input type="date" class="form-control" name="tgl_selesai_praktik" value="<?php echo $d_praktik_join['tgl_selesai_praktik'] ?>" required>
                    </div>
                </div>
                <br>
                <!-- unggah berkas -->
                <div class="row">
                    <div class="col-lg-6">
                        Unggah Surat : <br>
                        <i style='font-size:12px;'>File Surat sebelumnya
                            <a href="<?php echo $d_praktik_join['surat_praktik'] ?>">Download</a>
                        </i><br>
                        <input type="file" name="surat_praktik" accept="application/pdf" value="<?php echo $d_praktik_join['surat_praktik'] ?>" requiredX>
                        <br><i style='font-size:12px;'>Data unggah harus .pdf, Maksimal 1 MB</i>
                    </div>
                    <div class="col-lg-6">
                        Unggah Data Praktikan :
                        <i style='font-size:12px;'><a href="./_file/format_data_praktikan.xlsx">Download Format</a></i><br>
                        <i style='font-size:12px;'>Data Praktikan sebelumnya
                            <a href="<?php echo $d_praktik_join['data_praktik'] ?>">Download</a>
                        </i><br>
                        <input type="file" name="data_praktik" accept=".xls, .xlsx" value="<?php echo $d_praktik_join['data_praktik'] ?>" requiredX>
                        <br><i style='font-size:12px;'>Data unggah harus .xls .xlsx, Maksimal 1 MB</i>
                    </div>
                </div>
                <hr>
                <!-- Penanggung Jawab/Pembimbing/Mentor -->
                <div class="row">
                    <div class="col-lg-12">
                        <b>Penanggung Jawab/Pembimbing/Mentor</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        Nama : <span style="color:red">*</span><br>
                        <input type="text" class="form-control" name="nama_mentor_praktik" value="<?php echo $d_praktik_join['nama_mentor_praktik']; ?>" required>
                    </div>
                    <div class="col-lg-4">
                        Telpon : <span style="color:red">*</span><br>
                        <input type="number" class="form-control" name="telp_mentor_praktik" min="1" value="<?php echo $d_praktik_join['telp_mentor_praktik']; ?>" required>
                        <i style='font-size:12px;'>Isian hanya berupa angka</i>
                    </div>
                    <div class="col-lg-4">
                        Email :<br>
                        <input type="text" class="form-control" name="email_mentor_praktik" value="<?php echo $d_praktik_join['email_mentor_praktik']; ?>">
                    </div>
                </div>
                <hr>
                <!-- Simpan -->
                <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" name="ubah_praktik" value="Ubah" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah_praktik'])) {

    //alamat file surat masuk
    $alamat_unggah = "./_file/praktikan";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah data praktik
    if ($_FILES['surat_praktik']['size'] > 0) {

        //ubah nama file surat praktikan
        $_FILES['surat_praktik']['name'] = "surat_praktik_" . $id_praktik . "_" . date('Y-m-d') . ".pdf";

        $file_surat_praktik = (object) @$_FILES['surat_praktik'];

        //mulai unggah file surat praktik
        if ($file_surat_praktik->size > 1000 * 1000) {
            echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>File Unggah Surat</strong>Harus Kurang dari 1 MB
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                ";
            die();
        } elseif ($file_surat_praktik->type !== 'application/pdf') {
            echo "
                <script>
                    alert('File Surat Harus .pdf');
                </script>
                ";
            die();
        } else {
            $unggah_surat_praktik = move_uploaded_file(
                $file_surat_praktik->tmp_name,
                "{$alamat_unggah}/{$file_surat_praktik->name}"
            );
            $link_surat_praktik = "{$alamat_unggah}/{$file_surat_praktik->name}";

            // if ($unggah_data_praktik) {
            //     $link = "{$alamat_unggah}/{$file_data_praktik->name}";
            //     echo "Sukses unggah data praktik: <a href='{$link}'>{$file_data_praktik->name}</a>";
            //     echo "<br>";
            // }
        }
    }

    //unggah data praktik
    if ($_FILES['data_praktik']['size'] > 0) {

        //ubah nama file data praktikan
        $_FILES['data_praktik']['name'] = "data_praktik_" . $id_praktik . "_" . date('Y-m-d') . ".xlsx";

        $file_data_praktik = (object) @$_FILES['data_praktik'];

        //mulai unggah file data praktik
        if ($file_data_praktik->size > 1000 * 1000) {
            echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>File Unggah Data</strong>Harus Kurang dari 1 MB
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                ";
            die();
        } elseif ($file_data_praktik->type !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            echo "
                <script>
                    alert('File data Harus .xls .xlsx');
                </script>
                ";
            die();
        } else {
            $unggah_data_praktik = move_uploaded_file(
                $file_data_praktik->tmp_name,
                "{$alamat_unggah}/{$file_data_praktik->name}"
            );
            $link_data_praktik = "{$alamat_unggah}/{$file_data_praktik->name}";
        }

        // if ($unggah_data_praktik) {
        //     $link = "{$alamat_unggah}/{$file_data_praktik->name}";
        //     echo "Sukses unggah data praktik: <a href='{$link}'>{$file_data_praktik->name}</a>";
        //     echo "<br>";
        // }
    }

    //bila file surat tidak diisi diambil dari sebelumnya
    if ($_FILES['surat_praktik']['size'] == 0) {
        $surat_praktik = $d_praktik_join['surat_praktik'];
    } else {
        $surat_praktik = $unggah_surat_praktik;
    }

    //bila file data tidak diisi diambil dari sebelumnya
    if ($_FILES['data_praktik']['size'] == 0) {
        $data_praktik = $d_praktik_join['data_praktik'];
    } else {
        $data_praktik = $unggah_data_praktik;
    }

    $sql_update = " UPDATE `tb_praktik` SET
        `id_mou` = '" . $_POST['id_mou'] . "', 
        `id_institusi` = '" . $d_praktik_join['id_institusi'] . "', 
        `nama_praktik` = '" . $_POST['nama_praktik'] . "', 
        `tgl_input_praktik` = '" . date('Y-m-d') . "', 
        `tgl_mulai_praktik` = '" . $_POST['tgl_mulai_praktik'] . "', 
        `tgl_selesai_praktik` = '" . $_POST['tgl_selesai_praktik'] . "', 
        `jumlah_praktik` = '" . $_POST['jumlah_praktik'] . "', 
        `surat_praktik` = '" . $surat_praktik . "', 
        `data_praktik` = '" . $data_praktik . "', 
        `id_spesifikasi_pdd` = '" . $_POST['id_spesifikasi_pdd'] . "', 
        `id_jenjang_pdd` = '" . $_POST['id_jenjang_pdd'] . "', 
        `id_jurusan_pdd` = '" . $_POST['id_jurusan_pdd'] . "', 
        `id_akreditasi` = '" . $_POST['id_akreditasi'] . "', 
        `id_user` = '" . $_SESSION['id_user'] . "',
        `email_mentor_praktik` = '" . $_POST['email_mentor_praktik'] . "',
        `telp_mentor_praktik` = '" . $_POST['telp_mentor_praktik'] . "'
        WHERE `tb_praktik`.`id_praktik` = " . $id_praktik;

    // echo $sql_update;
    $conn->query($sql_update);
    if (isset($_GET['a'])) {
?>
        <script type="text/javascript">
            document.location.href = "?prk&a";
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            document.location.href = "?prk";
        </script>
<?php
    }
}
?>