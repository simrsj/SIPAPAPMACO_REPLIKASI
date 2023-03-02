<?php if ($_SESSION['level_user'] == 4) { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <h1 class="h3 mb-2 text-gray-800">Form Penilaian Laporan Pendahuluan (LP)</h1>
            </div>
        </div>
        <>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="row" style="font-size: small;" class="justify-content-center">

                        <?php
                        try {
                            $sql_praktik = "SELECT * FROM tb_praktik ";
                            $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                            $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                            $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                            $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                            $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                            $sql_praktik .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik ";
                            $sql_praktik .= " JOIN tb_pembimbing_pilih ON tb_pembimbing_pilih.id_praktik = tb_praktikan.id_praktik ";
                            $sql_praktik .= " JOIN tb_pembimbing ON tb_pembimbing.id_pembimbing = tb_pembimbing_pilih.id_pembimbing ";
                            $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                            $sql_praktik .= " AND tb_pembimbing.id_pembimbing = " . $d_pembimbing['id_pembimbing'];
                            $sql_praktik .= " GROUP BY tb_praktikan.id_praktik";
                            $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                            // echo "$sql_praktik<br>";
                            $q_praktik = $conn->query($sql_praktik);
                        } catch (Exception $ex) {
                            echo "<script>alert('-DATA PRAKTIK-');";
                            echo "document.location.href='?error404';</script>";
                        }
                        ?>
                        <div class="col-md-4 text-center">
                            <b class="text-gray-800">INSTITUSI : </b><br><?= $d_praktik['nama_institusi']; ?><br>
                            <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?= $d_praktik['nama_praktik']; ?>
                        </div>
                        <div class="col-md-2 text-center">
                            <b class="text-gray-800">JURUSAN : </b><br><?= $d_praktik['nama_jurusan_pdd']; ?><br>
                            <b class="text-gray-800">JENJANG : </b><br><?= $d_praktik['nama_jenjang_pdd']; ?>
                        </div>
                        <div class="col-md-2 text-center">
                            <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                            <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?= $d_praktik['jumlah_praktik']; ?>
                        </div>

                        <div class="col-md-2 text-center">
                            <b class="text-gray-800">TANGGAL MULAI : </b><br><?= tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                            <b class="text-gray-800">TANGGAL SELESAI : </b><br><?= tanggal($d_praktik['tgl_selesai_praktik']); ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
