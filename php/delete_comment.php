<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "DELETE FROM tbl_comment_hr WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
echo json_encode([
    'success' => 'Comment Deleted',
]);