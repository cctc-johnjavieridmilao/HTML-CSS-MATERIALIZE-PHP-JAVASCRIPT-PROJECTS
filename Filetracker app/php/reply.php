<?php
require_once 'conn/conn.php';
$comment_id = $_POST['reply_id'];
$file_id = $_POST['file_id'];
$comment = $_POST['reply'];
$username = $_POST['username'];
$query = "INSERT INTO tbl_reply_hr (commment_id,reply_file_id,user_name,reply) VALUES (?,?,?,?)";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $comment_id, PDO::PARAM_STR);
$stmt->bindParam(2, $file_id, PDO::PARAM_STR);
$stmt->bindParam(3, $username, PDO::PARAM_STR);
$stmt->bindParam(4, $comment, PDO::PARAM_STR);
$stmt->execute();
echo json_encode(['success' => 'Comment Added']);