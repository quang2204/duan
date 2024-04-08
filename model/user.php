<?php
function getuser()
{
    try {
        $id = isset($_SESSION['users']['id']) ? $_SESSION['users']['id'] : null;
        $sql = "SELECT * FROM taikhoan WHERE id = :id LIMIT 1;";
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }

}