<?php

$host = "localhost";
$dbname = "duanmau";
$username = "root";
$password = "";

try {
    /**
     * Tạo một phiên bản PDO để thể hiện kết nối tới cơ sở dữ liệu được yêu cầu.
     *
     * @param string $dsn Tên nguồn dữ liệu hoặc DSN chứa thông tin cần thiết để kết nối với cơ sở dữ liệu. 
     *                    Nói chung, DSN bao gồm tên trình điều khiển PDO, theo sau là dấu hai chấm, theo sau là cú pháp kết nối dành riêng cho trình điều khiển PDO. Thông tin thêm có sẵn từ tài liệu dành riêng cho trình điều khiển PDO. 
     *                    Tham số `dsn` hỗ trợ ba phương pháp khác nhau để chỉ định các đối số cần thiết để tạo kết nối cơ sở dữ liệu:
     *                    Lệnh gọi trình điều khiển `dsn` chứa DSN đầy đủ.
     *                    Lệnh gọi URI `dsn` bao gồm `uri:` theo sau là URI xác định vị trí của tệp chứa chuỗi DSN. URI có thể chỉ định tệp cục bộ hoặc URL từ xa. `uri:file:///path/to/dsnfile`
     *                    Bí danh `dsn` bao gồm một tên `name` ánh xạ tới `pdo.dsn.name` trong php.ini xác định chuỗi DSN. Lưu ý: Bí danh phải được xác định trong php.ini chứ không phải .htaccess hoặc httpd.conf
     * @param string|null $username Tên người dùng cho chuỗi DSN. Tham số này là tùy chọn đối với một số trình điều khiển PDO.
     * @param string|null $password Mật khẩu cho chuỗi DSN. Tham số này là tùy chọn đối với một số trình điều khiển PDO.
     * @param array|null $options Mảng key => value của các tùy chọn kết nối dành riêng cho trình điều khiển.
     */
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Đặt chế độ lỗi PDO thành ngoại lệ
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $PDOException) {
    echo "Kết nối thất bại: " . $PDOException->getMessage();
    die;
}