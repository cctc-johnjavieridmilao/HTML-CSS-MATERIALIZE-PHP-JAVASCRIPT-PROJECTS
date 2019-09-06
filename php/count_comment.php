<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "SELECT * FROM tbl_comment_hr WHERE come_file_id = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
$countRow = $stmt->rowCount();
echo json_encode(['count' => $countRow]);