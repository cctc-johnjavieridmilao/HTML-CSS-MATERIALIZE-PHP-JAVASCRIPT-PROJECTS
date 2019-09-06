<?php 
include 'conn.php';
if (isset($_POST['id'])) {
$id = $_POST['id'];
$query = "SELECT * FROM tbl_menus WHERE id='$id'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_array($res);
echo json_encode($row);
}
?>