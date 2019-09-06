<?php  
 //fetch.php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
     include 'connection/mysqliconn.php';   
      $query = "SELECT * FROM tbl_user_account WHERE info_id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output = '  
                <div id="printtbl">
                <center><span><img  src="images/'.$row["image"].'" class="img-responsive img-thumbnail" width="300px" height="300px"/></span></center> 
                <center><span id="arrow" class="glyphicon glyphicon-arrow-up"></span></center>
                <center><strong>User Photo</strong></center>
                <br><p class="txt"><label>First Name: </label>   '.$row['fname'].'</p>
                <p><label>Middle Name: </label>   '.$row['mname'].'</p>
                <p><label>Last Name: </label>   '.$row['lname'].'</p>   
                <p><label>Address: </label>   '.$row['address'].'</p>  
                <p><label>Phone Number: </label>   '.$row['cpnumber'].'</p> 
                <p><label>Gender: </label>   '.$row['gender'].'</p>  
                <p><label>Year Graduated: </label>   '.$row['yeargraduted'].'</p>
                <p><label>Department: </label>   '.$row['department'].'</p>
                <p><label>Course: </label>   '.$row['course'].'</p>   
                <p><label>Company Name: </label>   '.$row['cname'].'</p>  
                <p><label>Company Address: </label>   '.$row['caddress'].'</p>
                <p><label>Email: </label>   '.$row['email'].'</p> 
                <p><label>Job Position: </label>   '.$row['jobposition'].'</p> 
                <p><label>Date Submitted: </label>   '.$row['date'].'</p>
                <div id="btn"><button class="button btn btn-success">Print</button></div>
                </div>
                
           ';  
      }  
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
    height: 35px;
    box-shadow: 10px solid white;
    border: 1px solid white;
   }
   p {
    border-bottom: 1px solid rgba(0,0,0,0.3);
   }
   label{
    font-size: 15px;
   }
 </style>
 