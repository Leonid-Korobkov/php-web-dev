<?php
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

require_once('../functions.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email = $_GET['email'];
$username = $_GET['user_username'];
$email_token = $_GET['token'];

$mail = new PHPMailer(true);
$confirmation_link = "https://korobkov.xn--80ahdri7a.site/main-site/email/confirm.php?token=$email_token";
$titleMail = "Подтверждение регистрации на сайте автосалона";

try {
  $mail->isSMTP();
  $mail->CharSet = "UTF-8";
  $mail->SMTPAuth = true;

  $mail->Host = $_ENV['MAIL_HOST'];
  $mail->Username = $_ENV['MAIL_USER_ADDRES'];
  $mail->Password = $_ENV['MAIL_USER_PASSWORD'];
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom($_ENV['MAIL_USER_ADDRES'], 'Автосалон - подтверждение регистрации');
  $mail->addAddress($email);

  $mail->isHTML(true);
  $mail->Subject = $titleMail;

  $bodyTemplate = file_get_contents('template_confirm.php');
  $body = str_replace(
    ['{{username}}', '{{confirmation_link}}'],
    [$username, $confirmation_link],
    $bodyTemplate
  );

  $mail->Body = $body;
  $mail->send();

  echo "Письмо успешно отправлено";

  // Перенаправление на страницу профиля
  header("Location: /main-site/profile_user.php");
} catch (Exception $e) {
  echo "Ошибка при отправке письма: {$mail->ErrorInfo}";
}
