<?php


function getAll($limit)
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT " . $limit;
    return select($sql);

}
function getview($limit)
{
    $sql = "SELECT * FROM sanpham ORDER BY luotxem DESC LIMIT " . $limit;
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
function getProductData($orderBy = null, $search = null, $iddm = null, $minPrice = null, $maxPrice = null, $productsPerPage = null, $page = null)
{
    try {
        $sql = "SELECT * FROM sanpham";

        $params = [];


        if ($search !== null) {
            $sql .= " WHERE name LIKE :search";
            $params[':search'] = '%' . $search . '%';
        } elseif ($iddm !== null) {
            $sql .= " WHERE iddm = :iddm";
            $params[':iddm'] = $iddm;
        }

        if ($minPrice !== null && $maxPrice !== null) {
            $sql .= " WHERE price BETWEEN :minPrice AND :maxPrice";
            $params[':minPrice'] = $minPrice;
            $params[':maxPrice'] = $maxPrice;
        } elseif ($minPrice !== null) {
            $sql .= ($search !== null || $iddm !== null) ? " AND price >= :minPrice" : " WHERE price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        } elseif ($maxPrice !== null) {
            $sql .= ($search !== null || $iddm !== null || $minPrice !== null) ? " AND price <= :maxPrice" : " WHERE price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

        if ($orderBy !== null) {
            $sql .= " ORDER BY price " . $orderBy;
        }


        $countStmt = $GLOBALS['conn']->prepare($sql);
        foreach ($params as $param => $value) {
            $countStmt->bindValue($param, $value);
        }
        $countStmt->execute();
        $totalCount = $countStmt->rowCount();


        $totalPages = ceil($totalCount / $productsPerPage);


        $offset = ($page - 1) * $productsPerPage;
        $sql .= " LIMIT $productsPerPage OFFSET $offset";

        $stmt = $GLOBALS['conn']->prepare($sql);


        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'products' => $result,
            'totalPages' => $totalPages,
        ];
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}






