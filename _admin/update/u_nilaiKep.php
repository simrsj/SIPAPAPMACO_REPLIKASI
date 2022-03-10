<?php
$u = $_GET['u'];
$p = $_GET['p'];

if (is_numeric($u) && is_numeric($p)) {
    if (isset($_POST['simpan_nilai_kep'])) {
        $jp = $_POST['jp'];

        $no = 1;
        while ($jp > $no) {
            $sql = "UPDATE tb_nilai_kep SET";
            $sql .= " lp = " . $_POST['lp' . $no] . ", prepost = " . $_POST['prepost' . $no] . ", sptk = " . $_POST['sptk' . $no] . ", penkes = " . $_POST['penkes' . $no] . ", ";
            $sql .= " dokep = " . $_POST['dokep' . $no] . ", komter = " . $_POST['komter' . $no] . ", tak = " . $_POST['tak' . $no] . ", kasus = " . $_POST['kasus' . $no] . ", ";
            $sql .= " ujian = " . $_POST['ujian' . $no] . ", sikap = " . $_POST['sikap' . $no] . ", ket_nilai = '" . $_POST['ket' . $no] . "'";
            $sql .= " WHERE id_nilai_kep = " . $_POST['id_nilai_kep' . $no];

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
                    title: '<span class"text-xs"><b>DATA <br>Pembimbing</b> dan <b>Ruangan</b><br>Berhasil dirubah',
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
                    <h1 class="h3 mb-2 text-gray-800">Ubah Nilai</h1>
                </div>
            </div>
            <div class="card shadow mb-4">
                <div class="card-body">
                    <?php
                    $sql_data_praktikan = "SELECT * FROM tb_nilai_kep ";
                    $sql_data_praktikan .= " JOIN tb_praktikan ON tb_nilai_kep.id_praktikan = tb_praktikan.id_praktikan";
                    $sql_data_praktikan .= " JOIN tb_pembimbing ON tb_nilai_kep.id_pembimbing = tb_pembimbing.id_pembimbing";
                    $sql_data_praktikan .= " JOIN tb_unit ON tb_nilai_kep.id_unit = tb_unit.id_unit";
                    $sql_data_praktikan .= " WHERE tb_nilai_kep.id_praktik = " . $u . " AND tb_nilai_kep.id_pembimbing = " . $p;
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
                            <span class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr class="text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIM / NPM / NIS</th>
                                            <th scope="col" width="100px">LP</th>
                                            <th scope="col" width="100px">Pre-Post</th>
                                            <th scope="col" width="100px">SPTK</th>
                                            <th scope="col" width="100px">PENKES</th>
                                            <th scope="col" width="100px">DOKEP</th>
                                            <th scope="col" width="100px">KOMTER</th>
                                            <th scope="col" width="100px">TAK</th>
                                            <th scope="col" width="100px">KASUS</th>
                                            <th scope="col" width="100px">UJIAN</th>
                                            <th scope="col" width="100px">SIKAP</th>
                                            <th scope="col">KETERANGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <input type="hidden" name="id_nilai_kep<?php echo $no; ?>" id="id_nilai_kep<?php echo $no; ?>" value="<?php echo $d_data_praktikan['id_nilai_kep']; ?>">
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $d_data_praktikan['nama_praktikan']; ?></td>
                                                <td class="text-center"><?php echo $d_data_praktikan['no_id_praktikan']; ?></td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['lp']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="lp<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['lp']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="prepost<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['sptk']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="sptk<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['penkes']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="penkes<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['dokep']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="dokep<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['komter']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="komter<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['tak']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="tak<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['kasus']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="kasus<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['ujian']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="ujian<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <input value="<?php echo $d_data_praktikan['sikap']; ?>" type="number" maxlength="3" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" min="0" max="100" name="sikap<?php echo $no; ?>" required>
                                                </td>
                                                <td scope="col">
                                                    <textarea class="form-control" name="ket<?php echo $no; ?>" id="ket<?php echo $no; ?>"><?php echo $d_data_praktikan['ket_nilai']; ?></textarea>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="14" class="font-weight-bold font-italic text-center">
                                                "Bila ada jenis nilai yang tidak diperlukan, isikan nilai <span class="text-danger">0</span>"
                                            </td>
                                        </tr>
                                        <input type="hidden" name="jp" id="jp" value="<?php echo $no; ?>">
                                    </tbody>
                                </table>
                            </span>
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