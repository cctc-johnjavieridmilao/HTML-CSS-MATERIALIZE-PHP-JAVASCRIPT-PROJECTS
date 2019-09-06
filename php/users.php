<?php
require_once 'conn/conn.php';
$query = "SELECT tbl_uploads.acc_username,tbl_uploads.file_type,tbl_uploads.file,tbl_uploads.id,tbl_research.move_at_r,tbl_research.files_id,tbl_research.move_by_r,tbl_ara.move_at_a,tbl_ara.fileid,tbl_ara.move_by_a,tbl_eo.move_at_e,tbl_eo.file_id,tbl_eo.move_by_e FROM tbl_research LEFT JOIN tbl_uploads ON tbl_research.files_id = tbl_uploads.id LEFT JOIN tbl_ara ON tbl_research.files_id = tbl_ara.fileid LEFT JOIN tbl_eo ON tbl_ara.fileid = tbl_eo.file_id";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);