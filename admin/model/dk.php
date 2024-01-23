<?php

function dk()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {


            $checkEmailQuery = "SELECT COUNT(*) FROM taikhoan WHERE name = :name ";
            $checkEmailStmt = $GLOBALS['conn']->prepare($checkEmailQuery);

            // Sanitize user input to prevent SQL injection
            $name = $_POST['name'];

            $checkEmailStmt->bindParam(':name', $name);
            $checkEmailStmt->execute();

            if ($checkEmailStmt->fetchColumn() > 0) {
                echo '<script>alert("Sai tên hoặc mật khẩu");</script>';
                //Xử lý đăng nhập không hợp lệ (ví dụ: chuyển hướng, hiển thị thông báo lỗi)
            } else {
                $insertUserQuery = 'INSERT INTO taikhoan (name, pass, email, address, tel)
                                    VALUES (:name, :pass, :email, :address, :tel)';
                $insertUserStmt = $GLOBALS['conn']->prepare($insertUserQuery);

                // Use password_hash to securely store passwords
                // $hashedPassword = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                $insertUserStmt->bindParam(':name', $_POST['name']);
                $insertUserStmt->bindParam(':pass', $_POST['pass']);
                $insertUserStmt->bindParam(':email', $_POST['email']);
                $insertUserStmt->bindParam(':address', $_POST['address']);
                $insertUserStmt->bindParam(':tel', $_POST['tel']);

                $insertUserStmt->execute();

                // Redirect to login page if needed
                header("Location: http://php.test/duanmau/?act=login");
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {

        echo '<script>promt("Đăng ký không thành công");</script>';


    }


}