<?php require_once 'connect.php'; require_once 'functions.php'; include 'adminselect.php';?>
<?php  
 include 'count.php';
 ?>
 <?php 
include 'connection/mysqliconn.php';

$item_per_page = 6;

$results = mysqli_query($connect,"SELECT COUNT(*) FROM message_user");
$get_total_rows = mysqli_fetch_array($results); //total records

//break total records into pages
$pages = ceil($get_total_rows[0]/$item_per_page);  

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
    <link rel="stylesheet" type="text/css" href="css/uikit.min.css">
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
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
  .dropup,
.dropdown {
  position: relative;
}
.dropdown-toggle:focus {
  outline: 0;
}
  .dropdown-menu2 {
  position: absolute;
  top: 100%;
  left: -380px;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  text-align: left;
  list-style: none;
  background-color: #fff;
  -webkit-background-clip: padding-box;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
  box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
  max-height: 350px !important;
}
.dropdown-menu2.pull-right {
  right: 0;
  left: auto;
}
.dropdown-menu2 .divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}
.dropdown-menu2 > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.42857143;
  color: #333;
  white-space: nowrap;
}
.dropdown-menu2 > li > a:hover,
.dropdown-menu2 > li > a:focus {
  color: #262626;
  text-decoration: none;
  background-color: #f5f5f5;
}
.dropdown-menu2 > .active > a,
.dropdown-menu2 > .active > a:hover,
.dropdown-menu2 > .active > a:focus {
  color: #fff;
  text-decoration: none;
  background-color: #337ab7;
  outline: 0;
}
.dropdown-menu2 > .disabled > a,
.dropdown-menu2 > .disabled > a:hover,
.dropdown-menu2 > .disabled > a:focus {
  color: #777;
}
.dropdown-menu2 > .disabled > a:hover,
.dropdown-menu2 > .disabled > a:focus {
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
}
.open > .dropdown-menu2 {
  display: block;
}
.open > a {
  outline: 0;
}
.dropdown-menu2-right {
  right: 0;
  left: auto;
}
.dropdown-menu2-left {
  right: auto;
  left: 0;
}
.dropdown-header {
  display: block;
  padding: 3px 20px;
  font-size: 12px;
  line-height: 1.42857143;
  color: #777;
  white-space: nowrap;
}
.dropdown-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 990;
}
.pull-right > .dropdown-menu2 {
  right: 0;
  left: auto;
}
.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
  content: "";
  border-top: 0;
  border-bottom: 4px dashed;
  border-bottom: 4px solid \9;
}
.dropup .dropdown-menu2,
.navbar-fixed-bottom .dropdown .dropdown-menu2 {
  top: auto;
  bottom: 100%;
  margin-bottom: 2px;
}
.scrollable-menu2 {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
.scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
.scrollable-menu1 {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
.dropup,
.dropdown {
  position: relative;
}
.dropdown-toggle:focus {
  outline: 0;
}
  .dropdown-menu1 {
  position: absolute;
  top: 100%;
  left: -100px;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  text-align: left;
  list-style: none;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
          box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
          max-height: 350px !important;
}
.dropdown-menu1.pull-right {
  right: 0;
  left: auto;
}
.dropdown-menu1 .divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}
.dropdown-menu1 > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.42857143;
  color: #333;
  white-space: nowrap;
}
.dropdown-menu1 > li > a:hover,
.dropdown-menu1 > li > a:focus {
  color: #262626;
  text-decoration: none;
  background-color: #f5f5f5;
}
.dropdown-menu1 > .active > a,
.dropdown-menu1 > .active > a:hover,
.dropdown-menu1 > .active > a:focus {
  color: #fff;
  text-decoration: none;
  background-color: #337ab7;
  outline: 0;
}
.dropdown-menu1 > .disabled > a,
.dropdown-menu1 > .disabled > a:hover,
.dropdown-menu1 > .disabled > a:focus {
  color: #777;
}
.dropdown-menu1 > .disabled > a:hover,
.dropdown-menu1 > .disabled > a:focus {
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
}
.open > .dropdown-menu1 {
  display: block;
}
.open > a {
  outline: 0;
}
.dropdown-menu1-right {
  right: 0;
  left: auto;
}
.dropdown-menu1-left {
  right: auto;
  left: 0;
}
.dropdown-header {
  display: block;
  padding: 3px 20px;
  font-size: 12px;
  line-height: 1.42857143;
  color: #777;
  white-space: nowrap;
}
.dropdown-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 990;
}
.pull-right > .dropdown-menu1 {
  right: 0;
  left: auto;
}
.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
  content: "";
  border-top: 0;
  border-bottom: 4px dashed;
  border-bottom: 4px solid \9;
}
.dropup .dropdown-menu1,
.navbar-fixed-bottom .dropdown .dropdown-menu1 {
  top: auto;
  bottom: 100%;
  margin-bottom: 2px;
}
.dropup,
.dropdown {
  position: relative;
}
.dropdown-toggle:focus {
  outline: 0;
}
  .dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1000;
  display: none;
  float: left;
  min-width: 160px;
  padding: 5px 0;
  margin: 2px 0 0;
  font-size: 14px;
  text-align: left;
  list-style: none;
  background-color: #fff;
  -webkit-background-clip: padding-box;
          background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 4px;
  -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
          box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
          max-height: 350px !important;
}
.dropdown-menu.pull-right {
  right: 0;
  left: auto;
}
.dropdown-menu .divider {
  height: 1px;
  margin: 9px 0;
  overflow: hidden;
  background-color: #e5e5e5;
}
.dropdown-menu > li > a {
  display: block;
  padding: 3px 20px;
  clear: both;
  font-weight: normal;
  line-height: 1.42857143;
  color: #333;
  white-space: nowrap;
}
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
  color: #262626;
  text-decoration: none;
  background-color: #f5f5f5;
}
.dropdown-menu > .active > a,
.dropdown-menu > .active > a:hover,
.dropdown-menu > .active > a:focus {
  color: #fff;
  text-decoration: none;
  background-color: #337ab7;
  outline: 0;
}
.dropdown-menu > .disabled > a,
.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
  color: #777;
}
.dropdown-menu > .disabled > a:hover,
.dropdown-menu > .disabled > a:focus {
  text-decoration: none;
  cursor: not-allowed;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
}
.open > .dropdown-menu1 {
  display: block;
}
.open > a {
  outline: 0;
}
.dropdown-menu-right {
  right: 0;
  left: auto;
}
.dropdown-menu-left {
  right: auto;
  left: 0;
}
.dropdown-header {
  display: block;
  padding: 3px 20px;
  font-size: 12px;
  line-height: 1.42857143;
  color: #777;
  white-space: nowrap;
}
.dropdown-backdrop {
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 990;
}
.pull-right > .dropdown-menu {
  right: 0;
  left: auto;
}
.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
  content: "";
  border-top: 0;
  border-bottom: 4px dashed;
  border-bottom: 4px solid \9;
}
.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-bottom: 2px;
}
.pagination {
   display: -ms-flexbox;
  padding: 0px;
  margin: 0px;
  height: 30px;
  display: block;
  text-align: center;
}
.pagination li {
 position: relative;
  display: inline-block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: white;
  background-color: #fff;
  border: 1px solid #dee2e6;
}
.pagination .disabled {
  color: #6c757d;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #dee2e6;
  display: inline-block;
}
.pagination li a{
   -webkit-transition: all 0.3s linear;
  -o-transition: all 0.3s linear;
  transition: all 0.3s linear;
  outline: 0;
  border: 0;
  background-color: transparent;
  font-size: 0.9rem;
  color: #212529;;
}
.pagination li:hover {
  z-index: 2;
  color: #0056b3;
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.pagination li:focus {
  z-index: 2;
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.pagination li:not(:disabled):not(.disabled) {
  cursor: pointer;
}

.pagination a:first-child .pagination li {
  margin-left: 0;
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.pagination a:last-child .pagination li {
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}

#results .loading-indication{
  background: #FFFFFF;
  padding: 10px;
  margin-left: auto;
  margin-right: auto;
  position: absolute;
}

.lds-ring {
  display: inline-block;
  position: relative;
  width: 64px;
  height: 64px;

}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 51px;
  height: 51px;
  margin: 6px;
  border: 6px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: green transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include 'header.php'; ?>
  <?php include 'sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Message
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Feedback</li>
      </ol>
    </section>
   <br>
<section class="content">
   <div id="resulta"></div>
   <div align="center" id="resul" style="display: none;"><img src="loaders/loading.gif">
   </div>
        <div class="pagination"></div><br><br>
</section>

    <!-- Main content -->
      <!--------------------------
        | Your Page Content Here |
        -------------------------->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Cauayan-Campus
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Isabela State University</a>.</strong> All rights reserved.
  </footer>

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

<div id="view" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                
                 <div class="modal-header" style="background-color: green;text-align: center;">  
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                <h4 class="modal-title" id="name" style="font-size: 18px;color: white;"> 
                  <span class="fas fa-sign-out-alt"> </span> </h4>  
                </div>
                 
                  <div class="modal-body" id="data_com">

                </div> 

                <div class="modal-footer">  
                     <button type="button" class="btn btn-danger" data-dismiss="modal"> <span class="fas fa-times"> Close</span></button> 

                </div>  
           </div>  
      </div>  
 </div>   

<div id="approve" class="modal fade" role="dialog" style="z-index: 1400;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <h4 class="modal-title">Confirm Account</h4><br>
        <form action="" method="post" class="main">
        <label>Enter Account Code</label>
        <input class="form-text form-control" required name="confirm_code"  />
        <br />
        <input style="margin-top: 0 auto;margin: 0 auto;"  type="submit" class="form-submit btn btn-success"  name="approve" value="Approve">
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
      </form>
      </div>      
    </div>
  </div>
</div>
  <?php include 'postnew_postann.php'; ?>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="js/jquery.bootpag.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
<script type="text/javascript">
$(document).ready(function() {
  //initial page number to load
  $("#resulta").load("fetch_paginate_msg.php").fadeIn('slow');
  $(".pagination").bootpag({
     total: <?php echo $pages; ?>,
     page: 1,
     maxVisible: 5 
  }).on("page", function(e, num){
    e.preventDefault();
    if(true){
      $("#resul").show();
      $("#resulta").hide();
       setTimeout(function(){
        $("#resul").hide();
     $("#resulta").fadeOut("slow").load("fetch_paginate_msg.php", {'page':num}).fadeIn(1500);
    },2000);
    }
    
  });

});
</script>
<script type="text/javascript">
  $(document).on('click','.view',function() {
   var id = $(this).attr('id');
   $.ajax({
    url:'select_msg.php',
    method:'POST',
    data:{id:id},
    beforeSend:function(){
    $('#view_spin'+id).show();
    },
    success:function(data){
        setTimeout(function(){
      $('#view_spin'+id).hide();
     $('#data_com').html(data); 
     $('#view').modal('show');
      },2000);
    }
   });
  });
   $(document).on('click','.view',function() {
   var id = $(this).attr('id');
   $.ajax({
    url:'select_msg_name.php',
    method:'POST',
    data:{id:id},
    beforeSend:function(){
    $('#view_spin'+id).show();
    },
    success:function(data){
       setTimeout(function(){
      $('#view_spin'+id).hide();
     $('#name').html(data); 
      },2000);
    }
   });
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
    
    readProducts(); /* it will load products when document loads */
    
    $(document).on('click', '#delete_product', function(e){
      
      var productId = $(this).data('id');
      SwalDelete(productId);
      e.preventDefault();
    });
    
  });
  
  function SwalDelete(productId){
    
    swal({
      title: 'Are you sure?',
      text: "It will be deleted permanently!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      showLoaderOnConfirm: true,
        
      preConfirm: function() {
        return new Promise(function(resolve) {
             
           $.ajax({
            url: 'deletemessagenotif.php',
            type: 'POST',
              data: 'delete='+productId,
              dataType: 'json'
           })
           .done(function(response){
            swal('Deleted!', response.message, response.status);
            window.location.reload(true);
            readProducts();
           })
           .fail(function(){
            swal('Oops...', 'Something went wrong with ajax !', 'error');
           });
        });
        },
      allowOutsideClick: false        
    }); 
    
  }
  
  function readProducts(){
    $('#load-products').load('viewallcoments.php'); 
  }
  
</script>