<?php

$productData = getProductsPerPage($currentPage, $productsPerPage);
$id = $productData['products'];
$totalPages = $productData['totalPages'];
