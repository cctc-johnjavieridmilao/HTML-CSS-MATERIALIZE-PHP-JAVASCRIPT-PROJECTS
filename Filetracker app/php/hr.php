<?php
require_once 'conn/conn.php';
$query = "SELECT tbl_uploads.acc_username,tbl_uploads.file_type,tbl_uploads.file,tbl_uploads.id,tbl_hr.move_date,tbl_hr.file_hr_id,tbl_hr.move_by,tbl_notif.notif_file_id,tbl_notif.send_by,tbl_notif.is_in,tbl_notif.send_date,tbl_notif.is_seen FROM tbl_hr LEFT JOIN tbl_uploads ON tbl_hr.file_hr_id = tbl_uploads.id LEFT JOIN tbl_notif ON tbl_hr.file_hr_id = tbl_notif.notif_file_id ORDER BY tbl_hr.move_date DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);