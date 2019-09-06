
<div class="container">
<a href="" class="btn btn-success"> <span class="fas fa-redo-alt"></span> Go Back</a>
<?php 
 require 'conn.php';
 $query = "SELECT * FROM orders ORDER BY date DESC";
 $res = mysqli_query($connect,$query);

 while ($row = mysqli_fetch_array($res)) {
   $date = new DateTime($row['date']);
    ?>
  <div class="card" id="<?php echo $row['id']; ?>" style="text-align: justify;">
  <div class="card-body">
  <p class="font-weight-bold">Order date : <?php echo $date->format('l , F , j , Y , h:i:s');  ?><p>
   <p class="font-weight-bold">User Name : <?php echo $row['uname']; ?></p>
   <p class="font-weight-bold">Cp Number : <?php echo $row['cpnumber']; ?></p>
   <p class="font-weight-bold">Address : <?php echo $row['address']; ?></p>
   <p class="font-weight-bold">Order Name : <?php echo $row['ordername']; ?></p>
   <p class="font-weight-bold">Category : <?php echo $row['category']; ?></p>
   <p class="font-weight-bold">Persons : <?php echo $row['persons']; ?></p>
   <p class="font-weight-bold"><?php echo $row['pick_up_time']; ?>: <?php echo $row['dining_in_time']; ?></p>
   <p class="font-weight-bold">Prize : <?php echo $row['prize']; ?></p>
    <div id="al<?php echo $row['id']; ?>">
  <?php 
   if ($row['ordersfn'] == "finished") {
     echo '<span class="badge badge-pill badge-success">Order Finished <i class="fas fa-check-circle"></i></span>';
   }
   else if($row['ordersfn'] == "canceled") {
    echo '<span class="badge badge-pill badge-danger">Order Canceled <i class="fas fa-times-circle"></i></span>';
   }
   else{
    ?>
     <div id="btn_divs<?php echo $row['id']; ?>">
      <button type="button" id="<?php echo $row['id']; ?>" class="btn btn-raised btn-success finish">Finished</button>
      <button type="button" id="<?php echo $row['id']; ?>" class="btn btn-raised btn-danger cancel">Canceled</button>
    </div>
    <?php
   }
  ?>
  </div>
  </div>
</div>
<br>
    <?php
 }
?>
</div>
<script>
$(document).ready(function(){
$('.finish').on('click', function(){
 var id = $(this).attr('id');
  $.ajax({
    url: 'finish.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(data) {
    console.log(data);
    $('#al'+id).fadeIn('slow').html(data);
    $('#btn_divs'+id).fadeOut('slow');
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
 });

   $('.cancel').on('click', function(){
    var id = $(this).attr('id');
   $.ajax({
    url: 'cancel.php',
    type: 'POST',
    data: {id:id},
  })
  .done(function(data) {
    console.log(data);
    $('#al'+id).fadeIn('slow').html(data);
    $('#btn_divs'+id).fadeOut('slow'); 
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


