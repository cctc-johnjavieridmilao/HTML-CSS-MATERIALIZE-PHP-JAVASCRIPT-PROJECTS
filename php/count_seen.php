<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "SELECT * FROM tbl_notif WHERE notif_file_id = ? AND is_seen = 0";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
$countRow = $stmt->rowCount();
echo json_encode(['count' => $countRow]);