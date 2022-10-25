<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h4 mb-2 text-gray-800">Daftar Praktik</h1>
        </div>
        <?php if ($d_prvl['i_praktik'] == "Y") { ?>
            <div class="col-lg-2 text-right">
                <a href="?prk&i" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        <?php } ?>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <?php
            $sql_praktik = "SELECT * FROM tb_praktik ";
            $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
            $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
            $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
            $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
            $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
            // $sql_praktik .= " WHERE tb_praktik.status_praktik != 'A' ";
            $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";

            // echo $sql_praktik;

            $q_praktik = $conn->query($sql_praktik);
            $r_praktik = $q_praktik->rowCount();
            if ($r_praktik > 0) {
            ?>
                <div class="table-responsive text-xs">
                    <table class="table table-striped table-bordered" width="100%" id="myTable">
                        <thead class="table-dark text-center">
                            <tr>
                                <th rowspan="2">No</th>
                                <?php if ($_SESSION['level_user'] == 1) { ?>
                                    <th rowspan="2"> Nama Institusi</th>
                                <?php } ?>
                                <th rowspan="2">Nama Kelompok</th>
                                <!-- <th colspan="3">Pendidikan</th> -->
                                <th colspan="3">Koordinator</th>
                                <th colspan="3">Status</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <!-- <th>Jurusan</th>
                                <th>Pendidikan</th>
                                <th>Profesi</th> -->
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Mess</th>
                                <th>Tempat</th>
                                <th>Pembimbing</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <?php if ($_SESSION['level_user'] == 1) { ?>
                                        <td><?= $d_praktik['nama_institusi'] ?></td>
                                    <?php } ?>
                                    <td><?= $d_praktik['nama_praktik'] ?></td>
                                    <!-- <td><?= $d_praktik['nama_jurusan_pdd'] ?></td>
                                    <td><?= $d_praktik['nama_jenjang_pdd'] ?></td>
                                    <td><?= $d_praktik['nama_profesi_pdd'] ?></td> -->
                                    <td><?= $d_praktik['nama_koordinator_praktik'] ?></td>
                                    <td><?= $d_praktik['telp_koordinator_praktik'] ?></td>
                                    <td><?= $d_praktik['email_koordinator_praktik'] ?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                                ?>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <h3 class="text-center"> Data Praktik Tidak Ada</h3>
            <?php
            }
            ?>
        </div>
    </div>
</div>