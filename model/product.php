<?php


function getAll($limit)
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT " . $limit;
    return select($sql);

}

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

        die("Error: " . $e->getMessage());
    }
}
function getByID($id)
{

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

    return slectid($sql);

}
function getProductData($orderBy = null, $search = null, $iddm = null)
{
    try {
        $sql = "SELECT * FROM sanpham";

        // Thêm điều kiện dựa trên các tham số
        if ($search !== null) {
            $sql .= " WHERE name LIKE :search";
            $params = [':search' => '%' . $search . '%'];
        } elseif ($iddm !== null) {
            $sql .= " WHERE iddm = :iddm";
            $params = [':iddm' => $iddm];
        } else {
            $params = [];
        }

        if ($orderBy !== null) {
            $sql .= " ORDER BY price " . $orderBy;
        }

        $stmt = $GLOBALS['conn']->prepare($sql);

        // Liên kết tham số nếu có
        foreach ($params as $param => $value) {
            $stmt->bindParam($param, $value);
        }

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    } catch (PDOException $e) {

        die("Error: " . $e->getMessage());
    }
}

