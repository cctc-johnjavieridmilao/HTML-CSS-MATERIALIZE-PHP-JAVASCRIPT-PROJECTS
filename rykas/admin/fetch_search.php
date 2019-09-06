<?php 
if (isset($_POST['searchs'])) {
 $title = $_POST['searchs'];

  require 'conn.php';
 $query = "SELECT * FROM tbl_menus WHERE category LIKE '%".$title."%' OR name LIKE '%".$title."%' OR description LIKE '%".$title."%'";
 $res = mysqli_query($connect,$query);
if (mysqli_num_rows($res) > 0) {
while ($row = mysqli_fetch_array($res)) {
   echo '
  <div class="col-6">
  <div class="card" id="cr'.$row['id'].'">
  <div class="btn-group">
  <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="material-icons">more_vert</i>
  </button>  
  <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex2">
    <a class="dropdown-item edit" id="'.$row['id'].'">Edit</a>
    <a class="dropdown-item delete" id="'.$row['id'].'">Delete</a>
     <a class="dropdown-item avail" id="'.$row['id'].'">Set Available</a>
    <a class="dropdown-item notavail" id="'.$row['id'].'">Set NotAvailable</a>
  </div>
</div>
  <img class="mx-auto d-block" style="height: 60px;object-fit: cover;border-radius:50%;width:60px;" src="../upload/'.$row['image'].'" alt="Card image cap">
  <div class="card-body">
    <p class="card-text">'.mb_strimwidth($row['name'], 0, 13,'...').'</p>
    <p class="card-text">'.$row['description'].'</p>
    <span class="badge badge-success">'.$row['category'].'</span>
    <span class="badge badge-info" id="aa'.$row['id'].'">
     '.($row['available'] == 1 ? "Available " : "Not Available").'
    </span>
  </div>
</div>
<br>
</div>
   ';
 }	
}
 else{
 	 echo '<div class="col-md-12"><div class="alert alert-danger">No Data To Fetch</div></div>';
 }
}

?>