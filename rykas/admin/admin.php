<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Resto | Serve | Admin</title>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="spin.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<style>
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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Resto Serve Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <?php include 'navitem.php'; ?>
  </div>
</nav>
<div class="container">
<br>
 <div id="notif"></div>
<button class="btn btn-raised btn-success" data-toggle="modal" data-target="#add"><i class="fas fa-plus-circle"></i> Add</button>
<button class="btn btn-raised btn-info" id="reload">Reload</button>
<div class="table-responsive">
<div id="table">
<table class="table" id="datatabless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  require 'conn.php';
  $query = "SELECT * FROM tbl_menus";
  $res = mysqli_query($connect,$query);
  while ($row = mysqli_fetch_array($res)) {
      echo '
    <tr id="del'.$row['id'].'">
    <td>'.$row['id'].'</td>
    <td><img src="../upload/'.$row['image'].'" width="50" style="border-radius: 50%;" height="50"></td>
    <td>'.$row['name'].'</td>
    <td>'.$row['description'].'</td>
    <td>'.$row['category'].'</td>
    <td>
    <button class="btn btn-success edit" id="'.$row['id'].'">Edit</button>
    <button class="btn btn-danger delete" id="'.$row['id'].'">Delete</button>
    </td>
    </tr>
    ';
  }
  ?>
  </tbody>
</table>
</div>
</div>
</div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="add_form" enctype="multipart/form-data">
        <div class="form-group">
        <input type="file" accept="image/*" class="form-control" name="image" id="recipient-name" required>
		</div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="name_dish" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Prize</label>
             <input type="text" class="form-control" name="des" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Category</label>
            <br>
        <select class="form-control" id="inlineFormCustomSelect" name="cat" required>
        <option selected disabled>Choose...</option>
        <option value="Appetizers">Appetizers</option>
        <option value="Beef">Beef</option>
        <option value="Chicken">Chicken</option>
        <option value="Hot Soup">Hot Soup</option>
        <option value="Pinoy Corner">Pinoy Corner</option>
        <option value="Sizzlings">Sizzlings</option>
        <option value="Vagetables">Vagetables</option>
      </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="edit_form">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="name_dish" id="dis_names" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Prize</label>
             <input type="tnumber" class="form-control" name="des" id="dess" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary">Update</button>
      </div>
      </form>
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
<script type="text/javascript">
$(document).ready(function(){
//$('#table').load('table.php');
$('#add_form').on('submit',function(event){
event.preventDefault();
$.ajax({
url:"add.php",
method:"POST",
data:new FormData(this),
cache:false,
processData:false,
contentType:false,
success:function(data){
$('#notif').fadeIn('slow').html(data);
$('#add').modal('hide');
$('#add_form')[0].reset();
//$('#table').load('admin.php');
}
});
});
$(document).on('click','.edit', function(){
var id = $(this).attr('id');
Edit_data(id);
$.ajax({
url:"fetch_edit.php",
method:"POST",
data:{id:id},
dataType:"json",
success:function(data){
$('#dis_names').val(data.name);
$('#dess').val(data.description);
$('#edit').modal('show');
}
});
});
function Edit_data(id){
$(document).on('click','#update', function(event){
event.preventDefault();
var dis_name = $('#dis_names').val();
var descript = $('#dess').val();
$.ajax({
url:"update.php",
method:"POST",
data:{id:id,dis_name:dis_name,descript:descript},
success:function(data){
$('#notif').fadeIn('slow').html(data);
//$('#table').load('admin.php');
$('#edit').modal('hide');
}
});
});
}

$(document).on('click', '.delete', function(){
if (confirm("Delete?")) {
var id = $(this).attr('id');
$.ajax({
url:"delete.php",
method:"POST",
data:{id:id},
cache:false,
success:function(data){
$('#notif').html(data);
//$('#table').load('table.php');
$('#del'+id).fadeOut('slow');
}
});
}
});


$('#reload').click(function(){
location.reload();
});
function Reload(){
$('#table').fadeIn('slow').load('admin.php' , function(responseTxt,statusTxt,xhr){
if (statusTxt == "success") {
	$('#notif').fadeIn(500).html('<div class="alert alert-success" role="alert">Reload Success!</div>').fadeOut(2000);
	$('body').css('display', 'none');
	$('body').fadeIn('slow');
}
});
}

});
</script>
<script type="text/javascript">
$(document).ready(function(){
$("#datatabless").DataTable({
"pagingType" : "full_numbers"
});
});
</script>