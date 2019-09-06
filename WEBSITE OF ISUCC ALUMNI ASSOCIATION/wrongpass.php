
<?php include 'functionusercontent.php'; ?>
<?php
include 'connection/mysqliconn.php';
 if (isset($_POST['login'])) {
    $password = $_POST['password'];
    
  } 
?>
<?php
require 'helper/function.php';
 include 'connection/mysqliconn.php';
$user_name = $_SESSION['error_password'];
 $query = "SELECT * FROM account WHERE first_name = '$user_name'";
 $res = mysqli_query($connect,$query);
 $row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="shortcut icon" href="img/alumniLogo.png"/>
	 <link rel="stylesheet" type="text/css" href="css/uikit.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.css">
	 <link rel="stylesheet" type="text/css" href="css/uikit-rtl.min.css">
	  <link rel="stylesheet" type="text/css" href="css/hover.css">
  	<link rel="stylesheet" type="text/css" href="css/hover-min.css">
  	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css">
     <script src="js/uikit.js"></script>
    <script src="js/uikit.min.js"></script>
 	<script src="js1/nprogress.js"></script>
    <link rel="stylesheet" type="text/css" href="js1/nprogress.css">
</head>
<?php Logincss(); ?>
<style type="text/css">
 html,body{
  background-color: #d2d6de;
 }
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
  h6 {
   font-size: 21px;
   color: red;
  }
  
</style>
<?php PagesHeader(); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <h6><span class="fas fa-times"></span> <?php echo $row['first_name']; ?></h6>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg" style="color: green;">ISUCC LOGIN</p>
    <form method="post">
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="passwords" name="password" placeholder="Password">
       <span id="error_password" class="text-danger"></span>
      </div>
      <div class="form-group">
		<input type="checkbox" name="" class="uk-checkbox" id="check" onclick="showPass();"> <span style="color: black;font-size: 12px;">Show Password</span></div>
      <button type="submit" id="login1" name="login" class="btn btn-success btn-block btn-flat"> <span class="fas fa-check-circle"></span> Sign In</button>
    </form>
    <br>
    <center><a href="login.php">Go back</a> or <a href="forgetpassword.php">Forget Password</a></center>
 
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<?php PagesFooter(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.5/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.5/js/uikit-icons.min.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
</body>
</html>
<script type="text/javascript">
  $('#login1').click(function(){
    
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
  if (error_password !='') {
  return false;
  }
  else{
    $('#login1').submit();
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
