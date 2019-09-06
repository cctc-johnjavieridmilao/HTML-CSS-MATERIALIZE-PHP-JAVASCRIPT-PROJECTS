<?php  
function AlumniReport(){
	include 'connection/mysqliconn.php';  
  $query = "SELECT * FROM alumni_records";  
  $result = mysqli_query($connect, $query);  
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI REPORT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Alumni Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alumni Table</h3>
              <button  onclick="window.location.reload()" style="float: right;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
              <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fa fa-print"> Print</span></button>

              <form method="post" action="export.php" style="margin-top: -20px;"> 
               <button type="submit" onclick="Show()" style="float: right;" name="export" class="btn btn-success"><span data-toggle="tooltip"  title="Generate to Excel" class="far fa-file-excel"> Excel</span></button>  
             </form>  
             <form method="POST" action="fpdfexport.php" style="float: right;">
               <button type="submit" onclick="Show1()" name="generate_pdf" class="btn btn-warning"><span data-toggle="tooltip"  title="Generate to Pdf" class="far fa-file-pdf"> Generate PDF</span></button>
             </form>
             <a href="word.php" class="btn btn-danger" style="float: right;"><span class="fas fa-file-word"> Word</span></a>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
            <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
              <thead>
               <tr>
                <th width="10%">ID</th>  
                <th width="15%">Name</th>
                <th width="15%" >Address</th>
                <th width="13%">Gender</th>
                <th width="15%">Institution</th>
                <th width="15%">Program</th>
                <th width="18%">Year Graduated</th>

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
           <tfoot>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Gender</th>
              <th>Institution</th>
              <th>Program</th>
              <th>Year Graduated</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<?php
}

function JobReport(){
  include 'connection/mysqliconn.php';  
  $query = "SELECT * FROM alumni_records";  
  $result = mysqli_query($connect, $query); 
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI JOB REPORT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Alumni job Report</li>

      </ol>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alumni Table</h3>
              <button  onclick="window.location.reload()" style="float: right;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
              <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fa fa-print"> Print</span></button>

              <form method="post" action="export1.php" style="margin-top: -20px;"> 
               <button type="submit" onclick="Show()" style="float: right;" name="export" class="btn btn-success"><span data-toggle="tooltip"  title="Generate to Excel" class="far fa-file-excel"> Excel</span></button>  
             </form>  
             <form method="POST" action="fdf1.php" style="float: right;">
               <button type="submit" onclick="Show1()" name="generate_pdf" class="btn btn-warning"><span data-toggle="tooltip"  title="Generate to Pdf" class="far fa-file-pdf"> Generate PDF</span></button>
             </form>
             <a href="wordjob.php" class="btn btn-danger" style="float: right;"><span class="fas fa-file-word"> Word</span></a>

           </div>
           <!-- /.box-header -->
           <div class="box-body">
            <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
              <thead>
                <tr>
                  <th width="10%">ID</th>  
                  <th width="12%">Name</th>
                  <th width="8%">Employment</th>
                  <th width="15%">Gender</th>
                  <th width="15%">Institution</th>
                  <th width="15%">Program</th>
                  <th width="15%">YearGraduated</th>
                  <th width="15%">Job</th>

                </tr>  
              </thead>  
              <?php  
              while($row = mysqli_fetch_array($result))  
              {  
               echo '  
               <tr>  
               <td>'.$row["id"].'</td>  
               <td>'.$row["fname"].'</td>  
               <td>'.$row["employed"].'</td>  
               <td>'.$row["gender"].'</td>
               <td>'.$row["institution"].'</td>
               <td>'.$row["program"].'</td>  
               <td>'.$row["yeargraduted"].'</td> 
               <td>'.$row["work"].'</td> 
               </tr>  
               ';  
             }  
             ?>  
             <tfoot>
              <tr>
                <th>ID</th>  
                <th>Name</th>
                <th>Employment</th>
                <th>Gender</th>
                <th>Institution</th>
                <th>Program</th>
                <th>YearGraduated</th>
                <th>Job</th>
              </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <?php
}

function AlumniAccount(){
	include 'connection/mysqliconn.php';  
  $query = "SELECT * FROM account ORDER BY acc_id DESC";  
  $result = mysqli_query($connect, $query); 
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI USER ACCOUNT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">User Account</li>
      </ol>
    </section>
    <!-- Main content -->
    <script type="text/javascript">

    </script>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alumni Table</h3>
              <button  onclick="window.location.reload()" style="float: right;display: none;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
              <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fas fa-print"> Print</span></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <div style="text-align: center;"><span style="font-size: 17px;">Total of Accounts (<?php echo CountAccount() ?>)</span></div>
                <thead>
                 <tr>         
                   <th width="5%">Status</th> 
                   <th width="5%">Photo</th>  
                   <th width="18%">Name</th>
                   <th>Date Created</th>
                   <th width="5%">Approve</th>
                   <th width="5%">Disapprove</th>
                   <th width="5%">Ban Account</th>
                   <th width="5%"></th>
                 </tr>
               </thead>  
               <?php  
               include 'approveuser.php';
               include 'banuser.php';
               include 'disban.php';
               while($row = mysqli_fetch_array($result))  

               {  
                $date_created = New DateTime($row['date_created']);
                echo '
                <tr id='.$row["acc_id"].'>  
                ';
                echo ($row['online'] == "Active") ? '<td style="color:green;"><span style="font-size:12px;" class="fa fa-circle text-success"> Active</span</td>' : '<td style="color: red;"> <span  style="font-size:12px;" class="fa fa-circle text-danger"> inActive</span</td>';

                echo ' 
                <td><a href="images/'.$row['images'].'" data-title="'.$row['first_name'].' Photo" id="image" data-toggle="tooltip" data-placement="right" title="Click to View '.$row['first_name'].' Photo"  data-lightbox="image-1"><img src=images/'.$row['images'].'  class="img-circle" width="40px"  height="40px"/></a></td>
                <td>'.$row["first_name"].' '.$row["last_name"].' '.$row["middle_name"].'</td>
                 <td>'.$date_created->format('Y-m-d | h:i:sa').'</td>   
                ';  
                ?>
                <?php 
                if ($row['status'] == 0) {
                 echo ' <td><button type="button" name="'.$row['email'].'" value="'.$row['first_name'].'" id="'.$row['acc_id'].'" class="btn btn-primary btn-xs btn_approve_user"><i class="far fa-thumbs-up"> Approved</i></button></td>';
               }
               else {
                echo '<td><form method="POST" action="alumniacc.php?acc_id='.$row["acc_id"].'"><button type="submit" disabled="disabled" name="approve" value="Already Approved" id="approve" class="btn btn-primary btn-xs"><i class="far fa-thumbs-up"> Already Approved</i></button></form></td>';
               }
               ?>
               <?php
                if ($row['status'] == 1) {
                 echo '<td><a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Are You Sure You want to delete '.$row['first_name'].' Account?" disabled="disabled" value="'.$row['first_name'].'" data-id='.$row["acc_id"].' href="javascript:void(0)"><i class="far fa-thumbs-down"> DisApproved</i></a>';
               }
               else {
                 echo '<td><a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Are You Sure You want to delete '.$row['first_name'].' Account?" id="delete_product" value="'.$row['first_name'].'" data-id='.$row["acc_id"].' href="javascript:void(0)"><i class="far fa-thumbs-down"> DisApproved</i></a></td>';
               }
              
               ?>
               <?php 
               $datenow = date('Y-m-d H:i:s');
               $dtn = strtotime($datenow);
                //$dtn = strtotime($datenow);
                //$datewith3days = date('Y-m-d H:i:s',strtotime($datewith3days. '+1 minutes'));
               if ($row['ban'] == 0) {
                 echo '<td><button type="button" value="'.$row['first_name'].'" id="'.$row['acc_id'].'" name="'.$row['email'].'" class="btn btn-warning btn-xs ban"><i class="fas fa-ban"> Banned Account</i></button></td>';
               }
               elseif($dtn > strtotime($row['dateofban'])){
                 echo '<td><button type="button" value="'.$row['first_name'].'" id="'.$row['acc_id'].'" name="'.$row['email'].'" class="btn btn-success btn-xs unban"><i class="fas fa-check"> Unban Now '.$row['dateofban'].'</i></button></form></td>';
               }
               else{
                echo '<td><form method="POST" action="alumniacc.php?acc_id='.$row["acc_id"].'"><button type="submit" id="dis" name="btn_disban" disabled="disabled" class="btn btn-success btn-xs"><i class="fas fa-ban"> Unban This on '.$row['dateofban'].'</i></button></form></td>';
              }
              ?>
              <?php
              //echo ($row['status'] == 1) ? '<td style="color:green;"><i class="fas fa-user-check"></i></td>'  :'<td style="color:red;"> <i class="fas fa-user-times"></i></td>  </tr>' ;
              if ($row['ban'] == 1) {
                 echo '<td style="color:red;"> <i class="fas fa-ban"></i></td>';
                }
              elseif ($row['status'] == 1) {
               echo '<td style="color:green;"><i class="fas fa-user-check"></i></td>';
              }
              else {
                echo '<td style="color:red;"> <i class="fas fa-user-times"></i></td> </tr>';
                
              }

            }  
            ?>  
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <?php
}

function Alumni_Ann(){
  include 'connection/mysqliconn.php'; 
  $query=mysqli_query($connect,"SELECT * from parents ORDER BY id DESC"); 
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI ANNOUNCEMENT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Alumni Announcement</li>
      </ol>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alumni Table</h3>
              <button  onclick="window.location.reload()" style="float: right;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
              <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fas fa-print"> Print</span></button>
              <button class="btn btn-danger" name="btn_delete" id="btn_delete" style="float: right;"><span class="fas fa-trash"> MultipleDelete</span></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin-top: -20px;">
              <table id="example2" class="table table-bordered table-hover">
                <div style="text-align: center;"><span style="font-size: 17px;">Total of Announcement (<?php echo Announce() ?>)</span></div>
                <thead>
                  <tr>
                   <th></th> 
                   <th>Image</th>
                   <th>Date Submit</th>
                   <th>Title</th>
                   <th width="19%">Actions</th>
                 </tr> 
               </thead> 
               <?php  
               while($row = mysqli_fetch_array($query))  
               {  
                $timeStamp = $row['date'];
                $dt = new DateTime($timeStamp);
                echo '
                <tr id="'.$row['id'].'">

                   
                 <td><input type="checkbox" class="delete_checkbox" value="'.$row["id"].'" /></td>
                 <td><img class="img-circle" height="40" width="40" src="images/'.$row['image'].'"></td>
                 <td>'.$dt->format('l, F j, Y | h:i:sa').'</td>
                 <td style="font-family: system-ui;">'.$row["title"].'</td>
                

                 <td style="font-family: system-ui;">
                 <button name="view" type="button" data-toggle="tooltip" data-placement="left" title="View '.$row['title'].' Message" class="btn btn-xs btn-info view_data" id="'.$row['id'].'"> <span class="fas fa-pencil-alt"> View</span> <i class="fa fa-spinner fa-spin" id="spinner'.$row['id'].'" style="display: none;"></i></button> 

                 <a name="edit"  type="button" data-toggle="tooltip" data-placement="left" title="View '.$row['title'].' Message" class="btn btn-xs btn-primary edit_data" id="'.$row['id'].'"> <span class="fas fa-edit"> Edit </span> <i class="fa fa-spinner fa-spin" id="spniner_edit_ann'.$row["id"].'" style="display:none;"></i></a>

                 <a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Are You Sure you want to Delete '.$row['title'].' Message" id="delete_product" data-id="'.$row['id'].'" href="javascript:void(0)"><i class="fas fa-trash"> Delete</i></a></td>

               </tr>  

                ';        
             }  
             ?>  
           </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <?php

}
function Alumni_news(){
  include 'connection/mysqliconn.php'; 
  $query=mysqli_query($connect,"SELECT * from tbl_news ORDER BY id DESC"); 
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI NEWS
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Alumni News</li>
      </ol>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alumni Table</h3>
              <button  onclick="window.location.reload()" style="float: right;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
              <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fas fa-print"> Print</span></button>
              <button class="btn btn-danger" name="btn_delete" id="btn_delete" style="float: right;"><span class="fas fa-trash"> MultipleDelete</span></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin-top: -20px;">
              <table id="example2" class="table table-bordered table-hover">
                <div style="text-align: center;"><span style="font-size: 17px;">Total of News (<?php echo News() ?>)</span></div>
                <thead>
                  <tr>
                   <th></th> 
                   <th>Image</th>
                   <th>Date Submit</th>
                   <th>Title</th>
                  
                   <th width="19%">Actions</th>
                 </tr> 
               </thead> 
               <?php  
               while($row = mysqli_fetch_array($query))  
               {  
                $timeStamp = $row['date'];
                $dt = new DateTime($timeStamp);
                echo '
                 <tr id="'.$row['id'].'">

                 <td><input type="checkbox" class="delete_checkbox" value="'.$row["id"].'" /></td>
                 <td><img class="img-circle" height="40" width="40" src="images/'.$row['image'].'"></td>
                 <td>'.$dt->format('l, F j, Y | h:i:sa').'</td>
                 <td style="font-family: system-ui;">'.$row["subject"].'</td>
                 

                 <td style="font-family: system-ui;">
                 <button name="view" type="button" data-toggle="tooltip" data-placement="left" title="View '.$row['subject'].' News" class="btn btn-xs btn-info view_data" id="'.$row['id'].'"> <span class="fas fa-pencil-alt"> View</span> <i class="fa fa-spinner fa-spin" id="spinner'.$row['id'].'" style="display: none;"></i></button> 

                <a name="edit"  type="button" data-toggle="tooltip" data-placement="left" title="View '.$row['subject'].' News" class="btn btn-xs btn-primary edit_data" id="'.$row['id'].'"> <span class="fas fa-edit"> Edit</span> <i class="fa fa-spinner fa-spin" id="spniner_edit_news'.$row["id"].'" style="display:none;"></i></a>

                 <a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Are You Sure you want to Delete '.$row['subject'].' Message" id="delete_product" data-id="'.$row['id'].'" href="javascript:void(0)"><i class="fas fa-trash"> Delete</i></a></td>

               </tr>  

                ';
             }  
             ?>  
           </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <?php

}

function Alumni_Project(){
  include 'connection/mysqliconn.php'; 
  $query=mysqli_query($connect,"SELECT * from tbl_project ORDER BY id DESC"); 
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI PROJECT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Alumni Project</li>
      </ol>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alumni Table</h3>
              <button  onclick="window.location.reload()" style="float: right;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
              <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fas fa-print"> Print</span></button>
              <button class="btn btn-danger" name="btn_delete" id="btn_delete" style="float: right;"><span class="fas fa-trash"> MultipleDelete</span></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin-top: -20px;">
              <table id="example2" class="table table-bordered table-hover">
                <div style="text-align: center;"><span style="font-size: 17px;">Total of Projects (<?php echo Projects() ?>)</span></div>
                <thead>
                  <tr>
                   <th></th> 
                   <th>Image</th>
                   <th>Date Submit</th>
                   <th>Title</th>
                  
                  	<th width="19%">Actions</th>
                 </tr> 
               </thead> 
               <?php  
               while($row = mysqli_fetch_array($query))  
               {  
                $timeStamp = $row['date'];
                $dt = new DateTime($timeStamp);
                echo '
                  <tr id="'.$row['id'].'">

                 <td><input type="checkbox" class="delete_checkbox" value="'.$row["id"].'" /></td>
                 <td><img class="img-circle" height="40" width="40" src="images/'.$row['image'].'"></td>
                 <td>'.$dt->format('l, F j, Y | h:i:sa').'</td>
                 <td style="font-family: system-ui;">'.$row["subject"].'</td>
                

                 <td style="font-family: system-ui;">
                 <button name="view" type="button" data-toggle="tooltip" data-placement="left" title="View '.$row['subject'].' News" class="btn btn-xs btn-info view_data" id="'.$row['id'].'"> <span class="fas fa-pencil-alt"> View</span> <i class="fa fa-spinner fa-spin" id="spinner1'.$row['id'].'" style="display: none;"></i> </button> 

                 <a name="edit" type="button" data-toggle="tooltip" data-placement="left" title="View '.$row['subject'].' News" class="btn btn-xs btn-primary edit_data" id="'.$row['id'].'"> <span class="fas fa-edit"> Edit</span> <i class="fa fa-spinner fa-spin" id="spniner_edit_project'.$row["id"].'" style="display:none;"></i></a>

                 <a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Are You Sure you want to Delete '.$row['subject'].' Message" id="delete_product" data-id="'.$row['id'].'" href="javascript:void(0)"><i class="fas fa-trash"> Delete</i></a></td>

               </tr> 
                ';     
              }  
             ?>  
           </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <?php

}



function AlumniRecords(){
	include 'connection/mysqliconn.php';  
 
$query=mysqli_query($connect,"SELECT * from alumni_records ORDER BY id DESC");  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ALUMNI RECORDS
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
      <li class="active">Alumni Records</li>
    </ol>
  </section>
  <!-- Main content -->

  <!-- Main content -->
  <?php if(isset($_SESSION['update_succesfully'])): ?>
    <?php echo "<script>swal('Records Succesfully Updated','click okay','success');</script>";  ?>
  <?php endif;  ?>
  <?php unset($_SESSION['update_succesfully']);  ?>


  <?php if(isset($_SESSION['no_updated'])): ?>
    <?php echo "<script>swal('Records Have no Update!','click okay','success');</script>";  ?>
  <?php endif;  ?>
  <?php unset($_SESSION['no_updated']);  ?>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Alumni Table</h3>
            <button  onclick="window.location.reload()" style="float: right;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
            <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fas fa-print"> Print</span></button>
            <button class="btn btn-danger" name="btn_delete" id="btn_delete" style="float: right;"><span class="fas fa-trash"> MultipleDelete</span></button>
          </div>
          <!-- /.box-header -->
          <div class="box-body" style="margin-top: -20px;">
            <table id="example2" class="table table-bordered table-hover rec">
              <div style="text-align: center;"><span style="font-size: 17px;">Total of Records (<?php echo Countrecords() ?>)</span></div>
              <thead>
                <tr>
                  <th></th>
                  <th>Date Submit</th>  
                  <th>Name</th>
                  <th>Employment</th>
                  <th>Job</th>
                  <th width="24%">Actions</th>
                </tr> 
              </thead> 
              <?php  
              while($row = mysqli_fetch_array($query))  
              {  
               $timeStamp = $row['date'];
               //date('l, F j, Y');
               $dt = new DateTime($timeStamp);
               $dateofbitrh = $row['birthdate'];
               $today = date("Y-m-d");
               $diff = date_diff(date_create($dateofbitrh), date_create($today));
               echo ' 
               <tr id='.$row["id"].'>  
               <td><input type="checkbox" name="chkOrgRow" class="delete_checkbox" value="'.$row["id"].'" /></td>
               <td>'.$dt->format('l, F j, Y').'</td>  
               <td>'.$row["fname"].'</td> 
               <td>'.$row["employed"].'</td>
               <td>'.$row["work"].'</td> 
               <td style="font-family: system-ui;"><button name="view" data-toggle="tooltip" data-placement="left" title="View '.$row['fname'].' Records" Data" type="button" class="btn btn-xs btn-info view_data" id='.$row["id"].'> <span class="fas fa-pencil-alt"> View</span> <i class="fa fa-spinner fa-spin" id="spniner'.$row["id"].'" style="display:none;"></i></button>

               <button name="edit" data-toggle="tooltip" data-placement="left" title="Edit '.$row['fname'].' Records" Data" type="button" class="btn btn-xs btn-warning edit_data" id='.$row["id"].'> <span class="fas fa-user-edit"> Edit Records</span> <i class="fa fa-spinner fa-spin" id="spniner_edit'.$row["id"].'" style="display:none;"></i></button>

               <a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Are You Sure you want to Delete '.$row['fname'].' Records" id="delete_product" data-id='.$row["id"].' href="javascript:void(0)"><i class="fas fa-trash"> Delete</i></a>

               </td>
              </tr>

               ';  
             }  
             ?> 
           </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <?php
}

function Feedback(){
  include 'connection/mysqliconn.php';  


  $query=mysqli_query($connect,"SELECT * from message_user ORDER BY id DESC"); 
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ALUMNI FEEDBACK
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Alumni Feedback</li>
      </ol>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Alumni Table</h3>
              <button  onclick="window.location.reload()" style="float: right;" class="btn btn-primary"><span data-toggle="tooltip"  title="Refresh The Page" class="fas fa-sync-alt"> Refresh</span></button>
              <button type="button" style="float: right;" class="button btn btn-info"><span data-toggle="tooltip"  title="For Print" class="fas fa-print"> Print</span></button>
              <button class="btn btn-danger" name="btn_delete" id="btn_delete" style="float: right;"><span class="fas fa-trash"> MultipleDelete</span></button>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin-top: -20px;">
              <table id="example2" class="table table-bordered table-hover">
                <div style="text-align: center;"><span style="font-size: 17px;">Total of Feedback (<?php echo CountMessage() ?>)</span></div>
                <thead>
                  <tr>
                   <th></th> 
                   <th>Date Submit</th>
                   <th>Name</th>
                   <th>Email</th>
                   <th width="14%">Actions</th>
                 </tr> 
               </thead> 
               <?php  
               while($row = mysqli_fetch_array($query))  
               {  
               
                $timeStamp = $row['date'];
                $dt = new DateTime($timeStamp);
                 echo '
                   <tr id="'.$row['id'].'">

                 <td><input type="checkbox" class="delete_checkbox" value="'.$row["id"].'" /></td>
                 <td>'.$dt->format('l, F j,Y | h:i:sa').'</td>
                 <td style="font-family: system-ui;">'.$row["name"].'</td>
                 <td style="font-family: system-ui;">'.$row["email"].'</td>
                 <td style="font-family: system-ui;"><button name="view" type="button" data-toggle="tooltip" data-placement="left" title="View '.$row['name'].' Message" class="btn btn-xs btn-info view_data" id="'.$row['id'].'"> <span class="fas fa-pencil-alt"> View</span> <i class="fas fa-spinner fa-spin" id="spinner'.$row['id'].'" style="display: none;"></i></button>
                 <a class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="left" title="Are You Sure you want to Delete '.$row['name'].' Message" id="delete_product" data-id="'.$row['id'].'" href="javascript:void(0)"><i class="fas fa-trash"> Delete</i></a></td>

               </tr>  
                 ';
                
             }  
             ?>  
           </table>
           
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <?php
}
function AdminAccount(){
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADMIN ACCOUNT
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
        <li class="active">Admin Account</li>
      </ol>
    </section>
    <!-- Main content -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Account Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="load_table">
            
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </div>
   <!-- /.col -->
   <div class="col-md-6">
    <div id="alert_datas"></div>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Change Account</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="row">
               <form method="POST" id="form_submitSS">
               <div class="col-md-6">
                 <div class="form-group">
                   <input class="form-control"" type="text" id="uname" name="uname" placeholder="Enter Username">
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                  <input class="form-control" type="password" id="new" name="new" placeholder="New Password" >
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                  <input class="form-control" type="password" id="confirm" name="confirm" placeholder="Confirm Password">
                 </div>
               </div>
               <div class="col-md-6">
                 <div class="form-group">
                 <button type="submit" class="btn btn-success btn-block" id="update"> <span class="fas fa-check"></span> Update <span class="fas fa-spinner fa-spin" id="spin_spin" style="display: none;"></span></button>
                 </div>
               </div>
             </form>
             </div>
        </div>
 </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->
   </div>
   <!-- /.col -->
 <!-- /.row -->

 <?php
}
function EmploymentChart(){
	include 'connection/mysqliconn.php';   
 $query = "SELECT employed, count(*) as number FROM alumni_records GROUP BY employed";  
 $result = mysqli_query($connect, $query);  
 ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-color: white;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      ALUMNI CHART
    </h1>
    <select class="form-control" style="width: 30%; margin-top: 30px;" onchange="location = this.value;">
      <option>Employment</option>
      <option value="alumnichartyear.php">YearGraduated</option>
      <option value="alumnichartprogram.php">Program</option>
      <option value="alumnichartinstitution.php">Institution</option>
      <option value="alumnichartjob.php">Job</option>
    </select>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
      <li class="active">Alumni Chart</li>
    </ol>
  </section>
  <script type="text/javascript">  
   google.charts.load('current', {'packages':['corechart']});  
   google.charts.setOnLoadCallback(drawChart);  
   function drawChart()  
   {  
    var data = google.visualization.arrayToDataTable([  
      ['Employ', 'Number'],  
      <?php  
      while($row = mysqli_fetch_array($result))  
      {  
       echo "['".$row["employed"]."', ".$row["number"]."],";  
     }  
     ?>  
     ]);  
     var options = {  
     title: 'Percentage of Employed,Self emplyed,Un Employed And Ofw Alumnus',  
     is3D:true,  
     pieHole: 0.4

   };  
   var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
   chart.draw(data, options);  
 }  
</script>  
<!-- Main content -->

<!-- Main content -->
<section>
  <div class="row">
    <div class="col-xs-12">
      <!-- jQuery Knob -->
      <div class="box box-solid">
        <div class="box-header">


          <div class="box-tools pull-right">
            <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div id="piechart" style="width: 1000px; height: 500px; margin-top: -20px;"></div>  
       </div>
     </div>  
     <!-- row -->

     <!-- /.row -->
     <?php
   }
   function YearGradutedChart(){
    include 'connection/mysqliconn.php';   
    $query = "SELECT yeargraduted, count(*) as number FROM alumni_records GROUP BY yeargraduted";  
    $result = mysqli_query($connect, $query);  
    ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: white;">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>  
          ALUMNI CHART
        </h1>
        <select class="form-control" style="width: 30%; margin-top: 30px;" onchange="location = this.value;">
          <option>YearGraduated</option>
          <option value="alumnichart.php">Employment</option>
          <option value="alumnichartprogram.php">Program</option>
          <option value="alumnichartinstitution.php">Institution</option>
          <option value="alumnichartjob.php">Job</option>
        </select>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
          <li class="active">Alumni Chart</li>
        </ol>
      </section>
      <script type="text/javascript"> 

       google.charts.load('current', {'packages':['corechart']});  
       google.charts.setOnLoadCallback(drawChart);  
       function drawChart()  
       {  
        var data = google.visualization.arrayToDataTable([  
          ['Yeargraduted', 'Alumni'],  
          <?php  
          while($row = mysqli_fetch_array($result))  
          {  
           echo "['".$row["yeargraduted"]."', ".$row["number"]."],";  
         }  
         ?>  
         ]);  
         var options = {  
         title: 'Percentage Of Yeargraduted',  
         hAxis: {title: 'Numbers of Alumni', titleTextStyle: {color: 'green'}},
         vAxis: {title: 'Year Graduated', titleTextStyle: {color: 'green'}},
         colors: ['green','green'],
         is3D:true


       };  
       var chart = new google.visualization.BarChart(document.getElementById('piechart'));  
       chart.draw(data, options);  
     }  
   </script>  
   <!-- Main content -->
   
   <!-- Main content -->
   <section>
    <div class="row">
      <div class="col-xs-12">
        <!-- jQuery Knob -->
        <div class="box box-solid">
          <div class="box-header">


            <div class="box-tools pull-right">
              <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
           <div id="piechart" style="width: 1000px; height: 500px;"></div>  
         </div>

       </div>  
       <?php
     }
     function ProgramChart(){
      include 'connection/mysqliconn.php';   
      $query = "SELECT program, count(*) as number FROM alumni_records GROUP BY program";  
      $result = mysqli_query($connect, $query); 
      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background-color: white;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            ALUMNI CHART
          </h1>
          <select class="form-control" style="width: 30%; margin-top: 30px;" onchange="location = this.value;">
            <option>Program</option>
            <option value="alumnichart.php">Employment</option>
            <option value="alumnichartyear.php">YearGraduated</option>
            <option value="alumnichartinstitution.php">Institution</option>
            <option value="alumnichartjob.php">Job</option>
          </select>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
            <li class="active">Alumni Chart</li>
          </ol>
        </section>
        <script type="text/javascript">  
         google.charts.load('current', {'packages':['corechart']});  
         google.charts.setOnLoadCallback(drawChart);  
         function drawChart()  
         {  
          var data = google.visualization.arrayToDataTable([  
            ['Program', 'Number'],  
            <?php  
            while($row = mysqli_fetch_array($result))  
            {  
             echo "['".$row["program"]."', ".$row["number"]."],";  
           }  
           ?>  
           ]);  
           var options = {  
           title: 'Percentage of Program',  
           is3D:true,  
           pieHole: 0.4

         };  
         var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
         chart.draw(data, options);  
       }  
     </script>  
     <!-- Main content -->

     <!-- Main content -->
     <section>
       <div class="row">
        <div class="col-xs-12">
          <!-- jQuery Knob -->
          <div class="box box-solid">
            <div class="box-header">


              <div class="box-tools pull-right">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="piechart" style="width: 1000px; height: 500px;"></div>  
            </div>
          </div>  
          <?php
        }
        function JobChart(){
         include 'connection/mysqliconn.php';   
         $query = "SELECT work, count(*) as number FROM alumni_records GROUP BY work";  
         $result = mysqli_query($connect, $query);  
         ?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper" style="background-color: white;">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>  
              ALUMNI CHART
            </h1>
            <select class="form-control" style="width: 30%; margin-top: 30px;" onchange="location = this.value;">
              <option>Job</option>
              <option value="alumnichartyear.php">YearGraduated</option>
              <option value="alumnichart.php">Employment</option>
              <option value="alumnichartprogram.php">Program</option>
              <option value="alumnichartinstitution.php">Institution</option>
            </select>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
              <li class="active">Alumni Chart</li>
            </ol>
          </section>
          <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
            var data = google.visualization.arrayToDataTable([  
              ['Work', 'Number'],  
              <?php  
              while($row = mysqli_fetch_array($result))  
              {  
               echo "['".$row["work"]."', ".$row["number"]."],";  
             }  
             ?>  
             ]);  
             var options = {  
             title: 'Percentage Of Job',  
             is3D:true,  
             pieHole: 0.4

           };  
           var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
           chart.draw(data, options);  
         }  
       </script>  
       <!-- Main content -->

       <!-- Main content -->
       <section>
         <div class="row">
          <div class="col-xs-12">
            <!-- jQuery Knob -->
            <div class="box box-solid">
              <div class="box-header">


                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div id="piechart" style="width: 1000px; height: 500px;"></div>  
              </div>
            </div>  
            <?php
          }
          function InstitutionChart(){
            include 'connection/mysqliconn.php';   
            $query = "SELECT institution, count(*) as number FROM alumni_records GROUP BY institution";  
            $result = mysqli_query($connect, $query);  
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color: white;">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h1>
                  ALUMNI CHART
                </h1>
                <select class="form-control" style="width: 30%; margin-top: 30px;" onchange="location = this.value;">
                  <option>Institution</option>
                  <option value="alumnichart.php">Employment</option>
                  <option value="alumnichartyear.php">YearGraduated</option>
                  <option value="alumnichartprogram.php">Program</option>
                  <option value="alumnichartjob.php">Job</option>
                </select>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fas fa-tachometer-alt"></i> Level</a></li>
                  <li class="active">Alumni Chart</li>
                </ol>
              </section>
              <script type="text/javascript">  
               google.charts.load('current', {'packages':['corechart']});  
               google.charts.setOnLoadCallback(drawChart);  
               function drawChart()  
               {  
                var data = google.visualization.arrayToDataTable([  
                  ['Institution', 'Number'],  
                  <?php  
                  while($row = mysqli_fetch_array($result))  
                  {  
                   echo "['".$row["institution"]."', ".$row["number"]."],";  
                 }  
                 ?>  
                 ]);  
                 var options = {  
                 title: 'Percentage of Institution',  
                 is3D:true,  
                 pieHole: 0.4

               };  
               var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
               chart.draw(data, options);  
             }  
           </script>  
           <!-- Main content -->

           <!-- Main content -->
           <section>
            <div class="row">
              <div class="col-xs-12">
                <!-- jQuery Knob -->
                <div class="box box-solid">
                  <div class="box-header">


                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div id="piechart" style="width: 1000px; height: 500px;"></div>    
                  </div>
                </div>  
                <?php
              }
              ?>