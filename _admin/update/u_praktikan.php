<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
            <h1 class="h3 mb-2 text-gray-800">Ubah Data Praktikan</h1>
        </div>
    </div>
    <div class="card shadow mb-4 card-body" id="data_ubah_praktikan" style="display: none;">
        <form method="post" class="form-data" id="form_ubah_praktikan">
            <h5 class="mb-2 text-gray-800">Ubah Test</h5>
            <div class="form-group">
                <div class="row">
                    <div class="col-md">
                        <input type="hidden" name="id_praktikan" id="id_praktikan">
                        NAMA : <span class="text-danger">*</span><br>
                        <input class="form-control" name="nama_praktikan" id="nama_praktikan" required>
                        <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_nama"></span>
                    </div>
                    <div class="col-md">
                        NIM / NPM / NIS : <span class="text-danger">*</span><br>
                        <input class="form-control" name="no_id_praktikan" id="no_id_praktikan" required>
                        <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_no_id"></span>
                    </div>
                    <div class="col-md">
                        No. HP : <span class="text-danger">*</span><br>
                        <input class="form-control" name="telp_praktikan" id="telp_praktikan" required>
                        <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_no_hp"></span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md">
                        No. WA : <span class="text-danger">*</span><br>
                        <input class="form-control" name="wa_praktikan" id="wa_praktikan" required>
                        <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_no_wa"></span>
                    </div>
                    <div class="col-md">
                        EMAIL : <span class="text-danger">*</span><br>
                        <input class="form-control" name="email_praktikan" id="email_praktikan" required>
                        <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_email"></span>
                    </div>
                    <div class="col-md">
                        ASAL KOTA / KABUPATEN : <span class="text-danger">*</span><br>
                        <input class="form-control" name="kota_kab_praktikan" id="kota_kab_praktikan" required>
                        <span class="text-danger font-weight-bold  font-italic text-xs blink" id="err_asal"></span>
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

    <div class="card shadow mb-4 card-body" id="data_praktikan"></div>
</div>
<script>
    $(document).ready(function() {

        $('#data_praktikan').load('_admin/update/u_praktikanData.php?u=<?php echo $_GET['u']; ?>');

    });
</script>