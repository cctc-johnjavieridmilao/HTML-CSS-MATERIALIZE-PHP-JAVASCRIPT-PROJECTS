<?php 
$errors = "";
include 'helper/function.php';
 include 'functionusercontent.php';
$uname = $_SESSION['Unaname'];
include 'connection/mysqliconn.php';
$query = "SELECT * FROM alumni_records WHERE fname = '$uname'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_array($res);

if (empty($row['fname'])) {
    //$_SESSION['nodata'] = "nodata";
    //header("Location:user_records.php");
   $errors = "No Records Found"; 

}
else{
    //echo "<script>swal('Welcome');</script>";
}
$dateOfBirth = $row['birthdate'];
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
//$birthdate = $row['birthdate'];
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$address = $row['address'];
$email = $row['email'];
$cpnumber = $row['cpnumber'];
$gender = $row['gender'];
$age = $diff->format('%y'); 
$birthdate = $row['birthdate'];
$maritalStatus = $row['maritalstatus'];
$degree = $row['degree'];
$degreearned = $row['degreeearned'];
$Institution = $row['institution'];
$program = $row['program'];
$yearGraduated = $row['yeargraduted']; 
$eligibility = $row['eligibility'];
$honor = $row['honor'];
$employed = $row['employed'];
$timelooking = $row['timelookingjob'];
$delayofEmployment = $row['delayofemployment'];
$factores = $row['factores'];
$Emstatus = $row['employmentstatus'];
$relevance = $row['relevance'];
$Skills = $row['skills'];
$work = $row['work'];
$Salarys = $row['salary'];


if (substr($dateOfBirth, -5) === date_create()->format('m-d')) {
    echo "<script>alert('Happy Birthdate ".$fname."');</script>";
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
#nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
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
        <strong style="color: yellow;">My Records</strong>
    </h5>
              <?php
               if (empty($fname)) {
                 ?>
                  <div class="alert alert-default" style="text-align: center;font-size: 25px;" role="alert">No Records Found</div>
                 <?php
                } 
                else{
                  ?>
                  <?php include 'userdataupdate.php'; echo $alert; ?>

                  <div class="card-body">
                    <form method="POST">
    <div class="form-row">
       <div class="form-group col-md-6">
      <label>FirstName</label>
             <input type="text" class="form-control" id="fname" name="fname" value="<?php if(empty($fname)){echo 'No Data';} else{echo $fname;} ?>" readonly>
        </div>
         <div class="form-group col-md-6">
      <label>MiddleName</label>
             <input type="text" class="form-control" id="mname" name="mname" value="<?php if(empty($mname)){echo 'No Data';} else{echo $mname;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>LastName</label>
             <input type="text" class="form-control" id="lname" name="lname" value="<?php if(empty($lname)){echo 'No Data';} else{echo $lname;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>Address</label>
             <input type="text" class="form-control" id="address" name="address" value="<?php if(empty($address)){echo 'No Data';} else{echo $address;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Email</label>
             <input type="email" class="form-control" id="email" name="email" value="<?php if(empty($email)){echo 'No Data';} else{echo $email;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Cp Number</label>
             <input type="text" class="form-control" id="cpnumber" name="cpnumber" value="<?php if(empty($cpnumber)){echo 'No Data';} else{echo $cpnumber;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Gender</label>
             <input type="text" class="form-control" id="gender" name="gender" value="<?php if(empty($gender)){echo 'No Data';} else{echo $gender;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>Age</label>
             <input type="number" class="form-control" id="age" name="age" readonly value="<?php if(empty($age)){echo 'No Data';} else{echo $age;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Birthdate</label>
             <input type="date" class="form-control" id="bdate" name="bdate" value="<?php if(empty($birthdate)){echo 'No Data';} else{echo $birthdate;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>Marital Status</label>
             <select class="form-control" id="status" name="status">
                 <option value="Divorced"
                    <?php
                    if ($maritalStatus == 'Divorced') {
                       echo "selected";
                    }
                    ?>
                 >Divorced</option>
                  <option value="Married"
                    <?php
                    if ($maritalStatus == 'Married') {
                       echo "selected";
                    }
                    ?>
                 >Married</option>
                 <option value="Separated"
                    <?php
                    if ($maritalStatus == 'Separated') {
                       echo "selected";
                    }
                    ?>
                 >Separated</option>
                 <option value="Single"
                    <?php
                    if ($maritalStatus == 'Single') {
                       echo "selected";
                    }
                    ?>
                 >Single</option>
                 <option value="Windowed"
                    <?php
                    if ($maritalStatus == 'Windowed') {
                       echo "selected";
                    }
                    ?>
                 >Windowed</option>
             </select>
             </div>
        <div class="form-group col-md-6">
      <label>Degree</label>
             <input type="text" class="form-control" id="degree" name="degree" value="<?php if(empty($degree)){echo 'No Data';} else{echo $degree;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>Degree Earned</label>
             <input type="text" class="form-control" id="degreeerned" name="degreeerned" value="<?php if(empty($degreearned)){echo 'No Data';} else{echo $degreearned;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Institution</label>
             <input type="text" class="form-control" id="institution" name="institution" value="<?php if(empty($Institution)){echo 'No Data';} else{echo $Institution;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>Program</label>
             <input type="text" class="form-control" id="program" name="program" value="<?php if(empty($program)){echo 'No Data';} else{echo $program;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>Year Graduated</label>
             <input type="text" class="form-control" id="yeargraduted" name="yeargraduted" value="<?php if(empty($yearGraduated)){echo 'No Data';} else{echo $yearGraduated;} ?>" readonly>
        </div>
        <div class="form-group col-md-6">
      <label>Eligibility</label>
             <input type="text" class="form-control" id="eligibility" name="eligibility" value="<?php if(empty($eligibility)){echo 'No Data';} else{echo $eligibility;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Honor/Awards</label>
             <input type="text" class="form-control" id="honor" name="honor" value="<?php if(empty($honor)){echo 'No Data';} else{echo $honor;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Employment Status</label>
            <select class="form-control" id="employment" name="employment">
                <option value="Employed"
                   <?php
                     if ($Emstatus == 'Employed') {
                         echo "selected";
                     }
                    ?>
                >Employed</option>
                <option value="Self Employed"
                   <?php
                     if ($Emstatus == 'Self Employed') {
                         echo "selected";
                     }
                    ?>
                >Self Employed</option>
                 <option value="Ofw"
                   <?php
                     if ($Emstatus == 'Ofw') {
                         echo "selected";
                     }
                    ?>
                >Ofw</option>
                 <option value="UnEmployed"
                   <?php
                     if ($Emstatus == 'UnEmployed') {
                         echo "selected";
                     }
                    ?>
                >UnEmployed</option>
            </select>
        </div>
        <div class="form-group col-md-6">
      <label>Time Looking for A job</label>
             <input type="text" class="form-control" id="timelookinge" name="timelookinge" value="<?php if(empty($timelooking)){echo 'No Data';} else{echo $timelooking;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Delay of Employment</label>
             <input type="text" class="form-control" id="delayofemployment" name="delayofemployment" value="<?php if(empty($delayofEmployment)){echo 'No Data';} else{echo $delayofEmployment;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Factores</label>
             <input type="text" class="form-control" id="factores" name="factores" value="<?php if(empty($factores)){echo 'No Data';} else{echo $factores;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Relevance</label>
             <input type="text" class="form-control" id="relevance" name="relevance" value="<?php if(empty($relevance)){echo 'No Data';} else{echo $relevance;} ?>">
        </div>
        <div class="form-group col-md-6">
      <label>Skills</label>
             <input type="text" class="form-control" id="skills" name="skills" value="<?php if(empty($Skills)){echo 'No Data';} else{echo $Skills;} ?>">
        </div>
            <div class="form-group col-md-6">
            <label>Job</label>
             <input type="text" class="form-control" id="work" name="work" value="<?php if(empty($work)){echo 'No Data';} else{echo $work;} ?>">
            </div>
            <div class="form-group col-md-6">
            <label>Monthly Salary</label>
             <input type="number" class="form-control" id="salary" name="salarys" value="<?php if(empty($Salarys)){echo 'No Data';} else{echo $Salarys;} ?>">
            </div>
            <div class="form-group col-md-6">
              <br>
            <button type="submit" name="btn_update" class="btn btn-success btn-block"> <span class="fas fa-edit"> Update Records</span></button>
            </div>
          </div>
        </form>
                  </div>
             
              </div>
            </div>
                  <?php
                }
              
              
        ?>
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