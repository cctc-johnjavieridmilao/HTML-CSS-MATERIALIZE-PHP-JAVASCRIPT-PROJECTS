<?php
include 'connection/mysqliconn.php';

$item_per_page = 6;

//sanitize post value
if(isset($_POST["page"])){
  $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
  if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
  $page_number = 1;
}

//get current starting point of records
$position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range. 
$results = mysqli_query($connect, "SELECT * FROM message_user ORDER BY id ASC LIMIT $position, $item_per_page");

//output results from database
echo '<div class="row">';
while($row = mysqli_fetch_array($results))
{
  echo '<div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <i class="fa fa-user"></i>

              <h3 class="box-title">'.$row['name'].' | '.$row['date'].'</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl>
                <dt>Feedback:</dt>
                <dd>'.$row['message'].'</dd>
              </dl>
            </div>
            <div class="box-footer">
             <a class="btn btn-warning" href="alumnifeedback.php"> <span class="fas fa-table"> Table</span></a>
     <a class="btn btn-danger" id="delete_product" data-id="'.$row['id'].'" href="javascript:void(0)"> <span class="fas fa-trash-alt"> Trash</span></a>
     <button class="btn btn-info view" id="'.$row['id'].'"> <span class="fas fa-pencil-alt"> View</span>  <span class="fas fa-spinner fa-spin" id="view_spin'.$row['id'].'" style="display: none;"></span> </button>
    </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>';
}
echo '</div>';

?>

