?>
<!-- Pilih Pembimbing dan Tempat  -->
<div class="row">
    <div class="col-md text-center">
        Pembimbing : <br>
        <?php
        if ($id_jurusan_pdd == 1) {
            if ($id_profesi_pdd == 1) {
                $jenis_pmbb = "PPDS";
            } elseif ($id_profesi_pdd == 2) {
                $jenis_pmbb = "PSPD";
            }
        } elseif ($id_jurusan_pdd == 2) {
            $jenis_pmbb = "CI KEP";
        } elseif ($id_jurusan_pdd == 3) {
            $jenis_pmbb = "CI PSI";
        } elseif ($id_jurusan_pdd == 4) {
            $jenis_pmbb = "CI IT";
        } elseif ($id_jurusan_pdd == 5) {
            $jenis_pmbb = "CI FAR";
        } elseif ($id_jurusan_pdd == 6) {
            $jenis_pmbb = "CI PEKSOS";
        } elseif ($id_jurusan_pdd == 7) {
            $jenis_pmbb = "CI KESLING";
        }
        $sql_pmbb = "SELECT * FROM tb_pembimbing";
        $sql_pmbb .= " WHERE jenis_pembimbing = '" . $jenis_pmbb . "' AND status_pembimbing = 'y'";
        $sql_pmbb .= " ORDER BY nama_pembimbing ASC";

        $q_pmbb = $conn->query($sql_pmbb);
        ?>

        <select class='form-inline js-example-placeholder-single' aria-label='Default select example' name="id_pembimbing<?php echo $x; ?>" id="id_pembimbing<?php echo $x; ?>" required>
            <option value="">-- Pilih --</option>
            <?php
            while ($d_pmbb = $q_pmbb->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?php echo $d_pmbb['id_pmebimbing']; ?>">
                    <?php echo $d_pmbb['nama_pembimbing'] . " (" . $d_pmbb['kali_pembimbing'] . ")"; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div><br>
    <div class="col-md text-center">
        Tempat : <br>
        <?php
        $sql_unit = "SELECT * FROM tb_unit";
        $sql_unit .= " ORDER BY nama_unit ASC";

        $q_unit = $conn->query($sql_unit);
        ?>
        <select class='form-inline js-example-placeholder-single' aria-label='Default select example' name='id_unit<?php echo $x; ?>' id="id_unit<?php echo $x; ?>" required>
            <option value="">-- Pilih --</option>
            <?php
            while ($d_unit = $q_unit->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <option value="<?php echo $d_unit['id_unit']; ?>">
                    <?php echo $d_unit['nama_unit']; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<hr>

<!-- data praktikan  -->
<!-- <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM / NPM / NIS </th>
                                        <th scope="col">No. HP</th>
                                        <th scope="col">No. WA</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">ASAL KOTA / KABUPATEN</th>
                                    </tr>
                                </thead>
                                <tbody> -->
<?php
$z = 1;
while ($j_tim >= $z) {
    $y++;
    $z++;
?>
    <!-- <tr>
                                            <td><?php echo $z; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['nama_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['no_id_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['telp_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['wa_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['email_praktikan']; ?></td>
                                            <td><?php echo $praktikan_arr[$y]['kota_kab_praktikan']; ?></td>
                                        </tr> -->
<?php
}
$z--;
echo "$j_tim, $z<br>";
?>
<!-- </tbody>
                            </table>
                        </div> -->
<hr>
<?php
echo "$j_kel, $x";
if ($j_kel - 1 == $x) {
    $j_tim -= 1;
}
