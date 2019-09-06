<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$message = "";
if (isset($_POST['submit_message'])) {
$name = $_POST['name'];
$Message = $_POST['message'];
//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'johnjavieridmilao12@gmail.com';                 // SMTP username
    $mail->Password = 'jhayjhay';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('johnjavieridmilao12@gmail.com', 'Alumni Tracking');
    $mail->addAddress($_POST['email']);     // Add a recipient              // Name is optional
    $mail->addReplyTo('johnjavieridmilao12@gmail.com','Thankyou!');
   

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['name'];
    $mail->Body    = '<div style="border:2px solid red;">This is Alumni Tracking Thankyou For The Feedback!
      Have A nice day!
    </div>';
    $mail->AltBody = $_POST['message'];

    $mail->send();
    echo "<script>alert('Thankyou for waiting! Message Send Succesful!');</script>";
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}

?>