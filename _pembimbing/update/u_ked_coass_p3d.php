<div class="container-fluid">
    <?php
    $idpr = urldecode(decryptString($_GET['u'], $customkey));
    try {
        $sql_praktikan = "SELECT * FROM tb_praktikan ";
        $sql_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
        $sql_praktikan .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
        $sql_praktikan .= " WHERE id_praktikan = " .  $idpr;
        // echo "$sql_praktikan<br>";
        $q_praktikan = $conn->query($sql_praktikan);
        $d_praktikan = $q_praktikan->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $ex) {
        echo "<script>alert('DATA BIMBINGAN PRAKTIKAN')</script>;";
        // echo "<script>document.location.href='?error404';</script>";
    }
    try {
        $sql_pertanyaan = "SELECT * FROM tb_pertanyaan ";
        $sql_pertanyaan .= " WHERE kategori_pertanyaan = 'P3D'";
        // echo "$sql_pertanyaan<br>";
        $q_pertanyaan = $conn->query($sql_pertanyaan);
        while ($d_pertanyaan = $q_pertanyaan->fetch(PDO::FETCH_ASSOC)) {
            try {
                $sql_pertanyaan_select = "SELECT * FROM tb_nilai_ked_coass_p3d ";
                $sql_pertanyaan_select .= " WHERE id_pertanyaan = " . $d_pertanyaan['id'];
                $sql_pertanyaan_select .= " AND id_praktikan = " . $idpr;
                $q_pertanyaan_select = $conn->query($sql_pertanyaan_select);
                $r_pertanyaan_select = $q_pertanyaan_select->rowCount();
                if ($r_pertanyaan_select < 1) {
                    $sql_pertanyaan_tambah = "INSERT INTO tb_nilai_ked_coass_p3d (id_praktikan, id_pertanyaan, tgl_tambah) VALUES (" . $idpr . "," . $d_pertanyaan['id'] . ", '" . date('Y-m-d G:i:s') . "')";
                    $conn->query($sql_pertanyaan_tambah);
                    echo $sql_pertanyaan_tambah . "<br>";
                }
            } catch (Exception $ex) {
                // echo "<script>alert('DATA PRAKTIKAN');</script>";
                // echo "<script>document.location.href='?error404';</script>";
            }
        }
    } catch (Exception $ex) {
        echo "<script>alert('DATA PRAKTIKAN');</script>";
        // echo "<script>document.location.href='?error404';</script>";
    }
    ?>
    <div class="card shadow  m-2">
        <div class="card-header b text-center">
            Data Praktikan
        </div>
        <div class="card-body text-center">
            <div class="row">
                <div class="col-md">
                    <img height="100" height="80" src="<?= $d_praktikan['foto_praktikan'] ?>">
                </div>
                <div class="col-md">
                    Nama Praktikan : <br>
                    <strong><?= $d_praktikan['nama_praktikan'] ?></strong><br>
                    No. ID Praktikan : <br>
                    <strong><?= $d_praktikan['no_id_praktikan'] ?></strong>
                </div>
                <div class="col-md">
                    Nama Institusi : <br>
                    <strong> <?= $d_praktikan['nama_institusi'] ?> </strong><br>
                    Nama Kelompok/Gelombang/Praktik : <br>
                    <strong> <?= $d_praktikan['nama_praktik'] ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="card shadow m-2 rounded-5">
                <div class="card-header b ">
                    Data Nilai
                </div>
                <div class="card-body text-center">
                    <div class="table-responsive text-sm">
                        <table class="table table-striped table-bordered ">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th scope='col'>No</th>
                                    <th>Pertanyaan</th>
                                    <th>I</th>
                                    <th>II</th>
                                    <th>III</th>
                                    <th>IV</th>
                                </tr>
                                <tr class="text-center bg-secondary">
                                    <th colspan="2 text-right" class="text-right">Pilih Semua-></th>
                                    <th class="text-center"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
                                    <th class="text-center"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
                                    <th class="text-center"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
                                    <th class="text-center"><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <form id="form_nilai" method="post">
                                    <?php
                                    $q_pertanyaan_isi = $conn->query($sql_pertanyaan);
                                    $no = 1;
                                    while ($d_bimbingan_isi = $q_pertanyaan_isi->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no; ?></td>
                                            <td class="text-left"><?= $d_bimbingan_isi['pertanyaan']; ?></td>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                            </td>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                            </td>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                            </td>
                                            <td>
                                                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="6">
                                            <a class="btn btn-success btn-sm col simpan">SIMPAN</a>
                                        </td>
                                    </tr>
                                </form>
                                <script>
                                    // inisiasi klik modal tambah simpan
                                    $(document).on('click', '.simpan', function() {
                                        console.log("tambah");

                                        var data_form = $("#form_nilai").serializeArray();
                                        var bst = $('#bst').val();
                                        var crs = $('#crs').val();
                                        var css = $('#css').val();
                                        var minicex = $('#minicex').val();
                                        var rps = $('#rps').val();
                                        var osler = $('#osler').val();
                                        var dops = $('#dops').val();

                                        //cek data from modal tambah bila tidak diiisi
                                        if (
                                            bst == "" ||
                                            crs == "" ||
                                            css == "" ||
                                            minicex == "" ||
                                            rps == "" ||
                                            osler == "" ||
                                            dops == ""
                                        ) {
                                            Swal.fire({
                                                allowOutsideClick: true,
                                                icon: 'warning',
                                                title: '<span><b>DATA ADA YANG KOSONG</b></span>',
                                                showConfirmButton: false,
                                                timer: 5000,
                                                timerProgressBar: true,
                                                backdrop: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            });
                                            bst == "" ? $("#err_bst").html("Isi Nilai") : $("#err_bst").html("");
                                            crs == "" ? $("#err_crs").html("Isi Nilai") : $("#err_crs").html("");
                                            css == "" ? $("#err_css").html("Isi Nilai") : $("#err_css").html("");
                                            minicex == "" ? $("#err_minicex").html("Isi Nilai") : $("#err_minicex").html("");
                                            rps == "" ? $("#err_rps").html("Isi Nilai") : $("#err_rps").html("");
                                            osler == "" ? $("#err_osler").html("Isi Nilai") : $("#err_osler").html("");
                                            dops == "" ? $("#err_dops").html("Isi Nilai") : $("#err_dops").html("");
                                        }
                                        //cek data from modal tambah bila range nilai tidak sesuai
                                        else if (
                                            (bst < 0 || bst > 100) ||
                                            (crs < 0 || crs > 100) ||
                                            (css < 0 || css > 100) ||
                                            (minicex < 0 || minicex > 100) ||
                                            (rps < 0 || rps > 100) ||
                                            (osler < 0 || osler > 100) ||
                                            (dops < 0 || dops > 100)
                                        ) {

                                            Swal.fire({
                                                allowOutsideClick: true,
                                                icon: 'warning',
                                                title: '<span><b>NILAI ADA YANG TIDAK SESUAI</b></span>',
                                                showConfirmButton: false,
                                                timer: 5000,
                                                timerProgressBar: true,
                                                backdrop: true,
                                                didOpen: (toast) => {
                                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                }
                                            });
                                            bst < 0 || bst > 100 ? $("#err_bst").html("Tidak Sesuai") : $("#err_bst").html("");
                                            crs < 0 || crs > 100 ? $("#err_crs").html("Tidak Sesuai") : $("#err_crs").html("");
                                            css < 0 || css > 100 ? $("#err_css").html("Tidak Sesuai") : $("#err_css").html("");
                                            minicex < 0 || minicex > 100 ? $("#err_minicex").html("Tidak Sesuai") : $("#err_minicex").html("");
                                            rps < 0 || rps > 100 ? $("#err_rps").html("Tidak Sesuai") : $("#err_rps").html("");
                                            osler < 0 || osler > 100 ? $("#err_osler").html("Tidak Sesuai") : $("#err_osler").html("");
                                            dops < 0 || dops > 100 ? $("#err_dops").html("Tidak Sesuai") : $("#err_dops").html("");
                                        } else {
                                            data_form.push({
                                                name: "idpr",
                                                value: "<?= encryptString($d_praktikan['id_praktikan'], $customkey) ?>"
                                            });
                                            $.ajax({
                                                type: 'POST',
                                                url: "_pembimbing/exc/x_u_ked_coass_nilai.php",
                                                data: data_form,
                                                dataType: "JSON",
                                                success: function(response) {
                                                    if (response.ket == "ERROR") {
                                                        Swal.fire({
                                                            allowOutsideClick: true,
                                                            icon: 'error',
                                                            title: '<span><b>DATA GAGAL DISIMPAN</b></span>',
                                                            showConfirmButton: false,
                                                            timer: 10000,
                                                            timerProgressBar: true,
                                                            backdrop: true,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        });
                                                    } else {
                                                        Swal.fire({
                                                            allowOutsideClick: true,
                                                            icon: 'success',
                                                            title: '<span><b>NILAI BERHASIL DISIMPAN</b></span>',
                                                            showConfirmButton: false,
                                                            timer: 10000,
                                                            timerProgressBar: true,
                                                            backdrop: true,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        }).then(
                                                            function() {
                                                                document.location.href = "?ked_coass_nilai";
                                                            }
                                                        );
                                                    }
                                                },
                                                error: function(response) {
                                                    console.log(response);
                                                }
                                            });
                                        }
                                    });
                                </script>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>