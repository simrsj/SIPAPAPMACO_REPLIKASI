<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Ubah Data MoU</h1>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_mou = "SELECT * FROM tb_mou where id_mou=" . $_GET['i'];
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
                <label>Jurusan</label><br>
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
                <label>Akreditasi</label><br>
                <select class="form-control" name="akreditasi_mou">
                    <?php
                    $x_akreditasi = $conn->query("SELECT * FROM tb_accreditation");
                    while ($d_akreditasi = $x_akreditasi->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <option value="<?php echo $d_akreditasi['name_accreditatiton']; ?> "><?php echo $d_akreditasi['name_accreditation']; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <label>Keterangan</label><br>
                <textarea name="ket_mou" class="form-control"><?php echo $d_mou['ket_mou']; ?></textarea>
                <br>
                <button class="btn btn-success" type="submit" value="UBAH">UBAH</button>

            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['UBAH'])) {
    $sql_insert = "INSERT INTO tb_mou (
        id_mou, 
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
        ) VALUES (
            NULL, 
            '" . $_POST['nama_institute'] . "',
            '" . $_POST['tgl_mulai_mou'] . "',
            '" . $_POST['tgl_akhir_mou'] . "',
            '" . $_POST['no_rsj_mou'] . "',
            '" . $_POST['no_institut_mou'] . "',
            '" . $_POST['jurusan_mou'] . "',
            '" . $_POST['spek_pendidikan_mou'] . "',
            '" . $_POST['jenjang_pendidikan_mou'] . "',
            '" . $_POST['akreditasi_mou'] . "',
            '" . $_POST['ket_mou'] . "')";
    $conn->query($sql_insert);
    echo $sql_insert;
}
?>
<!-- <script type="text/javascript">
        document.location.href = "?mou";
    </script> -->