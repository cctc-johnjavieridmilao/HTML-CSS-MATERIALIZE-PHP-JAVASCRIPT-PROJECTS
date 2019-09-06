
<?php 
  //include 'connection/mysqliconn.php'; 
  //$id = $_GET['id'];
  //$query = "SELECT * FROM parents WHERE id='$id'";
  //$result = mysqli_query($connect,$query);
  //$row  = mysqli_fetch_array($result);

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit AnnounceMent</title>
  <link rel="shortcut icon" href="img/Logo.png">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.css">
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
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
  <link rel="stylesheet" type="text/css" href="css/lightbox.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php 
include 'connection/mysqliconn.php'; 
 if (isset($_POST['btn_update_ann'])) {
   $title = $_POST['title'];
   $ann = $_POST['text'];
   $id = $_GET['id'];
   
   $query = "UPDATE parents SET title='$title', text='$ann' WHERE id='$id'";
   mysqli_query($connect,$query);
   session_start();
   $_SESSION['updated'] = "Update";
   header("Location:admin_ann.php");
 }
 ?>
<body style="background-color: #293344;">
<section class="content">
      <div class="row" style="width: 160%; margin-left: 150px; margin-top: 20px;">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 style="margin-left: 390px;" class="box-title">Update <?php echo $_GET['titles']; ?></h3><hr>
            </div>
           
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Title</label>
                    <input type="hidden" name="id" value="<?php echo$_GET['id']; ?>">
                    <input type="text" name="title" class="form-control" value="<?php echo $_GET['titles']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Announcement</label>
                   <textarea class="form-control" style="width: 650px;height: 300px;" name="text" id="text"><?php echo $_GET['ann'] ?></textarea>
                  </div>
                  <div class="form-group col-md-4" style="margin-top: 50px; margin-left: 400px;">
                     <input type="submit" name="btn_update_ann" class="btn btn-success" value="Update Records">
                      <a href="admin_ann.php" class="btn btn-danger">Back</a>
                  </div>
                </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>

            </form>
          </div>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
</body>
</html>


