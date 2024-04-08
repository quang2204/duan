<?php

function getAll($keyword, $page = '', $perPage = '')
{
    $offset = ($page - 1) * $perPage;
    $sql = "SELECT 
    sp.id as sp_id, 
    sp.name as sp_name, 
    sp.img as sp_img, 
    sp.price as sp_price, 
    sp.motact as sp_motact, 
    dm.name as dm_name,
    sp.status as sp_status, 
    dm.id as dm_id
FROM sanpham as sp
INNER JOIN danhmuc as dm
    ON dm.id = sp.iddm
WHERE sp.name LIKE '%$keyword%' OR sp.name LIKE '%$keyword%'
ORDER BY sp.id DESC LIMIT $offset, $perPage";
    return select($sql);
}

function getid()
{
    $sql = "SELECT * FROM sanpham WHERE id = :id LIMIT 1;";

    return slectid($sql);

}

function xoasp()
{

    $sql = "DELETE FROM sanpham WHERE id = :id;";
    return slectid($sql);


}
function updatesp()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            if (empty($_SESSION['error'])) {
                $conn = $GLOBALS['conn']; // Lưu trữ kết nối vào biến cục bộ để sử dụng nhiều lần
                $id = $_POST['id'];

                // Chuẩn bị câu lệnh SQL cập nhật thông tin sản phẩm
                $sql = "UPDATE sanpham 
                        SET 
                            name = :name,
                            price = :price,
                            quantity = :quantity,
                            iddm = :iddm,
                            motact = :motact,
                            status = :status";

                $img = $_FILES['img'] ?? null;
                $pathSaveDB = $_POST['img-current'] ?? '';

                // Nếu có ảnh mới, thì cập nhật đường dẫn ảnh mới
                if ($img && $img['size'] > 0) {
                    $sql .= ", img = :img";
                    $pathUpload = __DIR__ . '/../upload/' . $img['name'];

                    // Upload file lên để lưu trữ
                    if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
                        $pathSaveDB = 'upload/' . $img['name'];

                        // Xóa ảnh cũ nếu có
                        if (!empty($_POST['img-current']) && $_POST['img-current'] != $pathSaveDB) {
                            unlink(__DIR__ . "/../{$_POST['img-current']}");
                        }
                    }
                }

                $sql .= " WHERE id = :id";
                $status = 1; // Giả sử status được cập nhật luôn là 1
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name', $_POST['name']);
                $stmt->bindParam(':price', $_POST['price']);
                $stmt->bindParam(':iddm', $_POST['iddm']);
                $stmt->bindParam(':motact', $_POST['motact']);
                $stmt->bindParam(':status', $status);
                $stmt->bindParam(':quantity', $_POST['quantity']);

                // Nếu có ảnh mới, thì bind thêm đường dẫn ảnh mới
                if ($img && $img['size'] > 0) {
                    $stmt->bindParam(':img', $pathSaveDB);
                }

                $stmt->bindParam(':id', $id);
                $stmt->execute();

                // Chuẩn bị thêm ảnh vào sản phẩm
                $albumImages = $_FILES['anh'] ?? null;
                if (!empty($albumImages)) {
                    $sqlImg = "INSERT INTO img (id_product, img) VALUES (:id_product, :img)";
                    $stmtImg = $conn->prepare($sqlImg);

                    foreach ($albumImages['tmp_name'] as $key => $tmp_name) {
                        if (!empty($tmp_name)) {
                            $albumImg = $_FILES['anh']['name'][$key];
                            $pathUploadAlbum = __DIR__ . '/../upload/' . $albumImg;

                            if (move_uploaded_file($tmp_name, $pathUploadAlbum)) {
                                $pathSaveDBAlbum = 'upload/' . $albumImg;
                                $stmtImg->bindParam(':id_product', $id);
                                $stmtImg->bindParam(':img', $pathSaveDBAlbum);
                                $stmtImg->execute();
                            }
                        }
                    }
                }

                header('Location: ?act=sanpham');
                exit(); // Kết thúc kịch bản sau khi chuyển hướng
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            exit(); // Kết thúc kịch bản nếu có lỗi xảy ra
        }
    }
}


function counttb($table)
{

    $sql = "SELECT COUNT(*) as total  FROM $table";
    return counts($sql);

}
function counttotal()
{
    try {
        $sql = "SELECT  sum(total) as total  FROM orders";

        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }


}
function thongke()
{

    $sql = 'SELECT
        dm.id as dm_id,
        dm.name as dm_name,
        count(sp.id) as sp_id,
        min(sp.price) as min_sp,
        max(sp.price) as max_sp,
        avg(sp.price) as sp_price 
    FROM sanpham as sp
    INNER JOIN danhmuc as dm
    ON dm.id = sp.iddm
    GROUP by dm.id 
    ORDER BY min(sp.price) ASC';
    return select($sql);
}

function getdm()
{

    $sql = "SELECT * FROM danhmuc;";
    return select($sql);
}
function xoaimg()
{
    $sql = "DELETE FROM img WHERE id = :id;";
    return slectid($sql);
}
function updatecolor()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {

            $sql = "UPDATE product_color 
                    SET 
                    color = :color
                    where id=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':color', $_POST['color']);

            $stmt->bindParam(':id', $_POST['id']);

            $stmt->execute();
            header('Location: ?act=color');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
function addcolor()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {

            $sql = "INSERT INTO product_color (color)
                VALUES (:color)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':color', $_POST['color']);
            $stmt->execute();
            header('Location:?act=color');
            return $stmt;
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

}
function getidcolor()
{

    $sql = "SELECT * FROM product_color WHERE id = :id LIMIT 1;";
    return slectid($sql);
}
function xoacolor()
{
    $sql = "DELETE FROM product_color WHERE id = :id;";
    return slectid($sql);
}
function getAllcolor($keyword, $page = '', $perPage = '')
{

    $offset = ($page - 1) * $perPage;
    $sql = "SELECT * FROM product_color WHERE color LIKE '%$keyword%' OR color LIKE '%$keyword%'
    LIMIT $offset, $perPage";
    return select($sql);
}
function getAllsize($keyword, $page = '', $perPage = '')
{

    $offset = ($page - 1) * $perPage;
    $sql = "SELECT * FROM product_size WHERE size LIKE '%$keyword%' OR size LIKE '%$keyword%' LIMIT $offset, $perPage";
    return select($sql);
}
function getidsize()
{

    $sql = "SELECT * FROM product_size WHERE id = :id LIMIT 1;";
    return slectid($sql);
}
function xoasize()
{
    $sql = "DELETE FROM product_size WHERE id = :id;";
    return slectid($sql);
}
function updatev()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
            $sql = "UPDATE product_variants 
                SET 
                status = :status
                where id=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':status', $_POST['status']);
            $stmt->bindParam(':id', $_POST['id']);

            $stmt->execute();
            header('Location: ?act=attribute');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }

    }
}
function addsize()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {

            $sql = "INSERT INTO product_size (size)
                VALUES (:size)";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':size', $_POST['size']);
            $stmt->execute();
            header('Location:?act=size');
            return $stmt;
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

}
function updatesize()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $sql = "UPDATE product_size 
                    SET 
                    size = :size
                    where id=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':size', $_POST['size']);

            $stmt->bindParam(':id', $_POST['id']);

            $stmt->execute();
            header('Location: ?act=size');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
function updatestatus($table)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $sql = "UPDATE $table
                    SET 
                    status = :status
                    where id=:id";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':status', $_POST['status']);

            $stmt->bindParam(':id', $_POST['id']);

            $stmt->execute();
            header('Location: ?act=attribute&id=' . $_POST['idpoduct']);
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}

