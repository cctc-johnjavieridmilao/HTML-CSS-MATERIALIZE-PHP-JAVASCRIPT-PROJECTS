<?php
$update = true;
$message = "";
$alert = "";
include 'connection/mysqliconn.php';
$uname = $_SESSION['Unaname'];

if (isset($_POST['btn_update'])) {
$fname = $_POST['fname'];
$mname =   $_POST['mname'];
$lname =   $_POST['lname'];
$address =  $_POST['address'];
$email =   $_POST['email'];
$cpnumber =   $_POST['cpnumber'];
$gender =   $_POST['gender'];
$age =   $_POST['age'];
$birthdate =   $_POST['bdate'];
$maritalStatus =  $_POST['status'];
$degree =  $_POST['degree'];
$degreearned =   $_POST['degreeerned'];
$Institution =   $_POST['institution'];
$program =   $_POST['program'];
$yearGraduated =  $_POST['yeargraduted'];
$eligibility =  $_POST['eligibility'];
$honor =  $_POST['honor'];
$employed =  $_POST['employment'];
$timelooking =  $_POST['timelookinge'];
$delayofEmployment =  $_POST['delayofemployment'];
$factores =  $_POST['factores'];
$Emstatus =  $_POST['employment'];
$relevance =  $_POST['relevance'];
$Skills =  $_POST['skills'];
$work =  $_POST['work'];
$Salarys = $_POST['salarys'];

$query = "UPDATE alumni_records SET fname = '$fname',mname = '$mname',lname = '$lname',address = '$address',email = '$email',cpnumber = '$cpnumber',gender = '$gender',age = '$age',birthdate = '$birthdate',maritalstatus = '$maritalStatus',degree = '$degree',degreeearned = '$degreearned',institution = '$Institution',program = '$program',yeargraduted = '$yearGraduated',eligibility = '$eligibility',honor = '$honor',employed = '$employed',timelookingjob = '$timelooking',delayofemployment = '$delayofEmployment',factores = '$factores',employmentstatus = '$Emstatus',relevance = '$relevance',skills = '$Skills',work = '$work',salary = '$Salarys' WHERE fname = '$uname'";
     			mysqli_query($connect,$query);


     		 $alert = "<script>swal('Update Successfully','','success');</script>";
}
?>