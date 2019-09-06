<?php 
include 'helper/function.php';
include 'userdataupdate.php';
$uname = $_SESSION['Unaname'];
include 'connection/mysqliconn.php';
$query = "SELECT * FROM alumni_records WHERE fname = '$uname'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_array($res);

if (empty($row['fname'])) {
    $_SESSION['nodata'] = "nodata";
    header("Location:profile.php");
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
$Salary = $row['salary'];


if (substr($dateOfBirth, -5) === date_create()->format('m-d')) {
    echo "<script>alert('Happy Birthdate ".$fname."');</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Records of <?php echo $fname; ?></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="shortcut icon" href="img/alumniLogo.png">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="css/styling.css">
<link rel="stylesheet" type="text/css" href="js1/nprogress.css">

</head>
<style>
 #nprogress .bar {
  height:6px;
  background-color: white;
}
#nprogress .spinner-icon {
  border-top-color: white;
  border-left-color: white;
}
.form-control{
  border: 1px solid green;
  height: 43px;
}
	@media screen and (max-width: 786px){
		body{
			overflow-x: hidden;
		}
		input {
			max-width: 300px !important;
		}
	}
</style>
<body>
<header>
      <center><img class="image" src="img/graduate.png"><span><?php DisplayProfilename() ?></span></center>
    </header>
    <div class="fafa">
      <a href="profile.php" uk-tooltip="back to Home?"><i class="fas fa-angle-left"></a></i>
    </div>
<div class="container" style="margin-top: 45px;">
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
             <input type="text" class="form-control" id="salary" name="salary" value="<?php if(empty($Salary)){echo 'No Data';} else{echo $Salary;} ?>">
            </div>
    		<div class="form-group col-md-6" style="margin-top: 20px;">
    		<input type="submit" name="btn_update" class="btn btn-success btn-block" value="Update Records">
            </div>
		</div>
	</form>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="js1/nprogress.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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