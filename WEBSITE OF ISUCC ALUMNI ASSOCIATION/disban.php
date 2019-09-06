<?php  
include 'connection/mysqliconn.php';
//$message = "Ban Account";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['btn_disban'])) {
  $id = $_GET['acc_id'];
  $queryCode = "SELECT * FROM account WHERE acc_id = '$id'";
  $resultCode = mysqli_query($connect,$queryCode);
  $row = mysqli_fetch_assoc($resultCode);
  $email = $row['email'];
  $code = $row['code'];
  $name = $row['first_name']; 
   $datenow = date('Y-m-d H:i:s');
   $dtn = strtotime($datenow);

  
  if (empty($email)) {
    if ($dtn > strtotime($row['dateofban'])) {
     $queryupdateCode = "UPDATE account SET ban=0 WHERE acc_id = '$id'";
    mysqli_query($connect,$queryupdateCode);
    echo "<script>
     swal({
    position: 'center',
    type: 'success',
    title: '".$name." Account Unban',
    showConfirmButton: false,
    timer: 3000
  })
     </script>";
      echo '<meta http-equiv="refresh" content="3" />';
  }
  }
  else{
    if ($dtn > strtotime($row['dateofban'])) {
     $queryupdateCode = "UPDATE account SET ban=0 WHERE acc_id = '$id'";
    mysqli_query($connect,$queryupdateCode);
    echo "<script>
     swal({
    position: 'center',
    type: 'success',
    title: '".$name." Account Unban',
    showConfirmButton: false,
    timer: 3000
  })
     </script>";
      echo '<meta http-equiv="refresh" content="3" />';
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
      $mail->Subject = 'Account Unban';
      $mail->Body    = "Hi $email your Account  has been unban by Administrator";
      $mail->AltBody = "Hi $email your Account  has been unban by Administrator";

      $mail->send();
  } catch (Exception $e) {

     echo "<script>swal('Error no Internet Connection, Please try again Later','','warning');</script>";
  }

  }
   
}
?>