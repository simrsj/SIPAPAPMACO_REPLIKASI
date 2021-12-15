<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800">Daftar Pembimbing</h1>
        </div>
        <div class="col-lg-4">
            <p>
                <a href="#" class="btn btn-success btn-sm">
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

                if ($r_mentor_rsj > 0) { ?>
                    <table class="table table-striped" id="myTable">
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
                            <?php

                            $q_mentor_rsj_a = $conn->query($sql_mentor_rsj);
                            $no = 1;

                            while ($d_mentor_rsj = $q_mentor_rsj_a->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td style='font-size:14px'><?php echo $d_mentor_rsj['nip_nipk_mentor_rsj']; ?></td>
                                    <td style='font-size:14px; width:20%'><?php echo $d_mentor_rsj['name_mentor_rsj']; ?></td>
                                    <td style='font-size:14px; width:15%'><?php echo $d_mentor_rsj['unit_mentor_rsj']; ?></td>
                                    <?php
                                    if ($d_mentor_rsj['status_mentor_rsj'] == 0) {
                                    ?>
                                        <td style='font-size:14px'>
                                            <button class='btn btn-danger btn-sm'>
                                                Tidak Aktif
                                            </button>
                                        </td>
                                    <?php
                                    } elseif ($d_mentor_rsj['status_mentor_rsj'] == 1) {
                                    ?>
                                        <td style='font-size:14px'>
                                            <button class='btn btn-success btn-sm'>
                                                Aktif
                                            </button>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                    <td>
                                        <a class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mtr_u_m" . $d_mentor_rsj['id_mentor_rsj']; ?>'>
                                            Ubah
                                        </a>
                                        <a class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#mtr_d_m" . $d_mentor_rsj['id_mentor_rsj']; ?>'>
                                            <span class='text'>Hapus</span>
                                        </a>

                                        <!-- modah ubah -->
                                        <div class="modal fade" id="<?php echo "mtr_u_m" . $d_mentor_rsj['id_mentor_rsj']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <form method="post" action="?mtr&u">
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
                                                                ?>
                                                                    <select name='unit_mentor_rsj'>
                                                                        <?php
                                                                        while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
                                                                            if (strtolower($d_unit['name_unit']) == strtolower($d_mentor_rsj['unit_mentor_rsj'])) {
                                                                        ?>
                                                                                <option selected value='<?php echo $d_unit['name_unit']; ?>'><?php echo $d_unit['name_unit']; ?></option>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <option value='<?php echo $d_unit['name_unit']; ?>'><?php echo $d_unit['name_unit']; ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Unit Tida Ada</i>
                                                                <?php
                                                                }
                                                                ?>
                                                            </p>
                                                            <p>Jenis Pembimbing : <br>
                                                                <?php
                                                                $sql_mentor_rsj_kind = "SELECT * FROM tb_mentor_rsj_kind order by name_mentor_rsj_kind ASC";

                                                                $q_mentor_rsj_kind = $conn->query($sql_mentor_rsj_kind);
                                                                $r_mentor_rsj_kind = $q_mentor_rsj_kind->rowCount();

                                                                if ($r_mentor_rsj_kind > 0) {
                                                                ?>
                                                                    <select name='info_mentor_rsj'>
                                                                        <?php
                                                                        while ($d_mentor_rsj_kind = $q_mentor_rsj_kind->fetch(PDO::FETCH_ASSOC)) {
                                                                            if (strtolower($d_mentor_rsj_kind['name_mentor_rsj_kind']) == strtolower($d_mentor_rsj['info_mentor_rsj'])) {
                                                                        ?>
                                                                                <option selected value='<?php echo $d_mentor_rsj_kind['name_mentor_rsj_kind']; ?>'><?php echo $d_mentor_rsj_kind['name_mentor_rsj_kind']; ?></option>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <option value='<?php echo $d_mentor_rsj_kind['name_mentor_rsj_kind']; ?>'><?php echo $d_mentor_rsj_kind['name_mentor_rsj_kind'] ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <i class='btn btn-danger btn-sm' style='font-size:10px'> Data Jenis Pembimbing Tidak Ada</i>
                                                                <?php
                                                                }
                                                                ?>
                                                            </p>
                                                            <p>Pendidikan Pembimbing : <br>

                                                                <?php
                                                                $sql_mentor_rsj_edu = "SELECT * FROM tb_mentor_rsj_edu order by name_mentor_rsj_edu ASC";

                                                                $q_mentor_rsj_edu = $conn->query($sql_mentor_rsj_edu);
                                                                $r_mentor_rsj_edu = $q_mentor_rsj_edu->rowCount();

                                                                if ($r_mentor_rsj_edu > 0) {
                                                                ?>
                                                                    <select name='min_mentor_rsj'>
                                                                        <?php
                                                                        while ($d_mentor_rsj_edu = $q_mentor_rsj_edu->fetch(PDO::FETCH_ASSOC)) {
                                                                            if (strtolower($d_mentor_rsj_edu['name_mentor_rsj_edu']) == strtolower($d_mentor_rsj['min_mentor_rsj'])) {
                                                                        ?>
                                                                                <option selected value='<?php echo $d_mentor_rsj_edu['name_mentor_rsj_edu']; ?>'><?php echo $d_mentor_rsj_edu['name_mentor_rsj_edu']; ?></option>
                                                                            <?php
                                                                            } else {
                                                                            ?>
                                                                                <option value='<?php echo $d_mentor_rsj_edu['name_mentor_rsj_edu']; ?>'><?php echo $d_mentor_rsj_edu['name_mentor_rsj_edu']; ?></option>
                                                                        <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <i class='btn btn-danger btn-sm' style='font-size:10px'>
                                                                        Data Pendidikan Pembimbing Tidak Ada
                                                                    </i>
                                                                <?php
                                                                }
                                                                ?>
                                                            </p>
                                                            <button type="submit" class="btn btn-success btn-sm">SIMPAN</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- modal hapus Mess -->
                                        <div class="modal fade" id="<?php echo "mtr_d_m" . $d_mentor_rsj['id_mentor_rsj']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="">
                                                        <div class="modal-header">
                                                            <h5>HAPUS MENTOR ?</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            Nama Mentor :
                                                            <h6><b><?php echo $d_mentor_rsj['nip_nipk_mentor_rsj	']; ?></b></h6>
                                                            NIP/NIPK :
                                                            <h6><b><?php echo $d_mentor_rsj['nama_pemilik_mess']; ?></b></h6>
                                                            <input name="id_mentor_rsj" value="<?php echo $d_mentor_rsj['id_mentor_rsj']; ?>" hidden>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger" name="hapus">Ya</button>
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
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
                <?php
                } else {
                ?>
                    <h3> Data Pembimbing Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>