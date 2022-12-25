<?php

include 'koneksi.php';
$sql_klien = ' SELECT * FROM klien ';
// $sql_klien .= ' WHERE klien_id = ' . $_GET['id'];
$sql_klien .= ' WHERE klien_id = ' . base64_decode(urldecode($_GET['id']));
// echo $sql_klien . '<br>';

$q_klien = mysqli_query($koneksi, $sql_klien);
$d_klien = mysqli_fetch_assoc($q_klien);

// echo "<pre>";
// echo print_r($d_klien);
// echo "</pre>";
$isi_email = "
<!DOCTYPE html>
<html>

<head>
    <title>SM - AKTIVASI AKUN</title>
    <style type='text/css'>
        .body {
            font-family: Arial, Helvetica, sans-serif;
            /* width: 100%; */
            /* max-width: 60%; */
            margin: auto;
            /* padding: 10px; */
            /* border: 2px solid #ccc !important; */
            /* border-radius: 16px; */
            background: rgb(236, 239, 244);
            word-wrap: break-word;
        }

        .container {
            width: 100%;
            /* margin: 0 auto; */
            padding: 10px 10px 10px 10px;
            /* Center the DIV horizontally */
            background: #fff;
            font-size: 12px;
            max-width: 60%;
        }

        .fixed-header,
        .fixed-footer {
            /* border-radius: 13px; */
            width: 100%;
            background: #4e73df;
            padding: 10px 10px 10px 10px;
            color: #fff;
            top: 50%;
            text-align: center;
            max-width: 60%;
            text-decoration: none;
        }

        .fixed-header {
            top: 0;
            font-size: 16px;
        }

        .fixed-footer {
            bottom: 0;
            font-size: 10px;
        }

        .btn {
            background-color: #4e73df;
            /* Green */
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .btn-primary {
            background-color: white;
            color: #4e73df;
            border: 2px solid #4e73df;
        }

        .btn-primary:hover {
            background-color: #4e73df;
            color: white;
        }
    </style>
</head>

<body>
    <div class='body'>
        <center>
            <div class='fixed-header'>
                <b>
                    SIPAPAP MACO<br>
                    (Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan Co-Ass)

                </b>
            </div>
            <div class='container'>
                Silahkan Lakukan Aktivasi dengan Menekan tombol dibawah : <br>
                <a class='btn btn-primary' href='localhost/SM/?act_user&crypt=" . urlencode(base64_encode(date(' Ymd') . '12' . '_' . 'fajar.rachmat.h@gmail.com' . '_' . 'Fajar Rachmat Hermansyah')) . "' target=' _blank'>Aktivasi</a>
            </div>
            <div class='fixed-footer '>
                RS Jiwa Provinsi Jawa Barat <?= date('Y') ?>
                RS Jiwa Provinsi Jawa Barat<br>Jl. Kolonel Maturi KM.7, Desa Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551<br>
                www.rsj.jabarprov.go.id, email : rsj@jabarprov.go.id
            </div>
        </center>
    </div>
</body>

</html>
";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/phpmailer/src/Exception.php';
require_once __DIR__ . '/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/phpmailer/src/SMTP.php';

// passing true in constructor enables exceptions in PHPMailer
$mail = new PHPMailer(true);

try {
    // Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;


    $mail->Username = 'rsjiwajabar@gmail.com'; // YOUR gmail email
    $mail->Password = 'jtvgvusfwgaxypyf'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('rsjiwajabar@gmail.com', 'RSJ PROV JABAR');
    $mail->addAddress(base64_decode(urldecode($_GET['email'])), base64_decode(urldecode($_GET['nama'])));
    // $mail->addReplyTo(base64_decode(urldecode($_GET['email'])), base64_decode(urldecode($_GET['nama'])));

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Hasil Survey SDQ";
    $mail->Body = $isi_email;
    // $mail->AltBody = 'Bayar Hutang';
    // $mail->addAttachment('tte.png');
    if ($mail->send()) {
        // echo "Email Berhasil!";
    } else {
        echo "Email Gagal";
    }
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
?>
<script>
    window.location.href = "survey.php?alert=<?= urlencode(base64_encode('selesai')) ?>" +
        "&id=<?= $_GET['id'] ?>" +
        "&email=<?= $_GET['email'] ?>" +
        "&kesimpulan_kesulitan=<?= $_GET['kesimpulan_kesulitan'] ?>" +
        "&kesimpulan_e=<?= $_GET['kesimpulan_e'] ?>" +
        "&kesimpulan_c=<?= $_GET['kesimpulan_c'] ?>" +
        "&kesimpulan_h=<?= $_GET['kesimpulan_h'] ?>" +
        "&kesimpulan_p=<?= $_GET['kesimpulan_p'] ?>" +
        "&kesimpulan_pro=<?= $_GET['kesimpulan_pro'] ?>";
</script>