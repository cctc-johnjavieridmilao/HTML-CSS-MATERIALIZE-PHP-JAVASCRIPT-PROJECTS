<?php 
function count_appe() {
include 'conn/conn.php';
$query = "SELECT count(*) FROM tbl_menus WHERE category='Appetizers'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_row($res);
echo $row[0];
}
function count_beef() {
include 'conn/conn.php';
$query = "SELECT count(*) FROM tbl_menus WHERE category='Beef'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_row($res);
echo $row[0];
}
function count_chicken() {
include 'conn/conn.php';
$query = "SELECT count(*) FROM tbl_menus WHERE category='Chicken'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_row($res);
echo $row[0];
}
function count_hot_soup() {
include 'conn/conn.php';
$query = "SELECT count(*) FROM tbl_menus WHERE category='Hot Soup'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_row($res);
echo $row[0];
}
function count_p_corner() {
include 'conn/conn.php';
$query = "SELECT count(*) FROM tbl_menus WHERE category='Pinoy Corner'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_row($res);
echo $row[0];
}
function count_sizzlins() {
include 'conn/conn.php';
$query = "SELECT count(*) FROM tbl_menus WHERE category='Sizzlings'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_row($res);
echo $row[0];
}
function count_vegetables() {
include 'conn/conn.php';
$query = "SELECT count(*) FROM tbl_menus WHERE category='Vagetables'";
$res = mysqli_query($connect,$query);
$row = mysqli_fetch_row($res);
echo $row[0];
}
?>