<?php 
include 'connection/mysqliconn.php'; 
$email = $_GET['emails'];
$echo = "";
if (isset($_POST['btn_change'])) {
  $newpass = md5($_POST['newpass']);
  $cpass = md5($_POST['cpass']);

  if ($newpass != $cpass) {
    $echo =  "<script>alert('Password do not match');</script>";
  }
  else{
    $queryUpdate = "UPDATE account SET password='$newpass' WHERE email='$email'";
    mysqli_query($connect,$queryUpdate);
    $echo =  "<script>alert('Password Updated');</script>";
  }
  
}

 ?>
 <?php include 'functionusercontent.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Forget Password</title>
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/lightbox.css">
</head>
<?php
Logincss(); 
echo $echo;
?>
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
    <h2 id="txt2"><font color="white"><span class="fas fa-user-graduate" style="color: font-size: 15px;"></span>  ALUMNI INSERT NEW PASSWORD </font> </h2>
  </header>
<br><br>
<body >
    <div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <!-- Material form subscription -->
<div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
        <strong style="color: yellow;">Input New Password</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

        <form method="post" style="color: #757575;">
      <div class="form-group has-feedback">
        <input type="password" name="newpass" placeholder="New Password" id="newpass" class="form-control left-border-none">
           <span id="error_newpass" class="text-danger"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" class="form-control left-border-none">
           <span id="error_cpass" class="text-danger"></span>
      </div>
      <button type="submit" name="btn_change" id="submit" class="btn btn-success btn-block btn-flat"> <span class="fas fa-check-circle"></span> Update</button>
    </form>
    </div>

</div>
<!-- Material form subscription -->
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
<br><br><br>
<!-- jQuery 3 -->
<?php include 'homefooter.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
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
<!-- iCheck -->
<!-- iCheck -->
</body>
</html>

<script type="text/javascript">
 $('#submit').click(function(){

   if($.trim($('#newpass').val()).length == 0)
  {
   error_newpass = 'NewPassword is required';
   $('#error_newpass').text(error_newpass);
   $('#newpass').addClass('has-error');
  }
  else
  {
   error_newpass = '';
   $('#error_newpass').text(error_newpass);
   $('#newpass').removeClass('has-error');
  }
  if($.trim($('#cpass').val()).length == 0)
  {
   error_cpass = 'Confirm Password is required';
   $('#error_cpass').text(error_cpass);
   $('#cpass').addClass('has-error');
  }
  else
  {
   error_cpass = '';
   $('#error_cpass').text(error_cpass);
   $('#cpass').removeClass('has-error');
  }
  if (error_newpass !='' || error_cpass !='') {
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