<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Tambah Data MoU</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="POST" class="form-group">
                <label>Nama Institusi</label><br>
                <input class="form-control" type="text" name="nama_institusi"><br>
                <label>Tanggal Mulai MoU</label><br>
                <input class="form-control" type="date" name="tgl_mulai_mou"><br>
                <label>Tanggal Akhir MoU</label><br>
                <input class="form-control" type="date" name="tgl_akhir_mou"><br>
                <label>No. MoU RSJ</label><br>
                <input class="form-control" type="text" name="no_rsj_mou"><br>
                <label>No. MoU Institusi</label><br>
                <input class="form-control" type="text" name="no_institut_mou"><br>
                <label>Jurusan Pendidikan</label><br>
                <select class="form-control" name="jurusan_mou">
                    <?php
                    $x_jurusan = $conn->query("SELECT * FROM tb_major order by name_major ASC");
                    while ($d_jurusan = $x_jurusan->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $d_jurusan['name_major']; ?> "><?php echo $d_jurusan['name_major']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label>Spesifikasi Pendidikan</label><br>
                <select class="form-control" name="spek_pendidikan_mou">
                    <?php
                    $x_spek = $conn->query("SELECT * FROM tb_specialist order by name_specialist ASC");
                    while ($d_spek = $x_spek->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $d_spek['name_specialist']; ?> "><?php echo $d_spek['name_specialist']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label>Jenjang Pendidikan</label><br>
                <select class="form-control" name="jenjang_pendidikan_mou">
                    <?php
                    $x_jenjang = $conn->query("SELECT * FROM tb_level order by name_level ASC");
                    while ($d_jenjang = $x_jenjang->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $d_jenjang['name_level']; ?> "><?php echo $d_jenjang['name_level']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label>Akreditasi</label><br>
                <select class="form-control" name="akreditasi_mou">
                    <?php
                    $x_akreditasi = $conn->query("SELECT * FROM tb_accreditation");
                    while ($d_akreditasi = $x_akreditasi->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $d_akreditasi['name_accreditation']; ?> "><?php echo $d_akreditasi['name_accreditation']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label>Keterangan</label><br>
                <textarea name="ket_mou" class="form-control"></textarea>
                <br>
                <input class="btn btn-success" type="submit" name="SIMPAN" value="SIMPAN">
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['SIMPAN'])) {

    $sql_insert = " INSERT INTO tb_mou (
        institute_mou,
        start_date_mou, 
        end_date_mou, 
        no_rsj_mou, 
        no_institute_mou,
        jurusan_mou,
        spek_pendidikan_mou,
        jenjang_pendidikan_mou,
        akreditasi_mou,
        ket_mou
    ) VALUE (
        '" . $_POST['nama_institusi'] . "',
        '" . $_POST['tgl_mulai_mou'] . "',
        '" . $_POST['tgl_akhir_mou'] . "',        
        '" . $_POST['no_rsj_mou'] . "',
        '" . $_POST['no_institut_mou'] . "',
        '" . $_POST['jurusan_mou'] . "',
        '" . $_POST['spek_pendidikan_mou'] . "',
        '" . $_POST['jenjang_pendidikan_mou'] . "',
        '" . $_POST['akreditasi_mou'] . "',
        '" . $_POST['ket_mou'] . "'
    )";
    $conn->query($sql_insert);
?>
    <script type="text/javascript">
        document.location.href = "?mou";
    </script>
<?php
}
?>