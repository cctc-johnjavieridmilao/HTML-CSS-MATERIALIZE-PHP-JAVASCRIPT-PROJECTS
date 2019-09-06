<?php
require_once 'conn/conn.php';
date_default_timezone_set('Asia/Manila');
$datenow = date("Y-m-d H:i:s");
$datenow = date("Y-m-d H:i:s", strtotime($datenow . '+20 minutes'));
$file_id = $_POST['id'];
$comment = $_POST['comment'];

$query = "INSERT INTO tbl_comment_hr (come_file_id,comment,com_date) VALUES (?,?,?)";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $file_id, PDO::PARAM_STR);
$stmt->bindParam(2, $comment, PDO::PARAM_STR);
$stmt->bindParam(3, $datenow, PDO::PARAM_STR);
$stmt->execute();
echo json_encode(['success' => 'Comment Added']);