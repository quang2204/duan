<?php
ob_start();
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
                $pass=md5($_POST['pass']);
                $insertUserStmt = $GLOBALS['conn']->prepare($insertUserQuery);

                $insertUserStmt->bindParam(':name', $_POST['name']);
                $insertUserStmt->bindParam(':pass', $pass);
                $insertUserStmt->bindParam(':email', $_POST['email']);
                $insertUserStmt->bindParam(':address', $_POST['address']);
                $insertUserStmt->bindParam(':tel', $_POST['tel']);
                $insertUserStmt->bindParam(':role', $_POST['role']);

                $insertUserStmt->execute();
                $to = $_POST['email'];
                $subject = "Welcome";
                $body = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            margin: 0;
                            padding: 0;
                            background-color: #f8f8f8;
                        }
                
                        .forms {
                            max-width: 600px;
                            margin: 40px auto;
                            border: 1px solid #d9d9d9;
                            background-color: #fff;
                            line-height: 2.4;
                        }
                
                        .logos {
                            background-color: #f8f8f8;
                            padding: 30px 20px;
                            text-align: center;
                            border-bottom: 1px solid #d9d9d9;
                        }
                
                        .logos img {
                            width: 200px;
                        }
                
                        .content {
                            padding: 30px;
                        }
                
                        h5 {
                            margin-top: 10px;
                        }
                
                        .footer {
                            background-color: #2a3b8f;
                            text-align: center;
                            padding: 10px;
                            color: white;
                        }
                
                        .footer a {
                            color: white;
                            margin-right: 10px;
                            text-decoration: none;
                        }
                    </style>
                </head>
                <body>
                
                    <form class="forms">
                
                        <div class="content">
                            <p>Kính chào Quý khách Lương Thành Quang,</p>
                            <h5>Thông tin tài khoản</h5>
                            <p>Web: <a style="color: blue;" href="http://home.quangluong.id.vn/">http://home.quangluong.id.vn/</a></p>
                            <p>Email: ' . htmlspecialchars($email) . '</p>
                            <p>Password: ' . htmlspecialchars($_POST["pass"]) . '</p>

                        </div>
                        <div class="footer">
                            <a href="http://home.quangluong.id.vn/">Trang chủ</a>
                            <a href="http://home.quangluong.id.vn/?act=sign-in">Đăng nhập</a>
                            <p>Copyright © 2024 Quang</p>
                        </div>
                    </form>
                
                </body>
                </html>
                ';
                sendmail($to, $subject, $body);
                // Redirect to login page if needed
                header("Location:?act=sign-in");
                ob_end_clean();
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {

        echo '<script>promt("Đăng ký không thành công");</script>';

    }


}