<?php 
session_start();
if(empty($_SESSION['u_name'])){
    header("location:register.php");
}
include './admin/conn.php';
$namess = $_SESSION['u_name'];
$querys = "SELECT * FROM tbl_users WHERE fname = '$namess'";
$ress = mysqli_query($connect,$querys);
$rows = mysqli_fetch_assoc($ress);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="
   sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="spin.css">
</head>
<body>
<nav class="navbar navbar-light bg-light">
<button type="button" id="back" class="btn bmd-btn-icon">
 <i class="material-icons">arrow_back</i>
</button>
</nav>
<?php  
$name = $_GET['name'];
include './admin/conn.php';
$query = "SELECT * FROM tbl_menus WHERE name = '$name'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_assoc($res)
?>
<div class="container">
 <form method="POST" id="send_order">
  <br>
  <div id="boom"></div>
  <div class="form-group">
    <label for="formGroupExampleInput">Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $rows['fname']; ?> <?php echo $rows['lname']; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Phone number</label>
    <input type="number" class="form-control" id="cp" name="cp" placeholder="Phone number" value="<?php echo $rows['cpnum']; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $rows['address']; ?>">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Category</label>
    <input type="text" class="form-control" id="cat" readonly name="cat" value="<?php echo $row['category']; ?>" placeholder="Category">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Order name</label>
    <input type="text" class="form-control" id="o_name" readonly name="o_name" value="<?php echo $row['name']; ?>" placeholder="Order Name">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Prize</label>
    <input type="text" class="form-control" id="prize" readonly name="prize" readonly value="<?php echo intval($row['description']); ?>" placeholder="Prize">
  </div>
  <input type="hidden" id="tete" value="<?php echo intval($row['description']); ?>">
  <div class="form-group">
     <label for="formGroupExampleInput2">For How Many Person?</label>
    <select class="form-control" name="persons" id="persons">
        <option selected disabled>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
        <option value="4">Four</option>
      </select>
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">What Time?</label>
    <input type="text" class="form-control" name="dine_in" id="dine_in">
  </div>
  <div class="form-group" style="display: none;">
    <label for="formGroupExampleInput2">Pick Up. What Time?</label>
    <input type="text" class="form-control" name="pick_up" id="pick_up">
  </div>
  <div class="form-group">
   <button type="button" id="show_details_order" class="btn btn-raised btn-success"> <span class="fas fa-paper-plane"></span> Order</button>
  </div>
</form>
</div>
<!-- Modal -->
<div class="modal fade" id="alert_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="boom_1"></div>
      <div class="modal-body">
        <dl class="row">
          <dt class="col-sm-4">Name: </dt>
          <dd class="col-sm-8" id="user_names"></dd>
          <dt class="col-sm-4">Cp Number: </dt>
          <dd class="col-sm-8" id="user_cpnumber"></dd>
          <dt class="col-sm-4">Address: </dt>
          <dd class="col-sm-8" id="user_address"></dd>
          <dt class="col-sm-4">Category: </dt>
          <dd class="col-sm-8" id="user_cat"></dd>
          <dt class="col-sm-4">Order: </dt>
          <dd class="col-sm-8" id="user_order_name"></dd>
          <dt class="col-sm-4">Prize: </dt>
          <dd class="col-sm-8" id="user_prize"></dd>
          <dt class="col-sm-4">For: </dt>
          <dd class="col-sm-8" id="user_counts"></dd>
          <dt class="col-sm-4" id="pp"></dt>
          <dd class="col-sm-8" id="user_dine_in_time"></dd>
        </dl>
      </div>
      <div class="modal-footer">
        <button type="button" id="place_order" class="btn btn-success">Place Order</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel Order</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="time_picker_in" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label for="formGroupExampleInput2">Time</label>
      <select class="form-control" id="time">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>
      </div>
      <div class="form-group">
      <label for="formGroupExampleInput2">Minutes</label>
      <select class="form-control" id="min">
<option value="00">00</option>
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
      </select>
      </div>
      <div class="form-group">
       <select class="form-control" id="pm_am">
         <option value="AM">AM</option>
         <option value="PM">PM</option>
       </select>
      </div>
      <div class="form-group">
       <select class="form-control" id="picking">
         <option value="Dine in">Dine In</option>
         <option value="Pick up">Pick Up</option>
       </select>
      </div>
      <input type="hidden" id="picking_up">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_time" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="time_picker_pick" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select Time</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="form-group">
      <label for="formGroupExampleInput2">Time</label>
      <select class="form-control" id="time_pick">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>
      </div>
      <div class="form-group">
      <label for="formGroupExampleInput2">Minutes</label>
      <select class="form-control" id="min_pick">
        <option value="01">01</option>
        <option value="02">02</option>
        <option value="03">03</option>
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="06">06</option>
        <option value="07">07</option>
        <option value="08">08</option>
        <option value="09">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
      </select>
      </div>
      <div class="form-group">
       <select class="form-control" id="pm_am_pick">
         <option value="AM">AM</option>
         <option value="PM">PM</option>
       </select>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="save_time_pick" class="btn btn-primary">Save changes</button>
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
<script type="text/javascript">
$('#back').click(function(){
window.location.href = "index1.php";
});

$(document).ready(function(){

$('#save_time').click(function(){
$('#dine_in').val($('#time').val() +' : '+ $('#min').val() +' : '+ $('#pm_am').val());
$('#time_picker_in').modal('hide');
});

$('#save_time_pick').click(function(){
$('#pick_up').val($('#time_pick').val() +' : '+ $('#min_pick').val() +' : '+ $('#pm_am_pick').val());
$('#time_picker_pick').modal('hide');
});

$('#persons').on('change', function() {
const prize_2 = $('#tete').val() * 2;
const prize_3 = $('#tete').val() * 3;
const prize_4 = $('#tete').val() * 4;
const def =  $('#tete').val();

if ($(this).val() == "1") {
$('#prize').val(def);
}
else if ($(this).val() == "2") {
$('#prize').val(prize_2);
}
else if ($(this).val() == "3") {
$('#prize').val(prize_3); 
}
else if ($(this).val() == "4") {
$('#prize').val(prize_4);
}
});


$('#show_details_order').click(function(){
var name_1 = $('#name').val();
var cp_1 = $('#cp').val();
var cat_1 = $('#cat').val();
var order_name_1 = $('#o_name').val();
var order_prize_1 = $('#prize').val();
var persons_1 = $('#persons').val();
var u_address_1 = $('#address').val();
var user_dine_in_1 = $('#dine_in').val();
var user_pick_up_1 = $('#pick_up').val();
if (name_1 == "" || cp_1 == "" || cat_1 == "" || order_name_1 == "" || order_prize_1 == "" || persons_1 == "" || u_address_1 == "" || user_dine_in_1 == "") {
$('#boom').html('<div class="alert alert-danger" role="alert">Please fill out All Fields!</div>');
}
else{
$('#user_names').text(name_1);
$('#user_cpnumber').text(cp_1);
$('#user_address').text(u_address_1);
$('#user_cat').text(cat_1);
$('#user_order_name').text(order_name_1);
$('#user_prize').text(order_prize_1);
$('#user_counts').text(persons_1);
$('#user_dine_in_time').text(user_dine_in_1);
$('#pp').text($('#picking').val());
$('#alert_order').modal('show');
}
});

$('#place_order').click(function(e){
  e.preventDefault();
var user_names_2 = $('#user_names').text();
var user_cpnumber_2 = $('#user_cpnumber').text();
var user_address_2 = $('#user_address').text();
var user_cat_2 = $('#user_cat').text();
var user_order_name_2 = $('#user_order_name').text();
var user_prize_2 = $('#user_prize').text();
var user_counts_2 = $('#user_counts').text();
var user_dine_in = $('#dine_in').val();
var pp_text = $('#pp').text();
 $.ajax({
  url:"send_order.php",
  method:"POST",
  dataType:'html',
  data:{
  user_names_2:user_names_2,
  user_cpnumber_2:user_cpnumber_2,
  user_address_2:user_address_2,
  user_cat_2:user_cat_2,
  user_order_name_2:user_order_name_2,
  user_prize_2:user_prize_2,
  user_counts_2:user_counts_2,
  user_dine_in:user_dine_in,
  pp_text:pp_text
  },
  cache:false,
  success:function(data){
    $('#boom').html(data);
    $('#send_order')[0].reset();
    $('#alert_order').modal('hide');
  }
 });
});

$('#dine_in').click(function(){
$('#time_picker_in').modal('show');
});
$('#pick_up').click(function(){
$('#time_picker_pick').modal('show');
});
});
</script> 