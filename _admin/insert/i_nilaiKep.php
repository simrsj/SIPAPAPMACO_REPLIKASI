<?php
$i = $_GET['i'];
$p = $_GET['p'];

if (is_numeric($i) && is_numeric($p)) {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Input Nilai Pembimbing dan Ruangan</h1>
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
                $r_data_praktikan = $q_data_praktikan->rowCount();
                $j_ptkn = $r_data_praktikan;
                // $d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC);
                if ($r_data_praktikan > 0) {
                ?>
                    <form method="POST" id="form_pembb_ruangan">
                        <!-- data praktikan  -->
                        Nama Pembimbing : <?php  ?><br>
                        Ruangan : <?php ?>
                        <hr>
                        <div class="table-responsive">
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
                                        <input type="hidden" name="id_praktik" id="id_praktik" value="<?php echo $_GET['i']; ?>">
                                        <input type="hidden" name="id_praktikan<?php echo $no; ?>" id="id_praktikan<?php echo $no; ?>" value="<?php echo $d_data_praktikan['id_praktikan']; ?>">
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $d_data_praktikan['nama_praktikan']; ?></td>
                                            <td class="text-center"><?php echo $d_data_praktikan['no_id_praktikan']; ?></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="LP" id="LP"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="PREPOST" id="PREPOST"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="SPTK" id="SPTK"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="PENKES" id="PENKES"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="DOKEP" id="DOKEP"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="KOMTER" id="KOMTER"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="TAK" id="TAK"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="KASUS" id="KASUS"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="UJIAN" id="UJIAN"></td>
                                            <td scope="col" width="100px"><input type="number" class="form-control" min="0" max="100" name="SIKAP" id="SIKAP"></td>
                                            <td scope="col">
                                                <textarea class="form-control" name="KETERANGAN" id="KETERANGAN"></textarea>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <hr>

                        <!-- tombol simpan pilih Pembimbing dan Ruangan  -->
                        <div id="simpan_praktik_tarif" class="nav btn justify-content-center text-md">
                            <button type="button" name="simpan_pmbb_tmp" id="simpan_pmbb_tmp" class="btn btn-outline-success">
                                <!-- <a class=" nav-link" href="#tarif"> -->
                                <i class="fas fa-check-circle"></i>
                                Simpan Pembimbing dan Ruangan Praktik
                                <i class="fas fa-check-circle"></i>
                                <!-- </a> -->
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
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $("#simpan_pmbb_tmp").click(function() {
            var data_pembimbing = $('#form_pembb_ruangan').serializeArray();
            var jp = document.getElementById('jp').value;

            //Notif jika tida diisi Pembimbing 
            var no = 1;
            var pmbb = 0;
            while (no <= jp) {
                console.log("no: " + no + "jp: " + jp);
                if (document.getElementById('id_pembimbing' + no).value == "") {
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
                    document.getElementById("err_pmbb" + no).innerHTML = "<br>Pembimbing Harus Dipilih";
                    pmbb++;
                } else {
                    document.getElementById("err_pmbb" + no).innerHTML = "";
                }
                no++;

            }

            //Notif jika tida diisi Unit
            var no = 1;
            var unit = 0;
            while (no <= jp) {
                console.log("no: " + no + "jp: " + jp);
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

            //jika data sudah diisi semua
            if (pmbb == 0 && unit == 0) {
                console.log("SIMPAN");
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_pembimbing_s.php?",
                    data: data_pembimbing,
                    success: function() {
                        Swal.fire({
                            allowOutsideClick: false,
                            // isDismissed: false,
                            icon: 'success',
                            title: '<span class"text-xs"><b>DATA Pembimbing</b> dan <b>Ruangan</b><br>Berhasil Tersimpan',
                            showConfirmButton: false,
                            html: '<a href="?pmbb" class="btn btn-outline-primary">OK</a>',
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }
        });
    </script>
<?php
} else {
    include "_error/index.php";
}
?>