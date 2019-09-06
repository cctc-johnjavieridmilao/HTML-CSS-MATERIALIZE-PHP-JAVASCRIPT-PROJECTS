<?php 
include './admin/conn.php';
if (isset($_POST['id'])) {
$id = $_POST['id'];
$query = "SELECT * FROM tbl_menus WHERE id='$id'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_array($res);
if (empty($row['descriptions'])) {
	echo '<p class="text-danger">No Description</p>';
}
else{
	echo $row['descriptions'];
}
}
?>