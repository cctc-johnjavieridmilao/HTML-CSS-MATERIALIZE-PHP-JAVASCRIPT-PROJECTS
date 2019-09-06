<?php
require_once 'conn/conn.php';
$fullname = $_POST['f_name'];
$u_name = $_POST['u_name'];
$u_password = $_POST['u_password'];
$u_type = 'user';
$checkUsersExist = "SELECT * FROM tbl_users WHERE username = ?";
$stmt = $conn->prepare($checkUsersExist);
$stmt->bindParam(1, $u_name, PDO::PARAM_STR);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    echo json_encode(['error' => 'User already Exist']);

} else {
    $insert = "INSERT INTO tbl_users (fullname,username,password,u_type) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($insert);
    $stmt->bindParam(1, $fullname, PDO::PARAM_STR);
    $stmt->bindParam(2, $u_name, PDO::PARAM_STR);
    $stmt->bindParam(3, $u_password, PDO::PARAM_STR);
    $stmt->bindParam(4, $u_type, PDO::PARAM_STR);
    $stmt->execute();
    echo json_encode(['success' => 'success']);

}