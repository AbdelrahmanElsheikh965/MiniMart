<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include '../includes/DataBase.php';

$d = new DataBase();
$products = $d->view("products");

echo json_encode($products);

// Link : http://localhost/minimart/api/products.php

?>