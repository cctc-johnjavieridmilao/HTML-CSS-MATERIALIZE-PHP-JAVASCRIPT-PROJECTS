<?php
 include 'connection/mysqliconn.php';  
 $query = "SELECT * FROM alumni_records";  
 $result = mysqli_query($connect, $query);   
?>
<!DOCTYPE html>
<html>
<head>
  <title>Word Docs</title>
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
      <div class="row" style="width: 140%; margin-left: 220px; margin-top: 20px;">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <a href="alumnireport.php" class="btn btn-danger"><span class="fas fa-arrow-left"> Back</spa></a>
              <button class="btn btn-success" style="float: right;" id="export"><span class="fas fa-file-word"> Generate Word Docs</span></button>
              <h3 style="margin-left: 340px;" class="box-title">Alumni Report</h3><hr>

            </div>
             <div id="docx">
             <table  class="table table-bordered">
                <thead>
                         <tr>
                                <td style="font-family: sans-serif;" width="10%">ID</td>  
                                <td style="font-family: sans-serif;" width="8%">Name</td>
                                <td style="font-family: sans-serif;" width="15%" >Address</td>
                                <td style="font-family: sans-serif;" width="13%">Gender</td>
                                <td style="font-family: sans-serif;" width="15%">Institution</td>
                                <td style="font-family: sans-serif;" width="15%">Program</td>
                                <td style="font-family: sans-serif;" width="18%">Year Graduated</td>
                                
                               
                          </tr>  
                          </thead>  
                           <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["id"].'</td>  
                                    <td>'.$row["fname"].'</td>  
                                    <td>'.$row["address"].'</td>  
                                    <td>'.$row["gender"].'</td>  
                                    <td>'.$row["institution"].'</td>
                                    <td>'.$row["program"].'</td>  
                                    <td>'.$row["yeargraduted"].'</td>   
                               </tr>  
                               ';  
                          }  
                          ?>  
             </table>
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
<script>
    window.export.onclick = function() {
 
   if (!window.Blob) {
      alert('Your legacy browser does not support this action.');
      return;
   }

   var html, link, blob, url, css;
   
   // EU A4 use: size: 841.95pt 595.35pt;
   // US Letter use: size:11.0in 8.5in;
   
   css = (
     '<style>' +
     '@page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}' +
     'div.WordSection1 {page: WordSection1;}' +
     'table{border-collapse:collapse;}td{border:1px gray solid;width:5em;padding:2px;}'+
     '</style>'
   );
   
   html = window.docx.innerHTML;
   blob = new Blob(['\ufeff', css + html], {
     type: 'application/msword'
   });
   url = URL.createObjectURL(blob);
   link = document.createElement('A');
   link.href = url;
   // Set default file name. 
   // Word will append file extension - do not add an extension here.
   link.download = 'AlumniDocs';   
   document.body.appendChild(link);
   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, 'AlumniDocs.doc'); // IE10-11
      else link.click();  // other browsers
   document.body.removeChild(link);
 };

 </script>



