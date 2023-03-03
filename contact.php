
<?php

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require_once "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);
try{
        
    $mail -> isSMTP();
    $mail -> SMTPAuth = true;


    $mail ->Host = "smtp.exmaple.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail ->Port = 587;

    $mail->Username = "you@example.com";
    $mail->Password = "password";

    $mail->setFrom($email, $name);
    $mail->addAddress("sulayman7273303@gmail.com", "Suldanka");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send(); 

    //header("echo '<script>alert("Message")</script>'; Location: index.php");
}catch (Exception $e) {
    //each "<script> alart('Error Your Messege isn't sent.')";
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail -> ErrorInfo;
    Header("Location: index.php");
    die();
}

?>