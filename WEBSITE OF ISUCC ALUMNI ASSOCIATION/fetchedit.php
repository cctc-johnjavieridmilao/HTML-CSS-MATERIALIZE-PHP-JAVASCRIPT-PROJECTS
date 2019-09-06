<?php  
session_start();
$message = "";
$send = true;
 //fetch.php  
 include 'connection/mysqliconn.php'; 
 if (isset($_POST['btn_update'])) {
    $id = $_POST['id'];
 	$fname = $_POST['fname'];
 	$mname = $_POST['mname'];
 	$lname = $_POST['lname'];
 	$address = $_POST['address'];
 	$email = $_POST['email'];
 	$cpnumber = $_POST['cpnumber'];
 	$gender = $_POST['gender'];
 	$age = $_POST['age'];
 	$bdate = $_POST['bdate'];
 	$marital = $_POST['status'];
 	$degree = $_POST['degree'];
 	$earned = $_POST['earned'];
 	$instition = $_POST['instition'];
 	$program = $_POST['program'];
 	$year = $_POST['year'];
 	$eligibility = $_POST['eligibility'];
 	$honor = $_POST['honor'];
 	$employed = $_POST['employed'];
 	$time = $_POST['time'];
 	$delay = $_POST['delay'];
 	$factors = $_POST['factors'];
 	$emstatus = $_POST['emstatus'];
 	$salary = $_POST['salary'];
 	$relevance = $_POST['relevance'];
 	$skills = $_POST['skills'];


 	if ($send == true) {
 		$query = "UPDATE alumni_records SET fname = '$fname' , mname = '$mname',lname = '$lname',address='$address',email = '$email',cpnumber = '$cpnumber',gender = '$gender',age = '$age',birthdate = '$bdate',maritalstatus='$marital',degree = '$degree',degreeearned = '$earned',institution = '$instition',program = '$program',yeargraduted = '$year',eligibility = '$eligibility',honor = '$honor',employed = '$employed',timelookingjob='$time',delayofemployment = '$delay',factores = '$factors',employmentstatus = '$emstatus',mothlysalary = '$salary',relevance = '$relevance',skills = '$skills' WHERE id = '$id'";
 		mysqli_query($connect,$query);
 		 $_SESSION['update_succesfully'] = "Records Updated!";
 		header('location:alumnirecords.php');

 	}
 	else{
 		$message = "Error no records Updated";
 		exit();
 	}
 	
 }

 ?>