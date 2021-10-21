<?PHP
    $id_institusi=$_POST['id_institusi'];
    $id_mou=$_POST['id_mou'];
    $nama=$_POST['nama'];
    $no_kontak=$_POST['no_kontak'];s
    $email=$_POST['email'];
    $password=$_POST['password'];
    $ulangi_password=$_POST['ulangi_password'];

    if($password!=$ulangi_password)
    {
        ?>
            <script>
                alert('Password tidak sesuai!');
                document.location.href="?reg";
            </script>
        <?php
    }
    else
    {
        $sql_insert="INSERT INTO `tb_user` (`id_user`,`username_user`,`password_user`,`name_user`,`email_user`) 
                        VALUES (NULL, $)";
        $conn->query($sql_insert);
        ?>
        <script>			
                document.location.href="?lo";
        </script>
        <?php
    }
?>