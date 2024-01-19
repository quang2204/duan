<?php
function getAlldm()
{
    try {
        // Câu truy vấn thường
        $sql = "SELECT * FROM danhmuc";

        // Chuẩn bị câu truy vấn
        $stmt = $GLOBALS['conn']->prepare($sql);

        // Thực hiện câu truy vấn
        $stmt->execute();

        // fetchAll để lấy ra dữ liệu
        // PDO::FETCH_ASSOC - chuyển đổi dữ liệu lấy ra thành kiểu mảng column_name => value
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getiddm()
{
    try {
        $sql = "SELECT * FROM danhmuc WHERE id = :id LIMIT 1;";

        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $_GET['id']);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    } catch (\Throwable $th) {
        die();
    }
}
function adddm()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {

            $sql = "INSERT INTO danhmuc (name)
                VALUES (:name)";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);


            $stmt->execute();
            header('Location:http://php.test/duanmau/admin/?act=danhmuc'); // replace success.php with your success page

            return $stmt;
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }

}
function updatedm()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $sql = "UPDATE danhmuc 
                    SET 
                    name = :name
                    where id=:id";


            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':name', $_POST['name']);


            // Nếu có ảnh mới, thì bind thêm đường dẫn ảnh mới

            $stmt->bindParam(':id', $_POST['id']); // Assuming that 'id' is being passed in the POST data

            $stmt->execute();
            header('Location: ?act=danhmuc');
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
function xoadm()
{
    try {
        $GLOBALS['conn']->beginTransaction(); // Start a transaction

        // Delete from the danhmuc table
        $sql_danhmuc = "DELETE FROM danhmuc WHERE id = :id;";
        $stmt_danhmuc = $GLOBALS['conn']->prepare($sql_danhmuc);
        $stmt_danhmuc->bindParam(":id", $_GET['id']);
        $stmt_danhmuc->execute();

        $GLOBALS['conn']->commit(); // Cam kết giao dịch
    } catch (Exception $e) {
        $GLOBALS['conn']->rollBack(); // Rollback the transaction if an error occurs
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
