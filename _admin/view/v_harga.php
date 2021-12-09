<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Harga</h1>
        </div>
        <div class="col-lg-2">
            <a class='btn btn-outline-success btn-sm' href='#' data-toggle='modal' data-target='#hrg_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>

            <!-- modal tambah Harga  -->
            <div class="modal fade" id="hrg_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                <h4 style="color:black;">Tambah Harga :</h4>
                            </div>
                            <div class="modal-body">
                                Nama Harga : <span style="color:red">*</span><br>
                                <input class="form-control" name="nama_harga" required><br>
                                Satuan Harga : <span style="color:red">*</span><br>
                                <input class="form-control" name="satuan_harga" required><br>
                                Jumlah Harga : <i style='font-size:12px;'>(Rp)</i><span style="color:red">*</span><br>
                                <input class="form-control" name="jumlah_harga" type="number" min="1" required>
                                <i style='font-size:12px;'>Isian hanya berupa angka</i><br><br>
                                Jenis Harga : <span style="color:red">*</span><br>
                                <?php
                                $sql_harga_jenis = "SELECT * FROM tb_harga_jenis order by nama_harga_jenis ASC";

                                $q_harga_jenis = $conn->query($sql_harga_jenis);
                                $r_harga_jenis = $q_harga_jenis->rowCount();

                                if ($r_harga_jenis > 0) {
                                ?>
                                    <select class="form-control text-center" name="id_harga_jenis" required>
                                        <option value="">-- Pilih Jenis Harga --</option>
                                        <?php
                                        while ($d_harga_jenis = $q_harga_jenis->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_harga_jenis['id_harga_jenis']; ?>'>
                                                <?php echo $d_harga_jenis['nama_harga_jenis']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jenis Harga Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <br>

                                Jurusan : <span style="color:red">*</span><br>
                                <?php
                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                                if ($r_jurusan_pdd > 0) {
                                ?>
                                    <select class="form-control text-center" name="id_jurusan_pdd" required>
                                        <option value="">-- Pilih Jurusan --</option>
                                        <?php
                                        while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                                <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                            </option>
                                        <?php
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
                                <br>

                                Jenjang : <span style="color:red">*</span><br>
                                <?php
                                $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";

                                $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                                $r_jenjang_pdd = $q_jenjang_pdd->rowCount();

                                if ($r_jenjang_pdd > 0) {
                                ?>
                                    <select class="form-control text-center" name="id_jenjang_pdd" required>
                                        <option value="">-- Pilih Jenjang --</option>
                                        <?php
                                        while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                                <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jenjang Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <br>

                                Spesifikasi : <span style="color:red">*</span><br>
                                <?php
                                $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";

                                $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                                $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();

                                if ($r_spesifikasi_pdd > 0) {
                                ?>
                                    <select class="form-control text-center" name="id_spesifikasi_pdd" required>
                                        <option value="">-- Pilih spesifikasi --</option>
                                        <?php
                                        while ($d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                                <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                            </option>
                                        <?php
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
                                <br>

                                Pilihan : <span style="color:red">*</span><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pilih_harga" value="1" required>
                                    <label class="form-check-label">
                                        Harus
                                    </label><br>
                                    <input class="form-check-input" type="radio" name="pilih_harga" value="2">
                                    <label class="form-check-label">
                                        Pilih Salah Satu
                                    </label><br>
                                    <input class="form-check-input" type="radio" name="pilih_harga" value="3">
                                    <label class="form-check-label">
                                        Opsional
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" name="tambah_harga" value="Tambah">
                                <input class="btn btn-secondary" type="button" data-dismiss="modal" value="Kembali">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary text-gray-100">

            <a href='#' data-toggle='modal' data-target='#cari_i_m' class="btn btn-danger btn-sm mr-sm-2" name="cari_harga">
                <i class="fas fa-search fa-sm"></i>
            </a>

            <!-- modal cari -->
            <div class="modal fade" id="cari_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-gray-900">
                        <form class="form-group" method="post" action="">
                            <div class="modal-header" style="padding-bottom: 0%;">
                                <h4 class="font-weight-bold">Cari Data : </h4>
                            </div>
                            <div class="modal-body" style="padding-top: 1%;">
                                Pilih Jurusan : <span style="color:red">*</span><br>
                                <?php
                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                                if ($r_jurusan_pdd > 0) {
                                ?>
                                    <select class='form-control' aria-label='Default select example' name='id_jurusan_pdd' required>
                                        <option value="">-- <i>Pilih</i>--</option>
                                        <?php
                                        while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_jurusan_pdd['id_jurusan_pdd']; ?>'>
                                                <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select><br>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jurusan Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                Pilih Jenjang : <span style="color:red">*</span><br>
                                <?php
                                $sql_jenjang_pdd = "SELECT * FROM tb_jenjang_pdd order by nama_jenjang_pdd ASC";

                                $q_jenjang_pdd = $conn->query($sql_jenjang_pdd);
                                $r_jenjang_pdd = $q_jenjang_pdd->rowCount();

                                if ($r_jenjang_pdd > 0) {
                                ?>
                                    <select class='form-control' aria-label='Default select example' name='id_jenjang_pdd' required>
                                        <option value="">-- <i>Pilih</i>--</option>
                                        <?php
                                        while ($d_jenjang_pdd = $q_jenjang_pdd->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option class='text-wrap' value='<?php echo $d_jenjang_pdd['id_jenjang_pdd']; ?>'>
                                                <?php echo $d_jenjang_pdd['nama_jenjang_pdd']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select><br>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jurusan Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                Pilih Spesifikasi : <span style="color:red">*</span><br>
                                <?php
                                $sql_spesifikasi_pdd = "SELECT * FROM tb_spesifikasi_pdd order by nama_spesifikasi_pdd ASC";

                                $q_spesifikasi_pdd = $conn->query($sql_spesifikasi_pdd);
                                $r_spesifikasi_pdd = $q_spesifikasi_pdd->rowCount();

                                if ($r_spesifikasi_pdd > 0) {
                                ?>
                                    <select class='form-control' aria-label='Default select example' name='id_spesifikasi_pdd' required>
                                        <option value="">-- <i>Pilih</i>--</option>
                                        <?php
                                        while ($d_spesifikasi_pdd = $q_spesifikasi_pdd->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d_spesifikasi_pdd['id_spesifikasi_pdd']; ?>'>
                                                <?php echo $d_spesifikasi_pdd['nama_spesifikasi_pdd']; ?>
                                            </option>
                                        <?php
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
                            <div class="modal-footer" style="padding-bottom: 0%;">
                                <input class="btn btn-primary btn-sm" type="submit" name="c" value="Cari">
                                <input class="btn btn-secondary btn-sm" type="button" data-dismiss="modal" value="Kembali">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a href="?hrg&cl" class="btn btn-danger btn-sm mr-sm-2">Lainnya</a>
            <a href="?hrg&cs" class="btn btn-danger btn-sm mr-sm-2">Semua</a>
            </form>
        </div>
        <?php
        if (isset($_GET['c']) || isset($_POST['c'])) {
            include "_admin/view/v_harga_cari.php";
        } elseif (isset($_GET['cl'])) {
            include "_admin/view/v_harga_cari_lainnya.php";
        } elseif (isset($_GET['cs'])) {
            include "_admin/view/v_harga_cari_semua.php";
        } else {
        ?>
            <div class="card-header text-center bg-gray-500 text-gray-100">
                <h5 class="font-weight-bold">Silahkan Cari File dengan Menu File diatas
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
if (isset($_POST['tambah_harga'])) {

    $sql_insert_harga =  "INSERT INTO tb_harga (
        nama_harga,
        satuan_harga,
        jumlah_harga,
        id_jurusan_pdd,
        id_jenjang_pdd,
        id_spesifikasi_pdd,
        id_harga_jenis,
        pilih_harga
        ) VALUES (
            '" . $_POST['nama_harga'] . "',
            '" . $_POST['satuan_harga'] . "',
            '" . $_POST['jumlah_harga'] . "',
            '" . $_POST['id_jurusan_pdd'] . "',
            '" . $_POST['id_jenjang_pdd'] . "',
            '" . $_POST['id_spesifikasi_pdd'] . "',
            '" . $_POST['id_harga_jenis'] . "',
            '" . $_POST['pilih_harga'] . "'
            )";

    // echo $sql_insert_harga . "<br>";
    $conn->query($sql_insert_harga);

?>
    <script>
        document.location.href = "?hrg";
    </script>
<?php
} elseif (isset($_POST['ubah_harga'])) {
    $sql_ubah = "UPDATE `tb_harga` SET 
    `nama_harga` = '" . $_POST['nama_harga'] . "',
    `satuan_harga` = '" . $_POST['satuan_harga'] . "',
    `jumlah_harga` = '" . $_POST['jumlah_harga'] . "',
    `id_harga_jenis` = '" . $_POST['id_harga_jenis'] . "',
    `id_jurusan_pdd` = '" . $_POST['id_jurusan_pdd'] . "',
    `id_jenjang_pdd` = '" . $_POST['id_jenjang_pdd'] . "',
    `id_spesifikasi_pdd` = '" . $_POST['id_spesifikasi_pdd'] . "',
    `pilih_harga` = '" . $_POST['pilih_harga'] . "'
    WHERE `tb_harga`.`id_harga` = " . $_POST['id_harga'];
    $conn->query($sql_ubah);
    // echo $sql_ubah;
    if ($_POST['cari'] == 'c') {
        $link_cari = "c";
    } elseif ($_POST['cari'] == 'cl') {
        $link_cari = "cl";
    } elseif ($_POST['cari'] == 'cs') {
        $link_cari = "cs";
    }
    $link = "?hrg&" . $link_cari;

?>
    <script>
        document.location.href = "<?php echo $link; ?>";
    </script>
<?php
} elseif (isset($_POST['hapus_harga'])) {
    $conn->query("DELETE FROM `tb_harga` WHERE `id_harga` = " . $_POST['id_harga']);
    if ($_POST['cari'] == 'c') {
        $link_cari = "c";
    } elseif ($_POST['cari'] == 'cl') {
        $link_cari = "cl";
    } elseif ($_POST['cari'] == 'cs') {
        $link_cari = "cs";
    }
    $link = "?hrg&" . $link_cari;

?>
    <script>
        document.location.href = "<?php echo $link; ?>";
    </script>
<?php
}
