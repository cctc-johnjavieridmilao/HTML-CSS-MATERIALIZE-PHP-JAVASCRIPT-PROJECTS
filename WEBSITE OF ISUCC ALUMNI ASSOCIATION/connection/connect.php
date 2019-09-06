<?php
session_start();
try {
	$db = new PDO("mysql:host=localhost;dbname=alumni_db","root","");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db;
	
} 
catch (PDOException $e) {
	echo "Sorry Error: ".$e->getMessage();
}

?>