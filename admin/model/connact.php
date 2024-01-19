<?php

    $host = 'localhost';
    $name = 'root';
    $pass = '';
    $dbname = 'duanmau';
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $name, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    } catch (PDOException $e) {
        die($e->getMessage());
    }





