<?php 
function CountEmployed(){
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM alumni_records WHERE employed='Employed'");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}

function CountUnEmployed(){
$message = "";
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM alumni_records WHERE employed='UnEmployed'");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}

function CountSelfemploy(){
$message = "";
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM alumni_records WHERE employed='Self Employed'");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}

function Countofw(){
$message = "";
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM alumni_records WHERE employed='Ofw'");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}
function CountAccount(){
	include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM account");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}
function Countrecords(){
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM alumni_records");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}
function CountMessage(){
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM message_user");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}
function Announce(){
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM parents");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}
function News(){
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM tbl_news");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}

function Projects(){
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM tbl_project");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}
function CountVisitor(){
include 'connection/conn.php';
$stmt = $db->prepare("SELECT COUNT(*) FROM visitor");
$stmt->execute();


$row=$stmt->fetchColumn();
echo $row;
}
function DisplayAccname(){
	include 'connection/mysqliconn.php';
	$query = "SELECT * FROM account";
	$result = mysqli_query($connect,$query);

	while($row = mysqli_fetch_array($result)){
		echo "<a href='alumniacc.php'><img src='images/".$row['images']."' class='img-circle' width='30px'  height='30px'/> ".$row['first_name']."<br/><br/></a>";
	}
}

function Displayname(){
	include 'connection/mysqliconn.php';
	$query = "SELECT * FROM alumni_records WHERE employed = 'Employed'";
	$result = mysqli_query($connect,$query);

	while($row = mysqli_fetch_array($result)){
		echo "<a href='alumnirecords.php'>".$row['fname']."<br/></a>";
	}
}

function DisplaynameSelf(){
	include 'connection/mysqliconn.php';
	$query = "SELECT * FROM alumni_records WHERE employed = 'Self Employed'";
	$result = mysqli_query($connect,$query);

	while($row = mysqli_fetch_array($result)){
		echo "<a href='alumnirecords.php'>".$row['fname']."<br/></a>";
	}
}

function DisplaynameUnemploy(){
	include 'connection/mysqliconn.php';
	$query = "SELECT * FROM alumni_records WHERE employed = 'UnEmployed'";
	$result = mysqli_query($connect,$query);

	while($row = mysqli_fetch_array($result)){
		echo "<a href='alumnirecords.php'>".$row['fname']."<br/></a>";
	}
}

function Displaynameofw(){
	include 'connection/mysqliconn.php';
	$query = "SELECT * FROM alumni_records WHERE employed = 'Ofw'";
	$result = mysqli_query($connect,$query);

	while($row = mysqli_fetch_array($result)){
		echo "<a href='alumnirecords.php'>".$row['fname']."<br/></a>";
	}
}

?>
