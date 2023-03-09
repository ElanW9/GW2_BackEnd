<?php
require "./includes/Db.class.php";
require "./includes/Product.class.php";

$args = $_REQUEST;
$args['qsparts'] = explode('/', $args['qs']);

$response = new StdClass;

switch ($args['qsparts'][1]) {
    case 'product':
        $db = new Db();
        $product = new Product($db);
        $limit = 50;
        $filters = [];

        foreach ($_GET as $key => $value) {
            if (!in_array($key, $allowed_filters) &&  $key !== 'page' && $key != 'qs') {
                http_response_code(500);
                $response->error = "$key is not a valid filter.";
                break 2;
            }
        }

        break;
    case 'product':
        if (isset($args['qsparts'][2]) && !empty($args['qsparts'][2])) {
            $db = new Db();
            $product = new Product($db);
            $response->results = $product->getById($args['qsparts'][2]);
        } else {
            http_response_code(404);
            $response->error = "This is not a valid endpoint.";
        }
        break;

    default:
        http_response_code(404);
        $response->error = "This is not a valid endpoint.";
        break;
}
