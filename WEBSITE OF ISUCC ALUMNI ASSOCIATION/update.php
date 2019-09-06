<?php
$message = "";
include 'connection/mysqliconn.php'; 
if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $fname = mysqli_real_escape_string($connect, $_POST["fname"]);  
      $lname = mysqli_real_escape_string($connect, $_POST["lname"]);
      $middlename = mysqli_real_escape_string($connect, $_POST["middlename"]);
      $email = mysqli_real_escape_string($connect, $_POST["email"]);
      $gender = mysqli_real_escape_string($connect, $_POST["gender"]);
      $yeargraduated = mysqli_real_escape_string($connect, $_POST["yeargraduated"]);
      $course = mysqli_real_escape_string($connect, $_POST["course"]);
      $homeaddress = mysqli_real_escape_string($connect, $_POST["homeaddress"]);
      $phonenumber = mysqli_real_escape_string($connect, $_POST["phonenumber"]);
      $cname = mysqli_real_escape_string($connect, $_POST["cname"]);
      $caddres = mysqli_real_escape_string($connect, $_POST["caddres"]);
      $jobpos = mysqli_real_escape_string($connect, $_POST["jobpos"]);
      if($_POST["employee_id"] != '')  
      {  
           $query = "UPDATE tbl_user_account SET fname = '$fname', mname = '$middlename', lname = '$lname', address = '$homeaddress', cpnumber = '$phonenumber', cname = '$cname',caddress= '$caddres',email = '$email',jobposition ='$jobpos',gender='$gender',yeargraduted = '$yeargraduated',course = '$course' WHERE info_id = '".$_POST["employee_id"]."' ";
           $message = 'Data Updated';  
           echo "<script>
            swal({
  title: 'You Updated Succesfully',
  text: 'I will close in 5 seconds',
  timer: 5000,
  type: 'success',
  showCancelButton: false,
  showConfirmButton: false
});
           </script>";
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_user_account(fname, mname, lname, address,cpnumber,cname,caddress,email,jobposition,gender,yeargraduted,course)  
           VALUES('$fname', '$lname', '$middlename', '$email', '$gender','$yeargraduated','$course','$homeaddress','$phonenumber','$cname','$caddres','$jobpos');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tbl_user_account ORDER BY info_id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="uk-table uk-table-hover  uk-table-striped results" id="employee_table" id="user_data">  
                 <thead style="background-color: #6EE04C; color: white;">
                     <tr>  
                          <th width="30%">ID</th>
                               <th width="30%">First Name</th>
                               <th width="50%">Date and Time Submitted</th> 
                               <th width="30%">Edit</th>
                                <th width="30%">VIEW</th>
                                 <th width="30%">DELETE</th> 
                     </tr>  
                      <tr class="no-result warning">
                                 <td colspan="6" style="color: black;">No results</td>
                               </tr>
                          </thead>
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                <tbody style="background-color: white;">
                     <tr>  
                        <td style="font-family: system-ui;"><?php echo $row["info_id"]; ?></td> 
                         <td style="font-family: system-ui;"><a href="#" class="hover" id="<?php echo $row["info_id"]; ?>"><?php echo $row["fname"]; ?></a></td>
                         <td style="font-family: system-ui;"><?php echo $row["date"]; ?></td> 
                          <td><button type="button" name="view" value="view" id="<?php echo $row["info_id"]; ?>" class="btn btn-info btn-xs view_data"><span class="glyphicon glyphicon-user">View</span></button></td>  
                               <td><a class="btn btn-xs btn-danger" id="delete_product" data-id="<?php echo $row["info_id"]; ?>" href="javascript:void(0)"><i class="glyphicon glyphicon-trash">Delete</i></a></td>
                               <td><input type="button" name="edit" class="btn btn-xs btn-success edit_data" value="Edit" id="<?php echo$row["info_id"]; ?>"></td> 
                     </tr>  
                     </tbody>
                ';  
           }  
           $output .= '</table>';  
      }  
     echo '<meta http-equiv="refresh" content="2" />';

 }  

?>