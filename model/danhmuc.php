<?php
function getAlldm()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM danhmuc ";
        return select($sql);
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}