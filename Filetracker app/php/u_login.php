<?php
session_start();
error_reporting(0);
require_once 'conn/conn.php';
$u_name = $_POST['u_name'];
$u_password = $_POST['u_password'];
$query = "SELECT * FROM tbl_users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $u_name, PDO::PARAM_STR);
$stmt->bindParam(2, $u_password, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);
//set session
$set_Session = $_SESSION['users'] = [
    'id' => $row->id,
    'username' => $row->username,
];

if ($stmt->rowCount() > 0) {
    switch ($row->u_type) {
        case 'ara office':
            echo json_encode(['success' => 'yesAra']);
            break;
        case 'eo office':
            echo json_encode(['success' => 'yesEo']);
            break;
        case 'faculty office':
            echo json_encode(['success' => 'yesFaculty']);
            break;
        case 'hr office':
            echo json_encode(['success' => 'yesHr']);
            break;
        case 'research office':
            echo json_encode(['success' => 'yesResearch']);
            break;
        case 'user':
            echo json_encode(['success' => 'yesUsers']);
            break;
        default:
            echo json_encode(['error' => 'User not found in db']);
            break;
    }
} else {
    echo json_encode(['error' => 'User not found in db']);
}