<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" class="form-group" method="POST">
                <!-- Mou -->
                <div class="row">
                    <div class="col-lg-12">
                        <label>Institusi : <span style="color:red">*</span></label><br>
                        <?php
                        $sql_mou = "SELECT * FROM tb_mou 
                            JOIN tb_institusi ON tb_mou.id_institusi = tb_institusi.id_institusi  
                            WHERE tb_mou.tgl_selesai_mou >= CURDATE() ORDER BY tb_institusi.nama_institusi ASC";

                        $q_mou = $conn->query($sql_mou);
                        $r_mou = $q_mou->rowCount();

                        if ($r_mou > 0) {
                            $no = 1;
                        ?>
                            <select class='form-select' aria-label='Default select example' name='id_mou' required>
                                <option>-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_mou = $q_mou->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option class='text-wrap' value='<?php $d_mou['id_institusi']; ?>'>
                                        <?php echo $d_mou['nama_institusi']; ?>
                                    </option>
                                <?php
                                    $no++;
                                }
                                ?>
                            </select>
                            <br><i style='font-size:12px;'>Daftar Institusi yang MoU-nya masih berlaku</i>
                        <?php
                        } else {
                        ?>
                            <b><i>Data MoU Tidak Ada</i></b>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <hr>
                <!-- Jurusan dan Jenjang -->
                <div class="row">
                    <div class="col-lg-6">
                        Pilih Jurusan : <span style="color:red">*</span><br>
                        <?php
                        $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                        $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                        $r_jurusan_pdd = $q_jurusan_pdd->rowCount();
                        $d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC);

                        if ($r_jurusan_pdd > 0) {
                            $q_jurusan_pdd_a = $conn->query($sql_jurusan_pdd);
                            $no = 1;
                        ?>
                            <select class='form-select' aria-label='Default select example' required name='jurusan_pdd'>
                                <option>-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_jurusan_pdd = $q_jurusan_pdd_a->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option class='text-wrap' value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                        <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                    </option>
                                <?php
                                    $no++;
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
                    <div class="col-lg-6">
                        Pilih Jenjang : <span style="color:red">*</span><br>
                        <?php
                        $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";

                        $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                        $r_jenjang_pdd = $q_jenjang_pdd->rowCount();
                        $d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC);

                        if ($r_jenjang_pdd > 0) {
                            $q_jenjang_pdd_a = $conn->query($sql_jenjang_pdd);
                            $no = 1;
                        ?>
                            <select class='form-select' aria-label='Default select example' required name='jenjang_pdd'>
                                <option>-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_jenjang_pdd = $q_jenjang_pdd_a->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option class='text-wrap' value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                        <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                    </option>
                                <?php
                                    $no++;
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
                </div>
                <br>
                <!-- Spesifikasi dan Akreditasi -->
                <div class="row">
                    <div class="col-lg-6">
                        Pilih Spesifikasi : <span style="color:red">*</span><br>
                        <?php
                        $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";

                        $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                        $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();
                        $d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC);

                        if ($r_spesifikasi_pdd > 0) {

                            $q_spesifikasi_pdd_a = $conn->query($sql_spesifikasi_pdd);
                            $no = 1;
                        ?>
                            <select class='form-select' aria-label='Default select example' required name='spesifikasi_pdd'>
                                <option>-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_spesifikasi_pdd = $q_spesifikasi_pdd_a->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option class='text-wrap' value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                        <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                    </option>
                                <?php
                                    $no++;
                                }
                                ?>
                            </select>
                        <?php
                        } else {
                        ?>
                            <b><i>Data Spesifikasi Tidak Ada</i></b>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-lg-6">
                        Akreditasi : <span style="color:red">*</span><br>
                        <?php
                        $sql_akreditasi = "SELECT * FROM tb_akreditasi";

                        $q_akreditasi = $conn->query($sql_akreditasi);
                        $r_akreditasi = $q_akreditasi->rowCount();
                        $d_akreditasi = $q_akreditasi->fetch(PDO::FETCH_ASSOC);

                        if ($r_akreditasi > 0) {

                            $q_akreditasi_a = $conn->query($sql_akreditasi);
                            $no = 1;
                        ?>
                            <select name='akreditasi' class='form-select' aria-label='Default select example' required>
                                <option>-- <i>Pilih</i>--</option>
                                <?php
                                while ($d_akreditasi = $q_akreditasi_a->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option class='text-wrap' value='<?php $d_akreditasi['id_akreditasi']; ?>'>
                                        <?php echo $d_akreditasi['nama_akreditasi']; ?>
                                    </option>
                                <?php
                                    $no++;
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
                        <input type="text" name="mentor_praktik" size="35" value="<?php echo $d_user['nama_user']; ?>" required>
                    </div>
                    <div class="col-lg-4">
                        Email : <span style="color:red">*</span><br>
                        <input type="email" name="email_praktik" size="35" value="<?php echo $d_user['email_user']; ?>" required>
                    </div>
                    <div class="col-lg-4">
                        Telpon : <span style="color:red">*</span><br>
                        <input type="number" name="telp_praktik" value="<?php echo $d_user['no_telp_user']; ?>" required>
                        <br><i style='font-size:12px;'>Isian hanya berupa angka</i>
                    </div>
                </div>
                <hr>
                <!-- Data Praktikan -->
                <div class="row">
                    <div class="col-lg-12">
                        <b>Data Praktikan</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        Jumlah Praktikan : <span style="color:red">*</span><br>
                        <input type="number" name="jumlah_praktik" required>
                    </div>
                    <div class="col-lg-3">
                        Tanggal Mulai : <span style="color:red">*</span><br>
                        <input type="date" name="tgl_mulai_praktik" required>
                    </div>
                    <div class="col-lg-3">
                        Tanggal Akhir : <span style="color:red">*</span><br>
                        <input type="date" name="tgl_selesai_praktik" required>
                    </div>
                    <div class="col-lg-3">
                        Unggah Surat : <span style="color:red">*</span><br>
                        <input type="file" name="file_praktik" accept="application/pdf" required />
                        <br><i style='font-size:12px;'>Data unggah harus PDF</i>
                    </div>
                </div>
                <hr>
                <!-- Simpan -->
                <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['Simpan'])) {
    $id_mou = $_POST['id_mou'];
    $id_mou = $_POST['id_mou'];
    $jurusan_pdd = $_POST['jurusan_pdd'];
    $jenjang_pdd = $_POST['jenjang_pdd'];
    $spesifikasi_pdd = $_POST['spesifikasi_pdd'];
    $akreditasi = $_POST['akreditasi'];
    $mentor_praktik = $_POST['mentor_praktik'];
    $email_praktik = $_POST['email_praktik'];
    $telp_praktik = $_POST['telp_praktik'];
    $jumlah_praktik = $_POST['jumlah praktik'];
    $tgl_mulai_praktik = $_POST['tgl_mulai_praktik'];
    $tgl_selesai_praktik = $_POST['tgl_selesai_praktik'];

    $sql_insert = " INSERT INTO tb_praktik (
        id_mou,
        id_institusi, 
        tgl_akhir_mou, 
        no_rsj_mou, 
        no_institusi_mou,
        jurusan_mou,
        spek_pdd_mou,
        jenjang_pdd_mou,
        akreditasi_mou,
        ket_mou
    ) VALUE (
        '" . $_POST['nama_institusi'] . "',
        '" . $_POST['tgl_mulai_mou'] . "',
        '" . $_POST['tgl_akhir_mou'] . "',        
        '" . $_POST['no_rsj_mou'] . "',
        '" . $_POST['no_institut_mou'] . "',
        '" . $_POST['jurusan_mou'] . "',
        '" . $_POST['spek_pdd_mou'] . "',
        '" . $_POST['jenjang_pdd_mou'] . "',
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