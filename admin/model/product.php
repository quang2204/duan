<?php
function getAll()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM sanpham";

        // Chuẩn bị câu truy vấn
        $stmt = $GLOBALS['conn']->prepare($sql);

        // Thực hiện câu truy vấn
        $stmt->execute();

        
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getid()
{
    try {
        $sql = "SELECT * FROM sanpham WHERE id = :id LIMIT 1;";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $_GET['id']);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    } catch (\Throwable $th) {
        die();
    }
}

function xoasp()
{
    try {
        $sql = "DELETE FROM sanpham WHERE id = :id;";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $_GET['id']);

        $stmt->execute();
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }

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

            $stmt->bindParam(':id', $_POST['id']); // Assuming that 'id' is being passed in the POST data

            $stmt->execute();
            header('Location: ?act=sanpham');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
