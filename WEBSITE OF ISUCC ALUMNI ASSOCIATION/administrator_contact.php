<?php 
include 'functionusercontent.php';
include ('helper/function.php');
?>

<?php
$Fullnames = $_SESSION['fullname_for_contact'];
include 'connection/mysqliconn.php';
if (isset($_POST['submit_msg'])) {
   $fullname = $_POST['name'];
   $email = $_POST['email'];
   $cpnumber = $_POST['number'];
   $msg = $_POST['message'];

   $query = "INSERT INTO message_user (name,email,phonenumber,message) VALUES ('$fullname','$email','$cpnumber','$msg')";
   mysqli_query($connect,$query);
   $_SESSION['message_send'] = "Send";
   header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Contact</title>
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
    <script src="js/bootstrap-formhelpers.min.js"></script>
  <script src="js/bootstrap-formhelpers.js"></script>
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
    <h2 id="txt2"><font color="white"><span class="fas fa-user-graduate" style="color: font-size: 15px;"></span>  ALUMNI ADMINISTRATOR CONTACT </font> </h2>
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
        <strong style="color: yellow;">Your account Doesn't Approve by Admin, Contact Admin Here!</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

       <form method="post"  style="color: #757575;">
     
        <form method="post">
      <div class="form-group has-feedback">
        <input placeholder="Enter fullname" class="form-control left-border-none" type="text" value="<?php echo $Fullnames ; ?>" name="name"  id="input1">
          <span id="error_fullname" class="text-danger"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control left-border-none" type="email"  placeholder="Enter Your Email Here" name="email"  id="input2" required>
          <span id="error_email" class="text-danger"></span>
      </div>
      <div class="form-group">
     <input class="form-control left-border-none" type="text" placeholder="CP Number" maxlength="11" name="number"  id="input3">
          <span id="error_cpnumber" class="text-danger"></span>
    </div>
     <div class="form-group">
     <textarea class="form-control left-border-none" name="message" style="height: 60px;" rows="5" style="" placeholder="Enter Here..." id="input4" required></textarea>
          <span id="error_msg" class="text-danger"></span>
    </div>
      <button type="submit" name="submit_msg" id="animateBtns" class="btn btn-success btn-block btn-flat"> <span class="fas fa-check-circle"></span> Send</button>
    </form>
    <br>
   <center><a href="login.php">Go Back</a></center>

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
   $('#submit_msg').submit();
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