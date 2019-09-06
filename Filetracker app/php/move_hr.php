<?php
require_once 'conn/conn.php';
date_default_timezone_set('Asia/Manila');
$id = $_POST['file_id'];
$username = $_POST['username'];
$by = "Hr Office";
$checkExits = "SELECT * FROM tbl_hr WHERE file_hr_id = ?";
$stmts = $conn->prepare($checkExits);
$stmts->bindParam(1, $id, PDO::PARAM_STR);
$stmts->execute();
if ($stmts->rowCount() > 0) {
    echo json_encode(['error' => 'This file Already Move']);
} else {
    // 1
    $query = "INSERT INTO tbl_hr (file_hr_id,move_by) VALUE (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_STR);
    $stmt->bindParam(2, $username, PDO::PARAM_STR);
    $stmt->execute();

    // 2
    $query = "UPDATE tbl_uploads SET is_forward = 1 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_STR);
    $stmt->execute();

    // 3
    $datenow = date("Y-m-d H:i:s");
    $datenow = date("Y-m-d H:i:s", strtotime($datenow . '+20 minutes'));
    $query = "INSERT INTO tbl_notif (notif_file_id,send_by,is_in,send_date) VALUE (?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $id, PDO::PARAM_STR);
    $stmt->bindParam(2, $username, PDO::PARAM_STR);
    $stmt->bindParam(3, $by, PDO::PARAM_STR);
    $stmt->bindParam(4, $datenow, PDO::PARAM_STR);
    $stmt->execute();

    echo json_encode(['success' => 'yes']);
}