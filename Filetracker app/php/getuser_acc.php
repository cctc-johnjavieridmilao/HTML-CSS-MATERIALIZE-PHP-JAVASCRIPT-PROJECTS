<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "SELECT * FROM tbl_users WHERE id = ? ";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);