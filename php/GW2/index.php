<?php
include "./Db.class.php";
include "./Product.class.php";
$db = new Db();
$product = new Product($db);

$total = $product->getProducts();
var_dump($total);
exit;
echo 'test';
