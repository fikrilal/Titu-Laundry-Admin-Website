<?php
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require "koneksi.php";

        $query = mysqli_query($koneksi, "SELECT `kode_verifikasi` FROM `register` WHERE id_user='1' ORDER BY kode_verifikasi DESC LIMIT 1");
        $row = mysqli_fetch_array($query);
        $jmlpengguna = $row['kode_verifikasi'];

        //sesuaikan name dengan di form nya ya 
        $email = $_SESSION['emailres'];
        $judul = "Kode verifikasi password";
        $pesan = "Kode verifikasi : $jmlpengguna";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'romu2ateam@gmail.com';                     //SMTP username
    $mail->Password   = 'keogxejrmbjsnzjr';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //pengirim
    $mail->setFrom('email@gmail.com', 'ROMUS2AH.com');
    $mail->addAddress('diphaandimorgan@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $judul;
    $mail->Body    = $pesan;
    $mail->AltBody = '';
    //$mail->AddEmbeddedImage('gambar/logo.png', 'logo'); //abaikan jika tidak ada logo
    //$mail->addAttachment(''); 

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}
          //redirect ke halaman index.php
        echo "<script>alert('Email berhasil terkirim!');window.location='reset-password.php';</script>";
        
        ?>