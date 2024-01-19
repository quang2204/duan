<?php
function login()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {


            $checkEmailQuery = "SELECT COUNT(*) FROM taikhoan WHERE user = :user";
            $checkEmailStmt = $GLOBALS['conn']->prepare($checkEmailQuery);
            $checkEmailStmt->bindParam(':user', $_POST['user']);
            $checkEmailStmt->execute();

            if ($checkEmailStmt->fetchColumn() > 0) {
                echo 'Email already exists';
            } else {
                $insertUserQuery = 'INSERT INTO taikhoan (user, pass, email, address, tel)
                                    VALUES (:user, :pass, :email, :address, :tel)';
                $insertUserStmt = $GLOBALS['conn']->prepare($insertUserQuery);

                // Use password_hash to securely store passwords
                // $hashedPassword = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                $insertUserStmt->bindParam(':user', $_POST['user']);
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
        echo 'Invalid request method.';
    }


}