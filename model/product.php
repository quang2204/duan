<?php


function getAlls($limit)
{
    $sql = "SELECT * FROM sanpham ORDER BY id DESC LIMIT " . $limit;
    return select($sql);

}

function size()
{
    $sql = "SELECT * FROM product_size  ";
    return select($sql);

}
function color()
{
    $sql = "SELECT * FROM product_color  ";
    return select($sql);

}
function img()
{
    try {
        $sql = "SELECT * FROM img WHERE id_product=:id ";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $_GET['id']);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }


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
        sp.status as sp_status, 
        sp.motact as sp_motact, 
        sp.quantity as sp_quantity, 
        dm.name as dm_name,
        dm.id as dm_id,
        c.id as c_id,
        c.color as c_name,
        s.id as s_id,
        s.size as s_name,
        v.id_product as id_product,
        v.id as v_id,
        v.id_colors as id_colors,
        v.id_sizes as id_sizes,
        
        v.img as img
        
    FROM 
        sanpham as sp
    INNER JOIN 
        danhmuc as dm ON dm.id = sp.iddm
    INNER JOIN 
        product_variants as v ON v.id_product = sp.id
    INNER JOIN 
        product_color as c ON c.id = v.id_colors
    INNER JOIN 
        product_size as s ON s.id = v.id_sizes
    WHERE 
        sp.id = :id";

    return slectid($sql);
}

function variants()
{
    try {
        $sql = "SELECT  
        v.id as variant_id,
        v.id_product as id_product,
        v.id_colors as id_colors,
        v.id_sizes as id_sizes,
        v.status as status,
        v.img as img,
        
        c.id as color_id,
        c.color as color_name,
        s.id as size_id,
        s.size as size_name
    FROM product_variants as v
    INNER JOIN product_color as c ON c.id = v.id_colors
    INNER JOIN product_size as s ON s.id = v.id_sizes
    WHERE v.id_product = :id_product";
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_product", $_GET['id']);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}

function variant()
{
    try {
        $sql = "SELECT  
        v.id as variant_id,
        v.id_product as id_product,
        v.id_colors as id_colors,
        v.id_sizes as id_sizes,
        v.status as status,
        v.img as img,
        
        c.id as color_id,
        c.color as color_name,
        s.id as size_id,
        s.size as size_name
    FROM product_variants as v
    INNER JOIN product_color as c ON c.id = v.id_colors
    INNER JOIN product_size as s ON s.id = v.id_sizes
    WHERE v.id = :id";
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $_GET['id']);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }

}
function variantcolor()
{
    try {
        $sql = "SELECT  
        v.id as variant_id,
        v.id_product as id_product,
        v.id_colors as id_colors,
        v.id_sizes as id_sizes,
        v.status as status,
        v.img as img,
        
        c.id as color_id,
        c.color as color_name,
        s.id as size_id,
        s.size as size_name
    FROM product_variants as v
    INNER JOIN product_color as c ON c.id = v.id_colors
    INNER JOIN product_size as s ON s.id = v.id_sizes
     WHERE v.id_product = :id_product and v.id_colors=:color";
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id_product", $_GET['id']);
        $stmt->bindParam(":color", $_GET['color']);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result);
        exit();
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }

}
function getProductData($orderBy = null, $search = null, $iddm = null, $minPrice = null, $maxPrice = null, $productsPerPage = null, $page = null)
{
    try {
        $sql = "SELECT * FROM sanpham ";
        $params = [];
        $whereClause = []; 

        if ($search !== null) {
            $whereClause[] = "name LIKE :search";
            $params[':search'] = '%' . $search . '%';
        } elseif ($iddm !== null) {
            $whereClause[] = "iddm = :iddm";
            $params[':iddm'] = $iddm;
        }

        // Xử lý điều kiện giá
        if ($minPrice !== null && $maxPrice !== null) {
            $whereClause[] = "price BETWEEN :minPrice AND :maxPrice";
            $params[':minPrice'] = $minPrice;
            $params[':maxPrice'] = $maxPrice;
        } elseif ($minPrice !== null) {
            $whereClause[] = "price >= :minPrice";
            $params[':minPrice'] = $minPrice;
        } elseif ($maxPrice !== null) {
            $whereClause[] = "price <= :maxPrice";
            $params[':maxPrice'] = $maxPrice;
        }

    
        if (!empty($whereClause)) {
            $sql .= " WHERE " . implode(" AND ", $whereClause);
        }

        // Xử lý sắp xếp
        if ($orderBy !== null) {
            $sql .= " ORDER BY price " . $orderBy;
        }

        // Đếm tổng số sản phẩm
        $countSql = "SELECT COUNT(*) FROM sanpham";
        if (!empty($whereClause)) {
            $countSql .= " WHERE " . implode(" AND ", $whereClause);
        }
        $countStmt = $GLOBALS['conn']->prepare($countSql);
        foreach ($params as $param => $value) {
            $countStmt->bindValue($param, $value);
        }
        $countStmt->execute();
        $totalCount = $countStmt->fetchColumn();

        // Tính tổng số trang và offset
        $totalPages = ceil($totalCount / $productsPerPage);
        $offset = ($page - 1) * $productsPerPage;

        // Thêm LIMIT và OFFSET vào câu truy vấn
        $sql .= " LIMIT $productsPerPage OFFSET $offset";

        // Thực thi câu truy vấn
        $stmt = $GLOBALS['conn']->prepare($sql);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        $stmt->execute();

        // Lấy kết quả
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'products' => $result,
            'totalPages' => $totalPages,
        ];
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}


// function s()
// {
//     try {
//         $sql = "SELECT *
//     FROM product_variants 

//     WHERE id_product = :id_product";
//         $stmt = $GLOBALS['conn']->prepare($sql);

//         $stmt->bindParam(":id_product", $_GET['id']);

//         $stmt->execute();

//         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         return $result;
//     } catch (Exception $e) {
//         echo 'ERROR: ' . $e->getMessage();
//         die;
//     }

// }





