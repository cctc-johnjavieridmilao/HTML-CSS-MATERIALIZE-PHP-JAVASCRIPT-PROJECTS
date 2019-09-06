<?php
require_once 'conn/conn.php';
date_default_timezone_set('Asia/Manila');
$query = "SELECT tbl_uploads.acc_username,tbl_uploads.file_type,tbl_uploads.file,tbl_uploads.id,tbl_hr.move_date,tbl_hr.file_hr_id,tbl_hr.move_by,tbl_comment_hr.come_file_id,tbl_comment_hr.comment,tbl_comment_hr.com_date,tbl_comment_hr.is_seen,tbl_comment_hr.id FROM tbl_hr LEFT JOIN tbl_uploads ON tbl_hr.file_hr_id = tbl_uploads.id LEFT JOIN tbl_comment_hr ON tbl_hr.file_hr_id = tbl_comment_hr.come_file_id ORDER BY tbl_comment_hr.com_date DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
$datenow = date("Y-m-d H:i:s");
echo json_encode(['row' => $row, 'datenow' => $datenow]);