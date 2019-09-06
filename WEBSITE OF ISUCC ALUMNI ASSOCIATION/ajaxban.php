<?php 
include 'connection/mysqliconn.php';
require_once 'helper/function.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('Asia/Manila');

if ($_POST) {
 	$id = $_POST['id'];
 	$email = $_POST['email'];
 	$datenow = date('Y-m-d H:i:s');
  $datewith3days = date('Y-m-d H:i:s');
  $dtn = strtotime($datenow);
  //$date->modify('+5 minutes');
  //$dt3 = strtotime($datewith3days. '+ 1 days');
  $datewith3days = date('Y-m-d H:i:s',strtotime($datewith3days. '+3 days'));
  //echo "<script>alert('".$datewith3days."');</script>";
  $queryupdateCodes = "UPDATE account SET ban=1,online='Offline',dateofban='$datewith3days',bantime='$datenow' WHERE acc_id = '$id'";
  mysqli_query($connect,$queryupdateCodes);
 require 'PHPMailer/vendor/autoload.php';
 $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'isabelastateuniversityi@gmail.com';     // SMTP username
      $mail->Password = 'jhayjhay11';                          // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('isabelastateuniversityi@gmail.com', 'Alumni Tracking');
      $mail->addAddress($email);// Add a recipient
      

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Account Banned';
      $mail->Body    = "Hi $email your Account  has been banned by Administrator, your account will unban on $datewith3days";
      $mail->AltBody = "Hi $email your Account  has been banned by Administrator, your account will unban on $datewith3days";

      $mail->send();
      echo "<script>
    swal({
    position: 'center',
    type: 'success',
    title: 'Account Has been banned',
    showConfirmButton: false,
    timer: 2000
    })
     </script>";
   echo "<script>
     window.location.reload();
     </script>";
  } catch (Exception $e) {
     echo "<script>swal('Email not Sent, Error no Internet Connection or Empty Email','','warning');</script>";
  }

}
?>