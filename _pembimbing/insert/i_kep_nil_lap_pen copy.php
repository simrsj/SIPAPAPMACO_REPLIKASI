<?php if ($_SESSION['level_user'] == 4) { ?>
    <div class="container-fluid">

        <!-- data praktik dan praktikan  -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row" style="font-size: small;" class="justify-content-center">
                    <?php
                    $exp_arr_idprkn = explode("*sm*", base64_decode(urldecode(hex2bin($_GET['idprkn']))));
                    $idprkn = $exp_arr_idprkn[1];
                    try {
                        $sql_praktik = "SELECT * FROM tb_praktik ";
                        $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi ";
                        $sql_praktik .= " JOIN tb_profesi_pdd ON tb_praktik.id_profesi_pdd = tb_profesi_pdd.id_profesi_pdd ";
                        $sql_praktik .= " JOIN tb_jenjang_pdd ON tb_praktik.id_jenjang_pdd = tb_jenjang_pdd.id_jenjang_pdd ";
                        $sql_praktik .= " JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd ";
                        $sql_praktik .= " JOIN tb_jurusan_pdd_jenis ON tb_jurusan_pdd.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis ";
                        $sql_praktik .= " JOIN tb_praktikan ON tb_praktik.id_praktik = tb_praktikan.id_praktik ";
                        $sql_praktik .= " JOIN tb_pembimbing_pilih ON tb_pembimbing_pilih.id_praktik = tb_praktikan.id_praktik ";
                        $sql_praktik .= " JOIN tb_pembimbing ON tb_pembimbing.id_pembimbing = tb_pembimbing_pilih.id_pembimbing ";
                        $sql_praktik .= " WHERE tb_praktik.status_praktik = 'Y' ";
                        $sql_praktik .= " AND tb_pembimbing.id_pembimbing = " . $d_pembimbing['id_pembimbing'];
                        $sql_praktik .= " AND tb_praktikan.id_praktikan = " . $idprkn;
                        $sql_praktik .= " GROUP BY tb_praktikan.id_praktik";
                        $sql_praktik .= " ORDER BY tb_praktik.id_praktik DESC";
                        // echo "$sql_praktik<br>";
                        $q_praktik = $conn->query($sql_praktik);
                        $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
                    } catch (Exception $ex) {
                        echo "<script>alert('-DATA PRAKTIK-');";
                        // echo "document.location.href='?error404';</script>";
                    }
                    ?>
                    <div class="col-md-3 text-center">
                        <b class="text-gray-800">NAMA PRAKTIKAN : </b><br><?= $d_praktik['nama_praktikan']; ?><br>
                        <b class="text-gray-800">NO. IDENTITAS : </b><br><?= $d_praktik['no_id_praktikan']; ?>
                    </div>
                    <div class="col-md-3 text-center">
                        <b class="text-gray-800">INSTITUSI : </b><br><?= $d_praktik['nama_institusi']; ?><br>
                        <b class="text-gray-800">JURUSAN : </b><br><?= $d_praktik['nama_jurusan_pdd']; ?><br>
                    </div>
                    <div class="col-md-3 text-center">
                        <b class="text-gray-800">PROFESI : </b><br><?= $d_praktik['nama_profesi_pdd']; ?><br>
                        <b class="text-gray-800">JENJANG : </b><br><?= $d_praktik['nama_jenjang_pdd']; ?>
                    </div>
                    <div class="col-md-3 text-center">
                        <b class="text-gray-800">TANGGAL MULAI : </b><br><?= tanggal($d_praktik['tgl_mulai_praktik']); ?><br>
                        <b class="text-gray-800">TANGGAL SELESAI : </b><br><?= tanggal($d_praktik['tgl_selesai_praktik']); ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- Input nilai  -->
        <div class="card shadow mb-4">
            <div class="card-header">
                Form Penilaian Laporan Pendahuluan (LP)
            </div>
            <div class="card-body">
                <div class="table-responsive-md">
                    <form action="?kep_nil_lap_pen&data=<?= bin2hex(urlencode(base64_encode(date("Ymd") . time() . "*sm*" . "i_x"))) ?>" method="post">
                        <input type="hidden" name="idprkn" value="<?= $_GET['idprkn'] ?>" required readonly>
                        <input type="hidden" name="idp" value="<?= $_GET['idp'] ?>" required readonly>
                        <table class="table table-bordered " id="dataTable">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th width="12px">No</th>
                                    <th>ASPEK YANG DINILAI</th>
                                    <th colspan="4">NILAI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- A -->
                                <tr class="b text-center table-secondary">
                                    <td>A</td>
                                    <td>ISI</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Lengkap</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A1" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A1" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A1" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A1" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Sistematika Benar</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A2" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A2" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A2" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A2" value="4" style="width: 30px;  height: 30px;" required>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Waktu Pengumpulan Tepat</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A3" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A3" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A3" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A3" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Bukan Repetisi dan Plagiasi</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A4" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A4" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A4" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="A4" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                                <!-- B  -->
                                <tr class="b text-center table-secondary">
                                    <td>B</td>
                                    <td>RESPONSI LP</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Mampu menguraikan pengertian</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B1" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B1" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B1" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B1" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mampu menguraikan faktor penyebab</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B2" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B2" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B2" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B2" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Mampu menjelaskan proses terjadinya masalah</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B3" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B3" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B3" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B3" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Mampu menyebutkan masalah Keperawatan jiwa yang Muncul</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B4" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B4" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B4" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B4" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Mampu menjelaskan tindakan Keperawatan jiwa</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B5" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B5" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B5" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B5" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Mampu menyebutkan tindakan dalam aplikasi (contoh kalimat langsung)</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B6" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B6" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B6" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="B6" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                </tr>
                                <!-- C -->
                                <tr class="b text-center table-secondary">
                                    <td>C</td>
                                    <td>REFERENSI</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Pustaka yang digunakan 10 tahun terakhir</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C1" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C1" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C1" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C1" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Pustaka relevan dengan keperawatan jiwa</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C2" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C2" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C2" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C2" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                <tr>
                                    <td>3</td>
                                    <td>Menggunakan lebih dari 3 referensi text book</td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C3" value="1" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C3" value="2" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C3" value="3" style="width: 30px;  height: 30px;" required>
                                    </td>
                                    <td class="text-center">
                                        <input class="boxed-check-input" type="radio" name="C3" value="4" style="width: 30px;  height: 30px;" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <input type="submit" value="SIMPAN" class="col btn btn-success btn-sm">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
?>