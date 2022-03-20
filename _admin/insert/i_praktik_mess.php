<?php
$id_praktik = $_GET['m'];
$q_praktik = $conn->query("SELECT * FROM tb_praktik WHERE id_praktik = $id_praktik");
$d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
$jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center">
            <div class="h4 text-gray-800 font-weight-bold">
                Pilih Mess/Pemondokan
            </div>
        </div>
        <div class="card-body">
            <?php
            $sql_mess = "SELECT * FROM tb_mess WHERE status_mess = 'y' ORDER BY nama_mess ASC";
            $q_mess = $conn->query($sql_mess);
            $r_mess = $q_mess->rowCount();
            if ($r_mess > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope='col'>No</th>
                                <th>Nama Mess</th>
                                <th>Nama Pemilik</th>
                                <th>Kontak Pemilik</th>
                                <th>Kapasitas Total</th>
                                <th>Tarif Tanpa Makan</th>
                                <th>Tarif Dengan Makan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d_mess['nama_mess']; ?></td>
                                    <td><?php echo $d_mess['nama_pemilik_mess']; ?></td>
                                    <td><?php echo $d_mess['no_pemilik_mess']; ?></td>
                                    <td><?php echo $d_mess['kapasitas_t_mess']; ?></td>
                                    <td><?php echo "Rp " . number_format($d_mess['tarif_tanpa_makan_mess'], 0, ",", "."); ?></td>
                                    <td><?php echo "Rp " . number_format($d_mess['tarif_dengan_makan_mess'], 0, ",", "."); ?></td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            } else {
            ?>
                <h3> Data Mess Tidak Ada</h3>
            <?php
            }
            ?>

            <nav id="navbar-tarif" class="navbar justify-content-center">
                <a class='nav-link btn btn-outline-success' href='#' data-toggle='modal' data-target='#pilih_mess'>
                    PILIH MESS/PEMONDOKAN
                </a>
            </nav>


            <!-- modal tambah Mess  -->
            <div class="modal fade text-left " id="pilih_mess" data-backdrop="static">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form class="form-data text-gray-900" method="post" enctype="multipart/form-data" id="form_sMess">
                            <div class="modal-header">
                                <b>PILIH MESS/PEMONDOKAN</b>
                            </div>
                            <div class="modal-body text-center">
                                <span class="text-lg font-weight-bold">Nama Mess <span style="color:red">*</span></span>
                                <div id="err_mess" class="text-danger text-xs font-italic blink"></div>
                                <select class="form-control" name="id_mess" id="id_mess" required>
                                    <option value="">-- Pilih --</option>
                                    <?php
                                    $q_jurusan = $conn->query("SELECT * FROM tb_mess WHERE status_mess = 'y' ORDER BY nama_mess ASC");
                                    while ($d_jurusan = $q_jurusan->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                        <option value="<?php echo $d_jurusan['id_mess']; ?>"><?php echo $d_jurusan['nama_mess']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <hr>
                                <?php

                                //cari data makan mess
                                $sql_makan_mass = "SELECT * FROM tb_praktik WHERE id_praktik = " . $_GET['m'];
                                $q_makan_mess = $conn->query($sql_makan_mass);
                                $d_makan_mess = $q_makan_mess->fetch(PDO::FETCH_ASSOC);

                                if ($d_makan_mess['makan_mess_praktik'] == 'y') {
                                    $makan_mess = "Dengan Makan";
                                } else {
                                    $makan_mess = "Tanpa Makan";
                                }
                                ?>

                                <span class="text-lg">Institusi Memilih Mess <b><?php echo $makan_mess; ?></b></span>
                                <!-- <span class="text-xs font-intalic">(Praktik memilih <b><?php echo $makan_mess; ?></b>)</span>
                                <div id="err_makan" class="text-danger text-xs font-italic blink"></div>
                                <div class="boxed-check-group boxed-check-primary boxed-check-sm text-center">
                                    <label class="boxed-check">
                                        <input class="boxed-check-input" type="radio" name="makan_mess_pilih" id="makan_mess_pilih1" value="y" required>
                                        <span class="boxed-check-label">Dengan Makan(3x Sehari)</span>
                                    </label>
                                </div>
                                <div class="boxed-check-group boxed-check-primary boxed-check-sm text-center">
                                    <label class="boxed-check">
                                        <input class="boxed-check-input" type="radio" name="makan_mess_pilih" id="makan_mess_pilih2" value="t" required>
                                        <span class="boxed-check-label">Tanpa Makan</span>
                                    </label>
                                </div> -->

                                <input type="hidden" name="makan_mess_pilih" id="makan_mess_pilih" value="<?php echo $d_makan_mess['makan_mess_praktik']; ?>">
                                <input type="hidden" name="path" id="path" value="<?php echo $_GET['prk'] ?>">
                                <input type="hidden" name="id" id="id" value="<?php echo $_GET['m'] ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success btn-sm" id="simpan_mess">SIMPAN</button>
                                <button class="btn btn-outline-dark btn-sm" type="button" data-dismiss="modal">KEMBALI</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#simpan_mess").click(function() {

            // console.log("masuk tambah");
            var path = document.getElementById('path').value;
            var mess = document.getElementById('id_mess').value;
            // var makan = $('input[name="makan_mess_pilih"]:checked').val();
            var makan = document.getElementById('makan_mess_pilih').value;
            // var makan1 = document.getElementById('makan_mess_pilih1').value;
            // var makan2 = document.getElementById('makan_mess_pilih2').value;

            // alert("path:" + path + " mess:" + mess + " makan1:" + makan1 + " makan2:" + makan2 + " makan:" + makan);

            // if (makan == undefined) {
            //     alert("makan:" + makan);
            // }
            // if (makan != undefined) {
            //     alert("makan not:" + makan);
            // }

            //Notif Bila tidak dipilih
            if (
                // makan == undefined || 
                mess == "") {

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
                    title: '<center>DATA BELUM DIPILIH</center>'
                });

                //notif makan tidak diisi
                if (mess == "") {
                    document.getElementById("err_mess").innerHTML = "Pilih Makan";
                } else {
                    document.getElementById("err_mess").innerHTML = "";
                }

                //notif makan tidak diisi
                // if (makan == undefined) {
                //     document.getElementById("err_makan").innerHTML = "Pilih Mess";
                // } else {
                //     document.getElementById("err_makan").innerHTML = "";
                // }
            }

            //tambah mess
            if (
                makan != undefined &&
                mess != ""
            ) {
                var data_tMess = $('#form_sMess').serializeArray();

                //Simpan Data Praktik dan tarif
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_praktik_mess_s.php?",
                    data: data_tMess,
                    success: function() {
                        Swal.fire({
                            allowOutsideClick: false,
                            // isDismissed: false,
                            icon: 'success',
                            title: '<span class"text-xs"><b>DATA MESS</b><br>Berhasil Tersimpan',
                            showConfirmButton: false,
                            html: '<a href="?prk=' + path + '" class="btn btn-outline-primary">OK</a>',
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        }).then(
                            function() {
                                document.location.href = "?prk=" + path;
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
    });
</script>