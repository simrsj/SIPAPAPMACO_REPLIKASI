    <div class="container-fluid">
        <?php
        try {
            $sql_bimbingan = "SELECT * FROM tb_praktikan ";
            $sql_bimbingan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
            $sql_bimbingan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
            $sql_bimbingan .= " JOIN tb_nilai_ked_coass ON tb_praktikan.id_praktikan = tb_nilai_ked_coass.id_praktikan";
            $sql_bimbingan .= " WHERE id_pembimbing = " . $d_pembimbing['id_pembimbing'];
            $sql_bimbingan .= " AND status_praktik = 'Y'";
            $sql_bimbingan .= " ORDER BY tb_praktik.id_praktik ASC";
            // echo "$sql_bimbingan<br>";
            $q_bimbingan = $conn->query($sql_bimbingan);
            $r_bimbingan = $q_bimbingan->rowCount();
        } catch (Exception $ex) {
            echo "<script>alert('DATA BIMBINGAN PRAKTIKAN');";
            echo "document.location.href='?error404';</script>";
        }
        ?>
        <?php if ($r_bimbingan > 0) { ?>
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-light b">
                    Pencapaian Komptensi Keterampilan P3D
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Institusi</th>
                                    <th scope="col">Nama Praktikan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_bimbingan = $q_bimbingan->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr class="text-center">
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $d_bimbingan['nama_institusi']; ?></td>
                                        <td><?= $d_bimbingan['nama_praktikan']; ?></td>
                                        <td>
                                            <?php
                                            try {
                                                $sql_jkh = "SELECT * FROM tb_logbook_ked_coass_jkh ";
                                                $sql_jkh .= " WHERE id_praktikan = " . $d_bimbingan['id_praktikan'];
                                                // echo "$sql_jkh<br>";
                                                $q_jkh = $conn->query($sql_jkh);
                                                $r_jkh = $q_jkh->rowCount();
                                                echo $r_jkh != NULL ? "<span class='badge badge-success'>Data Sudah Ada</span>" : "<span class='badge badge-secondary'>Data Belum Ada</span>";
                                            } catch (Exception $ex) {
                                                echo "<script>alert('DATA JADWAL KEGIATAN HARIAN');</script>";
                                                echo "<script>document.location.href='?error404';</script>";
                                            }
                                            ?>
                                        </td>
                                        <td class=" text-center">
                                            <?php if ($r_jkh > 0) { ?>
                                                <a class="btn btn-outline-info btn-sm col" href="#" data-toggle="modal" data-target="#modal_data_jkh<?= $no ?>">
                                                    <i class="fas fa-eye"></i> Lihat
                                                </a>
                                                <!-- Logout Modal-->
                                                <div class="modal  fade" id="modal_data_jkh<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="modal_data_jkh<?= $no ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-secondary text-light">
                                                                Jadwal Kegiatan Harian
                                                                <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                                    X
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-striped table-bordered ">
                                                                    <thead class="table-dark">
                                                                        <tr class="text-center">
                                                                            <th scope='col'>No</th>
                                                                            <th>Tanggal</th>
                                                                            <th>Kegiatan</th>
                                                                            <th>Topik</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $no0 = 1;
                                                                        while ($d_jkh = $q_jkh->fetch(PDO::FETCH_ASSOC)) {
                                                                        ?>
                                                                            <tr>
                                                                                <td class="text-center"><?= $no0; ?></td>
                                                                                <td><?= $d_jkh['tgl']; ?></td>
                                                                                <td><?= $d_jkh['Kegiatan']; ?></td>
                                                                                <td><?= $d_jkh['Topik']; ?></td>
                                                                            </tr>
                                                                        <?php
                                                                            $no0++;
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <span class='badge badge-secondary'>Data Belum Ada</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="jumbotron border-2 shadow">
                <div class="jumbotron-fluid">
                    <div class="text-gray-700">
                        <h5 class="text-center">Data Praktikan Tidak Ada</h5>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>