<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/koneksi.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/_add-ons/tanggal_waktu.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/Exception.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/PHPMailer.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/SM/vendor/phpmailer/src/SMTP.php";

// echo "<pre>";
// echo print_r($_POST);
// echo "</pre>";

$id_user = $_POST['idu'];
$id_institusi = $_POST['institusi'];
$nama_user = $_POST['nama'];
$no_telp_user = $_POST['telp'];
$email_user = $_POST['email'];
$password_user = MD5($_POST['password']);
$crypt = bin2hex(urlencode(base64_encode(date('Ymd') . '*sm*' . $id_user . '*sm*' .  $email_user .  '*sm*' . $nama_user . '"')));

$urlserver = "http://103.147.222.122:84/SM/";
// $urlserver = "http://127.0.0.1/SM/";

$isi_email = "
<!DOCTYPE html>
<html>
  <head>
    <title>SM - AKTIVASI AKUN</title>
    <style type='text/css'>
      .body {
        font-family: Arial, Helvetica, sans-serif;
        margin: auto;
        background: rgb(236, 239, 244);
        word-wrap: break-word;
      }

      .container {
        width: 100%;
        padding: 10px 10px 10px 10px;
        background: #fff;
        font-size: 12px;
        max-width: 60%;
      }

      .fixed-header {
        width: 100%;
        background: #4e73df;
        padding: 10px 10px 10px 10px;
        color: #fff;
        top: 50%;
        text-align: center;
        max-width: 60%;
        text-decoration: none;
      }
      .fixed-footer {
        width: 100%;
        background: #fff;
        padding: 10px 10px 10px 10px;
        /* color: #fff; */
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
            SIPAPAP MACO<br />
            (Sistem Informasi Pendaftaran Penjadwalan Praktikan Mahasiswa dan
            Co-Ass)
          </b>
        </div>
        <div class='container'>
          Silahkan Lakukan Aktivasi dengan Menekan tombol dibawah : <br />
          <a
            class='btn btn-primary'
            href='" . $urlserver . "?act_user&crypt=" . $crypt . "'
            target=' _blank'
            >Aktivasi</a
          >
        </div>
        <div class='fixed-footer'>
          <hr />
          RS Jiwa Provinsi Jawa Barat
          <?= date('Y') ?>
          RS Jiwa Provinsi Jawa Barat<br />Jl. Kolonel Maturi KM.7, Desa
          Jambudipa, Kec. Cisarua, Kab. Bandung Barat, 40551<br />
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
    // cek Debug 
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    // $mail->SMTPDebug = 2;

    // Server settings
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->isSMTP();

    $mail->Host = 'smtp.jabarprov.go.id';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username = 'rsj@jabarprov.go.id';
    $mail->Password = 'Rsjiwa*2009*';

    // $mail->Host = 'smtp.gmail.com';
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    // $mail->Port = 587;
    // $mail->Username = 'rsjiwajabar@gmail.com';
    // $mail->Password = 'jtvgvusfwgaxypyf';

    // Sender and recipient settings
    $mail->setFrom('rsj@jabarprov.go.id', 'SIPAPAP MACO - AKTIVASI');
    $mail->addAddress($_POST['email'], $_POST['nama']);
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
