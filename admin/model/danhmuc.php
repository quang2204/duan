<?php
function getAlldm()
{
    try {

        $sql = "SELECT * FROM danhmuc";
        return select($sql);

    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
function getiddm()
{
    try {
        $sql = "SELECT * FROM danhmuc WHERE id = :id LIMIT 1;";

        return slectid($sql);


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
            header('Location:?act=danhmuc'); // replace success.php with your success page

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

            $stmt->bindParam(':id', $_POST['id']); // Giả sử rằng 'id' đang được truyền trong dữ liệu bài đăng

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
        // Start a transaction

        // Delete from the danhmuc table
        $sql = "DELETE FROM danhmuc WHERE id = :id;";
        return slectid($sql);

    } catch (Exception $e) {
        // Rollback the transaction if an error occurs
        echo 'ERROR: ' . $e->getMessage();
        die;
    }
}
