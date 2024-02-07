<?php
function getAll()
{

    $sql = "SELECT * FROM sanpham";
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
            $sql = "UPDATE sanpham 
                    SET 
                    name = :name,
                    price = :price,
                    mota = :mota,
                    iddm = :iddm,
                    motact = :motact,
                    luotxem = :luotxem";

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
                    if ($_POST['img-current'] && $_POST['img-current'] != $pathSaveDB) {
                        unlink($_POST['img-current']);
                    }
                }
            }

            $sql .= " WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':mota', $_POST['mota']);
            $stmt->bindParam(':iddm', $_POST['iddm']);
            $stmt->bindParam(':motact', $_POST['motact']);
            $stmt->bindParam(':luotxem', $_POST['luotxem']);

            // Nếu có ảnh mới, thì bind thêm đường dẫn ảnh mới
            if ($img && $img['size'] > 0) {
                $stmt->bindParam(':img', $pathSaveDB);
            }

            $stmt->bindParam(':id', $_POST['id']);

            $stmt->execute();
            header('Location: ?act=sanpham');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}

function countsp()
{

    $sql = "SELECT COUNT(*) as total  FROM sanpham";
    return counts($sql);

}
function countuser()
{

    $sql = "SELECT COUNT(*) as total  FROM taikhoan";
    return counts($sql);

}
function countbl()
{

    $sql = "SELECT COUNT(*) as total  FROM binhluan";
    return counts($sql);

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


