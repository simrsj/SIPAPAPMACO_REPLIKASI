<?php if (isset($_GET['pbyr']) && $d_prvl['r_praktik_bayar'] == "Y") { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h4 mb-2 text-gray-800">Daftar Pembayaran Praktik</h1>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
                <div id="data_bayar"></div>
            </div>
        </div>
    </div>
    <script>
        $('#data_bayar')
            .load(
                "_admin/view/v_praktik_bayarData.php?&idu=<?= urlencode(base64_encode($_SESSION['id_user'])); ?>");
    </script>
<?php } else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
