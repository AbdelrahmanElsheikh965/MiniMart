<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include '../../includes/DataBase.php';

try {
    $d = new DataBase();
    $data = json_decode(file_get_contents("php://input"));
    $myId = $data->myId;
    $cols = "orders.amount, products.id, products.title, products.desc, products.price, products.image";
    $plus = "INNER JOIN `orders` ON products.id = orders.product_id ";
    $plus .= "INNER JOIN `clients` ON orders.client_id = clients.id WHERE clients.id = $myId";
    $myProducts = $d->view("products", $cols, $plus);
    echo json_encode($myProducts);
} catch (Exception $E) {
    exit("Error Showing Cart");
}

// Link : http://localhost/minimart/api/cart/cart.php

?>
