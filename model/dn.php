<?php

function dn()
{
    try {
        if (!empty($_POST)) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
        
        
            try {
                // Replace these values with your actual database credentials
               
        
                // Thực hiện truy vấn để kiểm tra xem người dùng có tồn tại không
                $query = "SELECT * FROM taikhoan WHERE email = :email AND pass = :pass ";
                $stmt = $GLOBALS['conn']->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pass', $pass);

        
                $stmt->execute();
        
                // Sử dụng phương thức rowCount() để kiểm tra số dòng kết quả
                if ($stmt->rowCount() > 0) {
                    // Người dùng tồn tại trong cơ sở dữ liệu
                    $_SESSION['users'] = [
                        'email' => $email,
                        'pass' => $pass,
                        
                    ];
        
                    // Chuyển hướng sau khi đăng nhập thành công
                    header('Location: index.php'); // replace success.php with your success page
                    exit();
                } else {
                    // Người dùng không tồn tại hoặc thông tin đăng nhập không chính xác
                    echo "Đăng nhập không thành công";
                }
            } catch (PDOException $e) {
                // Handle the exception appropriately, log or display an error message
                echo "An error occurred: " . $e->getMessage();
            }
        }
        

    } catch (Exception $e) {
        // Handle the exception appropriately, log or display an error message
        echo "An error occurred: " . $e->getMessage();
    }
}
?>