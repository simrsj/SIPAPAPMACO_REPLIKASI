<div class="container-fluid">
    <?php
    $idpr = urldecode(decryptString($_GET['data'], $customkey));
    try {
        $sql_praktikan = "SELECT * FROM tb_praktikan ";
        $sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
        $sql_praktikan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
        $sql_praktikan .= " WHERE id_praktikan = " .  $idpr;
        // echo "$sql_praktikan<br>";
        $q_praktikan = $conn->query($sql_praktikan);
        $d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('DATA BIMBINGAN PRAKTIKAN')</script>;";
        // echo "<script>document.location.href='?error404';</script>";
    }
    ?>
    <div class="card shadow  m-2">
        <div class="card-header b text-center">
            Data Praktikan
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md">
                    <img height="100" height="80" src="<?= $d_praktikan['foto_praktikan'] ?>">
                </div>
                <div class="col-md">
                    Nama Praktikan : <br>
                    <strong><?= $d_praktikan['nama_praktikan'] ?></strong><br>
                    No. ID Praktikan : <br>
                    <strong><?= $d_praktikan['no_id_praktikan'] ?></strong>
                </div>
                <div class="col-md">
                    Nama Institusi : <br>
                    <strong> <?= $d_praktikan['nama_institusi'] ?> </strong><br>
                    Nama Kelompok/Gelombang/Praktik : <br>
                    <strong> <?= $d_praktikan['nama_praktik'] ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card shadow m-2 rounded-5">
                <div class="card-header b between">
                    <div class="row">
                        <div class="col-md-10">Data Jadwal Kegiatan Harian</div>
                        <div class="col-md-2 text-right">
                            <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal_tambah">
                                <i class="fa-solid fa-plus"></i> Tambah
                            </a>
                            <div class="modal  fade" id="modal_tambah" tabindex="-1" role="dialog" aria-labelledby="modal_tambah" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-light">
                                            Jadwal Kegiatan Harian
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body text-left">
                                            <label id="tgl">Tanggal</label>
                                            <input type="date" class="form-control mb-2" id="tgl" name="tgl">
                                            <label id="kegiatan">Kegiatan</label>
                                            <textarea id="kegiatan" name="kegiatan" class="form-control mb-2" rows="3"></textarea>
                                            <label id="topik">Topik</label>
                                            <textarea id="topik" name="topik" class="form-control mb-2" rows="3"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    try {
                        $sql_jkh = "SELECT * FROM tb_logbook_ked_coass_jkh ";
                        $sql_jkh .= " WHERE id_praktikan = " . $idpr;
                        // echo "$sql_jkh<br>";
                        $q_jkh = $conn->query($sql_jkh);
                        $r_jkh = $q_jkh->rowCount();
                    } catch (Exception $ex) {
                        echo "<script>alert('DATA JADWAL KEGIATAN HARIAN');</script>";
                        echo "<script>document.location.href='?error404';</script>";
                    }
                    ?>
                    <?php if ($r_jkh > 0) { ?>
                        <form id="form_jkh" method="post">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered " id="dataTable">
                                    <thead class="table-dark">
                                        <tr class="text-center">
                                            <th scope='col'>No</th>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Topik</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no0 = 1;
                                        while ($d_jkh = $q_jkh->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td class="text-center"><?= $no0; ?></td>
                                                <td><?= tanggal($d_jkh['tgl']); ?></td>
                                                <td><?= $d_jkh['kegiatan']; ?></td>
                                                <td><?= $d_jkh['topik']; ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a>
                                                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no0++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    <?php } else { ?>
                        <div class="jumbotron border-2 m-2  shadow">
                            <div class="jumbotron-fluid">
                                <div class="text-gray-700">
                                    <h5 class="text-center">Data Tidak Ada</h5>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>