<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      include 'connection/mysqliconn.php';   
      $query = "SELECT * FROM alumni_records WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $emptydata = "";
      $output .= '  
      <div class="table-responsive">  
      <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
      $dateOfBirth = $row['birthdate'];
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dateOfBirth), date_create($today));
           $output .= ' 
                <div class="panel panel-default">
               <div class="panel-heading">Personal Information</div>
                <div class="panel-body">
                 <p><label>First Name: </label>   '.$row['fname'].'</p>
                 <p id="mname"><label>Middle Name: </label>   '.$row['mname'].'</p>
                 <p id="lname"><label>Last Name: </label>   '.$row['lname'].'</p>
                  <p id="address"><label>Address: </label>   '.$row['address'].'</p>
                   <p id="email"><label>Email: </label>   '.$row['email'].'</p>
                   <p id="cpnumber"><label>Cp Number: </label>   '.$row['cpnumber'].'</p>
                   <p id="gender"><label>Gender: </label>   '.$row['gender'].'</p>
                   <p id="age"><label>Age: </label>   '.$diff->format('%y').'</p>
                   <p id="birthdate"><label>BirthDate: </label>   '.$row['birthdate'].'</p>
                   <p id="status"><label>Marital Status: </label>   '.$row['maritalstatus'].'</p>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Educational Attainment/Background</div>
                <div class="panel-body">
                 <p><label>Degree: </label>   '.$row['degree'].'</p>
                 <p id="erned"><label>Degree Earned: </label>   '.$row['degreeearned'].'</p>
                 <p id="institution"><label>InstituTion: </label>   '.$row['institution'].'</p>
                 <p id="program"><label>Program: </label>   '.$row['program'].'</p>
                 <p id="year"><label>Year Graduated: </label>   '.$row['yeargraduted'].'</p>
                 <p id="eligibility"><label>EligiBility: </label>   '.$row['eligibility'].'</p>
                 <p id="honor"><label>Awards/Honor: </label>   '.($row['honor'] == "" ? "Empty Data" : $row['honor']).'</p>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Employment Background</div>
                <div class="panel-body">
                <h4><label></label>   '.$row['employed'].' <span class="glyphicon glyphicon-ok"></h4></span>
                <div class="panel-body" style="box-shadow: 0 0 10px rgba(0,0,0,1) ; width: 100%;">
                <span>Employed Only</span>
                 <p><label>Company Name: </label>   '.($row['companyname'] == "Company Name" ? "Empty Data" : $row['companyname']).'</p>
                 <p id="position"><label>Position: </label>   '.($row['position'] == "Company Position" ? "Empty Data" : $row['position']).'</p>
                 <p id="yearem"><label>Year Of Employment: </label>   '.($row['yearofemployement'] == "Year of Employment" ? "Empty Data" : $row['yearofemployement']).'</p>
                 <p id="salary"><label>Mothly Salary: </label>   '.($row['mothlysalary'] == "Monthly Salary" ? "Empty Data" : $row['mothlysalary']).'</p>
                 <p id="jobaw"><label>Job Awawrds: </label>   '.($row['jobawawards'] == "" ? "Empty Data" : $row['joba']).'</p>
                </div>

                <div class="panel-body" style="box-shadow: 0 0 10px rgba(0,0,0,1) ; width: 100%; margin-top: 15px;">
                <span>Self Employed Only</span>
                 <p><label>Nature of Business: </label> 
                 '.($row['natureofbusiness'] == "Nature of Business" ? "Empty Data" : $row['natureofbusiness']).'
                 </p>
                 <p id="position"><label>Place of Business: </label>   '.($row['placeofbusiness'] == "Place of your Business" ? "Emty Data" : $row['placeofbusiness']).'</p>
                 <p id="yearem"><label>Year Started: </label>   '.($row['yearstatrted'] == "Year Started" ? "Empty Data" : $row['yearstatrted']).'</p>
                 <p id="salary"><label>Average of Mothly Income: </label>   '.($row['averagemonthlyincome'] == "Monthly Income" ? "Empty Data" : $row['averagemonthlyincome']).'</p>
                 <p id="jobaw"><label>Business Awawrds: </label> '.($row['reciveawrds'] == "" ? "Empty Data" : $row['reciveawrds']).'</p>
                </div>

                <div class="panel-body" style="box-shadow: 0 0 10px rgba(0,0,0,1) ; width: 100%; margin-top: 15px;">
                <span>Ofw Only</span>
                 <p><label>Job Description: </label>   '.($row['jobdescription'] == "Job Description" ? "Empty Data" : $row['jobdescription']).'</p>
                 <p id="position"><label>Nature Of Work: </label>   '.($row['worknature'] == "Nature of Work" ? "Empty Data" : $row['worknature']).'</p>
                 <p id="yearem"><label>Year Of Employment: </label>   '.($row['yearemployment'] == "Year Employment" ? "Empty Data" : $row['yearemployment']).'</p>
                 <p id="salary"><label>Income: </label>   '.($row['ofwincome'] == "Monthly Income" ? "Empty Data" : $row['ofwincome']).'</p>
                 <p id="jobaw"><label>Awawrds: </label>   '.($row['ofwawards'] == "" ? "Empty Data" : $row['ofwawards']).'</p>
                </div> 
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Others</div>
                <div class="panel-body">
                 <p><label>Time Looking For A job: </label>   '.$row['timelookingjob'].'</p>
                 <p><label>Delay of Employment: </label>   '.$row['delayofemployment'].'</p>
                  <p><label>Factors of First/Present job: </label>   '.$row['factores'].'</p>
                   <p><label>Employment Status: </label>   '.$row['employmentstatus'].'</p>
                   <p><label>Relevance of College Degree: </label>   '.$row['relevance'].'</p>
                   <p><label>Competencies learned in college: </label>   '.$row['skills'].'</p>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Quality Education at ISU CAUAYAN-CAMPUS</div>
                <div class="panel-body">
                 <p><label>Curriculum: </label>   '.$row['curriculum'].'</p>
                 <p id="mname"><label>Method of Instruction: </label>   '.$row['instruction'].'</p>
                 <p id="lname"><label>Faculty: </label>   '.$row['faculty'].'</p>
                  <p id="address"><label>Library: </label>   '.$row['library'].'</p>
                   <p id="email"><label>Laboratories: </label>   '.$row['laboratory'].'</p>
                   <p id="cpnumber"><label>Physical Plant: </label>   '.$row['physicalplant'].'</p>
                   <p id="gender"><label>Career Guidance: </label>   '.$row['guidance'].'</p>
                   <p id="age"><label>Housing Dormitories: </label>   '.$row['housingdormitories'].'</p>
                   <p id="birthdate"><label>Job Placement: </label>   '.$row['jobplacement'].'</p>
                   <p id="status"><label>Academic Counseling: </label>   '.$row['counseling'].'</p>
                  <p id="services"><label>Research Services: </label>   '.$row['reseacrh'].'</p>
                  <p id="services1"><label>Extension Services: </label>   '.$row['extension'].'</p>
                  <p id="status"><label>General Administration: </label>   '.$row['administration'].'</p>
                </div>
                </div>
                <div class="panel panel-default">
                <div class="panel-heading">Comment and Suggestion</div>
                <div class="panel-body">
                 <p>'.$row['comment'].'</p>
                </div>
                </div>
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>

 <link rel="stylesheet" type="text/css" href="css/viewer.css">
  <script src="js/viewer.js"></script>
  <script>
    var viewer = new Viewer(document.getElementById('image'), {
  inline: false,
  viewed: function() {
    viewer.zoomTo(1);
  }
});
  </script>
<style>
#services{
    margin-top: -35px;
    margin-left: 300px;
  }
  #services1{
    margin-top: -35px;
    margin-left: 700px;
  }
  #mname{
    margin-top: -35px;
    margin-left: 300px;
  }
  #lname{
    margin-top: -35px;
    margin-left: 700px;
  }
  #email{
    margin-top: -35px;
    margin-left: 300px;
  }
  #cpnumber{
    margin-top: -35px;
    margin-left: 700px;
  }
  #age{
    margin-top: -35px;
    margin-left: 300px;
  }
  #birthdate{
    margin-top: -35px;
    margin-left: 700px;
  }
   #erned{
    margin-top: -35px;
    margin-left: 300px;
  }
  #institution{
    margin-top: -35px;
    margin-left: 700px;
  }
  #year{
    margin-top: -35px;
    margin-left: 300px;
  }
  #eligibility{
    margin-top: -35px;
    margin-left: 700px;
  }
  #position{
    margin-top: -35px;
    margin-left: 300px;
  }
  #yearem{
    margin-top: -35px;
    margin-left: 550px;
  }
  #jobaw{
    margin-top: -35px;
    margin-left: 300px;
  }
  #textmuted{
    font-size: 10px;
  }
</style>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>