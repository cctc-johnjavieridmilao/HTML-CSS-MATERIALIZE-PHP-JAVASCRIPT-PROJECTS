<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "test_db");  
      $query = "SELECT * FROM tbl_test WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive" >  
       <button class="button btn btn-success">Print Table</button>
           <table class="table table-bordered" id="printtbl">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Frist Name</label></td>  
                     <td width="70%">'.$row["fname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Last Name</label></td>  
                     <td width="70%">'.$row["lname"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Middle Name</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["middlename"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">'.$row["gender"].' </td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Year Graduated</label></td>  
                     <td width="70%">'.$row["yeargraduated"].' </td>  
                </tr>  

                <tr>  
                     <td width="30%"><label>Course</label></td>  
                     <td width="70%">'.$row["course"].' </td>  
                </tr>

                 <tr>  
                     <td width="30%"><label>Age</label></td>  
                     <td width="70%">'.$row["age"].' </td>  
                </tr>   

                 <tr>  
                     <td width="30%"><label>Home Addres</label></td>  
                     <td width="70%">'.$row["homeaddress"].' </td>  
                </tr>   

                 <tr>  
                     <td width="30%"><label>Phone Number</label></td>  
                     <td width="70%">'.$row["phonenumber"].' </td>  
                </tr>   

                 <tr>  
                     <td width="30%"><label>Current Job Position</label></td>  
                     <td width="70%">'.$row["currentjobposition"].' </td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>Company Affliation</label></td>  
                     <td width="70%">'.$row["companycffiliation"].' </td>  
                </tr>    
                 <tr>  
                     <td width="30%"><label>Company Address</label></td>  
                     <td width="70%">'.$row["companyaddress"].' </td>  
                </tr>    
                 <tr>  
                     <td width="30%"><label>Monthly Salary</label></td>  
                     <td width="70%">'.$row["Monthlysalary"].' </td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Employed in SixMonths</label></td>  
                     <td width="70%">'.$row["employedinsixmothns"].' </td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>Source To Employ</label></td>  
                     <td width="70%">'.$row["sourcetoEmploy"].'</td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>Job Experience</label></td>  
                     <td width="70%">'.$row["jobexperience"].' </td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>Suggestion</label></td>  
                     <td width="70%">'.$row["suggestion"].' </td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Promoted</label></td>  
                     <td width="70%">'.$row["promoted"].' </td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>Performance Rate</label></td>  
                     <td width="70%">'.$row["performanceRate"].' </td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>Name Of Business</label></td>  
                     <td width="70%">'.$row["businessname"].' </td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>Nature of Business</label></td>  
                     <td width="70%">'.$row["businessnature"].' </td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Business Role</label></td>  
                     <td width="70%">'.$row["businessrole"].' </td>  
                </tr>      
                <tr>  
                     <td width="30%"><label>Monthly Profit</label></td>  
                     <td width="70%">'.$row["monthlyprofit"].' </td>  
                </tr>      

                <tr>  
                     <td width="30%"><label>Business Address</label></td>  
                     <td width="70%">'.$row["businessadd"].' </td>  
                </tr>

                <tr>  
                     <td width="30%"><label>Business CPNumber</label></td>  
                     <td width="70%">'.$row["businesscpnumber"].' </td>  
                </tr>     

                <tr>  
                     <td width="30%"><label>Professional Growth</label></td>  
                     <td width="70%">'.$row["professionalgrowth"].' </td>  
                </tr>     

                <tr>  
                     <td width="30%"><label>Competence</label></td>  
                     <td width="70%">'.$row["usercompetence"].' </td>  
                </tr>     

                <tr>  
                     <td width="30%"><label>Characters</label></td>  
                     <td width="70%">'.$row["user_characters"].' </td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Charity</label></td>  
                     <td width="70%">'.$row["uer_charity"].' </td>  
                </tr>       


                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
 <script>
     $('.button').click(function(){
        var printme = document.getElementById('printtbl');
        var wme = window.open("","","width=900,height=700");
        wme.document.write(printme.outerHTML);
        wme.document.close();
        wme.focus();
        wme.print();
        wme.close();
     })
 </script>
  <style>
   .button {
    width: 100px;
    height: 40px;
    box-shadow: 10px solid white;
    border: 1px solid white;
   }
   

 </style>
 
