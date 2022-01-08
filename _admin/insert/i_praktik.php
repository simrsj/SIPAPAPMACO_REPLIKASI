<?php
if (isset($_POST['simpan_praktik'])) {

    //mencari data id_praktikan yg belum ada
    $q_praktik = $conn->query("SELECT id_praktik FROM tb_praktik ORDER BY id_praktik ASC");

    $no_id_praktik = 1;
    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
        // echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-1<br>";
        if ($no_id_praktik == $d_praktik['id_praktik']) {
            $no_id_praktik = $d_praktik['id_praktik'] + 1;
            // echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-2<br>";
        } elseif ($no_id_praktik == 1) {
            $no_id_praktik;
            // echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-3<br>";
        }
        // echo $no_id_praktik . "-" . $d_praktik['id_praktik'] . "-4<br>";
    }
    // echo $no_id_praktik . "-5<br>";

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    //alamat file surat masuk
    $alamat_unggah = "./_file/praktikan";

    //pembuatan alamat bila tidak ada
    if (!is_dir($alamat_unggah)) {
        mkdir($alamat_unggah, 0777, $rekursif = true);
    }

    //unggah surat dan data praktik
    if ($_FILES['surat_praktik']['size'] > 0) {

        //ubah Nama File PDF
        $_FILES['surat_praktik']['name'] = "surat_praktik_" . $no_id_praktik . "_" . date('Y-m-d') . ".pdf";

        $file_surat_praktik = (object) @$_FILES['surat_praktik'];

        //mulai unggah file surat praktik
        if ($file_surat_praktik->size > 1000 * 1000) {
            echo "
            <script>
                alert('File Surat Praktik Harus Kurang dari 1 Mb');
                document.location.href = '';
            </script>
            ";
        } elseif ($file_surat_praktik->type !== 'application/pdf') {
            echo "
            <script>
                alert('File Surat Praktik Harus .pdf');
                document.location.href = '';
            </script>
            ";
        } else {
            $unggah_surat_praktik = move_uploaded_file(
                $file_surat_praktik->tmp_name,
                "{$alamat_unggah}/{$file_surat_praktik->name}"
            );
            $link_surat_praktik = "{$alamat_unggah}/{$file_surat_praktik->name}";
        }
    } else {
        $link_surat_praktik = NULL;
    }

    if ($_FILES['data_praktik']['size'] > 0) {

        //ubah Nama File xlsx
        $_FILES['data_praktik']['name'] = "data_praktik_" . $no_id_praktik . "_" . date('Y-m-d') . ".xlsx";

        $file_data_praktik = (object) @$_FILES['data_praktik'];

        //mulai unggah file data praktik
        if ($file_data_praktik->size > 1000 * 1000) {
            echo "
            <script>
                alert('File Data Praktik Harus Kurang dari 1 Mb');
                document.location.href = '';
            </script>
            ";
        } elseif ($file_data_praktik->type !== 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
            echo "
            <script>
                alert('File Data Praktik Harus .xls .xlsx');
                document.location.href = '';
            </script>
            ";
        } else {
            $unggah_data_praktik = move_uploaded_file(
                $file_data_praktik->tmp_name,
                "{$alamat_unggah}/{$file_data_praktik->name}"
            );
            $link_data_praktik = "{$alamat_unggah}/{$file_data_praktik->name}";
        }
    } else {
        $link_data_praktik = NULL;
    }

    //mencari data id_jurusan_pdd_jenis
    $sql_jurusan_pdd_jenis = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd = " . $_POST['id_jurusan_pdd'];
    $q_jurusan_pdd_jenis = $conn->query($sql_jurusan_pdd_jenis);
    $d_jurusan_pdd_jenis = $q_jurusan_pdd_jenis->fetch(PDO::FETCH_ASSOC);

    $sql_insert = " INSERT INTO tb_praktik (
        id_praktik,
        id_institusi,
        nama_praktik,  
        tgl_input_praktik,
        tgl_mulai_praktik,
        tgl_selesai_praktik, 
        jumlah_praktik, 
        surat_praktik, 
        data_praktik, 
        id_jurusan_pdd_jenis,
        id_jurusan_pdd,
        id_jenjang_pdd, 
        id_spesifikasi_pdd,
        id_akreditasi,
        id_user, 
        nama_mentor_praktik, 
        email_mentor_praktik,
        telp_mentor_praktik,  
        status_cek_praktik,
        status_praktik
        ) VALUE (
            '" . $no_id_praktik . "',
            '" . $_POST['id_institusi'] . "',
            '" . $_POST['nama_praktik'] . "',
            '" . date('Y-m-d') . "',
            '" . $_POST['tgl_mulai_praktik'] . "',
            '" . $_POST['tgl_selesai_praktik'] . "',  
            '" . $_POST['jumlah_praktik'] . "',     
            '" . $link_surat_praktik . "',     
            '" . $link_data_praktik . "',        
            '" . $d_jurusan_pdd_jenis['id_jurusan_pdd_jenis'] . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $_POST['id_spesifikasi_pdd'] . "',
            '" . $_POST['id_akreditasi'] . "',
            '" . $_SESSION['id_user'] . "',
            '" . $_POST['nama_mentor_praktik'] . "',
            '" . $_POST['email_mentor_praktik'] . "',
            '" . $_POST['telp_mentor_praktik'] . "',
            'DAFTAR',
            'Y'
        )";
    // echo $sql_insert;
    $conn->query($sql_insert);
    echo "
    <script type='text/javascript'>
        alert('Data sudah Disimpan');
        document.location.href = '?prk';
    </script>
    ";
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800">Tambah Data Praktikan</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" class="form-group text-gray-900" method="post" enctype="multipart/form-data">
                    <!-- Data Praktikan -->
                    <div class="row">
                        <div class="col-lg-12">
                            <b>Data Praktikan</b>
                        </div>
                    </div>
                    <!-- Mou dan Nama Praktikan -->
                    <div class="row">
                        <div class="col-lg-6 ">
                            Institusi : <span style="color:red">*</span><br>
                            <?php
                            $sql_institusi = "SELECT * FROM tb_institusi
                            ORDER BY tb_institusi.nama_institusi ASC";

                            $q_institusi = $conn->query($sql_institusi);
                            $r_institusi = $q_institusi->rowCount();
                            if ($r_institusi > 0) {
                                $no = 1;
                            ?>
                                <select class='js-example-placeholder-single form-control' aria-label='Default select example' name='id_institusi' required>
                                    <option value="">-- <i>Pilih</i>--</option>
                                    <?php
                                    while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value='<?php echo $d_institusi['id_institusi']; ?>'>
                                            <?php echo $d_institusi['nama_institusi'];
                                            if ($d_institusi['akronim_institusi'] != '') {
                                                echo " (" . $d_institusi['akronim_institusi'] . ")";
                                            }
                                            ?>
                                        </option>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </select>
                                <del><i style='font-size:12px;'>Daftar Institusi yang MoU-nya masih berlaku</i></del>
                            <?php
                            } else {
                            ?>
                                <b><i>Data MoU Tidak Ada</i></b>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            Gelombang/Kelompok : <span style="color:red">*</span><br>
                            <input type="text" class="form-control" name="nama_praktik" placeholder="Isi Gelombang/Kelompok" required>
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
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_jurusan_pdd' required>
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
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_jenjang_pdd' required>
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
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_spesifikasi_pdd' required>
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
                                <i style='font-size:12px;'>Isikan <b>-- Lainnya --</b> bila tidak ada</i>
                            <?php
                            } else {
                            ?>
                                <b><i>Data Spesifikasi Tidak Ada</i></b>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-lg-3">
                            Akreditasi Institusi : <span style="color:red">*</span><br>
                            <?php
                            $sql_akreditasi = "SELECT * FROM tb_akreditasi";

                            $q_akreditasi = $conn->query($sql_akreditasi);
                            $r_akreditasi = $q_akreditasi->rowCount();

                            if ($r_akreditasi > 0) {
                            ?>
                                <select class='form-control js-example-placeholder-single' aria-label='Default select example' name='id_akreditasi' required>
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
                            <i style="font-size:12px;">Isian hanya berupa angka</i>
                        </div>
                        <div class="col-lg-3">
                            Tanggal Mulai : <span style="color:red">*</span><br>
                            <input type="date" class="form-control" name="tgl_mulai_praktik" required>
                        </div>
                        <div class="col-lg-3">
                            Tanggal Akhir : <span style="color:red">*</span><br>
                            <input type="date" class="form-control" name="tgl_selesai_praktik" required>
                        </div>
                    </div>
                    <br>
                    <!-- unggah berkas -->
                    <div class="row">
                        <div class="col-lg-6">
                            Unggah Surat : <br>
                            <input type="file" name="surat_praktik" accept="application/pdf">
                            <br><i style='font-size:12px;'>Data unggah harus .pdf dan maksimal ukuran file 1 MB</i>
                        </div>
                        <div class="col-lg-6">
                            Unggah Data Praktikan :
                            <i style='font-size:12px;'><a href="./_file/format_data_praktikan.xlsx">Download Format</a></i><br>
                            <input type="file" name="data_praktik" accept=".xlsx">
                            <br><i style='font-size:12px;'>Data unggah harus .xlsx dan maksimal ukuran file 1 MB</i>
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
                    <i class="font-weight-bold"><span style="color:red">*</span> : Wajib diisi</i>
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
}
