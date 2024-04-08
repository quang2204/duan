<?php
function getAlluser($keyword, $page = null, $perPage = null)
{

    $offset = ($page - 1) * $perPage;

    $sql = "SELECT * FROM taikhoan WHERE name LIKE '%$keyword%' OR name LIKE '%$keyword%' LIMIT $offset, $perPage";
    return select($sql);
}
function getiduser()
{

    $sql = "SELECT * FROM taikhoan WHERE id = :id LIMIT 1;";

    return slectid($sql);
}

function xoauser()
{

    $sql = "DELETE FROM taikhoan WHERE id = :id;";
    return slectid($sql);
}
function updatetk()
{
    if (isset($_POST['status']) && isset($_POST['id'])) {
        try {
            $sql = "UPDATE taikhoan 
                    SET status=:status
                    WHERE id = :id;";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':status', $_POST['status']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            header('Location: ?act=user');
            exit;
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}
function role()
{
    if (isset($_POST['role']) && isset($_POST['id'])) {
        try {
            $sql = "UPDATE taikhoan 
                    SET role=:role
                    WHERE id = :id;";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(':role', $_POST['role']);
            $stmt->bindParam(':id', $_POST['id']);
            $stmt->execute();
            header('Location: ?act=user');
            exit;
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            die;
        }
    }
}