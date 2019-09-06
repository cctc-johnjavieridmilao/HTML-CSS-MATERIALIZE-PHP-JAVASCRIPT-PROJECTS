 <?php  
include 'connection/mysqliconn.php';
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      //general information update
      $first_name = mysqli_real_escape_string($connect, $_POST["fname"]);  
      $middle_name = mysqli_real_escape_string($connect, $_POST["mname"]);
      $latname_name = mysqli_real_escape_string($connect, $_POST["lname"]);
      $address = mysqli_real_escape_string($connect, $_POST["address"]);
      $email = mysqli_real_escape_string($connect, $_POST["email"]);
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
      $marital_status = mysqli_real_escape_string($connect, $_POST["maritalstatus"]);
      $cpnumber= mysqli_real_escape_string($connect, $_POST["cpnumber"]);
      
      //educational update
      $degree= mysqli_real_escape_string($connect, $_POST["degree"]);
      $degreeearned= mysqli_real_escape_string($connect, $_POST["degreeearned"]);
      $institution= mysqli_real_escape_string($connect, $_POST["institution"]);
      $program= mysqli_real_escape_string($connect, $_POST["program"]);
      $yeargraduted= mysqli_real_escape_string($connect, $_POST["yeargraduted"]);
      $eligibility= mysqli_real_escape_string($connect, $_POST["eligibility"]);

      //employment update

      $employment= mysqli_real_escape_string($connect, $_POST["employment"]);
      $salary= mysqli_real_escape_string($connect, $_POST["salary"]);
      $employmentStatus= mysqli_real_escape_string($connect, $_POST["employmentStatus"]);
      $time= mysqli_real_escape_string($connect, $_POST["time"]);
      $delay= mysqli_real_escape_string($connect, $_POST["delay"]);
      $factores= mysqli_real_escape_string($connect, $_POST["factores"]);

      if($_POST["rec_id"] != '')  
      {  
        sleep(3);
           $query = "  
           UPDATE alumni_records   
           SET fname='$first_name',
           mname='$middle_name',
           lname='$latname_name',
           address='$address',
           email='$email',
           cpnumber='$cpnumber',
           gender='$gender',
           maritalstatus='$marital_status',
           degree='$degree',
           degreeearned='$degreeearned',
           institution='$institution',
           program='$program',
           yeargraduted='$yeargraduted',
           eligibility='$eligibility',
            employed='$employment',
            salary='$salary',
            timelookingjob='$time',
            delayofemployment='$delay',
            factores='$factores'
           WHERE id='".$_POST["rec_id"]."' ";  
          echo "<script>
          swal({
                          title: 'Records Updated!',
                          text: '',
                          type: 'success',
                          timer: 2000,
                          showCancelButton: false,
                          showConfirmButton: false
                        })            
                          timedRefresh();
          </script>";
      }  
      else  
      {  
           $query = "  
           INSERT INTO alumni_record(fname)  
           VALUES('$first_name');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM parents ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="10%">News Title</th>
                          <th width="15%">Date Submit</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
       echo '<meta http-equiv="refresh" content="2" />';
 }  
 ?>
