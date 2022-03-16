<?php
include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";

$sql_test = "SELECT * FROM test order by varchart ASC";
$q_test = $conn->query($sql_test);
$r_test = $q_test->rowCount();
if ($r_test > 0) {
?>
    <div class="table-responsive">
        <table class="table table-striped" id="myTable">
            <thead class="thead-dark">
                <tr>
                    <th scope='col'>No</th>
                    <th>Varchart</th>
                    <th>Text</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($d_test = $q_test->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $d_test['varchart']; ?></td>
                        <td><?php echo $d_test['text']; ?></td>
                        <td><?php echo $d_test['date']; ?></td>
                        <td>
                            <button id="<?php echo $d_test['id']; ?>" class="btn btn-primary btn-sm ubah_init"> <i class="fa fa-edit"></i> Edit </button>
                            <button id="<?php echo $d_test['id']; ?>" class="btn btn-danger btn-sm hapus"> <i class="fa fa-trash"></i> Hapus </button>
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
    <h3> Data Test Tidak Ada</h3>
<?php
}
?>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });

    $(".ubah_init").click(function() {
        document.getElementById("u_nama_test").value = "";
        document.getElementById("err_nama_test").innerHTML = "";

        document.getElementById("form_ubah_test").reset();

        $("#data_ubah_test").fadeIn('slow');

        var id = $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: "test3.php",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {

                document.getElementById("form_ubah_test").reset();

                document.getElementById("u_id_test").value = response.id;
                document.getElementById("u_nama_test").value = response.varchart;
            },
            error: function(response) {
                alert(response.responseText);
                console.log(response.responseText);
            }
        });

        $("#data_tambah_test").fadeOut('slow');
    });

    $(".ubah_tutup").click(function() {
        document.getElementById("u_nama_test").value = "";
        document.getElementById("err_nama_test").innerHTML = "";
        document.getElementById("form_ubah_test").reset();
        $("#data_ubah_test").fadeOut('slow');
    });

    $(document).on('click', '.ubah', function() {
        var data = $('#form_ubah_test').serialize();
        var nama_test = document.getElementById("u_nama_test").value;

        if (nama_test == "") {
            document.getElementById("err_nama_test").innerHTML = "Nama Test Harus Diisi";
        } else {
            document.getElementById("err_nama_test").innerHTML = "";
        }
        if (nama_test != "") {
            $.ajax({
                type: 'POST',
                url: "test4.php",
                data: data,
                success: function() {
                    $('#data_test').load('test1.php');

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
            title: 'Hapus?',
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
                    url: "test5.php",
                    data: {
                        "id": $(this).attr('id')
                    },
                    success: function() {
                        $('#data_test').load('test1.php');

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