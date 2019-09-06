<div class="table-responsive">
<table class="table" id="datatabless">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
  </thead>
  <tbody>
   <?php 
  require 'conn.php';
  $query = "SELECT * FROM tbl_menus";
  $res = mysqli_query($connect,$query);
  while ($row = mysqli_fetch_array($res)) {
      echo '
    <tr id="del'.$row['id'].'">
    <td>'.$row['id'].'</td>
    <td><img src="../upload/'.$row['image'].'" width="50" style="border-radius: 50%;" height="50"></td>
    <td>'.$row['name'].'</td>
    <td>'.$row['description'].'</td>
    <td>'.$row['category'].'</td>
    <td>
    <button class="btn btn-success edit" id="'.$row['id'].'">Edit</button>
    <button class="btn btn-danger delete" id="'.$row['id'].'">Delete</button>
    </td>
    </tr>
    ';
  }
  ?>
  </tbody>
</table>
</div>
<script type="text/javascript">
$(document).ready(function(){
$("#datatabless").DataTable({
"pagingType" : "full_numbers"
});
});
</script>
