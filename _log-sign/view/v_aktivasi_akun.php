<?php
// include $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
if (isset($_GET['act_user']) && isset($_GET['crypt'])) {

    $crypt_decode = base64_decode(urldecode($_GET['crypt']));
    // echo $crypt_decode . "<br>";
    $arr = explode("_",  $crypt_decode);
    // print_r($arr);
    $sql_akun = "SELECT * FROM tb_user";
    $sql_akun .= " WHERE id_user = " . $arr[1];
    // echo "<br>" . $sql_akun;
    try {
        $q_akun = $conn->query($sql_akun);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA USER-');";
        echo "document.location.href='?error404';</script>";
    }
    $r_akun = $q_akun->rowCount();

    //jika data akun aktivasi ada di database
    if ($r_akun > 0) {

        $sql_u_aktivasi = "UPDATE tb_user SET";
        $sql_u_aktivasi .= " status_aktivasi_user = 'Y'";
        $sql_u_aktivasi .= " WHERE id_user = " . $arr[1];
        // echo "<br>" . $sql_u_aktivasi;
        try {
            $conn->query($sql_u_aktivasi);
        } catch (Exception $ex) {
            echo "<script>alert('$ex -DATA AKTIVASI USER-');";
            echo "document.location.href='?error404';</script>";
        }
?>
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-2">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-md">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Registrasi Akun Berhasil Di AKTIVASI</h1>
                                        </div>
                                        <hr>
                                        <div class="text-center">
                                            <h3 class="h4 text-gray-900 mb-4">Silahkan Lakukan LOGIN</h3>
                                        </div>
                                        <div class="text-center">
                                            <a class="btn btn-outline-primary" href="?login">LOGIN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    //jika data akun aktivasi tidak ada di database
    else {
        echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
    }
} else {
    echo "<script>alert('unauthorized');document.location.href='?error401';</script>";
}
