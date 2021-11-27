<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Daftar Pembimbing</h1>
        </div>
        <div class="col-lg-4">
            <p>
                <a href="#" class="btn btn-success">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </p>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <?php
                $sql_mentor_rsj = "SELECT * FROM tb_mentor_rsj order by name_mentor_rsj ASC";

                $q_mentor_rsj = $conn->query($sql_mentor_rsj);
                $r_mentor_rsj = $q_mentor_rsj->rowCount();
                $d_mentor_rsj = $q_mentor_rsj->fetch(PDO::FETCH_ASSOC);

                if ($r_mentor_rsj > 0) {
                    echo "
                                        <table class='table table-striped'>
                                            <thead>
                                                <tr>
                                                    <th scope='col'>No</th>
                                                    <th>NIP/NIPK</th>
                                                    <th>Nama Pembimbing</th>
                                                    <th>Unit</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                    ";

                    $q_mentor_rsj_a = $conn->query($sql_mentor_rsj);

                    $no = 1;

                    while ($d_mentor_rsj = $q_mentor_rsj_a->fetch(PDO::FETCH_ASSOC)) {
                        echo "
                                            <tr>
                                                <td>$no</td>
                                                <td style='font-size:14px'>" . $d_mentor_rsj['nip_nipk_mentor_rsj'] . "</td>
                                                <td style='font-size:14px; width:20%'>" . $d_mentor_rsj['name_mentor_rsj'] . "</td>
                                                <td style='font-size:14px; width:15%'>" . $d_mentor_rsj['unit_mentor_rsj'] . "</td>
                                            ";
                        if ($d_mentor_rsj['status_mentor_rsj'] == 0) {
                            echo "<td style='font-size:14px'>
                                                    <button  class='btn btn-danger btn-sm'>
                                                        Tidak Aktif
                                                    </button>
                                                    </td>";
                        } elseif ($d_mentor_rsj['status_mentor_rsj'] == 1) {
                            echo "<td style='font-size:14px'>
                                                    <button  class='btn btn-success btn-sm'>
                                                        Aktif
                                                    </button>
                                                    </td>";
                        }
                        echo "
                                                <td>   
                                                    <a class='btn btn-secondary btn-sm' href='#' data-toggle='modal' data-target='#pmb_u_m" . $d_mentor_rsj['id_mentor_rsj'] . "'>
                                                        Ubah
                                                    </a>      
                                                    <a href='?pmb_d&id=" . $d_mentor_rsj['id_mentor_rsj'] . "' class='btn btn-danger btn-sm'>
                                                        <span class='text'>Hapus</span>
                                                    </a>    
                                                </td>
                                            </tr>
                                        ";
                        $no++;
                ?>
                        <div class="modal fade" id="<?php echo "pmb_u_m" . $d_mentor_rsj['id_mentor_rsj']; ?>">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form method="post" action="?pmb&u">
                                            <input name="id_mentor_rsj" value="<?php echo $d_mentor_rsj['id_mentor_rsj']; ?>" hidden>
                                            <p>NIP/NIPK : <br>
                                                <input name="nip_nipk_mentor_rsj" value="<?php echo $d_mentor_rsj['nip_nipk_mentor_rsj']; ?>"><br>
                                            </p>
                                            <p>Nama Pembimbing : <br>
                                                <input name="name_mentor_rsj" value="<?php echo $d_mentor_rsj['name_mentor_rsj']; ?>" size="35px"><br>
                                            </p>
                                            <p>Unit/Ruangan : <br>

                                                <?php
                                                $sql_unit = "SELECT * FROM tb_unit order by name_unit ASC";

                                                $q_unit = $conn->query($sql_unit);
                                                $r_unit = $q_unit->rowCount();

                                                if ($r_unit > 0) {
                                                    echo "<select name='unit_mentor_rsj'>";
                                                    while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
                                                        if (strtolower($d_unit['name_unit']) == strtolower($d_mentor_rsj['unit_mentor_rsj'])) {
                                                            echo "
                                                                            <option selected value='" . $d_unit['name_unit'] . "'>" . $d_unit['name_unit'] . "</option>
                                                                            ";
                                                        } else {
                                                            echo "
                                                                            <option value='" . $d_unit['name_unit'] . "'>" . $d_unit['name_unit'] . "</option>
                                                                            ";
                                                        }
                                                    }
                                                    echo "</select>";
                                                } else {
                                                    echo "<i class='btn btn-danger btn-sm' style='font-size:10px'> Data Unit Tida Ada</i>";
                                                }
                                                ?>

                                            </p>
                                            <p>Jenis Pembimbing : <br>

                                                <?php
                                                $sql_mentor_rsj_kind = "SELECT * FROM tb_mentor_rsj_kind order by name_mentor_rsj_kind ASC";

                                                $q_mentor_rsj_kind = $conn->query($sql_mentor_rsj_kind);
                                                $r_mentor_rsj_kind = $q_mentor_rsj_kind->rowCount();

                                                if ($r_mentor_rsj_kind > 0) {
                                                    echo "<select name='info_mentor_rsj'>";
                                                    while ($d_mentor_rsj_kind = $q_mentor_rsj_kind->fetch(PDO::FETCH_ASSOC)) {
                                                        if (strtolower($d_mentor_rsj_kind['name_mentor_rsj_kind']) == strtolower($d_mentor_rsj['info_mentor_rsj'])) {
                                                            echo "
                                                                            <option selected value='" . $d_mentor_rsj_kind['name_mentor_rsj_kind'] . "'>" . $d_mentor_rsj_kind['name_mentor_rsj_kind'] . "</option>
                                                                            ";
                                                        } else {
                                                            echo "
                                                                            <option value='" . $d_mentor_rsj_kind['name_mentor_rsj_kind'] . "'>" . $d_mentor_rsj_kind['name_mentor_rsj_kind'] . "</option>
                                                                            ";
                                                        }
                                                    }
                                                    echo "</select>";
                                                } else {
                                                    echo "<i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>";
                                                }
                                                ?>
                                            </p>
                                            <p>Pendidikan Pembimbing : <br>

                                                <?php
                                                $sql_mentor_rsj_edu = "SELECT * FROM tb_mentor_rsj_edu order by name_mentor_rsj_edu ASC";

                                                $q_mentor_rsj_edu = $conn->query($sql_mentor_rsj_edu);
                                                $r_mentor_rsj_edu = $q_mentor_rsj_edu->rowCount();

                                                if ($r_mentor_rsj_edu > 0) {
                                                    echo "<select name='min_mentor_rsj'>";
                                                    while ($d_mentor_rsj_edu = $q_mentor_rsj_edu->fetch(PDO::FETCH_ASSOC)) {
                                                        if (strtolower($d_mentor_rsj_edu['name_mentor_rsj_edu']) == strtolower($d_mentor_rsj['min_mentor_rsj'])) {
                                                            echo "
                                                                            <option selected value='" . $d_mentor_rsj_edu['name_mentor_rsj_edu'] . "'>" . $d_mentor_rsj_edu['name_mentor_rsj_edu'] . "</option>
                                                                            ";
                                                        } else {
                                                            echo "
                                                                            <option value='" . $d_mentor_rsj_edu['name_mentor_rsj_edu'] . "'>" . $d_mentor_rsj_edu['name_mentor_rsj_edu'] . "</option>
                                                                            ";
                                                        }
                                                    }
                                                    echo "</select>";
                                                } else {
                                                    echo "<i class='btn btn-danger btn-sm' style='font-size:10px'> Data Pendidikan Pembimbing Tidak Ada</i>";
                                                }
                                                ?>
                                            </p>
                                            <button type="submit" class="btn btn-success btn-sm">SIMPAN</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }

                    echo "
                                            </tbody>
                                        </table>
                                    ";
                } else {
                    echo "
                                        <h3> Data Pembimbing Tidak Ada</h3>
                                    ";
                }
                ?>
            </div>
        </div>
    </div>
</div>