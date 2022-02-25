<?php
//Mencari Data Praktik
$sql_praktik = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_GET['it_ked'];
$q_praktik = $conn->query($sql_praktik);
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

//Mencari Data Jurusan
$sql_jurusan_pdd = "SELECT * FROM tb_jurusan_pdd WHERE id_jurusan_pdd = " . $d_praktik['id_jurusan_pdd'];
$q_jurusan_pdd = $conn->query($sql_jurusan_pdd);
$d_jurusan_pdd = $q_jurusan_pdd->fetch(PDO::FETCH_ASSOC);

//Mencari id_jenjang_pdd
$id_jenjang_pdd = $d_praktik['id_jenjang_pdd'];

$tgl_mulai_praktik = $d_praktik['tgl_mulai_praktik'];
$tgl_selesai_praktik = $d_praktik['tgl_selesai_praktik'];
$jumlah_praktik = $d_praktik['jumlah_praktik'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="h3 mb-2 text-gray-800" id="title_praktik">Pilih Tarif Kedokteran</h1>
        </div>
    </div>
    <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_tarif">
        <!-- Data Tarif Praktik  -->
        <div class='card shadow mb-4' id="tarif_praktik">
            <div class='card-body'>
                <div class="text-lg font-weight-bold text-center">DATA TARIF</div>
                <input type="hidden" name="path" id="path" value="<?php echo $_GET['prk']; ?>">
                <!-- Menu Tarif wajib disesuaikan dengan jenis jurusan -->
                <div class="text-gray-700">
                    <div class="h5 font-weight-bold text-center mt-2">Menu Tarif Wajib <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?></div>
                </div>
                <hr>
                <?php
                $sql_tarif_jurusan = " SELECT * FROM tb_tarif 
                JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis 
                JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan  
                WHERE tb_tarif.id_jurusan_pdd = " . $d_praktik['id_jurusan_pdd'] . " AND tb_tarif.id_tarif_jenis BETWEEN 1 AND 5 AND tb_tarif.id_jenjang_pdd = 0
                ORDER BY nama_tarif_jenis ASC, nama_tarif ASC 
                ";

                // echo $sql_tarif_jurusan . "<br>";
                $q_tarif_jurusan = $conn->query($sql_tarif_jurusan);
                $r_tarif_jurusan = $q_tarif_jurusan->rowCount();

                if ($r_tarif_jurusan > 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col" width="200">Nama Jenis</th>
                                    <th scope="col" width="300">Nama Tarif</th>
                                    <th scope="col" width="150">Satuan</th>
                                    <th scope="col" width="150">Tarif</th>
                                    <th scope="col">Frekuensi</th>
                                    <th scope="col">Kuantitas</th>
                                    <th scope="col">Total Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $jumlah_total_tarif = 0;
                                $no = 1;
                                while ($d_tarif_jurusan = $q_tarif_jurusan->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $no; ?></th>
                                        <td><?php echo $d_tarif_jurusan['nama_tarif_jenis']; ?></td>
                                        <td><?php echo $d_tarif_jurusan['nama_tarif']; ?></td>
                                        <td><?php echo $d_tarif_jurusan['nama_tarif_satuan']; ?></td>
                                        <td><?php echo "Rp " . number_format($d_tarif_jurusan['jumlah_tarif'], 0, ",", "."); ?></td>
                                        <td><input class="form-control" type="number" min="0" name="ferk<?php echo $d_tarif_jurusan['id_tarif'] ?>"></td>
                                        <td><input class="form-control" type="number" min="0" name="ktt<?php echo $d_tarif_jurusan['id_tarif'] ?>"></td>
                                        <td>asdasdasdasda</td>
                                        <?php
                                        $no++;
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="7" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                                    <td class="font-weight-bold"><?php echo "Rp " . number_format($jumlah_total_tarif, 0, ",", "."); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
                <hr>

                <!-- Menu Tarif Ujian disesuaikan dengan Jenis Jurusan -->
                <div class="text-gray-700">
                    <div class="h5 font-weight-bold text-center mt-3 mb-3">Menu Tarif Ujian <?php echo $d_jurusan_pdd['nama_jurusan_pdd']; ?></div>
                </div>
                <div class="row boxed-check-group boxed-check-primary justify-content-center">
                    <label class="boxed-check">
                        <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian1" value="y" onclick="pilihUjian_y()">
                        <div class="boxed-check-label">Ya</div>
                    </label>
                    &nbsp;
                    &nbsp;
                    <label class="boxed-check">
                        <input class="boxed-check-input" type="radio" name="cek_pilih_ujian" id="cek_pilih_ujian2" value="t">
                        <div class="boxed-check-label">Tidak</div>
                    </label>
                </div>
                <div class="justify-content-center text-center">
                    <span class="text-danger font-weight-bold font-italic text-md" id="err_cek_pilih_ujian"></span>
                    <br>
                </div>

                <?php
                if ($d_jurusan_pdd == 1) {
                    $sql = "AND tb_tarif.id_tarif_jenis = 1";
                } else {
                    $sql = "AND tb_tarif.id_jurusan_pdd_jenis BETWEEN 2 AND 4";
                }
                $sql_tarif_ujian = " SELECT * FROM tb_tarif 
                JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis = tb_tarif_jenis.id_tarif_jenis 
                JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan 
                WHERE tb_tarif.id_tarif_jenis = 6 AND tb_tarif.id_jurusan_pdd = " . $d_praktik['id_jurusan_pdd'] . "
                ORDER BY nama_tarif_jenis ASC
                ";

                // echo $sql_tarif_ujian;
                $q_tarif_ujian = $conn->query($sql_tarif_ujian);
                $r_tarif_ujian = $q_tarif_ujian->rowCount();

                if ($r_tarif_ujian > 0) {
                ?>
                    <div class="table-responsive" id="tabel_ujian" style="display: none;">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jenis</th>
                                    <th scope="col" width="380">Nama Tarif</th>
                                    <th scope="col" width="150">Satuan</th>
                                    <th scope="col" width="150">Tarif</th>
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
                                        <td><input class="form-control" type="number" min="0" name="ferk<?php echo $d_tarif_ujian['id_tarif'] ?>"></td>
                                        <td><input class="form-control" type="number" min="0" name="ktt<?php echo $d_tarif_ujian['id_tarif'] ?>"></td>
                                        <td>asdasdasdasda</td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                                <tr>
                                    <td colspan="7" class="font-weight-bold text-right">JUMLAH TOTAL : </td>
                                    <td class="font-weight-bold"><?php echo "Rp " . number_format($jumlah_total_ujian, 0, ",", "."); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>

                <hr>
                <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                    <button type="button" name="simpan_praktik" id="simpan_praktik" class="btn btn-outline-success" onclick="pilihUjian()">
                        <!-- <a class="nav-link" href="#tarif"> -->
                        <i class="fas fa-check-circle"></i>
                        Simpan Data Praktik dan Data Tarif
                        <i class="fas fa-check-circle"></i>
                        <!-- </a> -->
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    function pilihUjian() {
        if (document.getElementById("cek_pilih_ujian1").checked == false && document.getElementById("cek_pilih_ujian2").checked == false) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: 'warning',
                title: '<center>Pilih Ujian <b>Ya</b> atau <b>Tidak</b></center>'
            });
            document.getElementById("err_cek_pilih_ujian").innerHTML = "Pilih Ujian <br>";
        } else {
            var path = "";
            var cek_pilih_ujian = "";
            if (document.getElementById("cek_pilih_ujian1").checked == true) {
                cek_pilih_ujian = document.getElementById("cek_pilih_ujian1").value;
            } else if (document.getElementById("cek_pilih_ujian2").checked == true) {
                cek_pilih_ujian = document.getElementById("cek_pilih_ujian2").value;
            }

            var data_praktik = $('#form_tarif').serializeArray();
            data_praktik.push({
                name: 'cek_pilih_ujian',
                value: cek_pilih_ujian
            });
        }
    }

    function pilihUjian_y() {
        if (document.getElementById("cek_pilih_ujian2").checked == false) {
            $("#tabel_ujian").fadeOut('fast');
        }
    }
</script>