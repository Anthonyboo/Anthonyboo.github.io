<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$f_name = $_POST['f_name'];
$s_name = $_POST['s_name'];
$p_name = $_POST['p_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'in-v3.mailjet.com';
// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '7c922323143484f7e3f347179737d730'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'd5cc2ba08e000a549c442d2784f48aef'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('	
nastolportal@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('nastolportal@gmail.com');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка Gumoprom.ru';
$mail->Body = ''.$s_name." ".$f_name." ".$p_name. ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email.'<br>Текст заявки: '.$message;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: index.html');
}
?>
