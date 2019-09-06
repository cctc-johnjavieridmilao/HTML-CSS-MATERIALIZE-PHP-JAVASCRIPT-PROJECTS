<?php include 'helper/function.php'; 
 if (isset($_POST['cpassword'])) {
  $error = '';
  $first_name = trim($_POST['fname']);
  $last_name = trim($_POST['lname']);
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $confirm = trim($_POST['cpassword']);
  $gender = trim($_POST['gender']);
  $middle_name = trim($_POST['mname']);
  $student_id = trim($_POST['studentid']);
  $marital = trim($_POST['marital']);
  $date = trim($_POST['dateofbirth']);
  $contact = trim($_POST['contact']);
  $program = trim($_POST['program']);
  $year = trim($_POST['year']);
  $semester = trim($_POST['semester']);
  $otherprogram = trim($_POST['otherprogram']);

  $image = $_FILES["image"] ["name"];
  $tmp = $_FILES["image"] ["tmp_name"];
  $r = rand(1,500);
  move_uploaded_file($tmp, "images/$image");
    
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['year'] = $_POST['year'];
    $_SESSION['program'] = $_POST['program'];
    $_SESSION['gender'] = $_POST['gender'];
    $_SESSION['marital'] = $_POST['marital'];
    $_SESSION['first_name'] = $_POST['fname'];
    $_SESSION['last_name'] = $_POST['lname'];
    $_SESSION['middle_name'] = $_POST['mname'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['contact'] = $_POST['contact'];
    $_SESSION['dateofbirth'] = $_POST['dateofbirth'];

  if (empty($first_name) || empty($last_name) || empty($password) || empty($confirm) || empty($gender) || empty($middle_name) || empty($student_id) || empty($marital) || empty($date) || empty($contact) || empty($program) || empty($year) || empty($semester) || empty($image)) {
    $error = "<script>swal('Please fill out All fields','','error');</script>";
  }
  else {
      $pattren = "/^[a-zA-Z ]+$/";
       if (preg_match($pattren, $middle_name)) {
      if (preg_match($pattren, $first_name)) {
        if (preg_match($pattren, $last_name)) {
        if (strlen($password) > 4 && strlen($confirm) > 4) {
         if ($password == $confirm) {
          $check_email = $db->prepare("SELECT email,last_name FROM account WHERE email = ?");
          $check_email->execute([$email]);
          $fname = $db->prepare("SELECT first_name FROM account WHERE first_name = ?");
          $fname->execute([$first_name]);
          $lname = $db->prepare("SELECT last_name FROM account WHERE last_name = ?");
          $lname->execute([$last_name]);
          $mname = $db->prepare("SELECT middle_name FROM account WHERE middle_name = ?");
          $mname->execute([$middle_name]);
          $studentid = $db->prepare("SELECT student_id FROM account WHERE student_id = ?");
          $studentid->execute([$student_id]);
          // if ($check_email->rowCount() > 0) {
           // $error = "<script>swal('Sorry this Email Aready Exist','','error');</script>";
          //}

          if ($fname->rowCount() > 0) {
            $error = "<script>swal('Sorry First Name Already Exist','','error');</script>";
          }
          //}elseif ($lname->rowCount() > 0) {
            //$error = "<script>swal('Sorry Last Name Already Exist','','error');</script>";
          //}elseif ($mname->rowCount() > 0) {
            //$error = "<script>swal('Sorry Middle Name Already Exist','','error');</script>";
          elseif ($studentid->rowCount() > 0) {
            $error = "<script>swal('Sorry Student ID Already Exist','','error');</script>";
          }
            else{
            $code = rand(100000,999999);
            $status = 0;
            try{
            sleep(5);
            $Insert_Query = $db->prepare("INSERT INTO account(first_name,last_name,email,password,gender,code,status,middle_name,student_id,marital,dateofbirth,contact,program,year,semester,images,otherprogram) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $Insert_Query->execute([$first_name,$last_name,$email,md5($password),$gender,$code,$status,$middle_name,$student_id,$marital,$date,$contact,$program,$year,$semester,$image,$otherprogram]);
            //send_code($code,$email);
            //send_code1($code,$email);
             $_SESSION['account_create'] = 'Your Account is Successfully Created Please Check your Email Now';
            header("location:login.php");


          }

          catch(PDOException $e){
            echo "Sorry".$e->getMessage();
          }
         }
         }else{
         
          $error = "<script>swal('Pasword Dot not match','','error');</script>";
         }
        }
        else{
          $error = "<script>swal('Pasword is to Weak','','error');</script>";
        }
          
        }
        
        else{
          $error = "<script>swal('LastName must be character!','','error');</script>";
        }
      }
      else{
        $error = "<script>swal('FirstName must be character!','','error');</script>";
      }
    }
    else{
      $error = "<script>swal('Middlename must be character!','','error');</script>";
    }
  }
 }
?>
<?php include 'functionusercontent.php'; ?>
<?php 
include 'connection/mysqliconn.php';
$query = "SELECT * FROM tbl_reg_date";
$res = mysqli_query($connect,$query);
?>
<?php  
 if (isset($_SESSION['user_id'])) {
  $_SESSION['Already_Login'] = "You Already Login";
  header("Location:home.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alumni - Register</title>
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
 
  .login-box{
    width: 800px;
  }
  .active_tab1
  {
   background-color:green;
   color:#fff;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
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

input::-webkit-input-placeholder {
color: black !important;
}


@media screen and (max-width: 786px){
 .login-box{
  width: 300px;
 }
 html,body{
  background-color: #d2d6de;
 }
 #br1{
  display: none;
 }
 input {
    margin:0 0 10px 0;
}
select {
    margin:0 0 10px 0;
}

}
@media screen and (max-width: 991px){
   input {
    margin:0 0 10px 0;
}
#br1{
  display: none;
 }
}
  
</style>
<?php PagesHeader(); ?>
<body>
  <main class="mt-5">
    <div class="container">
      <?php if (isset($error)): echo $error; endif; ?>
        <div class="row">
          <div class="col-md-12">
          <div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
        <strong style="color: yellow;">Register Here</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">

      <form method="post" id="register_form" enctype="multipart/form-data">
     <div class="tab-content">
     <div class="tab-pane active" id="login_details">

      <div class="row">
        <div class="col-md-4">
           <input type="text" name="fname" id="fname" placeholder="Enter Firstname" value="<?php if(isset($first_name)): echo $first_name; endif; ?>" onkeyup="javascript:capitalize(this.id, this.value);" class="form-control" />
         <span id="error_fname" class="text-danger"></span>
        </div>
        <div class="col-md-4">
           <input type="text" name="mname" id="mname" placeholder="Enter Middlename" value="<?php if(isset($middle_name)): echo $middle_name; endif; ?>" onkeyup="javascript:capitalize1(this.id, this.value);" class="form-control" />
         <span id="error_mname" class="text-danger"></span>
        </div>
        <div class="col-md-4">
           <input type="text" name="lname" id="lname" placeholder="Enter Lastname" value="<?php if(isset($last_name)): echo $last_name; endif; ?>" onkeyup="javascript:capitalize2(this.id, this.value);" class="form-control" />
         <span id="error_lname" class="text-danger"></span>
        </div>
         <br id="br1"><br id="br1"><br id="br1">
         <div class="col-md-4">
          <input type="text" name="email" id="email" placeholder="Enter Email (Optional)" value="<?php if(isset($email)): echo $email; endif; ?>" class="form-control" />
         <span id="error_email" class="text-danger"></span>
        </div>

         <div class="col-md-4">
           <input type="password" name="password" placeholder="Enter Password" value="<?php if(isset($password)): echo $password; endif; ?>" id="password" class="form-control" />
         <span id="error_password" class="text-danger"></span>
        </div>

         <div class="col-md-4">
          <input type="password" name="cpassword" placeholder="Confirm Password" value="<?php if(isset($confirm)): echo $confirm; endif; ?>" onchange="check()" id="cpassword" class="form-control" />
         <span id="error_cpassword" class="text-danger"></span>
        </div>

      </div>
       <br />
        <div>
          <a href="login.php" class="btn btn-danger" style="float: left;">Cancel</a>
         <button type="button" data-toggle="progressbar" style="float: right;" data-target="#myProgressbar" data-value="30" name="btn_login_details" id="btn_login_details" class="btn btn-success">Next</button>
        </div>
        <br>
     </div>
   <div class="tab-pane" id="personal_details">
    <div class="row">
       <div class="col-md-4">
          <input type="number" name="studentid" placeholder="Enter StudentID" value="<?php if(isset($student_id)): echo $student_id; endif; ?>" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" maxlength = "7" id="studentid" class="form-control" />
         <span id="error_studentid" class="text-danger"></span>
        </div>

        <div class="col-md-4">
         <select class="form-control" id="marital" name="marital">
          <option disabled selected>Select Marital Status</option>
          <option <?php if (isset($marital) && $marital=="Divorced") echo "selected";?>>Divorced</option>
                <option <?php if (isset($marital) && $marital=="Married") echo "selected";?>>Married</option>
                <option <?php if (isset($marital) && $marital=="Separated") echo "selected";?>>Separated</option>
                <option <?php if (isset($marital) && $marital=="Single") echo "selected";?>>Single</option>
                <option <?php if (isset($marital) && $marital=="Windowed") echo "selected";?>>Windowed</option>
         </select>
         <span id="error_marital" class="text-danger"></span>
        </div>

        <div class="col-md-4">
         <select class="form-control" id="gender" name="gender">
          <option disabled selected>Select Gender</option>
          <option <?php if (isset($gender) && $gender=="Male") echo "selected";?>>Male</option>
          <option <?php if (isset($gender) && $gender=="Female") echo "selected";?>>Female</option>
        </select>
         <span id="error_gender" class="text-danger"></span>
        </div>
        <br id="br1"><br id="br1"><br id="br1">
        <div class="col-md-4">
         <input id="date" type="date" max="2005-12-30" uk-tooltip="title: Please Select your Birthdate; pos: bottom" oninvalid="this.setCustomValidity('You must be at least 13 years old')" onchange="getAge();" name="dateofbirth" class="form-control">
         <span id="error_birthdate" class="text-danger"></span>
        </div>

        <div class="col-md-4">
         <input type="file" accept="image/png, image/jpeg , image/png"  uk-tooltip="title: Please Select your Photo; pos: bottom" value="" name="image" class="form-control" id="picture" placeholder="Choose Your Photo" required>
      <input type="hidden" id="contact" name="contact" id="input4" class="uk-input left-border-none" placeholder="Age" readonly>
      <span id="error_image" class="text-danger"></span>
        </div>
      
      <div class="col-md-4">
        <select class="form-control" id="program" name="program" onchange="yesnoCheck(this);">
          <option disabled selected>Select Program</option>
          <option <?php if (isset($program) && $program=="AB Pol Sci") echo "selected";?>>AB Pol Sci</option>
                <option <?php if (isset($program) && $program=="Assoc in Aircraft Maintenance Tech") echo "selected";?>>Assoc in Aircraft Maintenance Tech</option>
                <option <?php if (isset($program) && $program=="Automotive Technology") echo "selected";?>>Automotive Technology</option>
                <option <?php if (isset($program) && $program=="BAT") echo "selected";?>>BAT</option>
                <option <?php if (isset($program) && $program=="BS Automotive") echo "selected";?>>BS Automotive</option>
                <option <?php if (isset($program) && $program=="BS Criminology") echo "selected";?>>BS Criminology</option>
                <option <?php if (isset($program) && $program=="BS Electronics") echo "selected";?>>BS Electronics</option>
                <option <?php if (isset($program) && $program=="BS Elementary Education") echo "selected";?>>BS Elementary Education</option>
                <option <?php if (isset($program) && $program=="BS Entrep") echo "selected";?>>BS Entrep</option>
                <option <?php if (isset($program) && $program=="BSBA") echo "selected";?>>BSBA</option>
                <option <?php if (isset($program) && $program=="BSCS") echo "selected";?>>BSCS</option>
                <option <?php if (isset($program) && $program=="BSE - Major in English") echo "selected";?>>BSE - Major in English</option>
                <option <?php if (isset($program) && $program=="BSE - Major in Mathematics") echo "selected";?>>BSE - Major in Mathematics</option>
                <option <?php if (isset($program) && $program=="BSE - Major in Physical Science") echo "selected";?>>BSE - Major in Physical Science</option>
                <option <?php if (isset($program) && $program=="BSHRM") echo "selected";?>>BSHRM</option>
                <option <?php if (isset($program) && $program=="BSIT") echo "selected";?>>BSIT</option>
                <option <?php if (isset($program) && $program=="DAT") echo "selected";?>>DAT</option>
                <option <?php if (isset($program) && $program=="Electrical Technology") echo "selected";?>>Electrical Technology</option>
                <option <?php if (isset($program) && $program=="Mechanical Technology") echo "selected";?>>Mechanical Technology</option>
                <option <?php if (isset($program) && $program=="MIT") echo "selected";?>>MIT</option>
                <option <?php if (isset($program) && $program=="Electronics Technology") echo "selected";?>>Electronics Technology</option>
          <option value="others">Others</option>
        </select>
        <span id="error_program" class="text-danger"></span>
        </div>
       <div class="col-md-4" id="ifYes" style="display: none;">
        <label>Others</label>
        <input type="text" name="otherprogram" class="form-control" placeholder="Enter Program">
        </div>
    </div>
    <br />
        <div>
         <button type="button" style="float: left;" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default">Previous</button>
         <button type="button" style="float: right;" name="btn_personal_details" data-toggle="progressbar" data-target="#myProgressbar" data-value="100" id="btn_personal_details" class="btn btn-success">Next</button>
        </div>
        <br>
    </div>
    <div class="tab-pane" id="contact_details">
      <div class="row">
         <div class="col-md-6">
         <select id="year" name="year" class="form-control">
         <option disabled selected>Select SchoolYear</option>
    <option <?php if (isset($year) && $year=="2000-2001") echo "selected";?>>2000-2001</option>
    <option <?php if (isset($year) && $year=="2001-2002") echo "selected";?>>2001-2002</option>
    <option <?php if (isset($year) && $year=="2002-2003") echo "selected";?>>2002-2003</option>
    <option <?php if (isset($year) && $year=="2003-2004") echo "selected";?>>2003-2004</option>
    <option <?php if (isset($year) && $year=="2004-2005") echo "selected";?>>2004-2005</option>
    <option <?php if (isset($year) && $year=="2005-2006") echo "selected";?>>2005-2006</option>
    <option <?php if (isset($year) && $year=="2006-2007") echo "selected";?>>2006-2007</option>
    <option <?php if (isset($year) && $year=="2007-2008") echo "selected";?>>2007-2008</option>
    <option <?php if (isset($year) && $year=="2008-2009") echo "selected";?>>2008-2009</option>
    <option <?php if (isset($year) && $year=="2009-2010") echo "selected";?>>2009-2010</option>
    <option <?php if (isset($year) && $year=="2010-2011") echo "selected";?>>2010-2011</option>
    <option <?php if (isset($year) && $year=="2011-2012") echo "selected";?>>2011-2012</option>
    <option <?php if (isset($year) && $year=="2012-2013") echo "selected";?>>2012-2013</option>
    <option <?php if (isset($year) && $year=="2013-2014") echo "selected";?>>2013-2014</option>
    <option <?php if (isset($year) && $year=="2014-2015") echo "selected";?>>2014-2015</option>
    <option <?php if (isset($year) && $year=="2015-2016") echo "selected";?>>2015-2016</option>
    <option <?php if (isset($year) && $year=="2016-2017") echo "selected";?>>2016-2017</option>
    <option <?php if (isset($year) && $year=="2017-2018") echo "selected";?>>2017-2018</option>
    <?php while ($row = mysqli_fetch_array($res)) {
                  ?>
      <option <?php if (isset($year) && $year==$row['yeardate']) echo "selected";?>><?php echo $row['yeardate']; ?></option>
      <?php
    } ?>
  </select>
         <span id="error_schoolyear" class="text-danger"></span>
     </div>
     <div class="col-md-6">
         <select id="semester" name="semester" class="form-control">
    <option disabled selected>Select Semester</option>
    <option <?php if (isset($semester) && $semester=="1st Semester") echo "selected";?>>1st Semester</option>
    <option <?php if (isset($semester) && $semester=="2nd Semester") echo "selected";?>>2nd Semester</option>
    <option <?php if (isset($semester) && $semester=="Summer") echo "selected";?>>Summer</option>
    </select>
    <span id="error_semester" class="text-danger"></span>
         </div>
      </div>
      <br />
        <div>
         <button type="button" style="float: left;" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default">Previous</button>
         <button type="button" style="float: right;" name="btn_contact_details"  id="btn_contact_details" class="btn btn-success">Register</button>
         <br>
     </div>
     </div>
    </form>

    </div>
        </div>
      </div>
    </div>
  </main>
<br><br><br><br><br>
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
  title: 'Registering...',
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
<script>
    function yesnoCheck(that) {
        if (that.value == "others") {
            document.getElementById("ifYes").style.display = "block";
        } else {
            document.getElementById("ifYes").style.display = "none";
        }
    }
</script>
<script type="text/javascript"> function capitalize(textboxid, str) {  if (str && str.length >= 1) { var firstChar = str.charAt(0); var remainingStr = str.slice(1); str = firstChar.toUpperCase() + remainingStr; } document.getElementById(textboxid).value = str; } </script>

<script type="text/javascript"> function capitalize1(textboxid, str) {  if (str && str.length >= 1) { var firstChar = str.charAt(0); var remainingStr = str.slice(1); str = firstChar.toUpperCase() + remainingStr; } document.getElementById(textboxid).value = str; } </script>

<script type="text/javascript"> function capitalize2(textboxid, str) {  if (str && str.length >= 1) { var firstChar = str.charAt(0); var remainingStr = str.slice(1); str = firstChar.toUpperCase() + remainingStr; } document.getElementById(textboxid).value = str; } </script>

 </script>
<script type="text/javascript">
  function check() {
    if(document.getElementById('password').value ===
            document.getElementById('cpassword').value) {
        //document.getElementById('message').innerHTML = "Match";
  //const toast = swal.mixin({
  //toast: true,
  //position: 'top-end',
  //showConfirmButton: false,
  //timer: 3000
//});

//toast({
  //type: 'success',
 // title: 'Signed in successfully'
//})
swal({
  type: 'success',
  title: 'Password Match',
  showConfirmButton: false,
  timer: 1500
})

    } else {
        //document.getElementById('message').innerHTML = "Not Match";
   swal({
  type: 'warning',
  title: 'Password do not Match',
  showConfirmButton: false,
  timer: 1500
})
    }
}
</script>
<script>
  function maxLengthCheck(object) {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
    
  function isNumeric (evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode (key);
    var regex = /[0-9]|\./;
    if ( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
</script>
<script type="text/javascript">
          function getAge(){
            var date = document.getElementById('date').value;
            date = new Date(date);
            var today = new Date();
            var age = Math.floor((today-date) / (365.25 * 24 * 60 * 60 * 1000));
            document.getElementById('contact').value=age;
        }
</script>
<script>
$(document).ready(function(){
 
 $('#btn_login_details').click(function(){
  
  var error_email = '';
  var error_password = '';
  var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  
 
  
  if($.trim($('#password').val()).length == 0)
  {
   error_password = 'Password is required';
   $('#error_password').text(error_password);
   $('#password').addClass('has-error');
  }
  else
  {
   error_password = '';
   $('#error_password').text(error_password);
   $('#password').removeClass('has-error');
  }

  if($.trim($('#cpassword').val()).length == 0)
  {
   error_cpassword = 'ConfirmPassword is required';
   $('#error_cpassword').text(error_cpassword);
   $('#cpassword').addClass('has-error');
  }
  else
  {
   error_cpassword = '';
   $('#error_cpassword').text(error_cpassword);
   $('#cpassword').removeClass('has-error');
  }

  if($.trim($('#fname').val()).length == 0)
  {
   error_fname = 'Firstname is required';
   $('#error_fname').text(error_fname);
   $('#fname').addClass('has-error');
  }
  else
  {
   error_fname = '';
   $('#error_fname').text(error_fname);
   $('#fname').removeClass('has-error');
  }

  if($.trim($('#mname').val()).length == 0)
  {
   error_mname = 'Middlename is required';
   $('#error_mname').text(error_mname);
   $('#mname').addClass('has-error');
  }
  else
  {
   error_mname = '';
   $('#error_mname').text(error_mname);
   $('#mname').removeClass('has-error');
  }

  if($.trim($('#lname').val()).length == 0)
  {
   error_lname = 'Lastname is required';
   $('#error_lname').text(error_lname);
   $('#lname').addClass('has-error');
  }
  else
  {
   error_lname = '';
   $('#error_lname').text(error_lname);
   $('#lname').removeClass('has-error');
  }

  if(error_email != '' || error_password != '' || error_cpassword !='' || error_fname !='' || error_mname !='' || error_lname !='')
  {
   return false;
  }
  else
  {
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#login_details').removeClass('active');
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');

  }
 });
 
 $('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_login_details').removeClass('inactive_tab1');
  $('#list_login_details').addClass('active_tab1 active');
  $('#list_login_details').attr('href', '#login_details');
  $('#list_login_details').attr('data-toggle', 'tab');
  $('#login_details').addClass('active in');

 });
 
 $('#btn_personal_details').click(function(){
  var error_first_name = '';
  var error_last_name = '';
  
  if($.trim($('#studentid').val()).length == 0)
  {
   error_studentid = 'Student id is required';
   $('#error_studentid').text(error_studentid);
   $('#studentid').addClass('has-error');
  }
  else
  {
   if($.trim($('#studentid').val()).length < 7)
  {
   error_studentid = 'Invalid StudentID';
   $('#error_studentid').text(error_studentid);
   $('#studentid').addClass('has-error');
  }
  else
  {
   error_studentid = '';
   $('#error_studentid').text(error_studentid);
   $('#studentid').removeClass('has-error');
  }
  }

  if($.trim($('#marital').val()).length == 0)
  {
   error_marital = 'Marital is required';
   $('#error_marital').text(error_marital);
   $('#marital').addClass('has-error');
  }
  else
  {
   error_marital = '';
   $('#error_marital').text(error_marital);
   $('#marital').removeClass('has-error');
  }

  if($.trim($('#gender').val()).length == 0)
  {
   error_gender = 'Gender is required';
   $('#error_gender').text(error_gender);
   $('#gender').addClass('has-error');
  }
  else
  {
   error_gender = '';
   $('#error_gender').text(error_gender);
   $('#gender').removeClass('has-error');
  }

  if($.trim($('#date').val()).length == 0)
  {
   error_birthdate = 'Birthdate is required';
   $('#error_birthdate').text(error_birthdate);
   $('#date').addClass('has-error');
  }
  else
  {
   error_birthdate = '';
   $('#error_birthdate').text(error_birthdate);
   $('#date').removeClass('has-error');
  }
  
  if($.trim($('#picture').val()).length == 0)
  {
   error_image = 'Picture is required';
   $('#error_image').text(error_image);
   $('#picture').addClass('has-error');
  }
  else
  {
   error_image = '';
   $('#error_image').text(error_image);
   $('#picture').removeClass('has-error');
  }

  if($.trim($('#program').val()).length == 0)
  {
   error_program = 'Program is required';
   $('#error_program').text(error_program);
   $('#program').addClass('has-error');
  }
  else
  {
   error_program = '';
   $('#error_program').text(error_program);
   $('#program').removeClass('has-error');
  }

  if(error_studentid !='' || error_marital !='' || error_gender !='' || error_birthdate !='' || error_image !='' || error_program !='')
  {
   return false;
  }
  else
  {
   $('#list_personal_details').removeClass('active active_tab1');
   $('#list_personal_details').removeAttr('href data-toggle');
   $('#personal_details').removeClass('active');
   $('#list_personal_details').addClass('inactive_tab1');
   $('#list_contact_details').removeClass('inactive_tab1');
   $('#list_contact_details').addClass('active_tab1 active');
   $('#list_contact_details').attr('href', '#contact_details');
   $('#list_contact_details').attr('data-toggle', 'tab');
   $('#contact_details').addClass('active in');
  }
 });
 
 $('#previous_btn_contact_details').click(function(){
  $('#list_contact_details').removeClass('active active_tab1');
  $('#list_contact_details').removeAttr('href data-toggle');
  $('#contact_details').removeClass('active in');
  $('#list_contact_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
 });
 
 $('#btn_contact_details').click(function(){
  var error_address = '';
  var error_mobile_no = '';
  var mobile_validation = /^\d{10}$/;

  if($.trim($('#year').val()).length == 0)
  {
   error_schoolyear = 'SchoolYear is required';
   $('#error_schoolyear').text(error_schoolyear);
   $('#year').addClass('has-error');
  }
  else
  {
   error_schoolyear = '';
   $('#error_schoolyear').text(error_schoolyear);
   $('#year').removeClass('has-error');
  }

  if($.trim($('#semester').val()).length == 0)
  {
   error_semester = 'Semester is required';
   $('#error_semester').text(error_semester);
   $('#semester').addClass('has-error');
  }
  else
  {
   error_semester = '';
   $('#error_semester').text(error_semester);
   $('#semester').removeClass('has-error');
  }
  
  if(error_schoolyear != '' || error_semester != '')
  {
   return false;
  }
  else
  {
   $('#btn_contact_details').attr("disabled", "disabled");
   $(document).css('cursor', 'prgress');
   $("#register_form").submit();
   Loader();
  }
  
 });
 
});
</script>
<script>
    !function ($) {

    "use strict";

    var Progressbar = function (element) {
        this.$element = $(element);
    }

    Progressbar.prototype.update = function (value) {
        var $div = this.$element.find('div');
        var $span = $div.find('span');
        $div.attr('aria-valuenow', value);
        $div.css('width', value + '%');
        $span.text(value + '% Complete');
    }

    Progressbar.prototype.finish = function () {
        this.update(100);
    }

    Progressbar.prototype.reset = function () {
        this.update(0);
    }

   

    $.fn.progressbar = function (option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('jbl.progressbar');

            if (!data) $this.data('jbl.progressbar', (data = new Progressbar(this)));
            if (typeof option == 'string') data[option]();
            if (typeof option == 'number') data.update(option);
        })
    };

    $(document).on('click', '[data-toggle="progressbar"]', function (e) {
        var $this = $(this);
        var $target = $($this.data('target'));
        var value = $this.data('value');

        e.preventDefault();

        $target.progressbar(value);
    });

}(window.jQuery);
</script>