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
                                <th>Harga Tanpa Makan</th>
                                <th>Harga Dengan Makan</th>
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
                                    <td><?php echo "Rp " . number_format($d_mess['harga_tanpa_makan_mess'], 0, ",", "."); ?></td>
                                    <td><?php echo "Rp " . number_format($d_mess['harga_dengan_makan_mess'], 0, ",", "."); ?></td>
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

            <nav id="navbar-harga" class="navbar justify-content-center">
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
                            <div class="modal-body">
                                <fieldset class="fieldset">
                                    <legend class="legend-fieldset">Nama Mess <span style="color:red">*</span></legend>
                                    <div id="err_mess" class="text-danger text-xs font-italic"></div>
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
                                </fieldset>
                                <hr>
                                <fieldset class="fieldset">
                                    <legend class="legend-fieldset">Makan Mess <span style="color:red">*</span></legend>
                                    <div id="err_makan" class="text-danger text-xs font-italic"></div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="makan_mess_pilih1" name="makan_mess_pilih" value="y" class="custom-control-input" required>
                                        <label class="custom-control-label" for="makan_mess_pilih1">Pakai Makan (3x Sehari)</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="makan_mess_pilih2" name="makan_mess_pilih" value="t" class="custom-control-input" required>
                                        <label class="custom-control-label" for="makan_mess_pilih2">Tidak Pakai Makan</label>
                                    </div>
                                </fieldset>
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
            // var makan1 = document.getElementById('makan_mess_pilih1').value;
            // var makan2 = document.getElementById('makan_mess_pilih2').value;
            var makan = $('input[name="makan_mess_pilih"]:checked').val();

            // alert("path:" + path + " mess:" + mess + " makan1:" + makan1 + " makan2:" + makan2 + " makan:" + makan);

            // if (makan == undefined) {
            //     alert("makan:" + makan);
            // }
            // if (makan != undefined) {
            //     alert("makan not:" + makan);
            // }

            //Notif Bila tidak dipilih
            if (makan == undefined || mess == "") {

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
                if (makan == undefined) {
                    document.getElementById("err_makan").innerHTML = "Pilih Mess";
                } else {
                    document.getElementById("err_makan").innerHTML = "";
                }
            }

            //tambah tempat
            if (makan != undefined && mess != "") {
                var data_tMess = $('#form_sMess').serializeArray();

                //Simpan Data Praktik dan Harga
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_i_praktik_mess_s.php?",
                    data: data_tMess,
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