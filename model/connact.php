<?php
function connact()
{
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

}
function pdoall($sql)
{
    try {
        $conn = connact();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
function pdoid($sql)
{
    try {
        $conn = connact();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $_GET['id']);
        $stmt->execute();
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}