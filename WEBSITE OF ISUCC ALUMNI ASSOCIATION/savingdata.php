<?php 
 
 $db = mysqli_connect('localhost', 'root', '', 'test_db');

if(isset($_POST['submit'])) {
 $first = $_POST['first'];
 $last = $_POST['last'];
 $email = $_POST['email'];
 $mname = $_POST['mname'];
 $gender = $_POST['gender'];
 $yeargraduated = $_POST['yeargraduated'];
 $course = $_POST['course'];
 $age = $_POST['age'];
 $address = $_POST['address'];
 $cpnumber = $_POST['cpnumber'];
 $Jopposition = $_POST['Jopposition'];
 $companyafflilation = $_POST['companyafflilation'];
 $companyaddress = $_POST['companyaddress'];
 $salary = $_POST['salary'];
 $employ = $_POST['employ'];
 $sourcetoemploy = $_POST['sourcetoemploy'];
 $jobexperience = $_POST['jobexperience'];
 $suggestion = $_POST['suggestion'];
 $promoted = $_POST['promoted'];
 $immediatesup = $_POST['immediatesup'];
 $businessname = $_POST['businessname'];
 $businessnature = $_POST['businessnature'];
 $businessrole = $_POST['businessrole'];
 $profit = $_POST['profit'];
 $buisenesadd = $_POST['buisenesadd'];
 $buisenesphonenumber = $_POST['buisenesphonenumber'];
 $growth = $_POST['growth'];
 $competence = $_POST['competence'];
 $usercharacter = $_POST['usercharacter'];
 $usercharity = $_POST['usercharity'];
 

  $query = "INSERT INTO tbl_test (fname,lname,email,Middlename,gender,yeargraduated,course,age,homeaddress,phonenumber,currentjobposition,companycffiliation,companyaddress,Monthlysalary,employedinsixmothns,sourcetoEmploy,jobexperience,suggestion,promoted,performanceRate,businessname,businessnature,businessrole,monthlyprofit,businessadd,businesscpnumber,professionalgrowth,usercompetence,user_characters,uer_charity) VALUES ('$first','$last','$email','$mname',' $gender','$yeargraduated','$course','$age','$address','$cpnumber','$Jopposition','$companyafflilation','$companyaddress','$salary','$employ',' $sourcetoemploy','$jobexperience','$suggestion','$promoted','$immediatesup','$businessname','$businessnature','$businessrole','$profit','$buisenesadd','$buisenesphonenumber','$growth','$competence','$usercharacter','$usercharity')";
  mysqli_query($db, $query);
  header('location: Alumniform.php');
  }

 ?>

 
