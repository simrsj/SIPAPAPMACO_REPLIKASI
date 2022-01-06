<?php
if (isset($_POST['ubah_mou'])) {

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    //file_mou diubah
    if ($_FILES['file_mou']['size'] > 0) {


        //ubah Nama File PDF
        $_FILES['file_mou']['name'] = "mou_" . $_POST['id_mou'] . "_" . date('Y-m-d') . ".pdf";

        //alamat file surat masuk
        $alamat_unggah = "./_file/mou";

        //pembuatan alamat bila tidak ada
        if (!is_dir($alamat_unggah)) {
            mkdir($alamat_unggah, 0777, $rekursif = true);
        }

        //unggah surat dan data praktik
        if (!is_null($_FILES['file_mou'])) {
            $file_file_mou = (object) @$_FILES['file_mou'];

            //mulai unggah file surat praktik
            if ($file_file_mou->size > 1000 * 1000) {
                echo "
                <script>
                    alert('File Surat Harus dibawah 1 Mb');
                    document.location.href = '?mou';
                </script>
                ";
            } elseif ($file_file_mou->type !== 'application/pdf') {
                echo "
                <script>
                    alert('File Surat Harus .pdf');
                    document.location.href = '?mou';
                </script>
                    ";
            } else {
                $unggah_file_mou = move_uploaded_file(
                    $file_file_mou->tmp_name,
                    "{$alamat_unggah}/{$file_file_mou->name}"
                );
                $link_file_mou = "{$alamat_unggah}/{$file_file_mou->name}";
                $file_mou = "file_mou = '" . $link_file_mou . "',";
            }
        }
    } else {

        //file_mou tidak diubah
        $file_mou = "";
    }

    $sql_update_mou = " UPDATE tb_mou SET 
    id_institusi = '" . $_POST['id_institusi'] . "', 
    tgl_mulai_mou = '" . $_POST['tgl_mulai_mou'] . "', 
    tgl_selesai_mou = '" . $_POST['tgl_selesai_mou'] . "', 
    no_rsj_mou = '" . $_POST['no_rsj_mou'] . "', 
    no_institusi_mou = '" . $_POST['no_institusi_mou'] . "', 
    id_jurusan_pdd = '" . $_POST['id_jurusan_pdd'] . "', 
    id_spesifikasi_pdd = '" . $_POST['id_spesifikasi_pdd'] . "',
    id_jenjang_pdd = '" . $_POST['id_jenjang_pdd'] . "', 
    id_akreditasi = '" . $_POST['id_akreditasi'] . "',
    " . $file_mou . "
    ket_mou = '" . $_POST['ket_mou'] . "'
    WHERE id_mou = " . $_POST['id_mou'];


    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    // echo $sql_update_mou;
    $conn->query($sql_update_mou);
    echo "
        <script>
            alert('Data Sudah Disimpan');
            document.location.href = '?mou';
        </script>
    ";
} else {
    $id_mou = $_GET['u'];

    $sql_mou = "SELECT * FROM tb_mou WHERE id_mou = $id_mou";

    $q_mou = $conn->query($sql_mou);
    $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800">Ubah Data MoU</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="POST" class="form-group" enctype="multipart/form-data">

                    <!-- Nama, MoU RSJ dan Institusi -->
                    <div class="row">
                        <div class="col-sm-4">
                            Nama Institusi<span style="color:red">*</span><br>
                            <select class="js-example-placeholder-single js-states form-control" name="id_institusi" required>
                                <?php
                                $sql_institusi = "SELECT * FROM tb_institusi ORDER BY nama_institusi ASC";
                                $q_institusi = $conn->query($sql_institusi);

                                while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_institusi['id_institusi'] == $d_mou['id_institusi']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $d_institusi['id_institusi']; ?>">
                                        <?php echo $d_institusi['nama_institusi']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            No. MoU RSJ<span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_rsj_mou" value="<?php echo $d_mou['no_rsj_mou'] ?>" required>
                        </div>
                        <div class="col-sm-4">
                            No. MoU Institusi <span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_institusi_mou" value="<?php echo $d_mou['no_institusi_mou'] ?>" required>
                        </div>
                    </div>
                    <hr>

                    <!-- Jurusan, Spesifikasi, Jenjang, dan Akreditasi -->
                    <div class="row">
                        <div class="col-sm-3">
                            Jurusan Pendidikan <span style="color:red">*</span><br>
                            <select class="js-example-placeholder-single js-states form-control" name="id_jurusan_pdd" required>
                                <?php
                                $q_jurusan = $conn->query("SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC");
                                while ($d_jurusan = $q_jurusan->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_jurusan['id_jurusan_pdd'] == $d_mou['id_jurusan_pdd']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option value="<?php echo $d_jurusan['id_jurusan_pdd']; ?>" <?php echo $selected; ?>>
                                        <?php echo $d_jurusan['nama_jurusan_pdd']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            Spesifikasi Pendidikan <span style="color:red">*</span><br>
                            <select class="js-example-placeholder-single js-states form-control" name="id_spesifikasi_pdd" required>
                                <?php
                                $q_spek = $conn->query("SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC");
                                while ($d_spek = $q_spek->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_spek['id_spesifikasi_pdd'] == $d_mou['id_spesifikasi_pdd']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $d_spek['id_spesifikasi_pdd']; ?> ">
                                        <?php echo $d_spek['nama_spesifikasi_pdd']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            Jenjang Pendidikan <span style="color:red">*</span><br>
                            <select class="js-example-placeholder-single js-states form-control" name="id_jenjang_pdd" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $q_jenjang = $conn->query("SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC");
                                while ($d_jenjang = $q_jenjang->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_jenjang['id_jenjang_pdd'] == $d_mou['id_jenjang_pdd']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $d_jenjang['id_jenjang_pdd']; ?> "><?php echo $d_jenjang['nama_jenjang_pdd']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            Akreditasi Institusi : <span style="color:red">*</span><br>
                            <select class="js-example-placeholder-single js-states form-control" name="id_akreditasi" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $q_akreditasi = $conn->query("SELECT * FROM tb_akreditasi");
                                while ($d_akreditasi = $q_akreditasi->fetch(PDO::FETCH_ASSOC)) {
                                    if ($d_akreditasi['id_akreditasi'] == $d_mou['id_akreditasi']) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                ?>
                                    <option <?php echo $selected; ?> value="<?php echo $d_akreditasi['id_akreditasi']; ?> ">
                                        <?php echo $d_akreditasi['nama_akreditasi']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <!-- Tanggal Mulai, Tanggal Akhir, File, dan Keterangan -->
                    <div class="row">
                        <div class="col-sm-2">
                            Tanggal Mulai MoU<span style=" color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_mulai_mou" value="<?php echo $d_mou['tgl_mulai_mou'] ?>" required>
                        </div>
                        <div class="col-sm-2">
                            Tanggal Selesai MoU<span style="color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_selesai_mou" value="<?php echo $d_mou['tgl_selesai_mou'] ?>" required>
                        </div>
                        <div class="col-sm-4">
                            Keterangan<br>
                            <textarea name="ket_mou" class="form-control"><?php echo $d_mou['ket_mou'] ?></textarea>
                        </div>
                        <div class="col-sm-4">
                            File MoU <br>
                            <i style='font-size:12px;'>File MoU Sebelumnya
                                <a href="<?php echo $d_mou['file_mou']; ?>">Download</a>
                            </i><br>
                            <input type="file" accept="application/pdf" name="file_mou"><br>
                            <span class="text-xs font-italic">File MoU harus .pdf dan ukurannya kurang dari 1 Mb</span>
                        </div>
                    </div>
                    <hr>

                    <input name="id_mou" value="<?php echo $d_mou['id_mou']; ?>" hidden>
                    <input class="btn btn-success btn-sm" type="submit" name="ubah_mou" value="UBAH">
                </form>
            </div>
        </div>
    </div>
<?php
}
?>