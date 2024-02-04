<?php

require_once "./model/products.php";

function tk($search)
{
    $id = search($search);
    require_once '../view/product.php';
}
