<div class="table-responsive">
    <table class="table table-striped table-bordered" id="dataTable">
        <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col" class="text-left">No&nbsp;&nbsp;</th>
                <th scope="col">Nama Praktikan&nbsp;&nbsp;</th>
                <th scope="col">ID Praktikan&nbsp;&nbsp;</th>
                <th scope="col">Penilaian&nbsp;&nbsp;</th>
                <th scope="col" title="Pencapaian Kompetensi Keterampilan">P3D&nbsp;&nbsp;</th>
                <th scope="col" title="Jadwal Kegiatan Harian">JKH&nbsp;&nbsp;</th>
                <th scope="col" title="Kasus Yang Ditemukan">KYD&nbsp;&nbsp;</th>
                <th scope="col" title="Pembuatan Status Wajib">PSW&nbsp;&nbsp;</th>
                <th scope="col">Materi&nbsp;&nbsp;</th>
                <th scope="col" title="Lembar Penilaian Perilaku Profesional">LPPP&nbsp;&nbsp;</th>
                <th scope="col">e-Log Book&nbsp;&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php while ($d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th scope="row"><?= $no; ?></th>
                    <td><?= $d_praktikan['nama_praktikan']; ?></td>
                    <td><?= $d_praktikan['no_id_praktikan']; ?></td>
                    <td class="text-center">
                        <?php
                        try {
                            $sql_nil = "SELECT * FROM tb_nilai_ked_coass ";
                            $sql_nil .= " WHERE id_praktikan = " . $d_praktikan['id_praktikan'];
                            // echo $sql_nil;
                            $q_nil  = $conn->query($sql_nil);
                            $r_nil  = $q_nil->rowCount();
                        } catch (Exception $ex) {
                        ?>
                            <script>
                                alert('<?= $ex->getMessage() ?>');
                                document.location.href = '?error404';
                            </script>";
                        <?php
                        }
                        ?>
                        <?php if ($r_nil > 0) { ?>
                            <a class="btn btn-outline-info m-1" href="#" data-toggle="modal" data-target="#m_nilai_<?= $no; ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="modal" id="m_nilai_<?= $no; ?>" style="display: none;">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-light b">
                                            Penilaian <?= $d_praktikan['nama_praktikan']; ?>
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered">
                                                <thead class="table-dark">
                                                    <tr class="text-center">
                                                        <th scope="col">No</th>
                                                        <th>BST</th>
                                                        <th>CRS</th>
                                                        <th>CSS</th>
                                                        <th>MINI C-EX</th>
                                                        <th>RPS</th>
                                                        <th>OSLER</th>
                                                        <th>DOPS</th>
                                                        <th>CBD</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no_nil = 1;
                                                    while ($d_nil = $q_nil->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <tr>
                                                            <th class="text-center"><?= $no_nil ?></th>
                                                            <td><?= $d_nil['bst'] ?></td>
                                                            <td><?= $d_nil['crs'] ?></td>
                                                            <td><?= $d_nil['css'] ?></td>
                                                            <td><?= $d_nil['minicex'] ?></td>
                                                            <td><?= $d_nil['rps'] ?></td>
                                                            <td><?= $d_nil['osler'] ?></td>
                                                            <td><?= $d_nil['dops'] ?></td>
                                                            <td><?= $d_nil['cbd'] ?></td>
                                                        <?php
                                                        $no_nil++;
                                                    }
                                                        ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <a href="?logbook&ked_coass_nilai&u=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>&admin=<?= $_GET['data'] ?>" class="btn btn-outline-primary" title="Detail Penilaian">
                            <i class="fa-solid fa-pen-to-square "></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <?php
                        try {
                            $sql_p3d = "SELECT * FROM tb_logbook_ked_coass_p3d ";
                            $sql_p3d .= " WHERE id_praktikan = " . $d_praktikan['id_praktikan'];
                            // echo $sql_p3d;
                            $q_p3d  = $conn->query($sql_p3d);
                            $r_p3d  = $q_p3d->rowCount();
                        } catch (Exception $ex) {
                        ?>
                            <script>
                                alert('<?= $ex->getMessage() ?>');
                                document.location.href = '?error404';
                            </script>";
                        <?php
                        }
                        ?>
                        <?php if ($r_p3d > 0) { ?>
                            <a class="btn btn-outline-info m-1" href="#" data-toggle="modal" data-target="#m_p3d_<?= $no; ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="modal" id="m_p3d_<?= $no; ?>" style="display: none;">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-light b">
                                            Pencapaian Kompetensi Keterampilan (P3D) <?= $d_praktikan['nama_praktikan']; ?>
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered ">
                                                <thead class="table-dark">
                                                    <tr class="text-center">
                                                        <th scope='col'>No</th>
                                                        <th>Nama Kompetensi</th>
                                                        <th>I</th>
                                                        <th>II</th>
                                                        <th>III</th>
                                                        <th>IV</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    try {
                                                        $sql_pertanyaan = "SELECT * FROM tb_pertanyaan ";
                                                        $sql_pertanyaan .= " WHERE kategori_pertanyaan = 'P3D'";
                                                        // echo "$sql_pertanyaan<br>";
                                                        $q_pertanyaan = $conn->query($sql_pertanyaan);
                                                    } catch (Exception $ex) {
                                                    ?>
                                                        <script>
                                                            alert('<?= $ex->getMessage() ?>');
                                                            document.location.href = '?error404';
                                                        </script>";
                                                    <?php
                                                    }
                                                    $no0 = 1;
                                                    while ($d_pertanyaan = $q_pertanyaan->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no0; ?></td>
                                                            <td><?= $d_pertanyaan['pertanyaan']; ?></td>
                                                            <td>
                                                                <?php

                                                                try {
                                                                    $sql_p3d_1 = "SELECT * FROM tb_logbook_ked_coass_p3d ";
                                                                    $sql_p3d_1 .= " WHERE id_praktikan = " . $d_praktikan['id_praktikan'];
                                                                    $sql_p3d_1 .= " AND id_pertanyaan = " . $d_pertanyaan['id'];
                                                                    // echo "$sql_p3d_1<br>";
                                                                    $q_p3d_1 = $conn->query($sql_p3d_1);
                                                                    $d_p3d_1 = $q_p3d_1->fetch(PDO::FETCH_ASSOC);
                                                                } catch (Exception $ex) {
                                                                ?>
                                                                    <script>
                                                                        alert('<?= $ex->getMessage() ?>');
                                                                        document.location.href = '?error404';
                                                                    </script>";
                                                                <?php
                                                                }
                                                                ?>
                                                                <?= $d_p3d_1['i'] == 'Y' ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-solid fa-circle-xmark text-danger"></i>'; ?>
                                                            </td>
                                                            <td>
                                                                <?= $d_p3d_1['ii'] == 'Y' ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-solid fa-circle-xmark text-danger"></i>'; ?>
                                                            </td>
                                                            <td>
                                                                <?= $d_p3d_1['iii'] == 'Y' ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-solid fa-circle-xmark text-danger"></i>'; ?>
                                                            </td>
                                                            <td>
                                                                <?= $d_p3d_1['iv'] == 'Y' ? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-solid fa-circle-xmark text-danger"></i>'; ?>
                                                            </td>
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
                        <?php
                        }
                        ?>
                        <a href="?logbook&ked_coass_nilai&u=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Pencapaian Kompetensi Keterampilan">
                            <i class="fa-solid fa-info-circle"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Jadwal Kegiatan Harian">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Kasus Yang Ditemukan">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Pembuatan Status Wajib">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Materi">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="?logbook&data=<?= encryptString($d['id_praktik'], $customkey) ?>" class="btn btn-outline-info" title="Detail Lembar Penilaian Perilaku Profesional">
                            <i class="fa-solid fa-info-circle"></i> <span class="d-none">Detail</span>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="_print\p_logbook_ked_coass.php?data=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>" class="btn btn-danger col" title="Download Log Book" download>
                            <i class="fa-solid fa-file-arrow-down"></i> <span class="d-none">Cetak</span>
                        </a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
        </tbody>
    </table>
</div>