<?php
if (isset($_POST['tambah_lapor'])) {


    $no = 1;
    $sql = "SELECT id_lapor FROM tb_lapor ORDER BY id_lapor ASC";
    $q = $conn->query($sql);
    while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
        if ($no != $d['id_lapor']) {
            $no = $d['id_lapor'] + 1;
            break;
        }
        $no++;
    }

    // echo "<pre>";
    // print_r($_FILES);
    // echo "</pre>";
    $link_file_lapor = '';
    if ($_FILES['file_lapor']['size'] > 0) {
        //ubah Nama File PDF
        $_FILES['file_lapor']['name'] = "lapor_" . $no . "_" . date('Y-m-d') . "." . substr($_FILES['file_lapor']['type'], 6);

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

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
                    alert('File Lapor Harus dibawah 1 Mb');
                    document.location.href = '?lapor';
                </script>
                ";
            } elseif (substr($_FILES['file_lapor']['type'], 6) != ('png' || 'gif' || 'jpeg' || 'jpg')) {
                echo "
                <script>
                    alert('File Lapor Harus .png, .gif, jpeg, jpg');
                    document.location.href = '?lapor';
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
        id_lapor,
        judul_lapor,
        deskripsi_lapor,
        level_lapor, 
        tgl_lapor,
        nama_lapor,
        link_lapor,
        status_lapor,
        file_lapor
    ) VALUES (
        '" . $no . "',
        '" . $_POST['judul_lapor'] . "',
        '" . $_POST['deskripsi_lapor'] . "',
        '" . $_POST['level_lapor'] . "',
        '" . date('Y-m-d') . "',
        '" . $_POST['nama_lapor'] . "',
        '" . $_POST['link_lapor'] . "',
        'cek',
        '" . $link_file_lapor . "'
    )";

    // echo $sql_tambah_lapor . "<br>";
    $conn->query($sql_tambah_lapor);
    echo "
    <script>
        alert('Data Lapor Sudah Tersimpan');
        document.location.href = '?lapor';
    </script>
    ";
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
                                    <b>Deskripsi Laporan : </b><br>
                                    <textarea class="form-control" name="deskripsi_lapor"></textarea><br>
                                    <b>Link <i class="font-weight-bold">ERROR</i> : </b><br>
                                    <textarea class="form-control" name="link_lapor"></textarea><br>
                                    <i>Screenshot ERROR : </i><br>
                                    <input type="file" name="file_lapor" accept="image/png, image/gif, image/jpeg, image/jpg"><br><br>
                                    <b>Level : </b><br>
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
                $sql_lapor = "SELECT * FROM tb_lapor ORDER BY tgl_lapor ASC";

                $q_lapor = $conn->query($sql_lapor);
                $r_lapor = $q_lapor->rowCount();

                if ($r_lapor > 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Lapor</th>
                                    <th scope="col">Nama Pelapor</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Level Pelapor</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <?php
                                $no = 1;
                                while ($d_lapor = $q_lapor->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo tanggal_minimal($d_lapor['tgl_lapor']); ?></td>
                                        <td><?php echo $d_lapor['nama_lapor']; ?></td>
                                        <td><?php echo $d_lapor['judul_lapor']; ?></td>
                                        <td>
                                            <?php
                                            if ($d_lapor['level_lapor'] == 'rendah') {
                                            ?>
                                                <span class="badge badge-success text-md">RENDAH</span>
                                            <?php
                                            } elseif ($d_lapor['level_lapor'] == 'sedang') {
                                            ?>
                                                <span class="badge badge-warning text-md">SEDANG</span>
                                            <?php
                                            } elseif ($d_lapor['level_lapor'] == 'tinggi') {
                                            ?>
                                                <span class="badge badge-danger text-md">TINGGI</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($d_lapor['status_lapor'] == 'CEK') {
                                            ?>
                                                <span class="badge badge-warning text-md">CEK</span>
                                            <?php
                                            } elseif ($d_lapor['status_lapor'] == 'PROSES') {
                                            ?>
                                                <span class="badge badge-primary text-md">PROSES</span>
                                            <?php
                                            } elseif ($d_lapor['status_lapor'] == 'SELESAI') {
                                            ?>
                                                <span class="badge badge-success text-md">SELESAI</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger text-md">ERROR</span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <!-- tombol lihat detail lapor -->
                                            <a href="#" class="btn btn-info btn-sm" title="Lihat Detail" data-toggle="modal" data-target="#lihat_<?php echo $d_lapor['id_lapor']; ?>">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>

                                            <!-- modal lihat detail lapor -->
                                            <div class="modal fade" id="lihat_<?php echo $d_lapor['id_lapor']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-7 text-center">
                                                                    <img src="<?php echo $d_lapor['file_lapor']; ?>" class="img-fluid" alt="Responsive image"><br>
                                                                    <a href="<?php echo $d_lapor['file_lapor']; ?>" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-search"></i> Perbesar</a>

                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <fieldset class="fieldset">
                                                                        <legend class="legend-fieldset">Rincian</legend>
                                                                        <b>Judul : </b><br>
                                                                        <?php echo $d_lapor['judul_lapor']; ?><br><br>
                                                                        <b>Link ERROR : </b><br>
                                                                        <?php echo $d_lapor['link_lapor']; ?><br><br>
                                                                        <b>Deskripsi : </b><br>
                                                                        <?php echo $d_lapor['deskripsi_lapor']; ?><br><br>
                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Kembali</button>
                                                        </div>
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