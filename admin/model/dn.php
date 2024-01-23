<?php

function dnadmin()
{
    try {
        if (!empty($_POST)) {
            $pass = $_POST['pass'];

            // Thực hiện truy vấn để kiểm tra xem người dùng có tồn tại không
            $query = "SELECT * FROM taikhoan WHERE name = :name AND pass = :pass ";
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bindParam(':name', $_POST['name']);
            $stmt->bindParam(':pass', $pass);


            $stmt->execute();

            // Sử dụng phương thức rowCount() để kiểm tra số dòng kết quả
            if ($stmt->rowCount() > 0) {
                // Người dùng tồn tại trong cơ sở dữ liệu
                $_SESSION['users'] = [
                    'name' => $_POST['name'],
                    'pass' => $pass,

                ];

                header('Location: index.php');
                exit();
            } else {
                // Người dùng không tồn tại hoặc thông tin đăng nhập không chính xác
                echo '<script>alert("Sai tên hoặc mật khẩu");</script>';
            }

        }


    } catch (Exception $e) {
        // Handle the exception appropriately, log or display an error message
        echo "An error occurred: " . $e->getMessage();
    }
}
