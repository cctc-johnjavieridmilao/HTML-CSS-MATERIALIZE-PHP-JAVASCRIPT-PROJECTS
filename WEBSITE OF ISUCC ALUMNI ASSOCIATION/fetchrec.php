 <?php  
 //fetch.php  
include 'connection/mysqliconn.php';
 if(isset($_POST["rec_id"]))  
 {  
      $query = "SELECT * FROM alumni_records WHERE id = '".$_POST["rec_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row); 
 }  
 ?>