<?php
$message = "";
include 'connection/mysqliconn.php'; 
if (isset($_POST['buttonsubmit'])) {
 $fname = $_POST['fname'];
 $mname = $_POST['mname'];
 $lname = $_POST['lname'];
 $paddress = $_POST['paddress'];
 $email = $_POST['email'];
 $cpnumber = $_POST['cpnumber'];
 $gender = $_POST['gender'];
 $age = $_POST['age'];
 $date = $_POST['date'];
 $status = $_POST['status'];
 $degree = $_POST['degree'];
 $eearned = $_POST['eearned'];
 $institution = $_POST['institution'];
 $program = $_POST['program'];
 $year = $_POST['year'];
 $Eligibility = $_POST['Eligibility'];
 $honor = $_POST['honor'];
 $Employed = $_POST['employed'];
 $cname = $_POST['cname'];
 $position = $_POST['position'];
 $yearofemployment = $_POST['yearofemployment'];
 $salary = $_POST['salary'];
 $jobawards = $_POST['jobawards'];
 $lengthoftime = $_POST['lengthoftime'];
 $reasondelay = $_POST['reasondelay'];
 $factores = $_POST['factores'];
 $employmentstat = $_POST['employmentstat'];
 $monthlysalary = $_POST['monthlysalary'];
 $relevance = $_POST['relevance'];
 $skills = $_POST['skills'];
 $cccontent = $_POST['cccontent'];
 $minstruction = $_POST['minstruction'];
 $faculty = $_POST['faculty'];
 $library = $_POST['library'];
 $laboratory = $_POST['laboratory'];
 $physical = $_POST['physical'];
 $cguidance = $_POST['cguidance'];
 $hdormitoris = $_POST['hdormitoris'];
 $jplacement = $_POST['jplacement'];
 $acounceling = $_POST['acounceling'];
 $rsearch = $_POST['rsearch'];
 $xservices = $_POST['xservices'];
 $gadministration = $_POST['gadministration'];
 $comment = $_POST['comment'];
$image = $_FILES["image"] ["name"];
$tmp = $_FILES["image"] ["tmp_name"];
$r = rand(1,500);
$businessname = $_POST['businessname'];
$place = $_POST['place'];
$yearstart = $_POST['yearstart'];
$avincome = $_POST['avincome'];
$jobawards2 = $_POST['jobawards2'];
$description = $_POST['description'];
$worknature = $_POST['worknature'];
$employmentyearofw = $_POST['employmentyearofw'];
$salaryofw = $_POST['salaryofw'];
$jobawards3 = $_POST['jobawards3'];



move_uploaded_file($tmp, "photo/$r$image");
 
 $query = "INSERT INTO alumni_records (fname,mname,lname,address,email,cpnumber,gender,age,birthdate,maritalstatus,degree,degreeearned,institution,program,yeargraduted,eligibility,honor,employed,companyname,position,yearofemployement,salary,jobawawards,timelookingjob,delayofemployment,factores,employmentstatus,mothlysalary,relevance,skills,curriculum,instruction,faculty,library,laboratory,physicalplant,guidance,housingdormitories,jobplacement,counseling,reseacrh,extension,administration,comment,image,natureofbusiness,placeofbusiness,yearstatrted,averagemonthlyincome,reciveawrds,jobdescription,worknature,yearemployment,ofwincome,ofwawards) VALUES ('$fname','$mname','$lname','$paddress','$email','$cpnumber','$gender','$age','$date','$status','$degree','$eearned','$institution','$program','$year','$Eligibility','$honor','$Employed','$cname','$position','$yearofemployment','$salary','$jobawards','$lengthoftime','$reasondelay','$factores','$employmentstat','$monthlysalary','$relevance','$skills','$cccontent','$minstruction','$faculty','$library','$laboratory','$physical','$cguidance','$hdormitoris','$jplacement','$acounceling','$rsearch','$xservices','$gadministration','$comment','$r$image','$businessname','$place','$yearstart','$avincome','$jobawards2','$description','$worknature','$employmentyearofw','$salaryofw','$jobawards3')";

 	mysqli_query($connect,$query);
	$message =  "<script>swal('Your Info Has been Submitted! Thanks!','click okay','success');</script>";

}

?>