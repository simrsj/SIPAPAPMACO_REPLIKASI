<?php

// include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
// include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
// include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/Exception.php";
// include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/PHPMailer.php";
// include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/SMTP.php";
require_once __DIR__ . '/SM/_add-ons/koneksi.php';
require_once __DIR__ . '/SM/_add-ons/tanggal_waktu.php';
require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';
// $sql = ' SELECT * FROM polling INNER JOIN pertanyaan ';
// $sql .= ' ON polling.polling_pertanyaan = pertanyaan.pertanyaan_id ';
// $sql .= ' inner join klien on klien.klien_id = polling.polling_klien ';
// // $sql .= ' WHERE polling_klien = ' . $_GET['id'];

$isi_email = "

<html>
<head></head>

<body>

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


    $mail->Username = 'rsj@jabarprov.go.id'; // YOUR gmail email
    $mail->Password = 'Rsjiwa*2009*'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('rsj@jabarprov.go.id', 'RSJ PROV JABAR');
    $mail->addAddress("fajar.rachmat.h@gmail.com", "RECEIVER");
    $mail->addAddress("lukman.salehudin@gmail.com", "RECEIVER");
    // $mail->addReplyTo(base64_decode(urldecode($_GET['email'])), base64_decode(urldecode($_GET['nama'])));

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "TESTING ZIMBRA";
    $mail->Body = $isi_email;
    // $mail->AltBody = 'Bayar Hutang';
    // $mail->addAttachment('tte.png');
    if ($mail->send()) {
        echo "Email Berhasil!";
    } else {
        echo "Email Gagal";
    }
} catch (Exception $e) {
    echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
}
