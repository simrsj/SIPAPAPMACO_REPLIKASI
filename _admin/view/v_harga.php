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
                                    <select class="form-control text-center" name="id_harga_jenis" id="t_id_harga_jenis" onChange='t_s_id_harga_jenis()' required>
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
                                        <option value="0">-- Lainnya --</option>
                                        <option value="baru">-- Baru --</option>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jenis Harga Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <div id="t_i_id_harga_jenis">
                                </div><br>

                                Jurusan : <span style="color:red">*</span><br>
                                <?php
                                $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by nama_jurusan_pdd ASC";

                                $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
                                $r_jurusan_pdd = $q_jurusan_pdd->rowCount();

                                if ($r_jurusan_pdd > 0) {
                                ?>
                                    <select class="form-control text-center" name="id_jurusan_pdd" id="t_id_jurusan_pdd" onChange='t_s_id_jurusan_pdd()' required>
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
                                        <option value="0">-- Lainnya --</option>
                                        <option value="baru">-- Baru --</option>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <b><i>Data Jurusan Tidak Ada</i></b>
                                <?php
                                }
                                ?>
                                <div id="t_i_id_jurusan_pdd">
                                </div><br>

                                <!-- js modal tambah pilih jenis harga dan jurusan lainnya -->
                                <script>
                                    function t_s_id_harga_jenis() {
                                        if ($('#t_id_harga_jenis').val() == 'baru') {
                                            console.log("form select t_id_harga_jenis");
                                            $('#t_i_id_harga_jenis').append("<input type='text' class='form-control' placeHolder='isikan nama jenis harga' name='nama_harga_jenis'>").focus();
                                        } else {
                                            console.log("x form select id_harga_jenis");
                                            $('#t_i_id_harga_jenis').empty();
                                        }
                                    }

                                    function t_s_id_jurusan_pdd() {
                                        if ($('#t_id_jurusan_pdd').val() == 'baru') {
                                            console.log("form select t_id_jurusan_pdd");
                                            $('#t_i_id_jurusan_pdd').append("<input type='text' class='form-control' placeHolder='isikan nama jurusan' name='nama_jurusan_pdd'>").focus();
                                        } else {
                                            console.log("x form select t_id_jurusan_pdd");
                                            $('#t_i_id_jurusan_pdd').empty();
                                        }
                                    }
                                </script>

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
            <form class="form-inline" method="post" action="">
                <button type="submit" class="btn btn-danger btn-sm mr-sm-2" name="cari_lain_harga">Lainnya</button>
                <button type="submit" class="btn btn-danger btn-sm mr-sm-2" name="cari_all_harga">Semua</button>
                <button type="submit" class="btn btn-danger btn-sm mr-sm-2" name="cari_harga">Cari</button>
            </form>
        </div>
        <?php
        if (isset($_POST['cari_harga'])) {
            // echo $_POST['id_jurusan_pdd'] . "-" . $_POST['id_jenjang_pdd'];
            if ($_POST['id_jurusan_pdd'] > 0 && $_POST['id_jenjang_pdd'] > 0) {
                $sql_harga = "SELECT * FROM tb_harga 
                JOIN tb_jurusan_pdd ON tb_harga.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                JOIN tb_harga_jenis ON tb_harga.id_harga_jenis = tb_harga_jenis.id_harga_jenis
                WHERE tb_harga.id_jurusan_pdd =" . $_POST['id_jurusan_pdd'] . " AND tb_harga.id_jenjang_pdd = " . $_POST['id_jenjang_pdd'];
            } else {
            }

            // echo $sql_harga;
            $d_harga = $q_harga->fetch(PDO::FETCH_ASSOC);
        } elseif (isset($_POST['cari_all_harga'])) {
            include "_admin/view/v_harga_cari_semua.php";
        } elseif (isset($_POST['cari_lain_harga'])) {
            include "_admin/view/v_harga_cari_lain.php";
        } elseif (isset($_POST['cari_mess_harga'])) {
            include "_admin/view/v_harga_cari_mess.php";
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
if (isset($_POST['ubah_harga'])) {
    $sql_ubah = "UPDATE `tb_harga` SET 
    `nama_harga` = '" . $_POST['nama_harga'] . "',
    `satuan_harga` = '" . $_POST['satuan_harga'] . "',
    `jumlah_harga` = '" . $_POST['jumlah_harga'] . "',
    `id_harga_jenis` = '" . $_POST['id_harga_jenis'] . "',
    `id_jurusan_pdd` = '" . $_POST['id_jurusan_pdd'] . "',
    `pilih_harga` = '" . $_POST['pilih_harga'] . "'
    WHERE `tb_harga`.`id_harga` = " . $_POST['id_harga'];
    //$conn->query($sql_ubah);
    echo $sql_ubah;
    $link = "?hrg=" . $_POST['id_jurusan_pdd'];
?>
    <script>
        document.location.href = "<?php echo $link; ?>";
    </script>
<?php
} elseif (isset($_POST['tambah_harga'])) {

    //memasukan jenis harga baru
    if ($_POST['id_harga_jenis'] == 'baru') {

        //mencari id_harga_jenis yang belum ada
        $sql_harga_jenis = "SELECT * FROM tb_harga_jenis order by id_harga_jenis ASC";
        $q_harga_jenis = $conn->query($sql_harga_jenis);
        $no = 1;
        while ($d_harga_jenis = $q_harga_jenis->fetch(PDO::FETCH_ASSOC)) {
            if ($no != $d_harga_jenis['id_harga_jenis']) {
                $id_harga_jenis = $no;
                break;
            }
            $id_harga_jenis = $d_harga_jenis['id_harga_jenis'] + 1;
            $no++;
        }

        $sql_insert_harga_jenis =  "INSERT INTO tb_harga_jenis (id_harga_jenis, nama_harga_jenis) 
        VALUES ('" . $id_harga_jenis . "','" . $_POST['nama_harga_jenis'] . "')";
        // echo $sql_insert_harga_jenis . "<br>";
        // $conn->query($sql_insert_harga_jenis);
    } else {
        $id_harga_jenis = $_POST['id_harga_jenis'];
    }

    //memasukan jurusan baru
    if ($_POST['id_jurusan_pdd'] == 'baru') {

        //mencari id_jurusan_pdd yang belum ada
        $sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd order by id_jurusan_pdd ASC";
        $q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
        $no = 1;
        while ($d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC)) {
            if ($no != $d_jurusan_pdd['id_jurusan_pdd']) {
                $id_jurusan_pdd = $no;
                break;
            }
            $id_jurusan_pdd = $d_jurusan_pdd['id_jurusan_pdd'] + 1;
            $no++;
        }

        $sql_insert_jurusan_pdd =  "INSERT INTO tb_jurusan_pdd (id_jurusan_pdd, nama_jurusan_pdd) 
        VALUES ('" . $id_jurusan_pdd . "', '" . $_POST['nama_jurusan_pdd'] . "')";
        // echo $sql_insert_jurusan_pdd . "<br>";
        $conn->query($sql_insert_jurusan_pdd);
    } else {
        $id_jurusan_pdd = $_POST['id_jurusan_pdd'];
    }

    $sql_insert_harga =  "INSERT INTO tb_harga (
        nama_harga,
        satuan_harga,
        jumlah_harga,
        id_jurusan_pdd,
        id_harga_jenis,
        pilih_harga
        ) VALUES (
            '" . $_POST['nama_harga'] . "',
            '" . $_POST['satuan_harga'] . "',
            '" . $_POST['jumlah_harga'] . "',
            '" . $id_jurusan_pdd . "',
            '" . $id_harga_jenis . "',
            '" . $_POST['pilih_harga'] . "'
            )";

    // echo $sql_insert_harga . "<br>";
    $conn->query($sql_insert_harga);

?>
    <script>
        document.location.href = "?hrg=<?php echo $id_jurusan_pdd; ?>";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_harga` WHERE `id_harga` = " . $_POST['id_harga']);
?>
    <script>
        document.location.href = "?hrg=<?php echo $_POST['id_jurusan_pdd']; ?>";
    </script>
<?php
}
