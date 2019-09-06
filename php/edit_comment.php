<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$edit_comment = $_POST['edit_comment'];
$query = "UPDATE tbl_comment_hr SET comment = ? WHERE id = ? ";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $edit_comment, PDO::PARAM_STR);
$stmt->bindParam(2, $id, PDO::PARAM_STR);
$stmt->execute();
echo json_encode([
    'success' => 'Comment Updated',
]);