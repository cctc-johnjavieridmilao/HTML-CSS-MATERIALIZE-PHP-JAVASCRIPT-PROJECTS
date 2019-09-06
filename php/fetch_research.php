<?php
require_once 'conn/conn.php';
$query = "SELECT tbl_uploads.acc_username,tbl_uploads.file_type,tbl_uploads.file,tbl_uploads.id,tbl_research.move_at_r,tbl_research.files_id,tbl_research.move_by_r FROM tbl_research LEFT JOIN tbl_uploads ON tbl_research.files_id = tbl_uploads.id ORDER BY tbl_research.move_at_r DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);