<?php
if (isset($_POST['tambah_lapor'])) {

    $no_id_lapor = 0;
    while ($d_lapor = $conn->query("SELECT id_lapor FROM tb_lapor ORDER BY id_lapor ASC")->fetch(PDO::FETCH_ASSOC)) {
        if ($no_id_lapor != $d_lapor[0]) {
            $no_id_lapor = $d_lapor[0] + 1;
            break;
        } elseif ($no_id_lapor == 0) {
            $no_id_lapor;
            break;
        }
        $no_id_lapor = $d_lapor[0] + 1;
    }
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $link_file_lapor = '';
    if ($_FILES['file_lapor']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['file_lapor']['name'] = "mou_" . $no_id_lapor . "_" . date('Y-m-d') . "." . substr($_FILES['file_lapor']['type'], 6);

        echo "<pre>";
        print_r($_FILES);
        echo "</pre>";

        //alamat file surat masuk
        $alamat_unggah = "./_file/lapor";

        //pembuatan alamat bila tidak ada
        if (!is_dir($alamat_unggah)) {
            mkdir($alamat_unggah, 0777, $rekursif = true);
        }

        //unggah surat dan data praktik
        if (!is_null($_FILES['file_lapor'])) {
            $file_lapor = (object) @$_FILES['file_lapor'];

            //mulai unggah file surat praktik
            if ($file_lapor->size > 1000 * 1000) {
                echo "
                <script>
                    alert('File Surat Harus dibawah 1 Mb');
                    // document.location.href = '?lapor';
                </script>
                ";
            } elseif ($file_lapor->type !== 'image/png, image/gif, image/jpeg, image/jpg') {
                echo "
                <script>
                    alert('File Surat Harus .png, .gif, jpeg, jpg');
                    // document.location.href = '?lapor';
                </script>
                    ";
            } else {
                $unggah_file_lapor = move_uploaded_file(
                    $file_lapor->tmp_name,
                    "{$alamat_unggah}/{$file_lapor->name}"
                );
                $link_file_lapor = "{$alamat_unggah}/{$file_lapor->name}";
            }
        } else {
            $link_file_lapor = "";
        }
    }
    $sql_tambah_lapor = "INSERT INTO tb_lapor (
        id_lapor
        judul_lapor,
        deskripsi_lapor,
        level_lapor, 
        tgl_lapor,
        nama_lapor,
        link_lapor,
        file_lapor
    ) VALUES (
        '" . $_POST['judul_lapor'] . "',
        '" . $_POST['deskripsi_lapor'] . "',
        '" . $_POST['level_lapor'] . "',
        '" . date('Y-m-d') . "',
        '" . $_POST['nama_lapor'] . "',
        '" . $_POST['link_lapor'] . "',
        '" . $link_file_lapor . "'
    )";

    echo $sql_tambah_lapor . "<br>";
    // $conn->query($sql_tambah_lapor);
    echo "
    <script>
        // alert('Data Sudah Lapor Sudah Tersimpan');
        // document.location.href = '?lapor';
    </script>
    ";
} elseif (isset($_POST['ubah_lapor'])) {
} elseif (isset($_POST['hapus_lapor'])) {
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Laporan</h1>
            </div>
            <div class="col-lg-2">
                <a class='btn btn-outline-success btn-sm' href='#' data-toggle="modal" data-target="#tambah_lapor">
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <!-- modal tambah akun -->
                <div class="modal fade" id="tambah_lapor" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-group" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Lapor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <b>Nama Pelapor : </b><br>
                                    <input class="form-control" type="text" name="nama_lapor" required><br>
                                    <b>Judul Laporan : </b><br>
                                    <input class="form-control" type="text" name="judul_lapor" required><br>
                                    <b>Dekripsi Laporan : </b><br>
                                    <textarea class="form-control" name="deskripsi_lapor"></textarea><br>
                                    <b>Link <i class="font-weight-bold">ERROR</i> : </b><br>
                                    <textarea class="form-control" name="link_lapor"></textarea><br>
                                    <b>File <i class="font-weight-bold">ERROR</i> : </b><br>
                                    <input type="file" name="file_lapor" accept="image/png, image/gif, image/jpeg, image/jpg"><br><br>
                                    <b>Level : </b><br>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="level1" name="level_lapor" value="rendah" class="custom-control-input" required>
                                        <label class="custom-control-label" for="level1">
                                            <span class="badge badge-success text-md">Rendah</span>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="level2" name="level_lapor" value="sedang" class="custom-control-input" required>
                                        <label class="custom-control-label" for="level2">
                                            <span class="badge badge-warning text-md">Sedang</span>
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="level3" name="level_lapor" value="tinggi" class="custom-control-input" required>
                                        <label class="custom-control-label" for="level3">
                                            <span class="badge badge-danger text-md">Tinggi</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary btn-sm" name="tambah_lapor">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_lapor = "SELECT * FROM tb_lapor
                ORDER BY tb_lapor.tgl_lapor ASC";

                $q_lapor = $conn->query($sql_lapor);
                $r_lapor = $q_lapor->rowCount();

                if ($r_lapor > 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pelapor</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Level Pelapor</th>
                                    <th scope="col">Tanggal Lapor</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_lapor = $q_lapor->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $d_lapor['nama_lapor']; ?></td>
                                        <td><?php echo $d_lapor['judul_lapor']; ?></td>
                                        <td><?php echo $d_lapor['tgl_lapor']; ?></td>
                                        <td><?php echo $d_usd_laporer['level_lapor']; ?></td>
                                        <td><?php echo $d_lapor['status_lapor']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary btn-sm" title="Ubah Akun" data-toggle="modal" data-target="#ubah_<?php echo $d_lapor['id_lapor']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm" title="Hapus Akun">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <!-- modal ubah akun -->
                                            <div class="modal fade" id="ubah_<?php echo $d_lapor['id_lapor']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="form-group" method="POST">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Lapor</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php
                                                                $sql_lapor = "SELECT * FROM tb_lapor WHERE id_lapor = '" . $d_lapor['id_lapor'] . "'";

                                                                $q_lapor = $conn->query($sql_lapor);
                                                                $d_lapor = $q_lapor->fetch(PDO::FETCH_ASSOC);
                                                                ?>
                                                                <b>Nama Pelapor : </b><br>
                                                                <input class="form-control" type="text" name="username_user" value="<?php echo $d_lapor['nama_lapor']; ?>" required><br>
                                                                <b>Judul Laporan : </b><br>
                                                                <input class="form-control" type="text" name="username_user" value="<?php echo $d_lapor['judul_lapor']; ?>" required><br>
                                                                <b>Dekripsi Laporan : </b><br>
                                                                <textarea name="deskripsi_lapor"><?php echo $d_lapor['deskripsi_lapor']; ?></textarea><br>
                                                                <b>Link <i class="font-weight-bold">ERROR</i> : </b><br>
                                                                <textarea name="link_lapor"><?php echo $d_lapor['link_lapor']; ?></textarea><br>
                                                                <b>Level : </b><br>
                                                                <?php
                                                                $level1 = '';
                                                                $level2 = '';
                                                                $level3 = '';
                                                                if ($d_lapor['level_lapor'] == 'rendah') {
                                                                    $level1 = 'checked';
                                                                } elseif ($d_lapor['level_lapor'] == 'sedang') {
                                                                    $level2 = 'checked';
                                                                } elseif ($d_lapor['level_lapor'] == 'tinggi') {
                                                                    $level3 = 'checked';
                                                                }
                                                                ?>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="level1" name="level_lapor" value="rendah" class="custom-control-input" required <?php echo $level1; ?>>
                                                                    <label class="custom-control-label" for="level1">
                                                                        <span class="badge badge-primary text-lg">Rendah</span>
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="level2" name="level_lapor" value="sedang" class="custom-control-input" required <?php echo $level2; ?>>
                                                                    <label class="custom-control-label" for="level2">Sedang</label>
                                                                </div>
                                                                <div class="custom-control custom-radio">
                                                                    <input type="radio" id="level3" name="level_user" value="tinggi" class="custom-control-input" required <?php echo $level3; ?>>
                                                                    <label class="custom-control-label" for="level3">Tinggi</label>
                                                                </div><br>
                                                                <hr>
                                                                <select name="status_lapor">
                                                                    <option value="cek">Cek</option>
                                                                    <option value="proses">Proses</option>
                                                                    <option value="selesai">Selesai</option>
                                                                    <option value="tidak">Tidak Bisa</option>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input name="id_lapor" value="<?php echo $d_akun['id_lapor']; ?>" hidden>
                                                                <button type="button" class="btn btn-outline-dark btn-sm" data-dismiss="modal">Kembali</button>
                                                                <button type="submit" class="btn btn-primary btn-sm" name="ubah_user">Ubah</button>
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
                    </div>
                <?php
                } else {
                ?>
                    <h3 class='text-center'> Data Laporan Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}
?>