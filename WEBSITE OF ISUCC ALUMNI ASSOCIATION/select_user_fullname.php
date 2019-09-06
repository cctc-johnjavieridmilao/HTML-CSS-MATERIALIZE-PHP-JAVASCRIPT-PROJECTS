<?php  
 if(isset($_POST["employee_id"]))  
 {   
      $output = '';  
      include 'connection/mysqliconn.php';   
      $query = "SELECT * FROM alumni_records WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))  
      {  
      $dateOfBirth = $row['birthdate'];
      $today = date("Y-m-d");
      $diff = date_diff(date_create($dateOfBirth), date_create($today));
           $output .= ' 
                 <h4><span class="fas fa-user-graduate">  ' .$row['fname'].' ' .$row['mname'].' ' .$row['lname'].'</span></h4>
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