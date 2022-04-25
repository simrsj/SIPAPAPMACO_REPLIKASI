<?php
if (isset($_POST['ubah_user'])) {

    if ($_POST['password_user'] != $_POST['ulangi_password_user']) {
        echo "
        <script>
            alert('PASSWORD TIDAK SESUAI');
            document.location.href = '?aku';
        </script>
        ";
    } else {
        $sql_ubah_user = "UPDATE tb_user SET 
            username_user = '" . $_POST['username_user'] . "',
            password_user = '" . md5($_POST['password_user']) . "',
            nama_user = '" . $_POST['nama_user'] . "',
            email_user = '" . $_POST['email_user'] . "',
            level_user = 2,
            no_telp_user = '" . $_POST['no_telp_user'] . "',
            tgl_ubah_user = '" . date('Y-m-d') . "'

            WHERE id_user = '" . $_SESSION['id_user'] . "'";

        // echo $sql_ubah_user . "<br";
        $conn->query($sql_ubah_user);

        echo "
            <script>
                alert('DATA AKUN SUDAH DIRUBAH');
                document.location.href = '?aku';
            </script>
            ";
    }
} else {
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10">
                <h1 class="h3 mb-2 text-gray-800">Data Ubah Akun</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form class="form-group" method="POST">
                            <?php
                            $sql_akun = "SELECT * FROM tb_user WHERE id_user = '" . $_SESSION['id_user'] . "'";
                            $q_akun = $conn->query($sql_akun);

                            $d_akun = $q_akun->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <b>Username : </b><br>
                            <input class="form-control" type="text" name="username_user" value="<?php echo $d_akun['username_user']; ?>" required><br>
                            <b>Nama Akun : </b><br>
                            <input class="form-control" type="text" name="nama_user" value="<?php echo $d_akun['nama_user']; ?>" required><br>
                            <b>No. Telp. : </b><br>
                            <input class="form-control" type="number" name="no_telp_user" value="<?php echo $d_akun['no_telp_user']; ?>"><br>
                            <b>E-Mail : </b><br>
                            <input class="form-control" type="email" name="email_user" value="<?php echo $d_akun['email_user']; ?>"><br>
                            <hr>
                            <div class="font-weight-bold text-center mb-2 text-uppercase">Ubah Password</div>
                            <div class="row">
                                <div class="col-md-6">
                                    <b>Password : </b><br>
                                    <input class="form-control" type="password" name="password_user" required><br>
                                </div>
                                <div class="col-md-6">
                                    <b>Ulangi Password : </b><br>
                                    <input class="form-control" type="password" name="ulangi_password_user" required><br>
                                </div>
                            </div>

                            <div class="row col-md-auto justify-content-center">
                                <button type="submit" class="btn btn-primary btn-sm" name="ubah_user">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>