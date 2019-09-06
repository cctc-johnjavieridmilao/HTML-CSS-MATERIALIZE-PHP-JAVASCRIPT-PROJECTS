<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Resto | Serve</title>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="
   sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="spin.css">
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
  .card {
    background-color: #f5f5f5!important;
    border: 0;
    border-radius: 0;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);

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
        <li class="nav-item">Resto Serve</li>
      </ul>
    </div>
  </header>
  <div id="dw-s2" class="bmd-layout-drawer bg-faded">
    <header>
      <img src="photos/logo.jpg" style="height: 100px;object-fit: cover;">
    </header>
     <?php include 'sidebar.php'; ?>
  </div>
  <main class="bmd-layout-content">
    <br>
    <div class="container">
       
    <br>
    <nav class="navbar navbar-light bg-light">
  	<a class="navbar-brand" href="#">Menus</a>
	</nav>
  <br>
 <div class="row">
    <div class="col-md-6">
       <div class="form-group">
    <label for="exampleInputPassword1" class="bmd-label-floating">Search</label>
    <input type="serach" name="search" id="search" class="form-control">
  </div>
     
    </div>
    <div class="col-md-6">
      <div class="form-group">
    <label for="exampleSelect1" class="bmd-label-floating">Filter Category</label>
    <select class="form-control" id="filters">
    <option value="all">All</option>
    <?php 
    include './admin/conn.php';
    $query = "SELECT category FROM tbl_menus group by category";
    $res = mysqli_query($connect,$query);
    while ($row = mysqli_fetch_array($res)) {
    ?>
    <option value="<?php echo $row['category']; ?>"><?php echo $row['category']; ?></option>
    <?php
    }
    ?>
     </select>
    </div> 
    </div>
  </div>
	<br>
    <div class="row" id="results">
    </div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
</body>
</html>
<script>
$(document).ready(function(){
$('#results').load('data_search.php');
$('#search').keyup(function(event){
event.preventDefault();
//var count = $('.item').length;
var searchs = $('#search').val();
$.ajax({
  url: "data_search.php",
  type: "POST",
  data:{searchs:searchs},
})
.done(function(data){
 $('#results').html(data);
})
.fail(function(){
console.log('Error');
})
.always(function(){
console.log('Complete');
});
});

$('#filters').change(function(event){
event.preventDefault();
var vals = $('option:selected').val();
$.ajax({
  url: 'filter.php',
  type: 'POST',
  data: {vals:vals},
})
.done(function(data) {
  $('#results').html(data);
  if (vals == "all") {
  $('#results').load('data_search.php');
}
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