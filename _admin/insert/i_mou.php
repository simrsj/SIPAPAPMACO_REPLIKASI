<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Tambah Data MoU</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="POST" class="form-group">
                <div class="row">
                    <div class="col-sm-4">
                        Nama Institusi<span style="color:red">*</span><br>
                        <input class="form-control" type="text" name="nama_institusi" required>
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
                <div class="row">
                    <div class="col-sm-2">
                        Tanggal Mulai MoU<span style=" color:red">*</span><br>
                        <input class="form-control" type="date" name="tgl_mulai_mou" required>
                    </div>
                    <div class="col-sm-2">
                        Tanggal Akhir MoU<span style="color:red">*</span><br>
                        <input class="form-control" type="date" name="tgl_akhir_mou" required>
                    </div>
                    <div class="col-sm-4">
                        File MoU <br>
                        <input type="file" accept="application/pdf" name="file_mou">
                    </div>
                    <div class="col-sm-4">
                        Keterangan<br>
                        <textarea name="ket_mou" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
                <input class="btn btn-success" type="submit" name="SIMPAN" value="SIMPAN">
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['SIMPAN'])) {

    $no_id_institusi = 0;
    while ($d_institusi = $conn->query("SELECT id_institusi FROM tb_institusi ORDER BY id_institusi ASC")->fetch(PDO::FETCH_ASSOC)) {
        if ($no_id_institusi != $d_institusi[0]) {
            $no_id_institusi = $d_institusi[0] + 1;
            break;
        } elseif ($no_id_institusi == 0) {
            $no_id_institusi;
            break;
        }
        $no_id_institusi = $d_institusi[0] + 1;
    }
    echo $no_id_institusi;
    $sql_insert_institusi = " INSERT INTO tb_institusi (id_institusi,nama_institusi) VALUE ('" . $no_id_institusi . "', '" . $_POST['nama_institusi'] . "')";
    $sql_insert_mou = " INSERT INTO tb_mou (
        id_institusi,
        tgl_mulai_mou, 
        tgl_akhir_mou, 
        no_rsj_mou, 
        no_institusi_mou,
        id_jurusan_pdd,
        id_spesifikasi_pdd,
        id_jenjang_pdd,
        id_akreditasi,
        ket_mou
    ) VALUE (
        '" . $no_id_institusi . "'
        '" . $_POST['tgl_mulai_mou'] . "',
        '" . $_POST['tgl_akhir_mou'] . "',        
        '" . $_POST['no_rsj_mou'] . "',
        '" . $_POST['no_institusi_mou'] . "',
        '" . $_POST['id_jurusan_pdd'] . "',
        '" . $_POST['id_spesifikasi_pdd'] . "',
        '" . $_POST['id_jenjang_pdd'] . "',
        '" . $_POST['id_akreditasi'] . "',
        '" . $_POST['ket_mou'] . "'
    )";
    echo $sql_insert_institusi . "<br>";
    echo $sql_insert_mou;
    //$conn->query($sql_insert_institusi);
    //$conn->query($sql_insert_mou);
?>
    <script type="text/javascript">
        // alert('Data Sudah Disimpan');    
        // document.location.href = "?mou";
    </script>
<?php
}
?>