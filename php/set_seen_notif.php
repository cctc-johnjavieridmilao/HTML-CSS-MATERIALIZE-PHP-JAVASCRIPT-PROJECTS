<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "UPDATE tbl_comment_hr SET is_seen = 1 WHERE is_seen = 0 and come_file_id = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
echo 'Seen';