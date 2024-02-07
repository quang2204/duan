<?php
function getAlldm()
{
        $sql = "SELECT * FROM danhmuc";
        return select($sql);
}
function getiddm()
{
   
        $sql = "SELECT * FROM danhmuc WHERE id = :id LIMIT 1;";
        return slectid($sql);
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
            header('Location:?act=danhmuc'); 
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

            $stmt->bindParam(':id', $_POST['id']); 

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
        $sql = "DELETE FROM danhmuc WHERE id = :id;";
        return slectid($sql);
}
