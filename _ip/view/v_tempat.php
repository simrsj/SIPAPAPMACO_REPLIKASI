<div class="data_tempat">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Daftar Tempat</h1>
            </div>
            <div class="col-lg-2 text-right justify-content-center">
                <a class='btn btn-outline-success btn-sm ' href='#' data-toggle='modal' data-target='#tmp_i_m'>
                    <i class="fas fa-plus"></i> Tambah
                </a>
                <!-- modal tambah Mess  -->
                <div class="modal fade text-left" id="tmp_i_m" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_tTempat">
                                <div class="modal-header">
                                    <b>TAMBAH TEMPAT</b>
                                </div>
                                <div class="modal-body">
                                    Nama Tempat : <span style="color:red">*</span><br>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="isikan nama tempat" required>
                                    <div id="err_nama" class="text-danger text-xs font-italic"></div><br>
                                    Kapasitas : <span style="color:red">*</span><br>
                                    <input type="number" min="1" class="form-control" name="kapasitas" id="kapasitas" placeholder="isikan kapasitas" required>
                                    <div id="err_kapasitas" class="text-danger text-xs font-italic"></div><br>
                                    Tarif : <span style="color:red">*</span><br>
                                    <input type="number" min="1" class="form-control" name="tarif" id="tarif" placeholder="isikan tarif" required>
                                    <div id="err_tarif" class="text-danger text-xs font-italic"></div><br>
                                    Satuan : <span style="color:red">*</span><br>
                                    <?php
                                    $sql = "SELECT * FROM tb_tarif_satuan ORDER BY nama_tarif_satuan ASC";
                                    $q = $conn->query($sql);
                                    ?>
                                    <select class='js-example-placeholder-single form-control row col-6' name='satuan' id="satuan" required>
                                        <option value="">-- <i>Pilih</i>--</option>
                                        <?php
                                        while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                            <option value='<?php echo $d['id_tarif_satuan']; ?>'>
                                                <?php echo $d['nama_tarif_satuan']; ?>
                                            </option>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </select><br>
                                    <div class="text-danger font-weight-bold  font-italic text-xs" id="err_satuan"></div><br>
                                    Jenis Jurusan : <span style="color:red">*</span><br>
                                    <div class="boxed-check-group boxed-check-primary boxed-check-sm">
                                        <label class="boxed-check">
                                            <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan1" value="1" required>
                                            <span class="boxed-check-label">Kedokteran</span>
                                        </label>
                                        <label class="boxed-check">
                                            <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan2" value="2">
                                            <span class="boxed-check-label">Keperawatan</span>
                                        </label>
                                        <label class="boxed-check">
                                            <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan3" value="3">
                                            <span class="boxed-check-label">Nakes Lainnya</span>
                                        </label>
                                        <label class="boxed-check">
                                            <input class="boxed-check-input" type="radio" name="jenis_jurusan" id="jenis_jurusan4" value="4">
                                            <span class="boxed-check-label">Non-Nakes</span>
                                        </label>
                                    </div>
                                    <div id="err_jenis_jurusan" class="text-danger text-xs font-italic"></div><br>
                                    Keterangan : <br>
                                    <textarea name="keterangan" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success btn-sm" type="button" name="tambah_tempat" id="tambah_tempat">Tambah</button>
                                    <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <?php
                $sql = "SELECT * FROM tb_tempat 
            JOIN tb_jurusan_pdd_jenis ON tb_tempat.id_jurusan_pdd_jenis = tb_jurusan_pdd_jenis.id_jurusan_pdd_jenis 
            JOIN tb_tarif_satuan ON tb_tempat.id_tarif_satuan = tb_tarif_satuan.id_tarif_satuan
            WHERE status_tempat = 'y'
            ORDER BY nama_tempat ASC";
                $q = $conn->query($sql);
                if ($q->rowCount() > 0) {
                ?>
                    <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead class="table-dark">
                                <tr>
                                    <th scope='col'>No</th>
                                    <th>Nama Tempat</th>
                                    <th>Jenis Jurusan</th>
                                    <th>Kapasitas</th>
                                    <th>Satuan</th>
                                    <th>Tarif</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Input</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no_ = 1;
                                while ($d = $q->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no_; ?></td>
                                        <td><?php echo $d['nama_tempat']; ?></td>
                                        <td><?php echo $d['nama_jurusan_pdd_jenis']; ?></td>
                                        <td><?php echo $d['kapasitas_tempat']; ?></td>
                                        <td><?php echo $d['nama_tarif_satuan']; ?></td>
                                        <td><?php echo "Rp " . number_format($d['tarif_tempat'], 0, '.', '.'); ?></td>
                                        <td><?php echo $d['ket_tempat']; ?></td>
                                        <td><?php echo $d['tgl_input_tempat']; ?></td>
                                        <td>

                                            <a title="Ubah" class='btn btn-primary btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#tmp_u_m" . $d['id_tempat']; ?>'>
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a title="Hapus" class='btn btn-danger btn-sm' href='#' data-toggle='modal' data-target='<?php echo "#tmp_h_m" . $d['id_tempat']; ?>'>
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <!-- modal ubah tempat  -->
                                            <div class="modal fade" id="<?php echo "tmp_u_m" . $d['id_tempat']; ?>" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_uTempat<?php echo $d['id_tempat']; ?>">
                                                            <div class="modal-header">
                                                                <b>UBAH TEMPAT</b>
                                                            </div>
                                                            <div class="modal-body">
                                                                Nama Tempat : <span style="color:red">*</span><br>
                                                                <input type="text" class="form-control" name="nama<?php echo $d['id_tempat']; ?>" id="nama<?php echo $d['id_tempat']; ?>" value="<?php echo $d['nama_tempat']; ?>" required>
                                                                <div id="err_nama<?php echo $d['id_tempat']; ?>" class="text-danger text-xs font-italic"></div><br>
                                                                Kapasitas : <span style="color:red">*</span><br>
                                                                <input type="number" min="1" class="form-control" name="kapasitas<?php echo $d['id_tempat']; ?>" id="kapasitas<?php echo $d['id_tempat']; ?>" value="<?php echo $d['kapasitas_tempat']; ?>" required>
                                                                <div id="err_kapasitas<?php echo $d['id_tempat']; ?>" class="text-danger text-xs font-italic"></div><br>
                                                                Tarif : <span style="color:red">*</span><br>
                                                                <input type="number" min="1" class="form-control" name="tarif<?php echo $d['id_tempat']; ?>" id="tarif<?php echo $d['id_tempat']; ?>" value="<?php echo $d['tarif_tempat']; ?>" required>
                                                                <div id="err_tarif<?php echo $d['id_tempat']; ?>" class="text-danger text-xs font-italic"></div><br>
                                                                Satuan : <span style="color:red">*</span><br>
                                                                <?php
                                                                $sql_satuan = "SELECT * FROM tb_tarif_satuan ORDER BY nama_tarif_satuan ASC";
                                                                $q_satuan = $conn->query($sql_satuan);
                                                                ?>
                                                                <select class='form-control' name='satuan<?php echo $d['id_tempat']; ?>' id="satuan<?php echo $d['id_tempat']; ?>" required>
                                                                    <option value="">-- <i>Pilih</i>--</option>
                                                                    <?php
                                                                    while ($d_satuan = $q_satuan->fetch(PDO::FETCH_ASSOC)) {
                                                                        if ($d['id_tarif_satuan'] == $d_satuan['id_tarif_satuan']) {
                                                                            $cek = 'selected';
                                                                        } else {
                                                                            $cek = '';
                                                                        }
                                                                    ?>
                                                                        <option value='<?php echo $d_satuan['id_tarif_satuan']; ?>' <?php echo $cek; ?>>
                                                                            <?php echo $d_satuan['nama_tarif_satuan']; ?>
                                                                        </option>
                                                                    <?php
                                                                        $no++;
                                                                    }
                                                                    ?>
                                                                </select><br>
                                                                <div class="text-danger font-weight-bold  font-italic text-xs" id="err_satuan<?php echo $d['id_tempat']; ?>"></div>
                                                                Jenis Jurusan : <span style="color:red">*</span><br>
                                                                <div class="boxed-check-group boxed-check-primary boxed-check-sm">
                                                                    <?php

                                                                    $jj1 = "";
                                                                    $jj2 = "";
                                                                    $jj3 = "";
                                                                    $jj4 = "";
                                                                    if ($d['id_jurusan_pdd_jenis'] == 1) {
                                                                        $jj1 = 'checked';
                                                                    } elseif ($d['id_jurusan_pdd_jenis'] == 2) {
                                                                        $jj2 = 'checked';
                                                                    } elseif ($d['id_jurusan_pdd_jenis'] == 3) {
                                                                        $jj3 = 'checked';
                                                                    } else {
                                                                        $jj4 = 'checked';
                                                                    }

                                                                    ?>
                                                                    <label class="boxed-check">
                                                                        <input class="boxed-check-input" type="radio" name="jenis_jurusan<?php echo $d['id_tempat']; ?>" id="jenis_jurusan1<?php echo $d['id_tempat']; ?>" value="1" required <?php echo $jj1; ?>>
                                                                        <span class="boxed-check-label">Kedokteran</span>
                                                                    </label>
                                                                    <label class="boxed-check">
                                                                        <input class="boxed-check-input" type="radio" name="jenis_jurusan<?php echo $d['id_tempat']; ?>" id="jenis_jurusan2<?php echo $d['id_tempat']; ?>" value="2" <?php echo $jj2; ?>>
                                                                        <span class="boxed-check-label">Keperawatan</span>
                                                                    </label>
                                                                    <label class="boxed-check">
                                                                        <input class="boxed-check-input" type="radio" name="jenis_jurusan<?php echo $d['id_tempat']; ?>" id="jenis_jurusan3<?php echo $d['id_tempat']; ?>" value="3" <?php echo $jj3; ?>>
                                                                        <span class="boxed-check-label">Nakes Lainnya</span>
                                                                    </label>
                                                                    <label class="boxed-check">
                                                                        <input class="boxed-check-input" type="radio" name="jenis_jurusan<?php echo $d['id_tempat']; ?>" id="jenis_jurusan4<?php echo $d['id_tempat']; ?>" value="4" <?php echo $jj4; ?>>
                                                                        <span class="boxed-check-label">Non-Nakes</span>
                                                                    </label>
                                                                </div>
                                                                <div id="err_jenis_jurusanu" class="text-danger text-xs font-italic"></div><br>
                                                                Keterangan : <br>
                                                                <textarea name="keterangan<?php echo $d['id_tempat']; ?>" class="form-control"><?php echo $d['ket_tempat']; ?></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-success btn-sm" type="button" name="ubah_tempat<?php echo $d['id_tempat']; ?>" id="ubah_tempat<?php echo $d['id_tempat']; ?>">Ubah</button>
                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                $(document).ready(function() {

                                                    $("#ubah_tempat<?php echo $d['id_tempat']; ?>").click(function() {

                                                        console.log("masuk ubah");
                                                        var nama = document.getElementById("nama<?php echo $d['id_tempat']; ?>").value;
                                                        var kapasitas = document.getElementById("kapasitas<?php echo $d['id_tempat']; ?>").value;
                                                        var tarif = document.getElementById("tarif<?php echo $d['id_tempat']; ?>").value;
                                                        var satuan = document.getElementById("satuan<?php echo $d['id_tempat']; ?>").value;
                                                        var jj1 = document.getElementById("jenis_jurusan1<?php echo $d['id_tempat']; ?>").checked;
                                                        var jj2 = document.getElementById("jenis_jurusan2<?php echo $d['id_tempat']; ?>").checked;
                                                        var jj3 = document.getElementById("jenis_jurusan3<?php echo $d['id_tempat']; ?>").checked;
                                                        var jj4 = document.getElementById("jenis_jurusan4<?php echo $d['id_tempat']; ?>").checked;

                                                        //Notif Bila tidak diisi
                                                        if (
                                                            nama == "" ||
                                                            kapasitas == "" ||
                                                            tarif == "" ||
                                                            satuan == "" ||
                                                            (
                                                                jj1 == false &&
                                                                jj2 == false &&
                                                                jj3 == false &&
                                                                jj4 == false
                                                            )
                                                        ) {

                                                            console.log("nama : " + nama + " | kapasitas : " + kapasitas + " | tarif : " + tarif + " | satuan : " + satuan);
                                                            console.log("jj1 : " + jj1 + " | jj2 : " + jj2 + " | jj3 : " + jj3 + " | jj4 : " + jj4);
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
                                                                title: '<center>DATA WAJIB ADA YANG BELUM TERISI</center>'
                                                            });

                                                            //notif nama 
                                                            if (nama == "") {
                                                                document.getElementById("err_nama<?php echo $d['id_tempat']; ?>").innerHTML = "Nama Tempat Harus Diisi";
                                                            } else {
                                                                document.getElementById("err_nama<?php echo $d['id_tempat']; ?>").innerHTML = "";
                                                            }

                                                            //notif kapasitas 
                                                            if (kapasitas == "") {
                                                                document.getElementById("err_kapasitas<?php echo $d['id_tempat']; ?>").innerHTML = "Kapasitas Harus Diisi";
                                                            } else {
                                                                document.getElementById("err_kapasitas<?php echo $d['id_tempat']; ?>").innerHTML = "";
                                                            }

                                                            //notif tarif 
                                                            if (tarif == "") {
                                                                document.getElementById("err_tarif<?php echo $d['id_tempat']; ?>").innerHTML = "Tarif Harus Diisi";
                                                            } else {
                                                                document.getElementById("err_tarif<?php echo $d['id_tempat']; ?>").innerHTML = "";
                                                            }

                                                            //notif satuan 
                                                            if (satuan == "") {
                                                                document.getElementById("err_satuan<?php echo $d['id_tempat']; ?>").innerHTML = "Satuan Harus Diisi";
                                                            } else {
                                                                document.getElementById("err_satuan<?php echo $d['id_tempat']; ?>").innerHTML = "";
                                                            }

                                                            //notif 
                                                            if (
                                                                jj1 == false &&
                                                                jj2 == false &&
                                                                jj3 == false &&
                                                                jj4 == false
                                                            ) {
                                                                document.getElementById("err_jenis_jurusan<?php echo $d['id_tempat']; ?>").innerHTML = "Pilih Jenis Jurusan";
                                                            } else {
                                                                document.getElementById("err_jenis_jurusan<?php echo $d['id_tempat']; ?>").innerHTML = "";
                                                            }
                                                        }
                                                        //tambah tempat
                                                        else {
                                                            var data_uTempat = $('#form_uTempat<?php echo $d['id_tempat']; ?>').serializeArray();
                                                            data_uTempat.push({
                                                                name: 'id',
                                                                value: <?php echo $d['id_tempat']; ?>
                                                            });

                                                            //Simpan Data Praktik dan Tarif
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: "_admin/exc/x_v_tempat_u.php?",
                                                                data: data_uTempat,
                                                                success: function() {
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
                                                                        icon: 'success',
                                                                        title: '<center>Data Berhasil Disimpan</center>'
                                                                    });
                                                                    $('#data_tempat').load("_admin/view/v_tempat.php");
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
                                            <!-- modal ubah tempat  -->
                                            <div class="modal fade" id="<?php echo "tmp_h_m" . $d['id_tempat']; ?>" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_uTempat">
                                                            <div class="modal-header">
                                                                <b>HAPUS TEMPAT</b>
                                                            </div>
                                                            <div class="modal-body">
                                                                Nama Tempat : <?php echo $d['nama_tempat']; ?><br><br>

                                                                Kapasitas : <?php echo $d['kapasitas_tempat']; ?><br><br>

                                                                Tarif : <?php echo "Rp " . number_format($d['tarif_tempat'], 0, '.', '.'); ?><br><br>

                                                                Satuan : <?php echo $d['nama_tarif_satuan']; ?><br><br>

                                                                Jenis Jurusan : <?php echo $d['nama_jurusan_pdd_jenis']; ?><br><br>

                                                                Keterangan : <?php echo $d['ket_tempat']; ?>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input name="id" value="<?php echo $d['id_tempat']; ?>" hidden>
                                                                <button class="btn btn-success btn-sm" type="button" name="hapus_tempat" id="hapus_tempat" onclick="hapus_tempat_()">Hapus</button>
                                                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">Kembali</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                    $no_++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php
                } else {
                ?>
                    <h3 class="text-center"> Data Tempat Tidak Ada</h3>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#data_tempat').load("_admin/view/v_tempat.php");

        $("#tambah_tempat").click(function() {

            // console.log("masuk tambah");
            var nama = document.getElementById("nama").value;
            var kapasitas = document.getElementById("kapasitas").value;
            var tarif = document.getElementById("tarif").value;
            var satuan = document.getElementById("satuan").value;
            var jj1 = document.getElementById("jenis_jurusan1").checked;
            var jj2 = document.getElementById("jenis_jurusan2").checked;
            var jj3 = document.getElementById("jenis_jurusan3").checked;
            var jj4 = document.getElementById("jenis_jurusan4").checked;

            //Notif Bila tidak diisi
            if (
                nama == "" ||
                kapasitas == "" ||
                tarif == "" ||
                satuan == "" ||
                (
                    jj1 == false &&
                    jj2 == false &&
                    jj3 == false &&
                    jj4 == false
                )
            ) {

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
                    title: '<center>DATA WAJIB ADA YANG BELUM TERISI</center>'
                });

                //notif nama 
                if (nama == "") {
                    document.getElementById("err_nama").innerHTML = "Nama Tempat Harus Diisi";
                } else {
                    document.getElementById("err_nama").innerHTML = "";
                }

                //notif kapasitas 
                if (kapasitas == "") {
                    document.getElementById("err_kapasitas").innerHTML = "Kapasitas Harus Diisi";
                } else {
                    document.getElementById("err_kapasitas").innerHTML = "";
                }

                //notif tarif 
                if (tarif == "") {
                    document.getElementById("err_tarif").innerHTML = "Tarif Harus Diisi";
                } else {
                    document.getElementById("err_tarif").innerHTML = "";
                }

                //notif satuan 
                if (satuan == "") {
                    document.getElementById("err_satuan").innerHTML = "Satuan Harus Diisi";
                } else {
                    document.getElementById("err_satuan").innerHTML = "";
                }

                //notif 
                if (
                    jj1 == false &&
                    jj2 == false &&
                    jj3 == false &&
                    jj4 == false
                ) {
                    document.getElementById("err_jenis_jurusan").innerHTML = "Pilih Jenis Jurusan";
                } else {
                    document.getElementById("err_jenis_jurusan").innerHTML = "";
                }
            }
            //tambah tempat
            else {
                var data_tTempat = $('#form_tTempat').serializeArray();

                //Simpan Data Praktik dan Tarif
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_tempat_s.php?",
                    data: data_tTempat,
                    success: function() {
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
                            icon: 'success',
                            title: '<center>Data Berhasil Disimpan</center>'
                        });
                        document.getElementById("form_tTempat").reset();
                        $('#data_tempat').load("_admin/view/v_tempat.php");
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