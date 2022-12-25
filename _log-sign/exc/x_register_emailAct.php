<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/Exception.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/PHPMailer.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/SMTP.php";

// $urlserver = "http://103.147.222.122:84/SM/";
$urlserver = "http://127.0.0.1/SM/";

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
                <a class='btn btn-primary' href='" . $urlserver . "?act_user&crypt=" . $_GET['crypt'] . "' target=' _blank'>Aktivasi</a>
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
    // $mail->Host = 'relay.excellent.co.id';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;


    $mail->Username = 'rsjiwajabar@gmail.com'; // YOUR gmail email
    $mail->Password = 'jtvgvusfwgaxypyf'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('rsjiwajabar@gmail.com', 'RSJ - SM');
    $mail->addAddress(base64_decode(urldecode($_GET['email'])), base64_decode(urldecode($_GET['nama'])));
    // $mail->addReplyTo("fajar.rachmat.h@gmail.com", "RECEIVER");

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Aktivasi Akun SIPAPAP MACO";
    $mail->Body = $isi_email;
    // $mail->AltBody = 'Bayar Hutang';
    // $mail->addAttachment('tte.png');
    if ($mail->send()) {
        echo json_encode(['ket' => 'Sukses']);
    } else {
        echo json_encode(['ket' => 'Gagal']);
    }
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
