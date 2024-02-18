<?php

function dn()
{
    try {
        if (!empty($_POST)) {
            $pass = $_POST['pass'];

            $query = "SELECT * FROM taikhoan WHERE email = :email AND pass = :pass ";
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Sử dụng phương thức rowCount() để kiểm tra số dòng kết quả
            if ($stmt->rowCount() > 0) {

                // Người dùng tồn tại trong cơ sở dữ liệu
                $_SESSION['users'] = [

                    'name' => $result['name'],
                    'pass' => $result['pass'],
                    'img' => $result['img'],
                    'role' => $result['role'],
                    'email' => $result['email'],
                    'tel' => $result['tel'],
                    'address' => $result['address'],
                    'id' => $result['id'],

                ];
          
                header('Location: ?');
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
