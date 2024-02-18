<?php
require_once "connact.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $productID = $_POST['idpro'];
        $rating = $_POST['rating'];
        $userID = $_POST['iduser'];
        $date = date("Y-m-d");
        $noidung = $_POST['noidung'];

        $sql = "INSERT INTO binhluan (idpro, iduser, noidung, ngaybinhluan, rating) VALUES (:idpro, :iduser, :noidung, :ngaybinhluan, :rating)";
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(':idpro', $productID);
        $stmt->bindParam(':iduser', $userID);
        $stmt->bindParam(':noidung', $noidung);
        $stmt->bindParam(':ngaybinhluan', $date);
        $stmt->bindParam(':rating', $rating);

        $stmt->execute();

        // Trả về ID của đánh giá mới
        $newReviewId = $GLOBALS['conn']->lastInsertId();

        // Truy vấn thông tin chi tiết về đánh giá mới
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
        
        WHERE bl.id = :reviewId";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(':reviewId', $newReviewId);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}