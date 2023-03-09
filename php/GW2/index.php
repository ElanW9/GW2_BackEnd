<?php
include "./includes/Db.class.php";
include "./includes/Product.class.php";
$db = new Db();
$product = new Product($db);

$total = $product->getProducts();
var_dump($total);
exit;
echo 'test';

header('Content-Type: application/json; charset=utf-8');
print json_encode($return);
