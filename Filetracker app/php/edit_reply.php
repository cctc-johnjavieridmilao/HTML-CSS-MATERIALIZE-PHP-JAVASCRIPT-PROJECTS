<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$edit_reply = $_POST['edit_reply'];
$query = "UPDATE tbl_reply_hr SET reply = ? WHERE reply_id = ? ";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $edit_reply, PDO::PARAM_STR);
$stmt->bindParam(2, $id, PDO::PARAM_STR);
$stmt->execute();
echo json_encode([
    'success' => 'Reply Updated',
]);