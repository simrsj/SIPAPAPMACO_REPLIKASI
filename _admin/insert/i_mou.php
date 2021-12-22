<?php
if (isset($_POST['simpan_mou'])) {

    //mencari data id_mou yg belum ada
    $no_id_mou = 0;
    while ($d_mou = $conn->query("SELECT id_mou FROM tb_mou ORDER BY id_mou ASC")->fetch(PDO::FETCH_ASSOC)) {
        if ($no_id_mou != $d_mou[0]) {
            $no_id_mou = $d_mou[0] + 1;
            break;
        } elseif ($no_id_mou == 0) {
            $no_id_mou;
            break;
        }
        $no_id_mou = $d_mou[0] + 1;
    }
    //ubah Nama File PDF
    $_FILES['file_mou']['name'] = "mou_" . $no_id_mou . "_" . date('Y-m-d') . ".pdf";

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
?>
            <script>
                alert('File Surat Harus dibawah 10 Mb');
            </script>
        <?php
        } elseif ($file_file_mou->type !== 'application/pdf') {
        ?>
            <script>
                alert('File Surat Harus .pdf');
            </script>
    <?php
        } else {
            $unggah_file_mou = move_uploaded_file(
                $file_file_mou->tmp_name,
                "{$alamat_unggah}/{$file_file_mou->name}"
            );
            $link_file_mou = "{$alamat_unggah}/{$file_file_mou->name}";
        }
    }

    $sql_insert_mou = " INSERT INTO tb_mou (
            id_mou, 
            id_institusi,
            tgl_mulai_mou, 
            tgl_selesai_mou, 
            no_rsj_mou, 
            no_institusi_mou,
            id_jurusan_pdd,
            id_spesifikasi_pdd,
            id_jenjang_pdd,
            id_akreditasi,
            file_mou,
            ket_mou
        ) VALUE (
            '" . $no_id_mou . "',
            '" . $_POST['id_institusi'] . "',
            '" . $_POST['tgl_mulai_mou'] . "',
            '" . $_POST['tgl_selesai_mou'] . "',        
            '" . $_POST['no_rsj_mou'] . "',
            '" . $_POST['no_institusi_mou'] . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_spesifikasi_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $_POST['id_akreditasi'] . "',
            '" . $link_file_mou . "',
            '" . $_POST['ket_mou'] . "'
        )";


    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";

    // echo $sql_insert_mou;
    $conn->query($sql_insert_mou);
    ?>
    <script type="text/javascript">
        document.location.href = "?prk";
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
                        <div class="col-sm-4">
                            Nama Institusi<span style="color:red">*</span><br>
                            <select class="form-control" name="id_institusi" required>
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
                        <div class="col-sm-4">
                            No. MoU RSJ<span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_rsj_mou" required>
                        </div>
                        <div class="col-sm-4">
                            No. MoU Institusi <span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_institut_mou" required>
                        </div>
                    </div>
                    <hr>

                    <!-- Jurusan, Spesifikasi, Jenjang, dan Akreditasi -->
                    <div class="row">
                        <div class="col-sm-3">
                            Jurusan Pendidikan <span style="color:red">*</span><br>
                            <select class="form-control" name="id_jurusan_pdd" required>
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
                            Spesifikasi Pendidikan <span style="color:red">*</span><br>
                            <select class="form-control" name="id_spesifikasi_pdd" required>
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

                        </div>
                        <div class="col-sm-3">
                            Jenjang Pendidikan <span style="color:red">*</span><br>
                            <select class="form-control" name="id_jenjang_pdd" required>
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
                            Akreditasi<span style="color:red">*</span><br>
                            <select class="form-control" name="id_akreditasi" required>
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
                        </div>
                    </div>
                    <hr>

                    <!-- Tanggal Mulai, Tanggal Akhir, Keterangan dan File -->
                    <div class="row">
                        <div class="col-sm-2">
                            Tanggal Mulai MoU<span style=" color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_mulai_mou" required>
                        </div>
                        <div class="col-sm-2">
                            Tanggal Akhir MoU<span style="color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_selesai_mou" required>
                        </div>
                        <div class="col-sm-4">
                            Keterangan<br>
                            <textarea name="ket_mou" class="form-control"></textarea>
                        </div>
                        <div class="col-sm-4">
                            File MoU <br>
                            <input type="file" accept="application/pdf" name="file_mou">
                        </div>
                    </div>
                    <hr>
                    <input class="btn btn-success btn-sm" type="submit" name="simpan_mou" value="SIMPAN">
                </form>
            </div>
        </div>
    </div>
<?php
}
?>