<?php
include ('connection/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_code($code,$email){
//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'isabelastateuniversityi@gmail.com';                 // SMTP username
    $mail->Password = 'jhayjhay11';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('isabelastateuniversityi@gmail.com', 'Alumni Tracking');   // Add a recipient
    $mail->addAddress($email);               // Name is optional

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation Code';
    $mail->Body    = "Thankyou You for joining Us Your Confimation code is:" .$code;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    $_SESSION['user_email'] = $email;
    $_SESSION['account_create'] = 'Your Account is Successfully Created Please Check your Email Now';
    header("location:confirm.php");
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}

function confirm_email(){
    GLOBAL $db;
    if (isset($_POST['confirm'])) {
        $code = trim($_POST['confirm_code']);
        $user_email = $_SESSION['user_email'];
        if(empty($code)){
            echo "<script>swal('Please Enter Confirmation Code!','click okay','error');</script>";
        }
        else{
            $Query = $db->prepare("SELECT code FROM account WHERE email = ? && code = ?");
            $Query->execute([$user_email,$code]);
            if($Query->rowCount() == 1){
                $update_code = 1;
                $Query_Update = $db->prepare("UPDATE account SET status = ? WHERE email = ? && code = ?");
                $Query_Update->execute([$update_code, $user_email,$code]);
                if($Query_Update){
                    $_SESSION['confimation_success'] = "Your Account Is Successfully Confirm!";
                    header("location:login.php");
                }
                else{
                   echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Query not Work! <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button></div>";
                }
            }else{
             echo "<script>swal('Invalid Code!','click okay','error');</script>";
            }
        }
    }
}
function user_login(){
    GLOBAL $db;
    if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        if(empty($email) || empty($password)){
            echo "<script>swal('Please input Email And Password!','click okay','error');</script>";
        }else{
            $Query = $db->prepare("SELECT * FROM account WHERE email = ?");
            $Query->execute([$email]);
            if($Query->rowCount() == 1){
             $row = $Query->fetch(PDO::FETCH_OBJ);
             $id = $row->acc_id;
             $status = $row->status;
             if($status == 0){
                $_SESSION['user_email'] = $email;
                $_SESSION['please confirm'] = "Please confirm your email...";
                header("location:confirm.php");
             }else{
                $Query = $db->prepare("SELECT * FROM account WHERE password = ?");
                $Query->execute([$password]);
                if($Query->rowCount() == 1){
                    $_SESSION['user_id'] = $id;
                     header("location:loadhome.php");
                }else{
                   echo "<script>swal('Please Enter Correct Password!','click okay','error');</script>";
                }
             }
            }else{
              echo "<script>swal('Please Enter Correct Email!','click okay','error');</script>";
            }
        }
    }
}