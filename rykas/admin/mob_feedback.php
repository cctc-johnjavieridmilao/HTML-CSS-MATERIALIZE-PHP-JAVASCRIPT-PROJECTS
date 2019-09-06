
<div class="container">
<a href="mob_admin.php" class="btn btn-success"> <span class="fas fa-redo-alt"></span> Go Back</a>
<?php 
 require 'conn.php';
 $query = "SELECT * FROM tbl_feedback ORDER BY date DESC";
 $res = mysqli_query($connect,$query);

 while ($row = mysqli_fetch_array($res)) {
 	 $date = new DateTime($row['date']);
     echo '
     <div class="card view" id="'.$row['id'].'" style="text-align: justify;">
  <div class="card-body">
  <h6 class="card-subtitle mb-2 text-muted" style="font-size:12px;">'.$date->format('l , F , j , Y').'</h6>
   '.$row['email'].'
  </div>
</div>
<br>
  ';	
 }
?>
</div>


