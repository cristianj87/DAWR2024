<?php

$name = $_POST["nombre"];
$email = $_POST["email"];
$subject = $_POST["asunto"];
$message = $_POST["mensaje"];

require "./PHPmailerweb-main/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

// $mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
//$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "spyder87@gmail.com";
$mail->Password = "xjex ismb ydia qpiu";

$mail->setFrom($email,$name);
$mail->addAddress("spyder87@gmail.com", "jahaziel");
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $message."<br/> Mi correo es $email";
if (!$mail->send()){
    echo "<script>
                alert('¡Error en el envío del mensaje!');
                window.location= 'contacto.php'
                </script>";
}else{
    echo "<script>
                alert('¡Tu correo ha sido enviado, pronto te contactaremos!');
                location.href= 'home.php'
                </script>";
}

//header("Location: index2.html");

