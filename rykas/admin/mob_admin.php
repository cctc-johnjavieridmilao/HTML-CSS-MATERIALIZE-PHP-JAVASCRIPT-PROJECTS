<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Resto | Serve | Admin</title>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="spin.css">
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" type="text/css" href="css/index.css">
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
#alert_popover
  {
   display:block;
   position:absolute;
   bottom:50px;
   left:50px;
  }
  .wrapper {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:300px;
  }
  .alert_default {
   color: #fff;
       background-color: #4caf50;
    border-color: #4caf50;
   z-index: 1000;
    border: 0;
    border-radius: 0;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
  }

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
.custom-file-upload-1 {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

#imgInp{
  display: none;
}
#image{
  display: none;
}
</style>
<body>
<div class="zoom" style="z-index: 500">
    <a class="zoom-fab zoom-btn-large" id="zoomBtn" style="color: white;"><i class="fa fa-bars"></i></a>
    <ul class="zoom-menu">
      <li><a class="zoom-fab zoom-btn-sm zoom-btn-person scale-transition scale-out" data-toggle="modal" data-target="#add"><i class="fas fa-plus" style="color: white;"></i></a></li>
      <li><a href="admin.php" class="zoom-fab zoom-btn-sm zoom-btn-doc scale-transition scale-out" style="color: white;"><i class="fas fa-desktop"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm zoom-btn-tangram scale-transition scale-out" id="u_order"><i class="fas fa-bell"></i></a></li>
      <li><a class="zoom-fab zoom-btn-sm zoom-btn-report scale-transition scale-out" id="feed" style="color: white;"><i class="fas fa-envelope"></i></a></li>
      <li><a href="login.php" class="zoom-fab zoom-btn-sm zoom-btn-report scale-transition scale-out" style="color: white;background: black;"><i class="fas fa-sign-out-alt"></i></a></li>
    </ul>
  </div>
<br>
<div class="container-fluid" id="c_search">
<div class="bmd-form-group bmd-collapse-inline pull-xs-right">
  <button class="btn bmd-btn-icon" for="search" data-toggle="collapse" data-target="#collapse-search" aria-expanded="false" aria-controls="collapse-search">
    <i class="material-icons">search</i>
  </button>  
  <span id="collapse-search" class="collapse">
    <input class="form-control" type="text" id="search" placeholder="Search Here...">
  </span>
</div>
</div>

<button class="btn btn-warning" style="display: none;" id="c_back"><span class="fas fa-envelope"></span> Feedback</button>
<hr>
<main class="col-12 col-md-9 col-xl-8 py-md-3 pl-md-5 bd-content" role="main">
<div id="notif"></div>
<div class="bd-example-row">
<div class="row" id="res">
 
</div>
</div>
</main>



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
          <label for="file-upload" class="custom-file-upload-1">
          <i class="fas fa-upload"></i> Upload
          </label>
        <input type="file" accept="image/*" class="form-control" name="image" id="image" required>

		</div>
     <img src="" id="d_image" class="img-thumbnail">
	
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="name_dish" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Prize</label>
             <input type="text" class="form-control" name="des" id="recipient-name" required>
          </div>
           <div class="form-group">
          <label for="descriptions" class="col-form-label">Description</label>
          <textarea class="form-control" id="menu_description" name="menu_description" rows="3" required></textarea>
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
        <option value="Ihaw-Ihaw Corner">Ihaw-Ihaw Corner</option>
        <option value="Noodles">Noodles</option>
        <option value="Pinoy Corner">Pinoy Corner</option>
        <option value="Pork">Pork</option>
        <option value="Sizzlings">Sizzlings</option>
        <option value="Sea Food">Sea Food</option>
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
        <div id="no"></div>
        <form method="POST" id="edit_form" enctype="multipart/form-data">
          <input type="hidden" name="img_id" id="img_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="name_dish" id="dis_names" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Prize</label>
             <input type="number" class="form-control" name="des" id="dess" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Category</label>
            <select class="form-control" id="cat_update" name="cat_update">
              <option value="Appetizers">Appetizers</option>
              <option value="Beef">Beef</option>
              <option value="Chicken">Chicken</option>
              <option value="Hot Soup">Hot Soup</option>
               <option value="Ihaw-Ihaw Corner">Ihaw-Ihaw Corner</option>
              <option value="Noodles">Noodles</option>
              <option value="Pinoy Corner">Pinoy Corner</option>
              <option value="Pork">Pork</option>
              <option value="Sizzlings">Sizzlings</option>
              <option value="Sea Food">Sea Food</option>
              <option value="Vagetables">Vagetables</option>
            </select>
          </div>
          <div class="form-group">
          <label for="descriptions" class="col-form-label">Description</label>
          <textarea class="form-control" id="edit_menu_description" name="edit_menu_description" rows="3" required></textarea>
        </div>
          <div class="form-group" id="img_p">
            
          </div>
          <label for="file-upload" class="custom-file-upload">
          <i class="fas fa-upload"></i> Change Photo
          </label>
          <br>
          <span class="badge badge-pill badge-success" id="img_name"></span>
          <br>
          <input type="file" name="image" id="imgInp">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="show" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Feedback</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="detail" style="text-align: justify;">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="alert_popover">
    <div class="wrapper">
     <div class="content">

     </div>
    </div>
   </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.5.0/velocity.min.js"></script>
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
var input = document.getElementById('imgInp');
var infoArea = document.getElementById('img_name');

input.addEventListener( 'change', showFileName );

function showFileName(event) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = fileName;
}

$('.custom-file-upload').bind("click" , function () {
  $('#imgInp').click();
  });
$('.custom-file-upload-1').bind("click" , function () {
  $('#image').click();
  });
  // clear field value  once closed
  $(function() {
    $('#collapse-search').on('hidden.bs.collapse', function() {
      $('#search').val('')
    })
  });

$(document).ready(function(){
$('#res').load('mob_fetch.php');
$('body').css('display', 'none');
$('body').fadeIn('slow');
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
$('#res').load('mob_fetch.php');
}
});
});

$('#search').keyup(function(event){
event.preventDefault();
//var count = $('.item').length;
var searchs = $('#search').val();
$.ajax({
  url: "fetch_search.php",
  type: "POST",
  data:{searchs:searchs},
})
.done(function(data){
 $('#res').html(data);
})
.fail(function(){
console.log('Error');
})
.always(function(){
console.log('Complete');
});
});

$(document).on('click','.avail', function(){
var id = $(this).attr('id');
$.ajax({
url:"fetch_availability.php",
method:"POST",
data:{id:id},
success:function(data){
console.log('Available');
//$('.notavail'+id).fadeIn();
//$('.avail'+id).fadeOut();
//window.location.reload();
$('#aa'+id).text('Available');
}
});
});

$(document).on('click','.notavail', function(){
var avail_id = $(this).attr('id');
$.ajax({
url:"fetch_availability.php",
method:"POST",
data:{avail_id:avail_id},
success:function(data){
console.log('Not Available');
//$('.notavail'+id).fadeIn();
//$('.avail'+id).fadeOut();
$('#aa'+avail_id).text('Not Available');
}
});
});


$(document).on('click','.edit', function(){
var id = $(this).attr('id');
//var image_inp = $('#imgInp').val();
//Edit_data(id);
$.ajax({
url:"fetch_edit.php",
method:"POST",
data:{id:id},
dataType:"json",
success:function(data){
$('#img_id').val(data.id);
$('#dis_names').val(data.name);
$('#dess').val(data.description);
$('#edit_menu_description').val(data.descriptions);
$('#cat_update').val(data.category);
$('#img_name').text(data.image);
$('#img_p').html('<img class="img-thumbnail" id="ch_p" src="../upload/'+data.image+'">');
$('#edit').modal('show');
}
});
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#ch_p').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

function readpic(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#d_image').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
$("#image").change(function() {
  readpic(this);
});

$("#edit_form").on('submit',function(event) {
event.preventDefault();
$.ajax({
url:"update.php",
method:"POST",
data:new FormData(this),
cache:false,
processData:false,
contentType:false,
success:function(data){
$('#notif').fadeIn('slow').html(data);
$('#res').load('mob_fetch.php');
$('#edit').modal('hide');
}
});
});

$(document).on('click', '.delete', function(){
var id = $(this).attr('id');
$.ajax({
url:"delete.php",
method:"POST",
data:{id:id},
cache:false,
success:function(data){
$('#notif').html(data);
$('#cr'+id).fadeOut('slow');
}
});
});

$('#reload').click(function(){
Reload();
});

$('#feed').click(function(){
LoadFeed();
$('#c_search').hide();
$('#c_back').show();
$('#c_back').text('FEEDBACK');
});


$('#u_order').click(function(){
Loadorders();
$('#c_search').hide();
$('#c_back').show();
$('#c_back').text('ORDERS');
});

function Reload(){
$('#res').fadeIn('slow').load('mob_fetch.php' , function(responseTxt,statusTxt,xhr){
if (statusTxt == "success") {
	$('#notif').fadeIn(500).html('<div class="alert alert-success" role="alert">Reload Success!</div>').fadeOut(2000);
	$('body').css('display', 'none');
	$('body').fadeIn('slow');
}
});
}

function LoadFeed(){
 $('#res').fadeIn('slow').load('mob_feedback.php' , function(responseTxt,statusTxt,xhr){
if (statusTxt == "success") {
	$('#notif').fadeIn(500).html('<div class="alert alert-success" role="alert">load Success!</div>').fadeOut(2000);
	$('body').css('display', 'none');
	$('body').fadeIn('slow');
}
});
}

function Loadorders(){
 $('#res').fadeIn('slow').load('user_orders.php' , function(responseTxt,statusTxt,xhr){
if (statusTxt == "success") {
  $('#notif').fadeIn(500).html('<div class="alert alert-success" role="alert">load Success!</div>').fadeOut(2000);
  $('body').css('display', 'none');
  $('body').fadeIn('slow');
}
});
}


$('#zoomBtn').click(function() {
  $('.zoom-btn-sm').toggleClass('scale-out');
  if (!$('.zoom-card').hasClass('scale-out')) {
    $('.zoom-card').toggleClass('scale-out');
  }
});

$('.zoom-btn-sm').click(function() {
  var btn = $(this);
  var card = $('.zoom-card');

  if ($('.zoom-card').hasClass('scale-out')) {
    $('.zoom-card').toggleClass('scale-out');
  }
  if (btn.hasClass('zoom-btn-person')) {
    card.css('background-color', '#d32f2f');
  } else if (btn.hasClass('zoom-btn-doc')) {
    card.css('background-color', '#fbc02d');
  } else if (btn.hasClass('zoom-btn-tangram')) {
    card.css('background-color', '#388e3c');
  } else if (btn.hasClass('zoom-btn-report')) {
    card.css('background-color', '#1976d2');
  } else {
    card.css('background-color', '#7b1fa2');
  }
});


 $(document).ready(function(){  
      $(document).on('click','.view',function(){
           var id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{id:id},  
                success:function(data){  
                     $('#detail').html(data);  
                     $('#show').modal("show");  
                   
                }  
           });  
      });  
 });  

setInterval(function(){
  load_last_notification();
 }, 7000);

 function load_last_notification()
 {
  $.ajax({
   url:"notif.php",
   method:"POST",
   success:function(data)
   {
    $('.content').html(data);
   }
  })
 }
});
</script>