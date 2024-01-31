<?php
function updatepro()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            // Check if the database connection is established. Adjust the connection details accordingly.
            // $conn = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");
            // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE taikhoan 
                    SET 
                    name = :name,
                    email = :email, 
                    tel = :tel,
                    address = :address"; // Closing parenthesis added

            $img = $_FILES['fileInput'] ?? null;  // Adjust to match the actual file input name

            // Check if a new image is uploaded
            if ($img && $img['size'] > 0) {
                // Check if the uploaded file is an image
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!in_array($img['type'], $allowedTypes)) {
                    throw new Exception("Invalid file type. Only JPEG, PNG, and GIF images are allowed.");
                }

                $sql .= ", img = :img";
                $pathUpload = __DIR__ . '/../upload/' . $img['name'];

                // Move uploaded file to the server
                if (move_uploaded_file($img['tmp_name'], $pathUpload)) {
                    $pathSaveDB = 'upload/' . $img['name'];

                    // Remove old image if it exists
                    if ($_POST['img-current'] && $_POST['img-current'] != $pathSaveDB) {
                        unlink($_POST['img-current']);
                    }
                } else {
                    throw new Exception("Failed to move the uploaded image.");
                }
            } else {
                $pathSaveDB = $_POST['img-current'] ?? '';  // Use the current image path if no new image is uploaded
            }

            $sql .= " WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':tel', $_POST['tel']);  // Adjust to match the actual tel input name
            $stmt->bindParam(':address', $_POST['address']);
            $stmt->bindParam(':id', $_POST['id']);

            // Bind image path only if a new image is uploaded
            if ($img && $img['size'] > 0) {
                $stmt->bindParam(':img', $pathSaveDB);
            }

            $stmt->execute();

            // Redirect to another page after successful update
            header('Location: ?act=sanpham');
            exit();
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
?>