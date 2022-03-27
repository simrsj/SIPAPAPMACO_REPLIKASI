<?php
$i = $_GET['i'];
$p = $_GET['p'];

if (is_numeric($i) && is_numeric($p)) {
    if (isset($_POST['simpan_nilai_kep'])) {
        $jp = $_POST['jp'];

        $no = 1;
        while ($jp > $no) {
            $sql = "INSERT INTO tb_nilai_kep";
            $sql .= " (id_praktikan, id_pembimbing, id_praktik, id_unit, lp, prepost, sptk, penkes, dokep, komter, tak, kasus, ujian, sikap, ket_nilai)";
            $sql .= " VALUES ";
            $sql .= " ('" . $_POST['id_praktikan' . $no] . "','" . $_POST['id_pembimbing'] . "', '" . $_POST['id_praktik'] . "', '" . $_POST['id_unit'] . "', '" . $_POST['lp' . $no] . "',";
            $sql .= " '" . $_POST['prepost' . $no] . "', '" . $_POST['sptk' . $no] . "','" . $_POST['penkes' . $no] . "','" . $_POST['dokep' . $no] . "',";
            $sql .= " '" . $_POST['komter' . $no] . "','" . $_POST['tak' . $no] . "', '" . $_POST['kasus' . $no] . "',";
            $sql .= " '" . $_POST['ujian' . $no] . "', '" . $_POST['sikap' . $no] . "','" . $_POST['ket' . $no] . "')";

            // echo "$sql<br>";
            $conn->query($sql);
            $no++;
        }
?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    allowOutsideClick: false,
                    // isDismissed: false,
                    icon: 'success',
                    title: '<span class"text-xs"><b>DATA NILAI</b><br>Berhasil disimpan',
                    showConfirmButton: false,
                    html: '<a href="?nil" class="btn btn-outline-primary">OK</a>',
                    timer: 4000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                }).then(
                    function() {
                        document.location.href = "?nil";
                    }
                );
            });
        </script>
    <?php
    } else {
    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 mb-2 text-gray-800">Input Nilai</h1>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php
                    $sql_data_praktikan = "SELECT * FROM tb_pembimbing_pilih ";
                    $sql_data_praktikan .= " JOIN tb_praktikan ON tb_pembimbing_pilih.id_praktikan = tb_praktikan.id_praktikan";
                    $sql_data_praktikan .= " JOIN tb_pembimbing ON tb_pembimbing_pilih.id_pembimbing = tb_pembimbing.id_pembimbing";
                    $sql_data_praktikan .= " JOIN tb_unit ON tb_pembimbing_pilih.id_unit = tb_unit.id_unit";
                    $sql_data_praktikan .= " WHERE tb_pembimbing_pilih.id_praktik = " . $i . " AND tb_pembimbing_pilih.id_pembimbing = " . $p;
                    $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";

                    // echo $sql_data_praktikan;

                    $q_data_praktikan = $conn->query($sql_data_praktikan);
                    $q1_data_praktikan = $conn->query($sql_data_praktikan);
                    $r_data_praktikan = $q_data_praktikan->rowCount();
                    $j_ptkn = $r_data_praktikan;
                    $d1_data_praktikan = $q1_data_praktikan->fetch(PDO::FETCH_ASSOC);
                    if ($r_data_praktikan > 0) {
                    ?>
                        <form method="POST" id="form_nilai_kep">
                            <!-- data praktikan  -->

                            Nama Pembimbing : <?php echo $d1_data_praktikan['nama_pembimbing']; ?><br>
                            Ruangan : <?php echo $d1_data_praktikan['nama_unit']; ?>
                            <hr>
                            <span class="table-responsive text-xs">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIM / NPM / NIS</th>
                                            <th scope="col">LP</th>
                                            <th scope="col">Pre-Post</th>
                                            <th scope="col">SPTK</th>
                                            <th scope="col">PENKES</th>
                                            <th scope="col">DOKEP</th>
                                            <th scope="col">KOMTER</th>
                                            <th scope="col">TAK</th>
                                            <th scope="col">KASUS</th>
                                            <th scope="col">UJIAN</th>
                                            <th scope="col">SIKAP</th>
                                            <th scope="col">KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <input type="hidden" name="id_unit" id="id_unit" value="<?php echo $d_data_praktikan['id_unit']; ?>">
                                            <input type="hidden" name="id_praktik" id="id_praktik" value="<?php echo $d_data_praktikan['id_praktik']; ?>">
                                            <input type="hidden" name="id_pembimbing" id="id_pembimbing" value="<?php echo $d_data_praktikan['id_pembimbing']; ?>">
                                            <input type="hidden" name="id_praktikan<?php echo $no; ?>" id="id_praktikan<?php echo $no; ?>" value="<?php echo $d_data_praktikan['id_praktikan']; ?>">
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $d_data_praktikan['nama_praktikan']; ?></td>
                                                <td class="text-center"><?php echo $d_data_praktikan['no_id_praktikan']; ?></td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="lp<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="prepost<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="sptk<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="penkes<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="dokep<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="komter<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="tak<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="kasus<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="ujian<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col" width="100px">
                                                    <input type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" min="0" max="100" name="sikap<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <textarea name="ket<?php echo $no; ?>" id="ket<?php echo $no; ?>" rows="2" required></textarea>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                        <input type="hidden" name="jp" id="jp" value="<?php echo $no; ?>">
                                    </tbody>
                                </table>
                            </span>
                            <div colspan="14" class="font-weight-bold font-italic text-center">
                                "Bila ada jenis nilai yang tidak diperlukan, isikan nilai <span class="text-danger">0</span>"
                            </div>
                            <hr>
                            <!-- tombol simpan pilih Pembimbing dan Ruangan  -->
                            <span class="nav btn justify-content-center text-md">
                                <button type="submit" name="simpan_nilai_kep" class="btn btn-outline-success">
                                    <i class="fas fa-check-circle"></i>
                                    Simpan Pembimbing dan Ruangan Praktik
                                    <i class="fas fa-check-circle"></i>
                                </button>
                            </span>
                        </form>
                    <?php
                    } else {
                    ?>
                        <div class="jumbotron">
                            <div class="jumbotron-fluid">
                                <div class="text-gray-700">
                                    <h5 class="text-center">Data Nilai Tidak Ada</h5>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
<?php
    }
} else {
    include "_error/index.php";
}
?>