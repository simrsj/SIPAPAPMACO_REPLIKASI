<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql_kuota = "SELECT * FROM tb_kuota ";
$sql_kuota .= " ORDER BY tb_kuota.nama_kuota ASC";
// echo $sql_kuota;

$q_data_kuota = $conn->query($sql_kuota);
$r_data_kuota = $q_data_kuota->rowCount();

if ($r_data_kuota > 0) {
?>
    <div class="table-responsive">
        <table class="table table-striped" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kuota</th>
                    <th scope="col">Jumlah Kuota </th>
                    <th scope="col">Keterangan </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_jumlah_tarif = 0;
                $no = 1;
                while ($d_data_kuota = $q_data_kuota->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td><?php echo $d_data_kuota['nama_kuota']; ?></td>
                        <td><?php echo $d_data_kuota['jumlah_kuota']; ?></td>
                        <td><?php echo $d_data_kuota['ket_kuota']; ?></td>
                        <td>
                            <button id="<?php echo $d_data_kuota['id_kuota']; ?>" class="btn btn-primary btn-sm ubah_init" title="UBAH">
                                <i class="fa fa-edit"></i> Ubah
                            </button>
                            <button id="<?php echo $d_data_kuota['id_kuota']; ?>" class="btn btn-danger btn-sm hapus" title="HAPUS">
                                <i class="fa fa-trash"></i> Hapus
                            </button>
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
</div>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(".ubah_init").click(function() {
        document.getElementById("err_nama").innerHTML = "";
        document.getElementById("err_jumlah").innerHTML = "";
        document.getElementById("form_ubah_kuota").reset();
        $("#data_ubah_kuota").fadeIn('slow');
        $("#data_tambah_kuota").fadeOut('fast');

        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "_admin/update/u_kuotaGetData.php",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {

                document.getElementById("form_ubah_kuota").reset();

                document.getElementById("id_kuota").value = response.id_kuota;
                document.getElementById("nama_kuota").value = response.nama_kuota;
                document.getElementById("no_id_kuota").value = response.no_id_kuota;
                document.getElementById("telp_kuota").value = response.telp_kuota;
                document.getElementById("wa_kuota").value = response.wa_kuota;
                document.getElementById("email_kuota").value = response.email_kuota;
                document.getElementById("kota_kab_kuota").value = response.kota_kab_kuota;
            },
            error: function(response) {
                alert(response.responseText);
                console.log(response.responseText);
            }
        });

        $("#data_tambah_test").fadeOut('slow');
    });

    $(".ubah_tutup").click(function() {
        document.getElementById("err_nama").innerHTML = "";
        document.getElementById("err_no_id").innerHTML = "";
        document.getElementById("err_no_hp").innerHTML = "";
        document.getElementById("err_no_wa").innerHTML = "";
        document.getElementById("err_email").innerHTML = "";
        document.getElementById("err_asal").innerHTML = "";
        document.getElementById("form_ubah_kuota").reset();
        $("#data_ubah_kuota").fadeOut('slow');
    });

    $(document).on('click', '.ubah', function() {
        var data = $('#form_ubah_kuota').serialize();
        var nama_kuota = document.getElementById("nama_kuota").value;
        var no_id_kuota = document.getElementById("no_id_kuota").value;
        var telp_kuota = document.getElementById("telp_kuota").value;
        var wa_kuota = document.getElementById("wa_kuota").value;
        var email_kuota = document.getElementById("email_kuota").value;
        var kota_kab_kuota = document.getElementById("kota_kab_kuota").value;

        //cek data from ubah bila tidak diiisi
        if (
            nama_kuota == "" ||
            no_id_kuota == "" ||
            telp_kuota == "" ||
            wa_kuota == "" ||
            email_kuota == "" ||
            kota_kab_kuota == ""
        ) {
            if (nama_kuota == "") {
                document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
            } else {
                document.getElementById("err_nama").innerHTML = "";
            }

            if (no_id_kuota == "") {
                document.getElementById("err_no_id").innerHTML = "NIM / NPM / NIS Harus Diisi";
            } else {
                document.getElementById("err_no_id").innerHTML = "";
            }

            if (telp_kuota == "") {
                document.getElementById("err_no_hp").innerHTML = "No. Telp Harus Diisi";
            } else {
                document.getElementById("err_no_hp").innerHTML = "";
            }

            if (wa_kuota == "") {
                document.getElementById("err_no_wa").innerHTML = "No. WA Harus Diisi";
            } else {
                document.getElementById("err_no_wa").innerHTML = "";
            }

            if (email_kuota == "") {
                document.getElementById("err_email").innerHTML = "Email Harus Diisi";
            } else {
                document.getElementById("err_email").innerHTML = "";
            }

            if (kota_kab_kuota == "") {
                document.getElementById("err_asal").innerHTML = "Kota/Kabupaten Harus Diisi";
            } else {
                document.getElementById("err_asal").innerHTML = "";
            }

        } else {
            $.ajax({
                type: 'POST',
                url: "_admin/exc/x_u_kuota_u.php",
                data: data,
                success: function() {
                    $('#data_kuota').load('_admin/update/u_kuotaData.php?u=<?php echo $_GET['u']; ?>');

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
                        title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Diubah</b></div>'
                    });
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
            title: 'Hapus Data Praktikan?',
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
                    url: "_admin/exc/x_u_kuota_h.php",
                    data: {
                        "id_kuota": $(this).attr('id')
                    },
                    success: function() {
                        $('#data_kuota').load('_admin/update/u_kuotaData.php?u=<?php echo $_GET['u']; ?>');

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
                            title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil DIHAPUS</b></div>'
                        });
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('eksekusi query gagal');
                    }
                });
            }
        })
    });
</script>