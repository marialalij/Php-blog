<?php
use PHPMailer\PHPMailer\PHPMailer;


require_once '../phpmailer/PHPMailer.php';
require_once '../phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'marialalij@gmail.com';
    $mail->Password = 'mhjr@1190'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('marialalij@gmail.com'); 
    $mail->addAddress('marialalij@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";

    $mail->send();
    $alert = '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
}

?>
