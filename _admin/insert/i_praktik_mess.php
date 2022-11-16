<?php
if ($d_prvl['c_praktik_mess'] == 'Y') {

    $id_praktik = base64_decode(urldecode($_GET['prk']));
    $sql_praktik = "SELECT * FROM tb_praktik ";
    $sql_praktik .= " JOIN tb_institusi ON tb_praktik.id_institusi = tb_institusi.id_institusi";
    $sql_praktik .= " WHERE id_praktik = $id_praktik";
    // echo $sql_praktik;
    // $q_praktik = $conn->query($sql_praktik);

    try {
        $q_praktik = $conn->query($sql_praktik);
        echo "<script>console.log('Query Praktik Berhasil!')</script>";
    } catch (Exception $ex) {
        // echo $ex->getMessage();
        echo "<script>alert('Maaf Data Tidak Ada');document.location.href='?error404';</script>";
    }

    // echo $q_praktik->rowCount();

    $d_praktik = $q_praktik->fetch(PDO::FETCH_ASSOC);
    $jumlah_praktik = $d_praktik['jumlah_praktik'];
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 h4 text-gray-900">
                Pilih Mess/Pemondokan
            </div>
        </div>
        <!-- Data Praktik -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <div class="row text-center h6 text-gray-900 ">
                    <div class="col-6">
                        Nama Institusi :
                        <b><?= $d_praktik['nama_institusi']; ?></b>
                        <hr>
                        Jumlah Praktik :
                        <b><?= $d_praktik['jumlah_praktik']; ?></b>
                    </div>
                    <div class="col-6">
                        Tanggal Mulai :
                        <b><?= tanggal($d_praktik['tgl_mulai_praktik']); ?></b>
                        <hr>
                        Tanggal Selesai :
                        <b><?= tanggal($d_praktik['tgl_selesai_praktik']); ?></b>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pilih Mess/Pemondokan -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-body">
                <?php
                $sql_mess = "SELECT * FROM tb_mess ";
                $sql_mess .= " WHERE status_mess = 'Y'";
                $sql_mess .= " ORDER BY kepemilikan_mess ASC, nama_mess ASC";

                // echo $sql_mess . "<br>";
                $q_mess = $conn->query($sql_mess);
                $r_mess = $q_mess->rowCount();
                if ($r_mess > 0) {
                ?>

                    <input type="hidden" name="jumlah_mess" id="jumlah_mess" value="<?= $r_mess; ?>">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark text-center">
                                <tr>
                                    <th scope='col'>No</th>
                                    <th>Nama Mess</th>
                                    <th>Nama Pemilik</th>
                                    <th>Kontak Pemilik</th>
                                    <th>Kapasitas Total</th>
                                    <th>Status Kuota</th>
                                    <th>Cek Jadwal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($d_mess = $q_mess->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <input type="hidden" name="mess<?= $no; ?>" id="mess<?= $no; ?>" value="<?= $d_mess['id_mess']; ?>">
                                    <tr class="text-center">
                                        <td><?= $no; ?></td>
                                        <td class="text-left"><?= $d_mess['nama_mess']; ?></td>
                                        <td><?= $d_mess['nama_pemilik_mess']; ?></td>
                                        <td><?= $d_mess['telp_pemilik_mess']; ?></td>
                                        <td><?= $d_mess['kapasitas_t_mess']; ?></td>
                                        <td>
                                            <div class="ketersediaan_mess<?= $no; ?>"></div>
                                        </td>
                                        <td>
                                            <!-- tambah harga -->
                                            <a class='btn btn-outline-dark btn-sm cekJadwalMess<?= $no; ?>' id='<?= $d_mess['id_mess']; ?>' href='#' data-toggle='modal' data-target='#modalMess<?= $d_mess['id_mess']; ?>'>
                                                <i class="fas fa-info-circle"></i> Rincian
                                            </a>

                                            <!-- modal tambah Harga  -->
                                            <div class="modal fade" id="modalMess<?= $d_mess['id_mess']; ?>">
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg ">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-uppercase font-weight-bold">
                                                            <b><?= $d_mess['nama_mess']; ?></b>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            <div id="dataJadwalMess<?= $no; ?>"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
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

                <!-- data mess dalam mess1 dan mess2 -->
                <input type="hidden" name="mess1" id="mess1">
                <input type="hidden" name="mess2" id="mess2">

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

                                    <!-- data pilih mess kosong -->
                                    <select class="select2" name="id_mess" id="id_mess" required>
                                    </select>
                                    <div id="err_mess" class="text-danger text-xs font-italic blink mb-3"></div>
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

                                    <div class="jumbotron mb-3">
                                        <div class="jumbotron-fluid text-lg">
                                            Institusi Memilih Mess <b><?= $makan_mess; ?></b>
                                        </div>
                                    </div>
                                    <div class="jumbotron">
                                        <div class="jumbotron-fluid">
                                            "Pilihan yang dimunculkan <br>
                                            <b>dipioritaskan Mess yang dari RSJ</b>, <br>
                                            bila Mess RSJ <b>tidak bisa menampung praktikan</b> <br>
                                            maka akan dialihkan ke <b>Mess/Pemondokan diluar</b>"
                                        </div>
                                    </div>

                                    <input type="hidden" name="makan_mess_pilih" id="makan_mess_pilih" value="<?= $d_makan_mess['makan_mess_praktik']; ?>">
                                    <input type="hidden" name="path" id="path" value="<?= $_GET['prk'] ?>">
                                    <input type="hidden" name="id" id="id" value="<?= $_GET['m'] ?>">
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
            <?php

            //Perulangan jumlah mess/pemodalan yang aktif
            $no1 = 1;
            while ($no1 <= $r_mess) {
            ?>
                $(".cekJadwalMess<?= $no1; ?>").click(function() {
                    var id = $(this).attr('id');
                    var xhttp = new XMLHttpRequest();

                    xhttp.open("GET", "_admin/insert/i_praktik_mess_dataJadwal.php?id=" + id, true);
                    xhttp.send();

                    xhttp.onreadystatechange = function() {
                        document.getElementById("dataJadwalMess<?= $no1; ?>").innerHTML = xhttp.responseText;
                    };
                });

                var id_mess = $('#mess<?= $no1; ?>').val();
                $.ajax({
                    type: 'POST',
                    url: "_admin/insert/i_praktik_mess_dataTgl.php?id_m=" + id_mess,
                    data: {
                        id_m: id_mess,
                        jp: "<?= $jumlah_praktik; ?>",
                        tgl_m: "<?= $d_praktik['tgl_mulai_praktik']; ?>",
                        tgl_s: "<?= $d_praktik['tgl_selesai_praktik']; ?>"
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.messKet == 'T') {
                            $('.ketersediaan_mess<?= $no1; ?>').html('<span class="badge badge-success">Kosong</span>');
                        } else if (response.ket == 'Y') {
                            $('.ketersediaan_mess<?= $no1; ?>').html('<span class="badge badge-danger">Penuh</span>');
                        } else {
                            $('.ketersediaan_mess<?= $no1; ?>').html('<span class="badge badge-danger">ERROR!!!</span>');
                        }
                        // $('#option_mess').append(response.messOption).trigger("change");
                    },
                    error: function(response) {
                        console.log(response.messKet);
                        alert('eksekusi query jadwal mess gagal');
                    }
                });
            <?php
                $no1++;
            }
            ?>

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
                        document.getElementById("err_mess").innerHTML = "Pilih Mess/Pemondokan";
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

            //select option pilih mess/pemondokan
            $.ajax({
                type: 'POST',
                url: "_admin/insert/i_praktik_mess_selectOption.php?",
                data: {
                    jp: "<?= $jumlah_praktik; ?>",
                    tgl_m: "<?= $d_praktik['tgl_mulai_praktik']; ?>",
                    tgl_s: "<?= $d_praktik['tgl_selesai_praktik']; ?>"
                },
                dataType: 'json',
                success: function(response) {
                    $('#id_mess').append(response.option).trigger("change");
                    // console.log(response.option);
                },
                error: function(response) {
                    console.log(response.ket);
                    alert('eksekusi query gagal');
                }
            });

        });
    </script>
<?php } else {
    echo "<script>alert('Maaf anda tidak punya hak akses');document.location.href='?error401';</script>";
}
