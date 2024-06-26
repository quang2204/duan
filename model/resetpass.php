<?php
function resset()
{
    try {
        if (!empty($_POST)) {
            $email = $_POST['email'];

            $query = "SELECT * FROM taikhoan WHERE email = :email";
            $stmt = $GLOBALS['conn']->prepare($query);
            $stmt->bindParam(':email', $email);

            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $name = $result['name'];
                $_SESSION['email'] = [
                    'email' => $result['email'],

                ];
                $token = bin2hex(random_bytes(32));

                $reset_link = 'http://php.test/duanmau/?act=reset_password&email=' . urlencode($email) . '&token=' . $token;
                $to = $email;
                $subject = "Welcome";
                $body = '<!DOCTYPE html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8">
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <style>
        .table-responsive {
            max-width: 600px;
        }

        .table td,
        .table th {
            padding: 0.75rem 0;
            vertical-align: top;
            border: 0;
        }

        .container {
            margin: auto;
            width: 600px;
        }

        .col {
            width: 300px;
            text-align: left;
        }

        .img {
            margin: 20px 0;
            line-height: 2;

        }

        th {
            text-align: left;
        }

        .img img {
            margin: auto;
            margin-bottom: 30px;
            display: block;
        }

        .img p {
            text-align: left;
        }

        .red {
            color: red;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }
    </style>
                        </head>
                        <body>
                    
                            <div class="container ">
                                <div class="img">
                                    <img src="https://home.quangluong.id.vn/view/images/icons/logo-01.png">
                                    <p>
                                        Xin chào ' . htmlspecialchars($name) . ',
                                    </p>
                                    <p>Chúng tôi nhận được yêu cầu thiết lập lại mật khẩu cho tài khoản Shopee của bạn</p>
                                    <p>
                                        Nhấn <a href=' . $reset_link . '><strong class="red">tại đây</strong></a> để thiết lập mật khẩu mới cho tài khoản Shopee
                                        của bạn.
                                    </p>
                                    <p>Hoặc vui lòng copy và dán đường dẫn bên dưới lên trình duyệt:</p>
                                    <a href="' . $reset_link . '" style="color: blue; word-wrap: break-word;">' . $reset_link . '</a>
                                </div>
                            </div>
                        </body>
                        </html>';

                sendmail($to, $subject, $body);
                header('Location: ?act=email');

            } else {
                echo '<script>alert("Không có email");</script>';
            }
        }
    } catch (Exception $e) {
        // Handle the exception appropriately, log or display an error message
        echo "An error occurred: " . $e->getMessage();
    }
}
function updatetoken()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pass = md5($_POST['pass']);

        try {
            $sql = "UPDATE taikhoan
                    SET 
                    pass = :pass
                    where email=:email";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':pass', $pass);

            $stmt->bindParam(':email', $_GET['email']);

            $stmt->execute();
            header('Location: ?act=sign-in');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
function doimk()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra xem các trường cần thiết có tồn tại không
        if (isset($_POST['pass'], $_POST['thaypas'], $_POST['nhaplai'])) {
            // Lấy mật khẩu hiện tại, mật khẩu mới và nhập lại mật khẩu mới
            $pass = md5($_POST['pass']);
            $updatepass = md5($_POST['thaypas']);
            $nhaplai = md5($_POST['nhaplai']);

            // Kiểm tra xem người dùng đã đăng nhập và thông tin người dùng có sẵn không
            if (isset($_SESSION['users']['pass'], $_SESSION['users']['id'])) {
                $pro = getuser();
                $ktpass = $pro['pass'];
                if ($pass == $ktpass) {

                    if ($updatepass == $nhaplai) {
                        // Cập nhật mật khẩu mới vào cơ sở dữ liệu
                        $sql = 'UPDATE taikhoan SET pass=:pass WHERE id=:id';
                        $stmt = $GLOBALS['conn']->prepare($sql);
                        $stmt->bindParam(':pass', $updatepass);
                        $stmt->bindParam(':id', $_SESSION['users']['id']);
                        $stmt->execute();


                        header('Location: ?act=profile');
                        exit();
                    } else {

                        echo '<script>alert("Mật khẩu nhập lại không đúng")</script>';
                    }
                } else {

                    echo '<script>alert("Mật khẩu hiện tại sai")</script>';
                }
            } else {
                // Hiển thị thông báo lỗi nếu thông tin tài khoản không hợp lệ
                echo '<script>alert("Thông tin tài khoản không hợp lệ")</script>';
            }
        } else {
            // Hiển thị thông báo lỗi nếu không có mật khẩu mới được cung cấp
            echo '<script>alert("Không có mật khẩu mới được cung cấp")</script>';
        }
    }
}


