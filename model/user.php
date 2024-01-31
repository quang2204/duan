<?php
function getuser()
{
    try {
        $sql = "SELECT * FROM taikhoan WHERE id = :id LIMIT 1;";

        return slectid($sql);

    } catch (\Throwable $th) {
        die();
    }
}