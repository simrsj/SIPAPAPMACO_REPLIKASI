<?php
if (isset($_POST['ajukan_mou'])) {

    //mencari data id_mou yg belum ada
    $no = 1;
    $sql = "SELECT id_mou FROM tb_mou ORDER BY id_mou ASC";
    $q = $conn->query($sql);
    while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
        if ($no != $d['id_mou']) {
            $no = $d['id_mou'] + 1;
            break;
        }
        $no++;
    }

    if ($_FILES['file_surat_pb_mou']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['file_surat_pb_mou']['name'] = "pb_mou_" . $no . "_" . date('Y-m-d') . ".pdf";

        //alamat file surat masuk
        $alamat_unggah = "./_file/mou/pengajuan_baru";

        //pembuatan alamat bila tidak ada
        if (!is_dir($alamat_unggah)) {
            mkdir($alamat_unggah, 0777, $rekursif = true);
        }

        //unggah surat dan data praktik
        if (!is_null($_FILES['file_surat_pb_mou'])) {
            $file_file_mou = (object) @$_FILES['file_surat_pb_mou'];

            //mulai unggah file surat praktik
            if ($file_file_mou->size > 1000 * 10000) {
                echo "
                <script>
                    alert('File Surat Harus dibawah 10 Mb');
                </script>
                ";
            } elseif ($file_file_mou->type !== 'application/pdf') {
                echo "
                <script>
                    alert('File Surat Harus .pdf');
                </script>
                    ";
            } else {
                $unggah_file_mou = move_uploaded_file(
                    $file_file_mou->tmp_name,
                    "{$alamat_unggah}/{$file_file_mou->name}"
                );
                $link_file_surat_pb_mou = "{$alamat_unggah}/{$file_file_mou->name}";
            }
        }
    }

    $sql_insert_mou = " INSERT INTO tb_mou (
            id_mou, 
            id_institusi,
            id_jurusan_pdd,
            id_spesifikasi_pdd,
            id_jenjang_pdd,
            id_akreditasi,
            file_surat_pb_mou,
            ket_mou
        ) VALUE (
            '" . $no . "',
            '" . $_SESSION['id_institusi'] . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_spesifikasi_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $_POST['id_akreditasi'] . "',
            '" . $link_file_surat_pb_mou . "',
            'proses pengajuan baru'
        )";


    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    // echo $sql_insert_mou;
    $conn->query($sql_insert_mou);
?>
    <script type="text/javascript">
        document.location.href = "?mou";
    </script>
<?php
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="h3 mb-2 text-gray-800">Pengajuan Baru MoU</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="post" class="form-group" enctype="multipart/form-data">

                    <!-- Nama Institusi, MoU RSJ dan Institusi -->
                    <div class="row">
                        <div class="col-lg-6">
                            Nama Institusi : <br>
                            <?php
                            $sql_institusi = "SELECT * FROM tb_institusi WHERE id_institusi = '" . $_SESSION['id_institusi'] . "'";
                            $q_institusi = $conn->query($sql_institusi);
                            $d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC);
                            echo "<b>" . $d_institusi['nama_institusi'];
                            if ($d_institusi['akronim_institusi'] != null) {
                                echo " (" . $d_institusi['akronim_institusi'] . ") </b>";
                            }
                            ?>
                        </div>
                        <div class="col-lg-6">
                            Surat Pengajuan Baru MoU : <br>
                            <input type="file" accept="application/pdf" name="file_surat_pb_mou">
                        </div>
                    </div>
                    <hr>

                    <!-- Jurusan, Spesifikasi, Jenjang, dan Akreditasi -->
                    <div class="row">
                        <div class="col-lg-3">
                            Jurusan Pendidikan : <span style="color:red">*</span><br>
                            <select class="form-control js-example-placeholder-single" name="id_jurusan_pdd" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $x_jurusan = $conn->query("SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC");
                                while ($d_jurusan = $x_jurusan->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $d_jurusan['id_jurusan_pdd']; ?> "><?php echo $d_jurusan['nama_jurusan_pdd']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            Spesifikasi Pendidikan : <span style="color:red">*</span><br>
                            <select class="form-control js-example-placeholder-single" name="id_spesifikasi_pdd" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $x_spek = $conn->query("SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC");
                                while ($d_spek = $x_spek->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $d_spek['id_spesifikasi_pdd']; ?> "><?php echo $d_spek['nama_spesifikasi_pdd']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="font-italic text-xs">Pilih <b>-- Lainnya --</b> bila tidak diisi</span>
                        </div>
                        <div class="col-lg-3">
                            Jenjang Pendidikan : <span style="color:red">*</span><br>
                            <select class="form-control js-example-placeholder-single" name="id_jenjang_pdd" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $x_jenjang = $conn->query("SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC");
                                while ($d_jenjang = $x_jenjang->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $d_jenjang['id_jenjang_pdd']; ?> "><?php echo $d_jenjang['nama_jenjang_pdd']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="font-italic text-xs">Pilih <b>-- Lainnya --</b> bila tidak diisi</span>
                        </div>
                        <div class="col-lg-3">
                            Akreditasi : <span style="color:red">*</span><br>
                            <select class="form-control js-example-placeholder-single" name="id_akreditasi" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $x_akreditasi = $conn->query("SELECT * FROM tb_akreditasi");
                                while ($d_akreditasi = $x_akreditasi->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $d_akreditasi['id_akreditasi']; ?> "><?php echo $d_akreditasi['nama_akreditasi']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <span class="font-italic text-xs">Pilih <b>-- Lainnya --</b> bila tidak diisi</span>
                        </div>
                    </div>
                    <hr>

                    <!-- Tanggal Mulai, Tanggal Akhir, Keterangan dan File -->
                    <div class="row">
                        <div class="col-lg-12 text-right my-auto">
                            <input class="btn btn-primary btn-sm" type="submit" name="ajukan_mou" value="AJUKAN">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>