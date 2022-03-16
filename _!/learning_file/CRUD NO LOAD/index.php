<!-- CEK LIBRARY (KONEKSI, TABLE, DLL) SEBELUM MENGGUNAKAN -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Daftar Test</h1>
        </div>
        <div class="col-lg-2 text-right">
            <button class='btn btn-outline-success btn-sm' id="tambah_init">
                <i class="fas fa-plus"></i> Tambah
            </button>
        </div>
    </div>

    <div class="card shadow mb-4 card-body" id="data_tambah_test" style="display: none;">
        <form method="post" class="form-data" id="form_tambah_test">
            <h5 class="mb-2 text-gray-800">Tambah Test</h5>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <input class="form-control" name="t_nama_test" id="t_nama_test">
                        <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_nama_test"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" name="tambah" id="tambah" class="btn btn-success">
                    Tambah
                </button>
                <button type="button" id="tambah_tutup" class="btn btn-outline-danger">
                    Tutup
                </button>
            </div>
        </form>
    </div>
    <div class="card shadow mb-4 card-body" id="data_ubah_test" style="display: none;">
        <form method="post" class="form-data" id="form_ubah_test">
            <h5 class="mb-2 text-gray-800">Ubah Test</h5>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" class="form-control" name="u_nama_test" id="u_nama_test">
                        <input type="hidden" class="form-control" name="u_id_test" id="u_id_test">
                        <div class="text-danger font-weight-bold  font-italic text-xs blink" id="err_nama_test"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" name="ubah" class="btn btn-primary ubah">
                    Ubah
                </button>
                <button type="button" class="btn btn-outline-danger ubah_tutup">
                    Tutup
                </button>
            </div>
        </form>
    </div>

    <div class="card shadow mb-4 card-body" id="data_test">
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#data_test').load('test1.php');

    });
    $("#tambah_init").click(function() {
        document.getElementById("t_nama_test").value = "";
        document.getElementById("err_nama_test").innerHTML = "";
        document.getElementById("form_tambah_test").reset();
        $("#data_tambah_test").fadeIn('slow');
        $("#data_ubah_test").fadeOut('slow');
    });
    $("#tambah_tutup").click(function() {
        document.getElementById("t_nama_test").value = "";
        document.getElementById("err_nama_test").innerHTML = "";
        document.getElementById("form_tambah_test").reset();
        $("#data_tambah_test").fadeOut('slow');
    });

    $("#tambah").click(function() {
        var data = $('#form_tambah_test').serialize();
        var nama_test = document.getElementById("t_nama_test").value;

        if (nama_test == "") {
            document.getElementById("err_nama_test").innerHTML = "Nama Test Harus Diisi";
        } else {
            document.getElementById("err_nama_test").innerHTML = "";
        }

        if (nama_test != "") {
            $.ajax({
                type: 'POST',
                url: "test2.php",
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
                        title: '<div class="text-center font-weight-bold text-uppercase">Data Berhasil Disimpan</b></div>'
                    });
                    document.getElementById("t_nama_test").value = "";
                    document.getElementById("form_tambah_test").reset();
                },
                error: function(response) {
                    console.log(response.responseText);
                }
            });
        }

    });
</script>