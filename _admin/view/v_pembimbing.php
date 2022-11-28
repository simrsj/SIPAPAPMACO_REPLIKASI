<?php if (isset($_GET['pmbb']) && $d_prvl['r_praktik_pembimbing'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Pembimbing dan Ruangan</h1>
            </div>
            <!-- <div class="col-lg-2 text-right">
            <a href="?dpk&a" class="btn btn-outline-info btn-sm">
                <i>
                    <i class="fas fa-archive"></i>
                </i>Arsip
            </a>
        </div> -->
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
                $sql_praktik .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik ";
                $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                $sql_praktik .= " GROUP BY tb_praktikan.id_praktik ";
                $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";

                // echo "$sql_praktik<br>";
                try {
                    $q_praktik = $conn->query($sql_praktik);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {

                        $sql_data_praktikan = "SELECT * FROM tb_pembimbing_pilih ";
                        $sql_data_praktikan .= " JOIN tb_pembimbing ON tb_pembimbing_pilih.id_pembimbing = tb_pembimbing.id_pembimbing ";
                        $sql_data_praktikan .= " JOIN tb_praktikan ON tb_pembimbing_pilih.id_praktikan = tb_praktikan.id_praktikan ";
                        $sql_data_praktikan .= " JOIN tb_unit ON tb_pembimbing_pilih.id_unit = tb_unit.id_unit ";
                        $sql_data_praktikan .= " JOIN tb_praktik ON tb_pembimbing_pilih.id_praktik = tb_praktik.id_praktik ";
                        $sql_data_praktikan .= " WHERE tb_praktik.status_praktik = 'Y' AND tb_praktik.id_praktik = " . $d_praktik['id_praktik'];
                        $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
                        // echo "$sql_data_praktikan<br>";
                        try {
                            $q_data_praktikan = $conn->query($sql_data_praktikan);
                        } catch (Exception $ex) {
                            echo "<script>alert('$ex -DATA PRAKTIK');";
                            echo "document.location.href='?error404';</script>";
                        }
                        $r_data_praktikan = $q_data_praktikan->rowCount();
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;" class="justify-content-center">
                                        <br><br>
                                        <div class="col-sm-4 text-center">
                                            <?php if ($_SESSION['level_user'] == 1) { ?>
                                                <b class="text-gray-800">INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?><br>
                                            <?php } ?>
                                            <b class="text-gray-800">GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>

                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">TANGGAL MULAI : </b><br><?php echo tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                                            <b class="text-gray-800">TANGGAL SELESAI : </b><br><?php echo tanggal($d_praktik['tgl_selesai_praktik']); ?>
                                        </div>
                                        <div class="col-sm-2 text-center">
                                            <b class="text-gray-800">JURUSAN : </b><br><?php echo $d_praktik['nama_jurusan_pdd']; ?><br>
                                            <b class="text-gray-800">JENJANG : </b><br><?php echo $d_praktik['nama_jenjang_pdd']; ?>
                                        </div>
                                        <div class="col-sm-3 text-center">
                                            <b class="text-gray-800">PROFESI : </b><br><?php echo $d_praktik['nama_profesi_pdd']; ?><br>
                                            <b class="text-gray-800">JUMLAH PRAKTIKAN : </b><br><?php echo $d_praktik['jumlah_praktik']; ?>
                                        </div>
                                        <!-- tombol aksi/info proses  -->
                                        <div class="col-sm-1 my-auto text-right">
                                            <!-- tombol rincian -->
                                            <a class="btn btn-info btn-sm collapsed m-0 " data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"></i> Rincian
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data pembimbing -->
                                <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: medium;">
                                        <!-- data praktikan -->
                                        <div class="row text-gray-700">
                                            <div class="col">
                                                <h4 class="font-weight-bold">DATA PEMBIMBING DAN RUANGAN</h4><br>
                                            </div>
                                            <?php if ($d_prvl['c_praktik_pembimbing'] == 'Y') { ?>
                                                <div class="col-2 text-right">
                                                    <!-- tombol modal tambah praktikan  -->
                                                    <a title="tambah praktikan" class='btn btn-success btn-sm tambah_init<?= md5($d_praktik['id_praktik']); ?>' href='#' data-toggle="modal" data-target="#mi<?= md5($d_praktik['id_praktik']); ?>">
                                                        <i class="fas fa-plus"></i> Tambah Data
                                                    </a>

                                                    <!-- modal tambah praktikan  -->
                                                    <div class="modal fade text-center" id="mi<?= md5($d_praktik['id_praktik']); ?>" data-backdrop="static">
                                                        <div class="modal-dialog modal-dialog-scrollable  modal-md">
                                                            <div class="modal-content">
                                                                <div class="modal-header h5">
                                                                    Tambah Praktikan
                                                                </div>
                                                                <div class="modal-body text-md">
                                                                    <form class="form-data b" method="post" id="form_t<?= md5($d_praktik['id_praktik']); ?>">
                                                                        No. ID Praktikan (NIM/NPM/NIP) : <span style="color:red">*</span><br>
                                                                        <input type="text" id="t_no_id<?= md5($d_praktik['id_praktik']); ?>" name="t_no_id" class="form-control" placeholder="Isikan No ID" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_no_id"></div><br>
                                                                        Nama Siswa/Mahasiswa : <span style="color:red">*</span><br>
                                                                        <input type="text" id="t_nama<?= md5($d_praktik['id_praktik']); ?>" name="t_nama" class="form-control" placeholder="Inputkan Nama Siswa/Mahasiswa" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_nama"></div><br>
                                                                        Tanggal Lahir : <span style="color:red">*</span><br>
                                                                        <input type="date" id="t_tgl<?= md5($d_praktik['id_praktik']); ?>" name="t_tgl" class="form-control" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_tgl"></div><br>
                                                                        Alamat : <span style="color:red">*</span><br>
                                                                        <textarea id="t_alamat<?= md5($d_praktik['id_praktik']); ?>" name="t_alamat" class="form-control" rows="2" placeholder="Inputkan Alamat"></textarea>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_alamat"></div><br>
                                                                        No Telepon : <span style="color:red">*</span><br>
                                                                        <input type="number" id="t_telpon<?= md5($d_praktik['id_praktik']); ?>" name="t_telpon" class="form-control" min="1" placeholder="Inputkan No Telpon" required>
                                                                        <div class="text-danger b i text-xs blink" id="err_t_telpon"></div><br>
                                                                        No WhatsApp :<br>
                                                                        <input type="number" id="t_wa<?= md5($d_praktik['id_praktik']); ?>" name="t_wa" class="form-control" min="1" placeholder="Inputkan WhatsApp">
                                                                        <div class="text-danger b i text-xs blink" id="err_t_wa"></div><br>
                                                                        E-Mail : <br>
                                                                        <input type="email" id="t_email<?= md5($d_praktik['id_praktik']); ?>" name="t_email" class="form-control" placeholder="Inputkan E-Mail">
                                                                        <div class="text-danger b i text-xs blink" id="err_t_email"></div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer text-md">
                                                                    <a class="btn btn-danger btn-sm tambah_tutup<?= md5($d_praktik['id_praktik']); ?>" data-dismiss="modal">
                                                                        Kembali
                                                                    </a>
                                                                    &nbsp;
                                                                    <a class="tambah btn btn-success btn-sm tambah<?= md5($d_praktik['id_praktik']); ?>" id="<?= urlencode(base64_encode($d_praktik['id_praktik'])); ?>">
                                                                        Simpan
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <?php
                                        if ($r_data_praktikan > 0) {
                                        ?>
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="myTable">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Pembimbing</th>
                                                            <th scope="col">Ruangan </th>
                                                            <th scope="col">Nama Praktikan </th>
                                                            <th scope="col">NIM / NPM / NIS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $total_jumlah_tarif = 0;
                                                        $no = 1;
                                                        while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $no; ?></th>
                                                                <td><?php echo $d_data_praktikan['nama_pembimbing']; ?></td>
                                                                <td><?php echo $d_data_praktikan['nama_unit']; ?></td>
                                                                <td><?php echo $d_data_praktikan['nama_praktikan']; ?></td>
                                                                <td><?php echo $d_data_praktikan['no_id_praktikan']; ?></td>
                                                            </tr>
                                                        <?php
                                                            $no++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="jumbotron">
                                                <div class="jumbotron-fluid">
                                                    <div class="text-gray-700">
                                                        <h5 class="text-center">Data Pembimbing dan Ruangan Tidak Ada</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-gray-800">
                    <?php
                    }
                } else {
                    ?>
                    <h3 class='text-center'> Data Pendaftaran Praktikan Anda Tidak Ada</h3>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
