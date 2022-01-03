<div class="p-3">
    <div class="text-center">
        <div class="h5 text-gray-900 mb-1"><span class="badge badge-primary text-lg">DATA PRAKTIKAN</span></div>
    </div>
    <hr>
    <?php
    $sql_praktik = "SELECT * FROM tb_praktik 
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    WHERE tb_praktik.status_cek_praktik  = 'AKTIF' AND tb_praktik.status_praktik = 'Y'
                    ORDER BY tb_praktik.tgl_selesai_praktik ASC";
    $q_praktik = $conn->query($sql_praktik);
    $r_praktik = $q_praktik->rowCount();
    $round_col = ceil(12 / $r_praktik);

    // echo $cal . "-" . $r_praktik . "-" . $round_col . "<br>";
    ?>

    <?php
    $no = 1;
    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
        if ($no == 1) {
            echo "<div class='row'>";
        }
    ?>
        <div class="col-md-<?php echo $round_col; ?> text-center">
            <b>
                <?php
                if ($d_praktik['akronim_institusi'] == NULL) {
                    echo $d_praktik['nama_institusi'];
                } else {
                    echo $d_praktik['akronim_institusi'];
                }
                ?>
            </b><br>
            <?php
            if ($d_praktik['logo_institusi'] == '') {
                $link_logo_institusi = "./_img/logo_institusi/default.png";
            } else {
                $link_logo_institusi = $d_praktik['logo_institusi'];
            }
            ?>
            <img src="<?php echo $link_logo_institusi; ?>" class="img-fluid" alt="Responsive image" width="100px" height="100px"><br>
            <?php echo $d_praktik['nama_jurusan_pdd']; ?><br>
            <?php echo $d_praktik['jumlah_praktik']; ?> Orang
        </div>
    <?php
        if ($no == 1) {
            "</div>";
        }
        $no++;
    }
    ?>
    <hr />
</div>