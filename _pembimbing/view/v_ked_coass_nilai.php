    <div class="container-fluid">
        <?php
        try {
            $sql_bimbingan = "SELECT * FROM tb_praktikan ";
            $sql_bimbingan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
            $sql_bimbingan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
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
                                    <th scope="col">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_bimbingan = $q_bimbingan->fetch(PDO::FETCH_ASSOC)) {
                                ?>

                                    <?php
                                    try {
                                        $sql_nilai = "SELECT * FROM tb_nilai_ked_coass ";
                                        $sql_nilai .= " WHERE id_praktikan = " . $d_pembimbing['id_pembimbing'];
                                        // echo "$sql_nilai<br>";
                                        $q_nilai = $conn->query($sql_nilai);
                                        $d_nilai = $q_nilai->fetch(PDO::FETCH_ASSOC);
                                    } catch (Exception $ex) {
                                        echo "<script>alert('DATA BIMBINGAN PRAKTIKAN');";
                                        echo "document.location.href='?error404';</script>";
                                    }
                                    ?>
                                    <tr>
                                        <th scope="row"><?= $no; ?></th>
                                        <td><?= $d_bimbingan['nama_institusi']; ?></td>
                                        <td><?= $d_bimbingan['nama_praktikan']; ?></td>
                                        <td><?= $d_nilai['bst'] == NULL ? "-" : $d_nilai['bst'] ?></td>
                                        <td><?= $d_nilai['crs'] == NULL ? "-" : $d_nilai['crs'] ?></td>
                                        <td><?= $d_nilai['css'] == NULL ? "-" : $d_nilai['css'] ?></td>
                                        <td><?= $d_nilai['mini_cex'] == NULL ? "-" : $d_nilai['mini_cex'] ?></td>
                                        <td><?= $d_nilai['rps'] == NULL ? "-" : $d_nilai['rps'] ?></td>
                                        <td><?= $d_nilai['osler'] == NULL ? "-" : $d_nilai['osler'] ?></td>
                                        <td><?= $d_nilai['dops'] == NULL ? "-" : $d_nilai['dops'] ?></td>
                                        <td class=" text-center">
                                            <a class="btn btn-success btn-sm" href="?ked_coass_nilai&u=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . $d_bimbingan['id_praktikan']))) ?>">
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
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 mb-2 text-gray-800">Daftar Bimbingan Praktik</h1>
                </div>
            </div>
        <?php } ?>
    </div>