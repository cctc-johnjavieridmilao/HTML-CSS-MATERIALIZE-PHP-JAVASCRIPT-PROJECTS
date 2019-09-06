<?php
require_once 'conn/conn.php';
$query = "SELECT tbl_uploads.acc_username,tbl_uploads.file_type,tbl_uploads.file,tbl_uploads.id,tbl_eo.move_at_e,tbl_eo.file_id,tbl_eo.move_by_e FROM tbl_eo LEFT JOIN tbl_uploads ON tbl_eo.file_id = tbl_uploads.id ORDER BY tbl_eo.move_at_e DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);