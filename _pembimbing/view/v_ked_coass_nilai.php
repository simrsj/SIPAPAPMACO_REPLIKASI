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
                    Penilaian Praktikan Kedokteran Co-Ass
                </div>
                <div class="card-body p-2">
                    <div class="table-responsive">
                        <table class="table table-striped" id="dataTable">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Institusi</th>
                                    <th scope="col">Nama Praktikan</th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="BEDSIDE TEACHING">
                                        BST &nbsp;&nbsp;
                                    </th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="CASE REPORT SESSION/TUTORIAL">
                                        CRS&nbsp;&nbsp;
                                    </th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="CLINICAL SCIENCE SESSION/REFERAT/JOURNAL READING">
                                        CSS&nbsp;&nbsp;
                                    </th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="MINI CLINICAL EXAMINATION">
                                        MINI C-EX&nbsp;&nbsp;
                                    </th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="RESOURCE PERSON SESION">
                                        RPS&nbsp;&nbsp;
                                    </th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="OBJECTIVE STRUKTURED LONG EXAMINATION STRUKTURED">
                                        OSLER&nbsp;&nbsp;
                                    </th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="DIRECT OBSERVATION PROCEDURAL SKILLS">
                                        DOPS&nbsp;&nbsp;
                                    </th>
                                    <th scope="col" data-toggle="tooltip" data-placement="top" title="CASE BASED DISCUSSION">
                                        CBD&nbsp;&nbsp;
                                    </th>
                                    <th scope="col">Nilai</th>
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
                                        <td><?= $d_bimbingan['bst'] == NULL ? "-" : $d_bimbingan['bst'] ?></td>
                                        <td><?= $d_bimbingan['crs'] == NULL ? "-" : $d_bimbingan['crs'] ?></td>
                                        <td><?= $d_bimbingan['css'] == NULL ? "-" : $d_bimbingan['css'] ?></td>
                                        <td><?= $d_bimbingan['minicex'] == NULL ? "-" : $d_bimbingan['minicex'] ?></td>
                                        <td><?= $d_bimbingan['rps'] == NULL ? "-" : $d_bimbingan['rps'] ?></td>
                                        <td><?= $d_bimbingan['osler'] == NULL ? "-" : $d_bimbingan['osler'] ?></td>
                                        <td><?= $d_bimbingan['dops'] == NULL ? "-" : $d_bimbingan['dops'] ?></td>
                                        <td><?= $d_bimbingan['cbd'] == NULL ? "-" : $d_bimbingan['cbd'] ?></td>
                                        <td class=" text-center">
                                            <a class="btn btn-outline-success btn-sm" href="?ked_coass_nilai&u=<?= urlencode(encryptString($d_bimbingan['id_praktikan'], $customkey)) ?>">
                                                Nilai
                                            </a>
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