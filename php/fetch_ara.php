<?php
require_once 'conn/conn.php';
$query = "SELECT tbl_uploads.acc_username,tbl_uploads.file_type,tbl_uploads.file,tbl_uploads.id,tbl_ara.move_at,tbl_ara.fileid,tbl_ara.move_by FROM tbl_ara LEFT JOIN tbl_uploads ON tbl_ara.fileid = tbl_uploads.id ORDER BY tbl_ara.move_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($row);