<?php 
session_start();
if(empty($_SESSION['u_name'])){
    header("location:register.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Resto | Serve</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
</head>
<style>
.d {
  position: fixed;
  top: 0;
  width: 100%;
}
  body::-webkit-scrollbar {
    width: .5em;
}
 
body::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 
body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
  }
</style>
<body>
<div class="bmd-layout-container bmd-drawer-f-l bmd-drawer-overlay d">
  <header class="bmd-layout-header">
    <div class="navbar navbar-light bg-faded">
      <button class="navbar-toggler" type="button" data-toggle="drawer" data-target="#dw-s2">
        <span class="sr-only">Toggle drawer</span>
        <i class="material-icons">menu</i>
      </button>
      <ul class="nav navbar-nav">
       <li class="nav-item"><?php echo $_SESSION['u_name']; ?></li>
      </ul>
    </div>
  </header>
  <div id="dw-s2" class="bmd-layout-drawer bg-faded">
    <header>
     <img src="photos/logo.jpg" style="height: 100px;object-fit: cover;">
    </header>
    <?php include 'sidebar1.php'; ?>
  </div>
  <main class="bmd-layout-content">
    <div class="container">
    <br>
    <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <?php 
       if (isset($_GET['appe'])) {
         echo 'Appetizers';
       }
       elseif (isset($_GET['beef'])) {
         echo 'Beef';
       }
       elseif (isset($_GET['chik'])) {
         echo 'Chicken';
       }
       elseif (isset($_GET['soup'])) {
         echo 'Hot Soup';
       }
       elseif (isset($_GET['corner'])) {
         echo 'Pinoy Corner';
       }
       elseif (isset($_GET['sizzling'])) {
         echo 'Sizzlings';
       }
       elseif (isset($_GET['vegetable'])) {
         echo 'Vegetable';
       }
       elseif (isset($_GET['noodles'])) {
         echo 'Noodles';
       }
       elseif (isset($_GET['pork'])) {
         echo 'Pork';
       }
       elseif (isset($_GET['Seafood'])) {
         echo 'Sea Food';
       }
       elseif (isset($_GET['ihaw'])) {
         echo 'Ihaw-Ihaw Corner';
       }

       ?>
    </a>
  </nav>
   <?php 
  if (isset($_GET['appe'])) { 
    ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Appetizers'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo $row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-success"><?php echo $row['category']; ?></span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
        <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
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
    ?>
      <div>
    <?php
    }
     elseif(isset($_GET['beef'])){
      ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Beef'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-info"><?php echo $row['category']; ?></span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
          <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
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
    ?>
      <div>
    <?php
     }
     elseif(isset($_GET['chik'])) {
      ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Chicken'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-primary"><?php echo $row['category']; ?></span>
       <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
         <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
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
    ?>
      <div>
    <?php
     }

     elseif(isset($_GET['soup'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Hot Soup'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-warning"><?php echo $row['category']; ?></span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
          <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
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
    ?>
      <div>
    <?php
     }
     elseif(isset($_GET['corner'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Pinoy Corner'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-danger"><?php echo $row['category']; ?></span>
     <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
          <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
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
    ?>
      <div>
    <?php
     }
     elseif(isset($_GET['sizzling'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Sizzlings'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-warning"><?php echo $row['category']; ?></span>
      <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
        <?php
      }
      else{
        echo ' <span class="badge badge-danger">Not Available</span>';
        ?>
         <a class="btn btn-success btn-sm" data-toggle="snackbar" data-content="Sorry <?php echo $row['name'] ?> is not Available">Order</a>
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
    ?>
      <div>
    <?php
     }
    elseif(isset($_GET['vegetable'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Vagetables'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-secondary"><?php echo $row['category']; ?></span>
        <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
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
    ?>
    <?php
     }
    elseif(isset($_GET['noodles'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Noodles'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-secondary"><?php echo $row['category']; ?></span>
        <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
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
    ?>
    <?php
     }
    elseif(isset($_GET['pork'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Pork'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-secondary"><?php echo $row['category']; ?></span>
        <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
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
    ?>
    <?php
     }
    elseif(isset($_GET['Seafood'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Sea Food'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-secondary"><?php echo $row['category']; ?></span>
        <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
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
    ?>
    <?php
     }
    elseif(isset($_GET['ihaw'])){
     ?>
      <br>
    <div class="row">
       <?php 
     include './admin/conn.php';
    $query = "SELECT * FROM tbl_menus WHERE category='Ihaw-Ihaw Corner'";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    $dt = new datetime($row['date']);
     ?>
     <div class="col-md-4">
     <div class="card">
    <img class="card-img-top" id="<?php echo$row['id']; ?>" style="height: 200px;object-fit: cover;" src="upload/<?php echo$row['image']; ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo mb_strimwidth($row['name'], 0, 20,"..."); ?></h5>
      <p class="card-text">&#8369; <?php echo $row['description']; ?></p>
     <span class="badge badge-secondary"><?php echo $row['category']; ?></span>
        <?php 
      if ($row['available'] == 1) {
        echo ' <span class="badge badge-success">Available</span>';
        ?>
         <a href='order1.php?name=<?php echo $row['name']; ?>' class="btn btn-success btn-sm">Order</a>
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
    ?>
      <div>
    <?php
     }

    ?>

    </div>
  </main>
</div>
<!-- Modal -->
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tt"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="res">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>

<!-- SnackbarJS plugin -->
<script src="https://cdn.rawgit.com/FezVrasta/snackbarjs/1.1.0/dist/snackbar.min.js"></script>

<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script>
  $('body').bootstrapMaterialDesign();
</script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
$('.card-img-top').click(function(){
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