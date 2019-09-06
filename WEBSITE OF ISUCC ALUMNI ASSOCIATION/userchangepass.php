<?php 
 include 'functionusercontent.php';
 include 'connection/mysqliconn.php'; 
 ?> 
<?php 
include ('helper/function.php');
$error = "";
//echo  $_SESSION['email'];
$fname = $_SESSION['firstname'];
if ($fname) {
  if (isset($_POST['submit'])) {
    $oldpass = md5($_POST['oldpass']);
    $newpass = md5($_POST['newpass']);
    $cpass = md5($_POST['cpass']);
    include 'connection/mysqliconn.php';
    $query = ("SELECT password FROM account WHERE first_name = '$fname'");
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
    if ($row['password'] != $oldpass && empty($oldpass) || empty($newpass)) {
      $error =  "<script>swal('Old Password is Wrong','click the button','error');</script>";
    }
    else if ($row['password'] == $oldpass && $newpass == $cpass) {
      sleep(3);
      $sql = "UPDATE account SET password = '$newpass' WHERE first_name = '$fname'";
             $res = mysqli_query($connect,$sql);
             $error = "<script>swal('Password has Been Change','','success');</script>";
    }

    if (empty($oldpass)) {
      $error = "<script>swal('Please Enter Oldpassword');</script>";
    }
    if (empty($newpass) || empty($cpass)) {
      $error =  "<script>swal('Please Enter Newpassword and Confirm Password');</script>";
    }
    if ($newpass != $cpass) {
      $error =  "<script>swal('New Passwrod and Confirm password Error');</script>";
    }
    if ($row['password'] != $oldpass) {
      $error =  "<script>swal('Old Password is Wrong','','error');</script>";
    }

  }
}
?>
<?php 
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
include 'changeprofile.php'; 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile of <?php echo $fname; ?></title>
   <link rel="shortcut icon" href="img/alumniLogo.png"/>
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
<style type="text/css">
body {
  background: #F1F3FA;
}

/* Profile container */
.profile {
  margin: 20px 0;
}

/* Profile sidebar */
.profile-sidebar {
  padding: 20px 0 10px 0;
  background: #fff;
}

.profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 100px;
  height: 100px;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 10px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}
    
.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-content {
  padding: 20px;
  background: #fff;
  min-height: 460px;
}
header{
    background-color: green;
    width: 100%;
    height: 80px;
  }
  #img{
    width: 70px;
    height: 70px;
    margin-left: 30px;
    margin-top: 5px;

  }
  h1{
    margin-top: -50px;
    margin-left: 110px;
    font-size: 20px;
    font-family: Century Gothic;
  }
  h2{
    margin-top: -10px;
    margin-left: 110px;
    font-size: 11px;
    font-family: Century Gothic;
  }


#txt h2{
   font-family: Century Gothic;
   font-size: 25px;
   margin-top: 30px;
   margin-left: 20px;
  border-bottom: 2px solid black;

}
#txt{
  width: 320px;
  position: absolute;
  top: 15%;
  left: 47.6%;
  transform: translate(-50%,50%);
  color: white;
  text-align: center;
}
input::-webkit-input-placeholder {
color: black !important;
}
#nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: green;
    color: white;
    text-align: center;
    height: 30px;
}
.uk-input:hover{
  background-color: green;
  transition: 1s;
  color: black;
}
 #nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}
#imgg{
  margin-top: 5px;
}

.has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
   transition: 2s;
  }
  .text-danger{
    transition: 2s;
  }
@media screen and (max-width: 786px){
#imgg{
  margin-left: 205px;
  margin-top: 5px;
}
</style>

<body>
  <?php 
  if(isset($_SESSION['Update'])):
    echo "<script>swal('Records Updated','','success');</script>";
  endif; 
  unset($_SESSION['Update']);

  if(isset($_SESSION['Update_img'])):
    echo "<script>swal('Profile Updated','','success');</script>";
  endif; 
  unset($_SESSION['Update_img']);

   if(isset($_SESSION['nodata'])):
    echo "<script>swal('No Records Found','','warning');</script>";
  endif; 
  unset($_SESSION['nodata']);

  if(isset($_SESSION['no update'])):
     echo "<script>swal('No Records Updated','','warning');</script>";
  endif;
  unset($_SESSION['no update']);
  ?>
  <?php echo $error; ?>
  <?php echo $alert; ?>
  <header>
		<img id="img" src="img/alumnilogofirst.png">
		<h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
		<h2 id="txt2"><font color="white"> <span class="fas fa-user-graduate" style="color: white;font-size: 15px;"></span> ALUMNI ACCOUNT</font></h2>
	</header>
<div class="container">
    <?php include 'profilesidemenu.php'; ?>
      </div>
    </div>
    <div class="col-md-9">
         <div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
        <strong style="color: yellow;">Change Password</strong>
    </h5>
     <div class="card-body">
              <form method="POST" id="insert_form" action="userchangepass.php" enctype="multipart/form-data" autocomplete="off">
  		<div class="form-row">
  		<div class="form-group col-md-6">
    	<label>New Password</label>
    	<input type="password" name="newpass" id="newpass"  class="form-control"/>
      <span id="error_newpass" class="text-danger"></span>
    	</div>
    	<div class="form-group col-md-6">
    	<label>Confirm Password</label>
    	<input type="password" name="cpass" id="cpass"  class="form-control"/>
      <span id="error_cpass" class="text-danger"></span>
    	</div>
    	<div class="form-group col-md-6">
    	<label>Old Password</label>
    	<input type="password" name="oldpass" id="oldpass" class="form-control"/>
      <span id="error_oldpass" class="text-danger"></span>
    	</div>
    	
    	<div class="form-group col-md-6">
    		<br>
    		<button type="submit" id="submit" class="btn btn-success btn-block" name="submit"> <span class="fas fa-edit"> Update Password</span></button>
    	</div>
    	 </div>
  	</form>
            </div>
       
        </div>
    </div>
  </div>
</div>
<br>
<br>
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
  if ($.trim($('#cpass').val()).length == 0) {
   error_cpass = 'Confirm Password is required';
   $('#error_cpass').text(error_cpass);
   $('#cpass').addClass('has-error');
  }
  else{
   error_cpass = '';
   $('#error_cpass').text(error_cpass);
   $('#cpass').removeClass('has-error');
  }
  if ($.trim($('#oldpass').val()).length == 0) {
   error_oldpass = 'Old Password is required';
   $('#error_oldpass').text(error_oldpass);
   $('#oldpass').addClass('has-error');
  }
  else{
    error_oldpass = '';
    $('#error_cpass').text(error_oldpass);
    $('#oldpass').removeClass('has-error');
  }
  if (error_newpass !='' || error_cpass !='' || error_oldpass !='') {
    return false;
  }
  else {
    $('#btn_contact_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
    $('#submit').submit();
    Loader();
    
  }
  });
</script>

<script type="text/javascript">
 
</script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <!-- Change class .modal-sm to change the size of the modal -->
    <div class="modal-dialog modal-sm" role="document">


      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title w-100" id="myModalLabel">Change Profile</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" enctype="multipart/form-data">
              Select your Photo:<input  type="file" name="image" class="form-control" required accept="image/png, image/jpeg , image/png" >
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <input type="submit" style="margin-top: 10px;" name="btn_update_photo" value="Update" class="btn btn-success btn-sm">
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Central Modal Small -->
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
  title: 'Changing...',
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