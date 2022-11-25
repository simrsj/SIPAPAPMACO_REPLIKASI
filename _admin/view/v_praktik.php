<?php if (isset($_GET['prk']) && isset($_GET['i']) && $d_prvl['r_praktik'] == "Y") { ?>
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
                $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                // echo $sql_praktik;
                try {
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK-');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();
                if ($r_praktik > 0) {
                ?>
                    <div class="table-responsive text-xs">
                        <table class="table table-striped table-bordered" width="100%" id="myTable">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <?php if ($_SESSION['level_user'] == 1) { ?>
                                        <th rowspan="2" width="150px">
                                            Nama Institusi
                                        </th>
                                    <?php } ?>
                                    <th rowspan="2">
                                        Nama Kelompok
                                    </th>
                                    <th rowspan="2">
                                        Jumlah <br> Praktikan
                                    </th>
                                    <th rowspan="2">
                                        Tgl Mulai<br> (YYYY-MM-DD)
                                    </th>
                                    <th rowspan="2">
                                        Tgl Selesai <br> (YYYY-MM-DD)
                                    </th>
                                    <th colspan="5">Status</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Mess</th>
                                    <th>Pembimbing</th>
                                    <th>Tarif</th>
                                    <th>Bayar</th>
                                    <th>Nilai</th>
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
                                            <td>
                                                <?= $d_praktik['nama_institusi'] ?>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <?= $d_praktik['nama_praktik'] ?>
                                        </td>
                                        <td>
                                            <?= $d_praktik['jumlah_praktik'] ?>
                                        </td>
                                        </td>
                                        <td><?= $d_praktik['tgl_mulai_praktik'] ?></td>
                                        <td><?= $d_praktik['tgl_selesai_praktik'] ?></td>
                                        <!-- status mess praktik  -->
                                        <td>
                                            <?php if ($d_praktik['status_mess_praktik'] == 'Y') { ?>
                                                <?php
                                                $sql_mess_pilih = "SELECT * FROM tb_mess_pilih ";
                                                $sql_mess_pilih .= " JOIN tb_mess ON tb_mess_pilih.id_mess = tb_mess.id_mess";
                                                $sql_mess_pilih .= " WHERE id_praktik=" . $d_praktik['id_praktik'];
                                                try {
                                                    $q_mess_pilih = $conn->query($sql_mess_pilih);
                                                } catch (Exception $ex) {
                                                    echo "<script>alert('$ex -MESS PRAKTIK-');";
                                                    echo "document.location.href='?error404';</script>";
                                                }
                                                $d_mess_pilih = $q_mess_pilih->fetch(PDO::FETCH_ASSOC);
                                                $r_mess_pilih = $q_mess_pilih->rowCount();

                                                //teks status dan privileges praktik mess
                                                if ($d_prvl['c_praktik_mess'] == 'Y' && $r_mess_pilih < 1) {
                                                ?>
                                                    <span class="badge badge-warning">Belum Dipilih</span>
                                                    <br>
                                                    <a title="Lihat" class='btn btn-outline-primary btn-xs text-xs' href='?prk=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&m_i'>
                                                        Pilih
                                                    </a>
                                                <?php
                                                } else if ($d_prvl['u_praktik_mess'] == 'Y' && $r_mess_pilih > 0) {
                                                ?>
                                                    <span class="badge badge-success">Sudah Dipilih</span>
                                                    <fieldset class="border-1 m-1 p-1">
                                                        <?= $d_mess_pilih['nama_mess']; ?>
                                                        <br>
                                                        <?= $d_mess_pilih['telp_pemilik_mess']; ?>
                                                    </fieldset>
                                                    <a title="Lihat" class='btn btn-outline-primary btn-xs text-xs' href='?prk=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&m_u'>
                                                        Ubah
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-danger">ERROR!!!</span>
                                                <?php
                                                }
                                            } else { ?>
                                                <span class="badge badge-danger">Tidak</span>
                                            <?php } ?>
                                        </td>
                                        <!-- status pembimbing praktik  -->
                                        <td class="my-auto">
                                            <?php if ($d_praktik['status_pembimbing_praktik'] == 'Y') { ?>
                                                <?php
                                                $sql_pembimbing_pilih = "SELECT * FROM tb_pembimbing_pilih WHERE id_praktik=" . $d_praktik['id_praktik'];
                                                try {
                                                    $q_pembimbing_pilih = $conn->query($sql_pembimbing_pilih);
                                                } catch (Exception $ex) {
                                                    echo "<script>alert('$ex -PEMBIMBING PRAKTIK-');";
                                                    echo "document.location.href='?error404';</script>";
                                                }
                                                $d_pembimbing_pilih = $q_pembimbing_pilih->fetch(PDO::FETCH_ASSOC);
                                                $r_pembimbing_pilih = $q_pembimbing_pilih->rowCount();

                                                //teks status dan privileges praktik pembimbing
                                                if ($d_prvl['c_praktik_pembimbing'] == 'Y' && $r_pembimbing_pilih < 1) {
                                                ?>
                                                    <span class="badge badge-warning">Belum Dipilih</span>
                                                    <hr class="p-0 m-1 bg-gray-500">
                                                    <a title="Lihat" class='btn btn-outline-primary btn-xs text-xs' href='?prk=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&m_i'>
                                                        Pilih
                                                    </a>
                                                <?php
                                                } else if ($d_prvl['u_praktik_pembimbing'] == 'Y' && $r_pembimbing_pilih > 0) {
                                                ?>
                                                    <span class="badge badge-success">Sudah Dipilih</span>
                                                    <hr class="p-0 m-1 bg-gray-500">
                                                    <a title="Lihat" class='btn btn-outline-primary btn-xs text-xs' href='?prk=<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>&m_u'>
                                                        Ubah
                                                    </a>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-danger">ERROR!!!</span>
                                                <?php
                                                }
                                            } else { ?>
                                                <span class="badge badge-danger">Tidak</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($d_praktik['status_tarif_praktik'] != 'Y') { ?>
                                                <span class="badge badge-warning">Belum Dipilih</span>
                                            <?php } else { ?>
                                                <a title="Ubah" class='btn btn-primary btn-xs' href='?prk=<?= $d_praktik['id_praktik'] ?>&m'>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($d_praktik['status_bayar_praktik'] != 'Y') { ?>
                                                <span class="badge badge-warning">Belum Dipilih</span>
                                            <?php } else { ?>
                                                <a title="Ubah" class='btn btn-primary btn-xs' href='?prk=<?= $d_praktik['id_praktik'] ?>&m'>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($d_praktik['status_nilai_praktik'] != 'Y') { ?>
                                                <span class="badge badge-warning">Belum Dipilih</span>
                                            <?php } else { ?>
                                                <a title="Ubah" class='btn btn-primary btn-xs' href='?prk=<?= $d_praktik['id_praktik'] ?>&m'>
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <!-- tombol modal detail praktik  -->
                                            <a title="Detail" class='btn btn-info btn-xs m-1' href='#' data-toggle="modal" data-target="#<?= md5($d_praktik['id_praktik']); ?>">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- modal detail praktik  -->
                                            <div class="modal fade" id="<?= md5($d_praktik['id_praktik']); ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header h5">
                                                            Detail Data Praktik
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-md">
                                                            <?php if ($_SESSION['level_user'] == 1) { ?>
                                                                Nama Institusi : <br>
                                                                <b><?= $d_praktik['nama_institusi'] ?></b>
                                                                <hr class="p-0 m-0 bg-gray-500 b">
                                                            <?php } ?>
                                                            Nama Kelompok : <br>
                                                            <b><?= $d_praktik['nama_praktik'] ?></b>
                                                            <hr class="p-0 m-0 bg-gray-500 b">
                                                            Jumlah Praktikan Kelompok : <br>
                                                            <b><?= $d_praktik['nama_praktik'] ?></b>
                                                            <hr class="p-0 m-0 bg-gray-500 b">
                                                            Jurusan : <br>
                                                            <b><?= $d_praktik['nama_jurusan_pdd'] ?></b>
                                                            <hr class="p-0 m-0 bg-gray-500 b">
                                                            Jenjang : <br>
                                                            <b><?= $d_praktik['nama_jenjang_pdd'] ?></b>
                                                            <hr class="p-0 m-0 bg-gray-500 b">
                                                            Profesi : <br>
                                                            <b><?= $d_praktik['nama_profesi_pdd'] ?></b>
                                                            <hr class="p-0 m-0 bg-gray-500 b">
                                                            Profesi : <br>
                                                            <?= $d_praktik['nama_koordinator_praktik'] ?>
                                                            <hr class="p-0 m-0 bg-gray-500">
                                                            <?= $d_praktik['telp_koordinator_praktik'] ?>
                                                            <hr class="p-0 m-0 bg-gray-500">
                                                            <?= $d_praktik['email_koordinator_praktik'] ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
