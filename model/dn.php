<?php

function dn()
{
    try {
        if (!empty($_POST)) {
            $pass = $_POST['pass'];
            $email = $_POST['email']; // Sanitize user input
            // Using prepared statements to prevent SQL injection
            $query = "SELECT * FROM taikhoan WHERE email = :email AND pass = :pass ";
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bindParam(':email', $email); // Binding email parameter
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && $result['status'] == 1) {
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
                echo '<script>alert("Sai tên hoặc mật khẩu hoặc tài khoản đã bị khóa");</script>';
            }
        }
    } catch (Exception $e) {

        echo "An error occurred: " . $e->getMessage();
    }
}

