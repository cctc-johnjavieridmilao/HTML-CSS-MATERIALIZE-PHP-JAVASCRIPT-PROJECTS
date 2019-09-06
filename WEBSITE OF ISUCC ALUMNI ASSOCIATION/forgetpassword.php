<?php
include 'functionusercontent.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'connection/mysqliconn.php'; 
$error = "";
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if ($_POST) 
{
  $email = $_POST['email'];
  $selectquery = mysqli_query($connect,"SELECT * FROM account WHERE email = '{$email}'") or die(mysqli_error($connect));
  $count = mysqli_num_rows($selectquery);
  $row = mysqli_fetch_array($selectquery);
  $linkForget = '<a href="http://localhost:8080/alumni/forget_change.php?emails='.$email.'">Click Here!</a>';
  
  if ($count>0) 
  {
    //echo $row['password'];
  //Load Composer's autoloader
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
      $mail->Subject = 'Forget Password';
      $mail->Body    = "Hi $email Check this Link to Change your Password  $linkForget";
      $mail->AltBody = "Hi $email Check this Link to Change your Password  $linkForget";

      $mail->send();
     $error = "<script>swal('Your Password Has been Recover Check your Email now','','success');</script>";
  } catch (Exception $e) {

     $error = "<script>swal('Error no Internet Connection, Please try again Later','','warning');</script>";
  }
  }else {
  $error = "<script>swal('Email not Found','','warning');</script>";
  }
  if (empty($email)) {
    $error = "<script>swal('Please input you Email','','warning');</script>";
  }

}

if ($_POST) 
{
  $email = $_POST['email'];
  $selectquery = mysqli_query($connect,"SELECT * FROM account WHERE email = '{$email}'") or die(mysqli_error($connect));
  $count = mysqli_num_rows($selectquery);
  $row = mysqli_fetch_array($selectquery);
  
  if ($count>0) 
  {
    //echo $row['password'];
  //Load Composer's autoloader
  require 'PHPMailer/vendor/autoload.php';

  $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'johnjavieridmilao12@yahoo.com';     // SMTP username
      $mail->Password = 'clarisedana12345';                          // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('johnjavieridmilao12@yahoo.com', 'Alumni Tracking');
      $mail->addAddress($email);// Add a recipient
      

      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Forget Password';
       $mail->Body    = "Hi $email Check this Link to Change your Password  $linkForget";
      $mail->AltBody = "Hi $email Check this Link to Change your Password  $linkForget";

      $mail->send();
     $error = "<script>swal('Your Password Has been Recover Check your Email now','','success');</script>";
  } catch (Exception $e) {

     $error = "<script>swal('Error no Internet Connection','','warning');</script>";
  }
  }else {
  $error = "<script>swal('Email not Found','','warning');</script>";
  }
  if (empty($email)) {
    $error = "<script>swal('Please input you Email','','warning');</script>";
  }

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumni - Forget Password</title>
  <link rel="shortcut icon" href="img/alumniLogo.png"/>
  <meta name="theme-color" content="green" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
</head>
<?php Logincss(); ?>
<style type="text/css">

	#nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}
.uk-input,
.uk-select,
.uk-textarea {
  
}
.has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
   transition: 0.8s;
  }
  .text-danger{
    transition: 2s;
  }
 
  
</style>
<header>
    <img id="img" src="img/alumnilogofirst.png">
    <h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
    <h2 id="txt2"><font color="white"><span class="fas fa-user-graduate" style="color: font-size: 15px;"></span>  ALUMNI FORGOT PASSWORD </font> </h2>
  </header>
<?php echo $error;  ?>
<body>
  <br><br>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <!-- Material form subscription -->
<div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
        <strong style="color: yellow;">Forgot Password?</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

        <!-- Form -->
        <form style="color: #757575;" method="post">
            <!-- Name -->
               <div class="form-group">
                 <label>Enter Email</label>
                <input type="text"   name="email" id="email" class="form-control">
                  <span id="error_email" class="text-danger"></span>
               </div>
              

            <!-- Sign in button -->
            <button class="btn btn-success btn-block z-depth-0 my-4 waves-effect" type="submit" id="submit" > <span class="fas fa-check-circle"></span> Recover</button>
            <hr>
            <center><a href="login.php">Login now</a></center> 
        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
<br><br><br><br>
<!-- jQuery 3 -->
<?php include 'homefooter.php'; ?>
<script src="js1/nprogress.js"></script>
 <script src="js/lightbox.min.js"></script>
 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
 <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>
<!-- iCheck -->
</body>
</html>
<script type="text/javascript">
 $('#submit').click(function(){
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var error_email = '';
   if($.trim($('#email').val()).length == 0)
  {
   error_email = 'Email is required';
   $('#error_email').text(error_email);
   $('#email').addClass('has-error');
  }
  else
  {
   error_email = '';
   $('#error_email').text(error_email);
   $('#email').removeClass('has-error');
  }
  if (error_email !='') {
    return false;
  }
  else{
   $('#submit').submit();
   Loader();
  }
 });
</script>
<script>
 NProgress.start();
NProgress.set(0.4);
//Increment 
var interval = setInterval(function() { NProgress.inc(); }, 1000);
$(document).ready(function(){
    NProgress.done();
    clearInterval(interval);
});
</script>
<script>
  function Loader(){
    let timerInterval
swal({
  title: 'Recovering...',
  //html: 'I will close in <strong></strong> seconds.',
  timer: 50000,
  onOpen: () => {
    swal.showLoading()
    timerInterval = setInterval(() => {
      swal.getContent().querySelector('strong')
        .textContent = swal.getTimerLeft()
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    // Read more about handling dismissals
    result.dismiss === swal.DismissReason.timer
    
  ) {
    console.log('I was closed by the timer')
  }
})
  }
</script>
