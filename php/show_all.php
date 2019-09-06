<?php
require_once 'conn/conn.php';
$id = $_POST['com_file_id'];
$query = "SELECT * FROM tbl_uploads WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);