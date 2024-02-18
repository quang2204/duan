<?php
function allbl($productId)
{
    try {
        $sql = "SELECT 
            u.id as user_id, 
            u.name as user_name, 
            u.img as user_img, 
            bl.noidung as comment_content,
            bl.id as bl_id,
            bl.iduser as comment_user_id,
            bl.ngaybinhluan as ngaybinhluan,
            bl.rating as rating,
            sp.id as product_id,
            sp.name as product_name,
            sp.price as product_price,
            sp.img as product_img,
            sp.mota as product_description
        FROM binhluan as bl
        INNER JOIN taikhoan as u ON bl.iduser = u.id
        INNER JOIN sanpham as sp ON bl.idpro = sp.id
        WHERE bl.idpro = :productId
        ORDER BY bl.id DESC";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':productId', $productId);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}

function allsbl($page = 1, $perPage = 6)
{

    $offset = ($page - 1) * $perPage;
    $sql = "SELECT sp.id AS product_id,
    sp.name AS product_name,
    sp.price as product_price,
    sp.img as product_img,
    COUNT(bl.id) AS comment_content
FROM sanpham sp
LEFT JOIN binhluan bl ON sp.id = bl.idpro
GROUP BY sp.id, sp.name LIMIT $offset, $perPage";
    return select($sql);
}
function xoabl()
{

    $sql = "DELETE FROM binhluan WHERE id = :id;";
    return slectid($sql);

}
