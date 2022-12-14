<?php if (isset($_GET['pkd_narsum']) && $d_prvl['r_pkd_narsum'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h4 mb-2 text-gray-800">Daftar Pengajuan Narasumber</h1>
            </div>
            <?php if ($d_prvl['c_pkd_narsum'] == "Y") { ?>
                <div class="col-lg-2 text-right">
                    <a href="?pkd_narsum&i" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="data_pdk_narsum"></div>
            </div>
        </div>
    </div>
    <script>
        $('#data_pdk_narsum')
            .load(
                "_admin/view/v_pkd_narsumData.php?&idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>");
    </script>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
