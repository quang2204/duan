<?php

$host = "localhost";
$dbname = "duanmau";
$username = "root";
$password = "";

try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Đặt chế độ lỗi PDO thành ngoại lệ
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $PDOException) {
    echo "Kết nối thất bại: " . $PDOException->getMessage();
    die;
}