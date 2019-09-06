<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "SELECT * FROM tbl_comment_hr WHERE come_file_id = ? ORDER BY com_date DESC";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);