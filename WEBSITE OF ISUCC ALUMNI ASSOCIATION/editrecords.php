<?php include 'fetchedit.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Records</title>
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
<body style="background-color: #293344;">
<section class="content">
      <div class="row" style="width: 160%; margin-left: 150px; margin-top: 20px;">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 style="margin-left: 390px;" class="box-title">Update <?php echo $_GET['fname']; ?> Records</h3><hr>
            </div>
           
            <form role="form" method="POST">
              <div class="box-body">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>First Name</label>
                    <input type="hidden" name="id" value="<?php echo$_GET['id']; ?>">
                    <input type="text" name="fname" class="form-control" value="<?php echo$_GET['fname']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Middle Name</label>
                    <input type="text" name="mname" class="form-control" value="<?php echo$_GET['mname']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Last Name</label>
                    <input type="text" name="lname" class="form-control" value="<?php echo$_GET['lname']; ?>">
                  </div>
                  <div class="form-group col-md-7">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo$_GET['address']; ?>">
                  </div>
                  <div class="form-group col-md-5">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="<?php echo$_GET['email']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label>CP Number</label>
                    <input type="text" name="cpnumber" class="form-control" value="<?php echo$_GET['cpnumber']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Gender</label>
                    <input type="text" name="gender" class="form-control" value="<?php echo$_GET['gender']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label>Age</label>
                    <input type="text" name="age" class="form-control" readonly value="<?php echo$_GET['age']; ?>">
                  </div>
                   </div>
                   <div class="form-group col-md-4">
                    <label>BirthDate</label>
                    <input type="text" name="bdate" class="form-control" value="<?php echo$_GET['bdate']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label>Marital Status</label>
                    <input type="text" name="status" class="form-control" value="<?php echo$_GET['status']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Degree</label>
                    <input type="text" name="degree" class="form-control" value="<?php echo$_GET['degree']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Degree Earned</label>
                    <input type="text" name="earned" class="form-control" value="<?php echo$_GET['earned']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Institution</label>
                    <input type="text" name="instition" class="form-control" value="<?php echo$_GET['institutions']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Program</label>
                    <input type="text" name="program" class="form-control" value="<?php echo$_GET['program']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Year Graduated</label>
                    <input type="text" name="year" class="form-control" value="<?php echo$_GET['yeargraduted']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Eligibility</label>
                    <input type="text" name="eligibility" class="form-control" value="<?php echo$_GET['eligibility']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Honor</label>
                    <input type="text" name="honor" class="form-control" value="<?php echo$_GET['honor']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Employment</label>
                    <input type="text" name="employed" class="form-control" value="<?php echo$_GET['employed']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Time Looking for A Job</label>
                    <input type="text" name="time" class="form-control" value="<?php echo$_GET['time']; ?>">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Delay of Employment</label>
                    <input type="text" name="delay" class="form-control" value="<?php echo$_GET['delay']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label>Factors/ of First Present job</label>
                    <input type="text" name="factors" class="form-control" value="<?php echo$_GET['factors']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label>Employment Status</label>
                    <input type="text" name="emstatus" class="form-control" value="<?php echo$_GET['empstatus']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label>Relevance of College Degree</label>
                    <input type="text" name="relevance" class="form-control" value="<?php echo$_GET['relevance']; ?>">
                  </div>
                   <div class="form-group col-md-4">
                    <label>Competencies learned in college</label>
                    <input type="text" name="skills" class="form-control" value="<?php echo$_GET['skills']; ?>">
                  </div>
                  <div class="form-group col-md-4" style="margin-top: -50px; margin-left: 400px;">
                     <input type="submit" name="btn_update" class="btn btn-success" value="Update Records">
                      <a href="alumnirecords.php" class="btn btn-danger">Back</a>
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


