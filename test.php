<div class="row boxed-check-group boxed-check-primary justify-content-center">
    <label class="boxed-check">
        <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian1" value="y">
        <div class="boxed-check-label">Ya</div>
    </label>
    &nbsp;
    <label class="boxed-check">
        <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian2" value="t">
        <div class="boxed-check-label">Tidak</div>
    </label>
</div>
<br>
<div id="tarif_ujian" style="display: none;">
    <?php
    $id_jurusan_pdd = 2;
    $sql_tarif_ujian = " SELECT * FROM tb_tarif ";
    $sql_tarif_ujian .= " JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis ";
    $sql_tarif_ujian .= " JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan ";
    $sql_tarif_ujian .= " WHERE tb_tarif.id_tarif_jenis = 6 AND tb_tarif.id_jurusan_pdd = " . $id_jurusan_pdd;
    $sql_tarif_ujian .= " ORDER BY nama_tarif_jenis ASC";

    // echo $sql_tarif_ujian;
    $q_tarif_ujian = $conn->query($sql_tarif_ujian);
    $r_tarif_ujian = $q_tarif_ujian->rowCount();

    if ($r_tarif_ujian > 0) {
    ?>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Jenis</th>
                    <th scope="col">Nama Tarif</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Frekuensi</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Total Tarif</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $jumlah_total_ujian = 0;
                $no = 1;
                while ($d_tarif_ujian = $q_tarif_ujian->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $d_tarif_ujian['nama_tarif_jenis']; ?></td>
                        <td><?php echo $d_tarif_ujian['nama_tarif']; ?></td>
                        <td><?php echo $d_tarif_ujian['nama_tarif_satuan']; ?></td>
                        <td> <?php echo "Rp " . number_format($d_tarif_ujian['jumlah_tarif'], 0, ",", "."); ?></td>
                        <td>
                            <?php

                            if ($d_tarif_ujian['tipe_tarif'] == 'SEKALI') {
                                $frekuensi = 1;
                            } elseif ($d_tarif_ujian['tipe_tarif'] == 'INPUT') {
                            ?>
                                <input class="form-control" name="<?php echo $d_praktik['id_praktik'] . "-" . $d_tarif_ujian['id_tarif'] ?>">
                            <?php
                            } elseif ($d_tarif_ujian['tipe_tarif'] == 'TARIF-') {
                                $frekuensi = tanggal_between_nonweekend($tgl_mulai_praktik, $tgl_selesai_praktik);
                            } elseif ($d_tarif_ujian['tipe_tarif'] == 'TARIF+') {
                                $frekuensi = tanggal_between($tgl_mulai_praktik, $tgl_selesai_praktik);
                            } elseif ($d_tarif_ujian['tipe_tarif'] == 'MINGGUAN') {
                                $frekuensi = tanggal_between_week($tgl_mulai_praktik, $tgl_selesai_praktik);
                            } else {
                                $frekuensi = $d_tarif_ujian['tipe_tarif'];
                            }

                            if ($d_tarif_ujian['frekuensi_tarif'] != 0) {
                                $frekuensi = $d_tarif_ujian['frekuensi_tarif'];
                            }
                            echo $frekuensi;
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($d_tarif_ujian['kuantitas_tarif'] != 0) {
                                $kuantitas = $d_tarif_ujian['kuantitas_tarif'];
                            } else {
                                $kuantitas = $jumlah_praktik;
                            }
                            echo $kuantitas;
                            ?>
                        </td>
                        <td><?php echo "Rp " . number_format($frekuensi * $kuantitas * $d_tarif_ujian['jumlah_tarif'], 0, ",", "."); ?></td>
                    </tr>
                <?php
                    $jumlah_total_ujian = ($frekuensi * $kuantitas * $d_tarif_ujian['jumlah_tarif']) + $jumlah_total_ujian;
                    $no++;
                }
                ?>
                <tr>
                    <td colspan="7" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                    <td class="font-weight-bold"><?php echo "Rp " . number_format($jumlah_total_ujian, 0, ",", "."); ?></td>
                </tr>
            </tbody>
        </table>
    <?php
    } else {
    ?>
        <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
            <h5 class="text-center">Data Tarif Tidak Ada</h5>
        </div>
    <?php
    }
    ?>
</div>
<div class="row boxed-check-group boxed-check-primary justify-content-center">
    <label class="boxed-check">
        <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian12" value="y">
        <div class="boxed-check-label">Ya</div>
    </label>
    &nbsp;
    <label class="boxed-check">
        <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian22" value="t">
        <div class="boxed-check-label">Tidak</div>
    </label>
</div>
<script>
    $("#cek_pilih_ujian12").on('change', function() {
        $("#tarif_ujian").slideDown();
    });
    $("#cek_pilih_ujian22").on('change', function() {
        $("#tarif_ujian").slideUp();
    });
    // var cek_pilih_ujian1 = $("#cek_pilih_ujian1").attr('checked', true).trigger('click');
    // var cek_pilih_ujian2 = $("#cek_pilih_ujian2").attr('checked', false).trigger('click');

    // console.log('CEK PILIH UJIAN 1 ' + cek_pilih_ujian1);
    // console.log('CEK PILIH UJIAN 2 ' + cek_pilih_ujian2);
</script>