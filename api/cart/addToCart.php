<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include '../../includes/Client.php';

try {
    $ids = json_decode(file_get_contents("php://input"));
    $p_id = $ids->p_id;
    $c_id = $ids->c_id;
    $c = new Client();
    $addRes = $c->addToCart($p_id, $c_id);
    echo json_encode($addRes);
} catch (Exception $E) {
    throw new InvalidArgumentException("Product Id or Client Id Error.");
}

// Link : http://localhost/minimart/api/cart/addToCart.php

?>