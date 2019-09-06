<?php
try {
    $dsn = "mysql:host=localhost;dbname=filetrack_db";
    $conn = new PDO($dsn, "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'ERR:' . $e->getMessage();
}