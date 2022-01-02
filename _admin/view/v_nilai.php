<?php
if (isset($_POST['arsip_praktik']) || isset($_POST['selesai_praktik'])) {
    $conn->query("UPDATE `tb_praktik` SET status_praktik = 'T' WHERE id_praktik = " . $_POST['id_praktik']);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['tambah_praktikan'])) {
    $id_praktik = $_POST['id_praktik'];
    $q_praktikan = $conn->query("SELECT * FROM tb_praktikan WHERE id_praktik= '" . $id_praktik . "'");
    $r_praktikan = $q_praktikan->rowCount();
    if ($r_praktikan > 0) {
        echo "
        <script type='text/javascript'>
           alert('DATA PRAKTIKAN SUDAH ADA');
        </script>
    ";
    } else {
        $sql_insert_praktikan = "INSERT INTO tb_praktikan (id_praktik, status_praktikan)  VALUES ($id_praktik, 'INPUT NILAI')";

        // echo $sql_insert_praktikan;
        $conn->query($sql_insert_praktikan);
    }
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['hapus_praktikan'])) {
    $sql_delete_praktikan_detail_all = "DELETE FROM `tb_praktikan_detail` WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

    // echo $sql_delete_praktikan_detail_all . "<br>";
    $conn->query($sql_delete_praktikan_detail_all);

    $sql_ubah_status_praktikan = "UPDATE tb_praktikan
            SET status_praktikan = 'INPUT PRAKTIKAN'
            WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

    // echo $sql_ubah_status_praktikan . "<br>";
    $conn->query($sql_ubah_status_praktikan);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['tambah_data_praktikan'])) {
    $sql_insert_data_praktikan = "INSERT INTO tb_praktikan_detail (
        id_praktikan, 
        no_id_praktikan_detail, 
        nama_praktikan_detail, 
        tgl_lahir_praktikan_detail, 
        telp_praktikan_detail, 
        email_praktikan_detail,
        tgl_input_praktikan_detail
        )  VALUES (
            '" . $_POST['id_praktikan'] . "',
            '" . $_POST['no_id_praktikan_detail'] . "',
            '" . $_POST['nama_praktikan_detail'] . "',
            '" . $_POST['tgl_lahir_praktikan_detail'] . "',
            '" . $_POST['telp_praktikan_detail'] . "',
            '" . $_POST['email_praktikan_detail'] . "',
            '" . date('Y-m-d') . "'
        )";

    $sql_ubah_status_praktikan = "UPDATE tb_praktikan SET
    status_praktikan = 'PRAKTIKAN ADA'
    WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

    // echo $sql_insert_data_praktikan . "<br>";
    // echo $sql_ubah_status_praktikan . "<br>";
    $conn->query($sql_insert_data_praktikan);
    $conn->query($sql_ubah_status_praktikan);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['ubah_data_praktikan'])) {
    $sql_ubah_data_praktikan = "UPDATE tb_praktikan_detail SET
        no_id_praktikan_detail = '" . $_POST['no_id_praktikan_detail'] . "',
        nama_praktikan_detail = '" . $_POST['nama_praktikan_detail'] . "',
        tgl_lahir_praktikan_detail = '" . $_POST['tgl_lahir_praktikan_detail'] . "',
        telp_praktikan_detail = '" . $_POST['telp_praktikan_detail'] . "',
        email_praktikan_detail = '" . $_POST['email_praktikan_detail'] . "',
        tgl_ubah_praktikan_detail = '" . date('Y-m-d') . "'
        WHERE id_praktikan_detail = '" . $_POST['id_praktikan_detail'] . "'
    ";
    // echo $sql_ubah_data_praktikan . "<br>";
    $conn->query($sql_ubah_data_praktikan);
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
        </script>
    ";
} elseif (isset($_POST['hapus_data_praktikan'])) {
    $sql_delete_praktikan_detail = "DELETE FROM `tb_praktikan_detail` WHERE id_praktikan_detail = " . $_POST['id_praktikan_detail'];

    echo $sql_delete_praktikan_detail . "<br>";
    $conn->query($sql_delete_praktikan_detail);

    //jika semuanya dihapus dalam data praktikan ubah status praktikan
    $sql_praktikan_detail = "SELECT * FROM tb_praktikan_detail WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";
    $q_praktikan_detail = $conn->query($sql_praktikan_detail);
    $r_praktikan_detail = $q_praktikan_detail->rowCount();

    if ($r_praktikan_detail == 0) {
        $sql_ubah_status_praktikan = "UPDATE tb_praktikan
            SET status_praktikan = 'INPUT PRAKTIKAN'
            WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'";

        echo $sql_ubah_status_praktikan . "<br>";
        $conn->query($sql_ubah_status_praktikan);
    }
    echo "
        <script type='text/javascript'>
            document.location.href = '?ptk';
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
                <a href="#" data-toggle="modal" data-target="#tambah_praktikan" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>

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

                <a href="?dpk&a" class="btn btn-outline-info btn-sm">
                    <i>
                        <i class="fas fa-archive"></i>
                    </i>Arsip
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktikan
                    JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_spesifikasi_pdd ON tb_praktik.id_spesifikasi_pdd = tb_spesifikasi_pdd.id_spesifikasi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    JOIN tb_akreditasi ON tb_praktik.id_akreditasi = tb_akreditasi.id_akreditasi 
                    WHERE tb_praktik.status_praktik = 'Y' 
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
                                        <div class="col-sm-2">
                                            <b>INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <b>TANGGAL SELESAI : </b>
                                            <br>
                                            <?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b>STATUS : </b>
                                            <a href="#" data-toggle="modal" data-target="#info_status">
                                                <i class="fas fa-info-circle" style="font-size: 14px;"></i>
                                            </a>

                                            <!-- modal info_status -->
                                            <div class="modal fade text-left" id="info_status">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4>INFO STATUS</h4>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span class="badge badge-warning text-md">INPUT PRAKTIKAN</span> : Lakukan proses Tambah untuk memasukan data praktikan<br><br>
                                                            <span class="badge badge-primary text-md">PRAKTIKAN ADA</span> : data praktikan sudah diinputkan<br><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <?php
                                            if ($d_praktik['status_praktikan'] == "INPUT PRAKTIKAN") {
                                            ?>
                                                <span class="badge badge-warning text-md"><?php echo $d_praktik['status_praktikan']; ?></span>
                                            <?php
                                            } elseif ($d_praktik['status_praktikan'] == "PRAKTIKAN ADA") {
                                            ?>
                                                <span class="badge badge-primary text-md"><?php echo $d_praktik['status_praktikan']; ?></span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger text-md">ERROR</span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"> </i>
                                                Rincian
                                            </button>
                                        </div>
                                        <div class="col-sm-2">
                                            <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='#prk_dh_<?php echo $d_praktik['id_praktik']; ?>' title="arsip">
                                                <i class="fas fa-archive"> </i>
                                                Arsipkan
                                            </a>

                                            <!-- modal arsip -->
                                            <div class="modal fade" id="prk_dh_<?php echo $d_praktik['id_praktik']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5>ARSIP KAN DATA :</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>Nama Institusi </b><br>
                                                            <?php echo $d_praktik['nama_institusi']; ?><br>
                                                            <b>Periode Praktik </b> : <br>
                                                            <?php echo $d_praktik['nama_praktik']; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form method="post">
                                                                <input name="id_praktik" value="<?php echo $d_praktik['id_praktik'] ?>" hidden>
                                                                <input type="submit" name="arsip_praktik" value="Hapus" class="btn btn-danger btn-sm">
                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Batal</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data praktikan -->
                                <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: small;">

                                        <!-- data menu harga wajib, ujian dan sewa tempat yang dipilih -->
                                        <div class="text-gray-700">
                                            <div class="row">
                                                <div class="col-lg-11">
                                                    <h4 class="font-weight-bold">
                                                        DATA PRAKTIKAN
                                                    </h4>
                                                </div>
                                                <div class="col-lg-1">
                                                    <a title="Tambah Data Praktikan" class="btn btn-success btn-sm" data-toggle='modal' data-target='#t_p_m<?php echo $d_praktik['id_praktikan']; ?>'>
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                    <!-- modal tambah data praktikan -->
                                                    <div class="modal fade text-left" id="t_p_m<?php echo $d_praktik['id_praktikan']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form class="form-group" method="post">
                                                                    <div class="modal-header">
                                                                        <h4>TAMBAH DATA PRAKTIKAN ?</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        ID Praktikan : <span style="color:red">*</span><br>
                                                                        <input class="form-control" type="text" name="no_id_praktikan_detail" required><br>
                                                                        Nama Praktikan : <span style="color:red">*</span><br>
                                                                        <input class="form-control" type="text" name="nama_praktikan_detail" required><br>
                                                                        Tanggal Lahir : <span style="color:red">*</span><br>
                                                                        <input class="form-control" type="date" name="tgl_lahir_praktikan_detail" required><br>
                                                                        No. Telp. : <span style="color:red">*</span><br>
                                                                        <input class="form-control" type="number" min="1" name="telp_praktikan_detail" required><br>
                                                                        E-Mail: <br>
                                                                        <input class="form-control" type="email" name="email_praktikan_detail">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input name="id_praktikan" value="<?php echo $d_praktik['id_praktikan']; ?>" hidden>
                                                                        <button class="btn btn-success btn-sm" type="submit" name="tambah_data_praktikan">TAMBAH</button>
                                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a title="Hapus Data Praktikan" class="btn btn-danger btn-sm" data-toggle='modal' data-target='#h_p_m<?php echo $d_praktik['id_praktikan']; ?>'>
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <!-- modal hapus data praktikan -->
                                                    <div class="modal fade text-left" id="h_p_m<?php echo $d_praktik['id_praktikan']; ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <form class="form-group" method="post">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4>HAPUS SEMUA DATA PRAKTIKAN ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <input name="id_praktikan" value="<?php echo $d_praktik['id_praktikan']; ?>" hidden>
                                                                        <button class="btn btn-danger btn-sm" type="submit" name="hapus_praktikan">HAPUS</button>
                                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <?php
                                            $sql_praktikan_detail = "SELECT * FROM tb_praktikan
                                                    JOIN tb_praktikan_detail ON tb_praktikan.id_praktikan = tb_praktikan_detail.id_praktikan
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
                                                            <th scope="col">Tanggal Lahir</th>
                                                            <th scope="col">No. Telpon</th>
                                                            <th scope="col">E-Mail</th>
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
                                                                <td><?php echo tanggal($d_praktikan_detail['tgl_lahir_praktikan_detail']); ?></td>
                                                                <td><?php echo $d_praktikan_detail['telp_praktikan_detail']; ?></td>
                                                                <td><?php echo $d_praktikan_detail['email_praktikan_detail']; ?></td>
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
                                                                                        <h4>UBAH DATA PRAKTIKAN ?</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <?php
                                                                                        $sql_data_praktikan = "SELECT * FROM tb_praktikan_detail WHERE id_praktikan_detail = '" . $d_praktikan_detail['id_praktikan_detail'] . "'";
                                                                                        $q_data_praktikan = $conn->query($sql_data_praktikan);
                                                                                        $d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC);
                                                                                        ?>
                                                                                        ID Praktikan : <span style="color:red">*</span><br>
                                                                                        <input class="form-control" type="text" name="no_id_praktikan_detail" value="<?php echo $d_data_praktikan['no_id_praktikan_detail']; ?>" required><br>
                                                                                        Nama Praktikan : <span style="color:red">*</span><br>
                                                                                        <input class="form-control" type="text" name="nama_praktikan_detail" value="<?php echo $d_data_praktikan['nama_praktikan_detail']; ?>" required><br>
                                                                                        Tanggal Lahir : <span style="color:red">*</span><br>
                                                                                        <input class="form-control" type="date" name="tgl_lahir_praktikan_detail" value="<?php echo $d_data_praktikan['tgl_lahir_praktikan_detail']; ?>" required><br>
                                                                                        No. Telp. : <span style="color:red">*</span><br>
                                                                                        <input class="form-control" type="number" min="1" name="telp_praktikan_detail" value="<?php echo $d_data_praktikan['telp_praktikan_detail']; ?>" required><br>
                                                                                        E-Mail: <br>
                                                                                        <input class="form-control" type="email" name="email_praktikan_detail" value="<?php echo $d_data_praktikan['email_praktikan_detail']; ?>">
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
                                                                    <a title="Hapus Data Praktikan" class="btn btn-danger btn-sm" data-toggle='modal' data-target='#h_dp_m<?php echo $d_data_praktikan['id_praktikan_detail']; ?>'>
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </a>
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
                                                            <h5 class="text-center">DATA PRAKTIKAN TIDA ADA</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
