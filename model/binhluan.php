<?php
function allbl($productId)
{
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

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function inserbl()
{

    // Kiểm tra xem form đã được submit chưa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $productID = $_POST['idpro'];
        $rating = $_POST['rating'];
        $userID = $_POST['iduser'];
        $date = date("Y-m-d");
        $noidung = $_POST['noidung'];

        try {
            $sql = "INSERT INTO binhluan (idpro, iduser, noidung, ngaybinhluan, rating) VALUES (:idpro, :iduser, :noidung, :ngaybinhluan, :rating)";
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(':idpro', $productID);
            $stmt->bindParam(':iduser', $userID);
            $stmt->bindParam(':noidung', $noidung);
            $stmt->bindParam(':ngaybinhluan', $date);
            $stmt->bindParam(':rating', $rating);

            // Thực hiện truy vấn
            $stmt->execute();


            header('Location:?act=product-detail&id=' . $_GET["id"] . '&iddm=' . $_GET['iddm'] . '#bl');
            exit;

        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }


    }
}


function allsbl()
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
        ";

        $stmt = $GLOBALS['conn']->prepare($sql);



        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function xoabl()
{
    try {
        $sql = "DELETE FROM binhluan WHERE id = :id;";
        return slectid($sql);

    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
