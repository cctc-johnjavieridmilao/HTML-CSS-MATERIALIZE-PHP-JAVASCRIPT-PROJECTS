 <?php 
   if (!isset($_POST['searchs'])) {
     include './admin/conn.php';
    $query = "SELECT * FROM orders ORDER BY date DESC";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
    $now = date('Y-m-d H:i:s');
    $ex = new datetime($row['expiration_date']);
    if ($now > $row['expiration_date']) {
      // expired
    }
    else {
          if ($row['ordersfn'] == "finished") {
       ?>
       <div class="card text-white bg-success mb-3">
  <div class="card-header">Name: <?php echo $row['uname']; ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['ordername']; ?></h5>
    <p class="card-text">Prize: &#8369; <?php echo $row['prize']; ?>.00</p>
     <p class="card-text">Expiration Date: <?php echo $ex->format('Y-m-d : h:i A'); ?></p>
    <a href="tel:09159765057" class="card-text" style="color: white;"><i class="fas fa-phone"></i> 09159765057</a>
  </div>
  </div>
       <?php
     }
     else if ($row['ordersfn'] == "canceled"){
      ?>
      <div class="card text-white bg-danger mb-3">
  <div class="card-header">Name: <?php echo $row['uname']; ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['ordername']; ?></h5>
    <p class="card-text">Prize: &#8369; <?php echo $row['prize']; ?>.00</p>
    <p class="card-text">Expiration Date: <?php echo $ex->format('Y-m-d : h:i A'); ?></p>
     <a href="tel:09159765057" class="card-text" style="color: white;"><i class="fas fa-phone"></i> 09159765057</a>
  </div>
  </div>
      <?php
     }
     else{
      ?>
      <div class="card text-white bg-warning mb-3">
  <div class="card-header">Name: <?php echo $row['uname']; ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['ordername']; ?></h5>
    <p class="card-text">Prize: &#8369; <?php echo $row['prize']; ?>.00</p>
    <p class="card-text">Expiration Date: <?php echo $ex->format('Y-m-d : h:i A'); ?></p>
     <a href="tel:09159765057" class="card-text" style="color: white;"><i class="fas fa-phone"></i> 09159765057</a>
  </div>
  </div>
      <?php
     }
    }
 
    }
   }
   else{
    include './admin/conn.php';
    $names = $_POST['searchs'];
    $query = "SELECT * FROM orders WHERE uname LIKE '%".$names."%'";
    $res = mysqli_query($connect,$query);
    if (mysqli_num_rows($res) > 0) {
       while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
    $now = date('Y-m-d H:i:s');
    $ex = new datetime($row['expiration_date']);
     if ($now > $row['expiration_date']) {
      // expired
    }
    else {
          if ($row['ordersfn'] == "finished") {
       ?>
       <div class="card text-white bg-success mb-3">
  <div class="card-header">Name: <?php echo $row['uname']; ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['ordername']; ?></h5>
    <p class="card-text">Prize: &#8369; <?php echo $row['prize']; ?>.00</p>
    <p class="card-text">Expiration Date: <?php echo $ex->format('Y-m-d : h:i A'); ?></p>
    <a href="tel:09159765057" class="card-text" style="color: white;"><i class="fas fa-phone"></i> 09159765057</a>
  </div>
  </div>
       <?php
     }
     else if ($row['ordersfn'] == "canceled"){
      ?>
      <div class="card text-white bg-danger mb-3">
  <div class="card-header">Name: <?php echo $row['uname']; ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['ordername']; ?></h5>
    <p class="card-text">Prize: &#8369; <?php echo $row['prize']; ?>.00</p>
     <p class="card-text">Expiration Date: <?php echo $ex->format('Y-m-d : h:i A'); ?></p>
     <a href="tel:09159765057" class="card-text" style="color: white;"><i class="fas fa-phone"></i> 09159765057</a>
  </div>
  </div>
      <?php
     }
     else{
      ?>
      <div class="card text-white bg-warning mb-3">
  <div class="card-header">Name: <?php echo $row['uname']; ?></div>
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['ordername']; ?></h5>
    <p class="card-text">Prize: &#8369; <?php echo $row['prize']; ?>.00</p>
   <p class="card-text">Expiration Date: <?php echo $ex->format('Y-m-d : h:i A'); ?></p>
     <a href="tel:09159765057" class="card-text" style="color: white;"><i class="fas fa-phone"></i> 09159765057</a>
  </div>
  </div>
      <?php
     }
    }
    }
    }else{
      echo '<div class="alert alert-danger">No Data To Fetch</div>';
    }
  
  }

 ?>

  