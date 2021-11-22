<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Ubah Data Praktikan</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_mou = "SELECT * FROM tb_mou where id_mou=" . $_GET['u'];
            $q_mou = $conn->query($sql_mou);
            $r_mou = $q_mou->rowCount();
            $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);
            ?>
            <form action="" method="POST" class="form-group">
                <label>Nama Institusi</label><br>
                <input class="form-control" type="text" value="<?php echo $d_mou['institute_mou']; ?>" name="nama_institusi"><br>
                <label>Tanggal Mulai MoU</label><br>
                <input class="form-control" type="date" value="<?php echo $d_mou['start_date_mou']; ?>" name="tgl_mulai_mou"><br>
                <label>Tanggal Akhir MoU</label><br>
                <input class="form-control" type="date" value="<?php echo $d_mou['end_date_mou']; ?>" name="tgl_akhir_mou"><br>
                <label>No. MoU RSJ</label><br>
                <input class="form-control" type="text" value="<?php echo $d_mou['no_rsj_mou']; ?>" name="no_rsj_mou"><br>
                <label>No. MoU Institusi</label><br>
                <input class="form-control" type="text" value="<?php echo $d_mou['no_institute_mou']; ?>" name="no_institut_mou"><br>
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
                <textarea name="ket_mou" class="form-control"><?php echo $d_mou['ket_mou']; ?></textarea>
                <br>
                <input class="btn btn-success" type="submit" name="UBAH" value="UBAH">
                <?php
                // echo "$sql_insert";
                ?>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['UBAH'])) {

    $sql_update = " UPDATE tb_mou SET 
    institute_mou = '" . $_POST['nama_institusi'] . "',
    start_date_mou = '" . $_POST['tgl_mulai_mou'] . "',
    end_date_mou = '" . $_POST['tgl_akhir_mou'] . "',
    no_rsj_mou = '" . $_POST['no_rsj_mou'] . "',
    no_institute_mou = '" . $_POST['no_institut_mou'] . "',
    jurusan_mou = '" . $_POST['jurusan_mou'] . "',
    spek_pendidikan_mou = '" . $_POST['spek_pendidikan_mou'] . "',
    jenjang_pendidikan_mou = '" . $_POST['jenjang_pendidikan_mou'] . "',
    akreditasi_mou = '" . $_POST['akreditasi_mou'] . "',
    ket_mou = '" . $_POST['ket_mou'] . "'
    WHERE id_mou = 4";
    $conn->query($sql_update);
?>
    <script type="text/javascript">
        document.location.href = "?mou";
    </script>
<?php
}
?>