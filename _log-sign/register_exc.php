<?PHP
//$id_institusi=$_POST['id_institusi'];
$id_mou = $_POST['id_mou'];
$nama = $_POST['nama'];
$no_kontak = $_POST['no_kontak'];
$email = $_POST['email'];
$password = $_POST['password'];
$ulangi_password = $_POST['ulangi_password'];
$tanggal_sekarang = date('Y-m-d');

//echo $id_mou . "|" . $nama . "|" . $no_kontak . "|" . $email . "|" . $password . "|" . $ulangi_password . "|" . $tanggal_sekarang;
if ($password != $ulangi_password) {
?>
    <script>
        alert('Password tidak sesuai!');
        document.location.href = "?reg";
    </script>
<?php
} else {
    if ($id_mou == 0) {
        $nama_ip = $_POST['nama_ip'];
        $sql_mou = "SELECT id_mou FROM tb_mou order by id_mou ASC";

        $q_mou = $conn->query($sql_mou);
        $r_mou = $q_mou->rowCount();
        while ($d_mou = $q_mou->fetch(PDO::FETCH_ASSOC)) {
            $id_mou_baru = $d_mou['id_mou'] + 1;
        }
        $id_mou = $id_mou_baru;

        $sql_insert_mou = "INSERT INTO `tb_mou` (`id_mou`,`institusi_mou`) VALUES (NULL, '$nama_ip')";
        //echo "<br> INSERT INTO `tb_mou` (`id_mou`,`institusi_mou`) VALUES (NULL, $nama_ip)";
        $conn->query($sql_insert_mou);
    }
    $sql_insert_user = "INSERT INTO tb_user (
    id_user, 
    username_user, 
    password_user, 
    nama_user, 
    email_user, 
    level_user, 
    tgl_buat_user, 
    status_user
    ) VALUES (
        NULL, 
        '$email', 
        '$password', 
        '$nama', 
        '$email', 
        '2', 
        '$tanggal_sekarang', 
        'Y'
    )";
    $conn->query($sql_insert_user);
    //echo "<br> $sql_insert_user";
?>
    <script>
        alert('Data sudah disimpan silahkan login');
        document.location.href = "?lo";
    </script>
<?php
}
?>