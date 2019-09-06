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
	:root {
  --input-padding-x: .75rem;
  --input-padding-y: .75rem;
}

html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 420px;
  padding: 15px;
  margin: 0 auto;
}

.form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  padding: var(--input-padding-y) var(--input-padding-x);
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}
</style>
<body>
<div class="container">
	 <form class="form-signin" id="login">
	 	<div id="boom"></div>
    <div id="user_names">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">What's your name?</h1>
      </div>

      <div class="form-label-group">
        <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required autofocus>
        
      </div>

      <div class="form-label-group">
        <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required>
      </div>
    <button class="btn btn-lg btn-primary btn-block" id="btn_name" style="font-size: 15px;"> Next</button>
    <button class="btn btn-lg btn-primary btn-block" id="btn_logins" style="font-size: 15px;"> Login</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Rykas</p>
    </div>

    <div id="Address">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">What's your Address?</h1>
      </div>

      <div class="form-label-group">
        <input type="text" id="address" name="address" class="form-control" placeholder="Address" required autofocus>
      </div>

    <button class="btn btn-lg btn-primary btn-block" id="btn_addres" style="font-size: 15px;"> Next</button>
    <button class="btn btn-lg btn-primary btn-block" id="btn_prev_address" style="font-size: 15px;"> Preview</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Rykas</p>
    </div>

    <div id="user_phonenumber">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Enter Your Phone Number</h1>
      </div>

      <div class="form-label-group">
        <input type="number" id="cpnumber" name="cpnumber" class="form-control" placeholder="Phone Number" required autofocus>
      </div>

    <button class="btn btn-lg btn-primary btn-block" id="btn_phone" style="font-size: 15px;"> Next</button>
    <button class="btn btn-lg btn-primary btn-block" id="btn_prev_phone" style="font-size: 15px;"> Preview</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Rykas</p>
    </div>

    <div id="user_password">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Enter Password</h1>
      </div>

      <div class="form-label-group">
        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required autofocus>
      </div>

    <button class="btn btn-lg btn-primary btn-block" id="btn_reg" style="font-size: 15px;"> Sign up</button>
    <button class="btn btn-lg btn-primary btn-block" id="btn_prev_pass" style="font-size: 15px;"> Preview</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Rykas</p>
    </div>

    </form>

     <div id="logindiv" style="display: none;">
      <div class="text-center mb-4">
        <h1 class="h3 mb-3 font-weight-normal">Login Your Account</h1>
      </div>
      <form class="form-signin" id="form_log">
         <div class="form-label-group">
        <input type="text" id="username" name="username" class="form-control" placeholder="First Name" required autofocus>
      </div>

      <div class="form-label-group">
        <input type="password" id="passwordss" name="passwordss" class="form-control" placeholder="Password" required>
      </div>
    <button class="btn btn-lg btn-primary btn-block" id="btn_name" style="font-size: 15px;"> Sign in</button>
    <button class="btn btn-lg btn-primary btn-block" id="btn_back" style="font-size: 15px;"> Back</button>
    </form>
      <p class="mt-5 mb-3 text-muted text-center">&copy; Rykas</p>
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
$(document).ready(function(){
function divshow(idname){
$(idname).show();
}
function divhide(idname){
$(idname).hide();
}
divhide('#Address');
divhide('#user_phonenumber');
divhide('#user_password');
$('#btn_name').click(function(event) {
if ($('#fname').val() != "" || $('#lname').val() != "") {
divshow('#Address');
divhide('#user_phonenumber');
divhide('#user_password');
divhide('#user_names');
}
});

$('#btn_addres').click(function(event) {
if ($('#address').val() != "" ) {
divshow('#user_phonenumber');
divhide('#Address');
divhide('#user_password');
divhide('#user_names');
}
});

$('#btn_phone').click(function(event) {
if ($('#cpnumber').val() != "" ) {
divshow('#user_password');
divhide('#Address');
divhide('#user_phonenumber');
divhide('#user_names');
}
});

$('#btn_prev_address').click(function(event) {
divshow('#user_names');
divhide('#Address');
divhide('#user_password');
divhide('#user_phonenumber')
});

$('#btn_prev_phone').click(function(event) {
divhide('#user_names');
divshow('#Address');
divhide('#user_password');
divhide('#user_phonenumber')
});

$('#btn_prev_pass').click(function(event) {
divhide('#user_names');
divhide('#Address');
divhide('#user_password');
divshow('#user_phonenumber')
});

$('#btn_logins').click(function(event) {
divhide('#user_names');
divhide('#Address');
divhide('#user_password');
divhide('#user_phonenumber')
divshow('#logindiv');
});

$('#btn_back').click(function(event) {
divshow('#user_names');
divhide('#Address');
divhide('#user_password');
divhide('#user_phonenumber')
divhide('#logindiv');
});

$('#btn_reg').click(function(event) {
event.preventDefault();
var fname = $('#fname').val();
var lname = $('#lname').val();
var addres = $('#address').val();
var cp = $('#cpnumber').val();
var pwd = $('#pass').val();
if ($('#pass') != "") {
$.ajax({
  url: 'submit.php',
  type: 'POST',
  data: {fname:fname,lname:lname,addres:addres,cp:cp,pwd:pwd},
})
.done(function(data) {
divhide('#Address');
divhide('#user_phonenumber');
divhide('#user_password');
divhide('#user_names');
divshow('#logindiv');
})
.fail(function() {
  console.log("error");
})
.always(function() {
  console.log("complete");
});

}
});

$('#form_log').on('submit', function(event){
event.preventDefault();
if ($('#username').val() != "" || $('#passwordss').val() != "") {
  $.ajax({
         url:'fetchlogin.php',
         method:'POST',
         data:$('#form_log').serialize(),
         cache:false,
         success:function(data){
          $('#form_log')[0].reset();
          $('#boom').html(data);
         }
       });
}
});
});
</script>