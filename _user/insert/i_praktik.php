                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="" class="form-group">
                                <label>Institusi : <span style="color:red">*</span></label><br>
                                <?php
                                if ($_SESSION['level_user'] == 1) {
                                    $sql_mou = "SELECT * FROM tb_mou 
                                                where end_date_mou >= CURDATE() order by institute_mou ASC";

                                    $q_mou = $conn->query($sql_mou);
                                    $r_mou = $q_mou->rowCount();
                                    $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);

                                    if ($r_mou > 0) {
                                        $q_mou_a = $conn->query($sql_mou);
                                        $no = 1;

                                        echo "
                                            <select  class='form-select' aria-label='Default select example' name='id_mou' required>
                                            <option>-- <i>Pilih</i>--</option>
                                            ";
                                        while ($d_mou = $q_mou_a->fetch(PDO::FETCH_ASSOC)) {
                                            echo "<option class='text-wrap' value='" . $d_mou['id_mou'] . "'>" . $d_mou['institute_mou'] . "</option>";
                                            $no++;
                                        }
                                        echo "
                                            </select>
                                            <br><i style='font-size:12px;'>Daftar Institusi yang MoU-nya masih berlaku</i>
                                            ";
                                    } else {
                                        echo "
                                            <b><i>Data MoU Tidak Ada</i></b>
                                        ";
                                    }
                                } elseif ($_SESSION['level_user'] == 2) {
                                    $sql_mou = "SELECT * FROM tb_mou 
                                                where id_mou=" . $_SESSION['id_mou'] . " order by institute_mou ASC";

                                    $q_mou = $conn->query($sql_mou);
                                    $d_mou = $q_mou->fetch(PDO::FETCH_ASSOC);
                                ?>
                                    <strong><?php echo $d_mou['institute_mou']; ?></strong><br>
                                    <input type="hidden" name="id_mou" value="<?php echo $_SESSION['id_mou']; ?>">

                                <?php
                                }
                                ?>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6">
                                        Pilih Jurusan : <span style="color:red">*</span><br>
                                        <?php
                                        $sql_major = "SELECT * FROM tb_major order by name_major ASC";

                                        $q_major = $conn->query($sql_major);
                                        $r_major = $q_major->rowCount();
                                        $d_major = $q_major->fetch(PDO::FETCH_ASSOC);

                                        if ($r_major > 0) {
                                            $q_major_a = $conn->query($sql_major);
                                            $no = 1;

                                            echo "
                                                    <select  class='form-select' aria-label='Default select example'  required name='major'>
                                                    <option>-- <i>Pilih</i>--</option>
                                                    ";
                                            while ($d_major = $q_major_a->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option class='text-wrap' value='" . $d_major['name_major'] . "'>" . $d_major['name_major'] . "</option>";
                                                $no++;
                                            }
                                            echo "
                                                    </select>
                                                    ";
                                        } else {
                                            echo "
                                                    <b><i>Data Jurusan Tidak Ada</i></b>
                                                ";
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-6">
                                        Pilih Jenjang : <span style="color:red">*</span><br>
                                        <?php
                                        $sql_level = "SELECT * FROM tb_level order by name_level ASC";

                                        $q_level = $conn->query($sql_level);
                                        $r_level = $q_level->rowCount();
                                        $d_level = $q_level->fetch(PDO::FETCH_ASSOC);

                                        if ($r_level > 0) {

                                            $q_level_a = $conn->query($sql_level);
                                            $no = 1;

                                            echo "
                                                    <select  class='form-select' aria-label='Default select example' required name='level'>
                                                    <option>-- <i>Pilih</i>--</option>
                                                    ";
                                            while ($d_level = $q_level_a->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option class='text-wrap' value='" . $d_level['name_level'] . "'>" . $d_level['name_level'] . "</option>";
                                                $no++;
                                            }
                                            echo "
                                                    </select>
                                                    ";
                                        } else {
                                            echo "
                                                    <b><i>Data Jurusan Tidak Ada</i></b>
                                                ";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        Pilih Spesifikasi : <span style="color:red">*</span><br>
                                        <?php
                                        $sql_specialist = "SELECT * FROM tb_specialist order by name_specialist ASC";

                                        $q_specialist = $conn->query($sql_specialist);
                                        $r_specialist = $q_specialist->rowCount();
                                        $d_specialist = $q_specialist->fetch(PDO::FETCH_ASSOC);

                                        if ($r_specialist > 0) {

                                            $q_specialist_a = $conn->query($sql_specialist);
                                            $no = 1;

                                            echo "
                                                    <select  class='form-select' aria-label='Default select example' required name='specialist'>
                                                    <option>-- <i>Pilih</i>--</option>
                                                    ";
                                            while ($d_specialist = $q_specialist_a->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option class='text-wrap' value='" . $d_specialist['name_specialist'] . "'>" . $d_specialist['name_specialist'] . "</option>";
                                                $no++;
                                            }
                                            echo "
                                                    </select>
                                                    ";
                                        } else {
                                            echo "
                                                    <b><i>Data Spesifikasi Tidak Ada</i></b>
                                                ";
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-6">
                                        Akreditasi : <span style="color:red">*</span><br>
                                        <?php
                                        $sql_accreditation = "SELECT * FROM tb_accreditation";

                                        $q_accreditation = $conn->query($sql_accreditation);
                                        $r_accreditation = $q_accreditation->rowCount();
                                        $d_accreditation = $q_accreditation->fetch(PDO::FETCH_ASSOC);

                                        if ($r_accreditation > 0) {

                                            $q_accreditation_a = $conn->query($sql_accreditation);
                                            $no = 1;

                                            echo "
                                                    <select  class='form-select' aria-label='Default select example' required>
                                                    <option>-- <i>Pilih</i>--</option>
                                                    ";
                                            while ($d_accreditation = $q_accreditation_a->fetch(PDO::FETCH_ASSOC)) {
                                                echo "<option class='text-wrap' value='" . $d_accreditation['name_accreditation'] . "'>" . $d_accreditation['name_accreditation'] . "</option>";
                                                $no++;
                                            }
                                            echo "
                                                    </select>
                                                    ";
                                        } else {
                                            echo "
                                                    <b><i>Data Akreditasi Tidak Ada</i></b>
                                                ";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <b>Penanggung Jawab/Pembimbing/Mentor</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        Nama : <span style="color:red">*</span><br>
                                        <input type="text" name="metor_practice" size="35" required>
                                    </div>
                                    <div class="col-lg-4">
                                        Email : <span style="color:red">*</span><br>
                                        <input type="email" name="email_practice" size="35" required>
                                    </div>
                                    <div class="col-lg-4">
                                        Telpon : <span style="color:red">*</span><br>
                                        <input type="number" name="telp_practice" required>
                                        <br><i style='font-size:12px;'>Isian hanya berupa angka</i>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <b>Tanggal Praktikan</b>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        Tanggal Mulai : <span style="color:red">*</span><br>
                                        <input type="date" name="start_practice">
                                    </div>
                                    <div class="col-lg-6">
                                        Tanggal Akhir : <span style="color:red">*</span><br>
                                        <input type="date" name="end_practice">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>