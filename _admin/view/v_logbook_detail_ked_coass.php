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
                    <!-- Penilaian  -->
                    <td class="text-center">
                        <?php
                        try {
                            $sql_nil = "SELECT * FROM tb_nilai_ked_coass ";
                            $sql_nil .= " WHERE id_praktikan = " . $d_praktikan['id_praktikan'];
                            // echo $sql_nil;
                            $q_nil  = $conn->query($sql_nil);
                            $d_nil = $q_nil->fetch(PDO::FETCH_ASSOC);
                            $r_nil  = $q_nil->rowCount();
                        } catch (Exception $ex) {
                        ?>
                            <script>
                                alert("<?= $ex->getMessage() ?>");
                                document.location.href = '?error404';
                            </script>";
                        <?php
                        }
                        ?>
                        <?php if ($r_nil > 0) { ?>
                            <a class="btn btn-outline-info " href="#" data-toggle="modal" data-target="#m_nilai_<?= $no; ?>" title="Detail Penilaian">
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
                                            BST (BEDSIDE TEACHING) : <b><?= $d_nil['bst'] ?></b><br>
                                            CRS (CASE REPORT SESSION/TUTORIAL) : <b><?= $d_nil['crs'] ?></b><br>
                                            CSS (CLINICAL SCIENCE SESSION/REFERAT/JOURNAL READING): <b><?= $d_nil['css'] ?></b><br>
                                            MINI C-EX (MINI CLINICAL EXAMINATION) : <b><?= $d_nil['minicex'] ?></b><br>
                                            RPS (RESOURCE PERSON SESION) : <b><?= $d_nil['rps'] ?></b><br>
                                            OSLER (OBJECTIVE STRUKTURED LONG EXAMINATION STRUKTURED) : <b><?= $d_nil['osler'] ?></b><br>
                                            DOPS (DIRECT OBSERVATION PROCEDURAL SKILLS) : <b><?= $d_nil['dops'] ?></b><br>
                                            BCBD (CASE BASED DISCUSSION) : <b><?= $d_nil['cbd'] ?></b><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <a href="?logbook&ked_coass_nilai&u=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>&admin=<?= $_GET['data'] ?>" class="btn btn-outline-primary" title="Ubah Penilaian">
                            <i class="fa-solid fa-pen-to-square "></i>
                        </a>
                    </td>
                    <!-- P3D -->
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
                                alert("<?= $ex->getMessage() ?>");
                                document.location.href = '?error404';
                            </script>";
                        <?php
                        }
                        ?>
                        <?php if ($r_p3d > 0) { ?>
                            <a class="btn btn-outline-info " href="#" data-toggle="modal" data-target="#m_p3d_<?= $no; ?>" title="Detail Pencapaian Kompetensi Keterampilan (P3D)">
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
                                                            alert("<?= $ex->getMessage() ?>");
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
                                                                        alert("<?= $ex->getMessage() ?>");
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
                        <a href="?logbook&ked_coass_p3d&u=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>&admin=<?= $_GET['data'] ?>" class="btn btn-outline-primary" title="Ubah Pencapaian Kompetensi Keterampilan (P3D)">
                            <i class="fa-solid fa-pen-to-square "></i>
                        </a>
                    </td>
                    <!-- JKH -->
                    <td class="text-center">
                        <?php
                        try {
                            $sql_jkh = "SELECT * FROM tb_logbook_ked_coass_jkh ";
                            $sql_jkh .= " WHERE id_praktikan = " . $d_praktikan['id_praktikan'];
                            // echo $sql_jkh;
                            $q_jkh  = $conn->query($sql_jkh);
                            $r_jkh  = $q_jkh->rowCount();
                        } catch (Exception $ex) {
                        ?>
                            <script>
                                alert("<?= $ex->getMessage() ?>");
                                document.location.href = '?error404';
                            </script>
                        <?php
                        }
                        ?>
                        <?php if ($r_jkh > 0) { ?>
                            <a class="btn btn-outline-info " href="#" data-toggle="modal" data-target="#m_jkh_<?= $no; ?>" title="Detail Pencapaian Kompetensi Keterampilan (P3D)">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="modal" id="m_jkh_<?= $no; ?>" style="display: none;">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-light">
                                            Jadwal Kegiatan Harian
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-bordered " id="dataTable_jkh<?= $no; ?>">
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
                                                            <td><?= tanggal($d_jkh['tgl']); ?></td>
                                                            <td><?= $d_jkh['kegiatan']; ?></td>
                                                            <td><?= $d_jkh['topik']; ?></td>
                                                        </tr>
                                                    <?php
                                                        $no0++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $("#dataTable_jkh<?= $no ?>").DataTable();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <a href="?logbook&ked_coass_jkh&data=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>&admin=<?= $_GET['data'] ?>" class="btn btn-outline-primary" title="Ubah Pencapaian Kompetensi Keterampilan (P3D)">
                            <i class="fa-solid fa-pen-to-square "></i>
                        </a>
                    </td>
                    <!-- KYD -->
                    <td class="text-center">
                        <?php
                        try {
                            $sql_kyd = "SELECT * FROM tb_logbook_ked_coass_kyd ";
                            $sql_kyd .= " WHERE id_praktikan = " . $d_praktikan['id_praktikan'];
                            // echo $sql_kyd;
                            $q_kyd  = $conn->query($sql_kyd);
                            $r_kyd  = $q_kyd->rowCount();
                        } catch (Exception $ex) {
                        ?>
                            <script>
                                alert("<?= $ex->getMessage() ?>");
                                document.location.href = '?error404';
                            </script>
                        <?php
                        }
                        ?>
                        <?php if ($r_kyd > 0) { ?>
                            <a class="btn btn-outline-info " href="#" data-toggle="modal" data-target="#m_kyd_<?= $no; ?>" title="Detail Kejadian Yang Ditemukan">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="modal" id="m_kyd_<?= $no; ?>" style="display: none;">
                                <div class="modal-dialog modal-dialog-scrollable modal-xxl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-light b">
                                            Kegiatan Yang Ditemukan
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <?php
                                                try {
                                                    $r_1 = $conn->query("SELECT * FROM tb_logbook_ked_coass_kyd WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Poliklinik/Rawat Jalan'")->rowCount();
                                                    $r_2 = $conn->query("SELECT * FROM tb_logbook_ked_coass_kyd WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Intensif/Rawat Inap'")->rowCount();
                                                    $r_3 = $conn->query("SELECT * FROM tb_logbook_ked_coass_kyd WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'IGD'")->rowCount();
                                                    $r_4 = $conn->query("SELECT * FROM tb_logbook_ked_coass_kyd WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Rehabilitasi Napza'")->rowCount();
                                                    $r_5 = $conn->query("SELECT * FROM tb_logbook_ked_coass_kyd WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'ECT'")->rowCount();
                                                } catch (PDOException $ex) {
                                                ?>
                                                    <script>
                                                        alert("<?= $ex->getMessage() ?>");
                                                        document.location.href = '?error404';
                                                    </script>
                                                <?php
                                                }
                                                ?>
                                                <div class="col-md">
                                                    Poliklinik/Rawat Jalan : <div class="badge badge-danger"><?= $r_1 ?></div><br>
                                                    Intensif/Rawat Inap : <div class="badge badge-danger"><?= $r_2 ?></div><br>
                                                    IGD : <div class="badge badge-danger"><?= $r_3 ?></div>
                                                </div>
                                                <div class="col-md my-auto">
                                                    Rehabilitasi Napza : <div class="badge badge-danger"><?= $r_4 ?></div><br>
                                                    ECT : <div class="badge badge-danger"><?= $r_5 ?></div>
                                                </div>
                                            </div>
                                            <hr class="border-1">
                                            <table class="table table-striped table-bordered " id="dataTable_kyd<?= $no; ?>">
                                                <thead class="table-dark">
                                                    <tr class="text-center">
                                                        <th scope='col'>No</th>
                                                        <th>Ruang</th>
                                                        <th>Tanggal</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Usia</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Medrec</th>
                                                        <th>Diagnosis</th>
                                                        <th>Terapi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no0 = 1;
                                                    while ($d_kyd = $q_kyd->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <tr>
                                                            <td class="text-center"><?= $no0; ?></td>
                                                            <td><?= $d_kyd['ruang']; ?></td>
                                                            <td><?= tanggal($d_kyd['tgl']); ?></td>
                                                            <td><?= $d_kyd['nama_pasien']; ?></td>
                                                            <td><?= $d_kyd['usia']; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($d_kyd['jenis_kelamin'] == "L") echo "Laki-laki";
                                                                elseif ($d_kyd['jenis_kelamin'] == "P") echo "Perempuan";
                                                                else echo "<span class='badge badge-danger'>ERROR</span>";
                                                                ?>
                                                            </td>
                                                            <td><?= $d_kyd['medrec']; ?></td>
                                                            <td><?= $d_kyd['diagnosis']; ?></td>
                                                            <td><?= $d_kyd['terapi']; ?></td>
                                                        </tr>
                                                    <?php
                                                        $no0++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $("#dataTable_kyd<?= $no ?>").DataTable();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <a href="?logbook&ked_coass_kyd&data=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>&admin=<?= $_GET['data'] ?>" class="btn btn-outline-primary" title="Detail Kejadian Yang Ditemukan">
                            <i class="fa-solid fa-pen-to-square "></i>
                        </a>
                    </td>
                    <!-- PSW -->
                    <td class="text-center">
                        <?php
                        try {
                            $sql_psw = "SELECT * FROM tb_logbook_ked_coass_psw ";
                            $sql_psw .= " WHERE id_praktikan = " . $d_praktikan['id_praktikan'];
                            // echo $sql_psw;
                            $q_psw  = $conn->query($sql_psw);
                            $r_psw  = $q_psw->rowCount();
                        } catch (Exception $ex) {
                        ?>
                            <script>
                                alert("<?= $ex->getMessage() ?>");
                                document.location.href = '?error404';
                            </script>
                        <?php
                        }
                        ?>
                        <?php if ($r_psw > 0) { ?>
                            <a class="btn btn-outline-info " href="#" data-toggle="modal" data-target="#m_psw_<?= $no; ?>" title="Detail Pembuatan Status Wajib">
                                <i class="fas fa-eye"></i>
                            </a>
                            <div class="modal" id="m_psw_<?= $no; ?>" style="display: none;">
                                <div class="modal-dialog modal-dialog-scrollable modal-xxl" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-secondary text-light">
                                            Pembuatan Status Wajib
                                            <button class="btn btn-danger btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <?php
                                                try {
                                                    $r_1 = $conn->query("SELECT * FROM tb_logbook_ked_coass_psw WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Rawat Inap'")->rowCount();
                                                    $r_2 = $conn->query("SELECT * FROM tb_logbook_ked_coass_psw WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Rawat Jalan'")->rowCount();
                                                    $r_3 = $conn->query("SELECT * FROM tb_logbook_ked_coass_psw WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Keswara'")->rowCount();
                                                    $r_4 = $conn->query("SELECT * FROM tb_logbook_ked_coass_psw WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Napza'")->rowCount();
                                                    $r_5 = $conn->query("SELECT * FROM tb_logbook_ked_coass_psw WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'Psikogeriatri'")->rowCount();
                                                    $r_6 = $conn->query("SELECT * FROM tb_logbook_ked_coass_psw WHERE id_praktikan = " . $d_praktikan['id_praktikan'] . " AND ruang = 'IGD'")->rowCount();
                                                } catch (PDOException $ex) {
                                                ?>
                                                    <script>
                                                        alert("<?= $ex->getMessage() ?>");
                                                        document.location.href = '?error404';
                                                    </script>";
                                                <?php
                                                }
                                                ?>
                                                <div class="col-md">
                                                    Rawat Inap : <?= $r_1 > 0 ? "<i class='fa-solid fa-circle-check text-success'></i>" : "<i class='fa-solid fa-circle-xmark text-danger'></i>" ?><br>
                                                    Rawat Jalan : <?= $r_2 > 0 ? "<i class='fa-solid fa-circle-check text-success'></i>" : "<i class='fa-solid fa-circle-xmark text-danger'></i>" ?><br>
                                                    Keswara : <?= $r_3 > 0 ? "<i class='fa-solid fa-circle-check text-success'></i>" : "<i class='fa-solid fa-circle-xmark text-danger'></i>" ?><br>
                                                </div>
                                                <div class="col-md my-auto">
                                                    Napza : <?= $r_4 > 0 ? "<i class='fa-solid fa-circle-check text-success'></i>" : "<i class='fa-solid fa-circle-xmark text-danger'></i>" ?><br>
                                                    Psikogeriatri : <?= $r_5 > 0 ? "<i class='fa-solid fa-circle-check text-success'></i>" : "<i class='fa-solid fa-circle-xmark text-danger'></i>" ?><br>
                                                    IGD : <?= $r_6 > 0 ? "<i class='fa-solid fa-circle-check text-success'></i>" : "<i class='fa-solid fa-circle-xmark text-danger'></i>" ?><br>
                                                </div>
                                            </div>
                                            <hr class="border-1">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered" id="dataTable<?= $no; ?>">
                                                    <thead class="table-dark">
                                                        <tr class="text-center">
                                                            <th scope='col'>No</th>
                                                            <th>Ruang</th>
                                                            <th>Nama</th>
                                                            <th>Usia</th>
                                                            <th>DD</th>
                                                            <th>Diagnosis Kerja</th>
                                                            <th>Terapi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no0 = 1;
                                                        while ($d_psw = $q_psw->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr>
                                                                <td class="text-center"><?= $no0; ?></td>
                                                                <td><?= $d_psw['ruang']; ?></td>
                                                                <td><?= $d_psw['nama']; ?></td>
                                                                <td><?= $d_psw['usia']; ?></td>
                                                                <td><?= $d_psw['dd']; ?></td>
                                                                <td><?= $d_psw['diagnosis_kerja']; ?></td>
                                                                <td><?= $d_psw['terapi']; ?></td>
                                                            </tr>
                                                        <?php
                                                            $no0++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $("#dataTable<?= $no ?>").DataTable();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <a href="?logbook&ked_coass_psw&data=<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>&admin=<?= $_GET['data'] ?>" class="btn btn-outline-primary" title="Detail Pembuatan Status Wajib">
                            <i class="fa-solid fa-pen-to-square "></i>
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