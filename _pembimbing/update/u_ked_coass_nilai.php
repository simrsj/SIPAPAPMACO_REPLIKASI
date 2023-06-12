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
            if ($r_nilai < 0) {
                $conn->query("INSERT INTO tb_nilai_ked_coass (id_praktikan, tgl_tambah) VALUES ($idpr, date('Y-m-d')");
            }
        } catch (Exception $ex) {
            echo "<script>alert('DATA BIMBINGAN PRAKTIKAN');";
            echo "document.location.href='?error404';</script>";
        }
        ?>
        <div class="row">
            <div class="card shadow col-md-3 m-2">
                <div class="card-body p-2 ">
                    Nama Praktikan : <br>
                    <strong><?= $d_praktikan['nama_praktikan'] ?></strong> <br>
                    No. ID Praktikan : <br>
                    <strong><?= $d_praktikan['no_id_praktikan'] ?></strong> <br>
                    Nama Institusi : <br>
                    <strong> <?= $d_praktikan['nama_institusi'] ?> </strong><br>
                    Nama Praktik : <br>
                    <strong> <?= $d_praktikan['nama_praktik'] ?></strong>
                </div>
            </div>
            <div class="card shadow col-md m-2">
                <div class="card-body p-2 ">
                    Nama Praktikan : <br>
                    <strong><?= $d_praktikan['nama_praktikan'] ?></strong> <br>
                    No. ID Praktikan : <br>
                    <strong><?= $d_praktikan['no_id_praktikan'] ?></strong> <br>
                    Nama Institusi : <br>
                    <strong> <?= $d_praktikan['nama_institusi'] ?> </strong><br>
                    Nama Praktik : <br>
                    <strong> <?= $d_praktikan['nama_praktik'] ?></strong>
                </div>
            </div>
        </div>
    </div>