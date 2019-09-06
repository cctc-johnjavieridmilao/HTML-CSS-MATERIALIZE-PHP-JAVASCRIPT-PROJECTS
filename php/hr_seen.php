<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$query = "UPDATE tbl_notif SET is_seen = 1 WHERE notif_file_id = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $id, PDO::PARAM_STR);
$stmt->execute();
echo 'Seen';