<?php
require_once 'conn/conn.php';
$id = 'Hr Office';
$query = "SELECT * FROM tbl_notif WHERE is_in = ? AND is_seen = 0";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
$countRow = $stmt->rowCount();
echo json_encode(['count' => $countRow]);