<?php
$id_institusi = $_POST['id_institusi'];
$nama_user = $_POST['nama_user'];
$no_telp_user = $_POST['no_telp_user'];
$email_user = $_POST['email_user'];
$password_user = MD5($_POST['password_user']);
$sql_email_user = "SELECT * FROM tb_user WHERE username_user = '" . $email_user . "'";
echo $sql_email_user . "<br>";
$q_user = $conn->query($sql_email_user);
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
        alert('Alamat Email <?= $email_user; ?> sudah dipakai!');
        document.location.href = "?reg";
    </script>
<?php
} else {
    if ($id_institusi == 0) {

        $nama_institusi = $_POST['nama_institusi'];
        // //cari id_mou
        // $no = 1;
        // $sql_id_mou = "SELECT id_mou FROM tb_mou ORDER BY id_mou ASC";
        // $q_id_mou = $conn->query($sql_id_mou);
        // while ($d_id_mou = $q_id_mou->fetch(PDO::FETCH_ASSOC)) {
        //     if ($d_id_mou['id_mou'] != $no) {
        //         $id_mou = $no;
        //         break;
        //     }
        //     $no++;
        //     $id_mou = $no;
        // }

        //cari id_institusi
        $sql_id_institusi = "SELECT id_institusi FROM tb_institusi ORDER BY id_institusi DESC LIMIT 1";
        $q_id_institusi = $conn->query($sql_id_institusi);
        $d_id_institusi = $q_id_institusi->fetch(PDO::FETCH_ASSOC);
        $id_institusi = $d_id_institusi['id_institusi'] + 1;

        // //tambah MoU baru
        // $sql_insert_mou = "INSERT INTO `tb_mou` (id_mou, id_institusi) VALUES ('$id_mou', '$id_institusi')";
        // $conn->query($sql_insert_mou);
        // // echo "<br>" . $sql_insert_mou;

        //tambah institusi baru
        $sql_insert_institusi = "INSERT INTO `tb_institusi` (id_institusi, nama_institusi) VALUES ('$id_institusi', '$nama_institusi')";
        echo "<br>" . $sql_insert_institusi;
        try {
            // $conn->query($sql_insert_institusi);
        } catch (Exception $ex) {
            echo "<script>alert('$ex -DATA INSERT INSTITUSI-');";
            echo "document.location.href='?error404';</script>";
        }
    } else {
        $nama_institusi = NULL;
    }

    $sql_insert_user = "INSERT INTO tb_user (";
    // $sql_insert_user .= " id_mou, ";
    $sql_insert_user .= " id_institusi, ";
    $sql_insert_user .= " username_user, ";
    $sql_insert_user .= " password_user, ";
    $sql_insert_user .= " nama_user, ";
    $sql_insert_user .= " email_user, ";
    $sql_insert_user .= " level_user,";
    $sql_insert_user .= " no_telp_user, ";
    $sql_insert_user .= " tgl_buat_user, ";
    $sql_insert_user .= " status_user";
    $sql_insert_user .= " ) VALUES (";
    // $sql_insert_user .= "  '" . $id_mou . "', ";
    $sql_insert_user .= " '" . $id_institusi . "', ";
    $sql_insert_user .= " '" . $email_user . "', ";
    $sql_insert_user .= " '" . $password_user . "', ";
    $sql_insert_user .= " '" . $nama_user . "', ";
    $sql_insert_user .= " '" . $email_user . "', ";
    $sql_insert_user .= " '2', ";
    $sql_insert_user .= " '" . $no_telp_user . "',";
    $sql_insert_user .= " '" . date('Y-m-d') . "', ";
    $sql_insert_user .= " 'Y'";
    $sql_insert_user .= " )";
    echo "<br>" . $sql_insert_user;
    try {
        // $conn->query($sql_insert_user);
    } catch (Exception $ex) {
        echo "<script>alert('$ex -DATA INSERT USER-');";
        echo "document.location.href='?error404';</script>";
    }
?>
    <script>
        alert('Data sudah disimpan silahkan login');
        document.location.href = "?lo";
    </script>
<?php
}
?>