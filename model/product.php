<?php

// Ở trong Model thì tôi sẽ lấy dữ liệu

// getAll để lấy toàn bộ dữ liệu sản phẩm có trong CSDL
function getAll()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM sanpham";

        // Chuẩn bị câu truy vấn
        $stmt = $GLOBALS['conn']->prepare($sql);

        // Thực hiện câu truy vấn
        $stmt->execute();

        // fetchAll để lấy ra dữ liệu
        // PDO::FETCH_ASSOC - chuyển đổi dữ liệu lấy ra thành kiểu mảng column_name => value
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getAlldm()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM danhmuc";

        // Chuẩn bị câu truy vấn
        $stmt = $GLOBALS['conn']->prepare($sql);

        // Thực hiện câu truy vấn
        $stmt->execute();

        // fetchAll để lấy ra dữ liệu
        // PDO::FETCH_ASSOC - chuyển đổi dữ liệu lấy ra thành kiểu mảng column_name => value
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getByID($id)
{
    try {
        $sql = "SELECT 
            sp.id as sp_id, 
            sp.name as sp_name, 
            sp.img as sp_img, 
            sp.price as sp_price, 
            sp.luotxem as sp_luotxem, 
            sp.mota as sp_mota, 
            sp.motact as sp_motact, 
            dm.name as dm_name
        FROM sanpham as sp
        INNER JOIN danhmuc as dm
            ON dm.id = sp.iddm
        WHERE sp.id = :id";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
