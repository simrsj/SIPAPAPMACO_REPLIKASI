<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
?>
<div class="card-body">
    <?php
    $sql_data_praktikan = "SELECT * FROM tb_praktikan ";
    $sql_data_praktikan .= " JOIN tb_praktik ON tb_praktikan.id_praktik = tb_praktik.id_praktik";
    $sql_data_praktikan .= " WHERE tb_praktik.id_praktik = " . base64_decode(urldecode($_GET['idp']));
    $sql_data_praktikan .= " AND tb_praktikan.status_praktikan = 'Y'";
    $sql_data_praktikan .= " ORDER BY tb_praktikan.nama_praktikan ASC";
    // echo "$sql_data_praktikan<br>";
    try {
        $q_data_praktikan = $conn->query($sql_data_praktikan);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA PRAKTIK-');";
        echo "document.location.href='?error404';</script>";
    }
    $r_data_praktikan = $q_data_praktikan->rowCount();

    if ($r_data_praktikan > 0) {
    ?>
        <div class="table-responsive">
            <table class="table table-striped" id="myTable">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM / NPM / NIS </th>
                        <th scope="col">No. HP</th>
                        <th scope="col">No. WA</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ALAMAT</th>
                        <th scope="col">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_jumlah_tarif = 0;
                    $no = 1;
                    while ($d_data_praktikan = $q_data_praktikan->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                        <tr>
                            <th scope="row"><?= $no; ?></th>
                            <td><?= $d_data_praktikan['nama_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['no_id_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['telp_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['wa_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['email_praktikan']; ?></td>
                            <td><?= $d_data_praktikan['alamat_praktikan']; ?></td>
                            <td>
                                <a class="btn btn-primary btn-sm collapsed" href="" title="Ubah">
                                    <i class="far fa-edit"></i> Ubah
                                </a>
                                &nbsp;
                                <a class="btn btn-primary btn-sm collapsed" href="" title="Hapus">
                                    <i class="far fa-trash-alt"></i> Hapus
                                </a>
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

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(".ubah_init").click(function() {
        // console.log("ubah_init");
        $('#err_u_nama_mess').empty();
        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "_admin/view/v_messGetData.php",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('#u_id_mess').val(response.id_mess);
                $('#u_nama_mess').val(response.nama_mess);

                // console.log('id mess ' + response.id_mess);
            },
            error: function(response) {
                alert(response.responseText);
                console.log(response.responseText);
            }
        });

        $("#data_tambah_mess").fadeOut(1);
        $("#data_ubah_mess").fadeIn(1);

        var ubahScrollAnimate = $("html, body, input");
        ubahScrollAnimate.stop().animate({
            scrollTop: 0
        }, 500, 'swing', function() {
            $('#u_nama_mess').focus();
        });
    });

    $(".ubah_tutup").click(function() {
        $('#err_u_nama_mess').empty();

        $("#data_ubah_mess").fadeOut(1);
    });

    $(document).on('click', '.ubah', function() {
        var data = $('#form_ubah_mess').serialize();

        var u_id_mess = $('#u_id_mess').val();

        //cek data from tambah bila tidak diiisi
        if (
            u_nama_mess == ""
        ) {
            if (u_nama_mess == "") {
                document.getElementById("err_u_nama_mess").innerHTML = "Nama Mess Harus Diisi";
            } else {
                document.getElementById("err_u_nama_mess").innerHTML = "";
            }
        }

        if (
            u_nama_mess != "" &&
            u_nama_pemilik_mess != ""
        ) {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_v_praktikan_u.php",
                data: data,
                success: function() {
                    Swal.fire({
                        allowOutsideClick: false,
                        // isDismissed: false,
                        icon: 'success',
                        title: '<span class"text-xs"><b>Data Praktikan</b><br>Berhasil Dirubah',
                        showConfirmButton: false,
                        timer: 5000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    $('#data_mess').load("_admin/view/v_messData.php");

                    $('#err_u_nama_mess').empty();

                    $("#data_ubah_mess").fadeOut(1);
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }
    });

    $(document).on('click', '.hapus', function() {
        console.log("hapus");
        Swal.fire({
            position: 'top',
            title: 'Hapus Data Mess ?',
            icon: 'error',
            showCancelButton: true,
            confirmButtonColor: '#1cc88a',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Kembali',
            confirmButtonText: 'Ya',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "_admin/exc/x_v_praktikan_h.php",
                    data: {
                        "h_id_mess": $(this).attr('id')
                    },
                    success: function() {
                        $('#data_mess').load("_admin/view/v_messData.php");

                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        Toast.fire({
                            icon: 'success',
                            title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Dihapus</b></div>'
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