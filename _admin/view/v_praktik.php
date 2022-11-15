<?php if ($d_prvl['r_praktik'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h4 mb-2 text-gray-800">Daftar Praktik</h1>
            </div>
            <?php if ($d_prvl['c_praktik'] == "Y") { ?>
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
                                    <th rowspan="2">Tgl Mulai</th>
                                    <th rowspan="2">Tgl Selesai</th>
                                    <th rowspan="2">
                                        Jurusan
                                        <hr class="p-0 m-0 bg-gray-500">
                                        Jenjang
                                        <hr class="p-0 m-0 bg-gray-500">
                                        Profesi
                                        <hr class="p-0 m-0 bg-gray-500">
                                    </th>
                                    <th rowspan="2">
                                        Nama Koordinator
                                        <hr class="p-0 m-0 bg-gray-500">
                                        Telp Koordinator
                                        <hr class="p-0 m-0 bg-gray-500">
                                        Email Koordinator
                                        <hr class="p-0 m-0 bg-gray-500">
                                    </th>
                                    <th colspan="4">Status</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Mess</th>
                                    <th>Pembimbing</th>
                                    <th>Tarif</th>
                                    <th>Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr class="text-center">
                                        <td><?= $no; ?></td>
                                        <?php if ($_SESSION['level_user'] == 1) { ?>
                                            <td><?= $d_praktik['nama_institusi'] ?></td>
                                        <?php } ?>
                                        <td><?= $d_praktik['nama_praktik'] ?></td>
                                        <td><?= tanggal_min_alt($d_praktik['tgl_mulai_praktik']) ?></td>
                                        <td><?= tanggal_min_alt($d_praktik['tgl_selesai_praktik']) ?></td>
                                        <td>
                                            <?= $d_praktik['nama_jurusan_pdd'] ?>
                                            <hr class="p-0 m-0 bg-gray-500">
                                            <?= $d_praktik['nama_jenjang_pdd'] ?>
                                            <hr class="p-0 m-0 bg-gray-500">
                                            <?= $d_praktik['nama_profesi_pdd'] ?>
                                        </td>
                                        <td>
                                            <?= $d_praktik['nama_koordinator_praktik'] ?>
                                            <hr class="p-0 m-0 bg-gray-500">
                                            <?= $d_praktik['telp_koordinator_praktik'] ?>
                                            <hr class="p-0 m-0 bg-gray-500">
                                            <?= $d_praktik['email_koordinator_praktik'] ?>
                                        </td>
                                        <td>
                                            <?php if ($d_praktik['status_mess_praktik'] == 'Y') { ?>
                                                <span class="badge badge-success">Ya</span>
                                                <?php
                                                $q_cek_mess = $conn->query("SELECT * FROM tb_mess_pilih WHERE id_praktik=" . $d_praktik['id_praktik']);
                                                $r_cek_mess = $q_cek_mess->rowCount();
                                                if ($r_cek_mess > 0) {
                                                    echo '<span class="badge badge-success">Sudah Dipilih</span>';
                                                } else {
                                                    echo '<span class="badge badge-warning">Belum Dipilih</span>';
                                                }

                                                if ($d_prvl['c_praktik_mess'] == 'Y') {
                                                ?>
                                                    <hr class="p-0 m-1 bg-gray-500">
                                                    <a title="Lihat" class='btn btn-outline-primary btn-xs text-xs' href='?prk=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&m'>
                                                        Cek
                                                    </a>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <span class="badge badge-danger">Tidak</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($d_praktik['status_pembimbing_praktik'] != 'Y') { ?>
                                                <span class="badge badge-danger">Tidak Ada</span>
                                            <?php } else { ?>
                                                <a title="Ubah" class='btn btn-primary btn-xs' href='?prk=<?= $d_praktik['id_praktik'] ?>&m'>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($d_praktik['status_tarif_praktik'] != 'Y') { ?>
                                                <span class="badge badge-danger">Tidak Ada</span>
                                            <?php } else { ?>
                                                <a title="Ubah" class='btn btn-primary btn-xs' href='?prk=<?= $d_praktik['id_praktik'] ?>&m'>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($d_praktik['status_bayar_praktik'] != 'Y') { ?>
                                                <span class="badge badge-danger">Tidak Ada</span>
                                            <?php } else { ?>
                                                <a title="Ubah" class='btn btn-primary btn-xs' href='?prk=<?= $d_praktik['id_praktik'] ?>&m'>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a title="Ubah" class='btn btn-primary btn-xs m-1' href='#'>
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Hapus" class='btn btn-danger btn-xs' href='#'>
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
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
<?php } else {
    echo "<script>alert('Maaf anda tidak punya hak akses');document.location.href='?error401';</script>";
}
