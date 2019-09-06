<?php
  
 $db = mysqli_connect('localhost', 'root', '', 'alumni_record');

if(isset($_POST['submit'])) {
   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $mname = $_POST['mname'];
   $yeargraduated = $_POST['yeargraduated'];
   $course = $_POST['course'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $address = $_POST['address'];
   $cpnumber = $_POST['cpnumber'];
   $email = $_POST['email'];
   $Jopposition = $_POST['Jopposition'];
   $companyafflilation = $_POST['companyafflilation'];
   $companyaddress = $_POST['companyaddress'];
   $salary = $_POST['salary'];
   $employ = $_POST['employ'];
   $sourcetoemploy = $_POST['sourcetoemploy'];
   $jobexperience = $_POST['jobexperience'];
   $promoted = $_POST['promoted'];
   $immediatesup = $_POST['immediatesup'];
   $nameofbsness = $_POST['nameofbsness'];
   $natureofbsness = $_POST['natureofbsness'];
   $roleinbsness = $_POST['roleinbsness'];
   $approximate = $_POST['approximate'];
   $buisenesadd = $_POST['buisenesadd'];
   $buisenesphonenumber = $_POST['buisenesphonenumber'];
   $proffesiongrowth = $_POST['proffesiongrowth'];
   $competence = $_POST['competence'];
   $character = $_POST['character'];
   $charity = $_POST['charity'];

   $query = "INSERT INTO tbl_record (Lastname,Firstname,Middlename,Yeargraduated,Course,Age,Gender,Home_Address,phone_number,Email,Jobposition,affliation,company_address,approx_salary,Employed_in_sixmonths,source_employment,learned_in_Isu,suggestion,promoted,performance_rate,buisness_name,buisness_nature,buisness_role,monthly_profit,buisness_address,buisness_number,professional_growth,competence,character,charity) VALUES ('$lastname','$firstname','$mname','$yeargraduated',' $course,'$age','$gender','$address','$cpnumber','$email','$Jopposition','$companyafflilation','$companyaddress','$salary','$employ','$sourcetoemploy','$jobexperience','$promoted','$immediatesup','$nameofbsness','$natureofbsness','$roleinbsness','$approximate','$buisenesadd','$buisenesphonenumber','$proffesiongrowth','$competence','$character','$charity')";

       mysqli_query($db, $query);
        header('location: recordsave.php');
  
}


  ?>

  $query = "INSERT INTO tbl_record (
Lastname,Firstname,Middlename,Yeargraduated,Course,Age,Gender,Home_Address,phone_number,Email,
Jobposition,affliation,company_address,approx_salary,Employed_in_sixmonths,source_employment,
learned_in_Isu,suggestion,promoted,performance_rate,buisness_name,buisness_nature,buisness_role,
monthly_profit,buisness_address,buisness_number,professional_growth,competence,character,charity
) VALUES (
'".$lastname."','".$firstname."','".$mname."','".$yeargraduated."','".$course."','".$age."','".$gender."',
'".$address."','".$cpnumber."','".$email."','".$Jopposition."','".$companyafflilation."','".$companyaddress."',
'".$salary."','".$employ."','".$sourcetoemploy."','".$jobexperience."','".$promoted."','".$immediatesup."',
'".$nameofbsness."','".$natureofbsness."','".$roleinbsness."','".$approximate."','".$buisenesadd."',
'".$buisenesphonenumber."','".$proffesiongrowth."','".$competence."','".$character."','".$charity."')";


   $query = "INSERT INTO tbl_record (Lastname,Firstname,Middlename,Yeargraduated,Course,Age,Gender,Home_Address,phone_number,Email,Jobposition,affliation,company_address,approx_salary,Employed_in_sixmonths,source_employment,learned_in_Isu,suggestion,promoted,performance_rate,buisness_name,buisness_nature,buisness_role,monthly_profit,buisness_address,buisness_number,professional_growth,competence,character,charity) VALUES ('$lastname','$firstname','$mname','$yeargraduated','$course','$age','$gender','$address','$cpnumber','$email','$Jopposition','$companyafflilation','$companyaddress','$salary','$employ','$sourcetoemploy','$jobexperience','$promoted'
   ,'$immediatesup','$nameofbsness','$natureofbsness','$roleinbsness','$approximate','$buisenesadd','$buisenesphonenumber','$proffesiongrowth','$competence','$character','$charity')";

   if(isset($_POST['submit_record'])) {
  $conn = new mysqli('localhost', 'root', '', 'alumni_record');
   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $mname = $_POST['mname'];
   $yeargraduated = $_POST['yeargraduated'];
   $course = $_POST['course'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $address = $_POST['address'];
   $cpnumber = $_POST['cpnumber'];
   $email = $_POST['email'];
   $Jopposition = $_POST['Jopposition'];
   $companyafflilation = $_POST['companyafflilation'];
   $companyaddress = $_POST['companyaddress'];
   $salary = $_POST['salary'];
   $employ = $_POST['employ'];
   $sourcetoemploy = $_POST['sourcetoemploy'];
   $jobexperience = $_POST['jobexperience'];
   $promoted = $_POST['promoted'];
   $immediatesup = $_POST['immediatesup'];
   $nameofbsness = $_POST['nameofbsness'];
   $natureofbsness = $_POST['natureofbsness'];
   $roleinbsness = $_POST['roleinbsness'];
   $approximate = $_POST['approximate'];
   $buisenesadd = $_POST['buisenesadd'];
   $buisenesphonenumber = $_POST['buisenesphonenumber'];
   $proffesiongrowth = $_POST['proffesiongrowth'];
   $competence = $_POST['competence'];
   $character = $_POST['character'];
   $charity = $_POST['charity'];

   Lastname,Firstname,Middlename,Yeargraduated,Course,Age,Gender,Home_Address,phone_number,Email,
			Jobposition,affliation,company_address,approx_salary,Employed_in_sixmonths,source_employment,
			learned_in_Isu,suggestion,promoted,performance_rate,buisness_name,buisness_nature,buisness_role,
			monthly_profit,buisness_address,buisness_number,professional_growth,competence,character,charity
			) VALUES (
			'".$lastname."','".$firstname."','".$mname."','".$yeargraduated."','".$course."','".$age."','".$gender."',
			'".$address."','".$cpnumber."','".$email."','".$Jopposition."','".$companyafflilation."','".$companyaddress."',
			'".$salary."','".$employ."','".$sourcetoemploy."','".$jobexperience."','".$promoted."','".$immediatesup."',
			'".$nameofbsness."','".$natureofbsness."','".$roleinbsness."','".$approximate."','".$buisenesadd."',
			'".$buisenesphonenumber."','".$proffesiongrowth."','".$competence."','".$character."','".$charity."')";

if ($conn->query($sql) === TRUE) {
 header("location:record.php");
}
$conn->close();
}
  ?>








  
  $db = mysqli_connect('localhost', 'root', '', 'alumni_record');

if(isset($_POST['submit_record'])) {
   $lastname = $_POST['lastname'];
   $firstname = $_POST['firstname'];
   $mname = $_POST['mname'];
   $yeargraduated = $_POST['yeargraduated'];
   $course = $_POST['course'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $address = $_POST['address'];
   $cpnumber = $_POST['cpnumber'];
   $email = $_POST['email'];
   $Jopposition = $_POST['Jopposition'];
   $companyafflilation = $_POST['companyafflilation'];
   $companyaddress = $_POST['companyaddress'];
   $salary = $_POST['salary'];
   $employ = $_POST['employ'];
   $sourcetoemploy = $_POST['sourcetoemploy'];
   $jobexperience = $_POST['jobexperience'];
   $promoted = $_POST['promoted'];
   $immediatesup = $_POST['immediatesup'];
   $nameofbsness = $_POST['nameofbsness'];
   $natureofbsness = $_POST['natureofbsness'];
   $roleinbsness = $_POST['roleinbsness'];
   $approximate = $_POST['approximate'];
   $buisenesadd = $_POST['buisenesadd'];
   $buisenesphonenumber = $_POST['buisenesphonenumber'];
   $proffesiongrowth = $_POST['proffesiongrowth'];
   $competence = $_POST['competence'];
   $character = $_POST['character'];
   $charity = $_POST['charity'];

			  $query = "INSERT INTO tbl_record (Lastname,Firstname,Middlename,Yeargraduated,Course,Age,Gender,Home_Address,phone_number,Email,Jobposition,affliation,company_address,approx_salary,Employed_in_sixmonths,source_employment,learned_in_Isu,suggestion,promoted,performance_rate,buisness_name,buisness_nature,buisness_role,monthly_profit,buisness_address,buisness_number,professional_growth,competence,character,charity) VALUES ('$lastname','$firstname','$mname','$yeargraduated','$course','$age','$gender','$address','$cpnumber','$email','$Jopposition','$companyafflilation','$companyaddress','$salary','$employ','$sourcetoemploy','$jobexperience','$promoted','$immediatesup','$nameofbsness','$natureofbsness','$roleinbsness','$approximate','$buisenesadd','$buisenesphonenumber','$proffesiongrowth','$competence','$character','$charity')";

       mysqli_query($db, $query);
       header('location: record.php');
    }