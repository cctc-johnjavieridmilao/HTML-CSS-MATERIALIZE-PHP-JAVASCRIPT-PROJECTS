 <?php session_start();?>
 <?php
 include 'functionusercontent.php';
 include 'connection/Connform.php';
 $message = '';
 $sound = '';
 if(isset($_POST["email"]))
 {
   sleep(5);
   $query = "
   INSERT INTO alumni_records 
   (fname, mname, lname, address, email, cpnumber, gender ,age,birthdate,maritalstatus,degree,degreeearned,institution,program,yeargraduted,eligibility,honor,employed,companyname,position,yearofemployement,salary,mothlysalary,jobawawards,timelookingjob,delayofemployment,factores,employmentstatus,relevance,skills,curriculum,instruction,faculty,library,laboratory,physicalplant,guidance,housingdormitories,jobplacement,counseling,reseacrh,extension,administration,comment,natureofbusiness,placeofbusiness,yearstatrted,averagemonthlyincome,reciveawrds,jobdescription,worknature,yearemployment,ofwincome,ofwawards,work,submitstat) VALUES (:first_name, :m_name, :l_name, :address, :email, :mobile_no ,:gender,:age,:bdate,:status,:degree,:eearned,:institution,:program,:year,:Eligibility,:honor,:employed,:cname,:position,:yearofemployment,:salary,:salarys,:jobawards,:lengthoftime,:reasondelay,:factores,:employmentstat,:relevance,:skills,:cccontent,:minstruction,:f_aculty,:l_ibrary,:la_boratory,:physical,:cguidance,:hdormitoris,:jplacement,:acounceling,:rsearch,:extension,:gadministration,:comment,:businessname,:place,:yearstart,:avincome,:jobawards2,:description,:worknature,:employmentyearofw,:salaryofw,:jobawards3,:work,1)
   ";
   
   $user_data = array(
    ':first_name'  => $_POST["fname"],
    ':m_name'  => $_POST["mname"],
    ':l_name'   => $_POST["lname"],
    ':address'   => $_POST["address"],
    ':email'   =>  $_POST["email"],
    ':address'   => $_POST["address"],
    ':mobile_no'  => $_POST["cpnumber"],
    ':gender'  => $_POST["gender"],
    ':age'  => $_POST["age"],
    ':bdate'  => $_POST["bdate"],
    ':status'  => $_POST["status"],
    ':degree'  => $_POST["degree"],
    ':eearned'  => $_POST["eearned"],
    ':institution'  => $_POST["institution"],
    ':program'  => $_POST["program"],
    ':year'  => $_POST["year"],
    ':Eligibility'  => $_POST["Eligibility"],
    ':honor'  => $_POST["honor"],
    ':employed'  => $_POST["employed"],
    ':cname'  => $_POST["cname"],
    ':position'  => $_POST["position"],
    ':yearofemployment'  => $_POST["yearofemployment"],
    ':salarys'  => $_POST["salaryemployed"],
    ':salary'  => $_POST["salary"],
    ':jobawards'  => $_POST["jobawards"],
    ':lengthoftime'  => $_POST["lengthoftime"],
    ':reasondelay'  => $_POST["reasondelay"],
    ':factores'  => $_POST["factores"],
    ':employmentstat'  => $_POST["employmentstat"],
    ':relevance'  => $_POST["relevance"],
    ':skills'  => $_POST["skills"],
    ':cccontent'  => $_POST["cccontent"],
    ':minstruction'  => $_POST["minstruction"],
    ':f_aculty'  => $_POST["faculty"],
    ':l_ibrary'  => $_POST["library"],
    ':la_boratory'  => $_POST["laboratory"],
    ':physical'  => $_POST["physical"],
    ':cguidance'  => $_POST["cguidance"],
    ':hdormitoris'  => $_POST["hdormitoris"],
    ':jplacement'  => $_POST["jplacement"],
    ':acounceling'  => $_POST["acounceling"],
    ':rsearch'  => $_POST["rsearch"],
    ':extension'  => $_POST["xservices"],
    ':gadministration'  => $_POST["gadministration"],
    ':comment'  => $_POST["comment"],
    ':businessname'  => $_POST["businessname"],
    ':place'  => $_POST["place"],
    ':yearstart'  => $_POST["yearstart"],
    ':avincome'  => $_POST["avincome"],
    ':jobawards2'  => $_POST["jobawards2"],
    ':description'  => $_POST["description"],
    ':worknature'  => $_POST["worknature"],
    ':employmentyearofw'  => $_POST["employmentyearofw"],
    ':salaryofw'  => $_POST["salaryofw"],
    ':jobawards3'  => $_POST["jobawards3"],
    ':work'  => $_POST["work"]
  );
   $statement = $connects->prepare($query);
   if($statement->execute($user_data))
   {
    session_start();
    $_SESSION['success'] = "Success";
    header('Location:home.php');
  }
  else
  {
    $message = '
    <div class="alert alert-success">
    There is an error in Registration
    </div>
    ';
  }
}
?>
<script type="text/javascript">
  function play_sound() {
    var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'sound/sound.mp3');
    audioElement.setAttribute('autoplay', 'autoplay');
    audioElement.load();
    audioElement.play();
  }
</script>
<?php 
if (empty($_SESSION['user_id'])) {
 header("Location:login.php");
 session_start();
 $_SESSION['FormLoginfirst'] = "Please Login First";
}
?>
<?php 
$id = $_SESSION['user_id'];
include 'connection/mysqliconn.php';
$query = "SELECT * FROM account WHERE acc_id = '$id'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_array($res);
$fname = $row['first_name'];
$mname = $row['middle_name'];
$lname = $row['last_name'];
$email = $row['email'];
$gender = $row['gender'];
$student_id = $row['student_id'];
$marital = $row['marital'];
$dateofbirth = $row['dateofbirth'];
$age  =$row['contact'];
$program = $row['program'];
$year = $row['year'];
$otherprogram = $row['otherprogram'];
?>

<?php 
$uname = $_SESSION['Unaname'];
include 'connection/mysqliconn.php';
$queryStat = "SELECT submitstat FROM alumni_records WHERE fname='$uname'";
$res = mysqli_query($connect,$queryStat);
$row = mysqli_fetch_assoc($res);

//if ($row['submitstat'] == 1) {
  //session_start();
 // $_SESSION['Done'] = "You Already Fill up Alumni Form";
 // header("Location:home.php");
//}


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
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Alumni Form</title>
  <link rel="shortcut icon" href="img/alumniLogo.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <meta name="theme-color" content="green" />
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
  <?php Logincss(); ?>
  <style>
  .box
  {
   width:900px;
   margin:0 auto;
 }
 .active_tab1
 {
   background-color:#fff;
   color:#fff;
   font-weight: 600;
 }
 .inactive_tab1
 {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
 }
 .has-error
 {
   border-color:#cc0000;
   background-color:#ffff99;
 }
 body::-webkit-scrollbar {
  width: .5em;
}

body::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}

body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
#nprogress .bar {
  height:6px;
  background-color: green;
}
#nprogress .spinner-icon {
  border-top-color: green;
  border-left-color: green;
}
.form-control,
.uk-select,
.uk-textarea {
  
}
@media screen and (max-width: 786px){
 .box{
  width: 350px;
}
input{
  max-width: 100%;
}
.panel{
  max-width: 70%;
}
.nav-tabs{
  max-width: 68%;
  margin-top: -40px;
  display: none;
}

}
</style>
</head>
<body>
 <header>
  <img id="img" src="img/alumnilogofirst.png">
  <h1 id="txt1"><font color="yellow">ISUCC<font color="white"> Alumni Association</font></font></h1>
  <h2 id="txt2"><font color="white"><span class="fas fa-user-graduate" style="color: font-size: 15px;"></span>  ALUMNI TRACKING FORM </font> </h2>
</header>
<div id="myProgressbar" class="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    <span>0% Complete</span>
  </div>
</div>
<?php echo $sound; ?>
<div class="container box animated bounceInUp">
 <br />
 <form method="post" id="register_form">
  <ul class="nav nav-tabs">
   <li class="nav-item">
    <a class="nav-link active_tab1" style="border:1px solid #ccc;font-size: 15px;" id="list_login_details">General Information</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc;font-size: 15px;">Educational Attainment</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc;font-size: 15px;">Employment</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inactive_tab1" id="list_other" style="border:1px solid #ccc;font-size: 15px;">Under Employment</a>
  </li>
  <li class="nav-item">
    <a class="nav-link inactive_tab1" id="list_assess" style="border:1px solid #ccc;font-size: 15px;">Quality Assesed</a>
  </li>
</ul>
<br>
<div class="tab-content" style="margin-top:10px;">
 <div class="tab-pane active" id="login_details">
  <div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
      <strong style="color: yellow;">General Information</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">
      <div class="form-row">
        <div class="form-group col-md-4"> 
         <label>Enter FirstName</label>
         <input type="text" name="fname" readonly id="fname" value="<?php echo $fname; ?>" class="form-control"/>
         <span id="error_fname" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label>Enter MiddleName</label>
         <input type="text" name="mname" readonly id="mname" value="<?php echo $mname; ?>" class="form-control" />
         <span id="error_mname" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label>Enter LastName</label>
         <input type="text" name="lname" readonly id="lname" value="<?php echo $lname; ?>" class="form-control" />
         <span id="error_lname" class="text-danger"></span>
       </div>
       <div class="form-group col-md-7">
         <label>Enter Your Permanent Address</label>
         <input type="text" name="address" id="address" class="form-control"/>
         <span id="error_address" class="text-danger"></span>
       </div>
       <div class="form-group col-md-5">
         <label>Email Address</label>
         <input type="email" name="email" value="<?php echo $email; ?>" id="email" class="form-control" />
         <span id="error_emailaddress" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label>Contact Number</label>
         <input type="number" id="number" onkeypress="return isNumeric(event)" oninput="maxLengthCheck(this)" name="cpnumber"  class="form-control"  maxlength="11" >
         <span id="error_contactnumber" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label>Age</label>
         <input type="number" name="age" readonly value="<?php echo $age; ?>" id="Age" class="form-control" />
         <span id="error_age" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label>Date of Birth</label>
         <input type="date" name="bdate" readonly  value="<?php echo $dateofbirth; ?>"  id="bdate" class="form-control" />
         <span id="error_bdate" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label>Civil Status</label>
         <input type="text" name="status" readonly value="<?php echo $marital; ?>" id="status" class="form-control" />
         <span id="error_status" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label>Gender</label>
         <input type="text" name="gender" readonly id="gender" value="<?php echo $gender; ?>" class="form-control" />
         <span id="error_gender" class="text-danger"></span>
       </div>
       <br />
       <div >
        <button  data-toggle="progressbar" data-target="#myProgressbar" data-value="20" style="margin-top: 20px; margin-left: 100px;" type="button"  name="btn_login_details" id="btn_login_details" class="btn btn-success">Next</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="tab-pane" id="personal_details">
 <div class="card">

  <h5 class="card-header success-color white-text text-center py-4">
    <strong style="color: yellow;">Educational Attainment</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5">
    <div class="form-row">
      <div class="form-group col-md-4">
       <label>Degree</label>
       <select class="form-control" name="degree" id="degree" required>
        <option></option>
        <option value="Baccalaureate Degree(College)">Baccalaureate Degree(College)</option>
        <option value="Master's Degree">Master's Degree</option>
        <option value="Doctoral Degree">Doctoral Degree</option>
        <option value="Post Doctoral">Post Doctoral</option>
      </select>
      <span id="error_degree" class="text-danger"></span>
    </div>

    <div class="form-group col-md-4">
     <label>Degree Earned</label>
     <input type="number" min="0" oninput="validity.valid||(value='');" name="eearned" class="form-control" id="earned" placeholder="Degree Earned">
     <span id="error_earned" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label>Institution</label>
     <select class="form-control" name="institution" id="institution"  required>
      <option value="">SELECT</option>
      <option value="ITE">ITE</option>
      <option value="CBM">CBM</option>
      <option value="CCIT">CCIT</option>
      <option value="SAC">SAC</option>
      <option value="IAT">IAT</option>
      <option value="PS">PS</option>
    </select>
    <span id="error_institution" class="text-danger"></span>
  </div>
  <div class="form-group col-md-4">
   <label for="date">*Program</label>
   <input type="text" name="program" id="program" value="<?php if($program == "others"){echo $otherprogram;}else{echo $program;} ?>" class="form-control" readonly>
   <span id="error_program" class="text-danger"></span>
 </div>
 <div class="form-group col-md-4">
   <label for="date">*Year Graduated</label>
   <input type="text"  name="year" readonly id="year" class="form-control" value="<?php echo $year; ?>"">
   <span id="error_schoolyear" class="text-danger"></span>
 </div>
 <div class="form-group col-md-4">
   <label for="date">*Eligibility</label>
   <select class="form-control" name="Eligibility" id="Eligibility" required>
    <option></option>
    <option value="Board Exam">Board Exam</option>
    <option value="National Certificate I and II">National Certificate I and II</option>
    <option value="National Certificate III">National Certificate III</option>
    <option value="Civil Service(Professional)">Civil Service(Professional)</option>
    <option value="Civil Service(Sub Professional)">Civil Service(Sub Professional)</option>
    <option value="Licensure Examination for Teachers (LET)">Licensure Examination for Teachers (LET)</option>
  </select>
  <span id="error_eligibility" class="text-danger"></span>
</div>
<div class="form-group col-md-3 ">
 <label for="age">*Did you graduate with honors when you finished your College/University degree?</label>
 <input type="radio" onclick="myFunction3()" id="yesCheck" name="honor" value="Yes"> <label>Yes</label>
 <input type="radio"  onclick="myFunction4()" id="yesNo" name="honor" value="No"> <label>No</label>
</div>
<div class="form-group col-md-8 " id="inputdiv">
 <label for="age">*If Yes What Award/Honors You Receive?</label>
 <input type="text" name="honor" class="form-control" id="honor" placeholder="Receive Awards">
</div>
<br />
<div>
 <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-warning">Previous</button>
 <button data-toggle="progressbar" data-target="#myProgressbar" data-value="40" type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-success">Next</button>
</div>
<br />
</div>
</div>
</div>
</div>
<div class="tab-pane" id="contact_details">
  <div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
      <strong style="color: yellow;">Employment</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">
     <div class="form-row">
       <div class="form-group col-sm-3">
         <label id="checkbox12345" for="age">*Employed</label>
         <input type="checkbox" name="employed"  class="form-control hvr-grow"  id="Employed" value="Employed" onclick="myFunction()"  onchange="isChecked(this,'sub1')">
       </div>
       <div class="form-group col-sm-3">
         <label id="checkbox12345" for="age">*Self Employed</label>
         <input type="checkbox" name="employed" class="form-control hvr-grow" id="self" value="Self Employed" onclick="myFunction1()" onchange="isChecked(this,'sub1')">
       </div>
       <div class="form-group col-sm-3">
         <label id="checkbox12345" for="age">*OFW</label>
         <input type="checkbox" name="employed" class="form-control hvr-grow" id="ofw" value="Ofw" onclick="myFunction2()" onchange="isChecked(this,'sub1')">
       </div>
       <div class="form-group col-sm-3">
         <label id="checkbox12345" for="age">*Un Employed</label>
         <input type="checkbox" name="employed" class="form-control hvr-grow" value="UnEmployed"  id="UnEmployed" onclick="myFunction7()" onchange="isChecked(this,'sub1')">
       </div>
     </div>
     <br><br>
     <div class="foremployed">
      <h1 style="font-size: 15px; visibility: hidden;">*For Employed</h1>
    </div>
    <div id="content">
     <div class="form-row">
       <div class="form-group col-md-4">
         <label for="age">*Company Name</label>
         <input type="text" name="cname" class="form-control" id="cname" placeholder="Company Name">
         <span id="error_companyname" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label for="age">*Position</label>
         <input type="text" name="position" class="form-control" id="position" placeholder="Company Position">
         <span id="error_position" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label for="age">*Year of EmployMent</label>
         <input type="text" name="yearofemployment" class="form-control" id="yearofemployment" placeholder="Year of Employment">
         <span id="error_yearemployment" class="text-danger"></span>
       </div>
       <div class="form-group col-md-4">
         <label for="age">*Monthly Salary</label>
         <input type="text" name="salaryemployed" class="form-control" id="salary" placeholder="Monthly Salary">
         <span id="error_monthlysalary" class="text-danger"></span>
       </div>
       <br><br>
       <div class="form-group col-md-4">
         <label for="age">*You Have an Awards/Distinctions Received?</label>
         <input type="radio"  id="yes" name="jobawards"> <label>Yes</label>
         <input type="radio" id="yes" name="jobawards" value="No"><label>No</label>
       </div>
       <div class="form-group col-md-4">
         <label for="age">*If Yes What Awards?</label>  
         <input type="text" name="jobawards" class="form-control" id="jobawards1" placeholder="Awards">
       </div>
     </div>
   </div>
   
   <div class="foremployed">
    <h1 style="font-size: 15px; visibility: hidden;">*For Self-Employed</h1>
  </div>
  <div id="contentself">
   <div class="form-row">
    <div class="form-group col-md-4">
     <label for="age">*Nature of Business</label>
     <input type="text" name="businessname" class="form-control" id="naturebusines" placeholder="Nature of Business">
     <span id="error_natureofbusiness" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*Place of Business</label>
     <input type="text" name="place" class="form-control" id="placeofnusines" placeholder="Place of your Business">
     <span id="error_placeofbusiness" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*Year Started</label>
     <input type="text" name="yearstart" class="form-control" id="yearstarted" placeholder="Year Started">
     <span id="error_yearstarted" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*Average of Mothly Income</label>
     <input type="text" name="avincome" class="form-control" id="monthlyincome" placeholder="Monthly Income">
     <span id="error_monthlyincome" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*You Have an Awards/Distinctions Received?</label>
     <input type="radio"  id="yes" name="jobawards2"> <label>Yes</label>
     <input type="radio" id="yes" name="jobawards2" value="No"> <label>No</label>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*If Yes What Awards?</label>
     <input type="text" name="jobawards2" class="form-control" id="jobawards2" placeholder="Awards">
   </div>
 </div>
</div>
<br><br>
<div class="foremployed">
  <h1 style="font-size: 15px; visibility: hidden;">*For OFW</h1>
</div>
<div id="contentofw">
  <div class="form-row">
    <div class="form-group col-md-4">
     <label for="age">*Job Description</label>
     <input type="text" name="description" class="form-control" id="jobdescriptionOFW" placeholder="Job Description">
     <span id="error_jobdes" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*Nature of Work</label>
     <input type="text" name="worknature" class="form-control" id="natureofworkOFW" placeholder="Nature of Work">
     <span id="error_natureofword" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*Year Employment</label>
     <input type="text" name="employmentyearofw" class="form-control" id="yearofemploymentOFW" placeholder="Year Employment">
     <span id="error_ofwyear" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*Monthly Income</label>
     <input type="text" name="salaryofw" class="form-control" id="monthlyincomeOFW" placeholder="Monthly Income">
     <span id="error_salaryofw" class="text-danger"></span>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*You Have an Awards/Distinctions Received?</label>
     <input type="radio"  id="yes" name="jobawards3"> <label>Yes</label>
     <input type="radio" id="yes" name="jobawards3" value="No"> <label>No</label>
   </div>
   <div class="form-group col-md-4">
     <label for="age">*If Yes What Awards?</label>
     <input type="text" name="jobawards3" class="form-control" id="jobawards3" placeholder="Awards">
   </div>
 </div>
</div>
<br />
<div style="float: right;">
 <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-warning">Previous</button>
 <button data-toggle="progressbar" data-target="#myProgressbar" data-value="60" type="button"  name="btn_employment" id="btn_employment" class="btn btn-success">Next</button>
</div>
<br />
</div>
</div>
</div>
<div class="tab-pane" id="other_details">
 <div class="card">

  <h5 class="card-header success-color white-text text-center py-4">
    <strong style="color: yellow;">Under Employment</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="salary">* Monthly Salary</label>
        <input type="text" name="salary" class="form-control" id="B" placeholder="Salary">
      </div>
      <div class="form-group col-md-6">
        <label for="age" style="font-size: 14px;">*Length Of Time in looking For A job</label>
        <select class="form-control" name="lengthoftime" id="lengthoftime" required>
          <option></option>
          <option value="Below 1 year">Below 1 year</option>
          <option value="one year to Below 2 years">one year to Below 2 years</option>
          <option value="two years to below 3 years">two years to below 3 years</option>
          <option value="three years to below 4 years">three years to below 4 years</option>
          <option value="four years and Above">four years and Above</option>
        </select>
        <span id="error_lenght" class="text-danger"></span>
      </div>
      <div class="form-group col-md-6">
        <label for="age" style="font-size: 14px">*Reasons For Delay of Employment</label>
        <select class="form-control" name="reasondelay" id="reasondelay" required>
          <option></option>
          <option value="Below 1 year">Delay in insuance of School Credentials</option>
          <option value="one year to Below 2 years">Delay in Taking / Passing board exam</option>
          <option value="two years to below 3 years">No immediate vacancy</option>
          <option value="three years to below 4 years">Tight competition for the job</option>
          <option value="four years and Above">Available job/ are not in line with specialization</option>
          <option value="four years and Above">Lack of financial support for job hunting</option>
          <option value="four years and Above">Health reasons</option>
          <option value="four years and Above">Early Marriage</option>
          <option value="four years and Above">Not emotionaly ready</option>
          <option value="1">Others</option>
        </select>
        <span id="error_delay" class="text-danger"></span>
      </div>
      <div class="form-group col-md-6">
        <label for="age">*If Others Please Specify</label>
        <input type="text" name="reasondelay" class="form-control" id="reasonother" placeholder="Other Reason" disabled>
      </div>
      
      <div class="form-group col-md-6">
        <label for="age">*Factors</label>
        <select class="form-control" name="factores" id="factores" required>
          <option></option>
          <option value="Educational Qualification">Educational Qualification</option>
          <option value="Assistance of ISU Placement Office">Assistance of ISU Placement Office</option>
          <option value="Goverment Employment Office">Goverment Employment Office</option>
          <option value="Media advertisement">Media advertisement</option>
          <option value="Recomendation from relatives/Friends">Recomendation from relatives/Friends</option>
          <option value="Recomendation from Politicians">Recomendation from Politicians</option>
          <option value="Recomendations from teachers">Recomendations from teachers</option>
          <option value="Personal office company">Personal office company</option>
          <option value="job fair/DOLE">job fair/DOLE</option>
          <option value="Online Application">Online Application</option>
          <option value="1">Others</option>
        </select>
        <span id="error_factors" class="text-danger"></span>
      </div>
      <div class="form-group col-md-6">
        <label for="age">*If Others Please Specify</label>
        <input type="text" name="factores" class="form-control" id="factorsonother" placeholder="Other" disabled>
      </div>

      <div class="form-group col-md-6">
        <label for="age">*Employment Status</label>
        <select class="form-control" name="employmentstat" id="employmentstat" required>
          <option></option>
          <option value="Permanent">Permanent</option>
          <option value="Temporary">Temporary</option>
          <option value="Casual/Contractual">Casual/Contractual</option>
          <option value="Job Order">Job Order</option>
          <option value="1">Others</option>
        </select>
        <span id="error_employment" class="text-danger"></span>
      </div>
      <div class="form-group col-md-6">
        <label for="age"> *If Others Please Specify</label>
        <input type="text" name="employmentstat" class="form-control" id="employmentstats" placeholder="Other" disabled>
      </div>
      <div class="form-group col-md-6">
       <label for="age">*Relevance of College Degree</label>
       <select class="form-control" name="relevance" id="relevance" required>
        <option></option>
        <option value="Very Relevant">Very Relevant</option>
        <option value="Fairly Relevant">Fairly Relevant</option>
        <option value="Relevant">Relevant</option>
        <option value="Not Relevant">Not Relevant</option>
      </select>
      <span id="error_relevance" class="text-danger"></span>
    </div>
    <div class="form-group col-md-6">
     <label for="age">*If you Are Employed , Self employed , Ofw Worker Please Specify your Job and if you are not employed please type <font style="color: green;"> No job</font></label>
     <input type="text" name="work" class="form-control" onkeyup="javascript:capitalize(this.id, this.value);" id="work" placeholder="Your Job">
     <span id="error_work" class="text-danger"></span>
   </div>
   <div class="form-group col-md-6">
     <label for="age">*What competencies you learned in college.</label>
     <select class="form-control" name="skills" id="skills" required>
      <option></option>
      <option value="Communication Skills">Communication Skills</option>
      <option value="Human relation/Interpersonal Skills">Human relation/Interpersonal Skills</option>
      <option value="Leadership/Managerial Skills">Leadership/Managerial Skills</option>
      <option value="Entrepreneural Skills">Entrepreneural Skills</option>
      <option value="Information Technology Skills">Information Technology Skills</option>
      <option value="Problem-Solving Skills">Problem-Solving Skills</option>
      <option value="Critical thinking Skills">Critical thinking Skills</option>
      <option value="Reasearch and Extension Skills">Reasearch and Extension Skills</option>
      <option value="1">Others</option>
    </select>
    <span id="error_competencies" class="text-danger"></span>
  </div>
  <div class="form-group col-md-6">
   <label for="age">*If Others Please Specify</label>
   <input type="text" name="skills" class="form-control" id="skillss" placeholder="Other" disabled>
 </div>
 <br/>
 <div style="float: right;">
   <button type="button" name="previous_btn_other" id="previous_btn_other" class="btn btn-warning">Previous</button>
   <button data-toggle="progressbar" data-target="#myProgressbar" data-value="100" type="button" name="btn_other_next" id="btn_other_next" class="btn btn-success">Next</button>
 </div>
</div>
<br/>
</div>
</div>
</div>
<div class="tab-pane" id="assed_details">
  <div class="card">

    <h5 class="card-header success-color white-text text-center py-4">
      <strong style="color: yellow;">Quality Assesed</strong>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5">
      <div class="form-row">
        <div class="form-group col-md-4">
         <label>*Curriculum/Course Content.</label>
         <select class="form-control" name="cccontent" id="cccontent" required>
          <option></option>
          <option value="Excellent">Excellent</option>
          <option value="Very Good">Very Good</option>
          <option value="Good">Good</option>
          <option value="Fair">Fair</option>
          <option value="Need Improvement">Need Improvement</option>
        </select>
        <span id="error_curriculum" class="text-danger"></span>
      </div>

      <div class="form-group col-md-4">
       <label for="age">*Methods of Instruction.</label>
       <select class="form-control" name="minstruction" id="minstruction" required>
        <option></option>
        <option value="Excellent">Excellent</option>
        <option value="Very Good">Very Good</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
        <option value="Need Improvement">Need Improvement</option>
      </select>
      <span id="error_methods" class="text-danger"></span>
    </div>

    <div class="form-group col-md-4">
      <label >*Faculty.</label>
      <select class="form-control" name="faculty" id="faculty" required>
        <option></option>
        <option value="Excellent">Excellent</option>
        <option value="Very Good">Very Good</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
        <option value="Need Improvement">Need Improvement</option>
      </select>
      <span id="error_faculty" class="text-danger"></span>
    </div>

    <div class="form-group col-md-4">
      <label >*Library</label>
      <select class="form-control" name="library" id="library" required>
        <option></option>
        <option value="Excellent">Excellent</option>
        <option value="Very Good">Very Good</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
        <option value="Need Improvement">Need Improvement</option>
      </select>
      <span id="error_library" class="text-danger"></span>
    </div>

    <div class="form-group col-md-4">
      <label for="age">*Laboratories</label>
      <select class="form-control" name="laboratory" id="laboratory" required>
        <option></option>
        <option value="Excellent">Excellent</option>
        <option value="Very Good">Very Good</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
        <option value="Need Improvement">Need Improvement</option>
      </select>
      <span id="error_laboratories" class="text-danger"></span>
    </div>

    <div class="form-group col-md-4">
      <label for="age">*Physical Plant</label>
      <select class="form-control" name="physical" id="physical" required>
        <option></option>
        <option value="Excellent">Excellent</option>
        <option value="Very Good">Very Good</option>
        <option value="Good">Good</option>
        <option value="Fair">Fair</option>
        <option value="Need Improvement">Need Improvement</option>
      </select>
      <span id="error_plant" class="text-danger"></span>
    </div>

    <div class="form-group col-md-4">
     <label for="age">*Career Guidance</label>
     <select class="form-control" name="cguidance" id="cguidance" required>
      <option></option>
      <option value="Excellent">Excellent</option> 
      <option value="Very Good">Very Good</option>
      <option value="Good">Good</option>
      <option value="Fair">Fair</option>
      <option value="Need Improvement">Need Improvement</option>
    </select>
    <span id="error_carreer" class="text-danger"></span>
  </div>

  <div class="form-group col-md-4">
    <label for="age">*Housing Dormitories</label>
    <select class="form-control" name="hdormitoris" id="hdormitoris" required>
      <option></option>
      <option value="Excellent">Excellent</option>
      <option value="Very Good">Very Good</option>
      <option value="Good">Good</option>
      <option value="Fair">Fair</option>
      <option value="Need Improvement">Need Improvement</option>
    </select>
    <span id="error_housing" class="text-danger"></span>
  </div>

  <div class="form-group col-md-4">
   <label for="age">*Job Placement</label>
   <select class="form-control" name="jplacement" id="jplacement" required>
    <option></option>
    <option value="Excellent">Excellent</option>
    <option value="Very Good">Very Good</option>
    <option value="Good">Good</option>
    <option value="Fair">Fair</option>
    <option value="Need Improvement">Need Improvement</option>
  </select>
  <span id="error_job" class="text-danger"></span>
</div>

<div class="form-group col-md-4">
 <label for="age">*Academic Counseling</label>
 <select class="form-control" name="acounceling" id="acounceling" required>
  <option></option>
  <option value="Excellent">Excellent</option>
  <option value="Very Good">Very Good</option>
  <option value="Good">Good</option>
  <option value="Fair">Fair</option>
  <option value="Need Improvement">Need Improvement</option>
</select>
<span id="error_academic" class="text-danger"></span>
</div>

<div class="form-group col-md-4">
 <label for="age">*Research Services</label>
 <select class="form-control" name="rsearch" id="rsearch" required>
  <option></option>
  <option value="Excellent">Excellent</option>
  <option value="Very Good">Very Good</option>
  <option value="Good">Good</option>
  <option value="Fair">Fair</option>
  <option value="Need Improvement">Need Improvement</option>
</select>
<span id="error_research" class="text-danger"></span>
</div>

<div class="form-group col-md-4">
 <label for="age">*Extension Services</label>
 <select class="form-control" name="xservices" id="xservices" required>
  <option></option>
  <option value="Excellent">Excellent</option>
  <option value="Very Good">Very Good</option>
  <option value="Good">Good</option>
  <option value="Fair">Fair</option>
  <option value="Need Improvement">Need Improvement</option>
</select>
<span id="error_services" class="text-danger"></span>
</div>

<div class="form-group col-md-4">
 <label for="age">*General Administration</label>
 <select class="form-control" name="gadministration" id="gadministration" required>
  <option></option>
  <option value="Excellent">Excellent</option>
  <option value="Very Good">Very Good</option>
  <option value="Good">Good</option>
  <option value="Fair">Fair</option>
  <option value="Need Improvement">Need Improvement</option>
</select>
<span id="error_administration" class="text-danger"></span>
</div>

<div class="form-group col-md-6">
 <label for="comment">Comments and Suggestion</label>
 <textarea class="form-control" id="comment" name="comment" placeholder="Type Here..." rows="4" required></textarea>
 <span id="error_comment" class="text-danger"></span>
</div>

<br />
<div align="center">
 <button type="button" name="previous_btn_asses" id="previous_btn_asses" class="btn btn-warning">Previous</button>
 <button data-toggle="progressbar" data-target="#myProgressbar" disabled  data-value="100" type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-success">Submit</button>
</div>
<br />
</div>
</div>
</div>
</div>
</div>
</div>
</form>
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
<!-- iCheck -->
</body>
</html>
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
<script>
  salary.onkeyup = function() { 
    B.value = this.value;
  };

  monthlyincome.onkeyup = function() { 
    B.value = this.value;
  };

  monthlyincomeOFW.onkeyup = function() { 
    B.value = this.value;
  };
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

<script type="text/javascript">
  document.getElementById("comment").addEventListener("keyup", function() {
    var nameInput = document.getElementById('comment').value;
    if (nameInput != "") {
      document.getElementById('btn_contact_details').removeAttribute("disabled");
    } else {
      document.getElementById('btn_contact_details').setAttribute("disabled", null);
    }
  });
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
<script type="text/javascript"> 
  function capitalize(textboxid, str) {
    if (str && str.length >= 1) {
     var firstChar = str.charAt(0);
     var remainingStr = str.slice(1); 
     str = firstChar.toUpperCase() + remainingStr; 
   } 
   document.getElementById(textboxid).value = str; 
 } 
</script>
<script>
  $(document).ready(function(){
   
   $('#btn_login_details').click(function(){
    
    var error_email = '';
    var error_password = '';
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var mobile_validation = /^(09|\+639)\d{9}$/gm;

    
    if($.trim($('#fname').val()).length == 0)
    {
     error_fname = 'FirstName is required';
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
     error_mname = 'MiddleName is required';
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
     error_lname = 'Last Name is required';
     $('#error_lname').text(error_lname);
     $('#lname').addClass('has-error');
   }
   else
   {
     error_lname= '';
     $('#error_lname').text(error_lname);
     $('#lname').removeClass('has-error');
   }

   if($.trim($('#address').val()).length == 0)
   {
     error_address = 'Address is required';
     $('#error_address').text(error_address);
     $('#address').addClass('has-error');
   }
   else
   {
     error_address= '';
     $('#error_address').text(error_address);
     $('#address').removeClass('has-error');
   }

   if($.trim($('#email').val()).length == 0)
   {
     error_emailaddress = 'Email is required';
     $('#error_emailaddress').text(error_emailaddress);
     $('#email').addClass('has-error');
   }
   else
   {
     if (!filter.test($('#email').val()))
     {
      error_emailaddress = 'Invalid Email';
      $('#error_emailaddress').text(error_emailaddress);
      $('#email').addClass('has-error');
    }
    else
    {
      error_emailaddress = '';
      $('#error_emailaddress').text(error_emailaddress);
      $('#email').removeClass('has-error');
    }
  }

  if($.trim($('#number').val()).length == 0)
  {
   error_contactnumber = 'Contact Number is required';
   $('#error_contactnumber').text(error_contactnumber);
   $('#number').addClass('has-error');
 }
 else
 {
  if($.trim($('#number').val()).length < 9)
  {
   error_contactnumber = 'Invalid Contact Number';
   $('#error_contactnumber').text(error_contactnumber);
   $('#number').addClass('has-error');
 }
 else
 {
   error_contactnumber= '';
   $('#error_contactnumber').text(error_contactnumber);
   $('#number').removeClass('has-error');
 }
}

if($.trim($('#bdate').val()).length == 0)
{
 error_bdate = 'Birthdate is Number is required';
 $('#error_bdate').text(error_bdate);
 $('#bdate').addClass('has-error');
}
else
{
 error_bdate= '';
 $('#error_bdate').text(error_bdate);
 $('#bdate').removeClass('has-error');
}

if($.trim($('#status').val()).length == 0)
{
 error_status = 'Civil Status is Number is required';
 $('#error_status').text(error_status);
 $('#status').addClass('has-error');
}
else
{
 error_status= '';
 $('#error_status').text(error_status);
 $('#status').removeClass('has-error');
}
if($.trim($('#Age').val()).length == 0)
{
 error_age = 'Age  is required';
 $('#error_age').text(error_age);
 $('#Age').addClass('has-error');
}
else
{
 error_age= '';
 $('#error_age').text(error_age);
 $('#Age').removeClass('has-error');
}

if($.trim($('#gender').val()).length == 0)
{
 error_gender = 'Gender is required';
 $('#error_gender').text(error_gender);
 $('#gender').addClass('has-error');
}
else
{
 error_gender= '';
 $('#error_gender').text(error_gender);
 $('#gender').removeClass('has-error');
}

if(error_fname != '' || error_mname != '' || error_lname !='' || error_address !='' || error_emailaddress !='' || error_contactnumber !='' || error_bdate !='' || error_status !='' || error_age !='' || error_gender !='')
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
   //swal("General Information is Done","20%","success");
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
  var error_degree = '';
  var error_earned = '';
  var error_program = '';
  var error_schoolyear = '';
  var error_eligibility = '';

  if($.trim($('#degree').val()).length == 0)
  {
   error_degree = 'Degree is required';
   $('#error_degree').text(error_degree);
   $('#degree').addClass('has-error');
 }
 else
 {
   error_degree = '';
   $('#error_degree').text(error_degree);
   $('#degree').removeClass('has-error');
 }
 
 if($.trim($('#earned').val()).length == 0)
 {
   error_earned = 'Degree Earned is required';
   $('#error_earned').text(error_earned);
   $('#earned').addClass('has-error');
 }
 else
 {
   error_earned = '';
   $('#error_earned').text(error_earned);
   $('#earned').removeClass('has-error');
 }

 if($.trim($('#institution').val()).length == 0)
 {
   error_institution = 'Institution is required';
   $('#error_institution').text(error_institution);
   $('#institution').addClass('has-error');
 }
 else
 {
   error_institution = '';
   $('#error_institution').text(error_institution);
   $('#institution').removeClass('has-error');
 }

 if($.trim($('#institution').val()).length == 0)
 {
   error_institution = 'Institution is required';
   $('#error_institution').text(error_institution);
   $('#institution').addClass('has-error');
 }
 else
 {
   error_institution = '';
   $('#error_institution').text(error_institution);
   $('#institution').removeClass('has-error');
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

 if($.trim($('#year').val()).length == 0)
 {
   error_schoolyear = 'School is required';
   $('#error_schoolyear').text(error_schoolyear);
   $('#year').addClass('has-error');
 }
 else
 {
   error_schoolyear = '';
   $('#error_schoolyear').text(error_schoolyear);
   $('#year').removeClass('has-error');
 }

 if($.trim($('#Eligibility').val()).length == 0)
 {
   error_eligibility = 'Eligibility is required';
   $('#error_eligibility').text(error_eligibility);
   $('#Eligibility').addClass('has-error');
 }
 else
 {
   error_eligibility = '';
   $('#error_eligibility').text(error_eligibility);
   $('#Eligibility').removeClass('has-error');
 }

 if(error_degree != '' || error_earned != '' || error_institution !='' || error_earned !='' || error_institution !='' || error_program !='' || error_schoolyear !='' || error_eligibility !='')
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
   //swal("Educational Attainment is Done","40%","success");
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

 $('#btn_employment').click(function(){
  
  if($.trim($('#cname').val()).length == 0)
  {
   error_companyname = 'Companyname is required';
   $('#error_companyname').text(error_companyname);
   $('#cname').addClass('has-error');
 }
 else 
 {
   error_companyname = '';
   $('#error_companyname').text(error_companyname);
   $('#cname').removeClass('has-error');
 }

 if($.trim($('#position').val()).length == 0)
 {
   error_position = 'Position is required';
   $('#error_position').text(error_position);
   $('#position').addClass('has-error');
 }
 else 
 {
   error_position = '';
   $('#error_position').text(error_position);
   $('#position').removeClass('has-error');
 }

 if($.trim($('#yearofemployment').val()).length == 0)
 {
   error_yearemployment = 'Year of Employment is required';
   $('#error_yearemployment').text(error_yearemployment);
   $('#yearofemployment').addClass('has-error');
 }
 else 
 {
   error_yearemployment = '';
   $('#error_yearemployment').text(error_yearemployment);
   $('#yearofemployment').removeClass('has-error');
 }

 if($.trim($('#salary').val()).length == 0)
 {
   error_monthlysalary = 'Salary is required';
   $('#error_monthlysalary').text(error_monthlysalary);
   $('#salary').addClass('has-error');
 }
 else 
 {
   error_monthlysalary = '';
   $('#error_monthlysalary').text(error_monthlysalary);
   $('#salary').removeClass('has-error');
 }

 if($.trim($('#naturebusines').val()).length == 0)
 {
   error_natureofbusiness = 'Nature of business is required';
   $('#error_natureofbusiness').text(error_natureofbusiness);
   $('#naturebusines').addClass('has-error');
 }
 else 
 {
   error_natureofbusiness = '';
   $('#error_natureofbusiness').text(error_natureofbusiness);
   $('#naturebusines').removeClass('has-error');
 }

 if($.trim($('#placeofnusines').val()).length == 0)
 {
   error_placeofbusiness = 'Place of business is required';
   $('#error_placeofbusiness').text(error_placeofbusiness);
   $('#placeofnusines').addClass('has-error');
 }
 else 
 {
   error_placeofbusiness = '';
   $('#error_placeofbusiness').text(error_placeofbusiness);
   $('#placeofnusines').removeClass('has-error');
 }

 if($.trim($('#yearstarted').val()).length == 0)
 {
   error_yearstarted = 'Year is required';
   $('#error_yearstarted').text(error_yearstarted);
   $('#yearstarted').addClass('has-error');
 }
 else 
 {
   error_yearstarted = '';
   $('#error_yearstarted').text(error_yearstarted);
   $('#yearstarted').removeClass('has-error');
 }

 if($.trim($('#monthlyincome').val()).length == 0)
 {
   error_monthlyincome = 'Income is required';
   $('#error_monthlyincome').text(error_monthlyincome);
   $('#monthlyincome').addClass('has-error');
 }
 else 
 {
   error_monthlyincome = '';
   $('#error_monthlyincome').text(error_monthlyincome);
   $('#monthlyincome').removeClass('has-error');
 }

 if($.trim($('#jobdescriptionOFW').val()).length == 0)
 {
   error_jobdes = 'job Description is required';
   $('#error_jobdes').text(error_jobdes);
   $('#jobdescriptionOFW').addClass('has-error');
 }
 else 
 {
   error_jobdes = '';
   $('#error_jobdes').text(error_jobdes);
   $('#jobdescriptionOFW').removeClass('has-error');
 }

 if($.trim($('#natureofworkOFW').val()).length == 0)
 {
   error_natureofword = 'Nature of work is required';
   $('#error_natureofword').text(error_natureofword);
   $('#natureofworkOFW').addClass('has-error');
 }
 else 
 {
   error_natureofword = '';
   $('#error_natureofword').text(error_natureofword);
   $('#natureofworkOFW').removeClass('has-error');
 }

 if($.trim($('#yearofemploymentOFW').val()).length == 0)
 {
   error_ofwyear = 'Year is required';
   $('#error_ofwyear').text(error_ofwyear);
   $('#yearofemploymentOFW').addClass('has-error');
 }
 else 
 {
   error_ofwyear = '';
   $('#error_ofwyear').text(error_ofwyear);
   $('#yearofemploymentOFW').removeClass('has-error');
 }

 if($.trim($('#monthlyincomeOFW').val()).length == 0)
 {
   error_salaryofw = 'Income is required';
   $('#error_salaryofw').text(error_salaryofw);
   $('#monthlyincomeOFW').addClass('has-error');
 }
 else 
 {
   error_salaryofw = '';
   $('#error_salaryofw').text(error_salaryofw);
   $('#monthlyincomeOFW').removeClass('has-error');
 }
 
 if(error_companyname != '' || error_position !='' || error_yearemployment !='' || error_monthlysalary !='' || error_natureofbusiness !='' || error_placeofbusiness !='' || error_yearstarted !='' || error_monthlyincome !='' || error_jobdes !='' || error_natureofword !='' || error_ofwyear !='' || error_salaryofw !='')
 {
   return false;
 }
 else
 {
   $('#list_contact_details').removeClass('active active_tab1');
   $('#list_contact_details').removeAttr('href data-toggle');
   $('#contact_details').removeClass('active');
   $('#list_contact_details').addClass('inactive_tab1');
   $('#list_other').removeClass('inactive_tab1');
   $('#list_other').addClass('active_tab1 active');
   $('#list_other').attr('href', '#other_details');
   $('#list_other').attr('data-toggle', 'tab');
   $('#other_details').addClass('active in');
   //swal("Employement is Done","60%","success");
 }
});
 
 $('#previous_btn_other').click(function(){
  $('#list_other').removeClass('active active_tab1');
  $('#list_other').removeAttr('href data-toggle');
  $('#other_details').removeClass('active in');
  $('#list_other').addClass('inactive_tab1');
  $('#list_contact_details').removeClass('inactive_tab1');
  $('#list_contact_details').addClass('active_tab1 active');
  $('#list_contact_details').attr('href', '#contact_details');
  $('#list_contact_details').attr('data-toggle', 'tab');
  $('#contact_details').addClass('active in');
});

 $('#btn_other_next').click(function(){

  if($.trim($('#lengthoftime').val()).length == 0)
  {
   error_lenght = 'Length of Time is required';
   $('#error_lenght').text(error_lenght);
   $('#lengthoftime').addClass('has-error');
 }
 else
 {
   error_lenght = '';
   $('#error_lenght').text(error_lenght);
   $('#lengthoftime').removeClass('has-error');
 }
 
 if($.trim($('#reasondelay').val()).length == 0)
 {
   error_delay = 'Reason of Delay is required';
   $('#error_delay').text(error_delay);
   $('#reasondelay').addClass('has-error');
 }
 else
 {
   error_delay = '';
   $('#error_delay').text(error_delay);
   $('#reasondelay').removeClass('has-error');
 }

 if($.trim($('#factores').val()).length == 0)
 {
   error_factors = 'Factores is required';
   $('#error_factors').text(error_factors);
   $('#factores').addClass('has-error');
 }
 else
 {
   error_factors = '';
   $('#error_factors').text(error_factors);
   $('#factores').removeClass('has-error');
 }

 if($.trim($('#employmentstat').val()).length == 0)
 {
   error_employment = 'Employment Status is required';
   $('#error_employment').text(error_employment);
   $('#employmentstat').addClass('has-error');
 }
 else
 {
   error_employment = '';
   $('#error_employment').text(error_employment);
   $('#employmentstat').removeClass('has-error');
 }

 if($.trim($('#relevance').val()).length == 0)
 {
   error_relevance = 'Relevance is required';
   $('#error_relevance').text(error_relevance);
   $('#relevance').addClass('has-error');
 }
 else
 {
   error_relevance = '';
   $('#error_relevance').text(error_relevance);
   $('#relevance').removeClass('has-error');
 }

 if($.trim($('#skills').val()).length == 0)
 {
   error_competencies = 'Competencies is required';
   $('#error_competencies').text(error_competencies);
   $('#skills').addClass('has-error');
 }
 else
 {
   error_competencies = '';
   $('#error_competencies').text(error_competencies);
   $('#skills').removeClass('has-error');
 }
 if($.trim($('#work').val()).length == 0)
 {
   error_work = 'Job is required';
   $('#error_work').text(error_work);
   $('#work').addClass('has-error');
 }
 else
 {
   error_work = '';
   $('#error_work').text(error_work);
   $('#work').removeClass('has-error');
 }
 
 if(error_lenght != '' || error_delay !='' || error_factors !='' || error_factors !='' || error_employment !='' || error_relevance !='' || error_competencies !='' || error_work !='')
 {
   return false;
 }
 else
 {
   $('#list_other').removeClass('active active_tab1');
   $('#list_other').removeAttr('href data-toggle');
   $('#other_details').removeClass('active');
   $('#list_other').addClass('inactive_tab1');
   $('#list_assess').removeClass('inactive_tab1');
   $('#list_assess').addClass('active_tab1 active');
   $('#list_assess').attr('href', '#assed_details');
   $('#list_assess').attr('data-toggle', 'tab');
   $('#assed_details').addClass('active in');
   //swal("Under Employement is Done Last One to Finish The Survey :)","80%","success");
 }
});

 $('#previous_btn_asses').click(function(){
  $('#list_assess').removeClass('active active_tab1');
  $('#list_assess').removeAttr('href data-toggle');
  $('#assed_details').removeClass('active in');
  $('#list_assess').addClass('inactive_tab1');
  $('#list_other').removeClass('inactive_tab1');
  $('#list_other').addClass('active_tab1 active');
  $('#list_other').attr('href', '#other_details');
  $('#list_other').attr('data-toggle', 'tab');
  $('#other_details').addClass('active in');
});

 $('#btn_contact_details').click(function(){
  var error_address = '';
  var error_mobile_no = '';
  var mobile_validation = /^\d{10}$/;

  if($.trim($('#cccontent').val()).length == 0)
  {
   error_curriculum = 'Curriculum is required';
   $('#error_curriculum').text(error_curriculum);
   $('#cccontent').addClass('has-error');
 }
 else
 {
   error_curriculum = '';
   $('#error_curriculum').text(error_curriculum);
   $('#cccontent').removeClass('has-error');
 }

 if($.trim($('#minstruction').val()).length == 0)
 {
   error_methods = 'Methods is required';
   $('#error_methods').text(error_methods);
   $('#minstruction').addClass('has-error');
 }
 else
 {
   error_methods = '';
   $('#error_methods').text(error_methods);
   $('#minstruction').removeClass('has-error');
 }

 if($.trim($('#faculty').val()).length == 0)
 {
   error_faculty = 'Faculty is required';
   $('#error_faculty').text(error_faculty);
   $('#faculty').addClass('has-error');
 }
 else
 {
   error_faculty = '';
   $('#error_faculty').text(error_faculty);
   $('#faculty').removeClass('has-error');
 }

 if($.trim($('#library').val()).length == 0)
 {
   error_library = 'Library is required';
   $('#error_library').text(error_library);
   $('#library').addClass('has-error');
 }
 else
 {
   error_library = '';
   $('#error_faculty').text(error_library);
   $('#library').removeClass('has-error');
 }

 if($.trim($('#laboratory').val()).length == 0)
 {
   error_laboratories = 'laboratory is required';
   $('#error_laboratories').text(error_laboratories);
   $('#laboratory').addClass('has-error');
 }
 else
 {
   error_laboratories = '';
   $('#error_laboratories').text(error_laboratories);
   $('#laboratory').removeClass('has-error');
 }

 if($.trim($('#physical').val()).length == 0)
 {
   error_plant = 'Required';
   $('#error_plant').text(error_plant);
   $('#physical').addClass('has-error');
 }
 else
 {
   error_plant = '';
   $('#error_plant').text(error_plant);
   $('#physical').removeClass('has-error');
 }

 if($.trim($('#cguidance').val()).length == 0)
 {
   error_carreer = 'Required';
   $('#error_carreer').text(error_carreer);
   $('#cguidance').addClass('has-error');
 }
 else
 {
   error_carreer = '';
   $('#error_carreer').text(error_carreer);
   $('#cguidance').removeClass('has-error');
 }

 if($.trim($('#hdormitoris').val()).length == 0)
 {
   error_housing = 'Required';
   $('#error_housing').text(error_housing);
   $('#hdormitoris').addClass('has-error');
 }
 else
 {
   error_housing = '';
   $('#error_housing').text(error_housing);
   $('#hdormitoris').removeClass('has-error');
 }

 if($.trim($('#jplacement').val()).length == 0)
 {
   error_job = 'Required';
   $('#error_job').text(error_job);
   $('#jplacement').addClass('has-error');
 }
 else
 {
   error_job = '';
   $('#error_job').text(error_job);
   $('#jplacement').removeClass('has-error');
 }

 if($.trim($('#acounceling').val()).length == 0)
 {
   error_academic = 'Required';
   $('#error_academic').text(error_academic);
   $('#acounceling').addClass('has-error');
 }
 else
 {
   error_academic = '';
   $('#error_academic').text(error_academic);
   $('#acounceling').removeClass('has-error');
 }

 if($.trim($('#rsearch').val()).length == 0)
 {
   error_research = 'Required';
   $('#error_research').text(error_research);
   $('#rsearch').addClass('has-error');
 }
 else
 {
   error_research = '';
   $('#error_research').text(error_research);
   $('#rsearch').removeClass('has-error');
 }

 if($.trim($('#xservices').val()).length == 0)
 {
   error_services = 'Required';
   $('#error_services').text(error_services);
   $('#xservices').addClass('has-error');
 }
 else
 {
   error_services = '';
   $('#error_services').text(error_services);
   $('#xservices').removeClass('has-error');
 }

 if($.trim($('#gadministration').val()).length == 0)
 {
   error_administration = 'Required';
   $('#error_administration').text(error_administration);
   $('#gadministration').addClass('has-error');
 }
 else
 {
   error_administration = '';
   $('#error_administration').text(error_administration);
   $('#gadministration').removeClass('has-error');
 }
 
 if(error_curriculum != '' || error_methods !='' || error_faculty !='' || error_laboratories !='' || error_job !='' || error_administration !='' || error_services !='' || error_research !='' || error_carreer !='' || error_housing !='' || error_plant !='' || error_delay !='' || error_employment !='' || error_plant !='')
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
  function populate(institution,program){
   var institution = document.getElementById(institution);
   var program = document.getElementById(program);
   program.innerHTML = "";
   if (institution.value == "ITE") {
    var optionArray = ["|","BSE - Major in Mathematics|BSE - Major in Mathematics","BSE Elementary Education|BSE Elementary Education","BSE - Major in Physical Science|BSE - Major in Physical Science","BSE - Major in English|BSE - Major in English"];
  }
  else if (institution.value == "CBM") {
    var optionArray = ["|","BSBA|BSBA","BSHRM|BHRM","BS Entrep|BS Entrep"];
  }
  else if (institution.value == "CCIT") {
    var optionArray = ["|","BSIT|BSIT","MIT|MIT","BSCS|BSCS"];
  }
  else if (institution.value == "SAC") {
    var optionArray = ["|","AB English|AB English","BS Criminology|BS Criminology","AB Legal Management|AB Legal Management","AB Pol Sci|AB Pol Sci"];
  }
  else if (institution.value == "IAT") {
    var optionArray = ["|","BAT|BAT","DAT|DAT"];
  }
  else if (institution.value == "PS") {
    var optionArray = ["|","BS Automotive|BS Automotive","Mechanical Technology|Mechanical Technology","Automotive Technology|Automotive Technology","Electronics Technology|Electronics Technology","Electrical Technology|Electrical Technology","Assoc in Aircraft Maintenance Tech|Assoc in Aircraft Maintenance Tech","BS Electronics|BS Electronics"];
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    program.options.add(newOption);
  }
}
</script>
<script>
  function myFunction3() {
    
    var checkBox = document.getElementById("yesCheck");

    var cname = document.getElementById("honor");

    if (checkBox.checked == true){
      cname.style.backgroundColor = "white";
      cname.readOnly=true;
      
    } else if(checkBox.checked == false) {
     cname.style.backgroundColor = "#acadaf";

   }
 }
</script>
<script>
  function myFunction4() {
    
    var checkBox = document.getElementById("yesNo");

    var cname = document.getElementById("honor");

    if (checkBox.checked == true){
      cname.style.backgroundColor = "#acadaf";
      cname.readOnly=true;
      
    } else if(checkBox.checked == false) {
     cname.style.backgroundColor = "white";
     
   }
 }
</script>
<script>
  function myFunction7() {
    var checkBox = document.getElementById("UnEmployed");

    var selfs = document.getElementById("self");
    var ofw = document.getElementById("ofw");
    var Employed = document.getElementById("Employed");

    
    if (checkBox.checked == true){
      selfs.disabled=true;
      ofw.disabled=true;
      Employed.disabled=true;

    } else if(checkBox.checked == false) {
      selfs.disabled=false;
      ofw.disabled=false;
      Employed.disabled=false;
    }

    Addvalue();
  }
</script>
<script>
  function Addvalue(){
    var cname = document.getElementById('cname');
    var position = document.getElementById('position');
    var yearofemployment = document.getElementById('yearofemployment');
    var mothlysalary = document.getElementById('salary');

    var naturebusines = document.getElementById('naturebusines');
    var placeofnusines = document.getElementById('placeofnusines');
    var yearstarted = document.getElementById('yearstarted');
    var monthlyincome = document.getElementById('monthlyincome');

    var jobdescriptionOFW = document.getElementById('jobdescriptionOFW');
    var natureofworkOFW = document.getElementById('natureofworkOFW');
    var yearofemploymentOFW = document.getElementById('yearofemploymentOFW');
    var monthlyincomeOFW = document.getElementById('monthlyincomeOFW');

    cname.value = "Company Name";
    position.value = "Company Position";
    yearofemployment.value = "Year of Employment";
    mothlysalary.value = "Monthly Salary";

    naturebusines.value = "Nature of Business";
    placeofnusines.value = "Place of your Business";
    yearstarted.value = "Year Started";
    monthlyincome.value = "Monthly Income";
    
    jobdescriptionOFW.value = "Job Description";
    natureofworkOFW.value = "Nature of Work";
    yearofemploymentOFW.value = "Year Employment";
    monthlyincomeOFW.value = "Monthly Income";

  }
</script>
<script>
  function myFunction() {
    
    var checkBox = document.getElementById("Employed");

    var cname = document.getElementById("cname");
    var position = document.getElementById("position");
    var year = document.getElementById("yearofemployment");
    var salary = document.getElementById("salary");
    var jobawards = document.getElementById("jobawards1");
    var selfs = document.getElementById("self");
    var ofw = document.getElementById("ofw");
    var UnEmployed = document.getElementById("UnEmployed");

    
    if (checkBox.checked == true){
      cname.style.backgroundColor = "white";
      position.style.backgroundColor = "white";
      year.style.backgroundColor = "white";
      salary.style.backgroundColor = "white";
      jobawards.style.backgroundColor = "white";
      selfs.disabled=true;
      ofw.disabled=true;
      UnEmployed.disabled=true;

    } else if(checkBox.checked == false) {
     cname.style.backgroundColor = "#acadaf";
     position.style.backgroundColor = "#acadaf";
     year.style.backgroundColor = "#acadaf";
     salary.style.backgroundColor = "#acadaf";
     jobawards.style.backgroundColor = "#acadaf";
     work.style.backgroundColor = "#acadaf";
     selfs.disabled=false;
     ofw.disabled=false;
     UnEmployed.disabled=false;
   }
   AddValue1();
   Erasevalue2();
 }
</script>
<script>
  function AddValue1(){
    var naturebusines = document.getElementById('naturebusines');
    var placeofnusines = document.getElementById('placeofnusines');
    var yearstarted = document.getElementById('yearstarted');
    var monthlyincome = document.getElementById('monthlyincome');

    var jobdescriptionOFW = document.getElementById('jobdescriptionOFW');
    var natureofworkOFW = document.getElementById('natureofworkOFW');
    var yearofemploymentOFW = document.getElementById('yearofemploymentOFW');
    var monthlyincomeOFW = document.getElementById('monthlyincomeOFW');

    naturebusines.value = "Nature of Business";
    placeofnusines.value = "Place of your Business";
    yearstarted.value = "Year Started";
    monthlyincome.value = "Monthly Income";
    
    jobdescriptionOFW.value = "Job Description";
    natureofworkOFW.value = "Nature of Work";
    yearofemploymentOFW.value = "Year Employment";
    monthlyincomeOFW.value = "Monthly Income";


  }
</script>
<script>
  function Erasevalue2(){
   var cname = document.getElementById('cname');
   var position = document.getElementById('position');
   var yearofemployment = document.getElementById('yearofemployment');
   var mothlysalary = document.getElementById('salary');

   cname.value = "";
   position.value = "";
   yearofemployment.value = "";
   mothlysalary.value = "";
 }
</script>
<script>
  function myFunction1() {
   
    var checkBox = document.getElementById("self");
    var jobawards = document.getElementById("jobawards2");
    var cname = document.getElementById("naturebusines");
    var position = document.getElementById("placeofnusines");
    var year = document.getElementById("yearstarted");
    var salary = document.getElementById("monthlyincome");
    var ofw = document.getElementById("ofw");
    var UnEmployed = document.getElementById("UnEmployed");
    var Employed = document.getElementById("Employed");

    
    if (checkBox.checked == true){
      cname.style.backgroundColor = "white";
      position.style.backgroundColor = "white";
      year.style.backgroundColor = "white";
      salary.style.backgroundColor = "white";
      jobawards.style.backgroundColor = "white";
      Employed.disabled=true;
      ofw.disabled=true;
      UnEmployed.disabled=true;
    } else if(checkBox.checked == false) {
     cname.style.backgroundColor = "#acadaf";
     position.style.backgroundColor = "#acadaf";
     year.style.backgroundColor = "#acadaf";
     salary.style.backgroundColor = "#acadaf";
     jobawards.style.backgroundColor = "#acadaf";
     Employed.disabled=false;
     ofw.disabled=false;
     UnEmployed.disabled=false;
   }
   Addvalue2();
   Erasevalue1();
 }
</script>
<script>
  function Addvalue2(){
    var cname = document.getElementById('cname');
    var position = document.getElementById('position');
    var yearofemployment = document.getElementById('yearofemployment');
    var mothlysalary = document.getElementById('salary');
    var jobdescriptionOFW = document.getElementById('jobdescriptionOFW');
    var natureofworkOFW = document.getElementById('natureofworkOFW');
    var yearofemploymentOFW = document.getElementById('yearofemploymentOFW');
    var monthlyincomeOFW = document.getElementById('monthlyincomeOFW');

    cname.value = "Company Name";
    position.value = "Company Position";
    yearofemployment.value = "Year of Employment";
    mothlysalary.value = "Monthly Salary";
    
    jobdescriptionOFW.value = "Job Description";
    natureofworkOFW.value = "Nature of Work";
    yearofemploymentOFW.value = "Year Employment";
    monthlyincomeOFW.value = "Monthly Income";
  }
</script>
<script>
  function Erasevalue1(){
   var naturebusines = document.getElementById('naturebusines');
   var placeofnusines = document.getElementById('placeofnusines');
   var yearstarted = document.getElementById('yearstarted');
   var monthlyincome = document.getElementById('monthlyincome');

   naturebusines.value = "";
   placeofnusines.value = "";
   yearstarted.value = "";
   monthlyincome.value = "";
 }
</script>
<script>
  function myFunction2() {
    var jobawards = document.getElementById("jobawards3");
    
    var checkBox = document.getElementById("ofw");
    var cname = document.getElementById("jobdescriptionOFW");
    var position = document.getElementById("natureofworkOFW");
    var year = document.getElementById("yearofemploymentOFW");
    var salary = document.getElementById("monthlyincomeOFW");
    var self = document.getElementById("self");
    var UnEmployed = document.getElementById("UnEmployed");
    var Employed = document.getElementById("Employed");

    
    if (checkBox.checked == true){
      cname.style.backgroundColor = "white";
      position.style.backgroundColor = "white";
      year.style.backgroundColor = "white";
      jobawards.style.backgroundColor = "white";
      salary.style.backgroundColor = "white";
      self.disabled=true;
      UnEmployed.disabled=true;
      Employed.disabled=true;
    } else if(checkBox.checked == false) {
     cname.style.backgroundColor = "#acadaf";
     position.style.backgroundColor = "#acadaf";
     year.style.backgroundColor = "#acadaf";
     salary.style.backgroundColor = "#acadaf";
     jobawards.style.backgroundColor = "#acadaf";
     self.disabled=false;
     UnEmployed.disabled=false;
     Employed.disabled=false;
   }
   EraseValue();
   Addvalue3();
 }

</script>
<script>
  function Addvalue3(){
    var cname = document.getElementById('cname');
    var position = document.getElementById('position');
    var yearofemployment = document.getElementById('yearofemployment');
    var mothlysalary = document.getElementById('salary');

    var naturebusines = document.getElementById('naturebusines');
    var placeofnusines = document.getElementById('placeofnusines');
    var yearstarted = document.getElementById('yearstarted');
    var monthlyincome = document.getElementById('monthlyincome');

    cname.value = "Company Name";
    position.value = "Company Position";
    yearofemployment.value = "Year of Employment";
    mothlysalary.value = "Monthly Salary";

    naturebusines.value = "Nature of Business";
    placeofnusines.value = "Place of your Business";
    yearstarted.value = "Year Started";
    monthlyincome.value = "Monthly Income";
    
  }
</script>
<script>
  function EraseValue(){
   var jobdescriptionOFW = document.getElementById('jobdescriptionOFW');
   var natureofworkOFW = document.getElementById('natureofworkOFW');
   var yearofemploymentOFW = document.getElementById('yearofemploymentOFW');
   var monthlyincomeOFW = document.getElementById('monthlyincomeOFW');

   jobdescriptionOFW.value = "";
   natureofworkOFW.value = "";
   yearofemploymentOFW.value = "";
   monthlyincomeOFW.value = "";

 }
</script>
<script>
  document.getElementById('Employed').onchange = function() {
    if(this.checked==true){
      document.getElementById("cname").readOnly=false;
      document.getElementById("cname").focus();
      document.getElementById("position").readOnly=false;
      document.getElementById("position").focus();
      document.getElementById("yearofemployment").readOnly=false;
      document.getElementById("yearofemployment").focus();
      document.getElementById("salary").readOnly=false;
      document.getElementById("salary").focus();
      document.getElementById("jobawards1").readOnly=false;
      document.getElementById("jobawards1").focus();
    }
    else{
      document.getElementById("cname").readOnly=true;
      document.getElementById("position").readOnly = true;
      document.getElementById("yearofemployment").readOnly = true;
      document.getElementById("salary").readOnly = true;
      document.getElementById("jobawards1").readOnly = true;
    }
  };
</script>
<script>
  document.getElementById("cname").readOnly = true;
  document.getElementById("position").readOnly= true;
  document.getElementById("yearofemployment").readOnly = true;
  document.getElementById("salary").readOnly = true;
  document.getElementById("jobawards1").readOnly = true;
</script>
<script>
  document.getElementById('self').onchange = function() {
    if(this.checked==true){
      document.getElementById("naturebusines").readOnly=false;
      document.getElementById("naturebusines").focus();
      document.getElementById("placeofnusines").readOnly=false;
      document.getElementById("placeofnusines").focus();
      document.getElementById("yearstarted").readOnly=false;
      document.getElementById("yearstarted").focus();
      document.getElementById("monthlyincome").readOnly=false;
      document.getElementById("monthlyincome").focus();
      document.getElementById("jobawards2").readOnly=false;
      document.getElementById("jobawards2").focus();
    }
    else{
      document.getElementById("naturebusines").readOnly = true;
      document.getElementById("placeofnusines").readOnly = true;
      document.getElementById("yearstarted").readOnly = true;
      document.getElementById("monthlyincome").readOnly = true;
      document.getElementById("jobawards2").readOnly = true;
    }
  };
</script>
<script>
  document.getElementById("naturebusines").readOnly = true;
  document.getElementById("placeofnusines").readOnly = true;
  document.getElementById("yearstarted").readOnly = true;
  document.getElementById("monthlyincome").readOnly = true;
  document.getElementById("jobawards2").readOnly = true;
</script>
<script>
  document.getElementById('ofw').onchange = function() {
    if(this.checked==true){
      document.getElementById("jobdescriptionOFW").readOnly=false;
      document.getElementById("jobdescriptionOFW").focus();
      document.getElementById("natureofworkOFW").readOnly=false;
      document.getElementById("natureofworkOFW").focus();
      document.getElementById("yearofemploymentOFW").readOnly=false;
      document.getElementById("yearofemploymentOFW").focus();
      document.getElementById("monthlyincomeOFW").readOnly=false;
      document.getElementById("monthlyincomeOFW").focus();
      document.getElementById("jobawards3").readOnly=false;
      document.getElementById("jobawards3").focus();
    }
    else{
      document.getElementById("jobdescriptionOFW").readOnly=true;
      document.getElementById("natureofworkOFW").readOnly = true;
      document.getElementById("yearofemploymentOFW").readOnly = true;
      document.getElementById("monthlyincomeOFW").readOnly = true;
      document.getElementById("jobawards3").readOnly= true;
    }
  };
</script>
<script>
  document.getElementById("jobdescriptionOFW").readOnly=true;
  document.getElementById("natureofworkOFW").readOnly= true;
  document.getElementById("yearofemploymentOFW").readOnly = true;
  document.getElementById("monthlyincomeOFW").readOnly = true;
  document.getElementById("jobawards3").readOnly= true;
</script>
<script>
  document.getElementById('yesCheck').onchange = function() {
    if(this.checked==true){
      document.getElementById("honor").readOnly=false;
      document.getElementById("honor").focus();
    }
    else{
      document.getElementById("honor").readOnly=true;
    }
  };
</script>
<script>
  document.getElementById("honor").readOnly=true;
</script>
</script>
<script>
  function toggleAlert3() {
    toggleDisabled(document.getElementById("inputdiv"));
  }
  function toggleDisabled3(el) {
    try {
      el.disabled = el.disabled ? false : true;
    }
    catch(E){
    }
    if (el.childNodes && el.childNodes.length > 0) {
      for (var x = 0; x < el.childNodes.length; x++) {
        toggleDisabled(el.childNodes[x]);
      }
    }
  }
</script>
<script>
  function toggleAlert() {
    toggleDisabled(document.getElementById("content"));
  }
  function toggleDisabled(el) {
    try {
      el.disabled = el.disabled ? false : true;
    }
    catch(E){
    }
    if (el.childNodes && el.childNodes.length > 0) {
      for (var x = 0; x < el.childNodes.length; x++) {
        toggleDisabled(el.childNodes[x]);
      }
    }
  }
</script>
<script>
  function toggleAlert1() {
    toggleDisabled(document.getElementById("contentself"));
  }
  function toggleDisabled1(el) {
    try {
      el.style.color = el.style.color ? '#acadaf' : 'white';
    }
    catch(E){
    }
    if (el.childNodes && el.childNodes.length > 0) {
      for (var x = 0; x < el.childNodes.length; x++) {
        toggleDisabled(el.childNodes[x]);
      }
    }
  }
</script>
<script>
  function toggleAlert2() {
    toggleDisabled(document.getElementById("contentofw"));
  }
  function toggleDisabled2(el) {
    try {
      el.disabled = el.disabled ? false : true;
    }
    catch(E){
    }
    if (el.childNodes && el.childNodes.length > 0) {
      for (var x = 0; x < el.childNodes.length; x++) {
        toggleDisabled(el.childNodes[x]);
      }
    }
  }
</script>

<script>
  $('#reasondelay').change(function() {
    if( $(this).val() == 1) {
      $('#reasonother').prop( "disabled", false );
    } else {       
      $('#reasonother').prop( "disabled", true );
    }
  });
</script>
<script>
  $('#factores').change(function() {
    if( $(this).val() == 1) {
      $('#factorsonother').prop( "disabled", false );
    } else {       
      $('#factorsonother').prop( "disabled", true );
    }
  });
</script>
<script>
  $('#employmentstat').change(function() {
    if( $(this).val() == 1) {
      $('#employmentstats').prop( "disabled", false );
    } else {       
      $('#employmentstats').prop( "disabled", true );
    }
  });
</script>
<script>
  $('#monthlysalary').change(function() {
    if( $(this).val() == 1) {
      $('#monthlysalarys').prop( "disabled", false );
    } else {       
      $('#monthlysalarys').prop( "disabled", true );
    }
  });
</script>
<script>
  $('#skills').change(function() {
    if( $(this).val() == 1) {
      $('#skillss').prop( "disabled", false );
    } else {       
      $('#skillss').prop( "disabled", true );
    }
  });
</script>
<script>
	var inc=0;
  function CountFun(){
    inc=inc+1;
    alert(inc);  
  }
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