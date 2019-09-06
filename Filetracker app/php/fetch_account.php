<?php
require_once 'conn/conn.php';
$id = $_POST['id'];
$current_pass = $_POST['current_pass'];
$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];

if (empty($current_pass) || empty($new_pass) || empty($confirm_pass)) {
    echo json_encode(['error' => 'Please fill in all fields']);
} else {
// selet user who login
    $query_select = "SELECT * FROM tbl_users WHERE id = ?";
    $stmts = $conn->prepare($query_select);
    $stmts->bindParam(1, $id, PDO::PARAM_STR);
    $stmts->execute();
    while ($row = $stmts->fetch(PDO::FETCH_OBJ)) {
        if ($row->password !== $current_pass) {
            echo json_encode(['error' => 'Current password do not match']);
        } else {
            if ($new_pass !== $confirm_pass) {
                echo json_encode(['error' => 'New password and Confirm password do not match']);
            } else {
                $query_update = "UPDATE tbl_users SET password = ? WHERE id = ?";
                $stmt = $conn->prepare($query_update);
                $stmt->bindParam(1, $new_pass, PDO::PARAM_STR);
                $stmt->bindParam(2, $id, PDO::PARAM_STR);
                $stmt->execute();
                echo json_encode(['success' => 'yes']);
            }
        }
    }
}