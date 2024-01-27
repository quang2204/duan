<?php
ob_start();
function addsp()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {

            $sql = "INSERT INTO sanpham (name, price, img, mota, iddm, motact, luotxem)
                VALUES (:name, :price, :img, :mota, :iddm, :motact, 0)";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':mota', $_POST['mota']);
            $stmt->bindParam(':iddm', $_POST['iddm']);
            $stmt->bindParam(':motact', $_POST['motact']);
            $img = $_FILES['img'] ?? null;
            $pathSaveDB = '';
            // Xử lý upload ảnh
            if ($img) { // Khi mà có upload ảnh lên thì mới xử lý upload

                $pathUpload = __DIR__ . '/../upload/' . $img['name'];

                // Upload file lên để lưu trữ
                if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
                    $pathSaveDB = 'upload/' . $img['name'];
                }
            }

            $stmt->bindParam(':img', $pathSaveDB);

            $stmt->execute();
            header('Location:?act=sanpham'); // replace success.php with your success page

            ob_end_clean();
            return $stmt;
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

}
