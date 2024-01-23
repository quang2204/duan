<?php
function login()
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
                echo '<script>promt("Đã có tên này");</script>';
                // Handle the invalid login (e.g., redirect, display an error message)
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
                header("Location: ?act=sign-in");
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {

        echo '<script>promt("Đăng ký không thành công");</script>';

    }


}