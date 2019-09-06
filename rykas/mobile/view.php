<?php 
// get id using ajax
$id = $_POST['id'];
// execute functions
Appe($id);
beef($id);
Chicken($id);
Soup($id);
pinoycorner($id);
sizzlings($id);
vegetables($id);

//functions
function Appe($id) {
require 'conn/conn.php';
$query = "SELECT * FROM tbl_menus WHERE id='$id' AND category='Appetizers'";
$excute = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($excute);
if ($numrow > 0) {
	foreach ($excute as $value) {
		$output = "";
		$output .='
		<div class="ui-grid-solo">
	    <div class="ui-block-a">
	 	<img src="upload/'.$value['image'].'" style="object-fit: cover;height: 260px;width:360px;">
	 	<p style="font-size:18px;color:black;display:block">'.$value['name'].'<br><span style="font-size:13px;">'.$value['description'].'</span></p>
		</div>
		</div>
		<a href="#order?name='.$value['name'].'">Order</a>
		';
		echo $output;
	}
}
}
function beef($id) {
require 'conn/conn.php';
$query = "SELECT * FROM tbl_menus WHERE id='$id' AND category='Beef'";
$excute = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($excute);
if ($numrow > 0) {
	foreach ($excute as $value) {
		$output = "";
		$output .='
		<div class="ui-grid-solo">
	    <div class="ui-block-a">
	 	<img src="upload/'.$value['image'].'" style="object-fit: cover;height: 260px;width:360px;">
	 	<p style="font-size:18px;color:black;display:block">'.$value['name'].'<br><span style="font-size:13px;">'.$value['description'].'</span></p>
		</div>
		</div>
		';
		echo $output;
	}
}
}
function Chicken($id) {
require 'conn/conn.php';
$query = "SELECT * FROM tbl_menus WHERE id='$id' AND category='Chicken'";
$excute = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($excute);
if ($numrow > 0) {
	foreach ($excute as $value) {
		$output = "";
		$output .='
		<div class="ui-grid-solo">
	    <div class="ui-block-a">
	 	<img src="upload/'.$value['image'].'" style="object-fit: cover;height: 260px;width:360px;">
	 	<p style="font-size:18px;color:black;display:block">'.$value['name'].'<br><span style="font-size:13px;">'.$value['description'].'</span></p>
		</div>
		</div>
		';
		echo $output;
	}
}
}
function Soup($id) {
require 'conn/conn.php';
$query = "SELECT * FROM tbl_menus WHERE id='$id' AND category='Hot Soup'";
$excute = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($excute);
if ($numrow > 0) {
	foreach ($excute as $value) {
		$output = "";
		$output .='
		<div class="ui-grid-solo">
	    <div class="ui-block-a">
	 	<img src="upload/'.$value['image'].'" style="object-fit: cover;height: 260px;width:360px;">
	 	<p style="font-size:18px;color:black;display:block">'.$value['name'].'<br><span style="font-size:13px;">'.$value['description'].'</span></p>
		</div>
		</div>
		';
		echo $output;
	}
}
}
function pinoycorner($id) {
require 'conn/conn.php';
$query = "SELECT * FROM tbl_menus WHERE id='$id' AND category='Pinoy Corner'";
$excute = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($excute);
if ($numrow > 0) {
	foreach ($excute as $value) {
		$output = "";
		$output .='
		<div class="ui-grid-solo">
	    <div class="ui-block-a">
	 	<img src="upload/'.$value['image'].'" style="object-fit: cover;height: 260px;width:360px;">
	 	<p style="font-size:18px;color:black;display:block">'.$value['name'].'<br><span style="font-size:13px;">'.$value['description'].'</span></p>
		</div>
		</div>
		';
		echo $output;
	}
}
}
function sizzlings($id) {
require 'conn/conn.php';
$query = "SELECT * FROM tbl_menus WHERE id='$id' AND category='Sizzlings'";
$excute = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($excute);
if ($numrow > 0) {
	foreach ($excute as $value) {
		$output = "";
		$output .='
		<div class="ui-grid-solo">
	    <div class="ui-block-a">
	 	<img src="upload/'.$value['image'].'" style="object-fit: cover;height: 260px;width:360px;">
	 	<p style="font-size:18px;color:black;display:block">'.$value['name'].'<br><span style="font-size:13px;">'.$value['description'].'</span></p>
		</div>
		</div>
		';
		echo $output;
	}
}
}
function vegetables($id) {
require 'conn/conn.php';
$query = "SELECT * FROM tbl_menus WHERE id='$id' AND category='Vagetables'";
$excute = mysqli_query($connect,$query);
$numrow = mysqli_num_rows($excute);
if ($numrow > 0) {
	foreach ($excute as $value) {
		$output = "";
		$output .='
		<div class="ui-grid-solo">
	    <div class="ui-block-a">
	 	<img src="upload/'.$value['image'].'" style="object-fit: cover;height: 260px;width:360px;">
	 	<p style="font-size:18px;color:black;display:block">'.$value['name'].'<br><span style="font-size:13px;">'.$value['description'].'</span></p>
		</div>
		</div>
		';
		echo $output;
	}
}
}
?>