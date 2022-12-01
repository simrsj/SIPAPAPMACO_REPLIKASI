<?php
if (isset($_GET['ptrf']) && isset($_GET['i']) && $d_prvl['c_praktik_tarif'] == "Y") {
    //data praktik
    $sql_praktik = "SELECT * FROM tb_praktik";
    $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
    $sql_praktik .= " WHERE tb_praktik.id_praktik = " . base64_decode(urldecode($_GET['ptrf']));
    // echo $sql_praktik."<br>";
    try {
        $q_praktik = $conn->query($sql_praktik);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PRAKTIK');";
        echo "document.location.href='?error404';</script>";
    }
    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);

?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 text-gray-800">Pilih Tarif</h1>
            </div>
        </div>
        <!-- Data Praktik -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <div class="row text-center h6 text-gray-900 ">
                    <div class="col">
                        <?php if ($_SESSION['level_user'] == 1) { ?>
                            Nama Institusi : <br>
                            <b><?= $d_praktik['nama_institusi']; ?></b>
                            <hr class="p-0 m-1">
                        <?php } ?>
                        Nama Kelompok/Gelombang :<br>
                        <b><?= $d_praktik['nama_praktik']; ?></b>
                        <hr class="p-0 m-1">
                        Jumlah Praktik :<br>
                        <b><?= $d_praktik['jumlah_praktik']; ?></b>
                    </div>
                    <div class="col my-auto">
                        Tanggal Mulai :<br>
                        <b><?= tanggal($d_praktik['tgl_mulai_praktik']); ?></b>
                        <hr class="p-0 m-1">
                        Tanggal Selesai :<br>
                        <b><?= tanggal($d_praktik['tgl_selesai_praktik']); ?></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                //data tarif
                $sql_data_tarif = "SELECT * FROM tb_tarif ";
                $sql_data_tarif .= " JOIN tb_tarif_satuan ON tb_tarif.id_tarif_satuan= tb_tarif_satuan.id_tarif_satuan";
                $sql_data_tarif .= " JOIN tb_tarif_jenis ON tb_tarif.id_tarif_jenis= tb_tarif_jenis.id_tarif_jenis";
                $sql_data_tarif .= " WHERE tb_tarif.id_jurusan_pdd = " . $d_praktik['id_jurusan_pdd'];
                $sql_data_tarif .= " ORDER BY tb_tarif_jenis.nama_tarif_jenis ASC";
                // echo "$sql_data_tarif<br>";
                try {
                    $q_data_tarif = $conn->query($sql_data_tarif);
                } catch (Exception $ex) {
                    echo "<script>alert('$ex -DATA PRAKTIK');";
                    echo "document.location.href='?error404';</script>";
                }
                $r_data_tarif = $q_data_tarif->rowCount();
                if ($r_data_tarif > 0) {
                ?>
                    <form method="POST" id="form_pembb_ruangan">
                        <div class="text-center h5">
                            Bila ada tarif yang tidak digunakan <br>
                            isikan <span class="b text-danger">Frekuensi</span> dan <span class="b text-danger">Kuantitas</span> dengan <span class="b text-danger">Angka 0 (Nol)</span>
                        </div>
                        <hr>
                        <table class=" table table-striped table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Jenis Tarif</th>
                                    <th scope="col">Nama Tarif</th>
                                    <th scope="col" width="300px">Satuan</th>
                                    <th scope="col" width="150px">Tarif</th>
                                    <th scope="col" width="50px">Frekuensi</th>
                                    <th scope="col" width="50px">Kuantitas</th>
                                    <th scope="col" width="200px">Jumlah Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_data_tarif = $q_data_tarif->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr class="text-center">
                                        <td><?= $no; ?></td>
                                        <td><?= $d_data_tarif['nama_tarif_jenis']; ?></td>
                                        <td><?= $d_data_tarif['nama_tarif']; ?></td>
                                        <td><?= $d_data_tarif['nama_tarif_satuan']; ?></td>
                                        <td class="text-left"><?= "Rp " . number_format($d_data_tarif['jumlah_tarif'], 0, ",", "."); ?></td>
                                        <td><input class="form-control" type="number" max="1" name="ferkuensi" id="ferkuensi" required></td>
                                        <td><input class="form-control" type="number" max="1" name="kuantitas" id="kuantitas" required></td>
                                        <td class="text-left">
                                            <div class="jumlah_tarif">Rp 0</div>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                }
                                ?>
                                <tr>
                                    <td colspan="7" class="text-right b h5">Jumlah Total :</td>
                                    <td class="text-left b h5">
                                        <div class="jumlah_tarif">Rp 0</div>
                                    </td>
                                </tr>
                                </tr>
                                <input type="hidden" name="jumlah_praktik_input" id="jumlah_praktik_input" value="<?= $no - 1;  ?>">
                            </tbody>
                        </table>
                        <hr>

                        <!-- tombol simpan pilih Pembimbing dan atau Ruangan  -->
                        <div class="nav btn justify-content-center text-md">
                            <button type="button" name="simpan_ptrf_tmp" id="simpan_ptrf_tmp" class="btn btn-outline-success">
                                <i class="fas fa-check-circle"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                <?php
                } else {
                ?>
                    <div class="jumbotron">
                        <div class="jumbotron-fluid">
                            <div class="text-gray-700">
                                <h5 class="text-center">Data Praktikan Tidak Ada</h5>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <script>
        $("#simpan_ptrf_tmp").click(function() {
            var data_pembimbing = $('#form_pembb_ruangan').serializeArray();
            var jumlah_praktik = $('#jumlah_praktik').val();
            var jumlah_praktik_input = $('#jumlah_praktik_input').val();
            var jurusan = $('#jurusan').val();
            console.log(jumlah_praktik);
            console.log(jumlah_praktik_input);
            //Jika Jumlah Praktik tidak sesuai dengan data praktikan
            if (jumlah_praktik != jumlah_praktik_input) {
                Swal.fire({
                    allowOutsideClick: false,
                    // isDismissed: false,
                    icon: 'error',
                    title: '<span class"text-xs">' +
                        '<b>DATA PRAKTIKAN</b> <br> ' +
                        'TIDAK SESUAI DENGAN<br>' +
                        '<b>JUMLAH PRAKTIK</b><br>' +
                        'Sesuaikan kembali di menu <b>DATA PRAKTIKAN praktikan</b><br>' +
                        '</span>',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });
            } else {
                //Notif jika tida diisi Pembimbing 
                var no = 1;
                var ptrf = 0;
                while (no <= jumlah_praktik) {
                    console.log("no: " + no + "jumlah_praktik: " + jumlah_praktik);
                    if ($('#id_pembimbing' + no).val() == "") {
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
                            title: '<center>DATA ADA YANG BELUM TERISI</center>'
                        });
                        $("#err_ptrf" + no).html("<br>Pembimbing Harus Dipilih");
                        ptrf++;
                    } else {
                        $("#err_ptrf" + no).html("");
                    }
                    no++;

                }

                //Notif jika tidak diisi Unit
                var no = 1;
                var unit = 0;
                if (jurusan != 1) {
                    while (no <= jumlah_praktik) {
                        console.log("no: " + no + "jumlah_praktik: " + jumlah_praktik);
                        if (document.getElementById('id_unit' + no).value == "") {
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
                                title: '<center>DATA ADA YANG BELUM TERISI</center>'
                            });
                            document.getElementById("err_unit" + no).innerHTML = "<br> Ruangan Harus Dipilih";
                            unit++;
                        } else {
                            document.getElementById("err_unit" + no).innerHTML = "";
                        }
                        no++;
                    }
                }
            }

            //jika data sudah diisi semua
            if (ptrf == 0 && unit == 0 && jumlah_praktik == jumlah_praktik_input) {
                if (jurusan == 1) {
                    $title = '<span class"text-xs"><b>DATA Pembimbing</b><br>Berhasil Tersimpan';
                } else {
                    $title = '<span class"text-xs"><b>DATA Pembimbing</b> dan <b>Ruangan</b><br>Berhasil Tersimpan';
                }
                console.log("Simpan ptrf");
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_praktik_pembimbing_s.php?",
                    data: data_pembimbing,
                    success: function() {
                        Swal.fire({
                            allowOutsideClick: false,
                            // isDismissed: false,
                            icon: 'success',

                            title: $title,
                            showConfirmButton: false,
                            html: '<a href="?ptrf" class="btn btn-outline-primary">OK</a>',
                            timer: 11115000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        }).then(
                            function() {
                                document.location.href = "?ptrf";
                            }
                        );
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }
        });
    </script>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
