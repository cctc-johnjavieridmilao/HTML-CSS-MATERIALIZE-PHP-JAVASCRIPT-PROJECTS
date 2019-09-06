
<?php 
include 'connection/mysqliconn.php';  
$query = "SELECT * FROM admin_account";  
$result = mysqli_query($connect, $query); 
 ?>
 <table id="example2" class="table table-bordered table-hover">
               <tr style="background-color: green; color: white; border-collapse: collapse;">  
                <th width="10%">ID</th>
                <th width="20%">Username</th>
                <th width="20%">Password</th>
                <th width="20%">Date Updated</th>      

              </tr>  
             
               
                <tbody style="background-color: white;">
                  <?php 
                   while ($row = mysqli_fetch_array($result)) {
                    $date = new DateTime($row['date_update']);
                    echo '
                     <tr>  
                    <td style="font-family: system-ui;">'.$row["ID"].'</td> 
                    <td style="font-family: system-ui;">'.$row["User"].'</td> 
                    <td style="font-family: system-ui;">'.$row["Pass"].'</td>
                    <td style="font-family: system-ui;">'.$date->format('Y-m-d').'</td> 

                  </tr>  

                    ';
                   }

                   ?>
                  
                </tbody>
              
              
               
            </table>
