<?php
function getAlluser($page = null, $perPage = null)
{

        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM taikhoan LIMIT $offset, $perPage";
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
