<?php
require_once 'conn/conn.php';
$account_name = $_POST['account_uname'];
$fileType = $_POST['fileType'];
$file = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$r = rand(1, 500);
$destination = "../offices/Faculty/uploaded_files/$r$file";
$FILESZZ = "$r$file";
move_uploaded_file($tmp_name, $destination);
$checkaccount = "SELECT * FROM tbl_users WHERE username = ?";
$stmts = $conn->prepare($checkaccount);
$stmts->bindParam(1, $account_name, PDO::PARAM_STR);
$stmts->execute();
if ($stmts->rowCount() > 0) {
    $query = "INSERT INTO tbl_uploads (acc_username,file_type,file) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(1, $account_name, PDO::PARAM_STR);
    $stmt->bindParam(2, $fileType, PDO::PARAM_STR);
    $stmt->bindParam(3, $FILESZZ, PDO::PARAM_STR);
    $stmt->execute();
    echo json_encode(['success' => 'yes']);
} else {
    echo json_encode(['error' => 'Username Not Found in DB']);
}