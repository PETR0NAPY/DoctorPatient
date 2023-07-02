<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if(isset($_POST["Register"])){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'doctorpatient254@gmail.com';
    $mail->Password ='lsmjxojygxynftix';
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;


    $mail->setFrom('doctorpatient254@gmail.com');
    $mail->addAddress($_POST["Email"]);

    $mail->isHTML(true);


    $mail->Subject ="Doctor Patient SignUp";
    $mail->Body = "Hello, Thank you for successfully registering to Doctor Patient";

    $mail->send();
}

    echo
    "
    <script>
    alert('Sent Successfully');
    document.location.href= '1st.php';
    </script>
    "

?>