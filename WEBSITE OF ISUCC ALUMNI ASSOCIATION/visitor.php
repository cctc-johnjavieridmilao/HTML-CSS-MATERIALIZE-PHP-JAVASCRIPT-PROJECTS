<?php 
include 'connection/conn.php';

$ip = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT ip FROM visitor WHERE ip = '$ip'";
$Check = $db->prepare($sql);
$Check->execute();
$Checkip=$Check->rowCount();

if ($Checkip==0) {
	$query = "INSERT INTO visitor(id,ip) VALUES (NULL,'$ip')";
	$insertip=$db->prepare($query);
	$insertip->execute();
}
$number=$db->prepare("SELECT ip FROM visitor");
$number->execute();
$visitor=$number->rowCount();
//echo $visitor;
 ?>