<?php
function select($sql)
{
    try {
        
        $stmt = $GLOBALS['conn']->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }

}
function slectid($sql)
{
    try {
            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt->bindParam(":id", $_GET['id']);

            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }

}
function counts($sql)
{
    try {
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (Exception $e) {
        echo 'ERROR: ' . $e->getMessage();
        die;
    }

}