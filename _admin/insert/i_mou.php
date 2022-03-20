<?php
if (isset($_POST['simpan_mou'])) {

    //mencari data id_mou yg belum ada
    $no = 1;
    $sql = "SELECT id_mou FROM tb_mou ORDER BY id_mou DESC";
    $q = $conn->query($sql);
    $d = $q->fetch(PDO::FETCH_ASSOC);
    $no = $d['id_mou'] + 1;

    if ($_FILES['file_mou']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['file_mou']['name'] = "mou_" . $no . "_" . date('Y-m-d') . ".pdf";

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
                $link_file_mou = "{$alamat_unggah}/{$file_file_mou->name}";
            }
        }
    }

    $tgl_selesai = date('Y-m-d', strtotime($_POST['tgl_mulai_mou'] . ' + 3 years'));
    $sql_insert_mou = " INSERT INTO tb_mou (
            id_mou, 
            id_institusi,
            tgl_mulai_mou, 
            tgl_selesai_mou, 
            no_rsj_mou, 
            no_institusi_mou,
            id_jurusan_pdd,
            id_profesi_pdd,
            id_jenjang_pdd,
            file_mou
        ) VALUE (
            '" . $no . "',
            '" . $_POST['id_institusi'] . "',
            '" . $_POST['tgl_mulai_mou'] . "',
            '" . $tgl_selesai . "',        
            '" . $_POST['no_rsj_mou'] . "',
            '" . $_POST['no_institusi_mou'] . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_profesi_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $link_file_mou . "'
        )";


    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

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
                <h1 class="h3 mb-2 text-gray-800">Tambah Data MoU</h1>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="" method="post" class="form-group" enctype="multipart/form-data">

                    <!-- Nama Institusi, MoU RSJ dan Institusi -->
                    <div class="row">
                        <div class="col-sm-3">
                            Nama Institusi<span style="color:red">*</span><br>
                            <select class="form-control js-example-placeholder-single" name="id_institusi" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $sql_institusi = "SELECT * FROM tb_institusi ORDER BY nama_institusi ASC";
                                $q_institusi = $conn->query($sql_institusi);

                                while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $d_institusi['id_institusi']; ?>">
                                        <?php echo $d_institusi['nama_institusi']; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            No. MoU RSJ<span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_rsj_mou" required>
                        </div>
                        <div class="col-sm-3">
                            No. MoU Institusi <span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_institusi_mou" required>
                        </div>
                        <div class="col-sm-3">
                            Tanggal Mulai MoU<span style=" color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_mulai_mou" required>
                        </div>
                    </div>
                    <hr>

                    <!-- Jurusan, profesi, Jenjang, dan Akreditasi -->
                    <div class="row">
                        <div class="col-sm-3">
                            Jurusan Pendidikan <span style="color:red">*</span><br>
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
                        <div class="col-sm-3">
                            Profesi Pendidikan <span style="color:red">*</span><br>
                            <select class="form-control js-example-placeholder-single" name="id_profesi_pdd" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $x_spek = $conn->query("SELECT * FROM tb_profesi_pdd order by nama_profesi_pdd ASC");
                                while ($d_spek = $x_spek->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option value="<?php echo $d_spek['id_profesi_pdd']; ?> "><?php echo $d_spek['nama_profesi_pdd']; ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-sm-3">
                            Jenjang Pendidikan <span style="color:red">*</span><br>
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
                        </div>
                        <div class="col-sm-3">
                            File MoU <br>
                            <input type="file" accept="application/pdf" name="file_mou">
                        </div>
                    </div>
                    <hr>

                    <!-- Tanggal Mulai, Tanggal Akhir, Keterangan dan File -->
                    <div class="row">
                        <div class="col-lg-12 text-right my-auto">
                            <input class="btn btn-success btn-sm" type="submit" name="simpan_mou" value="SIMPAN">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
}
?>