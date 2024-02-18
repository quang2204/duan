<?php
function login()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
            if ($_POST['pass'] != $_POST['nhaplai']) {
                echo '<script>alert("Mật khẩu nhập lại không trùng khớp");</script>';
              
                return;
            }

            $checkEmailQuery = "SELECT COUNT(*) FROM taikhoan WHERE email = :email ";
            $checkEmailStmt = $GLOBALS['conn']->prepare($checkEmailQuery);

            // Sanitize user input to prevent SQL injection
            $email = $_POST['email'];

            $checkEmailStmt->bindParam(':email', $email);
            $checkEmailStmt->execute();

            if ($checkEmailStmt->fetchColumn() > 0) {
                echo '<script>alert("Đã có email này");</script>';

            } else {
                $insertUserQuery = 'INSERT INTO taikhoan (name, pass, email, address, tel,role)
                                    VALUES (:name, :pass, :email, :address, :tel,:role)';
                $insertUserStmt = $GLOBALS['conn']->prepare($insertUserQuery);



                $insertUserStmt->bindParam(':name', $_POST['name']);
                $insertUserStmt->bindParam(':pass', $_POST['pass']);
                $insertUserStmt->bindParam(':email', $_POST['email']);
                $insertUserStmt->bindParam(':address', $_POST['address']);
                $insertUserStmt->bindParam(':tel', $_POST['tel']);
                $insertUserStmt->bindParam(':role', $_POST['role']);

                $insertUserStmt->execute();

                // Redirect to login page if needed
                header("Location:?act=sign-in");
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {

        echo '<script>promt("Đăng ký không thành công");</script>';

    }


}