<?php
function select($sql)
{
    $stmt = $GLOBALS['conn']->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function slectid($sql)
{
    $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->bindParam(":id", $_GET['id']);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
}