 <?php  
 //fetch.php  
include 'connection/mysqliconn.php';
 if(isset($_POST["news_id"]))  
 {  
      $query = "SELECT * FROM parents WHERE id = '".$_POST["news_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row); 
 }  
 ?>