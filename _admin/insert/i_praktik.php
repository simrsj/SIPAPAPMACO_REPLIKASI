<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Tambah Data Praktikan</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" class="form-group" method="POST">
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
                            $no = 1;
                        ?>
                            <select class='form-control' aria-label='Default select example' name='id_mou' required>
                                <option value="">-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_mou = $q_mou->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value='<?php echo $d_mou['id_mou']; ?>'>
                                        <?php echo $d_mou['nama_institusi']; ?>
                                    </option>
                                <?php
                                    $no++;
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
                        <input type="text" class="form-control" name="nama_praktik" placeholder="Isi Periode Praktik" required>
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
                                ?>
                                    <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                        <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                    </option>
                                <?php
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
                                ?>
                                    <option class='text-wrap' value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                        <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                    </option>
                                <?php
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
                                ?>
                                    <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                        <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                    </option>
                                <?php
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
                                ?>
                                    <option class='text-wrap' value='<?php echo $d_akreditasi['id_akreditasi']; ?>'>
                                        <?php echo $d_akreditasi['nama_akreditasi']; ?>
                                    </option>
                                <?php
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
                        <input type="number" class="form-control" name="jumlah_praktik" min="1" required>
                    </div>
                    <div class="col-lg-3">
                        Tanggal Mulai : <span style="color:red">*</span><br>
                        <input type="date" class="form-control" name="tgl_mulai_praktik" required>
                    </div>
                    <div class="col-lg-3">
                        Tanggal Akhir : <span style="color:red">*</span><br>
                        <input type="date" class="form-control" name="tgl_selesai_praktik" required>
                    </div>
                    <div class="col-lg-3">
                        Unggah Surat : <span style="color:red">*</span><br>
                        <input type="file" name="surat_praktik" accept="application/pdf">
                        <br><i style='font-size:12px;'>Data unggah harus PDF, Maksimal 1 MB</i>
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
                    <?php
                    $q_user = $conn->query("SELECT * FROM tb_user WHERE id_user=" . $_SESSION['id_user']);
                    $d_user = $q_user->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-lg-4">
                        Nama : <span style="color:red">*</span><br>
                        <input type="text" class="form-control" name="nama_mentor_praktik" value="<?php echo $d_user['nama_user']; ?>" required>
                    </div>
                    <div class="col-lg-4">
                        Email :<br>
                        <input type="text" class="form-control" name="email_mentor_praktik" value="<?php echo $d_user['email_user']; ?>">
                    </div>
                    <div class="col-lg-4">
                        Telpon : <span style="color:red">*</span><br>
                        <input type="number" class="form-control" name="telp_mentor_praktik" min="1" value="<?php echo $d_user['no_telp_user']; ?>" required>
                        <i style='font-size:12px;'>Isian hanya berupa angka</i>
                    </div>
                </div>
                <hr>
                <!-- Simpan -->
                <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" name="simpan_praktik" value="Simpan" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['simpan_praktik'])) {


    //alamat file surat masuk
    $alamat_surat_praktik = "./_file/praktikan";

    //ubah Nama File PDF
    $_FILES['surat_praktik']['name'] = "praktik_" . $_POST['id_mou'] . "_" . date('Y-m-d') . ".pdf";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_surat_praktik)) {
        mkdir($alamat_surat_praktik, 0777, $rekursif = true);
    }

    $file_surat_praktik = (object) @$_FILES['surat_praktik'];

    //mulai upload file
    if ($file_surat_praktik->size > 1000 * 1000) {
?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>File Unggah Surat</strong>Harus Kurang dari 1 MB
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        die();
    } elseif ($file_surat_praktik->type !== 'application/pdf') {
    ?>
        <script>
            alert("File asdasd harus PDF!");
        </script>
    <?php
        // die();
    } else {
        $unggah_surat_praktik = move_uploaded_file(
            $file_surat_praktik->tmp_name,
            "{$alamat_surat_praktik}/{$file_surat_praktik->name}"
        );
        //$link_surat_praktik = "{$folderUpload}/{$fileJPEG->name}";
    }

    if ($unggah_surat_praktik) {
        $link = "{$alamat_surat_praktik}/{$file_surat_praktik->name}";
        echo "Sukses Upload Foto: <a href='{$link}'>{$file_surat_praktik->name}</a>";
        echo "<br>";
    }

    print_r($_FILES);

    echo "<br><br>";

    $sql_insert = " INSERT INTO tb_praktik (
        id_mou,
        id_institusi,
        nama_praktik,  
        tgl_input_praktik,
        tgl_mulai_praktik,
        tgl_selesai_praktik, 
        surat_praktik, 
        id_spesifikasi_pdd,
        id_jenjang_pdd, 
        id_jurusan_pdd,
        id_akreditasi,
        id_user, 
        nama_mentor_praktik, 
        email_mentor_praktik,
        no_mentor_praktik,  
        status_praktik
    ) VALUE (
        '" . $_POST['id_mou'] . "',
        '" . $_POST['id_mou'] . "',
        '" . $_POST['nama_praktik'] . "',
        '" . date('Y-m-d') . "',
        '" . $_POST['tgl_mulai_praktik'] . "',
        '" . $_POST['tgl_selesai_praktik'] . "',  
        '" . $link_surat_praktik . "',        
        '" . $_POST['id_spesifikasi_pdd'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        '" . $_POST['id_jurusan_pdd'] . "',
        '" . $_POST['id_akreditasi'] . "',
        '" . $_POST['id_user'] . "',
        '" . $_POST['nama_mentor_praktik'] . "',
        '" . $_POST['email_mentor_praktik'] . "',
        '" . $_POST['telp_mentor_praktik'] . "'
        'Y'
    )";
    echo $sql_insert;
    // $conn->query($sql_insert);
    ?>
    <!-- <script type="text/javascript">
        document.location.href = "?mou";
    </script> -->
<?php
}
?>