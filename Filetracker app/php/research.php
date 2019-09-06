<?php
require_once 'conn/conn.php';
$query = "SELECT * FROM tbl_uploads ORDER BY uploded_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);