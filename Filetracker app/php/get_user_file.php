<?php
require_once 'conn/conn.php';
$username = $_POST['username'];
$query = "SELECT * FROM tbl_uploads WHERE acc_username = ? ";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $username, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);