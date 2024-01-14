<?php
function getall()
{
try {
    $sql='SELECT * FROM sanpham ';
    $products=pdoall($sql);
    
    return $products;
    
} catch (\Throwable $th) {
   die();
}
}
function getid()
{
try {
    $sql='SELECT * FROM sanpham WHERE id=:id';
    $product=pdoid($sql);
    return $product;
    
} catch (\Throwable $th) {
   die();
}
}