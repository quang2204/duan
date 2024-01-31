<?php
function updatepro()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $sql = "UPDATE taikhoan 
                    SET 
                    name = :name,
                    email = :email, 
                    tel = :tel,
                    address = :address";

            $img = isset($_FILES['img']) ? $_FILES['img'] : null;

            if ($img && $img['size'] > 0) {
                $sql .= ", img = :img";
                $pathUpload = __DIR__ . '/../upload/' . $img['name'];

                if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
                    $pathSaveDB = 'upload/' . $img['name'];

                    if ($_POST['img-current'] && $_POST['img-current'] != $pathSaveDB) {
                        unlink($_POST['img-current']);
                    }
                } else {
                    throw new Exception("Failed to move the uploaded image.");
                }
            } else {
                $pathSaveDB = $_POST['img-current'] ?? '';
            }

            $sql .= " WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':tel', $_POST['tel']);
            $stmt->bindParam(':address', $_POST['address']);
            $stmt->bindParam(':id', $_POST['id']);

            if ($img && $img['size'] > 0) {
                $stmt->bindParam(':img', $pathSaveDB);
            }

            $stmt->execute();

            header('Location: ?act=user');
            exit();
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
?>