<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

include '../includes/DataBase.php';

$d = new DataBase();
$id = $_GET['id'];

try {
    $thisProduct = $d->view("products", "*", "WHERE id=$id");
    echo json_encode($thisProduct);
} catch (Exception $E) {
    die("Invalid Id Passed");
}

// Link : http://localhost/minimart/api/product.php?id=

?>