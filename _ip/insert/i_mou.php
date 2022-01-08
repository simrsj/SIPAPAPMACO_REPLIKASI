<?php
if (isset($_POST['simpan_mou'])) {

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
            id_akreditasi
        ) VALUE (
            '" . $no . "',
            '" . $_POST['id_institusi'] . "',
            '" . $_POST['tgl_mulai_mou'] . "',
            '" . $_POST['tgl_selesai_mou'] . "',        
            '" . $_POST['no_rsj_mou'] . "',
            '" . $_POST['no_institusi_mou'] . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_spesifikasi_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $_POST['id_akreditasi'] . "'
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

                    <!-- Nama Institusi, MoU RSJ dan Institusi, Tanggal Mulai, Tanggal Akhir,-->
                    <div class="row">
                        <div class="col-sm-4">
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
                        <div class="col-sm-2">
                            No. MoU RSJ<span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_rsj_mou" required>
                        </div>
                        <div class="col-sm-2">
                            No. MoU Institusi <span style="color:red">*</span><br>
                            <input class="form-control" type="text" name="no_institusi_mou" required>
                        </div>

                        <div class="col-sm-2">
                            Tanggal Mulai MoU<span style=" color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_mulai_mou" required>
                        </div>
                        <div class="col-sm-2">
                            Tanggal Akhir MoU<span style="color:red">*</span><br>
                            <input class="form-control" type="date" name="tgl_selesai_mou" required>
                        </div>
                    </div>
                    <hr>

                    <!-- Jurusan, Spesifikasi, Jenjang, dan Akreditasi -->
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
                            Spesifikasi Pendidikan <span style="color:red">*</span><br>
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

                        </div>
                        <div class="col-sm-3">
                            Akreditasi Insitutsi : <span style="color:red">*</span><br>
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