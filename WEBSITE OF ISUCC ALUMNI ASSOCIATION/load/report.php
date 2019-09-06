<?php 
function AlumniReport(){
  include '../connection/mysqliconn.php';  
  $query = "SELECT * FROM alumni_records";  
  $result = mysqli_query($connect, $query);  
  ?>
  
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
AlumniReport();
?>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<script src="lisenme.js"></script>
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      "pagingType": "full_numbers",
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  jQuery('#example2').ddTableFilter();
</script>