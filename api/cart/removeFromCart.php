<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');

include '../../includes/Client.php';

try {
    $data = json_decode(file_get_contents("php://input"));
    $p_id = $data->p_id;
    $c_id = $data->c_id;
    $c = new Client();
    $removRes = $c->removeFC($p_id, $c_id);
    echo json_encode($removRes);
} catch (Exception $E) {
    throw new InvalidArgumentException("Error : check your data.");
}

// Link : http://localhost/minimart/api/cart/removeFromCart.php

?>