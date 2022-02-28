<?php
if (isset($_POST['pilih_pemb_temp'])) {
    $sql_ubah_pemb_temp = "UPDATE tb_praktik SET
        id_mentor = '" . $_POST['id_mentor'] . "',
        id_unit = '" . $_POST['id_unit'] . "'
        WHERE id_praktik = '" . $_POST['id_praktik'] . "'
    ";

    $sql_ubah_status_praktikan = "UPDATE tb_praktikan SET
        status_pemb_temp_praktikan = 'PEMB. TEMP. ADA'
        WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'
    ";
    // echo $sql_ubah_status_praktikan . "<br>";
    $conn->query($sql_ubah_status_praktikan);
    // echo $sql_ubah_pemb_temp . "<br>";
    $conn->query($sql_ubah_pemb_temp);
    echo "
        <script type='text/javascript'>
            alert('data pembimbing dan tempat sudah disimpan');
            document.location.href = '?ppt';
        </script>
    ";
} elseif (isset($_POST['hapus_pemb_temp'])) {
    $sql_ubah_pemb_temp = "UPDATE tb_praktik SET
        id_mentor = '',
        id_unit = ''
        WHERE id_praktik = '" . $_POST['id_praktik'] . "'
    ";

    $sql_ubah_status_praktikan = "UPDATE tb_praktikan SET
        status_pemb_temp_praktikan = 'INPUT PEMB. TEMP.'
        WHERE id_praktikan = '" . $_POST['id_praktikan'] . "'
    ";
    // echo $sql_ubah_status_praktikan . "<br>";
    $conn->query($sql_ubah_status_praktikan);
    // echo $sql_ubah_pemb_temp . "<br>";
    $conn->query($sql_ubah_pemb_temp);
    echo "
        <script type='text/javascript'>
            alert('data pembimbing dan tempat sudah dihapus');
            document.location.href = '?ppt';
        </script>
    ";
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Pembimbing dan Tempat</h1>
            </div>
            <!-- <div class="col-lg-2 text-right">
                <a href="?dpk&a" class="btn btn-outline-info btn-sm">
                    <i>
                        <i class="fas fa-archive"></i>
                    </i>Arsip
                </a> -->
            <!-- </div> -->
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql_praktik = "SELECT * FROM tb_praktikan
                    JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik
                    JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi
                    JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd
                    JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                    JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd
                    WHERE tb_praktik.status_praktik = 'Y'
                    ORDER BY tb_praktik.tgl_selesai_praktik ASC";

                $q_praktik = $conn->query($sql_praktik);
                $r_praktik = $q_praktik->rowCount();

                if ($r_praktik > 0) {
                ?>
                    <?php
                    while ($d_praktik = $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header align-items-center bg-gray-200">
                                    <div class="row" style="font-size: small;">
                                        <br><br>
                                        <div class="col-sm-2 my-auto">
                                            <b>INSTITUSI : </b><br><?php echo $d_praktik['nama_institusi']; ?>
                                        </div>
                                        <div class="col-sm-2 my-auto">
                                            <b>GELOMBANG/KELOMPOK : </b><br><?php echo $d_praktik['nama_praktik']; ?>
                                        </div>
                                        <div class="col-sm-2 my-auto">
                                            <b>TGl SELESAI : </b><?php echo tanggal_minimal($d_praktik['tgl_selesai_praktik']); ?>
                                            <br>
                                            <b>TGL MULAI : </b><?php echo tanggal_minimal($d_praktik['tgl_mulai_praktik']); ?>
                                        </div>
                                        <div class="col-sm-2 text-center my-auto">
                                            <b>STATUS : </b>
                                            <a href="#" data-toggle="modal" data-target="#info_status">
                                                <i class="fas fa-info-circle" style="font-size: 14px;"></i>
                                            </a>

                                            <!-- modal info_status -->
                                            <div class="modal fade text-left" id="info_status">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4>INFO STATUS</h4>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-center">
                                                            <span class="badge badge-warning text-md">INPUT PEMB. TEMP.</span><br>
                                                            Lakukan proses pilih data pembimbing dan tempat/unit penempatan praktikan<br><br>
                                                            <span class="badge badge-primary text-md">PEMB. TEMP. ADA</span><br>
                                                            Data pembimbing dan tempat/unit penempatan praktikan sudah diinputkan<br><br>
                                                            <span class="badge badge-danger text-md">ERROR</span><br> Terjadi kesalahan sistem, <br><a href="?lapor" class="text-danger text-uppercase font-weight-bold">Laporkan !</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <?php
                                            if ($d_praktik['status_pemb_temp_praktikan'] == "" || $d_praktik['status_pemb_temp_praktikan'] == 'INPUT PEMB. TEMP.') {
                                            ?>
                                                <span class="badge badge-warning text-md">INPUT PEMB. TEMP.</span>
                                            <?php
                                            } elseif ($d_praktik['status_pemb_temp_praktikan'] == "PEMB. TEMP. ADA") {
                                            ?>
                                                <span class="badge badge-primary text-md"><?php echo $d_praktik['status_pemb_temp_praktikan']; ?></span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger text-md">ERROR</span>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-sm-2 text-center my-auto">
                                            <!-- tombol rincian -->
                                            <button class="btn btn-info btn-sm collapsed" data-toggle="collapse" data-target="#collapse<?php echo $d_praktik['id_praktik']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $d_praktik['id_praktik']; ?>" title="Rincian">
                                                <i class="fas fa-info-circle"> </i>
                                                Rincian
                                            </button>
                                        </div>
                                        <div class="col-sm-2 text-center my-auto">
                                            <!-- tombol pilih pembimbing dan tempat -->
                                            <a title="Tambah Data pembimbing dan tempat" class="btn btn-primary btn-sm" data-toggle='modal' data-target='#t_p_m<?php echo $d_praktik['id_praktikan']; ?>'>
                                                <i class="fas fa-user-edit"></i> Pilih
                                            </a>

                                            <!-- modal pilih pembimbing dan tempat -->
                                            <div class="modal fade text-left" id="t_p_m<?php echo $d_praktik['id_praktikan']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form class="form-group" method="post">
                                                            <div class="modal-header">
                                                                <h4>PILIH PEMBIMBING DAN TEMPAT </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <b>PEMBIMBING : </b><br>
                                                                <select class="form-control text-center" name="id_mentor" required>
                                                                    <option value="">-- Pilih --</option>
                                                                    <?php
                                                                    $sql_p = "SELECT * FROM tb_mentor 
                                                                    JOIN tb_mentor_jenis ON tb_mentor.id_mentor_jenis = tb_mentor_jenis.id_mentor_jenis
                                                                    JOIN tb_jenjang_pdd ON tb_mentor.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                                                                    JOIN tb_unit ON tb_mentor.id_unit = tb_unit.id_unit
                                                                    WHERE status_mentor = 'Aktif'
                                                                    ORDER BY nama_mentor_jenis DESC, nama_mentor ASC";

                                                                    $q_p = $conn->query($sql_p);
                                                                    while ($d_p = $q_p->fetch(PDO::FETCH_ASSOC)) {
                                                                    ?>
                                                                        <option value="<?php echo $d_p['id_mentor']; ?>">
                                                                            <?php echo $d_p['nama_mentor'] . "_" . $d_p['nama_mentor_jenis'] . "_" . $d_p['nama_jenjang_pdd']; ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <span class="font-italic text-xs">format tampilan : nama mentor_nama mentor jenis_jenjang pendidikan</span><br><br>
                                                                <b>TEMPAT</b><br>
                                                                <select class="form-control text-center" name="id_unit" required>
                                                                    <option value="">-- Pilih --</option>
                                                                    <?php
                                                                    $sql_p = "SELECT * FROM tb_unit ORDER BY nama_unit ASC";

                                                                    $q_p = $conn->query($sql_p);
                                                                    while ($d_p = $q_p->fetch(PDO::FETCH_ASSOC)) {
                                                                    ?>
                                                                        <option value="<?php echo $d_p['id_unit']; ?>">
                                                                            <?php echo $d_p['nama_unit']; ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input name="id_praktikan" value="<?php echo $d_praktik['id_praktikan']; ?>" hidden>
                                                                <input name="id_praktik" value="<?php echo $d_praktik['id_praktik']; ?>" hidden>
                                                                <button class="btn btn-primary btn-sm" type="submit" name="pilih_pemb_temp">PILIH</button>
                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <a title="Hapus Data Praktikan" class="btn btn-danger btn-sm" data-toggle='modal' data-target='#h_p_m<?php echo $d_praktik['id_praktikan']; ?>'>
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                            <!-- modal hapus data praktikan -->
                                            <div class="modal fade text-left" id="h_p_m<?php echo $d_praktik['id_praktikan']; ?>">
                                                <div class="modal-dialog" role="document">
                                                    <form class="form-group" method="post">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4>HAPUS DATA PEMBIMBING DAN ?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input name="id_praktikan" value="<?php echo $d_praktik['id_praktikan']; ?>" hidden>
                                                                <button class="btn btn-danger btn-sm" type="submit" name="hapus_praktikan">HAPUS</button>
                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- collapse data praktikan -->
                                <div id="collapse<?php echo $d_praktik['id_praktik']; ?>" class="collapse" aria-labelledby="heading<?php echo $d_praktik['id_praktik']; ?>" data-parent="#accordion">
                                    <div class="card-body " style="font-size: small;">

                                        <!-- data menu harga wajib, ujian dan sewa tempat yang dipilih -->
                                        <div class="text-gray-700">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h4 class="font-weight-bold">
                                                        DATA PEMBIMBING DAN TEMPAT
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-md">
                                            <?php
                                            $sql_pemb_temp = "SELECT * FROM tb_praktik
                                                JOIN tb_mentor ON tb_praktik.id_mentor = tb_mentor.id_mentor
                                                JOIN tb_mentor_jenis ON tb_mentor.id_mentor_jenis = tb_mentor.id_mentor_jenis
                                                JOIN tb_jenjang_pdd ON tb_mentor.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd
                                                JOIN tb_unit ON tb_praktik.id_unit = tb_unit.id_unit
                                                WHERE tb_praktik.id_mentor = '" . $d_praktik['id_mentor'] . "'
                                                ORDER BY tgl_selesai_praktik ASC";
                                            // echo $sql_pemb_temp . "<br>";
                                            $q_pemb_temp = $conn->query($sql_pemb_temp);
                                            $r_pemb_temp = $q_pemb_temp->rowCount();
                                            $d_pemp_temp = $q_pemb_temp->fetch(PDO::FETCH_ASSOC);
                                            if ($r_pemb_temp > 0) {
                                            ?>
                                                <div class="jumbotron">
                                                    <div class="jumbotron-fluid">
                                                        <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                            <div class="row text-center">
                                                                <div class="col-lg-6">
                                                                    <h4>PEMBIMBING</h4><br>
                                                                    <b>NAMA PEMBIMBING</b><br>
                                                                    <?php echo $d_pemp_temp['nama_mentor']; ?><br><br>
                                                                    <b>ID PEMBIMBING</b><br>
                                                                    <?php echo $d_pemp_temp['nip_nipk_mentor']; ?><br><br>
                                                                    <b>JENIS PEMBIMBING</b><br>
                                                                    <?php echo $d_pemp_temp['nama_mentor_jenis']; ?><br><br>
                                                                    <b>JENJANG PEMBIMBING</b><br>
                                                                    <?php echo $d_pemp_temp['nama_jenjang_pdd']; ?><br><br>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <h4>PENEMPATAN</h4><br>
                                                                    <b>UNIT</b><br>
                                                                    <?php echo $d_pemp_temp['nama_unit']; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="jumbotron">
                                                    <div class="jumbotron-fluid">
                                                        <div class="text-gray-700" style="padding-bottom: 2px; padding-top: 5px;">
                                                            <h5 class="text-center">DATA PEMBIMBING DAN TEMPAT TIDAK ADA</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php
                        }
                    } else {
                            ?>
                            <h3 class='text-center'> Data Praktikan Tidak Ada</h3>
                        <?php
                    }
                        ?>
                            </div>
                        </div>
            </div>
        <?php
    }
