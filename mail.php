<?php

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
$mail->Host = 'imap.yandex.ru';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info@gumoprom.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'a061271qqA'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 993; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('info@gumoprom.ru'); // от кого будет уходить письмо?
$mail->addAddress('nastolportal@gmail.com');     // Кому будет уходить письмо
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка Gumoprom.ru';
$mail->Body    = '' .$s_name $f_name $p_name . ' оставил заявку, его телефон ' .$phone. '<br>Почта этого пользователя: ' .$email'<br>Текст заявки: '$message;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: index.html');
}
?>
