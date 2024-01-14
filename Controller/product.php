<?php
require_once "./model/product.php";
function proht()
{
    $product = getall();


    require_once './view/index.php';
}
?>