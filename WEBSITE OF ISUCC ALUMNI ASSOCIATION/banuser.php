<?php  
include 'connection/mysqliconn.php';
require_once 'helper/function.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//$message = "Ban Account";
date_default_timezone_set('Asia/Manila');
if (isset($_POST['btn_ban'])) {
  $id = $_GET['acc_id'];
  $queryCode = "SELECT * FROM account WHERE acc_id = '$id'";
  $resultCode = mysqli_query($connect,$queryCode);
  $row = mysqli_fetch_assoc($resultCode);
  $code = $row['code'];
  $name = $row['first_name'];
  $email = $row['email'];
  $datenow = date('Y-m-d H:i:s');
  $datewith3days = date('Y-m-d H:i:s');
  $dtn = strtotime($datenow);
  //$date->modify('+5 minutes');
  //$dt3 = strtotime($datewith3days. '+ 1 days');
  $datewith3days = date('Y-m-d H:i:s',strtotime($datewith3days. '+3 days'));
  //echo "<script>alert('".$datewith3days."');</script>";

   
    if (empty($email)) {
      if ($row['code'] == true) {
      // ban user with 3days yow wtf haha
      $queryupdateCodes = "UPDATE account SET ban=1,online='Offline',dateofban='$datewith3days',bantime='$datenow' WHERE acc_id = '$id'";
    mysqli_query($connect,$queryupdateCodes);
    //unset($_SESSION['user_id']);
    //header("Location:user_ban_redirect.php");
     echo "<script>
    swal({
    position: 'center',
    type: 'success',
    title: '".$name." Account Has been banned',
    showConfirmButton: false,
    timer: 2000
    })
     </script>";
     //$_SESSION['date_unbbaned'] = $datewith3days;
      echo '<meta http-equiv="refresh" content="2" />';

    }
    }
    else{
       if ($row['code'] == true) {
      // ban user with 3days yow wtf haha
      $queryupdateCodes = "UPDATE account SET ban=1,online='Offline',dateofban='$datewith3days',bantime='$datenow' WHERE acc_id = '$id'";
    mysqli_query($connect,$queryupdateCodes);
    //unset($_SESSION['user_id']);
    //header("Location:user_ban_redirect.php");
     echo "<script>
    swal({
    position: 'center',
    type: 'success',
    title: '".$name." Account Has been banned',
    showConfirmButton: false,
    timer: 2000
    })
     </script>";
     //$_SESSION['date_unbbaned'] = $datewith3days;
      echo '<meta http-equiv="refresh" content="2" />';

    }
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
  } catch (Exception $e) {

     echo "<script>swal('Error no Internet Connection, Please try again Later','','warning');</script>";
  }
    }

}
?>