<?php
require_once 'conn/conn.php';
date_default_timezone_set('Asia/Manila');
$query = "SELECT tbl_uploads.acc_username,tbl_uploads.file_type,tbl_uploads.file,tbl_uploads.id,tbl_research.move_at_r,tbl_research.files_id,tbl_research.move_by_r,tbl_ara.move_at_a,tbl_ara.fileid,tbl_ara.move_by_a,tbl_eo.move_at_e,tbl_eo.file_id,tbl_eo.move_by_e,tbl_notif.send_date,tbl_notif.notif_file_id,tbl_notif.send_by,tbl_notif.is_seen,tbl_notif.is_in FROM tbl_research LEFT JOIN tbl_uploads ON tbl_research.files_id = tbl_uploads.id LEFT JOIN tbl_ara ON tbl_research.files_id = tbl_ara.fileid LEFT JOIN tbl_eo ON tbl_ara.fileid = tbl_eo.file_id LEFT JOIN tbl_notif ON tbl_uploads.id = tbl_notif.notif_file_id ORDER BY tbl_notif.send_date DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
$datenow = date("Y-m-d H:i:s");
//$datenow = date("Y-m-d H:i:s", strtotime($datenow . '+5 minutes'));
echo json_encode(['row' => $row, 'datenow' => $datenow]);