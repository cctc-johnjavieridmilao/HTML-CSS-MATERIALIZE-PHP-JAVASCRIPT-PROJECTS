<?php
try {
	$db = new PDO("mysql:host=sql306.epizy.com;dbname=epiz_22326724_alumnidb","epiz_22326724","");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $db;
	
} 
catch (PDOException $e) {
	echo "Sorry Error: ".$e->getMessage();
}
?>