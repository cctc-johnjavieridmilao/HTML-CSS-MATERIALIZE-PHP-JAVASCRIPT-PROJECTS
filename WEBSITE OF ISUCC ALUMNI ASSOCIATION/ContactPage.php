<?php 
include 'functionusercontent.php';
include ('helper/function.php');
include 'connection/mysqliconn.php';

$id = $_SESSION['user_id'];
$query = "SELECT ban FROM account WHERE acc_id = '$id'";
$result = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($result);
if (empty($_SESSION['user_id'])) 
{
   header("Location:login.php");
   session_start();
   $_SESSION['Accloginfirst'] = "Login Firstsss";
}
else
{
if ($row['ban'] == 1) 
  {
    header("Location:user_ban_redirect.php");
    unset($_SESSION['user_id']);
  }
}
?>

<?php

$Error = "";
$message="";
include 'connection/mysqliconn.php';

if (isset($_POST['SUBMIT'])) {
 $name = $_POST['name'];
 $email = $_POST['email'];
 $number = $_POST['number'];
 $messages = $_POST['message'];
 $Date = date('Y-m-d H:i:s');;
 $datenow = date('Y-m-d : H:i:s', strtotime($Date. ' + 1 minutes'));

$query = "INSERT INTO message_user(name,email,phonenumber,message,date) VALUES ('$name','$email','$number','$messages','$datenow')";
mysqli_query($connect, $query);
header("location:home.php");
$_SESSION['send_success'] = "Send Success";
//$message =  "<script>swal('Your Message Has been Send! Thankyou for the Feedback','click okay','success');</script>";
 //$message = '<p align="center"> <font color=red  size="5pt">Message Sent</font> </p>';
}
?>
<?php 
$uname = $_SESSION['Unaname'];
include 'connection/mysqliconn.php';
$queryView = "SELECT * FROM alumni_records WHERE fname = '$uname'";
$result = mysqli_query($connect,$queryView);
$row = mysqli_fetch_assoc($result);
$fnames = $row['fname'];
$mnames = $row['mname'];
$lnames = $row['lname'];
$cpnumbers = $row['cpnumber'];
$emails = $row['email'];
 ?>
 <?php 
 $id = $_SESSION['user_id'];
 include 'connection/mysqliconn.php';
$queryView1 = "SELECT * FROM account WHERE acc_id = '$id'";
$result1 = mysqli_query($connect,$queryView1);
$rows = mysqli_fetch_assoc($result1);
$fnames1 = $rows['first_name'];
$lastnames1 = $rows['last_name'];
$middlename1 = $rows['middle_name'];
$emails1 = $rows['email'];
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumni - Contact Page</title>
   <link rel="shortcut icon" href="img/alumniLogo.png"/>
    <!-- Tell the browser to be responsive to screen width -->
     <meta name="theme-color" content="green" />
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
    <h2 id="txt2"><font color="white"><span class="fas fa-user-graduate" style="color: font-size: 15px;"></span>  ALUMNI CONTACTPAGE </font> </h2>
  </header>
<body>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <!-- Material form subscription -->
<div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
        <strong style="color: yellow;">Send Feedback</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

       <form method="post"  style="color: #757575;">
      <div class="form-group has-feedback">
        <label>Name</label>
        <input placeholder="Enter fullname" class="form-control left-border-none" type="text" value="<?php echo $fnames1; ?> <?php echo $middlename1; ?> <?php echo $lastnames1; ?>" name="name"  id="input1">
          <span id="error_fullname" class="text-danger"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Email</label>
        <input class="form-control left-border-none" type="email" value="<?php echo $emails1;  ?>" placeholder="Enter Your Email Here" name="email"  id="input2" required>
          <span id="error_email" class="text-danger"></span>
      </div>
      <div class="form-group">
        <label>Cp Number</label>
        <input class="form-control left-border-none" type="text" maxlength="11" value="<?php echo $cpnumbers; ?>"  placeholder="CP Number" name="number"  id="input3">
          <span id="error_cpnumber" class="text-danger"></span>
      </div>
       <div class="form-group">
        <textarea class="form-control left-border-none" name="message" style="height: 90px;" rows="8" style="" placeholder="Enter Feedback" id="input4" required></textarea>
          <span id="error_msg" class="text-danger"></span>
      </div>
      <button type="submit" id="animateBtns" name="SUBMIT" class="btn btn-success btn-block btn-flat"> <span class="fas fa-check-circle"></span> Send</button>
    </form>
    <br>
    <center><a href="home.php">Homepage</a></center>


    </div>

</div>
<!-- Material form subscription -->
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<br><br>
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
<!-- iCheck -->
</body>
</html>
<script>
  $('#animateBtns').click(function(){
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var error_email = '';
  
  if($.trim($('#input1').val()).length == 0)
  {
   error_fullname = 'Email is required';
   $('#error_fullname').text(error_fullname);
   $('#input1').addClass('has-error');
  }
  else
  {
   error_fullname = '';
   $('#error_fullname').text(error_fullname);
   $('#input1').removeClass('has-error');
  }


  if($.trim($('#input2').val()).length == 0)
  {
   error_email = 'Email is required';
   $('#error_email').text(error_email);
   $('#input2').addClass('has-error');
  }
  else
  {
   if (!filter.test($('#input2').val()))
   {
    error_email = 'Invalid Email';
    $('#error_email').text(error_email);
    $('#input2').addClass('has-error');
   }
   else
   {
    error_email = '';
    $('#error_email').text(error_email);
    $('#input2').removeClass('has-error');
   }
  }

  if($.trim($('#input3').val()).length == 0)
  {
   error_cpnumber = 'Cp Number is required';
   $('#error_cpnumber').text(error_cpnumber);
   $('#input3').addClass('has-error');
  }
  else
  {
   if($.trim($('#input3').val()).length < 11)
  {
   error_cpnumber = 'Invalid Cp Number';
   $('#error_cpnumber').text(error_cpnumber);
   $('#input3').addClass('has-error');
  }
  else
  {
   error_cpnumber = '';
   $('#error_cpnumber').text(error_cpnumber);
   $('#input3').removeClass('has-error');
  }
  }
  if($.trim($('#input4').val()).length == 0)
  {
   error_msg = 'Your Feedback is required';
   $('#error_msg').text(error_msg);
   $('#input4').addClass('has-error');
  }
  else
  {
   error_msg = '';
   $('#error_msg').text(error_msg);
   $('#input4').removeClass('has-error');
  }
  
  if (error_fullname !='' || error_email !='' || error_cpnumber !='' || error_msg !='') {
    return false;
  }
  else{
   $('#animateBtns').submit();
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
  load_unseen_notification();
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#input1').val() != '' && $('#input2').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"notif.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });
</script>

<script>
    function ClearFields() {
     document.getElementById("input1").value = "";
     document.getElementById("input2").value = "";
     document.getElementById("input3").value = "";
     document.getElementById("input4").value = "";
}
</script>

<script language="javascript">

function checkEmail() {

    var email = document.getElementById('input2');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    swal('Please provide a valid email address!');
    email.focus;
    return false;
 }
}
</script>
<script>
  function Loader(){
    let timerInterval
swal({
  title: 'Sending...',
  //html: 'I will close in <strong></strong> seconds.',
  timer: 100000,
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
