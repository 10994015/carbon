<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'litest9577@gmail.com';
    $mail->Password = 'Aatest9577@';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('carbon.cst@gmail.com'); 
    $mail->addAddress('carbon.cst@gmail.com'); 


    $mail->isHTML(true);
    $mail->Subject = 'New message (Carbon Society of Taiwan)';
    $mail->Body = "<h3>發送者姓名 : $name <br>發送者Email: $email <br>訊息 : $message</h3>";

    $mail->send();
    $alert = '訊息已發送！ 感謝您與我們聯繫。';
  } catch (Exception $e){
    $alert = '<div class="alert-error">
                <span>'.$e->getMessage().'</span>
              </div>';
  }
}
?>
