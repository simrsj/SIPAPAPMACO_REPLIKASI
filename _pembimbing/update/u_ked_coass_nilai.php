    <div class="container-fluid">
        <?php
        $exp_arr_idpr = explode("*sm*", base64_decode(urldecode(hex2bin($_GET['u']))));
        $idpr = $exp_arr_idpr[1];
        try {
            $sql_praktikan = "SELECT * FROM tb_praktikan ";
            $sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
            $sql_praktikan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
            $sql_praktikan .= " WHERE id_praktikan = " .  $idpr;
            // echo "$sql_praktikan<br>";
            $q_praktikan = $conn->query($sql_praktikan);
            $d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            echo "<script>alert('DATA BIMBINGAN PRAKTIKAN');";
            echo "document.location.href='?error404';</script>";
        }
        try {
            $sql_nilai = "SELECT * FROM tb_nilai_ked_coass ";
            $sql_nilai .= " WHERE id_praktikan = " .  $idpr;
            // echo "$sql_nilai<br>";
            $q_nilai = $conn->query($sql_nilai);
            $r_nilai = $q_nilai->rowCount();
            if ($r_nilai < 1) {
                $sql_nilai_tambah = "INSERT INTO tb_nilai_ked_coass (id_praktikan, tgl_tambah) VALUES (" . $idpr . ", '" . date('Y-m-d') . "')";
                $conn->query($sql_nilai_tambah);
            }
        } catch (Exception $ex) {
            echo "<script>alert('DATA PRAKTIKAN');</script>";
            echo "<script>document.location.href='?error404';</script>";
        }
        ?>
        <div class="row">
            <div class="col-md-3">
                <div class="card shadow  m-2">
                    <div class="card-header b text-center">
                        Data Praktikan
                    </div>
                    <div class="card-body text-center">
                        <img height="100" height="80" src="<?= $d_praktikan['foto_praktikan'] ?>"><br>
                        Nama Praktikan : <br>
                        <strong><?= $d_praktikan['nama_praktikan'] ?></strong> <br>
                        No. ID Praktikan : <br>
                        <strong><?= $d_praktikan['no_id_praktikan'] ?></strong> <br>
                        Nama Institusi : <br>
                        <strong> <?= $d_praktikan['nama_institusi'] ?> </strong><br>
                        Nama Kelompok/Gelombang/Praktik : <br>
                        <strong> <?= $d_praktikan['nama_praktik'] ?></strong>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card shadow m-2 rounded-5">
                    <div class="card-header b ">
                        Data Nilai
                    </div>
                    <div class="card-body text-center">
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope='col'>No</th>
                                        <th>Materi</th>
                                        <th>Nilai<br>(0-100)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form id="form_nilai" name="" method="post">
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td>BST (BEDSIDE TEACHING)</td>
                                            <td> <input class="form-control" type="number" min="0" max="100" name="bst" id="bst" value="<?= $d_praktikan['bst'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td>CRS (CASE REPORT SESSION/TUTORIAL)</td>
                                            <td><input class="form-control" type="number" min=0 max=100 name="crs" id="crs" value="<?= $d_praktikan['crs'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td>CSS (CLINICAL SCIENCE SESSION/REFERAT/JOURNAL READING)</td>
                                            <td> <input class="form-control" type="number" min=0 max=100 name="css" id="css" value="<?= $d_praktikan['css'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td>MINI C-EX (MINI CLINICAL EXAMINATION)</td>
                                            <td> <input class="form-control" type="number" min=0 max=100 name="minicex" id="minicex" value="<?= $d_praktikan['minicex'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td>RPS (RESOURCE PERSON SESION)</td>
                                            <td><input class="form-control" type="number" min=0 max=100 name="rps" id="rps" value="<?= $d_praktikan['rps'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td>OSLER (OBJECTIVE STRUKTURED LONG EXAMINATION STRUKTURED)</td>
                                            <td> <input class="form-control" type="number" min=0 max=100 name="osler" id="osler" value="<?= $d_praktikan['osler'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td>DOPS (DIRECT OBSERVATION PROCEDURAL SKILLS)</td>
                                            <td> <input class="form-control" type="number" min=0 max=100 name="dops" id="dops" value="<?= $d_praktikan['dops'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <button class="btn btn-success btn-sm col simpan">SIMPAN</button>
                                            </td>
                                        </tr>
                                    </form>
                                    <script>

                                    </script>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>