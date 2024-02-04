<?php


function getAll($limit)
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT " . $limit;
        return select($sql);
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}

function getidm($iddm)
{
    try {
        $sql = "SELECT * FROM sanpham WHERE iddm = :iddm";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":iddm", $iddm);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    } catch (PDOException $e) {
        // Handle the exception, logging or displaying an error message
        die("Error: " . $e->getMessage());
    }
}

// Example of usage:
function getidsp($iddm, $id)
{
    try {
        $sql = "SELECT * FROM sanpham WHERE iddm = :iddm and id!=:id ";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":iddm", $iddm);
        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    } catch (PDOException $e) {
        // Handle the exception, logging or displaying an error message
        die("Error: " . $e->getMessage());
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
            dm.name as dm_name,
            dm.id as dm_id
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
function desc()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM sanpham ORDER BY price DESC  ";
        return select($sql);
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function acs()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM sanpham ORDER BY price ASC  ";
        return select($sql);
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getAlls()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM sanpham  ";
        return select($sql);
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function search($search)
{

    $sql = "SELECT * FROM sanpham WHERE name LIKE ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->execute(['%' . $search . '%']);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

