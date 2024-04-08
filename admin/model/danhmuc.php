<?php
function getAlldms($keyword, $page = '', $perPage = '')
{

    $offset = ($page - 1) * $perPage;

    $sql = "SELECT * FROM danhmuc WHERE name LIKE '%$keyword%' OR name LIKE '%$keyword%' LIMIT $offset, $perPage";
    return select($sql);
}

function countAll($table)
{
    $sql = "SELECT COUNT(*) as count FROM $table";
    $result = select($sql);
    return $result[0]['count'];
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
