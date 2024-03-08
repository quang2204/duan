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
                $name = $result['name']; // Assuming 'name' is the column in your table
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
                            <br><br><br><br><br><br>
                            <div class="container ">
                                <div class="img">
                                    <img src="https://ci3.googleusercontent.com/meips/ADKq_NZeQ-9ttJt5qhDEfFUUJY3w5IQwEwT5sxCCMEf1U0zAdp8tXCS_iaSOWjPSU541ndfBKkR2VUUxcRfbDeQoVKanMAZweqddb-aY-29A8Cep=s0-d-e1-ft#https://cf.shopee.sg/file/0cd023d64f04491f3dc8076d6932dfdc">
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
        try {
            $sql = "UPDATE taikhoan
                    SET 
                    pass = :pass
                    where email=:email";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':pass', $_POST['pass']);

            $stmt->bindParam(':email', $_GET['email']);

            $stmt->execute();
            echo '<script>alert("Thay đổi mật khẩu thành công");</script>';

            header('Location: ?act=sign-in');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}