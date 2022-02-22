<?php

$id_praktik = $_GET['t'];
$q_praktik = $conn->query("SELECT * FROM tb_praktik 
JOIN tb_jurusan_pdd ON tb_praktik.id_jurusan_pdd = tb_jurusan_pdd.id_jurusan_pdd 
WHERE id_praktik = $id_praktik");
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
$jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

<!-- Menu tarif Lainnya -->
<div class="container-fluid">
    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex flex-row align-items-center">
            <div class="h4 text-gray-800 font-weight-bold">
                Menu Tarif Ruangan dan Tempat : <i style='font-size:14px;'>(Jumlah Praktik <b><?php echo $d_praktik['jumlah_praktik']; ?></b>)</i>
            </div>
        </div>
        <div class="card-body">
            <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_tTempat">
                <?php
                if ($d_praktik['id_jurusan_pdd_jenis'] == 1) {
                    $sql = "tb_tempat.id_jurusan_pdd_jenis = 1 ";
                } elseif ($d_praktik['id_jurusan_pdd_jenis'] == 2) {
                    $sql = "tb_tempat.id_jurusan_pdd_jenis = 2 ";
                } elseif ($d_praktik['id_jurusan_pdd_jenis'] == 3) {
                    $sql = "tb_tempat.id_jurusan_pdd_jenis = 3 ";
                } elseif ($d_praktik['id_jurusan_pdd_jenis'] == 4) {
                    $sql = "tb_tempat.id_jurusan_pdd_jenis = 4";
                }
                $sql_tempat = "SELECT * FROM tb_tempat 
                    JOIN tb_jurusan_pdd_jenis ON tb_tempat.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis 
                    JOIN tb_tarif_satuan ON tb_tempat.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan
                    WHERE $sql AND status_tempat = 'y'
                    ORDER BY nama_tempat ASC
                ";

                // echo $sql_tempat;

                $q_tempat = $conn->query($sql_tempat);
                $r_tempat = $q_tempat->rowCount();
                if ($r_tempat > 0) {
                ?>
                    <table class="table">
                        <thead class="thead-dark text-center">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tarif</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Kapasitas</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Pilih<br>
                                    <div id="err_pilih" class="text-xs font-italic badge badge-danger"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_tempat = $q_tempat->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $d_tempat['nama_tempat']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_tempat['tarif_tempat'], 0, ",", "."); ?></td>
                                    <td><?php echo $d_tempat['nama_tarif_satuan']; ?></td>
                                    <td><?php echo $d_tempat['kapasitas_tempat']; ?></td>
                                    <td><?php echo $d_tempat['ket_tempat']; ?></td>
                                    <td>
                                        <div class="boxed-check-group boxed-check-primary boxed-check-sm text-center">
                                            <label class="boxed-check">
                                                <input class="boxed-check-input" type="radio" name="tempat" id="tempat" value="<?php echo $d_tempat['id_tempat'] ?>" required>
                                                <span class="boxed-check-label"><?php echo $d_tempat['nama_tempat'] ?></span>
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                <?php
                } else {
                ?>
                    <div class="bg-gray-500 text-gray-100" style="padding-bottom: 2px; padding-top: 5px;">
                        <h5 class="text-center">Data Tarif Tempat Tidak Ada</h5>
                    </div>
                <?php
                }
                ?>

                <input type="hidden" name="path" id="path" value="<?php echo $_GET['prk'] ?>">
                <input type="hidden" name="id" id="id" value="<?php echo $_GET['t'] ?>">
                <nav id="navbar-tarif" class="navbar justify-content-center">
                    <button type="button" id="simpan_tempat" class="nav-link btn btn-outline-success">
                        SIMPAN
                    </button>
                </nav>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#simpan_tempat").click(function() {

            // console.log("masuk tambah");
            var path = document.getElementById('path').value;

            //Notif Bila tidak dipilih
            if ($('input[name="tempat"]:checked').val() == undefined) {

                //warning Toast bila ada data wajib yg berlum terisi
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
                    title: '<center>TEMPAT BELUM DIPILIH</center>'
                });
                document.getElementById("err_pilih").innerHTML = "Pilih Tempat";
            }
            //tambah tempat
            else {
                var data_tTempat = $('#form_tTempat').serializeArray();

                //Simpan Data Praktik dan tarif
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_praktik_tempat_s.php?",
                    data: data_tTempat,
                    success: function() {
                        Swal.fire({
                            allowOutsideClick: false,
                            // isDismissed: false,
                            icon: 'success',
                            title: '<span class"text-xs"><b>DATA TEMPAT</b><br>Berhasil Tersimpan',
                            showConfirmButton: false,
                            html: '<a href="?prk=' + path + '" class="btn btn-outline-primary">OK</a>',
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }

        });
    });
</script>