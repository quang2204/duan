<?php
require_once "connact.php";
try {
 

    $sql = "SELECT 
        u.id as user_id, 
        u.name as user_name, 
        u.img as user_img, 
        bl.noidung as comment_content,
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
    WHERE bl.idpro = :productId";

    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bindParam(':productId', $productId);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Encode the result as a JSON string and output it
    echo json_encode($result);
} catch (Exception $e) {
    echo 'ERROR: ' . $e->getMessage();
    die;
}
