<?php require_once 'connect.php'; require_once 'functions.php'; include 'adminselect.php';?>

<?php  
 include 'count.php';
 ?>
 <?php AdminSafe(); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AlumniTracking Admin</title>
  <link rel="shortcut icon" href="img/Logo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
      <script src="js/uikit.js"></script>
    <script src="js/uikit.min.js"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
    <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.3/sweetalert2.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" type="text/css" href="css/Lastadmin.css">
  <link rel="stylesheet" type="text/css" href="css/notiny.min.css">

 
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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

<body class="hold-transition skin-blue sidebar-mini">
  <?php 
   if(isset($_SESSION['welcomeadmin'])):
    echo "<script>swal('Welcome Admin','','success');</script>";
  endif;
  unset($_SESSION['welcomeadmin']);
   ?>
 <?php include 'header.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI ASSOCIATION ADMIN
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Home</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      <div id="load_data"></div>
      <div id="content_hide_show">
    	<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Employed</span> 
              <a href="#" style="color: black;"  data-toggle="popover" data-html="true" data-placement="bottom" data-content="<?php Displayname(); ?>" class="info-box-number pop"><?php CountEmployed();?></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">UnEmployed</span> 
              <a href="#" style="color: black;" data-toggle="popover" data-html="true" data-placement="bottom" data-content="<?php DisplaynameUnemploy(); ?>" class="info-box-number pop"><?php CountUnEmployed();?></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">SelfEmployed</span> 
              <a href="#" style="color: black;" data-toggle="popover" data-html="true" data-placement="bottom" data-content="<?php DisplaynameSelf(); ?>" class="info-box-number pop"><?php CountSelfemploy(); ?></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ofw</span> 
              <a href="#" style="color: black;" data-toggle="popover" data-html="true" data-placement="bottom" data-content="<?php Displaynameofw(); ?>" class="info-box-number pop"><?php Countofw(); ?></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Viewers</span>
              <span class="info-box-number"><?php CountVisitor(); ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="visibility: hidden;">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-user-graduate"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span> 
              <a href="#" style="color: black;" data-toggle="popover" data-html="true" data-placement="bottom" data-content="<?php DisplayAccname(); ?>" class="info-box-number pop"><?php CountAccount(); ?></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12" style="visibility: hidden;">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-user-graduate"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span> 
              <a href="#" style="color: black;" data-toggle="popover" data-html="true" data-placement="bottom" data-content="<?php DisplayAccname(); ?>" class="info-box-number pop"><?php CountAccount(); ?></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         <div class="col-md-3 col-sm-6 col-xs-12" style="">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-user-graduate"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span> 
              <a href="#" style="color: black;" data-toggle="popover" data-html="true" data-placement="bottom" data-content="<?php DisplayAccname(); ?>" class="info-box-number pop"><?php CountAccount(); ?></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
    </div>
    <div align="center">
    	<img style="margin-top: -70px;" src="img/alumnilogofirst.png" height="330" width="330">
    </div>
  </div>
     
     </section>
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
     <div id="alert_popover"></div>
    <div class="wrappers"></div>
     <div class="contents"></div>
   
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <?php include 'footer.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Admin Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Admin Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
 <?php include 'postnew_postann.php'; ?>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="js/notiny.min.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/bootstrap/js/popover.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
<script>
$(document).ready(function(){
    $(".pop").popover({ trigger: "manual" , html: true, animation:false})

    .on("mouseenter", function () {
        var _this = this;
        $(this).popover("show");
        $(".popover").on("mouseleave", function () {
            $(_this).popover('hide');
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide");
            }
        }, 300);
});

    $('body').css('display', 'none');
    $('body').fadeIn(1000);

});
</script>
<script>
  function Show(){
    swal(
  'You Generated Succesfull to Excel Click The File Below :)!',
  'You clicked the button!',
  'success'
)
  }
</script>
<script>
  function Show1(){
    swal(
  'You Generated Succesfull to PDF :)!',
  'You clicked the button!',
  'success'
)
  }
</script>
<script>
     $('.button').click(function(){
        var printme = document.getElementById('example2');
        var wme = window.open("","","width=900,height=700");
        wme.document.write('<html><head><title>' + "Alumni Records" + '</title>');
        //wme.document.write('<h4>' + "Alumni Records" + '</h4>');
        wme.document.write(printme.outerHTML);
        wme.document.close();
        wme.focus();
        wme.print();
        wme.close();
     })
 </script>
 <?php include 'script.php' ?>
<script>
      $(document).ready(function(){

       setInterval(function(){
        load_last_notification();
       }, 5000);

       function load_last_notification()
       {
        $.ajax({
         url:"fetchregnotif.php",
         method:"POST",
         success:function(data)
         {
          $('.contents').html(data);
         }
        })
       }
    });
  </script>
