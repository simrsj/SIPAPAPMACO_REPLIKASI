<?PHP
$id_institusi = $_POST['id_institusi'];
$nama_institusi = $_POST['nama_institusi'];
$nama_user = $_POST['nama_user'];
$no_telp_user = $_POST['no_telp_user'];
$email_user = $_POST['email_user'];
$password_user = MD5($_POST['password_user']);
$ulangi_password = $_POST['ulangi_password'];

$q_user = $conn->query("SELECT * FROM tb_user WHERE username_user = '" . $email_user . "'");
$d_user = $q_user->fetch(PDO::FETCH_ASSOC);
if ($password_user != $ulangi_password) {
?>
    <script>
        alert('Password tidak sesuai!');
        document.location.href = "?reg";
    </script>
<?php
} elseif ($d_user['email_user'] == $email_user) {
?>
    <script>
        alert('Alamat email/username <?php echo $email_user; ?> sudah dipakai!');
        document.location.href = "?reg";
    </script>
<?php
} else {
    if ($id_institusi == 0) {

        //cari id_mou
        $no = 1;
        $sql_id_mou = "SELECT id_mou FROM tb_mou ORDER BY id_mou ASC";
        $q_id_mou = $conn->query($sql_id_mou);
        while ($d_id_mou = $q_id_mou->fetch(PDO::FETCH_ASSOC)) {
            if ($d_id_mou['id_mou'] != $no) {
                $id_mou = $no;
                break;
            }
            $no++;
            $id_mou = $no;
        }

        //cari id_institusi
        $no = 1;
        $sql_id_institusi = "SELECT id_institusi FROM tb_institusi ORDER BY id_institusi ASC";
        $q_id_institusi = $conn->query($sql_id_institusi);
        while ($d_id_institusi = $q_id_institusi->fetch(PDO::FETCH_ASSOC)) {
            if ($d_id_institusi['id_institusi'] != $no) {
                $id_institusi = $no;
                break;
            }
            $no++;
            $id_institusi = $no;
        }


        //tambah MoU baru
        $sql_insert_mou = "INSERT INTO `tb_mou` (id_mou, id_institusi) VALUES ('$id_mou', '$id_institusi')";
        // $conn->query($sql_insert_mou);
        echo "<br>" . $sql_insert_mou;

        //tambah institusi baru
        $sql_insert_institusi = "INSERT INTO `tb_institusi` (id_institusi, nama_institusi) VALUES ('$id_institusi', '$nama_institusi')";
        // $conn->query($sql_insert_institusi);
        echo "<br>" . $sql_insert_institusi;
    }

    $sql_insert_user = "INSERT INTO tb_user (
    id_insitusi, 
    username_user, 
    password_user, 
    nama_user, 
    email_user, 
    level_user, 
    no_telp_user, 
    tgl_buat_user, 
    status_user
    ) VALUES (
        '.$id_insitusi.', 
        '.$email_user.', 
        '.$password_user.', 
        '.$nama_user.', 
        '.$email_user.', 
        '2', 
        '.$no_telp_user.',
        '" . date('Y-m-d') . "', 
        'Y'
    )";
    // $conn->query($sql_insert_user);
    echo "<br>" . $sql_insert_user;
?>
    <!-- <script>
        alert('Data sudah disimpan silahkan login');
        document.location.href = "?lo";
    </script> -->
<?php
}
?>