<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "DELETE FROM tbl_reply_hr WHERE reply_id = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
echo json_encode([
    'success' => 'Reply Deleted',
]);