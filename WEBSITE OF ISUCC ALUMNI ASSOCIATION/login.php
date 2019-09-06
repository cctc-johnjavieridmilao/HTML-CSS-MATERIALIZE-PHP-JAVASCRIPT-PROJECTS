<?php include 'helper/function.php'; ?>
<?php include 'functionusercontent.php'; ?>
<?php
    ob_start();
	if(isset($_SESSION['user_id'])){
		header("Location: home.php"); 
	}
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumni - Log in</title>
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
    <h2 id="txt2"><font color="white"> <span class="fas fa-user-graduate" style="color: font-size: 15px;"></span> Alumni Login</font></h2>
  </header>
<body>
  <?php
               if (isset($_SESSION['account_create'])):
                 echo "<script>swal('Account successFully Created Please Wait Admin to Verify your Account','','success');</script>";
               endif;
               unset($_SESSION['account_create']);

               if (isset($_SESSION['Accloginfirst'])):
                  echo "<script>swal('Please Login First','','warning');</script>";
                endif;
               unset($_SESSION['Accloginfirst']);

               if (isset($_SESSION['FormLoginfirst'])):
                  echo "<script>swal('Please Login First','','warning');</script>";
                endif;
               unset($_SESSION['FormLoginfirst']);

               if (isset($_SESSION['Contactloginfirst'])):
                  echo "<script>swal('Please Login First','','warning');</script>";
                endif;
               unset($_SESSION['Contactloginfirst']);

                if (isset($_SESSION['newsLoginfirst'])):
                  echo "<script>swal('Please Login First','','warning');</script>";
                endif;
               unset($_SESSION['newsLoginfirst']);

               if (isset($_SESSION['commentLoginfirst'])):
               echo "<script>swal('Please Login First','','warning');</script>";
               endif;
               unset($_SESSION['commentLoginfirst']);

               if(isset($_SESSION['login'])):
                echo "<script>swal('Please Login First','','warning');</script>";
               endif;
                unset($_SESSION['login']);

                if(isset($_SESSION['logins'])):
                echo "<script>swal('Please Login First','','warning');</script>";
               endif;
                unset($_SESSION['logins']);

                if(isset($_SESSION['message_send'])):
                echo "<script>swal('Thankyou For Contacting Administor','','success');</script>";
               endif;
                unset($_SESSION['message_send']);
       ?>

  <!-- Start your project here-->
  <br><br>
   <?php user_login(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <!-- Material form subscription -->
<div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
        <strong style="color: yellow;">Login Here</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

        <!-- Form -->
        <form style="color: #757575;" method="post">
            <!-- Name -->
            <div class="form-group">
              <label>Firstname</label>
                <input type="text" name="firstname" id="firstnames" class="form-control"  onkeyup="javascript:capitalize(this.id, this.value);" value="<?php if(empty($_SESSION['first_name'])): echo ''?><?php endif; ?><?php if(!empty($_SESSION['first_name'])): echo  $_SESSION['first_name']; ?><?php endif; ?>">
             
                 <span id="error_fname" class="text-danger"></span>
            <!-- E-mai -->
            </div>
               <div class="form-group">
                 <label>Password</label>
                <input type="password" class="form-control" id="passwords" name="password">
                  <span id="error_password" class="text-danger"></span>
           
               </div>
              

            <!-- Sign in button -->
            <button class="btn btn-success btn-block z-depth-0 my-4 waves-effect" type="submit" id="login" name="login"> <span class="fas fa-check-circle"></span> Sign in</button>
            <hr>
             <center><a href="registerform.php">Create Account</a> or <a href="forgetpassword.php">Forgot Password</a></center>
        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form subscription -->
    </div>
    <div class="col-md-4"></div>
  </div>
</div>
<br><br>
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
  $('#login').click(function(){
    
    if($.trim($('#firstnames').val()).length == 0)
  {
   error_fname = 'First Name is required';
   $('#error_fname').text(error_fname);
   $('#firstnames').addClass('has-error');
  }
  else
  {
   error_fname = '';
   $('#error_fname').text(error_fname);
   $('#firstnames').removeClass('has-error');
  }
   if($.trim($('#passwords').val()).length == 0)
  {
   error_password = 'Password is required';
   $('#error_password').text(error_password);
   $('#passwords').addClass('has-error');
  }
  else
  {
   error_password = '';
   $('#error_password').text(error_password);
   $('#passwords').removeClass('has-error');
  }
  if (error_fname !='' || error_password !='') {
  return false;
  }
  else{
    $('#login').submit();
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
<script type="text/javascript"> function capitalize(textboxid, str) {  if (str && str.length >= 1) { var firstChar = str.charAt(0); var remainingStr = str.slice(1); str = firstChar.toUpperCase() + remainingStr; } document.getElementById(textboxid).value = str; } </script>
<script>
		function showPass() {
			var password = document.getElementById('passwords');
			if (document.getElementById('check').checked) {
                 password.setAttribute('type','text');
                  } else {
                 	 password.setAttribute('type','password');
             
			}
		}
</script>
