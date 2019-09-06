
 <?php 
   if (!isset($_POST['searchs'])) {
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top img_ids" id="<?php echo $row['id'] ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
      <?php 
       if ($row['category'] == "Appetizers") {
         ?>
           <span class="badge badge-success">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
         <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
     
         <?php
       }
       elseif($row['category'] == "Beef"){
        ?>
           <span class="badge badge-info">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
         elseif($row['category'] == "Chicken"){
        ?>
           <span class="badge badge-primary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
         <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
        elseif($row['category'] == "Hot Soup"){
        ?>
           <span class="badge badge-warning">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
      elseif($row['category'] == "Pinoy Corner"){
        ?>
           <span class="badge badge-danger">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
       elseif($row['category'] == "Sizzlings"){
        ?>
           <span class="badge badge-warning">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
       elseif($row['category'] == "Vagetables"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }

       elseif($row['category'] == "Pork"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }


       elseif($row['category'] == "Sea Food"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }


       elseif($row['category'] == "Noodles"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
       <?php
       }


       elseif($row['category'] == "Ihaw-Ihaw Corner"){    
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
      
      ?>

    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo $dt->format('l F j Y : h:i:sa') ?></small>
    </div>
  </div>
  <br>
   <br>
   </div>
     <?php
    }
   }
   else{
    include './admin/conn.php';
    $title = $_POST['searchs'];
    $query = "SELECT * FROM tbl_menus WHERE category LIKE '%".$title."%' OR name LIKE '%".$title."%' OR description LIKE '%".$title."%'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
       while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4 item">
     <div class="card">
    <img class="card-img-top img_ids" id="<?php echo $row['id'] ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
      <?php 
       if ($row['category'] == "Appetizers") {
         ?>
           <span class="badge badge-success">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
       elseif($row['category'] == "Beef"){
        ?>
           <span class="badge badge-info">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
         elseif($row['category'] == "Chicken"){
        ?>
           <span class="badge badge-primary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
        elseif($row['category'] == "Hot Soup"){
        ?>
           <span class="badge badge-warning">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
       <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
      elseif($row['category'] == "Pinoy Corner"){
        ?>
           <span class="badge badge-danger">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
       <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
       elseif($row['category'] == "Sizzlings"){
        ?>
           <span class="badge badge-warning">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
   <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }
       elseif($row['category'] == "Vagetables"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }   
       elseif($row['category'] == "Pork"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }


       elseif($row['category'] == "Sea Food"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>
         <?php
       }


       elseif($row['category'] == "Noodles"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>

       <?php
       }


       elseif($row['category'] == "Ihaw-Ihaw Corner"){
        ?>
           <span class="badge badge-secondary">
      <?php 
      echo 
      $row['category'];
      ?>
     </span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
       <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
        <?php
      }
      ?>

         <?php
       }
      ?>
    </div>
    <div class="card-footer">
      <small class="text-muted"><?php echo $dt->format('l F j Y : h:i:sa') ?></small>
    </div>
  </div>
  <br>
   <br>
   </div>
     <?php
    }
    }else{
      echo '<div class="col-md-12"><div class="alert alert-danger">No Data To Fetch</div></div>';
    }
  
  }

 ?>
<!-- SnackbarJS plugin -->
<script src="https://cdn.rawgit.com/FezVrasta/snackbarjs/1.1.0/dist/snackbar.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.img_ids').click(function(){
var id = $(this).attr('id');
$.ajax({
  url: 'view_descript.php',
  type: 'POST',
  data: {id:id},
})
.done(function(data) {
  console.log("success");
  $('#res').html(data);
  $('#view_modal').modal('show');
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

});
});
</script>
