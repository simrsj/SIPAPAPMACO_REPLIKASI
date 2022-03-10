<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
?>
<div class="card shadow mb-4">
    <div class="card-body">
        <?php
        $sql = "SELECT * FROM tb_tempat 
            JOIN tb_jurusan_pdd_jenis ON tb_tempat.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis 
            JOIN tb_harga_satuan ON tb_tempat.id_harga_satuan = tb_harga_satuan.id_harga_satuan
            WHERE status_tempat = 'y'
            ORDER BY nama_tempat ASC";
        $q = $conn->query($sql);
        if ($q->rowCount() > 0) {
        ?>
            <div class="table-responsive">
                <table class="table table-hover" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th scope='col'>No</th>
                            <th>Nama Tempat</th>
                            <th>Jenis Jurusan</th>
                            <th>Kapasitas</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Tanggal Input</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d['nama_tempat']; ?></td>
                                <td><?php echo $d['nama_jurusan_pdd_jenis']; ?></td>
                                <td><?php echo $d['kapasitas_tempat']; ?></td>
                                <td><?php echo $d['nama_harga_satuan']; ?></td>
                                <td><?php echo "Rp " . number_format($d['harga_tempat'], 0, '.', '.'); ?></td>
                                <td><?php echo $d['ket_tempat']; ?></td>
                                <td><?php echo $d['tgl_input_tempat']; ?></td>
                                <td>

                                    <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#tmp_u_m" . $d['id_tempat']; ?>'>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#tmp_d_m" . $d['id_tempat']; ?>'>
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <!-- modal ubah tempat  -->
                                    <div class="modal fade" id="<?php echo "tmp_u_m" . $d['id_tempat']; ?>" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_uTempat">
                                                    <div class="modal-header">
                                                        <b>UBAH TEMPAT</b>
                                                    </div>
                                                    <div class="modal-body">
                                                        Nama Tempat : <span style="color:red">*</span><br>
                                                        <input type="text" class="form-control" name="nama" id="namau" value="<?php echo $d['nama_tempat']; ?>" required>
                                                        <div id="err_namau" class="text-danger text-xs font-italic"></div><br>
                                                        Kapasitas : <span style="color:red">*</span><br>
                                                        <input type="number" min="1" class="form-control" name="kapasitas" id="kapasitasu" value="<?php echo $d['kapasitas_tempat']; ?>" required>
                                                        <div id="err_kapasitasu" class="text-danger text-xs font-italic"></div><br>
                                                        Harga : <span style="color:red">*</span><br>
                                                        <input type="number" min="1" class="form-control" name="harga" id="hargau" value="<?php echo $d['harga_tempat']; ?>" required>
                                                        <div id="err_hargau" class="text-danger text-xs font-italic"></div><br>
                                                        Satuan : <span style="color:red">*</span><br>
                                                        <?php
                                                        $sql_satuan = "SELECT * FROM tb_harga_satuan ORDER BY nama_harga_satuan ASC";
                                                        $q_satuan = $conn->query($sql_satuan);
                                                        ?>
                                                        <select class='js-example-placeholder-single form-control' name='satuan' id="satuanu" required>
                                                            <option value="">-- <i>Pilih</i>--</option>
                                                            <?php
                                                            while ($d_satuan = $q_satuan->fetch(PDO::FETCH_ASSOC)) {
                                                                if ($d['id_harga_sautan'] == $d_satuan['id_harga_sautan']) {
                                                                    $cek = 'selected';
                                                                } else {
                                                                    $cek = '';
                                                                }
                                                            ?>
                                                                <option value='<?php echo $d_satuan['id_harga_satuan']; ?>' <?php echo $cek; ?>>
                                                                    <?php echo $d_satuan['nama_harga_satuan']; ?>
                                                                </option>
                                                            <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </select><br>
                                                        <div class="text-danger font-weight-bold  font-italic text-xs" id="err_satuanu"></div>
                                                        Jenis Jurusan : <span style="color:red">*</span><br>
                                                        <div class="boxed-check-group boxed-check-primary boxed-check-sm">
                                                            <?php

                                                            $jj1 = "";
                                                            $jj2 = "";
                                                            $jj3 = "";
                                                            $jj4 = "";
                                                            if ($d['id_jurusan_pdd_jenis'] == 1) {
                                                                $jj1 = 'checked';
                                                            } elseif ($d['id_jurusan_pdd_jenis'] == 2) {
                                                                $jj2 = 'checked';
                                                            } elseif ($d['id_jurusan_pdd_jenis'] == 3) {
                                                                $jj3 = 'checked';
                                                            } else {
                                                                $jj4 = 'checked';
                                                            }

                                                            ?>
                                                            <label class="boxed-check">
                                                                <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan1u" value="1" required <?php echo $jj1; ?>>
                                                                <span class="boxed-check-label">Kedokteran</span>
                                                            </label>
                                                            <label class="boxed-check">
                                                                <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan2u" value="2" <?php echo $jj2; ?>>
                                                                <span class="boxed-check-label">Keperawatan</span>
                                                            </label>
                                                            <label class="boxed-check">
                                                                <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan3u" value="3" <?php echo $jj3; ?>>
                                                                <span class="boxed-check-label">Nakes Lainnya</span>
                                                            </label>
                                                            <label class="boxed-check">
                                                                <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan4u" value="4" <?php echo $jj4; ?>>
                                                                <span class="boxed-check-label">Non-Nakes</span>
                                                            </label>
                                                        </div>
                                                        <div id="err_jenis_jurusanu" class="text-danger text-xs font-italic"></div><br>
                                                        Keterangan : <br>
                                                        <textarea name="keterangan" class="form-control"><?php echo $d['ket_tempat']; ?></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input name="id" value="<?php echo $d['id_tempat']; ?>" hidden>
                                                        <button class="btn btn-success btn-sm" type="button" name="ubah_tempat" id="ubah_tempat">Ubah</button>
                                                        <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
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
            </div>
        <?php
        } else {
        ?>
            <h3 class="text-center"> Data Tempat Tidak Ada</h3>
        <?php
        }
        ?>
    </div>
</div>