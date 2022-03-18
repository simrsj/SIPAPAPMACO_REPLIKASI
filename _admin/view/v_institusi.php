<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Institusi</h1>
        </div>
        <div class="col-lg-2 text-right">
            <a class='btn btn-outline-success btn-sm' href='#' data-toggle='modal' data-target='#akr_i_m'>
                <i class="fas fa-plus"></i> Tambah
            </a>
            <a class='btn btn-outline-primary btn-sm' href='?ins&val'>
                Validasi
            </a>
            <!-- modal tambah Institusi  -->
            <div class="modal fade" id="akr_i_m">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="">
                            <div class="modal-header">
                                Tambah Institusi :
                            </div>
                            <div class="modal-body">
                                Nama Institusi : <span class="text-danger">*</span>
                                <input class="form-control" name="nama_institusi" required><br>
                                Akronim Institusi :
                                <input type='text' class="form-control" name="akronim_institusi" maxlength="10"><br>
                                Logo Institusi :<br>
                                <input type="file" name="logo_institusi" accept="image/png, image/gif, image/jpeg, image/jpg"><br>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-sm" name="tambah">Tambah</button>
                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $sql_institusi = "SELECT * FROM tb_institusi order by nama_institusi ASC";
                $q_institusi = $conn->query($sql_institusi);
                $r_institusi = $q_institusi->rowCount();
                if ($r_institusi > 0) {
                ?>
                    <table class='table table-striped' id="myTable">
                        <thead class="thead-dark text-center align-content-center">
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Institusi</th>
                                <th>Akronim </th>
                                <th>Logo </th>
                                <th>Akreditasi </th>
                                <th>Tanggal <br>Berlaku Akreditasi</th>
                                <th>File Akreditasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_institusi = $q_institusi->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_institusi['nama_institusi']; ?></td>
                                    <td>
                                        <?php
                                        if ($d_institusi['akronim_institusi'] == '') {
                                        ?>
                                            <span class="badge badge-danger">Tidak Ada</span>
                                        <?php
                                        } else {
                                            echo $d_institusi['akronim_institusi'];
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($d_institusi['logo_institusi'] == '') {
                                        ?>
                                            <span class="badge badge-danger">Tidak Ada</span>
                                        <?php
                                        } else {
                                        ?>
                                            <a title="Lihat Logo" class='btn btn-info btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#see_" . $d_institusi['id_institusi']; ?>'>
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>

                                            <!-- Lihat Logo  -->
                                            <div class="modal fade" id="<?php echo "see_" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <img src="<?php echo $d_institusi['logo_institusi']; ?>" width="250px" height="250px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($d_institusi['akred_institusi'] == '') {
                                        ?>
                                            <span class="badge badge-danger">Tidak Ada</span>
                                        <?php
                                        } else {
                                            echo $d_institusi['akred_institusi'];
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($d_institusi['tglAkhirAkred_institusi'] == '') {
                                        ?>
                                            <span class="badge badge-danger">Tidak Ada</span>
                                        <?php
                                        } else {
                                            echo $d_institusi['tglAkhirAkred_institusi'];
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                        if ($d_institusi['tglAkhirAkred_institusi'] == '') {
                                        ?>
                                            <span class="badge badge-danger">Tidak Ada</span>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="<?php echo $d_institusi['fileAkred_institusi']; ?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-file-download"></i> Download
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_u_m" . $d_institusi['id_institusi']; ?>'>
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#akr_d_m" . $d_institusi['id_institusi']; ?>'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                    <?php $no++; ?>
                                    <!-- modal ubah Institusi  -->
                                    <div class="modal fade" id="<?php echo "akr_u_m" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        Ubah Institusi :
                                                    </div>
                                                    <div class="modal-body">
                                                        <input name="id_institusi" value="<?php echo $d_institusi['id_institusi']; ?>" hidden>
                                                        Nama Institusi :
                                                        <input class="form-control" name="nama_institusi" value="<?php echo $d_institusi['nama_institusi']; ?>" required><br>
                                                        Akronim Institusi :
                                                        <i style='font-size:12px;'>Maximal 10 Karakter</i><span style="color:red">*</span>
                                                        <input type='text' class="form-control" name="akronim_institusi" maxlength="10" value="<?php echo $d_institusi['akronim_institusi']; ?>"><br>
                                                        Logo Institusi:<br>
                                                        <input type="file" name="logo_institusi" accept="image/png, image/gif, image/jpeg, image/jpg"><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success btn-sm" name="ubah">Ubah</button>
                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="<?php echo "akr_d_m" . $d_institusi['id_institusi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form method="post" action="">
                                                    <div class="modal-header">
                                                        <h5>Hapus Data</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><b><?php echo $d_institusi['nama_institusi']; ?></b></h6>
                                                        <input name="id_institusi" value="<?php echo $d_institusi['id_institusi']; ?>" hidden>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger btn-sm" name="hapus">Ya</button>
                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
            </div>
        <?php
                } else {
        ?>
            <h3 class="text-center text-justify"> Data Institusi Tidak Ada</h3>
        <?php
                }
        ?>
        </div>
    </div>
</div>
<?php
if (isset($_POST['ubah'])) {

    //jika logo diupload
    if ($_FILES['logo_institusi']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['logo_institusi']['name'] = $_POST['id_institusi'] . "." . substr($_FILES['logo_institusi']['type'], 6);

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        //alamat file surat masuk
        $alamat_unggah = "./_img/logo_institusi";

        //pembuatan alamat bila tidak ada
        if (!is_dir($alamat_unggah)) {
            mkdir($alamat_unggah, 0777, $rekursif = true);
        }

        //unggah surat dan data praktik
        if (!is_null($_FILES['logo_institusi'])) {
            $logo_institusi = (object) @$_FILES['logo_institusi'];

            //mulai unggah file surat praktik
            if ($logo_institusi->size > 1000 * 1000) {
                echo "
                <script>
                    alert('File Logo dibawah 1 Mb');
                    document.location.href = '?ins';
                </script>
                ";
            } elseif (substr($_FILES['logo_institusi']['type'], 6) != ('png' || 'gif' || 'jpeg' || 'jpg')) {
                echo "
                <script>
                    alert('File Surat Harus .png, .gif, jpeg, jpg');
                    document.location.href = '?ins';
                </script>
                    ";
            } else {
                $unggah_logo_institusi = move_uploaded_file(
                    $logo_institusi->tmp_name,
                    "{$alamat_unggah}/{$logo_institusi->name}"
                );
                $link_logo_institusi = "{$alamat_unggah}/{$logo_institusi->name}";
            }
        } else {
            $link_logo_institusi = "";
        }
    }

    //jika logo tidak dupload ambil dari sebelumya
    if ($_FILES['logo_institusi']['size'] == 0) {
        $sql_institusi = "SELECT logo_institusi FROM tb_institusi WHERE id_institusi ='" . $_POST['id_institusi'] . "'";
        $d_logo = $conn->query($sql_institusi)->fetch(PDO::FETCH_ASSOC);
        $link_logo_institusi = $d_logo['logo_institusi'];
    }

    $sql_ubah = "UPDATE `tb_institusi` SET ";
    $sql_ubah .= " `nama_institusi` = '" . $_POST['nama_institusi'] . "',";
    $sql_ubah .= " `akronim_institusi` = '" . $_POST['akronim_institusi'] . "',";
    $sql_ubah .= " `logo_institusi` = '" . $link_logo_institusi . "'";
    $sql_ubah .= "  WHERE `tb_institusi`.`id_institusi` = " . $_POST['id_institusi'];

    // echo $sql_ubah . "<br>";
    $conn->query($sql_ubah);
?>
    <script>
        document.location.href = "?ins";
    </script>
<?php
} elseif (isset($_POST['tambah'])) {

    $no_id_institusi = 1;
    while ($d_institusi = $conn->query("SELECT id_institusi FROM tb_institusi ORDER BY id_institusi ASC")->fetch(PDO::FETCH_ASSOC)) {
        if ($no_id_institusi != $d_institusi[0]) {
            $no_id_institusi = $d_institusi[0] + 1;
            break;
        } elseif ($no_id_institusi == 0) {
            $no_id_institusi;
            break;
        }
        $no_id_institusi = $d_institusi[0] + 1;
    }
    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    $link_logo_institusi = '';
    if ($_FILES['logo_institusi']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['logo_institusi']['name'] = $no_id_institusi . "." . substr($_FILES['logo_institusi']['type'], 6);

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        //alamat file surat masuk
        $alamat_unggah = "./_img/logo_institusi";

        //pembuatan alamat bila tidak ada
        if (!is_dir($alamat_unggah)) {
            mkdir($alamat_unggah, 0777, $rekursif = true);
        }

        //unggah surat dan data praktik
        if (!is_null($_FILES['logo_institusi'])) {
            $logo_institusi = (object) @$_FILES['logo_institusi'];

            //mulai unggah file surat praktik
            if ($logo_institusi->size > 1000 * 1000) {
                echo "
                <script>
                    alert('File Logo dibawah 1 Mb');
                    document.location.href = '?ins';
                </script>
                ";
            } elseif (substr($_FILES['logo_institusi']['type'], 6) != ('png' || 'gif' || 'jpeg' || 'jpg')) {
                echo "
                <script>
                    alert('File Surat Harus .png, .gif, jpeg, jpg');
                    document.location.href = '?ins';
                </script>
                    ";
            } else {
                $unggah_logo_institusi = move_uploaded_file(
                    $logo_institusi->tmp_name,
                    "{$alamat_unggah}/{$logo_institusi->name}"
                );
                $link_logo_institusi = "{$alamat_unggah}/{$logo_institusi->name}";
            }
        } else {
            $link_logo_institusi = "";
        }
    }
    $sql_institusi = "INSERT INTO `tb_institusi` (
    `nama_institusi`, 
    akronim_institusi, 
    logo_institusi
    ) VALUES (
        '" . $_POST['nama_institusi'] . "',
        '" . $_POST['akronim_institusi'] . "',
        '" . $link_logo_institusi . "'
    )";


    // echo $sql_institusi . "<br>";
    $conn->query($sql_institusi);


?>
    <script>
        document.location.href = "?ins";
    </script>
<?php
} elseif (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM `tb_institusi` WHERE `id_institusi` = " . $_POST['id_institusi']);
?>
    <script>
        document.location.href = "?ins";
    </script>
<?php
}
?>