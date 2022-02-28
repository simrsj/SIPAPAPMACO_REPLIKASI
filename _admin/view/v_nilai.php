<?php
if (isset($_POST['ubah_nilai'])) {
    $sql_ubah_nilai = "UPDATE tb_nilai SET
        ip = '" . $_POST['ip'] . "',
        sptk = '" . $_POST['sptk'] . "',
        prepost = '" . $_POST['prepost'] . "',
        dokep = '" . $_POST['dokep'] . "',
        komter = '" . $_POST['komter'] . "',
        tak = '" . $_POST['tak'] . "',
        penyuluhan = '" . $_POST['penyuluhan'] . "',
        presentasi = '" . $_POST['presentasi'] . "',
        sikap = '" . $_POST['sikap'] . "'
        WHERE id_praktikan_detail = '" . $_POST['id_praktikan_detail'] . "'
    ";
    echo $sql_ubah_nilai . "<br>";
    // $conn->query($sql_ubah_nilai);
    echo "
        <script type='text/javascript'>
            // document.location.href = '?nil';
        </script>
    ";
} elseif (isset($_POST['ubah_nilai_dokter'])) {
    $sql_ubah_nilai_dokter = "UPDATE tb_nilai_dokter SET
        css1 = '" . $_POST['css1'] . "',
        css2 = '" . $_POST['css2'] . "',
        bst1 = '" . $_POST['bst1'] . "',
        bst2 = '" . $_POST['bst2'] . "',
        bst3 = '" . $_POST['bst3'] . "',
        bst4 = '" . $_POST['bst4'] . "',
        bst5 = '" . $_POST['bst5'] . "',
        bst6 = '" . $_POST['bst6'] . "',
        crs1 = '" . $_POST['crs1'] . "',
        crs2 = '" . $_POST['crs2'] . "',
        minicex = '" . $_POST['minicex'] . "',
        ujian_akhir = '" . $_POST['ujian_akhir'] . "',
        keterangan = '" . $_POST['keterangan'] . "'
        WHERE id_praktikan_detail = '" . $_POST['id_praktikan_detail'] . "'
    ";
    echo $sql_ubah_nilai_dokter . "<br>";
    // $conn->query($sql_ubah_nilai_dokter);
    echo "
        <script type='text/javascript'>
            // document.location.href = '?nil';
        </script>
    ";
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Nilai</h1>
            </div>
            <div class="col-lg-2">
                <!-- <a href="#" data-toggle="modal" data-target="#tambah_praktikan" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a> -->

                <!-- modal tambah data praktikan -->
                <div class="modal fade text-left" id="tambah_praktikan">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-group" method="post">
                                <div class="modal-header">
                                    <h4>TAMBAH DATA NILAI</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Daftar Praktikan : <br>
                                    <?php
                                    $sql_praktik = "SELECT * FROM tb_praktik 
                                            JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi 
                                            WHERE status_cek_praktik = 'AKTIF'";
                                    $q_praktik = $conn->query($sql_praktik);
                                    $r_praktik = $q_praktik->rowCount();
                                    if ($r_praktik > 0) {
                                    ?>
                                        <select class="form-control" name="id_praktik" required>
                                            <option value="">-- Pilih --</option>
                                            <?php
                                            while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $d_praktik['id_praktik']; ?>"><?php echo $d_praktik['nama_institusi']; ?> (<?php echo tanggal($d_praktik['tgl_input_praktik']) ?>)</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="badge badge-warning text-md">DATA TIDAK ADA<br>
                                        <?php
                                    }
                                        ?>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="tambah_praktikan" value="Tambah" class="btn btn-success btn-sm">
                                    <input type="button" value="Kembali" class="btn btn-outline-dark btn-sm" data-dismiss="modal">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- <a href="?dpk&a" class="btn btn-outline-info btn-sm">
                    <i>
                        <i class="fas fa-archive"></i>
                    </i>Arsip
                </a> -->
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktikan
                    JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
                    JOIN tb_pembimbing ON tb_praktik.id_pembimbing = tb_pembimbing.id_pembimbing 
                    WHERE tb_praktik.status_praktik = 'Y'
                    AND tb_praktik.status_cek_praktik = 'AKTIF' 
                    AND tb_praktikan.status_pemb_temp_praktikan ='PEMB. TEMP. ADA'
                    ORDER BY tb_praktik.tgl_selesai_praktik ASC";

                $q_praktik = $conn->query($sql_praktik);
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;">
                                        <br><br>
                                        <div class="col-sm-3 my-auto">
                                            <b>INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?>
                                        </div>

                                        <div class="col-sm-2 my-auto">
                                            <b>GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>

                                        <div class="col-sm-3 my-auto">
                                            <b>TANGGAL SELESAI : </b>
                                            <?php echo tanggal_minimal($d_praktik['tgl_selesai_praktik']); ?><br>
                                            <b>TANGGAL MULAI : </b>
                                            <?php echo tanggal_minimal($d_praktik['tgl_mulai_praktik']); ?>
                                        </div>

                                        <div class="col-sm-2 text-center my-auto">
                                            <b>Nama Pembimbing : </b><br>
                                            <?php echo $d_praktik['nama_pembimbing']; ?>
                                        </div>

                                        <div class="col-sm-2 text-center my-auto">
                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"> </i>
                                                Rincian
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data praktikan -->
                                <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: small;">
                                        <div>
                                            <?php
                                            if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
                                                $sql_praktikan_detail = "SELECT * FROM tb_praktikan
                                                        JOIN tb_praktikan_detail ON tb_praktikan.id_praktikan = tb_praktikan_detail.id_praktikan
                                                        JOIN tb_nilai_dokter on tb_nilai_dokter.id_praktikan_detail = tb_praktikan_detail.id_praktikan_detail
                                                        WHERE tb_praktikan_detail.id_praktikan = '" . $d_praktik['id_praktikan'] . "'
                                                        ORDER BY nama_praktikan_detail ASC";
                                                // echo $sql_praktikan_detail . "<br>";
                                                $q_praktikan_detail = $conn->query($sql_praktikan_detail);
                                                $r_praktikan_detail = $q_praktikan_detail->rowCount();
                                                if ($r_praktikan_detail > 0) {
                                            ?>
                                                    <table class="table table-striped" id="myTable">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <th scope="col">NO ID</th>
                                                                <th scope="col">Nama Praktikan</th>
                                                                <th scope="col">CSS1</th>
                                                                <th scope="col">CSS2</th>
                                                                <th scope="col">BST1</th>
                                                                <th scope="col">BST2</th>
                                                                <th scope="col">BST3</th>
                                                                <th scope="col">BST4</th>
                                                                <th scope="col">BST5</th>
                                                                <th scope="col">BST6</th>
                                                                <th scope="col">CRS1</th>
                                                                <th scope="col">CRS2</th>
                                                                <th scope="col">MINICEX</th>
                                                                <th scope="col">UJIAN AKHIR</th>
                                                                <th scope="col">KETERANGAN</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $no = 1;
                                                            while ($d_praktikan_detail = $q_praktikan_detail->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $no; ?></th>
                                                                    <td><?php echo $d_praktikan_detail['no_id_praktikan_detail']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['nama_praktikan_detail']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['css1']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['css2']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['bst1']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['bst2']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['bst3']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['bst4']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['bst5']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['bst6']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['crs1']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['crs2']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['minicex']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['ujian_akhir']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['keterangan']; ?></td>
                                                                    <td>
                                                                        <a title="Ubah Data Praktikan" class="btn btn-primary btn-sm" href='#' data-toggle='modal' data-target='#u_dp_m<?php echo $d_praktikan_detail['id_praktikan_detail']; ?>'>
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                        <!-- modal ubah data praktikan -->
                                                                        <div class="modal fade text-left" id="u_dp_m<?php echo $d_praktikan_detail['id_praktikan_detail']; ?>">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <form class="form-group" method="post">
                                                                                        <div class="modal-header">
                                                                                            <h4>MASUKAN DATA NILAI DOKTER ?</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <?php
                                                                                            $sql_data_praktikan = "SELECT * FROM tb_nilai_dokter WHERE id_praktikan_detail = '" . $d_praktikan_detail['id_praktikan_detail'] . "'";
                                                                                            $q_data_praktikan = $conn->query($sql_data_praktikan);
                                                                                            $d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC);
                                                                                            // var_dump($d_data_praktikan['ip']);
                                                                                            ?>

                                                                                            css1 : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="css1" value="<?php if (is_null($d_data_praktikan['css1'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['css1'];
                                                                                                                                                            } ?>" required><br>
                                                                                            css2 : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="css2" value="<?php if (is_null($d_data_praktikan['css2'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['css2'];
                                                                                                                                                            } ?>" required><br>
                                                                                            bst1 : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="bst1" value="<?php if (is_null($d_data_praktikan['bst1'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['bst1'];
                                                                                                                                                            } ?>" required><br>
                                                                                            bst2 : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="bst2" value="<?php if (is_null($d_data_praktikan['bst2'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['bst2'];
                                                                                                                                                            } ?>" required><br>
                                                                                            bst3 : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="bst3" value="<?php if (is_null($d_data_praktikan['bst3'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['bst3'];
                                                                                                                                                            } ?>" required><br>
                                                                                            bst4 <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="bst4" value="<?php if (is_null($d_data_praktikan['bst4'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['bst4'];
                                                                                                                                                            } ?>" required><br>
                                                                                            bst5 <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="bst5" value="<?php if (is_null($d_data_praktikan['bst5'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['bst5'];
                                                                                                                                                            } ?>" required><br>
                                                                                            bst6 <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="bst5" value="<?php if (is_null($d_data_praktikan['bst5'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['bst5'];
                                                                                                                                                            } ?>" required><br>
                                                                                            crs1 <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="crs1" value="<?php if (is_null($d_data_praktikan['crs1'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['crs1'];
                                                                                                                                                            } ?>" required><br>
                                                                                            crs2 <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="crs2" value="<?php if (is_null($d_data_praktikan['crs2'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['crs2'];
                                                                                                                                                            } ?>" required><br>
                                                                                            minicex <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="minicex" value="<?php if (is_null($d_data_praktikan['minicex'])) {
                                                                                                                                                                echo 0;
                                                                                                                                                            } else {
                                                                                                                                                                echo $d_data_praktikan['minicex'];
                                                                                                                                                            } ?>" required><br>
                                                                                            Ujian Akhir <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="ujian_akhir" value="<?php if (is_null($d_data_praktikan['ujian_akhir'])) {
                                                                                                                                                                    echo 0;
                                                                                                                                                                } else {
                                                                                                                                                                    echo $d_data_praktikan['ujian_akhir'];
                                                                                                                                                                } ?>" required><br>
                                                                                            keterangan <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="keterangan" value="<?php if (is_null($d_data_praktikan['keterangan'])) {
                                                                                                                                                                    echo 0;
                                                                                                                                                                } else {
                                                                                                                                                                    echo $d_data_praktikan['keterangan'];
                                                                                                                                                                } ?>" required><br>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <input name="id_praktikan_detail" value="<?php echo $d_data_praktikan['id_praktikan_detail']; ?>" hidden>
                                                                                            <button class="btn btn-primary btn-sm" type="submit" name="ubah_data_praktikan">UBAH</button>
                                                                                            <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="jumbotron">
                                                        <div class="jumbotron-fluid">
                                                            <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                                <h5 class="text-center">DATA PRAKTIKAN BELUM DIINPUTKAN</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                            } else {

                                                $sql_praktikan_detail = "SELECT * FROM tb_praktikan
                                                        JOIN tb_praktikan_detail ON tb_praktikan.id_praktikan = tb_praktikan_detail.id_praktikan
                                                        JOIN tb_nilai on tb_nilai.id_praktikan_detail = tb_praktikan_detail.id_praktikan_detail
                                                        WHERE tb_praktikan_detail.id_praktikan = " . $d_praktik['id_praktikan'] . "
                                                        ORDER BY nama_praktikan_detail ASC";
                                                // echo $sql_praktikan_detail . "<br>";
                                                $q_praktikan_detail = $conn->query($sql_praktikan_detail);
                                                $r_praktikan_detail = $q_praktikan_detail->rowCount();
                                                if ($r_praktikan_detail > 0) {
                                                ?>
                                                    <table class="table table-striped" id="myTable">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th scope="col">No</th>
                                                                <th scope="col">NO ID</th>
                                                                <th scope="col">Nama Praktikan</th>
                                                                <th scope="col">IP</th>
                                                                <th scope="col">SPTK</th>
                                                                <th scope="col">PREPOST</th>
                                                                <th scope="col">DOKEP</th>
                                                                <th scope="col">KOMTER</th>
                                                                <th scope="col">TAK</th>
                                                                <th scope="col">PENYULUHAN</th>
                                                                <th scope="col">PRESENTASI</th>
                                                                <th scope="col">SIKAP</th>

                                                                <th scope="col"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php

                                                            $no = 1;
                                                            while ($d_praktikan_detail = $q_praktikan_detail->fetch(PDO::FETCH_ASSOC)) {
                                                            ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo $no; ?></th>
                                                                    <td><?php echo $d_praktikan_detail['no_id_praktikan_detail']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['nama_praktikan_detail']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['ip']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['sptk']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['prepost']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['dokep']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['komter']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['tak']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['penyuluhan']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['presentasi']; ?></td>
                                                                    <td><?php echo $d_praktikan_detail['sikap']; ?></td>
                                                                    <td>
                                                                        <a title="Ubah Data Praktikan" class="btn btn-primary btn-sm" href='#' data-toggle='modal' data-target='#u_dp_m<?php echo $d_praktikan_detail['id_praktikan_detail']; ?>'>
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                        <!-- modal ubah data praktikan -->
                                                                        <div class="modal fade text-left" id="u_dp_m<?php echo $d_praktikan_detail['id_praktikan_detail']; ?>">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <form class="form-group" method="post">
                                                                                        <div class="modal-header">
                                                                                            <h4>MASUKAN DATA NILAI ?</h4>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <?php
                                                                                            $sql_data_praktikan = "SELECT * FROM tb_nilai 
                                                                                            WHERE id_praktikan_detail = '" . $d_praktikan_detail['id_praktikan_detail'] . "'";
                                                                                            $q_data_praktikan = $conn->query($sql_data_praktikan);
                                                                                            $d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC);
                                                                                            // var_dump($d_data_praktikan['ip']);
                                                                                            ?>

                                                                                            IP : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="ip" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['ip'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['ip'];
                                                                                            } ?>" required><br>
                                                                                            SPTK : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="sptk" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['sptk'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['sptk'];
                                                                                            } ?>" required><br>
                                                                                            Prepost : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="prepost" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['prepost'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['prepost'];
                                                                                            } ?>" required><br>
                                                                                            Dokep : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="dokep" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['dokep'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['dokep'];
                                                                                            } ?>" required><br>
                                                                                            Komter : <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="komter" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['komter'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['komter'];
                                                                                            } ?>" required><br>
                                                                                            Tak <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="tak" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['tak'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['tak'];
                                                                                            } ?>" required><br>
                                                                                            Penyuluhan <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="penyuluhan" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['penyuluhan'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['penyuluhan'];
                                                                                            } ?>" required><br>
                                                                                            Presentasi <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="presentasi" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['presentasi'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['presentasi'];
                                                                                            } ?>" required><br>
                                                                                            Sikap <span style="color:red">*</span><br>
                                                                                            <input class="form-control" type="number" name="sikap" value="
                                                                                            <?php
                                                                                            if (is_null($d_data_praktikan['sikap'])) {
                                                                                                echo 0;
                                                                                            } else {
                                                                                                echo $d_data_praktikan['sikap'];
                                                                                            } ?>" required><br>

                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <input name="id_praktikan_detail" value="
                                                                                            <?php
                                                                                            echo $d_data_praktikan['id_praktikan_detail'];
                                                                                            ?>
                                                                                            " hidden>

                                                                                            <button class="btn btn-primary btn-sm" t ype="submit" name="ubah_data_praktikan">
                                                                                                UBAH
                                                                                            </button>

                                                                                            <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- <a title="Hapus Data Praktikan" class="btn btn-danger btn-sm" data-toggle='modal' data-target='#h_dp_m<?php echo $d_data_praktikan['id_praktikan_detail']; ?>'>
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </a> -->
                                                                        <!-- modal hapus harga -->
                                                                        <div class="modal fade text-left" id="h_dp_m<?php echo $d_data_praktikan['id_praktikan_detail']; ?>">
                                                                            <div class="modal-dialog" role="document">
                                                                                <form method="post" action="">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h4>HAPUS DATA PRAKTIKAN ?</h4>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <input name="id_praktikan_detail" value="<?php echo $d_data_praktikan['id_praktikan_detail']; ?>" hidden>
                                                                                            <input name="id_praktikan" value="<?php echo $d_data_praktikan['id_praktikan']; ?>" hidden>
                                                                                            <button class="btn btn-danger btn-sm" type="submit" name="hapus_data_praktikan">HAPUS</button>
                                                                                            <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="jumbotron">
                                                        <div class="jumbotron-fluid">
                                                            <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                                <h5 class="text-center">DATA PRAKTIKAN BELUM DIINPUTKAN</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Pembimbing dan Tempat/Unit Diinputkan</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
