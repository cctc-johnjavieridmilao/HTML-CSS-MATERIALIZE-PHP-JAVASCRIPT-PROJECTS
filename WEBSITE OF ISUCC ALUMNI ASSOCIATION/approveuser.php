<?php  
include 'connection/mysqliconn.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['approve'])) {
  $id = $_GET['acc_id'];
  $queryCode = "SELECT code,status,email FROM account WHERE acc_id = '$id'";
  $resultCode = mysqli_query($connect,$queryCode);
  $row = mysqli_fetch_assoc($resultCode);
  $code = $row['code'];
  $email = $row['email'];

  
  if (empty($email)) {
    if ($row['code'] == $code) {
    $queryupdateCode = "UPDATE account SET status=1 WHERE acc_id = '$id'";
    mysqli_query($connect,$queryupdateCode);
     echo "<script>
     swal({
    position: 'center',
    type: 'success',
    title: 'Account Approved',
    showConfirmButton: false,
    timer: 2000
  })
     </script>";
      echo '<meta http-equiv="refresh" content="2" />';
    }
    
  }
  else {
    if ($row['code'] == $code) {
    $queryupdateCode = "UPDATE account SET status=1 WHERE acc_id = '$id'";
    mysqli_query($connect,$queryupdateCode);
     echo "<script>
     swal({
    position: 'center',
    type: 'success',
    title: 'Account Approved',
    showConfirmButton: false,
    timer: 2000
  })
     </script>";
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
      $mail->Subject = 'Account Approval';
      $mail->Body    = "Hi $email your Account is Approve by Admin";
      $mail->AltBody = "Hi $email your Account is Approve by Admin";

      $mail->send();
  } catch (Exception $e) {

     echo "<script>swal('Error no Internet Connection, Please try again Later','','warning');</script>";
  }

  }
   
}

?>
